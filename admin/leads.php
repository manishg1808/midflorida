<?php
/**
 * Mid Florida Scholars Academy - Leads Management (Contacts Table)
 * Database: midflorida (MySQL)
 */
$pageTitle = 'Leads (Contact Form)';
$activeNav = 'leads';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/../config/db.php';

$dbError = null;
$leads = [];
$stats = [
    'total' => 0,
    'new' => 0,
    'in_progress' => 0,
    'contacted' => 0
];

try {
    $pdo = Database::getConnection();

    // Handle POST actions
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'update_status') {
            $id = (int)($_POST['lead_id'] ?? 0);
            $newStatus = trim($_POST['new_status'] ?? 'New');
            if ($id > 0) {
                $stmt = $pdo->prepare("UPDATE `contacts` SET `status` = :status WHERE `id` = :id");
                $stmt->execute([':status' => $newStatus, ':id' => $id]);
                Auth::setFlash('success', "Lead #{$id} status updated to '{$newStatus}'.");
                header("Location: leads.php");
                exit;
            }
        } elseif ($action === 'delete_lead') {
            $id = (int)($_POST['lead_id'] ?? 0);
            if ($id > 0) {
                $stmt = $pdo->prepare("DELETE FROM `contacts` WHERE `id` = :id");
                $stmt->execute([':id' => $id]);
                Auth::setFlash('info', "Lead #{$id} has been removed.");
                header("Location: leads.php");
                exit;
            }
        } elseif ($action === 'create_lead') {
            $fullName = trim($_POST['full_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $phone = trim($_POST['phone'] ?? '');
            $subject = trim($_POST['subject'] ?? 'General Inquiry');
            $message = trim($_POST['message'] ?? '');
            $status = trim($_POST['status'] ?? 'New');

            if (!empty($fullName) && !empty($email) && !empty($message)) {
                $stmt = $pdo->prepare("
                    INSERT INTO `contacts` (`full_name`, `email`, `phone`, `subject`, `message`, `status`, `created_at`)
                    VALUES (:full_name, :email, :phone, :subject, :message, :status, NOW())
                ");
                $stmt->execute([
                    ':full_name' => $fullName,
                    ':email'     => $email,
                    ':phone'     => $phone,
                    ':subject'   => $subject,
                    ':message'   => $message,
                    ':status'    => $status
                ]);
                Auth::setFlash('success', "New lead for {$fullName} recorded successfully.");
                header("Location: leads.php");
                exit;
            } else {
                Auth::setFlash('danger', "Please fill in all required fields.");
            }
        }
    }

    // Fetch stats
    $statsStmt = $pdo->query("
        SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN LOWER(status) = 'new' THEN 1 ELSE 0 END) as new_count,
            SUM(CASE WHEN LOWER(status) = 'in progress' THEN 1 ELSE 0 END) as in_progress_count,
            SUM(CASE WHEN LOWER(status) IN ('contacted', 'enrolled', 'closed') THEN 1 ELSE 0 END) as contacted_count
        FROM `contacts`
    ");
    $statsRow = $statsStmt->fetch();
    if ($statsRow) {
        $stats['total'] = (int)($statsRow['total'] ?? 0);
        $stats['new'] = (int)($statsRow['new_count'] ?? 0);
        $stats['in_progress'] = (int)($statsRow['in_progress_count'] ?? 0);
        $stats['contacted'] = (int)($statsRow['contacted_count'] ?? 0);
    }

    // Fetch all leads
    $stmt = $pdo->query("SELECT * FROM `contacts` ORDER BY `id` DESC");
    $leads = $stmt->fetchAll();

} catch (PDOException $e) {
    $dbError = $e->getMessage();
}
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Leads Management</h1>
        <p class="page-header-subtitle">Direct inquiries submitted through the website's Contact Us form</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('leadsTable', 'leads-contacts-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addLeadModal')">
            <i class="fas fa-plus"></i> Record Lead
        </button>
    </div>
</div>

<?php if ($dbError): ?>
    <div class="adm-card" style="padding: 20px; border-left: 4px solid #ef4444; background: #fff5f5; margin-bottom: 24px;">
        <div style="display: flex; align-items: flex-start; gap: 14px;">
            <i class="fas fa-database" style="color: #ef4444; font-size: 1.5rem; margin-top: 2px;"></i>
            <div>
                <strong style="color: #991b1b; font-size: 1.05rem;">Database Connection Notice</strong>
                <p style="color: #7f1d1d; margin: 6px 0 0; font-size: 0.9rem;">
                    Could not connect to MySQL database <strong>midflorida</strong> on <code>localhost:3306</code>.<br>
                    <strong>Error:</strong> <?php echo htmlspecialchars($dbError); ?><br>
                    <em>Tip: Ensure MySQL is running in your XAMPP Control Panel.</em>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- Quick Stats Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 16px; margin-bottom: 24px;">
    <div class="admin-card" style="padding: 18px 20px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--adm-text-muted); font-weight: 700;">Total Leads</div>
            <div style="font-size: 1.8rem; font-weight: 800; color: var(--adm-navy);"><?php echo $stats['total']; ?></div>
        </div>
        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(30, 58, 138, 0.1); color: var(--adm-primary); display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
            <i class="fas fa-users"></i>
        </div>
    </div>

    <div class="admin-card" style="padding: 18px 20px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--adm-text-muted); font-weight: 700;">New Inquiries</div>
            <div style="font-size: 1.8rem; font-weight: 800; color: #2563eb;"><?php echo $stats['new']; ?></div>
        </div>
        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(37, 99, 235, 0.1); color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
            <i class="fas fa-bell"></i>
        </div>
    </div>

    <div class="admin-card" style="padding: 18px 20px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--adm-text-muted); font-weight: 700;">In Progress</div>
            <div style="font-size: 1.8rem; font-weight: 800; color: #d97706;"><?php echo $stats['in_progress']; ?></div>
        </div>
        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(217, 119, 6, 0.1); color: #d97706; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
            <i class="fas fa-clock"></i>
        </div>
    </div>

    <div class="admin-card" style="padding: 18px 20px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--adm-text-muted); font-weight: 700;">Contacted / Closed</div>
            <div style="font-size: 1.8rem; font-weight: 800; color: #059669;"><?php echo $stats['contacted']; ?></div>
        </div>
        <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(5, 150, 105, 0.1); color: #059669; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
            <i class="fas fa-check-circle"></i>
        </div>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search by name, email, phone, subject..." data-table-search="leadsTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="leadsTable">
                <option value="all">All Statuses</option>
                <option value="New">New</option>
                <option value="In Progress">In Progress</option>
                <option value="Contacted">Contacted</option>
                <option value="Enrolled">Enrolled</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="leadsTable">
            <thead>
                <tr>
                    <th>Lead Contact</th>
                    <th>Subject</th>
                    <th>Message Snippet</th>
                    <th>Date Received</th>
                    <th>Status</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($leads)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 36px 20px; color: var(--adm-text-muted);">
                            <i class="fas fa-inbox" style="font-size: 2rem; display: block; margin-bottom: 10px; opacity: 0.5;"></i>
                            No leads recorded in the <code>contacts</code> table yet.<br>
                            Submissions made from the public <a href="../contact.php" target="_blank" style="color: var(--adm-primary); font-weight: 600;">Contact Us</a> page will automatically appear here.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($leads as $lead): ?>
                        <tr data-status="<?php echo htmlspecialchars($lead['status'] ?? 'New'); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.92rem;"><?php echo htmlspecialchars($lead['full_name']); ?></strong><br>
                                <a href="mailto:<?php echo htmlspecialchars($lead['email']); ?>" style="color: var(--adm-primary); font-size: 0.8rem; text-decoration: none;">
                                    <i class="fas fa-envelope"></i> <?php echo htmlspecialchars($lead['email']); ?>
                                </a>
                                <?php if (!empty($lead['phone'])): ?>
                                    <span style="font-size: 0.76rem; color: var(--adm-text-muted); display: block; margin-top: 2px;">
                                        <a href="tel:<?php echo htmlspecialchars($lead['phone']); ?>" style="color: inherit; text-decoration: none;">
                                            <i class="fas fa-phone"></i> <?php echo htmlspecialchars($lead['phone']); ?>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-bg); border: 1px solid var(--adm-border); color: var(--adm-navy); font-weight: 600;">
                                    <?php echo htmlspecialchars($lead['subject'] ?? 'General Inquiry'); ?>
                                </span>
                            </td>
                            <td>
                                <div style="max-width: 280px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.82rem; color: var(--adm-text-muted);">
                                    <?php echo htmlspecialchars($lead['message']); ?>
                                </div>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-navy); font-weight: 600;">
                                    <?php echo date('M j, Y', strtotime($lead['created_at'])); ?>
                                </span><br>
                                <span style="font-size: 0.74rem; color: var(--adm-text-muted);">
                                    <?php echo date('g:ia', strtotime($lead['created_at'])); ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="leads.php" style="display: inline-block;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="lead_id" value="<?php echo htmlspecialchars($lead['id']); ?>">
                                    <select name="new_status" class="adm-select" style="padding: 4px 8px; font-size: 0.78rem; border-radius: 12px; font-weight: 600;" onchange="this.form.submit()">
                                        <option value="New" <?php echo ($lead['status'] === 'New') ? 'selected' : ''; ?>>New</option>
                                        <option value="In Progress" <?php echo ($lead['status'] === 'In Progress') ? 'selected' : ''; ?>>In Progress</option>
                                        <option value="Contacted" <?php echo ($lead['status'] === 'Contacted') ? 'selected' : ''; ?>>Contacted</option>
                                        <option value="Enrolled" <?php echo ($lead['status'] === 'Enrolled') ? 'selected' : ''; ?>>Enrolled</option>
                                        <option value="Closed" <?php echo ($lead['status'] === 'Closed') ? 'selected' : ''; ?>>Closed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <button type="button" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-primary); margin-right: 4px;" title="View Details" onclick="openLeadModal('<?php echo htmlspecialchars(addslashes($lead['full_name'])); ?>', '<?php echo htmlspecialchars(addslashes($lead['email'])); ?>', '<?php echo htmlspecialchars(addslashes($lead['phone'] ?? '')); ?>', '<?php echo htmlspecialchars(addslashes($lead['subject'] ?? '')); ?>', '<?php echo htmlspecialchars(addslashes($lead['message'])); ?>', '<?php echo date('M j, Y g:ia', strtotime($lead['created_at'])); ?>')">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <form method="POST" action="leads.php" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this lead?');">
                                    <input type="hidden" name="action" value="delete_lead">
                                    <input type="hidden" name="lead_id" value="<?php echo htmlspecialchars($lead['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Lead">
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

<!-- View Lead Modal -->
<div class="adm-modal-backdrop" id="viewLeadModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-user-tag" style="color: var(--adm-primary);"></i> Lead Details</h3>
            <button type="button" class="adm-modal-close" data-close-modal="viewLeadModal">&times;</button>
        </div>
        <div class="adm-modal-body">
            <div style="background: var(--adm-bg); border-radius: 8px; padding: 16px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                    <div>
                        <strong id="leadSenderName" style="font-size: 1.1rem; color: var(--adm-navy);"></strong>
                        <div id="leadSenderEmail" style="font-size: 0.88rem; color: var(--adm-primary); margin-top: 2px;"></div>
                        <div id="leadSenderPhone" style="font-size: 0.82rem; color: var(--adm-text-muted); margin-top: 2px;"></div>
                    </div>
                    <span id="leadReceivedDate" style="font-size: 0.78rem; color: var(--adm-text-muted); background: #ffffff; padding: 4px 8px; border-radius: 4px; border: 1px solid var(--adm-border);"></span>
                </div>
            </div>

            <div class="adm-form-group">
                <label class="adm-label">Subject</label>
                <div id="leadSubject" style="font-weight: 700; color: var(--adm-navy); font-size: 1rem;"></div>
            </div>

            <div class="adm-form-group">
                <label class="adm-label">Message Content</label>
                <div id="leadMessageText" style="padding: 14px; background: #ffffff; border: 1px solid var(--adm-border); border-radius: 8px; line-height: 1.6; font-size: 0.9rem; white-space: pre-wrap; min-height: 100px;"></div>
            </div>
        </div>
        <div class="adm-modal-footer">
            <a id="leadReplyBtn" href="#" class="btn-adm btn-adm-primary"><i class="fas fa-reply"></i> Reply via Email</a>
            <button type="button" class="btn-adm btn-adm-outline" data-close-modal="viewLeadModal">Close</button>
        </div>
    </div>
</div>

<!-- Add Lead Modal -->
<div class="adm-modal-backdrop" id="addLeadModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-plus-circle" style="color: var(--adm-primary);"></i> Record New Lead</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addLeadModal">&times;</button>
        </div>
        <form method="POST" action="leads.php">
            <input type="hidden" name="action" value="create_lead">
            <div class="adm-modal-body">
                <div class="adm-form-row">
                    <div class="adm-form-group">
                        <label class="adm-label">Full Name *</label>
                        <input type="text" name="full_name" class="adm-input" required placeholder="Parent or Student Name">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" required placeholder="contact@example.com">
                    </div>
                </div>

                <div class="adm-form-row">
                    <div class="adm-form-group">
                        <label class="adm-label">Phone Number</label>
                        <input type="tel" name="phone" class="adm-input" placeholder="(407) 555-0123">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Initial Status</label>
                        <select name="status" class="adm-select">
                            <option value="New">New</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Contacted">Contacted</option>
                            <option value="Enrolled">Enrolled</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Subject</label>
                    <select name="subject" class="adm-select">
                        <option value="General Inquiry">General Inquiry</option>
                        <option value="Admissions &amp; Tours">Admissions &amp; Tours</option>
                        <option value="Scholarship Verification">Scholarship Verification</option>
                        <option value="Transcripts &amp; Records">Transcripts &amp; Records</option>
                        <option value="Athletics / Professional Program">Athletics / Professional Program</option>
                    </select>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Message / Notes *</label>
                    <textarea name="message" class="adm-textarea" rows="4" required placeholder="Details about this inquiry or walk-in request..."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="submit" class="btn-adm btn-adm-primary">Save Lead</button>
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addLeadModal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
function openLeadModal(name, email, phone, subject, message, date) {
    document.getElementById('leadSenderName').textContent = name;
    document.getElementById('leadSenderEmail').textContent = email;
    document.getElementById('leadSenderPhone').textContent = phone ? ('Phone: ' + phone) : 'No phone provided';
    document.getElementById('leadSubject').textContent = subject || 'General Inquiry';
    document.getElementById('leadMessageText').textContent = message;
    document.getElementById('leadReceivedDate').textContent = date;
    document.getElementById('leadReplyBtn').href = 'mailto:' + encodeURIComponent(email) + '?subject=' + encodeURIComponent('Re: ' + (subject || 'Mid Florida Scholars Academy Inquiry'));
    openModal('viewLeadModal');
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
