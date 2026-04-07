<?php $pageTitle = 'Admin Dashboard – DPNHS'; ?>
<?php include 'header.php'; ?>

<!-- ===== TOPBAR ===== -->
<div class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 py-2 sticky-top" style="z-index:100">
  <div class="d-flex align-items-center gap-2">
    <!-- Sidebar toggle for mobile -->
    <button class="btn btn-sm d-lg-none me-1 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
      <i class="bi bi-list fs-5"></i>
    </button>
    <img src="logo.png" class="brand-logo" alt="DPNHS Logo" style="width:55px;height:55px;">
    <div>
      <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">DPNHS</div>
      <div class="text-muted" style="font-size:11px">Admin Dashboard</div>
    </div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <span class="topbar-icon"><i class="bi bi-bell"></i></span>
    <span class="topbar-icon"><i class="bi bi-gear"></i></span>
    <div class="brand-logo" style="background:var(--navy)">AD</div>
    <div class="d-none d-md-block">
      <div class="fw-semibold" style="font-size:14px;color:#1e293b">Admin User</div>
      <div class="text-muted" style="font-size:12px">admin@school.edu</div>
    </div>
    <a href="index.php" class="topbar-icon text-decoration-none" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
  </div>
</div>

<!-- ===== OFFCANVAS SIDEBAR (mobile only) ===== -->
<div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="adminSidebar" aria-labelledby="adminSidebarLabel" style="width:220px">
  <div class="offcanvas-header border-bottom">
    <div class="fw-bold" style="font-size:14px;color:#1e293b" id="adminSidebarLabel">Navigation</div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-3">
    <div class="fw-semibold mb-2" style="font-size:12px;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8">Admin</div>
    <div class="d-flex align-items-center gap-2 p-2 rounded-2 mb-1" style="background:#f1f5f9">
      <div class="brand-logo" style="background:var(--navy);width:32px;height:32px;font-size:12px">AD</div>
      <div>
        <div class="fw-semibold" style="font-size:13px;color:#1e293b">Admin User</div>
        <div class="text-muted" style="font-size:11px">admin@school.edu</div>
      </div>
    </div>
    <hr class="my-2">
    <a href="index.php" class="btn btn-outline-secondary btn-sm w-100 mt-1"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
  </div>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="admin-content">
  <div class="fw-bold mb-1 fs-5 fs-md-4" style="color:#1e293b">Dashboard Overview</div>
  <div class="text-muted mb-4" style="font-size:14px">Manage enrollment, students, and sections</div>

  <!-- ── STAT CARDS ── -->
  <div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon blue mb-3"><i class="bi bi-people-fill"></i></div>
        <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+12%</span>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">1,245</div>
        <div class="text-muted" style="font-size:13px">Total Students</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon orange mb-3"><i class="bi bi-clock-fill"></i></div>
        <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+5</span>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">38</div>
        <div class="text-muted" style="font-size:13px">Pending Applications</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon teal mb-3"><i class="bi bi-book-fill"></i></div>
        <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+3</span>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">42</div>
        <div class="text-muted" style="font-size:13px">Active Sections</div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card border rounded-3 p-3 h-100 position-relative overflow-hidden">
        <div class="stat-icon green mb-3"><i class="bi bi-graph-up-arrow"></i></div>
        <span class="badge bg-success-subtle text-success position-absolute top-0 end-0 m-2" style="font-size:11px">+2%</span>
        <div class="fw-bold mb-1" style="font-size:28px;color:#1e293b">94%</div>
        <div class="text-muted" style="font-size:13px">Enrollment Rate</div>
      </div>
    </div>
  </div>

  <!-- ── CHARTS ROW ── -->
  <div class="row g-3 mb-4">
    <div class="col-md-7">
      <div class="card border rounded-3 p-3 h-100">
        <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Enrollment by Grade</div>
        <div class="text-muted mb-3" style="font-size:13px">Number of students per grade level</div>
        <div style="position:relative;width:100%;height:220px;">
          <canvas id="barChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card border rounded-3 p-3 h-100">
        <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Student Gender Distribution</div>
        <div class="text-muted mb-3" style="font-size:13px">Male vs Female student ratio</div>
        <div class="d-flex align-items-center justify-content-center gap-4 h-100 pb-3 flex-column flex-sm-row">
          <div style="position:relative;width:160px;height:160px;flex-shrink:0;">
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

  <!-- ── ADMIN TABS ── -->
  <div class="border-bottom d-flex mb-4 overflow-auto flex-nowrap" id="adminTabs" style="white-space:nowrap">
    <div class="admin-tab active" onclick="switchAdminTab('applications',this)">Applications</div>
    <div class="admin-tab" onclick="switchAdminTab('students',this)">Students</div>
    <div class="admin-tab" onclick="switchAdminTab('sections',this)">Sections</div>
  </div>

  <!-- 
       TAB: APPLICATIONS
   -->
  <div id="admin-tab-applications">
    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Recent Applications</div>
          <div class="text-muted" style="font-size:13px">Review and manage admission applications</div>
        </div>
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-funnel"></i></button>
          <!-- Rejected Students List Button -->
          <button class="btn btn-sm btn-outline-danger fw-semibold" onclick="openRejectedModal()">
            <i class="bi bi-x-circle me-1"></i>Rejected List
          </button>
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
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">ID</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Name</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Grade</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Date</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Status</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Actions</th>
            </tr>
          </thead>
          <tbody style="font-size:13.5px">
            <tr>
              <td>1</td><td>Emma Johnson</td><td>Grade 10</td><td>March 18, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP001'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP001','Emma Johnson'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP001','Emma Johnson', getAppRowBtn(this,'APP001')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td><td>Michael Chen</td><td>Grade 9</td><td>March 18, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP002'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP002','Michael Chen'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP002','Michael Chen', getAppRowBtn(this,'APP002')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td><td>Sarah Williams</td><td>Grade 8</td><td>March 17, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP003'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP003','Sarah Williams'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP003','Sarah Williams', getAppRowBtn(this,'APP003')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>4</td><td>James Brown</td><td>Grade 8</td><td>March 17, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP004'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP004','James Brown'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP004','James Brown', getAppRowBtn(this,'APP004')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>5</td><td>Lisa Davis</td><td>Grade 7</td><td>March 16, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP005'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP005','Lisa Davis'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP005','Lisa Davis', getAppRowBtn(this,'APP005')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>6</td><td>Carlos Reyes</td><td>Grade 7</td><td>March 15, 2026</td>
              <td><span class="badge-pending">Pending</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('app','APP006'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-success" onclick="closeMenuThen(()=>approveAppByRow(this,'APP006','Carlos Reyes'))"><i class="bi bi-check-circle"></i> Approve</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>openRejectReasonModal('APP006','Carlos Reyes', getAppRowBtn(this,'APP006')))"><i class="bi bi-x-circle"></i> Reject</button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- 
       TAB: STUDENTS
   -->
  <div id="admin-tab-students" class="d-none">

    <!-- Enrollment Summary Bar -->
    <!-- <div class="card border rounded-3 p-3 mb-3" style="background:linear-gradient(135deg,#f0f4ff,#f0fdf9)">
      <div class="d-flex flex-wrap align-items-center gap-4">
        <div>
          <div class="text-muted" style="font-size:12px;text-transform:uppercase;letter-spacing:.05em">School Year</div>
          <div class="fw-bold" style="font-size:15px;color:#1e293b">2025 – 2026</div>
        </div>
        <div class="vr d-none d-md-block" style="opacity:.3"></div>
        <div class="d-flex align-items-center gap-2">
          <div class="stat-icon blue" style="width:36px;height:36px;font-size:16px"><i class="bi bi-people-fill"></i></div>
          <div>
            <div class="text-muted" style="font-size:12px">Total Enrolled</div>
            <div class="fw-bold" style="font-size:18px;color:#1e293b">1,245</div>
          </div>
        </div>
        <div class="vr d-none d-md-block" style="opacity:.3"></div>
        <div class="d-flex align-items-center gap-2">
          <div class="stat-icon" style="width:36px;height:36px;font-size:16px;background:#1e3a8a;color:#fff"><i class="bi bi-gender-male"></i></div>
          <div>
            <div class="text-muted" style="font-size:12px">Male</div>
            <div class="fw-bold" style="font-size:18px;color:#1e3a8a">640</div>
          </div>
        </div>
        <div class="vr d-none d-md-block" style="opacity:.3"></div>
        <div class="d-flex align-items-center gap-2">
          <div class="stat-icon" style="width:36px;height:36px;font-size:16px;background:#0d9488;color:#fff"><i class="bi bi-gender-female"></i></div>
          <div>
            <div class="text-muted" style="font-size:12px">Female</div>
            <div class="fw-bold" style="font-size:18px;color:#0d9488">605</div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-3 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Student Management</div>
          <div class="text-muted" style="font-size:13px">View and manage enrolled students</div>
        </div>
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-funnel"></i></button>
          <button class="btn btn-sm btn-navy fw-semibold" onclick="openExportModal()">
            <i class="bi bi-download me-1"></i>Export
          </button>
          <button class="btn btn-sm btn-navy fw-semibold" onclick="openAddStudentModal()">
            <i class="bi bi-person-plus me-1"></i>Add Student
          </button>
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
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Student ID</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Name</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Grade</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Section</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Status</th>
              <th style="font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#64748b">Actions</th>
            </tr>
          </thead>
          <tbody style="font-size:13.5px">
            <tr>
              <td>STU2024001</td>
              <td><span class="stu-avatar av-blue">JS</span>John Smith</td>
              <td>Grade 10</td><td>Section A</td>
              <td><span class="badge-enrolled">Enrolled</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('stu','STU2024001'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>alert('Transfer: STU2024001'))"><i class="bi bi-arrow-left-right"></i> Transfer Section</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>STU2024002</td>
              <td><span class="stu-avatar av-teal">AC</span>Alice Cooper</td>
              <td>Grade 9</td><td>Section B</td>
              <td><span class="badge-enrolled">Enrolled</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('stu','STU2024002'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>alert('Transfer: STU2024002'))"><i class="bi bi-arrow-left-right"></i> Transfer Section</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>STU2024003</td>
              <td><span class="stu-avatar av-orange">BW</span>Bob Wilson</td>
              <td>Grade 9</td><td>Section A</td>
              <td><span class="badge-enrolled">Enrolled</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('stu','STU2024003'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>alert('Transfer: STU2024003'))"><i class="bi bi-arrow-left-right"></i> Transfer Section</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>STU2024004</td>
              <td><span class="stu-avatar av-green">CM</span>Carol Martinez</td>
              <td>Grade 10</td><td>Section C</td>
              <td><span class="badge-enrolled">Enrolled</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('stu','STU2024004'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>alert('Transfer: STU2024004'))"><i class="bi bi-arrow-left-right"></i> Transfer Section</button>
                  </div>
                </div>
              </td>
            </tr>
            <tr>
              <td>STU2024005</td>
              <td><span class="stu-avatar av-purple">DL</span>David Lee</td>
              <td>Grade 8</td><td>Section B</td>
              <td><span class="badge-enrolled">Enrolled</span></td>
              <td>
                <div class="action-menu-wrap position-relative">
                  <button class="btn btn-sm btn-light border action-dots-btn" onclick="toggleActionMenu(event,this)" title="Actions"><i class="bi bi-three-dots-vertical"></i></button>
                  <div class="action-dropdown shadow-sm">
                    <button class="action-item" onclick="closeMenuThen(()=>openStudentProfile('stu','STU2024005'))"><i class="bi bi-eye text-navy"></i> View Profile</button>
                    <button class="action-item text-danger" onclick="closeMenuThen(()=>alert('Transfer: STU2024005'))"><i class="bi bi-arrow-left-right"></i> Transfer Section</button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- 
       TAB: SECTIONS
   -->
  <div id="admin-tab-sections" class="d-none">
    <div class="card border rounded-3 p-3 p-md-4">
      <div class="d-flex align-items-start justify-content-between mb-4 flex-wrap gap-2">
        <div>
          <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Section Management</div>
          <div class="text-muted" style="font-size:13px">Click a grade level to view its sections</div>
        </div>
        <button class="btn btn-navy btn-sm fw-semibold" onclick="openCreateSectionModal()">
          <i class="bi bi-plus-circle me-1"></i>Create Section
        </button>
      </div>

      <!-- Grade 7 -->
      <div class="grade-card" id="g7">
        <div class="grade-header" onclick="toggleGrade('g7')">
          <div class="grade-icon navy"><i class="bi bi-mortarboard-fill"></i></div>
          <div class="grade-info">
            <div class="grade-title">Grade 7</div>
            <div class="grade-meta" id="g7-meta">No sections yet</div>
          </div>
          <div class="grade-bar-wrap">
            <div class="grade-pill-bar"><div class="fill fill-navy" style="width:0%"></div></div>
          </div>
          <i class="bi bi-chevron-down chevron"></i>
        </div>
        <div class="sections-wrap" id="g7-sections">
          <div class="empty-section-state">
            <div class="empty-section-icon" style="background:var(--navy-light);color:var(--navy)"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
            <div class="empty-section-title">No Sections Created</div>
            <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong>Grade 7</strong> to auto-generate sections.</div>
          </div>
        </div>
      </div>

      <!-- Grade 8 -->
      <div class="grade-card" id="g8">
        <div class="grade-header" onclick="toggleGrade('g8')">
          <div class="grade-icon teal"><i class="bi bi-mortarboard-fill"></i></div>
          <div class="grade-info">
            <div class="grade-title">Grade 8</div>
            <div class="grade-meta" id="g8-meta">No sections yet</div>
          </div>
          <div class="grade-bar-wrap">
            <div class="grade-pill-bar"><div class="fill fill-teal" style="width:0%"></div></div>
          </div>
          <i class="bi bi-chevron-down chevron"></i>
        </div>
        <div class="sections-wrap" id="g8-sections">
          <div class="empty-section-state">
            <div class="empty-section-icon" style="background:var(--teal-light);color:var(--teal)"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
            <div class="empty-section-title">No Sections Created</div>
            <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong>Grade 8</strong> to auto-generate sections.</div>
          </div>
        </div>
      </div>

      <!-- Grade 9 -->
      <div class="grade-card" id="g9">
        <div class="grade-header" onclick="toggleGrade('g9')">
          <div class="grade-icon amber"><i class="bi bi-mortarboard-fill"></i></div>
          <div class="grade-info">
            <div class="grade-title">Grade 9</div>
            <div class="grade-meta" id="g9-meta">No sections yet</div>
          </div>
          <div class="grade-bar-wrap">
            <div class="grade-pill-bar"><div class="fill fill-amber" style="width:0%"></div></div>
          </div>
          <i class="bi bi-chevron-down chevron"></i>
        </div>
        <div class="sections-wrap" id="g9-sections">
          <div class="empty-section-state">
            <div class="empty-section-icon" style="background:#fef3c7;color:#b45309"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
            <div class="empty-section-title">No Sections Created</div>
            <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong>Grade 9</strong> to auto-generate sections.</div>
          </div>
        </div>
      </div>

      <!-- Grade 10 -->
      <div class="grade-card" id="g10">
        <div class="grade-header" onclick="toggleGrade('g10')">
          <div class="grade-icon rose"><i class="bi bi-mortarboard-fill"></i></div>
          <div class="grade-info">
            <div class="grade-title">Grade 10</div>
            <div class="grade-meta" id="g10-meta">No sections yet</div>
          </div>
          <div class="grade-bar-wrap">
            <div class="grade-pill-bar"><div class="fill fill-rose" style="width:0%"></div></div>
          </div>
          <i class="bi bi-chevron-down chevron"></i>
        </div>
        <div class="sections-wrap" id="g10-sections">
          <div class="empty-section-state">
            <div class="empty-section-icon" style="background:#fce7f3;color:#be185d"><i class="bi bi-layout-text-sidebar-reverse"></i></div>
            <div class="empty-section-title">No Sections Created</div>
            <div class="empty-section-sub">Click <strong>Create Section</strong> above and select <strong>Grade 10</strong> to auto-generate sections.</div>
          </div>
        </div>
      </div>

    </div><!-- /card -->
  </div><!-- /admin-tab-sections -->

</div><!-- /admin-content -->


<!-- 
     MODAL: REJECTED STUDENTS LIST
 -->
<div class="modal fade" id="rejectedModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <div>
          <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-x-circle-fill text-danger me-2"></i>Rejected Applications</h5>
          <div class="text-muted" style="font-size:13px">List of applicants who have been rejected</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-3">
        <div id="rejectedListBody">
          <!-- Populated by JS -->
        </div>
      </div>
      <div class="modal-footer border-0">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: REJECT WITH REASON
 -->
<div class="modal fade" id="rejectReasonModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="color:#991b1b"><i class="bi bi-exclamation-triangle-fill me-2"></i>Reject Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p style="font-size:14px">You are about to reject the application of <strong id="rejectStudentName"></strong> (<span id="rejectAppId"></span>).</p>
        <label class="form-label fw-medium" style="font-size:13px">Reason for Rejection <span class="text-danger">*</span></label>
        <select class="form-select mb-2" id="rejectReasonSelect" onchange="toggleCustomReason(this.value)">
          <option value="">Select a reason...</option>
          <option>Incomplete requirements</option>
          <option>Does not meet age requirements</option>
          <option>Grade level mismatch</option>
          <option>No available slot</option>
          <option>Duplicate application</option>
          <option>other">Other (specify below)</option>
        </select>
        <div id="customReasonWrap" class="d-none">
          <textarea class="form-control" id="rejectCustomReason" rows="3" placeholder="Specify the reason..."></textarea>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-danger btn-sm fw-semibold" onclick="confirmReject()">Confirm Rejection</button>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: STUDENT / APPLICANT PROFILE (View Admission Info)
 -->
<div class="modal fade" id="studentProfileModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">

      <!-- ── Profile Hero Header ── -->
      <div style="background:linear-gradient(135deg,#1e3a8a 0%,#1a5c6e 60%,#0d9488 100%);padding:28px 28px 20px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <div class="d-flex align-items-center gap-3 gap-md-4 flex-wrap">
          <!-- Avatar -->
          <div id="p-avatar-circle" style="width:72px;height:72px;border-radius:50%;background:rgba(255,255,255,.2);border:3px solid rgba(255,255,255,.5);display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800;color:#fff;flex-shrink:0;letter-spacing:-1px">JS</div>
          <div>
            <div style="font-size:11px;text-transform:uppercase;letter-spacing:.08em;color:rgba(255,255,255,.65);margin-bottom:3px" id="profileSubtitle">Enrolled Student – Full Profile</div>
            <div style="font-size:22px;font-weight:800;color:#fff;line-height:1.2" id="p-fullname">John Smith</div>
            <div class="d-flex align-items-center gap-2 mt-2 flex-wrap">
              <span style="background:rgba(255,255,255,.15);color:#fff;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;border:1px solid rgba(255,255,255,.25)" id="p-grade-badge">Grade 10</span>
              <span style="background:rgba(255,255,255,.15);color:#fff;font-size:12px;font-weight:600;padding:3px 10px;border-radius:20px;border:1px solid rgba(255,255,255,.25)" id="p-sy-badge">SY 2025–2026</span>
              <span id="p-status-badge" style="background:#dcfce7;color:#166534;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px">● Enrolled</span>
            </div>
          </div>
        </div>
        <!-- Quick info strip -->
        <div class="d-flex gap-4 mt-4 flex-wrap" style="font-size:12px;color:rgba(255,255,255,.75)">
          <div><i class="bi bi-credit-card-2-front me-1"></i><span id="p-lrn-strip">LRN: —</span></div>
          <div><i class="bi bi-person-badge me-1"></i><span id="p-stuid-strip" style="display:none"></span></div>
          <div><i class="bi bi-geo-alt me-1"></i><span id="p-pob-strip">—</span></div>
          <div><i class="bi bi-calendar3 me-1"></i><span id="p-dob-strip">—</span></div>
        </div>
      </div>

      <!-- ── Modal Body ── -->
      <div class="modal-body p-0" style="background:#f8fafc">

        <!-- Enrollment Details (enrolled only) -->
        <div id="p-section-block" style="background:#fff;border-bottom:1px solid #e2e8f0;padding:16px 24px">
          <div style="font-size:11px;text-transform:uppercase;letter-spacing:.07em;color:#64748b;margin-bottom:10px;font-weight:700"><i class="bi bi-bookmark-check-fill text-success me-1"></i>Enrollment Details</div>
          <div class="row g-3">
            <div class="col-6 col-md-4">
              <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Student ID</div>
              <div style="font-size:14px;font-weight:700;color:#1e293b;font-family:monospace" id="p-stuid">STU2024001</div>
            </div>
            <div class="col-6 col-md-4">
              <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Section</div>
              <div style="font-size:14px;font-weight:600;color:#1e293b" id="p-section">Section A</div>
            </div>
            <div class="col-6 col-md-4">
              <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Status</div>
              <span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill" style="font-size:12px;border:1px solid #bbf7d0">Enrolled</span>
            </div>
          </div>
        </div>

        <div style="padding:20px 24px;display:flex;flex-direction:column;gap:16px">

          <!-- ── Learner Information ── -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#1e3a8a;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-person-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Learner Information</span>
            </div>
            <div style="padding:18px 16px;display:flex;flex-direction:column;gap:14px">
              <!-- Full name — spans full width -->
              <div style="padding-bottom:14px;border-bottom:1px solid #f1f5f9">
                <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:4px">Full Name</div>
                <div style="font-size:15px;font-weight:700;color:#1e293b;line-height:1.3"><span id="p-lname2"></span>, <span id="p-fname2"></span> <span id="p-mname2"></span></div>
              </div>
              <!-- Row 1: LRN | DOB | Age | Sex | Mother Tongue -->
              <div class="row g-3">
                <div class="col-12 col-md-4">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">LRN</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b;font-family:monospace;letter-spacing:.03em" id="p-lrn">—</div>
                </div>
                <div class="col-6 col-md-3">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Date of Birth</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-dob">—</div>
                </div>
                <div class="col-3 col-md-2">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Age</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-age">—</div>
                </div>
                <div class="col-3 col-md-1">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Sex</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-sex">—</div>
                </div>
                <div class="col-6 col-md-2">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Mother Tongue</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-tongue">—</div>
                </div>
              </div>
              <!-- Row 2: Place of Birth | IP | 4Ps -->
              <div class="row g-3">
                <div class="col-md-6">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">Place of Birth</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-pob">—</div>
                </div>
                <div class="col-6 col-md-3">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">IP Community?</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-ip">—</div>
                </div>
                <div class="col-6 col-md-3">
                  <div style="font-size:10.5px;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#94a3b8;margin-bottom:3px">4Ps Beneficiary?</div>
                  <div style="font-size:13px;font-weight:600;color:#1e293b" id="p-4ps">—</div>
                </div>
              </div>
            </div>
          </div>

          <!-- ── Address ── -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#0d9488;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-geo-alt-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Current Address</span>
            </div>
            <div style="padding:14px 16px;font-size:14px;font-weight:500;color:#374151;line-height:1.6" id="p-address">—</div>
          </div>

          <!-- ── Parent / Guardian ── -->
          <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
            <div style="padding:12px 16px;background:#f1f5f9;border-bottom:1px solid #e2e8f0;display:flex;align-items:center;gap:8px">
              <div style="width:28px;height:28px;border-radius:8px;background:#d97706;display:flex;align-items:center;justify-content:center;font-size:13px;color:#fff"><i class="bi bi-people-fill"></i></div>
              <span style="font-size:13px;font-weight:700;color:#1e293b">Parent / Guardian Information</span>
            </div>
            <div style="padding:16px">
              <!-- Father -->
              <div class="d-flex align-items-start gap-3 mb-3 p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0">
                <div style="width:34px;height:34px;border-radius:50%;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:14px;color:#1e40af;flex-shrink:0"><i class="bi bi-person"></i></div>
                <div class="row g-0 w-100">
                  <div class="col-12 mb-1"><span style="font-size:11px;font-weight:700;text-transform:uppercase;color:#94a3b8;letter-spacing:.06em">Father</span></div>
                  <div class="col-md-7">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Name</div>
                    <div style="font-size:13.5px;font-weight:600;color:#1e293b" id="p-father">—</div>
                  </div>
                  <div class="col-md-5">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Contact</div>
                    <div style="font-size:13.5px;font-weight:600;color:#1e293b" id="p-father-c">—</div>
                  </div>
                </div>
              </div>
              <!-- Mother -->
              <div class="d-flex align-items-start gap-3 mb-3 p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0">
                <div style="width:34px;height:34px;border-radius:50%;background:#fce7f3;display:flex;align-items:center;justify-content:center;font-size:14px;color:#be185d;flex-shrink:0"><i class="bi bi-person"></i></div>
                <div class="row g-0 w-100">
                  <div class="col-12 mb-1"><span style="font-size:11px;font-weight:700;text-transform:uppercase;color:#94a3b8;letter-spacing:.06em">Mother</span></div>
                  <div class="col-md-7">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Name</div>
                    <div style="font-size:13.5px;font-weight:600;color:#1e293b" id="p-mother">—</div>
                  </div>
                  <div class="col-md-5">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Contact</div>
                    <div style="font-size:13.5px;font-weight:600;color:#1e293b" id="p-mother-c">—</div>
                  </div>
                </div>
              </div>
              <!-- Guardian -->
              <div class="d-flex align-items-start gap-3 p-3 rounded-3" style="background:#f8fafc;border:1px solid #e2e8f0">
                <div style="width:34px;height:34px;border-radius:50%;background:#dcfce7;display:flex;align-items:center;justify-content:center;font-size:14px;color:#166534;flex-shrink:0"><i class="bi bi-person-check"></i></div>
                <div class="row g-0 w-100">
                  <div class="col-12 mb-1"><span style="font-size:11px;font-weight:700;text-transform:uppercase;color:#94a3b8;letter-spacing:.06em">Guardian</span></div>
                  <div class="col-12">
                    <div style="font-size:11px;color:#94a3b8;margin-bottom:2px">Name</div>
                    <div style="font-size:13.5px;font-weight:600;color:#1e293b" id="p-guardian">N/A</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /padding wrapper -->
      </div><!-- /modal-body -->

      <div class="modal-footer border-0" style="background:#f8fafc;padding:14px 24px">
        <button class="btn btn-light btn-sm border px-4 fw-medium" style="font-size:13px" data-bs-dismiss="modal"><i class="bi bi-x me-1"></i>Close</button>
      </div>
    </div>
  </div>
</div>

<!-- hidden fields still needed for JS compatibility -->
<span id="p-lname" style="display:none"></span>
<span id="p-fname" style="display:none"></span>
<span id="p-mname" style="display:none"></span>
<span id="p-sy"    style="display:none"></span>
<span id="p-grade" style="display:none"></span>

<!-- 
     MODAL: ADD STUDENT (Late Enrollment / Bypass)
 -->
<div class="modal fade" id="addStudentModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <div>
          <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-person-plus-fill me-2 text-navy"></i>Add Student – Late Enrollment</h5>
          <div class="text-muted" style="font-size:13px">Admin bypass for late-enrolled students. Complete all fields below.</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

        <!-- School Info -->
        <div class="fw-semibold mb-2 mt-1" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--navy);padding-left:10px">School Information</div>
        <div class="row g-3 mb-3">
          <div class="col-md-4">
            <label class="form-label fw-medium" style="font-size:13px">School Year *</label>
            <input type="text" class="form-control" placeholder="e.g., 2025-2026" value="2025-2026">
          </div>
          <div class="col-md-4">
            <label class="form-label fw-medium" style="font-size:13px">Grade Level *</label>
            <select class="form-select" id="as-grade">
              <option value="">Select grade</option>
              <option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option>
            </select>
          </div>
          <div class="col-md-4">
            <label class="form-label fw-medium" style="font-size:13px">Section Assignment *</label>
            <select class="form-select" id="as-section">
              <option value="">Select section (after grade)</option>
            </select>
          </div>
        </div>

        <!-- Learner Info -->
        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--navy);padding-left:10px">Learner Information</div>
        <div class="row g-3 mb-3">
          <div class="col-md-12">
            <label class="form-label fw-medium" style="font-size:13px">LRN (Learner Reference No.)</label>
            <input type="text" class="form-control" placeholder="12-digit LRN" maxlength="12">
          </div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Last Name *</label><input type="text" class="form-control" placeholder="Last Name"></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">First Name *</label><input type="text" class="form-control" placeholder="First Name"></div>
          <div class="col-md-4"><label class="form-label fw-medium" style="font-size:13px">Middle Name</label><input type="text" class="form-control" placeholder="Middle Name"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Extension</label><input type="text" class="form-control" placeholder="Jr., Sr."></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Date of Birth *</label><input type="date" class="form-control"></div>
          <div class="col-md-2"><label class="form-label fw-medium" style="font-size:13px">Age *</label><input type="number" class="form-control" placeholder="Age"></div>
          <div class="col-md-4">
            <label class="form-label fw-medium d-block" style="font-size:13px">Sex *</label>
            <div class="d-flex gap-4 mt-1">
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-sex" value="Male"> Male</label>
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-sex" value="Female"> Female</label>
            </div>
          </div>
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">Place of Birth *</label><input type="text" class="form-control" placeholder="Municipality/City"></div>
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">Mother Tongue *</label><input type="text" class="form-control" placeholder="Mother Tongue"></div>
          <div class="col-md-6">
            <label class="form-label fw-medium d-block" style="font-size:13px">IP Community Member? *</label>
            <div class="d-flex gap-4 mt-1">
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-ip"> Yes</label>
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-ip"> No</label>
            </div>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-medium d-block" style="font-size:13px">4Ps Beneficiary? *</label>
            <div class="d-flex gap-4 mt-1">
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-4ps"> Yes</label>
              <label style="font-size:14px;cursor:pointer"><input type="radio" name="as-4ps"> No</label>
            </div>
          </div>
        </div>

        <!-- Address -->
        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--cyan);padding-left:10px">Current Address</div>
        <div class="row g-3 mb-3">
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">House No./Street *</label><input type="text" class="form-control" placeholder="House No./Street"></div>
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">Barangay *</label><input type="text" class="form-control" placeholder="Barangay"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Municipality/City *</label><input type="text" class="form-control" placeholder="Municipality/City"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Province *</label><input type="text" class="form-control" placeholder="Province"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Country *</label><input type="text" class="form-control" value="Philippines"></div>
          <div class="col-md-3"><label class="form-label fw-medium" style="font-size:13px">Zip Code *</label><input type="text" class="form-control" placeholder="Zip Code"></div>
        </div>

        <!-- Parent/Guardian -->
        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid var(--cyan);padding-left:10px">Parent / Guardian Information</div>
        <div class="mb-2" style="font-size:12.5px;color:#374151;font-weight:600">Father's Name</div>
        <div class="row g-3 mb-3">
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Last Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="First Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Middle Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Contact Number"></div>
        </div>
        <div class="mb-2" style="font-size:12.5px;color:#374151;font-weight:600">Mother's Maiden Name</div>
        <div class="row g-3 mb-3">
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Last Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="First Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Middle Name"></div>
          <div class="col-md-3"><input type="text" class="form-control" placeholder="Contact Number"></div>
        </div>

        <!-- Account Credentials -->
        <div class="fw-semibold mb-2" style="font-size:13.5px;color:#1e293b;border-left:3px solid #16a34a;padding-left:10px">Account Credentials</div>
        <div class="alert alert-info py-2 mb-3" style="font-size:13px"><i class="bi bi-info-circle me-1"></i>A student account will be created automatically. The Student ID will be auto-generated.</div>
        <div class="row g-3 mb-2">
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">Email Address *</label><input type="email" class="form-control" placeholder="student@email.com"></div>
          <div class="col-md-6"><label class="form-label fw-medium" style="font-size:13px">Temporary Password *</label><input type="password" class="form-control" placeholder="Set temporary password"></div>
        </div>

      </div>
      <div class="modal-footer border-0 pt-0">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-navy btn-sm fw-semibold" onclick="submitAddStudent()"><i class="bi bi-person-check me-1"></i>Enroll Student</button>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: CREATE SECTION — Step 1: Pick Grade Level
-->
<div class="modal fade" id="createSectionModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width:520px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">

      <!-- Header -->
      <div style="background:linear-gradient(135deg,#1e3a8a 0%,#0d9488 100%);padding:24px 28px 20px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <div class="d-flex align-items-center gap-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:22px;color:#fff">
            <i class="bi bi-layout-text-sidebar-reverse"></i>
          </div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff;line-height:1.2">Auto Create Section</div>
            <div style="font-size:12px;color:rgba(255,255,255,.7);margin-top:2px">Select a grade level to begin auto-sectioning</div>
          </div>
        </div>
      </div>

      <!-- Body -->
      <div class="modal-body p-4" style="background:#f8fafc">
        <div style="font-size:13px;color:#64748b;margin-bottom:18px;text-align:center">
          Choose which grade level to auto-section.<br>
          The system will distribute enrolled students into sections automatically.
        </div>

        <!-- Grade Picker Grid -->
        <div class="row g-3">

          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('g7','Grade 7')">
              <div class="grade-pick-icon" style="background:var(--g7-light);color:var(--g7-color)"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-pick-name">Grade 7</div>
              <div class="grade-pick-meta">64 students enrolled</div>
              <div class="grade-pick-badge" style="background:var(--g7-light);color:var(--g7-color)"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>

          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('g8','Grade 8')">
              <div class="grade-pick-icon" style="background:var(--g8-light);color:var(--g8-color)"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-pick-name">Grade 8</div>
              <div class="grade-pick-meta">58 students enrolled</div>
              <div class="grade-pick-badge" style="background:var(--g8-light);color:var(--g8-color)"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>

          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('g9','Grade 9')">
              <div class="grade-pick-icon" style="background:var(--g9-light);color:var(--g9-color)"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-pick-name">Grade 9</div>
              <div class="grade-pick-meta">82 students enrolled</div>
              <div class="grade-pick-badge" style="background:var(--g9-light);color:var(--g9-color)"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>

          <div class="col-6">
            <button class="grade-pick-btn w-100" onclick="triggerAutoSection('g10','Grade 10')">
              <div class="grade-pick-icon" style="background:var(--g10-light);color:var(--g10-color)"><i class="bi bi-mortarboard-fill"></i></div>
              <div class="grade-pick-name">Grade 10</div>
              <div class="grade-pick-meta">67 students enrolled</div>
              <div class="grade-pick-badge" style="background:var(--g10-light);color:var(--g10-color)"><i class="bi bi-magic me-1"></i>Auto-Section</div>
            </button>
          </div>

        </div>
      </div>

      <div class="modal-footer border-0" style="background:#f8fafc;padding:12px 24px">
        <button class="btn btn-outline-secondary btn-sm px-4" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: AUTO-SECTION PREVIEW — Step 2: Review & Confirm
-->
<div class="modal fade" id="autoSectionPreviewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" style="max-width:620px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:18px;overflow:hidden">

      <!-- Header -->
      <div id="asp-header" style="background:linear-gradient(135deg,#1e3a8a,#0d9488);padding:22px 28px 18px;position:relative">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
        <button class="btn btn-sm position-absolute top-0 start-0 m-3 d-flex align-items-center gap-1"
          style="background:rgba(255,255,255,.15);color:#fff;border:1px solid rgba(255,255,255,.3);border-radius:8px;font-size:12px"
          onclick="backToGradePicker()">
          <i class="bi bi-arrow-left"></i> Back
        </button>
        <div class="d-flex align-items-center gap-3 mt-3">
          <div style="width:44px;height:44px;border-radius:12px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:20px;color:#fff">
            <i class="bi bi-magic"></i>
          </div>
          <div>
            <div style="font-size:17px;font-weight:800;color:#fff;line-height:1.2" id="asp-title">Auto-Section Preview</div>
            <div style="font-size:12px;color:rgba(255,255,255,.75);margin-top:2px" id="asp-subtitle">Review generated sections before confirming</div>
          </div>
        </div>
      </div>

      <!-- Summary chips -->
      <div style="background:#fff;border-bottom:1px solid #e2e8f0;padding:14px 24px">
        <div class="d-flex flex-wrap gap-3">
          <div style="display:flex;align-items:center;gap:8px;background:#f1f5f9;border-radius:10px;padding:8px 14px">
            <i class="bi bi-people-fill" style="color:#1e3a8a;font-size:15px"></i>
            <div>
              <div style="font-size:10px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.05em">Total Students</div>
              <div style="font-size:15px;font-weight:800;color:#1e293b" id="asp-total">—</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;background:#f1f5f9;border-radius:10px;padding:8px 14px">
            <i class="bi bi-layout-text-sidebar-reverse" style="color:#0d9488;font-size:15px"></i>
            <div>
              <div style="font-size:10px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.05em">Sections to Create</div>
              <div style="font-size:15px;font-weight:800;color:#1e293b" id="asp-count">—</div>
            </div>
          </div>
          <div style="display:flex;align-items:center;gap:8px;background:#f1f5f9;border-radius:10px;padding:8px 14px">
            <i class="bi bi-person-fill" style="color:#b45309;font-size:15px"></i>
            <div>
              <div style="font-size:10px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:.05em">Max per Section</div>
              <div style="font-size:15px;font-weight:800;color:#1e293b" id="asp-cap">45</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Section preview list -->
      <div class="modal-body" style="background:#f8fafc;padding:20px 24px">
        <div style="background:#eff6ff;border:1px solid #bfdbfe;border-radius:10px;padding:11px 14px;display:flex;align-items:flex-start;gap:10px;margin-bottom:18px">
          <i class="bi bi-info-circle-fill" style="color:#1d4ed8;font-size:15px;flex-shrink:0;margin-top:1px"></i>
          <div style="font-size:12.5px;color:#1e40af;line-height:1.55">
            <strong>Auto-Sectioning Algorithm:</strong> Students are evenly distributed with a cap of <strong>45 students</strong> per section. Sections are named alphabetically (A, B, C…).
          </div>
        </div>
        <div id="asp-sections-list" class="d-flex flex-column gap-3"></div>
      </div>

      <div class="modal-footer border-0" style="background:#f8fafc;padding:14px 24px;gap:10px">
        <button class="btn btn-outline-secondary btn-sm px-4" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-navy btn-sm fw-semibold px-4" onclick="confirmAutoSection()">
          <i class="bi bi-check-circle me-1"></i>Confirm & Create Sections
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: SECTION MENU (Actions for ⋮ button)
-->
<div class="modal fade" id="sectionMenuModal" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="font-size:15px;color:#1e293b" id="sectionMenuTitle">Section Options</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-2 pb-3">
        <div class="list-group list-group-flush">
          <button class="list-group-item list-group-item-action d-flex align-items-center gap-2" style="font-size:14px" onclick="sectionAction('view')">
            <i class="bi bi-people text-navy"></i> View Students
          </button>
          <button class="list-group-item list-group-item-action d-flex align-items-center gap-2" style="font-size:14px" onclick="sectionAction('edit')">
            <i class="bi bi-pencil text-secondary"></i> Edit Section
          </button>
          <button class="list-group-item list-group-item-action d-flex align-items-center gap-2" style="font-size:14px" onclick="sectionAction('assign')">
            <i class="bi bi-person-plus text-success"></i> Assign Students
          </button>
          <button class="list-group-item list-group-item-action d-flex align-items-center gap-2 text-danger" style="font-size:14px" onclick="sectionAction('delete')">
            <i class="bi bi-trash"></i> Delete Section
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 
     MODAL: EXPORT STUDENTS
 -->
<div class="modal fade" id="exportModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" style="color:#1e293b"><i class="bi bi-download me-2 text-navy"></i>Export Student Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">School Year</label>
          <select class="form-select">
            <option>2025–2026</option>
            <option>2024–2025</option>
            <option>2023–2024</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Grade Level</label>
          <select class="form-select">
            <option value="">All Grades</option>
            <option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label fw-medium" style="font-size:13px">Format</label>
          <select class="form-select">
            <option>CSV (.csv)</option>
            <option>Excel (.xlsx)</option>
            <option>PDF (.pdf)</option>
          </select>
        </div>
      </div>
      <div class="modal-footer border-0 pt-0">
        <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-navy btn-sm fw-semibold" data-bs-dismiss="modal"><i class="bi bi-download me-1"></i>Export Now</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script>

/*  ACTION DROPDOWN MENU  */
let _openMenuWrap = null;

function toggleActionMenu(e, btn) {
  e.stopPropagation();
  const wrap = btn.closest('.action-menu-wrap');
  if (_openMenuWrap && _openMenuWrap !== wrap) {
    _openMenuWrap.classList.remove('open');
  }
  wrap.classList.toggle('open');
  _openMenuWrap = wrap.classList.contains('open') ? wrap : null;
}

document.addEventListener('click', function() {
  if (_openMenuWrap) { _openMenuWrap.classList.remove('open'); _openMenuWrap = null; }
});

function closeMenuThen(fn) {
  if (_openMenuWrap) { _openMenuWrap.classList.remove('open'); _openMenuWrap = null; }
  fn();
}

function getAppRowBtn(el, appId) {
  // Returns a sentinel object the confirmReject can use to locate the row
  const row = el.closest('tr');
  return { closest: (sel) => row };
}

function approveAppByRow(el, appId, name) {
  const row = el.closest('tr');
  row.querySelector('td:nth-child(5)').innerHTML = '<span class="badge-approved">Approved</span>';
}

/*  CHARTS */
document.addEventListener('DOMContentLoaded', function () {
  new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
      labels: ['Grade 7','Grade 8','Grade 9','Grade 10'],
      datasets: [{ label:'Students', data:[170,165,195,215], backgroundColor:'#3b82f6', borderRadius:4, borderSkipped:false }]
    },
    options: {
      responsive:true, maintainAspectRatio:false,
      plugins:{ legend:{ display:false } },
      scales:{
        y:{ beginAtZero:true, max:240, ticks:{ stepSize:55, color:'#94a3b8', font:{size:11} }, grid:{ color:'rgba(148,163,184,0.15)' } },
        x:{ ticks:{ color:'#64748b', font:{size:11} }, grid:{ display:false } }
      }
    }
  });
  new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
      labels: ['Male','Female'],
      datasets:[{ data:[640,605], backgroundColor:['#1e3a8a','#0d9488'], borderWidth:2, borderColor:'#ffffff' }]
    },
    options:{ responsive:true, maintainAspectRatio:false, cutout:'60%', plugins:{ legend:{ display:false } } }
  });
});

/*  TAB SWITCHING  */
function switchAdminTab(tab, el) {
  document.querySelectorAll('.admin-tab').forEach(t => t.classList.remove('active'));
  if (el) el.classList.add('active');
  ['applications','students','sections'].forEach(t => {
    document.getElementById('admin-tab-' + t).classList.toggle('d-none', t !== tab);
  });
}

/*  TABLE SEARCH  */
function filterTable(tableId, q) {
  document.querySelectorAll('#' + tableId + ' tbody tr').forEach(r => {
    r.style.display = r.textContent.toLowerCase().includes(q.toLowerCase()) ? '' : 'none';
  });
}

/*  GRADE ACCORDION  */
function toggleGrade(id) {
  document.getElementById(id).classList.toggle('open');
}

/*  BOOTSTRAP MODAL HELPERS  */
function bsModal(id) { return new bootstrap.Modal(document.getElementById(id)); }

/*  REJECTED LIST  */
const rejectedStudents = [
  { appId:'APP007', name:'Rico Fernandez', grade:'Grade 7',  date:'March 14, 2026', rejectedBy:'Admin User', reason:'Incomplete requirements' },
  { appId:'APP008', name:'Maria Santos',  grade:'Grade 9',  date:'March 13, 2026', rejectedBy:'Admin User', reason:'Does not meet age requirements' },
  { appId:'APP009', name:'Kevin Lim',     grade:'Grade 10', date:'March 12, 2026', rejectedBy:'Admin User', reason:'Duplicate application' },
];

function openRejectedModal() {
  const body = document.getElementById('rejectedListBody');
  if (!rejectedStudents.length) {
    body.innerHTML = '<div class="text-center text-muted py-4"><i class="bi bi-check-circle" style="font-size:32px"></i><div class="mt-2">No rejected applications</div></div>';
  } else {
    body.innerHTML = rejectedStudents.map(s => `
      <div class="card border rounded-3 p-3 mb-3">
        <div class="d-flex align-items-start justify-content-between flex-wrap gap-2">
          <div>
            <div class="fw-semibold" style="font-size:14px;color:#1e293b">${s.name}</div>
            <div class="text-muted" style="font-size:12px">${s.appId} &bull; ${s.grade} &bull; Applied: ${s.date}</div>
          </div>
          <span class="badge-rejected">Rejected</span>
        </div>
        <div class="mt-2 p-2 rounded-2" style="background:#fff5f5;border:1px solid #fecaca">
          <div style="font-size:12px;color:#64748b">Reason for Rejection</div>
          <div style="font-size:13.5px;color:#991b1b;font-weight:600">${s.reason}</div>
        </div>
        <div class="mt-2" style="font-size:12px;color:#64748b"><i class="bi bi-person-fill me-1"></i>Rejected by: <strong>${s.rejectedBy}</strong></div>
      </div>`).join('');
  }
  bsModal('rejectedModal').show();
}

/*  REJECT WITH REASON  */
let _rejectContext = null;

function openRejectReasonModal(appId, name, btn) {
  _rejectContext = { appId, name, btn };
  document.getElementById('rejectStudentName').textContent = name;
  document.getElementById('rejectAppId').textContent = appId;
  document.getElementById('rejectReasonSelect').value = '';
  document.getElementById('rejectCustomReason').value = '';
  document.getElementById('customReasonWrap').classList.add('d-none');
  bsModal('rejectReasonModal').show();
}

function toggleCustomReason(val) {
  document.getElementById('customReasonWrap').classList.toggle('d-none', val !== 'other');
}

function confirmReject() {
  const sel = document.getElementById('rejectReasonSelect').value;
  const custom = document.getElementById('rejectCustomReason').value.trim();
  if (!sel) { alert('Please select a reason.'); return; }
  const reason = sel === 'other' ? (custom || 'Other') : sel;

  if (_rejectContext) {
    // Locate the row via the stored btn (may be sentinel or real button)
    let row;
    try { row = _rejectContext.btn.closest('tr'); } catch(e) { row = null; }
    if (row) {
      row.querySelector('td:nth-child(5)').innerHTML = '<span class="badge-rejected">Rejected</span>';
    }

    // Add to rejected list
    rejectedStudents.push({
      appId: _rejectContext.appId,
      name:  _rejectContext.name,
      grade: row ? row.cells[2].textContent : '—',
      date:  row ? row.cells[3].textContent : '—',
      rejectedBy: 'Admin User',
      reason
    });
  }
  bootstrap.Modal.getInstance(document.getElementById('rejectReasonModal')).hide();
}

/*  APPROVE  */
function approveApp(btn, appId, name) {
  const row = btn.closest('tr');
  row.querySelector('td:nth-child(5)').innerHTML = '<span class="badge-approved">Approved</span>';
  row.querySelectorAll('.btn-success,.btn-danger').forEach(b => b.disabled = true);
}

/*  STUDENT PROFILE  */
const sampleProfiles = {
  'APP001': { sy:'2025–2026', grade:'Grade 10', lrn:'202600100001', lname:'Johnson', fname:'Emma',   mname:'Grace',    dob:'March 1, 2010',   age:16, sex:'Female', pob:'Naga City',     tongue:'Bikol',   ip:'No', fours:'No',  address:'12 Rizal St., Brgy. Concepcion, Naga City, Camarines Sur, Philippines, 4400', father:'Robert Johnson – 09171234567', mother:'Mary Johnson – 09181234567', guardian:'N/A', section:null },
  'APP002': { sy:'2025–2026', grade:'Grade 9',  lrn:'202600100002', lname:'Chen',    fname:'Michael', mname:'Tan',      dob:'June 14, 2011',   age:15, sex:'Male',   pob:'Minalabac',     tongue:'Tagalog', ip:'No', fours:'Yes', address:'45 Magsaysay Ave., Brgy. Centro, Minalabac, Camarines Sur, Philippines, 4413', father:'James Chen – 09271234567', mother:'Li Chen – 09291234567', guardian:'N/A', section:null },
  'APP003': { sy:'2025–2026', grade:'Grade 8',  lrn:'202600100003', lname:'Williams',fname:'Sarah',   mname:'Mae',      dob:'Sept 22, 2012',   age:13, sex:'Female', pob:'Sipocot',       tongue:'Bikol',   ip:'No', fours:'No',  address:'7 Del Pilar St., Brgy. San Jose, Sipocot, Camarines Sur, Philippines, 4408', father:'Tom Williams – 09371234567', mother:'Ann Williams – 09381234567', guardian:'N/A', section:null },
  'APP004': { sy:'2025–2026', grade:'Grade 8',  lrn:'202600100004', lname:'Brown',   fname:'James',   mname:'Earl',     dob:'Jan 5, 2012',     age:14, sex:'Male',   pob:'Camaligan',     tongue:'Bikol',   ip:'Yes',fours:'No',  address:'3 Mabini Rd., Brgy. Dugcal, Camaligan, Camarines Sur, Philippines, 4402', father:'George Brown – 09471234567', mother:'Susan Brown – 09481234567', guardian:'N/A', section:null },
  'APP005': { sy:'2025–2026', grade:'Grade 7',  lrn:'202600100005', lname:'Davis',   fname:'Lisa',    mname:'Rose',     dob:'Aug 30, 2013',    age:12, sex:'Female', pob:'Pili',          tongue:'Bikol',   ip:'No', fours:'Yes', address:'88 National Hi-way, Brgy. Tinangis, Pili, Camarines Sur, Philippines, 4418', father:'Mark Davis – 09571234567', mother:'Janet Davis – 09581234567', guardian:'N/A', section:null },
  'APP006': { sy:'2025–2026', grade:'Grade 7',  lrn:'202600100006', lname:'Reyes',   fname:'Carlos',  mname:'Buenaventura', dob:'Dec 12, 2013', age:12, sex:'Male',   pob:'Minalabac', tongue:'Bikol',   ip:'No', fours:'No',  address:'21 Bonifacio St., Brgy. Dugcal, Minalabac, Camarines Sur, Philippines, 4413', father:'Pedro Reyes – 09671234567', mother:'Teresa Reyes – 09681234567', guardian:'N/A', section:null },
  'STU2024001': { sy:'2025–2026', grade:'Grade 10', lrn:'202400100001', lname:'Smith',   fname:'John',   mname:'Paul',  dob:'Feb 10, 2009',  age:17, sex:'Male',   pob:'Naga City',  tongue:'Bikol',   ip:'No', fours:'No',  address:'55 P. Burgos St., Brgy. Triangulo, Naga City, Camarines Sur, Philippines, 4400', father:'Henry Smith – 09111234567', mother:'Grace Smith – 09121234567', guardian:'N/A', stuid:'STU2024001', section:'Section A', enrolled:true },
  'STU2024002': { sy:'2025–2026', grade:'Grade 9',  lrn:'202400100002', lname:'Cooper',  fname:'Alice',  mname:'May',   dob:'July 4, 2010',  age:15, sex:'Female', pob:'Iriga City', tongue:'Bikol',   ip:'No', fours:'Yes', address:'10 Quezon Ave., Brgy. San Nicolas, Iriga City, Camarines Sur, Philippines, 4431', father:'Frank Cooper – 09211234567', mother:'Ellen Cooper – 09221234567', guardian:'N/A', stuid:'STU2024002', section:'Section B', enrolled:true },
  'STU2024003': { sy:'2025–2026', grade:'Grade 9',  lrn:'202400100003', lname:'Wilson',  fname:'Bob',    mname:'Ray',   dob:'Oct 18, 2010',  age:15, sex:'Male',   pob:'Libmanan',   tongue:'Tagalog', ip:'No', fours:'No',  address:'66 Aurora Blvd., Brgy. Sta. Cruz, Libmanan, Camarines Sur, Philippines, 4407', father:'Steve Wilson – 09311234567', mother:'Carol Wilson – 09321234567', guardian:'N/A', stuid:'STU2024003', section:'Section A', enrolled:true },
  'STU2024004': { sy:'2025–2026', grade:'Grade 10', lrn:'202400100004', lname:'Martinez',fname:'Carol',  mname:'Luz',   dob:'April 25, 2009',age:17, sex:'Female', pob:'Minalabac',  tongue:'Bikol',   ip:'No', fours:'Yes', address:'34 Garcia St., Brgy. Centro, Minalabac, Camarines Sur, Philippines, 4413', father:'Jose Martinez – 09411234567', mother:'Luz Martinez – 09421234567', guardian:'N/A', stuid:'STU2024004', section:'Section C', enrolled:true },
  'STU2024005': { sy:'2025–2026', grade:'Grade 8',  lrn:'202400100005', lname:'Lee',     fname:'David',  mname:'Han',   dob:'Nov 3, 2011',   age:14, sex:'Male',   pob:'Goa',        tongue:'Bikol',   ip:'No', fours:'No',  address:'9 Dimasalang St., Brgy. Tabgon, Goa, Camarines Sur, Philippines, 4422', father:'Jin Lee – 09511234567', mother:'Soo Lee – 09521234567', guardian:'N/A', stuid:'STU2024005', section:'Section B', enrolled:true },
};

function openStudentProfile(type, id) {
  const p = sampleProfiles[id];
  if (!p) return;

  // ── Header / Hero ──
  const initials = (p.fname[0] + p.lname[0]).toUpperCase();
  document.getElementById('p-avatar-circle').textContent = initials;
  document.getElementById('p-fullname').textContent = `${p.fname} ${p.mname ? p.mname + ' ' : ''}${p.lname}`;
  document.getElementById('p-grade-badge').textContent = p.grade;
  document.getElementById('p-sy-badge').textContent = 'SY ' + p.sy;

  const statusBadge = document.getElementById('p-status-badge');
  if (p.enrolled) {
    statusBadge.textContent = '● Enrolled';
    statusBadge.style.cssText = 'background:#dcfce7;color:#166534;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px';
    document.getElementById('profileSubtitle').textContent = 'Enrolled Student – Full Profile';
  } else {
    statusBadge.textContent = '● Applicant';
    statusBadge.style.cssText = 'background:#fef3c7;color:#92400e;font-size:12px;font-weight:700;padding:3px 10px;border-radius:20px';
    document.getElementById('profileSubtitle').textContent = 'Admission Application – Full Details';
  }

  // ── Quick strip ──
  document.getElementById('p-lrn-strip').textContent   = 'LRN: ' + (p.lrn || '—');
  document.getElementById('p-pob-strip').textContent   = p.pob || '—';
  document.getElementById('p-dob-strip').textContent   = p.dob || '—';
  const stuStrip = document.getElementById('p-stuid-strip');
  if (p.enrolled && p.stuid) {
    stuStrip.textContent = p.stuid;
    stuStrip.style.display = '';
  } else {
    stuStrip.style.display = 'none';
  }

  // ── Learner Info ──
  document.getElementById('p-lname2').textContent  = p.lname;
  document.getElementById('p-fname2').textContent  = p.fname;
  document.getElementById('p-mname2').textContent  = p.mname || '';
  document.getElementById('p-lrn').textContent     = p.lrn || '—';
  document.getElementById('p-dob').textContent     = p.dob;
  document.getElementById('p-age').textContent     = p.age;
  document.getElementById('p-sex').textContent     = p.sex;
  document.getElementById('p-tongue').textContent  = p.tongue;
  document.getElementById('p-pob').textContent     = p.pob;
  document.getElementById('p-ip').textContent      = p.ip;
  document.getElementById('p-4ps').textContent     = p.fours;

  // ── Address ──
  document.getElementById('p-address').textContent = p.address;

  // ── Parents ──
  const fName = p.father  ? p.father.split('–')[0]?.trim()  : '—';
  const fCont = p.father  ? p.father.split('–')[1]?.trim()  : '—';
  const mName = p.mother  ? p.mother.split('–')[0]?.trim()  : '—';
  const mCont = p.mother  ? p.mother.split('–')[1]?.trim()  : '—';
  document.getElementById('p-father').textContent   = fName;
  document.getElementById('p-father-c').textContent = fCont;
  document.getElementById('p-mother').textContent   = mName;
  document.getElementById('p-mother-c').textContent = mCont;
  document.getElementById('p-guardian').textContent = p.guardian || 'N/A';

  // ── Enrollment block ──
  const block = document.getElementById('p-section-block');
  if (p.enrolled) {
    block.style.display = '';
    document.getElementById('p-stuid').textContent   = p.stuid;
    document.getElementById('p-section').textContent = p.section;
  } else {
    block.style.display = 'none';
  }

  // ── Hidden compat spans ──
  document.getElementById('p-lname').textContent = p.lname;
  document.getElementById('p-fname').textContent = p.fname;
  document.getElementById('p-mname').textContent = p.mname || '—';
  document.getElementById('p-sy').textContent    = p.sy;
  document.getElementById('p-grade').textContent = p.grade;

  bsModal('studentProfileModal').show();
}

/*  ADD STUDENT  */
const sectionsByGrade = {
  'Grade 7':  [],
  'Grade 8':  [],
  'Grade 9':  [],
  'Grade 10': [],
};

document.getElementById('as-grade').addEventListener('change', function() {
  const sel = document.getElementById('as-section');
  const opts = sectionsByGrade[this.value] || [];
  sel.innerHTML = '<option value="">Select section</option>' + opts.map(s=>`<option>${s}</option>`).join('');
});

function openAddStudentModal() { bsModal('addStudentModal').show(); }

function submitAddStudent() {
  const grade   = document.getElementById('as-grade').value;
  const section = document.getElementById('as-section').value;
  if (!grade || !section) { alert('Please select a grade level and section.'); return; }
  bootstrap.Modal.getInstance(document.getElementById('addStudentModal')).hide();
  setTimeout(() => alert('Student enrolled successfully! A new Student ID has been generated.'), 300);
}

/*  CREATE SECTION  */
/*  CREATE SECTION — Auto-Sectioning  */

const gradeColors = {
  g7:  { fill:'fill-teal',  bg:'var(--g7-light)', color:'var(--g7-color)',  headerBg:'linear-gradient(135deg,#0d9488,#0891b2)' },
  g8:  { fill:'fill-amber', bg:'var(--g8-light)', color:'var(--g8-color)',  headerBg:'linear-gradient(135deg,#d97706,#b45309)' },
  g9:  { fill:'fill-rose',  bg:'var(--g9-light)', color:'var(--g9-color)',  headerBg:'linear-gradient(135deg,#db2777,#be185d)' },
  g10: { fill:'fill-navy',  bg:'var(--g10-light)',color:'var(--g10-color)', headerBg:'linear-gradient(135deg,#1e3a8a,#1d4ed8)' },
};

// Enrolled student counts per grade (source of truth for algorithm)
const enrolledCounts = { g7: 64, g8: 58, g9: 82, g10: 67 };

const SECTION_LETTERS = ['A','B','C','D','E','F','G','H','I','J'];
const MAX_CAP = 45;

let _autoSectionPlan  = null;
let _autoSectionGrade = null;

function openCreateSectionModal() { bsModal('createSectionModal').show(); }

/* ── Auto-section algorithm ──────────────────────────────────────*/
  
function autoSectionAlgorithm(totalStudents, cap) {
  if (totalStudents <= 0) return [];
  const numSections = Math.ceil(totalStudents / cap);
  const base        = Math.floor(totalStudents / numSections);
  const remainder   = totalStudents % numSections;
  return Array.from({ length: numSections }, (_, i) => ({
    name:     'Section ' + SECTION_LETTERS[i],
    students: base + (i < remainder ? 1 : 0),
    cap
  }));
}

function triggerAutoSection(gradeId, gradeLabel) {
  _autoSectionGrade = { id: gradeId, label: gradeLabel };
  const total = enrolledCounts[gradeId] || 0;
  const plan  = autoSectionAlgorithm(total, MAX_CAP);
  _autoSectionPlan  = plan;

  const c = gradeColors[gradeId];

  // Update preview modal header
  document.getElementById('asp-header').style.background  = c.headerBg;
  document.getElementById('asp-title').textContent        = `Auto-Section: ${gradeLabel}`;
  document.getElementById('asp-subtitle').textContent     = `${plan.length} section(s) will be created automatically`;
  document.getElementById('asp-total').textContent        = total;
  document.getElementById('asp-count').textContent        = plan.length;
  document.getElementById('asp-cap').textContent          = MAX_CAP;

  // Build section preview cards
  const list = document.getElementById('asp-sections-list');
  list.innerHTML = '';
  plan.forEach(sec => {
    const pct = Math.round((sec.students / sec.cap) * 100);
    list.innerHTML += `
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden">
        <div style="padding:14px 18px;display:flex;align-items:center;gap:14px">
          <div style="width:42px;height:42px;border-radius:10px;background:${c.bg};display:flex;align-items:center;justify-content:center;font-size:18px;color:${c.color};flex-shrink:0">
            <i class="bi bi-book-fill"></i>
          </div>
          <div style="flex:1;min-width:0">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px">
              <div style="font-weight:700;font-size:14px;color:#1e293b">${sec.name}</div>
              <div style="font-size:12px;font-weight:600;color:${c.color};background:${c.bg};padding:2px 10px;border-radius:20px">${sec.students} / ${sec.cap} students</div>
            </div>
            <div style="height:6px;background:#f1f5f9;border-radius:10px;overflow:hidden">
              <div style="height:100%;width:${pct}%;background:${c.color};border-radius:10px"></div>
            </div>
            <div style="font-size:11px;color:#94a3b8;margin-top:4px">${pct}% capacity used</div>
          </div>
        </div>
      </div>`;
  });

  // Step 1 → Step 2
  bootstrap.Modal.getInstance(document.getElementById('createSectionModal')).hide();
  setTimeout(() => bsModal('autoSectionPreviewModal').show(), 350);
}

function backToGradePicker() {
  bootstrap.Modal.getInstance(document.getElementById('autoSectionPreviewModal')).hide();
  setTimeout(() => bsModal('createSectionModal').show(), 350);
}

function confirmAutoSection() {
  if (!_autoSectionPlan || !_autoSectionGrade) return;
  const { id: gradeId, label: gLabel } = _autoSectionGrade;
  const c    = gradeColors[gradeId];
  const wrap = document.getElementById(gradeId + '-sections');

  // Clear empty-state placeholder and any previous sections
  wrap.innerHTML = '';

  _autoSectionPlan.forEach(sec => {
    const pct    = Math.round((sec.students / sec.cap) * 100);
    const newRow = document.createElement('div');
    newRow.className = 'section-row';
    newRow.innerHTML = `
      <div class="section-top">
        <div class="section-icon" style="background:${c.bg};color:${c.color}"><i class="bi bi-book-fill"></i></div>
        <div><div class="section-title">${sec.name}</div></div>
        <div class="action-menu-wrap position-relative" style="margin-left:auto">
          <button class="section-menu action-dots-btn" onclick="toggleActionMenu(event,this)">&#8942;</button>
          <div class="action-dropdown shadow-sm" style="right:0;min-width:160px">
            <button class="action-item" onclick="closeMenuThen(()=>sectionActionCtx('${gradeId}','${sec.name}','view'))"><i class="bi bi-people text-navy"></i> View Students</button>
            <button class="action-item" onclick="closeMenuThen(()=>sectionActionCtx('${gradeId}','${sec.name}','edit'))"><i class="bi bi-pencil text-secondary"></i> Edit Section</button>
            <button class="action-item" onclick="closeMenuThen(()=>sectionActionCtx('${gradeId}','${sec.name}','assign'))"><i class="bi bi-person-plus text-success"></i> Assign Students</button>
            <button class="action-item text-danger" onclick="closeMenuThen(()=>sectionActionCtx('${gradeId}','${sec.name}','delete'))"><i class="bi bi-trash"></i> Delete Section</button>
          </div>
        </div>
      </div>
      <div class="cap-row"><span class="cap-label">Capacity</span><span class="cap-value">${sec.students} / ${sec.cap} students</span></div>
      <div class="cap-bar"><div class="fill ${c.fill}" style="width:${pct}%"></div></div>`;
    wrap.appendChild(newRow);

    // Sync sectionsByGrade for Add Student modal
    if (!sectionsByGrade[gLabel].includes(sec.name)) sectionsByGrade[gLabel].push(sec.name);
  });

  // Update grade-level meta & progress bar
  const total    = enrolledCounts[gradeId];
  const totalCap = _autoSectionPlan.length * MAX_CAP;
  const fillPct  = Math.round((total / totalCap) * 100);
  document.getElementById(gradeId + '-meta').textContent = `${_autoSectionPlan.length} Sections \u2022 ${total} / ${totalCap} Students`;
  const fillBar = document.querySelector(`#${gradeId} .grade-pill-bar .fill`);
  if (fillBar) fillBar.style.width = fillPct + '%';

  // Open grade card
  document.getElementById(gradeId).classList.add('open');

  bootstrap.Modal.getInstance(document.getElementById('autoSectionPreviewModal')).hide();
  setTimeout(() => {
    const toast = document.createElement('div');
    toast.style.cssText = 'position:fixed;bottom:28px;left:50%;transform:translateX(-50%);background:#1e293b;color:#fff;padding:12px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:99999;box-shadow:0 8px 24px rgba(0,0,0,.18);display:flex;align-items:center;gap:10px';
    toast.innerHTML = `<i class="bi bi-check-circle-fill" style="color:#4ade80;font-size:18px"></i>${_autoSectionPlan.length} section(s) created for ${gLabel}!`;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3200);
    _autoSectionPlan  = null;
    _autoSectionGrade = null;
  }, 350);
}

/* Legacy stub — kept so any old confirmCreateSection() calls don't break */
function confirmCreateSection() { openCreateSectionModal(); }

/*  SECTION MENU (inline ⋮)  */
let _currentSectionCtx = null;

/* Legacy – kept for createSection-generated rows */
function openSectionMenu(e, gradeId, sectionName) {
  e.stopPropagation();
  _currentSectionCtx = { gradeId, sectionName };
  sectionActionCtx(gradeId, sectionName, null); // no-op stub; inline menu handles it now
}

/* Called directly by inline dropdown items */
function sectionActionCtx(gradeId, sectionName, action) {
  _currentSectionCtx = { gradeId, sectionName };
  const gLabel = { g7:'Grade 7', g8:'Grade 8', g9:'Grade 9', g10:'Grade 10' }[gradeId];
  if (!action) return;
  setTimeout(() => {
    if (action === 'view')   alert(`Viewing students of ${gLabel} – ${sectionName}`);
    if (action === 'edit')   alert(`Edit section: ${gLabel} – ${sectionName}`);
    if (action === 'assign') alert(`Assign students to ${gLabel} – ${sectionName}`);
    if (action === 'delete') { if (confirm(`Delete ${sectionName} from ${gLabel}?`)) alert('Section deleted.'); }
  }, 150);
}

/* Legacy alias so confirmCreateSection-generated rows still work */
function sectionAction(action) {
  const { gradeId, sectionName } = _currentSectionCtx || {};
  sectionActionCtx(gradeId, sectionName, action);
}

/*  EXPORT MODAL  */
function openExportModal() { bsModal('exportModal').show(); }

</script>

<?php include 'footer.php'; ?>