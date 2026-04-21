<?php
$pageTitle = 'Admin Dashboard – DPNHS';
include 'header.php';

/* ── Sample data (replace with DB queries in production) ── */
$applications = [
  ['id'=>'APP001','name'=>'Emma Johnson',   'grade'=>'Grade 10','date'=>'March 18, 2026','status'=>'Pending'],
  ['id'=>'APP002','name'=>'Michael Chen',   'grade'=>'Grade 9', 'date'=>'March 18, 2026','status'=>'Pending'],
  ['id'=>'APP003','name'=>'Sarah Williams', 'grade'=>'Grade 8', 'date'=>'March 17, 2026','status'=>'Pending'],
  ['id'=>'APP004','name'=>'James Brown',    'grade'=>'Grade 8', 'date'=>'March 17, 2026','status'=>'Pending'],
  ['id'=>'APP005','name'=>'Lisa Davis',     'grade'=>'Grade 7', 'date'=>'March 16, 2026','status'=>'Pending'],
  ['id'=>'APP006','name'=>'Carlos Reyes',   'grade'=>'Grade 7', 'date'=>'March 15, 2026','status'=>'Pending'],
];

$students = [
  ['id'=>'STU2024001','name'=>'John Smith',    'init'=>'JS','color'=>'av-blue',   'grade'=>'Grade 10','section'=>'Section A','status'=>'Enrolled'],
  ['id'=>'STU2024002','name'=>'Alice Cooper',  'init'=>'AC','color'=>'av-teal',   'grade'=>'Grade 9', 'section'=>'Section B','status'=>'Enrolled'],
  ['id'=>'STU2024003','name'=>'Bob Wilson',    'init'=>'BW','color'=>'av-orange', 'grade'=>'Grade 9', 'section'=>'Section A','status'=>'Enrolled'],
  ['id'=>'STU2024004','name'=>'Carol Martinez','init'=>'CM','color'=>'av-green',  'grade'=>'Grade 10','section'=>'Section C','status'=>'Enrolled'],
  ['id'=>'STU2024005','name'=>'David Lee',     'init'=>'DL','color'=>'av-purple', 'grade'=>'Grade 8', 'section'=>'Section B','status'=>'Enrolled'],
];

$rejected = [
  ['id'=>'APP007','name'=>'Rico Fernandez','grade'=>'Grade 7', 'date'=>'March 14, 2026','by'=>'Admin User','reason'=>'Does not meet age requirements'],
  ['id'=>'APP008','name'=>'Maria Santos',  'grade'=>'Grade 9', 'date'=>'March 13, 2026','by'=>'Admin User','reason'=>'Does not meet age requirements'],
  ['id'=>'APP009','name'=>'Kevin Lim',     'grade'=>'Grade 10','date'=>'March 12, 2026','by'=>'Admin User','reason'=>'Location exceeds proximity requirements'],
];

/* Action from URL param — simulates PHP processing without full form POST for demo */
$action  = $_GET['action']  ?? '';
$appId   = $_GET['app_id']  ?? '';
$appName = $_GET['app_name']?? '';
$modal   = $_GET['modal']   ?? '';
$stuId   = $_GET['stu_id']  ?? '';
$stuName = $_GET['stu_name']?? '';
?>


<style>
/* ===== FULL SIDEBAR LAYOUT ===== */
body { margin:0; background:#f1f5f9; }

/* Wrapper */
.page-wrapper {
  display: flex;
  min-height: 100vh;
}

/* ── LEFT SIDEBAR ── */
.left-sidebar {
  width: 240px;
  min-width: 240px;
  background: #1a2744;
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 0; left: 0;
  height: 100vh;
  z-index: 200;
  overflow-y: auto;
  transition: transform .28s cubic-bezier(.4,0,.2,1);
}
.left-sidebar::-webkit-scrollbar { width: 4px; }
.left-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,.1); border-radius:4px; }

/* Brand */
.sb-brand {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 20px 20px 16px;
  border-bottom: 1px solid rgba(255,255,255,.08);
}
.sb-brand img { width:40px; height:40px; border-radius:10px; }
.sb-brand-text { line-height: 1.2; }
.sb-brand-name { font-size:15px; font-weight:800; color:#fff; letter-spacing:.01em; }
.sb-brand-sub  { font-size:10.5px; color:rgba(255,255,255,.45); }

/* User card */
.sb-user {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 14px 20px;
  border-bottom: 1px solid rgba(255,255,255,.08);
}
.sb-avatar {
  width: 36px; height: 36px; border-radius: 50%;
  background: var(--navy, #1e3a8a);
  display: flex; align-items: center; justify-content: center;
  font-size: 13px; font-weight: 800; color: #fff; flex-shrink: 0;
  border: 2px solid rgba(255,255,255,.2);
}
.sb-user-name { font-size:13px; font-weight:700; color:#fff; line-height:1.2; }
.sb-user-role { font-size:10.5px; color:rgba(255,255,255,.45); }

/* Nav section label */
.sb-section-label {
  font-size: 10px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .1em;
  color: rgba(255,255,255,.35);
  padding: 18px 20px 6px;
}

/* Nav item */
.sb-nav-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 11px 20px;
  color: rgba(255,255,255,.65);
  font-size: 13.5px;
  font-weight: 500;
  cursor: pointer;
  transition: background .15s, color .15s;
  border-left: 3px solid transparent;
  user-select: none;
  text-decoration: none;
}
.sb-nav-item i { font-size:16px; width:20px; text-align:center; flex-shrink:0; }
.sb-nav-item:hover {
  background: rgba(255,255,255,.07);
  color: #fff;
  text-decoration: none;
}
.sb-nav-item.active {
  background: rgba(255,255,255,.12);
  color: #fff;
  font-weight: 700;
  border-left-color: #60a5fa;
}
.sb-nav-item.active i { color: #60a5fa; }

/* Badge on nav item */
.sb-badge {
  margin-left: auto;
  background: #3b82f6;
  color: #fff;
  font-size: 10px;
  font-weight: 700;
  border-radius: 20px;
  padding: 1px 7px;
  line-height: 1.7;
}

/* Bottom of sidebar */
.sb-bottom {
  margin-top: auto;
  padding: 12px 12px 16px;
  border-top: 1px solid rgba(255,255,255,.08);
}
.sb-logout {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 14px;
  border-radius: 10px;
  color: rgba(255,255,255,.6);
  font-size: 13.5px;
  font-weight: 500;
  cursor: pointer;
  text-decoration: none;
  transition: background .15s, color .15s;
}
.sb-logout:hover { background: rgba(239,68,68,.18); color: #f87171; text-decoration:none; }
.sb-logout i { font-size:16px; }

/* ── RIGHT CONTENT AREA ── */
.main-area {
  margin-left: 240px;
  flex: 1;
  width: calc(100% - 240px);
  display: flex;
  flex-direction: column;
  min-width: 0;
}

/* Top bar (right side) */
.main-topbar {
  background: #fff;
  border-bottom: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 28px;
  position: sticky;
  top: 0;
  z-index: 100;
}
.topbar-toggle {
  display: none;
  background: none;
  border: none;
  font-size: 20px;
  color: #475569;
  cursor: pointer;
  padding: 4px;
}
.topbar-right { display:flex; align-items:center; gap:10px; }
.topbar-icon {
  width:34px; height:34px; border-radius:8px;
  display:flex; align-items:center; justify-content:center;
  font-size:16px; color:#64748b; cursor:pointer;
  background: #f8fafc; border: 1px solid #e2e8f0;
  transition: background .15s;
}
.topbar-icon:hover { background:#f1f5f9; color:#1e293b; }

/* Page content */
.admin-content {
  padding: 28px;
  flex: 1;
  width: 100%;
  min-width: 0;
  box-sizing: border-box;
}

/* Tab panels & their direct cards fill full width */
#admin-tab-applications,
#admin-tab-students,
#admin-tab-sections,
#admin-tab-statistics {
  width: 100%;
}

#admin-tab-applications > .card,
#admin-tab-students > .card,
#admin-tab-sections > .card {
  width: 100%;
  max-width: 100%;
}

/* Mobile sidebar overlay */
.sb-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.45);
  z-index: 199;
}

/* Clickable section row hover */
.section-row[title] {
  transition: background .15s, box-shadow .15s;
}
.section-row[title]:hover {
  background: #f0f9ff;
  box-shadow: 0 0 0 2px #3b82f6 inset;
  border-radius: 10px;
}

/* ── RESPONSIVE ── */
@media (max-width: 991px) {
  .left-sidebar { transform: translateX(-100%); }
  .left-sidebar.open { transform: translateX(0); }
  .sb-overlay.open { display: block; }
  .main-area { margin-left: 0; width: 100%; }
  .topbar-toggle { display: flex; align-items:center; justify-content:center; }
  .admin-content { padding: 18px; }
}
@media (max-width: 575px) {
  .admin-content { padding: 14px; }
}

/* ── TABLE ROW SIZING ── */
#appTable thead th,
#stuTable thead th {
  padding: 10px 12px;
  font-size: 11.5px;
  white-space: nowrap;
}

#appTable tbody td,
#stuTable tbody td {
  padding: 10px 12px;
  font-size: 13px;
  vertical-align: middle;
  line-height: 1.4;
}

/* Keep avatar/badge vertically centered and not too large */
.stu-avatar {
  width: 30px !important;
  height: 30px !important;
  min-width: 30px !important;
  font-size: 11px !important;
  margin-right: 8px !important;
}

/* Compact action button */
.action-dots-btn {
  padding: 3px 7px !important;
  font-size: 13px !important;
  line-height: 1.2 !important;
}

/* Tighter badge sizing */
.badge-enrolled,
.badge-pending,
.badge-rejected,
.badge-approved {
  font-size: 11px !important;
  padding: 3px 10px !important;
  border-radius: 20px !important;
  white-space: nowrap;
}

/* Prevent table from being too cramped on small screens */
@media (max-width: 767px) {
  #appTable tbody td,
  #stuTable tbody td {
    padding: 8px 10px;
    font-size: 12.5px;
  }
}
</style>

<!-- ===== SIDEBAR OVERLAY (mobile) ===== -->
<div class="sb-overlay" id="sbOverlay" onclick="closeSidebar()"></div>

<!-- ===== PAGE WRAPPER ===== -->
<div class="page-wrapper">

  <!-- ── LEFT SIDEBAR ── -->
  <aside class="left-sidebar sb-admin" id="leftSidebar">
    <div class="sb-brand">
      <img src="/logo.png" alt="DPNHS Logo">
      <div class="sb-brand-text">
        <div class="sb-brand-name">DPNHS</div>
        <div class="sb-brand-sub">Admin Dashboard</div>
      </div>
    </div>

    <div class="sb-user">
      <div class="sb-avatar av-navy">AD</div>
      <div>
        <div class="sb-user-name">Admin User</div>
        <div class="sb-user-role">admin@school.edu</div>
      </div>
    </div>

    <div class="sb-section-label">Main Menu</div>

 <div class="sb-nav-item active" onclick="switchAdminTab('statistics',this)" data-tab="statistics">
      <i class="bi bi-bar-chart-fill"></i>
      <span>Statistics</span>
    </div>

    <div class="sb-nav-item" onclick="switchAdminTab('applications',this)" data-tab="applications">
      <i class="bi bi-file-earmark-text"></i>
      <span>Applications</span>
      <span class="sb-badge"><?= count($applications) ?></span>
    </div>
    <div class="sb-nav-item" onclick="switchAdminTab('students',this)" data-tab="students">
      <i class="bi bi-people"></i><span>Students</span>
    </div>
    <div class="sb-nav-item" onclick="switchAdminTab('sections',this)" data-tab="sections">
      <i class="bi bi-layout-text-sidebar-reverse"></i><span>Sections</span>
    </div>
   

    <div class="sb-bottom">
      <a href="index.php" class="sb-logout">
        <i class="bi bi-box-arrow-left"></i><span>Logout</span>
      </a>
    </div>
  </aside>

  <!-- ── MAIN AREA ── -->
  <div class="main-area">
    <div class="main-topbar">
      <div class="d-flex align-items-center gap-3">
        <button class="topbar-toggle" onclick="openSidebar()"><i class="bi bi-list"></i></button>
        <div>
          <div class="fw-bold" style="font-size:15px;color:#1e293b" id="pageTitle">Applications</div>
          <div class="text-muted" style="font-size:12px">Manage enrollment, students, and sections</div>
        </div>
      </div>
      <div class="topbar-right">
        <span class="topbar-icon"><i class="bi bi-bell"></i></span>
        <span class="topbar-icon"><i class="bi bi-gear"></i></span>
        <div class="brand-logo" style="background:var(--navy);width:34px;height:34px;font-size:13px">AD</div>
      </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="admin-content">

      <!-- ══════════════════════════════════════
           TAB: STATISTICS
      ══════════════════════════════════════ -->
      <div id="admin-tab-statistics" class="d-none">
      <!-- STAT CARDS -->
      <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
          <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
            <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
            <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+12%</span>
            <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">1,245</div>
            <div class="text-muted" style="font-size:13px">Total Students</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
            <div class="stat-icon orange"><i class="bi bi-clock-fill"></i></div>
            <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+5</span>
            <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b"><?= count($applications) ?></div>
            <div class="text-muted" style="font-size:13px">Pending Applications</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
            <div class="stat-icon teal"><i class="bi bi-book-fill"></i></div>
            <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+3</span>
            <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">42</div>
            <div class="text-muted" style="font-size:13px">Active Sections</div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
            <div class="stat-icon green"><i class="bi bi-graph-up-arrow"></i></div>
            <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+2%</span>
            <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">94%</div>
            <div class="text-muted" style="font-size:13px">Enrollment Rate</div>
          </div>
        </div>
      </div>

      <!-- CHARTS -->
      <div class="row g-3 mb-4">
        <div class="col-md-7">
          <div class="card border rounded-3 p-3 h-100">
            <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Enrollment by Grade</div>
            <div class="text-muted mb-3" style="font-size:13px">Number of students per grade level</div>
            <div style="position:relative;width:100%;height:220px">
              <canvas id="barChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card border rounded-3 p-3 h-100">
            <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Student Gender Distribution</div>
            <div class="text-muted mb-3" style="font-size:13px">Male vs Female student ratio</div>
            <div class="d-flex align-items-center justify-content-center gap-4 h-100 pb-3 flex-column flex-sm-row">
              <div style="position:relative;width:160px;height:160px;flex-shrink:0">
                <canvas id="pieChart"></canvas>
              </div>
              <div class="d-flex flex-column gap-2">
                <div class="d-flex align-items-center gap-2" style="font-size:13px"><span class="rounded-circle d-inline-block" style="width:12px;height:12px;background:#1e3a8a"></span> Male: 640 (51%)</div>
                <div class="d-flex align-items-center gap-2" style="font-size:13px;color:#0d9488"><span class="rounded-circle d-inline-block" style="width:12px;height:12px;background:#0d9488"></span> Female: 605 (49%)</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- APPLICATION STATUS BREAKDOWN -->
      <div class="row g-3 mb-4">
        <div class="col-md-6">
          <div class="card border rounded-3 p-3 h-100">
            <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Application Status Breakdown</div>
            <div class="text-muted mb-3" style="font-size:13px">Current SY application outcomes</div>
            <div style="position:relative;width:100%;height:200px">
              <canvas id="appStatusChart"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card border rounded-3 p-3 h-100">
            <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Enrollment Trend (Last 3 SY)</div>
            <div class="text-muted mb-3" style="font-size:13px">Total enrolled students per school year</div>
            <div style="position:relative;width:100%;height:200px">
              <canvas id="trendChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      </div><!-- /admin-tab-statistics -->

      <!-- ══════════════════════════════════════
           TAB: APPLICATIONS
      ══════════════════════════════════════ -->
      <div id="admin-tab-applications">
        <div class="card border rounded-3 p-3 p-md-4">
          <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
            <div>
              <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Recent Applications</div>
              <div class="text-muted" style="font-size:13px">Review and manage admission applications</div>
            </div>
            <div class="d-flex gap-2 flex-wrap align-items-center">
              <button class="btn-icon-sm" title="Filter"><i class="bi bi-funnel"></i></button>
              <!-- Rejected List button matching image style -->
              <a href="?modal=rejected" class="btn btn-outline-danger">
                <i class="bi bi-x-circle"></i> Rejected List
              </a>
            </div>
          </div>

          <div class="position-relative mb-3">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5" placeholder="Search applications..." oninput="filterTable('appTable',this.value)">
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle" id="appTable">
              <thead class="table-light">
                <tr>
                  <?php foreach(['ID','Name','Grade','Date','Status','Actions'] as $h): ?>
                  <th style="text-transform:uppercase;letter-spacing:.04em;color:#64748b"><?= $h ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($applications as $i => $app): ?>
                <tr>
                  <td><?= $i+1 ?></td>
                  <td><?= htmlspecialchars($app['name']) ?></td>
                  <td><?= $app['grade'] ?></td>
                  <td><?= $app['date'] ?></td>
                  <td><span class="badge-<?= strtolower($app['status']) ?>"><?= $app['status'] ?></span></td>
                  <td>
                    <div class="action-menu-wrap position-relative">
                      <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <div class="action-dropdown shadow-sm">
                        <a class="action-item" href="?modal=profile&app_id=<?= $app['id'] ?>">
                          <i class="bi bi-eye text-navy"></i> View Profile
                        </a>
                        <a class="action-item text-success" href="?action=approve&app_id=<?= $app['id'] ?>&app_name=<?= urlencode($app['name']) ?>">
                          <i class="bi bi-check-circle"></i> Approve
                        </a>
                        <a class="action-item text-danger" href="?modal=reject&app_id=<?= $app['id'] ?>&app_name=<?= urlencode($app['name']) ?>">
                          <i class="bi bi-x-circle"></i> Reject
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Applications Pagination (PHP-rendered) -->
          <?php
          $appPerPage = 10;
          $appPage    = max(1, intval($_GET['app_page'] ?? 1));
          $appTotal   = count($applications);
          $appPages   = max(1, ceil($appTotal / $appPerPage));
          $appFrom    = min(($appPage-1)*$appPerPage+1, $appTotal);
          $appTo      = min($appPage*$appPerPage, $appTotal);
          ?>
          <div class="d-flex align-items-center justify-content-between mt-3 flex-wrap gap-2">
            <div class="text-muted" style="font-size:13px">Showing <?= $appFrom ?>–<?= $appTo ?> of <?= $appTotal ?> entries</div>
            <nav>
              <ul class="pagination pagination-sm mb-0">
                <li class="page-item <?= $appPage<=1?'disabled':'' ?>">
                  <a class="page-link" href="?app_page=<?= $appPage-1 ?>#appTable">&laquo;</a>
                </li>
                <?php for($p=1;$p<=$appPages;$p++): ?>
                <li class="page-item <?= $p==$appPage?'active':'' ?>">
                  <a class="page-link" href="?app_page=<?= $p ?>#appTable"><?= $p ?></a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?= $appPage>=$appPages?'disabled':'' ?>">
                  <a class="page-link" href="?app_page=<?= $appPage+1 ?>#appTable">&raquo;</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════════
           TAB: STUDENTS
      ══════════════════════════════════════ -->
      <div id="admin-tab-students" class="d-none">
        <div class="card border rounded-3 p-3 p-md-4">
          <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
            <div>
              <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Student Management</div>
              <div class="text-muted" style="font-size:13px">View and manage enrolled students</div>
            </div>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn-icon-sm" title="Filter"><i class="bi bi-funnel"></i></button>
              <a href="?modal=export" class="btn btn-navy btn-sm fw-semibold">
                <i class="bi bi-download me-1"></i>Export
              </a>
              <a href="?modal=addStudent" class="btn btn-navy btn-sm fw-semibold">
                <i class="bi bi-person-plus me-1"></i>Add Student
              </a>
            </div>
          </div>

          <div class="position-relative mb-3">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5" placeholder="Search students..." oninput="filterTable('stuTable',this.value)">
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle" id="stuTable">
              <thead class="table-light">
                <tr>
                  <?php foreach(['Student ID','Name','Grade','Section','Status','Actions'] as $h): ?>
                  <th style="text-transform:uppercase;letter-spacing:.04em;color:#64748b"><?= $h ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($students as $stu): ?>
                <tr>
                  <td><?= $stu['id'] ?></td>
                  <td><span class="stu-avatar <?= $stu['color'] ?>"><?= $stu['init'] ?></span><?= htmlspecialchars($stu['name']) ?></td>
                  <td><?= $stu['grade'] ?></td>
                  <td><?= $stu['section'] ?></td>
                  <td><span class="badge-enrolled">Enrolled</span></td>
                  <td>
                    <div class="action-menu-wrap position-relative">
                      <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <div class="action-dropdown shadow-sm">
                        <a class="action-item" href="?modal=profile&stu_id=<?= $stu['id'] ?>">
                          <i class="bi bi-eye text-navy"></i> View Profile
                        </a>
                        <a class="action-item text-danger" href="?modal=transfer&stu_id=<?= $stu['id'] ?>&stu_name=<?= urlencode($stu['name']) ?>">
                          <i class="bi bi-arrow-left-right"></i> Transfer Section
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Students Pagination (PHP) -->
          <?php
          $stuTotal = count($students);
          $stuPage  = max(1, intval($_GET['stu_page'] ?? 1));
          $stuPages = max(1, ceil($stuTotal / $appPerPage));
          $stuFrom  = min(($stuPage-1)*$appPerPage+1, $stuTotal);
          $stuTo    = min($stuPage*$appPerPage, $stuTotal);
          ?>
          <div class="d-flex align-items-center justify-content-between mt-3 flex-wrap gap-2">
            <div class="text-muted" style="font-size:13px">Showing <?= $stuFrom ?>–<?= $stuTo ?> of <?= $stuTotal ?> entries</div>
            <nav>
              <ul class="pagination pagination-sm mb-0">
                <li class="page-item <?= $stuPage<=1?'disabled':'' ?>">
                  <a class="page-link" href="?stu_page=<?= $stuPage-1 ?>#stuTable">&laquo;</a>
                </li>
                <?php for($p=1;$p<=$stuPages;$p++): ?>
                <li class="page-item <?= $p==$stuPage?'active':'' ?>">
                  <a class="page-link" href="?stu_page=<?= $p ?>#stuTable"><?= $p ?></a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?= $stuPage>=$stuPages?'disabled':'' ?>">
                  <a class="page-link" href="?stu_page=<?= $stuPage+1 ?>#stuTable">&raquo;</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- ══════════════════════════════════════
           TAB: SECTIONS
      ══════════════════════════════════════ -->
      <div id="admin-tab-sections" class="d-none">
        <div class="card border rounded-3 p-3 p-md-4">
          <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
            <div>
              <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Section Management</div>
              <div class="text-muted" style="font-size:13px">Click a grade level to view its sections</div>
            </div>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn btn-sm fw-semibold px-3" style="background:#f1f5f9;color:#475569;border:1px solid #e2e8f0" onclick="openSYArchiveModal()">
                <i class="bi bi-archive me-1"></i>SY Archives
              </button>
              <a href="?modal=createSection" class="btn btn-navy btn-sm fw-semibold">
                <i class="bi bi-plus-circle me-1"></i>Create Section
              </a>
            </div>
          </div>

          <!-- Current SY pill -->
          <div class="d-flex align-items-center gap-2 mb-4 p-2 rounded-2" style="background:#eff6ff;border:1px solid #bfdbfe;font-size:13px">
            <i class="bi bi-calendar2-week-fill" style="color:#1e40af"></i>
            <span class="fw-semibold" style="color:#1e40af">Currently Viewing: SY 2025–2026</span>
            <span class="badge rounded-pill ms-1" style="background:#1e3a8a;color:#fff;font-size:11px">Active</span>
          </div>

          <?php
          $gradeConfig = [
            'g7'  => ['label'=>'Grade 7',  'icon'=>'teal',  'fill'=>'fill-teal'],
            'g8'  => ['label'=>'Grade 8',  'icon'=>'amber', 'fill'=>'fill-amber'],
            'g9'  => ['label'=>'Grade 9',  'icon'=>'rose',  'fill'=>'fill-rose'],
            'g10' => ['label'=>'Grade 10', 'icon'=>'navy',  'fill'=>'fill-navy'],
          ];
          $emptyBg = [
            'g7'=>['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g8'=>['background'=>'#fef3c7','color'=>'#b45309'],
            'g9'=>['background'=>'#fce7f3','color'=>'#be185d'],
            'g10'=>['background'=>'var(--navy-light)','color'=>'var(--navy)'],
          ];
          foreach($gradeConfig as $gid => $gc): ?>
          <div class="grade-card" id="<?= $gid ?>">
            <div class="grade-header" onclick="toggleGrade('<?= $gid ?>')">
              <div class="grade-icon <?= $gc['icon'] ?>"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-info">
                <div class="grade-title"><?= $gc['label'] ?></div>
                <div class="grade-meta" id="<?= $gid ?>-meta">No sections yet</div>
              </div>
              <div class="grade-bar-wrap">
                <div class="grade-pill-bar"><div class="fill <?= $gc['fill'] ?>" style="width:0%"></div></div>
              </div>
              <i class="bi bi-chevron-down chevron"></i>
            </div>
            <div class="sections-wrap" id="<?= $gid ?>-sections">
              <div class="empty-section-state">
                <div class="empty-section-icon" style="background:<?= $emptyBg[$gid]['background'] ?>;color:<?= $emptyBg[$gid]['color'] ?>">
                  <i class="bi bi-layout-text-sidebar-reverse"></i>
                </div>
                <div class="empty-section-title">No Sections Created</div>
                <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong><?= $gc['label'] ?></strong> to auto-generate sections.</div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- /admin-content -->
  </div><!-- /main-area -->
</div><!-- /page-wrapper -->


<!-- ═══════════════════════════════════════════
     PHP-DRIVEN MODALS (opened via ?modal=xxx)
═══════════════════════════════════════════ -->

<?php if($modal === 'rejected'): ?>
<!-- MODAL: REJECTED LIST -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <div>
          <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-x-circle-fill text-danger me-2"></i>Rejected Applications</h5>
          <div class="text-muted" style="font-size:13px">List of applicants who have been rejected</div>
        </div>
        <a href="/admin" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="modal-body pt-3">
        <?php if(empty($rejected)): ?>
        <div class="text-center text-muted py-4">
          <i class="bi bi-check-circle" style="font-size:32px"></i>
          <div class="mt-2">No rejected applications</div>
        </div>
        <?php else: ?>
        <?php foreach($rejected as $r): ?>
        <div class="card border rounded-3 p-3 mb-3">
          <div class="d-flex align-items-start justify-content-between flex-wrap gap-2">
            <div>
              <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= htmlspecialchars($r['name']) ?></div>
              <div class="text-muted" style="font-size:12px"><?= $r['id'] ?> &bull; <?= $r['grade'] ?> &bull; Applied: <?= $r['date'] ?></div>
            </div>
            <span class="badge-rejected">Rejected</span>
          </div>
          <div class="mt-2 p-2 rounded-2" style="background:#fff5f5;border:1px solid #fecaca">
            <div style="font-size:12px;color:#64748b">Reason for Rejection</div>
            <div style="font-size:13.5px;color:#991b1b;font-weight:600"><?= htmlspecialchars($r['reason']) ?></div>
          </div>
          <div class="mt-2" style="font-size:12px;color:#64748b"><i class="bi bi-person-fill me-1"></i>Rejected by: <strong><?= $r['by'] ?></strong></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="modal-footer border-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Close</a>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'reject'): ?>
<!-- MODAL: REJECT WITH REASON -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="color:#991b1b"><i class="bi bi-exclamation-triangle-fill me-2"></i>Reject Application</h5>
        <a href="/admin" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <p style="font-size:14px">You are about to reject the application of <strong><?= htmlspecialchars($appName) ?></strong> (<span><?= htmlspecialchars($appId) ?></span>).</p>
        <label class="form-label fw-medium" style="font-size:13px">Reason for Rejection <span class="text-danger">*</span></label>
        <select class="form-select mb-2" id="rejectReasonSelect" onchange="toggleCustomReason(this.value)">
          <option value="">Select a reason...</option>
          <option>Does not meet age requirements</option>
          <option>Location exceeds proximity requirements</option>
          <option value="other">Other (specify)</option>
        </select>
        <div id="customReasonWrap" class="d-none">
          <textarea class="form-control" id="rejectCustomReason" rows="3" placeholder="Specify the reason..."></textarea>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-danger btn-sm fw-semibold" onclick="submitRejectForm()">Confirm Rejection</button>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'profile'): ?>
<!-- MODAL: VIEW PROFILE -->
<?php
$profileId = $_GET['app_id'] ?? $_GET['stu_id'] ?? '';
$profiles  = [
  'APP001'=>['sy'=>'2025–2026','grade'=>'Grade 10','lrn'=>'202600100001','lname'=>'Johnson','fname'=>'Emma',   'mname'=>'Grace',   'dob'=>'March 1, 2010',   'age'=>16,'sex'=>'Female','pob'=>'Naga City',  'tongue'=>'Bikol','ip'=>'No','fours'=>'No', 'address'=>'12 Rizal St., Brgy. Concepcion, Naga City, Camarines Sur, Philippines','father'=>'Robert Johnson','fcontact'=>'09171234567','mother'=>'Mary Johnson','mcontact'=>'09181234567','guardian'=>'N/A','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',   'file'=>'psa_emma_johnson.jpg',   'type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Form 138 (Report Card)',   'file'=>'form138_emma_johnson.jpg','type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Good Moral Certificate',  'file'=>'goodmoral_emma_johnson.pdf','type'=>'pdf', 'status'=>'submitted','uploaded'=>'March 18, 2026'],
    ]
  ],
  'APP002'=>['sy'=>'2025–2026','grade'=>'Grade 9', 'lrn'=>'202600100002','lname'=>'Chen',   'fname'=>'Michael','mname'=>'Tan',     'dob'=>'June 14, 2011',   'age'=>15,'sex'=>'Male',  'pob'=>'Minalabac',  'tongue'=>'Tagalog','ip'=>'No','fours'=>'Yes','address'=>'45 Magsaysay Ave., Brgy. Centro, Minalabac, Camarines Sur, Philippines','father'=>'James Chen','fcontact'=>'09271234567','mother'=>'Li Chen','mcontact'=>'09291234567','guardian'=>'N/A','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',   'file'=>'psa_michael_chen.jpg',    'type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Form 138 (Report Card)',   'file'=>'',                        'type'=>'image','status'=>'missing',  'uploaded'=>''],
      ['label'=>'Good Moral Certificate',  'file'=>'goodmoral_michael_chen.jpg','type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
    ]
  ],
  'STU2024001'=>['sy'=>'2025–2026','grade'=>'Grade 10','section'=>'Section A','stuid'=>'STU2024001','lrn'=>'202400100001','lname'=>'Smith','fname'=>'John','mname'=>'Paul','dob'=>'Feb 10, 2009','age'=>17,'sex'=>'Male','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No','address'=>'55 P. Burgos St., Brgy. Triangulo, Naga City, Camarines Sur, Philippines','father'=>'Henry Smith','fcontact'=>'09111234567','mother'=>'Grace Smith','mcontact'=>'09121234567','guardian'=>'N/A','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',   'file'=>'psa_john_smith.jpg',      'type'=>'image','status'=>'verified', 'uploaded'=>'Jan 10, 2024'],
      ['label'=>'Form 138 (Report Card)',   'file'=>'form138_john_smith.jpg',  'type'=>'image','status'=>'verified', 'uploaded'=>'Jan 10, 2024'],
      ['label'=>'Good Moral Certificate',  'file'=>'goodmoral_john_smith.jpg','type'=>'image','status'=>'verified', 'uploaded'=>'Jan 10, 2024'],
    ]
  ],
];
$p = $profiles[$profileId] ?? null;
?>
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <?php if($p): ?>
      <div style="background:linear-gradient(135deg,#1e3a8a 0%,#0d9488 100%);padding:28px 28px 20px;position:relative">
        <a href="/admin" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3 flex-wrap">
          <div style="width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.2);border:3px solid rgba(255,255,255,.5);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800;color:#fff">
            <?= strtoupper(substr($p['fname'],0,1).substr($p['lname'],0,1)) ?>
          </div>
          <div>
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:.08em;color:rgba(255,255,255,.65);margin-bottom:3px">
              <?= $p['enrolled'] ? 'Enrolled Student – Full Profile' : 'Admission Application – Full Details' ?>
            </div>
            <div style="font-size:22px;font-weight:800;color:#fff"><?= htmlspecialchars($p['fname'].' '.$p['lname']) ?></div>
            <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
              <span style="background:rgba(255,255,255,.15);color:#fff;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px"><?= $p['grade'] ?></span>
              <span style="background:rgba(255,255,255,.15);color:#fff;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px">SY <?= $p['sy'] ?></span>
              <?php if($p['enrolled']): ?>
              <span style="background:#dcfce7;color:#166534;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px">● Enrolled</span>
              <?php else: ?>
              <span style="background:#fef3c7;color:#92400e;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px">● Applicant</span>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="d-flex gap-4 mt-3 flex-wrap" style="font-size:12px;color:rgba(255,255,255,.75)">
          <div><i class="bi bi-credit-card-2-front me-1"></i>LRN: <?= $p['lrn'] ?></div>
          <div><i class="bi bi-geo-alt me-1"></i><?= htmlspecialchars($p['pob']) ?></div>
          <div><i class="bi bi-calendar3 me-1"></i><?= $p['dob'] ?></div>
        </div>
      </div>
      <div class="modal-body p-0" style="background:#f8fafc">
        <?php if($p['enrolled']): ?>
        <div style="background:#fff;border-bottom:1px solid #e2e8f0;padding:16px 24px">
          <div style="font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#64748b;margin-bottom:10px;font-weight:700"><i class="bi bi-bookmark-check-fill text-success me-1"></i>Enrollment Details</div>
          <div class="row g-3">
            <div class="col-6 col-md-4"><div style="font-size:11px;color:#94a3b8">Student ID</div><div style="font-size:14px;font-weight:700;color:#1e293b;font-family:monospace"><?= $p['stuid'] ?></div></div>
            <div class="col-6 col-md-4"><div style="font-size:11px;color:#94a3b8">Section</div><div style="font-size:14px;font-weight:600;color:#1e293b"><?= $p['section'] ?></div></div>
            <div class="col-6 col-md-4"><div style="font-size:11px;color:#94a3b8">Status</div><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill" style="font-size:12px">Enrolled</span></div>
          </div>
        </div>
        <?php endif; ?>
        <div style="padding:20px 24px;display:flex;flex-direction:column;gap:16px">
          <!-- Learner Info -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#1e3a8a;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-person-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Learner Information</span>
            </div>
            <div style="padding:18px 16px">
              <div class="row g-3">
                <div class="col-12"><div style="font-size:10.5px;color:#94a3b8;margin-bottom:2px">Full Name</div><div style="font-size:15px;font-weight:700;color:#1e293b"><?= htmlspecialchars($p['lname'].', '.$p['fname'].' '.$p['mname']) ?></div></div>
                <div class="col-6 col-md-4"><div style="font-size:10.5px;color:#94a3b8">LRN</div><div style="font-size:13px;font-weight:600;font-family:monospace"><?= $p['lrn'] ?></div></div>
                <div class="col-6 col-md-3"><div style="font-size:10.5px;color:#94a3b8">Date of Birth</div><div style="font-size:13px;font-weight:600"><?= $p['dob'] ?></div></div>
                <div class="col-3 col-md-2"><div style="font-size:10.5px;color:#94a3b8">Age</div><div style="font-size:13px;font-weight:600"><?= $p['age'] ?></div></div>
                <div class="col-3 col-md-1"><div style="font-size:10.5px;color:#94a3b8">Sex</div><div style="font-size:13px;font-weight:600"><?= $p['sex'] ?></div></div>
                <div class="col-6 col-md-2"><div style="font-size:10.5px;color:#94a3b8">Mother Tongue</div><div style="font-size:13px;font-weight:600"><?= $p['tongue'] ?></div></div>
                <div class="col-md-6"><div style="font-size:10.5px;color:#94a3b8">Place of Birth</div><div style="font-size:13px;font-weight:600"><?= htmlspecialchars($p['pob']) ?></div></div>
                <div class="col-6 col-md-3"><div style="font-size:10.5px;color:#94a3b8">IP Community?</div><div style="font-size:13px;font-weight:600"><?= $p['ip'] ?></div></div>
                <div class="col-6 col-md-3"><div style="font-size:10.5px;color:#94a3b8">4Ps Beneficiary?</div><div style="font-size:13px;font-weight:600"><?= $p['fours'] ?></div></div>
              </div>
            </div>
          </div>
          <!-- Address -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#0d9488;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-geo-alt-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Current Address</span>
            </div>
            <div style="padding:14px 16px;font-size:14px;font-weight:500;color:#374151;line-height:1.6"><?= htmlspecialchars($p['address']) ?></div>
          </div>
          <!-- Parents -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#d97706;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-people-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Parent / Guardian Information</span>
            </div>
            <div style="padding:16px">
              <?php
              $guardians = [
                ['role'=>'Father','name'=>$p['father'],'contact'=>$p['fcontact'],'bg'=>'#dbeafe','color'=>'#1e40af'],
                ['role'=>'Mother','name'=>$p['mother'],'contact'=>$p['mcontact'],'bg'=>'#fce7f3','color'=>'#be185d'],
                ['role'=>'Guardian','name'=>$p['guardian'],'contact'=>'—','bg'=>'#dcfce7','color'=>'#166534'],
              ];
              foreach($guardians as $g): ?>
              <div class="d-flex align-items-start gap-3 mb-3 p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0">
                <div style="width:34px;height:34px;border-radius:50%;background:<?= $g['bg'] ?>;display:flex;align-items:center;justify-content:center;font-size:14px;color:<?= $g['color'] ?>;flex-shrink:0"><i class="bi bi-person"></i></div>
                <div class="row g-0 w-100">
                  <div class="col-12 mb-1"><span style="font-size:11px;font-weight:700;text-transform:uppercase;color:#94a3b8"><?= $g['role'] ?></span></div>
                  <div class="col-md-7"><div style="font-size:11px;color:#94a3b8">Name</div><div style="font-size:13.5px;font-weight:600;color:#1e293b"><?= htmlspecialchars($g['name']) ?></div></div>
                  <div class="col-md-5"><div style="font-size:11px;color:#94a3b8">Contact</div><div style="font-size:13.5px;font-weight:600;color:#1e293b"><?= $g['contact'] ?></div></div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Submitted Documents -->
          <?php if(!empty($p['docs'])): ?>
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between;gap:8px">
              <div style="display:flex;align-items:center;gap:8px">
                <div style="width:28px;height:28px;border-radius:8px;background:#7c3aed;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-folder2-open"></i></div>
                <span style="font-size:13px;font-weight:700;color:#1e293b">Submitted Requirements</span>
              </div>
              <?php
                $missingCount = count(array_filter($p['docs'], fn($d) => $d['status'] === 'missing'));
              ?>
              <?php if($missingCount > 0): ?>
              <span style="background:#fef2f2;color:#991b1b;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;border:1px solid #fecaca">
                <i class="bi bi-exclamation-circle me-1"></i><?= $missingCount ?> Missing
              </span>
              <?php else: ?>
              <span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;border:1px solid #bbf7d0">
                <i class="bi bi-check-circle me-1"></i>All Submitted
              </span>
              <?php endif; ?>
            </div>
            <div style="padding:16px;display:flex;flex-direction:column;gap:12px">
              <?php foreach($p['docs'] as $di => $doc): ?>
              <div style="border:1px solid <?= $doc['status']==='missing' ? '#fecaca' : ($doc['status']==='verified' ? '#bbf7d0' : '#e2e8f0') ?>;border-radius:10px;overflow:hidden;background:<?= $doc['status']==='missing' ? '#fff5f5' : '#fff' ?>">
                <div style="padding:10px 14px;display:flex;align-items:center;justify-content:space-between;gap:8px;border-bottom:1px solid <?= $doc['status']==='missing' ? '#fecaca' : '#f1f5f9' ?>">
                  <div style="display:flex;align-items:center;gap:8px">
                    <div style="width:30px;height:30px;border-radius:8px;background:<?= $doc['status']==='missing' ? '#fef2f2' : ($doc['status']==='verified' ? '#f0fdf4' : '#eff6ff') ?>;display:flex;align-items:center;justify-content:center;font-size:14px;color:<?= $doc['status']==='missing' ? '#dc2626' : ($doc['status']==='verified' ? '#16a34a' : '#2563eb') ?>">
                      <i class="bi bi-<?= $doc['type']==='pdf' ? 'file-earmark-pdf' : 'file-earmark-image' ?>"></i>
                    </div>
                    <div>
                      <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($doc['label']) ?></div>
                      <?php if($doc['uploaded']): ?>
                      <div style="font-size:11px;color:#94a3b8">Uploaded: <?= $doc['uploaded'] ?></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if($doc['status'] === 'missing'): ?>
                  <span style="background:#fef2f2;color:#991b1b;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px">
                    <i class="bi bi-x-circle me-1"></i>Not Submitted
                  </span>
                  <?php elseif($doc['status'] === 'verified'): ?>
                  <span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px">
                    <i class="bi bi-patch-check-fill me-1"></i>Verified
                  </span>
                  <?php else: ?>
                  <div style="display:flex;align-items:center;gap:6px">
                    <button onclick="verifyDoc(this,<?= $di ?>)" style="background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;cursor:pointer">
                      <i class="bi bi-check-circle me-1"></i>Mark Verified
                    </button>
                    <button onclick="rejectDoc(this,<?= $di ?>)" style="background:#fef2f2;color:#991b1b;border:1px solid #fecaca;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;cursor:pointer">
                      <i class="bi bi-x-circle me-1"></i>Reject
                    </button>
                  </div>
                  <?php endif; ?>
                </div>
                <?php if($doc['status'] !== 'missing' && $doc['type'] === 'image'): ?>
                <div style="padding:12px 14px;background:#f8fafc">
                  <div style="font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#64748b;margin-bottom:8px">
                    <i class="bi bi-eye me-1"></i>Document Preview
                  </div>
                  <div style="border:2px dashed #cbd5e1;border-radius:8px;overflow:hidden;background:#fff;cursor:pointer;position:relative"
                       onclick="openDocViewer('<?= htmlspecialchars($doc['label']) ?>','/uploads/requirements/<?= htmlspecialchars($doc['file']) ?>')">
                    <img
                      src="/uploads/requirements/<?= htmlspecialchars($doc['file']) ?>"
                      alt="<?= htmlspecialchars($doc['label']) ?>"
                      onerror="this.style.display='none';this.nextElementSibling.style.display='flex'"
                      style="width:100%;max-height:200px;object-fit:contain;display:block;padding:8px">
                    <div style="display:none;flex-direction:column;align-items:center;justify-content:center;padding:32px;color:#94a3b8;gap:6px">
                      <i class="bi bi-image" style="font-size:32px"></i>
                      <div style="font-size:12px;font-weight:500"><?= htmlspecialchars($doc['file']) ?></div>
                      <div style="font-size:11px">Preview unavailable — file stored at /uploads/requirements/</div>
                    </div>
                    <div style="position:absolute;top:8px;right:8px;background:rgba(0,0,0,.5);color:#fff;font-size:10px;padding:3px 8px;border-radius:20px">
                      <i class="bi bi-arrows-fullscreen me-1"></i>Click to expand
                    </div>
                  </div>
                </div>
                <?php elseif($doc['status'] !== 'missing' && $doc['type'] === 'pdf'): ?>
                <div style="padding:12px 14px;background:#f8fafc">
                  <a href="/uploads/requirements/<?= htmlspecialchars($doc['file']) ?>" target="_blank"
                     style="display:inline-flex;align-items:center;gap:6px;background:#eff6ff;color:#1e40af;border:1px solid #bfdbfe;font-size:12px;font-weight:600;padding:6px 14px;border-radius:8px;text-decoration:none">
                    <i class="bi bi-file-earmark-pdf me-1"></i>Open PDF — <?= htmlspecialchars($doc['file']) ?>
                    <i class="bi bi-box-arrow-up-right"></i>
                  </a>
                </div>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>
      </div>

      <!-- Lightbox overlay for document fullscreen view -->
      <div id="docViewerOverlay" onclick="closeDocViewer()" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.88);z-index:9999;align-items:center;justify-content:center;flex-direction:column;gap:14px">
        <div style="display:flex;align-items:center;justify-content:space-between;width:90%;max-width:860px">
          <span id="docViewerLabel" style="color:#fff;font-size:14px;font-weight:700"></span>
          <button onclick="closeDocViewer()" style="background:rgba(255,255,255,.15);border:none;color:#fff;font-size:18px;width:36px;height:36px;border-radius:50%;cursor:pointer;display:flex;align-items:center;justify-content:center">
            <i class="bi bi-x-lg"></i>
          </button>
        </div>
        <img id="docViewerImg" src="" alt="" style="max-width:90%;max-height:80vh;border-radius:10px;border:2px solid rgba(255,255,255,.15);object-fit:contain">
        <div style="font-size:12px;color:rgba(255,255,255,.4)">Click anywhere to close</div>
      </div>
      <script>
      function openDocViewer(label, src) {
        document.getElementById('docViewerLabel').textContent = label;
        document.getElementById('docViewerImg').src = src;
        var o = document.getElementById('docViewerOverlay');
        o.style.display = 'flex';
        event.stopPropagation();
      }
      function closeDocViewer() {
        document.getElementById('docViewerOverlay').style.display = 'none';
      }
      function verifyDoc(btn, idx) {
        var wrap = btn.closest('div[style*="display:flex"]');
        wrap.innerHTML = '<span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px"><i class="bi bi-patch-check-fill me-1"></i>Verified</span>';
        btn.closest('[style*="border:1px solid"]').style.borderColor = '#bbf7d0';
        showToast('Document marked as verified!');
      }
      function rejectDoc(btn, idx) {
        var wrap = btn.closest('div[style*="display:flex"]');
        wrap.innerHTML = '<span style="background:#fef2f2;color:#991b1b;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px"><i class="bi bi-x-circle-fill me-1"></i>Rejected</span>';
        btn.closest('[style*="border:1px solid"]').style.borderColor = '#fecaca';
        showToast('Document marked as rejected.');
      }
      </script>

      <div class="modal-footer border-0" style="background:#f8fafc;padding:14px 24px">
        <?php if(!$p['enrolled']): ?>
        <?php endif; ?>
        <a href="/admin" class="btn btn-light btn-sm border px-4 fw-medium"><i class="bi bi-x me-1"></i>Close</a>
      </div>
      <?php else: ?>
      <div class="modal-body text-center py-5">
        <i class="bi bi-person-x" style="font-size:40px;color:#94a3b8"></i>
        <div class="mt-2 text-muted">Profile not found.</div>
      </div>
      <div class="modal-footer border-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Close</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php elseif($modal === 'addStudent'): ?>
<!-- MODAL: ADD STUDENT -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <div>
          <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-person-plus-fill me-2 text-navy"></i>Add Student – Late Enrollment</h5>
          <div class="text-muted" style="font-size:13px">Admin bypass for late-enrolled students. Complete all fields below.</div>
        </div>
        <a href="/admin" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <div class="fw-semibold mb-2 mt-1" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--navy);padding-left:10px">School Information</div>
        <div class="row g-3 mb-3">
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">School Year *</label><input type="text" class="form-control" value="2025-2026"></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Grade Level *</label><select class="form-select"><option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option></select></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Section *</label><input type="text" class="form-control" placeholder="e.g., Section A"></div>
        </div>
        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--navy);padding-left:10px">Learner Information</div>
        <div class="row g-3 mb-3">
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Last Name *</label><input type="text" class="form-control" placeholder="Last Name"></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">First Name *</label><input type="text" class="form-control" placeholder="First Name"></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Middle Name</label><input type="text" class="form-control" placeholder="Middle Name"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Date of Birth *</label><input type="date" class="form-control"></div>
          <div class="col-md-2"><label class="form-label fw-medium" style="font-size:13px">Age *</label><input type="number" class="form-control" placeholder="Age"></div>
          <div class="col-md-3"><label class="form-label fw-medium d-block" style="font-size:13px">Sex *</label><div class="d-flex gap-4 mt-1"><label><input type="radio" name="as-sex" value="Male"> Male</label><label><input type="radio" name="as-sex" value="Female"> Female</label></div></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Email *</label><input type="email" class="form-control" placeholder="student@email.com"></div>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-navy btn-sm fw-semibold" onclick="showToast('Student enrolled successfully!');setTimeout(()=>window.location='/admin',1600)">
          <i class="bi bi-person-check me-1"></i>Enroll Student
        </button>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'export'): ?>
<!-- MODAL: EXPORT -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-download me-2 text-navy"></i>Export Student Data</h5>
        <a href="/admin" class="btn-close" aria-label="Close"></a>
      </div>
      <div class="modal-body">
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">School Year</label><select class="form-select"><option>2025–2026</option><option>2024–2025</option></select></div>
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">Grade Level</label><select class="form-select"><option value="">All Grades</option><option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option></select></div>
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">Format</label><select class="form-select"><option>CSV (.csv)</option><option>Excel (.xlsx)</option><option>PDF (.pdf)</option></select></div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-navy btn-sm fw-semibold" onclick="showToast('Export started!');setTimeout(()=>window.location='/admin',1600)"><i class="bi bi-download me-1"></i>Export Now</button>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'transfer'): ?>
<!-- MODAL: TRANSFER SECTION -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" style="max-width:460px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#1e3a8a,#0d9488);padding:22px 28px 18px;position:relative">
        <a href="/admin" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff"><i class="bi bi-arrow-left-right"></i></div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Transfer Section</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">Student ID: <?= htmlspecialchars($stuId) ?></div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <div class="alert alert-info py-2 mb-3" style="font-size:13px">
          <i class="bi bi-info-circle me-1"></i>Transferring: <strong><?= htmlspecialchars($stuName) ?></strong>
        </div>
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">New Grade Level *</label>
          <select class="form-select"><option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option selected>Grade 10</option></select>
        </div>
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">New Section *</label>
          <input type="text" class="form-control" placeholder="e.g., Section B">
        </div>
        <div class="mb-3"><label class="form-label fw-medium" style="font-size:13px">Reason</label>
          <textarea class="form-control" rows="2" placeholder="Optional reason..."></textarea>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0 px-4 pb-4">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-navy btn-sm fw-semibold px-4" onclick="showToast('<?= htmlspecialchars($stuName) ?> transferred successfully!');setTimeout(()=>window.location='/admin',1800)">
          <i class="bi bi-check-circle me-1"></i>Confirm Transfer
        </button>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'createSection'): ?>
<!-- MODAL: CREATE SECTION -->
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" style="max-width:520px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#1e3a8a,#0d9488);padding:24px 28px 20px;position:relative">
        <a href="/admin" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Auto Create Section</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">Select a grade level to begin auto-sectioning</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4" style="background:#f8fafc">
        <div style="font-size:13px;color:#64748b;margin-bottom:18px;text-align:center">
          Choose a grade level. The system distributes students into sections automatically.
        </div>
        <div class="row g-3">
          <?php
          $gp = [
            ['id'=>'g7', 'label'=>'Grade 7', 'count'=>64,'bg'=>'var(--g7-light)','color'=>'var(--g7-color)'],
            ['id'=>'g8', 'label'=>'Grade 8', 'count'=>58,'bg'=>'var(--g8-light)','color'=>'var(--g8-color)'],
            ['id'=>'g9', 'label'=>'Grade 9', 'count'=>82,'bg'=>'var(--g9-light)','color'=>'var(--g9-color)'],
            ['id'=>'g10','label'=>'Grade 10','count'=>67,'bg'=>'var(--g10-light)','color'=>'var(--g10-color)'],
          ];
          foreach($gp as $g): ?>
          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('<?= $g['id'] ?>','<?= $g['label'] ?>')">
              <div class="grade-pick-icon" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-pick-name"><?= $g['label'] ?></div>
              <div class="grade-pick-meta"><?= $g['count'] ?> students enrolled</div>
              <div class="grade-pick-badge" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="modal-footer border-0" style="background:#f8fafc;padding:12px 24px">
        <a href="/admin" class="btn btn-outline-secondary btn-sm px-4">Cancel</a>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- ===================== MODAL: SY ARCHIVES ===================== -->
<div class="modal fade" id="syArchiveModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#1e3a8a,#0d9488);padding:24px 28px 20px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff">
            <i class="bi bi-archive-fill"></i>
          </div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">School Year Archives</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">Past enrollment batches by school year — click a row to expand</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4" id="syArchiveBody" style="background:#f8fafc">
        <!-- Rendered by JS -->
      </div>
      <div class="modal-footer border-0 bg-white px-4 pb-4">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Approve toast (shown via URL param) -->
<?php if($action === 'approve' && $appId): ?>
<div class="dpnhs-toast" id="approveToast">
  <i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:18px"></i>
  <?= htmlspecialchars($appName) ?> (<?= htmlspecialchars($appId) ?>) has been approved!
</div>
<script>setTimeout(()=>{ const t=document.getElementById('approveToast'); if(t) t.remove(); }, 3500);</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>

/* ── Sidebar ── */
function openSidebar()  { document.getElementById('leftSidebar').classList.add('open'); document.getElementById('sbOverlay').classList.add('open'); }
function closeSidebar() { document.getElementById('leftSidebar').classList.remove('open'); document.getElementById('sbOverlay').classList.remove('open'); }

/* ── Tab switching ── */
function switchAdminTab(tab, el) {
  sessionStorage.setItem('adminTab', tab);
  document.querySelectorAll('.sb-nav-item').forEach(t => t.classList.remove('active'));
  if (el) {
    el.classList.add('active');
  } else {
    // find and activate the matching nav item
    document.querySelectorAll('.sb-nav-item[data-tab]').forEach(function(item) {
      if (item.dataset.tab === tab) item.classList.add('active');
    });
  }
  ['statistics','applications','students','sections'].forEach(function(t) {
    document.getElementById('admin-tab-'+t).classList.toggle('d-none', t !== tab);
  });
  const titles = { applications:'Applications', students:'Students', sections:'Sections', statistics:'Statistics & Analytics' };
  document.getElementById('pageTitle').textContent = titles[tab] || tab;
  if (window.innerWidth < 992) closeSidebar();
  if (tab === 'statistics') initAdminCharts();
}

/* Restore tab on page load handled inside DOMContentLoaded below */

/* ── Action dropdown ── */
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

/* ── Table search ── */
function filterTable(tid, q) {
  document.querySelectorAll('#'+tid+' tbody tr').forEach(r => {
    r.style.display = r.textContent.toLowerCase().includes(q.toLowerCase()) ? '' : 'none';
  });
}

/* ── Grade accordion ── */
function toggleGrade(id) { document.getElementById(id).classList.toggle('open'); }

/* ── Reject form helper ── */
function toggleCustomReason(val) {
  document.getElementById('customReasonWrap').classList.toggle('d-none', val !== 'other');
}
function submitRejectForm() {
  const sel = document.getElementById('rejectReasonSelect').value;
  if (!sel) { alert('Please select a reason.'); return; }
  showToast('Application rejected successfully.');
  setTimeout(() => window.location = '/admin', 1800);
}

/* ── Toast helper ── */
function showToast(msg) {
  const t = document.createElement('div');
  t.className = 'dpnhs-toast';
  t.innerHTML = `<i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:18px"></i>${msg}`;
  document.body.appendChild(t);
  setTimeout(() => t.remove(), 3500);
}

/* ── SY Archive modal ── */
const _syArchives = [
  {
    sy: 'SY 2025\u20132026', status: 'active',
    grades: [
      { label: 'Grade 7',  sections: 2, students: 64,  cap: 90 },
      { label: 'Grade 8',  sections: 2, students: 58,  cap: 90 },
      { label: 'Grade 9',  sections: 2, students: 82,  cap: 90 },
      { label: 'Grade 10', sections: 2, students: 67,  cap: 90 },
    ]
  },
  {
    sy: 'SY 2024\u20132025', status: 'archived',
    grades: [
      { label: 'Grade 7',  sections: 2, students: 61,  cap: 90 },
      { label: 'Grade 8',  sections: 2, students: 55,  cap: 90 },
      { label: 'Grade 9',  sections: 2, students: 79,  cap: 90 },
      { label: 'Grade 10', sections: 2, students: 63,  cap: 90 },
    ]
  },
  {
    sy: 'SY 2023\u20132024', status: 'archived',
    grades: [
      { label: 'Grade 7',  sections: 2, students: 58,  cap: 90 },
      { label: 'Grade 8',  sections: 2, students: 52,  cap: 90 },
      { label: 'Grade 9',  sections: 2, students: 74,  cap: 90 },
      { label: 'Grade 10', sections: 2, students: 60,  cap: 90 },
    ]
  },
];

const gradeArchiveColors = {
  'Grade 7':  { bg: '#ccfbf1', color: '#0f766e' },
  'Grade 8':  { bg: '#fef3c7', color: '#b45309' },
  'Grade 9':  { bg: '#fce7f3', color: '#be185d' },
  'Grade 10': { bg: '#eff6ff', color: '#1e40af' },
};

function openSYArchiveModal() {
  const body = document.getElementById('syArchiveBody');
  body.innerHTML = _syArchives.map(function(rec) {
    var isActive = rec.status === 'active';
    var totalStudents = rec.grades.reduce(function(s,g){ return s+g.students; }, 0);
    var totalSections = rec.grades.reduce(function(s,g){ return s+g.sections; }, 0);
    var gradeRows = rec.grades.map(function(g) {
      var c = gradeArchiveColors[g.label] || { bg: '#f1f5f9', color: '#475569' };
      var pct = Math.round((g.students / g.cap) * 100);
      return '<div class="d-flex align-items-center gap-3 py-2" style="border-bottom:1px solid #f1f5f9">' +
        '<span class="rounded-pill px-2" style="background:'+c.bg+';color:'+c.color+';font-size:11.5px;font-weight:700;white-space:nowrap">'+g.label+'</span>' +
        '<div class="flex-grow-1">' +
          '<div class="d-flex justify-content-between mb-1" style="font-size:11.5px;color:#64748b"><span>'+g.sections+' section'+(g.sections>1?'s':'')+'</span><span>'+g.students+' students</span></div>' +
          '<div style="background:#e2e8f0;border-radius:20px;height:6px;overflow:hidden"><div style="width:'+pct+'%;height:100%;background:'+c.color+';border-radius:20px"></div></div>' +
        '</div></div>';
    }).join('');
    var exportBtn = '<button class="btn btn-sm btn-outline-secondary" onclick="alert(\'Exporting '+rec.sy+' data...\')"><i class="bi bi-download me-1"></i>Export</button>';
    var reportBtn = !isActive ? '<button class="btn btn-sm ms-2" style="background:#eff6ff;color:#1e40af;border:1px solid #bfdbfe" onclick="alert(\'Viewing '+rec.sy+' report...\')"><i class="bi bi-eye me-1"></i>View Report</button>' : '';
    return '<div class="card border rounded-3 mb-3 overflow-hidden">' +
      '<div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2" style="background:'+(isActive?'linear-gradient(135deg,#1e3a8a,#0d9488)':'#f8fafc')+';cursor:pointer" onclick="this.nextElementSibling.classList.toggle(\'d-none\')">' +
        '<div class="d-flex align-items-center gap-3">' +
          '<div style="width:40px;height:40px;border-radius:10px;background:'+(isActive?'rgba(255,255,255,.18)':'#e2e8f0')+';display:flex;align-items:center;justify-content:center;font-size:18px;color:'+(isActive?'#fff':'#64748b')+'">' +
            '<i class="bi bi-calendar2-week-fill"></i></div>' +
          '<div><div class="fw-bold" style="font-size:14.5px;color:'+(isActive?'#fff':'#1e293b')+'">'+rec.sy+'</div>' +
          '<div style="font-size:12px;color:'+(isActive?'rgba(255,255,255,.7)':'#94a3b8')+'">'+totalSections+' sections &bull; '+totalStudents+' students enrolled</div></div>' +
        '</div>' +
        '<span class="badge rounded-pill px-3" style="background:'+(isActive?'rgba(255,255,255,.2)':'#f1f5f9')+';color:'+(isActive?'#fff':'#64748b')+';font-size:11px">'+(isActive?'&#9679; Active':'&#9675; Archived')+'</span>' +
      '</div>' +
      '<div class="p-3 d-none">'+gradeRows+
        '<div class="d-flex gap-2 mt-3 justify-content-end">'+exportBtn+reportBtn+'</div>' +
      '</div></div>';
  }).join('');
  new bootstrap.Modal(document.getElementById('syArchiveModal')).show();
}

/* ── Auto section (section tab, grade picker) ── */
const enrolledCounts = { g7:64, g8:58, g9:82, g10:67 };
const LETTERS = ['A','B','C','D','E','F'];
const CAP = 45;
const gradeColors = {
  g7:  { fill:'fill-teal',  bg:'var(--g7-light)', color:'var(--g7-color)' },
  g8:  { fill:'fill-amber', bg:'var(--g8-light)', color:'var(--g8-color)' },
  g9:  { fill:'fill-rose',  bg:'var(--g9-light)', color:'var(--g9-color)' },
  g10: { fill:'fill-navy',  bg:'var(--g10-light)',color:'var(--g10-color)'},
};

function triggerAutoSection(gradeId, gradeLabel) {
  const total = enrolledCounts[gradeId];
  const n = Math.ceil(total / CAP);
  const base = Math.floor(total / n);
  const rem  = total % n;
  const plan = Array.from({length:n},(_,i)=>({ name:'Section '+LETTERS[i], students: base+(i<rem?1:0) }));
  const c = gradeColors[gradeId];
  const wrap = document.getElementById(gradeId+'-sections');
  wrap.innerHTML = '';
  plan.forEach(sec => {
    const pct = Math.round((sec.students/CAP)*100);
    const row = document.createElement('div');
    row.className = 'section-row';
    row.style.cursor = 'pointer';
    row.title = 'Click to view Master List';
    row.innerHTML = `
      <div class="section-top">
        <div class="section-icon" style="background:${c.bg};color:${c.color}"><i class="bi bi-book-fill"></i></div>
        <div><div class="section-title">${sec.name}</div></div>
        <div style="margin-left:auto;display:flex;align-items:center;gap:8px">
          <span style="font-size:11px;color:${c.color};background:${c.bg};padding:2px 8px;border-radius:20px"><i class="bi bi-list-ul me-1"></i>Master List</span>
          <span style="font-size:12px;font-weight:600;color:${c.color};background:${c.bg};padding:2px 10px;border-radius:20px">${sec.students}/${CAP}</span>
        </div>
      </div>
      <div class="cap-row"><span class="cap-label">Capacity</span><span class="cap-value">${sec.students} / ${CAP} students</span></div>
      <div class="cap-bar"><div class="fill ${c.fill}" style="width:${pct}%"></div></div>`;
    row.addEventListener('click', function() {
      openMasterList(gradeLabel, sec.name, sec.students, gradeId);
    });
    wrap.appendChild(row);
  });
  document.getElementById(gradeId+'-meta').textContent = `${n} Sections • ${total} / ${n*CAP} Students`;
  document.querySelector(`#${gradeId} .grade-pill-bar .fill`).style.width = Math.round((total/(n*CAP))*100)+'%';
  document.getElementById(gradeId).classList.add('open');
  // Close the create-section modal
  const phpM = document.getElementById('phpModal');
  const bsM = phpM ? bootstrap.Modal.getInstance(phpM) : null;
  if (bsM) bsM.hide();
  setTimeout(() => {
    showToast(`${n} section(s) created for ${gradeLabel}! Click a section to view Master List.`);
  }, 300);
}

/* ── Charts ── */
let _adminChartsInit = false;
function initAdminCharts() {
  if (_adminChartsInit) return;
  _adminChartsInit = true;
  new Chart(document.getElementById('barChart'), {
    type:'bar',
    data:{ labels:['Grade 7','Grade 8','Grade 9','Grade 10'], datasets:[{ label:'Students', data:[170,165,195,215], backgroundColor:'#3b82f6', borderRadius:4, borderSkipped:false }] },
    options:{ responsive:true, maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{ y:{beginAtZero:true,max:240,ticks:{stepSize:55,color:'#94a3b8',font:{size:11}},grid:{color:'rgba(148,163,184,0.15)'}}, x:{ticks:{color:'#64748b',font:{size:11}},grid:{display:false}} } }
  });
  new Chart(document.getElementById('pieChart'), {
    type:'doughnut',
    data:{ labels:['Male','Female'], datasets:[{data:[640,605],backgroundColor:['#1e3a8a','#0d9488'],borderWidth:2,borderColor:'#ffffff'}] },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'60%', plugins:{legend:{display:false}} }
  });
  new Chart(document.getElementById('appStatusChart'), {
    type:'doughnut',
    data:{ labels:['Approved','Pending','Rejected'], datasets:[{data:[301,6,3],backgroundColor:['#22c55e','#f59e0b','#ef4444'],borderWidth:2,borderColor:'#fff'}] },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'55%', plugins:{legend:{position:'bottom',labels:{font:{size:12},padding:14}}} }
  });
  new Chart(document.getElementById('trendChart'), {
    type:'line',
    data:{ labels:['SY 2023–2024','SY 2024–2025','SY 2025–2026'], datasets:[{ label:'Enrolled', data:[244,258,271], borderColor:'#7c3aed', backgroundColor:'rgba(124,58,237,.1)', fill:true, tension:.35, pointBackgroundColor:'#7c3aed', pointRadius:5 }] },
    options:{ responsive:true, maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{ y:{beginAtZero:false,ticks:{color:'#94a3b8',font:{size:11}},grid:{color:'rgba(148,163,184,.15)'}}, x:{ticks:{color:'#64748b',font:{size:11}},grid:{display:false}} } }
  });
}

/* ── Master List ── */
// Sample student roster keyed by gradeId+sectionName
const _masterListData = {
  g7_Section_A: [
    {no:1,lrn:'202600700001',name:'Aguilar, Maria C.',sex:'F',dob:'Mar 12, 2013',age:13,address:'Brgy. Centro, Minalabac'},
    {no:2,lrn:'202600700002',name:'Bautista, Juan R.',sex:'M',dob:'Jul 5, 2013',age:12,address:'Brgy. Lupi, Naga City'},
    {no:3,lrn:'202600700003',name:'Cruz, Ana P.',sex:'F',dob:'Jan 20, 2013',age:13,address:'Brgy. Tinalmud, Camaligan'},
    {no:4,lrn:'202600700004',name:'De Leon, Carlos M.',sex:'M',dob:'Sep 8, 2013',age:12,address:'Brgy. Sabang, Minalabac'},
    {no:5,lrn:'202600700005',name:'Espiritu, Rosa T.',sex:'F',dob:'Apr 15, 2013',age:13,address:'Brgy. Sta. Cruz, Naga'},
  ],
  g7_Section_B: [
    {no:1,lrn:'202600700031',name:'Flores, Miguel A.',sex:'M',dob:'Feb 11, 2013',age:13,address:'Brgy. Sto. Niño, Naga'},
    {no:2,lrn:'202600700032',name:'Garcia, Liza M.',sex:'F',dob:'Jun 22, 2013',age:12,address:'Brgy. Peñafrancia, Naga'},
    {no:3,lrn:'202600700033',name:'Hernandez, Rey B.',sex:'M',dob:'Oct 3, 2013',age:12,address:'Brgy. Pacol, Naga'},
  ],
};

function openMasterList(gradeLabel, sectionName, studentCount, gradeId) {
  const key = gradeId + '_' + sectionName.replace(' ','_');
  const students = _masterListData[key] || generateSampleStudents(studentCount, gradeLabel, sectionName);

  const gradeColorMap = {
    g7: {bg:'#ccfbf1',color:'#0f766e',gradient:'#0d9488,#065f46'},
    g8: {bg:'#fef3c7',color:'#b45309',gradient:'#d97706,#92400e'},
    g9: {bg:'#fce7f3',color:'#be185d',gradient:'#db2777,#9d174d'},
    g10:{bg:'#eff6ff',color:'#1e40af',gradient:'#1e3a8a,#1e40af'},
  };
  const gc = gradeColorMap[gradeId] || {bg:'#f1f5f9',color:'#475569',gradient:'#475569,#1e293b'};

  const rows = students.map(s =>
    `<tr>
      <td style="text-align:center;color:#64748b">${s.no}</td>
      <td style="font-family:monospace;font-size:11.5px;color:#64748b">${s.lrn}</td>
      <td style="font-weight:600;color:#1e293b">${s.name}</td>
      <td style="text-align:center">${s.sex}</td>
      <td style="font-size:12px;color:#475569">${s.dob}</td>
      <td style="text-align:center">${s.age}</td>
      <td style="font-size:12px;color:#475569">${s.address}</td>
    </tr>`
  ).join('');

  document.getElementById('masterListContent').innerHTML = `
    <div id="masterListPrintArea">
      <!-- Print Header -->
      <div class="print-only" style="text-align:center;margin-bottom:18px">
        <div style="font-size:13px;font-weight:700;text-transform:uppercase">Don Pio Natal High School</div>
        <div style="font-size:11px;color:#475569">Minalabac, Camarines Sur</div>
        <div style="font-size:14px;font-weight:800;margin-top:8px;text-transform:uppercase;letter-spacing:.05em">Class Master List</div>
        <div style="font-size:12px">${gradeLabel} – ${sectionName} &nbsp;|&nbsp; SY 2025–2026</div>
        <div style="border-bottom:2px solid #1e293b;margin:10px 0"></div>
      </div>
      <!-- Screen Header -->
      <div class="no-print d-flex align-items-center gap-3 mb-3 p-3 rounded-3" style="background:linear-gradient(135deg,${gc.gradient});color:#fff">
        <div style="width:48px;height:48px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px"><i class="bi bi-list-columns-reverse"></i></div>
        <div>
          <div style="font-size:17px;font-weight:800">${gradeLabel} – ${sectionName}</div>
          <div style="font-size:12px;opacity:.8">SY 2025–2026 &nbsp;|&nbsp; ${students.length} students enrolled</div>
        </div>
      </div>
      <div class="table-responsive">
        <table style="width:100%;border-collapse:collapse;font-size:13px" class="master-table">
          <thead>
            <tr style="background:#1e3a8a;color:#fff">
              <th style="padding:9px 10px;text-align:center;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em;width:42px">#</th>
              <th style="padding:9px 10px;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em;white-space:nowrap">LRN</th>
              <th style="padding:9px 10px;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em">Student Name</th>
              <th style="padding:9px 10px;text-align:center;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em;width:50px">Sex</th>
              <th style="padding:9px 10px;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em;white-space:nowrap">Date of Birth</th>
              <th style="padding:9px 10px;text-align:center;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em;width:50px">Age</th>
              <th style="padding:9px 10px;font-size:11.5px;text-transform:uppercase;letter-spacing:.05em">Address</th>
            </tr>
          </thead>
          <tbody>${rows}</tbody>
        </table>
      </div>
      <!-- Print footer -->
      <div class="print-only" style="margin-top:32px;display:flex;justify-content:space-between;font-size:11px">
        <div>Prepared by: _______________________<br>Class Adviser<br>Date: _______________</div>
        <div style="text-align:right">Noted by: _______________________<br>School Principal<br>Date: _______________</div>
      </div>
    </div>`;

  // inject print styles
  if (!document.getElementById('masterPrintStyle')) {
    const s = document.createElement('style');
    s.id = 'masterPrintStyle';
    s.textContent = `
      @media print {
        body > *:not(#masterListModal) { display:none !important; }
        #masterListModal { position:static !important; display:block !important; }
        .modal-dialog { max-width:100% !important; margin:0 !important; }
        .modal-content { box-shadow:none !important; border:none !important; }
        .no-print, .modal-header, .modal-footer { display:none !important; }
        .print-only { display:block !important; }
        .master-table tbody tr:nth-child(even) { background:#f8fafc; }
        .master-table td, .master-table th { border:1px solid #e2e8f0; }
      }
      .print-only { display:none; }
      .master-table tbody tr:nth-child(even) { background:#f8fafc; }
      .master-table td { padding:8px 10px; border-bottom:1px solid #f1f5f9; }
    `;
    document.head.appendChild(s);
  }

  new bootstrap.Modal(document.getElementById('masterListModal')).show();
}

function generateSampleStudents(count, gradeLabel, sectionName) {
  const lastNames = ['Reyes','Santos','Cruz','Bautista','Garcia','Torres','Flores','Ramos','Lopez','Hernandez','Dela Cruz','Mendoza','Villanueva','Castillo','Aquino'];
  const firstNames = ['Juan','Maria','Jose','Ana','Carlos','Rosa','Miguel','Liza','Pedro','Elena','Rico','Clara','Diego','Sophia','Marco'];
  const arr = [];
  for (let i=0;i<count;i++) {
    const ln = lastNames[i % lastNames.length];
    const fn = firstNames[(i+3) % firstNames.length];
    const mi = String.fromCharCode(65+(i%26));
    const yr = 2013 - Math.floor(i/15);
    const mo = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][i%12];
    const day = (i%28)+1;
    arr.push({no:i+1, lrn:'20260'+gradeLabel.slice(-1)+'0'+String(i+1).padStart(5,'0'), name:`${ln}, ${fn} ${mi}.`, sex:i%2===0?'M':'F', dob:`${mo} ${day}, ${yr}`, age:2026-yr, address:`Brgy. ${lastNames[(i+5)%lastNames.length]}, Minalabac`});
  }
  return arr;
}

document.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const modalParam = urlParams.get('modal');
  if (modalParam === 'addStudent' || modalParam === 'export' || modalParam === 'profile' || modalParam === 'transfer') {
    sessionStorage.setItem('adminTab', 'students');
  } else if (modalParam === 'createSection') {
    sessionStorage.setItem('adminTab', 'sections');
  } else if (modalParam === 'rejected' || modalParam === 'reject') {
    sessionStorage.setItem('adminTab', 'applications');
  }
  if (urlParams.get('app_page')) sessionStorage.setItem('adminTab', 'applications');
  if (urlParams.get('stu_page')) sessionStorage.setItem('adminTab', 'students');

  // Restore saved tab
  var savedTab = sessionStorage.getItem('adminTab') || 'statistics';
  switchAdminTab(savedTab, null);

  // Auto-open modal if ?modal= is set
  const m = document.getElementById('phpModal');
  if (m) { new bootstrap.Modal(m).show(); }
});
</script>

<!-- ===================== MODAL: MASTER LIST ===================== -->
<div class="modal fade" id="masterListModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <div class="modal-header border-0 px-4 pt-4 pb-2 no-print">
        <div class="d-flex align-items-center gap-3">
          <div style="width:40px;height:40px;border-radius:10px;background:#1e3a8a;display:flex;align-items:center;justify-content:center;font-size:18px;color:#fff">
            <i class="bi bi-list-columns-reverse"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold mb-0" style="color:#1e293b">Class Master List</h5>
            <div class="text-muted" style="font-size:12px">SY 2025–2026 &nbsp;|&nbsp; DPNHS</div>
          </div>
        </div>
        <div class="d-flex gap-2 align-items-center ms-auto">
          <button class="btn btn-sm fw-semibold px-3" style="background:#1e3a8a;color:#fff" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i>Print Master List
          </button>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
      </div>
      <div class="modal-body px-4 pb-4" id="masterListContent">
        <!-- Populated by JS -->
      </div>
    </div>
  </div>
</div>