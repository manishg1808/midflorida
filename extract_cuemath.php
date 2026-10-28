<?php
$html = file_get_contents('cuemath_page.html');

// Find all image tags and attributes (src, data-src, srcset)
preg_match_all('/<img[^>]+(?:src|data-src)="([^"]+)"/i', $html, $m);
$imgs = array_unique($m[1]);
echo "--- ALL IMAGES (" . count($imgs) . ") ---\n";
foreach ($imgs as $img) {
    if (strpos($img, '.svg') === false || strpos($img, 'logo') !== false || strpos($img, 'star') !== false) {
        echo $img . "\n";
    }
}

// Find all videos
preg_match_all('/<video[^>]+src="([^"]+)"/i', $html, $mv);
echo "--- ALL VIDEOS ---\n";
foreach (array_unique($mv[1]) as $v) {
    echo $v . "\n";
}

// Find background images
preg_match_all('/url\(([^)]+)\)/i', $html, $mbg);
echo "--- ALL BG IMAGES ---\n";
foreach (array_unique($mbg[1]) as $bg) {
    echo trim($bg, "'\"") . "\n";
}
