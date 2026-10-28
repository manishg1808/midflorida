<?php
/**
 * Mid Florida Scholars Academy - Campus Tour Management
 */
$pageTitle = 'Campus Tours';
$activeNav = 'tours';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_tour') {
        $parent = trim($_POST['parent_name'] ?? '');
        $student = trim($_POST['student_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $grade = trim($_POST['grade_level'] ?? '');
        $date = trim($_POST['tour_date'] ?? date('Y-m-d'));
        $time = trim($_POST['tour_time'] ?? '10:00 AM');
        $notes = trim($_POST['interests'] ?? '');
        $status = trim($_POST['status'] ?? 'Pending');

        if (!empty($parent) && !empty($student)) {
            JsonDb::insert('tours', [
                'parent_name' => $parent,
                'student_name' => $student,
                'email' => $email,
                'phone' => $phone,
                'grade_level' => $grade,
                'tour_date' => $date,
                'tour_time' => $time,
                'status' => $status,
                'interests' => $notes
            ]);
            Auth::setFlash('success', "Campus tour scheduled for {$student} on {$date} at {$time}.");
            header("Location: tours.php");
            exit;
        }
    } elseif ($action === 'update_status') {
        $id = $_POST['tour_id'] ?? '';
        $newStatus = $_POST['new_status'] ?? 'Pending';
        if ($id) {
            JsonDb::update('tours', $id, ['status' => $newStatus]);
            Auth::setFlash('success', "Tour status updated to '{$newStatus}'.");
            header("Location: tours.php");
            exit;
        }
    } elseif ($action === 'delete_tour') {
        $id = $_POST['tour_id'] ?? '';
        if ($id) {
            JsonDb::delete('tours', $id);
            Auth::setFlash('info', "Tour booking removed.");
            header("Location: tours.php");
            exit;
        }
    }
}

$tours = JsonDb::all('tours');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Campus Tour Bookings</h1>
        <p class="page-header-subtitle">Manage prospective family campus visits, interviews, and follow-ups</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('toursTable', 'campus-tours-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addTourModal')">
            <i class="fas fa-plus"></i> New Tour Booking
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search student, parent, email..." data-table-search="toursTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="toursTable">
                <option value="all">All Statuses</option>
                <option value="Pending">Pending</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Completed">Completed</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="toursTable">
            <thead>
                <tr>
                    <th>Student &amp; Family</th>
                    <th>Grade Level</th>
                    <th>Contact Info</th>
                    <th>Scheduled Date</th>
                    <th>Status</th>
                    <th>Interests / Notes</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($tours)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No campus tours recorded yet. Click "New Tour Booking" to schedule one.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($tours as $t): ?>
                        <tr data-status="<?php echo htmlspecialchars($t['status']); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.92rem;"><?php echo htmlspecialchars($t['student_name']); ?></strong><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);">Parent: <?php echo htmlspecialchars($t['parent_name']); ?></span>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-bg); border: 1px solid var(--adm-border); color: var(--adm-navy); font-weight: 600;">
                                    <?php echo htmlspecialchars($t['grade_level']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="mailto:<?php echo htmlspecialchars($t['email']); ?>" style="color: var(--adm-primary); text-decoration: none; font-size: 0.84rem;">
                                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($t['email']); ?>
                                </a><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);">
                                    <i class="fas fa-phone"></i> <?php echo htmlspecialchars($t['phone']); ?>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy);"><?php echo date('M j, Y', strtotime($t['tour_date'])); ?></strong><br>
                                <span style="font-size: 0.78rem; color: var(--adm-gold); font-weight: 600;">
                                    <i class="fas fa-clock"></i> <?php echo htmlspecialchars($t['tour_time']); ?>
                                </span>
                            </td>
                            <td>
                                <?php 
                                $st = strtolower($t['status']);
                                $badge = 'badge-status-pending';
                                if ($st === 'confirmed' || $st === 'completed') $badge = 'badge-status-confirmed';
                                if ($st === 'cancelled') $badge = 'badge-status-rejected';
                                ?>
                                <form method="POST" action="tours.php" style="display: inline-block;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="tour_id" value="<?php echo htmlspecialchars($t['id']); ?>">
                                    <select name="new_status" class="adm-select" style="padding: 3px 8px; font-size: 0.78rem; border-radius: 12px; font-weight: 600;" onchange="this.form.submit()">
                                        <option value="Pending" <?php echo ($t['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Confirmed" <?php echo ($t['status'] === 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                                        <option value="Completed" <?php echo ($t['status'] === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                        <option value="Cancelled" <?php echo ($t['status'] === 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div style="max-width: 220px; font-size: 0.8rem; color: var(--adm-text-muted); line-height: 1.3;" title="<?php echo htmlspecialchars($t['interests'] ?? ''); ?>">
                                    <?php echo htmlspecialchars(!empty($t['interests']) ? $t['interests'] : 'General Campus Tour'); ?>
                                </div>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="tours.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to remove this tour booking?');">
                                    <input type="hidden" name="action" value="delete_tour">
                                    <input type="hidden" name="tour_id" value="<?php echo htmlspecialchars($t['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Tour">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Tour Modal -->
<div class="adm-modal-backdrop" id="addTourModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-calendar-plus" style="color: var(--adm-primary);"></i> New Tour Booking</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addTourModal">&times;</button>
        </div>
        <form method="POST" action="tours.php">
            <input type="hidden" name="action" value="create_tour">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Parent / Guardian Name *</label>
                        <input type="text" name="parent_name" class="adm-input" placeholder="e.g. David Miller" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Student Name *</label>
                        <input type="text" name="student_name" class="adm-input" placeholder="e.g. Mason Miller" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" placeholder="dmiller@email.com" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number *</label>
                        <input type="tel" name="phone" class="adm-input" placeholder="(407) 555-0182" required>
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="adm-form-group">
                        <label class="adm-label">Grade Applying *</label>
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
                        <input type="date" name="tour_date" class="adm-input" value="<?php echo date('Y-m-d', strtotime('+2 days')); ?>" required>
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
                    <label class="adm-label">Initial Status</label>
                    <select name="status" class="adm-select" style="width: 100%;">
                        <option value="Pending">Pending</option>
                        <option value="Confirmed" selected>Confirmed</option>
                    </select>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Specific Academic Interests / Notes</label>
                    <textarea name="interests" class="adm-textarea" placeholder="e.g. Interested in Step Up scholarship, dual enrollment, tennis scheduling..."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addTourModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Tour Booking</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
