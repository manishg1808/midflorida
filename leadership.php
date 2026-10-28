<?php
$page_title = "School Leadership & Faculty Mentors | Mid Florida Scholars";
$page_description = "Meet the executive leadership and master educators at Mid Florida Scholars Academy: Founder Brenda Crenshaw and Principal Tanya Williams.";
$current_page = "leadership";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-users-cog"></i> Academic Leadership
        </div>
        <h1>Leadership That Knows Your Child by Name</h1>
        <p>
            Educators with decades of combined experience in curriculum design, student mentorship, and college preparatory innovation.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">About</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Leadership</strong>
        </div>
    </div>
</section>

<!-- Leadership Bios (Cuemath Style) -->
<section style="padding: 70px 0 90px; background: var(--bg-gray);">
    <div class="container">
        <div style="display: flex; flex-direction: column; gap: 40px; max-width: 1040px; margin: 0 auto;">
            <!-- Bio 1: Brenda Crenshaw -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; display: grid; grid-template-columns: 320px 1fr;">
                <div style="background: #E2E8F0; min-height: 340px;">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80" alt="Brenda Crenshaw" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 36px 40px;">
                    <span class="badge-pill badge-yellow" style="margin-bottom: 8px;">Founder &amp; Head of School</span>
                    <h2 style="font-size: 2rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">Brenda Crenshaw</h2>
                    <div style="font-size: 0.95rem; font-weight: 700; color: var(--accent-blue); margin-bottom: 18px;">25+ Years of Educational Leadership</div>
                    
                    <p style="color: var(--ink-secondary); font-size: 1rem; line-height: 1.65; margin-bottom: 14px;">
                        Brenda Crenshaw founded the academy on the conviction that traditional rigid schooling fails to cultivate the genuine potential of each child. Developing innovative pedagogical methods while tutoring students from top private and public schools across Florida, she recognized that students flourish when taught at their individual readiness level.
                    </p>
                    <p style="color: var(--ink-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                        Her student-first leadership earned international accreditation from SACS / Cognia. Today, she guides Mid Florida Scholars with unwavering dedication to student mentorship and academic rigor.
                    </p>
                    <button type="button" class="btn btn-outline btn-sm open-trial-modal">Schedule Meeting with Head of School</button>
                </div>
            </div>

            <!-- Bio 2: Tanya Williams -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; display: grid; grid-template-columns: 320px 1fr;">
                <div style="background: #E2E8F0; min-height: 340px;">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Tanya Williams" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 36px 40px;">
                    <span class="badge-pill badge-blue" style="margin-bottom: 8px;">School Principal</span>
                    <h2 style="font-size: 2rem; font-weight: 800; color: var(--ink); margin-bottom: 6px;">Tanya Williams</h2>
                    <div style="font-size: 0.95rem; font-weight: 700; color: var(--accent-blue); margin-bottom: 18px;">Curriculum &amp; Faculty Supervision</div>
                    
                    <p style="color: var(--ink-secondary); font-size: 1rem; line-height: 1.65; margin-bottom: 14px;">
                        Principal Tanya Williams oversees our day-to-day academic operations, teacher training, and curriculum alignment across all grade bands. Her leadership balances structured academic expectations with a warm, empathetic school culture where every student feels supported.
                    </p>
                    <p style="color: var(--ink-muted); font-size: 0.95rem; line-height: 1.65; margin-bottom: 20px;">
                        She works closely with parents to monitor daily student performance, coordinate accommodations for unique learners, and oversee high school dual enrollment pathways.
                    </p>
                    <button type="button" class="btn btn-outline btn-sm open-trial-modal">Connect with Principal Williams</button>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 50px;">
            <a href="our-tutors.php" class="btn btn-primary btn-lg">
                Meet Our Top 1% Certified Faculty <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
