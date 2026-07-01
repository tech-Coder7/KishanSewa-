@extends('layouts.app')
@section('content')


  <style>
    body {
      font-family: 'Noto Sans Devanagari', 'Segoe UI', sans-serif;
      background-color: #f8fafc;
    }
    .hero-section {
      background: linear-gradient(145deg, #1a3a2a 0%, #2a5a3a 100%);
      color: white;
      padding: 2.8rem 0 2.2rem 0;
      border-bottom: 6px solid #f5b342;
    }
    .hero-section h1 {
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .hero-section .lead {
      font-weight: 400;
      opacity: 0.92;
    }
    .breadcrumb-custom {
      background: transparent;
      padding: 0.2rem 0 0.8rem 0;
      margin: 0;
    }
    .breadcrumb-custom .breadcrumb-item a {
      color: #d4edda;
      text-decoration: none;
    }
    .breadcrumb-custom .breadcrumb-item a:hover {
      color: #fff;
      text-decoration: underline;
    }
    .breadcrumb-custom .breadcrumb-item.active {
      color: #f5b342;
    }
    .crop-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 12px 28px rgba(0, 30, 15, 0.07);
      transition: transform 0.2s, box-shadow 0.2s;
      height: 100%;
      border: 1px solid rgba(0,0,0,0.03);
    }
    .crop-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 22px 40px rgba(0, 40, 20, 0.12);
    }
    .crop-img {
      height: 190px;
      object-fit: cover;
      width: 100%;
      background: #e5f0ea;
    }
    .crop-body {
      padding: 1.6rem 1.3rem 1.8rem;
    }
    .crop-title {
      font-weight: 700;
      color: #1a3a2a;
      font-size: 1.45rem;
      border-bottom: 2px dashed #d0e2d6;
      padding-bottom: 0.5rem;
      margin-bottom: 0.9rem;
    }
    .crop-title i {
      color: #f5b342;
      margin-right: 8px;
    }
    .detail-item {
      display: flex;
      align-items: baseline;
      gap: 6px;
      margin-bottom: 0.4rem;
      font-size: 0.98rem;
    }
    .detail-item i {
      color: #2a5a3a;
      width: 22px;
      font-size: 1.05rem;
    }
    .detail-item strong {
      color: #0d2b1a;
      min-width: 70px;
      font-weight: 600;
    }
    .badge-season {
      background-color: #e6f0ea;
      color: #1e4a2c;
      font-weight: 600;
      padding: 0.4rem 1.2rem;
      border-radius: 40px;
      font-size: 0.8rem;
      letter-spacing: 0.3px;
    }
    .btn-outline-green {
      border: 2px solid #2a5a3a;
      color: #2a5a3a;
      border-radius: 40px;
      padding: 0.35rem 1.5rem;
      font-weight: 600;
      transition: 0.2s;
    }
    .btn-outline-green:hover {
      background: #2a5a3a;
      color: white;
    }
    .btn-green {
      background: #1a3a2a;
      color: white;
      border-radius: 40px;
      padding: 0.5rem 2rem;
      font-weight: 600;
      border: none;
      transition: 0.2s;
    }
    .btn-green:hover {
      background: #2a5a3a;
      color: #fff;
      transform: scale(1.02);
    }
    .info-block {
      background: #f0f7f3;
      border-radius: 28px;
      padding: 2rem 2rem;
      border-left: 8px solid #f5b342;
    }
    .info-block i.bi-pin-map-fill {
      color: #f5b342;
    }
    .footer-note {
      background: #e9f3ed;
      color: #1a3a28;
      padding: 1.8rem 0;
      margin-top: 3rem;
      border-top: 2px solid #c0d9cc;
    }
    .back-link {
      color: #1a3a2a;
      font-weight: 600;
      text-decoration: none;
    }
    .back-link i {
      margin-right: 6px;
    }
    .back-link:hover {
      color: #0f2b1a;
      text-decoration: underline;
    }
    /* detailed explanation card (gehu example) */
    .explanation-card {
      background: white;
      border-radius: 28px;
      padding: 2rem 2rem;
      box-shadow: 0 8px 24px rgba(0,20,10,0.06);
      border: 1px solid #e2efe8;
    }
    .explanation-card h4 {
      color: #1a3a2a;
      font-weight: 700;
    }
    .explanation-card .highlight {
      background: #f0f7f3;
      padding: 0.2rem 0.8rem;
      border-radius: 30px;
      color: #1a4a2a;
      font-weight: 600;
    }
    @media (max-width: 576px) {
      .hero-section {
        padding: 2rem 0 1.6rem;
      }
      .crop-img {
        height: 140px;
      }
    }
  </style>


  <!-- HERO / header -->
  <section class="hero-section">
    <div class="container">
      <nav aria-label="breadcrumb" class="breadcrumb-custom">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-fill"></i> मुख्यपृष्ठ</a></li>
          <li class="breadcrumb-item"><a href="#">फसलें</a></li>
          <li class="breadcrumb-item active" aria-current="page">पूरी जानकारी</li>
        </ol>
      </nav>
      <div class="row align-items-center">
        <div class="col-md-8">
          <h1 class="display-5 fw-bold"><i class="bi bi-book-fill me-2" style="color: #f5b342;"></i>पूरी जानकारी पढ़ें</h1>
          <p class="lead mb-0">प्रमुख रबी, खरीफ और ज़ायद फसलों की सम्पूर्ण जानकारी – बुवाई, सिंचाई, उपज और बहुत कुछ</p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
          <span class="badge-season"><i class="bi bi-tags me-1"></i> रबी · खरीफ · ज़ायद</span>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN DETAILS CONTENT -->
  <div class="container py-4">

    <!-- परिचय ब्लॉक -->
    <div class="info-block mb-5">
      <div class="row g-3 align-items-center">
        <div class="col-md-8">
          <h3 class="fw-bold" style="color: #1a3a2a;"><i class="bi bi-pin-map-fill me-2"></i>भारत की प्रमुख फसलें</h3>
          <p class="mb-0" style="font-size: 1.05rem;">यहाँ रबी, खरीफ और ज़ायद फसलों की विस्तृत जानकारी दी गई है। फसल का चयन करें और पूरी जानकारी पढ़ें — बीज, मिट्टी, सिंचाई, फसल अवधि, उपज और बहुत कुछ।</p>
        </div>
        <div class="col-md-4 text-md-end">
          <i class="bi bi-arrow-down-circle-fill" style="font-size: 2.6rem; color: #2a5a3a;"></i>
        </div>
      </div>
    </div>

    <!-- ==== विस्तृत व्याख्या का कार्ड – गेहूँ (जैसा चाहा गया) ==== -->
    <div class="row mb-5">
      <div class="col-12">
        <div class="explanation-card">
          <div class="d-flex flex-wrap align-items-start gap-3 mb-3">
            <h4 class="mb-0"><i class="bi bi-wheat" style="color: #f5b342;"></i> गेहूँ (रबी फसल) – विस्तृत व्याख्या</h4>
            <span class="badge-season ms-auto"><i class="bi bi-check-circle-fill me-1"></i> रबी · प्रमुख</span>
          </div>
          <div class="row g-4">
            <div class="col-md-6">
              <p><span class="highlight">🌾 परिचय :</span> गेहूँ भारत की प्रमुख रबी फसल है। यह मुख्य रूप से उत्तर भारत में उगाया जाता है। इसकी खेती ठंडे मौसम में की जाती है।</p>
              <p><span class="highlight">🧪 बीज एवं मिट्टी :</span> उन्नत बीज (HD-2967, PBW-343) एवं दोमट मिट्टी सर्वोत्तम। मिट्टी का pH 6.5–7.5 होना चाहिए।</p>
              <p><span class="highlight">💧 सिंचाई :</span> 4 से 6 बार सिंचाई करें – पहली बुवाई के 20 दिन बाद, फिर 40, 60, 80 दिन पर।</p>
              <p><span class="highlight">🌱 बुवाई :</span> अक्टूबर–नवंबर में बीज दर 100–125 किग्रा/हे. रखें। पंक्ति से पंक्ति 20–22 सेमी की दूरी।</p>
            </div>
            <div class="col-md-6">
              <p><span class="highlight">🧪 उर्वरक :</span> N:P:K 120:60:40 किग्रा/हे. (DAP, यूरिया, MOP)। जैविक खाद भी लाभदायक।</p>
              <p><span class="highlight">🐛 कीट एवं रोग :</span> कतरा, गेहूँ की मक्खी, रतुआ रोग – उचित कीटनाशक/फफूंदनाशक का छिड़काव करें।</p>
              <p><span class="highlight">⏳ कटाई :</span> मार्च–अप्रैल में जब दाना सख्त हो जाए। उपज 45–55 क्विंटल/हे. तक।</p>
              <p><span class="highlight">📦 भंडारण :</span> नमी 12% से कम रखें, बोरों में सुरक्षित रखें। कीटों से बचाव के लिए फास्फोटॉक्सिन का उपयोग करें।</p>
            </div>
          </div>
          <div class="mt-3 text-end">
            <a href="#" class="btn btn-green btn-sm"><i class="bi bi-file-pdf me-1"></i> पूर्ण गाइड डाउनलोड करें</a>
          </div>
        </div>
      </div>
    </div>

    <!-- फसल कार्ड ग्रिड – सभी प्रमुख फसलें (details) -->
    <h3 class="fw-bold mb-3" style="color: #1a3a2a;"><i class="bi bi-grid-3x3-gap-fill me-2" style="color: #f5b342;"></i>अन्य प्रमुख फसलें</h3>
    <div class="row g-4">

      <!-- 1. गेहूँ (कार्ड रूप में भी, लेकिन ऊपर डिटेल दे दी) -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/2a5a3a/ffffff?text=गेहूँ" class="crop-img" alt="गेहूँ फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-wheat"></i> गेहूँ (रबी)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 4-6 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> अक्टूबर-नवंबर</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> मार्च-अप्रैल</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 14°C – 28°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 45–55 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> रबी</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- 2. धान (चावल) – खरीफ -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/3b6b4a/ffffff?text=धान" class="crop-img" alt="धान फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-flower1"></i> धान (चावल)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 10-12 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> जून-जुलाई</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> अक्टूबर-नवंबर</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 22°C – 32°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 55–70 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> खरीफ</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- 3. ज्वार – खरीफ / रबी -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/4f7a5c/ffffff?text=ज्वार" class="crop-img" alt="ज्वार फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-tree"></i> ज्वार (चारा/अन्न)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 3-4 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> जून-जुलाई (खरीफ)</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> अक्टूबर-नवंबर</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 25°C – 35°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 25–35 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> खरीफ/रबी</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- 4. मक्का – खरीफ / ज़ायद -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/3d6b4a/ffffff?text=मक्का" class="crop-img" alt="मक्का फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-cup-straw"></i> मक्का (भुट्टा)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 5-7 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> जून-जुलाई / फरवरी</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> सितंबर-अक्टूबर / मई</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 21°C – 30°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 40–55 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> खरीफ/ज़ायद</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- 5. सरसों – रबी -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/5c7a4a/ffffff?text=सरसों" class="crop-img" alt="सरसों फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-flower2"></i> सरसों (राई)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 2-3 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> अक्टूबर-नवंबर</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> मार्च-अप्रैल</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 10°C – 25°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 15–20 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> रबी</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>

      <!-- 6. चना (रबी) -->
      <div class="col-lg-4 col-md-6">
        <div class="crop-card">
          <img src="https://placehold.co/600x400/4d7856/ffffff?text=चना" class="crop-img" alt="चना फसल">
          <div class="crop-body">
            <div class="crop-title"><i class="bi bi-circle-fill" style="color: #c49a2b;"></i> चना (बंगाल ग्राम)</div>
            <div class="detail-item"><i class="bi bi-droplet"></i><strong>सिंचाई :</strong> 1-2 बार</div>
            <div class="detail-item"><i class="bi bi-calendar-event"></i><strong>बुवाई :</strong> अक्टूबर-नवंबर</div>
            <div class="detail-item"><i class="bi bi-calendar-check"></i><strong>कटाई :</strong> मार्च-अप्रैल</div>
            <div class="detail-item"><i class="bi bi-thermometer-half"></i><strong>तापमान :</strong> 15°C – 28°C</div>
            <div class="detail-item"><i class="bi bi-box-seam"></i><strong>उपज :</strong> 20–25 क्विंटल/हे.</div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
              <span class="badge-season"><i class="bi bi-check-circle-fill me-1"></i> रबी</span>
              <a href="#" class="btn btn-outline-green btn-sm">और पढ़ें <i class="bi bi-arrow-right-short"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end row -->

    <!-- अतिरिक्त जानकारी / कृषि सुझाव -->
    <div class="row mt-5 g-4">
      <div class="col-md-6">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h4 class="fw-bold" style="color: #1a3a2a;"><i class="bi bi-lightbulb-fill me-2" style="color: #f5b342;"></i>कृषि सुझाव</h4>
          <ul class="list-unstyled" style="font-size: 1rem;">
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> रबी फसलों के लिए समय पर सिंचाई आवश्यक है।</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> खरीफ फसलों में मॉनसून का विशेष ध्यान रखें।</li>
            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> जैविक खाद और फसल चक्र अपनाएँ।</li>
            <li><i class="bi bi-check-circle-fill text-success me-2"></i> उन्नत बीजों के लिए कृषि विभाग से संपर्क करें।</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-4 bg-white rounded-4 shadow-sm h-100">
          <h4 class="fw-bold" style="color: #1a3a2a;"><i class="bi bi-question-circle-fill me-2" style="color: #f5b342;"></i>फसल चयन</h4>
          <p style="font-size: 1rem;">प्रत्येक फसल की पूरी जानकारी के लिए <strong>“और पढ़ें”</strong> पर क्लिक करें। आप फसल की बुवाई, मिट्टी, उर्वरक, कीट नियंत्रण और भंडारण विधियाँ विस्तार से पढ़ सकते हैं।</p>
          <a href="#" class="btn btn-green mt-2"><i class="bi bi-arrow-right-circle me-1"></i> सभी फसलें देखें</a>
        </div>
      </div>
    </div>

    <!-- वापस लिंक -->
    <div class="mt-5 text-center">
      <a href="#" class="back-link"><i class="bi bi-arrow-left-circle-fill"></i> प्रमुख फसलें (मुख्य पृष्ठ)</a>
      <span class="mx-3 text-muted">|</span>
      <a href="#" class="back-link"><i class="bi bi-house-fill"></i> होम</a>
    </div>

  </div> <!-- container -->

  <!-- फुटर -->
  <footer class="footer-note">
    <div class="container text-center">
      <p class="mb-0 fw-semibold"><i class="bi bi-tree-fill me-1" style="color: #2a5a3a;"></i> Pramukh Fasalen · सम्पूर्ण कृषि जानकारी</p>
      <small class="text-muted">सभी फसलों की जानकारी भारतीय कृषि अनुसंधान परिषद (ICAR) के अनुसार</small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection