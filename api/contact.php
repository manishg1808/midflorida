<?php
/**
 * Mid Florida Scholars Academy - Contact Form Submission API
 * Endpoint: POST /api/contact.php
 */

header('X-Content-Type-Options: nosniff');

// Determine if client expects JSON
$isJsonRequest = (
    (!empty($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) ||
    (!empty($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) ||
    (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
);

// Include database connection
require_once __DIR__ . '/../config/db.php';

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if ($isJsonRequest) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code(405);
        echo json_encode([
            'success' => false,
            'message' => 'Method Not Allowed. Please send a POST request.'
        ]);
        exit;
    } else {
        header('Location: ../contact.php');
        exit;
    }
}

// Parse request data (support both JSON payload and standard form data)
$input = [];
$contentType = $_SERVER['CONTENT_TYPE'] ?? '';
if (strpos($contentType, 'application/json') !== false) {
    $rawPayload = file_get_contents('php://input');
    $input = json_decode($rawPayload, true) ?: [];
} else {
    $input = $_POST;
}

// Extract and sanitize fields
$fullName = trim($input['full_name'] ?? '');
$email    = trim($input['email'] ?? '');
$phone    = trim($input['phone'] ?? '');
$subject  = trim($input['subject'] ?? 'General Inquiry');
$message  = trim($input['message'] ?? '');

// Validation
$errors = [];
if (empty($fullName)) {
    $errors[] = 'Full name is required.';
}
if (empty($email)) {
    $errors[] = 'Email address is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}
if (empty($message)) {
    $errors[] = 'Message is required.';
}

if (!empty($errors)) {
    if ($isJsonRequest) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code(422);
        echo json_encode([
            'success' => false,
            'message' => implode(' ', $errors),
            'errors'  => $errors
        ]);
        exit;
    } else {
        session_start();
        $_SESSION['contact_error'] = implode(' ', $errors);
        $_SESSION['contact_old'] = [
            'full_name' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ];
        header('Location: ../contact.php?status=error#mapSection');
        exit;
    }
}

// Save to Database
try {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("
        INSERT INTO `contacts` (`full_name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`)
        VALUES (:full_name, :email, :phone, :subject, :message, 'New', NOW())
    ");

    $stmt->execute([
        ':full_name' => $fullName,
        ':email'     => $email,
        ':phone'     => $phone,
        ':subject'   => $subject ?: 'General Inquiry',
        ':message'   => $message
    ]);

    $insertId = (int)$pdo->lastInsertId();

    if ($isJsonRequest) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => 'Thank you, ' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . '! Your message has been sent successfully. Our admissions office will respond shortly.',
            'lead_id' => $insertId
        ]);
        exit;
    } else {
        session_start();
        $_SESSION['contact_success'] = 'Thank you, ' . htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8') . '! Your message has been sent successfully. Our office will respond shortly.';
        unset($_SESSION['contact_old']);
        header('Location: ../contact.php?status=success#mapSection');
        exit;
    }
} catch (PDOException $e) {
    error_log("Contact API Database Error: " . $e->getMessage());

    $errorMessage = 'A database error occurred while submitting your message. Please verify your database connection.';

    if ($isJsonRequest) {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => $errorMessage,
            'error_detail' => $e->getMessage()
        ]);
        exit;
    } else {
        session_start();
        $_SESSION['contact_error'] = $errorMessage;
        header('Location: ../contact.php?status=error#mapSection');
        exit;
    }
}
