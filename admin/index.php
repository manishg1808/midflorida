<?php
/**
 * Mid Florida Scholars Academy - Admin Executive Dashboard
 */
$pageTitle = 'Dashboard';
$activeNav = 'dashboard';
require_once __DIR__ . '/includes/header.php';

// Handle quick modal submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'quick_tour') {
        $parent = trim($_POST['parent_name'] ?? '');
        $student = trim($_POST['student_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $grade = trim($_POST['grade_level'] ?? '');
        $date = trim($_POST['tour_date'] ?? date('Y-m-d'));
        $time = trim($_POST['tour_time'] ?? '10:00 AM');
        $notes = trim($_POST['interests'] ?? '');

        if (!empty($parent) && !empty($student)) {
            JsonDb::insert('tours', [
                'parent_name' => $parent,
                'student_name' => $student,
                'email' => $email,
                'phone' => $phone,
                'grade_level' => $grade,
                'tour_date' => $date,
                'tour_time' => $time,
                'status' => 'Pending',
                'interests' => $notes
            ]);
            Auth::setFlash('success', "Campus tour booking for {$student} has been created.");
            header("Location: index.php");
            exit;
        }
    } elseif ($_POST['action'] === 'quick_inquiry') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $subject = trim($_POST['subject'] ?? 'General Inquiry');
        $grade = trim($_POST['grade'] ?? 'Not Specified');
        $message = trim($_POST['message'] ?? '');

        if (!empty($name) && !empty($email)) {
            JsonDb::insert('inquiries', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'subject' => $subject,
                'grade' => $grade,
                'message' => $message,
                'status' => 'New'
            ]);
            Auth::setFlash('success', "Parent inquiry from {$name} logged successfully.");
            header("Location: index.php");
            exit;
        }
    }
}

// Fetch stats
$tours = JsonDb::all('tours');
$inquiries = JsonDb::all('inquiries');
$apps = JsonDb::all('applications');
$transcripts = JsonDb::all('transcripts');

$totalTours = count($tours);
$totalInquiries = count($inquiries);
$totalApps = count($apps);
$totalTranscripts = count($transcripts);

$totalLeads = 0;
try {
    if (isset($db)) {
        $leadStmt = $db->query("SELECT COUNT(*) FROM `contacts`");
        $totalLeads = (int)$leadStmt->fetchColumn();
    }
} catch (Throwable $e) {
    $totalLeads = 0;
}

$recentTours = array_slice($tours, 0, 5);
$recentInquiries = array_slice($inquiries, 0, 5);
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Welcome back, Administrator</h1>
        <p class="page-header-subtitle">Executive overview &bull; Mid Florida Scholars Academy &bull; <?php echo date('l, F j, Y'); ?></p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="openModal('quickInquiryModal')">
            <i class="fas fa-plus"></i> Record Inquiry
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('quickTourModal')">
            <i class="fas fa-calendar-plus"></i> Schedule Tour
        </button>
    </div>
</div>

<!-- KPI Summary Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Campus Tours</span>
            <span class="stat-value"><?php echo $totalTours; ?></span>
            <span class="stat-trend positive">
                <i class="fas fa-arrow-up"></i> +18% this month
            </span>
        </div>
        <div class="stat-icon gold">
            <i class="fas fa-calendar-check"></i>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Student Applications</span>
            <span class="stat-value"><?php echo $totalApps; ?></span>
            <span class="stat-trend positive">
                <i class="fas fa-arrow-up"></i> +12% admissions
            </span>
        </div>
        <div class="stat-icon primary">
            <i class="fas fa-user-graduate"></i>
        </div>
    </div>

    <a href="leads.php" class="stat-card" style="text-decoration: none; color: inherit;">
        <div class="stat-info">
            <span class="stat-label">Contact Leads</span>
            <span class="stat-value"><?php echo $totalLeads; ?></span>
            <span class="stat-trend <?php echo (($newLeadsCount ?? 0) > 0) ? 'positive' : 'neutral'; ?>">
                <i class="fas fa-bell"></i> <?php echo $newLeadsCount ?? 0; ?> new leads
            </span>
        </div>
        <div class="stat-icon info">
            <i class="fas fa-user-tag"></i>
        </div>
    </a>

    <div class="stat-card">
        <div class="stat-info">
            <span class="stat-label">Transcript Orders</span>
            <span class="stat-value"><?php echo $totalTranscripts; ?></span>
            <span class="stat-trend positive">
                <i class="fas fa-check"></i> 100% processed
            </span>
        </div>
        <div class="stat-icon success">
            <i class="fas fa-file-invoice"></i>
        </div>
    </div>
</div>

<!-- Interactive Analytics Charts -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px; margin-bottom: 28px;">
    <!-- Trends Line Chart -->
    <div class="admin-card" style="margin-bottom: 0;">
        <div class="admin-card-header">
            <div>
                <h2 class="card-title"><i class="fas fa-chart-line" style="color: var(--adm-primary);"></i> Admissions &amp; Tour Velocity</h2>
                <div class="card-subtitle">Monthly inquiries, campus tours, and enrollment applications</div>
            </div>
            <div class="card-actions">
                <span class="badge-pill" style="background: var(--adm-primary-soft); color: var(--adm-primary);">2026-2027 Term</span>
            </div>
        </div>
        <div class="admin-card-body">
            <div style="height: 270px; width: 100%;">
                <canvas id="admissionsVelocityChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Division Breakdown Doughnut Chart -->
    <div class="admin-card" style="margin-bottom: 0;">
        <div class="admin-card-header">
            <div>
                <h2 class="card-title"><i class="fas fa-chart-pie" style="color: var(--adm-gold);"></i> By Division</h2>
                <div class="card-subtitle">Student applicant distribution</div>
            </div>
        </div>
        <div class="admin-card-body">
            <div style="height: 220px; width: 100%; display: flex; align-items: center; justify-content: center;">
                <canvas id="divisionPieChart"></canvas>
            </div>
            <div style="display: flex; justify-content: space-around; margin-top: 14px; font-size: 0.78rem; text-align: center;">
                <div><span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:#5d45db;margin-right:4px;"></span>Lower (K-5)</div>
                <div><span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:#c9a227;margin-right:4px;"></span>Middle (6-8)</div>
                <div><span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:#10b981;margin-right:4px;"></span>Upper (9-12)</div>
            </div>
        </div>
    </div>
</div>

<!-- Two Operational Panels: Upcoming Tours & Recent Inquiries -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- Panel 1: Upcoming Campus Tours -->
    <div class="admin-card" style="margin-bottom: 0;">
        <div class="admin-card-header">
            <div>
                <h2 class="card-title"><i class="fas fa-calendar-alt" style="color: var(--adm-gold);"></i> Upcoming Tours</h2>
                <div class="card-subtitle">Scheduled prospective family visits</div>
            </div>
            <div class="card-actions">
                <a href="tours.php" class="btn-adm btn-adm-sm btn-adm-outline">View All (<?php echo $totalTours; ?>)</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Family &amp; Student</th>
                        <th>Grade</th>
                        <th>Date &amp; Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentTours)): ?>
                        <tr><td colspan="4" style="text-align: center; color: var(--adm-text-muted);">No scheduled tours currently.</td></tr>
                    <?php else: ?>
                        <?php foreach ($recentTours as $t): ?>
                            <tr>
                                <td>
                                    <strong style="color: var(--adm-navy);"><?php echo htmlspecialchars($t['student_name']); ?></strong><br>
                                    <span style="font-size: 0.76rem; color: var(--adm-text-muted);"><?php echo htmlspecialchars($t['parent_name']); ?></span>
                                </td>
                                <td><span style="font-size: 0.82rem;"><?php echo htmlspecialchars($t['grade_level']); ?></span></td>
                                <td>
                                    <strong><?php echo date('M j, Y', strtotime($t['tour_date'])); ?></strong><br>
                                    <span style="font-size: 0.76rem; color: var(--adm-text-muted);"><?php echo htmlspecialchars($t['tour_time']); ?></span>
                                </td>
                                <td>
                                    <?php 
                                    $st = strtolower($t['status']);
                                    $badgeClass = ($st === 'confirmed' || $st === 'completed') ? 'badge-status-confirmed' : 'badge-status-pending';
                                    ?>
                                    <span class="badge-pill <?php echo $badgeClass; ?> badge-pill-dot">
                                        <?php echo htmlspecialchars($t['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Panel 2: Recent Parent Inquiries -->
    <div class="admin-card" style="margin-bottom: 0;">
        <div class="admin-card-header">
            <div>
                <h2 class="card-title"><i class="fas fa-inbox" style="color: var(--adm-primary);"></i> Recent Inquiries</h2>
                <div class="card-subtitle">Messages from admissions &amp; contact forms</div>
            </div>
            <div class="card-actions">
                <a href="inquiries.php" class="btn-adm btn-adm-sm btn-adm-outline">View All (<?php echo $totalInquiries; ?>)</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Received</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recentInquiries)): ?>
                        <tr><td colspan="4" style="text-align: center; color: var(--adm-text-muted);">No inquiries logged.</td></tr>
                    <?php else: ?>
                        <?php foreach ($recentInquiries as $inq): ?>
                            <tr>
                                <td>
                                    <strong style="color: var(--adm-navy);"><?php echo htmlspecialchars($inq['name']); ?></strong><br>
                                    <span style="font-size: 0.76rem; color: var(--adm-text-muted);"><?php echo htmlspecialchars($inq['email']); ?></span>
                                </td>
                                <td>
                                    <div style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-weight: 500;">
                                        <?php echo htmlspecialchars($inq['subject']); ?>
                                    </div>
                                    <span style="font-size: 0.76rem; color: var(--adm-gold);"><?php echo htmlspecialchars($inq['grade']); ?></span>
                                </td>
                                <td><span style="font-size: 0.8rem; color: var(--adm-text-muted);"><?php echo date('M j, g:ia', strtotime($inq['created_at'])); ?></span></td>
                                <td>
                                    <?php 
                                    $st = strtolower($inq['status']);
                                    $badge = 'badge-status-new';
                                    if ($st === 'contacted' || $st === 'in progress') $badge = 'badge-status-contacted';
                                    if ($st === 'enrolled') $badge = 'badge-status-confirmed';
                                    ?>
                                    <span class="badge-pill <?php echo $badge; ?> badge-pill-dot">
                                        <?php echo htmlspecialchars($inq['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ==========================================================================
     MODALS
     ========================================================================== -->

<!-- Quick Tour Modal -->
<div class="adm-modal-backdrop" id="quickTourModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-calendar-plus" style="color: var(--adm-primary);"></i> Schedule Campus Tour</h3>
            <button type="button" class="adm-modal-close" data-close-modal="quickTourModal">&times;</button>
        </div>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="quick_tour">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Parent / Guardian Name *</label>
                        <input type="text" name="parent_name" class="adm-input" placeholder="e.g. Robert & Sarah Smith" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Student Name *</label>
                        <input type="text" name="student_name" class="adm-input" placeholder="e.g. Lucas Smith" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" placeholder="parent@email.com" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number *</label>
                        <input type="tel" name="phone" class="adm-input" placeholder="(407) 555-0123" required>
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="adm-form-group">
                        <label class="adm-label">Grade Level *</label>
                        <select name="grade_level" class="adm-select" style="width: 100%;">
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Grade 1 (Lower)">Grade 1 (Lower)</option>
                            <option value="Grade 2 (Lower)">Grade 2 (Lower)</option>
                            <option value="Grade 3 (Lower)">Grade 3 (Lower)</option>
                            <option value="Grade 4 (Lower)">Grade 4 (Lower)</option>
                            <option value="Grade 5 (Lower)">Grade 5 (Lower)</option>
                            <option value="Grade 6 (Middle)">Grade 6 (Middle)</option>
                            <option value="Grade 7 (Middle)">Grade 7 (Middle)</option>
                            <option value="Grade 8 (Middle)">Grade 8 (Middle)</option>
                            <option value="Grade 9 (Upper)">Grade 9 (Upper)</option>
                            <option value="Grade 10 (Upper)">Grade 10 (Upper)</option>
                            <option value="Grade 11 (Upper)">Grade 11 (Upper)</option>
                            <option value="Grade 12 (Upper)">Grade 12 (Upper)</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Tour Date *</label>
                        <input type="date" name="tour_date" class="adm-input" value="<?php echo date('Y-m-d', strtotime('+3 days')); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Tour Time *</label>
                        <select name="tour_time" class="adm-select" style="width: 100%;">
                            <option value="09:30 AM">09:30 AM</option>
                            <option value="10:00 AM" selected>10:00 AM</option>
                            <option value="11:15 AM">11:15 AM</option>
                            <option value="01:30 PM">01:30 PM</option>
                            <option value="02:00 PM">02:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Specific Academic Interests / Notes</label>
                    <textarea name="interests" class="adm-textarea" placeholder="e.g. Interested in Step Up scholarship, dual enrollment, tennis scheduling..."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="quickTourModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Tour Booking</button>
            </div>
        </form>
    </div>
</div>

<!-- Quick Inquiry Modal -->
<div class="adm-modal-backdrop" id="quickInquiryModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-envelope-open-text" style="color: var(--adm-primary);"></i> Record Parent Inquiry</h3>
            <button type="button" class="adm-modal-close" data-close-modal="quickInquiryModal">&times;</button>
        </div>
        <form method="POST" action="index.php">
            <input type="hidden" name="action" value="quick_inquiry">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Contact Name *</label>
                        <input type="text" name="name" class="adm-input" placeholder="e.g. Jennifer Lopez" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" placeholder="jennifer@email.com" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number</label>
                        <input type="tel" name="phone" class="adm-input" placeholder="(407) 555-0199">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Target Grade</label>
                        <select name="grade" class="adm-select" style="width: 100%;">
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Lower School (K-5)">Lower School (K-5)</option>
                            <option value="Middle School (6-8)">Middle School (6-8)</option>
                            <option value="Upper School (9-12)">Upper School (9-12)</option>
                            <option value="Flexible Enrollment">Flexible Enrollment</option>
                            <option value="Dual Enrollment">Dual Enrollment</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Subject / Purpose *</label>
                    <input type="text" name="subject" class="adm-input" placeholder="e.g. Tuition Voucher Question" required>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Inquiry Message *</label>
                    <textarea name="message" class="adm-textarea" placeholder="Detail the parent's question or phone conversation..." required></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="quickInquiryModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Log Inquiry</button>
            </div>
        </form>
    </div>
</div>

<!-- Initialize Chart.js Analytics -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // 1. Velocity Chart
    const velocityCtx = document.getElementById('admissionsVelocityChart');
    if (velocityCtx) {
        new Chart(velocityCtx, {
            type: 'line',
            data: {
                labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct (Current)'],
                datasets: [
                    {
                        label: 'Campus Tours',
                        data: [12, 18, 25, 34, 28, 38],
                        borderColor: '#c9a227',
                        backgroundColor: 'rgba(201, 162, 39, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#c9a227',
                        pointRadius: 4
                    },
                    {
                        label: 'Applications',
                        data: [8, 14, 22, 30, 20, 29],
                        borderColor: '#5d45db',
                        backgroundColor: 'rgba(93, 69, 219, 0.08)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#5d45db',
                        pointRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { font: { family: 'Plus Jakarta Sans', size: 12 }, boxWidth: 14 }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f1f5f9' },
                        ticks: { font: { family: 'Plus Jakarta Sans' } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Plus Jakarta Sans' } }
                    }
                }
            }
        });
    }

    // 2. Division Breakdown Pie Chart
    const divCtx = document.getElementById('divisionPieChart');
    if (divCtx) {
        new Chart(divCtx, {
            type: 'doughnut',
            data: {
                labels: ['Lower School (K-5)', 'Middle School (6-8)', 'Upper School (9-12)'],
                datasets: [{
                    data: [35, 28, 37],
                    backgroundColor: ['#5d45db', '#c9a227', '#10b981'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                cutout: '72%'
            }
        });
    }
});
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
