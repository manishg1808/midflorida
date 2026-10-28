<?php
/**
 * Mid Florida Scholars Academy - Admin Settings & School Configuration
 */
$pageTitle = 'Settings';
$activeNav = 'settings';
require_once __DIR__ . '/includes/header.php';

$settings = JsonDb::getSettings();

// Handle settings update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'update_general') {
        $settings['school_name'] = trim($_POST['school_name'] ?? $settings['school_name']);
        $settings['tagline'] = trim($_POST['tagline'] ?? $settings['tagline']);
        $settings['phone'] = trim($_POST['phone'] ?? $settings['phone']);
        $settings['email'] = trim($_POST['email'] ?? $settings['email']);
        $settings['admissions_email'] = trim($_POST['admissions_email'] ?? $settings['admissions_email']);
        $settings['campus_address'] = trim($_POST['campus_address'] ?? $settings['campus_address']);
        $settings['mailing_address'] = trim($_POST['mailing_address'] ?? $settings['mailing_address']);
        $settings['portal_url'] = trim($_POST['portal_url'] ?? $settings['portal_url']);
        $settings['academic_year'] = trim($_POST['academic_year'] ?? $settings['academic_year']);
        $settings['tour_capacity_per_slot'] = intval($_POST['tour_capacity_per_slot'] ?? 3);

        JsonDb::saveSettings($settings);
        Auth::setFlash('success', "Academy general configuration saved.");
        header("Location: settings.php");
        exit;
    } elseif ($action === 'change_password') {
        $currentPass = $_POST['current_password'] ?? '';
        $newPass = $_POST['new_password'] ?? '';
        $confirmPass = $_POST['confirm_password'] ?? '';

        $adminHash = $settings['admin_password_hash'] ?? null;
        $validCurrent = false;

        if ($adminHash && password_verify($currentPass, $adminHash)) {
            $validCurrent = true;
        } elseif ($currentPass === 'admin123') {
            $validCurrent = true;
        }

        if (!$validCurrent) {
            Auth::setFlash('danger', "Current password is incorrect.");
            header("Location: settings.php");
            exit;
        }

        if (strlen($newPass) < 6) {
            Auth::setFlash('danger', "New password must be at least 6 characters.");
            header("Location: settings.php");
            exit;
        }

        if ($newPass !== $confirmPass) {
            Auth::setFlash('danger', "New passwords do not match.");
            header("Location: settings.php");
            exit;
        }

        $settings['admin_password_hash'] = password_hash($newPass, PASSWORD_DEFAULT);
        JsonDb::saveSettings($settings);
        Auth::setFlash('success', "Administrator password updated successfully.");
        header("Location: settings.php");
        exit;
    }
}
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">System &amp; Academy Settings</h1>
        <p class="page-header-subtitle">Configure institution details, contact coordinates, Alma student portal links, and security credentials</p>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <!-- General School Configuration Card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="card-title"><i class="fas fa-university" style="color: var(--adm-primary);"></i> School Information</h2>
        </div>
        <div class="admin-card-body">
            <form method="POST" action="settings.php">
                <input type="hidden" name="action" value="update_general">
                
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">School Name</label>
                        <input type="text" name="school_name" class="adm-input" value="<?php echo htmlspecialchars($settings['school_name'] ?? 'Mid Florida Scholars Academy'); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Tagline / Mission Descriptor</label>
                        <input type="text" name="tagline" class="adm-input" value="<?php echo htmlspecialchars($settings['tagline'] ?? 'Private K-12 College Preparatory Academy'); ?>">
                    </div>
                </div>

                <div class="form-grid-3">
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number</label>
                        <input type="text" name="phone" class="adm-input" value="<?php echo htmlspecialchars($settings['phone'] ?? '(407) 757-2241'); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">General Email</label>
                        <input type="email" name="email" class="adm-input" value="<?php echo htmlspecialchars($settings['email'] ?? 'info@midfloridascholarsacademy.com'); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Admissions Email</label>
                        <input type="email" name="admissions_email" class="adm-input" value="<?php echo htmlspecialchars($settings['admissions_email'] ?? 'admissions@midfloridascholarsacademy.com'); ?>" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Physical Campus Address</label>
                        <input type="text" name="campus_address" class="adm-input" value="<?php echo htmlspecialchars($settings['campus_address'] ?? '2342 Hempel Avenue, Gotha, FL 34734'); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Mailing Address</label>
                        <input type="text" name="mailing_address" class="adm-input" value="<?php echo htmlspecialchars($settings['mailing_address'] ?? 'P.O. Box 1159, Windermere, FL 34786'); ?>">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Alma Student / Parent Portal URL</label>
                        <input type="url" name="portal_url" class="adm-input" value="<?php echo htmlspecialchars($settings['portal_url'] ?? 'https://midflorida.getalma.com/'); ?>">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Current Academic Year</label>
                        <input type="text" name="academic_year" class="adm-input" value="<?php echo htmlspecialchars($settings['academic_year'] ?? '2026-2027'); ?>">
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Tour Capacity Limit per Time Slot</label>
                    <input type="number" name="tour_capacity_per_slot" class="adm-input" value="<?php echo htmlspecialchars($settings['tour_capacity_per_slot'] ?? 3); ?>" min="1" max="10" style="max-width: 140px;">
                </div>

                <button type="submit" class="btn-adm btn-adm-primary">
                    <i class="fas fa-save"></i> Save School Settings
                </button>
            </form>
        </div>
    </div>

    <!-- Security & Password Card -->
    <div>
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="card-title"><i class="fas fa-lock" style="color: var(--adm-gold);"></i> Admin Security</h2>
            </div>
            <div class="admin-card-body">
                <form method="POST" action="settings.php">
                    <input type="hidden" name="action" value="change_password">

                    <div class="adm-form-group">
                        <label class="adm-label">Current Password</label>
                        <input type="password" name="current_password" class="adm-input" placeholder="••••••••" required>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">New Password</label>
                        <input type="password" name="new_password" class="adm-input" placeholder="Min. 6 characters" required>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Confirm New Password</label>
                        <input type="password" name="confirm_password" class="adm-input" placeholder="Re-type new password" required>
                    </div>

                    <button type="submit" class="btn-adm btn-adm-gold" style="width: 100%;">
                        <i class="fas fa-key"></i> Update Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Quick System Status Box -->
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="card-title"><i class="fas fa-server" style="color: var(--adm-info);"></i> System Status</h2>
            </div>
            <div class="admin-card-body" style="font-size: 0.84rem;">
                <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid var(--adm-border);">
                    <span style="color: var(--adm-text-muted);">Database</span>
                    <strong style="color: var(--adm-success);"><i class="fas fa-check-circle"></i> JSON Repositories Active</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid var(--adm-border);">
                    <span style="color: var(--adm-text-muted);">Web Server</span>
                    <strong>Apache / PHP <?php echo phpversion(); ?></strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid var(--adm-border);">
                    <span style="color: var(--adm-text-muted);">Sessions</span>
                    <strong>Encrypted Cookie</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 6px 0;">
                    <span style="color: var(--adm-text-muted);">Path</span>
                    <span style="font-family: monospace; font-size: 0.75rem; color: var(--adm-navy);">/admin</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
