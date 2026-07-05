@extends('layouts.app')
@section('content')
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
    }

    body {
      background: var(--bg-color);
      color: var(--text-color);
    }

    body.dark-mode {
      --bg-color: #121f18 !important;
      --text-color: #e6f0da !important;
      --card-bg: #1e2f26dd !important;
      --nav-bg: #0d1f14 !important;
    }

    body.dark-mode .bg-white { background-color: var(--card-bg) !important; }
    body.dark-mode .card { background-color: var(--card-bg) !important; color: var(--text-color) !important; }
    body.dark-mode .text-muted { color: #bdd3ae !important; }
    body.dark-mode .navbar { background-color: var(--nav-bg) !important; }
    body.dark-mode .footer { background-color: #0d1f14 !important; }
    body.dark-mode .scheme-card { background-color: var(--card-bg) !important; border-color: #2a4d3a !important; }

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
      transform: scale(1.03);
      box-shadow: 0 4px 15px rgba(249, 184, 27, 0.4);
    }

    .scheme-hero {
      background: linear-gradient(135deg, #1e3a2b, #2d5a3d);
      border-radius: 24px;
      padding: 3rem 2rem;
      margin-bottom: 2rem;
      text-align: center;
      border-left: 6px solid var(--gold);
    }
    .scheme-hero h1 {
      font-size: 2.8rem;
      font-weight: 700;
      color: #fff;
    }
    .scheme-hero p {
      font-size: 1.1rem;
      color: #d4e4c9;
      max-width: 600px;
      margin: 0 auto;
    }

    .scheme-card {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 2rem;
      border: 1px solid #d4e4c9;
      box-shadow: 0 4px 12px var(--shadow);
      transition: 0.3s;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .scheme-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px var(--shadow);
      border-color: var(--gold);
    }
    .scheme-card .scheme-icon {
      font-size: 2.8rem;
      color: var(--gold);
      background: #f9b81b20;
      width: 70px;
      height: 70px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 1rem;
    }
    .scheme-card h4 { font-weight: 700; }
    .scheme-card .badge-status {
      background: var(--gold);
      color: #1e2f1e;
      font-weight: 600;
      padding: 0.3rem 1rem;
      border-radius: 30px;
      font-size: 0.75rem;
      display: inline-block;
    }
    .scheme-card .btn-visit {
      margin-top: auto;
      border-radius: 50px;
      padding: 0.6rem 1.5rem;
      font-weight: 600;
      border: 2px solid var(--gold);
      color: var(--dark-green);
      background: transparent;
      transition: 0.3s;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }
    .scheme-card .btn-visit:hover {
      background: var(--gold);
      color: #1e2f1e;
      transform: scale(1.02);
      box-shadow: 0 4px 15px rgba(249, 184, 27, 0.3);
    }
    body.dark-mode .scheme-card .btn-visit {
      color: var(--gold);
      border-color: var(--gold);
    }
    body.dark-mode .scheme-card .btn-visit:hover {
      color: #1e2f1e;
    }

    .footer {
      background: #0d1f14;
      color: #c7d9cb;
      padding: 50px 0 20px;
    }
    .footer-link { color: #bdd3ae; text-decoration: none; display: block; margin: 0.3rem 0; }
    .footer-link:hover { color: var(--gold); }

    .main-wrapper {
      padding: 1.5rem 1.5rem 2.5rem;
      max-width: 1400px;
      margin: 0 auto;
      background: var(--bg-color);
    }

    @media (max-width: 576px) {
      .main-wrapper { padding: 0.8rem; }
      .scheme-hero { padding: 2rem 1rem; }
      .scheme-hero h1 { font-size: 2rem; }
      .scheme-card { padding: 1.5rem; }
    }
  </style>


<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

  <!-- ===== HERO ===== -->
  <div class="scheme-hero">
    <h1><i class="fas fa-file-signature text-gold me-3"></i>सरकारी योजनाएँ</h1>
    <p>किसानों के लिए चलाई जा रही प्रमुख योजनाओं की पूरी जानकारी और सीधा लिंक – सरकारी वेबसाइट पर विजिट करें।</p>
  </div>

  <!-- ===== SCHEMES GRID ===== -->
  <div class="row g-4">
    @forelse($schemes as $scheme)
      <div class="col-md-6 col-lg-3">
        <div class="scheme-card">
          <div class="scheme-icon">
            <i class="{{ $scheme->icon ?? 'fas fa-file-invoice' }}"></i>
          </div>
          <h4>{{ $scheme->title }}</h4>
          <span class="badge-status">
            <i class="fas fa-check-circle"></i> {{ $scheme->badge ?? 'Active' }}
          </span>
          <p class="text-muted mt-2">{{ $scheme->description }}</p>
          <a href="{{ $scheme->link }}" target="_blank" class="btn-visit">
            <i class="fas fa-external-link-alt me-2"></i> Official Website
          </a>
        </div>
      </div>
    @empty
      <div class="col-12 text-center py-5">
        <p class="text-muted">No government schemes are currently registered.</p>
      </div>
    @endforelse
  </div>

  <!-- ===== EXTRA NOTE ===== -->
  <div class="mt-5 p-4 rounded-4" style="background: #f9b81b15; border: 1px solid var(--gold);">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h5 class="fw-bold"><i class="fas fa-info-circle" style="color: var(--gold);"></i> क्या आप कोई नई योजना ढूंढ रहे हैं?</h5>
        <p class="text-muted mb-0">अधिक योजनाओं के लिए सरकारी पोर्टल <strong>https://www.india.gov.in/</strong> पर विजिट करें।</p>
      </div>
      <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="https://www.india.gov.in/" target="_blank" class="btn btn-gold rounded-pill px-4">
          <i class="fas fa-globe me-2"></i> Explore More
        </a>
      </div>
    </div>
  </div>

</div>

@endsection