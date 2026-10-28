<?php
/**
 * Mid Florida Scholars Academy - Inquiries & Leads Management
 */
$pageTitle = 'Contact Inquiries';
$activeNav = 'inquiries';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_inquiry') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $subject = trim($_POST['subject'] ?? 'General Inquiry');
        $grade = trim($_POST['grade'] ?? 'Not Specified');
        $message = trim($_POST['message'] ?? '');
        $status = trim($_POST['status'] ?? 'New');

        if (!empty($name) && !empty($email)) {
            JsonDb::insert('inquiries', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'subject' => $subject,
                'grade' => $grade,
                'message' => $message,
                'status' => $status
            ]);
            Auth::setFlash('success', "Inquiry from {$name} logged.");
            header("Location: inquiries.php");
            exit;
        }
    } elseif ($action === 'update_status') {
        $id = $_POST['inquiry_id'] ?? '';
        $newStatus = $_POST['new_status'] ?? 'New';
        if ($id) {
            JsonDb::update('inquiries', $id, ['status' => $newStatus]);
            Auth::setFlash('success', "Inquiry status changed to '{$newStatus}'.");
            header("Location: inquiries.php");
            exit;
        }
    } elseif ($action === 'delete_inquiry') {
        $id = $_POST['inquiry_id'] ?? '';
        if ($id) {
            JsonDb::delete('inquiries', $id);
            Auth::setFlash('info', "Inquiry removed.");
            header("Location: inquiries.php");
            exit;
        }
    }
}

$inquiries = JsonDb::all('inquiries');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Admissions Inquiries &amp; Leads</h1>
        <p class="page-header-subtitle">Follow up with prospective families, transfer inquiries, and scholarship questions</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('inquiriesTable', 'leads-inquiries-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addInquiryModal')">
            <i class="fas fa-plus"></i> Record Inquiry
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search sender, subject, grade, email..." data-table-search="inquiriesTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="inquiriesTable">
                <option value="all">All Statuses</option>
                <option value="New">New</option>
                <option value="In Progress">In Progress</option>
                <option value="Contacted">Contacted</option>
                <option value="Enrolled">Enrolled</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="inquiriesTable">
            <thead>
                <tr>
                    <th>Prospective Parent</th>
                    <th>Target Grade</th>
                    <th>Subject &amp; Snippet</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($inquiries)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No inquiries recorded yet. Messages submitted via the Contact page will appear here.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($inquiries as $inq): ?>
                        <tr data-status="<?php echo htmlspecialchars($inq['status']); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.92rem;"><?php echo htmlspecialchars($inq['name']); ?></strong><br>
                                <a href="mailto:<?php echo htmlspecialchars($inq['email']); ?>" style="color: var(--adm-primary); font-size: 0.8rem; text-decoration: none;">
                                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($inq['email']); ?>
                                </a>
                                <?php if (!empty($inq['phone'])): ?>
                                    <span style="font-size: 0.76rem; color: var(--adm-text-muted); display: block;">
                                        <i class="fas fa-phone"></i> <?php echo htmlspecialchars($inq['phone']); ?>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-bg); border: 1px solid var(--adm-border); color: var(--adm-navy); font-weight: 600;">
                                    <?php echo htmlspecialchars($inq['grade'] ?? 'Not Specified'); ?>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.88rem;"><?php echo htmlspecialchars($inq['subject']); ?></strong>
                                <div style="max-width: 280px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.8rem; color: var(--adm-text-muted); margin-top: 2px;">
                                    <?php echo htmlspecialchars($inq['message']); ?>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-navy); font-weight: 600;">
                                    <?php echo date('M j, Y', strtotime($inq['created_at'])); ?>
                                </span><br>
                                <span style="font-size: 0.74rem; color: var(--adm-text-muted);">
                                    <?php echo date('g:ia', strtotime($inq['created_at'])); ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="inquiries.php" style="display: inline-block;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($inq['id']); ?>">
                                    <select name="new_status" class="adm-select" style="padding: 3px 8px; font-size: 0.78rem; border-radius: 12px; font-weight: 600;" onchange="this.form.submit()">
                                        <option value="New" <?php echo ($inq['status'] === 'New') ? 'selected' : ''; ?>>New</option>
                                        <option value="In Progress" <?php echo ($inq['status'] === 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="Contacted" <?php echo ($inq['status'] === 'Contacted') ? 'selected' : ''; ?>>Contacted</option>
                                        <option value="Enrolled" <?php echo ($inq['status'] === 'Enrolled') ? 'selected' : ''; ?>>Enrolled</option>
                                    </select>
                                </form>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <button type="button" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-primary); margin-right: 4px;" title="View Message" onclick="openViewModal('<?php echo htmlspecialchars(addslashes($inq['name'])); ?>', '<?php echo htmlspecialchars(addslashes($inq['email'])); ?>', '<?php echo htmlspecialchars(addslashes($inq['phone'] ?? '')); ?>', '<?php echo htmlspecialchars(addslashes($inq['subject'])); ?>', '<?php echo htmlspecialchars(addslashes($inq['message'])); ?>', '<?php echo date('M j, Y g:ia', strtotime($inq['created_at'])); ?>')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form method="POST" action="inquiries.php" style="display: inline;" onsubmit="return confirm('Delete this inquiry?');">
                                    <input type="hidden" name="action" value="delete_inquiry">
                                    <input type="hidden" name="inquiry_id" value="<?php echo htmlspecialchars($inq['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Inquiry">
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

<!-- View Inquiry Modal -->
<div class="adm-modal-backdrop" id="viewInquiryModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-envelope-open" style="color: var(--adm-primary);"></i> Parent Inquiry Details</h3>
            <button type="button" class="adm-modal-close" data-close-modal="viewInquiryModal">&times;</button>
        </div>
        <div class="adm-modal-body">
            <div style="background: var(--adm-bg); border-radius: 8px; padding: 16px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <div>
                        <strong id="modalSenderName" style="font-size: 1.05rem; color: var(--adm-navy);"></strong>
                        <div id="modalSenderEmail" style="font-size: 0.85rem; color: var(--adm-primary);"></div>
                        <div id="modalSenderPhone" style="font-size: 0.8rem; color: var(--adm-text-muted);"></div>
                    </div>
                    <span id="modalReceivedDate" style="font-size: 0.78rem; color: var(--adm-text-muted);"></span>
                </div>
            </div>

            <div class="adm-form-group">
                <label class="adm-label">Subject</label>
                <div id="modalSubject" style="font-weight: 700; color: var(--adm-navy); font-size: 1rem;"></div>
            </div>

            <div class="adm-form-group">
                <label class="adm-label">Message Content</label>
                <div id="modalMessageText" style="padding: 14px; background: #ffffff; border: 1px solid var(--adm-border); border-radius: 8px; line-height: 1.6; font-size: 0.9rem; white-space: pre-wrap;"></div>
            </div>
        </div>
        <div class="adm-modal-footer">
            <a id="modalReplyBtn" href="#" class="btn-adm btn-adm-primary"><i class="fas fa-reply"></i> Reply via Email</a>
            <button type="button" class="btn-adm btn-adm-outline" data-close-modal="viewInquiryModal">Close</button>
        </div>
    </div>
</div>

<!-- Add Inquiry Modal -->
<div class="adm-modal-backdrop" id="addInquiryModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-plus-circle" style="color: var(--adm-primary);"></i> Record New Inquiry</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addInquiryModal">&times;</button>
        </div>
        <form method="POST" action="inquiries.php">
            <input type="hidden" name="action" value="create_inquiry">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Parent Name *</label>
                        <input type="text" name="name" class="adm-input" placeholder="e.g. Rachel Adams" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" placeholder="radams@gmail.com" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number</label>
                        <input type="tel" name="phone" class="adm-input" placeholder="(407) 555-0912">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Grade</label>
                        <select name="grade" class="adm-select" style="width: 100%;">
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="Lower School (K-5)">Lower School (K-5)</option>
                            <option value="Middle School (6-8)">Middle School (6-8)</option>
                            <option value="Upper School (9-12)">Upper School (9-12)</option>
                            <option value="Flexible Enrollment">Flexible Enrollment</option>
                            <option value="Dual Enrollment">Dual Enrollment</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Subject *</label>
                    <input type="text" name="subject" class="adm-input" placeholder="e.g. Winter Semester Transfer" required>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Message / Details *</label>
                    <textarea name="message" class="adm-textarea" placeholder="Enter inquiry message..." required></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addInquiryModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Inquiry</button>
            </div>
        </form>
    </div>
</div>

<script>
function openViewModal(name, email, phone, subject, message, date) {
    document.getElementById('modalSenderName').textContent = name;
    document.getElementById('modalSenderEmail').textContent = email;
    document.getElementById('modalSenderPhone').textContent = phone ? phone : 'No phone provided';
    document.getElementById('modalReceivedDate').textContent = date;
    document.getElementById('modalSubject').textContent = subject;
    document.getElementById('modalMessageText').textContent = message;
    document.getElementById('modalReplyBtn').href = 'mailto:' + encodeURIComponent(email) + '?subject=' + encodeURIComponent('Re: ' + subject + ' - Mid Florida Scholars Academy');
    openModal('viewInquiryModal');
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
