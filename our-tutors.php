<?php
$page_title = "Our Top 1% Certified Tutors | Mid Florida Scholars";
$page_description = "Meet our elite, certified tutors and educators. Rigorously vetted through a 4-stage selection process to ensure exceptional teaching and mentorship.";
$current_page = "our-tutors";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-certificate"></i> Elite Faculty Selection
        </div>
        <h1>Meet the Top 1% Certified Educators</h1>
        <p>
            We believe that a great teacher doesn't just explain formulas — they ignite genuine curiosity. Discover our rigorous selection process and meet the mentors guiding our students.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Our Tutors</strong>
        </div>
    </div>
</section>

<!-- 4-Step Selection Funnel (Cuemath Signature) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag blue"><i class="fas fa-filter"></i> Rigorous Vetting Process</span>
        <h2 class="section-title">How We Select Only the <span class="highlight">Top 1%</span></h2>
        <p class="section-subtitle">
            Out of every 10,000+ applicants who apply to teach, fewer than 100 make it to our classrooms. Here is our uncompromising 4-step certification funnel.
        </p>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 48px; text-align: left;">
            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px 24px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); position: relative;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--cuemath-yellow-light); color: #B38100; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    01
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">Math Aptitude Test</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); line-height: 1.5;">
                    Rigorous testing on concept depth, non-routine problem solving, and error-spotting across K-12 and competitive curriculums.
                </p>
                <div style="margin-top: 14px; font-size: 0.78rem; font-weight: 700; color: #DC2626;">Top 10% Advance</div>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px 24px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); position: relative;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-blue-light); color: var(--accent-blue); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    02
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">Live Pedagogy Audit</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); line-height: 1.5;">
                    Live mock teaching judged by senior master educators. Evaluated on empathy, Socratic questioning, and patience with struggling kids.
                </p>
                <div style="margin-top: 14px; font-size: 0.78rem; font-weight: 700; color: #DC2626;">Top 3% Advance</div>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px 24px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); position: relative;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-emerald-light); color: var(--accent-emerald); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    03
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">Background Verification</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); line-height: 1.5;">
                    Comprehensive criminal background verification, university degree audits, and child safety compliance standards.
                </p>
                <div style="margin-top: 14px; font-size: 0.78rem; font-weight: 700; color: #008760;">100% Verified</div>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px 24px; border: 2px solid var(--cuemath-yellow); box-shadow: var(--shadow-md); position: relative;">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--cuemath-yellow); color: var(--ink); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    04
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">Platform Training</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); line-height: 1.5;">
                    60 hours of intensive training on our visual tools, lesson analytics, and personalized pacing strategies.
                </p>
                <div style="margin-top: 14px; font-size: 0.78rem; font-weight: 800; color: #B38100;">Final 1% Certified!</div>
            </div>
        </div>
    </div>
</section>

<!-- Tutor Roster Directory -->
<section class="tutors-section">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-users"></i> Faculty Directory</span>
        <h2 class="section-title">Spotlight on Our <span class="highlight">Featured Tutors</span></h2>
        <p class="section-subtitle">
            Every tutor brings extensive teaching experience, advanced academic degrees, and a passion for making learning joyful.
        </p>

        <div class="tutors-grid text-left">
            <!-- Tutor 1 -->
            <div class="tutor-card">
                <div class="tutor-image-box">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" alt="Dr. Elena Vance">
                    <span class="tutor-tag-top">AP Calculus &amp; Algebra</span>
                    <span class="tutor-rating-top"><i class="fas fa-star"></i> 4.98</span>
                </div>
                <div class="tutor-info-body">
                    <h3 class="tutor-name">Dr. Elena Vance</h3>
                    <div class="tutor-degree">Ph.D. Applied Math, Columbia Univ</div>
                    <p class="tutor-bio-short">Specializes in AP Calculus AB/BC, SAT preparation, and high school algebra. 12+ years of teaching excellence.</p>
                    <div class="tutor-stats-strip">
                        <span><strong>2,400+</strong> Hours Taught</span>
                        <span><strong>98%</strong> 5-Star Reviews</span>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm open-trial-modal" style="margin-top: 16px; width: 100%;">
                        Request Mentor
                    </button>
                </div>
            </div>

            <!-- Tutor 2 -->
            <div class="tutor-card">
                <div class="tutor-image-box">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" alt="Marcus Sterling">
                    <span class="tutor-tag-top">Middle School &amp; Logic</span>
                    <span class="tutor-rating-top"><i class="fas fa-star"></i> 4.95</span>
                </div>
                <div class="tutor-info-body">
                    <h3 class="tutor-name">Marcus Sterling</h3>
                    <div class="tutor-degree">M.Sc. Mathematics, Cambridge</div>
                    <p class="tutor-bio-short">Expert in visual geometry, pre-algebra, and math competitions. Transforms math phobia into genuine passion.</p>
                    <div class="tutor-stats-strip">
                        <span><strong>3,100+</strong> Hours Taught</span>
                        <span><strong>99%</strong> 5-Star Reviews</span>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm open-trial-modal" style="margin-top: 16px; width: 100%;">
                        Request Mentor
                    </button>
                </div>
            </div>

            <!-- Tutor 3 -->
            <div class="tutor-card">
                <div class="tutor-image-box">
                    <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&q=80" alt="Priya Raman">
                    <span class="tutor-tag-top">Elementary (Grades K–5)</span>
                    <span class="tutor-rating-top"><i class="fas fa-star"></i> 4.99</span>
                </div>
                <div class="tutor-info-body">
                    <h3 class="tutor-name">Priya Raman</h3>
                    <div class="tutor-degree">B.Tech IIT Delhi, M.Ed. Harvard</div>
                    <p class="tutor-bio-short">Passionate about building intuitive number sense in grades K-5 through storyboards, games, and manipulative blocks.</p>
                    <div class="tutor-stats-strip">
                        <span><strong>4,200+</strong> Hours Taught</span>
                        <span><strong>100%</strong> 5-Star Reviews</span>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm open-trial-modal" style="margin-top: 16px; width: 100%;">
                        Request Mentor
                    </button>
                </div>
            </div>

            <!-- Tutor 4 -->
            <div class="tutor-card">
                <div class="tutor-image-box">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80" alt="David Chen">
                    <span class="tutor-tag-top">Olympiad &amp; STEM</span>
                    <span class="tutor-rating-top"><i class="fas fa-star"></i> 4.97</span>
                </div>
                <div class="tutor-info-body">
                    <h3 class="tutor-name">David Chen</h3>
                    <div class="tutor-degree">M.S. Computer Science, Stanford</div>
                    <p class="tutor-bio-short">Math Olympiad medalist specializing in AMC 8/10/12 prep, probability, combinatorics, and discrete math.</p>
                    <div class="tutor-stats-strip">
                        <span><strong>2,850+</strong> Hours Taught</span>
                        <span><strong>97%</strong> 5-Star Reviews</span>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm open-trial-modal" style="margin-top: 16px; width: 100%;">
                        Request Mentor
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
