<?php $pageTitle = 'Student Portal – DPNHS'; ?>
<?php include 'header.php'; ?> 


<!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->

<div class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 py-2 sticky-top" style="z-index:100">
  <div class="d-flex align-items-center gap-2">
    <button class="btn btn-sm d-lg-none me-1 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#studentSidebar" aria-controls="studentSidebar">
      <i class="bi bi-list fs-5"></i>
    </button>
    <img src="/logo.png" class="brand-logo" alt="DPNHS Logo" style="width:55px;height:55px;">
    <div>
      <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">DPNHS</div>
      <div class="text-muted" style="font-size:11px">Student Portal</div>
    </div>
  </div>
  <div class="d-flex align-items-center gap-2">
    <div class="brand-logo" style="background:#64748b">JS</div>
    <div class="d-none d-md-block">
      <div class="fw-semibold" style="font-size:14px;color:#1e293b">John Smith</div>
      <div class="text-muted" style="font-size:12px">STU2024001</div>
    </div>
    <a href="/index" class="topbar-icon text-decoration-none" title="Logout"><i class="bi bi-box-arrow-right"></i></a>
  </div>
</div>

<div class="d-flex" style="min-height:calc(100vh - 62px)">

  <!-- OFFCANVAS SIDEBAR (mobile) -->
  <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="studentSidebar" style="width:270px">
    <div class="offcanvas-header border-bottom">
      <div class="fw-bold" style="font-size:14px;color:#1e293b">Student Information</div>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body p-3">
      <div class="stu-profile-avatar mx-auto mb-1">JS</div>
      <p class="text-center text-muted mb-4" style="font-size:11px">Click to upload photo</p>
      <div class="fw-bold mt-4 mb-2" style="font-size:12px;color:#64748b;text-transform:uppercase;letter-spacing:.6px">Menu</div>
      <nav class="d-flex flex-column gap-1" id="mobileNav">
        <button onclick="showPanel('new-student')" class="sidebar-nav-btn active" data-panel="new-student">
          <i class="bi bi-person-plus-fill me-2"></i> New Student / Applicant
        </button>
        <button onclick="showPanel('student-info')" class="sidebar-nav-btn " data-panel="student-info">
          <i class="bi bi-person-lines-fill me-2"></i> Student Information
        </button>
        <button onclick="showPanel('grade-section')" class="sidebar-nav-btn" data-panel="grade-section">
          <i class="bi bi-grid-3x3-gap-fill me-2"></i> Grade and Section
        </button>


      </nav>
    </div>
  </div>

  <!-- STATIC SIDEBAR (desktop) -->
  <div class="bg-white border-end p-3 flex-shrink-0 d-none d-lg-flex flex-column" style="width:270px;min-height:100%">
    <div class="fw-bold mb-3 text-center" style="font-size:14px;color:#1e293b">Student Profile</div>
    <div class="stu-profile-avatar mx-auto mb-1">JS</div>
    <p class="text-center text-muted mb-1" style="font-size:11px">Click to upload photo</p>
    <p class="text-center fw-semibold mb-0" style="font-size:13px;color:#1e293b">John Smith</p>
    <p class="text-center text-muted mb-3" style="font-size:12px">STU2024001</p>

    <div class="fw-bold mt-2 mb-2" style="font-size:12px;color:#64748b;text-transform:uppercase;letter-spacing:.6px">Menu</div>
    <nav class="d-flex flex-column gap-1" id="desktopNav">
      <button onclick="showPanel('new-student')" class="sidebar-nav-btn active" data-panel="new-student">
        <i class="bi bi-person-plus-fill me-2"></i> New Student / Applicant
      </button>
      <button onclick="showPanel('student-info')" class="sidebar-nav-btn" data-panel="student-info" >
        <i class="bi bi-person-lines-fill me-2"></i> Student Information
      </button>
      <button onclick="showPanel('grade-section')" class="sidebar-nav-btn" data-panel="grade-section" >
        <i class="bi bi-grid-3x3-gap-fill me-2"></i> Grade and Section
      </button>
    </nav>
  </div>

  <!-- MAIN CONTENT -->
  <div class="flex-grow-1 overflow-y-auto" style="background:#f1f5f9">

    <!-- ===== PANEL: NEW STUDENT / APPLICANT ===== -->
    <div id="panel-new-student" class="panel-section p-3 p-md-4">
      <div class="fw-bold mb-1" style="font-size:22px;color:#1e293b">New Student / Applicant</div>
      <div class="text-muted mb-4" style="font-size:14px">SY 2021 – 2022 &nbsp;|&nbsp; Complete the steps below to process your enrollment</div>

      <!-- Step Cards -->
      <div class="d-flex flex-column gap-3 mb-4" style="max-width:680px">

        <!-- Submit Application -->
        <div class="card border rounded-3 p-0 overflow-hidden step-card">
          <div class="d-flex align-items-center px-4 py-3" style="background:#1e3a5f">
            <div class="step-num me-3">1</div>
            <div class="flex-grow-1">
              <div class="fw-bold text-white" style="font-size:14.5px">Submit Application</div>
              <div class="text-white-50" style="font-size:12px">Fill out the enrollment form</div>
            </div>
            <button class="btn btn-sm btn-light fw-semibold px-3" onclick="showSubPanel('application-form')" style="font-size:13px">
              <i class="bi bi-pencil-fill me-1"></i>Open Form
            </button>
          </div>
          <div class="px-4 py-2" style="background:#f8fafc;border-top:1px solid #e2e8f0">
            <span class="badge bg-warning-subtle text-warning" style="font-size:11px"><i class="bi bi-clock me-1"></i>Pending</span>
            <span class="text-muted ms-2" style="font-size:12px">No record/s found.</span>
          </div>
        </div>

        <!-- Submit Requirements -->
        <div class="card border rounded-3 p-0 overflow-hidden step-card">
          <div class="d-flex align-items-center px-4 py-3" style="background:#c0392b">
            <div class="step-num me-3">2</div>
            <div class="flex-grow-1">
              <div class="fw-bold text-white" style="font-size:14.5px">Submit Requirements</div>
              <div class="text-white-50" style="font-size:12px">For a list of requirements <a href="#" class="text-white-50">click here</a></div>
            </div>
            <button class="btn btn-sm btn-light fw-semibold px-3" onclick="showSubPanel('requirements')" style="font-size:13px">
              <i class="bi bi-upload me-1"></i>Upload
            </button>
          </div>
          <div class="px-4 py-2" style="background:#f8fafc;border-top:1px solid #e2e8f0">
            <span class="badge bg-warning-subtle text-warning" style="font-size:11px"><i class="bi bi-clock me-1"></i>Pending</span>
            <span class="text-muted ms-2" style="font-size:12px">No record/s found.</span>
          </div>
        </div>

        <!-- Special Needs Requirements -->
        <div class="card border rounded-3 p-0 overflow-hidden step-card">
          <div class="d-flex align-items-center px-4 py-3" style="background:#c0392b">
            <div class="step-num me-3">3</div>
            <div class="flex-grow-1">
              <div class="fw-bold text-white" style="font-size:14.5px">Special Needs Requirements</div>
              <div class="text-white-50" style="font-size:12px">Additional docs for learners with special needs</div>
            </div>
            <button class="btn btn-sm btn-light fw-semibold px-3" onclick="showSubPanel('special-needs')" style="font-size:13px">
              <i class="bi bi-file-earmark-plus me-1"></i>Upload
            </button>
          </div>
          <div class="px-4 py-2" style="background:#f8fafc;border-top:1px solid #e2e8f0">
            <span class="badge bg-secondary-subtle text-secondary" style="font-size:11px"><i class="bi bi-dash-circle me-1"></i>N/A</span>
            <span class="text-muted ms-2" style="font-size:12px">No record/s found.</span>
          </div>
        </div>

      </div>

      <!-- SUB-PANEL: Application Form -->
      <div id="sub-application-form" class="sub-panel d-none" style="width:100%">
        <div class="d-flex align-items-center gap-2 mb-3">
          <button class="btn btn-sm btn-outline-secondary" onclick="hideSubPanel()"><i class="bi bi-arrow-left"></i> Back</button>
          <h5 class="mb-0 fw-bold" style="color:#1e293b">Enrollment Application Form</h5>
        </div>

        <!-- SINGLE CARD: All form sections inside -->
        <div class="card border rounded-3 p-4 pb-3 mb-4">

          <!-- Card Header -->
          <div class="text-center pb-3 mb-3" style="border-bottom:2px solid #1e3a5f">
            <div class="fw-bold" style="font-size:18px;color:#1e293b;letter-spacing:.3px">Enhanced Basic Education Enrollment Form</div>
            <div class="text-muted" style="font-size:13px">Please fill out all required fields accurately</div>
          </div>

          <!-- ROW 1: School Info + Learner Reference -->
          <div class="row g-3 mb-3 pb-3" style="border-bottom:1px solid #e2e8f0">
            <div class="col-12">
              <div class="fw-semibold mb-2" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">School Information</div>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-medium" style="font-size:12px">School Year *</label>
              <input type="text" class="form-control form-control-sm" placeholder="e.g., 2026-2027">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-medium" style="font-size:12px">Grade Level to Enroll *</label>
              <select class="form-select form-select-sm">
                <option value="">Select grade level</option>
                <option>Grade 7</option><option>Grade 8</option>
                <option>Grade 9</option><option>Grade 10</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-medium" style="font-size:12px">Learner Reference No. (LRN)</label>
              <input type="text" class="form-control form-control-sm" placeholder="12-digit LRN" maxlength="12">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-medium" style="font-size:12px">Mother Tongue *</label>
              <input type="text" class="form-control form-control-sm" placeholder="Mother Tongue">
            </div>
          </div>

          <!-- ROW 2: Learner Info -->
          <div class="row g-3 mb-3 pb-3" style="border-bottom:1px solid #e2e8f0">
            <div class="col-12">
              <div class="fw-semibold mb-2" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">Learner Information <span class="fw-normal text-muted" style="font-size:11px;text-transform:none">&nbsp;— as per PSA Birth Certificate</span></div>
            </div>
            <div class="col-md-3"><label class="form-label fw-medium" style="font-size:12px">Last Name *</label><input type="text" class="form-control form-control-sm" placeholder="Last Name"></div>
            <div class="col-md-3"><label class="form-label fw-medium" style="font-size:12px">First Name *</label><input type="text" class="form-control form-control-sm" placeholder="First Name"></div>
            <div class="col-md-3"><label class="form-label fw-medium" style="font-size:12px">Middle Name</label><input type="text" class="form-control form-control-sm" placeholder="Middle Name"></div>
            <div class="col-md-3"><label class="form-label fw-medium" style="font-size:12px">Extension Name</label><input type="text" class="form-control form-control-sm" placeholder="Jr., Sr., III"></div>
            <div class="col-md-2"><label class="form-label fw-medium" style="font-size:12px">Date of Birth *</label><input type="text" class="form-control form-control-sm" placeholder="mm/dd/yyyy"></div>
            <div class="col-md-1"><label class="form-label fw-medium" style="font-size:12px">Age *</label><input type="number" class="form-control form-control-sm" placeholder="Age"></div>
            <div class="col-md-2">
              <label class="form-label fw-medium d-block" style="font-size:12px">Sex *</label>
              <div class="d-flex gap-3 mt-1">
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="sex" value="Male"> Male</label>
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="sex" value="Female"> Female</label>
              </div>
            </div>
            <div class="col-md-3"><label class="form-label fw-medium" style="font-size:12px">Place of Birth *</label><input type="text" class="form-control form-control-sm" placeholder="Municipality/City"></div>
            <div class="col-md-2">
              <label class="form-label fw-medium d-block" style="font-size:12px">IP Community? *</label>
              <div class="d-flex gap-3 mt-1">
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="ip"> Yes</label>
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="ip"> No</label>
              </div>
            </div>
            <div class="col-md-2">
              <label class="form-label fw-medium d-block" style="font-size:12px">4Ps Beneficiary? *</label>
              <div class="d-flex gap-3 mt-1">
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="fours"> Yes</label>
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="fours"> No</label>
              </div>
            </div>
          </div>

          <!-- ROW 3: Current Address + Permanent Address side by side -->
          <div class="row g-3 mb-3 pb-3" style="border-bottom:1px solid #e2e8f0">
            <div class="col-lg-6">
              <div class="fw-semibold mb-2" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">Current Address</div>
              <div class="row g-2">
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">House No./Street *</label><input type="text" class="form-control form-control-sm" placeholder="House No./Street"></div>
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Barangay *</label><input type="text" class="form-control form-control-sm" placeholder="Barangay"></div>
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Municipality/City *</label><input type="text" class="form-control form-control-sm" placeholder="Municipality/City"></div>
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Province *</label><input type="text" class="form-control form-control-sm" placeholder="Province"></div>
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Country *</label><input type="text" class="form-control form-control-sm" placeholder="Country"></div>
                <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Zip Code *</label><input type="text" class="form-control form-control-sm" placeholder="Zip Code"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="d-flex align-items-center gap-3 mb-2">
                <div class="fw-semibold" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">Permanent Address</div>
                <div class="form-check mb-0">
                  <input class="form-check-input" type="checkbox" id="sameAddr" onchange="toggleSameAddr(this)">
                  <label class="form-check-label" for="sameAddr" style="font-size:12px">Same as Current</label>
                </div>
              </div>
              <div id="permAddrFields">
                <div class="row g-2">
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">House No./Street *</label><input type="text" class="form-control form-control-sm" placeholder="House No./Street"></div>
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Barangay *</label><input type="text" class="form-control form-control-sm" placeholder="Barangay"></div>
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Municipality/City *</label><input type="text" class="form-control form-control-sm" placeholder="Municipality/City"></div>
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Province *</label><input type="text" class="form-control form-control-sm" placeholder="Province"></div>
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Country *</label><input type="text" class="form-control form-control-sm" placeholder="Country"></div>
                  <div class="col-6"><label class="form-label fw-medium" style="font-size:12px">Zip Code *</label><input type="text" class="form-control form-control-sm" placeholder="Zip Code"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- ROW 4: Parent/Guardian -->
          <div class="row g-3 mb-3 pb-3" style="border-bottom:1px solid #e2e8f0">
            <div class="col-12">
              <div class="fw-semibold mb-2" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">Parent / Guardian Information</div>
            </div>
            <div class="col-lg-4">
              <div class="fw-medium mb-2" style="font-size:12px;color:#374151">Father's Name</div>
              <div class="row g-2">
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Last Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="First Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Middle Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Contact No."></div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="fw-medium mb-2" style="font-size:12px;color:#374151">Mother's Maiden Name</div>
              <div class="row g-2">
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Last Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="First Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Middle Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Contact No."></div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="fw-medium mb-2" style="font-size:12px;color:#374151">Guardian's Name <span class="text-muted fw-normal">(if applicable)</span></div>
              <div class="row g-2">
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Last Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="First Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Middle Name"></div>
                <div class="col-6"><input type="text" class="form-control form-control-sm" placeholder="Contact No."></div>
              </div>
            </div>
          </div>

          <!-- ROW 5: Returning Learner -->
          <div class="row g-3 mb-3">
            <div class="col-12">
              <div class="fw-semibold mb-2" style="font-size:12px;color:#1e3a5f;text-transform:uppercase;letter-spacing:.7px">For Returning Learner (Balik-Aral)</div>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-medium d-block" style="font-size:12px">Are you a returning learner? *</label>
              <div class="d-flex gap-4 mt-1">
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="returning" value="yes" onchange="toggleReturning(true)"> Yes</label>
                <label style="font-size:13px;cursor:pointer"><input type="radio" name="returning" value="no" onchange="toggleReturning(false)"> No</label>
              </div>
            </div>
            <div id="returningFields" class="col-md-9 d-none">
              <div class="row g-2">
                <div class="col-md-4"><label class="form-label fw-medium" style="font-size:12px">Last Grade/Year Completed</label><input type="text" class="form-control form-control-sm" placeholder="Last Grade/Year Completed"></div>
                <div class="col-md-4"><label class="form-label fw-medium" style="font-size:12px">School ID</label><input type="text" class="form-control form-control-sm" placeholder="School ID"></div>
                <div class="col-md-4"><label class="form-label fw-medium" style="font-size:12px">Last School Attended</label><input type="text" class="form-control form-control-sm" placeholder="Name of Last School Attended"></div>
              </div>
            </div>
          </div>

          <!-- Submit Buttons -->
          <div class="row g-3 mt-2 pt-3" style="border-top:1px solid #e2e8f0">
            <div class="col-md-3 ms-auto">
              <button class="btn btn-outline-secondary w-100 py-2 fw-semibold" onclick="hideSubPanel()">Cancel</button>
            </div>
            <div class="col-md-3">
              <button class="btn w-100 py-2 fw-semibold" style="background:#1e3a5f;color:#fff" onclick="alert('Form submitted!')">Submit Enrollment Form</button>
            </div>
          </div>

        </div><!-- /single card -->
      </div>

      <!-- SUB-PANEL: Requirements -->
      <div id="sub-requirements" class="sub-panel d-none" style="max-width:680px">
        <div class="d-flex align-items-center gap-2 mb-4">
          <button class="btn btn-sm btn-outline-secondary" onclick="hideSubPanel()"><i class="bi bi-arrow-left"></i> Back</button>
          <h5 class="mb-0 fw-bold" style="color:#1e293b">Submit Requirements</h5>
        </div>
        <div class="card border rounded-3 p-4 mb-3">
          <p class="fw-semibold mb-3" style="font-size:14px;color:#1e293b">Required Documents</p>
          <div class="d-flex flex-column gap-3">
            <?php
            $requirements = ['PSA Birth Certificate','Form 138 (Report Card)','Good Moral Certificate'];
            foreach($requirements as $i => $req): ?>
            <div class="d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1px solid #e2e8f0">
              <div>
                <div class="fw-medium" style="font-size:13.5px;color:#1e293b"><?= $req ?></div>
                <div class="text-muted" style="font-size:11px">PDF, JPG, PNG – Max 5MB</div>
              </div>
              <label class="btn btn-sm fw-semibold" style="background:#1e3a5f;color:#fff;font-size:12px;cursor:pointer">
                <i class="bi bi-upload me-1"></i>Upload
                <input type="file" accept=".pdf,.jpg,.png" style="display:none">
              </label>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="pb-5"><button class="btn w-100 py-2 fw-semibold" style="background:#1e3a5f;color:#fff">Submit Requirements</button></div>
      </div>

    
      <!-- SUB-PANEL: Special Needs -->
      <div id="sub-special-needs" class="sub-panel d-none" style="max-width:680px">
        <div class="d-flex align-items-center gap-2 mb-4">
          <button class="btn btn-sm btn-outline-secondary" onclick="hideSubPanel()"><i class="bi bi-arrow-left"></i> Back</button>
          <h5 class="mb-0 fw-bold" style="color:#1e293b">Special Needs Requirements</h5>
        </div>
        <div class="card border rounded-3 p-4 mb-3">
          <p class="text-muted mb-3" style="font-size:13px">For learners with special needs, please upload the applicable documents below.</p>
          <div class="d-flex flex-column gap-3">
            <?php
            $specialDocs = [
              'Medical Certificate / Doctor\'s Assessment',
            ];
            foreach($specialDocs as $doc): ?>
            <div class="d-flex align-items-center justify-content-between p-3 rounded-2" style="background:#f8fafc;border:1px solid #e2e8f0">
              <div>
                <div class="fw-medium" style="font-size:13.5px;color:#1e293b"><?= $doc ?></div>
                <div class="text-muted" style="font-size:11px">PDF, JPG, PNG – Max 5MB &nbsp;(Optional)</div>
              </div>
              <label class="btn btn-sm fw-semibold" style="background:#c0392b;color:#fff;font-size:12px;cursor:pointer">
                <i class="bi bi-upload me-1"></i>Upload
                <input type="file" accept=".pdf,.jpg,.png" style="display:none">
              </label>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="pb-5"><button class="btn w-100 py-2 fw-semibold" style="background:#1e3a5f;color:#fff">Submit Special Needs Documents</button></div>
      </div>

    </div>


    <!-- ===== PANEL: STUDENT INFORMATION ===== -->
    <div id="panel-student-info" class="panel-section d-none p-3 p-md-4">
      <div class="fw-bold mb-1 text-center" style="font-size:22px;color:#1e293b">Student Information</div>
      <div class="text-muted mb-4 text-center" style="font-size:14px">Your personal and academic details on record</div>

      <div style="max-width:780px;margin:0 auto">
        <!-- Profile Card -->
        <div class="card border rounded-3 p-4 mb-4">
          <div class="d-flex align-items-center gap-4">
            <div class="stu-profile-avatar" style="width:72px;height:72px;font-size:26px">JS</div>
            <div>
              <div class="fw-bold" style="font-size:20px;color:#1e293b">John Smith</div>
              <div class="text-muted" style="font-size:13px">Learner Reference No.: <span class="fw-semibold text-dark">123456789012</span></div>
              <div class="mt-1"><span class="badge bg-success-subtle text-success px-3 py-1 rounded-pill">Active – Enrolled</span></div>
            </div>
          </div>
        </div>

        <!-- Info Sections -->
        <div class="card border rounded-3 p-4 mb-4">
          <h5 class="fw-bold mb-3 pb-2 border-bottom" style="color:#1e293b">Personal Information</h5>
          <div class="row g-3">
            <?php
            $personalInfo = [
              'Last Name' => 'Smith', 'First Name' => 'John', 'Middle Name' => 'Cruz',
              'Date of Birth' => 'January 15, 2010', 'Age' => '14', 'Sex' => 'Male',
              'Place of Birth' => 'Minalabac, Camarines Sur', 'Mother Tongue' => 'Filipino',
              'IP Community' => 'No', '4Ps Beneficiary' => 'No',
            ];
            foreach($personalInfo as $label => $value): ?>
            <div class="col-md-6">
              <div class="text-muted" style="font-size:12px"><?= $label ?></div>
              <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $value ?></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="card border rounded-3 p-4 mb-4">
          <h5 class="fw-bold mb-3 pb-2 border-bottom" style="color:#1e293b">Current Address</h5>
          <div class="row g-3">
            <?php
            $addressInfo = [
              'House No./Street' => '123 Rizal St.', 'Barangay' => 'Pob. Norte',
              'Municipality/City' => 'Minalabac', 'Province' => 'Camarines Sur',
              'Country' => 'Philippines', 'Zip Code' => '4421',
            ];
            foreach($addressInfo as $label => $value): ?>
            <div class="col-md-6">
              <div class="text-muted" style="font-size:12px"><?= $label ?></div>
              <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $value ?></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="card border rounded-3 p-4 mb-4">
          <h5 class="fw-bold mb-3 pb-2 border-bottom" style="color:#1e293b">Parent / Guardian Information</h5>
          <?php
          $parents = [
            'Father' => ['Name' => 'Smith, Robert C.', 'Contact' => '09171234567'],
            'Mother' => ['Name' => 'Smith, Maria D.', 'Contact' => '09181234567'],
            'Guardian' => ['Name' => '—', 'Contact' => '—'],
          ];
          foreach($parents as $role => $data): ?>
          <div class="mb-3">
            <div class="fw-semibold mb-1" style="font-size:13px;color:#64748b;text-transform:uppercase;letter-spacing:.5px"><?= $role ?></div>
            <div class="row g-2">
              <div class="col-md-6">
                <div class="text-muted" style="font-size:12px">Name</div>
                <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $data['Name'] ?></div>
              </div>
              <div class="col-md-6">
                <div class="text-muted" style="font-size:12px">Contact</div>
                <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $data['Contact'] ?></div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>


    <!-- ===== PANEL: GRADE AND SECTION ===== -->
    <div id="panel-grade-section" class="panel-section d-none p-3 p-md-4">
      <div class="fw-bold mb-1" style="font-size:22px;color:#1e293b">Grade and Section</div>
      <div class="text-muted mb-4" style="font-size:14px">Your current class assignment and schedule</div>

      <div style="max-width:1000px">
        <div class="row g-4 align-items-start">
          <!-- LEFT: Current Enrollment Status -->
          <div class="col-lg-6">
            <div class="card border rounded-3 p-4 h-100">
              <div class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Current Enrollment Status</div>
              <div class="text-muted mb-3" style="font-size:13px">Your current enrollment progress</div>
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                  <div class="fw-bold mb-1" style="font-size:22px;color:#d97706">Under Review</div>
                  <div style="font-size:13.5px;color:#374151">Grade 10 – Section A</div>
                </div>
                <span class="badge px-3 py-2 rounded-pill" style="font-size:12px;background:#fef3c7;color:#b45309">Under Review</span>
              </div>
              <div class="d-flex justify-content-between mb-1" style="font-size:13px;font-weight:500">
                <span>Enrollment Progress</span><span>50%</span>
              </div>
              <div class="progress" style="height:10px">
                <div class="progress-bar" style="width:50%;background:#d97706"></div>
              </div>
            </div>
          </div>

          <!-- RIGHT: Academic Info -->
          <div class="col-lg-6">
            <div class="card border rounded-3 p-4 h-100">
              <h5 class="fw-bold mb-3" style="color:#1e293b">Academic Information</h5>
              <div class="row g-3">
                <?php
                $acadInfo = [
                  'School Year' => '2025 – 2026',
                  'Grade Level' => 'Grade 10',
                  'Section' => 'Section A',
                  'Adviser' => 'Mrs. Maria Santos',
                  'Track / Strand' => 'Academic',
                  'School' => 'DPNHS',
                ];
                foreach($acadInfo as $label => $value): ?>
                <div class="col-6">
                  <div class="text-muted" style="font-size:12px"><?= $label ?></div>
                  <div class="fw-semibold" style="font-size:14px;color:#1e293b"><?= $value ?></div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /main -->
</div>

<style>
  .sidebar-nav-btn {
    display: flex;
    align-items: center;
    padding: 9px 14px;
    border-radius: 8px;
    font-size: 13.5px;
    font-weight: 500;
    color: #374151;
    text-decoration: none;
    border: none;
    background: transparent;
    width: 100%;
    text-align: left;
    transition: background .15s, color .15s;
    cursor: pointer;
  }
  .sidebar-nav-btn:hover { background: #f1f5f9; color: #1e293b; }
  .sidebar-nav-btn.active { background: #1e3a5f; color: #fff; }
  .sidebar-nav-btn.active i { color: #fff; }
  .sidebar-nav-btn i { font-size: 15px; color: #64748b; }
  .stu-profile-avatar {
    width: 58px; height: 58px; border-radius: 50%;
    background: #1e3a5f; color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 18px; cursor: pointer;
  }
  .step-num {
    width: 30px; height: 30px; border-radius: 50%;
    background: rgba(255,255,255,.25); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 13px; flex-shrink: 0;
  }
  .step-card { transition: box-shadow .2s; }
  .step-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,.1); }
  .panel-section { animation: fadeIn .2s ease; }
  @keyframes fadeIn { from { opacity:0; transform:translateY(6px); } to { opacity:1; transform:translateY(0); } }
</style>

<script>
function showPanel(panelId) {
  // Hide all panels
  document.querySelectorAll('.panel-section').forEach(p => p.classList.add('d-none'));
  // Show target
  document.getElementById('panel-' + panelId).classList.remove('d-none');
  // Reset sub panels
  hideSubPanel();
  // Update nav buttons
  document.querySelectorAll('.sidebar-nav-btn').forEach(btn => {
    btn.classList.toggle('active', btn.dataset.panel === panelId);
  });
  // Close offcanvas on mobile
  const oc = document.getElementById('studentSidebar');
  if (oc && bootstrap && bootstrap.Offcanvas.getInstance(oc)) {
    bootstrap.Offcanvas.getInstance(oc).hide();
  }
}

function showSubPanel(subId) {
  // Hide step cards
  document.querySelectorAll('.step-card').forEach(c => c.style.display = 'none');
  // Hide all sub-panels then show target
  document.querySelectorAll('.sub-panel').forEach(s => s.classList.add('d-none'));
  document.getElementById('sub-' + subId).classList.remove('d-none');
}

function hideSubPanel() {
  document.querySelectorAll('.sub-panel').forEach(s => s.classList.add('d-none'));
  document.querySelectorAll('.step-card').forEach(c => c.style.display = '');
}

function toggleSameAddr(cb) {
  document.getElementById('permAddrFields').style.display = cb.checked ? 'none' : '';
}

function toggleReturning(show) {
  const el = document.getElementById('returningFields');
  if (show) { el.classList.remove('d-none'); el.classList.add('col-md-9'); }
  else { el.classList.add('d-none'); el.classList.remove('col-md-9'); }
}

/* ── Enrollment Announcement Popup ── */
// In production, this data would come from the DB / PHP session.
// For now we simulate the active announcement from super_admin.
const _enrollmentAnnouncement = {
  title: 'Welcome to SY 2025–2026 Enrollment!',
  message: 'Online enrollment for SY 2025–2026 is now open. Please complete all steps and submit the required documents before the deadline.',
  from: 'June 1, 2025',
  until: 'July 31, 2025'
};

document.addEventListener('DOMContentLoaded', function() {
  // Show once per session (won't re-appear if dismissed already)
  if (!sessionStorage.getItem('annDismissed')) {
    const modal = new bootstrap.Modal(document.getElementById('enrollmentAnnouncementModal'), { backdrop: 'static', keyboard: false });
    modal.show();
  }
});

function dismissAnnouncement() {
  sessionStorage.setItem('annDismissed', '1');
  bootstrap.Modal.getInstance(document.getElementById('enrollmentAnnouncementModal')).hide();
}
</script>


<!-- ===== ENROLLMENT ANNOUNCEMENT POPUP ===== -->
<div class="modal fade" id="enrollmentAnnouncementModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" style="max-width:500px">
    <div class="modal-content border-0 shadow-lg" style="border-radius:20px;overflow:hidden">
      <!-- Header -->
      <div style="background:linear-gradient(135deg,#1e3a8a 0%,#0d9488 100%);padding:28px 28px 22px;position:relative">
        <div class="d-flex align-items-center gap-3">
          <div style="width:50px;height:50px;border-radius:14px;background:rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;font-size:24px;color:#fff;flex-shrink:0">
            <i class="bi bi-megaphone-fill"></i>
          </div>
          <div>
            <div style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:rgba(255,255,255,.6);margin-bottom:2px">Announcement</div>
            <div style="font-size:18px;font-weight:800;color:#fff;line-height:1.2">Welcome to SY 2025–2026 Enrollment!</div>
          </div>
        </div>
        <!-- Decorative circles -->
        <div style="position:absolute;width:100px;height:100px;border-radius:50%;background:rgba(255,255,255,.06);top:-20px;right:-20px"></div>
        <div style="position:absolute;width:60px;height:60px;border-radius:50%;background:rgba(255,255,255,.06);bottom:-10px;right:60px"></div>
      </div>
      <!-- Body -->
      <div class="modal-body p-4">
        <div style="background:#f0fdf4;border-left:4px solid #0d9488;border-radius:8px;padding:14px 16px;margin-bottom:18px">
          <div class="fw-semibold mb-1" style="font-size:13px;color:#065f46"><i class="bi bi-calendar-check me-2"></i>Enrollment Schedule</div>
          <div style="font-size:13.5px;color:#1e293b">
            <span class="fw-bold">Start:</span> June 1, 2025 &nbsp;&bull;&nbsp; <span class="fw-bold">End:</span> July 31, 2025
          </div>
        </div>
        <div style="font-size:14px;color:#374151;line-height:1.7">
          Online enrollment for SY 2025–2026 is now open. Please complete all steps and submit the required documents before the deadline.
        </div>
        <div class="mt-3 d-flex gap-2 align-items-center" style="font-size:12.5px;color:#64748b">
          <i class="bi bi-info-circle"></i>
          <span>Make sure to complete all 3 enrollment steps in the portal.</span>
        </div>
      </div>
      <!-- Footer -->
      <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
        <button class="btn btn-outline-secondary btn-sm" onclick="dismissAnnouncement()">Dismiss</button>
        <button class="btn btn-sm fw-semibold px-4" style="background:#1e3a8a;color:#fff" onclick="dismissAnnouncement(); showPanel('new-student');">
          <i class="bi bi-pencil-fill me-1"></i>Start Enrollment
        </button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>