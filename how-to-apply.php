<?php
$page_title = "How to Apply & Admissions Guide | Mid Florida Scholars";
$page_description = "Step-by-step admissions guide for Mid Florida Scholars Academy. Learn how to schedule an academic evaluation, submit records, and enroll in K-12.";
$current_page = "how-to-apply";

$form_submitted = false;
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parent_name = trim($_POST['parent_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $student_name = trim($_POST['student_name'] ?? '');
    $grade = trim($_POST['grade'] ?? '');
    $notes = trim($_POST['notes'] ?? '');

    if (!empty($parent_name) && !empty($email) && !empty($phone)) {
        if (file_exists(__DIR__ . '/admin/includes/db.php')) {
            require_once __DIR__ . '/admin/includes/db.php';
            JsonDb::insert('tours', [
                'parent_name' => $parent_name,
                'student_name' => !empty($student_name) ? $student_name : 'Prospective Student',
                'email' => $email,
                'phone' => $phone,
                'grade_level' => !empty($grade) ? $grade : 'Not Specified',
                'tour_date' => date('Y-m-d', strtotime('+3 days')),
                'tour_time' => '10:00 AM',
                'status' => 'Pending',
                'interests' => $notes ?: 'Submitted via website How to Apply page'
            ]);
        }
        $form_submitted = true;
    } else {
        $error_message = "Please complete all required fields.";
    }
}

include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-file-signature"></i> Rolling Admissions
        </div>
        <h1>How to Apply &amp; Enrollment Guide</h1>
        <p>
            We welcome applications on a rolling basis throughout the year. Our personal, transparent process helps us get to know your child's distinct academic goals.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">About</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">How to Apply</strong>
        </div>
    </div>
</section>

<!-- 4-Step Application Roadmap (Cuemath Style) -->
<section style="padding: 70px 0; background: var(--bg-gray);">
    <div class="container text-center">
        <span class="section-tag"><i class="fas fa-road"></i> Simple Roadmap</span>
        <h2 class="section-title">The 4-Step Admissions <span class="highlight">Journey</span></h2>
        <p class="section-subtitle">
            From initial consultation to your child's first day in class, we ensure a seamless and supportive transition.
        </p>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; margin-top: 48px; text-align: left;">
            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px; border: 1px solid var(--border); box-shadow: var(--shadow-sm);">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--cuemath-yellow-light); color: #B38100; display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    01
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">1. Connect &amp; Free Trial</h4>
                <p style="font-size: 0.9rem; color: var(--ink-muted); line-height: 1.5;">
                    Submit the form below or book a free trial class to experience our 1:1 teaching methodology firsthand.
                </p>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px; border: 1px solid var(--border); box-shadow: var(--shadow-sm);">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-blue-light); color: var(--accent-blue); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    02
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">2. Diagnostic Check</h4>
                <p style="font-size: 0.9rem; color: var(--ink-muted); line-height: 1.5;">
                    Our certified academic counselor evaluates your child's foundational strengths, concept gaps, and learning style.
                </p>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px; border: 1px solid var(--border); box-shadow: var(--shadow-sm);">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-emerald-light); color: var(--accent-emerald); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    03
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">3. Tailored Roadmap</h4>
                <p style="font-size: 0.9rem; color: var(--ink-muted); line-height: 1.5;">
                    We design a customized learning roadmap aligned with your child's school curriculum and test targets.
                </p>
            </div>

            <div style="background: #FFFFFF; border-radius: var(--radius-lg); padding: 28px; border: 2px solid var(--cuemath-yellow); box-shadow: var(--shadow-md);">
                <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--cuemath-yellow); color: var(--ink); display: flex; align-items: center; justify-content: center; font-weight: 900; font-size: 1.2rem; margin-bottom: 16px;">
                    04
                </div>
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 8px;">4. Enrollment &amp; Mentor</h4>
                <p style="font-size: 0.9rem; color: var(--ink-muted); line-height: 1.5;">
                    Finalize enrollment, match with a top 1% dedicated mentor, and begin classes immediately!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Application Form & Information Section -->
<section style="padding: 80px 0; background: #FFFFFF;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 50px; align-items: flex-start;">
            <!-- Form Card -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-lg); overflow: hidden;">
                <div style="background: var(--cuemath-yellow); padding: 24px 30px;">
                    <h3 style="font-size: 1.5rem; font-weight: 900; color: var(--ink); margin-bottom: 4px;">Start Your Application</h3>
                    <p style="font-size: 0.9rem; color: var(--ink-secondary); margin: 0; font-weight: 600;">Submit your details and an admissions director will contact you within 24 hours.</p>
                </div>

                <div style="padding: 30px;">
                    <?php if ($form_submitted): ?>
                        <div style="background: var(--accent-emerald-light); border: 1px solid var(--accent-emerald); color: #008760; padding: 20px; border-radius: var(--radius-md); margin-bottom: 24px; text-align: center;">
                            <i class="fas fa-check-circle" style="font-size: 2rem; margin-bottom: 10px;"></i>
                            <h4 style="font-weight: 800; margin-bottom: 6px;">Application Received!</h4>
                            <p style="margin: 0; font-size: 0.95rem;">Thank you, <?php echo htmlspecialchars($parent_name); ?>. We have received your inquiry for <?php echo htmlspecialchars($student_name ?: 'your student'); ?> and will contact you shortly.</p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($error_message)): ?>
                        <div style="background: #FEE2E2; border: 1px solid #EF4444; color: #DC2626; padding: 14px; border-radius: var(--radius-md); margin-bottom: 20px;">
                            <?php echo htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="how-to-apply.php">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group">
                                <label>Parent's Name *</label>
                                <input type="text" name="parent_name" class="form-control" required placeholder="First &amp; Last Name">
                            </div>
                            <div class="form-group">
                                <label>Student's Name</label>
                                <input type="text" name="student_name" class="form-control" placeholder="Child's Name">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div class="form-group">
                                <label>Email Address *</label>
                                <input type="email" name="email" class="form-control" required placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label>Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" required placeholder="+1 (407) 555-0123">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Grade Level Applying For *</label>
                            <select name="grade" class="form-control" required>
                                <option value="">Select Grade</option>
                                <option>Kindergarten</option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option>Grade 5</option>
                                <option>Grade 6</option>
                                <option>Grade 7</option>
                                <option>Grade 8</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                                <option>Grade 11</option>
                                <option>Grade 12</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Notes / Academic Areas of Interest</label>
                            <textarea name="notes" class="form-control" rows="3" placeholder="Tell us about your child's goals, interests, or any questions you have..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: 10px;">
                            Submit Application Inquiry <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Admissions Info & Scholarship notice -->
            <div>
                <span class="badge-pill badge-emerald" style="margin-bottom: 12px;">Financial Support</span>
                <h3 style="font-size: 2rem; font-weight: 800; color: var(--ink); margin-bottom: 16px;">
                    Scholarships Accepted
                </h3>
                <p style="color: var(--ink-secondary); font-size: 1rem; line-height: 1.6; margin-bottom: 24px;">
                    Mid Florida Scholars Academy is an approved provider for Florida state school choice scholarships, making our college preparatory education accessible to all qualified Florida families.
                </p>

                <div style="background: var(--bg-gray); padding: 24px; border-radius: var(--radius-lg); border: 1px solid var(--border); margin-bottom: 24px;">
                    <div style="font-weight: 800; font-size: 1.1rem; color: var(--ink); margin-bottom: 10px;">
                        <i class="fas fa-check-circle text-emerald"></i> Approved State Scholarships:
                    </div>
                    <ul style="font-size: 0.95rem; color: var(--ink-muted); display: flex; flex-direction: column; gap: 8px;">
                        <li>• Step Up For Students (FES-EO &amp; FTC)</li>
                        <li>• Family Empowerment Scholarship for Unique Abilities (FES-UA)</li>
                        <li>• Hope Scholarship</li>
                        <li>• Need-based institutional tuition assistance</li>
                    </ul>
                </div>

                <a href="scholarships.php" class="btn btn-outline">
                    View Scholarship Guidelines <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
