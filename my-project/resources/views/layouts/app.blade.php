<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KrishiMitra - Smart Agriculture System</title>
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-green shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
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
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="crop.html">Crops</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="schemes.html">Schemes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>
                <li class="nav-item">
                    <a  class="nav-link" href="language.html">Language</a>
                </li>
            </ul>
            <a href="/login" class="btn btn-success px-4">
                Login
            </a>
        </div>
    </div>
</nav>

@yield('content')

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-column brand-info">
      <div class="footer-logo">
        <span class="logo-text">Kishan<span>Sewa</span></span>
      </div>
      <p class="brand-desc">Smart Agriculture System jo desh ke kisaano ko aadhunik takneek, sahi jankari aur naye avsaron se jodkar unhe samriddh banata hai.</p>
      <div class="social-icons">
        <a href="https://www.google.com" target="_blank" title="Google Search">
          <i class="fab fa-google"></i>
        </a>
        <a href="https://www.facebook.com" target="_blank" title="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.youtube.com" target="_blank" title="YouTube">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://wa.me/919876543210" target="_blank" title="WhatsApp Support">
          <i class="fab fa-whatsapp"></i>
        </a>
      </div>
    </div>
    <div class="footer-column">
      <h3>Mukhya Links</h3>
      <ul class="footer-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Crop Information</a></li>
        <li><a href="#">Live Mandi Bhav</a></li>
        <li><a href="#">AI Crop Advisor</a></li>
      </ul>
    </div>
    <div class="footer-column">
      <h3>Kisan Helplines</h3>
      <ul class="helpline-list">
        <li>
          <i class="fas fa-phone-alt"></i>
          <div>
            <strong>Kisan Call Center:</strong>
            <span>1800-180-1551 (Toll-Free)</span>
          </div>
        </li>
        <li>
          <i class="fas fa-headset"></i>
          <div>
            <strong>KishanSewa Support:</strong>
            <span>support@kishansewa.com</span>
          </div>
        </li>
      </ul>
    </div>
    <div class="footer-column app-download">
      <h3>Mobile App</h3>
      <p>Apne phone par turant updates pane ke liye hamara android app download karein.</p>
      <a href="#" class="playstore-btn">
        <i class="fab fa-google-play"></i>
        <div>
          <small>GET IT ON</small>
          <span>Google Play</span>
        </div>
      </a>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="bottom-container">
      <p>&copy; 2026 KishanSewa. All Rights Reserved.</p>
      <p>Made with <i class="fas fa-heart text-red"></i> for Indian Farmers</p>
    </div>
  </div>
</footer>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>