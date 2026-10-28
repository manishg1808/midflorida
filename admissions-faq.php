<?php
$page_title = "Admissions FAQs | Mid Florida Scholars";
$page_description = "Find answers to frequently asked questions about admissions deadlines, uniforms, Florida scholarships, and mid-year transfers at Mid Florida Scholars.";
$current_page = "admissions-faq";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-question-circle"></i> Admissions &amp; Enrollment
        </div>
        <h1>Admissions Frequently Asked Questions</h1>
        <p>
            Common questions regarding applications, rolling admissions, Florida state scholarships, uniforms, and mid-year student transfers.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="how-to-apply.php">Admissions</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Admissions FAQ</strong>
        </div>
    </div>
</section>

<!-- FAQ Accordion Section (Cuemath Style) -->
<section class="faq-section">
    <div class="container">
        <div class="faq-container text-left">
            <div class="faq-item active">
                <button type="button" class="faq-question">
                    <span>When is the deadline to submit an admissions application?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Mid Florida Scholars operates on a <strong>rolling admissions basis</strong> year-round. Because class sizes are strictly capped to preserve low teacher-student ratios, we encourage families to apply early to secure placement.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Do you accept mid-year transfer students?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Yes! We frequently welcome transfer students relocating to Central Florida or seeking a more individualized learning environment mid-semester. Our academic mentors perform an immediate diagnostic to transition credits seamlessly.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>How do I use my Step Up For Students scholarship here?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Simply provide your Step Up Award ID letter to our admissions office. We verify your award in the state portal and deduct the scholarship voucher directly from your family's annual tuition balance.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Can I schedule a free trial class before applying?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Absolutely! We believe experiencing our teaching firsthand is the best way to evaluate our academy. Click "Book Free Trial" anywhere on the site to schedule your 1:1 session with a certified tutor.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Do students wear school uniforms?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    For on-campus day students, uniforms are ordered directly through our official partner, Lands' End School. Uniforms build school pride, eliminate morning stress, and keep focus centered on learning.
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <a href="how-to-apply.php" class="btn btn-primary btn-lg">
                Start Your Application Today <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
