<?php
$page_title = "Middle School (Grades 6–8) | Mid Florida Scholars";
$page_description = "The Middle School program at Mid Florida Scholars prepares 6th-8th graders with focused mentorship, pre-algebra acceleration, and critical thinking.";
$current_page = "middle-school";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-cubes"></i> Grades 6 through 8
        </div>
        <h1>Middle School: Independence &amp; Rigor</h1>
        <p>
            Bridging early elementary confidence into mature analytical thinking, laboratory sciences, and high school algebra readiness.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Middle School</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-blue" style="margin-bottom: 12px;">The Vital High School Bridge</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Developing Critical Thinkers <span class="text-blue">&amp; Problem Solvers</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Middle school is a time of tremendous intellectual and emotional growth. We provide structured guidance that teaches students how to organize their time, take intellectual initiative, and formulate rigorous arguments.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Qualified middle schoolers can accelerate into high school Algebra 1 and Geometry credits, giving them a decisive advantage heading into 9th grade.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Book Free Grade 6–8 Trial <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=1000&q=80" alt="Middle School students collaborating" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Highlights (Cuemath Style Cards) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-award"></i> Curriculum Highlights</span>
        <h2 class="section-title">Core Pillars of <span class="highlight">Middle School</span></h2>
        <p class="section-subtitle">
            Cultivating rigorous mathematical logic, persuasive writing, and scientific experimentation.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-square-root-alt"></i></div>
                <h3 class="curriculum-card-title">Accelerated Math &amp; Algebra 1</h3>
                <p class="curriculum-card-desc">Mastering pre-algebra, integers, multi-step linear equations, and coordinate plane geometry with visual tools.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> High school credit eligibility in 8th grade</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Graphing linear functions and systems</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> AMC 8 Math Olympiad problem solving</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-pen-nib"></i></div>
                <h3 class="curriculum-card-title">Advanced Literature &amp; Essay Writing</h3>
                <p class="curriculum-card-desc">Close textual analysis, thesis formulation, persuasive essay drafting, and speech debate presentations.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Classic &amp; contemporary literature analysis</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Formal research paper mechanics &amp; MLA citations</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Rhetorical devices &amp; public speaking</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-atom"></i></div>
                <h3 class="curriculum-card-title">Integrated Laboratory Sciences</h3>
                <p class="curriculum-card-desc">Rigorous exploration of earth systems, cellular biology, physical forces, chemistry, and environmental labs.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Full lab reports with hypotheses and data tables</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Newton's laws &amp; energy transformations</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Genetics, cellular mitosis &amp; ecosystems</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
