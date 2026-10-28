<?php
$page_title = "Clubs & Extracurricular Activities | Mid Florida Scholars";
$page_description = "Explore extracurricular clubs, STEM & robotics, National Honor Society, and leadership activities at Mid Florida Scholars Academy.";
$current_page = "clubs-activities";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-users"></i> Student Life &amp; Leadership
        </div>
        <h1>Clubs, Robotics &amp; Extracurricular Activities</h1>
        <p>
            Cultivating creativity, collaboration, and community leadership through vibrant student-driven clubs and competitive academic teams.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">Student Life</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Clubs &amp; Activities</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">Beyond the Classroom</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Pursuing Passions with <span class="text-brand">Purpose &amp; Joy</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    A truly transformative education extends well beyond textbooks. Our clubs and extracurricular activities give students authentic opportunities to lead, build team solutions, and serve their community.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Whether programming autonomous robots in STEM club or organizing charity drives in National Honor Society, students learn self-advocacy and social responsibility.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule a Campus Visit <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1000&q=80" alt="Students in club activities" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Active Clubs Grid (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-star"></i> Student Organizations</span>
        <h2 class="section-title">Active Chapters &amp; <span class="highlight">Creative Teams</span></h2>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-robot"></i></div>
                <h3 class="curriculum-card-title">STEM &amp; Robotics Club</h3>
                <p class="curriculum-card-desc">Hands-on coding in Python, mechanical building with robotics kits, and participating in regional STEM challenge tournaments.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Python &amp; Scratch coding</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 3D printing &amp; prototyping</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-award"></i></div>
                <h3 class="curriculum-card-title">National Honor Society (NHS)</h3>
                <p class="curriculum-card-desc">Recognizing students demonstrating excellence in scholarship, leadership, and community service across Orange County.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 100+ hours of annual community service</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Peer tutoring initiatives</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-paint-brush"></i></div>
                <h3 class="curriculum-card-title">Visual Arts &amp; Digital Media</h3>
                <p class="curriculum-card-desc">Exploring studio painting, digital illustration, photography, and curating the annual student fine art showcase.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Annual campus art gallery</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Graphic design &amp; yearbook publishing</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
