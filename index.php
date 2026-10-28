<?php
$page_title = "Mid Florida Scholars Academy | Private K–12 & 1:1 MathFit™ Excellence";
$page_description = "We Make Your Child MathFit™! 1:1 personalized online math tutoring for strong foundations — designed to help your child succeed in school and beyond.";
$current_page = "index";
include_once __DIR__ . '/includes/header.php';
?>

<!-- 1. Cinematic Centered Hero Section (Structure modeled directly on Image 2 - NutriPlex) -->
<section class="nutri-hero-structure" id="heroInteractiveSection">
    <!-- Ambient Cinematic Video Layer with Fallback Poster -->
    <div class="hero-video-wrapper">
        <video class="hero-bg-video" id="heroCampusVideo" autoplay muted loop playsinline preload="auto" poster="https://d138zd1ktt9iqe.cloudfront.net/static/website-v3/math-fit-teaser-16-9.webp">
            <source src="assets/videos/crenshaw-hero.mp4" type="video/mp4">
            <source src="https://player.vimeo.com/progressive_redirect/playback/951133863/rendition/720p/file.mp4?loc=external&log_user=0&signature=ce9013fbd0b3b4221ac05da6764bcb9e01f9fa39078153dffd268042cebf1305" type="video/mp4">
        </video>
        <div class="hero-cinematic-overlay"></div>
    </div>

    <div class="hero-center-container">
        <!-- Main Centered Heading with Stylish Rotating Words -->
        <h1 class="hero-center-title">
            We Make Your Child <br class="mobile-break">
            <span class="hero-rotating-wrapper" id="heroWordRotator" aria-live="polite">
                <span class="hero-rotating-word active" data-index="0">MathFit<span class="trademark">™</span></span>
                <span class="hero-rotating-word" data-index="1">Confident Thinkers</span>
                <span class="hero-rotating-word" data-index="2">Grade A Achievers</span>
                <span class="hero-rotating-word" data-index="3">Problem Solvers</span>
                <span class="hero-rotating-word" data-index="4">Future-Ready</span>
            </span>
        </h1>

        <!-- High-Impact Persuasive Subtitle -->
        <p class="hero-center-sub">
            Personalized 1:1 online tutoring engineered to turn math anxiety into unstoppable confidence. Certified top 1% mentors build rock-solid foundations, sharpen critical thinking, and guarantee measurable grade acceleration for Grades K–12.
        </p>

        <!-- Value Highlights Pills -->
        <div class="hero-center-pills">
            <span class="hero-chip"><i class="fas fa-user-graduate"></i> Top 1% Certified Mentors</span>
            <span class="hero-chip"><i class="fas fa-brain"></i> Gamified Logic &amp; Puzzles</span>
            <span class="hero-chip"><i class="fas fa-arrow-trend-up"></i> Guaranteed 2+ Grade Levels Growth</span>
            <span class="hero-chip"><i class="fas fa-shield-halved"></i> 100% Risk-Free Trial Session</span>
        </div>

        <!-- Centered Action Buttons (Modeled directly on Image 2) -->
        <div class="hero-center-btns">
            <button type="button" class="btn-hero-solid open-trial-modal">
                <i class="fas fa-bolt" style="margin-right: 8px;"></i> Book Free Trial Class
            </button>
            <a href="schedule-tour.php" class="btn-hero-glass">
                <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i> Schedule a Campus Tour
            </a>
            <a href="our-tutors.php" class="btn-hero-glass">
                Meet Our Tutors
            </a>
        </div>

        <!-- Video Modal Link -->
        <div class="hero-center-video">
            <a href="javascript:void(0)" class="hero-video-link open-video-modal" data-video="https://player.vimeo.com/video/951133863?autoplay=1">
                <span class="play-circle"><i class="fas fa-play"></i></span>
                <span>Watch Mid Florida Scholars Academy Campus Tour</span>
            </a>
        </div>

        <!-- Centered Trustpilot & Reviews Proof Bar -->
        <div class="hero-center-bottom-bar">
            <div class="hero-trust-stars-row">
                <div class="stars-box">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <strong class="rating-val">4.9 / 5.0</strong>
                <span class="trust-sep">|</span>
                <span class="reviews-sub">15,000+ verified parent reviews across Florida &amp; Nationwide</span>
            </div>

            <div class="hero-bottom-equation">
                <span class="eq-pill">Top 1% Mentors</span>
                <span class="eq-symbol">+</span>
                <span class="eq-pill">1:1 Personalized</span>
                <span class="eq-symbol">+</span>
                <span class="eq-pill">Gamified Platform</span>
                <span class="eq-symbol">=</span>
                <span class="eq-pill eq-gold">MathFit Minds</span>
            </div>
        </div>
    </div>
</section>



<!-- 3. Section: Community of 200,000+ MathFit Kids (Graph Paper Grid Background) -->
<section class="section-cuemath-community bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">Community of 200,000+ MathFit Kids</h2>
            <p class="cuemath-subheading">
                Heartfelt stories of transformations, learnings, and achievements of cuemath students!
            </p>
        </div>

        <div class="community-cards-grid-cuemath">
            <!-- Card 1: Wide 2-Column Mint Card (ELIN LUNA) -->
            <div class="community-card-wide">
                <div class="community-card-wide-left">
                    <div>
                        <div class="community-nav-arrows">
                            <button type="button" aria-label="Previous"><i class="fas fa-arrow-left"></i></button>
                            <button type="button" aria-label="Next"><i class="fas fa-arrow-right"></i></button>
                        </div>
                        <span class="story-card-tag" style="background: rgba(255,255,255,0.8); padding: 3px 8px; border-radius: 4px;">ELIN LUNA</span>
                        <h3 class="story-card-title" style="margin-top: 10px;">Thriving in School, State Tests, and Accelerated Math</h3>
                        <p class="story-card-text">
                            Grade 8 Cuemath student, combines curiosity and dedication to excel in school assessments, state testing, and Math Olympiads.
                        </p>
                    </div>
                    <a href="our-reviews.php" class="story-card-link">Read more</a>
                </div>
                <div class="card-v-img">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" alt="Elin Luna family">
                </div>
            </div>

            <!-- Card 2: Vertical Peach Card (BRYAN TU) -->
            <div class="community-card-vertical" style="background-color: #FFD8C2;">
                <div class="card-v-img">
                    <span class="card-v-tag">BRYAN TU</span>
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=500&q=80" alt="Bryan Tu holding certificate">
                </div>
                <div class="card-v-body">
                    5th Grader Among Top 10 in the Nation from 6 Million Competitors
                </div>
            </div>

            <!-- Card 3: Vertical Yellow Card (YUNEKE GONZALEZ) -->
            <div class="community-card-vertical" style="background-color: #FFF0B3;">
                <div class="card-v-img">
                    <span class="card-v-tag">YUNEKE GONZALEZ</span>
                    <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=500&q=80" alt="Yuneke Gonzalez studying at monitor">
                </div>
                <div class="card-v-body">
                    A Homeschooler's Journey with Cuemath
                </div>
            </div>

            <!-- Card 4: Vertical Sky Blue Card (HRIDHAAN SHARMA) -->
            <div class="community-card-vertical" style="background-color: #CCEBFF;">
                <div class="card-v-img">
                    <span class="card-v-tag">HRIDHAAN SHARMA</span>
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=500&q=80" alt="Hridhaan Sharma in Ferrari shirt with trophies">
                </div>
                <div class="card-v-body">
                    Grade 6 Olympiad Champion and Abacus Prodigy
                </div>
            </div>

            <!-- Card 5: Vertical Pink Card (SARAH CHEN) -->
            <div class="community-card-vertical" style="background-color: #FCD5EB;">
                <div class="card-v-img">
                    <span class="card-v-tag">CONFIDENCE</span>
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=500&q=80" alt="Sarah Chen student">
                </div>
                <div class="card-v-body">
                    5th Grader Who Found Her Math Confidence With Cuemath
                </div>
            </div>
        </div>

        <!-- Standalone Centered Between-Section Button -->
        <div style="text-align: center; margin-top: 36px;">
            <button type="button" class="cuemath-inter-cta-btn open-trial-modal">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- 4. Section: An Expert Tutor Who Shapes the MathFit™ Mind -->
<section class="section-tutor-expert bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">An Expert Tutor Who Shapes<br>the MathFit™ Mind</h2>
            <p class="cuemath-subheading">
                Our tutors guide, question, and mentor, building the mindset and skills that make your child MathFit™ for life.
            </p>
        </div>

        <div class="tutor-stage-wrap">
            <div class="tutor-flank-tile tutor-flank-left">
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=400&q=80" alt="Girl in orange hoodie with red headphones writing">
            </div>

            <div class="tutor-main-frame">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1000&q=80" alt="Boy smiling at laptop writing with stylus on drawing tablet">
            </div>

            <div class="tutor-flank-tile tutor-flank-right">
                <img src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?auto=format&fit=crop&w=400&q=80" alt="Little boy in blue polo at desk">
            </div>
        </div>

        <!-- Standalone Centered Button -->
        <div style="text-align: center; margin-bottom: 40px;">
            <button type="button" class="cuemath-inter-cta-btn open-trial-modal">
                Get Started
            </button>
        </div>

        <!-- 3 Colored Pills Bar with 3D Badges -->
        <div class="tutor-three-pills-bar">
            <div class="tutor-pill-card pill-yellow">
                <div class="tutor-pill-badge-top badge-yellow-top">
                    <i class="fas fa-award"></i>
                </div>
                <div class="pill-card-title">TOP 1% CERTIFIED TUTORS</div>
                <p class="pill-card-desc">
                    Rigorous selection and Cuemath Pedagogy training keep our tutors at their best.
                </p>
            </div>

            <div class="tutor-pill-card pill-lavender">
                <div class="tutor-pill-badge-top badge-purple-top">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="pill-card-title">FOR THE LONG TERM</div>
                <p class="pill-card-desc">
                    Tutor guides your child over the years, making a safe space to explore, and grow.
                </p>
            </div>

            <div class="tutor-pill-card pill-sky">
                <div class="tutor-pill-badge-top badge-blue-top">
                    <i class="fas fa-bullseye"></i>
                </div>
                <div class="pill-card-title">PERFECT MATCH</div>
                <p class="pill-card-desc">
                    Matched to the child's needs, background, and level for a tailored learning experience.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Section: A Personalized MathFit™ Journey for Your Child -->
<section class="section-personalized-journey bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">A Personalized MathFit™<br>Journey for Your Child</h2>
            <p class="cuemath-subheading">
                No one-size-fits-all. Your child gets exactly the curriculum they need.
            </p>
        </div>

        <div class="journey-grid">
            <!-- Left: Student Circles & Callouts -->
            <div class="journey-left-portraits">
                <div class="student-circles-grid">
                    <div class="student-circle-cell bg-amber">
                        <img src="https://images.unsplash.com/photo-1544717302-de2939b7ef71?auto=format&fit=crop&w=300&q=80" alt="Girl in blue raising thumb">
                    </div>
                    <div class="student-circle-cell bg-cyan">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80" alt="Boy with curly afro hair in yellow shirt">
                    </div>
                    <div class="student-circle-cell bg-pink">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=300&q=80" alt="Asian girl with headphones and laptop">
                    </div>
                    <div class="student-circle-cell bg-green">
                        <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?auto=format&fit=crop&w=300&q=80" alt="Boy smiling with pen">
                    </div>
                </div>

                <div class="journey-callout-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <div>Every 1:1 session is adapted to the child's pace for truly personalized learning.</div>
                    <div style="font-size: 1.8rem; color: #E57373; margin-left: 14px;"><i class="fas fa-chart-column"></i></div>
                </div>
            </div>

            <!-- Right: Interactive Goal Selector Screen with typing hands -->
            <div>
                <div style="background: #FFE0B2; border-radius: 14px; padding: 20px 24px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <div style="font-size: 1.05rem; font-weight: 800; color: #0D0D0D;">No one-size-fits-all. Your child gets exactly the curriculum they need.</div>
                    <div style="font-size: 1.6rem; color: #FFBA07;"><i class="fas fa-star"></i> <i class="fas fa-star"></i></div>
                </div>

                <div class="journey-right-screen">
                    <div class="screen-goals-title">Select your learning goals</div>

                    <div class="goals-selector-grid">
                        <div class="goal-option-btn active" data-goal="school">
                            <span class="goal-option-icon goal-icon-1"><i class="fas fa-graduation-cap"></i></span>
                            <span class="goal-option-label">GET AHEAD AT SCHOOL</span>
                        </div>

                        <div class="goal-option-btn" data-goal="olympiad">
                            <span class="goal-option-icon goal-icon-2"><i class="fas fa-trophy"></i></span>
                            <span class="goal-option-label">PREPARE FOR COMPETITIONS</span>
                        </div>

                        <div class="goal-option-btn" data-goal="real-world">
                            <span class="goal-option-icon goal-icon-3"><i class="fas fa-globe-americas"></i></span>
                            <span class="goal-option-label">APPLY MATH IN REAL WORLD</span>
                        </div>

                        <div class="goal-option-btn" data-goal="logic">
                            <span class="goal-option-icon goal-icon-4"><i class="fas fa-brain"></i></span>
                            <span class="goal-option-label">BUILD LOGICAL THINKING</span>
                        </div>
                    </div>

                    <div style="font-size: 0.85rem; color: #94A3B8; margin-bottom: 10px; font-weight: 700; text-transform: uppercase;">
                        Select Grade:
                    </div>

                    <div class="grade-chips-scroller">
                        <span class="grade-chip">K</span>
                        <span class="grade-chip">1</span>
                        <span class="grade-chip">2</span>
                        <span class="grade-chip">3</span>
                        <span class="grade-chip">4</span>
                        <span class="grade-chip active">5</span>
                        <span class="grade-chip">6</span>
                        <span class="grade-chip">7</span>
                        <span class="grade-chip">8</span>
                        <span class="grade-chip">9</span>
                        <span class="grade-chip">10</span>
                        <span class="grade-chip">11</span>
                        <span class="grade-chip">12</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Standalone Centered Button -->
        <div style="text-align: center; margin-top: 36px;">
            <button type="button" class="cuemath-inter-cta-btn open-trial-modal">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- 6. Section: An Interactive Platform for Training MathFit™ Minds (Bento Grid) -->
<section class="section-platform-bento bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">An Interactive Platform for<br>Training MathFit™ Minds</h2>
            <p class="cuemath-subheading">
                It isn't just another zoom class <span style="color: #EF4444;">❌</span> It's an immersive math learning experience <span style="color: #10B981;">✅</span>
            </p>
        </div>

        <div class="bento-grid-cuemath">
            <!-- Left Column: Master through practice & Test your skills -->
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="bento-card">
                    <div class="bento-tag">MASTER THROUGH PRACTICE</div>
                    <div class="bento-media-box">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=500&q=80" alt="Practice exercise 3D pyramid problem">
                        <div class="bento-play-overlay open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>

                <div class="bento-card">
                    <div class="bento-tag">TEST YOUR SKILLS</div>
                    <div class="bento-media-box">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=500&q=80" alt="Test skills quiz screen">
                        <div class="bento-play-overlay open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Center Column: Verbalize your thinking with LIVE TALK METER -->
            <div class="bento-card bento-center">
                <div>
                    <div class="bento-tag" style="font-size: 0.85rem;">VERBALIZE YOUR THINKING</div>
                    <p class="bento-desc">
                        System nudges the child to talk more than the tutor, thinking-out-aloud for a deeper understanding of math concepts.
                    </p>
                </div>

                <!-- Live Classroom Video with Talk Meter -->
                <div style="background: #FFFFFF; border-radius: 12px; padding: 14px; border: 1.5px solid rgba(0,0,0,0.08); margin-bottom: 16px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div style="border-radius: 8px; overflow: hidden; border: 2px solid #FFBA07; aspect-ratio: 4/3;">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80" alt="Teacher speaking">
                        </div>
                        <div style="border-radius: 8px; overflow: hidden; border: 2px solid #A855F7; aspect-ratio: 4/3;">
                            <img src="https://images.unsplash.com/photo-1544717302-de2939b7ef71?auto=format&fit=crop&w=400&q=80" alt="Student speaking actively">
                        </div>
                    </div>

                    <!-- Live Talk Meter Widget -->
                    <div class="talk-meter-container">
                        <div class="talk-meter-labels">
                            <span style="color: #D97706;"><i class="fas fa-user-tie"></i> Teacher 36%</span>
                            <span style="color: #7E22CE;"><i class="fas fa-user-graduate"></i> Student 64%</span>
                        </div>
                        <div class="talk-meter-bar-wrap">
                            <div class="talk-meter-teacher">36</div>
                            <div class="talk-meter-student">64</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Show your work & Stay engaged -->
            <div style="display: flex; flex-direction: column; gap: 20px;">
                <div class="bento-card">
                    <div class="bento-tag">SHOW YOUR WORK</div>
                    <div class="bento-media-box">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=500&q=80" alt="Hand holding stylus on drawing tablet">
                        <div class="bento-play-overlay open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>

                <div class="bento-card">
                    <div class="bento-tag">STAY ENGAGED</div>
                    <div class="bento-media-box">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=500&q=80" alt="Star emoji reward animation">
                        <div class="bento-play-overlay open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Standalone Centered Button -->
        <div style="text-align: center; margin-top: 36px;">
            <button type="button" class="cuemath-inter-cta-btn open-trial-modal">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- 7. Section: Designed for Parents, Too: Flexible, Transparent, and Risk-Free -->
<section class="section-parents-grid bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">Designed for Parents, Too:<br>Flexible, Transparent, and Risk-Free</h2>
        </div>

        <div class="parents-phone-layout">
            <!-- Left 2 Cards -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div class="parent-sticker-box" style="background-color: #FFE7DB;">
                    <div class="parent-box-tag">STAY CONNECTED</div>
                    <p class="parent-box-desc">
                        Chat with your tutor and receive real-time updates.
                    </p>
                    <div class="parent-sticker-badge" style="color: #F97316;">
                        <i class="fas fa-comment-dots"></i>
                    </div>
                </div>

                <div class="parent-sticker-box" style="background-color: #FCE7F3;">
                    <div class="parent-box-tag">TRACK PROGRESS</div>
                    <p class="parent-box-desc">
                        See strengths, and areas of improvement in real-time.
                    </p>
                    <div class="parent-sticker-badge" style="color: #EC4899;">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>

            <!-- Center: Smartphone Mockup showing Cuemath Parent App -->
            <div class="phone-mockup-outer">
                <div class="phone-mockup-inner">
                    <div class="phone-status-bar">
                        <span>9:41</span>
                        <span><i class="fas fa-signal"></i> <i class="fas fa-wifi"></i> <i class="fas fa-battery-full"></i></span>
                    </div>

                    <div class="phone-app-header">
                        <span><i class="fas fa-chart-simple"></i> Progress</span>
                        <span><i class="fas fa-gear"></i></span>
                    </div>

                    <div class="phone-student-avatars">
                        <span class="phone-avatar-chip active">Rob</span>
                        <span class="phone-avatar-chip">Mutum</span>
                        <span class="phone-avatar-chip">Kanishka</span>
                    </div>

                    <div style="display: flex; justify-content: center; gap: 20px; padding: 6px 0; font-size: 0.72rem; font-weight: 800; border-bottom: 1px solid #F1F5F9;">
                        <span style="color: #0D0D0D; border-bottom: 2px solid #000; padding-bottom: 4px;">Daily</span>
                        <span style="color: #94A3B8;">Monthly</span>
                    </div>

                    <div class="phone-activity-list">
                        <div style="font-size: 0.68rem; font-weight: 800; color: #64748B;">23 JUL, WED</div>
                        <div class="phone-activity-card">
                            <span><strong style="color: #D97706;">MATH</strong> • 2 done, 1 in-progress</span>
                            <span style="color: #10B981;"><i class="fas fa-circle-check"></i></span>
                        </div>
                        <div class="phone-activity-card">
                            <span><strong style="color: #2563EB;">CODING</strong> • 10 done</span>
                            <span style="color: #10B981;"><i class="fas fa-circle-check"></i></span>
                        </div>
                        <div class="phone-activity-card">
                            <span><strong style="color: #9333EA;">LOGIC</strong> • 4/5 done, +55 pts</span>
                            <span style="color: #FFBA07;"><i class="fas fa-award"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right 2 Cards -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div class="parent-sticker-box" style="background-color: #DDF4FF;">
                    <div class="parent-box-tag">100% REFUND</div>
                    <p class="parent-box-desc">
                        Cancel anytime and get full refund of un-used classes.
                    </p>
                    <div class="parent-sticker-badge" style="color: #0284C7;">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                </div>

                <div class="parent-sticker-box" style="background-color: #D1FAE5;">
                    <div class="parent-box-tag">EASY SCHEDULING</div>
                    <p class="parent-box-desc">
                        Conveniently change your class timings directly.
                    </p>
                    <div class="parent-sticker-badge" style="color: #059669;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Standalone Centered Button -->
        <div style="text-align: center; margin-top: 36px;">
            <button type="button" class="cuemath-inter-cta-btn open-trial-modal">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- Cuemath Signature 'All Plans Include' Section -->
<section class="section-all-plans-include">
    <div class="container">
        <!-- Top 3 Guarantee Cards -->
        <div class="plans-guarantee-row">
            <div class="guarantee-chip-card">
                <div class="chip-icon-wrap" style="color: #00B4D8; background: #E0F7FA;">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <span class="chip-text">40 - 55 minutes per class</span>
            </div>

            <div class="guarantee-chip-card">
                <div class="chip-icon-wrap" style="color: #F97316; background: #FFEDD5;">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <span class="chip-text">Flexible Leaves &amp; Schedule</span>
            </div>

            <div class="guarantee-chip-card">
                <div class="chip-icon-wrap" style="color: #EC4899; background: #FCE7F3;">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <span class="chip-text">Easy Refunds Guarantee</span>
            </div>
        </div>

        <!-- Distinct Bordered Heading Box -->
        <div class="plans-include-heading-box">
            <h2 class="plans-include-title">All Plans Include</h2>
        </div>

        <!-- 8-Feature Architectural Grid (4x2) with Sharp Borders -->
        <div class="plans-include-grid">
            <!-- 1. Learning Plan -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #FFBA07;">
                    <span>&Sigma;</span>
                </div>
                <h3 class="tile-feature-title">Learning Plan</h3>
            </div>

            <!-- 2. Exam Preparation -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #F97316;">
                    <span>%</span>
                </div>
                <h3 class="tile-feature-title">Exam Preparation</h3>
            </div>

            <!-- 3. Homework Help -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #A855F7;">
                    <span>&#9651;</span>
                </div>
                <h3 class="tile-feature-title">Homework Help</h3>
            </div>

            <!-- 4. Advanced Learning -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #10B981;">
                    <span>&infin;</span>
                </div>
                <h3 class="tile-feature-title">Advanced Learning</h3>
            </div>

            <!-- 5. Smart Practice -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #00B4D8;">
                    <span>&lambda;</span>
                </div>
                <h3 class="tile-feature-title">Smart Practice</h3>
            </div>

            <!-- 6. Mental Math -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #FF9800;">
                    <span>&#10746;</span>
                </div>
                <h3 class="tile-feature-title">Mental Math</h3>
            </div>

            <!-- 7. Remedial Support -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #00C48C;">
                    <span>&radic;</span>
                </div>
                <h3 class="tile-feature-title">Remedial Support</h3>
            </div>

            <!-- 8. Parent App -->
            <div class="plan-feature-tile">
                <div class="math-symbol-icon" style="color: #EF4444;">
                    <span>&cup;</span>
                </div>
                <h3 class="tile-feature-title">Parent App</h3>
            </div>
        </div>

        <!-- Standalone Get Started CTA -->
        <div class="plans-include-cta-wrap">
            <button type="button" class="btn-cuemath-gold open-trial-modal" style="padding: 15px 44px; font-size: 1.1rem;">
                Get Started
            </button>
        </div>
    </div>
</section>

<!-- Cuemath Signature Split Sticky Scroll Section: "Pay only if you ❤️ us. No strings attached." -->
<section class="cuemath-sticky-pay-section" id="howItWorksSteps">
    <!-- Left Sticky Pinned Column -->
    <div class="sticky-pay-left-col">
        <!-- Concentric Heart Ripples SVG Background -->
        <svg class="sticky-pay-heart-ripples" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M250 140 C210 80 130 90 120 170 C110 240 250 340 250 340 C250 340 390 240 380 170 C370 90 290 80 250 140 Z" stroke="rgba(255,255,255,0.18)" stroke-width="2.5"/>
            <path d="M250 100 C190 20 80 40 70 150 C60 250 250 400 250 400 C250 400 440 250 430 150 C420 40 310 20 250 100 Z" stroke="rgba(255,255,255,0.14)" stroke-width="2.5"/>
            <path d="M250 60 C170 -40 30 -10 20 130 C10 260 250 460 250 460 C250 460 490 260 480 130 C470 -10 330 -40 250 60 Z" stroke="rgba(255,255,255,0.09)" stroke-width="2.5"/>
        </svg>

        <div class="sticky-pay-content">
            <h2 class="sticky-pay-headline">
                Pay only if you <span class="heart-coral">&#10084;&#65039;</span> us.<br>No strings attached.
            </h2>
            <p class="sticky-pay-sub">
                Experience our 1:1 teaching methodology with complete peace of mind. Zero risk, 100% money-back guarantee for unused sessions.
            </p>
            <button type="button" class="btn-cuemath-pill-black open-trial-modal">
                <i class="fas fa-rocket"></i> Get Started
            </button>
        </div>
    </div>

    <!-- Right Scrollable Steps Track -->
    <div class="sticky-pay-right-col">
        <!-- Step 1: Yellow -->
        <div class="pay-step-card step-yellow">
            <div class="step-card-inner">
                <div class="step-card-text">
                    <h3 class="step-card-title">1. Tell us about your child</h3>
                    <p class="step-card-desc">
                        Fill out a simple form to help us understand your child's unique personality and learning needs.
                    </p>
                </div>
                <div class="step-card-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Step 2: Orange -->
        <div class="pay-step-card step-orange">
            <div class="step-card-inner">
                <div class="step-card-text">
                    <h3 class="step-card-title">2. Speak to our counsellor</h3>
                    <p class="step-card-desc">
                        Discuss your expectations with our counsellor, who will match your child with the right tutor for a trial session.
                    </p>
                </div>
                <div class="step-card-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Step 3: Magenta -->
        <div class="pay-step-card step-magenta">
            <div class="step-card-inner">
                <div class="step-card-text">
                    <h3 class="step-card-title">3. Attend a free session</h3>
                    <p class="step-card-desc">
                        Watch your child engage and learn with our tutors, and get all your questions answered.
                    </p>
                </div>
                <div class="step-card-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="8" y1="21" x2="16" y2="21"></line>
                        <line x1="12" y1="17" x2="12" y2="21"></line>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Step 4: Green -->
        <div class="pay-step-card step-green">
            <div class="step-card-inner">
                <div class="step-card-text">
                    <h3 class="step-card-title">4. Choose a plan and pay</h3>
                    <p class="step-card-desc">
                        Once you're happy, pick a plan that suits your schedule and make the payment to start your classes.
                    </p>
                </div>
                <div class="step-card-icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                        <circle cx="12" cy="15" r="2"></circle>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. Section: We love solving doubts! (FAQ Accordion) -->
<section class="section-doubts-faq">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">We love solving doubts!</h2>
        </div>

        <div class="faq-cuemath-list">
            <div class="faq-cuemath-item active">
                <div class="faq-cuemath-header">
                    <span class="faq-cuemath-question">What is the frequency and duration of your classes?</span>
                    <span class="faq-cuemath-icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-cuemath-body">
                    Typically, the number of classes is two per week for grades K to 8, and three per week for high school. But the schedule is flexible, according to your child's requirements and availability. Also, each class runs for 55 minutes, extendable to an hour.
                </div>
            </div>

            <div class="faq-cuemath-item">
                <div class="faq-cuemath-header">
                    <span class="faq-cuemath-question">What devices do I need for attending your classes?</span>
                    <span class="faq-cuemath-icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-cuemath-body">
                    All you need is a laptop, desktop, or tablet with a steady internet connection, webcam, and microphone. A digital stylus or mouse helps your child interact with the mathematical whiteboard.
                </div>
            </div>

            <div class="faq-cuemath-item">
                <div class="faq-cuemath-header">
                    <span class="faq-cuemath-question">My child has specific learning requirements. Is your program flexible enough?</span>
                    <span class="faq-cuemath-icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-cuemath-body">
                    Absolutely! Every child receives an initial diagnostic evaluation to pinpoint foundation gaps. The 1:1 format allows the certified tutor to tailor the curriculum pace, accelerating or revising topics as needed.
                </div>
            </div>

            <div class="faq-cuemath-item">
                <div class="faq-cuemath-header">
                    <span class="faq-cuemath-question">Can your tutors teach the topics covered in my child's school or curriculum?</span>
                    <span class="faq-cuemath-icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-cuemath-body">
                    Yes. Our curriculum aligns with US Common Core, IB, Cambridge (IGCSE), ICSE, CBSE, and State Standards. Tutors help with homework, school tests, and advanced competition preparation.
                </div>
            </div>

            <div class="faq-cuemath-item">
                <div class="faq-cuemath-header">
                    <span class="faq-cuemath-question">Can my child join anytime of the year?</span>
                    <span class="faq-cuemath-icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-cuemath-body">
                    Yes! Because all sessions are 1:1 and rolling, students can start any week of the year with personalized onboarding and goal-setting.
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 32px;">
            <a href="academic-faq.php" style="font-weight: 800; color: #0D0D0D; text-decoration: underline; font-size: 1.05rem;">
                See More
            </a>
        </div>
    </div>
</section>

<!-- 9. Section: Join The Global MathFit™ Movement (Dark Section) -->
<section class="section-global-movement">
    <div class="container">
        <!-- Top student photo row -->
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 40px;">
            <div style="aspect-ratio: 16/10; border-radius: 10px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80" alt="Students with I am MathFit book">
            </div>
            <div style="aspect-ratio: 16/10; border-radius: 10px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80" alt="Students solving math puzzles">
            </div>
            <div style="aspect-ratio: 16/10; border-radius: 10px; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&w=600&q=80" alt="Student happy at desk">
            </div>
        </div>

        <div class="movement-grid">
            <div>
                <h2 class="movement-heading">Join The Global MathFit™ Movement</h2>
                <p class="movement-text">
                    11 years ago, I started Cuemath with one unshakable belief: every child has a spark of mathematical genius—waiting to be unlocked. I've seen that spark ignite in thousands of children, turning fear into joy, confusion into clarity, and hesitation into bold, confident thinking.
                </p>
                <p class="movement-text" style="font-weight: 700; color: #FFFFFF;">
                    Don't let that hidden genius stay hidden. The best time to start was yesterday. The next best time is now.
                </p>
                <a href="javascript:void(0)" class="movement-cta-block open-trial-modal">
                    <span>Get Started</span>
                    <span>↗</span>
                </a>
            </div>

            <div class="movement-right-founder">
                <div class="founder-video-preview">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?auto=format&fit=crop&w=700&q=80" alt="Manan Khurma Cuemath Founder TEDx Talk">
                    <div class="bento-play-overlay open-video-modal" data-video="https://www.youtube.com/embed/ScMzIvxBSi4?autoplay=1">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <div class="founder-info-box">
                    <div class="founder-name">MANAN KHURMA</div>
                    <ul class="founder-bullets">
                        <li>Cuemath founder</li>
                        <li>IIT Delhi Alumnus</li>
                        <li>10K+ Kids Taught</li>
                        <li>20+ Years of Teaching</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10. Section: Interested In Teaching Maths Online? -->
<section class="section-teaching-online bg-grid-math">
    <div class="container">
        <div class="community-header">
            <h2 class="cuemath-heading">Interested In Teaching Maths Online?</h2>
            <p class="cuemath-subheading">
                Many Cuemath tutors started exactly where you are — educators, engineers, homemakers, and parents restarting their careers. With Cuemath, you can:
            </p>
        </div>

        <div class="teaching-cards-row">
            <div class="teaching-card card-mint-teach">
                Earn Independently
            </div>
            <div class="teaching-card card-peach-teach">
                Work Flexibly
            </div>
            <div class="teaching-card card-pink-teach">
                Teach Globally
            </div>
        </div>

        <div style="text-align: center;">
            <a href="our-tutors.php" class="btn-cuemath-gold" style="padding: 16px 40px; font-size: 1.05rem;">
                Apply as a Tutor
            </a>
        </div>
    </div>
</section>

<!-- 11. Academy Master CTA Banner -->
<?php
$cta_eyebrow = "Admissions & Campus Visits Open • Grades K–12";
$cta_title = "Ready to Experience <span class='highlight'>Mid Florida Scholars Academy</span>?";
$cta_desc = "Join an accredited learning community where every student is known, challenged, and supported. Schedule a campus tour, explore our curriculum, or speak directly with our admissions team.";
$cta_primary_text = "Schedule a Campus Tour";
$cta_primary_url = "schedule-tour.php";
$cta_secondary_text = "Contact Admissions";
$cta_secondary_url = "contact.php";
include_once __DIR__ . '/includes/cta-tour.php';
?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>

