<?php
/**
 * Mid Florida Scholars Academy - Alumni Transcript Orders Management
 */
$pageTitle = 'Transcript Requests';
$activeNav = 'transcripts';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_transcript') {
        $name = trim($_POST['alumni_name'] ?? '');
        $gradYear = trim($_POST['grad_year'] ?? '');
        $dob = trim($_POST['dob'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $institution = trim($_POST['recipient_institution'] ?? '');
        $delivery = trim($_POST['delivery_type'] ?? 'Official Electronic PDF (Encrypted)');
        $notes = trim($_POST['tracking_notes'] ?? '');
        $status = trim($_POST['status'] ?? 'Processing');

        if (!empty($name) && !empty($gradYear)) {
            JsonDb::insert('transcripts', [
                'alumni_name' => $name,
                'grad_year' => $gradYear,
                'dob' => $dob,
                'email' => $email,
                'phone' => $phone,
                'recipient_institution' => $institution,
                'delivery_type' => $delivery,
                'status' => $status,
                'tracking_notes' => $notes
            ]);
            Auth::setFlash('success', "Transcript order for {$name} ({$gradYear}) logged.");
            header("Location: transcripts.php");
            exit;
        }
    } elseif ($action === 'update_status') {
        $id = $_POST['transcript_id'] ?? '';
        $newStatus = $_POST['new_status'] ?? 'Processing';
        $trackingNotes = trim($_POST['tracking_notes'] ?? '');
        
        $updates = ['status' => $newStatus];
        if (!empty($trackingNotes)) {
            $updates['tracking_notes'] = $trackingNotes;
        }

        if ($id) {
            JsonDb::update('transcripts', $id, $updates);
            Auth::setFlash('success', "Transcript order status updated.");
            header("Location: transcripts.php");
            exit;
        }
    } elseif ($action === 'delete_transcript') {
        $id = $_POST['transcript_id'] ?? '';
        if ($id) {
            JsonDb::delete('transcripts', $id);
            Auth::setFlash('info', "Transcript request deleted.");
            header("Location: transcripts.php");
            exit;
        }
    }
}

$transcripts = JsonDb::all('transcripts');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Alumni Transcript Requests</h1>
        <p class="page-header-subtitle">Process official academic records, university admissions dossiers, and employer verifications</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('transcriptsTable', 'transcript-requests-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addTranscriptModal')">
            <i class="fas fa-plus"></i> New Request
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search alumnus, grad year, recipient..." data-table-search="transcriptsTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Status:</label>
            <select class="adm-select" data-table-filter="transcriptsTable">
                <option value="all">All Statuses</option>
                <option value="Processing">Processing</option>
                <option value="Completed">Completed</option>
                <option value="On Hold">On Hold</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="transcriptsTable">
            <thead>
                <tr>
                    <th>Alumnus / Graduate</th>
                    <th>Grad Year</th>
                    <th>Recipient Institution</th>
                    <th>Delivery Format</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Tracking Notes</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($transcripts)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No transcript requests on file.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($transcripts as $tr): ?>
                        <tr data-status="<?php echo htmlspecialchars($tr['status']); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;"><?php echo htmlspecialchars($tr['alumni_name']); ?></strong><br>
                                <span style="font-size: 0.78rem; color: var(--adm-text-muted);">
                                    DOB: <?php echo htmlspecialchars($tr['dob'] ?? 'N/A'); ?> &bull; 
                                    <a href="mailto:<?php echo htmlspecialchars($tr['email'] ?? ''); ?>" style="color: var(--adm-primary); text-decoration: none;">
                                        <?php echo htmlspecialchars($tr['email'] ?? ''); ?>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-primary-soft); color: var(--adm-primary); font-weight: 700;">
                                    Class of <?php echo htmlspecialchars($tr['grad_year']); ?>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.85rem;"><?php echo htmlspecialchars($tr['recipient_institution']); ?></strong>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-text);">
                                    <i class="fas fa-paper-plane" style="color: var(--adm-gold);"></i> <?php echo htmlspecialchars($tr['delivery_type']); ?>
                                </span>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-text-muted);">
                                    <?php echo date('M j, Y', strtotime($tr['created_at'])); ?>
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="transcripts.php" style="display: inline-block;">
                                    <input type="hidden" name="action" value="update_status">
                                    <input type="hidden" name="transcript_id" value="<?php echo htmlspecialchars($tr['id']); ?>">
                                    <select name="new_status" class="adm-select" style="padding: 3px 8px; font-size: 0.78rem; border-radius: 12px; font-weight: 600;" onchange="this.form.submit()">
                                        <option value="Processing" <?php echo ($tr['status'] === 'Processing') ? 'selected' : ''; ?>>Processing</option>
                                        <option value="Completed" <?php echo ($tr['status'] === 'Completed') ? 'selected' : ''; ?>>Completed</option>
                                        <option value="On Hold" <?php echo ($tr['status'] === 'On Hold') ? 'selected' : ''; ?>>On Hold</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div style="max-width: 200px; font-size: 0.8rem; color: var(--adm-text-muted); line-height: 1.3;" title="<?php echo htmlspecialchars($tr['tracking_notes'] ?? ''); ?>">
                                    <?php echo htmlspecialchars(!empty($tr['tracking_notes']) ? $tr['tracking_notes'] : 'No tracking info'); ?>
                                </div>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="transcripts.php" style="display: inline;" onsubmit="return confirm('Delete this transcript record?');">
                                    <input type="hidden" name="action" value="delete_transcript">
                                    <input type="hidden" name="transcript_id" value="<?php echo htmlspecialchars($tr['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Order">
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

<!-- Add Transcript Modal -->
<div class="adm-modal-backdrop" id="addTranscriptModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-plus-circle" style="color: var(--adm-primary);"></i> New Transcript Request</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addTranscriptModal">&times;</button>
        </div>
        <form method="POST" action="transcripts.php">
            <input type="hidden" name="action" value="create_transcript">
            <div class="adm-modal-body">
                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Graduate Full Name *</label>
                        <input type="text" name="alumni_name" class="adm-input" placeholder="e.g. Samuel Green" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Graduation Year *</label>
                        <input type="text" name="grad_year" class="adm-input" placeholder="e.g. 2024" required>
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Date of Birth</label>
                        <input type="date" name="dob" class="adm-input" value="2005-08-20">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Email Address *</label>
                        <input type="email" name="email" class="adm-input" placeholder="samuel@email.com" required>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Recipient College / Organization *</label>
                    <input type="text" name="recipient_institution" class="adm-input" placeholder="e.g. University of Central Florida Registrar" required>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Delivery Format</label>
                        <select name="delivery_type" class="adm-select" style="width: 100%;">
                            <option value="Official Electronic PDF (Encrypted)">Official Electronic PDF (Encrypted)</option>
                            <option value="Official Sealed Hardcopy">Official Sealed Hardcopy</option>
                            <option value="Certified Legal Dossier">Certified Legal Dossier</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Initial Status</label>
                        <select name="status" class="adm-select" style="width: 100%;">
                            <option value="Processing" selected>Processing</option>
                            <option value="Completed">Completed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Tracking Notes / Seal Signature Details</label>
                    <textarea name="tracking_notes" class="adm-textarea" placeholder="e.g. Seal applied; FedEx tracking # or email sent confirmation..."></textarea>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addTranscriptModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Request</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
