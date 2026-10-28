<?php
/**
 * Mid Florida Scholars Academy - Admin Sidebar Include
 */
?>
<aside class="admin-sidebar">
    <!-- Brand Crest Header -->
    <div class="sidebar-header">
        <a href="index.php" class="sidebar-brand">
            <img src="../assets/images/logo.svg" alt="Mid Florida Scholars Crest" class="sidebar-logo">
            <div class="sidebar-brand-text">
                <span class="brand-title">Scholars Academy</span>
                <span class="brand-subtitle">Admin Portal</span>
            </div>
        </a>
    </div>

    <!-- Navigation Menu -->
    <div class="sidebar-body">
        <div class="nav-section-title">Core</div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item <?php echo ($activeNav === 'dashboard') ? 'active' : ''; ?>">
                <a href="index.php" class="sidebar-nav-link">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-title">Admissions &amp; Leads</div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item <?php echo ($activeNav === 'leads') ? 'active' : ''; ?>">
                <a href="leads.php" class="sidebar-nav-link">
                    <i class="fas fa-user-tag"></i>
                    <span>Leads (Contacts)</span>
                    <?php if (($newLeadsCount ?? 0) > 0): ?>
                        <span class="nav-badge badge-primary"><?php echo $newLeadsCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'tours') ? 'active' : ''; ?>">
                <a href="tours.php" class="sidebar-nav-link">
                    <i class="fas fa-calendar-check"></i>
                    <span>Campus Tours</span>
                    <?php if ($pendingToursCount > 0): ?>
                        <span class="nav-badge badge-gold"><?php echo $pendingToursCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'inquiries') ? 'active' : ''; ?>">
                <a href="inquiries.php" class="sidebar-nav-link">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Inquiries</span>
                    <?php if ($newInquiriesCount > 0): ?>
                        <span class="nav-badge badge-primary"><?php echo $newInquiriesCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'applications') ? 'active' : ''; ?>">
                <a href="applications.php" class="sidebar-nav-link">
                    <i class="fas fa-user-graduate"></i>
                    <span>Applications</span>
                    <?php if ($reviewAppsCount > 0): ?>
                        <span class="nav-badge badge-gold"><?php echo $reviewAppsCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'transcripts') ? 'active' : ''; ?>">
                <a href="transcripts.php" class="sidebar-nav-link">
                    <i class="fas fa-file-invoice"></i>
                    <span>Transcripts</span>
                    <?php if ($processingTranscriptsCount > 0): ?>
                        <span class="nav-badge"><?php echo $processingTranscriptsCount; ?></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>

        <div class="nav-section-title">Academics &amp; Content</div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item <?php echo ($activeNav === 'events') ? 'active' : ''; ?>">
                <a href="events.php" class="sidebar-nav-link">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Calendar Events</span>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'blog') ? 'active' : ''; ?>">
                <a href="blog-posts.php" class="sidebar-nav-link">
                    <i class="fas fa-feather-alt"></i>
                    <span>Blog &amp; Articles</span>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'testimonials') ? 'active' : ''; ?>">
                <a href="testimonials-manage.php" class="sidebar-nav-link">
                    <i class="fas fa-quote-right"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <li class="sidebar-nav-item <?php echo ($activeNav === 'faculty') ? 'active' : ''; ?>">
                <a href="faculty.php" class="sidebar-nav-link">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Faculty &amp; Staff</span>
                </a>
            </li>
        </ul>

        <div class="nav-section-title">Administration</div>
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item <?php echo ($activeNav === 'settings') ? 'active' : ''; ?>">
                <a href="settings.php" class="sidebar-nav-link">
                    <i class="fas fa-sliders-h"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="logout.php" class="sidebar-nav-link" style="color: #fca5a5;">
                    <i class="fas fa-sign-out-alt" style="color: #f87171;"></i>
                    <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- User Footer Snippet -->
    <div class="sidebar-footer">
        <div class="user-snippet">
            <div class="user-avatar">
                <?php echo strtoupper(substr($currentUser['name'], 0, 1)); ?>
            </div>
            <div class="user-details">
                <span class="user-name"><?php echo htmlspecialchars($currentUser['username']); ?></span>
                <span class="user-role">Administrator</span>
            </div>
        </div>
        <a href="logout.php" class="logout-icon" title="Sign Out">
            <i class="fas fa-power-off"></i>
        </a>
    </div>
</aside>
