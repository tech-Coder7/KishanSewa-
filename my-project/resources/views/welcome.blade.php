@extends('layouts.app')
@section('content')
<div class="main-wrapper">

  <!-- ===== HERO CAROUSEL ===== -->
  <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active slide-1">
        <div class="carousel-content">
          <div>
            <i class="fas fa-seedling" style="font-size:3.5rem; color:var(--gold); margin-bottom:0.5rem;"></i>
            <h1>Empowering Farmers with Smart Solutions</h1>
            <p>Get real-time insights, expert advice and best resources for better farming.</p>
            <div class="mt-3">
              <a href="#" class="btn btn-gold rounded-pill px-5 py-2 me-2"><i class="fas fa-rocket"></i> Explore</a>
              <a href="#" class="btn btn-outline-light rounded-pill px-5 py-2"><i class="fas fa-video"></i> Demo</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item slide-2">
        <div class="carousel-content">
          <div>
            <i class="fas fa-robot" style="font-size:3.5rem; color:var(--gold); margin-bottom:0.5rem;"></i>
            <h1 style="font-size:2.4rem;">AI Powered Farming</h1>
            <p style="font-size:1rem;">Apni fasal ki bimari pehchane, crop recommendation paayein aur smart farming karein.</p>
            <div class="mt-3">
              <a href="#" class="btn btn-gold rounded-pill px-5 py-2"><i class="fas fa-brain"></i> Try AI Features</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item slide-3">
        <div class="carousel-content">
          <div>
            <i class="fas fa-hand-holding-heart" style="font-size:3.5rem; color:var(--gold); margin-bottom:0.5rem;"></i>
            <h1>Government Schemes &amp; Subsidies</h1>
            <p>PM-KISAN, Fasal Bima, KUSUM aur aur bhi sarkari yoijnaaon ka labh uthayein.</p>
            <div class="mt-3">
              <a href="#" class="btn btn-gold rounded-pill px-5 py-2"><i class="fas fa-file-signature"></i> View Schemes</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- ===== AI FEATURE CARDS ===== -->
  <div class="my-4">
    <h4 class="text-center mb-3"><i class="fas fa-brain text-gold"></i> AI Features at a Glance</h4>
    <div class="row g-3">
      <div class="col-md-4">
        <div class="ai-feature-card text-center">
          <i class="fas fa-leaf"></i>
          <h5>Crop Disease Detection</h5>
          <p>Photo upload karein aur AI se bimari pehchane</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ai-feature-card text-center">
          <i class="fas fa-robot"></i>
          <h5>AI Crop Recommendation</h5>
          <p>Soil &amp; season ke hisaab se best crop suggest karein</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ai-feature-card text-center">
          <i class="fas fa-cloud-sun"></i>
          <h5>Smart Weather Advisory</h5>
          <p>Real-time weather alerts aur farming tips</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== QUICK ACTIONS ===== -->
  <div class="my-3">
    <div class="d-flex flex-wrap gap-3 justify-content-center">
      <a href="#" class="btn btn-dark rounded-pill px-4"><i class="fas fa-phone-alt"></i> Emergency Helpline</a>
      <a href="#" class="btn btn-dark rounded-pill px-4"><i class="fas fa-map-marker-alt"></i> Nearest Mandi</a>
      <a href="#" class="btn btn-dark rounded-pill px-4"><i class="fas fa-user-md"></i> Crop Doctor</a>
      <a href="#" class="btn btn-dark rounded-pill px-4"><i class="fas fa-seedling"></i> Best Seeds</a>
    </div>
  </div>

  <!-- ===== QUICK LINKS ===== -->
  <div class="mb-4">
    <div class="d-flex flex-wrap gap-3 justify-content-center">
      <a href="#" class="btn btn-light rounded-pill px-4 border"><i class="fas fa-seedling text-gold"></i> Crop</a>
      <a href="#" class="btn btn-light rounded-pill px-4 border"><i class="fas fa-cloud-sun text-gold"></i> Weather</a>
      <a href="#" class="btn btn-light rounded-pill px-4 border"><i class="fas fa-chart-line text-gold"></i> Market Prices</a>
      <a href="#" class="btn btn-light rounded-pill px-4 border"><i class="fas fa-robot text-gold"></i> AI Crop</a>
      <a href="#" class="btn btn-light rounded-pill px-4 border"><i class="fas fa-file-signature text-gold"></i> Government</a>
    </div>
  </div>

  <!-- ===== CARDS SECTION ===== -->
  <div>
    <h2 class="mb-4"><i class="fas fa-tractor text-gold"></i> Crop &amp; Service Hub</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card card-hover h-100 p-3">
          <i class="fas fa-seedling fs-1 text-gold"></i>
          <h5 class="mt-2">Crop Information</h5>
          <p class="text-muted">Know about best crops and cultivation methods...</p>
          <span class="badge bg-light text-dark align-self-start">Guide</span>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card card-hover h-100 p-3">
          <i class="fas fa-cloud-sun fs-1 text-gold"></i>
          <h5 class="mt-2">Weather Updates</h5>
          <p class="text-muted">Get real-time weather updates and forecast.</p>
          <span class="badge bg-light text-dark align-self-start">Live</span>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card card-hover h-100 p-3">
          <i class="fas fa-chart-line fs-1 text-gold"></i>
          <h5 class="mt-2">Market Prices</h5>
          <p class="text-muted">Live mandi prices and price trends.</p>
          <span class="badge bg-light text-dark align-self-start">Today</span>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card card-hover h-100 p-3">
          <i class="fas fa-robot fs-1 text-gold"></i>
          <h5 class="mt-2">AI Crop Advisor</h5>
          <p class="text-muted">Get AI based crop recommendations.</p>
          <span class="badge bg-light text-dark align-self-start">Smart</span>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 col-xl">
        <div class="card card-hover h-100 p-3">
          <i class="fas fa-file-signature fs-1 text-gold"></i>
          <h5 class="mt-2">Government Schemes</h5>
          <p class="text-muted">Information about latest schemes and subsidies.</p>
          <span class="badge bg-light text-dark align-self-start">New</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== AI SECTION ===== -->
  <div class="my-5">
    <div class="ai-section p-4 text-white">
      <h5><i class="fas fa-brain text-gold"></i> NEW AI FEATURE</h5>
      <h2 class="display-6 fw-bold text-gold">Apni Fasal Ki Bimari Pehchane</h2>
      <p class="fs-5">Khaad ya kide se fasal kharab ho rahi hai? Pareshan na hon! Bas apne bimar paudhe ya patte ki ek saaf photo kheche aur yahan upload karein. Hamara AI turant bimari ka naam aur usko thik karne ka sasta ilaj bata dega.</p>
      <div class="ai-upload-box text-center">
        <i class="fas fa-camera fs-1 text-gold"></i>
        <p class="mt-2"><strong>Photo Upload Karein</strong><br/>Format: JPG, PNG (Max: 5MB)</p>
        <input type="file" accept=".jpg,.jpeg,.png" class="form-control d-inline-block w-auto mx-auto" style="max-width:300px;"/>
        <p class="mt-2"><i class="fas fa-spinner fa-spin"></i> AI Scanning Fasal...</p>
      </div>
    </div>
  </div>

  <!-- ===== DASHBOARD ===== -->
  <div class="my-5">
    <h2 class="mb-4"><i class="fas fa-chart-pie text-gold"></i> Today's Agri Dashboard</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 p-3 border-0 shadow-sm">
          <h5><i class="fas fa-weight-hanging text-gold"></i> Live Mandi Bhav</h5>
          <input type="text" class="form-control rounded-pill" placeholder="Search crop..." />
          <table class="table table-borderless mt-2">
            <thead><tr><th>Crop</th><th>Price/Q</th><th>Trend</th></tr></thead>
            <tbody>
              <tr><td>Wheat (Gehun)</td><td>₹2,400</td><td class="trend-up">↑ UP</td></tr>
              <tr><td>Rice (Dhan)</td><td>₹3,100</td><td class="trend-down">↓ DOWN</td></tr>
              <tr><td>Potato (Aloo)</td><td>₹1,200</td><td>STABLE</td></tr>
              <tr><td>Tomato</td><td>₹800</td><td class="trend-up">↑ UP</td></tr>
            </tbody>
          </table>
          <a href="#" class="text-gold text-decoration-none fw-bold">View All Mandis →</a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 p-3 border-0 shadow-sm">
          <h5><i class="fas fa-cloud-sun text-gold"></i> Smart Weather</h5>
          <div class="weather-temp">32°C</div>
          <p><i class="fas fa-cloud-rain text-gold"></i> Rainy / Light Showers</p>
          <p>Humidity: 75% | Wind: 12 km/h</p>
          <div class="d-flex flex-wrap gap-2">
            <span class="forecast-item">Mon 28°</span>
            <span class="forecast-item">Tue 30°</span>
            <span class="forecast-item">Wed 29°</span>
            <span class="forecast-item">Thu 31°</span>
            <span class="forecast-item">Fri 33°</span>
          </div>
          <div class="mt-2 p-2 rounded-3" style="background: #f9b81b30;">
            <i class="fas fa-exclamation-triangle" style="color:#f9a825;"></i> Expert Advisory: Agale 2 ghante me baarish ki sambhavna hai.
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card h-100 p-3 border-0 shadow-sm">
          <h5><i class="fas fa-robot text-gold"></i> AI Crop Recommendation</h5>
          <p><strong>Season:</strong> Kharif</p>
          <p><strong>Soil:</strong> Loamy</p>
          <div class="p-3 rounded-3 text-center fw-bold" style="background: var(--gold); color: #1e2f1e;">
            🌾 Paddy, Soybean, Maize
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== TESTIMONIAL CAROUSEL ===== -->
  <div class="my-5">
    <h2 class="mb-4"><i class="fas fa-star text-gold"></i> Farmer Success Stories</h2>
    <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel" data-bs-interval="4000">
      <div class="carousel-indicators position-relative mt-3" style="gap:8px;">
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                  <div><h5 class="mb-0">Ram Singh</h5><span class="text-muted">Uttar Pradesh</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"AI Crop Advisor ne meri fasal ki paidawar <strong>40%</strong> badha di!"</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👩‍🌾</div>
                  <div><h5 class="mb-0">Priya Devi</h5><span class="text-muted">Bihar</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"PM-KISAN scheme se mujhe <strong>time par paisa</strong> mila."</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                  <div><h5 class="mb-0">Suresh Patel</h5><span class="text-muted">Gujarat</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"Weather updates ne meri fasal ko <strong>baarish se bachaya</strong>."</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                  <div><h5 class="mb-0">Mohan Yadav</h5><span class="text-muted">MP</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"KUSUM solar scheme se <strong>bijli bill 80% kam</strong>."</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row g-4">
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👩‍🌾</div>
                  <div><h5 class="mb-0">Geeta Sharma</h5><span class="text-muted">Rajasthan</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"Market Price feature se <strong>sahi bhav</strong> ka pata chalta hai."</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card p-4 border-0 shadow-sm h-100">
                <div class="d-flex align-items-center gap-3">
                  <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                  <div><h5 class="mb-0">Amit Kumar</h5><span class="text-muted">Punjab</span></div>
                </div>
                <p class="mt-3 fst-italic fs-5">"Crop Information ne <strong>nayi kheti</strong> ke baare mein bataya."</p>
                <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <!-- ===== SCHEMES ===== -->
  <div class="my-5">
    <h2 class="mb-4"><i class="fas fa-file-signature text-gold"></i> Latest Government Schemes</h2>
    <p class="mb-4">Kisaano ke liye sarkar dwara chalayi ja rahi mukhya yoijnaayein aur subsidies.</p>

    <div class="scheme-card card p-4 mb-3 border-0 shadow-sm">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h5>PM-KISAN Samman Nidhi</h5>
          <p class="text-muted">Chote aur simant kisaano ko har saal ₹6,000 ki arthik sahayata...</p>
        </div>
        <div class="col-md-4 text-md-end">
          <span class="badge badge-active px-3 py-2">Active</span>
          <a href="#" class="d-block text-gold fw-bold mt-2">Read Details →</a>
        </div>
      </div>
    </div>

    <div class="scheme-card card p-4 mb-3 border-0 shadow-sm">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h5>Pradhan Mantri Fasal Bima</h5>
          <p class="text-muted">Kharab mausam, baadh, keet ya sookhe se hone wale fasal ke nuksaan ka bima...</p>
        </div>
        <div class="col-md-4 text-md-end">
          <span class="badge badge-open px-3 py-2">Apply Open</span>
          <a href="#" class="d-block text-gold fw-bold mt-2">Apply Now →</a>
        </div>
      </div>
    </div>

    <div class="scheme-card card p-4 mb-3 border-0 shadow-sm">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h5>PM-KUSUM (Solar Pump)</h5>
          <p class="text-muted">Kheti ke liye solar pump lagwane par sarkar se 60% tak ki bhari subsidya...</p>
        </div>
        <div class="col-md-4 text-md-end">
          <span class="badge badge-open px-3 py-2">Subsidy Available</span>
          <a href="#" class="d-block text-gold fw-bold mt-2">Check Status →</a>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection