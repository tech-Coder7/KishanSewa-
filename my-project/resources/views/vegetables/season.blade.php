@extends('layouts.app')

@section('content')
<style>
.season-page {
    padding: 40px 0;
    background: #f8faf8;
    min-height: 100vh;
}

.veg-card {
    transition: all 0.3s;
    cursor: pointer;
}

.veg-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}
</style>

<section class="season-page">
    <div class="container">
        <a href="{{ route('vegetable.index') }}" class="btn btn-outline-success mb-4">← Back to All Seasons</a>

        <!-- Season Header -->
        <div class="text-center mb-5">
            <div style="font-size: 60px;">{{ $seasonData['icon'] }}</div>
            <h1 class="display-4" style="color: #2d5a27;">{{ $seasonData['title'] }}</h1>
            <p class="lead">{{ $seasonData['period'] }}</p>
            <p class="text-muted">{{ $seasonData['description'] }}</p>
        </div>

        <!-- Vegetables Grid -->
        <div class="row g-4">
            @forelse($vegetables as $veg)
            <div class="col-md-4">
                <div class="card veg-card h-100">
                    <div class="card-body text-center">
                        <div style="font-size: 60px;">{{ $veg['emoji'] }}</div>
                        <h4 class="mt-2">{{ $veg['name'] }}</h4>
                        <p class="text-muted small">{{ $veg['short_description'] }}</p>
                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                            <span class="badge bg-success">₹{{ $veg['market_price'] }}/kg</span>
                            <span class="badge bg-info text-dark">{{ $veg['duration'] }}</span>
                            <span class="badge bg-light text-dark">💧 {{ $veg['water_need'] }}</span>
                        </div>
                        <div class="mt-3">
                            <span class="badge bg-secondary">🌱 {{ $veg['sowing_method'] ?? 'Direct' }}</span>
                            <span class="badge bg-secondary">🌡️ {{ $veg['temperature'] ?? 'N/A' }}</span>
                        </div>
                        {{-- ✅ FIXED: Added id parameter --}}
                        <a href="{{ route('vegetable.detail', $veg['id']) }}" class="btn btn-success mt-3">View Details
                            →</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">No vegetables found for this season.</div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection