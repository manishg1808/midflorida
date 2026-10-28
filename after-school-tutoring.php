<?php
$page_title = "1:1 After School & Online Tutoring | Mid Florida Scholars";
$page_description = "One-on-one after school and online tutoring conducted directly by certified top 1% educators at Mid Florida Scholars.";
$current_page = "after-school-tutoring";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-chalkboard-teacher"></i> 1:1 Faculty Mentorship
        </div>
        <h1>Personalized 1:1 After School Tutoring</h1>
        <p>
            Targeted instruction delivered directly by our certified faculty to clear doubts, build conceptual clarity, and boost school exam scores.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Tutoring</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">No Third-Party Tutors</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Instruction by Mentors <span class="text-brand">Who Know Your Child</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Every student encounters concepts that require patient reinforcement &mdash; whether it's fractions, quadratic factoring, or reading comprehension.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Our tutoring is delivered directly by certified educators using interactive visual tools, ensuring seamless alignment with daily homework and upcoming exams.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule a Free 1:1 Trial <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=1000&q=80" alt="1:1 Tutoring Session" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3 Pillars Cards (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-tags"></i> Transparent Structure</span>
        <h2 class="section-title">Schedule, Subjects &amp; <span class="highlight">Options</span></h2>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-calendar-check"></i></div>
                <h3 class="curriculum-card-title">Flexible Schedule</h3>
                <p class="curriculum-card-desc">Held both in-person after dismissal until 4:30 PM and online 7 days a week on our interactive workspace.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> In-person Mon, Tue, Thu</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Online evenings &amp; weekends</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Flexible 2-hour notice rescheduling</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-calculator"></i></div>
                <h3 class="curriculum-card-title">STEM &amp; Core Subjects</h3>
                <p class="curriculum-card-desc">Specialized support across foundational mathematics, algebra, calculus, physics, chemistry, and foreign languages.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Elementary through AP Calculus</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Honors Chemistry &amp; Physics</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> SAT / ACT Math &amp; Reading</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-award"></i></div>
                <h3 class="curriculum-card-title">Guaranteed Progress</h3>
                <p class="curriculum-card-desc">Every session includes immediate parent portal logs and formative assessments so you see weekly gains.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Detailed post-class parent reports</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> School exam alignment</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 100% refund on unused credits</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
