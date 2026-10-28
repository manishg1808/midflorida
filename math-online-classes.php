<?php
$page_title = "Live 1:1 Online Classes for Grades K–12 | Mid Florida Scholars";
$page_description = "Personalized online classes for Kindergarten through Grade 12. Build strong foundational mastery, excel in school exams, and prepare for AP & SAT.";
$current_page = "math-online-classes";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Cuemath Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-shapes"></i> Comprehensive K–12 Curriculum
        </div>
        <h1>Live 1:1 Online Classes for Grades K–12</h1>
        <p>
            Customized learning plans designed to develop deep conceptual clarity, logical thinking, and academic confidence at your child's pace.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Online Classes</strong>
        </div>
    </div>
</section>

<!-- Grade Switcher Subnav (Cuemath Exact Layout) -->
<nav class="cm-grade-subnav" aria-label="Grade Navigation">
    <div class="cm-grade-subnav-inner">
        <a href="math-online-classes-k2.php" class="cm-grade-nav-item">Class K-2</a>
        <a href="math-online-classes-3-5.php" class="cm-grade-nav-item">Class 3-5</a>
        <a href="math-online-classes.php" class="cm-grade-nav-item active">Class 6-8</a>
    </div>
</nav>

<!-- Grade Switcher Section -->
<section class="grade-explorer-section" style="padding-top: 50px;">
    <div class="container text-center">
        <!-- Grade Pills -->
        <div class="grade-tabs-nav">
            <button type="button" class="grade-tab-btn active" data-grade="k-2">
                Kindergarten – Grade 2 <span class="tab-badge">Ages 4–7</span>
            </button>
            <button type="button" class="grade-tab-btn" data-grade="3-5">
                Grades 3 – 5 <span class="tab-badge">Ages 8–10</span>
            </button>
            <button type="button" class="grade-tab-btn" data-grade="6-8">
                Grades 6 – 8 <span class="tab-badge">Ages 11–13</span>
            </button>
            <button type="button" class="grade-tab-btn" data-grade="9-12">
                Grades 9 – 12 <span class="tab-badge">Ages 14–18</span>
            </button>
        </div>

        <!-- Grade K-2 Details -->
        <div class="grade-content-panel active" id="grade-panel-k-2">
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); padding: 40px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); text-align: left; margin-bottom: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 24px;">
                    <div>
                        <span class="badge-pill badge-yellow">Early Years Foundations</span>
                        <h2 style="font-size: 2.2rem; font-weight: 800; margin-top: 8px;">Kindergarten to Grade 2 Curriculum</h2>
                        <p style="color: var(--ink-muted); font-size: 1.05rem; max-width: 650px;">
                            At this foundational stage, children learn best by seeing, touching, and playing. We use visual manipulatives and gamified puzzle stories to create an intuitive relationship with numbers.
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary open-trial-modal">
                        Book K–2 Trial Class <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <div class="curriculum-card-grid">
                    <div class="curriculum-card">
                        <div class="curriculum-icon-wrap"><i class="fas fa-coins"></i></div>
                        <h3 class="curriculum-card-title">Number Sense &amp; Counting</h3>
                        <p class="curriculum-card-desc">Understanding quantity, tens frames, number lines, skip counting by 2s, 5s, 10s, and place value basics.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Counting up to 100 with ten-frames</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Comparing quantities (Greater than, less than)</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Decomposing numbers into tens and ones</div>
                        </div>
                    </div>

                    <div class="curriculum-card blue-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-plus-minus"></i></div>
                        <h3 class="curriculum-card-title">Addition &amp; Subtraction Intuition</h3>
                        <p class="curriculum-card-desc">Mastering fact families, number bonds, and mental math strategies without relying on finger counting.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Making 10 strategies</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Double and near-double facts</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Story word problems with real-world toys</div>
                        </div>
                    </div>

                    <div class="curriculum-card emerald-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-cube"></i></div>
                        <h3 class="curriculum-card-title">Shapes, Space &amp; Measurement</h3>
                        <p class="curriculum-card-desc">Exploring basic 2D &amp; 3D shapes, attributes, telling time to the hour/half-hour, and coin values.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Identifying sides, corners, faces</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Clock reading and calendar cycles</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Measuring length using non-standard units</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grade 3-5 Details -->
        <div class="grade-content-panel" id="grade-panel-3-5">
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); padding: 40px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); text-align: left; margin-bottom: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 24px;">
                    <div>
                        <span class="badge-pill badge-blue">Elementary Mastery</span>
                        <h2 style="font-size: 2.2rem; font-weight: 800; margin-top: 8px;">Grades 3 to 5 Curriculum</h2>
                        <p style="color: var(--ink-muted); font-size: 1.05rem; max-width: 650px;">
                            The crucial bridge from basic counting to multi-step reasoning. We master multiplication tables conceptually and unpack fractions using visual pie and bar models.
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary open-trial-modal">
                        Book Grade 3–5 Trial <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <div class="curriculum-card-grid">
                    <div class="curriculum-card">
                        <div class="curriculum-icon-wrap"><i class="fas fa-times"></i></div>
                        <h3 class="curriculum-card-title">Operations &amp; Algebraic Thinking</h3>
                        <p class="curriculum-card-desc">Multi-digit multiplication, long division with remainders, factors, prime factorization, and order of operations (PEMDAS).</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Array multiplication &amp; area model</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Divisibility rules &amp; mental math</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Multi-step word problems</div>
                        </div>
                    </div>

                    <div class="curriculum-card blue-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-chart-pie"></i></div>
                        <h3 class="curriculum-card-title">Fractions &amp; Decimals Visuals</h3>
                        <p class="curriculum-card-desc">De-mystifying equivalent fractions, unlike denominators, decimal conversions, and percentages.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Fraction addition with visual strips</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Mixed numbers &amp; improper fractions</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Decimals to hundredths &amp; money problems</div>
                        </div>
                    </div>

                    <div class="curriculum-card emerald-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-ruler-combined"></i></div>
                        <h3 class="curriculum-card-title">Geometry, Perimeter &amp; Area</h3>
                        <p class="curriculum-card-desc">Angles, classification of quadrilaterals, perimeter vs area formulas, and basic volume of prisms.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Acute, right, and obtuse angles</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Area of rectangular and composite figures</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Reading line plots, bar charts &amp; tables</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grade 6-8 Details -->
        <div class="grade-content-panel" id="grade-panel-6-8">
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); padding: 40px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); text-align: left; margin-bottom: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 24px;">
                    <div>
                        <span class="badge-pill badge-emerald">Middle School Pre-Algebra</span>
                        <h2 style="font-size: 2.2rem; font-weight: 800; margin-top: 8px;">Grades 6 to 8 Curriculum</h2>
                        <p style="color: var(--ink-muted); font-size: 1.05rem; max-width: 650px;">
                            Preparing students for high school honors and advanced tracks. We tackle variables, linear graphs, Euclidean geometry proofs, and probability models.
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary open-trial-modal">
                        Book Grade 6–8 Trial <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <div class="curriculum-card-grid">
                    <div class="curriculum-card">
                        <div class="curriculum-icon-wrap"><i class="fas fa-percentage"></i></div>
                        <h3 class="curriculum-card-title">Ratios &amp; Proportional Reasoning</h3>
                        <p class="curriculum-card-desc">Unit rates, speed-distance-time, scale factor drawings, percentage increase/decrease, and financial math.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Constant of proportionality (k = y/x)</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Markups, discounts &amp; sales tax</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Direct and inverse variations</div>
                        </div>
                    </div>

                    <div class="curriculum-card blue-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-subscript"></i></div>
                        <h3 class="curriculum-card-title">Pre-Algebra &amp; Linear Functions</h3>
                        <p class="curriculum-card-desc">Integer operations, multi-step equations, inequalities, coordinate plane graphing, and slope-intercept form (y = mx + b).</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Solving equations with brackets &amp; variables</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Graphing linear lines &amp; slopes</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Systems of equations by substitution</div>
                        </div>
                    </div>

                    <div class="curriculum-card emerald-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-shapes"></i></div>
                        <h3 class="curriculum-card-title">Transformations &amp; Pythagorean Theorem</h3>
                        <p class="curriculum-card-desc">Rotations, reflections, dilations, square roots, Pythagorean theorem proofs, and volume of cylinders/cones/spheres.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Pythagorean theorem in 2D &amp; 3D</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Congruency &amp; similarity transformations</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Surface area and volume formulas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grade 9-12 Details -->
        <div class="grade-content-panel" id="grade-panel-9-12">
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); padding: 40px; border: 1px solid var(--border); box-shadow: var(--shadow-sm); text-align: left; margin-bottom: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px; margin-bottom: 24px;">
                    <div>
                        <span class="badge-pill badge-yellow">High School &amp; College Prep</span>
                        <h2 style="font-size: 2.2rem; font-weight: 800; margin-top: 8px;">Grades 9 to 12 Curriculum</h2>
                        <p style="color: var(--ink-muted); font-size: 1.05rem; max-width: 650px;">
                            Rigorous college preparatory tracks including Algebra II, Trigonometry, Pre-Calculus, AP Calculus AB/BC, AP Statistics, and SAT/ACT Math prep.
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary open-trial-modal">
                        Book High School Trial <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

                <div class="curriculum-card-grid">
                    <div class="curriculum-card">
                        <div class="curriculum-icon-wrap"><i class="fas fa-project-diagram"></i></div>
                        <h3 class="curriculum-card-title">Algebra II &amp; Functions</h3>
                        <p class="curriculum-card-desc">Quadratic equations, complex numbers, polynomial division, exponential and logarithmic equations, and matrix math.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Parabola properties &amp; vertex form</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Logarithm rules &amp; exponential growth</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Rational functions &amp; asymptotes</div>
                        </div>
                    </div>

                    <div class="curriculum-card blue-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-infinity"></i></div>
                        <h3 class="curriculum-card-title">AP Calculus AB / BC</h3>
                        <p class="curriculum-card-desc">Differential &amp; integral calculus aligned directly with College Board standards to guarantee a score of 5 on the AP Exam.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Derivatives, chain rule &amp; implicit differentiation</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Riemann sums, definite &amp; indefinite integrals</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Taylor series &amp; parametric calculus (BC)</div>
                        </div>
                    </div>

                    <div class="curriculum-card emerald-theme">
                        <div class="curriculum-icon-wrap"><i class="fas fa-award"></i></div>
                        <h3 class="curriculum-card-title">SAT &amp; ACT Math Mastery</h3>
                        <p class="curriculum-card-desc">Targeted 750+ SAT Math program focused on high-frequency question patterns, speed shortcuts, and error log reviews.</p>
                        <div class="curriculum-topics-list">
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Digital SAT adaptive module strategies</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Desmos graphing calculator mastery</div>
                            <div class="curriculum-topic-item"><i class="fas fa-check"></i> Full diagnostic tests with score analysis</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
