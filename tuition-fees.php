<?php
$page_title = "Tuition & Fees Schedule 2026-2027 | Mid Florida Scholars";
$page_description = "Official tuition schedule, annual enrollment fees, installment payment plans, and scholarship acceptance for Mid Florida Scholars Academy.";
$current_page = "tuition-fees";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-coins"></i> 2026–2027 Academic Schedule
        </div>
        <h1>Tuition, Fees &amp; Flexible Payment Plans</h1>
        <p>
            An exceptional investment in your child's future. Transparent tuition schedules with 10-month and 12-month installment options, plus Florida state scholarship acceptance.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="pricing.php">Pricing</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Tuition &amp; Fees</strong>
        </div>
    </div>
</section>

<!-- Tuition Rates Section (Cuemath Style) -->
<section style="padding: 70px 0; background: var(--bg-gray);">
    <div class="container" style="max-width: 1000px;">
        <!-- US Student Annual Rates Card -->
        <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-md); padding: 40px; margin-bottom: 40px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; border-bottom: 2px solid var(--border); padding-bottom: 16px;">
                <div>
                    <span class="badge-pill badge-yellow">Day School Program</span>
                    <h2 style="font-size: 1.8rem; font-weight: 800; margin-top: 6px;">Annual Tuition Schedule (K–12)</h2>
                </div>
                <button type="button" class="btn btn-outline btn-sm open-trial-modal">
                    <i class="fas fa-calculator"></i> Calculate Financial Aid
                </button>
            </div>

            <div class="comparison-table-wrap" style="box-shadow: none; border-radius: var(--radius-md); margin-top: 0;">
                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>Program Division</th>
                            <th style="background: var(--cuemath-yellow); color: var(--ink);">Annual Tuition</th>
                            <th>10-Month Installment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>Lower School (Kindergarten – Grade 5)</strong>
                                <div style="font-size: 0.85rem; color: var(--ink-muted);">12:1 student ratio, visual mathematics, phonics</div>
                            </td>
                            <td class="col-academy" style="font-size: 1.25rem;">$12,450</td>
                            <td>$1,245 / month</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Middle School (Grades 6 – 8)</strong>
                                <div style="font-size: 0.85rem; color: var(--ink-muted);">15:1 ratio, pre-algebra acceleration, sciences</div>
                            </td>
                            <td class="col-academy" style="font-size: 1.25rem;">$13,850</td>
                            <td>$1,385 / month</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Upper School (Grades 9 – 12)</strong>
                                <div style="font-size: 0.85rem; color: var(--ink-muted);">College prep, AP courses, dual enrollment advisory</div>
                            </td>
                            <td class="col-academy" style="font-size: 1.25rem;">$15,200</td>
                            <td>$1,520 / month</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 1:1 Live Online Supplementary Plans Callout -->
        <div style="background: #0D0D0D; color: #FFFFFF; border-radius: var(--radius-xl); padding: 40px; display: grid; grid-template-columns: 1.2fr 0.8fr; align-items: center; gap: 30px; margin-bottom: 40px;">
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 12px;">Looking for Online 1:1 Tutoring?</span>
                <h3 style="font-size: 1.8rem; font-weight: 800; color: #FFFFFF; margin-bottom: 10px;">Cuemath-Style 1:1 Mentoring Plans</h3>
                <p style="color: rgba(255, 255, 255, 0.75); font-size: 0.95rem; line-height: 1.6; margin: 0;">
                    Need dedicated 1:1 math or college prep tutoring alongside your child's current school? Our flexible packages start at just $21 / class with 100% money-back guarantee.
                </p>
            </div>
            <div style="text-align: right;">
                <a href="pricing.php" class="btn btn-primary btn-lg">
                    View 1:1 Online Plans <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Scholarships Notice -->
        <div class="money-back-banner">
            <div class="seal-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--ink); margin-bottom: 4px;">Florida State Scholarships Accepted</h4>
                <p style="font-size: 0.95rem; color: var(--ink-muted); margin-bottom: 10px;">
                    We accept Step Up For Students (FES-EO, FTC, and FES-UA for Unique Abilities). Scholarships often cover up to 100% of annual tuition costs.
                </p>
                <a href="scholarships.php" style="color: var(--accent-blue); font-weight: 700;">Learn More About Scholarships &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
