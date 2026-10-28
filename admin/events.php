<?php
/**
 * Mid Florida Scholars Academy - Academic Calendar & Events Manager
 */
$pageTitle = 'School Calendar & Events';
$activeNav = 'events';
require_once __DIR__ . '/includes/header.php';

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'create_event') {
        $title = trim($_POST['title'] ?? '');
        $cat = trim($_POST['category'] ?? 'Academic');
        $start = trim($_POST['start_date'] ?? date('Y-m-d'));
        $end = trim($_POST['end_date'] ?? $start);
        $time = trim($_POST['time'] ?? 'All Day');
        $location = trim($_POST['location'] ?? 'Mid Florida Scholars Academy Campus');
        $desc = trim($_POST['description'] ?? '');
        $public = isset($_POST['is_public']);

        if (!empty($title)) {
            JsonDb::insert('events', [
                'title' => $title,
                'category' => $cat,
                'start_date' => $start,
                'end_date' => $end,
                'time' => $time,
                'location' => $location,
                'description' => $desc,
                'is_public' => $public
            ]);
            Auth::setFlash('success', "Event '{$title}' added to calendar.");
            header("Location: events.php");
            exit;
        }
    } elseif ($action === 'delete_event') {
        $id = $_POST['event_id'] ?? '';
        if ($id) {
            JsonDb::delete('events', $id);
            Auth::setFlash('info', "Calendar event removed.");
            header("Location: events.php");
            exit;
        }
    }
}

$events = JsonDb::all('events');
?>

<div class="page-header">
    <div>
        <h1 class="page-header-title">Academic Calendar &amp; Events</h1>
        <p class="page-header-subtitle">Publish important dates, open house showcases, report card deadlines, and holidays</p>
    </div>
    <div class="page-actions">
        <button type="button" class="btn-adm btn-adm-outline" onclick="exportTableToCSV('eventsTable', 'school-events-midflorida')">
            <i class="fas fa-file-export"></i> Export CSV
        </button>
        <button type="button" class="btn-adm btn-adm-primary" onclick="openModal('addEventModal')">
            <i class="fas fa-calendar-plus"></i> Add Event
        </button>
    </div>
</div>

<div class="admin-card">
    <div class="table-filter-bar">
        <div class="filter-search-box">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search event title, category, location..." data-table-search="eventsTable">
        </div>
        <div class="filter-selects">
            <label style="font-size: 0.8rem; color: var(--adm-text-muted); font-weight: 600;">Category:</label>
            <select class="adm-select" data-table-filter="eventsTable">
                <option value="all">All Categories</option>
                <option value="Academic">Academic</option>
                <option value="Admissions">Admissions</option>
                <option value="Holiday">Holiday</option>
                <option value="College Prep">College Prep</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="adm-table" id="eventsTable">
            <thead>
                <tr>
                    <th>Event Title &amp; Details</th>
                    <th>Category</th>
                    <th>Date(s)</th>
                    <th>Time</th>
                    <th>Campus Location</th>
                    <th>Visibility</th>
                    <th class="no-export" style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($events)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 32px; color: var(--adm-text-muted);">
                            No events scheduled yet.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($events as $evt): ?>
                        <tr data-status="<?php echo htmlspecialchars($evt['category']); ?>">
                            <td>
                                <strong style="color: var(--adm-navy); font-size: 0.95rem;"><?php echo htmlspecialchars($evt['title']); ?></strong>
                                <?php if (!empty($evt['description'])): ?>
                                    <div style="font-size: 0.78rem; color: var(--adm-text-muted); max-width: 280px; margin-top: 3px;">
                                        <?php echo htmlspecialchars($evt['description']); ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge-pill" style="background: var(--adm-primary-soft); color: var(--adm-primary); font-weight: 600;">
                                    <?php echo htmlspecialchars($evt['category']); ?>
                                </span>
                            </td>
                            <td>
                                <strong style="color: var(--adm-navy);"><?php echo date('M j, Y', strtotime($evt['start_date'])); ?></strong>
                                <?php if (!empty($evt['end_date']) && $evt['end_date'] !== $evt['start_date']): ?>
                                    <br><span style="font-size: 0.76rem; color: var(--adm-text-muted);">to <?php echo date('M j, Y', strtotime($evt['end_date'])); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-text);"><i class="fas fa-clock" style="color: var(--adm-gold);"></i> <?php echo htmlspecialchars($evt['time']); ?></span>
                            </td>
                            <td>
                                <span style="font-size: 0.82rem; color: var(--adm-text);"><i class="fas fa-map-marker-alt" style="color: var(--adm-text-muted);"></i> <?php echo htmlspecialchars($evt['location']); ?></span>
                            </td>
                            <td>
                                <?php if (!empty($evt['is_public'])): ?>
                                    <span class="badge-pill badge-status-confirmed badge-pill-dot">Public</span>
                                <?php else: ?>
                                    <span class="badge-pill badge-status-waitlist badge-pill-dot">Staff Only</span>
                                <?php endif; ?>
                            </td>
                            <td class="no-export" style="text-align: right; white-space: nowrap;">
                                <form method="POST" action="events.php" style="display: inline;" onsubmit="return confirm('Delete this calendar event?');">
                                    <input type="hidden" name="action" value="delete_event">
                                    <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($evt['id']); ?>">
                                    <button type="submit" class="btn-adm btn-adm-outline btn-icon-only" style="color: var(--adm-danger);" title="Delete Event">
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

<!-- Add Event Modal -->
<div class="adm-modal-backdrop" id="addEventModal">
    <div class="adm-modal">
        <div class="adm-modal-header">
            <h3 class="adm-modal-title"><i class="fas fa-calendar-plus" style="color: var(--adm-primary);"></i> Add Calendar Event</h3>
            <button type="button" class="adm-modal-close" data-close-modal="addEventModal">&times;</button>
        </div>
        <form method="POST" action="events.php">
            <input type="hidden" name="action" value="create_event">
            <div class="adm-modal-body">
                <div class="adm-form-group">
                    <label class="adm-label">Event Title *</label>
                    <input type="text" name="title" class="adm-input" placeholder="e.g. Winter Semester Parent-Teacher Conferences" required>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Category</label>
                        <select name="category" class="adm-select" style="width: 100%;">
                            <option value="Academic">Academic</option>
                            <option value="Admissions">Admissions</option>
                            <option value="Holiday">Holiday</option>
                            <option value="College Prep">College Prep</option>
                            <option value="Athletics">Athletics</option>
                            <option value="Arts & Music">Arts &amp; Music</option>
                        </select>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Time / Schedule</label>
                        <input type="text" name="time" class="adm-input" placeholder="e.g. 09:00 AM - 12:00 PM or All Day">
                    </div>
                </div>

                <div class="form-grid-2">
                    <div class="adm-form-group">
                        <label class="adm-label">Start Date *</label>
                        <input type="date" name="start_date" class="adm-input" value="<?php echo date('Y-m-d', strtotime('+1 week')); ?>" required>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">End Date (Optional)</label>
                        <input type="date" name="end_date" class="adm-input">
                    </div>
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Campus Location</label>
                    <input type="text" name="location" class="adm-input" value="Mid Florida Scholars Academy Campus">
                </div>

                <div class="adm-form-group">
                    <label class="adm-label">Event Description</label>
                    <textarea name="description" class="adm-textarea" placeholder="Brief summary of event agenda or requirements..."></textarea>
                </div>

                <div class="adm-form-group">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" name="is_public" checked style="accent-color: var(--adm-primary);"> Show on public school website calendar
                    </label>
                </div>
            </div>
            <div class="adm-modal-footer">
                <button type="button" class="btn-adm btn-adm-outline" data-close-modal="addEventModal">Cancel</button>
                <button type="submit" class="btn-adm btn-adm-primary">Save Event</button>
            </div>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
