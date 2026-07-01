@extends('layouts.app')
@section('content')

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f8f9fa;
    }

    .crop-card {
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
      border-radius: 12px;
      overflow: hidden;
      border: none;
    }

    .crop-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .crop-card img {
      height: 200px;
      object-fit: cover;
      width: 100%;
      background: #e8f5e9;
    }

    .badge-season {
      font-size: 0.75rem;
    }

    #detail-page {
      display: none;
    }

    #category-page {
      display: none;
    }

    #detail-page .hero-img {
      width: 100%;
      max-height: 400px;
      object-fit: cover;
      border-radius: 12px;
    }

    .hero-section {
      background: linear-gradient(135deg, #2d7d2d, #56ab2f);
      color: white;
      padding: 60px 0 40px;
      margin-bottom: 40px;
    }

    .info-card {
      border-radius: 10px;
      border: none;
      background: white;
    }

    .section-title {
      border-left: 4px solid #2d7d2d;
      padding-left: 12px;
      color: #2d7d2d;
    }

    .tag {
      display: inline-block;
      background: #e8f5e9;
      color: #2d7d2d;
      border-radius: 20px;
      padding: 4px 14px;
      font-size: 0.82rem;
      margin: 3px;
    }

    .img-placeholder {
      height: 200px;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 4rem;
    }

    .detail-img-placeholder {
      height: 400px;
      background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 6rem;
      border-radius: 12px;
    }

    .wiki-link {
      color: #0645ad;
      text-decoration: none;
    }

    .wiki-link:hover {
      text-decoration: underline;
    }

    .cat-table th {
      background: #f0f0f0;
      font-weight: 600;
    }

    .cat-table td,
    .cat-table th {
      vertical-align: middle;
      padding: 10px 14px;
    }

    .cat-badge {
      display: inline-block;
      background: #e3f2fd;
      color: #1565c0;
      border-radius: 20px;
      padding: 2px 10px;
      font-size: 0.8rem;
      margin: 2px;
    }

    .cat-card {
      border-radius: 12px;
      border: none;
      background: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
      transition: transform 0.2s;
    }

    .cat-card:hover {
      transform: translateY(-3px);
    }

    .use-badge {
      display: inline-block;
      border-radius: 20px;
      padding: 3px 12px;
      font-size: 0.78rem;
      font-weight: 500;
    }
  </style>


  <!-- LIST PAGE -->
  <div id="list-page">
    <div class="hero-section text-center">
      <div class="container">
        <h1 class="fw-bold display-5">🌾 Fasal Blog</h1>
        <p class="lead mb-2">Bharat ki pramukh fasalon ki sampurn jaankari</p>
        <button class="btn btn-light text-success fw-semibold mt-2" onclick="showCategories()">📋 Fasal Categories
          Dekhen</button>
      </div>
    </div>
    <div class="container pb-5">
      <h4 class="mb-4 section-title">🌱 Pramukh Fasalen</h4>
      <div class="row g-4">

        <div class="row g-4" id="crop-grid">

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
                  <p class="text-muted small mb-0">गेहूँ</p>
                  <hr class="my-2">
                  <!-- <p class="card-text small">Bharat ki sabse mahatvapurn khadya fasal, jo October-November mein boi jaati
                    hai.</p> -->
                  <a href="/detailes"> <span class="text-success small fw-semibold">Poori jaankari padhein →</span></a>
                </div>
              </div>
            </div>
          @endforeach


        </div>
      </div>
    </div>
  </div>






  <script>

  </script>

@endsection