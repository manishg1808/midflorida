<?php
/**
 * Mid Florida Scholars Academy - Admin Header Include
 */
require_once __DIR__ . '/auth.php';
Auth::requireLogin();

$currentUser = Auth::user();
$activeNav = $activeNav ?? 'dashboard';
$pageTitle = $pageTitle ?? 'Dashboard';

// Quick counter badges for sidebar
$pendingToursCount = JsonDb::count('tours', function($t) { return strtolower($t['status']) === 'pending'; });
$newInquiriesCount = JsonDb::count('inquiries', function($i) { return strtolower($i['status']) === 'new'; });
$reviewAppsCount = JsonDb::count('applications', function($a) { return in_array(strtolower($a['status']), ['under review', 'pending']); });
$processingTranscriptsCount = JsonDb::count('transcripts', function($tr) { return strtolower($tr['status']) === 'processing'; });

// MySQL contacts / leads counter
$newLeadsCount = 0;
try {
    require_once __DIR__ . '/../../config/db.php';
    $db = Database::getConnection();
    $stmt = $db->query("SELECT COUNT(*) FROM `contacts` WHERE LOWER(`status`) = 'new'");
    $newLeadsCount = (int)$stmt->fetchColumn();
} catch (Throwable $e) {
    $newLeadsCount = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?> | Admin Portal - Mid Florida Scholars Academy</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Bebas+Neue&display=swap" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js CDN for Visual Analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <!-- Admin Master Styles -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<div class="admin-wrapper">
    <!-- Sidebar -->
    <?php include __DIR__ . '/sidebar.php'; ?>

    <!-- Main Content Shell -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button type="button" class="sidebar-toggle-btn" id="sidebarToggleBtn" aria-label="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="breadcrumb-area">
                    <a href="index.php" class="breadcrumb-item"><i class="fas fa-home"></i> Admin</a>
                    <span style="color: #cbd5e1;">/</span>
                    <span class="breadcrumb-item active"><?php echo htmlspecialchars($pageTitle); ?></span>
                </div>
            </div>

            <div class="topbar-right">
                <div class="topbar-search">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Global search... (Ctrl+K)" id="globalAdminSearch">
                </div>
                
                <a href="../index.php" target="_blank" class="live-site-btn" title="Open Public Website">
                    <i class="fas fa-external-link-alt"></i> Live Site
                </a>

                <div class="user-snippet">
                    <div class="user-avatar">
                        <?php echo strtoupper(substr($currentUser['name'], 0, 1)); ?>
                    </div>
                    <div class="user-details" style="display: none; @media(min-width: 768px){display:flex;}">
                        <span class="user-name" style="color: var(--adm-navy);"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                        <span class="user-role"><?php echo htmlspecialchars($currentUser['role']); ?></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Workspace Area -->
        <main class="admin-content">
            <?php 
            $flash = Auth::getFlash();
            if ($flash): 
            ?>
                <div class="adm-card" style="padding: 14px 20px; margin-bottom: 24px; border-left: 4px solid var(--adm-<?php echo $flash['type']; ?>); display: flex; align-items: center; justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-info-circle" style="color: var(--adm-<?php echo $flash['type']; ?>); font-size: 1.1rem;"></i>
                        <span><?php echo htmlspecialchars($flash['message']); ?></span>
                    </div>
                    <button style="background: none; border: none; cursor: pointer; color: #94a3b8;" onclick="this.parentElement.remove()">&times;</button>
                </div>
            <?php endif; ?>
