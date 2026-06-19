@extends('layouts.app')

@section('content')
<style>
.veg-main {
    padding: 40px 0;
    background: #f8faf8;
    min-height: 100vh;
}

.season-card {
    transition: all 0.3s;
    cursor: pointer;
}

.season-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.veg-card {
    transition: all 0.3s;
    cursor: pointer;
}

.veg-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.trend-up {
    color: #4CAF50;
}

.trend-down {
    color: #f44336;
}

.trend-stable {
    color: #FF9800;
}
</style>

<section class="veg-main">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="display-4" style="color: #2d5a27;">🥬 Complete Vegetable Guide</h1>
            <p class="lead">Discover the best vegetables for every season with market prices</p>
        </div>

        <!-- Market Prices -->
        <div class="card mb-5 shadow-sm">
            <div class="card-body">
                <h3 class="mb-3">📊 Live Market Prices</h3>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>Vegetable</th>
                                <th>Price</th>
                                <th>Unit</th>
                                <th>Trend</th>
                                <th>Mandi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($marketPrices as $price)
                            <tr>
                                <td>{{ $price['emoji'] }} {{ $price['name'] }}</td>
                                <td><strong>₹{{ $price['price'] }}</strong></td>
                                <td>/ {{ $price['unit'] }}</td>
                                <td>
                                    @if($price['trend'] == 'up')
                                    <span class="trend-up">↑ {{ $price['change'] }}</span>
                                    @elseif($price['trend'] == 'down')
                                    <span class="trend-down">↓ {{ $price['change'] }}</span>
                                    @else
                                    <span class="trend-stable">→ {{ $price['change'] }}</span>
                                    @endif
                                </td>
                                <td>{{ $price['mandi'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-end text-muted small">Last updated: {{ now()->format('d M Y, H:i') }}</div>
            </div>
        </div>

        <!-- Season Cards -->
        <h3 class="mb-3" style="color:#2d5a27;">📅 Growing Seasons</h3>
        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <a href="{{ route('vegetable.season', 'kharif') }}"
                    class="card season-card text-center text-decoration-none h-100">
                    <div class="card-body">
                        <div style="font-size: 50px;">🌧️</div>
                        <h5 class="mt-2">Kharif</h5>
                        <p class="text-muted small">June-Oct (Monsoon)</p>
                        <span class="badge bg-success">15+ Vegetables</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('vegetable.season', 'rabi') }}"
                    class="card season-card text-center text-decoration-none h-100">
                    <div class="card-body">
                        <div style="font-size: 50px;">❄️</div>
                        <h5 class="mt-2">Rabi</h5>
                        <p class="text-muted small">Oct-Mar (Winter)</p>
                        <span class="badge bg-primary">18+ Vegetables</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('vegetable.season', 'zaid') }}"
                    class="card season-card text-center text-decoration-none h-100">
                    <div class="card-body">
                        <div style="font-size: 50px;">☀️</div>
                        <h5 class="mt-2">Zaid</h5>
                        <p class="text-muted small">Mar-Jun (Summer)</p>
                        <span class="badge bg-warning text-dark">12+ Vegetables</span>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('vegetable.season', 'year-round') }}"
                    class="card season-card text-center text-decoration-none h-100">
                    <div class="card-body">
                        <div style="font-size: 50px;">🔄</div>
                        <h5 class="mt-2">Year Round</h5>
                        <p class="text-muted small">Throughout Year</p>
                        <span class="badge bg-secondary">10+ Vegetables</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Vegetables List -->
        <h3 class="mb-3" style="color:#2d5a27;">🥬 All Vegetables</h3>
        <div class="row g-4">
            @foreach($vegetables as $veg)
            <div class="col-md-4">
                <div class="card veg-card h-100">
                    <div class="card-body text-center">
                        <div style="font-size: 60px;">{{ $veg['emoji'] }}</div>
                        <h4 class="mt-2">{{ $veg['name'] }}</h4>
                        <p class="text-muted small">{{ $veg['short_description'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">₹{{ $veg['market_price'] }}/kg</span>
                            <span class="badge bg-info text-dark">{{ $veg['season'] }}</span>
                        </div>
                        <div class="mt-2">
                            <span class="badge bg-light text-dark">{{ $veg['duration'] }}</span>
                            <span class="badge bg-light text-dark">💧 {{ $veg['water_need'] }}</span>
                        </div>
                        {{-- ✅ FIXED: Added id parameter --}}
                        <a href="{{ route('vegetable.detail', $veg['id']) }}" class="btn btn-success mt-3">View Details
                            →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- AI Section -->
        <div class="card mt-5 bg-primary text-white shadow">
            <div class="card-body">
                <h3>🤖 AI Vegetable Advisor</h3>
                <p>Get personalized vegetable recommendations based on your farm conditions</p>
                <form id="aiForm" class="row g-3">
                    @csrf
                    <div class="col-md-4">
                        <select name="season" class="form-control" required>
                            <option value="">Select Season</option>
                            <option value="kharif">Kharif (Monsoon)</option>
                            <option value="rabi">Rabi (Winter)</option>
                            <option value="zaid">Zaid (Summer)</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="soil" class="form-control" required>
                            <option value="">Select Soil Type</option>
                            <option value="loamy">Loamy Soil</option>
                            <option value="sandy">Sandy Soil</option>
                            <option value="clay">Clay Soil</option>
                            <option value="alluvial">Alluvial Soil</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="water" class="form-control" required>
                            <option value="">Water Availability</option>
                            <option value="high">High (Regular Irrigation)</option>
                            <option value="medium">Medium (Partial)</option>
                            <option value="low">Low (Rain-fed)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-light">🔍 Get AI Recommendations</button>
                    </div>
                </form>
                <div id="aiResults" class="mt-4"></div>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('aiForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const resultsDiv = document.getElementById('aiResults');
    resultsDiv.innerHTML =
        '<div class="text-center"><div class="spinner-border text-light" role="status"></div><p>Analyzing your farm conditions...</p></div>';

    fetch('{{ route("api.vegetable.recommendations") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                season: formData.get('season'),
                soil: formData.get('soil'),
                water: formData.get('water')
            })
        })
        .then(response => response.json())
        .then(data => {
            let html = '<h4>🌱 Recommended Vegetables</h4><div class="row">';
            data.recommendations.forEach(veg => {
                html += `
                <div class="col-md-4 mb-3">
                    <div class="card bg-dark text-white">
                        <div class="card-body text-center">
                            <div style="font-size: 40px;">${veg.emoji}</div>
                            <h5>${veg.name}</h5>
                            <span class="badge bg-success">${veg.match}% Match</span>
                            <p class="mt-2"><small>₹${veg.market_price || 30}/kg</small></p>
                            <a href="/vegetables/detail/${veg.id}" class="btn btn-sm btn-success">View Details</a>
                        </div>
                    </div>
                </div>
            `;
            });
            html += '</div>';
            resultsDiv.innerHTML = html;
        })
        .catch(error => {
            resultsDiv.innerHTML =
                '<div class="alert alert-danger">⚠️ Error loading recommendations. Please try again.</div>';
        });
});
</script>
@endsection