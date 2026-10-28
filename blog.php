<?php
$page_title = "Learning Blog & Resources | Mid Florida Scholars";
$page_description = "Read educational research, math mastery strategies, and parenting insights from expert educators at Mid Florida Scholars.";
$current_page = "blog";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-newspaper"></i> Knowledge Hub
        </div>
        <h1>Learning Resources, Math Insights &amp; Tips</h1>
        <p>
            Actionable strategies from certified educators on overcoming math anxiety, mastering foundational concepts, and excelling in college admissions.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Blog &amp; Resources</strong>
        </div>
    </div>
</section>

<!-- Blog Section (Cuemath Style) -->
<section style="padding: 70px 0 90px; background: var(--bg-gray);">
    <div class="container">
        <!-- Featured Article Card -->
        <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-md); overflow: hidden; display: grid; grid-template-columns: 1.1fr 0.9fr; margin-bottom: 50px;">
            <div style="padding: 44px; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 14px;">
                        <span class="badge-pill badge-yellow">Featured Research</span>
                        <span style="font-size: 0.85rem; color: var(--ink-muted);"><i class="fas fa-clock"></i> 6 min read</span>
                    </div>
                    <h2 style="font-size: 2.2rem; font-weight: 900; line-height: 1.2; margin-bottom: 16px; color: var(--ink);">
                        <a href="blog-single.php">Why 1:1 Visual Learning Outperforms Rote Memorization in Math</a>
                    </h2>
                    <p style="color: var(--ink-muted); font-size: 1.05rem; line-height: 1.65; margin-bottom: 24px;">
                        Does the way math is visualized change how long a concept is retained? Modern cognitive research proves that children who use interactive visual models achieve 3x faster recall than students who memorize formulas by rote.
                    </p>
                </div>
                <div>
                    <a href="blog-single.php" class="btn btn-primary">
                        Read Full Article <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div style="background: #E2E8F0; min-height: 320px;">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=80" alt="Visual Math Research" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>

        <!-- 3-Column Articles Grid -->
        <div class="curriculum-card-grid text-left">
            <!-- Article 1 -->
            <div class="curriculum-card">
                <div style="height: 180px; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 20px;">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Dual Enrollment" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <span class="badge-pill badge-blue" style="margin-bottom: 10px;">College Prep</span>
                <h3 class="curriculum-card-title" style="font-size: 1.25rem;">
                    <a href="blog-single.php">How High Schoolers Earn 30+ College Credits Before Graduation</a>
                </h3>
                <p class="curriculum-card-desc">
                    A practical guide to leveraging Florida dual enrollment with Valencia College and USF to shave a full year off university tuition.
                </p>
                <a href="blog-single.php" style="color: var(--accent-blue); font-weight: 700; font-size: 0.92rem;">Read Guide &rarr;</a>
            </div>

            <!-- Article 2 -->
            <div class="curriculum-card">
                <div style="height: 180px; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 20px;">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=800&q=80" alt="Math Anxiety" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 10px;">Parenting Tips</span>
                <h3 class="curriculum-card-title" style="font-size: 1.25rem;">
                    <a href="blog-single.php">5 Ways to Help Your Child Overcome Math Anxiety at Home</a>
                </h3>
                <p class="curriculum-card-desc">
                    Simple techniques to shift your child's inner dialogue from "I'm not a math person" to "I haven't mastered this concept yet."
                </p>
                <a href="blog-single.php" style="color: var(--accent-blue); font-weight: 700; font-size: 0.92rem;">Read Guide &rarr;</a>
            </div>

            <!-- Article 3 -->
            <div class="curriculum-card">
                <div style="height: 180px; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 20px;">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="SAT Math Strategy" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 10px;">Test Prep</span>
                <h3 class="curriculum-card-title" style="font-size: 1.25rem;">
                    <a href="blog-single.php">Scoring 750+ on the Digital SAT Math: What Top Scorers Do</a>
                </h3>
                <p class="curriculum-card-desc">
                    Exam tactics, Desmos calculator shortcuts, and how to master the adaptive Module 2 with speed and pinpoint accuracy.
                </p>
                <a href="blog-single.php" style="color: var(--accent-blue); font-weight: 700; font-size: 0.92rem;">Read Guide &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
