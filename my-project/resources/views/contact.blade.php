@extends('layouts.app')
@section('content')
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

  <style>
    /* ===== ROOT VARIABLES ===== */
    :root {
      --gold: #f9b81b;
      --dark-green: #1e3a2b;
      --light-green: #e6f0da;
      --text-color: #1e2f1e;
      --bg-color: #f5f9f0;
      --card-bg: #ffffffdd;
      --shadow: rgba(0, 30, 10, 0.08);
      --dropdown-bg: #ffffff;
      --nav-bg: #1e3a2b;
      --color-location: #e74c3c;
      --color-phone: #27ae60;
      --color-email: #2980b9;
      --color-hours: #f39c12;
      --color-social: #8e44ad;
    }

    * {
      transition: background-color 0.3s, color 0.2s, transform 0.2s;
    }

    /* ===== DARK MODE ===== */
    body.dark-mode {
      --bg-color: #121f18 !important;
      --text-color: #e6f0da !important;
      --card-bg: #1e2f26dd !important;
      --nav-bg: #0d1f14 !important;
      --dropdown-bg: #1a2f1e !important;
      --shadow: rgba(0, 0, 0, 0.4) !important;
    }
    body.dark-mode .bg-light { background-color: #1a2f1e !important; }
    body.dark-mode .card { background-color: var(--card-bg) !important; color: var(--text-color) !important; }
    body.dark-mode .card .text-muted { color: #bdd3ae !important; }
    body.dark-mode .bg-white { background-color: var(--card-bg) !important; }
    body.dark-mode .text-dark { color: var(--text-color) !important; }
    body.dark-mode .border { border-color: #2a4d3a !important; }
    body.dark-mode .form-control { background-color: #2a4d3a; color: var(--text-color); border-color: #3a5d4a; }
    body.dark-mode .form-control::placeholder { color: #bdd3ae; }
    body.dark-mode .footer { background-color: #0d1f14 !important; }
    body.dark-mode .navbar { background-color: var(--nav-bg) !important; }
    body.dark-mode .main-wrapper { background-color: var(--bg-color); }
    body.dark-mode .contact-info-box { background-color: var(--card-bg) !important; border-color: #2a4d3a !important; }
    body.dark-mode .contact-info-box .text-muted { color: #bdd3ae !important; }
    body.dark-mode .social-icon-circle { background-color: #2a4d3a !important; }
    body.dark-mode .social-icon-circle:hover { background-color: var(--gold) !important; }

    body {
      background: var(--bg-color);
      color: var(--text-color);
      margin: 0;
      padding: 0;
    }

    /* ===== MAIN WRAPPER ===== */
    .main-wrapper {
      padding: 1.5rem 1.5rem 2.5rem 1.5rem;
      max-width: 1400px;
      margin: 0 auto;
      background: var(--bg-color);
    }

    /* ===== UTILITY ===== */
    .bg-gold { background-color: var(--gold); }
    .text-gold { color: var(--gold); }
    .border-gold { border-color: var(--gold); }

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

    /* ===== NAVBAR (copied from your existing) ===== */
    .navbar {
      background-color: var(--nav-bg);
      border-bottom: 3px solid var(--gold);
      padding: 0.6rem 0;
    }
    .navbar .dropdown-toggle::after {
      display: none !important;
      content: none !important;
    }
    .navbar .nav-link {
      position: relative;
      padding: 0.5rem 0.8rem !important;
      font-weight: 500;
      color: #e6f0da !important;
      transition: all 0.3s ease;
    }
    .navbar .nav-link::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 3px;
      background: var(--gold);
      border-radius: 10px;
      transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      transform: translateX(-50%);
      box-shadow: 0 0 10px rgba(249, 184, 27, 0.3);
    }
    .navbar .nav-link:hover::after {
      width: 80%;
      box-shadow: 0 0 20px rgba(249, 184, 27, 0.6);
    }
    .navbar .nav-link:hover {
      color: #ffffff !important;
      transform: translateY(-1px);
    }
    .navbar .dropdown-menu {
      border-radius: 16px;
      border: 1px solid #d4e4c9;
      box-shadow: 0 16px 40px rgba(0,0,0,0.12);
      padding: 0.5rem 0;
      min-width: 210px;
      margin-top: 4px;
      display: block;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-10px);
      transition: all 0.25s ease;
      background: var(--dropdown-bg);
    }
    .navbar .dropdown:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    .navbar .dropdown-item {
      padding: 0.6rem 1.5rem;
      font-weight: 500;
      color: var(--text-color);
      border-left: 3px solid transparent;
      transition: all 0.2s ease;
    }
    .navbar .dropdown-item:hover {
      background-color: #f5f9f0;
      color: var(--dark-green);
      border-left-color: var(--gold);
      padding-left: 1.8rem;
    }
    .navbar .dropdown-item i {
      width: 24px;
      color: var(--gold);
      margin-right: 10px;
      transition: 0.2s;
    }
    .navbar .dropdown-item:hover i {
      transform: scale(1.15);
    }
    .navbar-toggler { border-color: rgba(255,255,255,0.3); }
    .navbar-toggler-icon { filter: invert(1); }

    /* ===== CONTACT PAGE SPECIFIC ===== */
    .contact-hero {
      background: linear-gradient(135deg, #1e3a2b, #2d5a3d);
      border-radius: 24px;
      padding: 3rem 2rem;
      margin-bottom: 2rem;
      text-align: center;
      border-left: 6px solid var(--gold);
    }
    .contact-hero h1 {
      font-size: 2.8rem;
      font-weight: 700;
      color: #fff;
    }
    .contact-hero p {
      font-size: 1.1rem;
      color: #d4e4c9;
      max-width: 600px;
      margin: 0 auto;
    }

    .contact-info-box {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 1.8rem;
      border: 1px solid #d4e4c9;
      height: 100%;
      transition: 0.3s;
      box-shadow: 0 4px 12px var(--shadow);
      display: flex;
      align-items: flex-start;
      gap: 1.2rem;
    }
    .contact-info-box:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 30px var(--shadow);
      border-color: var(--gold);
    }
    .contact-info-box .icon-wrapper {
      flex-shrink: 0;
      width: 56px;
      height: 56px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.6rem;
      color: #fff;
    }
    .contact-info-box .icon-wrapper.icon-location { background: var(--color-location); }
    .contact-info-box .icon-wrapper.icon-phone { background: var(--color-phone); }
    .contact-info-box .icon-wrapper.icon-email { background: var(--color-email); }
    .contact-info-box .icon-wrapper.icon-hours { background: var(--color-hours); }
    .contact-info-box .icon-wrapper.icon-social { background: var(--color-social); }

    .contact-info-box .info-content h5 {
      font-weight: 600;
      margin-bottom: 4px;
      color: var(--text-color);
    }
    .contact-info-box .info-content p {
      font-size: 0.95rem;
      color: #5a7a5a;
      margin-bottom: 0;
    }
    body.dark-mode .contact-info-box .info-content p { color: #bdd3ae; }
    body.dark-mode .contact-info-box .info-content h5 { color: #e6f0da; }

    .form-control-custom {
      border-radius: 16px;
      padding: 0.8rem 1.2rem;
      border: 2px solid #d4e4c9;
      background: var(--bg-color);
      color: var(--text-color);
      transition: 0.3s;
    }
    .form-control-custom:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 4px rgba(249, 184, 27, 0.15);
      outline: none;
    }
    body.dark-mode .form-control-custom {
      background: #1e2f26;
      border-color: #2a4d3a;
      color: #e6f0da;
    }
    body.dark-mode .form-control-custom:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 4px rgba(249, 184, 27, 0.2);
    }

    .form-label-custom {
      font-weight: 600;
      font-size: 0.9rem;
      color: var(--text-color);
    }

    /* ===== MAP - CHHOTA ===== */
    .map-container {
      border-radius: 20px;
      overflow: hidden;
      border: 3px solid var(--gold);
      box-shadow: 0 8px 24px var(--shadow);
      max-width: 700px;
      margin: 0 auto;
    }
    .map-container iframe {
      width: 100%;
      height: 250px;
      border: none;
      display: block;
    }

    .social-icon-circle {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: #e6f0da;
      color: var(--dark-green);
      font-size: 1.4rem;
      transition: 0.3s;
      margin-right: 10px;
      text-decoration: none;
      border: 2px solid transparent;
    }
    .social-icon-circle:hover {
      background: var(--gold);
      color: #1e2f1e;
      transform: scale(1.1);
      border-color: var(--gold);
      box-shadow: 0 4px 15px rgba(249, 184, 27, 0.3);
    }
    body.dark-mode .social-icon-circle {
      background: #2a4d3a;
      color: #bdd3ae;
    }
    body.dark-mode .social-icon-circle:hover {
      background: var(--gold);
      color: #1e2f1e;
    }

    .footer {
      background: #0d1f14;
      color: #c7d9cb;
      padding: 50px 0 20px;
    }
    .footer-link { color: #bdd3ae; text-decoration: none; display: block; margin: 0.3rem 0; }
    .footer-link:hover { color: var(--gold); }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 576px) {
      .main-wrapper { padding: 0.8rem 0.8rem 1.5rem 0.8rem; }
      .contact-hero { padding: 2rem 1rem; }
      .contact-hero h1 { font-size: 2rem; }
      .contact-hero p { font-size: 0.95rem; }
      .map-container iframe { height: 180px; }
      .social-icon-circle { width: 40px; height: 40px; font-size: 1.1rem; }
      .contact-info-box { flex-direction: column; align-items: center; text-align: center; }
      .contact-info-box .icon-wrapper { width: 48px; height: 48px; font-size: 1.3rem; }
    }

    @media (max-width: 768px) {
      .contact-hero h1 { font-size: 2.2rem; }
    }

    /* ===== MOBILE DROPDOWN FIX ===== */
    @media (max-width: 576px) {
      .navbar .dropdown-menu {
        border: none;
        box-shadow: none;
        background: transparent !important;
        padding-left: 1rem;
        transform: none !important;
        opacity: 1 !important;
        visibility: visible !important;
        display: none;
        position: static !important;
        width: 100% !important;
        float: none !important;
      }
      .navbar .dropdown.show .dropdown-menu {
        display: block !important;
      }
      .navbar .dropdown-item {
        padding: 0.5rem 1rem;
        color: #e6f0da !important;
        border-left-color: var(--gold) !important;
      }
      .navbar .dropdown-item:hover {
        background: transparent !important;
        color: var(--gold) !important;
      }
      body.dark-mode .navbar .dropdown-item { color: #e6f0da !important; }
      .navbar .dropdown-toggle::after {
        display: inline-block !important;
        margin-left: 6px;
        vertical-align: middle;
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-left: 0.3em solid transparent;
      }
    }
  </style>


<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

  <!-- ===== CONTACT HERO ===== -->
  <div class="contact-hero">
    <h1><i class="fas fa-headset text-gold me-3"></i>हमसे संपर्क करें</h1>
    <p>हम आपकी हर समस्या का समाधान करने के लिए यहाँ हैं। कोई भी प्रश्न, सुझाव या शिकायत हो तो हमें बताएं।</p>
    <div class="mt-3">
      <a href="tel:18001801551" class="btn btn-gold rounded-pill px-5 py-2 me-2">
        <i class="fas fa-phone-alt"></i> Toll-Free: 1800-180-1551
      </a>
    </div>
  </div>

  <!-- ===== CONTACT FORM + INFO ===== -->
  <div class="row g-4">

    <!-- ===== LEFT: CONTACT FORM ===== -->
    <div class="col-lg-7">
      <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="background: var(--card-bg);">
        <h3 class="fw-bold mb-3"><i class="fas fa-paper-plane" style="color: var(--gold);"></i> संदेश भेजें</h3>
        <p class="text-muted">आपका संदेश हमें भेजें, हम जल्द से जल्द आपसे संपर्क करेंगे।</p>

        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label-custom"><i class="fas fa-user" style="color: var(--gold);"></i> पूरा नाम</label>
              <input type="text" class="form-control form-control-custom" placeholder="अपना नाम लिखें" required />
            </div>
            <div class="col-md-6">
              <label class="form-label-custom"><i class="fas fa-envelope" style="color: var(--gold);"></i> ईमेल</label>
              <input type="email" class="form-control form-control-custom" placeholder="your@email.com" required />
            </div>
            <div class="col-md-6">
              <label class="form-label-custom"><i class="fas fa-phone" style="color: var(--gold);"></i> मोबाइल नंबर</label>
              <input type="tel" class="form-control form-control-custom" placeholder="9876543210" />
            </div>
            <div class="col-md-6">
              <label class="form-label-custom"><i class="fas fa-tag" style="color: var(--gold);"></i> विषय</label>
              <input type="text" class="form-control form-control-custom" placeholder="विषय लिखें" />
            </div>
            <div class="col-12">
              <label class="form-label-custom"><i class="fas fa-comment" style="color: var(--gold);"></i> संदेश</label>
              <textarea class="form-control form-control-custom" rows="5" placeholder="अपना संदेश यहाँ लिखें..." required></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-gold rounded-pill px-5 py-3 w-100 w-md-auto">
                <i class="fas fa-paper-plane me-2"></i> संदेश भेजें
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- ===== RIGHT: CONTACT INFO ===== -->
    <div class="col-lg-5">
      <div class="vstack gap-4">

        <!-- Address - Red Icon -->
        <div class="contact-info-box">
          <div class="icon-wrapper icon-location"><i class="fas fa-map-marker-alt"></i></div>
          <div class="info-content">
            <h5>📍 हमारा पता</h5>
            <p>Kisan Bhawan, Connaught Place,<br/>New Delhi - 110001</p>
          </div>
        </div>

        <!-- Phone - Green Icon -->
        <div class="contact-info-box">
          <div class="icon-wrapper icon-phone"><i class="fas fa-phone-alt"></i></div>
          <div class="info-content">
            <h5>📞 फोन नंबर</h5>
            <p><strong>Toll-Free:</strong> 1800-180-1551</p>
            <p><strong>Mobile:</strong> +91 98765 43210</p>
          </div>
        </div>

        <!-- Email - Blue Icon -->
        <div class="contact-info-box">
          <div class="icon-wrapper icon-email"><i class="fas fa-envelope"></i></div>
          <div class="info-content">
            <h5>✉️ ईमेल</h5>
            <p>support@kishansewa.com</p>
            <p>info@kishansewa.com</p>
          </div>
        </div>

        <!-- Working Hours - Orange Icon -->
        <div class="contact-info-box">
          <div class="icon-wrapper icon-hours"><i class="fas fa-clock"></i></div>
          <div class="info-content">
            <h5>🕐 कार्यालय समय</h5>
            <p><strong>सोमवार – शनिवार:</strong> 8:00 AM – 6:00 PM</p>
            <p><strong>रविवार:</strong> बंद</p>
          </div>
        </div>

        <!-- Social - Purple Icon -->
        <div class="contact-info-box">
          <div class="icon-wrapper icon-social"><i class="fas fa-share-alt"></i></div>
          <div class="info-content">
            <h5>🌐 सोशल मीडिया</h5>
            <div class="mt-2">
              <a href="#" class="social-icon-circle"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="social-icon-circle"><i class="fab fa-instagram"></i></a>
              <a href="#" class="social-icon-circle"><i class="fab fa-youtube"></i></a>
              <a href="#" class="social-icon-circle"><i class="fab fa-twitter"></i></a>
              <a href="#" class="social-icon-circle"><i class="fab fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- ===== MAP SECTION - CHHOTA (Connaught Place, Delhi) ===== -->
  <div class="mt-5 text-center">
    <h4 class="mb-3"><i class="fas fa-map" style="color: var(--gold);"></i> हमें Google Maps पर खोजें</h4>
    <div class="map-container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.8328761767955!2d77.21656837557432!3d28.632515775710093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347819bb%3A0x5f3f2b6e2f5f2b6e!2sConnaught%20Place%2C%20New%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1710000000000"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
    <p class="text-muted small mt-2"><i class="fas fa-location-dot" style="color: var(--color-location);"></i> Connaught Place, New Delhi - 110001</p>
  </div>

  <!-- ===== FAQ / SUPPORT NOTE ===== -->
  <div class="mt-4 p-4 rounded-4" style="background: #f9b81b15; border: 1px solid var(--gold);">
    <div class="row align-items-center">
      <div class="col-md-8">
        <h5 class="fw-bold"><i class="fas fa-life-ring" style="color: var(--gold);"></i> तुरंत सहायता चाहिए?</h5>
        <p class="text-muted mb-0">हमारी AI चैटबॉट 24x7 आपकी मदद के लिए उपलब्ध है। साथ ही आप हमारे हेल्पलाइन नंबर पर भी कॉल कर सकते हैं।</p>
      </div>
      <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <a href="#" class="btn btn-gold rounded-pill px-4"><i class="fas fa-comment-dots me-2"></i>Chat Now</a>
        <a href="tel:18001801551" class="btn btn-outline-dark rounded-pill px-4 ms-2"><i class="fas fa-phone"></i> Call</a>
      </div>
    </div>
  </div>

</div>
<!-- ===== CHATBOT FLOAT ===== -->
<button class="chat-float" onclick="alert('🤖 Chatbot: Namaste! Main aapki kya madad kar sakta hu?')" style="position:fixed; bottom:2rem; right:2rem; z-index:999; background:#25D366; border:none; border-radius:60px; padding:0.8rem 1.5rem; font-weight:600; color:white; box-shadow:0 8px 24px rgba(0,0,0,0.3); transition:0.3s;">
  <i class="fas fa-comment-dots fs-4 me-2"></i> Chat with AI
</button>
@endsection
