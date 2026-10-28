<?php
$page_title = "Lower School (Grades K–5) | Mid Florida Scholars";
$page_description = "The Lower School at Mid Florida Scholars offers an accredited K-5 private elementary education in Orlando with intimate teacher ratios and visual conceptual learning.";
$current_page = "lower-school";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-shapes"></i> Kindergarten through Grade 5
        </div>
        <h1>Lower School: Joy in Discovery</h1>
        <p>
            The early elementary years shape how a child views learning for life. We nurture natural curiosity with visual models, phonics literacy, and dedicated mentorship.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Lower School</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">Nurturing Early Curiosity</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Where Young Learners <span class="text-brand">Build Confidence</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    With our intimate teacher ratios and 1:1 supplementary mentoring, our educators know every single child's unique learning rhythm. No young learner gets lost in the back of a crowded room.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Students develop deep number sense, spatial geometry intuition, reading fluency, and hands-on scientific curiosity through visual models and story-based learning.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Book Free K–5 Trial Class <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1000&q=80" alt="Lower School students learning" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Highlights (Cuemath Style Cards) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-book"></i> Elementary Roadmap</span>
        <h2 class="section-title">Core Pillars of <span class="highlight">Lower School</span></h2>
        <p class="section-subtitle">
            Systematic foundational skills designed to transition young learners from concrete understanding to creative problem solving.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-book-reader"></i></div>
                <h3 class="curriculum-card-title">Early Literacy &amp; Phonics</h3>
                <p class="curriculum-card-desc">Multisensory phonics, guided reading, vocabulary acquisition, and creative storytelling that build passionate, independent readers.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Orton-Gillingham inspired phonics</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Vocabulary in rich story contexts</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Creative writing &amp; handwriting</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-calculator"></i></div>
                <h3 class="curriculum-card-title">Conceptual Mathematics</h3>
                <p class="curriculum-card-desc">Cuemath visual math methods: ten-frames, array multiplication, fraction bars, and math games that remove fear and build joy.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Visual problem solving &amp; number lines</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Fact families &amp; mental math strategies</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> 2D/3D geometry &amp; measurements</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-flask"></i></div>
                <h3 class="curriculum-card-title">Inquiry-Based Science</h3>
                <p class="curriculum-card-desc">Hands-on experimentation with plants, weather, simple machines, and basic ecosystem cycles to foster scientific observation.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Scientific method through simple labs</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Life cycles, earth &amp; physical science</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Environmental curiosity &amp; nature study</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
