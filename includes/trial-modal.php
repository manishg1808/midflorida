<?php
// Cuemath Interactive Free Trial & Video Modals
?>
<!-- Free Trial Multi-Step Interactive Modal -->
<div class="trial-modal-backdrop" id="trialModalBackdrop">
    <div class="trial-modal-card">
        <div class="modal-header-banner">
            <button type="button" class="modal-close-btn" id="closeTrialModal" aria-label="Close modal">&times;</button>
            <h3>Book a Free 1:1 Live Trial Class</h3>
            <p>Experience personalized learning with top 1% certified teachers</p>
        </div>
        <div class="modal-step-progress">
            <div class="progress-fill" id="modalProgressFill"></div>
        </div>
        <div class="modal-body">
            <!-- Step 1: Grade Selection -->
            <div class="modal-step-pane active" id="modalStep1">
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 6px;">Select Your Child's Grade</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); margin-bottom: 16px;">We customize the syllabus and teaching approach according to the child's grade.</p>
                
                <div class="grade-options-grid">
                    <div class="grade-select-pill" data-val="Kindergarten">Kindergarten</div>
                    <div class="grade-select-pill" data-val="Class 1">Grade 1</div>
                    <div class="grade-select-pill" data-val="Class 2">Grade 2</div>
                    <div class="grade-select-pill" data-val="Class 3">Grade 3</div>
                    <div class="grade-select-pill" data-val="Class 4">Grade 4</div>
                    <div class="grade-select-pill selected" data-val="Class 5">Grade 5</div>
                    <div class="grade-select-pill" data-val="Class 6">Grade 6</div>
                    <div class="grade-select-pill" data-val="Class 7">Grade 7</div>
                    <div class="grade-select-pill" data-val="Class 8">Grade 8</div>
                    <div class="grade-select-pill" data-val="Class 9">Grade 9</div>
                    <div class="grade-select-pill" data-val="Class 10">Grade 10</div>
                    <div class="grade-select-pill" data-val="Class 11-12">Grade 11-12</div>
                </div>

                <div style="margin-top: 24px; text-align: right;">
                    <button type="button" class="btn btn-primary" id="btnToStep2" style="width: 100%;">
                        Next: Learning Goals <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Learning Goal & Contact -->
            <div class="modal-step-pane" id="modalStep2">
                <h4 style="font-size: 1.15rem; font-weight: 800; margin-bottom: 6px;">Child's Primary Learning Goal</h4>
                <p style="font-size: 0.88rem; color: var(--ink-muted); margin-bottom: 16px;">Help the tutor prepare a customized assessment.</p>
                
                <div class="form-group">
                    <label>What are you looking to achieve?</label>
                    <select class="form-control" id="trialGoal">
                        <option value="Strong Foundations & Conceptual Clarity">Build Strong Foundations & Conceptual Clarity</option>
                        <option value="Score Higher in School Exams">Score Higher in School & Board Exams</option>
                        <option value="Olympiad & Competitive Prep">Math Olympiad & Advanced Competitive Prep</option>
                        <option value="Overcome Math Phobia">Overcome Math Anxiety & Gain Confidence</option>
                        <option value="College Prep & AP Calculus">College Prep, SAT/ACT & AP Calculus</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Parent's Mobile Number (for confirmation WhatsApp/SMS)</label>
                    <input type="tel" class="form-control" id="trialPhone" placeholder="+1 (407) 555-0199 / +91 98765 43210" required>
                </div>

                <div class="form-group">
                    <label>Parent's Full Name</label>
                    <input type="text" class="form-control" id="trialParentName" placeholder="e.g. Robert Smith" required>
                </div>

                <div style="margin-top: 24px; display: flex; gap: 12px;">
                    <button type="button" class="btn btn-primary" id="btnToStep3" style="flex: 1;">
                        Continue <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3: Schedule Confirmation -->
            <div class="modal-step-pane" id="modalStep3">
                <div style="text-align: center; padding: 10px 0 20px;">
                    <div style="width: 56px; height: 56px; background: var(--cuemath-yellow-light); color: #B38100; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 1.6rem; margin-bottom: 12px;">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h4 style="font-size: 1.25rem; font-weight: 800; margin-bottom: 6px;">Select Preferred Trial Time</h4>
                    <p style="font-size: 0.9rem; color: var(--ink-muted);">Grade: <strong id="trialConfirmGrade" style="color: var(--ink);">Grade 5</strong> • 1:1 Live 55-Min Session</p>
                </div>

                <div class="form-group">
                    <label>Select Preferred Day</label>
                    <select class="form-control">
                        <option>Today (Immediate next available slot)</option>
                        <option>Tomorrow (Morning 10:00 AM - 12:00 PM)</option>
                        <option>Tomorrow (Evening 4:00 PM - 7:00 PM)</option>
                        <option>Weekend (Saturday / Sunday slots)</option>
                    </select>
                </div>

                <div style="background: var(--bg-gray); padding: 14px; border-radius: var(--radius-sm); margin-bottom: 20px; font-size: 0.85rem; color: var(--ink-muted); display: flex; gap: 10px; align-items: center;">
                    <i class="fas fa-shield-alt text-emerald" style="font-size: 1.2rem;"></i>
                    <span>100% Free • No credit card required • Comprehensive evaluation report delivered after class.</span>
                </div>

                <button type="button" class="btn btn-primary" id="btnFinishTrial" style="width: 100%;">
                    Confirm &amp; Book Trial Class <i class="fas fa-check-circle"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Video Modal Player -->
<div class="video-modal-backdrop" id="videoModalBackdrop">
    <div class="video-modal-content">
        <button type="button" class="video-close-btn" id="closeVideoModal">&times;</button>
        <iframe id="videoPlayerFrame" width="100%" height="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
