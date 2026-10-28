<?php
$page_title = "Parent Testimonials & Student Reviews | Mid Florida Scholars";
$page_description = "Authentic video testimonials and reviews from parents, students, and graduates of Mid Florida Scholars Academy in Orlando, FL.";
$current_page = "testimonials";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-quote-left"></i> Verified Community Voices
        </div>
        <h1>Parent Testimonials &amp; Student Stories</h1>
        <p>
            From anxious learners discovering their passion to high schoolers earning full college scholarships, hear directly from the families whose lives were transformed.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">Our School</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Testimonials</strong>
        </div>
    </div>
</section>

<!-- Video Spotlight Section (Cuemath Style) -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-video"></i> Video Reviews</span>
        <h2 class="section-title">In Their <span class="highlight">Own Words</span></h2>
        <p class="section-subtitle">
            Watch parents and students describe how personalized 1:1 learning unlocked true academic potential.
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 48px; text-align: left;">
            <!-- Video 1 -->
            <div style="background: var(--bg-gray); border-radius: var(--radius-xl); border: 1px solid var(--border); overflow: hidden; box-shadow: var(--shadow-sm);">
                <div style="position: relative; height: 260px; background: #000; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="Parent Experience" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
                    <button type="button" class="open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 64px; height: 64px; border-radius: 50%; background: var(--cuemath-yellow); border: none; color: var(--ink); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; cursor: pointer; box-shadow: var(--shadow-lg);">
                        <i class="fas fa-play" style="margin-left: 4px;"></i>
                    </button>
                    <div style="position: absolute; bottom: 14px; left: 16px; background: rgba(0,0,0,0.7); color: #fff; font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: var(--radius-pill);">
                        <i class="fas fa-play-circle"></i> 2 Min Story • Elementary Parent
                    </div>
                </div>
                <div style="padding: 24px;">
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">"From Math Tears to Straight A's"</h3>
                    <p style="color: var(--ink-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        How our customized 1:1 approach gave 5th-grader Maya the confidence to conquer fear of numbers and lead her class.
                    </p>
                </div>
            </div>

            <!-- Video 2 -->
            <div style="background: var(--bg-gray); border-radius: var(--radius-xl); border: 1px solid var(--border); overflow: hidden; box-shadow: var(--shadow-sm);">
                <div style="position: relative; height: 260px; background: #000; overflow: hidden;">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Student Journey" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
                    <button type="button" class="open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 64px; height: 64px; border-radius: 50%; background: var(--cuemath-yellow); border: none; color: var(--ink); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; cursor: pointer; box-shadow: var(--shadow-lg);">
                        <i class="fas fa-play" style="margin-left: 4px;"></i>
                    </button>
                    <div style="position: absolute; bottom: 14px; left: 16px; background: rgba(0,0,0,0.7); color: #fff; font-size: 0.78rem; font-weight: 700; padding: 4px 10px; border-radius: var(--radius-pill);">
                        <i class="fas fa-play-circle"></i> 3 Min Story • High School Graduate
                    </div>
                </div>
                <div style="padding: 24px;">
                    <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">"Scoring 780 on the SAT Math"</h3>
                    <p style="color: var(--ink-muted); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                        Upper school graduate Arjun shares how targeted 1:1 diagnostic prep with Dr. Vance opened doors to competitive engineering programs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Written Reviews Grid -->
<section style="padding: 70px 0 90px; background: var(--bg-warm);">
    <div class="container text-center">
        <span class="section-tag emerald"><i class="fas fa-star"></i> Verified Feedback</span>
        <h2 class="section-title">Real Words from <span class="highlight">Real Families</span></h2>

        <div class="reviews-grid text-left" style="margin-top: 48px;">
            <div class="review-card">
                <div>
                    <div class="review-card-header">
                        <div class="review-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="verified-tag"><i class="fas fa-check-circle"></i> Verified Parent</span>
                    </div>
                    <p class="review-quote">"The low ratios and genuine teacher care allowed our son to thrive after getting lost in public school. He feels valued every single day."</p>
                </div>
                <div class="review-author-wrap">
                    <div class="author-avatar">DH</div>
                    <div class="author-info"><h5>David &amp; Heather M.</h5><p>Parents of 8th Grader • Windermere, FL</p></div>
                </div>
            </div>

            <div class="review-card">
                <div>
                    <div class="review-card-header">
                        <div class="review-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="verified-tag"><i class="fas fa-check-circle"></i> Verified Parent</span>
                    </div>
                    <p class="review-quote">"Step Up for Students scholarship was processed with zero headaches. Our daughter receives private prep education at a cost we can afford."</p>
                </div>
                <div class="review-author-wrap">
                    <div class="author-avatar" style="background: var(--accent-blue); color: #fff;">MG</div>
                    <div class="author-info"><h5>Maria Gonzalez</h5><p>Parent of 6th Grader • Orlando, FL</p></div>
                </div>
            </div>

            <div class="review-card">
                <div>
                    <div class="review-card-header">
                        <div class="review-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                        <span class="verified-tag"><i class="fas fa-check-circle"></i> Verified Parent</span>
                    </div>
                    <p class="review-quote">"The 1:1 online sessions are the most effective educational investment we've ever made. The interactive visual tools make learning effortless."</p>
                </div>
                <div class="review-author-wrap">
                    <div class="author-avatar" style="background: var(--accent-emerald); color: #fff;">JL</div>
                    <div class="author-info"><h5>James Lawson</h5><p>Parent of 10th Grader • Tampa, FL</p></div>
                </div>
            </div>
        </div>

        <div style="margin-top: 40px;">
            <a href="our-reviews.php" class="btn btn-primary btn-lg">
                View All Reviews &amp; Case Studies <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
