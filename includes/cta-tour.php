<?php
/**
 * Mid Florida Scholars Academy - Master CTA Section (Genuine & Normal)
 */
if (!isset($cta_eyebrow)) {
    $cta_eyebrow = "Admissions & Campus Visits Open • Grades K–12";
}
if (!isset($cta_title)) {
    $cta_title = "Ready to Experience <span class='highlight'>Mid Florida Scholars Academy</span>?";
}
if (!isset($cta_desc)) {
    $cta_desc = "Join an accredited learning community where every student is known, challenged, and supported. Schedule a campus tour, explore our curriculum, or speak directly with our admissions team.";
}
if (!isset($cta_primary_text)) {
    $cta_primary_text = $cta_button_text ?? "Schedule a Campus Tour";
}
if (!isset($cta_primary_url)) {
    $cta_primary_url = $cta_button_url ?? "schedule-tour.php";
}
if (!isset($cta_secondary_text)) {
    $cta_secondary_text = "Contact Admissions";
}
if (!isset($cta_secondary_url)) {
    $cta_secondary_url = "contact.php";
}
?>

<div class="container">
    <section class="bottom-cta-banner genuine-cta-section">
        <div class="cta-banner-mesh"></div>
        
        <div class="genuine-cta-inner">
            <!-- Academy Badge & Headline -->
            <div class="genuine-cta-header text-center">
                <div class="genuine-cta-tag">
                    <i class="fas fa-university"></i>
                    <span><?php echo htmlspecialchars($cta_eyebrow); ?></span>
                </div>
                
                <h2 class="genuine-cta-title"><?php echo $cta_title; ?></h2>
                <p class="genuine-cta-desc"><?php echo $cta_desc; ?></p>
            </div>

            <!-- Trust / Accreditation Strip -->
            <div class="genuine-trust-strip">
                <div class="genuine-trust-item">
                    <i class="fas fa-certificate"></i>
                    <span>Cognia &amp; SACS Accredited</span>
                </div>
                <div class="genuine-trust-item">
                    <i class="fas fa-hand-holding-usd"></i>
                    <span>Step Up For Students Provider</span>
                </div>
                <div class="genuine-trust-item">
                    <i class="fas fa-user-graduate"></i>
                    <span>Private K–12 College Prep</span>
                </div>
                <div class="genuine-trust-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>1:1 Dedicated Mentorship</span>
                </div>
            </div>

            <!-- Action Buttons: Normal & Genuine -->
            <div class="genuine-actions-row">
                <a href="<?php echo htmlspecialchars($cta_primary_url); ?>" class="btn-genuine-primary">
                    <i class="fas fa-calendar-check"></i>
                    <span><?php echo htmlspecialchars($cta_primary_text); ?></span>
                </a>

                <a href="<?php echo htmlspecialchars($cta_secondary_url); ?>" class="btn-genuine-secondary">
                    <i class="fas fa-envelope-open-text"></i>
                    <span><?php echo htmlspecialchars($cta_secondary_text); ?></span>
                </a>

                <a href="tel:4077572241" class="btn-genuine-phone">
                    <i class="fas fa-phone-alt"></i>
                    <span>(407) 757-2241</span>
                </a>
            </div>

            <!-- Genuine Academy Contact Footer Bar -->
            <div class="genuine-contact-bar">
                <div class="contact-bar-item">
                    <i class="fas fa-map-marker-alt" style="color: #FFBA07;"></i>
                    <span><strong>Campus:</strong> 2342 Hempel Avenue, Gotha, FL 34734 (Orlando Metro)</span>
                </div>
                <div class="contact-bar-divider"></div>
                <div class="contact-bar-item">
                    <i class="fas fa-envelope" style="color: #FFBA07;"></i>
                    <span><strong>Admissions:</strong> <a href="mailto:admissions@midfloridascholarsacademy.com">admissions@midfloridascholarsacademy.com</a></span>
                </div>
                <div class="contact-bar-divider"></div>
                <div class="contact-bar-item">
                    <i class="fas fa-clock" style="color: #FFBA07;"></i>
                    <span><strong>Office Hours:</strong> Mon – Fri, 8:00 AM – 4:30 PM</span>
                </div>
            </div>
        </div>
    </section>
</div>
