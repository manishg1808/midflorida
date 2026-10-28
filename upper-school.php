<?php
$page_title = "Upper School (Grades 9–12) | Mid Florida Scholars";
$page_description = "The Upper School at Mid Florida Scholars offers an elite college preparatory high school curriculum with AP courses, dual enrollment, and 100% college acceptance.";
$current_page = "upper-school";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-university"></i> Grades 9 through 12
        </div>
        <h1>Upper School: Elite College Prep</h1>
        <p>
            Where academic ambition meets dedicated 1:1 mentorship. Advanced Placement (AP), dual enrollment college credits, and personalized university admissions guidance.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Upper School</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">100% College Acceptance</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Equipped to Excel at <span class="text-emerald">Top Universities</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Mid Florida Scholars Upper School is where our college preparatory philosophy reaches its pinnacle. In an engaging, seminar-style environment, students dive into honors coursework, pursue college credits, and prepare for top-tier university admissions.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Our graduates do not simply gain admission to universities; they arrive equipped with the critical thinking, writing prowess, and self-discipline to excel from day one.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule High School Academic Consultation <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80" alt="Upper School students collaborating on campus" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Highlights (Cuemath Style Cards) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-graduation-cap"></i> Academic Architecture</span>
        <h2 class="section-title">The Four Pillars of <span class="highlight">Upper School</span></h2>
        <p class="section-subtitle">
            A comprehensive collegiate framework designed for academic distinction and scholarship outcomes.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-award"></i></div>
                <h3 class="curriculum-card-title">Honors in Every Discipline</h3>
                <p class="curriculum-card-desc">Honors-level coursework is standard across English, Mathematics, Laboratory Sciences, and Social Studies, training students to evaluate primary evidence.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Advanced Algebra II, Pre-Calculus &amp; Geometry</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Honors Chemistry, Biology &amp; Physics</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Socratic seminars &amp; research papers</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-university"></i></div>
                <h3 class="curriculum-card-title">Dual Enrollment &amp; AP</h3>
                <p class="curriculum-card-desc">Earn real, transferable university college credits before high school graduation through Valencia College, USF, and College Board AP courses.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> College Board Advanced Placement (AP)</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Fully funded college courses via Florida dual enrollment</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Graduate high school with an Associate's Degree path</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-bullseye"></i></div>
                <h3 class="curriculum-card-title">SAT / ACT 1:1 Prep</h3>
                <p class="curriculum-card-desc">Integrated standardized test coaching led by top 1% certified exam mentors, focusing on time management and high-yield math shortcuts.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Target score of 1450+ SAT / 32+ ACT</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Diagnostic section reviews and error analysis</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Direct qualification for Bright Futures Scholarships</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
