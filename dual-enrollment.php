<?php
$page_title = "Dual Enrollment College Credits | Mid Florida Scholars";
$page_description = "Earn transferable college credits starting as early as middle school with Valencia College and USF at Mid Florida Scholars Academy.";
$current_page = "dual-enrollment";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-university"></i> Collegiate Acceleration
        </div>
        <h1>Dual Enrollment: Graduate with College Credits</h1>
        <p>
            Earn both high school diploma requirements and transferable college university credits with zero additional tuition fees.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Dual Enrollment</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">Partnerships with Valencia &amp; USF</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    A Proven Head Start on <span class="text-emerald">University Success</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    At Mid Florida Scholars, our ambitious students don't wait until college to take real university courses. Qualified students can begin earning college credits as early as middle school.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Many of our graduates complete 30 to 60 college credit hours, entering university as sophomores or juniors and saving their families upwards of $20,000 to $40,000 in tuition.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule Dual Enrollment Consultation <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=1000&q=80" alt="Students walking on college campus" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Cards (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-trophy"></i> Key Advantages</span>
        <h2 class="section-title">Why Choose Dual <span class="highlight">Enrollment?</span></h2>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-piggy-bank"></i></div>
                <h3 class="curriculum-card-title">Enormous Tuition Savings</h3>
                <p class="curriculum-card-desc">Credits earned through Florida state dual enrollment programs are funded with state educational allocations, saving thousands in undergraduate tuition and textbooks.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 100% free college tuition credits</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Free college textbooks provided</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-chart-line"></i></div>
                <h3 class="curriculum-card-title">Weighted GPA Boost</h3>
                <p class="curriculum-card-desc">Collegiate courses carry a 5.0 weighted GPA scale, significantly boosting class rank and Bright Futures Scholarship qualification.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 5.0 Weighted GPA credit</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> High school &amp; college credit simultaneously</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-graduation-cap"></i></div>
                <h3 class="curriculum-card-title">Direct University Transfer</h3>
                <p class="curriculum-card-desc">Credits transfer automatically across all Florida state universities (UF, FSU, UCF, USF) and most private &amp; out-of-state institutions.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Guaranteed 2+2 transfer pathway</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Enter college with advanced standing</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
