<?php $pageTitle = 'Admission Form – DPNHS'; ?>
<?php include 'header.php'; ?>

<nav class="bg-white border-bottom sticky-top py-2">
  <div class="container d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-2">
      <img src="logo.png" class="brand-logo" alt="DPNHS Logo" style="width: 55px; height: 55px;">
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

<div class="login-page-bg d-flex align-items-center justify-content-center" style="min-height:calc(100vh - 57px)">
  <div class="bg-white rounded-4 border shadow-sm p-4 p-md-5 w-100" style="max-width:460px;margin:40px auto">

    <div class="text-center mb-4">
      <img src="logo.png" class="brand-logo mx-auto mb-3" style="width:72px;height:72px" alt="DPNHS Logo">
      <h3 class="fw-bold mb-1" style="color:#1e293b">Welcome</h3>
      <p class="text-muted" style="font-size:13.5px">Create Account</p>
    </div>

    <div class="mb-2">
      <label class="form-label fw-semibold" style="font-size:15px">First Name</label>
      <input type="text" class="form-control" id="stu-fname" placeholder="Enter your first name">
    </div>

    <div class="mb-2">
      <label class="form-label fw-semibold" style="font-size:15px">Last Name</label>
      <input type="text" class="form-control" id="stu-lname" placeholder="Enter your last name">
    </div>

    <div class="mb-2">
      <label class="form-label fw-semibold" style="font-size:15px">LRN</label>
      <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" id="stu-lrn" placeholder="Enter your 12-digit LRN" minlength="12">
    </div>

    <div class="mb-2">
      <label class="form-label fw-semibold" style="font-size:15px">Email</label>
      <input type="email" class="form-control" id="stu-email" placeholder="Enter your email">
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold mb-0" style="font-size:15px">Password</label>
      <div class="position-relative mt-1">
        <input type="password" class="form-control pe-5" id="stu-pw" placeholder="Enter your password">
        <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-pw',this)"><i class="bi bi-eye"></i></button>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label fw-semibold mb-0" style="font-size:15px">Confirm Password</label>
      <div class="position-relative mt-1">
        <input type="password" class="form-control pe-5" id="stu-cpw" placeholder="Confirm your password">
        <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-cpw',this)"><i class="bi bi-eye"></i></button>
      </div>
    </div>

    <!-- Dummy reCAPTCHA (UI only, not verified) -->
    <div class="g-recaptcha mb-3" data-sitekey="6Lcj6a8sAAAAAKwL4mDM_KFSN0N8to2YI1RnjGLT"></div>

    <button type="button" class="btn btn-navy w-100 py-2 fw-semibold" onclick="signup()">Create Account</button>

  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function signup() {
    toast('Account created successfully!', 'success');
    setTimeout(() => window.location.href = '/login', 800);
  }
 function toast(msg, type = '') {
    const c = document.getElementById('toastContainer');
    const t = document.createElement('div');
    t.className = 'toast-msg ' + (type === 'success' ? 'bg-success' : 'bg-dark') + ' text-white rounded-3 px-3 py-2 mb-2 d-flex align-items-center gap-2 shadow';
    t.style.animation = 'slideIn .3s ease';
    t.innerHTML = '<i class="bi bi-check-circle-fill"></i> ' + msg;
    c.appendChild(t);
    setTimeout(() => t.remove(), 3500);
  }

  function togglePw(id, btn) {
    const inp = document.getElementById(id);
    if (inp.type === 'password') {
      inp.type = 'text';
      btn.innerHTML = '<i class="bi bi-eye-slash"></i>';
    } else {
      inp.type = 'password';
      btn.innerHTML = '<i class="bi bi-eye"></i>';
    }
  }
</script>
