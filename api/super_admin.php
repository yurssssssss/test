<?php $pageTitle = 'Super Admin – DPNHS'; ?>
<?php include 'header.php'; ?>

<style>
/* ===== FULL SIDEBAR LAYOUT ===== */
body { margin:0; background:#f1f5f9; }
.page-wrapper { display:flex; min-height:100vh; }

/* ── LEFT SIDEBAR ── */
.left-sidebar {
  width: 240px; min-width: 240px;
  background: #1a1240;
  display: flex; flex-direction: column;
  position: fixed; top:0; left:0;
  height: 100vh; z-index:200;
  overflow-y: auto;
  transition: transform .28s cubic-bezier(.4,0,.2,1);
}
.left-sidebar::-webkit-scrollbar { width:4px; }
.left-sidebar::-webkit-scrollbar-thumb { background:rgba(255,255,255,.1); border-radius:4px; }

.sb-brand {
  display:flex; align-items:center; gap:12px;
  padding:20px 20px 16px;
  border-bottom:1px solid rgba(255,255,255,.08);
}
.sb-brand img { width:40px; height:40px; border-radius:10px; }
.sb-brand-name { font-size:15px; font-weight:800; color:#fff; letter-spacing:.01em; }
.sb-brand-sub  { font-size:10.5px; color:rgba(255,255,255,.4); }

.sb-user {
  display:flex; align-items:center; gap:10px;
  padding:14px 20px;
  border-bottom:1px solid rgba(255,255,255,.08);
}
.sb-avatar {
  width:36px; height:36px; border-radius:50%;
  background:#7c3aed;
  display:flex; align-items:center; justify-content:center;
  font-size:13px; font-weight:800; color:#fff; flex-shrink:0;
  border:2px solid rgba(255,255,255,.2);
}
.sb-user-name { font-size:13px; font-weight:700; color:#fff; line-height:1.2; }
.sb-user-role { font-size:10.5px; color:rgba(255,255,255,.4); }

.sb-section-label {
  font-size:10px; font-weight:700;
  text-transform:uppercase; letter-spacing:.1em;
  color:rgba(255,255,255,.3);
  padding:18px 20px 6px;
}

.sb-nav-item {
  display:flex; align-items:center; gap:12px;
  padding:11px 20px;
  color:rgba(255,255,255,.6);
  font-size:13.5px; font-weight:500;
  cursor:pointer;
  transition:background .15s, color .15s;
  border-left:3px solid transparent;
  user-select:none; text-decoration:none;
}
.sb-nav-item i { font-size:16px; width:20px; text-align:center; flex-shrink:0; }
.sb-nav-item:hover { background:rgba(255,255,255,.07); color:#fff; text-decoration:none; }
.sb-nav-item.active {
  background:rgba(124,58,237,.25);
  color:#fff; font-weight:700;
  border-left-color:#a78bfa;
}
.sb-nav-item.active i { color:#a78bfa; }

.sb-bottom {
  margin-top:auto; padding:12px 12px 16px;
  border-top:1px solid rgba(255,255,255,.08);
}
.sb-logout {
  display:flex; align-items:center; gap:10px;
  padding:10px 14px; border-radius:10px;
  color:rgba(255,255,255,.6); font-size:13.5px; font-weight:500;
  cursor:pointer; text-decoration:none;
  transition:background .15s, color .15s;
}
.sb-logout:hover { background:rgba(239,68,68,.18); color:#f87171; text-decoration:none; }
.sb-logout i { font-size:16px; }

/* ── RIGHT CONTENT ── */
.main-area {
  margin-left:240px;
  flex:1;
  width: calc(100% - 240px);
  display:flex;
  flex-direction:column;
  min-width:0;
}

.main-topbar {
  background:#fff; border-bottom:1px solid #e2e8f0;
  display:flex; align-items:center; justify-content:space-between;
  padding:10px 28px; position:sticky; top:0; z-index:100;
}
.topbar-toggle {
  display:none; background:none; border:none;
  font-size:20px; color:#475569; cursor:pointer; padding:4px;
}
.topbar-right { display:flex; align-items:center; gap:10px; }
.topbar-icon {
  width:34px; height:34px; border-radius:8px;
  display:flex; align-items:center; justify-content:center;
  font-size:16px; color:#64748b; cursor:pointer;
  background:#f8fafc; border:1px solid #e2e8f0;
  transition:background .15s;
}
.topbar-icon:hover { background:#f1f5f9; color:#1e293b; }

.admin-content { padding:28px; flex:1; width:100%; box-sizing:border-box; }

/* All tab panels and their cards stretch full width */
#sa-tab-admins,
#sa-tab-logs,
#sa-tab-announcements,
#sa-tab-history,
#sa-tab-enrollment {
  width: 100%;
}

#sa-tab-admins > .card,
#sa-tab-logs > .card,
#sa-tab-announcements > .card,
#sa-tab-history > .card {
  width: 100%;
  max-width: 100%;
}

/* Overlay */
.sb-overlay {
  display:none; position:fixed; inset:0;
  background:rgba(0,0,0,.45); z-index:199;
}

/* ── RESPONSIVE ── */
@media (max-width:991px) {
  .left-sidebar { transform:translateX(-100%); }
  .left-sidebar.open { transform:translateX(0); }
  .sb-overlay.open { display:block; }
  .main-area { margin-left:0; width:100%; }
  .topbar-toggle { display:flex; align-items:center; justify-content:center; }
  .admin-content { padding:18px; }
}
@media (max-width:575px) { .admin-content { padding:14px; } }

.av-purple { background:#7c3aed; }
.btn-outline-navy { border-color:var(--navy); color:var(--navy); }
.btn-outline-navy:hover { background:var(--navy); color:#fff; }
</style>

<!-- ===== SIDEBAR OVERLAY (mobile) ===== -->
<div class="sb-overlay" id="sbOverlay" onclick="closeSidebar()"></div>

<!-- ===== PAGE WRAPPER ===== -->
<div class="page-wrapper">

  <!-- ── LEFT SIDEBAR ── -->
  <aside class="left-sidebar" id="leftSidebar">

    <div class="sb-brand">
      <img src="// logo.png" alt="DPNHS Logo">
      <div>
        <div class="sb-brand-name">DPNHS</div>
        <div class="sb-brand-sub">Super Admin Panel</div>
      </div>
    </div>

    <div class="sb-user">
      <div class="sb-avatar">SA</div>
      <div>
        <div class="sb-user-name">Super Admin</div>
        <div class="sb-user-role">superadmin@dpnhs.edu.ph</div>
      </div>
    </div>

    <div class="sb-section-label">Main Menu</div>

    <div class="sb-nav-item active" onclick="switchSATab('admins',this)" data-tab="admins">
      <i class="bi bi-shield-lock"></i>
      <span>Admin Accounts</span>
    </div>
    <div class="sb-nav-item" onclick="switchSATab('logs',this)" data-tab="logs">
      <i class="bi bi-clock-history"></i>
      <span>Activity Logs</span>
    </div>
    <div class="sb-nav-item" onclick="switchSATab('announcements',this)" data-tab="announcements">
      <i class="bi bi-megaphone-fill"></i>
      <span>Announcements</span>
    </div>
    <div class="sb-nav-item" onclick="switchSATab('history',this)" data-tab="history">
      <i class="bi bi-archive-fill"></i>
      <span>Enrollment History</span>
    </div>

    <div class="sb-bottom">
      <a href="index.php" class="sb-logout">
        <i class="bi bi-box-arrow-left"></i>
        <span>Logout</span>
      </a>
    </div>

  </aside>

  <!-- ── MAIN AREA ── -->
  <div class="main-area">

    <div class="main-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="topbar-toggle" onclick="openSidebar()">
          <i class="bi bi-list"></i>
        </button>
        <div>
          <div class="fw-bold" style="font-size:15px;color:#1e293b" id="pageTitle">Admin Accounts</div>
          <div class="text-muted" style="font-size:12px">System-wide control and monitoring</div>
        </div>
      </div>
      <div class="topbar-right">
        <span class="topbar-icon"><i class="bi bi-bell"></i></span>
        <span class="topbar-icon"><i class="bi bi-gear"></i></span>
        <div style="width:34px;height:34px;border-radius:50%;background:#7c3aed;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:800;color:#fff">SA</div>
      </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="admin-content">

  <div class="fw-bold mb-1 fs-5" style="color:#1e293b">Super Admin Dashboard</div>
  <div class="text-muted mb-4" style="font-size:14px">System-wide control: manage admin accounts, enrollment periods, and monitor all activities</div>

  <!-- ENROLLMENT PERIOD BANNER -->
  <div class="card border-0 rounded-3 p-4 mb-4 position-relative overflow-hidden" style="background:linear-gradient(135deg,#7c3aed 0%,#1e3a8a 100%)">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div>
        <div class="d-flex align-items-center gap-2 mb-1">
          <i class="bi bi-calendar-check-fill text-white" style="font-size:18px"></i>
          <span class="fw-bold text-white" style="font-size:16px">Enrollment Period Control</span>
        </div>
        <div class="text-white-50" style="font-size:13px">Currently: <span id="enrollmentStatusText" class="fw-semibold text-white">OPEN – SY 2025–2026</span></div>
        <div class="text-white-50 mt-1" style="font-size:12px">
          Start: <span id="enrollStart" class="text-white fw-medium">June 1, 2025</span> &nbsp;|&nbsp;
          End: <span id="enrollEnd" class="text-white fw-medium">July 31, 2025</span>
        </div>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <button class="btn btn-light btn-sm fw-semibold px-3" onclick="openEnrollmentModal()">
          <i class="bi bi-pencil-fill me-1"></i>Edit Period
        </button>
        <button class="btn btn-sm fw-semibold px-3" id="toggleEnrollBtn"
          style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.4)"
          onclick="toggleEnrollment()">
          <i class="bi bi-stop-fill me-1"></i>Close Enrollment
        </button>
      </div>
    </div>
  </div>

  <!-- STAT CARDS -->
  <div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon" style="background:#f5f3ff;color:#7c3aed;width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;margin-bottom:12px"><i class="bi bi-shield-lock-fill"></i></div>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">4</div>
        <div class="text-muted" style="font-size:13px">Active Admins</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon blue mb-3"><i class="bi bi-people-fill"></i></div>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">1,245</div>
        <div class="text-muted" style="font-size:13px">Total Students</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon orange mb-3"><i class="bi bi-clock-fill"></i></div>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">38</div>
        <div class="text-muted" style="font-size:13px">Pending Applications</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon green mb-3"><i class="bi bi-activity"></i></div>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">12</div>
        <div class="text-muted" style="font-size:13px">System Logs Today</div>
      </div>
    </div>
  </div>

  <!-- ===================== TAB: ADMIN ACCOUNTS ===================== -->
  <div id="sa-tab-admins">
    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Admin Account Management</div>
          <div class="text-muted" style="font-size:13px">Each admin handles one grade level (Gr 7–10)</div>
        </div>
        <button class="btn btn-sm fw-semibold px-3" style="background:#7c3aed;color:#fff" onclick="openCreateAdminModal()">
          <i class="bi bi-person-plus-fill me-1"></i>Create Admin Account
        </button>
      </div>

      <!-- Grade assignment legend -->
      <div class="d-flex flex-wrap gap-2 mb-3">
        <span class="badge rounded-pill px-3 py-2" style="background:#eff6ff;color:#1e40af;font-size:12px;font-weight:600"><i class="bi bi-mortarboard-fill me-1"></i>Grade 7 – Admin</span>
        <span class="badge rounded-pill px-3 py-2" style="background:#f0fdf4;color:#166534;font-size:12px;font-weight:600"><i class="bi bi-mortarboard-fill me-1"></i>Grade 8 – Admin</span>
        <span class="badge rounded-pill px-3 py-2" style="background:#fff7ed;color:#9a3412;font-size:12px;font-weight:600"><i class="bi bi-mortarboard-fill me-1"></i>Grade 9 – Admin</span>
        <span class="badge rounded-pill px-3 py-2" style="background:#fdf4ff;color:#7e22ce;font-size:12px;font-weight:600"><i class="bi bi-mortarboard-fill me-1"></i>Grade 10 – Admin</span>
      </div>

      <div class="position-relative mb-3">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        <input type="text" class="form-control ps-5" placeholder="Search admins..." oninput="filterTable('adminTable',this.value)">
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle" id="adminTable">
          <thead class="table-light">
            <tr>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Name</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Email</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Assigned Grade</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Status</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Last Login</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Actions</th>
            </tr>
          </thead>
          <tbody style="font-size:13.5px" id="adminTableBody">
            <tr>
              <td><span class="stu-avatar av-blue">G7</span>Ana Reyes</td>
              <td>ana.reyes@dpnhs.edu.ph</td>
              <td><span class="badge rounded-pill px-3" style="background:#eff6ff;color:#1e40af">Grade 7</span></td>
              <td><span class="badge-enrolled">Active</span></td>
              <td class="text-muted" style="font-size:12px">Apr 8, 2026 – 9:14 AM</td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openEditAdminModal('Ana Reyes','Grade 7','ana.reyes@dpnhs.edu.ph'))"><i class="bi bi-pencil text-navy"></i> Edit</button>
                    <button class="action-item" onclick="closeMenuThen(()=>resetAdminPassword('Ana Reyes'))"><i class="bi bi-key text-warning"></i> Reset Password</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>deactivateAdmin('Ana Reyes'))"><i class="bi bi-slash-circle"></i> Deactivate</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="stu-avatar av-green">G8</span>Ben Santos</td>
              <td>ben.santos@dpnhs.edu.ph</td>
              <td><span class="badge rounded-pill px-3" style="background:#f0fdf4;color:#166534">Grade 8</span></td>
              <td><span class="badge-enrolled">Active</span></td>
              <td class="text-muted" style="font-size:12px">Apr 8, 2026 – 8:50 AM</td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openEditAdminModal('Ben Santos','Grade 8','ben.santos@dpnhs.edu.ph'))"><i class="bi bi-pencil text-navy"></i> Edit</button>
                    <button class="action-item" onclick="closeMenuThen(()=>resetAdminPassword('Ben Santos'))"><i class="bi bi-key text-warning"></i> Reset Password</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>deactivateAdmin('Ben Santos'))"><i class="bi bi-slash-circle"></i> Deactivate</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="stu-avatar av-orange">G9</span>Clara Dela Cruz</td>
              <td>clara.delacruz@dpnhs.edu.ph</td>
              <td><span class="badge rounded-pill px-3" style="background:#fff7ed;color:#9a3412">Grade 9</span></td>
              <td><span class="badge-enrolled">Active</span></td>
              <td class="text-muted" style="font-size:12px">Apr 7, 2026 – 4:03 PM</td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openEditAdminModal('Clara Dela Cruz','Grade 9','clara.delacruz@dpnhs.edu.ph'))"><i class="bi bi-pencil text-navy"></i> Edit</button>
                    <button class="action-item" onclick="closeMenuThen(()=>resetAdminPassword('Clara Dela Cruz'))"><i class="bi bi-key text-warning"></i> Reset Password</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>deactivateAdmin('Clara Dela Cruz'))"><i class="bi bi-slash-circle"></i> Deactivate</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td><span class="stu-avatar av-purple">G10</span>Diego Lim</td>
              <td>diego.lim@dpnhs.edu.ph</td>
              <td><span class="badge rounded-pill px-3" style="background:#fdf4ff;color:#7e22ce">Grade 10</span></td>
              <td><span class="badge" style="background:#fef9c3;color:#713f12;font-size:12px;padding:4px 10px;border-radius:20px">Inactive</span></td>
              <td class="text-muted" style="font-size:12px">Apr 1, 2026 – 2:15 PM</td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openEditAdminModal('Diego Lim','Grade 10','diego.lim@dpnhs.edu.ph'))"><i class="bi bi-pencil text-navy"></i> Edit</button>
                    <button class="action-item" onclick="closeMenuThen(()=>resetAdminPassword('Diego Lim'))"><i class="bi bi-key text-warning"></i> Reset Password</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>activateAdmin('Diego Lim'))"><i class="bi bi-check-circle"></i> Activate</button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ===================== TAB: ENROLLMENT SETTINGS ===================== -->
  <div id="sa-tab-enrollment" class="d-none">
    <div class="row g-3">

      <!-- Enrollment Period Card -->
     
      <!-- Grade-level toggles -->
      <div class="col-lg-6">
        <div class="card border rounded-3 p-4">
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b"><i class="bi bi-toggles me-2 text-navy"></i>Grade-Level Enrollment Toggle</div>
          <div class="text-muted mb-4" style="font-size:13px">Enable or disable enrollment per grade level</div>

          <?php
          $grades = ['Grade 7' => true, 'Grade 8' => true, 'Grade 9' => false, 'Grade 10' => false];
          $gradeColors = ['Grade 7' => '#1e40af', 'Grade 8' => '#166534', 'Grade 9' => '#9a3412', 'Grade 10' => '#7e22ce'];
          foreach($grades as $g => $on):
          ?>
          <div class="d-flex align-items-center justify-content-between py-3" style="border-bottom:1px solid #f1f5f9">
            <div class="d-flex align-items-center gap-3">
              <div style="width:36px;height:36px;border-radius:8px;background:#f1f5f9;display:flex;align-items:center;justify-content:center">
                <i class="bi bi-mortarboard-fill" style="color:<?= $gradeColors[$g] ?>"></i>
              </div>
              <div>
                <div class="fw-semibold" style="font-size:13.5px;color:#1e293b"><?= $g ?></div>
                <div class="text-muted" style="font-size:11.5px"><?= $on ? 'Enrollment Open' : 'Enrollment Closed' ?></div>
              </div>
            </div>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input" type="checkbox" <?= $on ? 'checked' : '' ?> style="width:2.5em;height:1.3em;cursor:pointer">
            </div>
          </div>
          <?php endforeach; ?>
          <button class="btn btn-outline-navy btn-sm fw-semibold w-100 mt-3" onclick="alert('Grade toggles saved!')">
            <i class="bi bi-save me-1"></i>Save Grade Settings
          </button>
        </div>
      </div>

    </div>
  </div>

  <!-- ===================== TAB: ACTIVITY LOGS ===================== -->
  <div id="sa-tab-logs" class="d-none">
    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Activity Logs</div>
          <div class="text-muted" style="font-size:13px">All admin and system actions are recorded here</div>
        </div>
        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-download me-1"></i>Export Logs</button>
      </div>
      <div class="position-relative mb-3">
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
        <input type="text" class="form-control ps-5" placeholder="Search logs...">
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-light">
            <tr>
              <th style="font-size:12px;text-transform:uppercase;color:#64748b">Timestamp</th>
              <th style="font-size:12px;text-transform:uppercase;color:#64748b">User</th>
              <th style="font-size:12px;text-transform:uppercase;color:#64748b">Role</th>
              <th style="font-size:12px;text-transform:uppercase;color:#64748b">Action</th>
              <th style="font-size:12px;text-transform:uppercase;color:#64748b">Details</th>
            </tr>
          </thead>
          <tbody style="font-size:13px">
            <?php
            $logs = [
              ['Apr 8, 2026 – 9:14 AM','Ana Reyes','Admin (Gr 7)','Approved Application','Applicant: Jose Madera (APP027)','success'],
              ['Apr 8, 2026 – 8:50 AM','Ben Santos','Admin (Gr 8)','Rejected Application','Applicant: Maria Lopez (APP031) – Incomplete Requirements','danger'],
              ['Apr 8, 2026 – 8:30 AM','Super Admin','Super Admin','Created Admin Account','New admin: Diego Lim assigned to Grade 10','purple'],
              ['Apr 7, 2026 – 4:03 PM','Clara Dela Cruz','Admin (Gr 9)','Auto-Sectioning','Grade 9: 2 sections created (Sec A – 41 students, Sec B – 41 students)','info'],
              ['Apr 7, 2026 – 2:00 PM','Super Admin','Super Admin','Enrollment Period Updated','Enrollment set OPEN: June 1 – July 31, 2025','purple'],
              ['Apr 6, 2026 – 11:15 AM','Ana Reyes','Admin (Gr 7)','Validated Student','Student info confirmed: Lisa Davis (STU2025007)','success'],
            ];
            $logColors = ['success'=>'#166534','danger'=>'#991b1b','info'=>'#0369a1','purple'=>'#7c3aed'];
            $logBg = ['success'=>'#dcfce7','danger'=>'#fee2e2','info'=>'#e0f2fe','purple'=>'#f5f3ff'];
            foreach($logs as $log): ?>
            <tr>
              <td class="text-muted" style="font-size:12px;white-space:nowrap"><?= $log[0] ?></td>
              <td class="fw-medium"><?= $log[1] ?></td>
              <td><span class="badge rounded-pill px-2" style="background:<?= $logBg[$log[5]] ?>;color:<?= $logColors[$log[5]] ?>;font-size:11px"><?= $log[2] ?></span></td>
              <td class="fw-semibold" style="color:<?= $logColors[$log[5]] ?>"><?= $log[3] ?></td>
              <td class="text-muted" style="font-size:12px"><?= $log[4] ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- ===================== TAB: ANNOUNCEMENTS ===================== -->
  <div id="sa-tab-announcements" class="d-none">
    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b"><i class="bi bi-megaphone-fill me-2" style="color:#7c3aed"></i>Announcements</div>
          <div class="text-muted" style="font-size:13px">Create and manage popup announcements shown to students on login</div>
        </div>
        <button class="btn btn-sm fw-semibold px-3" style="background:#7c3aed;color:#fff" onclick="openCreateAnnouncementModal()">
          <i class="bi bi-plus-circle me-1"></i>New Announcement
        </button>
      </div>

      <!-- Active announcement banner -->
      <div id="activeAnnouncementBanner" class="alert d-flex align-items-start gap-3 mb-3" style="background:#f5f3ff;border:1px solid #c4b5fd;border-radius:12px">
        <i class="bi bi-bell-fill" style="color:#7c3aed;font-size:18px;flex-shrink:0;margin-top:2px"></i>
        <div class="flex-grow-1">
          <div class="fw-bold mb-1" style="font-size:13.5px;color:#5b21b6">Active Announcement</div>
          <div id="activeAnnTitle" class="fw-semibold" style="font-size:14px;color:#1e293b">Welcome to SY 2025–2026 Enrollment!</div>
          <div id="activeAnnMsg" class="text-muted mt-1" style="font-size:13px">Online enrollment for SY 2025–2026 is now open. Please complete all steps and submit the required documents before the deadline.</div>
        </div>
        <span class="badge rounded-pill px-3 py-2" style="background:#dcfce7;color:#166534;font-size:11px;font-weight:700">● Active</span>
      </div>

      <!-- Announcements list -->
      <div id="announcementsList" class="d-flex flex-column gap-3"></div>
    </div>
  </div>

  <!-- ===================== TAB: ENROLLMENT HISTORY ===================== -->
  <div id="sa-tab-history" class="d-none">

    <!-- Summary banner -->
    <div class="card border-0 rounded-3 p-4 mb-4 position-relative overflow-hidden" style="background:linear-gradient(135deg,#7c3aed 0%,#1e3a8a 100%)">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
          <div class="d-flex align-items-center gap-2 mb-1">
            <i class="bi bi-archive-fill text-white" style="font-size:18px"></i>
            <span class="fw-bold text-white" style="font-size:16px">Enrollment History</span>
          </div>
          <div class="text-white-50" style="font-size:13px">Per-school-year enrollment records across all grade levels</div>
        </div>
        <button class="btn btn-light btn-sm fw-semibold px-3" onclick="alert('Exporting all SY history...')">
          <i class="bi bi-download me-1"></i>Export All
        </button>
      </div>
    </div>

    <!-- SY filter pills -->
    <div class="d-flex flex-wrap gap-2 mb-4" id="syFilterPills">
      <button class="btn btn-sm fw-semibold px-3 sy-pill active" data-sy="all" onclick="filterSYHistory('all',this)" style="background:#7c3aed;color:#fff;border:none">All Years</button>
      <button class="btn btn-sm fw-semibold px-3 sy-pill" data-sy="2025-2026" onclick="filterSYHistory('2025-2026',this)" style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0">SY 2025–2026</button>
      <button class="btn btn-sm fw-semibold px-3 sy-pill" data-sy="2024-2025" onclick="filterSYHistory('2024-2025',this)" style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0">SY 2024–2025</button>
      <button class="btn btn-sm fw-semibold px-3 sy-pill" data-sy="2023-2024" onclick="filterSYHistory('2023-2024',this)" style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0">SY 2023–2024</button>
    </div>

    <!-- SY history cards -->
    <div id="syHistoryList"></div>

  </div>

</div><!-- /admin-content -->
  </div><!-- /main-area -->
</div><!-- /page-wrapper -->


<!-- ===================== MODAL: CREATE ADMIN ===================== -->
<div class="modal fade" id="createAdminModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:520px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#7c3aed,#1e3a8a);padding:24px 28px 20px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff">
            <i class="bi bi-person-plus-fill"></i>
          </div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Create Admin Account</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">Assign to one grade level (Gr 7–10)</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-medium" style="font-size:13px">First Name *</label>
            <input type="text" class="form-control" placeholder="First Name" id="ca-fname">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-medium" style="font-size:13px">Last Name *</label>
            <input type="text" class="form-control" placeholder="Last Name" id="ca-lname">
          </div>
          <div class="col-12">
            <label class="form-label fw-medium" style="font-size:13px">Email Address *</label>
            <input type="email" class="form-control" placeholder="admin@dpnhs.edu.ph" id="ca-email">
          </div>
          <div class="col-12">
            <label class="form-label fw-medium" style="font-size:13px">Assigned Grade Level *</label>
            <select class="form-select" id="ca-grade">
              <option value="">Select grade level</option>
              <option>Grade 7</option>
              <option>Grade 8</option>
              <option>Grade 9</option>
              <option>Grade 10</option>
            </select>
            <div class="form-text"><i class="bi bi-info-circle me-1"></i>Only one admin per grade level is recommended.</div>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-medium" style="font-size:13px">Temporary Password *</label>
            <input type="password" class="form-control" placeholder="Set password" id="ca-pass">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-medium" style="font-size:13px">Confirm Password *</label>
            <input type="password" class="form-control" placeholder="Confirm password" id="ca-pass2">
          </div>
        </div>
        <div class="alert alert-info mt-3 py-2" style="font-size:12.5px">
          <i class="bi bi-shield-lock me-1"></i>The admin will be prompted to change their password upon first login.
        </div>
      </div>
      <div class="modal-footer border-0 pt-0 px-4 pb-4">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-sm fw-semibold px-4" style="background:#7c3aed;color:#fff" onclick="submitCreateAdmin()">
          <i class="bi bi-person-check me-1"></i>Create Admin
        </button>
      </div>
    </div>
  </div>
</div>


<!-- ===================== MODAL: EDIT ADMIN ===================== -->
<div class="modal fade" id="editAdminModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:480px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px">
      <div class="modal-header border-0 pb-0 px-4 pt-4">
        <div>
          <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-pencil-fill me-2" style="color:#7c3aed"></i>Edit Admin Account</h5>
          <div class="text-muted" style="font-size:13px">Editing: <strong id="ea-name-label"></strong></div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4">
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Email Address</label>
          <input type="email" class="form-control" id="ea-email">
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Assigned Grade Level</label>
          <select class="form-select" id="ea-grade">
            <option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option>
          </select>
        </div>
      </div>
      <div class="modal-footer border-0 px-4 pb-4">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-sm fw-semibold px-4" style="background:#7c3aed;color:#fff" onclick="submitEditAdmin()">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<!-- ===================== MODAL: ENROLLMENT PERIOD ===================== -->
<div class="modal fade" id="enrollmentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:440px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px">
      <div class="modal-header border-0 pb-0 px-4 pt-4">
        <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-calendar-check-fill me-2" style="color:#7c3aed"></i>Edit Enrollment Period</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-4">
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">School Year</label>
          <input type="text" class="form-control" value="2025–2026" id="ep-sy">
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Enrollment Start Date</label>
          <input type="date" class="form-control" value="2025-06-01" id="ep-start">
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Enrollment End Date</label>
          <input type="date" class="form-control" value="2025-07-31" id="ep-end">
        </div>
      </div>
      <div class="modal-footer border-0 px-4 pb-4">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-navy btn-sm fw-semibold px-4" onclick="saveEnrollmentPeriod()"><i class="bi bi-save me-1"></i>Save</button>
      </div>
    </div>
  </div>
</div>

<style>
  .av-purple { background:#7c3aed; }
  .btn-outline-navy { border-color:var(--navy); color:var(--navy); }
  .btn-outline-navy:hover { background:var(--navy); color:#fff; }
</style>

<script>
/* ── Tab switching ── */
const pageTitles = {
  admins:'Admin Accounts', enrollment:'Enrollment Settings',
  logs:'Activity Logs', announcements:'Announcements', history:'Enrollment History'
};
function switchSATab(tab, el) {
  sessionStorage.setItem('saTab', tab);
  document.querySelectorAll('.sb-nav-item').forEach(t => t.classList.remove('active'));
  if (el) {
    el.classList.add('active');
  } else {
    document.querySelectorAll('.sb-nav-item[data-tab]').forEach(function(item) {
      if (item.dataset.tab === tab) item.classList.add('active');
    });
  }
  ['admins','logs','announcements','history'].forEach(function(t) {
    document.getElementById('sa-tab-' + t).classList.toggle('d-none', t !== tab);
  });
  const titleEl = document.getElementById('pageTitle');
  if (titleEl) titleEl.textContent = pageTitles[tab] || tab;
  if (window.innerWidth < 992) closeSidebar();
}

/* ── Enrollment History data & render ── */
const _saHistoryData = [
  {
    sy: 'SY 2025\u20132026', key: '2025-2026', status: 'active',
    period: 'June 1, 2025 \u2013 July 31, 2025',
    totalEnrolled: 271, totalApplications: 301, totalRejected: 18, totalSections: 8,
    grades: [
      { label: 'Grade 7',  students: 64,  sections: 2, approved: 66, rejected: 4 },
      { label: 'Grade 8',  students: 58,  sections: 2, approved: 60, rejected: 5 },
      { label: 'Grade 9',  students: 82,  sections: 2, approved: 86, rejected: 6 },
      { label: 'Grade 10', students: 67,  sections: 2, approved: 89, rejected: 3 },
    ]
  },
  {
    sy: 'SY 2024\u20132025', key: '2024-2025', status: 'archived',
    period: 'June 3, 2024 \u2013 July 26, 2024',
    totalEnrolled: 258, totalApplications: 284, totalRejected: 14, totalSections: 8,
    grades: [
      { label: 'Grade 7',  students: 61,  sections: 2, approved: 63, rejected: 4 },
      { label: 'Grade 8',  students: 55,  sections: 2, approved: 57, rejected: 3 },
      { label: 'Grade 9',  students: 79,  sections: 2, approved: 82, rejected: 5 },
      { label: 'Grade 10', students: 63,  sections: 2, approved: 82, rejected: 2 },
    ]
  },
  {
    sy: 'SY 2023\u20132024', key: '2023-2024', status: 'archived',
    period: 'June 5, 2023 \u2013 July 28, 2023',
    totalEnrolled: 244, totalApplications: 269, totalRejected: 11, totalSections: 8,
    grades: [
      { label: 'Grade 7',  students: 58,  sections: 2, approved: 60, rejected: 3 },
      { label: 'Grade 8',  students: 52,  sections: 2, approved: 54, rejected: 3 },
      { label: 'Grade 9',  students: 74,  sections: 2, approved: 77, rejected: 3 },
      { label: 'Grade 10', students: 60,  sections: 2, approved: 78, rejected: 2 },
    ]
  },
];

const _saGradeColors = {
  'Grade 7':  { bg: '#ccfbf1', color: '#0f766e' },
  'Grade 8':  { bg: '#fef3c7', color: '#b45309' },
  'Grade 9':  { bg: '#fce7f3', color: '#be185d' },
  'Grade 10': { bg: '#eff6ff', color: '#1e40af' },
};

function renderSYHistory(filter) {
  var list = document.getElementById('syHistoryList');
  if (!list) return;
  var data = filter === 'all' ? _saHistoryData : _saHistoryData.filter(function(d){ return d.key === filter; });
  list.innerHTML = data.map(function(rec) {
    var isActive = rec.status === 'active';
    var headerBg = isActive ? 'linear-gradient(135deg,#7c3aed,#1e3a8a)' : '#f8fafc';
    var headerColor = isActive ? '#fff' : '#1e293b';
    var subColor = isActive ? 'rgba(255,255,255,.7)' : '#64748b';

    var statCards = [
      { icon: 'bi-people-fill',       label: 'Total Enrolled',      val: rec.totalEnrolled,     bg: isActive ? 'rgba(255,255,255,.15)' : '#eff6ff', c: isActive ? '#fff' : '#1e40af' },
      { icon: 'bi-file-earmark-text', label: 'Applications',        val: rec.totalApplications, bg: isActive ? 'rgba(255,255,255,.15)' : '#fefce8', c: isActive ? '#fff' : '#713f12' },
      { icon: 'bi-x-circle-fill',     label: 'Rejected',            val: rec.totalRejected,     bg: isActive ? 'rgba(255,255,255,.15)' : '#fee2e2', c: isActive ? '#fff' : '#991b1b' },
      { icon: 'bi-layout-text-sidebar-reverse', label: 'Sections',  val: rec.totalSections,     bg: isActive ? 'rgba(255,255,255,.15)' : '#f0fdf4', c: isActive ? '#fff' : '#166534' },
    ].map(function(s) {
      return '<div class="col-6 col-md-3">' +
        '<div class="rounded-3 p-3 text-center" style="background:'+s.bg+'">' +
          '<i class="bi '+s.icon+'" style="font-size:18px;color:'+s.c+'"></i>' +
          '<div class="fw-bold mt-1" style="font-size:20px;color:'+s.c+'">'+s.val+'</div>' +
          '<div style="font-size:11.5px;color:'+s.c+';opacity:.8">'+s.label+'</div>' +
        '</div></div>';
    }).join('');

    var gradeRows = rec.grades.map(function(g) {
      var c = _saGradeColors[g.label] || { bg: '#f1f5f9', color: '#475569' };
      var rate = Math.round((g.students / g.approved) * 100);
      return '<tr style="font-size:13px">' +
        '<td><span class="badge rounded-pill px-3" style="background:'+c.bg+';color:'+c.color+';font-weight:700">'+g.label+'</span></td>' +
        '<td class="text-center">'+g.sections+'</td>' +
        '<td class="text-center">'+g.approved+'</td>' +
        '<td class="text-center text-danger fw-semibold">'+g.rejected+'</td>' +
        '<td class="text-center fw-bold" style="color:#166534">'+g.students+'</td>' +
        '<td><div style="display:flex;align-items:center;gap:8px"><div style="flex:1;background:#e2e8f0;border-radius:20px;height:7px;overflow:hidden"><div style="width:'+rate+'%;height:100%;background:'+c.color+';border-radius:20px"></div></div><span style="font-size:11.5px;color:#64748b;white-space:nowrap">'+rate+'%</span></div></td>' +
      '</tr>';
    }).join('');

    return '<div class="card border rounded-3 mb-4 overflow-hidden" data-sy-key="'+rec.key+'">' +
      '<div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2" style="background:'+headerBg+';cursor:pointer" onclick="this.nextElementSibling.classList.toggle(\'d-none\')">' +
        '<div class="d-flex align-items-center gap-3">' +
          '<div style="width:42px;height:42px;border-radius:10px;background:'+(isActive?'rgba(255,255,255,.18)':'#e2e8f0')+';display:flex;align-items:center;justify-content:center;font-size:18px;color:'+(isActive?'#fff':'#64748b')+'">' +
            '<i class="bi bi-calendar2-week-fill"></i></div>' +
          '<div>' +
            '<div class="fw-bold" style="font-size:15px;color:'+headerColor+'">'+rec.sy+'</div>' +
            '<div style="font-size:12px;color:'+subColor+'"><i class="bi bi-calendar3 me-1"></i>'+rec.period+'</div>' +
          '</div>' +
        '</div>' +
        '<div class="d-flex align-items-center gap-2">' +
          '<span class="badge rounded-pill px-3" style="background:'+(isActive?'rgba(255,255,255,.2)':'#f1f5f9')+';color:'+(isActive?'#fff':'#64748b')+';font-size:11px">'+(isActive?'&#9679; Current SY':'&#9675; Archived')+'</span>' +
          '<i class="bi bi-chevron-down" style="color:'+headerColor+'"></i>' +
        '</div>' +
      '</div>' +
      '<div class="d-none" style="background:#fff">' +
        '<div class="row g-3 p-3">'+statCards+'</div>' +
        '<div class="px-3 pb-3">' +
          '<div class="table-responsive">' +
            '<table class="table table-hover align-middle mb-0" style="border-top:1px solid #f1f5f9">' +
              '<thead class="table-light">' +
                '<tr><th style="font-size:12px;text-transform:uppercase;color:#64748b">Grade</th>' +
                '<th class="text-center" style="font-size:12px;text-transform:uppercase;color:#64748b">Sections</th>' +
                '<th class="text-center" style="font-size:12px;text-transform:uppercase;color:#64748b">Approved</th>' +
                '<th class="text-center" style="font-size:12px;text-transform:uppercase;color:#64748b">Rejected</th>' +
                '<th class="text-center" style="font-size:12px;text-transform:uppercase;color:#64748b">Enrolled</th>' +
                '<th style="font-size:12px;text-transform:uppercase;color:#64748b;min-width:140px">Rate</th></tr>' +
              '</thead>' +
              '<tbody>'+gradeRows+'</tbody>' +
            '</table>' +
          '</div>' +
          '<div class="d-flex gap-2 mt-3 justify-content-end">' +
            '<button class="btn btn-sm btn-outline-secondary" onclick="alert(\'Exporting '+rec.sy+'...\')"><i class="bi bi-download me-1"></i>Export</button>' +
            (!isActive ? '<button class="btn btn-sm" style="background:#eff6ff;color:#1e40af;border:1px solid #bfdbfe" onclick="alert(\'Full report for '+rec.sy+'...\')"><i class="bi bi-eye me-1"></i>Full Report</button>' : '') +
          '</div>' +
        '</div>' +
      '</div>' +
    '</div>';
  }).join('') || '<div class="text-center text-muted py-5"><i class="bi bi-archive" style="font-size:40px"></i><div class="mt-2">No records for this school year.</div></div>';
}

function filterSYHistory(sy, btn) {
  document.querySelectorAll('.sy-pill').forEach(function(p) {
    p.style.background = '#f1f5f9';
    p.style.color = '#475569';
    p.style.border = '1px solid #e2e8f0';
  });
  btn.style.background = '#7c3aed';
  btn.style.color = '#fff';
  btn.style.border = 'none';
  renderSYHistory(sy);
}


/* Sidebar mobile toggle */
function openSidebar() {
  document.getElementById('leftSidebar').classList.add('open');
  document.getElementById('sbOverlay').classList.add('open');
}
function closeSidebar() {
  document.getElementById('leftSidebar').classList.remove('open');
  document.getElementById('sbOverlay').classList.remove('open');
}

/* ── Action menu (reuse admin  pattern) ── */
let _openMenuWrap = null;
function toggleActionMenu(e, btn) {
  e.stopPropagation();
  const wrap = btn.closest('.action-menu-wrap');
  if (_openMenuWrap && _openMenuWrap !== wrap) _openMenuWrap.classList.remove('open');
  wrap.classList.toggle('open');
  _openMenuWrap = wrap.classList.contains('open') ? wrap : null;
}
document.addEventListener('click', () => { if (_openMenuWrap) { _openMenuWrap.classList.remove('open'); _openMenuWrap = null; } });
function closeMenuThen(fn) { if (_openMenuWrap) { _openMenuWrap.classList.remove('open'); _openMenuWrap = null; } fn(); }

/* ── Table filter ── */
function filterTable(tableId, q) {
  document.querySelectorAll('#' + tableId + ' tbody tr').forEach(r => {
    r.style.display = r.textContent.toLowerCase().includes(q.toLowerCase()) ? '' : 'none';
  });
}

/* ── Bootstrap modal helper ── */
function bsModal(id) { return new bootstrap.Modal(document.getElementById(id)); }

/* ── Create Admin ── */
function openCreateAdminModal() { bsModal('createAdminModal').show(); }
function submitCreateAdmin() {
  const fname = document.getElementById('ca-fname').value.trim();
  const lname = document.getElementById('ca-lname').value.trim();
  const email = document.getElementById('ca-email').value.trim();
  const grade = document.getElementById('ca-grade').value;
  const pass  = document.getElementById('ca-pass').value;
  const pass2 = document.getElementById('ca-pass2').value;
  if (!fname || !lname || !email || !grade || !pass) { alert('Please fill in all required fields.'); return; }
  if (pass !== pass2) { alert('Passwords do not match.'); return; }
  bootstrap.Modal.getInstance(document.getElementById('createAdminModal')).hide();
  setTimeout(() => {
    const toast = document.createElement('div');
    toast.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%);background:#1e293b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:99999;box-shadow:0 8px 24px rgba(0,0,0,.18);display:flex;align-items:center;gap:10px';
    toast.innerHTML = `<i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:18px"></i>Admin account created for ${fname} ${lname} (${grade})!`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3500);
  }, 350);
}

/* ── Edit Admin ── */
function openEditAdminModal(name, grade, email) {
  document.getElementById('ea-name-label').textContent = name;
  document.getElementById('ea-email').value = email;
  document.getElementById('ea-grade').value = grade;
  bsModal('editAdminModal').show();
}
function submitEditAdmin() {
  bootstrap.Modal.getInstance(document.getElementById('editAdminModal')).hide();
  setTimeout(() => alert('Admin account updated successfully.'), 350);
}

/* ── Admin actions ── */
function resetAdminPassword(name) { if (confirm(`Reset password for ${name}? A temporary password will be sent to their email.`)) alert(`Password reset email sent to ${name}.`); }
function deactivateAdmin(name) { if (confirm(`Deactivate admin account for ${name}?`)) alert(`${name}'s account has been deactivated.`); }
function activateAdmin(name) { if (confirm(`Activate admin account for ${name}?`)) alert(`${name}'s account has been activated.`); }

/* ── Enrollment toggle ── */
let _enrollOpen = true;
function toggleEnrollment() {
  _enrollOpen = !_enrollOpen;
  const btn = document.getElementById('toggleEnrollBtn');
  const txt = document.getElementById('enrollmentStatusText');
  if (_enrollOpen) {
    btn.innerHTML = '<i class="bi bi-stop-fill me-1"></i>Close Enrollment';
    txt.textContent = 'OPEN – SY 2025–2026';
  } else {
    btn.innerHTML = '<i class="bi bi-play-fill me-1"></i>Open Enrollment';
    txt.textContent = 'CLOSED – SY 2025–2026';
  }
}

/* ── Enrollment modal ── */
function openEnrollmentModal() { bsModal('enrollmentModal').show(); }
function saveEnrollmentPeriod() {
  const start = document.getElementById('ep-start').value;
  const end   = document.getElementById('ep-end').value;
  const sy    = document.getElementById('ep-sy').value;
  if (start) document.getElementById('enrollStart').textContent = new Date(start).toLocaleDateString('en-US',{month:'long',day:'numeric',year:'numeric'});
  if (end)   document.getElementById('enrollEnd').textContent   = new Date(end).toLocaleDateString('en-US',{month:'long',day:'numeric',year:'numeric'});
  bootstrap.Modal.getInstance(document.getElementById('enrollmentModal')).hide();
  setTimeout(() => alert('Enrollment period updated!'), 350);
}

function saveEnrollmentSettings() { alert('Enrollment settings saved!'); }

/* ═══ ANNOUNCEMENTS ═══ */
let _announcements = [
  { id: 1, title: 'Welcome to SY 2025–2026 Enrollment!', message: 'Online enrollment for SY 2025–2026 is now open. Please complete all steps and submit the required documents before the deadline.', from: '2025-06-01', until: '2025-07-31', status: 'active', popup: true, by: 'Super Admin', date: 'June 1, 2025' },
  { id: 2, title: 'Reminder: Requirements Deadline', message: 'All students must submit their requirements on or before July 15, 2025. Failure to comply may result in delayed enrollment processing.', from: '2025-07-01', until: '2025-07-15', status: 'inactive', popup: false, by: 'Super Admin', date: 'July 1, 2025' },
];
let _annNextId = 3;

function renderAnnouncements() {
  const list = document.getElementById('announcementsList');
  if (!list) return;
  if (!_announcements.length) {
    list.innerHTML = '<div class="text-center text-muted py-4"><i class="bi bi-megaphone" style="font-size:36px"></i><div class="mt-2">No announcements yet</div></div>';
    return;
  }
  list.innerHTML = _announcements.map(a => `
    <div class="card border rounded-3 p-3">
      <div class="d-flex align-items-start justify-content-between gap-2 flex-wrap">
        <div class="flex-grow-1">
          <div class="d-flex align-items-center gap-2 mb-1">
            <div class="fw-bold" style="font-size:14.5px;color:#1e293b">${a.title}</div>
            <span class="badge rounded-pill px-3" style="background:${a.status==='active'?'#dcfce7':'#f1f5f9'};color:${a.status==='active'?'#166534':'#64748b'};font-size:11px">${a.status==='active'?'● Active':'○ Inactive'}</span>
            ${a.popup ? '<span class="badge rounded-pill px-2" style="background:#ede9fe;color:#7c3aed;font-size:11px"><i class="bi bi-bell-fill"></i> Popup</span>' : ''}
          </div>
          <div class="text-muted mb-2" style="font-size:13px">${a.message}</div>
          <div class="text-muted" style="font-size:11.5px"><i class="bi bi-calendar3 me-1"></i>${a.from} – ${a.until} &nbsp;&bull;&nbsp; Created by: ${a.by} &nbsp;&bull;&nbsp; ${a.date}</div>
        </div>
        <div class="d-flex gap-2 flex-shrink-0">
          <button class="btn btn-sm btn-outline-secondary" onclick="openEditAnnouncementModal(${a.id})" title="Edit"><i class="bi bi-pencil"></i></button>
          <button class="btn btn-sm btn-outline-danger" onclick="deleteAnnouncement(${a.id})" title="Delete"><i class="bi bi-trash"></i></button>
          <button class="btn btn-sm" style="background:${a.status==='active'?'#fee2e2':'#dcfce7'};color:${a.status==='active'?'#991b1b':'#166534'};border:none" onclick="toggleAnnStatus(${a.id})">${a.status==='active'?'Deactivate':'Activate'}</button>
        </div>
      </div>
    </div>`).join('');

  // Update active announcement banner
  const active = _announcements.find(a => a.status === 'active');
  const banner = document.getElementById('activeAnnouncementBanner');
  if (banner) {
    if (active) {
      banner.style.display = '';
      document.getElementById('activeAnnTitle').textContent = active.title;
      document.getElementById('activeAnnMsg').textContent = active.message;
    } else {
      banner.style.display = 'none';
    }
  }
}

function openCreateAnnouncementModal() {
  document.getElementById('ann-edit-id').value = '';
  document.getElementById('ann-title').value = '';
  document.getElementById('ann-message').value = '';
  document.getElementById('ann-from').value = '';
  document.getElementById('ann-until').value = '';
  document.getElementById('ann-status').value = 'active';
  document.getElementById('ann-popup').checked = true;
  document.getElementById('annModalTitle').textContent = 'Create Announcement';
  document.getElementById('annSubmitLabel').textContent = 'Create Announcement';
  bsModal('createAnnouncementModal').show();
}

function openEditAnnouncementModal(id) {
  const a = _announcements.find(x => x.id === id);
  if (!a) return;
  document.getElementById('ann-edit-id').value = id;
  document.getElementById('ann-title').value = a.title;
  document.getElementById('ann-message').value = a.message;
  document.getElementById('ann-from').value = a.from;
  document.getElementById('ann-until').value = a.until;
  document.getElementById('ann-status').value = a.status;
  document.getElementById('ann-popup').checked = a.popup;
  document.getElementById('annModalTitle').textContent = 'Edit Announcement';
  document.getElementById('annSubmitLabel').textContent = 'Save Changes';
  bsModal('createAnnouncementModal').show();
}

function submitAnnouncement() {
  const title   = document.getElementById('ann-title').value.trim();
  const message = document.getElementById('ann-message').value.trim();
  if (!title || !message) { alert('Title and message are required.'); return; }
  const editId = document.getElementById('ann-edit-id').value;
  const ann = {
    id: editId ? parseInt(editId) : _annNextId++,
    title, message,
    from:   document.getElementById('ann-from').value || '—',
    until:  document.getElementById('ann-until').value || '—',
    status: document.getElementById('ann-status').value,
    popup:  document.getElementById('ann-popup').checked,
    by: 'Super Admin',
    date: new Date().toLocaleDateString('en-US', {month:'long',day:'numeric',year:'numeric'})
  };
  if (editId) {
    const idx = _announcements.findIndex(x => x.id === parseInt(editId));
    if (idx >= 0) _announcements[idx] = ann;
  } else {
    _announcements.unshift(ann);
  }
  bootstrap.Modal.getInstance(document.getElementById('createAnnouncementModal')).hide();
  renderAnnouncements();
  setTimeout(() => {
    const toast = document.createElement('div');
    toast.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%);background:#1e293b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:99999;box-shadow:0 8px 24px rgba(0,0,0,.18);display:flex;align-items:center;gap:10px';
    toast.innerHTML = `<i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:18px"></i>Announcement ${editId ? 'updated' : 'created'} successfully!`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3200);
  }, 350);
}

function deleteAnnouncement(id) {
  if (!confirm('Delete this announcement?')) return;
  _announcements = _announcements.filter(a => a.id !== id);
  renderAnnouncements();
}

function toggleAnnStatus(id) {
  const a = _announcements.find(x => x.id === id);
  if (!a) return;
  a.status = a.status === 'active' ? 'inactive' : 'active';
  renderAnnouncements();
}

document.addEventListener('DOMContentLoaded', function() {
  renderAnnouncements();
  renderSYHistory('all');
  var savedTab = sessionStorage.getItem('saTab') || 'admins';
  switchSATab(savedTab, null);
});
</script>


<!-- ===================== MODAL: CREATE / EDIT ANNOUNCEMENT ===================== -->
<div class="modal fade" id="createAnnouncementModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:540px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#7c3aed,#1e3a8a);padding:24px 28px 20px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff">
            <i class="bi bi-megaphone-fill"></i>
          </div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff" id="annModalTitle">Create Announcement</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">This will be shown as a popup to students on login</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <input type="hidden" id="ann-edit-id" value="">
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Announcement Title *</label>
          <input type="text" class="form-control" placeholder="e.g., Enrollment is Now Open!" id="ann-title">
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Message *</label>
          <textarea class="form-control" rows="4" placeholder="Write the full announcement message here..." id="ann-message"></textarea>
        </div>
        <div class="row g-3 mb-3">
          <div class="col-6">
            <label class="form-label fw-medium" style="font-size:13px">Show From</label>
            <input type="date" class="form-control" id="ann-from">
          </div>
          <div class="col-6">
            <label class="form-label fw-medium" style="font-size:13px">Show Until</label>
            <input type="date" class="form-control" id="ann-until">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Status</label>
          <select class="form-select" id="ann-status">
            <option value="active">Active (show to students)</option>
            <option value="inactive">Inactive (hidden)</option>
          </select>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="ann-popup" checked>
          <label class="form-check-label" for="ann-popup" style="font-size:13px">
            Show as popup when student logs in or creates account
          </label>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0 px-4 pb-4">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-sm fw-semibold px-4" style="background:#7c3aed;color:#fff" onclick="submitAnnouncement()">
          <i class="bi bi-check-circle me-1"></i><span id="annSubmitLabel">Create Announcement</span>
        </button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>