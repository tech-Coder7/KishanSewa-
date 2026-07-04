@extends('layouts.app')

@section('content')

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f8f9fa;
    }

    .hero-section {
        background: linear-gradient(135deg, #1a3a2a, #2d7d2d);
        color: white;
        padding: 50px 0 35px;
        margin-bottom: 35px;
    }

    .section-title {
        border-left: 4px solid #2d7d2d;
        padding-left: 12px;
        color: #2d7d2d;
        font-weight: 700;
    }

    .cat-card {
        border-radius: 16px;
        border: none;
        background: white;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s, box-shadow 0.2s;
        overflow: hidden;
        height: 100%;
    }

    .cat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.15);
    }

    .cat-card img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        background: #e8f5e9;
    }

    .cat-card .card-body {
        padding: 1.2rem;
    }

    .cat-card .card-title {
        font-weight: 700;
        color: #1a3a2a;
        font-size: 1.2rem;
        margin-bottom: 0.3rem;
    }

    .season-badge {
        display: inline-block;
        border-radius: 20px;
        padding: 3px 14px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .season-badge.rabi {
        background: #fff3e0;
        color: #e65100;
    }

    .season-badge.kharif {
        background: #e3f2fd;
        color: #0d47a1;
    }

    .season-badge.zaid {
        background: #fce4ec;
        color: #880e4f;
    }

    .btn-back {
        background: #1a3a2a;
        color: white;
        border: none;
        padding: 0.5rem 1.8rem;
        border-radius: 60px;
        font-weight: 600;
        transition: 0.2s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background: #2d7d2d;
        color: white;
    }

    .filter-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 1.5rem;
    }

    .filter-btn {
        background: #f0f0f0;
        border: none;
        padding: 0.5rem 1.5rem;
        border-radius: 60px;
        font-weight: 600;
        color: #333;
        transition: 0.2s;
        cursor: pointer;
    }

    .filter-btn:hover {
        background: #d4e8d0;
    }

    .filter-btn.active {
        background: #2d7d2d;
        color: white;
    }

    .crop-count {
        font-size: 0.85rem;
        color: #777;
    }

    .crop-card {
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 12px;
        overflow: hidden;
        border: none;
        height: 100%;
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

    .img-placeholder {
        height: 200px;
        background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 35px 0 25px;
        }
        .hero-section h1 {
            font-size: 1.8rem;
        }
        .cat-card img {
            height: 160px;
        }
        .filter-btns {
            gap: 6px;
        }
        .filter-btn {
            padding: 0.4rem 1rem;
            font-size: 0.85rem;
        }
        .crop-card img {
            height: 160px;
        }
    }
</style>

<!-- ============================================ -->
<!-- CATEGORY PAGE -->
<!-- ============================================ -->
<div id="category-page">
    <div class="hero-section text-center">
        <div class="container">
            <h1 class="fw-bold display-5">📋 {{ $name }} Categories</h1>
            <p class="lead mb-2">Bharat ki pramukh fasalon ki categories</p>
            <a href="{{ url('/') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Wapas Home
            </a>
        </div>
    </div>

    <div class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
            <h4 class="section-title mb-0">🌾 {{ $name }}</h4>
            <span class="crop-count">{{ count($crop) }} fasalen</span>
        </div>

        <!-- Filter Buttons -->
        <div class="filter-btns">
            <button class="filter-btn active" onclick="filterCrops('all', this)">🌾 Sabhi</button>
            @foreach ($data as $row)
                <button class="filter-btn" onclick="filterCrops('{{ $row->name }}', this)">{{ $row->name }}</button>
            @endforeach
        </div>

        <div class="row g-4" id="category-grid">
            @foreach ($crop as $row)
                <div class="col-12 col-sm-6 col-lg-4 crop-item" data-category="{{ $row->category->name }}">
                    <div class="card crop-card shadow-sm h-100" onclick="window.location='/details/{{ $row->slug }}'">
                        @if($row->image)
                            <img src="{{ asset('storage') }}/{{ $row->image }}" alt="{{ $row->title }}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                            <div class="img-placeholder" style="display:none;">🌾</div>
                        @else
                            <div class="img-placeholder">🌾</div>
                        @endif
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold mb-0">{{ $row->title }}</h5>
                                <span class="badge bg-primary badge-season">{{ $row->category->name }}</span>
                            </div>
                            <hr class="my-2">
                            <span class="text-success small fw-semibold">Poori jaankari padhein →</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<script>
    function filterCrops(filter, btn) {
        // Update active button
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Filter crops
        const items = document.querySelectorAll('.crop-item');
        let visibleCount = 0;

        items.forEach(item => {
            const category = item.dataset.category;
            if (filter === 'all' || category === filter) {
                item.style.display = 'block';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Update count
        document.querySelector('.crop-count').textContent = visibleCount + ' fasalen';
    }
</script>

@endsection