<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page_title = "Contact Us & Academic Support | Mid Florida Scholars";
$page_description = "Contact Mid Florida Scholars Academy. Phone: 407-757-2241, Email: info@midfloridascholarsacademy.com. Campus location in Orlando/Gotha, FL and online consultations.";
$current_page = "contact";

$flash_success = $_SESSION['contact_success'] ?? '';
$flash_error = $_SESSION['contact_error'] ?? '';
$old_input = $_SESSION['contact_old'] ?? [];
unset($_SESSION['contact_success'], $_SESSION['contact_error'], $_SESSION['contact_old']);

include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-headset"></i> We're Here to Help
        </div>
        <h1>Get in Touch with Our Academic Team</h1>
        <p>
            Whether you have questions regarding 1:1 online classes, K–12 admissions, scholarship verification, or campus visits, our team is at your service.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Contact Us</strong>
        </div>
    </div>
</section>

<!-- Contact Cards Strip (Cuemath Style) -->
<section style="padding: 60px 0 30px; background: #FFFFFF;">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;">
            <!-- Card 1: Phone -->
            <div style="background: var(--bg-warm); border: 1px solid rgba(255, 186, 7, 0.4); border-radius: var(--radius-lg); padding: 30px; text-align: center;">
                <div style="width: 56px; height: 56px; background: var(--cuemath-yellow); color: var(--ink); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 16px;">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <div style="font-size: 0.82rem; font-weight: 800; color: #B38100; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Call Us Today</div>
                <div style="font-family: var(--font-heading); font-size: 1.6rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">
                    <a href="tel:4077572241">407-757-2241</a>
                </div>
                <p style="font-size: 0.88rem; color: var(--ink-muted); margin: 0;">Mon–Fri 8:30 AM – 4:00 PM EST</p>
            </div>

            <!-- Card 2: Email -->
            <div style="background: var(--bg-gray); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 30px; text-align: center;">
                <div style="width: 56px; height: 56px; background: var(--accent-blue-light); color: var(--accent-blue); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 16px;">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div style="font-size: 0.82rem; font-weight: 800; color: var(--accent-blue); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Email Inquiries</div>
                <div style="font-size: 1.15rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">
                    <a href="mailto:info@midfloridascholarsacademy.com">info@midfloridascholarsacademy.com</a>
                </div>
                <p style="font-size: 0.88rem; color: var(--ink-muted); margin: 0;">24-hour response guarantee</p>
            </div>

            <!-- Card 3: Location -->
            <div style="background: var(--bg-gray); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 30px; text-align: center;">
                <div style="width: 56px; height: 56px; background: var(--accent-emerald-light); color: var(--accent-emerald); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 1.5rem; margin-bottom: 16px;">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div style="font-size: 0.82rem; font-weight: 800; color: var(--accent-emerald); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Campus Location</div>
                <div style="font-size: 1.1rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">
                    2342 Hempel Avenue
                </div>
                <p style="font-size: 0.88rem; color: var(--ink-muted); margin: 0;">Gotha / Orlando, FL 34734</p>
            </div>
        </div>
    </div>
</section>

<!-- Form & Google Map Grid -->
<section style="padding: 40px 0 80px; background: #FFFFFF;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 40px; align-items: flex-start;">
            <!-- Form Card -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-md); padding: 36px;">
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">Quick Message</span>
                <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 8px;">
                    Send Us a Note
                </h3>
                <p style="color: var(--ink-muted); font-size: 0.95rem; margin-bottom: 24px;">
                    Fill out the form below and an academic advisor will get back to you promptly.
                </p>

                <div id="contactFormAlert">
                    <?php if (!empty($flash_success)): ?>
                        <div style="background: var(--accent-emerald-light); border: 1px solid var(--accent-emerald); color: #008760; padding: 14px; border-radius: var(--radius-sm); margin-bottom: 20px;">
                            <strong>Message Sent!</strong> <?php echo htmlspecialchars($flash_success); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($flash_error)): ?>
                        <div style="background: #FEE2E2; border: 1px solid #EF4444; color: #DC2626; padding: 14px; border-radius: var(--radius-sm); margin-bottom: 20px;">
                            <?php echo htmlspecialchars($flash_error); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <form id="contactForm" method="POST" action="api/contact.php">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="John Smith" required value="<?php echo htmlspecialchars($old_input['full_name'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Email Address *</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required value="<?php echo htmlspecialchars($old_input['email'] ?? ''); ?>">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="(407) 555-0123" value="<?php echo htmlspecialchars($old_input['phone'] ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <select id="subject" name="subject" class="form-control">
                                <option value="General Inquiry">General Inquiry</option>
                                <option value="1:1 Online Classes &amp; Free Trial">1:1 Online Classes &amp; Free Trial</option>
                                <option value="Admissions &amp; Enrollment">Admissions &amp; Enrollment</option>
                                <option value="Scholarship Verification">Scholarship Verification</option>
                                <option value="Transcripts &amp; Records">Transcripts &amp; Records</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Your Message *</label>
                        <textarea id="message" name="message" class="form-control" rows="4" placeholder="How can our team help your family?" required><?php echo htmlspecialchars($old_input['message'] ?? ''); ?></textarea>
                    </div>

                    <button type="submit" id="contactSubmitBtn" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 8px;">
                        <span class="btn-text"><i class="fas fa-paper-plane"></i> Send Message</span>
                        <span class="btn-loading" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Sending...</span>
                    </button>
                </form>
            </div>

            <!-- Google Map Embed Card -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-md); padding: 16px; overflow: hidden;">
                <iframe 
                    src="https://maps.google.com/maps?q=2342+Hempel+Avenue,+Gotha,+FL+34734&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    width="100%" 
                    height="380" 
                    style="border:0; border-radius: var(--radius-md);" 
                    allowfullscreen="" 
                    loading="lazy"
                    title="Campus Map">
                </iframe>
                <div style="padding: 16px 12px 6px; text-align: center;">
                    <strong style="color: var(--ink);">Mid Florida Scholars Academy</strong><br>
                    <span style="font-size: 0.88rem; color: var(--ink-muted);">2342 Hempel Avenue, Gotha / Orlando, FL 34734</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
