@extends('layouts.app')
@section('content')
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>
                        Empowering Farmers <br>
                        with Smart Solutions
                    </h1>
                    <p>
                        Get real-time insights, expert advice and
                        best resources for better farming.
                    </p>
                    <a href="services.html" class="btn hero-btn">
                        Explore Services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="feature-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="image/crop.jpg" alt="Crop" class="feature-icon">
                    <h5>Crop Information</h5>
                    <p>Know about best crops and cultivation methods....</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="image/weather.jpg" alt="Weather" class="feature-icon">
                    <h5>Weather Updates</h5>
                    <p>Get real-time weather updates and forecast.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="image/marketprice.png" alt="Market" class="feature-icon">
                    <h5>Market Prices</h5>
                    <p>Live mandi prices and price trends.</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="image/chatai.jpg" alt="AI" class="feature-icon">
                    <h5>AI Crop Advisor</h5>
                    <p>Get AI based crop recommendations.</p>
                </div>
            </div>

            <div class="col-lg-2 col-md-4 col-6">
                <div class="feature-card text-center">
                    <img src="image/government_scamne.png" alt="Scheme" class="feature-icon">
                    <h5>Government Schemes</h5>
                    <p>Information about latest schemes and subsidies.</p>
                </div>
            </div>
           
        </div>
    </div>
</section>
<!-- Counter Section Start -->
<section class="counter-section py-5">
    <div class="container">
        <div class="counter-box">
            <div class="row text-center align-items-center">

                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="image/plant.jpg" class="counter-icon" alt="">
                    <div>
                        <h2>1200+</h2>
                        <p>Farmers</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="image/human.jpg" class="counter-icon" alt="">
                    <div>
                        <h2>320+</h2>
                        <p>Expert Advisors</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 counter-item">
                    <img src="image/greenplant.jpg" class="counter-icon" alt="">
                    <div>
                        <h2>250+</h2>
                        <p>Schemes</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 counter-item border-end-0">
                    <img src="image/achiment.jpg" class="counter-icon" alt="">
                    <div>
                        <h2>500+</h2>
                        <p>Success Stories</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Counter Section End -->
 <!-- Section B: AI Plant Disease Scanner -->
<section class="scanner-section">
  <div class="scanner-container">
    
    <!-- Left Side: Text and Upload Button -->
    <div class="scanner-content">
      <span class="badge-new">New AI Feature</span>
      <h2>Apni Fasal Ki Bimari Pehchane</h2>
      <p>Khaad ya kide se fasal kharab ho rahi hai? Pareshan na hon! Bas apne bimar paudhe ya patte ki ek saaf photo kheeche aur yahan upload karein. Hamara AI turant bimari ka naam aur usko thik karne ka sasta ilaj bata dega.</p>
      
      <!-- Upload Box Container -->
      <div class="upload-wrapper">
        <label for="crop-file-input" class="upload-btn">
          <i class="fas fa-camera"></i> Photo Upload Karein
        </label>
        <input type="file" id="crop-file-input" accept="image/*" style="display: none;" />
        <span class="upload-note">Format: JPG, PNG (Max: 5MB)</span>
      </div>
    </div>

    <!-- Right Side: Interactive Scan Graphic -->
    <div class="scanner-graphic">
      <div class="leaf-card">
        <!-- Mock Leaf Image -->
        <img src="/image/soil.jpg" alt="Bimar Patta" class="leaf-img" />
        <!-- Scanning Laser Line Effect -->
        <div class="scan-line"></div>
        <!-- Status Overlay -->
        <div class="scan-status">
          <i class="fas fa-spinner fa-spin"></i> AI Scanning Fasal...
        </div>
      </div>
    </div>

  </div>
</section>
<section class="dashboard-section">
  <div class="dashboard-container">
    
    <div class="dashboard-heading">
      <h2>Today's Agri Dashboard</h2>
      <p>Apne ilake ka hal aur mandi ke taza bhav par nazar rakhein.</p>
    </div>

    <div class="dashboard-grid">
      
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
              <thead>
                <tr>
                  <th>Crop (Fasal)</th>
                  <th>Price / Quintal</th>
                  <th>Trend</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="crop-name">Wheat (Gehun)</td>
                  <td class="crop-price">₹2,400</td>
                  <td class="trend-status trend-up"><i class="fas fa-arrow-up"></i> UP</td>
                </tr>
                <tr>
                  <td class="crop-name">Rice (Dhan)</td>
                  <td class="crop-price">₹3,100</td>
                  <td class="trend-status trend-down"><i class="fas fa-arrow-down"></i> DOWN</td>
                </tr>
                <tr>
                  <td class="crop-name">Potato (Aloo)</td>
                  <td class="crop-price">₹1,200</td>
                  <td class="trend-status trend-stable"> STABLE</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <a href="#" class="dashboard-btn-link text-green">View All Mandis →</a>
        </div>
      </div>

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
            <div class="advisory-icon">
              <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="advisory-text">
              <h4>Expert Crop Advisory</h4>
              <p>Agale 2 ghante me kharab mausam aur baarish ki sambhavna hai. Kripya khuli fasal ko dhaanp dein aur abhi fertilizer (khaad) na dalein.</p>
            </div>
          </div>
        </div>
        
        <div class="card-footer">
          <a href="#" class="dashboard-btn-link text-blue">7-Day Detailed Forecast →</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Section C: Government Schemes -->
<section class="schemes-section">
  <div class="schemes-container">
    
    <!-- Section Title -->
    <div class="schemes-header">
      <h2>Latest Government Schemes</h2>
      <p>Kisaano ke liye sarkar dwara chalayi ja rahi mukhya yojnaayein aur subsidies.</p>
    </div>

    <!-- Cards Grid Container -->
    <div class="schemes-grid">
      
      <!-- Card 1: PM-KISAN -->
      <div class="scheme-card">
        <div class="scheme-card-top">
          <div class="scheme-icon-box bg-light-green">
            <i class="fas fa-hand-holding-usd text-dark-green"></i>
          </div>
          <h3>PM-KISAN Samman Nidhi</h3>
          <p>Chote aur simant kisaano ko har saal ₹6,000 ki arthik sahayata teen barabar kishton mein seedhe bank khate mein di jaati hai.</p>
        </div>
        <div class="scheme-footer">
          <span class="status-badge badge-green">Active</span>
          <a href="#" class="scheme-link">Read Details →</a>
        </div>
      </div>

      <!-- Card 2: Fasal Bima -->
      <div class="scheme-card">
        <div class="scheme-card-top">
          <div class="scheme-icon-box bg-light-orange">
            <i class="fas fa-cloud-sun-rain text-dark-orange"></i>
          </div>
          <h3>Pradhan Mantri Fasal Bima</h3>
          <p>Kharab mausam, baadh, keet ya sookhe se hone wale fasal ke nuksaan ka bima (insurance) aur sahi samay par muavza paayein.</p>
        </div>
        <div class="scheme-footer">
          <span class="status-badge badge-blue">Apply Open</span>
          <a href="#" class="scheme-link">Apply Now →</a>
        </div>
      </div>

      <!-- Card 3: PM-KUSUM -->
      <div class="scheme-card">
        <div class="scheme-card-top">
          <div class="scheme-icon-box bg-light-blue">
            <i class="fas fa-solar-panel text-dark-blue"></i>
          </div>
          <h3>PM-KUSUM (Solar Pump)</h3>
          <p>Kheti ke liye solar pump lagwane par sarkar se 60% tak ki bhari subsidy paayein aur diesel-bijli ka kharcha bilkul khatam karein.</p>
        </div>
        <div class="scheme-footer">
          <span class="status-badge badge-orange">Subsidy Available</span>
          <a href="#" class="scheme-link">Check Status →</a>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection