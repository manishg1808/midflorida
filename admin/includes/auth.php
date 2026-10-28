<?php
/**
 * Mid Florida Scholars Academy - Admin Authentication & Session Guard
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';
JsonDb::seedAll();

class Auth {
    public static function check() {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    public static function requireLogin() {
        if (!self::check()) {
            $redirect = urlencode($_SERVER['REQUEST_URI']);
            header("Location: login.php?return=" . $redirect);
            exit;
        }
    }

    public static function user() {
        if (!self::check()) {
            return null;
        }
        return [
            'username' => $_SESSION['admin_user'] ?? 'Administrator',
            'name' => $_SESSION['admin_name'] ?? 'School Admin',
            'email' => $_SESSION['admin_email'] ?? 'admin@midfloridascholarsacademy.com',
            'role' => 'Principal / Administrator',
            'avatar' => 'assets/images/admin-avatar.svg'
        ];
    }

    public static function login($username, $password) {
        $settings = JsonDb::getSettings();
        
        $adminUser = $settings['admin_username'] ?? 'admin';
        $adminHash = $settings['admin_password_hash'] ?? null;
        $adminEmail = $settings['admin_email'] ?? 'admin@midfloridascholarsacademy.com';

        $isValid = false;

        // Check against settings hash or fallback to default admin123
        if ($username === $adminUser || strtolower($username) === strtolower($adminEmail)) {
            if ($adminHash && password_verify($password, $adminHash)) {
                $isValid = true;
            } elseif ($password === 'admin123') {
                $isValid = true;
            }
        }

        if ($isValid) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_user'] = $adminUser;
            $_SESSION['admin_name'] = 'Headmaster Admin';
            $_SESSION['admin_email'] = $adminEmail;
            $_SESSION['admin_login_time'] = time();
            return true;
        }

        return false;
    }

    public static function logout() {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public static function csrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function verifyCsrf($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], (string)$token);
    }

    public static function setFlash($type, $message) {
        $_SESSION['flash_msg'] = [
            'type' => $type, // 'success', 'danger', 'warning', 'info'
            'message' => $message
        ];
    }

    public static function getFlash() {
        if (isset($_SESSION['flash_msg'])) {
            $flash = $_SESSION['flash_msg'];
            unset($_SESSION['flash_msg']);
            return $flash;
        }
        return null;
    }
}
