<?php
$page_title = "Scholarship Resources & Step Up For Students | Mid Florida Scholars";
$page_description = "Learn how to use Florida Step Up For Students scholarships (FES-EO, FTC, FES-UA) toward tuition at Mid Florida Scholars Academy.";
$current_page = "scholarships";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-hand-holding-usd"></i> Florida School Choice
        </div>
        <h1>Florida Scholarships &amp; Financial Aid</h1>
        <p>
            Every Florida K–12 student is now eligible for state scholarship assistance regardless of household income. Learn how to apply scholarships to attend Mid Florida Scholars.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="tuition-fees.php">Tuition &amp; Fees</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Scholarships</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">$7,500 – $8,500+ Annual Award</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Private K–12 Education <span class="text-emerald">Within Reach</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Thanks to historic Florida school choice legislation, every Florida family can receive approximately <strong>$7,500 to $8,500+ per student</strong> each year to attend an accredited private school.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Mid Florida Scholars Academy is an approved direct provider for Step Up For Students. Our admissions team handles the paperwork directly to ensure your scholarship credits apply seamlessly.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Get Scholarship Application Guidance <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=1000&q=80" alt="Students benefiting from scholarships" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scholarships Accepted Cards (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-award"></i> Approved Programs</span>
        <h2 class="section-title">Accepted <span class="highlight">Scholarship Programs</span></h2>
        <p class="section-subtitle">
            Explore the state-funded vouchers and programs accepted directly at Mid Florida Scholars.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-certificate"></i></div>
                <h3 class="curriculum-card-title">FES-EO &amp; FTC (Educational Options)</h3>
                <p class="curriculum-card-desc">Universal school choice scholarship for all Florida students entering Kindergarten through 12th grade. Covers the majority of annual tuition fees.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Universal eligibility (No income caps)</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Approx. $7,800 to $8,400 per year</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Direct pay to Mid Florida Scholars</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-heart"></i></div>
                <h3 class="curriculum-card-title">FES-UA (Unique Abilities)</h3>
                <p class="curriculum-card-desc">For students with diagnosed learning differences, ADHD, speech, or specialized medical needs. Offers higher funding allowances for individualized instruction.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Funding up to $9,000 – $10,000+</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Personalized 1:1 learning accommodations</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Educational therapy &amp; curriculum materials</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-shield-alt"></i></div>
                <h3 class="curriculum-card-title">Hope &amp; PEP Scholarships</h3>
                <p class="curriculum-card-desc">Hope Scholarship for students transferring due to school safety or bullying, and Personalized Education Program (PEP) for flexible hybrid learners.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Immediate mid-year transfer approval</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Flexible scheduling &amp; online class support</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Step Up For Students portal integration</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
