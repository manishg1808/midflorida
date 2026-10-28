<?php
/**
 * Mid Florida Scholars Academy - Admin Login Portal
 */
require_once __DIR__ . '/includes/auth.php';

// If already logged in, redirect to dashboard
if (Auth::check()) {
    header("Location: index.php");
    exit;
}

$error = null;
$returnUrl = $_GET['return'] ?? 'index.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        if (Auth::login($username, $password)) {
            $target = !empty($returnUrl) ? urldecode($returnUrl) : 'index.php';
            // Safety check against open redirects
            if (strpos($target, 'http') === 0) {
                $target = 'index.php';
            }
            header("Location: " . $target);
            exit;
        } else {
            $error = "Invalid administrator credentials. Try username: admin, password: admin123";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Sign In | Mid Florida Scholars Academy</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Admin Master Styles -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body style="background: var(--adm-navy);">

<div class="login-screen-wrapper">
    <div class="login-card">
        <div class="login-brand-header">
            <img src="../assets/images/logo.svg" alt="Mid Florida Scholars Crest" class="login-logo">
            <h1 class="login-title">Administrator Portal</h1>
            <p class="login-subtitle">Mid Florida Scholars Academy &bull; Secure Access</p>
        </div>

        <?php if ($error): ?>
            <div style="background: #fee2e2; border-left: 4px solid #ef4444; color: #991b1b; padding: 12px 16px; border-radius: 6px; font-size: 0.85rem; margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
                <i class="fas fa-exclamation-circle"></i>
                <span><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php<?php echo !empty($_GET['return']) ? '?return=' . urlencode($_GET['return']) : ''; ?>">
            <div class="adm-form-group">
                <label class="adm-label" for="loginUsername">Username or Email</label>
                <div style="position: relative;">
                    <i class="fas fa-user" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--adm-text-light);"></i>
                    <input type="text" id="loginUsername" name="username" class="adm-input" style="padding-left: 40px;" placeholder="admin or email" value="<?php echo htmlspecialchars($_POST['username'] ?? 'admin'); ?>" required autofocus>
                </div>
            </div>

            <div class="adm-form-group">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <label class="adm-label" for="loginPassword" style="margin-bottom: 0;">Password</label>
                    <span style="font-size: 0.78rem; color: var(--adm-primary); cursor: pointer;" onclick="const p = document.getElementById('loginPassword'); p.type = p.type === 'password' ? 'text' : 'password';">
                        <i class="fas fa-eye"></i> Show
                    </span>
                </div>
                <div style="position: relative;">
                    <i class="fas fa-lock" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--adm-text-light);"></i>
                    <input type="password" id="loginPassword" name="password" class="adm-input" style="padding-left: 40px;" placeholder="••••••••" value="admin123" required>
                </div>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; font-size: 0.84rem;">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: var(--adm-text-muted);">
                    <input type="checkbox" name="remember" checked style="accent-color: var(--adm-primary);"> Remember on this device
                </label>
                <a href="#" style="color: var(--adm-primary); text-decoration: none; font-size: 0.82rem;" onclick="alert('Please contact the Headmaster Office or IT Admin to reset credentials.'); return false;">Forgot?</a>
            </div>

            <button type="submit" class="btn-adm btn-adm-primary" style="width: 100%; padding: 12px; font-size: 0.95rem; justify-content: center;">
                <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
            </button>
        </form>

        <div class="login-preset-box">
            <div style="font-weight: 600; color: var(--adm-navy); margin-bottom: 4px;">Quick Demo Access:</div>
            <div>Username: <strong style="color: var(--adm-primary);">admin</strong> | Password: <strong style="color: var(--adm-primary);">admin123</strong></div>
            <button type="button" id="fillDemoCredsBtn" class="btn-adm btn-adm-sm btn-adm-outline" style="margin-top: 8px; width: 100%;">
                <i class="fas fa-magic"></i> Auto-fill Demo Credentials
            </button>
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="../index.php" style="color: var(--adm-text-muted); text-decoration: none; font-size: 0.84rem; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fas fa-arrow-left"></i> Return to Public Academy Website
            </a>
        </div>
    </div>
</div>

<script src="assets/js/admin.js"></script>
</body>
</html>
