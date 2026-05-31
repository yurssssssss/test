<?php $pageTitle = 'Student Portal – DPNHS'; ?>
      <?php include 'header.php'; ?> 


      <!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->

      <div class="bg-white border-bottom d-flex align-items-center justify-content-between px-4 py-2 sticky-top" style="z-index:100">
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-sm d-lg-none me-1 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#studentSidebar" aria-controls="studentSidebar">
            <i class="bi bi-list fs-5"></i>
          </button>
          <img src="/logo.png" class="brand-logo" alt="PHLCII Logo" style="width:55px;height:55px;">
          <div>
            <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">PHLCI</div>
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
              <button onclick="showPanel('my-profile')" class="sidebar-nav-btn" data-panel="my-profile">
                <i class="bi bi-person-gear me-2"></i> My Profile
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
            <button onclick="showPanel('my-profile')" class="sidebar-nav-btn" data-panel="my-profile">
              <i class="bi bi-person-gear me-2"></i> My Profile
            </button>
          </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div class="flex-grow-1 overflow-y-auto" style="background:#f1f5f9">

          <!-- ===== PANEL: NEW STUDENT / APPLICANT ===== -->
          <div id="panel-new-student" class="panel-section p-3 p-md-4">
            <div class="fw-bold mb-1" style="font-size:22px;color:#1e293b">New Student / Applicant</div>
            <div class="text-muted mb-4" style="font-size:14px">SY 2026 – 2027 &nbsp;|&nbsp; Complete the steps below to process your enrollment</div>

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

              <!-- PHLCI ENROLLMENT FORM -->

              <!-- Student Type Toggle -->
              <div class="card border rounded-3 p-3 mb-3" style="background:linear-gradient(135deg,#7b1a1a 0%,#1e3a5f 100%)">
                <div class="text-center text-white fw-bold mb-2" style="font-size:13px;text-transform:uppercase;letter-spacing:.8px">
                  <i class="bi bi-mortarboard-fill me-2"></i>Premiere Heights Learning Center, Inc. (PHLCI)
                </div>
                <div class="text-center text-white-50 mb-3" style="font-size:12px">School Year 2026 – 2027 &nbsp;|&nbsp; Registration Form</div>
                <div class="d-flex justify-content-center gap-2">
                  <button type="button" class="btn fw-semibold px-4 py-2" id="btnOldStudent"
                    onclick="switchStudentType('old')"
                    style="font-size:13px;background:#fff;color:#7b1a1a;border:2px solid #fff;border-radius:30px">
                    <i class="bi bi-person-check-fill me-1"></i> Old Student
                  </button>
                  <button type="button" class="btn fw-semibold px-4 py-2" id="btnNewStudent"
                    onclick="switchStudentType('new')"
                    style="font-size:13px;background:transparent;color:#fff;border:2px solid rgba(255,255,255,.5);border-radius:30px">
                    <i class="bi bi-person-plus-fill me-1"></i> New Student
                  </button>
                </div>
              </div>

              <!-- Multi-Student Notice -->
              <div class="card border rounded-3 p-3 mb-3" style="background:#fffbeb;border-color:#f59e0b!important">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <div class="fw-semibold" style="font-size:13px;color:#92400e"><i class="bi bi-people-fill me-2"></i>Multiple Students to Enroll?</div>
                    <div class="text-muted" style="font-size:12px">If you have more than one child enrolling, you can add additional students after filling this form.</div>
                  </div>
                  <button type="button" class="btn btn-sm fw-semibold ms-3 flex-shrink-0" onclick="showAddStudentModal()"
                    style="background:#f59e0b;color:#fff;font-size:12px;white-space:nowrap">
                    <i class="bi bi-plus-circle-fill me-1"></i>Add Student
                  </button>
                </div>
                <!-- Additional students list -->
                <div id="additionalStudentsList" class="mt-2 d-none">
                  <div class="fw-semibold mb-1" style="font-size:12px;color:#92400e">Students in this Enrollment Session:</div>
                  <div id="studentTags" class="d-flex flex-wrap gap-2"></div>
                </div>
              </div>

              <!-- SINGLE CARD: All form sections -->
              <div class="card border rounded-3 p-4 pb-3 mb-4">

                <!-- Card Header -->
                <div class="text-center pb-3 mb-3" style="border-bottom:2px solid #7b1a1a">
                  <div class="fw-bold" style="font-size:16px;color:#1e293b;letter-spacing:.3px">
                    <span id="formTypeLabel">OLD STUDENT REGISTRATION FORM</span>
                  </div>
                  <div class="text-muted" style="font-size:12px">School Year 2026 – 2027 &nbsp;|&nbsp; Please fill out all required fields accurately</div>
                </div>

                <!-- SECTION: Student's Information -->
                <div class="fw-semibold mb-3" style="font-size:13px;color:#7b1a1a;text-transform:uppercase;letter-spacing:.7px;border-bottom:1px solid #e2e8f0;padding-bottom:6px">
                  Student's Information
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">First Name *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="First Name">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Middle Name * <span class="text-muted fw-normal">(N/A if none)</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Middle Name or N/A">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Last Name *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Last Name">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Suffix <span class="text-muted fw-normal">(Jr., III…)</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="e.g., Jr., III">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Student's LRN * <span class="text-muted fw-normal">(N/A if not available)</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="LRN or N/A">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Incoming Grade Level *</label>
                    <select class="form-select form-select-sm">
                      <option value="">Select grade level</option>
                      <option>Kinder</option><option>Grade 1</option><option>Grade 2</option>
                      <option>Grade 3</option><option>Grade 4</option><option>Grade 5</option>
                      <option>Grade 6</option><option>Grade 7</option><option>Grade 8</option>
                      <option>Grade 9</option><option>Grade 10</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Birthday (mm/dd/yy) *</label>
                    <input type="date" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-3">
                    <label class="form-label fw-medium" style="font-size:12px">Birth Place *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="City/Municipality">
                  </div>
                  <div class="col-12">
                    <label class="form-label fw-medium" style="font-size:12px">Complete Address *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="House No., Street, Barangay, City/Municipality, Province">
                  </div>

                  <!-- New Student only: Last School Attended -->
                  <div class="col-md-6 PHLCI-new-only d-none">
                    <label class="form-label fw-medium" style="font-size:12px">Last School Attended *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Name of last school attended">
                  </div>

                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">Name of Mother *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Full Name">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">Name of Father *</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Full Name">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">Guardian * <span class="text-muted fw-normal">(Whose name will appear on the ID)</span></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Guardian's Full Name">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">Contact Number in Case of Emergency *</label>
                    <input type="tel" class="form-control form-control-sm" placeholder="e.g., 09xx-xxx-xxxx">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium d-block" style="font-size:12px">Preferred Class Session *</label>
                    <div class="d-flex gap-4 mt-1">
                      <label style="font-size:13px;cursor:pointer"><input type="radio" name="classSession" value="AM"> AM Session</label>
                      <label style="font-size:13px;cursor:pointer"><input type="radio" name="classSession" value="PM"> PM Session</label>
                    </div>
                  </div>
                </div>

                <!-- Proof of Payment -->
                <div class="p-3 rounded-2 mb-3" style="background:#f8fafc;border:1px dashed #cbd5e1">
                  <div class="fw-semibold mb-1" style="font-size:13px;color:#1e293b"><i class="bi bi-receipt me-2 text-success"></i>Proof of Payment *</div>
                  <div class="text-muted mb-2" style="font-size:12px">Send screenshot or saved proof of payment. Upload 1 file. Max 1 GB.</div>
                  <label class="btn btn-sm btn-outline-secondary" style="font-size:12px;cursor:pointer">
                    <i class="bi bi-upload me-1"></i> Add File
                    <input type="file" accept="image/*,.pdf" style="display:none">
                  </label>
                  <span id="paymentFileName" class="ms-2 text-muted" style="font-size:12px"></span>
                </div>

                <!-- Reminder banner -->
                <div class="p-3 rounded-2 mb-3" style="background:#fffbeb;border:1px solid #fcd34d">
                  <div class="fw-semibold mb-1" style="font-size:13px;color:#92400e"><i class="bi bi-bell-fill me-2"></i>Please be reminded</div>
                  <div style="font-size:12.5px;color:#78350f;line-height:1.7">
                    Wait for the confirmation and schedule of books and uniform distribution.<br>
                    <strong>School and P.E. Uniform fitting</strong> will be on <strong>May 8, 15 and 22, 2026</strong>.
                  </div>
                </div>

                <!-- Submit Buttons -->
                <div class="row g-3 mt-2 pt-3" style="border-top:1px solid #e2e8f0">
                  <div class="col-md-3 ms-auto">
                    <button class="btn btn-outline-secondary w-100 py-2 fw-semibold" onclick="hideSubPanel()">Cancel</button>
                  </div>
                  <div class="col-md-4">
                    <button class="btn w-100 py-2 fw-semibold" style="background:#7b1a1a;color:#fff" onclick="submitPHLCIForm()">
                      <i class="bi bi-send-fill me-1"></i> Submit Registration
                    </button>
                  </div>
                </div>

              </div><!-- /single card -->

              <!-- Add Another Student Modal -->
              <div class="modal fade" id="addStudentModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered" style="max-width:420px">
                  <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div style="background:linear-gradient(135deg,#7b1a1a,#1e3a5f);padding:20px 24px 16px">
                      <div class="fw-bold text-white" style="font-size:16px"><i class="bi bi-person-plus-fill me-2"></i>Add Another Student</div>
                      <div class="text-white-50" style="font-size:12px">Enter the name of the additional student to enroll</div>
                    </div>
                    <div class="modal-body p-4">
                      <div class="mb-3">
                        <label class="form-label fw-medium" style="font-size:12px">Student Type *</label>
                        <div class="d-flex gap-3">
                          <label style="font-size:13px;cursor:pointer"><input type="radio" name="addType" value="old" checked> Old Student</label>
                          <label style="font-size:13px;cursor:pointer"><input type="radio" name="addType" value="new"> New Student</label>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-medium" style="font-size:12px">First Name *</label>
                        <input type="text" class="form-control form-control-sm" id="addFirstName" placeholder="First Name">
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-medium" style="font-size:12px">Last Name *</label>
                        <input type="text" class="form-control form-control-sm" id="addLastName" placeholder="Last Name">
                      </div>
                      <div class="mb-3">
                        <label class="form-label fw-medium" style="font-size:12px">Incoming Grade Level *</label>
                        <select class="form-select form-select-sm" id="addGrade">
                          <option value="">Select grade level</option>
                          <option>Kinder</option><option>Grade 1</option><option>Grade 2</option>
                          <option>Grade 3</option><option>Grade 4</option><option>Grade 5</option>
                          <option>Grade 6</option><option>Grade 7</option><option>Grade 8</option>
                          <option>Grade 9</option><option>Grade 10</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 pt-0 gap-2">
                      <button class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-sm fw-semibold px-4" style="background:#7b1a1a;color:#fff" onclick="confirmAddStudent()">
                        <i class="bi bi-plus-circle-fill me-1"></i> Add Student
                      </button>
                    </div>
                  </div>
                </div>
              </div>
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


          <!-- ===== PANEL: MY PROFILE ===== -->
          <div id="panel-my-profile" class="panel-section d-none p-3 p-md-4">
            <div class="fw-bold mb-1" style="font-size:22px;color:#1e293b">My Profile</div>
            <div class="text-muted mb-4" style="font-size:14px">Manage your profile picture and account password</div>

            <div style="max-width:780px">

              <!-- Profile Picture Card -->
              <div class="card border rounded-3 p-4 mb-4">
                <h5 class="fw-bold mb-1 pb-2 border-bottom" style="color:#1e293b"><i class="bi bi-image me-2" style="color:#1e3a5f"></i>Profile Picture</h5>
                <div class="d-flex flex-column flex-sm-row align-items-center gap-4 pt-3">
                  <!-- Clickable Avatar -->
                  <div class="position-relative flex-shrink-0" style="cursor:pointer" onclick="openPhotoModal()" title="Click to manage photo">
                    <div id="profileAvatarPreview" class="stu-profile-avatar-lg">JS</div>
                    <div class="position-absolute bottom-0 end-0" style="background:#1e3a5f;border-radius:50%;width:28px;height:28px;display:flex;align-items:center;justify-content:center;border:2px solid #fff;pointer-events:none">
                      <i class="bi bi-camera-fill text-white" style="font-size:12px"></i>
                    </div>
                  </div>
                  <!-- Info + hint -->
                  <div>
                    <div class="fw-semibold mb-1" style="font-size:14px;color:#1e293b">John Smith</div>
                    <div class="text-muted mb-2" style="font-size:12px">STU2024001 &nbsp;·&nbsp; Grade 10 – Section A</div>
                    <button class="btn btn-sm fw-semibold px-3" style="background:#1e3a5f;color:#fff;font-size:13px" onclick="openPhotoModal()">
                      <i class="bi bi-camera me-1"></i>Manage Photo
                    </button>
                  </div>
                </div>
              </div>

              <!-- Hidden file input -->
              <input type="file" id="profilePicInput" accept="image/*" class="d-none" onchange="handleProfilePicChange(this)">

              <!-- Photo Action Modal -->
              <div class="modal fade" id="photoActionModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered" style="max-width:360px">
                  <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden">
                    <!-- Header -->
                    <div style="background:#1e3a5f;padding:20px 24px 16px">
                      <div class="d-flex align-items-center gap-3">
                        <div id="modalAvatarThumb" class="stu-profile-avatar" style="width:46px;height:46px;font-size:15px;flex-shrink:0">JS</div>
                        <div>
                          <div class="fw-bold text-white" style="font-size:14px;line-height:1.2">John Smith</div>
                          <div style="font-size:11px;color:rgba(255,255,255,.6)">Profile Photo</div>
                        </div>
                      </div>
                    </div>
                    <!-- Options -->
                    <div class="p-4">
                      <div class="d-flex flex-column gap-2">
                        <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#f1f5f9;font-size:13.5px;border:none" onclick="viewFullPhoto()">
                          <span style="width:36px;height:36px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                            <i class="bi bi-eye-fill" style="color:#1d4ed8;font-size:15px"></i>
                          </span>
                          <div>
                            <div style="color:#1e293b">View Profile Photo</div>
                            <div class="fw-normal text-muted" style="font-size:11px">See your current photo in full size</div>
                          </div>
                        </button>
                        <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#f1f5f9;font-size:13.5px;border:none" onclick="document.getElementById('profilePicInput').click()">
                          <span style="width:36px;height:36px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;flex-shrink:0">
                            <i class="bi bi-cloud-arrow-up-fill" style="color:#16a34a;font-size:15px"></i>
                          </span>
                          <div>
                            <div style="color:#1e293b">Change Photo</div>
                            <div class="fw-normal text-muted" style="font-size:11px">Upload a new JPG, PNG, or GIF (max 2 MB)</div>
                          </div>
                        </button>
                        <button class="btn fw-semibold d-flex align-items-center gap-3 px-3 py-3 rounded-3 text-start" style="background:#fff5f5;font-size:13.5px;border:none" onclick="removePhoto()">
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
              <div class="modal fade" id="photoViewModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered" style="max-width:400px">
                  <div class="modal-content border-0 shadow-lg" style="border-radius:16px;overflow:hidden;background:#0f172a">
                    <div class="d-flex justify-content-between align-items-center px-4 py-3">
                      <span class="fw-semibold text-white" style="font-size:14px">Profile Photo</span>
                      <button class="btn-close btn-close-white btn-sm" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center p-4" style="min-height:300px">
                      <div id="fullPhotoView" class="stu-profile-avatar-lg" style="width:180px;height:180px;font-size:52px">JS</div>
                    </div>
                    <div class="px-4 pb-4 text-center">
                      <div class="fw-semibold text-white" style="font-size:15px">John Smith</div>
                      <div style="font-size:12px;color:rgba(255,255,255,.5)">STU2024001</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Change Password Card -->
              <div class="card border rounded-3 p-4 mb-4">
                <h5 class="fw-bold mb-1 pb-2 border-bottom" style="color:#1e293b"><i class="bi bi-shield-lock me-2" style="color:#1e3a5f"></i>Change Password</h5>
                <div class="d-flex align-items-start gap-2 rounded-2 p-3 mt-3 mb-3" style="background:#f0f9ff;border:1px solid #bae6fd">
                  <i class="bi bi-info-circle-fill mt-1" style="color:#0284c7;font-size:14px;flex-shrink:0"></i>
                  <div style="font-size:12.5px;color:#0369a1">For your security, choose a strong password with at least 8 characters including uppercase, lowercase, numbers, and symbols.</div>
                </div>
                <div class="row g-3">
                  <div class="col-12">
                    <label class="form-label fw-medium" style="font-size:12px">Current Password *</label>
                    <div class="input-group input-group-sm">
                      <input type="password" class="form-control form-control-sm" id="currentPass" placeholder="Enter your current password">
                      <button class="btn btn-outline-secondary" type="button" onclick="togglePass('currentPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">New Password *</label>
                    <div class="input-group input-group-sm">
                      <input type="password" class="form-control form-control-sm" id="newPass" placeholder="Enter new password" oninput="checkPasswordStrength(this.value)">
                      <button class="btn btn-outline-secondary" type="button" onclick="togglePass('newPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                    </div>
                    <div class="mt-2">
                      <div class="progress" style="height:5px;border-radius:4px">
                        <div id="strengthBar" class="progress-bar" style="width:0%;transition:width .3s,background .3s"></div>
                      </div>
                      <div id="strengthLabel" class="text-muted mt-1" style="font-size:11px"></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label fw-medium" style="font-size:12px">Confirm New Password *</label>
                    <div class="input-group input-group-sm">
                      <input type="password" class="form-control form-control-sm" id="confirmPass" placeholder="Re-enter new password" oninput="checkMatch()">
                      <button class="btn btn-outline-secondary" type="button" onclick="togglePass('confirmPass',this)" style="font-size:12px"><i class="bi bi-eye"></i></button>
                    </div>
                    <div id="matchMsg" class="mt-1" style="font-size:11px"></div>
                  </div>
                  <div class="col-12 pt-1">
                    <button class="btn btn-sm fw-semibold px-4" style="background:#1e3a5f;color:#fff;font-size:13px">
                      <i class="bi bi-shield-check me-1"></i>Update Password
                    </button>
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
        .stu-profile-avatar-lg {
          width: 90px; height: 90px; border-radius: 50%;
          background: #1e3a5f; color: #fff;
          display: flex; align-items: center; justify-content: center;
          font-weight: 700; font-size: 28px; overflow: hidden;
        }
        .stu-profile-avatar-lg img { width: 100%; height: 100%; object-fit: cover; border-radius: 50%; }
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

      function togglePass(inputId, btn) {
        var inp = document.getElementById(inputId);
        var icon = btn.querySelector('i');
        if (inp.type === 'password') {
          inp.type = 'text';
          icon.className = 'bi bi-eye-slash';
        } else {
          inp.type = 'password';
          icon.className = 'bi bi-eye';
        }
      }

      function checkPasswordStrength(val) {
        var bar = document.getElementById('strengthBar');
        var lbl = document.getElementById('strengthLabel');
        if (!val) { bar.style.width = '0%'; lbl.textContent = ''; return; }
        var score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;
        var levels = [
          { w: '20%', bg: '#ef4444', label: 'Weak' },
          { w: '45%', bg: '#f97316', label: 'Fair' },
          { w: '70%', bg: '#eab308', label: 'Good' },
          { w: '100%', bg: '#22c55e', label: 'Strong' },
        ];
        var lvl = levels[Math.max(0, score - 1)];
        bar.style.width = lvl.w;
        bar.style.background = lvl.bg;
        lbl.textContent = 'Strength: ' + lvl.label;
        lbl.style.color = lvl.bg;
        checkMatch();
      }

      function checkMatch() {
        var np = document.getElementById('newPass');
        var cp = document.getElementById('confirmPass');
        var msg = document.getElementById('matchMsg');
        if (!cp || !cp.value) { msg.textContent = ''; return; }
        if (np.value === cp.value) {
          msg.innerHTML = '<i class="bi bi-check-circle-fill me-1" style="color:#22c55e"></i><span style="color:#16a34a">Passwords match</span>';
        } else {
          msg.innerHTML = '<i class="bi bi-x-circle-fill me-1" style="color:#ef4444"></i><span style="color:#dc2626">Passwords do not match</span>';
        }
      }

      /* ── PHLCI Form Functions ── */
      var PHLCIStudentType = 'old';
      var additionalStudents = [];

      function switchStudentType(type) {
        PHLCIStudentType = type;
        var newOnlyEls = document.querySelectorAll('.PHLCI-new-only');
        var btnOld = document.getElementById('btnOldStudent');
        var btnNew = document.getElementById('btnNewStudent');
        var label = document.getElementById('formTypeLabel');
        if (type === 'new') {
          newOnlyEls.forEach(function(el){ el.classList.remove('d-none'); });
          btnNew.style.background = '#fff';
          btnNew.style.color = '#1e3a5f';
          btnNew.style.borderColor = '#fff';
          btnOld.style.background = 'transparent';
          btnOld.style.color = '#fff';
          btnOld.style.borderColor = 'rgba(255,255,255,.5)';
          if(label) label.textContent = 'NEW STUDENT REGISTRATION FORM';
        } else {
          newOnlyEls.forEach(function(el){ el.classList.add('d-none'); });
          btnOld.style.background = '#fff';
          btnOld.style.color = '#7b1a1a';
          btnOld.style.borderColor = '#fff';
          btnNew.style.background = 'transparent';
          btnNew.style.color = '#fff';
          btnNew.style.borderColor = 'rgba(255,255,255,.5)';
          if(label) label.textContent = 'OLD STUDENT REGISTRATION FORM';
        }
      }

      function showAddStudentModal() {
        new bootstrap.Modal(document.getElementById('addStudentModal')).show();
      }

      function confirmAddStudent() {
        var fn = document.getElementById('addFirstName').value.trim();
        var ln = document.getElementById('addLastName').value.trim();
        var gr = document.getElementById('addGrade').value;
        var type = document.querySelector('input[name="addType"]:checked').value;
        if (!fn || !ln || !gr) { alert('Please fill in all fields.'); return; }
        additionalStudents.push({ first: fn, last: ln, grade: gr, type: type });
        renderStudentTags();
        bootstrap.Modal.getInstance(document.getElementById('addStudentModal')).hide();
        document.getElementById('addFirstName').value = '';
        document.getElementById('addLastName').value = '';
        document.getElementById('addGrade').value = '';
      }

      function renderStudentTags() {
        var list = document.getElementById('additionalStudentsList');
        var tags = document.getElementById('studentTags');
        if (additionalStudents.length === 0) { list.classList.add('d-none'); return; }
        list.classList.remove('d-none');
        tags.innerHTML = additionalStudents.map(function(s, i) {
          return '<span class="badge d-inline-flex align-items-center gap-1 px-3 py-2 rounded-pill" style="background:#7b1a1a;color:#fff;font-size:12px;font-weight:500">'
            + '<i class="bi bi-person-fill"></i>'
            + s.first + ' ' + s.last + ' (' + s.grade + ')'
            + ' <button type="button" onclick="removeStudent(' + i + ')" class="btn-close btn-close-white ms-1" style="font-size:9px;filter:invert(1)"></button>'
            + '</span>';
        }).join('');
      }

      function removeStudent(i) {
        additionalStudents.splice(i, 1);
        renderStudentTags();
      }

      function submitPHLCIForm() {
        alert('Registration submitted successfully!\n\nPlease wait for the confirmation from Premiere Heights Learning Center, Inc. (PHLCI).');
        hideSubPanel();
      }

      function openPhotoModal() {
        new bootstrap.Modal(document.getElementById('photoActionModal')).show();
      }

      function viewFullPhoto() {
        bootstrap.Modal.getInstance(document.getElementById('photoActionModal')).hide();
        setTimeout(function() {
          new bootstrap.Modal(document.getElementById('photoViewModal')).show();
        }, 300);
      }

      function removePhoto() {
        var av = document.getElementById('profileAvatarPreview');
        var thumb = document.getElementById('modalAvatarThumb');
        var full = document.getElementById('fullPhotoView');
        av.innerHTML = 'JS';
        av.style.background = '#1e3a5f';
        if (thumb) { thumb.innerHTML = 'JS'; thumb.style.background = '#1e3a5f'; }
        if (full) { full.innerHTML = 'JS'; full.style.background = '#1e3a5f'; }
        bootstrap.Modal.getInstance(document.getElementById('photoActionModal')).hide();
      }

      function handleProfilePicChange(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            var src = e.target.result;
            var makeImg = function(el) {
              el.innerHTML = '<img src="' + src + '" style="width:100%;height:100%;object-fit:cover;border-radius:50%">';
              el.style.background = 'transparent';
            };
            makeImg(document.getElementById('profileAvatarPreview'));
            var thumb = document.getElementById('modalAvatarThumb');
            var full = document.getElementById('fullPhotoView');
            if (thumb) makeImg(thumb);
            if (full) makeImg(full);
          };
          reader.readAsDataURL(input.files[0]);
          // close the action modal after picking a file
          var m = bootstrap.Modal.getInstance(document.getElementById('photoActionModal'));
          if (m) m.hide();
        }
      }

      /* ── Enrollment Announcement Popup logic is at the bottom after Bootstrap loads ── */

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
                  <div style="font-size:18px;font-weight:800;color:#fff;line-height:1.2">Welcome to SY 2026–2027 Enrollment!</div>
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
                  <span class="fw-bold">Start:</span> June 1, 2026 &nbsp;&bull;&nbsp; <span class="fw-bold">End:</span> July 31, 2026
                </div>
              </div>
              <div style="font-size:14px;color:#374151;line-height:1.7">
                Online enrollment for SY 2026–2027 at Premiere Heights Learning Center, Inc. (PHLCI) is now open. Please complete all steps and submit the required documents before the deadline.
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

      <?php include 'footer.php'; ?>

      <!-- ── Enrollment Announcement Popup ── -->
      <!-- MUST be after footer.php because that's where bootstrap.bundle.min.js loads -->
      <script>
      (function() {
        // login.php sets this flag right before redirecting to student.php.
        // We read it and delete it immediately — so it only ever fires once per login.
        var justLoggedIn = localStorage.getItem('dpnhs_just_logged_in') === '1';
        if (justLoggedIn) {
          localStorage.removeItem('dpnhs_just_logged_in');
        }

        function showAnnouncementPopup() {
          if (!justLoggedIn) return;
          var el = document.getElementById('enrollmentAnnouncementModal');
          if (!el) return;
          new bootstrap.Modal(el, { backdrop: 'static', keyboard: false }).show();
        }

        // Bootstrap is already loaded at this point (footer.php loads it above),
        // but the DOM may still be painting — use DOMContentLoaded as safety net.
        if (document.readyState === 'loading') {
          document.addEventListener('DOMContentLoaded', showAnnouncementPopup);
        } else {
          showAnnouncementPopup();
        }

        window.dismissAnnouncement = function() {
          var el = document.getElementById('enrollmentAnnouncementModal');
          var instance = bootstrap.Modal.getInstance(el);
          if (instance) instance.hide();
        };
      })();
      </script>