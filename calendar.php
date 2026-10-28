<?php
$page_title = "Academic School Calendar 2026-2027 | Mid Florida Scholars";
$page_description = "Official 2026-2027 academic calendar, holidays, marking periods, and key dates for Mid Florida Scholars Academy.";
$current_page = "calendar";
include_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-calendar-alt"></i> 2026–2027 Academic Year
        </div>
        <h1>School Calendar &amp; Important Dates</h1>
        <p>
            Stay synchronized with key semester dates, marking periods, holidays, and student milestones throughout the academic year.
        </p>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <a href="about.php">Our School</a>
            <i class="fas fa-chevron-right"></i>
            <strong style="color: var(--cuemath-yellow);">Calendar</strong>
        </div>
    </div>
</section>

<!-- Calendar Events List Section (Cuemath Style) -->
<section style="padding: 70px 0 90px; background: var(--bg-gray);">
    <div class="container" style="max-width: 900px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <span class="section-tag"><i class="fas fa-clock"></i> Upcoming Events</span>
            <h2 class="section-title">Academic Milestones &amp; <span class="highlight">Holidays</span></h2>
            <div style="margin-top: 16px;">
                <button type="button" onclick="alert('Downloading 2026-2027 Academic Calendar PDF...');" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-pdf"></i> Download Official Calendar (PDF)
                </button>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 16px;">
            <!-- Event 1 -->
            <div style="background: #FFFFFF; border-radius: var(--radius-md); border: 1px solid var(--border); padding: 20px 24px; display: flex; align-items: center; gap: 24px; box-shadow: var(--shadow-xs);">
                <div style="width: 68px; height: 68px; background: var(--cuemath-yellow-light); border: 1px solid var(--cuemath-yellow); border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; flex-shrink: 0;">
                    <span style="font-family: var(--font-heading); font-size: 1.6rem; font-weight: 900; color: var(--ink); line-height: 1;">30</span>
                    <span style="font-size: 0.75rem; font-weight: 800; color: #B38100; text-transform: uppercase;">OCT</span>
                </div>
                <div style="flex: 1;">
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-blue); text-transform: uppercase; margin-bottom: 2px;">School Schedule</div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--ink); margin-bottom: 4px;">Half Day - Fall Festivities</h3>
                    <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">Dismissal at 12:00 PM for all divisions. Afternoon 1:1 online sessions continue as normal.</p>
                </div>
            </div>

            <!-- Event 2 -->
            <div style="background: #FFFFFF; border-radius: var(--radius-md); border: 1px solid var(--border); padding: 20px 24px; display: flex; align-items: center; gap: 24px; box-shadow: var(--shadow-xs);">
                <div style="width: 68px; height: 68px; background: var(--accent-blue-light); border: 1px solid var(--accent-blue); border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; flex-shrink: 0;">
                    <span style="font-family: var(--font-heading); font-size: 1.6rem; font-weight: 900; color: var(--accent-blue); line-height: 1;">23</span>
                    <span style="font-size: 0.75rem; font-weight: 800; color: var(--accent-blue); text-transform: uppercase;">NOV</span>
                </div>
                <div style="flex: 1;">
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-emerald); text-transform: uppercase; margin-bottom: 2px;">Holiday Break</div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--ink); margin-bottom: 4px;">Thanksgiving Recess</h3>
                    <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">Campus and administrative offices closed through Friday, November 27. Classes resume Monday, Nov 30.</p>
                </div>
            </div>

            <!-- Event 3 -->
            <div style="background: #FFFFFF; border-radius: var(--radius-md); border: 1px solid var(--border); padding: 20px 24px; display: flex; align-items: center; gap: 24px; box-shadow: var(--shadow-xs);">
                <div style="width: 68px; height: 68px; background: var(--accent-emerald-light); border: 1px solid var(--accent-emerald); border-radius: var(--radius-sm); display: flex; flex-direction: column; align-items: center; justify-content: center; flex-shrink: 0;">
                    <span style="font-family: var(--font-heading); font-size: 1.6rem; font-weight: 900; color: var(--accent-emerald); line-height: 1;">18</span>
                    <span style="font-size: 0.75rem; font-weight: 800; color: var(--accent-emerald); text-transform: uppercase;">DEC</span>
                </div>
                <div style="flex: 1;">
                    <div style="font-size: 0.8rem; font-weight: 700; color: var(--accent-blue); text-transform: uppercase; margin-bottom: 2px;">Semester Milestone</div>
                    <h3 style="font-size: 1.2rem; font-weight: 800; color: var(--ink); margin-bottom: 4px;">End of Semester 1 &bull; Winter Break Begins</h3>
                    <p style="font-size: 0.9rem; color: var(--ink-muted); margin: 0;">Final examinations completed. Winter recess continues through January 4, 2027.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bottom CTA Banner -->
<?php include_once __DIR__ . '/includes/cta-tour.php'; ?>

<?php include_once __DIR__ . '/includes/footer.php'; ?>
