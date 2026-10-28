<?php
/**
 * Mid Florida Scholars Academy - Faculty & Staff Directory Manager
 */
$pageTitle = 'Faculty & Staff';
$activeNav = 'faculty';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_faculty') {
        $name = trim($_POST['name'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $dept = trim($_POST['department'] ?? 'General');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '(407) 757-2241');
        $photo = trim($_POST['photo'] ?? 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80');
        $bio = trim($_POST['bio'] ?? '');

        if (!empty($name) && !empty($role)) {
            JsonDb::insert('faculty', [
                'name' => $name,
                'role' => $role,
                'department' => $dept,
                'email' => $email,
                'phone' => $phone,
                'photo' => $photo,
                'bio' => $bio
            ]);
            Auth::setFlash('success', "Faculty member '{$name}' added.");
            header("Location: faculty.php");
            exit;
        }
    } elseif ($action === 'delete_faculty') {
        $id = $_POST['faculty_id'] ?? '';
        if ($id) {
            JsonDb::delete('faculty', $id);
            Auth::setFlash('info', "Faculty member profile removed.");
            header("Location: faculty.php");
            exit;
        }
    }
}

$faculty = JsonDb::all('faculty');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Faculty &amp; Staff Directory</h1>
        <p class="page-header-subtitle">Manage leadership bios, department chairs, and instructional faculty profiles</p>
    </div>
    <div class="page-actions">
        <a href="../leadership.php" target="_blank" class="btn-adm btn-adm-outline">
            <i class="fas fa-eye"></i> View Public Leadership
        </a>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addFacultyModal')">
            <i class="fas fa-user-tie"></i> Add Faculty Member
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search name, role, department..." data-table-search="facultyTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Department:</label>
            <select class="adm-select" data-table-filter="facultyTable">
                <option value="all">All Departments</option>
                <option value="Administration">Administration</option>
                <option value="Lower School">Lower School</option>
                <option value="Middle School">Middle School</option>
                <option value="Upper School">Upper School</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="facultyTable">
            <thead>
                <tr>
                    <th style="width: 70px;">Photo</th>
                    <th>Name &amp; Role</th>
                    <th>Department</th>
                    <th>Contact Details</th>
                    <th>Bio Overview</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($faculty)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No faculty profiles added yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($faculty as $f): ?>
                        <tr data-status="<?php echo htmlspecialchars($f['department']); ?>">
                            <td>
                                <img src="<?php echo htmlspecialchars($f['photo']); ?>" alt="<?php echo htmlspecialchars($f['name']); ?>" style="width: 48px; height: 48px; object-fit: cover; border-radius: 50%; border: 2px solid var(--adm-gold);">
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;"><?php echo htmlspecialchars($f['name']); ?></strong><br>
                                <span style="font-size: 0.8rem; color: var(--adm-text-muted);"><?php echo htmlspecialchars($f['role']); ?></span>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-primary-soft); color: var(--adm-primary); font-weight: 600;">
                                    <?php echo htmlspecialchars($f['department']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="mailto:<?php echo htmlspecialchars($f['email']); ?>" style="color: var(--adm-primary); font-size: 0.82rem; text-decoration: none;">
                                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($f['email']); ?>
                                </a><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);">
                                    <i class="fas fa-phone"></i> <?php echo htmlspecialchars($f['phone']); ?>
                                </span>
                            </td>
                            <td>
                                <div style="max-width: 320px; font-size: 0.8rem; color: var(--adm-text-muted); line-height: 1.4;">
                                    <?php echo htmlspecialchars($f['bio']); ?>
                                </div>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="faculty.php" style="display: inline;" onsubmit="return confirm('Delete this faculty member?');">
                                    <input type="hidden" name="action" value="delete_faculty">
                                    <input type="hidden" name="faculty_id" value="<?php echo htmlspecialchars($f['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Profile">
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

<!-- Add Faculty Modal -->
<div class="adm-modal-backdrop" id="addFacultyModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-user-plus" style="color: var(--adm-primary);"></i> Add Faculty Member</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addFacultyModal">&times;</button>
        </div>
        <form method="POST" action="faculty.php">
            <input type="hidden" name="action" value="create_faculty">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Full Name *</label>
                        <input type="text" name="name" class="adm-input" placeholder="e.g. Dr. Arthur Miller" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Title / Role *</label>
                        <input type="text" name="role" class="adm-input" placeholder="e.g. Middle School Science Chair" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Department</label>
                        <select name="department" class="adm-select" style="width: 100%;">
                            <option value="Administration">Administration</option>
                            <option value="Lower School">Lower School (K-5)</option>
                            <option value="Middle School">Middle School (6-8)</option>
                            <option value="Upper School">Upper School (9-12)</option>
                            <option value="Athletics & PE">Athletics &amp; PE</option>
                            <option value="Fine Arts">Fine Arts</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Campus Phone</label>
                        <input type="text" name="phone" class="adm-input" value="(407) 757-2241">
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Faculty Email *</label>
                    <input type="email" name="email" class="adm-input" placeholder="amiller@midfloridascholarsacademy.com" required>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Photo URL</label>
                    <input type="url" name="photo" class="adm-input" value="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80">
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Professional Biography</label>
                    <textarea name="bio" class="adm-textarea" placeholder="Education, background, credentials, and teaching philosophy..."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addFacultyModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Profile</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
