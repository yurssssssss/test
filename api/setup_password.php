
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
    <a href="index.php" class="text-decoration-none fw-medium d-flex align-items-center gap-1 text-navy" style="font-size:14px">
      <i class="bi bi-arrow-left"></i> Back to Home
    </a>
  </div>
</nav>

<div class="setup_pass" id="pass" >
    <div class="login-page-bg d-flex align-items-center justify-content-center" style="min-height:calc(100vh - 57px)">
  <div class="bg-white rounded-4 border shadow-sm p-4 p-md-5 w-100" style="max-width:460px;margin:40px auto">

    <div class="text-center mb-4">
      <img src="logo.png" class="brand-logo mx-auto mb-3" style="width:72px;height:72px" alt="DPNHS Logo">
      <h3 class="fw-bold mb-1" style="color:#1e293b">Create a Password</h3>
  
    </div>
    <div id="login-student-panel">
     
      <div class="mb-3">
        <label class="form-label fw-semibold" style="font-size:13px">Password</label>
        <input type="text" class="form-control" id="stu-id" placeholder="Enter your student ID" value="samplepassword">
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label class="form-label fw-semibold mb-0" style="font-size:13px">Confirm Password</label>
       
        </div>
        <div class="position-relative">
          <input type="password" class="form-control pe-5" id="stu-pw" placeholder="Enter your password" value="samplepassword">
          <button class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-pw',this)"><i class="bi bi-eye"></i></button>
        </div>
      </div>
      <button class="btn btn-navy w-100 py-2 fw-semibold" onclick="loginStudent()">Setup Password</button>
      
    </div>



  </div>
</div>
</div>




<script>
    function loginStudent(){
       toast('Password setup successful!', 'success');
    setTimeout(() => window.location.href = 'login.php', 2500);

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

<?php include 'footer.php'; ?>