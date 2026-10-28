<?php
if (!isset($page_title)) {
    $page_title = "Mid Florida Scholars Academy | Private K-12 Orlando, FL & 1:1 Math Excellence";
}
if (!isset($page_description)) {
    $page_description = "Mid Florida Scholars Academy is an accredited private K-12 college-preparatory school in Orlando, FL, partnering with Cuemath 1:1 live interactive learning.";
}
if (!isset($current_page)) {
    $current_page = basename($_SERVER['PHP_SELF'], ".php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="assets/images/midflorida-logo-white.svg">
    
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Master Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo file_exists(__DIR__ . '/../assets/css/style.css') ? filemtime(__DIR__ . '/../assets/css/style.css') : '4.0'; ?>">
</head>
<body>

    <!-- 2-Tier Header: Mid Florida Scholars Academy Navigation System -->
    <header class="crenshaw-header-wrapper <?php echo ($current_page == 'index') ? 'header-transparent-floating' : ''; ?>">
        <!-- Tier 1: Clean White Utility Top Bar -->
        <div class="crenshaw-top-bar">
            <div class="crenshaw-container">
                <div class="crenshaw-top-inner">
                    <!-- Brand Shield Logo -->
                    <a href="index.php" class="crenshaw-brand-link" title="Mid Florida Scholars Academy | Private K-12 Orlando, FL">
                        <img src="assets/images/midflorida-logo-dark.svg" alt="Mid Florida Scholars Academy" class="crenshaw-brand-logo">
                    </a>

                    <!-- Right Utility Actions -->
                    <div class="crenshaw-top-right">
                        <!-- Direct Phone Contact -->
                        <a href="tel:4077572241" class="crenshaw-phone-link" title="Call Mid Florida Scholars Academy">
                            <span class="phone-number">407-757-2241</span>
                        </a>

                        <!-- Dark Navy Portal Pill Button -->
                        <a href="admin/login.php" class="crenshaw-portal-pill" title="Student & Parent Portal Login">
                            <i class="fas fa-user-friends"></i>
                            <span>Student / Parent Portal</span>
                        </a>

                        <!-- Social Media Links -->
                        <div class="crenshaw-social-icons">
                            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" class="social-circle-link" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer" class="social-circle-link" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tier 2: Deep Navy Main Navigation Bar -->
        <nav class="crenshaw-main-nav" id="crenshawMainNav">
            <div class="crenshaw-container">
                <div class="crenshaw-nav-inner">
                    <!-- Brand Logo -->
                    <a href="index.php" class="crenshaw-sticky-brand" title="Mid Florida Scholars Academy">
                        <img src="assets/images/midflorida-logo-white.svg" alt="Mid Florida Scholars Academy">
                    </a>

                    <!-- Menu Links -->
                    <ul class="crenshaw-menu-list" id="navMenu">
                        <!-- Home -->
                        <li class="crenshaw-menu-item <?php echo ($current_page == 'index') ? 'active' : ''; ?>">
                            <a href="index.php" class="crenshaw-nav-link">Home</a>
                        </li>

                        <!-- Our School ▾ -->
                        <li class="crenshaw-menu-item has-dropdown <?php echo in_array($current_page, ['about', 'leadership', 'accreditation', 'testimonials', 'calendar']) ? 'active' : ''; ?>">
                            <a href="about.php" class="crenshaw-nav-link">
                                Our School <i class="fas fa-caret-down nav-caret"></i>
                            </a>
                            <div class="crenshaw-dropdown">
                                <a href="about.php" class="crenshaw-drop-link <?php echo ($current_page == 'about') ? 'active' : ''; ?>">
                                    About Mid Florida Scholars Academy
                                </a>
                                <a href="leadership.php" class="crenshaw-drop-link <?php echo ($current_page == 'leadership') ? 'active' : ''; ?>">
                                    Leadership &amp; Faculty
                                </a>
                                <a href="accreditation.php" class="crenshaw-drop-link <?php echo ($current_page == 'accreditation') ? 'active' : ''; ?>">
                                    Accreditation &amp; Standards
                                </a>
                                <a href="testimonials.php" class="crenshaw-drop-link <?php echo ($current_page == 'testimonials') ? 'active' : ''; ?>">
                                    Testimonials &amp; Parent Reviews
                                </a>
                                <a href="calendar.php" class="crenshaw-drop-link <?php echo ($current_page == 'calendar') ? 'active' : ''; ?>">
                                    School Calendar &amp; Term Dates
                                </a>
                            </div>
                        </li>

                        <!-- Academics ▾ -->
                        <li class="crenshaw-menu-item has-dropdown <?php echo in_array($current_page, ['academics-overview', 'lower-school', 'middle-school', 'upper-school', 'math-online-classes', 'after-school-tutoring']) ? 'active' : ''; ?>">
                            <a href="academics-overview.php" class="crenshaw-nav-link">
                                Academics <i class="fas fa-caret-down nav-caret"></i>
                            </a>
                            <div class="crenshaw-dropdown">
                                <a href="academics-overview.php" class="crenshaw-drop-link <?php echo ($current_page == 'academics-overview') ? 'active' : ''; ?>">
                                    Academic Overview
                                </a>
                                <a href="lower-school.php" class="crenshaw-drop-link <?php echo ($current_page == 'lower-school') ? 'active' : ''; ?>">
                                    Lower School (Grades K–5)
                                </a>
                                <a href="middle-school.php" class="crenshaw-drop-link <?php echo ($current_page == 'middle-school') ? 'active' : ''; ?>">
                                    Middle School (Grades 6–8)
                                </a>
                                <a href="upper-school.php" class="crenshaw-drop-link <?php echo ($current_page == 'upper-school') ? 'active' : ''; ?>">
                                    Upper School (Grades 9–12)
                                </a>
                                <a href="math-online-classes-k2.php" class="crenshaw-drop-link <?php echo ($current_page == 'math-online-classes-k2') ? 'active' : ''; ?>">
                                    Math Classes: Class K–2
                                </a>
                                <a href="math-online-classes-3-5.php" class="crenshaw-drop-link <?php echo ($current_page == 'math-online-classes-3-5') ? 'active' : ''; ?>">
                                    Math Classes: Class 3–5
                                </a>
                                <a href="math-online-classes.php" class="crenshaw-drop-link <?php echo ($current_page == 'math-online-classes') ? 'active' : ''; ?>">
                                    1:1 Online Math Tutoring
                                </a>
                                <a href="after-school-tutoring.php" class="crenshaw-drop-link <?php echo ($current_page == 'after-school-tutoring') ? 'active' : ''; ?>">
                                    After-School Tutoring
                                </a>
                            </div>
                        </li>

                        <!-- Student Life ▾ -->
                        <li class="crenshaw-menu-item has-dropdown <?php echo in_array($current_page, ['clubs-activities', 'sports', 'alumni-success']) ? 'active' : ''; ?>">
                            <a href="clubs-activities.php" class="crenshaw-nav-link">
                                Student Life <i class="fas fa-caret-down nav-caret"></i>
                            </a>
                            <div class="crenshaw-dropdown">
                                <a href="clubs-activities.php" class="crenshaw-drop-link <?php echo ($current_page == 'clubs-activities') ? 'active' : ''; ?>">
                                    Clubs &amp; Student Activities
                                </a>
                                <a href="sports.php" class="crenshaw-drop-link <?php echo ($current_page == 'sports') ? 'active' : ''; ?>">
                                    Athletics &amp; Sports
                                </a>
                                <a href="alumni-success.php" class="crenshaw-drop-link <?php echo ($current_page == 'alumni-success') ? 'active' : ''; ?>">
                                    Alumni Success Stories
                                </a>
                            </div>
                        </li>

                        <!-- Admissions ▾ -->
                        <li class="crenshaw-menu-item has-dropdown <?php echo in_array($current_page, ['how-to-apply', 'tuition-fees', 'scholarships', 'admissions-faq', 'pricing']) ? 'active' : ''; ?>">
                            <a href="how-to-apply.php" class="crenshaw-nav-link">
                                Admissions <i class="fas fa-caret-down nav-caret"></i>
                            </a>
                            <div class="crenshaw-dropdown">
                                <a href="how-to-apply.php" class="crenshaw-drop-link <?php echo ($current_page == 'how-to-apply') ? 'active' : ''; ?>">
                                    How to Apply
                                </a>
                                <a href="tuition-fees.php" class="crenshaw-drop-link <?php echo ($current_page == 'tuition-fees') ? 'active' : ''; ?>">
                                    Tuition &amp; Fees
                                </a>
                                <a href="scholarships.php" class="crenshaw-drop-link <?php echo ($current_page == 'scholarships') ? 'active' : ''; ?>">
                                    Scholarships &amp; Financial Aid
                                </a>
                                <a href="admissions-faq.php" class="crenshaw-drop-link <?php echo ($current_page == 'admissions-faq') ? 'active' : ''; ?>">
                                    Admissions FAQs
                                </a>
                                <a href="pricing.php" class="crenshaw-drop-link <?php echo ($current_page == 'pricing') ? 'active' : ''; ?>">
                                    Online Tutoring Plans
                                </a>
                            </div>
                        </li>

                        <!-- Contact -->
                        <li class="crenshaw-menu-item <?php echo ($current_page == 'contact') ? 'active' : ''; ?>">
                            <a href="contact.php" class="crenshaw-nav-link">Contact</a>
                        </li>
                    </ul>

                    <!-- Right CTA & Mobile Toggle -->
                    <div class="crenshaw-nav-actions">
                        <!-- High Contrast White Pill CTA -->
                        <a href="schedule-tour.php" class="btn-crenshaw-tour" id="headerTourBtn">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Schedule a Tour</span>
                        </a>

                        <!-- Mobile Hamburger Button -->
                        <button type="button" class="crenshaw-mobile-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
