<?php
/**
 * Mid Florida Scholars Academy - Student Applications & Admissions Management
 */
$pageTitle = 'Student Applications';
$activeNav = 'applications';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_application') {
        $first = trim($_POST['student_first_name'] ?? '');
        $last = trim($_POST['student_last_name'] ?? '');
        $parent = trim($_POST['parent_name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $dob = trim($_POST['dob'] ?? '');
        $grade = trim($_POST['grade_applying'] ?? 'Grade 1');
        $division = trim($_POST['division'] ?? 'Lower School');
        $program = trim($_POST['program_track'] ?? 'Standard College Preparatory');
        $scholarship = trim($_POST['scholarship_type'] ?? 'Direct Tuition / Private Pay');
        $prevSchool = trim($_POST['previous_school'] ?? '');
        $gpa = trim($_POST['gpa'] ?? '3.5');
        $notes = trim($_POST['notes'] ?? '');
        $status = trim($_POST['status'] ?? 'Under Review');

        if (!empty($first) && !empty($last) && !empty($parent)) {
            JsonDb::insert('applications', [
                'student_first_name' => $first,
                'student_last_name' => $last,
                'parent_name' => $parent,
                'email' => $email,
                'phone' => $phone,
                'dob' => $dob,
                'grade_applying' => $grade,
                'division' => $division,
                'program_track' => $program,
                'scholarship_type' => $scholarship,
                'previous_school' => $prevSchool,
                'status' => $status,
                'gpa' => $gpa,
                'notes' => $notes
            ]);
            Auth::setFlash('success', "Application for {$first} {$last} logged successfully.");
            header("Location: applications.php");
            exit;
        }
    } elseif ($action === 'update_status') {
        $id = $_POST['app_id'] ?? '';
        $newStatus = $_POST['new_status'] ?? 'Under Review';
        if ($id) {
            JsonDb::update('applications', $id, ['status' => $newStatus]);
            Auth::setFlash('success', "Application status changed to '{$newStatus}'.");
            header("Location: applications.php");
            exit;
        }
    } elseif ($action === 'delete_application') {
        $id = $_POST['app_id'] ?? '';
        if ($id) {
            JsonDb::delete('applications', $id);
            Auth::setFlash('info', "Application record deleted.");
            header("Location: applications.php");
            exit;
        }
    }
}

$apps = JsonDb::all('applications');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Admissions &amp; Student Applications</h1>
        <p class="page-header-subtitle">Evaluate candidates, verify scholarship paperwork, and record admissions committee decisions</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('appsTable', 'student-applications-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addAppModal')">
            <i class="fas fa-user-plus"></i> New Application
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search student name, scholarship, grade..." data-table-search="appsTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="appsTable">
                <option value="all">All Statuses</option>
                <option value="Under Review">Under Review</option>
                <option value="Accepted">Accepted</option>
                <option value="Waitlist">Waitlist</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="appsTable">
            <thead>
                <tr>
                    <th>Student Candidate</th>
                    <th>Grade &amp; Division</th>
                    <th>Academic Program Track</th>
                    <th>Funding / Scholarship</th>
                    <th>GPA / Prior School</th>
                    <th>Admissions Status</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($apps)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No applications submitted yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($apps as $a): ?>
                        <tr data-status="<?php echo htmlspecialchars($a['status']); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;">
                                    <?php echo htmlspecialchars($a['student_first_name'] . ' ' . $a['student_last_name']); ?>
                                </strong><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);">
                                    Parent: <?php echo htmlspecialchars($a['parent_name']); ?> &bull; 
                                    <a href="mailto:<?php echo htmlspecialchars($a['email']); ?>" style="color: var(--adm-primary); text-decoration: none;">
                                        <?php echo htmlspecialchars($a['email']); ?>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy);"><?php echo htmlspecialchars($a['grade_applying']); ?></strong><br>
                                <span style="font-size: 0.76rem; color: var(--adm-gold); font-weight: 600; text-transform: uppercase;">
                                    <?php echo htmlspecialchars($a['division']); ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 0.84rem; color: var(--adm-navy); font-weight: 500;">
                                    <?php echo htmlspecialchars($a['program_track']); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: #f1f5f9; border: 1px solid var(--adm-border); color: var(--adm-text); font-size: 0.76rem;">
                                    <i class="fas fa-hand-holding-usd" style="color: var(--adm-gold);"></i> 
                                    <?php echo htmlspecialchars($a['scholarship_type']); ?>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy);"><?php echo htmlspecialchars($a['gpa'] ?? 'N/A'); ?></strong><br>
                                <span style="font-size: 0.76rem; color: var(--adm-text-muted); max-width: 140px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo htmlspecialchars($a['previous_school'] ?? 'N/A'); ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="applications.php" style="display: inline-block;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="app_id" value="<?php echo htmlspecialchars($a['id']); ?>">
                                    <select name="new_status" class="adm-select" style="padding: 3px 8px; font-size: 0.78rem; border-radius: 12px; font-weight: 600;" onchange="this.form.submit()">
                                        <option value="Under Review" <?php echo ($a['status'] === 'Under Review') ? 'selected' : ''; ?>>Under Review</option>
                                        <option value="Accepted" <?php echo ($a['status'] === 'Accepted') ? 'selected' : ''; ?>>Accepted</option>
                                        <option value="Waitlist" <?php echo ($a['status'] === 'Waitlist') ? 'selected' : ''; ?>>Waitlist</option>
                                        <option value="Rejected" <?php echo ($a['status'] === 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <button type="button" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-primary); margin-right: 4px;" title="View Full Dossier" onclick="viewAppModal(<?php echo htmlspecialchars(json_encode($a)); ?>)">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form method="POST" action="applications.php" style="display: inline;" onsubmit="return confirm('Delete this application record?');">
                                    <input type="hidden" name="action" value="delete_application">
                                    <input type="hidden" name="app_id" value="<?php echo htmlspecialchars($a['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Application">
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

<!-- View Application Dossier Modal -->
<div class="adm-modal-backdrop" id="viewAppModal">
    <div class="adm-modal" style="max-width: 650px;">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-user-graduate" style="color: var(--adm-primary);"></i> Candidate Dossier</h3>
            <button type="button" class="adm-modal-close" data-close-modal="viewAppModal">&times;</button>
        </div>
        <div class="adm-modal-body">
            <div style="background: var(--adm-bg); border-radius: 8px; padding: 18px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h2 id="dossierStudentName" style="font-size: 1.25rem; font-weight: 800; color: var(--adm-navy);"></h2>
                    <div style="font-size: 0.84rem; color: var(--adm-text-muted);" id="dossierGradeDivision"></div>
                </div>
                <div id="dossierStatusPill"></div>
            </div>

            <div class="form-grid-2" style="margin-bottom: 16px;">
                <div style="background: #ffffff; border: 1px solid var(--adm-border); border-radius: 8px; padding: 12px;">
                    <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--adm-text-muted); font-weight: 700;">Parent / Contact</span>
                    <div id="dossierParent" style="font-weight: 600; color: var(--adm-navy); margin-top: 4px;"></div>
                    <div id="dossierContact" style="font-size: 0.8rem; color: var(--adm-text-muted);"></div>
                </div>
                <div style="background: #ffffff; border: 1px solid var(--adm-border); border-radius: 8px; padding: 12px;">
                    <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--adm-text-muted); font-weight: 700;">Academics &amp; Prior School</span>
                    <div id="dossierGpa" style="font-weight: 600; color: var(--adm-navy); margin-top: 4px;"></div>
                    <div id="dossierPriorSchool" style="font-size: 0.8rem; color: var(--adm-text-muted);"></div>
                </div>
            </div>

            <div style="background: #ffffff; border: 1px solid var(--adm-border); border-radius: 8px; padding: 14px; margin-bottom: 16px;">
                <span style="font-size: 0.75rem; text-transform: uppercase; color: var(--adm-text-muted); font-weight: 700;">Program Track &amp; Funding</span>
                <div id="dossierTrack" style="font-weight: 600; color: var(--adm-navy); margin-top: 4px;"></div>
                <div id="dossierFunding" style="font-size: 0.84rem; color: var(--adm-gold); font-weight: 600; margin-top: 2px;"></div>
            </div>

            <div class="adm-form-group">
                <label class="adm-label">Committee Evaluation Notes</label>
                <div id="dossierNotes" style="padding: 12px; background: #f8fafc; border: 1px solid var(--adm-border); border-radius: 8px; font-size: 0.88rem; line-height: 1.5;"></div>
            </div>
        </div>
        <div class="adm-modal-footer">
            <button type="button" class="btn-adm btn-adm-outline" data-close-modal="viewAppModal">Close</button>
        </div>
    </div>
</div>

<!-- Add Application Modal -->
<div class="adm-modal-backdrop" id="addAppModal">
    <div class="adm-modal" style="max-width: 650px;">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-user-plus" style="color: var(--adm-primary);"></i> New Student Application</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addAppModal">&times;</button>
        </div>
        <form method="POST" action="applications.php">
            <input type="hidden" name="action" value="create_application">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Student First Name *</label>
                        <input type="text" name="student_first_name" class="adm-input" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Student Last Name *</label>
                        <input type="text" name="student_last_name" class="adm-input" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Parent / Guardian Name *</label>
                        <input type="text" name="parent_name" class="adm-input" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Date of Birth</label>
                        <input type="date" name="dob" class="adm-input" value="2012-06-15">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Parent Email *</label>
                        <input type="email" name="email" class="adm-input" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Parent Phone *</label>
                        <input type="tel" name="phone" class="adm-input" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Grade Applying *</label>
                        <select name="grade_applying" class="adm-select" style="width: 100%;">
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                            <option value="Grade 5">Grade 5</option>
                            <option value="Grade 6">Grade 6</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">School Division *</label>
                        <select name="division" class="adm-select" style="width: 100%;">
                            <option value="Lower School">Lower School (K-5)</option>
                            <option value="Middle School">Middle School (6-8)</option>
                            <option value="Upper School">Upper School (9-12)</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Academic Program Track</label>
                        <select name="program_track" class="adm-select" style="width: 100%;">
                            <option value="Standard College Preparatory">Standard College Preparatory</option>
                            <option value="Flexible Professional Program (Athletics/Arts)">Flexible Professional Program</option>
                            <option value="Dual Enrollment Honors Track (Valencia/USF)">Dual Enrollment Honors Track</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Scholarship / Funding Source</label>
                        <select name="scholarship_type" class="adm-select" style="width: 100%;">
                            <option value="Direct Tuition / Private Pay">Direct Tuition / Private Pay</option>
                            <option value="Step Up For Students (FES-EO)">Step Up For Students (FES-EO)</option>
                            <option value="Step Up For Students (PEP)">Step Up For Students (PEP)</option>
                            <option value="Step Up For Students (FES-UA)">Step Up For Students (FES-UA)</option>
                            <option value="AAA Scholarship Foundation">AAA Scholarship Foundation</option>
                        </select>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Previous School Attended</label>
                        <input type="text" name="previous_school" class="adm-input" placeholder="e.g. Olympia High School">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Cumulative GPA</label>
                        <input type="text" name="gpa" class="adm-input" placeholder="e.g. 3.85">
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Admissions Notes / Special Talents</label>
                    <textarea name="notes" class="adm-textarea" placeholder="Enter notes from interview, teacher recommendations, etc."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addAppModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Application</button>
            </div>
        </form>
    </div>
</div>

<script>
function viewAppModal(app) {
    document.getElementById('dossierStudentName').textContent = app.student_first_name + ' ' + app.student_last_name;
    document.getElementById('dossierGradeDivision').textContent = app.grade_applying + ' • ' + app.division;
    document.getElementById('dossierParent').textContent = app.parent_name;
    document.getElementById('dossierContact').textContent = app.email + ' • ' + (app.phone || 'No phone');
    document.getElementById('dossierGpa').textContent = 'GPA: ' + (app.gpa || 'N/A');
    document.getElementById('dossierPriorSchool').textContent = 'Prior: ' + (app.previous_school || 'None listed');
    document.getElementById('dossierTrack').textContent = app.program_track;
    document.getElementById('dossierFunding').textContent = 'Funding: ' + app.scholarship_type;
    document.getElementById('dossierNotes').textContent = app.notes || 'No committee notes recorded yet.';
    
    const pill = document.getElementById('dossierStatusPill');
    pill.innerHTML = '<span class="badge-pill badge-status-confirmed">' + app.status + '</span>';
    openModal('viewAppModal');
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
