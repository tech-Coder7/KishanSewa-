@extends('layouts.app')
@section('content')
    <style>
        /* Shared Global Branding Navbar and Base styles */
        .logo-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #198754;
            margin-left: -50px;
        }
        .logo-text h4 {
            margin: 0;
            color: #2E7D32;
            font-weight: bold;
            font-size: 28px;
        }
        .logo-text h2 {
            margin: 0;
            color: gray;
            font-size: 16px;
            font-weight: 400;
        }
        .navbar-nav .nav-link {
            font-size: 18px;
            font-weight: 500;
            margin: 0 8px;
            color: #222;
        }
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #2E7D32;
        }
        .btn-success {
            border-radius: 30px;
            padding: 8px 25px;
        }

        /* Schemes Page Specific Header */
        .page-header {
            background: linear-gradient(rgba(11, 77, 22, 0.85), rgba(11, 77, 22, 0.9)), url('image/hero.jpg') center/cover no-repeat;
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .page-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        /* Filter Controls */
        .filter-btn {
            border-radius: 20px;
            padding: 8px 20px;
            font-weight: 500;
            border: 1px solid #2e7d32;
            color: #2e7d32;
            background: transparent;
            transition: 0.3s;
        }
        .filter-btn:hover, .filter-btn.active {
            background-color: #2e7d32;
            color: white;
        }

        /* Scheme Cards styling */
        .scheme-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e5e7eb;
        }
        .scheme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        .scheme-icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Background Helpers matches your theme colors */
        .bg-light-green   { background-color: #e8f5e9; }
        .text-dark-green  { color: #2e7d32; }
        .bg-light-orange  { background-color: #fff3e0; }
        .text-dark-orange { color: #f57c00; }
        .bg-light-blue    { background-color: #e3f2fd; }
        .text-dark-blue   { color: #1565c0; }
        .bg-light-purple  { background-color: #f3e5f5; }
        .text-dark-purple { color: #7b1fa2; }

        .scheme-card h3 {
            font-size: 20px;
            color: #1f2937;
            margin: 0 0 12px 0;
            font-weight: 700;
        }
        .scheme-card p {
            font-size: 14px;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .scheme-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f3f4f6;
            padding-top: 15px;
            margin-top: auto;
        }
        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-green  { background-color: #e8f5e9; color: #2e7d32; }
        .badge-blue   { background-color: #e3f2fd; color: #1565c0; }
        .badge-orange { background-color: #fff3e0; color: #f57c00; }

        .scheme-link {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
        }
        .scheme-link:hover {
            color: #1b5e20;
        }

        /* Footer Formatting */
        .main-footer {
            background-color: #111827;
            color: #9ca3af;
            padding: 60px 0 0 0;
            border-top: 5px solid #2e7d32;
        }
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 40px 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
        }
        .footer-column h3 {
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            font-weight: 600;
        }
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -6px;
            width: 40px;
            height: 2px;
            background-color: #2e7d32;
        }
        .footer-logo-text {
            font-size: 24px;
            font-weight: 800;
            color: #ffffff;
        }
        .footer-logo-text span {
            color: #2e7d32;
        }
        .social-icons a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #1f2937;
            color: #9ca3af;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-right: 8px;
            transition: 0.3s;
        }
        .social-icons a:hover {
            background-color: #2e7d32;
            color: white;
            transform: translateY(-3px);
        }
        .footer-bottom {
            background-color: #0b0f19;
            padding: 20px 0;
            border-top: 1px solid #1f2937;
            font-size: 13px;
        }
        .text-red { color: #ef4444; }
        @media (max-width:768px) {
            .logo-img { margin-left: 0; }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<!-- <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
            <img src="image/agriculture_logo.png" alt="Logo" class="logo-img" width="55" height="55">
            <div class="logo-text ms-2">
                <h4>KishanSewa</h4>
                <h2>Smart Agriculture System</h2>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                <li class="nav-item"><a class="nav-link" href="crop.html">Crops</a></li>
                <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
                <li class="nav-item"><a class="nav-link active" href="schemes.html">Schemes</a></li>
                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
            <a href="login.html" class="btn btn-success px-4">Login</a>
        </div>
    </div>
</nav> -->

<!-- Hero Page Title Segment -->
<header class="page-header">
    <div class="container">
        <h1>Sarkari Yojnaayein (Government Schemes)</h1>
        <p class="lead mb-0">Check your eligibility, find direct benefits, and apply online for official agricultural support.</p>
    </div>
</header>

<!-- Main Interactive Body Section -->
<main class="container py-5">
    <!-- Scheme Categorization Filters -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                <button class="filter-btn active" onclick="filterSchemes('all')">All Categories</button>
                <button class="filter-btn" onclick="filterSchemes('financial')">Financial Support</button>
                <button class="filter-btn" onclick="filterSchemes('insurance')">Crop Insurance</button>
                <button class="filter-btn" onclick="filterSchemes('subsidy')">Infrastructure & Subsidies</button>
            </div>
        </div>
    </div>

    <!-- Schemes Cards Grid Matrix -->
    <div class="row g-4" id="schemesGrid">
        <!-- Scheme 1 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="financial">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-green">
                        <i class="fas fa-hand-holding-usd text-dark-green"></i>
                    </div>
                    <h3>PM-KISAN Samman Nidhi</h3>
                    <p>Chote aur simant kisaano ko har saal ₹6,000 ki arthik sahayata teen barabar kishton mein seedhe bank khate mein di jaati hai.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-green">Active</span>
                    <a href="#" class="scheme-link">Read Details &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Scheme 2 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="insurance">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-orange">
                        <i class="fas fa-cloud-sun-rain text-dark-orange"></i>
                    </div>
                    <h3>Pradhan Mantri Fasal Bima</h3>
                    <p>Kharab mausam, baadh, keet ya sookhe se hone wale fasal ke nuksaan ka bima (insurance) aur sahi samay par muavza paayein.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-blue">Apply Open</span>
                    <a href="#" class="scheme-link">Apply Now &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Scheme 3 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="subsidy">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-blue">
                        <i class="fas fa-solar-panel text-dark-blue"></i>
                    </div>
                    <h3>PM-KUSUM (Solar Pump)</h3>
                    <p>Kheti ke liye solar pump lagwane par sarkar se 60% tak ki bhari subsidy paayein aur diesel-bijli ka kharcha bilkul khatam karein.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-orange">Subsidy Active</span>
                    <a href="#" class="scheme-link">Check Status &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Scheme 4 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="financial">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-purple">
                        <i class="fas fa-credit-card text-dark-purple"></i>
                    </div>
                    <h3>Kisan Credit Card (KCC)</h3>
                    <p>Kisaano ko kheti ki jaruraton ke liye bohot kambyaj dar (low interest rates) par instanct loan ki suvidha pradan ki jaati hai.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-green">Always Open</span>
                    <a href="#" class="scheme-link">Apply to Bank &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Scheme 5 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="subsidy">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-green">
                        <i class="fas fa-seedling text-dark-green"></i>
                    </div>
                    <h3>Paramparagat Krishi Vikas</h3>
                    <p>Organic (Jaivik) kheti ko badhava dene ke liye kisaano ko ₹50,000 prati hektar tak ki vittiya sahayata di jaati hai.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-green">Active</span>
                    <a href="#" class="scheme-link">Read Details &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Scheme 6 -->
        <div class="col-lg-4 col-md-6 scheme-item" data-category="subsidy">
            <div class="scheme-card">
                <div>
                    <div class="scheme-icon-box bg-light-blue">
                        <i class="fas fa-tint text-dark-blue"></i>
                    </div>
                    <h3>PM Krishi Sinchayee Yojana</h3>
                    <p>"Per Drop More Crop" ke tahat khet tak pani pahunchane aur drip/sprinkler irrigation systems lagane par bhari chhoot milti hai.</p>
                </div>
                <div class="scheme-footer">
                    <span class="status-badge badge-orange">Subsidy Active</span>
                    <a href="#" class="scheme-link">Apply Now &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Unified Footer Structure Section
<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-column brand-info">
      <div class="footer-logo">
        <span class="footer-logo-text">Kishan<span>Sewa</span></span>
      </div>
      <p class="brand-desc">Smart Agriculture System jo desh ke kisaano ko aadhunik takneek, sahi jankari aur naye avsaron se jodkar unhe samriddh banata hai.</p>
      <div class="social-icons">
        <a href="https://www.google.com" target="_blank" title="Google"><i class="fab fa-google"></i></a>
        <a href="https://www.facebook.com" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
      </div>
    </div>
    
    <div class="footer-column">
        <h3>Quick Links</h3>
        <ul class="footer-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="schemes.html">Government Schemes</a></li>
            <li><a href="contact.html">Contact Us</a></li>
        </ul>
    </div>

    <div class="footer-column">
        <h3>Emergency Help</h3>
        <ul class="footer-links">
            <li><i class="fas fa-phone-alt text-success me-2"></i> Kisan Helpline: 1800-180-1551</li>
            <li><i class="fas fa-envelope text-success me-2"></i> support@kishansewa.gov</li>
        </ul>
    </div>
  </div>
  
  <div class="footer-bottom">
    <div class="container d-flex justify-content-between flex-wrap gap-2">
      <p>&copy; 2026 KishanSewa. All Rights Reserved.</p>
      <p>Made with <span class="text-red">&hearts;</span> for Farmers.</p>
    </div>
  </div>
</footer> -->

<!-- Filtering Script Functionality -->
<script>
    function filterSchemes(category) {
        // Toggle Active class in buttons
        const buttons = document.querySelectorAll('.filter-btn');
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // Filter functionality
        const items = document.querySelectorAll('.scheme-item');
        items.forEach(item => {
            if (category === 'all' || item.getAttribute('data-category') === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection