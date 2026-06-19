<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KishanSewa • स्मार्ट किसान समाधान</title>
    <!-- Font Awesome 6 (free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Bootstrap 5 (grid & utilities) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* ---------- GLOBAL ---------- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Roboto, system-ui, sans-serif; background: #ffffff; color: #1f2937; }
        a { text-decoration: none; }

        /* ---------- LOGO / NAV ---------- */
        .logo-img {
            width: 60px; height: 60px; border-radius: 50%; object-fit: cover;
            border: 2px solid #198754; margin-left: -50px;
        }
        .logo-text { line-height: 1.2; }
        .logo-text h4 { margin: 0; color: #2E7D32; font-weight: bold; font-size: 28px; }
        .logo-text h2 { margin: 0; color: gray; font-size: 16px; font-weight: 400; }
        .navbar-nav .nav-link { font-size: 18px; font-weight: 500; margin: 0 8px; color: #222; }
        .navbar-nav .nav-link:hover { color: #2E7D32; }
        .btn-success { border-radius: 30px; padding: 8px 25px; }

        /* ---------- HERO ---------- */
        .hero-section {
            width: 100%; height: 580px;
            background:
                linear-gradient(to right, rgba(255,255,255,0.88) 28%, rgba(255,255,255,0.45) 45%, rgba(255,255,255,0.10) 60%, rgba(255,255,255,0) 75%),
                url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600"%3E%3Crect width="800" height="600" fill="%234caf50"/%3E%3C/svg%3E');
            background-size: cover; background-position: center; background-repeat: no-repeat;
        }
        .hero-content { width: 85%; padding-top: 70px; }
        .hero-content h1 { font-size: 3.2rem; font-weight: 700; color: #0b4d16; line-height: 1.2; }
        .hero-content p { font-size: 1.25rem; color: #222; margin: 25px 0; max-width: 450px; }
        .hero-btn {
            background: #0b7a20; color: #fff; padding: 14px 35px; border-radius: 30px;
            font-size: 20px; display: inline-block; transition: 0.3s;
        }
        .hero-btn:hover { background: #095f18; color: #fff; }

        /* ---------- FEATURE SECTION ---------- */
        .feature-section { margin-top: -70px; position: relative; z-index: 10; }
        .feature-card {
            background: #fff; padding: 25px 15px; border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.10); height: 100%; transition: 0.3s;
        }
        .feature-card:hover { transform: translateY(-8px); }
        .feature-icon { width: 70px; height: 70px; margin-bottom: 15px; object-fit: contain; }
        .feature-card h5 { font-size: 22px; font-weight: 600; margin-bottom: 10px; color: #222; }
        .feature-card p { font-size: 15px; color: #666; margin: 0; }

        /* ---------- COUNTER ---------- */
        .counter-section { background: #f5f5f5; padding-top: 20px; padding-bottom: 30px; }
        .counter-box { background: #fff; border-radius: 20px; padding: 25px 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
        .counter-item {
            display: flex; align-items: center; justify-content: center; gap: 18px;
            border-right: 1px solid #ddd; padding: 15px;
        }
        .counter-icon { width: 60px; height: 60px; object-fit: contain; }
        .counter-item h2 { margin: 0; font-size: 3rem; font-weight: 700; color: #0b4d16; }
        .counter-item p { margin: 0; font-size: 1.3rem; color: #222; }
        .border-end-0 { border-right: none !important; }

        /* ---------- SCANNER (B) ---------- */
        .scanner-section { padding: 80px 20px; background-color: #ffffff; }
        .scanner-container {
            max-width: 1200px; margin: 0 auto;
            display: flex; align-items: center; justify-content: space-between; gap: 50px; flex-wrap: wrap;
        }
        .scanner-content { flex: 1; min-width: 300px; }
        .badge-new {
            background-color: #e8f5e9; color: #2e7d32; padding: 6px 12px; border-radius: 50px;
            font-size: 14px; font-weight: 600; display: inline-block; margin-bottom: 15px; text-transform: uppercase;
        }
        .scanner-content h2 { font-size: 36px; color: #1b5e20; margin-bottom: 20px; line-height: 1.2; }
        .scanner-content p { font-size: 16px; color: #455a64; line-height: 1.6; margin-bottom: 30px; }
        .upload-wrapper { display: flex; align-items: center; gap: 15px; flex-wrap: wrap; }
        .upload-btn {
            background-color: #2e7d32; color: #ffffff; padding: 14px 28px; border-radius: 8px;
            font-size: 16px; font-weight: 600; cursor: pointer; transition: 0.3s;
            display: inline-flex; align-items: center; gap: 10px; border: none;
            box-shadow: 0 4px 6px rgba(46,125,50,0.2);
        }
        .upload-btn:hover { background-color: #1b5e20; transform: translateY(-2px); }
        .upload-note { font-size: 13px; color: #78909c; }
        .scanner-graphic { flex: 1; min-width: 300px; display: flex; justify-content: center; }
        .leaf-card {
            position: relative; width: 100%; max-width: 400px; border-radius: 16px;
            overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1); border: 4px solid #e0e0e0;
        }
        .leaf-img { width: 100%; height: 350px; object-fit: cover; display: block; background: #a5d6a7; }
        .scan-line {
            position: absolute; top: 0; left: 0; width: 100%; height: 4px;
            background: linear-gradient(to right, transparent, #00e676, transparent);
            box-shadow: 0 0 12px #00e676; animation: scanAnimation 3s linear infinite;
        }
        @keyframes scanAnimation { 0% { top: 0%; } 50% { top: 100%; } 100% { top: 0%; } }
        .scan-status {
            position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%);
            background: rgba(0,0,0,0.75); color: #fff; padding: 8px 18px; border-radius: 50px;
            font-size: 14px; backdrop-filter: blur(4px); display: flex; align-items: center; gap: 8px;
        }

        /* ---------- DASHBOARD ---------- */
        .dashboard-section { padding: 60px 20px; background-color: #f9fafb; }
        .dashboard-container { max-width: 1200px; margin: 0 auto; }
        .dashboard-heading { text-align: center; margin-bottom: 40px; }
        .dashboard-heading h2 { font-size: 32px; color: #111827; margin-bottom: 8px; font-weight: 700; }
        .dashboard-heading p { font-size: 16px; color: #6b7280; }
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; }
        .dashboard-card {
            background: #ffffff; border-radius: 16px; padding: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #f3f4f6;
            display: flex; flex-direction: column; justify-content: space-between;
        }
        .border-green { border-top: 4px solid #2e7d32; }
        .border-blue { border-top: 4px solid #1565c0; }
        .card-header {
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid #f3f4f6; padding-bottom: 15px; margin-bottom: 20px;
            flex-wrap: wrap; gap: 10px;
        }
        .card-header h3 { font-size: 20px; color: #1f2937; margin: 0; display: flex; align-items: center; gap: 8px; }
        .icon-green { color: #2e7d32; }
        .icon-blue { color: #1565c0; }
        .dashboard-dropdown {
            padding: 8px 14px; border-radius: 8px; border: 1px solid #d1d5db;
            background: #f9fafb; color: #374151; font-size: 14px; cursor: pointer; outline: none;
        }
        .table-responsive { overflow-x: auto; }
        .mandi-table { width: 100%; border-collapse: collapse; text-align: left; }
        .mandi-table th { padding: 12px; background: #f9fafb; color: #6b7280; font-size: 13px; text-transform: uppercase; font-weight: 600; }
        .mandi-table td { padding: 14px 12px; border-bottom: 1px solid #f3f4f6; font-size: 15px; }
        .crop-name { font-weight: 500; color: #374151; }
        .crop-price { font-weight: 600; color: #111827; }
        .trend-status { font-weight: 700; font-size: 14px; }
        .trend-up { color: #2e7d32; }
        .trend-down { color: #d32f2f; }
        .trend-stable { color: #78909c; }
        .weather-display-box {
            background: #e3f2fd; padding: 20px; border-radius: 12px;
            display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;
        }
        .current-temp { font-size: 40px; font-weight: 800; color: #111827; }
        .weather-status { color: #1565c0; font-weight: 600; margin-top: 4px; font-size: 15px; }
        .weather-meta { font-size: 12px; color: #6b7280; margin-top: 4px; }
        .weather-icon-large { font-size: 44px; color: #1e88e5; }
        .pulse-animation { animation: pulse 2s infinite; }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.08); } 100% { transform: scale(1); } }
        .advisory-alert-box {
            background: #fffde7; border-left: 4px solid #fbc02d;
            padding: 15px; border-radius: 0 12px 12px 0; display: flex; gap: 12px;
        }
        .advisory-icon { color: #f57f17; font-size: 18px; margin-top: 2px; }
        .advisory-text h4 { color: #f57f17; margin: 0 0 4px 0; font-size: 14px; font-weight: 700; }
        .advisory-text p { color: #5d4037; font-size: 13px; margin: 0; line-height: 1.5; }
        .card-footer { margin-top: 24px; padding-top: 15px; border-top: 1px solid #f3f4f6; }
        .dashboard-btn-link { text-decoration: none; font-weight: 600; font-size: 15px; display: inline-block; }
        .text-green { color: #2e7d32; }
        .text-green:hover { color: #1b5e20; }
        .text-blue { color: #1565c0; }
        .text-blue:hover { color: #0d47a1; }

        /* ---------- SCHEMES (C) ---------- */
        .schemes-section { padding: 80px 20px; background-color: #f4f6f8; }
        .schemes-container { max-width: 1200px; margin: 0 auto; }
        .schemes-header { text-align: center; margin-bottom: 50px; }
        .schemes-header h2 { font-size: 32px; color: #111827; margin-bottom: 12px; font-weight: 700; }
        .schemes-header p { font-size: 16px; color: #6b7280; }
        .schemes-grid { display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; }
        .scheme-card {
            background: #ffffff; border-radius: 16px; padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04); flex: 1; min-width: 300px; max-width: 380px;
            display: flex; flex-direction: column; justify-content: space-between;
            border: 1px solid #e5e7eb; transition: 0.3s;
        }
        .scheme-card:hover { transform: translateY(-5px); box-shadow: 0 12px 25px rgba(0,0,0,0.1); }
        .scheme-icon-box {
            width: 60px; height: 60px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px; margin-bottom: 20px;
        }
        .bg-light-green { background-color: #e8f5e9; }
        .text-dark-green { color: #2e7d32; }
        .bg-light-orange { background-color: #fff3e0; }
        .text-dark-orange { color: #f57c00; }
        .bg-light-blue { background-color: #e3f2fd; }
        .text-dark-blue { color: #1565c0; }
        .scheme-card h3 { font-size: 20px; color: #1f2937; margin: 0 0 12px 0; font-weight: 700; }
        .scheme-card p { font-size: 14px; color: #4b5563; line-height: 1.6; margin: 0 0 20px 0; }
        .scheme-footer {
            display: flex; justify-content: space-between; align-items: center;
            border-top: 1px solid #f3f4f6; padding-top: 15px; margin-top: auto;
        }
        .status-badge { padding: 5px 12px; border-radius: 50px; font-size: 12px; font-weight: 600; }
        .badge-green { background: #e8f5e9; color: #2e7d32; }
        .badge-blue { background: #e3f2fd; color: #1565c0; }
        .badge-orange { background: #fff3e0; color: #f57c00; }
        .scheme-link { color: #2e7d32; text-decoration: none; font-weight: 600; font-size: 14px; }
        .scheme-link:hover { color: #1b5e20; }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 768px) {
            .logo-img { margin-left: 0; width: 50px; height: 50px; }
            .logo-text h4 { font-size: 22px; }
            .logo-text h2 { font-size: 13px; }
            .hero-section { height: auto; min-height: 500px; text-align: center; background-position: center; }
            .hero-content { width: 100%; padding-top: 40px; }
            .hero-content h1 { font-size: 2.5rem; }
            .hero-content p { font-size: 1.1rem; margin: 20px auto; max-width: 100%; }
            .hero-btn { font-size: 16px; padding: 10px 25px; }
            .feature-section { margin-top: 30px; }
            .feature-card { margin-bottom: 20px; }
            .feature-icon { width: 55px; height: 55px; }
            .feature-card h5 { font-size: 18px; }
            .counter-item { border-right: none; border-bottom: 1px solid #ddd; margin-bottom: 15px; padding-bottom: 20px; }
            .counter-item:last-child { border-bottom: none; }
            .counter-item h2 { font-size: 2.2rem; }
            .counter-item p { font-size: 1rem; }
            .counter-icon { width: 50px; height: 50px; }
            .scanner-container { flex-direction: column; text-align: center; }
            .upload-wrapper { justify-content: center; }
            .scanner-content h2 { font-size: 28px; }
            .schemes-grid { flex-direction: column; align-items: center; }
            .scheme-card { width: 100%; max-width: 100%; }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3 shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Ccircle cx='30' cy='30' r='28' fill='%23d4edda' stroke='%23198754' stroke-width='2'/%3E%3Ctext x='14' y='38' font-size='28' fill='%232E7D32' font-weight='bold' font-family='Arial'%3EK%3C/text%3E%3C/svg%3E" alt="logo" class="logo-img">
            <div class="logo-text ms-2">
                <h4>KishanSewa</h4>
                <h2>किसान सेवा</h2>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Schemes</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
            <a href="#" class="btn btn-success ms-3">Login</a>
        </div>
    </div>
</nav>

<!-- ===== HERO ===== -->
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>Empowering Farmers <br> with Smart Solutions</h1>
                    <p>Get real-time insights, expert advice and best resources for better farming.</p>
                    <a href="#" class="hero-btn">Explore Services</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== FEATURES ===== -->
<section class="feature-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='70' height='70' viewBox='0 0 70 70'%3E%3Crect width='70' height='70' fill='%23e8f5e9' rx='12'/%3E%3Ctext x='20' y='44' font-size='36' fill='%232e7d32'%3E🌾%3C/text%3E%3C/svg%3E" alt="crop" class="feature-icon">
                    <h5>Crop Information</h5>
                    <p>Know about best crops and cultivation methods.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='70' height='70' viewBox='0 0 70 70'%3E%3Crect width='70' height='70' fill='%23e3f2fd' rx='12'/%3E%3Ctext x='18' y='44' font-size='36' fill='%231565c0'%3E☁️%3C/text%3E%3C/svg%3E" alt="weather" class="feature-icon">
                    <h5>Weather Updates</h5>
                    <p>Get real-time weather updates and forecast.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='70' height='70' viewBox='0 0 70 70'%3E%3Crect width='70' height='70' fill='%23fff3e0' rx='12'/%3E%3Ctext x='18' y='44' font-size='36' fill='%23f57c00'%3E📈%3C/text%3E%3C/svg%3E" alt="market" class="feature-icon">
                    <h5>Market Prices</h5>
                    <p>Live mandi prices and price trends.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='70' height='70' viewBox='0 0 70 70'%3E%3Crect width='70' height='70' fill='%23fce4ec' rx='12'/%3E%3Ctext x='16' y='44' font-size='36' fill='%23c62828'%3E🤖%3C/text%3E%3C/svg%3E" alt="AI" class="feature-icon">
                    <h5>AI Crop Advisor</h5>
                    <p>Get AI based crop recommendations.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='70' height='70' viewBox='0 0 70 70'%3E%3Crect width='70' height='70' fill='%23ede7f6' rx='12'/%3E%3Ctext x='12' y='44' font-size='36' fill='%235e35b1'%3E🏛️%3C/text%3E%3C/svg%3E" alt="scheme" class="feature-icon">
                    <h5>Government Schemes</h5>
                    <p>Information about latest schemes and subsidies.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== COUNTER ===== -->
<section class="counter-section py-5">
    <div class="container">
        <div class="counter-box">
            <div class="row text-center align-items-center">
                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Ccircle cx='30' cy='30' r='28' fill='%23c8e6c9'/%3E%3Ctext x='16' y='40' font-size='32' fill='%232e7d32'%3E🌱%3C/text%3E%3C/svg%3E" class="counter-icon" alt="">
                    <div><h2>1200+</h2><p>Farmers</p></div>
                </div>
                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Ccircle cx='30' cy='30' r='28' fill='%23bbdefb'/%3E%3Ctext x='16' y='40' font-size='32' fill='%231565c0'%3E👨‍🌾%3C/text%3E%3C/svg%3E" class="counter-icon" alt="">
                    <div><h2>320+</h2><p>Expert Advisors</p></div>
                </div>
                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Ccircle cx='30' cy='30' r='28' fill='%23fff9c4'/%3E%3Ctext x='16' y='40' font-size='32' fill='%23f57f17'%3E📄%3C/text%3E%3C/svg%3E" class="counter-icon" alt="">
                    <div><h2>250+</h2><p>Schemes</p></div>
                </div>
                <div class="col-lg-3 col-md-6 counter-item border-end-0">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Ccircle cx='30' cy='30' r='28' fill='%23d1c4e9'/%3E%3Ctext x='14' y='40' font-size='32' fill='%234a148c'%3E🏆%3C/text%3E%3C/svg%3E" class="counter-icon" alt="">
                    <div><h2>500+</h2><p>Success Stories</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SCANNER ===== -->
<section class="scanner-section">
    <div class="scanner-container">
        <div class="scanner-content">
            <span class="badge-new">New AI Feature</span>
            <h2>Apni Fasal Ki Bimari Pehchane</h2>
            <p>Khaad ya kide se fasal kharab ho rahi hai? Pareshan na hon! Bas apne bimar paudhe ya patte ki ek saaf photo kheeche aur yahan upload karein. Hamara AI turant bimari ka naam aur usko thik karne ka sasta ilaj bata dega.</p>
            <div class="upload-wrapper">
                <label for="crop-file-input" class="upload-btn">
                    <i class="fas fa-camera"></i> Photo Upload Karein
                </label>
                <input type="file" id="crop-file-input" accept="image/*" style="display: none;" />
                <span class="upload-note">Format: JPG, PNG (Max: 5MB)</span>
            </div>
        </div>
        <div class="scanner-graphic">
            <div class="leaf-card">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='350' viewBox='0 0 400 350'%3E%3Crect width='400' height='350' fill='%234caf50'/%3E%3Ctext x='80' y='190' font-size='48' fill='white' font-family='Arial'%3E🍃%3C/text%3E%3C/svg%3E" alt="Bimar Patta" class="leaf-img" />
                <div class="scan-line"></div>
                <div class="scan-status">
                    <i class="fas fa-spinner fa-spin"></i> AI Scanning Fasal...
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== DASHBOARD ===== -->
<section class="dashboard-section">
    <div class="dashboard-container">
        <div class="dashboard-heading">
            <h2>Today's Agri Dashboard</h2>
            <p>Apne ilake ka hal aur mandi ke taza bhav par nazar rakhein.</p>
        </div>
        <div class="dashboard-grid">
            <!-- Card 1 -->
            <div class="dashboard-card border-green">
                <div class="card-content">
                    <div class="card-header">
                        <h3><i class="fas fa-store-alt icon-green"></i> Live Mandi Bhav</h3>
                        <select class="dashboard-dropdown">
                            <option>Select Mandi</option>
                            <option selected>Jhumri Telaiya Mandi</option>
                            <option>Ranchi Mandi</option>
                            <option>Patna Mandi</option>
                        </select>
                    </div>
                    <div class="table-responsive">
                        <table class="mandi-table">
                            <thead><tr><th>Crop (Fasal)</th><th>Price / Quintal</th><th>Trend</th></tr></thead>
                            <tbody>
                                <tr><td class="crop-name">Wheat (Gehun)</td><td class="crop-price">₹2,400</td><td class="trend-status trend-up"><i class="fas fa-arrow-up"></i> UP</td></tr>
                                <tr><td class="crop-name">Rice (Dhan)</td><td class="crop-price">₹3,100</td><td class="trend-status trend-down"><i class="fas fa-arrow-down"></i> DOWN</td></tr>
                                <tr><td class="crop-name">Potato (Aloo)</td><td class="crop-price">₹1,200</td><td class="trend-status trend-stable"> STABLE</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="dashboard-btn-link text-green">View All Mandis →</a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="dashboard-card border-blue">
                <div class="card-content">
                    <div class="card-header">
                        <h3><i class="fas fa-cloud-sun icon-blue"></i> Smart Weather</h3>
                        <select class="dashboard-dropdown">
                            <option selected>Jhumri Telaiya, JH</option>
                            <option>Ranchi, JH</option>
                            <option>New Delhi, DL</option>
                        </select>
                    </div>
                    <div class="weather-display-box">
                        <div class="weather-info-text">
                            <div class="current-temp">32°C</div>
                            <div class="weather-status">Rainy / Light Showers</div>
                            <div class="weather-meta">Humidity: 75% | Wind: 12 km/h</div>
                        </div>
                        <div class="weather-icon-large">
                            <i class="fas fa-cloud-showers-heavy pulse-animation"></i>
                        </div>
                    </div>
                    <div class="advisory-alert-box">
                        <div class="advisory-icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="advisory-text">
                            <h4>Expert Crop Advisory</h4>
                            <p>Agale 2 ghante me kharab mausam aur baarish ki sambhavna hai. Kripya khuli fasal ko dhaanp dein aur abhi fertilizer (khaad