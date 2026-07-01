@extends('layouts.app')
@section('content')

@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>KishanSewa · Services</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

  <style>
    :root {
      --gold: #f9b81b;
      --dark-green: #1e3a2b;
      --bg-color: #f5f9f0;
      --card-bg: #ffffffdd;
      --text-color: #1e2f1e;
      --shadow: rgba(0, 30, 10, 0.08);
      --nav-bg: #1e3a2b;
      --icon-color: #1e2f1e;      /* black/dark in light mode */
    }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      font-family: 'Segoe UI', system-ui, sans-serif;
    }

    body.dark-mode {
      --bg-color: #121f18 !important;
      --text-color: #e6f0da !important;
      --card-bg: #1e2f26dd !important;
      --nav-bg: #0d1f14 !important;
      --icon-color: #e6f0da !important;   /* light in dark mode */
    }

    body.dark-mode .bg-white { background-color: var(--card-bg) !important; }
    body.dark-mode .card { background-color: var(--card-bg) !important; color: var(--text-color) !important; }
    body.dark-mode .text-muted { color: #bdd3ae !important; }
    body.dark-mode .navbar { background-color: var(--nav-bg) !important; }
    body.dark-mode .footer { background-color: #0d1f14 !important; }
    body.dark-mode .service-card { background-color: var(--card-bg) !important; border-color: #2a4d3a !important; }
    body.dark-mode .service-card .icon-wrap { background-color: #2a4d3a !important; }
    body.dark-mode .service-card .icon-wrap i { color: var(--icon-color) !important; }
    body.dark-mode .mt-5.p-4 { background: #1a2f1e !important; border-color: #2a4d3a !important; }
    body.dark-mode .mt-5.p-4 .text-muted { color: #bdd3ae !important; }

    .navbar {
      background-color: var(--nav-bg);
      border-bottom: 3px solid var(--gold);
      padding: 0.6rem 0;
    }
    .navbar .nav-link {
      color: #e6f0da !important;
      font-weight: 500;
    }
    .navbar .nav-link:hover { color: #ffffff !important; }
    .navbar .nav-link.active { color: var(--gold) !important; }
    .navbar .dropdown-toggle::after { display: none !important; }
    .navbar-toggler { border-color: rgba(255,255,255,0.3); }
    .navbar-toggler-icon { filter: invert(1); }

    .btn-gold {
      background-color: var(--gold);
      color: #1e2f1e;
      font-weight: 600;
      border: none;
      transition: 0.3s;
    }
    .btn-gold:hover {
      background-color: #fcc94b;
      color: #1e2f1e;
      transform: scale(1.02);
    }

    .services-hero {
      background: linear-gradient(135deg, #1e3a2b, #2d5a3d);
      border-radius: 24px;
      padding: 2.5rem 2rem;
      margin-bottom: 2rem;
      text-align: center;
      border-left: 6px solid var(--gold);
    }
    .services-hero h1 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #fff;
    }
    .services-hero p {
      font-size: 1.05rem;
      color: #d4e4c9;
      max-width: 550px;
      margin: 0 auto;
    }

    .service-card {
      background: var(--card-bg);
      border-radius: 18px;
      padding: 1.8rem 1.5rem;
      border: 1px solid #d4e4c9;
      box-shadow: 0 4px 12px var(--shadow);
      transition: 0.3s;
      height: 100%;
      text-align: center;
    }
    .service-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 28px var(--shadow);
      border-color: var(--gold);
    }
    .service-card .icon-wrap {
      width: 60px;
      height: 60px;
      border-radius: 16px;
      background: #eaf0e8;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      font-size: 1.8rem;
      transition: 0.3s;
    }
    .service-card .icon-wrap i {
      color: var(--icon-color);
      transition: 0.3s;
    }
    .service-card:hover .icon-wrap {
      background: var(--gold);
    }
    .service-card:hover .icon-wrap i {
      color: #1e2f1e;
    }

    .service-card h5 {
      font-weight: 600;
      margin-bottom: 0.4rem;
    }
    .service-card p {
      font-size: 0.9rem;
      color: #5a7a5a;
      margin-bottom: 0;
    }
    body.dark-mode .service-card p { color: #bdd3ae; }
    body.dark-mode .service-card .icon-wrap { background: #2a4d3a; }
    body.dark-mode .service-card:hover .icon-wrap { background: var(--gold); }
    body.dark-mode .service-card:hover .icon-wrap i { color: #1e2f1e; }

    .footer {
      background: #0d1f14;
      color: #c7d9cb;
      padding: 40px 0 20px;
    }
    .footer-link { color: #bdd3ae; text-decoration: none; display: block; margin: 0.3rem 0; }
    .footer-link:hover { color: var(--gold); }

    .main-wrapper {
      padding: 1.5rem 1.5rem 2.5rem;
      max-width: 1200px;
      margin: 0 auto;
      background: var(--bg-color);
    }

    @media (max-width: 576px) {
      .main-wrapper { padding: 0.8rem; }
      .services-hero { padding: 2rem 1rem; }
      .services-hero h1 { font-size: 2rem; }
      .service-card { padding: 1.5rem 1rem; }
    }
  </style>
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#" style="color: #f9e7b3; font-size: 1.8rem; font-weight: 600;">
      KishanSewa <span style="color: #f9b81b; font-size: 0.85rem; background: #CBBAB3; padding: 0.2rem 0.8rem; border-radius: 30px;">Smart Ag</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-seedling"></i> Crops</a></li>
        <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-cogs"></i> Services</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-file-signature"></i> Schemes</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-envelope"></i> Contact</a></li>
        <li class="nav-item">
          <a class="btn btn-gold rounded-pill px-4" href="/registration">
            <i class="fas fa-user-plus"></i> Login/Register
          </a>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-light rounded-pill px-3" onclick="toggleDark()">
            <i class="fas fa-moon"></i>
          </button>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

  <!-- ===== HERO ===== -->
  <div class="services-hero">
    <h1><i class="fas fa-cogs text-gold me-3"></i>हमारी सेवाएँ</h1>
    <p>किसानों के लिए आधुनिक तकनीक और जानकारी आधारित समाधान।</p>
  </div>

  <!-- ===== SERVICES GRID ===== -->
  <div class="row g-4">

    <!-- 1. AI Crop Advisor -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-robot"></i></div>
        <h5>AI Crop Advisor</h5>
        <p>फसल की सिफारिश, बीमारी पहचान और उपाय — AI के साथ।</p>
      </div>
    </div>

    <!-- 2. Weather Updates -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-cloud-sun"></i></div>
        <h5>Weather Updates</h5>
        <p>रियल-टाइम मौसम की जानकारी और कृषि के लिए सलाह।</p>
      </div>
    </div>

    <!-- 3. Market Prices -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-chart-line"></i></div>
        <h5>Market Prices</h5>
        <p>मंडी भाव, ट्रेंड और सही समय पर बेचने की जानकारी।</p>
      </div>
    </div>

    <!-- 4. Soil Testing -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-flask"></i></div>
        <h5>Soil Testing</h5>
        <p>मिट्टी की जाँच, पोषक तत्वों की जानकारी और सुझाव।</p>
      </div>
    </div>

    <!-- 5. Crop Doctor -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-user-md"></i></div>
        <h5>Crop Doctor</h5>
        <p>फसल की समस्या पहचानें और विशेषज्ञ से सलाह लें।</p>
      </div>
    </div>

    <!-- 6. Drone Spray -->
    <div class="col-md-6 col-lg-4">
      <div class="service-card">
        <div class="icon-wrap"><i class="fas fa-drone"></i></div>
        <h5>Drone Spray</h5>
        <p>ड्रोन से खेतों में दवा और खाद छिड़काव की सुविधा।</p>
      </div>
    </div>

  </div>

  <!-- ===== EXTRA NOTE ===== -->
  <div class="mt-5 p-4 rounded-4" style="background: #f9b81b10; border: 1px solid var(--gold);">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h6 class="fw-bold"><i class="fas fa-phone-alt" style="color: var(--gold);"></i> सहायता चाहिए?</h6>
        <p class="text-muted mb-0">हमारी किसान हेल्पलाइन पर कॉल करें: <strong>1800-180-1551</strong> (टोल-फ्री)</p>
      </div>
      <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="#" class="btn btn-gold rounded-pill px-4"><i class="fas fa-headset me-2"></i>Support</a>
      </div>
    </div>
  </div>

</div>

<!-- ===== FOOTER ===== -->
<footer class="footer mt-0">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <h4 style="color:#f9e7b3;">Kishan Sewa</h4>
        <p class="text-white-50">Smart Agriculture System jo desh ke kisaano ko aadhunik takneek, sahi jankari aur naye avsaron se jodkar unhe samriddh banata hai.</p>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Quick Links</h5>
        <a href="#" class="footer-link">Home</a>
        <a href="#" class="footer-link">Services</a>
        <a href="#" class="footer-link">Schemes</a>
        <a href="#" class="footer-link">Contact</a>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Helplines</h5>
        <p><strong>Kisan Call Center:</strong><br/>1800-180-1551</p>
        <p><strong>Support:</strong><br/>support@kishansewa.com</p>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 style="color:#f9e7b3;">Mobile App</h5>
        <a href="#" class="btn btn-gold rounded-pill px-4"><i class="fab fa-google-play"></i> Download</a>
      </div>
    </div>
    <hr class="border-secondary mt-4"/>
    <p class="text-center text-white-50 mb-0">© 2026 KishanSewa. All Rights Reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function toggleDark() {
    document.body.classList.toggle('dark-mode');
    const btn = document.querySelector('.navbar .btn-outline-light');
    btn.innerHTML = document.body.classList.contains('dark-mode') ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
  }
</script>

</body>
</html>

@endsection

@endsection