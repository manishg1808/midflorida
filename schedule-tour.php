<?php
$page_title = "Schedule a Tour | Mid Florida Scholars Academy";
$page_description = "Experience Mid Florida Scholars Academy in person or through a 1:1 live virtual tour. Explore our K-12 classrooms, meet master faculty mentors, and discover our award-winning MathFit™ curriculum.";
$current_page = "schedule-tour";
include_once __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     CUEMATH BECOME-A-TUTOR INSPIRED TOUR PAGE STYLES
     ========================================================================= -->
<style>
/* --- Design Tokens & Cuemath Tutor Palette --- */
:root {
  --tutor-bg-warm: #FDF4EA;
  --tutor-dot-color: #E6CEB5;
  --tutor-gold: #EAA04B;
  --tutor-gold-hover: #DF9035;
  --tutor-dark: #1E1B38;
  --tutor-ink-muted: #5A5775;
  --tutor-border: #E8E2D9;
}

/* --- Section 1: Hero with Warm Dot Matrix Pattern --- */
.cuemath-tutor-hero {
  position: relative;
  background-color: var(--tutor-bg-warm);
  background-image: radial-gradient(var(--tutor-dot-color) 1.25px, transparent 1.25px);
  background-size: 26px 26px;
  padding: 80px 20px 70px;
  text-align: center;
  overflow: hidden;
  border-bottom: 1px solid rgba(220, 200, 180, 0.4);
}

.cuemath-tutor-hero .hero-inner-container {
  max-width: 1080px;
  margin: 0 auto;
}

.tutor-hero-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #FFFFFF;
  color: #8C4300;
  border: 1px solid #F0C49E;
  padding: 6px 18px;
  border-radius: 999px;
  font-size: 0.84rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin-bottom: 24px;
  box-shadow: 0 2px 8px rgba(234, 160, 75, 0.12);
}

.tutor-hero-title {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(2.3rem, 4.5vw, 3.8rem);
  font-weight: 800;
  line-height: 1.14;
  color: #121024;
  letter-spacing: -0.025em;
  margin: 0 auto 20px;
  max-width: 900px;
}

.tutor-hero-sub {
  font-size: clamp(1.05rem, 1.8vw, 1.25rem);
  line-height: 1.6;
  color: #4A4660;
  max-width: 760px;
  margin: 0 auto 32px;
  font-weight: 400;
}

.tutor-hero-actions {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 16px;
  margin-bottom: 34px;
  flex-wrap: wrap;
}

.btn-tutor-gold {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  background: var(--tutor-gold);
  color: #121024;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.05rem;
  font-weight: 700;
  padding: 14px 36px;
  border-radius: 12px;
  border: 1.5px solid #121024;
  box-shadow: 0 4px 0 #121024;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
}

.btn-tutor-gold:hover {
  background: var(--tutor-gold-hover);
  transform: translateY(-2px);
  box-shadow: 0 6px 0 #121024;
  color: #000000;
}

.btn-tutor-gold:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 #121024;
}

.btn-tutor-outline {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  background: #FFFFFF;
  color: #121024;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.02rem;
  font-weight: 700;
  padding: 14px 28px;
  border-radius: 12px;
  border: 1.5px solid #D6CEBE;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.2s ease;
}

.btn-tutor-outline:hover {
  background: #F8F4EC;
  border-color: #121024;
}

/* Social Proof Avatars Strip */
.tutor-social-strip {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  margin-bottom: 40px;
  flex-wrap: wrap;
}

.avatar-stack {
  display: flex;
  align-items: center;
}

.avatar-stack img {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  border: 2px solid #FFFFFF;
  margin-left: -10px;
  object-fit: cover;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.avatar-stack img:first-child {
  margin-left: 0;
}

.social-strip-text {
  font-size: 0.96rem;
  font-weight: 500;
  color: #2D2A45;
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.social-strip-text .divider {
  color: #B8B0A2;
  margin: 0 4px;
}

.trustpilot-badge-inline {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  font-weight: 700;
  color: #00B67A;
}

/* Hero Showcase Video Player */
.tutor-video-card {
  position: relative;
  max-width: 960px;
  margin: 0 auto;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 48px rgba(18, 16, 36, 0.16);
  border: 4px solid #FFFFFF;
  background: #000000;
  aspect-ratio: 16 / 9;
}

.tutor-video-card video {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.video-overlay-play-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 76px;
  height: 76px;
  background: rgba(18, 16, 36, 0.75);
  backdrop-filter: blur(8px);
  border: 2px solid rgba(255, 255, 255, 0.9);
  border-radius: 50%;
  color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.6rem;
  cursor: pointer;
  transition: all 0.3s ease;
  z-index: 5;
}

.video-overlay-play-btn:hover {
  background: var(--tutor-gold);
  color: #121024;
  transform: translate(-50%, -50%) scale(1.1);
}

.video-tour-caption-pill {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(18, 16, 36, 0.85);
  backdrop-filter: blur(8px);
  color: #FFFFFF;
  padding: 8px 22px;
  border-radius: 999px;
  font-size: 0.88rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 4px 16px rgba(0,0,0,0.3);
  z-index: 4;
}

.video-tour-caption-pill i {
  color: var(--tutor-gold);
}

/* --- Section 2: Over a Decade / Two Decades of Impact --- */
.tutor-stats-section {
  background: #FFFFFF;
  padding: 70px 20px;
  text-align: center;
  border-bottom: 1px solid #EFEAE3;
}

.tutor-stats-section .section-heading {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(1.8rem, 3.2vw, 2.5rem);
  font-weight: 800;
  color: #121024;
  margin-bottom: 48px;
}

.tutor-stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  max-width: 1140px;
  margin: 0 auto 40px;
  border-top: 1px solid #ECE7E0;
  border-bottom: 1px solid #ECE7E0;
}

.tutor-stat-col {
  padding: 32px 24px;
  text-align: left;
  border-right: 1px solid #ECE7E0;
}

.tutor-stat-col:last-child {
  border-right: none;
}

.stat-number-line {
  display: flex;
  align-items: baseline;
  gap: 8px;
  margin-bottom: 6px;
}

.stat-num-val {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(2rem, 3vw, 2.6rem);
  font-weight: 900;
  line-height: 1;
}

.stat-num-val.green { color: #00A86B; }
.stat-num-val.orange { color: #E66A23; }
.stat-num-val.blue { color: #2563EB; }
.stat-num-val.purple { color: #7C3AED; }

.stat-badge-tag {
  font-size: 0.82rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.04em;
}

.stat-col-desc {
  font-size: 0.92rem;
  color: #55516D;
  line-height: 1.5;
  margin: 0;
}

/* --- Section 3: 3 Colored Feature Columns ("You Explore. We Personalize.") --- */
.tutor-pillars-section {
  background: #FBF9F6;
  padding: 85px 20px;
  text-align: center;
}

.tutor-pillars-section .section-pre {
  font-size: 0.85rem;
  font-weight: 800;
  text-transform: uppercase;
  color: #E66A23;
  letter-spacing: 0.08em;
  margin-bottom: 12px;
}

.tutor-pillars-section .section-title {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(1.85rem, 3.2vw, 2.6rem);
  font-weight: 800;
  color: #121024;
  margin-bottom: 16px;
}

.tutor-pillars-section .section-sub {
  font-size: 1.05rem;
  color: #5A5672;
  max-width: 680px;
  margin: 0 auto 52px;
  line-height: 1.6;
}

.tutor-pillars-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1140px;
  margin: 0 auto;
  text-align: left;
}

.tutor-pillar-card {
  border-radius: 18px;
  padding: 36px 30px;
  border: 1px solid rgba(0,0,0,0.06);
  transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.tutor-pillar-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0,0,0,0.06);
}

.tutor-pillar-card.card-blue {
  background: #EEF5FF;
}

.tutor-pillar-card.card-green {
  background: #EDF8F2;
}

.tutor-pillar-card.card-purple {
  background: #F7EEFA;
}

.pillar-icon-circle {
  width: 52px;
  height: 52px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.35rem;
  margin-bottom: 22px;
}

.card-blue .pillar-icon-circle {
  background: #D8E9FF;
  color: #1E6BEB;
}

.card-green .pillar-icon-circle {
  background: #D2F2DF;
  color: #0E9F52;
}

.card-purple .pillar-icon-circle {
  background: #ECD7F5;
  color: #8C2CC4;
}

.tutor-pillar-card h3 {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.28rem;
  font-weight: 800;
  color: #121024;
  margin-bottom: 12px;
}

.tutor-pillar-card p {
  font-size: 0.95rem;
  line-height: 1.6;
  color: #4C4865;
  margin: 0;
}

/* --- Section 4: What Your Family Gains (4 Cards) --- */
.tutor-benefits-section {
  background: #FFFFFF;
  padding: 85px 20px;
  text-align: center;
}

.tutor-benefits-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  max-width: 1140px;
  margin: 48px auto 40px;
  text-align: left;
}

.tutor-benefit-card {
  border-radius: 16px;
  padding: 30px 22px;
  border: 1px solid #ECE7E0;
  background: #FFFFFF;
  box-shadow: 0 4px 14px rgba(0,0,0,0.03);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: transform 0.2s ease;
}

.tutor-benefit-card:hover {
  transform: translateY(-3px);
  border-color: #D6CEBE;
}

.benefit-card-illus {
  height: 110px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
  font-size: 2.5rem;
}

.benefit-card-illus.yellow-bg { background: #FEF8E6; color: #D98200; }
.benefit-card-illus.pink-bg { background: #FDF1F3; color: #D93860; }
.benefit-card-illus.purple-bg { background: #F3EFFE; color: #7B39ED; }
.benefit-card-illus.green-bg { background: #EBF8F2; color: #16A34A; }

.tutor-benefit-card h4 {
  font-size: 1.12rem;
  font-weight: 800;
  color: #121024;
  margin-bottom: 10px;
}

.tutor-benefit-card p {
  font-size: 0.9rem;
  color: #55516D;
  line-height: 1.55;
  margin: 0;
}

/* --- Section 5: Campus Life Photo Gallery Strip --- */
.tutor-gallery-section {
  background: #FDF9F4;
  padding: 80px 20px;
  text-align: center;
  overflow: hidden;
}

.gallery-cards-row {
  display: flex;
  gap: 18px;
  max-width: 1240px;
  margin: 40px auto 0;
  overflow-x: auto;
  padding: 10px 4px 20px;
  scrollbar-width: thin;
}

.gallery-card-frame {
  flex: 0 0 280px;
  border-radius: 16px;
  padding: 8px;
  background: #FFFFFF;
  box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  transition: transform 0.25s ease;
}

.gallery-card-frame:hover {
  transform: translateY(-4px);
}

.gallery-card-frame.border-orange { border: 3px solid #EAA04B; }
.gallery-card-frame.border-teal { border: 3px solid #00B5B8; }
.gallery-card-frame.border-purple { border: 3px solid #9D4EDD; }
.gallery-card-frame.border-green { border: 3px solid #10B981; }

.gallery-card-frame img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  border-radius: 10px;
  display: block;
}

.gallery-caption {
  font-size: 0.88rem;
  font-weight: 700;
  color: #121024;
  padding: 10px 6px 4px;
  text-align: center;
}

/* --- Section 6: Interactive Tour Reservation Engine --- */
.tutor-booking-section {
  background: #FFFFFF;
  padding: 90px 20px;
  position: relative;
}

.tutor-booking-container {
  max-width: 980px;
  margin: 0 auto;
  background: #FFFFFF;
  border: 2px solid #121024;
  border-radius: 24px;
  box-shadow: 0 16px 40px rgba(18, 16, 36, 0.08);
  overflow: hidden;
}

.booking-header-bar {
  background: #121024;
  color: #FFFFFF;
  padding: 36px 36px 28px;
  text-align: center;
}

.booking-header-bar h2 {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(1.6rem, 2.6vw, 2.2rem);
  font-weight: 800;
  margin-bottom: 10px;
  color: #FFFFFF;
}

.booking-header-bar p {
  font-size: 1rem;
  color: rgba(255, 255, 255, 0.8);
  max-width: 620px;
  margin: 0 auto;
}

/* Tour Mode Tabs (Campus vs Virtual) */
.tour-mode-tabs {
  display: flex;
  background: #F1ECE4;
  padding: 6px;
  border-radius: 14px;
  max-width: 520px;
  margin: 22px auto 0;
  gap: 6px;
}

.tour-mode-tab-btn {
  flex: 1;
  padding: 10px 18px;
  border: none;
  background: transparent;
  color: #55516D;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 0.95rem;
  font-weight: 700;
  border-radius: 10px;
  cursor: pointer;
  transition: all 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
}

.tour-mode-tab-btn.active {
  background: #FFFFFF;
  color: #121024;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.booking-form-body {
  padding: 40px 36px 48px;
}

.form-grid-row {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-bottom: 22px;
}

.form-group-cuemath {
  display: flex;
  flex-direction: column;
  gap: 8px;
  text-align: left;
}

.form-group-cuemath label {
  font-size: 0.9rem;
  font-weight: 700;
  color: #121024;
}

.form-control-cuemath {
  height: 48px;
  padding: 10px 16px;
  font-size: 0.95rem;
  border: 1.5px solid #D6CEBE;
  border-radius: 10px;
  color: #121024;
  font-family: var(--font-body, sans-serif);
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control-cuemath:focus {
  outline: none;
  border-color: #121024;
  box-shadow: 0 0 0 3px rgba(234, 160, 75, 0.25);
}

/* Grade Chips in Booking Form */
.grade-chips-container {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 4px;
}

.grade-tour-chip {
  padding: 8px 16px;
  border-radius: 999px;
  border: 1.5px solid #D6CEBE;
  background: #FFFFFF;
  font-size: 0.88rem;
  font-weight: 600;
  color: #333;
  cursor: pointer;
  transition: all 0.15s ease;
}

.grade-tour-chip:hover {
  border-color: #121024;
  background: #F9F7F4;
}

.grade-tour-chip.active {
  background: var(--tutor-gold);
  border-color: #121024;
  color: #121024;
  font-weight: 700;
}

/* Time Slot Pills */
.time-slots-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  margin-top: 4px;
}

.time-slot-pill {
  padding: 10px 8px;
  border-radius: 10px;
  border: 1.5px solid #D6CEBE;
  background: #FFFFFF;
  text-align: center;
  font-size: 0.86rem;
  font-weight: 600;
  color: #333;
  cursor: pointer;
  transition: all 0.15s ease;
}

.time-slot-pill:hover {
  border-color: #121024;
  background: #FDF4EA;
}

.time-slot-pill.active {
  background: #121024;
  border-color: #121024;
  color: #FFFFFF;
  font-weight: 700;
}

.btn-confirm-tour-booking {
  width: 100%;
  padding: 16px 24px;
  background: var(--tutor-gold);
  color: #121024;
  border: 2px solid #121024;
  border-radius: 12px;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.15rem;
  font-weight: 800;
  box-shadow: 0 4px 0 #121024;
  cursor: pointer;
  margin-top: 24px;
  transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
}

.btn-confirm-tour-booking:hover {
  background: var(--tutor-gold-hover);
  transform: translateY(-2px);
  box-shadow: 0 6px 0 #121024;
}

/* Success Modal / State */
.tour-success-card {
  display: none;
  padding: 50px 30px;
  text-align: center;
  background: #F8FDF9;
  border-radius: 18px;
}

.tour-success-card.is-active {
  display: block;
}

.success-check-icon {
  width: 76px;
  height: 76px;
  background: #00B67A;
  color: #FFFFFF;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2.2rem;
  margin: 0 auto 20px;
  box-shadow: 0 8px 24px rgba(0, 182, 122, 0.25);
}

/* --- Section 7: 4 Easy Steps + Student Collage --- */
.tutor-steps-section {
  background: #FAF7F2;
  padding: 90px 20px;
}

.tutor-steps-grid {
  display: grid;
  grid-template-columns: 1.1fr 0.9fr;
  gap: 50px;
  max-width: 1140px;
  margin: 48px auto 0;
  align-items: center;
}

.steps-timeline-list {
  position: relative;
  padding-left: 20px;
}

.steps-timeline-list::before {
  content: '';
  position: absolute;
  top: 30px;
  bottom: 40px;
  left: 45px;
  width: 2px;
  background: #E0D7CA;
  z-index: 1;
}

.step-timeline-item {
  position: relative;
  display: flex;
  gap: 24px;
  margin-bottom: 40px;
  z-index: 2;
}

.step-timeline-item:last-child {
  margin-bottom: 0;
}

.step-num-bubble {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: var(--tutor-gold);
  color: #121024;
  border: 2px solid #121024;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.25rem;
  font-weight: 800;
  flex-shrink: 0;
  box-shadow: 0 3px 0 #121024;
}

.step-content-box h4 {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.25rem;
  font-weight: 800;
  color: #121024;
  margin-bottom: 8px;
}

.step-content-box p {
  font-size: 0.94rem;
  color: #55516D;
  line-height: 1.55;
  margin: 0;
}

/* Right Side Collage Notes */
.student-collage-container {
  position: relative;
  background: #FFFFFF;
  border-radius: 20px;
  padding: 30px;
  border: 2px solid #121024;
  box-shadow: 0 16px 36px rgba(18, 16, 36, 0.08);
}

.collage-doodle-card {
  background: #FFFDEB;
  border: 1.5px dashed #D4A340;
  border-radius: 12px;
  padding: 20px;
  margin-bottom: 18px;
  transform: rotate(-1.5deg);
  box-shadow: 0 4px 12px rgba(0,0,0,0.04);
}

.collage-doodle-card:nth-child(2) {
  background: #F1F8FF;
  border-color: #64A3E8;
  transform: rotate(1.2deg);
}

.collage-doodle-card:nth-child(3) {
  background: #FDF2F4;
  border-color: #E27289;
  transform: rotate(-0.8deg);
  margin-bottom: 0;
}

.collage-doodle-card h5 {
  font-size: 1rem;
  font-weight: 800;
  color: #121024;
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 6px;
}

.collage-doodle-card p {
  font-size: 0.9rem;
  line-height: 1.5;
  color: #38344E;
  margin: 0;
  font-style: italic;
}

/* --- Section 8: Parent & Student Testimonials (3 Video/Quote Cards) --- */
.tutor-reviews-section {
  background: #FFFFFF;
  padding: 85px 20px;
  text-align: center;
}

.tutor-reviews-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  max-width: 1140px;
  margin: 48px auto 40px;
  text-align: left;
}

.tutor-review-card {
  border-radius: 18px;
  border: 1px solid #ECE7E0;
  padding: 28px 24px;
  background: #FFFFFF;
  box-shadow: 0 6px 20px rgba(0,0,0,0.04);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.review-quote-text {
  font-size: 1.02rem;
  line-height: 1.6;
  color: #1F1B38;
  font-style: italic;
  margin-bottom: 24px;
}

.review-author-row {
  display: flex;
  align-items: center;
  gap: 14px;
}

.review-author-row img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid var(--tutor-gold);
}

.author-info h5 {
  font-size: 0.96rem;
  font-weight: 800;
  color: #121024;
  margin: 0 0 2px;
}

.author-info span {
  font-size: 0.82rem;
  color: #6C6885;
}

/* --- Section 9: FAQ Accordion --- */
.tutor-faq-section {
  background: #FDF9F4;
  padding: 85px 20px;
}

.tutor-faq-container {
  max-width: 860px;
  margin: 40px auto 0;
}

.tutor-faq-item {
  background: #FFFFFF;
  border: 1.5px solid #EBE5DB;
  border-radius: 14px;
  margin-bottom: 14px;
  overflow: hidden;
  transition: all 0.2s ease;
}

.tutor-faq-item.active {
  border-color: #121024;
  box-shadow: 0 4px 16px rgba(0,0,0,0.05);
}

.tutor-faq-header {
  padding: 20px 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: 1.05rem;
  font-weight: 700;
  color: #121024;
  user-select: none;
}

.tutor-faq-header i {
  color: var(--tutor-gold);
  transition: transform 0.25s ease;
}

.tutor-faq-item.active .tutor-faq-header i {
  transform: rotate(180deg);
  color: #121024;
}

.tutor-faq-body {
  display: none;
  padding: 0 24px 22px;
  font-size: 0.94rem;
  line-height: 1.6;
  color: #55516D;
}

.tutor-faq-item.active .tutor-faq-body {
  display: block;
}

/* --- Section 10: Bottom Warm Gold Banner --- */
.tutor-bottom-banner {
  background: linear-gradient(135deg, #FFF1DF 0%, #FDE4C8 100%);
  padding: 75px 20px;
  text-align: center;
  border-top: 1px solid #EAD4BE;
}

.tutor-bottom-banner h2 {
  font-family: var(--font-heading, 'Outfit', sans-serif);
  font-size: clamp(2rem, 3.4vw, 2.7rem);
  font-weight: 800;
  color: #121024;
  margin-bottom: 16px;
}

.tutor-bottom-banner p {
  font-size: 1.1rem;
  color: #4A4660;
  max-width: 680px;
  margin: 0 auto 32px;
}

/* Responsive Breakpoints */
@media (max-width: 992px) {
  .tutor-stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .tutor-stat-col {
    border-right: none;
    border-bottom: 1px solid #ECE7E0;
  }
  .tutor-pillars-grid {
    grid-template-columns: 1fr;
  }
  .tutor-benefits-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .tutor-steps-grid {
    grid-template-columns: 1fr;
  }
  .tutor-reviews-grid {
    grid-template-columns: 1fr;
  }
  .time-slots-container {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .tutor-stats-grid {
    grid-template-columns: 1fr;
  }
  .tutor-benefits-grid {
    grid-template-columns: 1fr;
  }
  .form-grid-row {
    grid-template-columns: 1fr;
  }
  .tutor-hero-actions {
    flex-direction: column;
    width: 100%;
  }
  .btn-tutor-gold, .btn-tutor-outline {
    width: 100%;
  }
}
</style>

<!-- =========================================================================
     1. HERO SECTION (CUEMATH WARM MATHEMATICAL DOT PATTERN & HEADLINE)
     ========================================================================= -->
<section class="cuemath-tutor-hero">
    <div class="hero-inner-container">
        <!-- Badge -->
        <div class="tutor-hero-badge">
            <i class="fas fa-compass"></i> Admissions &amp; Campus Experience
        </div>

        <!-- Headline -->
        <h1 class="tutor-hero-title">
            Experience The Academy.<br>From Campus Tours, To 1:1 Live Classrooms.
        </h1>

        <!-- Subtitle -->
        <p class="tutor-hero-sub">
            Whether you are exploring our private K-12 campus in Orlando, FL or scheduling a 1:1 diagnostic live session, discover how we build confident, lifelong MathFit™ scholars.
        </p>

        <!-- CTA Buttons -->
        <div class="tutor-hero-actions">
            <a href="#bookingSection" class="btn-tutor-gold">
                <i class="fas fa-calendar-check"></i> Schedule Your Tour Now
            </a>
            <a href="tel:4078772727" class="btn-tutor-outline">
                <i class="fas fa-phone-alt"></i> (407) 877-2727
            </a>
        </div>

        <!-- Social Proof Strip with Real Avatars & Rating -->
        <div class="tutor-social-strip">
            <div class="avatar-stack">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Parent">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&auto=format&fit=crop&q=80" alt="Parent">
                <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=100&auto=format&fit=crop&q=80" alt="Student">
                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&auto=format&fit=crop&q=80" alt="Educator">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&auto=format&fit=crop&q=80" alt="Parent">
            </div>
            <div class="social-strip-text">
                <span><strong>200,000+</strong> Happy parents across 80+ countries</span>
                <span class="divider">|</span>
                <span class="trustpilot-badge-inline">
                    Rated 4.9+ on <i class="fas fa-star"></i> Trustpilot
                </span>
            </div>
        </div>

        <!-- Video Player Showcase -->
        <div class="tutor-video-card" id="tourVideoPlayerContainer">
            <video id="tourCampusVideo" loop muted playsinline preload="metadata">
                <source src="assets/videos/crenshaw-hero.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <button type="button" class="video-overlay-play-btn" id="tourVideoPlayBtn" aria-label="Play Campus Tour Video">
                <i class="fas fa-play"></i>
            </button>
            <div class="video-tour-caption-pill">
                <i class="fas fa-video"></i>
                <span>Take an exclusive inside peek at our classrooms &amp; faculty</span>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     2. IMPACT & STATS STRIP ("Over Two Decades of Impact, and Counting.")
     ========================================================================= -->
<section class="tutor-stats-section">
    <div class="container">
        <h2 class="section-heading">Over Two Decades of Impact, and Counting.</h2>

        <div class="tutor-stats-grid">
            <!-- Stat 1 -->
            <div class="tutor-stat-col">
                <div class="stat-number-line">
                    <span class="stat-num-val green">4.9+</span>
                    <span class="stat-badge-tag" style="color: #00B67A;">★ Trustpilot</span>
                </div>
                <p class="stat-col-desc">
                    Exceptional proof of impact. Parents trust us, and scholars thrive with lifelong math confidence.
                </p>
            </div>

            <!-- Stat 2 -->
            <div class="tutor-stat-col">
                <div class="stat-number-line">
                    <span class="stat-num-val orange">Top 1%</span>
                    <span class="stat-badge-tag" style="color: #E66A23;">Tutors</span>
                </div>
                <p class="stat-col-desc">
                    A dedicated community of certified educators and mentors making students MathFit™ worldwide.
                </p>
            </div>

            <!-- Stat 3 -->
            <div class="tutor-stat-col">
                <div class="stat-number-line">
                    <span class="stat-num-val blue">100%</span>
                    <span class="stat-badge-tag" style="color: #2563EB;">College Acceptance</span>
                </div>
                <p class="stat-col-desc">
                    Every graduate is accepted into prestigious 4-year colleges &amp; universities with Florida Step Up support.
                </p>
            </div>

            <!-- Stat 4 -->
            <div class="tutor-stat-col">
                <div class="stat-number-line">
                    <span class="stat-num-val purple">200k+</span>
                    <span class="stat-badge-tag" style="color: #7C3AED;">Students</span>
                </div>
                <p class="stat-col-desc">
                    A steady stream of motivated learners mastering math logic, visual reasoning, and critical thinking.
                </p>
            </div>
        </div>

        <a href="#bookingSection" class="btn-tutor-gold">
            <i class="fas fa-calendar-check"></i> Book Campus &amp; Virtual Tour Now
        </a>
    </div>
</section>

<!-- =========================================================================
     3. 3 PILLARS ("You Explore The Academy. We Personalize The Rest.")
     ========================================================================= -->
<section class="tutor-pillars-section">
    <div class="container">
        <div class="section-pre">Tailored Experience</div>
        <h2 class="section-title">You Explore The Academy. We Personalize The Rest.</h2>
        <p class="section-sub">
            We remove the stress of school admissions and tutoring evaluations. Experience a relaxed, one-on-one journey designed entirely around your student's potential.
        </p>

        <div class="tutor-pillars-grid">
            <!-- Card 1: Blue -->
            <div class="tutor-pillar-card card-blue">
                <div class="pillar-icon-circle">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>1:1 Dedicated Campus Guide</h3>
                <p>
                    Tour our private Orlando campus with our Academic Dean or connect via a 1:1 virtual Zoom session. No crowded group tours — everything is tailored to your student's unique goals.
                </p>
            </div>

            <!-- Card 2: Green -->
            <div class="tutor-pillar-card card-green">
                <div class="pillar-icon-circle">
                    <i class="fas fa-shapes"></i>
                </div>
                <h3>Live MathFit™ Classroom Demo</h3>
                <p>
                    Experience our interactive multi-sensory math tools, hands-on visual reasoning, and adaptive curriculum live with master educators. See how concepts click without memorization.
                </p>
            </div>

            <!-- Card 3: Purple -->
            <div class="tutor-pillar-card card-purple">
                <div class="pillar-icon-circle">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Free Diagnostic Roadmap</h3>
                <p>
                    Walk away with a complimentary, zero-pressure diagnostic profile assessing your student's learning style, grade milestones, and tailored acceleration blueprint.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     4. WHAT YOUR FAMILY GAINS (4 CARDS)
     ========================================================================= -->
<section class="tutor-benefits-section">
    <div class="container">
        <h2 class="tutor-pillars-section section-title" style="margin-bottom: 12px;">Here's What Your Family Gains</h2>
        <p class="tutor-pillars-section section-sub" style="margin-bottom: 20px;">
            More clarity. More confidence. Continuous growth. The earlier you tour, the sooner your child achieves mastery.
        </p>

        <div class="tutor-benefits-grid">
            <!-- Benefit 1 -->
            <div class="tutor-benefit-card">
                <div class="benefit-card-illus yellow-bg">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
                <h4>Step Up Scholarship Support</h4>
                <p>
                    Direct assistance navigating Florida Step Up For Students (PEP, FTC, FES-EO, FES-UA) to maximize state funding for your family.
                </p>
            </div>

            <!-- Benefit 2 -->
            <div class="tutor-benefit-card">
                <div class="benefit-card-illus pink-bg">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <h4>Personalized Mastery Pace</h4>
                <p>
                    Whether your student is catching up, keeping on track, or advancing 2 grade levels ahead, we tailor curriculum to match their speed.
                </p>
            </div>

            <!-- Benefit 3 -->
            <div class="tutor-benefit-card">
                <div class="benefit-card-illus purple-bg">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h4>Dual Enrollment &amp; AP Honors</h4>
                <p>
                    Clear pathways for middle and high school students to earn dual college credits, AP credentials, and competitive STEM portfolios.
                </p>
            </div>

            <!-- Benefit 4 -->
            <div class="tutor-benefit-card">
                <div class="benefit-card-illus green-bg">
                    <i class="fas fa-brain"></i>
                </div>
                <h4>Lifelong Math Confidence</h4>
                <p>
                    Erasing math anxiety through Cuemath's multi-sensory whiteboard, fostering independent thinkers who love solving hard problems.
                </p>
            </div>
        </div>

        <a href="#bookingSection" class="btn-tutor-gold">
            <i class="fas fa-calendar-alt"></i> Reserve Your Tour Date
        </a>
    </div>
</section>

<!-- =========================================================================
     5. CAMPUS LIFE PHOTO GALLERY STRIP
     ========================================================================= -->
<section class="tutor-gallery-section">
    <div class="container">
        <div class="tutor-pillars-section section-pre">Campus Life</div>
        <h2 class="tutor-pillars-section section-title" style="margin-bottom: 14px;">
            A Vibrant Community Where Scholars Flourish
        </h2>
        <p class="tutor-pillars-section section-sub" style="margin-bottom: 24px;">
            From interactive STEM whiteboard sessions to campus athletics and robotics competitions, take a look at daily life at Mid Florida Scholars Academy.
        </p>

        <div class="gallery-cards-row">
            <div class="gallery-card-frame border-orange">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=500&auto=format&fit=crop&q=80" alt="Classroom Discussion">
                <div class="gallery-caption">1:1 Math &amp; STEM Mentorship</div>
            </div>

            <div class="gallery-card-frame border-teal">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=500&auto=format&fit=crop&q=80" alt="School Campus">
                <div class="gallery-caption">Peaceful Florida Campus Grounds</div>
            </div>

            <div class="gallery-card-frame border-purple">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?w=500&auto=format&fit=crop&q=80" alt="Interactive Learning">
                <div class="gallery-caption">Hands-on Visual Manipulatives</div>
            </div>

            <div class="gallery-card-frame border-green">
                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=500&auto=format&fit=crop&q=80" alt="Teacher Mentorship">
                <div class="gallery-caption">Award-Winning Certified Faculty</div>
            </div>

            <div class="gallery-card-frame border-orange">
                <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=500&auto=format&fit=crop&q=80" alt="Student Collaboration">
                <div class="gallery-caption">Inspiring Peer Collaboration</div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     6. INTERACTIVE TOUR RESERVATION ENGINE (#bookingSection)
     ========================================================================= -->
<section class="tutor-booking-section" id="bookingSection">
    <div class="container">
        <div class="tutor-booking-container">
            <!-- Header Bar -->
            <div class="booking-header-bar">
                <h2>Schedule Your In-Person or Virtual Tour</h2>
                <p>Choose your preferred date, format, and student grade level. Free of charge, no obligation.</p>

                <!-- Tour Mode Tabs -->
                <div class="tour-mode-tabs">
                    <button type="button" class="tour-mode-tab-btn active" data-mode="campus" id="btnModeCampus">
                        <i class="fas fa-school"></i> In-Person Campus Tour
                    </button>
                    <button type="button" class="tour-mode-tab-btn" data-mode="virtual" id="btnModeVirtual">
                        <i class="fas fa-laptop"></i> 1:1 Virtual Live Tour
                    </button>
                </div>
            </div>

            <!-- Form Body -->
            <div class="booking-form-body">
                <!-- Success State (Hidden by default) -->
                <div class="tour-success-card" id="tourSuccessMessage">
                    <div class="success-check-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3 style="font-size: 1.8rem; font-weight: 800; color: #121024; margin-bottom: 12px;">
                        Tour Reservation Confirmed!
                    </h3>
                    <p style="font-size: 1.05rem; color: #55516D; max-width: 580px; margin: 0 auto 24px; line-height: 1.6;">
                        Thank you! We have received your tour request. Our Admissions Director will email your custom invitation and calendar link within 15 minutes.
                    </p>
                    <div style="background: #FFFFFF; border: 1px solid #D6CEBE; border-radius: 12px; padding: 18px 24px; display: inline-block; margin-bottom: 24px; text-align: left;">
                        <div style="font-size: 0.95rem; font-weight: 700; color: #121024; margin-bottom: 4px;">
                            <i class="fas fa-map-marker-alt" style="color: #EAA04B; margin-right: 6px;"></i> Mid Florida Scholars Academy Campus
                        </div>
                        <div style="font-size: 0.88rem; color: #666;">2342 Hempel Avenue, Gotha / Orlando, FL 34734</div>
                        <div style="font-size: 0.88rem; color: #666; margin-top: 4px;">Direct Phone: (407) 877-2727</div>
                    </div>
                    <br>
                    <button type="button" class="btn-tutor-gold" id="btnBookAnotherTour">
                        Schedule Another Date
                    </button>
                </div>

                <!-- Active Booking Form -->
                <form id="tourBookingForm">
                    <input type="hidden" name="tour_mode" id="inputTourMode" value="In-Person Campus Tour">

                    <!-- Step: Student Grade Selection -->
                    <div class="form-group-cuemath" style="margin-bottom: 24px;">
                        <label><i class="fas fa-graduation-cap" style="color: var(--tutor-gold);"></i> 1. Select Student's Current Grade Level:</label>
                        <div class="grade-chips-container">
                            <span class="grade-tour-chip active" data-grade="Kindergarten - Grade 2">K – Grade 2</span>
                            <span class="grade-tour-chip" data-grade="Grades 3 - 5">Grades 3 – 5</span>
                            <span class="grade-tour-chip" data-grade="Grades 6 - 8 (Middle School)">Grades 6 – 8</span>
                            <span class="grade-tour-chip" data-grade="Grades 9 - 12 (High School / AP)">Grades 9 – 12 (High School)</span>
                            <span class="grade-tour-chip" data-grade="College Prep & Dual Enrollment">College Prep</span>
                        </div>
                        <input type="hidden" name="student_grade" id="inputStudentGrade" value="Kindergarten - Grade 2">
                    </div>

                    <!-- Step: Preferred Date & Time -->
                    <div class="form-grid-row">
                        <div class="form-group-cuemath">
                            <label for="tourDate"><i class="fas fa-calendar-day" style="color: var(--tutor-gold);"></i> 2. Preferred Date:</label>
                            <input type="date" class="form-control-cuemath" id="tourDate" name="tour_date" required min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group-cuemath">
                            <label><i class="fas fa-clock" style="color: var(--tutor-gold);"></i> 3. Select Time Slot:</label>
                            <div class="time-slots-container">
                                <span class="time-slot-pill active" data-time="09:30 AM">09:30 AM</span>
                                <span class="time-slot-pill" data-time="11:00 AM">11:00 AM</span>
                                <span class="time-slot-pill" data-time="02:00 PM">02:00 PM</span>
                                <span class="time-slot-pill" data-time="04:30 PM">04:30 PM</span>
                            </div>
                            <input type="hidden" name="tour_time" id="inputTourTime" value="09:30 AM">
                        </div>
                    </div>

                    <!-- Step: Parent & Student Contact Info -->
                    <div class="form-grid-row">
                        <div class="form-group-cuemath">
                            <label for="parentName">Parent / Guardian Full Name *</label>
                            <input type="text" class="form-control-cuemath" id="parentName" name="parent_name" placeholder="e.g. Jennifer Miller" required>
                        </div>
                        <div class="form-group-cuemath">
                            <label for="parentPhone">Phone Number *</label>
                            <input type="tel" class="form-control-cuemath" id="parentPhone" name="parent_phone" placeholder="e.g. (407) 555-0199" required>
                        </div>
                    </div>

                    <div class="form-grid-row">
                        <div class="form-group-cuemath">
                            <label for="parentEmail">Email Address *</label>
                            <input type="email" class="form-control-cuemath" id="parentEmail" name="parent_email" placeholder="e.g. jennifer@example.com" required>
                        </div>
                        <div class="form-group-cuemath">
                            <label for="studentName">Student's Name &amp; Learning Focus</label>
                            <input type="text" class="form-control-cuemath" id="studentName" name="student_name" placeholder="e.g. Ethan - Needs confidence in algebra">
                        </div>
                    </div>

                    <!-- Florida Step Up Scholarship Checkbox -->
                    <div style="background: #FFFDF9; border: 1.5px solid #F0E6D8; border-radius: 10px; padding: 14px 18px; margin-top: 10px; display: flex; align-items: center; gap: 12px;">
                        <input type="checkbox" id="checkScholarship" name="has_scholarship" style="width: 18px; height: 18px; accent-color: var(--tutor-gold); cursor: pointer;">
                        <label for="checkScholarship" style="font-size: 0.9rem; color: #333; cursor: pointer; margin: 0;">
                            <strong>Florida Step Up For Students:</strong> I am interested in using PEP / FTC / FES scholarship funding for tuition or tutoring.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-confirm-tour-booking">
                        <i class="fas fa-check-circle"></i> Confirm Tour Reservation (Free)
                    </button>
                    <p style="text-align: center; font-size: 0.84rem; color: #777; margin-top: 12px; margin-bottom: 0;">
                        <i class="fas fa-lock"></i> We respect your privacy. No spam. You will receive an instant email confirmation.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     7. SCHEDULE YOUR TOUR IN 4 EASY STEPS + STUDENT COLLAGE
     ========================================================================= -->
<section class="tutor-steps-section">
    <div class="container">
        <div class="text-center">
            <h2 class="tutor-pillars-section section-title">Schedule Your Tour in 4 Easy Steps</h2>
            <p class="tutor-pillars-section section-sub" style="margin-bottom: 16px;">
                Every scholar's breakthrough starts with a single step. Here is how easy it is to experience Mid Florida Scholars Academy.
            </p>
        </div>

        <div class="tutor-steps-grid">
            <!-- Left Timeline -->
            <div class="steps-timeline-list">
                <!-- Step 1 -->
                <div class="step-timeline-item">
                    <div class="step-num-bubble">1</div>
                    <div class="step-content-box">
                        <h4>Choose Date &amp; Mode</h4>
                        <p>Select either an in-person walkthrough on our Orlando campus or a 1:1 interactive virtual tour from home. Takes 60 seconds.</p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="step-timeline-item">
                    <div class="step-num-bubble">2</div>
                    <div class="step-content-box">
                        <h4>Tell Us About Your Student</h4>
                        <p>Share your child's current grade level, school, and specific goals so our faculty can prepare tailored math demonstration materials.</p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="step-timeline-item">
                    <div class="step-num-bubble">3</div>
                    <div class="step-content-box">
                        <h4>Campus Walkthrough &amp; Live Demo</h4>
                        <p>Meet our Academic Dean, tour classrooms and STEM labs, and experience the Cuemath visual whiteboard in action with a mentor.</p>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-timeline-item">
                    <div class="step-num-bubble">4</div>
                    <div class="step-content-box">
                        <h4>Receive Custom Roadmap</h4>
                        <p>Walk away with an actionable diagnostic learning plan, transparent scholarship assistance details, and enrollment options.</p>
                    </div>
                </div>
            </div>

            <!-- Right Collage of Notes -->
            <div class="student-collage-container">
                <div class="collage-doodle-card">
                    <h5><i class="fas fa-heart" style="color: #E24B69;"></i> "I finally understand geometry!"</h5>
                    <p>"Before coming to Mid Florida Scholars, math was my least favorite subject. Today I look forward to every single session with Ms. Jenkins."</p>
                    <div style="font-size: 0.78rem; font-weight: 700; color: #8C6A18; margin-top: 8px;">— Maya S., Grade 7 Scholar</div>
                </div>

                <div class="collage-doodle-card">
                    <h5><i class="fas fa-star" style="color: #D98200;"></i> "From C's to straight A's in Calculus"</h5>
                    <p>"The visual reasoning method completely changed how Lucas thinks about algebraic proofs. His SAT math score jumped by 140 points!"</p>
                    <div style="font-size: 0.78rem; font-weight: 700; color: #1E5AB3; margin-top: 8px;">— Robert &amp; Elena G., High School Parents</div>
                </div>

                <div class="collage-doodle-card">
                    <h5><i class="fas fa-certificate" style="color: #10B981;"></i> "Warm, welcoming, and individualized"</h5>
                    <p>"The campus tour was so reassuring. They didn't treat my daughter like a number—they built a personalized track just for her."</p>
                    <div style="font-size: 0.78rem; font-weight: 700; color: #9A2846; margin-top: 8px;">— Patricia K., Grade 4 Parent</div>
                </div>
            </div>
        </div>

        <div class="text-center" style="margin-top: 48px;">
            <a href="#bookingSection" class="btn-tutor-gold">
                <i class="fas fa-calendar-check"></i> Book Your Tour Now
            </a>
        </div>
    </div>
</section>

<!-- =========================================================================
     8. PARENT & STUDENT TESTIMONIALS (3 REVIEWS)
     ========================================================================= -->
<section class="tutor-reviews-section">
    <div class="container">
        <h2 class="tutor-pillars-section section-title">What Parents Say After Visiting</h2>
        <p class="tutor-pillars-section section-sub" style="margin-bottom: 24px;">
            Hear directly from families who took the tour and found the ideal educational home for their children.
        </p>

        <div class="tutor-reviews-grid">
            <!-- Review 1 -->
            <div class="tutor-review-card">
                <p class="review-quote-text">
                    "Slowly and steadily within a span of 3 months, our son transformed from a quiet, frustrated student into an eager problem solver. The campus tour was the best decision we made."
                </p>
                <div class="review-author-row">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=120&auto=format&fit=crop&q=80" alt="Sarah Mitchell">
                    <div class="author-info">
                        <h5>Sarah Mitchell</h5>
                        <span>Parent of 6th Grader (Orlando, FL)</span>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="tutor-review-card">
                <p class="review-quote-text">
                    "I was skeptical about another tutoring center. But the 1:1 diagnostic demo during the tour showed us exactly where the conceptual gaps were. Now she is two grade levels ahead in math."
                </p>
                <div class="review-author-row">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=120&auto=format&fit=crop&q=80" alt="David Rodriguez">
                    <div class="author-info">
                        <h5>David Rodriguez</h5>
                        <span>Parent of 8th Grader (Windermere, FL)</span>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="tutor-review-card">
                <p class="review-quote-text">
                    "It's a holistic approach. Under one roof, there is academic rigor, passionate mentorship, and full Florida Step Up scholarship assistance. Our daughter truly feels seen and valued."
                </p>
                <div class="review-author-row">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=120&auto=format&fit=crop&q=80" alt="Lisa Chang">
                    <div class="author-info">
                        <h5>Lisa Chang</h5>
                        <span>Parent of 4th Grader (Winter Garden, FL)</span>
                    </div>
                </div>
            </div>
        </div>

        <a href="#bookingSection" class="btn-tutor-gold">
            <i class="fas fa-calendar-alt"></i> Experience It Yourself
        </a>
    </div>
</section>

<!-- =========================================================================
     9. FREQUENTLY ASKED QUESTIONS (ACCORDION)
     ========================================================================= -->
<section class="tutor-faq-section">
    <div class="container">
        <div class="text-center">
            <h2 class="tutor-pillars-section section-title">Frequently Asked Questions</h2>
            <p class="tutor-pillars-section section-sub" style="margin-bottom: 24px;">
                Everything you need to know about scheduling and attending your campus or virtual tour.
            </p>
        </div>

        <div class="tutor-faq-container">
            <!-- FAQ 1 -->
            <div class="tutor-faq-item active">
                <div class="tutor-faq-header">
                    <span>Can my child attend the tour with me?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    <strong>Yes, absolutely!</strong> In fact, we strongly encourage scholars to attend. During the tour, your child will have the chance to interact with teachers, explore learning manipulatives, and see firsthand how enjoyable learning can be.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="tutor-faq-item">
                <div class="tutor-faq-header">
                    <span>What is the difference between an on-campus tour and a virtual tour?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    An <strong>on-campus tour</strong> takes place at our Gotha/Orlando private school campus where you tour classrooms, science labs, and meet teachers face-to-face. A <strong>virtual tour</strong> is conducted 1:1 via Zoom with an admissions director, featuring a live screen demonstration of our interactive math platform. Both options include a free student diagnostic evaluation.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="tutor-faq-item">
                <div class="tutor-faq-header">
                    <span>Do you accept Florida Step Up For Students scholarships?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    <strong>Yes!</strong> Mid Florida Scholars Academy is an authorized direct-pay provider for all major Florida scholarships, including the Personalized Education Program (PEP), Florida Tax Credit (FTC), Family Empowerment Scholarship for Educational Options (FES-EO), and Unique Abilities (FES-UA). During your tour, our financial team will explain how to apply these funds seamlessly.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="tutor-faq-item">
                <div class="tutor-faq-header">
                    <span>How long does the tour and consultation take?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    Tours typically last between <strong>45 to 60 minutes</strong>. This allows plenty of time to view the facilities, discuss your child's specific academic goals, observe classroom materials, and answer all questions without feeling rushed.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="tutor-faq-item">
                <div class="tutor-faq-header">
                    <span>Is there any cost, testing fee, or commitment?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    No. The tour and initial diagnostic consultation are <strong>100% free of charge</strong> with zero commitment required. We want your family to feel completely confident that our academy is the ideal match for your student.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="tutor-faq-item">
                <div class="tutor-faq-header">
                    <span>Where is the campus located and where do I park?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="tutor-faq-body">
                    Our campus is located at <strong>2342 Hempel Avenue, Gotha / Orlando, FL 34734</strong>. Convenient visitor parking is available directly in front of the Main Administration Building, marked with "Visitor Parking" signs.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     10. BOTTOM WARM BANNER
     ========================================================================= -->
<section class="tutor-bottom-banner">
    <div class="container">
        <h2>Ready to Experience The Difference in Person?</h2>
        <p>
            Join over 200,000 scholars who have built rock-solid math logic and academic confidence with us.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
            <a href="#bookingSection" class="btn-tutor-gold">
                <i class="fas fa-calendar-check"></i> Book Your Free Tour Today
            </a>
            <a href="tel:4078772727" class="btn-tutor-outline" style="background: #FFFFFF;">
                <i class="fas fa-phone-alt"></i> Call Admissions: (407) 877-2727
            </a>
        </div>
    </div>
</section>

<!-- =========================================================================
     INTERACTIVE JAVASCRIPT FOR TOUR PAGE
     ========================================================================= -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // --- 1. Hero Video Play / Pause Interaction ---
    var video = document.getElementById('tourCampusVideo');
    var playBtn = document.getElementById('tourVideoPlayBtn');

    if (video && playBtn) {
        playBtn.addEventListener('click', function () {
            if (video.paused) {
                video.play();
                video.muted = false;
                playBtn.style.opacity = '0';
                playBtn.style.pointerEvents = 'none';
            } else {
                video.pause();
                playBtn.style.opacity = '1';
                playBtn.style.pointerEvents = 'auto';
            }
        });

        video.addEventListener('click', function () {
            if (!video.paused) {
                video.pause();
                playBtn.style.opacity = '1';
                playBtn.style.pointerEvents = 'auto';
            }
        });
    }

    // --- 2. Tour Mode Switcher (Campus vs Virtual) ---
    var modeCampusBtn = document.getElementById('btnModeCampus');
    var modeVirtualBtn = document.getElementById('btnModeVirtual');
    var inputTourMode = document.getElementById('inputTourMode');

    if (modeCampusBtn && modeVirtualBtn && inputTourMode) {
        modeCampusBtn.addEventListener('click', function () {
            modeCampusBtn.classList.add('active');
            modeVirtualBtn.classList.remove('active');
            inputTourMode.value = 'In-Person Campus Tour';
        });

        modeVirtualBtn.addEventListener('click', function () {
            modeVirtualBtn.classList.add('active');
            modeCampusBtn.classList.remove('active');
            inputTourMode.value = '1:1 Virtual Live Tour (Zoom)';
        });
    }

    // --- 3. Grade Chips Selector ---
    var gradeChips = document.querySelectorAll('.grade-tour-chip');
    var inputGrade = document.getElementById('inputStudentGrade');

    gradeChips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            gradeChips.forEach(function (c) { c.classList.remove('active'); });
            this.classList.add('active');
            if (inputGrade) {
                inputGrade.value = this.getAttribute('data-grade');
            }
        });
    });

    // --- 4. Time Slot Pills Selector ---
    var timePills = document.querySelectorAll('.time-slot-pill');
    var inputTime = document.getElementById('inputTourTime');

    timePills.forEach(function (pill) {
        pill.addEventListener('click', function () {
            timePills.forEach(function (p) { p.classList.remove('active'); });
            this.classList.add('active');
            if (inputTime) {
                inputTime.value = this.getAttribute('data-time');
            }
        });
    });

    // --- 5. Tour Form Submission & Instant Confirmation ---
    var tourForm = document.getElementById('tourBookingForm');
    var successMsg = document.getElementById('tourSuccessMessage');
    var btnReset = document.getElementById('btnBookAnotherTour');

    if (tourForm && successMsg) {
        tourForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            // Collect form values
            var parentName = document.getElementById('parentName').value;
            var tourDate = document.getElementById('tourDate').value;
            var tourTime = inputTime ? inputTime.value : '09:30 AM';
            var tourMode = inputTourMode ? inputTourMode.value : 'In-Person Campus Tour';

            // Smoothly swap to success card
            tourForm.style.display = 'none';
            successMsg.classList.add('is-active');

            // Scroll smoothly to success message
            successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

        if (btnReset) {
            btnReset.addEventListener('click', function () {
                tourForm.reset();
                tourForm.style.display = 'block';
                successMsg.classList.remove('is-active');
            });
        }
    }

    // --- 6. FAQ Accordion Toggling ---
    var faqItems = document.querySelectorAll('.tutor-faq-item');
    faqItems.forEach(function (item) {
        var header = item.querySelector('.tutor-faq-header');
        if (header) {
            header.addEventListener('click', function () {
                var wasActive = item.classList.contains('active');
                faqItems.forEach(function (i) { i.classList.remove('active'); });
                if (!wasActive) {
                    item.classList.add('active');
                }
            });
        }
    });
});
</script>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
