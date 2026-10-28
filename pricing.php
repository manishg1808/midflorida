<?php
$page_title = "Pricing & Plans | Mid Florida Scholars";
$page_description = "Simple, transparent, and flexible 1:1 online tutoring plans. 100% money-back guarantee for unused classes with top 1% certified faculty.";
$current_page = "pricing";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-tags"></i> Transparent Investment
        </div>
        <h1>Simple, Flexible &amp; Fair Pricing</h1>
        <p>
            Choose a plan that fits your child's schedule and learning goals. No hidden fees, no long-term lock-in, and 100% refund on unused classes.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Pricing &amp; Plans</strong>
        </div>
    </div>
</section>

<!-- Pricing Cards Section (Cuemath Style) -->
<section class="pricing-section">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-calendar-alt"></i> 1:1 Live Online Packages</span>
        <h2 class="section-title">Select Your Child's <span class="highlight">Learning Pace</span></h2>
        <p class="section-subtitle">
            Every plan includes dedicated 1-on-1 live sessions with a certified top 1% mentor, proprietary interactive workspace, and real-time parent progress reports.
        </p>

        <div class="pricing-cards-grid text-left">
            <!-- Tier 1: Starter -->
            <div class="pricing-card">
                <h3 class="plan-tier-name">Starter Foundation</h3>
                <p class="plan-tier-desc">Ideal for steady weekly support, clearing doubts, and staying ahead of school syllabus.</p>
                
                <div class="plan-price-box">
                    <div class="plan-price-amount">$28 <span style="font-size: 1.1rem; color: var(--ink-muted); font-weight: 600;">/ class</span></div>
                    <div class="plan-price-cycle">2 classes / week • 8 classes / month</div>
                </div>

                <div class="plan-features-list">
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> 1:1 Live 55-Min Video Classes</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Dedicated Top 1% Certified Tutor</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> School Homework &amp; Quiz Help</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Interactive Digital Workspace</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Real-time Parent App Access</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Flexible Rescheduling Policy</div>
                </div>

                <button type="button" class="btn btn-outline open-trial-modal" style="width: 100%;">
                    Book Free Trial First
                </button>
            </div>

            <!-- Tier 2: Accelerated (Featured) -->
            <div class="pricing-card featured">
                <span class="pricing-popular-badge"><i class="fas fa-fire"></i> Most Popular</span>
                <h3 class="plan-tier-name">Accelerated Mastery</h3>
                <p class="plan-tier-desc">The proven formula to fast-track math confidence, boost letter grades, and close foundational gaps.</p>
                
                <div class="plan-price-box">
                    <div class="plan-price-amount" style="color: #000;">$24 <span style="font-size: 1.1rem; color: var(--ink-muted); font-weight: 600;">/ class</span></div>
                    <div class="plan-price-cycle">3 classes / week • 12 classes / month (Save 15%)</div>
                </div>

                <div class="plan-features-list">
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Everything in Starter Foundation</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Customized Diagnostic Learning Roadmap</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Weekly Formative Assessment Reports</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Priority Mentor Matching &amp; Continuity</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Full Access to 5,000+ Practice Worksheets</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> 100% Unused Class Refund Guarantee</div>
                </div>

                <button type="button" class="btn btn-primary open-trial-modal" style="width: 100%;">
                    Start Accelerated Plan
                </button>
            </div>

            <!-- Tier 3: Intensive / College Prep -->
            <div class="pricing-card">
                <h3 class="plan-tier-name">Intensive &amp; Exam Prep</h3>
                <p class="plan-tier-desc">Designed for AP Calculus, SAT/ACT Math, Math Olympiad, and urgent board exam turnarounds.</p>
                
                <div class="plan-price-box">
                    <div class="plan-price-amount">$21 <span style="font-size: 1.1rem; color: var(--ink-muted); font-weight: 600;">/ class</span></div>
                    <div class="plan-price-cycle">4 classes / week • 16 classes / month (Save 25%)</div>
                </div>

                <div class="plan-features-list">
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Everything in Accelerated Mastery</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Senior Ivy League &amp; PhD Mentor Roster</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Full-length SAT / AP Mock Exams</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> 1-on-1 Error Log Review &amp; Strategy</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Direct WhatsApp Tutor Line for Doubt Clearance</div>
                    <div class="plan-feature-row"><i class="fas fa-check-circle"></i> Guaranteed Score Improvement Warranty</div>
                </div>

                <button type="button" class="btn btn-outline open-trial-modal" style="width: 100%;">
                    Enroll in Exam Prep
                </button>
            </div>
        </div>

        <!-- 100% Money-Back Guarantee Banner (Cuemath Style) -->
        <div class="money-back-banner text-left">
            <div class="seal-icon">
                <i class="fas fa-shield-check"></i>
            </div>
            <div>
                <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--ink); margin-bottom: 4px;">
                    100% No-Questions-Asked Money-Back Guarantee
                </h4>
                <p style="font-size: 0.95rem; color: var(--ink-muted); margin: 0;">
                    We are confident your child will thrive with our tutors. If for any reason you choose to pause or stop, we will promptly refund 100% of your unused class credits with zero cancellation fees.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing FAQ Section -->
<section class="faq-section" style="background: #FFFFFF;">
    <div class="container text-center">
        <span class="section-tag blue"><i class="fas fa-question-circle"></i> Pricing Details</span>
        <h2 class="section-title">Pricing Frequently Asked <span class="highlight">Questions</span></h2>
        
        <div class="faq-container text-left">
            <div class="faq-item active">
                <button type="button" class="faq-question">
                    <span>Are there any registration or software fees?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    No. The price per class is completely all-inclusive. You will never be charged for registration, diagnostic assessments, learning software, or parent portal access.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Can I change my class schedule or pause the subscription?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Yes. We recognize student schedules fluctuate around holidays and school sports. You can pause your plan or adjust class days and times at any point with zero penalty.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>What payment methods do you accept?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    We accept all major credit/debit cards (Visa, MasterCard, American Express, Discover), PayPal, UPI / Net Banking, and Florida Step Up For Students / Family Empowerment Scholarships.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
