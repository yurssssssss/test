
<?php $pageTitle = 'Admission Form – DPNHS'; ?>
<?php include 'header.php'; ?>


<nav class="bg-white border-bottom sticky-top py-2">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-2">
      <img src="logo.png" class="brand-logo" alt="DPNHS Logo" style="width: 55px; height: 55px;" >
      <div>
        <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">DPNHS</div>
        <div class="text-muted" style="font-size:11px">Enrollment System</div>
      </div>
    </div>
    <a href="/index" class="text-decoration-none fw-medium d-flex align-items-center gap-1 text-navy" style="font-size:14px">
      <i class="bi bi-arrow-left"></i> Back to Home
    </a>
  </div>
</nav>


<form action="/admission" method="POST">

<div class="login-page-bg d-flex align-items-center justify-content-center" style="min-height:calc(100vh - 57px)">
  <div class="bg-white rounded-4 border shadow-sm p-4 p-md-5 w-100" style="max-width:460px;margin:40px auto">

    <div class="text-center mb-4">
      <img src="logo.png" class="brand-logo mx-auto mb-3" style="width:72px;height:72px" alt="DPNHS Logo">
      <h3 class="fw-bold mb-1" style="color:#1e293b">Welcome</h3>
      <p class="text-muted" style="font-size:13.5px">Create Account</p>
    </div>
    <div id="login-student-panel">

      <div class="mb-2">
        <label class="form-label fw-semibold" style="font-size:15px">First Name</label>
        <input type="text" class="form-control" id="stu-id" placeholder="Enter your first name" required>
      </div>
    <div class="mb-2">
        <label class="form-label fw-semibold" style="font-size:15px">Last Name</label>
        <input type="text" class="form-control" id="stu-lname" placeholder="Enter your last name" required>
      </div>
      <div class="mb-2">
        <label class="form-label fw-semibold" style="font-size:15px">LRN</label>
        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" id="stu-lrn" placeholder="Enter your 12-digit LRN" required minlength="12"  >
      </div>
    <div class="mb-2">
        <label class="form-label fw-semibold" style="font-size:15px">Email</label>
        <input type="email" class="form-control" id="stu-email" placeholder="Enter your email" required>
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label class="form-label fw-semibold mb-0" style="font-size:15px">Password</label>
    
        </div>
        <div class="position-relative">
          <input type="password" class="form-control pe-5" id="stu-pw" placeholder="Enter your password" required>
          <button class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-pw',this)"><i class="bi bi-eye"></i></button>
        </div>
      </div>
<div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label class="form-label fw-semibold mb-0" style="font-size:15px">Confirm Password</label>
    
        </div>
        <div class="position-relative">
          <input type="password" class="form-control pe-5" id="stu-cpw" placeholder="Confirm your password" required>
          <button class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-cpw',this)"><i class="bi bi-eye"></i></button>
        </div>
      </div>
      <button class="btn btn-navy w-100 py-2 fw-semibold" type="submit" name="create" onclick="signup()" >Create Account</button>
      
    </div>



  </div>
</div>
</form>

























<!-- <form action="submit_admission.php" method="POST">
<div class="container py-4" style="max-width:780px">
  <div class="text-center mb-4">
    <h2 class="fw-bold" style="font-size:1.7rem;color:#1e293b">Enhanced Basic Education Enrollment Form</h2>
    <p class="text-muted" style="font-size:14px">Please fill out all required fields to complete your enrollment</p>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-3" style="color:#1e293b">School Information</h5>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">School Year *</label>
        <input type="text" class="form-control" placeholder="e.g., 2026-2027">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">Grade Level to Enroll *</label>
        <select class="form-select">
          <option value="">Select grade level</option>
          <option>Grade 7</option><option>Grade 8</option>
          <option>Grade 9</option><option>Grade 10</option>
        </select>
      </div>
    </div>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-1" style="color:#1e293b">Learner Information</h5>
    <p class="text-muted mb-3" style="font-size:13px">PSA Birth Certificate or ID, as accomplished originally by PSA</p>
    <div class="mb-3">
      <label class="form-label fw-medium" style="font-size:13px">Learner Reference No. (LRN)</label>
      <input type="text" class="form-control" placeholder="Enter 12-digit LRN" maxlength="12">
    </div>
    <div class="row g-3">
      <div class="col-md-4">
        <label class="form-label fw-medium" style="font-size:13px">Last Name *</label>
        <input type="text" class="form-control" placeholder="Last Name">
      </div>
      <div class="col-md-4">
        <label class="form-label fw-medium" style="font-size:13px">First Name *</label>
        <input type="text" class="form-control" placeholder="First Name">
      </div>
      <div class="col-md-4">
        <label class="form-label fw-medium" style="font-size:13px">Middle Name</label>
        <input type="text" class="form-control" placeholder="Middle Name">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Extension Name</label>
        <input type="text" class="form-control" placeholder="Jr., Sr., III">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Date of Birth *</label>
        <input type="text" class="form-control" placeholder="mm/dd/yyyy">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Age *</label>
        <input type="number" class="form-control" placeholder="Age">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium d-block" style="font-size:13px">Sex *</label>
        <div class="d-flex gap-4 mt-1">
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="sex" value="Male" class="accent-navy"> Male</label>
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="sex" value="Female" class="accent-navy"> Female</label>
        </div>
      </div>
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">Place of Birth (Municipality/City) *</label>
        <input type="text" class="form-control" placeholder="Municipality/City">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">Mother Tongue *</label>
        <input type="text" class="form-control" placeholder="Mother Tongue">
      </div>
      <div class="col-12">
        <label class="form-label fw-medium d-block" style="font-size:13px">Belonging to any Indigenous Peoples (IP) Community? *</label>
        <div class="d-flex gap-4 mt-1">
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="ip"> Yes</label>
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="ip"> No</label>
        </div>
      </div>
      <div class="col-12">
        <label class="form-label fw-medium d-block" style="font-size:13px">Is your family a beneficiary of 4Ps? *</label>
        <div class="d-flex gap-4 mt-1">
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="fours"> Yes</label>
          <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="fours"> No</label>
        </div>
      </div>
    </div>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-3" style="color:#1e293b">Current Address</h5>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">House No./Street *</label>
        <input type="text" class="form-control" placeholder="House No./Street">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-medium" style="font-size:13px">Barangay *</label>
        <input type="text" class="form-control" placeholder="Barangay">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Municipality/City *</label>
        <input type="text" class="form-control" placeholder="Municipality/City">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Province *</label>
        <input type="text" class="form-control" placeholder="Province">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Country *</label>
        <input type="text" class="form-control" placeholder="Country">
      </div>
      <div class="col-md-3">
        <label class="form-label fw-medium" style="font-size:13px">Zip Code *</label>
        <input type="text" class="form-control" placeholder="Zip Code">
      </div>
    </div>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-2" style="color:#1e293b">Permanent Address</h5>
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="sameAddr" onchange="toggleSameAddr(this)">
      <label class="form-check-label" for="sameAddr" style="font-size:13.5px">Same as Current Address</label>
    </div>
    <div id="permAddrFields">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-medium" style="font-size:13px">House No./Street *</label>
          <input type="text" class="form-control" placeholder="House No./Street">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-medium" style="font-size:13px">Barangay *</label>
          <input type="text" class="form-control" placeholder="Barangay">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-medium" style="font-size:13px">Municipality/City *</label>
          <input type="text" class="form-control" placeholder="Municipality/City">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-medium" style="font-size:13px">Province *</label>
          <input type="text" class="form-control" placeholder="Province">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-medium" style="font-size:13px">Country *</label>
          <input type="text" class="form-control" placeholder="Country">
        </div>
        <div class="col-md-3">
          <label class="form-label fw-medium" style="font-size:13px">Zip Code *</label>
          <input type="text" class="form-control" placeholder="Zip Code">
        </div>
      </div>
    </div>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-3" style="color:#1e293b">Parent/Guardian Information</h5>
    <p class="fw-semibold mb-2" style="font-size:13px;color:#374151">Father's Name</p>
    <div class="row g-3 mb-3">
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Last Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="First Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Middle Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Contact Number"></div>
    </div>
    <p class="fw-semibold mb-2" style="font-size:13px;color:#374151">Mother's Maiden Name</p>
    <div class="row g-3 mb-3">
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Last Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="First Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Middle Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Contact Number"></div>
    </div>
    <p class="fw-semibold mb-2" style="font-size:13px;color:#374151">Guardian's Name (if applicable)</p>
    <div class="row g-3">
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Last Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="First Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Middle Name"></div>
      <div class="col-md-3"><input type="text" class="form-control" placeholder="Contact Number"></div>
    </div>
  </div>


  <div class="card border rounded-3 p-4 mb-4">
    <h5 class="fw-bold mb-2" style="color:#1e293b">For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</h5>
    <label class="form-label fw-medium d-block mb-1" style="font-size:13px">Are you a returning learner? *</label>
    <div class="d-flex gap-4">
      <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="returning" value="yes" onchange="toggleReturning(true)"> Yes</label>
      <label class="d-flex align-items-center gap-1" style="font-size:14px;cursor:pointer"><input type="radio" name="returning" value="no" onchange="toggleReturning(false)"> No</label>
    </div>
    <div id="returningFields" class="d-none mt-3">
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label fw-medium" style="font-size:13px">Last Grade/Year Completed</label>
          <input type="text" class="form-control" placeholder="Last Grade/Year Completed">
        </div>
        <div class="col-md-6">
          <label class="form-label fw-medium" style="font-size:13px">School ID</label>
          <input type="text" class="form-control" placeholder="School ID">
        </div>
        <div class="col-12">
          <label class="form-label fw-medium" style="font-size:13px">Last School Attended</label>
          <input type="text" class="form-control" placeholder="Name of Last School Attended">
        </div>
      </div>
    </div>
  </div>


  <div class="row g-3 pb-5">
    <div class="col-lg-6 col-md-12">
      <a href="index.php" class="btn btn-outline-secondary w-100 py-2 fw-semibold">Cancel</a>
    </div>
    <div class="col-lg-6 col-md-12">
      <button class="btn btn-navy w-100 py-2 fw-semibold fs-6" onclick="submitAdmission()">Submit Enrollment Form</button>
    </div>
  </div>
</div>
</form> -->












<script>
const setup_pass = document.getElementById('pass');

  function toggleSameAddr(cb) {
    const fields = document.getElementById('permAddrFields');
    fields.style.opacity = cb.checked ? '0.4' : '1';
    fields.style.pointerEvents = cb.checked ? 'none' : '';
  }
  function toggleReturning(show) {
    document.getElementById('returningFields').classList.toggle('d-none', !show);
  }


function signup() {

window.location.href = '/student';


}


</script>

