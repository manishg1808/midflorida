<?php
$page_title = "Academic FAQs | Mid Florida Scholars";
$page_description = "Frequently asked questions regarding academics, curriculum, class sizes, dual enrollment, grading, and college prep at Mid Florida Scholars Academy.";
$current_page = "academic-faq";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-question-circle"></i> Curriculum &amp; Learning
        </div>
        <h1>Academic Frequently Asked Questions</h1>
        <p>
            Find clear answers about our teaching methodology, curriculum standards, 1:1 online classes, dual enrollment, and college readiness.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="academics-overview.php">Academics</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Academic FAQ</strong>
        </div>
    </div>
</section>

<!-- FAQ Accordion Section (Cuemath Style) -->
<section class="faq-section">
    <div class="container">
        <div class="faq-container text-left">
            <div class="faq-item active">
                <button type="button" class="faq-question">
                    <span>What are the student-to-teacher ratios at Mid Florida Scholars?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Our ratios are strictly capped: <strong>1:1 for live online personalized classes</strong>, <strong>12:1 in Lower School (K–5)</strong>, and <strong>15:1 in Middle (6–8) and Upper School (9–12)</strong>. These intimate sizes ensure no student is ever left behind or unnoticed.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>How does your Cuemath-inspired visual math methodology work?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Instead of memorizing algorithmic steps blindly, students use virtual manipulatives (bar models, ten-frames, algebraic tiles) to visualize problems. Certified mentors guide students through Socratic questioning so they deduce formulas on their own.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>When does foreign language instruction begin?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Spanish instruction begins right in <strong>Kindergarten</strong>. In Lower School, children learn through songs, conversational vocabulary, and storytelling. Middle and Upper School students advance to rigorous college-prep Spanish I through Spanish IV.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>How does dual enrollment work, and who is eligible?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Eligible students can begin dual enrollment as early as middle school, continuing into high school through partnerships with Valencia College and USF. Students earn transferable university credits at zero additional tuition expense.
                </div>
            </div>

            <div class="faq-item">
                <button type="button" class="faq-question">
                    <span>Is Mid Florida Scholars Academy accredited?</span>
                    <span class="faq-toggle-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="faq-answer">
                    Yes. We hold full international accreditation through <strong>Cognia</strong> (formerly SACS - Southern Association of Colleges and Schools). Our high school diploma is universally recognized by colleges and universities nationwide.
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 40px;">
            <p style="color: var(--ink-muted); margin-bottom: 16px;">Have more questions? Speak with an academic advisor directly.</p>
            <button type="button" class="btn btn-primary open-trial-modal">
                Book a Free Consultation <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
