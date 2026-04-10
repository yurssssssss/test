<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $secret = "6Lcj6a8sAAAAAKlA5f2cLlOnrAswQMKRC1kvVZFm";
    $token = $_POST['g-recaptcha-response'] ?? '';

    if (empty($token)) {
        die("Please complete the CAPTCHA before submitting.");
    }

    $response = file_get_contents(
      "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$token"
    );

    $data = json_decode($response);

    if (!$data->success) {
        die("Captcha verification failed. Please try again.");
    }

    // ✅ Captcha passed — add your real account creation logic here
    // e.g. insert into DB, start session, redirect
}
?>

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

<form method="POST" id="admissionForm" onsubmit="return handleSubmit(event)">
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
          <input type="text" class="form-control" name="first_name" id="stu-fname" placeholder="Enter your first name" required>
        </div>

        <div class="mb-2">
          <label class="form-label fw-semibold" style="font-size:15px">Last Name</label>
          <input type="text" class="form-control" name="last_name" id="stu-lname" placeholder="Enter your last name" required>
        </div>

        <div class="mb-2">
          <label class="form-label fw-semibold" style="font-size:15px">LRN</label>
          <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-control" name="lrn" id="stu-lrn" placeholder="Enter your 12-digit LRN" required minlength="12">
        </div>

        <div class="mb-2">
          <label class="form-label fw-semibold" style="font-size:15px">Email</label>
          <input type="email" class="form-control" name="email" id="stu-email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <label class="form-label fw-semibold mb-0" style="font-size:15px">Password</label>
          </div>
          <div class="position-relative">
            <input type="password" class="form-control pe-5" name="password" id="stu-pw" placeholder="Enter your password" required>
            <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-pw',this)"><i class="bi bi-eye"></i></button>
          </div>
        </div>

        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <label class="form-label fw-semibold mb-0" style="font-size:15px">Confirm Password</label>
          </div>
          <div class="position-relative">
            <input type="password" class="form-control pe-5" id="stu-cpw" placeholder="Confirm your password" required>
            <button type="button" class="btn position-absolute top-50 end-0 translate-middle-y me-1 p-1 text-secondary border-0" onclick="togglePw('stu-cpw',this)"><i class="bi bi-eye"></i></button>
          </div>
        </div>

        <!-- reCAPTCHA v2 — rendered explicitly via JS so widget ID is tracked -->
        <div id="recaptcha-admission" class="mb-3"></div>

        <button type="submit" class="btn btn-navy w-100 py-2 fw-semibold">Create Account</button>

      </div>

    </div>
  </div>
</form>

<!-- onload= ensures the API is fully ready before rendering the widget -->
<script src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoad&render=explicit" async defer></script>
<script>
  const SITE_KEY = '6Lcj6a8sAAAAAKwL4mDM_KFSN0N8to2YI1RnjGLT';
  let widgetAdmission = null;

  // Called automatically by reCAPTCHA once the API script is fully loaded
  function onRecaptchaLoad() {
    widgetAdmission = grecaptcha.render('recaptcha-admission', { sitekey: SITE_KEY });
  }

  // Called when the form is submitted
  function handleSubmit(event) {
    // Check passwords match first
    const pw = document.getElementById('stu-pw').value;
    const cpw = document.getElementById('stu-cpw').value;
    if (pw !== cpw) {
      event.preventDefault();
      toast('Passwords do not match.', 'error');
      return false;
    }

    // Check CAPTCHA is completed using the explicit widget ID
    const captchaResponse = grecaptcha.getResponse(widgetAdmission);
    if (!captchaResponse) {
      event.preventDefault();
      toast('Please complete the CAPTCHA before creating your account.', 'error');
      return false;
    }

    // ✅ All good — allow form to submit to PHP
    return true;
  }
</script>

<?php include 'footer.php'; ?>