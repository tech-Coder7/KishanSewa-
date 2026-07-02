<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KishanSewa · Smart Agriculture</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link rel="stylesheet" href="{{ asset('/') }}css/style.css"/>

</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#" style="color: #f9e7b3; font-size: 1.9rem; font-weight: 600;">
      KishanSewa <span style="color: #f9b81b; font-size: 0.9rem; background: #CBBAB3; padding: 0.2rem 0.8rem; border-radius: 30px;">Smart Ag</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

        <!-- Home -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <i class="fas fa-home"></i> Home
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><i class="fas fa-chart-pie"></i> Dashboard</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-globe"></i> Overview</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-newspaper"></i> News & Updates</a></li>
          </ul>
        </li>

        <!-- About -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/about-us">
            <i class="fas fa-info-circle"></i> About
          </a>
        </li>

        <!-- Crops -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/crop" data-bs-toggle="dropdown">
            <i class="fas fa-seedling"></i> Crops
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/crop"><i class="fas fa-wheat-alt"></i> Wheat (Gehun)</a></li>
            <li><a class="dropdown-item" href="/crop"><i class="fas fa-seedling"></i> Rice (Dhan)</a></li>
            <li><a class="dropdown-item" href="/crop"><i class="fas fa-seedling"></i> Maize (Makai)</a></li>
            <li><a class="dropdown-item" href="/crop"><i class="fas fa-seedling"></i> Pulses (Dal)</a></li>
            <li><a class="dropdown-item" href="/crop"><i class="fas fa-carrot"></i> Vegetables</a></li>
          </ul>
        </li>

        <!-- Services -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/services" data-bs-toggle="dropdown">
            <i class="fas fa-cogs"></i> Services
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/services"><i class="fas fa-robot"></i> AI Crop Advisor</a></li>
            <li><a class="dropdown-item" href="/services"><i class="fas fa-cloud-sun"></i> Weather Updates</a></li>
            <li><a class="dropdown-item" href="/services"><i class="fas fa-chart-line"></i> Market Prices</a></li>
            <li><a class="dropdown-item" href="/services"><i class="fas fa-user-md"></i> Crop Doctor</a></li>
            <li><a class="dropdown-item" href="/services"><i class="fas fa-drone"></i> Drone Spray</a></li>
          </ul>
        </li>

        <!-- Schemes -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/schame" data-bs-toggle="dropdown">
            <i class="fas fa-file-signature"></i> Schemes
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/schame"><i class="fas fa-hand-holding-usd"></i> PM-KISAN</a></li>
            <li><a class="dropdown-item" href="/schame"><i class="fas fa-shield-alt"></i> Fasal Bima</a></li>
            <li><a class="dropdown-item" href="/schame"><i class="fas fa-solar-panel"></i> KUSUM</a></li>
            <li><a class="dropdown-item" href="/schame"><i class="fas fa-store"></i> E-NAM</a></li>
          </ul>
        </li>

        <!-- Contact -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="/contact" data-bs-toggle="dropdown">
            <i class="fas fa-envelope"></i> Contact
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/contact"><i class="fas fa-headset"></i> Support</a></li>
            <li><a class="dropdown-item" href="/contact"><i class="fas fa-phone-alt"></i> Helpline</a></li>
            <li><a class="dropdown-item" href="/contact"><i class="fas fa-comment"></i> Feedback</a></li>
          </ul> 
        </li>

        <!-- Login/Register -->
        <li class="nav-item">
          <a class="btn btn-gold rounded-pill px-4" href="/registration">
            <i class="fas fa-user-plus"></i> Login/Register
</a>
        </li>

        <!-- Dark Mode -->
        <li class="nav-item">
          <button class="btn btn-outline-light rounded-pill px-3" onclick="toggleDark()">
            <i class="fas fa-moon"></i>
          </button>
        </li>

        <!-- Notification -->
        <li class="nav-item position-relative">
          <i class="fas fa-bell text-white fs-5" style="cursor:pointer;"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </li>

        <!-- DateTime -->
        <!-- <li class="nav-item">
          <span class="text-white-50 small" id="datetime"></span>
        </li> -->
      </ul>
    </div>
  </div>
</nav>
@yield('content')
<!-- ===== MAIN WRAPPER WITH SPACING ===== -->


<!-- ===== FOOTER ===== -->
<footer class="bg-dark text-white pt-5 pb-3 mt-0">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <h4 style="color:#f9e7b3;">Kishan Sewa</h4>
        <p class="text-white-50">Smart Agriculture System jo desh ke kisaano ko aadhunik takneek, sahi jankari aur naye avsaron se jodkar unhe samriddh banata hai.</p>
        <div>
          <i class="fab fa-google social-icon"></i>
          <i class="fab fa-facebook social-icon"></i>
          <i class="fab fa-instagram social-icon"></i>
          <i class="fab fa-youtube social-icon"></i>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Mukhya Links</h5>
        <a href="#" class="footer-link">Home</a>
        <a href="#" class="footer-link">About Us</a>
        <a href="#" class="footer-link">Crop Information</a>
        <a href="#" class="footer-link">Live Mandi Bhav</a>
        <a href="#" class="footer-link">AI Crop Advisor</a>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Kishan Helplines</h5>
        <p><strong>Kisan Call Center:</strong><br/>1800-180-1551 (Toll-Free)</p>
        <p><strong>KishanSewa Support:</strong><br/>support@kishansewa.com</p>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Mobile App</h5>
        <p class="text-white-50">Apne phone par turant updates pane ke liye hamara android app download karein.</p>
        <a href="#" class="btn btn-gold rounded-pill px-4"><i class="fab fa-google-play"></i> GET IT ON Google Play</a>
      </div>
    </div>
    <hr class="border-secondary mt-4"/>
    <p class="text-center text-white-50 mb-0">© 2026 KishanSewa. All Rights Reserved. Made with ❤️ for Indian Farmers</p>
  </div>
</footer>
<!-- ===== LOGIN / REGISTER MODAL ===== -->
<!-- ===== CHATBOT FLOAT ===== -->
<button class="chat-float" onclick="alert('🤖 Chatbot: Namaste! Main aapki kya madad kar sakta hu?')">
  <i class="fas fa-comment-dots fs-4 me-2"></i> Chat with AI
</button>

<!-- ===== BOOTSTRAP JS ===== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Dark Mode Toggle
  function toggleDark() {
    document.body.classList.toggle('dark-mode');
    const btn = document.querySelector('.navbar .btn-outline-light');
    btn.innerHTML = document.body.classList.contains('dark-mode') ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
  }

  // Open Modal
  function openModal() {
    const modal = new bootstrap.Modal(document.getElementById('loginModal'));
    modal.show();
  }

  // Switch tab helper
  function switchTab(tabId) {
    const tab = document.getElementById(tabId);
    if (tab) {
      const trigger = new bootstrap.Tab(tab);
      trigger.show();
    }
  }

  // Live DateTime
  function updateDateTime() {
    document.getElementById('datetime').innerHTML = new Date().toLocaleDateString('hi-IN') + ' ' + new Date().toLocaleTimeString('hi-IN');
  }
  updateDateTime();
  setInterval(updateDateTime, 1000);

  // Close modal on ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
      if (modal) modal.hide();
    }
  });
</script>

</body>
</html>