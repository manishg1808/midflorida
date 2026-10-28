<?php
$page_title = "College Placement & Alumni Success | Mid Florida Scholars";
$page_description = "Mid Florida Scholars Academy boasts a 100% college acceptance rate. Explore the prestigious universities and careers achieved by our graduates.";
$current_page = "alumni-success";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-graduation-cap"></i> Proven Outcomes
        </div>
        <h1>100% College Acceptance &amp; Alumni Success</h1>
        <p>
            Opening doors to the nation's and the world's most competitive universities. Our graduates arrive equipped to excel from day one.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">About</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Alumni Success</strong>
        </div>
    </div>
</section>

<!-- Stats Strip -->
<section class="stats-strip">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">100<span>%</span></div>
                <div class="stat-label">College Acceptance Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">$2M<span>+</span></div>
                <div class="stat-label">Merit Scholarships Earned</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">30<span>+</span></div>
                <div class="stat-label">Avg College Credits at Grad</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">25<span>+</span></div>
                <div class="stat-label">Years of Successful Placements</div>
            </div>
        </div>
    </div>
</section>

<!-- University Placements (Cuemath Style Cards) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag blue"><i class="fas fa-university"></i> Higher Education Destination</span>
        <h2 class="section-title">Where Our <span class="highlight">Graduates Go</span></h2>
        <p class="section-subtitle">
            A small sample of the distinguished institutions where Mid Florida Scholars alumni have matriculated.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-landmark"></i></div>
                <h3 class="curriculum-card-title">National Research Universities</h3>
                <p class="curriculum-card-desc">Graduates enrolled in competitive engineering, pre-med, computer science, and business faculties nationwide.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Columbia University</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Stanford University</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Massachusetts Institute of Technology (MIT)</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Duke University</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-sun"></i></div>
                <h3 class="curriculum-card-title">Florida State Universities</h3>
                <p class="curriculum-card-desc">Full Bright Futures Scholarship recipients attending top tier Florida public institutions with advanced standing.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> University of Florida (UF) - Honors</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Florida State University (FSU)</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> University of Central Florida (UCF)</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> University of South Florida (USF)</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-music"></i></div>
                <h3 class="curriculum-card-title">Specialized Conservatories</h3>
                <p class="curriculum-card-desc">Competitive student-athletes and performing artists matriculating into elite music, theatre, and athletic faculties.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Juilliard School of Music</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Berklee College of Music</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> NCAA Division I athletic signees</div>
                </div>
            </div>
        </div>

        <div style="margin-top: 40px; display: flex; justify-content: center; gap: 16px;">
            <a href="alumni-transcript-request.php" class="btn btn-outline">
                <i class="fas fa-file-alt"></i> Request Official Transcripts
            </a>
            <button type="button" class="btn btn-primary open-trial-modal">
                Start Your College Prep Journey <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
