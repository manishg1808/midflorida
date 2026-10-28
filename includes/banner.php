<?php
if (!isset($banner_title)) {
    $banner_title = "Mid Florida Scholars Academy";
}
if (!isset($banner_subtitle)) {
    $banner_subtitle = "1:1 Live Online Classes & College Prep";
}
if (!isset($breadcrumb_parent)) {
    $breadcrumb_parent = "Our Academy";
}
?>
<section class="page-banner-cuemath">
    <div class="container">
        <div class="page-tag">
            <i class="fas fa-sparkles"></i> <?php echo htmlspecialchars($banner_subtitle); ?>
        </div>
        <h1><?php echo htmlspecialchars($banner_title); ?></h1>
        <div class="breadcrumb-nav">
            <a href="index.php">Home</a>
            <i class="fas fa-chevron-right"></i>
            <?php if (!empty($breadcrumb_parent)): ?>
                <span><?php echo htmlspecialchars($breadcrumb_parent); ?></span>
                <i class="fas fa-chevron-right"></i>
            <?php endif; ?>
            <strong style="color: var(--cuemath-yellow);"><?php echo htmlspecialchars($banner_title); ?></strong>
        </div>
    </div>
</section>
