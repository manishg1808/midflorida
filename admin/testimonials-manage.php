<?php
/**
 * Mid Florida Scholars Academy - Testimonials & Reviews Manager
 */
$pageTitle = 'Testimonials & Reviews';
$activeNav = 'testimonials';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_testimonial') {
        $author = trim($_POST['author'] ?? '');
        $role = trim($_POST['role'] ?? '');
        $stars = intval($_POST['stars'] ?? 5);
        $quote = trim($_POST['quote'] ?? '');
        $source = trim($_POST['source'] ?? 'Verified Family Review');
        $featured = isset($_POST['featured']);

        if (!empty($author) && !empty($quote)) {
            JsonDb::insert('testimonials', [
                'author' => $author,
                'role' => $role,
                'stars' => $stars,
                'quote' => $quote,
                'source' => $source,
                'featured' => $featured
            ]);
            Auth::setFlash('success', "Testimonial from {$author} saved.");
            header("Location: testimonials-manage.php");
            exit;
        }
    } elseif ($action === 'toggle_featured') {
        $id = $_POST['test_id'] ?? '';
        $current = JsonDb::find('testimonials', $id);
        if ($current) {
            $newFeatured = empty($current['featured']);
            JsonDb::update('testimonials', $id, ['featured' => $newFeatured]);
            Auth::setFlash('success', "Homepage showcase updated.");
            header("Location: testimonials-manage.php");
            exit;
        }
    } elseif ($action === 'delete_testimonial') {
        $id = $_POST['test_id'] ?? '';
        if ($id) {
            JsonDb::delete('testimonials', $id);
            Auth::setFlash('info', "Testimonial removed.");
            header("Location: testimonials-manage.php");
            exit;
        }
    }
}

$testimonials = JsonDb::all('testimonials');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Testimonials &amp; Parent Reviews</h1>
        <p class="page-header-subtitle">Manage public reviews featured across the homepage slider and testimonials showcase page</p>
    </div>
    <div class="page-actions">
        <a href="../testimonials.php" target="_blank" class="btn-adm btn-adm-outline">
            <i class="fas fa-eye"></i> View Public Showcase
        </a>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addTestimonialModal')">
            <i class="fas fa-quote-left"></i> Add Testimonial
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search author, role, quote text..." data-table-search="testimonialsTable">
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="testimonialsTable">
            <thead>
                <tr>
                    <th>Author &amp; Family Role</th>
                    <th>Rating</th>
                    <th>Quote</th>
                    <th>Source</th>
                    <th>Homepage Feature</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($testimonials)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No testimonials recorded yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($testimonials as $t): ?>
                        <tr>
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;"><?php echo htmlspecialchars($t['author']); ?></strong><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);"><?php echo htmlspecialchars($t['role']); ?></span>
                            </td>
                            <td>
                                <div style="color: #f59e0b; font-size: 0.82rem;">
                                    <?php 
                                    $stars = intval($t['stars'] ?? 5);
                                    for ($i = 0; $i < $stars; $i++) echo '<i class="fas fa-star"></i>';
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 380px; font-size: 0.84rem; line-height: 1.4; color: var(--adm-text);">
                                    &ldquo;<?php echo htmlspecialchars($t['quote']); ?>&rdquo;
                                </div>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-bg); border: 1px solid var(--adm-border); font-size: 0.76rem;">
                                    <?php echo htmlspecialchars($t['source']); ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="testimonials-manage.php" style="display: inline;">
                                    <input type="hidden" name="action" value="toggle_featured">
                                    <input type="hidden" name="test_id" value="<?php echo htmlspecialchars($t['id']); ?>">
                                    <button type="submit" class="badge-pill <?php echo !empty($t['featured']) ? 'badge-status-confirmed' : 'badge-status-waitlist'; ?> badge-pill-dot" style="cursor: pointer; border: none;">
                                        <?php echo !empty($t['featured']) ? 'Featured' : 'Not Featured'; ?>
                                    </button>
                                </form>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="testimonials-manage.php" style="display: inline;" onsubmit="return confirm('Delete this testimonial?');">
                                    <input type="hidden" name="action" value="delete_testimonial">
                                    <input type="hidden" name="test_id" value="<?php echo htmlspecialchars($t['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Review">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Add Testimonial Modal -->
<div class="adm-modal-backdrop" id="addTestimonialModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-quote-left" style="color: var(--adm-primary);"></i> Add Testimonial</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addTestimonialModal">&times;</button>
        </div>
        <form method="POST" action="testimonials-manage.php">
            <input type="hidden" name="action" value="create_testimonial">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Author Name *</label>
                        <input type="text" name="author" class="adm-input" placeholder="e.g. Katherine & Greg Hall" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Role / Affiliation *</label>
                        <input type="text" name="role" class="adm-input" placeholder="e.g. Parents of 4th & 7th Graders" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Star Rating</label>
                        <select name="stars" class="adm-select" style="width: 100%;">
                            <option value="5" selected>5 Stars - Outstanding</option>
                            <option value="4">4 Stars - Very Good</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Review Source</label>
                        <input type="text" name="source" class="adm-input" value="Verified Family Review">
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Quote Content *</label>
                    <textarea name="quote" class="adm-textarea" placeholder="Paste student, parent, or alumni testimonial..." required></textarea>
                </div>

                <div class="adm-form-group">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="featured" checked style="accent-color: var(--adm-primary);"> Feature in homepage testimonial carousel
                    </label>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addTestimonialModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Testimonial</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
