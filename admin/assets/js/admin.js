/**
 * Mid Florida Scholars Academy - Admin Panel JavaScript
 * Interactivity: Modals, Table Filters, CSV Export, Toasts, Sidebar Toggle
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Sidebar Toggle
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    const sidebar = document.querySelector('.admin-sidebar');
    
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('show-mobile');
        });

        // Close on clicking outside on mobile
        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target) && sidebar.classList.contains('show-mobile')) {
                    sidebar.classList.remove('show-mobile');
                }
            }
        });
    }

    // 2. Client-side Table Filter & Search
    const searchInputs = document.querySelectorAll('[data-table-search]');
    searchInputs.forEach(input => {
        const tableId = input.getAttribute('data-table-search');
        const table = document.getElementById(tableId);
        if (!table) return;

        input.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            const rows = table.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    });

    // Status Filter Select
    const statusFilters = document.querySelectorAll('[data-table-filter]');
    statusFilters.forEach(select => {
        const tableId = select.getAttribute('data-table-filter');
        const table = document.getElementById(tableId);
        if (!table) return;

        select.addEventListener('change', function () {
            const selectedStatus = this.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const statusAttr = (row.getAttribute('data-status') || '').toLowerCase();
                if (selectedStatus === 'all' || selectedStatus === '' || statusAttr === selectedStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    // 3. Modals System
    window.openModal = function (modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closeModal = function (modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('show');
            document.body.style.overflow = '';
        }
    };

    // Close modal when clicking backdrop
    document.querySelectorAll('.adm-modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', function (e) {
            if (e.target === this) {
                this.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    });

    // Close modal button handlers
    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', function () {
            const modalId = this.getAttribute('data-close-modal');
            window.closeModal(modalId);
        });
    });

    // 4. CSV Export Function
    window.exportTableToCSV = function (tableId, filename) {
        const table = document.getElementById(tableId);
        if (!table) return;

        let csv = [];
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            if (row.style.display === 'none') return; // ignore filtered rows
            
            let rowData = [];
            const cols = row.querySelectorAll('th, td');
            
            // Exclude action buttons column if last column has class no-export
            cols.forEach((col, idx) => {
                if (col.classList.contains('no-export')) return;
                let text = col.innerText.replace(/"/g, '""').trim();
                rowData.push('"' + text + '"');
            });
            csv.push(rowData.join(','));
        });

        const csvFile = new Blob([csv.join('\n')], { type: 'text/csv;charset=utf-8;' });
        const downloadLink = document.createElement('a');
        downloadLink.download = (filename || 'export') + '.csv';
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        
        window.showToast('Export Successful', 'File downloaded as CSV', 'success');
    };

    // 5. Toast System
    window.showToast = function (title, msg, type = 'info') {
        let container = document.getElementById('admToastContainer');
        if (!container) {
            container = document.createElement('div');
            container.id = 'admToastContainer';
            container.className = 'toast-container';
            document.body.appendChild(container);
        }

        const icons = {
            success: 'fa-check-circle',
            danger: 'fa-exclamation-circle',
            warning: 'fa-exclamation-triangle',
            info: 'fa-info-circle'
        };

        const toast = document.createElement('div');
        toast.className = `adm-toast ${type}`;
        toast.innerHTML = `
            <i class="fas ${icons[type] || icons.info} adm-toast-icon"></i>
            <div class="adm-toast-content">
                <div class="adm-toast-title">${title}</div>
                <div class="adm-toast-msg">${msg}</div>
            </div>
            <button style="background:none;border:none;cursor:pointer;color:#94a3b8;font-size:1rem;" onclick="this.parentElement.remove()">&times;</button>
        `;

        container.appendChild(toast);

        setTimeout(() => {
            toast.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
            toast.style.opacity = '0';
            toast.style.transform = 'translateX(100%)';
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    };

    // 6. Demo Login Credentials Filler
    const demoFillBtn = document.getElementById('fillDemoCredsBtn');
    if (demoFillBtn) {
        demoFillBtn.addEventListener('click', function () {
            const userField = document.getElementById('loginUsername');
            const passField = document.getElementById('loginPassword');
            if (userField && passField) {
                userField.value = 'admin';
                passField.value = 'admin123';
                window.showToast('Credentials Filled', 'Username: admin, Password: admin123', 'info');
            }
        });
    }
});
