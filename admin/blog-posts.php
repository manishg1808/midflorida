<?php
/**
 * Mid Florida Scholars Academy - Blog & News Manager
 */
$pageTitle = 'Blog & Articles';
$activeNav = 'blog';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_post') {
        $title = trim($_POST['title'] ?? '');
        $cat = trim($_POST['category'] ?? 'Education Insights');
        $author = trim($_POST['author'] ?? 'Admissions Office');
        $img = trim($_POST['image'] ?? 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80');
        $excerpt = trim($_POST['excerpt'] ?? '');
        $status = trim($_POST['status'] ?? 'Published');
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

        if (!empty($title)) {
            JsonDb::insert('blog', [
                'title' => $title,
                'slug' => $slug,
                'category' => $cat,
                'author' => $author,
                'image' => $img,
                'excerpt' => $excerpt,
                'status' => $status
            ]);
            Auth::setFlash('success', "Article '{$title}' published.");
            header("Location: blog-posts.php");
            exit;
        }
    } elseif ($action === 'delete_post') {
        $id = $_POST['post_id'] ?? '';
        if ($id) {
            JsonDb::delete('blog', $id);
            Auth::setFlash('info', "Article removed.");
            header("Location: blog-posts.php");
            exit;
        }
    }
}

$posts = JsonDb::all('blog');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Blog &amp; News Management</h1>
        <p class="page-header-subtitle">Publish educational insights, college guidance articles, and academy announcements</p>
    </div>
    <div class="page-actions">
        <a href="../blog.php" target="_blank" class="btn-adm btn-adm-outline">
            <i class="fas fa-eye"></i> View Public Blog
        </a>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addPostModal')">
            <i class="fas fa-feather-alt"></i> New Article
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search title, author, category..." data-table-search="blogTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="blogTable">
                <option value="all">All Statuses</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="blogTable">
            <thead>
                <tr>
                    <th style="width: 70px;">Image</th>
                    <th>Article Title &amp; Excerpt</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Date Published</th>
                    <th>Status</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No articles written yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($posts as $p): ?>
                        <tr data-status="<?php echo htmlspecialchars($p['status']); ?>">
                            <td>
                                <img src="<?php echo htmlspecialchars($p['image']); ?>" alt="Thumbnail" style="width: 56px; height: 42px; object-fit: cover; border-radius: 6px;">
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;"><?php echo htmlspecialchars($p['title']); ?></strong>
                                <div style="max-width: 320px; font-size: 0.78rem; color: var(--adm-text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;">
                                    <?php echo htmlspecialchars($p['excerpt']); ?>
                                </div>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-bg); border: 1px solid var(--adm-border); color: var(--adm-navy); font-weight: 600;">
                                    <?php echo htmlspecialchars($p['category']); ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 0.84rem; color: var(--adm-navy); font-weight: 500;">
                                    <?php echo htmlspecialchars($p['author']); ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-text-muted);">
                                    <?php echo date('M j, Y', strtotime($p['created_at'])); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge-pill <?php echo ($p['status'] === 'Published') ? 'badge-status-confirmed' : 'badge-status-waitlist'; ?> badge-pill-dot">
                                    <?php echo htmlspecialchars($p['status']); ?>
                                </span>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="blog-posts.php" style="display: inline;" onsubmit="return confirm('Delete this blog post?');">
                                    <input type="hidden" name="action" value="delete_post">
                                    <input type="hidden" name="post_id" value="<?php echo htmlspecialchars($p['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Article">
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

<!-- Add Post Modal -->
<div class="adm-modal-backdrop" id="addPostModal">
    <div class="adm-modal" style="max-width: 650px;">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-feather-alt" style="color: var(--adm-primary);"></i> Write New Article</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addPostModal">&times;</button>
        </div>
        <form method="POST" action="blog-posts.php">
            <input type="hidden" name="action" value="create_post">
            <div class="adm-modal-body">
                <div class="adm-form-group">
                    <label class="adm-label">Article Title *</label>
                    <input type="text" name="title" class="adm-input" placeholder="e.g. 5 Strategies for Choosing Between AP and Dual Enrollment" required>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Category</label>
                        <select name="category" class="adm-select" style="width: 100%;">
                            <option value="Education Insights">Education Insights</option>
                            <option value="College Prep">College Prep</option>
                            <option value="Admissions & Tuition">Admissions &amp; Tuition</option>
                            <option value="Student Life">Student Life</option>
                            <option value="Campus News">Campus News</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Author Name</label>
                        <select name="author" class="adm-select" style="width: 100%;">
                            <option value="Brenda Crenshaw, Head of School">Brenda Crenshaw, Head of School</option>
                            <option value="Tanya Williams, Principal">Tanya Williams, Principal</option>
                            <option value="Admissions Office">Admissions Office</option>
                            <option value="College Counseling Dept">College Counseling Dept</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Featured Image URL</label>
                    <input type="url" name="image" class="adm-input" value="https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80">
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Article Summary / Excerpt *</label>
                    <textarea name="excerpt" class="adm-textarea" placeholder="Write a captivating summary for the blog feed..." required></textarea>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Publishing Status</label>
                    <select name="status" class="adm-select" style="width: 100%;">
                        <option value="Published" selected>Published</option>
                        <option value="Draft">Draft</option>
                    </select>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addPostModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Publish Article</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
