<?php
$page_title = "Book a Free 1:1 Live Trial Class | Mid Florida Scholars";
$page_description = "Experience our 1:1 live interactive classes with a top 1% certified mentor. 100% free with comprehensive student evaluation report.";
$current_page = "free-trial";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-sparkles"></i> 100% Free • No Credit Card Required
        </div>
        <h1>Book Your Free 1:1 Trial Class</h1>
        <p>
            Meet an expert mentor, experience our interactive visual math workspace, and receive a comprehensive diagnostic evaluation of your child's learning gaps.
        </p>
    </div>
</section>

<!-- Direct Booking Form Section -->
<section style="padding: 60px 0 90px; background: var(--bg-gray);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: flex-start;">
            <!-- Left: Value Props & What Happens -->
            <div>
                <span class="badge-pill badge-yellow" style="margin-bottom: 14px;">What Happens in the Free Trial?</span>
                <h2 style="font-size: 2.3rem; font-weight: 800; color: var(--ink); margin-bottom: 20px;">
                    55 Minutes of Dedicated <span class="text-brand">1:1 Mentorship</span>
                </h2>
                <p style="color: var(--ink-muted); font-size: 1.05rem; line-height: 1.6; margin-bottom: 30px;">
                    This isn't a generic sales demo or a prerecorded video. Your child works 1-on-1 with an elite certified educator on real curriculum concepts.
                </p>

                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="display: flex; gap: 16px; background: #FFFFFF; padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border);">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--cuemath-yellow-light); color: #B38100; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                            <i class="fas fa-search-plus"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 4px;">1. Diagnostic Skill Check</h4>
                            <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">We pinpoint your child's exact learning level, strengths, and underlying concept gaps.</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; background: #FFFFFF; padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border);">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-blue-light); color: var(--accent-blue); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 4px;">2. Interactive Problem Solving</h4>
                            <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">Child interacts directly on our visual math whiteboard with instant encouragement.</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 16px; background: #FFFFFF; padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border);">
                        <div style="width: 44px; height: 44px; border-radius: 12px; background: var(--accent-emerald-light); color: var(--accent-emerald); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <div>
                            <h4 style="font-size: 1.1rem; font-weight: 800; margin-bottom: 4px;">3. Parent Feedback &amp; Report</h4>
                            <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">A personalized roadmap with actionable steps to achieve higher school grades.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Booking Form Card -->
            <div style="background: #FFFFFF; border-radius: var(--radius-xl); border: 1px solid var(--border); box-shadow: var(--shadow-lg); overflow: hidden;">
                <div style="background: var(--cuemath-yellow); padding: 24px 30px;">
                    <h3 style="font-size: 1.45rem; font-weight: 900; color: var(--ink); margin-bottom: 4px;">Schedule Free 1:1 Class</h3>
                    <p style="font-size: 0.9rem; color: var(--ink-secondary); margin: 0; font-weight: 600;">Takes less than 60 seconds</p>
                </div>

                <div style="padding: 30px;">
                    <form onsubmit="event.preventDefault(); alert('🎉 Success! Your free 1:1 trial class has been requested. Our admissions counselor will call you shortly to confirm your time slot.');">
                        <div class="form-group">
                            <label>Child's Grade</label>
                            <select class="form-control" required>
                                <option value="">Select Grade</option>
                                <option>Kindergarten</option>
                                <option>Grade 1</option>
                                <option>Grade 2</option>
                                <option>Grade 3</option>
                                <option>Grade 4</option>
                                <option selected>Grade 5</option>
                                <option>Grade 6</option>
                                <option>Grade 7</option>
                                <option>Grade 8</option>
                                <option>Grade 9</option>
                                <option>Grade 10</option>
                                <option>Grade 11–12 (SAT &amp; AP)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Parent's Full Name</label>
                            <input type="text" class="form-control" placeholder="e.g. Sarah Jenkins" required>
                        </div>

                        <div class="form-group">
                            <label>Parent's Phone Number (for WhatsApp/SMS details)</label>
                            <input type="tel" class="form-control" placeholder="+1 (407) 555-0123" required>
                        </div>

                        <div class="form-group">
                            <label>Parent's Email Address</label>
                            <input type="email" class="form-control" placeholder="sarah@example.com" required>
                        </div>

                        <div class="form-group">
                            <label>Child's Current Academic Goal</label>
                            <select class="form-control">
                                <option>Build Strong Foundations &amp; Conceptual Clarity</option>
                                <option>Improve School Test Grades &amp; Homework</option>
                                <option>SAT / ACT Math &amp; College Prep</option>
                                <option>Math Olympiad &amp; Advanced Competitions</option>
                                <option>Overcome Math Anxiety</option>
                            </select>
                        </div>

                        <div style="margin: 20px 0; font-size: 0.82rem; color: var(--ink-muted); display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-lock text-emerald"></i> Your contact details are 100% private and protected.
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            Confirm &amp; Book Trial Class <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
