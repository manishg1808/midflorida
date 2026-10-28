<?php
$page_title = "Sports & Physical Education | Mid Florida Scholars";
$page_description = "Athletic programs, physical education, and competitive student-athlete development at Mid Florida Scholars Academy.";
$current_page = "sports";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-running"></i> Wellness &amp; Athletics
        </div>
        <h1>Sports, Fitness &amp; Student-Athlete Development</h1>
        <p>
            Cultivating physical wellness, resilience, and teamwork as foundational partners to academic excellence.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">Student Life</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Sports &amp; PE</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">Healthy Minds in Strong Bodies</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Daily Movement, Discipline <span class="text-emerald">&amp; Teamwork</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    At Mid Florida Scholars, physical education is not treated as an afterthought. Daily structured movement builds cardiovascular fitness, neuroplasticity, and focus in the classroom.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    From elementary sports fundamentals to supporting nationally ranked junior athletes, our athletic department instills character, sportsmanship, and mental fortitude.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule a Campus Tour <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=1000&q=80" alt="Student Athletics" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3 Athletic Pillars (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-basketball-ball"></i> Athletic Program</span>
        <h2 class="section-title">The Three Pillars of <span class="highlight">Athletics</span></h2>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-heartbeat"></i></div>
                <h3 class="curriculum-card-title">Daily Physical Fitness</h3>
                <p class="curriculum-card-desc">Structured PE classes that develop motor agility, stamina, spatial coordination, and lifelong health habits from Kindergarten up.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Cardiovascular conditioning</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Agility and coordination drills</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-trophy"></i></div>
                <h3 class="curriculum-card-title">Intramural Sports Teams</h3>
                <p class="curriculum-card-desc">Inclusive seasonal sports leagues in basketball, soccer, cross-country, and volleyball emphasizing sportsmanship and effort.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Basketball &amp; Volleyball leagues</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Track, cross-country &amp; soccer</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-medal"></i></div>
                <h3 class="curriculum-card-title">Elite Student-Athlete Support</h3>
                <p class="curriculum-card-desc">Specialized academic flexibility, NCAA eligibility tracking, and tournament travel accommodations for competitive athletes.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> NCAA Division I/II pathway clearing</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Pro tournament travel coordination</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
