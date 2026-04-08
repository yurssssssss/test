<?php $pageTitle = 'Dela Paz National High School – Online Enrollment System'; ?>
<?php include 'header.php'; ?>

<!-- NAV -->
<nav class="bg-white border-bottom sticky-top py-2">
  <div class="container d-flex align-items-center justify-content-between">
    <a href="/api/index.php" class="d-flex align-items-center gap-2 text-decoration-none">
      <img src="logo.png" class="brand-logo" alt="DPNHS Logo" style="width: 55px; height: 55px;" >
      <div>
        <div class="fw-bold text-navy" style="font-size:15px;line-height:1.2">Dela Paz National High School</div>
        <div class="text-muted" style="font-size:11px">Online Enrollment System</div>
      </div>
    </a>
    <div class="d-none d-md-flex gap-4">
      <a href="#features" class="text-secondary text-decoration-none" style="font-size:14px">Features</a>
      <a href="#about" class="text-secondary text-decoration-none" style="font-size:14px">About</a>
      <a href="#contact" class="text-secondary text-decoration-none" style="font-size:14px">Contact</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero-section text-white text-center position-relative overflow-hidden">
  <div class="container position-relative" style="z-index:1">
    <h1 class="fw-bold mb-3" style="font-size:2.8rem">Welcome to Dela Paz National<br>High School</h1>
    <p class="lead opacity-90 mb-2">Streamline Your Enrollment Process with Our Modern Online System</p>
    <p class="opacity-75 mx-auto mb-4" style="max-width:540px;font-size:.95rem">A comprehensive platform designed for students, parents, and administrators to simplify the admission and enrollment process.</p>
   
  </div>
  <svg class="hero-wave" viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0,40 C360,0 1080,80 1440,20 L1440,60 L0,60 Z" fill="#ffffff"/>
  </svg>
</section>

<!-- FEATURES -->
<section id="features" class="py-5 bg-white">
  <div class="container">
    <h2 class="fw-bold text-center mb-2" style="font-size:2rem;color:#1e293b">Key Features</h2>
    <p class="text-center text-muted mb-5">Everything you need for a smooth enrollment experience</p>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-card h-100">
          <div class="feature-icon text-navy fs-3 mb-3"><i class="bi bi-person-plus-fill"></i></div>
          <h5 class="fw-bold mb-2" style="color:#1e293b">Easy Application</h5>
          <p class="text-muted mb-3" style="font-size:13.5px">Simple and intuitive online admission application form for new students</p>
          <a href="/api/admission.php" class="text-decoration-none fw-semibold text-navy" style="font-size:13.5px">Apply Now →</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card h-100">
          <div class="feature-icon text-cyan fs-3 mb-3"><i class="bi bi-box-arrow-in-right"></i></div>
          <h5 class="fw-bold mb-2" style="color:#1e293b">Existing Student Login</h5>
          <p class="text-muted mb-3" style="font-size:13.5px">Secure login for existing students to manage enrollment and view sections</p>
          <a href="/api/  login.php" class="text-decoration-none fw-semibold text-cyan" style="font-size:13.5px">Login Now →</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card h-100">
          <div class="feature-icon text-orange fs-3 mb-3"><i class="bi bi-shield-fill"></i></div>
          <h5 class="fw-bold mb-2" style="color:#1e293b">Admin Dashboard</h5>
          <p class="text-muted mb-3" style="font-size:13.5px">Comprehensive dashboard for administrators to manage students and sections</p>
          <a href="/api/login.php#admin" class="text-decoration-none fw-semibold text-orange" style="font-size:13.5px">Admin Access →</a>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include 'footer.php'; ?>
