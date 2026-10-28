<?php
$page_title = "Alumni Transcript Request | Mid Florida Scholars";
$page_description = "Request official high school transcripts and student records from Mid Florida Scholars Academy for colleges, NCAA, or employers.";
$current_page = "alumni-transcript-request";

$req_submitted = false;
$transcript_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = trim($_POST['student_name'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $grad_year = trim($_POST['grad_year'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $destination = trim($_POST['destination'] ?? '');

    if (!empty($student_name) && !empty($dob) && !empty($email) && !empty($destination)) {
        if (file_exists(__DIR__ . '/admin/includes/db.php')) {
            require_once __DIR__ . '/admin/includes/db.php';
            JsonDb::insert('transcripts', [
                'alumni_name' => $student_name,
                'grad_year' => $grad_year ?: date('Y'),
                'dob' => $dob,
                'email' => $email,
                'phone' => $_POST['phone'] ?? '',
                'recipient_institution' => $destination,
                'delivery_type' => $_POST['delivery_type'] ?? 'Official Electronic PDF (Encrypted)',
                'status' => 'Processing',
                'tracking_notes' => 'Received via online transcript request portal'
            ]);
        }
        $req_submitted = true;
    } else {
        $transcript_err = "Please fill out all required fields to submit your request.";
    }
}

include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-file-invoice"></i> Student Records Office
        </div>
        <h1>Official Alumni Transcript Request</h1>
        <p>
            Request official, encrypted digital or certified paper transcripts for universities, NCAA, scholarship committees, and employers.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="alumni-success.php">Alumni</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Transcript Request</strong>
        </div>
    </div>
</section>

<!-- Form Section (Cuemath Style) -->
<section style="padding: 70px 0 90px; background: var(--bg-gray);">
    <div class="container" style="max-width: 820px;">
        <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-md); overflow: hidden;">
            <div style="background: var(--cuemath-yellow); padding: 24px 30px;">
                <h3 style="font-size: 1.5rem; font-weight: 900; color: var(--ink); margin-bottom: 4px;">Transcript Request Form</h3>
                <p style="font-size: 0.9rem; color: var(--ink-secondary); margin: 0; font-weight: 600;">Processed within 3 to 5 business days</p>
            </div>

            <div style="padding: 36px;">
                <?php if ($req_submitted): ?>
                    <div style="background: var(--accent-emerald-light); border: 1px solid var(--accent-emerald); color: #008760; padding: 24px; border-radius: var(--radius-md); text-align: center; margin-bottom: 24px;">
                        <i class="fas fa-check-circle" style="font-size: 2.2rem; margin-bottom: 12px;"></i>
                        <h4 style="font-weight: 800; font-size: 1.3rem; margin-bottom: 6px;">Request Submitted Successfully!</h4>
                        <p style="margin: 0; font-size: 0.95rem;">Thank you, <?php echo htmlspecialchars($student_name); ?>. Your transcript order is now processing and will be sent to <?php echo htmlspecialchars($destination); ?>.</p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($transcript_err)): ?>
                    <div style="background: #FEE2E2; border: 1px solid #EF4444; color: #DC2626; padding: 14px; border-radius: var(--radius-sm); margin-bottom: 20px;">
                        <?php echo htmlspecialchars($transcript_err); ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="alumni-transcript-request.php">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label>Alumni / Student Full Name *</label>
                            <input type="text" name="student_name" class="form-control" required placeholder="Name while attending school">
                        </div>
                        <div class="form-group">
                            <label>Date of Birth *</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label>Graduation Year (or last year attended) *</label>
                            <input type="text" name="grad_year" class="form-control" placeholder="e.g. 2024" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Phone Number</label>
                            <input type="tel" name="phone" class="form-control" placeholder="(407) 555-0123">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Your Contact Email Address *</label>
                        <input type="email" name="email" class="form-control" required placeholder="name@example.com">
                    </div>

                    <div class="form-group">
                        <label>Recipient Institution / University Admissions Office *</label>
                        <input type="text" name="destination" class="form-control" required placeholder="e.g. University of Florida Admissions, NCAA Clearinghouse, etc.">
                    </div>

                    <div class="form-group">
                        <label>Delivery Format</label>
                        <select name="delivery_type" class="form-control">
                            <option>Official Encrypted Electronic PDF (Direct to University)</option>
                            <option>Certified Sealed Hard Copy (Mailed via USPS)</option>
                            <option>Unofficial Student Copy (Sent to Applicant Email)</option>
                        </select>
                    </div>

                    <div style="background: var(--bg-gray); padding: 14px; border-radius: var(--radius-sm); font-size: 0.85rem; color: var(--ink-muted); margin-bottom: 20px;">
                        <i class="fas fa-info-circle text-blue"></i> Official transcripts are released for accounts in good financial standing.
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                        Submit Transcript Order <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
