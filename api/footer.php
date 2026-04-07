
<footer class="site-footer">
  <div class="container">
    <div class="row g-4 pb-3 border-bottom border-footer">


      <div class="col-lg-4 col-md-6">
        <div class="d-flex align-items-center gap-3 mb-3">
          <img src="logo.png" class="footer-logo" alt="DPNHS Logo">
          <div>
            <div class="footer-brand-name">Dela Paz National High School</div>
            <div class="footer-brand-sub">Online Enrollment System</div>
          </div>
        </div>
        <p class="footer-desc">Empowering students and administrators with a seamless, modern enrollment experience since 2003.</p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="footer-social"><i class="bi bi-facebook"></i></a>
          <a href="#" class="footer-social"><i class="bi bi-envelope-fill"></i></a>
          <a href="#" class="footer-social"><i class="bi bi-telephone-fill"></i></a>
        </div>
      </div>


      <div class="col-lg-2 col-md-6 col-6">
        <div class="footer-heading">Quick Links</div>
        <ul class="footer-links">
          <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
          <li><a href="admission.php"><i class="bi bi-chevron-right"></i> Apply Now</a></li>
          <li><a href="login.php"><i class="bi bi-chevron-right"></i> Student Login</a></li>
          <li><a href="login.php?tab=admin"><i class="bi bi-chevron-right"></i> Admin Login</a></li>
        </ul>
      </div>


      <div class="col-lg-2 col-md-6 col-6">
        <div class="footer-heading">Resources</div>
        <ul class="footer-links">
          <li><a href="#"><i class="bi bi-chevron-right"></i> DepEd Portal</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i> LRN Lookup</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i> School Calendar</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i> FAQs</a></li>
        </ul>
      </div>

    
      <div class="col-lg-4 col-md-6">
        <div class="footer-heading">Contact Us</div>
        <ul class="footer-contact">
          <li>
            <i class="bi bi-geo-alt-fill footer-contact-icon"></i>
            <span>Dela Paz, Minalabac, Camarines Sur, Philippines</span>
          </li>
          <li>
            <i class="bi bi-telephone-fill footer-contact-icon"></i>
            <span>(054) 000-0000</span>
          </li>
          <li>
            <i class="bi bi-envelope-fill footer-contact-icon"></i>
            <span>delapaz.nhs@deped.gov.ph</span>
          </li>
          <li>
            <i class="bi bi-clock-fill footer-contact-icon"></i>
            <span>Mon – Fri &nbsp;·&nbsp; 7:00 AM – 5:00 PM</span>
          </li>
        </ul>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="footer-bottom d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 pt-3">
      <span>&copy; <?= date('Y') ?> Dela Paz National High School. All rights reserved.</span>
      <span class="footer-bottom-links">
        <a href="#">Privacy Policy</a>
        <span class="mx-2 opacity-50">|</span>
        <a href="#">Terms of Use</a>
        <span class="mx-2 opacity-50">|</span>
        <a href="#">Sitemap</a>
      </span>
    </div>
  </div>  
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
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
</body>
</html>
