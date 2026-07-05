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
              <p style="font-size:1rem;">Apni fasal ki bimari pehchane, crop recommendation paayein aur smart farming
                karein.</p>
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
                <a href="#" class="btn btn-gold rounded-pill px-5 py-2"><i class="fas fa-file-signature"></i> View
                  Schemes</a>
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
        @foreach ($crop as $row)

          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card crop-card shadow-sm h-100" onclick="showDetail(1)">
              <img src="{{ asset('storage') }}/{{ $row->image }}" alt="Gehun (Wheat)"
                onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
              <div class="img-placeholder" style="display:none;">🌾</div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h5 class="card-title fw-bold mb-0">{{ $row->title }}</h5>
                  <span class="badge bg-primary badge-season">{{ $row->category->name }}</span>
                </div>
                <hr class="my-2">
                <!-- <p class="card-text small">Bharat ki sabse mahatvapurn khadya fasal, jo October-November mein boi jaati
                        hai.</p> -->
                <a href="/details/{{ $row->slug }}"> <span class="text-success small fw-semibold">Poori jaankari padhein
                    →</span></a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <!-- ===== DASHBOARD ===== -->
    <div class="my-5">
      <h2 class="mb-4"><i class="fas fa-chart-pie text-gold"></i> Today's Agri Dashboard</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-3 border-0 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h5 class="mb-0"><i class="fas fa-weight-hanging text-gold me-2"></i>Live Mandi Bhav</h5>
              <button id="syncMandiBtn" class="btn btn-outline-warning btn-sm rounded-pill px-3" onclick="syncMandiPrices()" style="font-size: 0.75rem; font-weight: 600;">
                <i class="fas fa-sync-alt me-1"></i> Sync Rates
              </button>
            </div>
            <input type="text" id="mandiSearchInput" class="form-control rounded-pill mb-2" placeholder="Search crop..." onkeyup="filterMandi()" />
            <div class="table-responsive" style="max-height: 280px; overflow-y: auto;">
              <table class="table table-borderless mt-2" id="mandiTable">
                <thead>
                  <tr>
                    <th>Crop</th>
                    <th>Price/Q</th>
                    <th>Trend</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($mandiPrices as $price)
                    <tr class="mandi-row">
                      <td class="crop-name-cell fw-semibold">{{ $price->crop_name }}</td>
                      <td>₹{{ number_format($price->price) }} <span class="text-muted small">/{{ $price->unit }}</span></td>
                      <td>
                        @if($price->trend == 'up')
                          <span class="text-success fw-bold">↑ {{ $price->change_pct ?? 'UP' }}</span>
                        @elseif($price->trend == 'down')
                          <span class="text-danger fw-bold">↓ {{ $price->change_pct ?? 'DOWN' }}</span>
                        @else
                          <span class="text-secondary fw-semibold">STABLE</span>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3" class="text-center text-muted">No Mandi Bhav found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <a href="/mandi-prices" class="text-gold text-decoration-none fw-bold mt-2 d-inline-block">View All Mandis →</a>
          </div>
        </div>

        @php
          $weatherIcons = [
            0 => ['fas fa-sun', 'Clear Sky'],
            1 => ['fas fa-cloud-sun', 'Mainly Clear'],
            2 => ['fas fa-cloud-sun', 'Partly Cloudy'],
            3 => ['fas fa-cloud', 'Overcast'],
            45 => ['fas fa-smog', 'Fog'],
            48 => ['fas fa-smog', 'Fog'],
            51 => ['fas fa-cloud-rain', 'Light Drizzle'],
            53 => ['fas fa-cloud-rain', 'Drizzle'],
            55 => ['fas fa-cloud-showers-heavy', 'Heavy Drizzle'],
            61 => ['fas fa-cloud-rain', 'Light Rain'],
            63 => ['fas fa-cloud-showers-heavy', 'Moderate Rain'],
            65 => ['fas fa-cloud-showers-heavy', 'Heavy Rain'],
            80 => ['fas fa-cloud-sun-rain', 'Rain Showers'],
            81 => ['fas fa-cloud-sun-rain', 'Rain Showers'],
            82 => ['fas fa-cloud-showers-heavy', 'Heavy Rain'],
            95 => ['fas fa-bolt', 'Thunderstorm'],
          ];

          $currentIcon = $weatherIcons[$weather['weather_code']][0] ?? 'fas fa-cloud';
          $currentText = $weatherIcons[$weather['weather_code']][1] ?? 'Unknown';
        @endphp
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 p-3 border-0 shadow-sm">

            <h5>
              <i class="fas fa-cloud-sun text-gold"></i>
              Smart Weather
            </h5>

            <div class="weather-temp">
              {{ $weather['temperature_2m'] }}°C
            </div>

            <p>
              <i class="{{ $currentIcon }} text-gold"></i>
              {{ $currentText }}
            </p>

            <p>
              Humidity: {{ $weather['relative_humidity_2m'] }}%
              |
              Wind: {{ $weather['wind_speed_10m'] }} km/h
            </p>

            <div class="d-flex flex-wrap gap-2 mt-3">

              @foreach($forecast['time'] as $key => $date)

                @php
                  $day = \Carbon\Carbon::parse($date)->format('D');
                @endphp

                <span class="forecast-item">
                  {{ $day }}
                  {{ $forecast['temperature_2m_max'][$key] }}°
                  /
                  {{ $forecast['temperature_2m_min'][$key] }}°
                </span>

              @endforeach

            </div>

            <div class="mt-3 p-2 rounded-3" style="background:#f9b81b30;">

              <i class="fas fa-lightbulb text-warning"></i>

              @if($weather['weather_code'] >= 61)
                Expert Advisory: Baarish ki sambhavna hai. Khet ka drainage check karein.
              @elseif($weather['temperature_2m'] >= 35)
                Expert Advisory: Garmi zyada hai. Sinchai (Irrigation) par dhyan dein.
              @elseif($weather['temperature_2m'] <= 15)
                Expert Advisory: Thand zyada hai. Fasal ki suraksha karein.
              @else
                Expert Advisory: Mausam kheti ke liye anukool hai.
              @endif

            </div>

          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl">
          <div class="card h-100 p-3 border-0 shadow-sm">
            <h5><i class="fas fa-microscope text-gold me-2"></i>Soil Health Monitor</h5>
            <p class="small text-muted mb-3">Real-time local soil metrics (0-7cm depth)</p>
            
            <div class="d-flex align-items-center justify-content-between mb-3 p-3 rounded-3" style="background: rgba(249,184,27,0.08); border-left: 4px solid var(--gold);">
              <div>
                <span class="small text-muted d-block font-monospace">SOIL TEMP</span>
                <span class="fs-4 fw-bold text-dark">{{ $soilData['temperature'] }}°C</span>
              </div>
              <div class="fs-2 text-warning"><i class="fas fa-thermometer-half"></i></div>
            </div>

            <div class="d-flex align-items-center justify-content-between p-3 rounded-3" style="background: rgba(40,167,69,0.08); border-left: 4px solid #28a745;">
              <div>
                <span class="small text-muted d-block font-monospace">SOIL MOISTURE</span>
                <span class="fs-4 fw-bold text-dark">{{ $soilData['moisture'] }} m³/m³</span>
              </div>
              <div class="fs-2 text-success"><i class="fas fa-water"></i></div>
            </div>

            <div class="mt-3 p-2 rounded-3 small" style="background: #e6f0da50; border: 1px solid rgba(40,167,69,0.2);">
              <i class="fas fa-info-circle text-success me-1"></i>
              @if($soilData['moisture'] < 0.25)
                Soil dry hai. Moderate irrigation recommended.
              @elseif($soilData['moisture'] > 0.4)
                Soil moisture kafi hai. Safe for root systems.
              @else
                Moisture level is optimal. Perfect for crop health.
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== AI SECTION ===== -->
    <div class="my-5">
      <div class="ai-section p-4 text-white rounded-4 shadow" style="background: linear-gradient(135deg, #1e3a2b, #112519); border-left: 6px solid var(--gold); position: relative; overflow: hidden;">
        
        <!-- Animated Background Mesh -->
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.05; background-image: radial-gradient(var(--gold) 1px, transparent 0), radial-gradient(var(--gold) 1px, transparent 0); background-size: 20px 20px; background-position: 0 0, 10px 10px; pointer-events: none;"></div>

        <div class="row align-items-center position-relative">
          <div class="col-lg-7">
            <h5><span class="badge bg-gold text-dark px-3 py-2 mb-2"><i class="fas fa-brain"></i> Dynamic AI Diagnosis</span></h5>
            <h2 class="display-6 fw-bold text-gold">Apni Fasal Ki Bimari Pehchane</h2>
            <p class="fs-5 text-white-50">Khaad ya kide se fasal kharab ho rahi hai? Pareshan na hon! Bas apne bimar paudhe ya patte ki ek saaf photo kheche aur yahan upload karein. Hamara AI turant bimari ka naam aur usko thik karne ka sasta ilaj bata dega.</p>
            
            <!-- Steps Indicator -->
            <div class="d-flex gap-3 my-4 flex-wrap">
              <div class="d-flex align-items-center gap-2 small text-white-50"><span class="bg-gold text-dark rounded-circle d-flex align-items-center justify-content-center" style="width:24px;height:24px;font-weight:bold;font-size:0.75rem;">1</span> Upload Leaf Photo</div>
              <div class="d-flex align-items-center gap-2 small text-white-50"><span class="bg-gold text-dark rounded-circle d-flex align-items-center justify-content-center" style="width:24px;height:24px;font-weight:bold;font-size:0.75rem;">2</span> AI Leaf Scan</div>
              <div class="d-flex align-items-center gap-2 small text-white-50"><span class="bg-gold text-dark rounded-circle d-flex align-items-center justify-content-center" style="width:24px;height:24px;font-weight:bold;font-size:0.75rem;">3</span> Instant Remedy</div>
            </div>
          </div>
          
          <div class="col-lg-5">
            <div class="card p-3 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1) !important;">
              <form id="diseaseForm" enctype="multipart/form-data" onsubmit="return false;">
                @csrf
                
                <!-- Upload Box -->
                <div id="uploadContainer" class="ai-upload-box text-center p-4 rounded-3 border border-2 border-dashed border-light" style="cursor: pointer; transition: 0.3s; border-color: rgba(255,255,255,0.3) !important;" onclick="document.getElementById('diseaseImageInput').click()">
                  <i class="fas fa-camera fs-1 text-gold mb-3"></i>
                  <h6 class="text-white">Photo Select / Drag &amp; Drop</h6>
                  <p class="small text-white-50 mb-3">Format: JPG, PNG (Max: 5MB)</p>
                  <button type="button" class="btn btn-gold btn-sm rounded-pill px-4">Browse Image</button>
                  <input type="file" id="diseaseImageInput" name="image" accept="image/*" class="d-none" onchange="handleImageSelection(this)" />
                </div>
                
                <!-- Scanner Preview -->
                <div id="scannerContainer" class="d-none text-center p-3">
                  <div class="position-relative d-inline-block overflow-hidden rounded-3 shadow mb-3" style="max-width: 100%; height: 200px;">
                    <img id="imagePreview" src="" alt="Selected leaf" style="max-height: 100%; width: auto; object-fit: cover;" />
                    <div id="scannerBar" style="position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, transparent, var(--gold), transparent); box-shadow: 0 0 12px var(--gold); animation: scanEffect 2.2s linear infinite;"></div>
                  </div>
                  
                  <div class="p-2 rounded text-start font-monospace small mb-2 text-white" style="background: rgba(0,0,0,0.6); max-height: 80px; overflow-y: hidden;">
                    <div id="scanLogs" style="font-size:0.75rem;"><i class="fas fa-spinner fa-spin text-gold me-2"></i> Initializing AI scan engine...</div>
                  </div>
                </div>

              </form>

              <!-- Diagnostic Results -->
              <div id="resultContainer" class="d-none text-white text-start">
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2 border-secondary">
                  <h5 class="text-gold mb-0 fw-bold"><i class="fas fa-stethoscope"></i> Diagnostic Report</h5>
                  <span class="badge bg-danger" id="resultConfidence">96.5% Match</span>
                </div>
                
                <div class="mb-3">
                  <div class="small text-white-50 font-monospace" style="font-size:0.7rem;">CROP / फ़सल:</div>
                  <div class="fs-5 fw-bold" id="resultCrop">Tomato (टमाटर)</div>
                </div>
                
                <div class="mb-3">
                  <div class="small text-white-50 font-monospace" style="font-size:0.7rem;">DIAGNOSED DISEASE / बीमारी:</div>
                  <div class="fs-5 fw-bold text-warning" id="resultDisease">Early Blight (अगेती झुलसा)</div>
                </div>

                <div class="mb-3 p-2 rounded" style="background: rgba(0,0,0,0.25);">
                  <div class="small text-white-50 font-monospace" style="font-size:0.7rem;"><i class="fas fa-info-circle text-gold"></i> Symptoms / लक्षण:</div>
                  <div class="small mt-1" id="resultSymptoms" style="font-size:0.8rem;">Concentric rings on leaves.</div>
                </div>

                <hr class="border-secondary my-2" />

                <div class="row g-2 mb-3">
                  <div class="col-6">
                    <div class="p-2 rounded h-100" style="background: rgba(40,167,69,0.15); border-left: 3px solid #28a745;">
                      <div class="small fw-bold text-success" style="font-size:0.75rem;"><i class="fas fa-leaf"></i> Organic Remedy</div>
                      <div class="small mt-1" id="resultOrganic" style="font-size: 0.75rem; color: #d4e4c9;">Neem oil spray.</div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="p-2 rounded h-100" style="background: rgba(23,162,184,0.15); border-left: 3px solid #17a2b8;">
                      <div class="small fw-bold text-info" style="font-size:0.75rem;"><i class="fas fa-flask"></i> Chemical Remedy</div>
                      <div class="small mt-1" id="resultChemical" style="font-size: 0.75rem; color: #d0f0f5;">Mancozeb.</div>
                    </div>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="small text-white-50 font-monospace" style="font-size:0.7rem;"><i class="fas fa-shield-alt text-gold"></i> Prevention / रोकथाम:</div>
                  <div class="small mt-1" id="resultPrevention" style="font-size: 0.8rem;">Crop rotation.</div>
                </div>

                <button class="btn btn-outline-light rounded-pill w-100 py-2 mt-2 font-weight-bold" onclick="resetScanner()"><i class="fas fa-sync-alt me-2"></i> Scan Another Leaf</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- ===== TESTIMONIAL CAROUSEL ===== -->
    <div class="my-5">
      <h2 class="mb-4"><i class="fas fa-star text-gold"></i> Farmer Success Stories</h2>
      <div id="testimonialCarousel" class="carousel slide testimonial-carousel" data-bs-ride="carousel"
        data-bs-interval="4000">
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
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                    <div>
                      <h5 class="mb-0">Ram Singh</h5><span class="text-muted">Uttar Pradesh</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"AI Crop Advisor ne meri fasal ki paidawar <strong>40%</strong> badha
                    di!"</p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm h-100">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👩‍🌾</div>
                    <div>
                      <h5 class="mb-0">Priya Devi</h5><span class="text-muted">Bihar</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"PM-KISAN scheme se mujhe <strong>time par paisa</strong> mila."</p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm h-100">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                    <div>
                      <h5 class="mb-0">Suresh Patel</h5><span class="text-muted">Gujarat</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"Weather updates ne meri fasal ko <strong>baarish se bachaya</strong>."
                  </p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm h-100">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                    <div>
                      <h5 class="mb-0">Mohan Yadav</h5><span class="text-muted">MP</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"KUSUM solar scheme se <strong>bijli bill 80% kam</strong>."</p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm h-100">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👩‍🌾</div>
                    <div>
                      <h5 class="mb-0">Geeta Sharma</h5><span class="text-muted">Rajasthan</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"Market Price feature se <strong>sahi bhav</strong> ka pata chalta hai."
                  </p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card p-4 border-0 shadow-sm h-100">
                  <div class="d-flex align-items-center gap-3">
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                      style="width:70px;height:70px;font-size:2.5rem;">👨‍🌾</div>
                    <div>
                      <h5 class="mb-0">Amit Kumar</h5><span class="text-muted">Punjab</span>
                    </div>
                  </div>
                  <p class="mt-3 fst-italic fs-5">"Crop Information ne <strong>nayi kheti</strong> ke baare mein bataya."
                  </p>
                  <div class="text-gold"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                      class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
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

    <!-- ===== SCHEMES & NEWS ===== -->
    <div class="row g-4 my-5">
      <!-- Schemes Column -->
      <div class="col-lg-8">
        <h2 class="mb-4"><i class="fas fa-file-signature text-gold me-2"></i>Latest Government Schemes</h2>
        <p class="mb-4">Kisaano ke liye sarkar dwara chalayi ja rahi mukhya yoijnaayein aur subsidies.</p>

        @forelse($schemes as $scheme)
          <div class="scheme-card card p-4 mb-3 border-0 shadow-sm">
            <div class="row align-items-center">
              <div class="col-md-8">
                <h5>
                  @if($scheme->icon)
                    <i class="{{ $scheme->icon }} text-gold me-2"></i>
                  @endif
                  {{ $scheme->title }}
                </h5>
                <p class="text-muted mb-0">{{ $scheme->description }}</p>
              </div>
              <div class="col-md-4 text-md-end mt-2 mt-md-0">
                @if($scheme->badge)
                  <span class="badge bg-success px-3 py-2 mb-2 d-inline-block">{{ $scheme->badge }}</span>
                @endif
                <a href="{{ $scheme->link }}" target="_blank" class="d-block text-gold fw-bold">Read Details →</a>
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">No government schemes currently available.</p>
        @endforelse
      </div>

      <!-- Live News Column -->
      <div class="col-lg-4">
        <h2 class="mb-4"><i class="fas fa-newspaper text-gold me-2"></i>Live Agri News</h2>
        <p class="mb-4">Real-time alerts & agriculture updates parsed from Krishi Jagran.</p>

        @forelse($news as $article)
          <div class="card p-3 mb-3 border-0 shadow-sm" style="background: var(--card-bg);">
            <div class="d-flex align-items-center justify-content-between mb-1">
              <span class="badge bg-warning text-dark font-monospace" style="font-size:0.65rem;">Live Feed</span>
              <span class="small text-muted font-monospace" style="font-size:0.7rem;"><i class="far fa-calendar-alt me-1"></i>{{ $article['pubDate'] }}</span>
            </div>
            <h6 class="fw-bold mt-1 mb-2" style="font-size: 0.92rem; line-height: 1.35;">
              <a href="{{ $article['link'] }}" target="_blank" class="text-decoration-none text-dark hover-gold">{{ $article['title'] }}</a>
            </h6>
            <p class="small text-muted mb-2" style="font-size: 0.8rem; line-height: 1.4;">{{ $article['description'] }}</p>
            <a href="{{ $article['link'] }}" target="_blank" class="text-gold text-decoration-none small fw-bold d-inline-block">Read Full Article →</a>
          </div>
        @empty
          <p class="text-muted">Failed to load live news feed.</p>
        @endforelse
      </div>
    </div>
  </div>

  <!-- Custom CSS Styles for dynamic features -->
    <style>
      @keyframes scanEffect {
        0% { top: 0%; }
        50% { top: 100%; }
        100% { top: 0%; }
      }
      .ai-upload-box:hover {
        background: rgba(255, 255, 255, 0.15) !important;
        border-color: var(--gold) !important;
      }
    </style>

    <!-- Custom JS Scripts for dynamic features -->
    <script>
      // Dynamic client-side filtering for Mandi Bhav
      function filterMandi() {
        const input = document.getElementById('mandiSearchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('mandiTable');
        const tr = table.getElementsByClassName('mandi-row');

        for (let i = 0; i < tr.length; i++) {
          const td = tr[i].getElementsByClassName('crop-name-cell')[0];
          if (td) {
            const txtValue = td.textContent || td.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }

      // AI disease scanner selection & animation logic
      let logInterval = null;

      function handleImageSelection(input) {
        if (!input.files || !input.files[0]) return;

        const file = input.files[0];
        
        // Validate size (5MB)
        if (file.size > 5 * 1024 * 1024) {
          alert("Fasal photo size 5MB se kam honi chahiye!");
          input.value = '';
          return;
        }

        // Display image preview
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('imagePreview').src = e.target.result;
          document.getElementById('uploadContainer').classList.add('d-none');
          document.getElementById('scannerContainer').classList.remove('d-none');
          
          // Start simulated scanning log sequence
          startScanLogs(file);
        };
        reader.readAsDataURL(file);
      }

      function startScanLogs(file) {
        const logDiv = document.getElementById('scanLogs');
        const logs = [
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Reading leaf image matrix...",
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Analyzing leaf pixel configuration...",
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Detecting green channel anomalies and chlorosis...",
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Identifying structural lesions & spot templates...",
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Comparing signatures with 50,000+ crop diseases...",
          "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Finalizing diagnostic calculations..."
        ];

        let currentLogIndex = 0;
        logDiv.innerHTML = logs[0];
        
        logInterval = setInterval(() => {
          currentLogIndex++;
          if (currentLogIndex < logs.length) {
            logDiv.innerHTML += "<br>" + logs[currentLogIndex];
            logDiv.scrollTop = logDiv.scrollHeight;
          } else {
            clearInterval(logInterval);
            submitDiseaseData(file);
          }
        }, 850);
      }

      function submitDiseaseData(file) {
        const formData = new FormData();
        formData.append('image', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('/detect-disease', {
          method: 'POST',
          body: formData
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(result => {
          if (result.success) {
            showDiagnosticResults(result.data);
          } else {
            alert("Scan failed: " + result.message);
            resetScanner();
          }
        })
        .catch(error => {
          console.error('Error scanning disease:', error);
          alert("Error scanning image. Please make sure it's a valid crop leaf photo and try again.");
          resetScanner();
        });
      }

      function showDiagnosticResults(data) {
        // Hide scanner elements
        document.getElementById('scannerContainer').classList.add('d-none');
        
        // Fill result values
        document.getElementById('resultCrop').innerText = data.crop;
        document.getElementById('resultDisease').innerHTML = data.disease;
        document.getElementById('resultConfidence').innerText = data.confidence.toFixed(1) + "% Match";
        
        // Determine symptoms and remedies
        document.getElementById('resultSymptoms').innerHTML = `
          <strong>EN:</strong> ${data.symptoms.en}<br>
          <strong>HI:</strong> ${data.symptoms.hi}
        `;
        
        document.getElementById('resultOrganic').innerHTML = `
          <strong>EN:</strong> ${data.organic.en}<br>
          <strong>HI:</strong> ${data.organic.hi}
        `;
        
        document.getElementById('resultChemical').innerHTML = `
          <strong>EN:</strong> ${data.chemical.en}<br>
          <strong>HI:</strong> ${data.chemical.hi}
        `;
        
        document.getElementById('resultPrevention').innerHTML = `
          <strong>EN:</strong> ${data.prevention.en}<br>
          <strong>HI:</strong> ${data.prevention.hi}
        `;

        // Show result container
        document.getElementById('resultContainer').classList.remove('d-none');
      }

      function resetScanner() {
        if (logInterval) clearInterval(logInterval);
        document.getElementById('diseaseImageInput').value = '';
        document.getElementById('imagePreview').src = '';
        document.getElementById('scanLogs').innerHTML = "<i class='fas fa-spinner fa-spin text-gold me-2'></i> Initializing AI scan engine...";
        
        document.getElementById('resultContainer').classList.add('d-none');
        document.getElementById('scannerContainer').classList.add('d-none');
        document.getElementById('uploadContainer').classList.remove('d-none');
      }

      // AJAX sync function for Mandi prices
      function syncMandiPrices() {
        const btn = document.getElementById('syncMandiBtn');
        const icon = btn.querySelector('i');
        
        // Add rotation animation to the sync icon
        icon.classList.add('fa-spin');
        btn.disabled = true;

        fetch('/mandi/sync', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Sync request failed');
          }
          return response.json();
        })
        .then(result => {
          if (result.success) {
            // Update table content with new prices
            const tableBody = document.querySelector('#mandiTable tbody');
            tableBody.innerHTML = ''; // Clear current rows

            result.data.forEach(price => {
              const formattedPrice = Number(price.price).toLocaleString('en-IN');
              
              let trendBadge = '';
              if (price.trend === 'up') {
                trendBadge = `<span class="text-success fw-bold">↑ ${price.change_pct || 'UP'}</span>`;
              } else if (price.trend === 'down') {
                trendBadge = `<span class="text-danger fw-bold">↓ ${price.change_pct || 'DOWN'}</span>`;
              } else {
                trendBadge = `<span class="text-secondary fw-semibold">STABLE</span>`;
              }

              const rowHtml = `
                <tr class="mandi-row">
                  <td class="crop-name-cell fw-semibold">${price.crop_name}</td>
                  <td>₹${formattedPrice} <span class="text-muted small">/${price.unit}</span></td>
                  <td>${trendBadge}</td>
                </tr>
              `;
              tableBody.insertAdjacentHTML('beforeend', rowHtml);
            });

            // Re-apply filter if user has typed in search input
            filterMandi();
          } else {
            alert('Mandi sync error: ' + result.message);
          }
        })
        .catch(error => {
          console.error('Error syncing Mandi prices:', error);
          alert('Failed to connect to Mandi API. Please try again.');
        })
        .finally(() => {
          // Reset button state after small delay for animation
          setTimeout(() => {
            icon.classList.remove('fa-spin');
            btn.disabled = false;
          }, 800);
        });
      }
    </script>

@endsection