<?php
$page_title = "Accreditation & Standards | Mid Florida Scholars";
$page_description = "Mid Florida Scholars holds prestigious accreditations including Cognia SACS/CASI, AISF, Middle States Association, and NCPSA.";
$current_page = "accreditation";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-shield-alt"></i> Quality Verification
        </div>
        <h1>Accreditation &amp; Educational Benchmarks</h1>
        <p>
            Independent verification confirming that our curriculum, top 1% certified faculty, and diplomas meet the highest institutional standards nationwide.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">About</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Accreditation</strong>
        </div>
    </div>
</section>

<!-- Overview Grid -->
<section style="padding: 70px 0; background: #FFFFFF;">
    <div class="container">
        <div class="hero-grid" style="align-items: center;">
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">Universally Recognized Diplomas</span>
                <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--ink); line-height: 1.2; margin-bottom: 18px;">
                    Why Accreditation <span class="text-emerald">Matters for Your Child</span>
                </h2>
                <p style="font-size: 1.05rem; color: var(--ink-secondary); line-height: 1.6; margin-bottom: 16px;">
                    Accreditation is an independent seal of trust. It verifies that respected educational agencies have thoroughly audited our curriculum, faculty credentials, safety policies, and student achievement metrics.
                </p>
                <p style="font-size: 1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 24px;">
                    Our diplomas are accepted by the NCAA, military academies, and top tier universities including MIT, Harvard, Stanford, University of Florida, and international institutions.
                </p>
                <button type="button" class="btn btn-primary open-trial-modal">
                    Schedule Free Academic Consultation <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            <div>
                <div style="background: var(--bg-warm); border-radius: var(--radius-xl); padding: 14px; border: 1px solid var(--border); box-shadow: var(--shadow-md);">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1000&q=80" alt="Accredited academic excellence" style="border-radius: var(--radius-lg); width: 100%;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5 Accreditation Seals Cards (Cuemath Style) -->
<section style="padding: 80px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-check-double"></i> 5 Prestigious Accreditations</span>
        <h2 class="section-title">Our Accrediting <span class="highlight">Partners</span></h2>
        <p class="section-subtitle">
            Demonstrating continuous institutional excellence, rigorous faculty vetting, and unmatched student learning gains.
        </p>

        <div class="curriculum-card-grid text-left" style="margin-top: 48px;">
            <div class="curriculum-card">
                <div class="curriculum-icon-wrap"><i class="fas fa-certificate"></i></div>
                <h3 class="curriculum-card-title">Cognia / SACS CASI</h3>
                <p class="curriculum-card-desc">The Southern Association of Colleges and Schools (SACS CASI), an accreditation division of Cognia, is the global benchmark for college-preparatory K-12 institutions.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Globally accepted diploma validation</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Rigorous 5-year cyclical audit</div>
                </div>
            </div>

            <div class="curriculum-card blue-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-university"></i></div>
                <h3 class="curriculum-card-title">Middle States Association (MSA)</h3>
                <p class="curriculum-card-desc">Recognized by the U.S. Department of Education, validating our rigorous honors, AP, and dual enrollment collegiate curriculum.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Transferable credits across US colleges</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Academic integrity standard compliance</div>
                </div>
            </div>

            <div class="curriculum-card emerald-theme">
                <div class="curriculum-icon-wrap"><i class="fas fa-award"></i></div>
                <h3 class="curriculum-card-title">AISF &amp; NCPSA</h3>
                <p class="curriculum-card-desc">Association of Independent Schools of Florida and National Council for Private School Accreditation, affirming safety, ethics, and scholarship governance.</p>
                <div class="curriculum-topics-list">
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Florida Step Up for Students compliance</div>
                    <div class="curriculum-topic-item"><i class="fas fa-check"></i> Low student-teacher ratios guarantee</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
