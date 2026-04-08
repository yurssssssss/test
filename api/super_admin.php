<?php $pageTitle = 'Super Admin – DPNHS'; ?>
<?php include 'header.php'; ?>

<!-- ===== TOPBAR ===== -->
<div class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 py-2 sticky-top" style="z-index:100">
  <div class="d-flex align-items-center gap-2">
    <button class="btn btn-sm d-lg-none me-1 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#superAdminSidebar" aria-controls="superAdminSidebar">
      <i class="bi bi-list fs-5"></i>
    </button>
    <img src="logo.png" class="brand-logo" alt="DPNHS Logo" style="width:55px;height:55px;">
    <div>
      <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">DPNHS</div>
      <div class="text-muted" style="font-size:11px">Super Admin Panel</div>
    </div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <span class="topbar-icon"><i class="bi bi-bell"></i></span>
    <span class="topbar-icon"><i class="bi bi-gear"></i></span>
    <div class="brand-logo" style="background:#7c3aed">SA</div>
    <div class="d-none d-md-block">
      <div class="fw-semibold" style="font-size:14px;color:#1e293b">Super Admin</div>
      <div class="text-muted" style="font-size:12px">superadmin@dpnhs.edu.ph</div>
    </div>
    <a href="index.php" class="topbar-icon text-decoration-none" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
  </div>
</div>

<!-- ===== OFFCANVAS SIDEBAR (mobile) ===== -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="superAdminSidebar" style="width:220px">
  <div class="offcanvas-header border-bottom">
    <div class="fw-bold" style="font-size:14px;color:#1e293b">Navigation</div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-3">
    <div class="fw-semibold mb-2" style="font-size:12px;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8">Super Admin</div>
    <div class="d-flex align-items-center gap-2 p-2 rounded-2 mb-1" style="background:#f5f3ff">
      <div class="brand-logo" style="background:#7c3aed;width:32px;height:32px;font-size:12px">SA</div>
      <div>
        <div class="fw-semibold" style="font-size:13px;color:#1e293b">Super Admin</div>
        <div class="text-muted" style="font-size:11px">Full System Access</div>
      </div>
    </div>
    <hr class="my-2">
    <a href="index.php" class="btn btn-outline-secondary btn-sm w-100 mt-1"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
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

  <!-- TABS -->
  <div class="border-bottom d-flex mb-4 overflow-auto flex-nowrap" style="white-space:nowrap">
    <div class="admin-tab active" onclick="switchSATab('admins',this)">Admin Accounts</div>
    <div class="admin-tab" onclick="switchSATab('enrollment',this)">Enrollment Settings</div>
    <div class="admin-tab" onclick="switchSATab('logs',this)">Activity Logs</div>
    <div class="admin-tab" onclick="switchSATab('overview',this)">System Overview</div>
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
      <div class="col-lg-6">
        <div class="card border rounded-3 p-4">
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b"><i class="bi bi-calendar3 me-2 text-navy"></i>Enrollment Period</div>
          <div class="text-muted mb-4" style="font-size:13px">Set the open and close dates for online enrollment</div>

          <div class="mb-3">
            <label class="form-label fw-medium" style="font-size:13px">School Year</label>
            <input type="text" class="form-control" value="2025–2026" placeholder="e.g., 2025–2026">
          </div>
          <div class="row g-3 mb-3">
            <div class="col-6">
              <label class="form-label fw-medium" style="font-size:13px">Start Date</label>
              <input type="date" class="form-control" value="2025-06-01">
            </div>
            <div class="col-6">
              <label class="form-label fw-medium" style="font-size:13px">End Date</label>
              <input type="date" class="form-control" value="2025-07-31">
            </div>
          </div>
          <div class="mb-4">
            <label class="form-label fw-medium" style="font-size:13px">Status</label>
            <div class="d-flex gap-3 mt-1">
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="enrollStatus" value="open" checked> Open</label>
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="enrollStatus" value="closed"> Closed</label>
            </div>
          </div>
          <button class="btn btn-navy btn-sm fw-semibold w-100" onclick="saveEnrollmentSettings()">
            <i class="bi bi-save me-1"></i>Save Enrollment Settings
          </button>
        </div>
      </div>

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

      <!-- Section Cap Settings -->
      <div class="col-12">
        <div class="card border rounded-3 p-4">
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b"><i class="bi bi-people-fill me-2 text-navy"></i>Section Capacity Settings</div>
          <div class="text-muted mb-4" style="font-size:13px">Configure maximum students per section and gender balance</div>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label fw-medium" style="font-size:13px">Max Students per Section</label>
              <input type="number" class="form-control" value="40" min="1" max="60">
              <div class="form-text">Recommended: 40 students</div>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-medium" style="font-size:13px">Max Male per Section</label>
              <input type="number" class="form-control" value="20" min="1" max="40">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-medium" style="font-size:13px">Max Female per Section</label>
              <input type="number" class="form-control" value="20" min="1" max="40">
            </div>
          </div>
          <button class="btn btn-navy btn-sm fw-semibold mt-3" onclick="alert('Section capacity settings saved!')">
            <i class="bi bi-save me-1"></i>Save Capacity Settings
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

  <!-- ===================== TAB: SYSTEM OVERVIEW ===================== -->
  <div id="sa-tab-overview" class="d-none">
    <div class="row g-3">
      <!-- Grade breakdown -->
      <div class="col-lg-7">
        <div class="card border rounded-3 p-4">
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Enrollment Progress per Grade</div>
          <div class="text-muted mb-3" style="font-size:13px">Current SY 2025–2026 enrollment vs. capacity</div>
          <?php
          $gradeData = [
            'Grade 7'  => ['enrolled'=>64,  'cap'=>120, 'admin'=>'Ana Reyes',      'color'=>'#1e40af', 'bg'=>'#eff6ff'],
            'Grade 8'  => ['enrolled'=>58,  'cap'=>120, 'admin'=>'Ben Santos',     'color'=>'#166534', 'bg'=>'#f0fdf4'],
            'Grade 9'  => ['enrolled'=>82,  'cap'=>120, 'admin'=>'Clara Dela Cruz','color'=>'#9a3412', 'bg'=>'#fff7ed'],
            'Grade 10' => ['enrolled'=>67,  'cap'=>120, 'admin'=>'Diego Lim',      'color'=>'#7e22ce', 'bg'=>'#fdf4ff'],
          ];
          foreach($gradeData as $grade => $d):
            $pct = round(($d['enrolled']/$d['cap'])*100);
          ?>
          <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $grade ?> <span class="fw-normal text-muted" style="font-size:12px">(<?= $d['admin'] ?>)</span></div>
              <span style="font-size:13px;font-weight:700;color:<?= $d['color'] ?>"><?= $d['enrolled'] ?> / <?= $d['cap'] ?></span>
            </div>
            <div class="progress" style="height:10px;border-radius:10px">
              <div class="progress-bar" style="width:<?= $pct ?>%;background:<?= $d['color'] ?>;border-radius:10px"></div>
            </div>
            <div class="text-muted mt-1" style="font-size:11px"><?= $pct ?>% filled</div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- System health / quick controls -->
      <div class="col-lg-5">
        <div class="card border rounded-3 p-4 mb-3">
          <div class="fw-bold mb-3" style="font-size:15px;color:#1e293b"><i class="bi bi-shield-check me-2" style="color:#7c3aed"></i>System Quick Controls</div>
          <div class="d-flex flex-column gap-2">
            <button class="btn btn-sm btn-outline-secondary fw-medium text-start" onclick="alert('Backup started!')"><i class="bi bi-cloud-arrow-up me-2 text-navy"></i>Backup Database</button>
            <button class="btn btn-sm btn-outline-secondary fw-medium text-start" onclick="alert('Logs cleared!')"><i class="bi bi-trash me-2 text-danger"></i>Clear Old Logs (90+ days)</button>
            <button class="btn btn-sm btn-outline-secondary fw-medium text-start" onclick="alert('All sessions cleared!')"><i class="bi bi-door-closed me-2 text-warning"></i>Force Logout All Users</button>
            <button class="btn btn-sm btn-outline-secondary fw-medium text-start" onclick="alert('Report generated!')"><i class="bi bi-file-earmark-bar-graph me-2 text-success"></i>Generate Enrollment Report</button>
          </div>
        </div>
        <div class="card border rounded-3 p-4">
          <div class="fw-bold mb-3" style="font-size:15px;color:#1e293b">Admin Status Summary</div>
          <?php foreach($grades as $g => $on): ?>
          <div class="d-flex align-items-center justify-content-between py-2" style="border-bottom:1px solid #f1f5f9">
            <span style="font-size:13px;color:#374151"><?= $g ?></span>
            <span class="badge rounded-pill px-3" style="background:<?= $on ? '#dcfce7' : '#fee2e2' ?>;color:<?= $on ? '#166534' : '#991b1b' ?>;font-size:11.5px"><?= $on ? '● Active' : '○ Inactive' ?></span>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</div><!-- /admin-content -->


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
function switchSATab(tab, el) {
  document.querySelectorAll('.admin-tab').forEach(t => t.classList.remove('active'));
  if (el) el.classList.add('active');
  ['admins','enrollment','logs','overview'].forEach(t => {
    document.getElementById('sa-tab-' + t).classList.toggle('d-none', t !== tab);
  });
}

/* ── Action menu (reuse admin.php pattern) ── */
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
</script>

<?php include 'footer.php'; ?>