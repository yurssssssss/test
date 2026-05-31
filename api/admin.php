<?php
$pageTitle = 'Admin Dashboard – PHLCI';
include 'header.php';

/* ── Sample data (replace with DB queries in production) ── */
$allApplications = [
  ['id'=>'APP001','name'=>'Emma Johnson',   'grade'=>'Grade 10','date'=>'March 18, 2026','status'=>'Pending'],
  ['id'=>'APP002','name'=>'Michael Chen',   'grade'=>'Grade 9', 'date'=>'March 18, 2026','status'=>'Pending'],
  ['id'=>'APP003','name'=>'Sarah Williams', 'grade'=>'Grade 8', 'date'=>'March 17, 2026','status'=>'Pending'],
  ['id'=>'APP004','name'=>'James Brown',    'grade'=>'Grade 8', 'date'=>'March 17, 2026','status'=>'Pending'],
  ['id'=>'APP005','name'=>'Lisa Davis',     'grade'=>'Grade 7', 'date'=>'March 16, 2026','status'=>'Pending'],
  ['id'=>'APP006','name'=>'Carlos Reyes',   'grade'=>'Grade 7', 'date'=>'March 15, 2026','status'=>'Pending'],
];
/* Grade 7 Admin — filter to Grade 7 only */
$applications = array_values(array_filter($allApplications, fn($a) => $a['grade'] === 'Grade 7'));

$allStudents = [
  ['id'=>'STU2024001','name'=>'John Smith',    'init'=>'JS','color'=>'av-blue',   'grade'=>'Grade 10','section'=>'Section A','status'=>'Enrolled'],
  ['id'=>'STU2024002','name'=>'Alice Cooper',  'init'=>'AC','color'=>'av-teal',   'grade'=>'Grade 9', 'section'=>'Section B','status'=>'Enrolled'],
  ['id'=>'STU2024003','name'=>'Bob Wilson',    'init'=>'BW','color'=>'av-orange', 'grade'=>'Grade 9', 'section'=>'Section A','status'=>'Enrolled'],
  ['id'=>'STU2024004','name'=>'Carol Martinez','init'=>'CM','color'=>'av-green',  'grade'=>'Grade 10','section'=>'Section C','status'=>'Enrolled'],
  ['id'=>'STU2024005','name'=>'David Lee',     'init'=>'DL','color'=>'av-purple', 'grade'=>'Grade 8', 'section'=>'Section B','status'=>'Enrolled'],
  ['id'=>'STU2026701','name'=>'Ana Flores',    'init'=>'AF','color'=>'av-teal',   'grade'=>'Grade 7', 'section'=>'Section A','status'=>'Approved'],
  ['id'=>'STU2026702','name'=>'Marco Reyes',   'init'=>'MR','color'=>'av-blue',   'grade'=>'Grade 7', 'section'=>'Section A','status'=>'Approved'],
  ['id'=>'STU2026703','name'=>'Sofia Santos',  'init'=>'SS','color'=>'av-green',  'grade'=>'Grade 7', 'section'=>'Section B','status'=>'Approved'],
  ['id'=>'STU2026704','name'=>'Liam Bautista', 'init'=>'LB','color'=>'av-orange', 'grade'=>'Grade 7', 'section'=>'Section B','status'=>'Approved'],
  ['id'=>'STU2026705','name'=>'Elena Cruz',    'init'=>'EC','color'=>'av-purple', 'grade'=>'Grade 7', 'section'=>'Section A','status'=>'Approved'],
];
/* Grade 7 Admin — filter to Grade 7 only */
$students = array_values(array_filter($allStudents, fn($s) => $s['grade'] === 'Grade 7'));

/* ── Payment submissions ── */
$allPayments = [
  ['id'=>'PAY001','student_id'=>'STU2026701','name'=>'Ana Flores',   'grade'=>'Grade 7','type'=>'Initial Payment','amount'=>'₱8,000','method'=>'GCash','ref'=>'GC20260310001','submitted'=>'March 10, 2026','status'=>'Pending',  'proof'=>'proof_ana_flores.jpg',  'parent_email'=>'parent.flores@email.com'],
  ['id'=>'PAY002','student_id'=>'STU2026702','name'=>'Marco Reyes',  'grade'=>'Grade 7','type'=>'Initial Payment','amount'=>'₱8,000','method'=>'Maya', 'ref'=>'MY20260311002','submitted'=>'March 11, 2026','status'=>'Pending',  'proof'=>'proof_marco_reyes.jpg', 'parent_email'=>'parent.reyes@email.com'],
  ['id'=>'PAY003','student_id'=>'STU2026703','name'=>'Sofia Santos', 'grade'=>'Grade 7','type'=>'Initial Payment','amount'=>'₱8,000','method'=>'Bank Transfer','ref'=>'BT20260312003','submitted'=>'March 12, 2026','status'=>'Pending',  'proof'=>'proof_sofia_santos.jpg','parent_email'=>'parent.santos@email.com'],
  ['id'=>'PAY004','student_id'=>'STU2026704','name'=>'Liam Bautista','grade'=>'Grade 7','type'=>'Initial Payment','amount'=>'₱8,000','method'=>'GCash','ref'=>'GC20260313004','submitted'=>'March 13, 2026','status'=>'Verified', 'proof'=>'proof_liam_bautista.jpg','parent_email'=>'parent.bautista@email.com'],
  ['id'=>'PAY005','student_id'=>'STU2026705','name'=>'Elena Cruz',   'grade'=>'Grade 7','type'=>'Tuition (Monthly)','amount'=>'₱4,500','method'=>'GCash','ref'=>'GC20260314005','submitted'=>'March 14, 2026','status'=>'Verified', 'proof'=>'proof_elena_cruz.jpg',  'parent_email'=>'parent.cruz@email.com'],
];
$payments = array_values(array_filter($allPayments, fn($p) => $p['grade'] === 'Grade 7'));
$pendingPayments = array_values(array_filter($payments, fn($p) => $p['status'] === 'Pending'));

// $allRejected = [
//   ['id'=>'APP007','name'=>'Rico Fernandez','grade'=>'Grade 7', 'date'=>'March 14, 2026','by'=>'Admin User','reason'=>'Does not meet age requirements'],
//   ['id'=>'APP008','name'=>'Maria Santos',  'grade'=>'Grade 9', 'date'=>'March 13, 2026','by'=>'Admin User','reason'=>'Does not meet age requirements'],
//   ['id'=>'APP009','name'=>'Kevin Lim',     'grade'=>'Grade 10','date'=>'March 12, 2026','by'=>'Admin User','reason'=>'Location exceeds proximity requirements'],
// ];
// /* Grade 7 Admin — filter to Grade 7 only */
// $rejected = array_values(array_filter($allRejected, fn($r) => $r['grade'] === 'Grade 7'));

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
  background: #1a2a5e;
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
  background: var(--navy, #1a2a5e);
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
  font-weight: 700;
  display: inline-block;
}
.badge-enrolled  { background:#dcfce7; color:#166534; }
.badge-approved  { background:#dbeafe; color:#1e40af; }
.badge-pending   { background:#fef3c7; color:#92400e; }
.badge-rejected  { background:#fee2e2; color:#991b1b; }

/* Prevent table from being too cramped on small screens */
@media (max-width: 767px) {
  #appTable tbody td,
  #stuTable tbody td {
    padding: 8px 10px;
    font-size: 12.5px;
  }
}
/* Violet color for Pre-Elementary */
.fill-violet { background: #1a2a5e !important; }
.grade-icon.violet { background: #f5f3ff; color: #1a2a5e; }
/* Ensure amber/rose icon classes exist as fallback */
.grade-icon.amber  { background: #fef3c7; color: #b45309; }
.grade-icon.rose   { background: #fce7f3; color: #be185d; }
.grade-icon.navy   { background: #eff6ff; color: #1a2a5e; }
</style>

<!-- ===== SIDEBAR OVERLAY (mobile) ===== -->
<div class="sb-overlay" id="sbOverlay" onclick="closeSidebar()"></div>

<!-- ===== PAGE WRAPPER ===== -->
<div class="page-wrapper">

  <!-- ── LEFT SIDEBAR ── -->
  <aside class="left-sidebar sb-admin" id="leftSidebar">
    <div class="sb-brand">
      <img src="/logo.png" alt="PHLCI Logo">
      <div class="sb-brand-text">
        <div class="sb-brand-name">PHLCI</div>
        <div class="sb-brand-sub">Admin Dashboard</div>
      </div>
    </div>

    <div class="sb-user">
      <div class="sb-avatar av-navy">AD</div>
      <div>
        <div class="sb-user-name">Admin User</div>
        <div class="sb-user-role">Grade 7 Admin</div>
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
    <div class="sb-nav-item" onclick="switchAdminTab('payments',this)" data-tab="payments">
      <i class="bi bi-receipt"></i><span>Payments</span>
      <span class="sb-badge" id="payBadge"><?= count($pendingPayments) ?></span>
    </div>

    <div class="sb-section-label">Account</div>
    <div class="sb-nav-item" onclick="switchAdminTab('profile',this)" data-tab="profile">
      <i class="bi bi-person-gear"></i><span>My Profile</span>
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
                <div class="d-flex align-items-center gap-2" style="font-size:13px"><span class="rounded-circle d-inline-block" style="width:12px;height:12px;background:#1a2a5e"></span> Male: 640 (51%)</div>
                <div class="d-flex align-items-center gap-2" style="font-size:13px;color:#111d42"><span class="rounded-circle d-inline-block" style="width:12px;height:12px;background:#111d42"></span> Female: 605 (49%)</div>
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
              <!-- <a href="?modal=rejected" class="btn btn-outline-danger">
                <i class="bi bi-x-circle"></i> Rejected List
              </a> -->
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
                        <!-- <a class="action-item text-danger" href="?modal=reject&app_id=<?= $app['id'] ?>&app_name=<?= urlencode($app['name']) ?>">
                          <i class="bi bi-x-circle"></i> Reject
                        </a> -->
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
                  <td><span class="badge-<?= strtolower($stu['status']) ?>"><?= $stu['status'] ?></span></td>
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
          <div class="d-flex align-items-center gap-2 mb-4 p-2 rounded-2" style="background:#f0f4ff;border:1px solid #bfdbfe;font-size:13px">
            <i class="bi bi-calendar2-week-fill" style="color:#1e40af"></i>
            <span class="fw-semibold" style="color:#1e40af">Currently Viewing: SY 2025–2026</span>
            <span class="badge rounded-pill ms-1" style="background:#1a2a5e;color:#fff;font-size:11px">Active</span>
          </div>

          <?php
          /* All levels grouped by school level */
          $levelGroups = [
            'Pre-Elementary' => [
              'icon' => 'bi-stars',
              'color' => '#1a2a5e',
              'bg'    => '#fffbea',
              'border'=> '#ddd6fe',
              'grades'=> [
                'nursery' => ['label'=>'Nursery',        'fill'=>'fill-violet', 'icon'=>'violet'],
                'kinder'  => ['label'=>'Kinder',         'fill'=>'fill-violet', 'icon'=>'violet'],
              ],
            ],
            'Elementary' => [
              'icon' => 'bi-book-fill',
              'color' => '#111d42',
              'bg'    => '#f0fdfa',
              'border'=> '#99f6e4',
              'grades'=> [
                'g1'  => ['label'=>'Grade 1', 'fill'=>'fill-teal',  'icon'=>'teal'],
                'g2'  => ['label'=>'Grade 2', 'fill'=>'fill-teal',  'icon'=>'teal'],
                'g3'  => ['label'=>'Grade 3', 'fill'=>'fill-teal',  'icon'=>'teal'],
                'g4'  => ['label'=>'Grade 4', 'fill'=>'fill-teal',  'icon'=>'teal'],
                'g5'  => ['label'=>'Grade 5', 'fill'=>'fill-teal',  'icon'=>'teal'],
                'g6'  => ['label'=>'Grade 6', 'fill'=>'fill-teal',  'icon'=>'teal'],
              ],
            ],
            'Junior High School' => [
              'icon' => 'bi-mortarboard-fill',
              'color' => '#1e40af',
              'bg'    => '#f0f4ff',
              'border'=> '#bfdbfe',
              'grades'=> [
                'g7'  => ['label'=>'Grade 7',  'fill'=>'fill-navy',  'icon'=>'navy'],
                'g8'  => ['label'=>'Grade 8',  'fill'=>'fill-amber', 'icon'=>'amber'],
                'g9'  => ['label'=>'Grade 9',  'fill'=>'fill-rose',  'icon'=>'rose'],
                'g10' => ['label'=>'Grade 10', 'fill'=>'fill-navy',  'icon'=>'navy'],
              ],
            ],
          ];

          $emptyBgMap = [
            'nursery'=> ['background'=>'#fffbea','color'=>'#1a2a5e'],
            'kinder' => ['background'=>'#fffbea','color'=>'#1a2a5e'],
            'g1'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g2'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g3'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g4'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g5'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g6'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g7'  => ['background'=>'var(--teal-light)','color'=>'var(--teal)'],
            'g8'  => ['background'=>'var(--amber-light,#fef3c7)','color'=>'var(--amber,#b45309)'],
            'g9'  => ['background'=>'var(--rose-light,#fce7f3)','color'=>'var(--rose,#be185d)'],
            'g10' => ['background'=>'var(--navy-light,#eff6ff)','color'=>'var(--navy,#1a2a5e)'],
          ];

          foreach($levelGroups as $levelName => $levelData): ?>
          <!-- Level group heading -->
          <div class="d-flex align-items-center gap-2 mb-2 mt-3" style="padding:8px 12px;background:<?= $levelData['bg'] ?>;border:1px solid <?= $levelData['border'] ?>;border-radius:10px">
            <i class="bi <?= $levelData['icon'] ?>" style="color:<?= $levelData['color'] ?>;font-size:15px"></i>
            <span class="fw-bold" style="font-size:13px;color:<?= $levelData['color'] ?>"><?= $levelName ?></span>
          </div>
          <?php foreach($levelData['grades'] as $gid => $gc): ?>
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
                <div class="empty-section-icon" style="background:<?= $emptyBgMap[$gid]['background'] ?>;color:<?= $emptyBgMap[$gid]['color'] ?>">
                  <i class="bi bi-layout-text-sidebar-reverse"></i>
                </div>
                <div class="empty-section-title">No Sections Created</div>
                <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong><?= $gc['label'] ?></strong> to auto-generate sections.</div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </div>


      <!-- ══════════════════════════════════════
           TAB: PAYMENTS
      ══════════════════════════════════════ -->
      <div id="admin-tab-payments" class="d-none">
        <!-- Info banner: no payment API -->
        <div class="d-flex align-items-start gap-2 rounded-3 p-3 mb-4" style="background:#f0f4ff;border:1px solid #bfdbfe;font-size:13px">
          <i class="bi bi-info-circle-fill mt-1" style="color:#2563eb;font-size:15px;flex-shrink:0"></i>
          <div style="color:#1e40af">
            <strong>Manual Payment Process:</strong> Payments are made outside the system via GCash, Maya, or bank transfer.
            Parents upload a proof of payment here. Once you verify it, the system sends an official email invoice to the parent's registered email address as confirmation that the payment has been received.
          </div>
        </div>

        <!-- Summary cards -->
        <div class="row g-3 mb-4">
          <div class="col-md-4 col-6">
            <div class="card border rounded-3 p-3 h-100">
              <div class="stat-icon orange"><i class="bi bi-clock-fill"></i></div>
              <div class="fw-bold mb-1" style="font-size:26px;color:#1e293b"><?= count($pendingPayments) ?></div>
              <div class="text-muted" style="font-size:13px">Pending Verification</div>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="card border rounded-3 p-3 h-100">
              <div class="stat-icon green"><i class="bi bi-patch-check-fill"></i></div>
              <div class="fw-bold mb-1" style="font-size:26px;color:#1e293b"><?= count(array_filter($payments, fn($p)=>$p['status']==='Verified')) ?></div>
              <div class="text-muted" style="font-size:13px">Verified &amp; Invoiced</div>
            </div>
          </div>
          <div class="col-md-4 col-6">
            <div class="card border rounded-3 p-3 h-100">
              <div class="stat-icon blue"><i class="bi bi-people-fill"></i></div>
              <div class="fw-bold mb-1" style="font-size:26px;color:#1e293b"><?= count($payments) ?></div>
              <div class="text-muted" style="font-size:13px">Total Submissions</div>
            </div>
          </div>
        </div>

        <!-- Payment submissions table -->
        <div class="card border rounded-3 p-3 p-md-4">
          <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
            <div>
              <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b"><i class="bi bi-receipt me-2" style="color:#1a2a5e"></i>Proof of Payment Submissions</div>
              <div class="text-muted" style="font-size:13px">Review uploaded payment proofs and send email invoices upon verification</div>
            </div>
            <div class="d-flex gap-2 flex-wrap align-items-center">
              <select class="form-select form-select-sm" style="width:auto" onchange="filterPayTable(this.value)">
                <option value="">All Status</option>
                <option value="Pending">Pending</option>
                <option value="Verified">Verified</option>
                <option value="Rejected">Rejected</option>
              </select>
            </div>
          </div>

          <div class="position-relative mb-3">
            <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5" placeholder="Search payments..." oninput="filterTable('payTable',this.value)">
          </div>

          <div class="table-responsive">
            <table class="table table-hover align-middle" id="payTable">
              <thead class="table-light">
                <tr>
                  <?php foreach(['#','Student','Grade','Type','Amount','Method','Ref No.','Submitted','Status','Actions'] as $h): ?>
                  <th style="text-transform:uppercase;letter-spacing:.04em;color:#64748b;font-size:11px;white-space:nowrap"><?= $h ?></th>
                  <?php endforeach; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($payments as $i => $pay): ?>
                <tr data-status="<?= $pay['status'] ?>">
                  <td style="color:#94a3b8;font-size:12px"><?= $i+1 ?></td>
                  <td>
                    <div class="fw-semibold" style="font-size:13px;color:#1e293b"><?= htmlspecialchars($pay['name']) ?></div>
                    <div style="font-size:11px;color:#94a3b8"><?= $pay['student_id'] ?></div>
                  </td>
                  <td style="font-size:13px"><?= $pay['grade'] ?></td>
                  <td style="font-size:12px;color:#475569"><?= htmlspecialchars($pay['type']) ?></td>
                  <td><span class="fw-bold" style="font-size:13px;color:#1e293b"><?= $pay['amount'] ?></span></td>
                  <td style="font-size:12px"><?= $pay['method'] ?></td>
                  <td><code style="font-size:11px;color:#475569"><?= $pay['ref'] ?></code></td>
                  <td style="font-size:12px;color:#64748b;white-space:nowrap"><?= $pay['submitted'] ?></td>
                  <td>
                    <?php if($pay['status']==='Pending'): ?>
                    <span class="badge-pending"><?= $pay['status'] ?></span>
                    <?php elseif($pay['status']==='Verified'): ?>
                    <span class="badge-enrolled" style="background:#dcfce7;color:#166534">Verified</span>
                    <?php else: ?>
                    <span class="badge-rejected"><?= $pay['status'] ?></span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <div class="action-menu-wrap position-relative">
                      <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions">
                        <i class="bi bi-three-dots-vertical"></i>
                      </button>
                      <div class="action-dropdown shadow-sm">
                        <a class="action-item" href="?modal=viewProof&pay_id=<?= $pay['id'] ?>">
                          <i class="bi bi-eye text-navy"></i> View Proof
                        </a>
                        <?php if($pay['status']==='Pending'): ?>
                        <a class="action-item text-success" href="?modal=verifyPayment&pay_id=<?= $pay['id'] ?>&pay_name=<?= urlencode($pay['name']) ?>&pay_email=<?= urlencode($pay['parent_email']) ?>&pay_amount=<?= urlencode($pay['amount']) ?>&pay_ref=<?= urlencode($pay['ref']) ?>">
                          <i class="bi bi-patch-check"></i> Verify &amp; Send Invoice
                        </a>
                        <a class="action-item text-danger" href="?modal=rejectPayment&pay_id=<?= $pay['id'] ?>&pay_name=<?= urlencode($pay['name']) ?>">
                          <i class="bi bi-x-circle"></i> Reject
                        </a>
                        <?php else: ?>
                        <span class="action-item text-muted" style="cursor:default;opacity:.6">
                          <i class="bi bi-envelope-check"></i> Invoice Sent
                        </span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <div class="d-flex align-items-center justify-content-between mt-3 flex-wrap gap-2">
            <div class="text-muted" style="font-size:13px">Showing <?= count($payments) ?> submission(s) for Grade 7</div>
          </div>
        </div>
      </div><!-- /admin-tab-payments -->


      <!-- ══════════════════════════════════════
           TAB: MY PROFILE
      ══════════════════════════════════════ -->
      <div id="admin-tab-profile" class="d-none">
        <div class="fw-bold mb-1" style="font-size:22px;color:#1e293b">My Profile</div>
        <div class="text-muted mb-4" style="font-size:14px">Manage your profile picture and account password</div>

        <div style="max-width:780px">

          <!-- Profile Picture Card -->
          <div class="card border rounded-3 p-4 mb-4">
            <h5 class="fw-bold mb-1 pb-2 border-bottom" style="color:#1e293b"><i class="bi bi-image me-2" style="color:#1a2a5e"></i>Profile Picture</h5>
            <div class="d-flex flex-column flex-sm-row align-items-center gap-4 pt-3">
              <div class="position-relative flex-shrink-0" style="cursor:pointer" onclick="openAdminPhotoModal()" title="Click to manage photo">
                <div id="adminAvatarPreview" style="width:90px;height:90px;border-radius:50%;background:#1a2a5e;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:28px;overflow:hidden">AD</div>
                <div class="position-absolute bottom-0 end-0" style="background:#1a2a5e;border-radius:50%;width:28px;height:28px;display:flex;align-items:center;justify-content:center;border:2px solid #fff;pointer-events:none">
                  <i class="bi bi-camera-fill text-white" style="font-size:12px"></i>
                </div>
              </div>
              <div>
                <div class="fw-semibold mb-1" style="font-size:14px;color:#1e293b">Admin User</div>
                <div class="text-muted mb-2" style="font-size:12px">Grade 7 Administrator &nbsp;·&nbsp; PHLCI</div>
                <button class="btn btn-sm fw-semibold px-3" style="background:#1a2a5e;color:#fff;font-size:13px" onclick="openAdminPhotoModal()">
                  <i class="bi bi-camera me-1"></i>Manage Photo
                </button>
              </div>
            </div>
          </div>

          <!-- Change Password Card -->
          <div class="card border rounded-3 p-4 mb-4">
            <h5 class="fw-bold mb-1 pb-2 border-bottom" style="color:#1e293b"><i class="bi bi-shield-lock me-2" style="color:#1a2a5e"></i>Change Password</h5>
            <div class="d-flex align-items-start gap-2 rounded-2 p-3 mt-3 mb-3" style="background:#f0f9ff;border:1px solid #bae6fd">
              <i class="bi bi-info-circle-fill mt-1" style="color:#0284c7;font-size:14px;flex-shrink:0"></i>
              <div style="font-size:12.5px;color:#0369a1">For your security, choose a strong password with at least 8 characters including uppercase, lowercase, numbers, and symbols.</div>
            </div>
            <div class="row g-3">
              <div class="col-12">
                <label class="form-label fw-medium" style="font-size:12px">Current Password *</label>
                <div class="input-group input-group-sm">
                  <input type="password" class="form-control form-control-sm" id="adminCurrentPass" placeholder="Enter your current password">
                  <button class="btn btn-outline-secondary" type="button" onclick="adminTogglePass('adminCurrentPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium" style="font-size:12px">New Password *</label>
                <div class="input-group input-group-sm">
                  <input type="password" class="form-control form-control-sm" id="adminNewPass" placeholder="Enter new password" oninput="adminCheckStrength(this.value)">
                  <button class="btn btn-outline-secondary" type="button" onclick="adminTogglePass('adminNewPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                </div>
                <div class="mt-2">
                  <div class="progress" style="height:5px;border-radius:4px">
                    <div id="adminStrengthBar" class="progress-bar" style="width:0%;transition:width .3s,background .3s"></div>
                  </div>
                  <div id="adminStrengthLabel" class="text-muted mt-1" style="font-size:11px"></div>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-medium" style="font-size:12px">Confirm New Password *</label>
                <div class="input-group input-group-sm">
                  <input type="password" class="form-control form-control-sm" id="adminConfirmPass" placeholder="Re-enter new password" oninput="adminCheckMatch()">
                  <button class="btn btn-outline-secondary" type="button" onclick="adminTogglePass('adminConfirmPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                </div>
                <div id="adminMatchMsg" class="mt-1" style="font-size:11px"></div>
              </div>
              <div class="col-12 pt-1">
                <button class="btn btn-sm fw-semibold px-4" style="background:#1a2a5e;color:#fff;font-size:13px">
                  <i class="bi bi-shield-check me-1"></i>Update Password
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>


      <!-- Hidden file input for admin photo -->
      <input type="file" id="adminPicInput" accept="image/*" class="d-none" onchange="handleAdminPicChange(this)">

    </div><!-- /admin-content -->
  </div><!-- /main-area -->
</div><!-- /page-wrapper -->



<!-- ===== ADMIN PROFILE PHOTO MODALS ===== -->
<!-- Photo Action Modal -->
<div class="modal fade" id="adminPhotoActionModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:360px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <div style="background:#1a2a5e;padding:20px 24px 16px">
        <div class="d-flex align-items-center gap-3">
          <div id="adminModalThumb" style="width:46px;height:46px;border-radius:50%;background:rgba(255,255,255,.18);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:15px;flex-shrink:0;overflow:hidden">AD</div>
          <div>
            <div class="fw-bold text-white" style="font-size:14px;line-height:1.2">Admin User</div>
            <div style="font-size:11px;color:rgba(255,255,255,.6)">Profile Photo</div>
          </div>
        </div>
      </div>
      <div class="p-4">
        <div class="d-flex flex-column gap-2">
          <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#f1f5f9;font-size:13.5px;border:none" onclick="adminViewFullPhoto()">
            <span style="width:36px;height:36px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <i class="bi bi-eye-fill" style="color:#1d4ed8;font-size:15px"></i>
            </span>
            <div>
              <div style="color:#1e293b">View Profile Photo</div>
              <div class="fw-normal text-muted" style="font-size:11px">See your current photo in full size</div>
            </div>
          </button>
          <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#f1f5f9;font-size:13.5px;border:none" onclick="document.getElementById('adminPicInput').click()">
            <span style="width:36px;height:36px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <i class="bi bi-cloud-arrow-up-fill" style="color:#16a34a;font-size:15px"></i>
            </span>
            <div>
              <div style="color:#1e293b">Change Photo</div>
              <div class="fw-normal text-muted" style="font-size:11px">Upload a new JPG, PNG, or GIF (max 2 MB)</div>
            </div>
          </button>
          <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#fff5f5;font-size:13.5px;border:none" onclick="adminRemovePhoto()">
            <span style="width:36px;height:36px;border-radius:10px;background:#fee2e2;display:flex;align-items:center;justify-content:center;flex-shrink:0">
              <i class="bi bi-trash-fill" style="color:#dc2626;font-size:15px"></i>
            </span>
            <div>
              <div style="color:#dc2626">Remove Photo</div>
              <div class="fw-normal text-muted" style="font-size:11px">Revert to default initials avatar</div>
            </div>
          </button>
        </div>
        <button class="btn btn-sm w-100 mt-3 fw-semibold" style="background:#f1f5f9;color:#64748b;font-size:13px;border:none" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- View Full Photo Modal -->
<div class="modal fade" id="adminPhotoViewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:400px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden;background:#0f172a">
      <div class="d-flex justify-content-between align-items-center px-4 py-3">
        <span class="fw-semibold text-white" style="font-size:14px">Profile Photo</span>
        <button class="btn-close btn-close-white btn-sm" data-bs-dismiss="modal"></button>
      </div>
      <div class="d-flex align-items-center justify-content-center p-4" style="min-height:300px">
        <div id="adminFullPhotoView" style="width:180px;height:180px;border-radius:50%;background:#1a2a5e;color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:52px;overflow:hidden">AD</div>
      </div>
      <div class="px-4 pb-4 text-center">
        <div class="fw-semibold text-white" style="font-size:15px">Admin User</div>
        <div style="font-size:12px;color:rgba(255,255,255,.5)">Grade 7 Administrator</div>
      </div>
    </div>
  </div>
</div>

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
$isFromApp  = isset($_GET['app_id']);
$closeHref  = $isFromApp ? '?tab=applications' : '?tab=students';
$profiles  = [
  'APP001'=>[
    'sy'=>'2025–2026','grade'=>'Grade 10','lrn'=>'202600100001',
    'lname'=>'Johnson','fname'=>'Emma','mname'=>'Grace','extname'=>'',
    'dob'=>'March 1, 2010','age'=>16,'sex'=>'Female','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'12 Rizal St.','brgy'=>'Brgy. Concepcion','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Johnson','father_fname'=>'Robert','father_mname'=>'James','fcontact'=>'09171234567',
    'mother_lname'=>'Johnson','mother_fname'=>'Mary','mother_mname'=>'Anne','mcontact'=>'09181234567',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_emma_johnson.jpg',    'type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_emma_johnson.jpg','type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_emma_johnson.pdf','type'=>'pdf','status'=>'submitted','uploaded'=>'March 18, 2026'],
    ]
  ],
  'APP002'=>[
    'sy'=>'2025–2026','grade'=>'Grade 9','lrn'=>'202600100002',
    'lname'=>'Chen','fname'=>'Michael','mname'=>'Tan','extname'=>'',
    'dob'=>'June 14, 2011','age'=>15,'sex'=>'Male','pob'=>'Minalabac','tongue'=>'Tagalog','ip'=>'No','fours'=>'Yes',
    'house'=>'45 Magsaysay Ave.','brgy'=>'Brgy. Centro','city'=>'Minalabac','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4421',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Chen','father_fname'=>'James','father_mname'=>'Wei','fcontact'=>'09271234567',
    'mother_lname'=>'Chen','mother_fname'=>'Li','mother_mname'=>'Hua','mcontact'=>'09291234567',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_michael_chen.jpg',    'type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'',                        'type'=>'image','status'=>'missing',  'uploaded'=>''],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_michael_chen.jpg','type'=>'image','status'=>'submitted','uploaded'=>'March 18, 2026'],
    ]
  ],
  'APP005'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','lrn'=>'202600700005',
    'lname'=>'Davis','fname'=>'Lisa','mname'=>'Marie','extname'=>'',
    'dob'=>'March 16, 2013','age'=>12,'sex'=>'Female','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'Blk 3 Lot 5 Sampaguita St.','brgy'=>'Brgy. Sta. Cruz','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Davis','father_fname'=>'James','father_mname'=>'Robert','fcontact'=>'09171234567',
    'mother_lname'=>'Davis','mother_fname'=>'Susan','mother_mname'=>'Marie','mcontact'=>'09181234567',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_lisa_davis.jpg',      'type'=>'image','status'=>'submitted','uploaded'=>'March 16, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_lisa_davis.jpg',  'type'=>'image','status'=>'submitted','uploaded'=>'March 16, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_lisa_davis.pdf','type'=>'pdf',  'status'=>'submitted','uploaded'=>'March 16, 2026'],
    ]
  ],
  'APP006'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','lrn'=>'202600700006',
    'lname'=>'Reyes','fname'=>'Carlos','mname'=>'Miguel','extname'=>'Jr.',
    'dob'=>'March 15, 2013','age'=>12,'sex'=>'Male','pob'=>'Minalabac','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'Purok 2, Dahlia St.','brgy'=>'Brgy. Sabang','city'=>'Minalabac','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4421',
    'perm_same'=>false,'perm_house'=>'123 Magsaysay Ave.','perm_brgy'=>'Brgy. Centro','perm_city'=>'Minalabac','perm_province'=>'Camarines Sur','perm_country'=>'Philippines','perm_zip'=>'4421',
    'father_lname'=>'Reyes','father_fname'=>'Ricardo','father_mname'=>'Santos','fcontact'=>'09271234567',
    'mother_lname'=>'Reyes','mother_fname'=>'Ana','mother_mname'=>'Cruz','mcontact'=>'09281234567',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>false,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_carlos_reyes.jpg',       'type'=>'image','status'=>'submitted','uploaded'=>'March 15, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_carlos_reyes.jpg',   'type'=>'image','status'=>'submitted','uploaded'=>'March 15, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_carlos_reyes.pdf', 'type'=>'pdf',  'status'=>'submitted','uploaded'=>'March 15, 2026'],
    ]
  ],
  'STU2026701'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','section'=>'Section A','stuid'=>'STU2026701','lrn'=>'202600700101',
    'lname'=>'Flores','fname'=>'Ana','mname'=>'Marie','extname'=>'',
    'dob'=>'Jan 12, 2013','age'=>13,'sex'=>'Female','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'18 Sampaguita St.','brgy'=>'Brgy. Concepcion','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Flores','father_fname'=>'Roberto','father_mname'=>'Cruz','fcontact'=>'09171110001',
    'mother_lname'=>'Flores','mother_fname'=>'Lina','mother_mname'=>'Santos','mcontact'=>'09181110001',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_ana_flores.jpg',       'type'=>'image','status'=>'verified','uploaded'=>'March 10, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_ana_flores.jpg',   'type'=>'image','status'=>'verified','uploaded'=>'March 10, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_ana_flores.pdf', 'type'=>'pdf',  'status'=>'verified','uploaded'=>'March 10, 2026'],
    ]
  ],
  'STU2026702'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','section'=>'Section A','stuid'=>'STU2026702','lrn'=>'202600700102',
    'lname'=>'Reyes','fname'=>'Marco','mname'=>'Luis','extname'=>'',
    'dob'=>'Mar 5, 2013','age'=>13,'sex'=>'Male','pob'=>'Minalabac','tongue'=>'Bikol','ip'=>'No','fours'=>'Yes',
    'house'=>'Purok 3, Rosal St.','brgy'=>'Brgy. Sabang','city'=>'Minalabac','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4421',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Reyes','father_fname'=>'Jose','father_mname'=>'Luis','fcontact'=>'09271110002',
    'mother_lname'=>'Reyes','mother_fname'=>'Clara','mother_mname'=>'Bautista','mcontact'=>'09281110002',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_marco_reyes.jpg',       'type'=>'image','status'=>'verified','uploaded'=>'March 11, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_marco_reyes.jpg',   'type'=>'image','status'=>'verified','uploaded'=>'March 11, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_marco_reyes.pdf', 'type'=>'pdf',  'status'=>'verified','uploaded'=>'March 11, 2026'],
    ]
  ],
  'STU2026703'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','section'=>'Section B','stuid'=>'STU2026703','lrn'=>'202600700103',
    'lname'=>'Santos','fname'=>'Sofia','mname'=>'Grace','extname'=>'',
    'dob'=>'May 20, 2013','age'=>12,'sex'=>'Female','pob'=>'Camaligan','tongue'=>'Tagalog','ip'=>'No','fours'=>'No',
    'house'=>'45 Orchid Lane','brgy'=>'Brgy. Tinalmud','city'=>'Camaligan','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4404',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Santos','father_fname'=>'Pedro','father_mname'=>'Dela Cruz','fcontact'=>'09171110003',
    'mother_lname'=>'Santos','mother_fname'=>'Maria','mother_mname'=>'Garcia','mcontact'=>'09181110003',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_sofia_santos.jpg',       'type'=>'image','status'=>'verified','uploaded'=>'March 12, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_sofia_santos.jpg',   'type'=>'image','status'=>'verified','uploaded'=>'March 12, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_sofia_santos.pdf', 'type'=>'pdf',  'status'=>'verified','uploaded'=>'March 12, 2026'],
    ]
  ],
  'STU2026704'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','section'=>'Section B','stuid'=>'STU2026704','lrn'=>'202600700104',
    'lname'=>'Bautista','fname'=>'Liam','mname'=>'Carlos','extname'=>'',
    'dob'=>'Aug 8, 2013','age'=>12,'sex'=>'Male','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'7 Peñafrancia Ave.','brgy'=>'Brgy. Peñafrancia','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Bautista','father_fname'=>'Carlos','father_mname'=>'Miguel','fcontact'=>'09271110004',
    'mother_lname'=>'Bautista','mother_fname'=>'Rosa','mother_mname'=>'Lopez','mcontact'=>'09281110004',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_liam_bautista.jpg',       'type'=>'image','status'=>'verified','uploaded'=>'March 13, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_liam_bautista.jpg',   'type'=>'image','status'=>'verified','uploaded'=>'March 13, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_liam_bautista.pdf', 'type'=>'pdf',  'status'=>'verified','uploaded'=>'March 13, 2026'],
    ]
  ],
  'STU2026705'=>[
    'sy'=>'2025–2026','grade'=>'Grade 7','section'=>'Section A','stuid'=>'STU2026705','lrn'=>'202600700105',
    'lname'=>'Cruz','fname'=>'Elena','mname'=>'Joy','extname'=>'',
    'dob'=>'Nov 30, 2012','age'=>13,'sex'=>'Female','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'Yes',
    'house'=>'22 Triangulo Rd.','brgy'=>'Brgy. Triangulo','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Cruz','father_fname'=>'Diego','father_mname'=>'Reyes','fcontact'=>'09171110005',
    'mother_lname'=>'Cruz','mother_fname'=>'Luz','mother_mname'=>'Villanueva','mcontact'=>'09181110005',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_elena_cruz.jpg',       'type'=>'image','status'=>'verified','uploaded'=>'March 14, 2026'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_elena_cruz.jpg',   'type'=>'image','status'=>'verified','uploaded'=>'March 14, 2026'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_elena_cruz.pdf', 'type'=>'pdf',  'status'=>'verified','uploaded'=>'March 14, 2026'],
    ]
  ],
  'STU2024001'=>[
    'sy'=>'2025–2026','grade'=>'Grade 10','section'=>'Section A','stuid'=>'STU2024001','lrn'=>'202400100001',
    'lname'=>'Smith','fname'=>'John','mname'=>'Paul','extname'=>'',
    'dob'=>'Feb 10, 2009','age'=>17,'sex'=>'Male','pob'=>'Naga City','tongue'=>'Bikol','ip'=>'No','fours'=>'No',
    'house'=>'55 P. Burgos St.','brgy'=>'Brgy. Triangulo','city'=>'Naga City','province'=>'Camarines Sur','country'=>'Philippines','zip'=>'4400',
    'perm_same'=>true,'perm_house'=>'','perm_brgy'=>'','perm_city'=>'','perm_province'=>'','perm_country'=>'','perm_zip'=>'',
    'father_lname'=>'Smith','father_fname'=>'Henry','father_mname'=>'Thomas','fcontact'=>'09111234567',
    'mother_lname'=>'Smith','mother_fname'=>'Grace','mother_mname'=>'Dela Rosa','mcontact'=>'09121234567',
    'guardian_lname'=>'','guardian_fname'=>'','guardian_mname'=>'','gcontact'=>'',
    'returning'=>'No','enrolled'=>true,
    'docs'=>[
      ['label'=>'PSA Birth Certificate',  'file'=>'psa_john_smith.jpg',      'type'=>'image','status'=>'verified','uploaded'=>'Jan 10, 2024'],
      ['label'=>'Form 138 (Report Card)', 'file'=>'form138_john_smith.jpg',  'type'=>'image','status'=>'verified','uploaded'=>'Jan 10, 2024'],
      ['label'=>'Good Moral Certificate', 'file'=>'goodmoral_john_smith.jpg','type'=>'image','status'=>'verified','uploaded'=>'Jan 10, 2024'],
    ]
  ],
];
$p = $profiles[$profileId] ?? null;
?>
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <?php if($p): ?>
      <div style="background:linear-gradient(135deg,#1a2a5e 0%,#111d42 100%);padding:28px 28px 20px;position:relative">
        <a href="<?= $closeHref ?>" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
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
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.04)">
            <!-- Section Header -->
            <div style="padding:13px 18px;background:#f8fafc;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:10px">
              <div style="width:30px;height:30px;border-radius:8px;background:#1a2a5e;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff;flex-shrink:0">
                <i class="bi bi-person-fill"></i>
              </div>
              <span style="font-size:13px;font-weight:700;color:#1e293b;letter-spacing:.01em">Learner Information</span>
              <span style="font-size:10.5px;color:#94a3b8;margin-left:4px">— as per PSA Birth Certificate</span>
            </div>

            <div style="padding:20px 18px;display:flex;flex-direction:column;gap:14px">

              <!-- Name Row: First / Middle / Last / Extension -->
              <div style="display:grid;grid-template-columns:1fr 1fr 1fr auto;gap:10px;align-items:start">
                <div style="background:#f0f4ff;border:1px solid #c7d7fc;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#6b7ea3;margin-bottom:4px">First Name</div>
                  <div style="font-size:14px;font-weight:800;color:#1e293b"><?= htmlspecialchars($p['fname']) ?></div>
                </div>
                <div style="background:#f0f4ff;border:1px solid #c7d7fc;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#6b7ea3;margin-bottom:4px">Middle Name</div>
                  <div style="font-size:14px;font-weight:800;color:#1e293b"><?= htmlspecialchars($p['mname'] ?: '—') ?></div>
                </div>
                <div style="background:#f0f4ff;border:1px solid #c7d7fc;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#6b7ea3;margin-bottom:4px">Last Name</div>
                  <div style="font-size:14px;font-weight:800;color:#1e293b"><?= htmlspecialchars($p['lname']) ?></div>
                </div>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px;min-width:72px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">Ext.</div>
                  <div style="font-size:14px;font-weight:700;color:#1e293b"><?= htmlspecialchars($p['extname'] ?: '—') ?></div>
                </div>
              </div>

              <!-- Row: LRN + DOB + Age -->
              <div style="display:grid;grid-template-columns:1fr 1fr 72px;gap:10px">
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">LRN</div>
                  <div style="font-size:13px;font-weight:700;color:#1e293b;font-family:monospace;letter-spacing:.03em"><?= $p['lrn'] ?></div>
                </div>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">Date of Birth</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b"><?= $p['dob'] ?></div>
                </div>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px;text-align:center">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">Age</div>
                  <div style="font-size:17px;font-weight:800;color:#1a2a5e"><?= $p['age'] ?></div>
                </div>
              </div>

              <!-- Row: Sex + Mother Tongue + Place of Birth -->
              <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px">
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:6px">Sex</div>
                  <?php
                  $sexIcon  = $p['sex'] === 'Male' ? 'bi-gender-male' : 'bi-gender-female';
                  $sexColor = $p['sex'] === 'Male' ? '#2563eb' : '#db2777';
                  $sexBg    = $p['sex'] === 'Male' ? '#f0f4ff' : '#fdf2f8';
                  ?>
                  <span style="display:inline-flex;align-items:center;gap:5px;background:<?= $sexBg ?>;color:<?= $sexColor ?>;font-size:12px;font-weight:700;padding:4px 12px;border-radius:20px">
                    <i class="bi <?= $sexIcon ?>"></i><?= $p['sex'] ?>
                  </span>
                </div>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">Mother Tongue</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b"><?= $p['tongue'] ?></div>
                </div>
                <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:11px 14px">
                  <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:4px">Place of Birth</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($p['pob']) ?></div>
                </div>
              </div>

              <!-- Row: IP + 4Ps + Returning Learner -->
              <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px">
                <?php
                $makeFlag = function($val, $label) {
                  $isYes = strtolower($val) === 'yes';
                  $bg    = $isYes ? '#f0fdf4' : '#f8fafc';
                  $bc    = $isYes ? '#bbf7d0' : '#e2e8f0';
                  $color = $isYes ? '#166534' : '#64748b';
                  $icon  = $isYes ? 'bi-check-circle-fill' : 'bi-dash-circle';
                  echo '<div style="background:'.$bg.';border:1px solid '.$bc.';border-radius:10px;padding:11px 14px">';
                  echo   '<div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:6px">'.$label.'</div>';
                  echo   '<span style="display:inline-flex;align-items:center;gap:5px;color:'.$color.';font-size:12px;font-weight:700"><i class="bi '.$icon.'"></i>'.$val.'</span>';
                  echo '</div>';
                };
                $makeFlag($p['ip'],       'IP Community');
                $makeFlag($p['fours'],    '4Ps Beneficiary');
                $makeFlag($p['returning']??'No', 'Returning Learner');
                ?>
              </div>

            </div>
          </div>

          <!-- Current Address -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.04)">
            <div style="padding:13px 18px;background:#f8fafc;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:10px">
              <div style="width:30px;height:30px;border-radius:8px;background:#111d42;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff;flex-shrink:0">
                <i class="bi bi-geo-alt-fill"></i>
              </div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Current Address</span>
            </div>
            <div style="padding:18px;display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px">
              <?php
              $addrField = function($label, $val) {
                echo '<div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:10px 13px">';
                echo   '<div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8;margin-bottom:3px">'.$label.'</div>';
                echo   '<div style="font-size:13px;font-weight:600;color:#1e293b">'.htmlspecialchars($val ?: '—').'</div>';
                echo '</div>';
              };
              $addrField('House No. / Street', $p['house']);
              $addrField('Barangay',           $p['brgy']);
              $addrField('Municipality / City',$p['city']);
              $addrField('Province',           $p['province']);
              $addrField('Country',            $p['country']);
              $addrField('Zip Code',           $p['zip']);
              ?>
            </div>
          </div>

          <!-- Permanent Address -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.04)">
            <div style="padding:13px 18px;background:#f8fafc;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between;gap:10px">
              <div style="display:flex;align-items:center;gap:10px">
                <div style="width:30px;height:30px;border-radius:8px;background:#111d42;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff;flex-shrink:0">
                  <i class="bi bi-house-fill"></i>
                </div>
                <span style="font-size:13px;font-weight:700;color:#1e293b">Permanent Address</span>
              </div>
              <?php if($p['perm_same']): ?>
              <span style="background:#f0f4ff;color:#2563eb;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;border:1px solid #bfdbfe">
                <i class="bi bi-check2 me-1"></i>Same as Current
              </span>
              <?php endif; ?>
            </div>
            <?php if($p['perm_same']): ?>
            <div style="padding:14px 18px;font-size:13px;color:#64748b;font-style:italic">
              <i class="bi bi-arrow-up-right me-1"></i>Permanent address is the same as current address.
            </div>
            <?php else: ?>
            <div style="padding:18px;display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px">
              <?php
              $addrField('House No. / Street', $p['perm_house']);
              $addrField('Barangay',           $p['perm_brgy']);
              $addrField('Municipality / City',$p['perm_city']);
              $addrField('Province',           $p['perm_province']);
              $addrField('Country',            $p['perm_country']);
              $addrField('Zip Code',           $p['perm_zip']);
              ?>
            </div>
            <?php endif; ?>
          </div>
          <!-- Parents / Guardian -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 1px 4px rgba(0,0,0,.04)">
            <div style="padding:13px 18px;background:#f8fafc;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:10px">
              <div style="width:30px;height:30px;border-radius:8px;background:#d97706;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff;flex-shrink:0"><i class="bi bi-people-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Parent / Guardian Information</span>
            </div>
            <div style="padding:16px 18px;display:flex;flex-direction:column;gap:12px">
              <?php
              $guardians = [
                [
                  'role'=>'Father',
                  'lname'=>$p['father_lname'],'fname'=>$p['father_fname'],'mname'=>$p['father_mname'],
                  'contact'=>$p['fcontact'],
                  'bg'=>'#dbeafe','color'=>'#1e40af','icon'=>'bi-person'
                ],
                [
                  'role'=>'Mother',
                  'lname'=>$p['mother_lname'],'fname'=>$p['mother_fname'],'mname'=>$p['mother_mname'],
                  'contact'=>$p['mcontact'],
                  'bg'=>'#fce7f3','color'=>'#be185d','icon'=>'bi-person'
                ],
                [
                  'role'=>'Guardian',
                  'lname'=>$p['guardian_lname']??'','fname'=>$p['guardian_fname']??'','mname'=>$p['guardian_mname']??'',
                  'contact'=>$p['gcontact']??'',
                  'bg'=>'#dcfce7','color'=>'#166534','icon'=>'bi-person-check'
                ],
              ];
              foreach($guardians as $g):
                $hasData = !empty($g['lname']) || !empty($g['fname']);
              ?>
              <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
                <!-- Role header bar -->
                <div style="padding:8px 14px;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
                  <div style="width:26px;height:26px;border-radius:50%;background:<?= $g['bg'] ?>;display:flex;align-items:center;justify-content:center;font-size:12px;color:<?= $g['color'] ?>">
                    <i class="bi <?= $g['icon'] ?>"></i>
                  </div>
                  <span style="font-size:11px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:<?= $g['color'] ?>"><?= $g['role'] ?></span>
                  <?php if(!$hasData && $g['role']==='Guardian'): ?>
                  <span style="font-size:10.5px;color:#94a3b8;margin-left:4px">(not applicable)</span>
                  <?php endif; ?>
                </div>
                <?php if($hasData || $g['role'] !== 'Guardian'): ?>
                <div style="padding:12px 14px;display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:10px">
                  <div>
                    <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">First Name</div>
                    <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($g['fname'] ?: '—') ?></div>
                  </div>
                  <div>
                    <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Middle Name</div>
                    <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($g['mname'] ?: '—') ?></div>
                  </div>
                  <div>
                    <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Last Name</div>
                    <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($g['lname'] ?: '—') ?></div>
                  </div>
                  <div>
                    <div style="font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Contact No.</div>
                    <div style="font-size:13px;font-weight:600;color:#1e293b"><?= htmlspecialchars($g['contact'] ?: '—') ?></div>
                  </div>
                </div>
                <?php else: ?>
                <div style="padding:12px 14px;font-size:12.5px;color:#94a3b8;font-style:italic">No guardian information provided.</div>
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Submitted Documents -->
          <?php if(!empty($p['docs'])): ?>
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;justify-content:space-between;gap:8px">
              <div style="display:flex;align-items:center;gap:8px">
                <div style="width:28px;height:28px;border-radius:8px;background:#1a2a5e;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-folder2-open"></i></div>
                <span style="font-size:13px;font-weight:700;color:#1e293b">Submitted Requirements</span>
              </div>
              <?php
                $missingCount = count(array_filter($p['docs'], fn($d) => $d['status'] === 'missing'));
              ?>
              <?php if($p['enrolled']): ?>
              <span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;border:1px solid #bbf7d0">
                <i class="bi bi-patch-check-fill me-1"></i>All Verified
              </span>
              <?php elseif($missingCount > 0): ?>
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
                    <div style="width:30px;height:30px;border-radius:8px;background:<?= $doc['status']==='missing' ? '#fef2f2' : ($doc['status']==='verified' ? '#f0fdf4' : '#f0f4ff') ?>;display:flex;align-items:center;justify-content:center;font-size:14px;color:<?= $doc['status']==='missing' ? '#dc2626' : ($doc['status']==='verified' ? '#16a34a' : '#2563eb') ?>">
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
                  <?php elseif($doc['status'] === 'verified' || $p['enrolled']): ?>
                  <span style="background:#f0fdf4;color:#166534;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;display:inline-flex;align-items:center;gap:4px">
                    <i class="bi bi-patch-check-fill"></i>Verified
                  </span>
                  <?php else: ?>
                  <div style="display:flex;align-items:center;gap:6px">
                    <button onclick="verifyDoc(this,<?= $di ?>)" style="background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;cursor:pointer">
                      <i class="bi bi-check-circle me-1"></i>Mark Verified
                    </button>
                    <button onclick="retakeDoc(this,<?= $di ?>)" style="background:#fef2f2;color:#991b1b;border:1px solid #d1ae64;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;cursor:pointer">
                      <i class="bi bi-x-circle me-1"></i>Request Resubmission
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
                    <div style="display:none;flex-direction:column;align-items:center;justify-content:center;padding:28px 16px;gap:8px;background:repeating-linear-gradient(45deg,#f8fafc,#f8fafc 10px,#f1f5f9 10px,#f1f5f9 20px)">
                      <div style="width:56px;height:56px;border-radius:12px;background:#e2e8f0;display:flex;align-items:center;justify-content:center;position:relative">
                        <i class="bi bi-file-earmark-image" style="font-size:26px;color:#94a3b8"></i>
                        <div style="position:absolute;bottom:-4px;right:-4px;width:18px;height:18px;border-radius:50%;background:#ef4444;display:flex;align-items:center;justify-content:center">
                          <i class="bi bi-exclamation" style="font-size:11px;color:#fff;font-weight:800"></i>
                        </div>
                      </div>
                      <div style="font-size:12px;font-weight:600;color:#64748b">Unable to load image</div>
                      <div style="font-size:11px;color:#94a3b8;font-family:monospace"><?= htmlspecialchars($doc['file']) ?></div>
                    </div>
                    <div style="position:absolute;top:8px;right:8px;background:rgba(0,0,0,.5);color:#fff;font-size:10px;padding:3px 8px;border-radius:20px">
                      <i class="bi bi-arrows-fullscreen me-1"></i>Click to expand
                    </div>
                  </div>
                </div>
                <?php elseif($doc['status'] !== 'missing' && $doc['type'] === 'pdf'): ?>
                <div style="padding:12px 14px;background:#f8fafc">
                  <a href="/uploads/requirements/<?= htmlspecialchars($doc['file']) ?>" target="_blank"
                     style="display:inline-flex;align-items:center;gap:6px;background:#f0f4ff;color:#1e40af;border:1px solid #bfdbfe;font-size:12px;font-weight:600;padding:6px 14px;border-radius:8px;text-decoration:none">
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
      function retakeDoc(btn, idx) {
        var wrap = btn.closest('div[style*="display:flex"]');
        wrap.innerHTML = '<span style="background:#fef2f2;color:#991b1b;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px"><i class="bi bi-x-circle-fill me-1"></i>Resubmit Required</span>';
        btn.closest('[style*="border:1px solid"]').style.borderColor = '#fecaca';
        showToast('This document requires resubmission.');
      }
      </script>

      <div class="modal-footer border-0" style="background:#f8fafc;padding:14px 24px">
        <?php if(!$p['enrolled']): ?>
        <?php endif; ?>
        <a href="<?= $closeHref ?>" class="btn btn-light btn-sm border px-4 fw-medium"><i class="bi bi-x me-1"></i>Close</a>
      </div>
      <?php else: ?>
      <div class="modal-body text-center py-5">
        <i class="bi bi-person-x" style="font-size:40px;color:#94a3b8"></i>
        <div class="mt-2 text-muted">Profile not found.</div>
      </div>
      <div class="modal-footer border-0">
        <a href="<?= $closeHref ?>" class="btn btn-outline-secondary btn-sm">Close</a>
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
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Grade Level *</label><select class="form-select" disabled><option selected>Grade 7</option></select></div>
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

        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--navy);padding-left:10px">Account Credentials</div>
        <div class="d-flex align-items-start gap-2 rounded-2 p-3 mb-3" style="background:#fffbeb;border:1px solid #fde68a">
          <i class="bi bi-key-fill mt-1" style="color:#d97706;font-size:14px;flex-shrink:0"></i>
          <div style="font-size:12.5px;color:#92400e">A temporary password will be assigned so the student can log in immediately. They should change it upon first login.</div>
        </div>
        <div class="row g-3 mb-3">
          <!-- Single column: LRN + Temp Pass + Confirm stacked -->
          <div class="col-12">
            <label class="form-label fw-medium" style="font-size:13px">Learner Reference Number (LRN) *</label>
            <input type="text" class="form-control" id="asLRN" placeholder="e.g., 123456789012" maxlength="12">
            <div style="font-size:11px;color:#94a3b8;margin-top:4px"><i class="bi bi-info-circle me-1"></i>12-digit LRN assigned by DepEd</div>
          </div>
          <div class="col-12 d-flex flex-column gap-3">
            <div>
              <label class="form-label fw-medium" style="font-size:13px">Temporary Password *</label>
              <div class="input-group">
                <input type="password" class="form-control" id="asTempPass" placeholder="Enter temporary password" oninput="asTempCheckStrength(this.value)">
                <button class="btn btn-outline-secondary" type="button" onclick="asTogglePass('asTempPass', this)" title="Show/Hide"><i class="bi bi-eye"></i></button>
                <button class="btn btn-outline-secondary" type="button" onclick="asGeneratePass()" title="Auto-generate password"><i class="bi bi-magic"></i></button>
              </div>
              <div class="mt-2">
                <div class="progress" style="height:5px;border-radius:4px">
                  <div id="asStrengthBar" class="progress-bar" style="width:0%;transition:width .3s,background .3s"></div>
                </div>
                <div id="asStrengthLabel" style="font-size:11px;margin-top:4px;color:#64748b"></div>
              </div>
            </div>
            <div>
              <label class="form-label fw-medium" style="font-size:13px">Confirm Password *</label>
              <div class="input-group">
                <input type="password" class="form-control" id="asTempPassConfirm" placeholder="Re-enter password" oninput="asTempCheckMatch()">
                <button class="btn btn-outline-secondary" type="button" onclick="asTogglePass('asTempPassConfirm', this)" title="Show/Hide"><i class="bi bi-eye"></i></button>
              </div>
              <div id="asMatchMsg" style="font-size:11.5px;margin-top:6px"></div>
            </div>
            <div id="asGeneratedPassBox" style="display:none;background:#f0f9ff;border:1px solid #bae6fd;border-radius:8px;padding:8px 12px" class="d-flex align-items-center gap-2">
              <i class="bi bi-shield-lock" style="color:#0284c7;font-size:13px"></i>
              <span style="font-size:12.5px;color:#0369a1">Generated:</span>
              <code id="asGeneratedPassVal" style="font-size:13px;font-weight:700;color:#1e293b;letter-spacing:.05em"></code>
              <button onclick="asCopyPass()" class="btn btn-sm ms-auto" style="font-size:11px;padding:2px 10px;background:#e0f2fe;color:#0369a1;border:none;border-radius:12px">
                <i class="bi bi-clipboard me-1"></i>Copy
              </button>
              <div id="asCopiedBadge" style="display:none;font-size:11px;font-weight:700;padding:3px 9px;background:#f0fdf4;color:#166534;border:1px solid #bbf7d0;border-radius:20px">
                <i class="bi bi-clipboard-check me-1"></i>Copied!
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="/admin" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-navy btn-sm fw-semibold" onclick="showToast('Student enrolled successfully!');setTimeout(()=>window.location='/admin',1600)">
          <i class="bi bi-person-check me-1"></i>Enroll Student
        </button>
      </div>

<script>
function asTogglePass(inputId, btn) {
  var inp = document.getElementById(inputId);
  var icon = btn.querySelector('i');
  if (inp.type === 'password') { inp.type = 'text'; icon.className = 'bi bi-eye-slash'; }
  else { inp.type = 'password'; icon.className = 'bi bi-eye'; }
}

function asTempCheckStrength(val) {
  var bar = document.getElementById('asStrengthBar');
  var lbl = document.getElementById('asStrengthLabel');
  if (!val) { bar.style.width = '0%'; lbl.textContent = ''; return; }
  var score = 0;
  if (val.length >= 8) score++;
  if (/[A-Z]/.test(val)) score++;
  if (/[0-9]/.test(val)) score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;
  var levels = [
    {w:'20%',bg:'#ef4444',label:'Weak'},
    {w:'45%',bg:'#f97316',label:'Fair'},
    {w:'70%',bg:'#eab308',label:'Good'},
    {w:'100%',bg:'#22c55e',label:'Strong'},
  ];
  var lvl = levels[Math.max(0, score - 1)];
  bar.style.width = lvl.w; bar.style.background = lvl.bg;
  lbl.textContent = 'Strength: ' + lvl.label; lbl.style.color = lvl.bg;
  asTempCheckMatch();
}

function asTempCheckMatch() {
  var np = document.getElementById('asTempPass');
  var cp = document.getElementById('asTempPassConfirm');
  var msg = document.getElementById('asMatchMsg');
  if (!cp || !cp.value) { msg.textContent = ''; return; }
  if (np.value === cp.value) {
    msg.innerHTML = '<i class="bi bi-check-circle-fill me-1" style="color:#22c55e"></i><span style="color:#16a34a">Passwords match</span>';
  } else {
    msg.innerHTML = '<i class="bi bi-x-circle-fill me-1" style="color:#ef4444"></i><span style="color:#dc2626">Passwords do not match</span>';
  }
}

function asGeneratePass() {
  var chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789@#$!';
  var pass = '';
  for (var i = 0; i < 10; i++) pass += chars.charAt(Math.floor(Math.random() * chars.length));
  // ensure at least one uppercase, digit, special
  pass = pass.slice(0,7) + 'A3!';
  document.getElementById('asTempPass').value = pass;
  document.getElementById('asTempPass').type = 'text';
  document.getElementById('asTempPassConfirm').value = pass;
  asTempCheckStrength(pass);
  asTempCheckMatch();
  var box = document.getElementById('asGeneratedPassBox');
  box.style.display = 'flex';
  box.style.background = '#f0f9ff';
  box.style.border = '1px solid #bae6fd';
  document.getElementById('asGeneratedPassVal').textContent = pass;
}

function asCopyPass() {
  var val = document.getElementById('asGeneratedPassVal').textContent;
  navigator.clipboard.writeText(val).then(function() {
    var badge = document.getElementById('asCopiedBadge');
    badge.style.display = 'inline-flex';
    setTimeout(function() { badge.style.display = 'none'; }, 2000);
  });
}
</script>
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
      <div style="background:linear-gradient(135deg,#1a2a5e,#111d42);padding:22px 28px 18px;position:relative">
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
          <select class="form-select" disabled><option selected>Grade 7</option></select>
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
      <div style="background:linear-gradient(135deg,#1a2a5e,#111d42);padding:24px 28px 20px;position:relative">
        <a href="/admin" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Auto Create Sections</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)">Select a level to auto-distribute students into sections</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4" style="background:#f8fafc;max-height:70vh;overflow-y:auto">

        <!-- Pre-Elementary -->
        <div class="mb-1" style="font-size:10.5px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#1a2a5e;padding:4px 8px;background:#fffbea;border-radius:6px;display:inline-block">
          <i class="bi bi-stars me-1"></i>Pre-Elementary
        </div>
        <div class="row g-2 mb-3 mt-1">
          <?php
          $csGrades = [
            // Pre-Elementary
            ['id'=>'nursery','label'=>'Nursery',  'count'=>22,'bg'=>'#fffbea','color'=>'#1a2a5e','group'=>'pre'],
            ['id'=>'kinder', 'label'=>'Kinder',   'count'=>28,'bg'=>'#fffbea','color'=>'#1a2a5e','group'=>'pre'],
            // Elementary
            ['id'=>'g1','label'=>'Grade 1','count'=>45,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            ['id'=>'g2','label'=>'Grade 2','count'=>42,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            ['id'=>'g3','label'=>'Grade 3','count'=>48,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            ['id'=>'g4','label'=>'Grade 4','count'=>40,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            ['id'=>'g5','label'=>'Grade 5','count'=>38,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            ['id'=>'g6','label'=>'Grade 6','count'=>36,'bg'=>'var(--teal-light,#ccfbf1)','color'=>'var(--teal,#0f766e)','group'=>'elem'],
            // Junior High School
            ['id'=>'g7', 'label'=>'Grade 7', 'count'=>64,'bg'=>'#f0f4ff','color'=>'#1e40af','group'=>'jhs'],
            ['id'=>'g8', 'label'=>'Grade 8', 'count'=>58,'bg'=>'#fef3c7','color'=>'#b45309','group'=>'jhs'],
            ['id'=>'g9', 'label'=>'Grade 9', 'count'=>52,'bg'=>'#fce7f3','color'=>'#be185d','group'=>'jhs'],
            ['id'=>'g10','label'=>'Grade 10','count'=>47,'bg'=>'#f0f4ff','color'=>'#1a2a5e','group'=>'jhs'],
          ];
          $preGrades  = array_filter($csGrades, fn($g)=>$g['group']==='pre');
          $elemGrades = array_filter($csGrades, fn($g)=>$g['group']==='elem');
          $jhsGrades  = array_filter($csGrades, fn($g)=>$g['group']==='jhs');

          foreach($preGrades as $g): ?>
          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('<?= $g['id'] ?>','<?= $g['label'] ?>')">
              <div class="grade-pick-icon" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-stars"></i></div>
              <div class="grade-pick-name"><?= $g['label'] ?></div>
              <div class="grade-pick-meta"><?= $g['count'] ?> students enrolled</div>
              <div class="grade-pick-badge" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Elementary -->
        <div class="mb-1" style="font-size:10.5px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#111d42;padding:4px 8px;background:#f0fdfa;border-radius:6px;display:inline-block">
          <i class="bi bi-book-fill me-1"></i>Elementary
        </div>
        <div class="row g-2 mb-3 mt-1">
          <?php foreach($elemGrades as $g): ?>
          <div class="col-4">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('<?= $g['id'] ?>','<?= $g['label'] ?>')">
              <div class="grade-pick-icon" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-book-fill"></i></div>
              <div class="grade-pick-name"><?= $g['label'] ?></div>
              <div class="grade-pick-meta"><?= $g['count'] ?> students</div>
              <div class="grade-pick-badge" style="background:<?= $g['bg'] ?>;color:<?= $g['color'] ?>"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Junior High School -->
        <div class="mb-1" style="font-size:10.5px;font-weight:800;text-transform:uppercase;letter-spacing:.08em;color:#1e40af;padding:4px 8px;background:#f0f4ff;border-radius:6px;display:inline-block">
          <i class="bi bi-mortarboard-fill me-1"></i>Junior High School
        </div>
        <div class="row g-2 mt-1">
          <?php foreach($jhsGrades as $g): ?>
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

<!-- ===================== MODAL: VIEW PROOF OF PAYMENT ===================== -->
<?php
$payId = $_GET['pay_id'] ?? '';
$viewedPay = null;
foreach($payments as $p) { if($p['id'] === $payId) { $viewedPay = $p; break; } }
?>
<?php if($modal === 'viewProof' && $viewedPay): ?>
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" style="max-width:520px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#1a2a5e,#111d42);padding:22px 28px 18px;position:relative">
        <a href="?tab=payments" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff"><i class="bi bi-receipt"></i></div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Proof of Payment</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7)"><?= htmlspecialchars($viewedPay['name']) ?> — <?= $viewedPay['ref'] ?></div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <div class="row g-2 mb-3">
          <div class="col-6"><div style="font-size:10px;color:#94a3b8;font-weight:700;text-transform:uppercase">Amount</div><div style="font-size:16px;font-weight:800;color:#1e293b"><?= $viewedPay['amount'] ?></div></div>
          <div class="col-6"><div style="font-size:10px;color:#94a3b8;font-weight:700;text-transform:uppercase">Payment Method</div><div style="font-size:14px;font-weight:600;color:#1e293b"><?= $viewedPay['method'] ?></div></div>
          <div class="col-6"><div style="font-size:10px;color:#94a3b8;font-weight:700;text-transform:uppercase">Reference No.</div><code style="font-size:13px;color:#1e293b"><?= $viewedPay['ref'] ?></code></div>
          <div class="col-6"><div style="font-size:10px;color:#94a3b8;font-weight:700;text-transform:uppercase">Submitted</div><div style="font-size:13px;color:#475569"><?= $viewedPay['submitted'] ?></div></div>
        </div>
        <div style="border:2px dashed #cbd5e1;border-radius:12px;overflow:hidden;background:#f8fafc;min-height:200px;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:8px;padding:16px">
          <img src="/uploads/payments/<?= htmlspecialchars($viewedPay['proof']) ?>"
               alt="Proof of Payment"
               onerror="this.style.display='none';this.nextElementSibling.style.display='flex'"
               style="max-width:100%;max-height:300px;object-fit:contain;border-radius:8px">
          <div style="display:none;flex-direction:column;align-items:center;gap:8px">
            <i class="bi bi-file-earmark-image" style="font-size:40px;color:#94a3b8"></i>
            <div style="font-size:12px;color:#64748b">Image preview not available</div>
            <div style="font-size:11px;font-family:monospace;color:#94a3b8"><?= htmlspecialchars($viewedPay['proof']) ?></div>
          </div>
        </div>
        <?php if($viewedPay['status']==='Pending'): ?>
        <div class="d-flex gap-2 mt-3">
          <a href="?modal=verifyPayment&pay_id=<?= $viewedPay['id'] ?>&pay_name=<?= urlencode($viewedPay['name']) ?>&pay_email=<?= urlencode($viewedPay['parent_email']) ?>&pay_amount=<?= urlencode($viewedPay['amount']) ?>&pay_ref=<?= urlencode($viewedPay['ref']) ?>" class="btn btn-sm fw-semibold flex-grow-1" style="background:#16a34a;color:#fff">
            <i class="bi bi-patch-check me-1"></i>Verify &amp; Send Invoice
          </a>
          <a href="?modal=rejectPayment&pay_id=<?= $viewedPay['id'] ?>&pay_name=<?= urlencode($viewedPay['name']) ?>" class="btn btn-sm btn-outline-danger fw-semibold">
            <i class="bi bi-x-circle me-1"></i>Reject
          </a>
        </div>
        <?php endif; ?>
      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="?tab=payments" class="btn btn-outline-secondary btn-sm">Close</a>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'verifyPayment'): ?>
<!-- MODAL: VERIFY PAYMENT & SEND EMAIL INVOICE -->
<?php
$payName   = $_GET['pay_name']   ?? '';
$payEmail  = $_GET['pay_email']  ?? '';
$payAmount = $_GET['pay_amount'] ?? '';
$payRef    = $_GET['pay_ref']    ?? '';
?>
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" style="max-width:500px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#166534,#15803d);padding:22px 28px 18px;position:relative">
        <a href="?tab=payments" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"></a>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff"><i class="bi bi-patch-check-fill"></i></div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff">Verify Payment</div>
            <div style="font-size:12px;color:rgba(255,255,255,.75)">This will mark the payment as received and send an email invoice</div>
          </div>
        </div>
      </div>
      <div class="modal-body p-4">
        <div class="d-flex align-items-start gap-2 rounded-2 p-3 mb-3" style="background:#f0fdf4;border:1px solid #bbf7d0">
          <i class="bi bi-envelope-check-fill mt-1" style="color:#16a34a;font-size:14px;flex-shrink:0"></i>
          <div style="font-size:12.5px;color:#166534">
            Upon verification, an <strong>official email invoice</strong> will be automatically sent to the parent's registered email address confirming receipt of the payment. No payment API is used — the actual payment happened outside the system.
          </div>
        </div>
        <div class="row g-2 mb-3">
          <div class="col-12"><div style="font-size:11px;color:#94a3b8;font-weight:700;text-transform:uppercase;margin-bottom:2px">Student / Parent</div><div style="font-size:14px;font-weight:700;color:#1e293b"><?= htmlspecialchars($payName) ?></div></div>
          <div class="col-6"><div style="font-size:11px;color:#94a3b8;font-weight:700;text-transform:uppercase;margin-bottom:2px">Amount Paid</div><div style="font-size:16px;font-weight:800;color:#166534"><?= htmlspecialchars($payAmount) ?></div></div>
          <div class="col-6"><div style="font-size:11px;color:#94a3b8;font-weight:700;text-transform:uppercase;margin-bottom:2px">Ref No.</div><code style="font-size:13px"><?= htmlspecialchars($payRef) ?></code></div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:12px">Parent Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="invoiceEmail" value="<?= htmlspecialchars($payEmail) ?>" placeholder="parent@email.com">
          <div style="font-size:11px;color:#64748b;margin-top:4px"><i class="bi bi-info-circle me-1"></i>The email invoice will be sent to this address as proof that the payment has been received.</div>
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:12px">Admin Note (optional)</label>
          <textarea class="form-control" rows="2" placeholder="e.g., Payment verified by cashier on March 10, 2026..."></textarea>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0 px-4 pb-4">
        <a href="?tab=payments" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-sm fw-semibold px-4" style="background:#16a34a;color:#fff" onclick="confirmVerifyPayment('<?= htmlspecialchars(addslashes($payName)) ?>')">
          <i class="bi bi-envelope-check me-1"></i>Confirm &amp; Send Invoice
        </button>
      </div>
    </div>
  </div>
</div>

<?php elseif($modal === 'rejectPayment'): ?>
<!-- MODAL: REJECT PAYMENT PROOF -->
<?php
$payName = $_GET['pay_name'] ?? '';
?>
<div class="modal fade" id="phpModal" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" style="max-width:460px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="color:#991b1b"><i class="bi bi-exclamation-triangle-fill me-2"></i>Reject Proof of Payment</h5>
        <a href="?tab=payments" class="btn-close"></a>
      </div>
      <div class="modal-body">
        <p style="font-size:14px">You are about to reject the proof of payment submitted by <strong><?= htmlspecialchars($payName) ?></strong>. The parent will be notified to resubmit a valid proof.</p>
        <label class="form-label fw-medium" style="font-size:13px">Reason for Rejection <span class="text-danger">*</span></label>
        <select class="form-select mb-2" id="payRejectReasonSelect" onchange="togglePayCustomReason(this.value)">
          <option value="">Select a reason...</option>
          <option>Proof image is blurry or unreadable</option>
          <option>Reference number does not match</option>
          <option>Amount does not match the required fee</option>
          <option>Proof appears to be edited or invalid</option>
          <option value="other">Other (specify)</option>
        </select>
        <div id="payCustomReasonWrap" class="d-none">
          <textarea class="form-control" id="payRejectCustomReason" rows="2" placeholder="Specify the reason..."></textarea>
        </div>
        <div class="d-flex align-items-start gap-2 rounded-2 p-2 mt-3" style="background:#fff7ed;border:1px solid #fed7aa;font-size:12.5px;color:#92400e">
          <i class="bi bi-envelope-fill mt-1" style="flex-shrink:0"></i>
          <span>A rejection notification will be sent to the parent's email so they can resubmit.</span>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <a href="?tab=payments" class="btn btn-outline-secondary btn-sm">Cancel</a>
        <button class="btn btn-danger btn-sm fw-semibold" onclick="confirmRejectPayment('<?= htmlspecialchars(addslashes($payName)) ?>')">Confirm Rejection</button>
      </div>
    </div>
  </div>
</div>

<?php endif; /* end of viewProof / verifyPayment / rejectPayment modals */ ?>
<div class="modal fade" id="syArchiveModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">
      <div style="background:linear-gradient(135deg,#1a2a5e,#111d42);padding:24px 28px 20px;position:relative">
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
<div class="PHLCI-toast" id="approveToast">
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
  ['statistics','applications','students','sections','payments','profile'].forEach(function(t) {
    document.getElementById('admin-tab-'+t).classList.toggle('d-none', t !== tab);
  });
  const titles = { applications:'Applications', students:'Students', sections:'Sections', statistics:'Statistics & Analytics', payments:'Payment Verification', profile:'My Profile' };
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
  t.className = 'PHLCI-toast';
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
  'Grade 10': { bg: '#f0f4ff', color: '#1e40af' },
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
    var reportBtn = !isActive ? '<button class="btn btn-sm ms-2" style="background:#f0f4ff;color:#1e40af;border:1px solid #bfdbfe" onclick="alert(\'Viewing '+rec.sy+' report...\')"><i class="bi bi-eye me-1"></i>View Report</button>' : '';
    return '<div class="card border rounded-3 mb-3 overflow-hidden">' +
      '<div class="d-flex align-items-center justify-content-between p-3 flex-wrap gap-2" style="background:'+(isActive?'linear-gradient(135deg,#1a2a5e,#111d42)':'#f8fafc')+';cursor:pointer" onclick="this.nextElementSibling.classList.toggle(\'d-none\')">' +
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
const enrolledCounts = {
  nursery:22, kinder:28,
  g1:45, g2:42, g3:48, g4:40, g5:38, g6:36,
  g7:64, g8:58, g9:52, g10:47
};
const LETTERS = ['A','B','C','D','E','F'];
const CAP = 15;
const gradeColors = {
  nursery: { fill:'fill-violet', bg:'#fffbea',  color:'#1a2a5e' },
  kinder:  { fill:'fill-violet', bg:'#fffbea',  color:'#1a2a5e' },
  g1:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g2:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g3:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g4:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g5:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g6:  { fill:'fill-teal',  bg:'#ccfbf1', color:'#0f766e' },
  g7:  { fill:'fill-navy',  bg:'#f0f4ff', color:'#1e40af' },
  g8:  { fill:'fill-amber', bg:'#fef3c7', color:'#b45309' },
  g9:  { fill:'fill-rose',  bg:'#fce7f3', color:'#be185d' },
  g10: { fill:'fill-navy',  bg:'#dbeafe', color:'#1a2a5e' },
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
    data:{ labels:['Male','Female'], datasets:[{data:[640,605],backgroundColor:['#1a2a5e','#111d42'],borderWidth:2,borderColor:'#ffffff'}] },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'60%', plugins:{legend:{display:false}} }
  });
  new Chart(document.getElementById('appStatusChart'), {
    type:'doughnut',
    data:{ labels:['Approved','Pending','Rejected'], datasets:[{data:[301,6,3],backgroundColor:['#22c55e','#f59e0b','#ef4444'],borderWidth:2,borderColor:'#fff'}] },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'55%', plugins:{legend:{position:'bottom',labels:{font:{size:12},padding:14}}} }
  });
  new Chart(document.getElementById('trendChart'), {
    type:'line',
    data:{ labels:['SY 2023–2024','SY 2024–2025','SY 2025–2026'], datasets:[{ label:'Enrolled', data:[244,258,271], borderColor:'#1a2a5e', backgroundColor:'rgba(124,58,237,.1)', fill:true, tension:.35, pointBackgroundColor:'#1a2a5e', pointRadius:5 }] },
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
    g7: {bg:'#ccfbf1',color:'#0f766e',gradient:'#111d42,#065f46'},
    g8: {bg:'#fef3c7',color:'#b45309',gradient:'#d97706,#92400e'},
    g9: {bg:'#fce7f3',color:'#be185d',gradient:'#db2777,#9d174d'},
    g10:{bg:'#f0f4ff',color:'#1e40af',gradient:'#1a2a5e,#1e40af'},
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
            <tr style="background:#1a2a5e;color:#fff">
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
    arr.push({no:i+1, lrn:'20260'+gradeLabel.slice(-1)+'0'+String(i+1).padStart(5,'0'), name:`${ln}, ${fn} ${mi}.`, sex:i %2===0?'M':'F', dob:`${mo} ${day}, ${yr}`, age:2026-yr, address:`Brgy. ${lastNames[(i+5)%lastNames.length]}, Minalabac`});
  }
  return arr;
}


/* ── Admin Profile Photo & Password helpers ── */
function openAdminPhotoModal() {
  new bootstrap.Modal(document.getElementById('adminPhotoActionModal')).show();
}

function adminViewFullPhoto() {
  bootstrap.Modal.getInstance(document.getElementById('adminPhotoActionModal')).hide();
  setTimeout(function() {
    new bootstrap.Modal(document.getElementById('adminPhotoViewModal')).show();
  }, 300);
}

function adminRemovePhoto() {
  ['adminAvatarPreview','adminModalThumb','adminFullPhotoView'].forEach(function(id) {
    var el = document.getElementById(id);
    if (!el) return;
    el.innerHTML = 'AD';
    el.style.background = '#1a2a5e';
  });
  bootstrap.Modal.getInstance(document.getElementById('adminPhotoActionModal')).hide();
}

function handleAdminPicChange(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var src = e.target.result;
      ['adminAvatarPreview','adminModalThumb','adminFullPhotoView'].forEach(function(id) {
        var el = document.getElementById(id);
        if (!el) return;
        el.innerHTML = '<img src="' + src + '" style="width:100%;height:100%;object-fit:cover;border-radius:50%">';
        el.style.background = 'transparent';
      });
    };
    reader.readAsDataURL(input.files[0]);
    var m = bootstrap.Modal.getInstance(document.getElementById('adminPhotoActionModal'));
    if (m) m.hide();
  }
}

function adminTogglePass(inputId, btn) {
  var inp = document.getElementById(inputId);
  var icon = btn.querySelector('i');
  if (inp.type === 'password') { inp.type = 'text'; icon.className = 'bi bi-eye-slash'; }
  else { inp.type = 'password'; icon.className = 'bi bi-eye'; }
}

function adminCheckStrength(val) {
  var bar = document.getElementById('adminStrengthBar');
  var lbl = document.getElementById('adminStrengthLabel');
  if (!val) { bar.style.width = '0%'; lbl.textContent = ''; return; }
  var score = 0;
  if (val.length >= 8) score++;
  if (/[A-Z]/.test(val)) score++;
  if (/[0-9]/.test(val)) score++;
  if (/[^A-Za-z0-9]/.test(val)) score++;
  var levels = [
    {w:'20%',bg:'#ef4444',label:'Weak'},
    {w:'45%',bg:'#f97316',label:'Fair'},
    {w:'70%',bg:'#eab308',label:'Good'},
    {w:'100%',bg:'#22c55e',label:'Strong'},
  ];
  var lvl = levels[Math.max(0, score - 1)];
  bar.style.width = lvl.w; bar.style.background = lvl.bg;
  lbl.textContent = 'Strength: ' + lvl.label; lbl.style.color = lvl.bg;
  adminCheckMatch();
}

function adminCheckMatch() {
  var np = document.getElementById('adminNewPass');
  var cp = document.getElementById('adminConfirmPass');
  var msg = document.getElementById('adminMatchMsg');
  if (!cp || !cp.value) { msg.textContent = ''; return; }
  if (np.value === cp.value) {
    msg.innerHTML = '<i class="bi bi-check-circle-fill me-1" style="color:#22c55e"></i><span style="color:#16a34a">Passwords match</span>';
  } else {
    msg.innerHTML = '<i class="bi bi-x-circle-fill me-1" style="color:#ef4444"></i><span style="color:#dc2626">Passwords do not match</span>';
  }
}

/* ── Payment tab helpers ── */
function filterPayTable(status) {
  document.querySelectorAll('#payTable tbody tr').forEach(function(r) {
    r.style.display = (!status || r.dataset.status === status) ? '' : 'none';
  });
}

function togglePayCustomReason(val) {
  document.getElementById('payCustomReasonWrap').classList.toggle('d-none', val !== 'other');
}

function confirmVerifyPayment(name) {
  var email = document.getElementById('invoiceEmail');
  if (email && !email.value.trim()) { alert('Please enter the parent email address.'); return; }
  showToast('Payment verified! Email invoice sent to ' + (email ? email.value : 'parent') + '.');
  setTimeout(function() { window.location = '?tab=payments'; }, 1800);
}

function confirmRejectPayment(name) {
  var sel = document.getElementById('payRejectReasonSelect');
  if (!sel || !sel.value) { alert('Please select a reason for rejection.'); return; }
  showToast('Proof of payment rejected. Parent notified to resubmit.');
  setTimeout(function() { window.location = '?tab=payments'; }, 1800);
}

document.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const modalParam = urlParams.get('modal');
  if (modalParam === 'addStudent' || modalParam === 'export' || modalParam === 'transfer') {
    sessionStorage.setItem('adminTab', 'students');
  } else if (modalParam === 'viewProof' || modalParam === 'verifyPayment' || modalParam === 'rejectPayment') {
    sessionStorage.setItem('adminTab', 'payments');
  } else if (modalParam === 'profile') {
    // Stay on applications if opened from an application, students if opened from a student record
    if (urlParams.get('app_id')) {
      sessionStorage.setItem('adminTab', 'applications');
    } else {
      sessionStorage.setItem('adminTab', 'students');
    }
  } else if (modalParam === 'createSection') {
    sessionStorage.setItem('adminTab', 'sections');
  } else if (modalParam === 'rejected' || modalParam === 'reject') {
    sessionStorage.setItem('adminTab', 'applications');
  }
  if (urlParams.get('app_page')) sessionStorage.setItem('adminTab', 'applications');
  if (urlParams.get('stu_page')) sessionStorage.setItem('adminTab', 'students');
  if (urlParams.get('tab')) sessionStorage.setItem('adminTab', urlParams.get('tab'));

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
          <div style="width:40px;height:40px;border-radius:10px;background:#1a2a5e;display:flex;align-items:center;justify-content:center;font-size:18px;color:#fff">
            <i class="bi bi-list-columns-reverse"></i>
          </div>
          <div>
            <h5 class="modal-title fw-bold mb-0" style="color:#1e293b">Class Master List</h5>
            <div class="text-muted" style="font-size:12px">SY 2025–2026 &nbsp;|&nbsp; PHLCI</div>
          </div>
        </div>
        <div class="d-flex gap-2 align-items-center ms-auto">
          <button class="btn btn-sm fw-semibold px-3" style="background:#1a2a5e;color:#fff" onclick="window.print()">
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