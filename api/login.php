<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $secret = "6LdK3q8sAAAAAG2dUb10lRSypnuILa9o-RwVxf6T";
    $token = $_POST['recaptcha_token'] ?? '';

    $response = file_get_contents(
      "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$token"
    );

    $data = json_decode($response);

    if (!$data->success || $data->score < 0.5) {
        die("Captcha verification failed");
    }

    // ✅ your login logic here
}
?>




<?php $pageTitle = 'Login – DPNHS'; ?>
<?php include 'header.php'; ?>

<style>
.g-recaptcha {
  transform: scale(0.95);
  transform-origin: left;
}
</style>

<nav class="bg-white border-bottom py-2">
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

<form method="POST" onsubmit="handleSubmit(event)">
<input type="hidden" name="recaptcha_token" id="recaptchaToken"> 
<div class="login-page-bg d-flex align-items-center justify-content-center" style="min-height:calc(100vh - 57px)">
  <div class="bg-white rounded-4 border shadow-sm p-4 p-md-5 w-100" style="max-width:460px;margin:40px auto">

    <div class="text-center mb-4">
      <img src="logo.png" class="brand-logo mx-auto mb-3" style="width:72px;height:72px" alt="DPNHS Logo">
      <h3 class="fw-bold mb-1" style="color:#1e293b">Welcome Back</h3>
      <p class="text-muted" style="font-size:13.5px">Sign in to access your account</p>
    </div>


    <div class="bg-light rounded-3 d-flex p-1 mb-4" id="loginTabs">
      <button class="btn flex-fill rounded-2 fw-semibold login-tab-btn active" id="tab-student" onclick="switchLoginTab('student')" style="font-size:14px">Student</button>
      <button class="btn flex-fill rounded-2 fw-semibold login-tab-btn" id="tab-admin" onclick="switchLoginTab('admin')" style="font-size:14px">Admin</button>
    </div>

    <div id="login-student-panel">
      <p class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Student Login</p>
      <p class="text-muted mb-3" style="font-size:13px">Enter your credentials to access your student portal</p>
      <div class="mb-3">
        <label class="form-label fw-semibold" style="font-size:13px">Student ID</label>
        <input type="text" class="form-control" id="stu-id" placeholder="Enter your student ID" value="STU2024001">
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label class="form-label fw-semibold mb-0" style="font-size:13px">Password</label>
          <a href="#" class="text-decoration-none text-cyan" style="font-size:13px">Forgot password?</a>
        </div>
        <div class="position-relative">
          <input type="password" class="form-control pe-5" id="stu-pw" placeholder="Enter your password" value="samplepassword ">
          <button class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-pw',this)"><i class="bi bi-eye"></i></button>
        </div>
      </div>
        <div class="g-recaptcha mb-3" data-sitekey="6Lcj6a8sAAAAAKwL4mDM_KFSN0N8to2YI1RnjGLT"></div>
      <button class="btn btn-navy w-100 py-2 fw-semibold" type="submit" onclick="loginStudent()">Login to Student Portal</button>
      <p class="text-center text-muted mt-3 mb-0" style="font-size:13px">Don't have an account? <a href="/admission" class="text-cyan text-decoration-none fw-medium">Apply for admission</a></p>
    </div>


    <div id="login-admin-panel" class="d-none">
      <p class="fw-bold mb-1" style="font-size:15px;color:#1e293b">Admin Login</p>
      <p class="text-muted mb-3" style="font-size:13px">Enter your credentials to access admin dashboard</p>
      <div class="mb-3">
        <label class="form-label fw-semibold" style="font-size:13px">Email Address</label>
        <input type="text" class="form-control" id="adm-email" placeholder="admin@school.edu" value="admin@school.edu">
      </div>
      <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <label class="form-label fw-semibold mb-0" style="font-size:13px">Password</label>
          <a href="#" class="text-decoration-none text-cyan" style="font-size:13px">Forgot password?</a>
        </div>
        <div class="position-relative">
          <input type="password" class="form-control pe-5" id="adm-pw" placeholder="Enter your password" value="admin">
          <button class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('adm-pw',this)"><i class="bi bi-eye"></i></button>
        </div>
      </div>
       <div class="g-recaptcha mb-3" data-sitekey="6Lcj6a8sAAAAAKwL4mDM_KFSN0N8to2YI1RnjGLT"></div>
      <button class="btn btn-navy w-100 py-2 fw-semibold" type="submit" name="submit" >Login to Admin Dashboard</button>
    </div>

  </div>
</div>
</form>

<script>

  const params = new URLSearchParams(window.location.search);
  if (params.get('tab') === 'admin') switchLoginTab('admin');

  function switchLoginTab(tab) {
    document.getElementById('tab-student').classList.toggle('active', tab === 'student');
    document.getElementById('tab-admin').classList.toggle('active', tab === 'admin');
    document.getElementById('login-student-panel').classList.toggle('d-none', tab !== 'student');
    document.getElementById('login-admin-panel').classList.toggle('d-none', tab === 'student');
  }

  function loginStudent() {
    const id = document.getElementById('stu-id').value.trim();
    if (!id) { toast('Please enter your Student ID'); return; }
    toast('Login successful! Welcome back, John Smith.', 'success');
    // Set flag so student.php knows this is a fresh login and shows the announcement
    localStorage.setItem('dpnhs_just_logged_in', '1');
    setTimeout(() => window.location.href = 'student.php', 800);
  }

  function loginAdmin() {
    const em = document.getElementById('adm-email').value.trim();
    if (!em) { toast('Please enter your email'); return; }
    toast('Admin login successful!', 'success');
    setTimeout(() => window.location.href = 'admin.php', 800);
  }

if (!data.success || data.score < 0.5) {
  return res.status(400).json({ error: "Captcha failed" });
}

// ✅ ONLY HERE you proceed
// create account OR login user

// function handleSubmit(event) {
//   event.preventDefault();

//   grecaptcha.ready(function() {
//     grecaptcha.execute('6LdK3q8sAAAAAKZnGROM62vr4qP3qSXTKpajBpxs', { action: 'login' }).then(function(token) {

//       document.getElementById("recaptchaToken").value = token;

//       event.target.submit();
//     });
//   });
// }

</script>

<?php include 'footer.php'; ?>