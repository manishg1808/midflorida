<?php
$page_title = "Flexible Enrollment & The Professional Program | Mid Florida Scholars";
$page_description = "Flexible schedules and accredited 1:1 learning for competitive athletes, performing artists, and travelers at Mid Florida Scholars Academy.";
$current_page = "flexible-enrollment";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-clock"></i> The Professional Program
        </div>
        <h1>Flexible Schedules for Ambitious Youth</h1>
        <p>
            An accredited college-prep curriculum that adapts seamlessly around competitive athletic training, performing arts rehearsals, and international travel.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Flexible Enrollment</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">Never Compromise Your Passion</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Academics That Adapt to <span class="text-brand">Your Training Schedule</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Traditional rigid school schedules force young athletes and performers into an impossible choice between their passion and an accredited education.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Our Professional Program combines asynchronous coursework with dedicated 1:1 live tutoring, allowing students to train during daylight hours while maintaining NCAA eligibility and college prep standing.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Customize a Flexible Schedule <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1517649763962-0c623266ddc0?auto=format&fit=crop&w=1000&q=80" alt="Athletic training and education" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Who We Serve Cards (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-user-check"></i> Tailored Profiles</span>
        <h2 class="section-title">Built for Students Who <span class="highlight">Excel Beyond</span></h2>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-running"></i></div>
                <h3 class="curriculum-card-title">Competitive Athletes</h3>
                <p class="curriculum-card-desc">Golfers, tennis players, gymnasts, equestrians, and swimmers requiring dedicated daylight training blocks and tournament travel schedules.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> NCAA core-course compliance</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Remote exam proctoring</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-theater-masks"></i></div>
                <h3 class="curriculum-card-title">Performing Artists</h3>
                <p class="curriculum-card-desc">Actors, vocalists, dancers, and musicians balancing casting calls, filming shoots, and multi-week theatre rehearsals.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Flexible class recording access</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 1:1 mentor check-ins from set</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-globe-americas"></i></div>
                <h3 class="curriculum-card-title">Frequent Travelers</h3>
                <p class="curriculum-card-desc">Families who relocate between international residences or travel extensively for business while requiring continuous accredited schooling.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Worldwide timezone adaptation</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Cloud-based interactive platform</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
