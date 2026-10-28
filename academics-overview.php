<?php
$page_title = "Academic Overview & Divisions | Mid Florida Scholars";
$page_description = "Explore our accredited K-12 academic programs: Lower School, Middle School, and Upper School college prep with 1:1 and small group personalized learning in Orlando, FL.";
$current_page = "academics-overview";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-graduation-cap"></i> Rigorous &amp; Student-Centric
        </div>
        <h1>Academics as an Active Conversation</h1>
        <p>
            From Kindergarten through 12th grade, our students are challenged to think from first principles, ask bold questions, and master concepts with lifelong retention.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Academics</strong>
        </div>
    </div>
</section>

<!-- Stats Strip -->
<section class="stats-strip">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">K–12</div>
                <div class="stat-label">Continuous College Prep</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1:1<span>&amp;</span>Small</div>
                <div class="stat-label">Personalized Ratio</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100<span>%</span></div>
                <div class="stat-label">College Acceptance Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Cognia</div>
                <div class="stat-label">SACS International Accreditation</div>
            </div>
        </div>
    </div>
</section>

<!-- Division Programs (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 50px;">
            <span class="section-tag blue"><i class="fas fa-sitemap"></i> Academic Divisions</span>
            <h2 class="section-title">Designed for Every Stage of <span class="highlight">Child Growth</span></h2>
            <p class="section-subtitle">
                Our developmental approach ensures that students build unshakeable confidence in early years, analytical reasoning in middle school, and elite university readiness in high school.
            </p>
        </div>

        <div style="display: flex; flex-direction: column; gap: 36px;">
            <!-- Division 1: Lower School -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; display: grid; grid-template-columns: 0.9fr 1.1fr;">
                <div style="background: #E2E8F0; min-height: 280px;">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80" alt="Lower School Students" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 36px 40px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span class="badge-pill badge-yellow" style="margin-bottom: 10px;">Kindergarten – Grade 5</span>
                        <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 12px;">Lower School: Joy in Discovery</h3>
                        <p style="color: var(--ink-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
                            We lay the foundation for lifelong learning. Students engage with visual manipulatives, phonics-rich literacy, foundational science, and early problem-solving puzzles in a nurturing setting.
                        </p>
                        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> Number Sense &amp; Counting</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> Hands-on Science Labs</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> Reading &amp; Creative Expression</span>
                        </div>
                    </div>
                    <div>
                        <a href="lower-school.php" class="btn btn-outline">Explore Lower School <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Division 2: Middle School -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; display: grid; grid-template-columns: 1.1fr 0.9fr;">
                <div style="padding: 36px 40px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span class="badge-pill badge-blue" style="margin-bottom: 10px;">Grades 6 – 8</span>
                        <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 12px;">Middle School: Independence &amp; Rigor</h3>
                        <p style="color: var(--ink-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
                            Middle school is a pivotal transitional phase. Our curriculum shifts toward analytical reasoning, pre-algebra, laboratory sciences, and formal structured writing while providing personal mentorship.
                        </p>
                        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-blue"></i> Pre-Algebra &amp; Geometry</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-blue"></i> Early High School Credit Options</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-blue"></i> Critical Thinking Seminars</span>
                        </div>
                    </div>
                    <div>
                        <a href="middle-school.php" class="btn btn-outline">Explore Middle School <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div style="background: #E2E8F0; min-height: 280px;">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80" alt="Middle School Students" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Division 3: Upper School -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-sm); overflow: hidden; display: grid; grid-template-columns: 0.9fr 1.1fr;">
                <div style="background: #E2E8F0; min-height: 280px;">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80" alt="Upper School High School Students" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 36px 40px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <span class="badge-pill badge-emerald" style="margin-bottom: 10px;">Grades 9 – 12</span>
                        <h3 style="font-size: 1.8rem; font-weight: 800; color: var(--ink); margin-bottom: 12px;">Upper School: Elite College Prep</h3>
                        <p style="color: var(--ink-muted); font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
                            A rigorous academic runway preparing students for selective university admission. Offering AP coursework, dual enrollment university credits, SAT/ACT coaching, and customized college guidance.
                        </p>
                        <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> Advanced Placement (AP) Tracks</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> SAT / ACT Intensive Prep</span>
                            <span class="badge-pill" style="background: var(--bg-gray);"><i class="fas fa-check text-emerald"></i> College Admissions Advisory</span>
                        </div>
                    </div>
                    <div>
                        <a href="upper-school.php" class="btn btn-outline">Explore Upper School <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
