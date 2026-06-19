@extends('layouts.app')

@section('content')
<style>
.detail-page {
    padding: 30px 0;
    background: #f8faf8;
    min-height: 100vh;
}

.detail-hero {
    padding: 40px;
    border-radius: 15px;
    color: white;
}

.info-box {
    background: #f8faf8;
    padding: 15px;
    border-radius: 10px;
    border-left: 4px solid #4CAF50;
}

.info-box .label {
    font-size: 12px;
    color: #888;
    text-transform: uppercase;
    display: block;
}

.info-box .value {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    margin-top: 5px;
}

.timeline-step {
    padding-left: 20px;
    border-left: 3px solid #4CAF50;
    margin-bottom: 20px;
}

.timeline-step .step-title {
    font-weight: 700;
    color: #2d5a27;
}

.timeline-step ul {
    padding-left: 20px;
}

.timeline-step ul li {
    color: #555;
    margin: 3px 0;
}

.tip-box {
    padding: 15px 20px;
    border-radius: 10px;
    margin: 10px 0;
}

.tip-box.green {
    background: #e8f5e9;
    border-left: 5px solid #4CAF50;
}

.tip-box.red {
    background: #fbe9e7;
    border-left: 5px solid #f44336;
}

.pest-table th {
    background: #f0f4f0;
    padding: 10px;
    color: #2d5a27;
    border-bottom: 2px solid #4CAF50;
}

.pest-table td {
    padding: 10px;
    border-bottom: 1px solid #eee;
}
</style>

<section class="detail-page">
    <div class="container">
        <a href="{{ url()->previous() }}" class="btn btn-outline-success mb-3">← Back</a>

        <div class="detail-hero"
            style="background: {{ $vegetable['gradient'] ?? 'linear-gradient(135deg, #2d5a27, #4CAF50)' }}">
            <div style="font-size: 80px;">{{ $vegetable['emoji'] }}</div>
            <h1 class="display-3">{{ $vegetable['name'] }}</h1>
            <p class="lead"><em>{{ $vegetable['scientific_name'] ?? 'Scientific name not available' }}</em></p>
            <div class="d-flex gap-2 flex-wrap mt-3">
                <span class="badge bg-light text-dark">🌱 {{ $vegetable['season'] }} Season</span>
                <span class="badge bg-light text-dark">⏱️ {{ $vegetable['duration'] }}</span>
                <span class="badge bg-light text-dark">💧 {{ $vegetable['water_need'] }}</span>
                <span class="badge bg-light text-dark">🌡️ {{ $vegetable['temperature'] ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="card mt-4 shadow-sm">
            <div class="card-body">
                <!-- Quick Overview -->
                <h3 class="border-bottom pb-2" style="color: #2d5a27;">📊 Quick Overview</h3>
                <div class="row g-3 mt-2">
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Sowing Method</span>
                            <span class="value">{{ $vegetable['sowing_method'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Seed Rate</span>
                            <span class="value">{{ $vegetable['seed_rate'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Spacing</span>
                            <span class="value">{{ $vegetable['spacing'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Expected Yield</span>
                            <span class="value">{{ $vegetable['yield'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Market Price</span>
                            <span class="value"
                                style="color:#4CAF50;">₹{{ number_format($vegetable['market_price'] ?? 30) }}/kg</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Profit/Acre</span>
                            <span class="value"
                                style="color:#4CAF50;">₹{{ number_format($vegetable['profit'] ?? 40000) }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Soil Type</span>
                            <span class="value">{{ $vegetable['soil_type'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="label">Soil pH</span>
                            <span class="value">{{ $vegetable['soil_ph'] }}</span>
                        </div>
                    </div>
                </div>

                <!-- Growing Guide -->
                <h3 class="border-bottom pb-2 mt-4" style="color: #2d5a27;">🌱 Complete Growing Guide</h3>
                <div class="mt-3">
                    @foreach($vegetable['steps'] as $step)
                    <div class="timeline-step">
                        <div class="step-title">{{ $loop->iteration }}. {{ $step['title'] }}</div>
                        <ul>
                            @foreach($step['details'] as $detail)
                            <li>{{ $detail }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>

                <!-- Pest Management -->
                <h3 class="border-bottom pb-2 mt-4" style="color: #2d5a27;">🐛 Pest & Disease Management</h3>
                <div class="table-responsive mt-3">
                    <table class="pest-table table">
                        <thead>
                            <tr>
                                <th>Pest/Disease</th>
                                <th>Symptoms</th>
                                <th>Control Measures</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vegetable['pests'] as $pest)
                            <tr>
                                <td><strong>{{ $pest['name'] }}</strong></td>
                                <td>{{ $pest['symptoms'] }}</td>
                                <td>{{ $pest['control'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Tips -->
                <h3 class="border-bottom pb-2 mt-4" style="color: #2d5a27;">💡 Expert Tips</h3>
                <div class="tip-box green">
                    <h5>✅ Do's</h5>
                    <ul>
                        @foreach($vegetable['dos'] as $do)
                        <li>{{ $do }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="tip-box red">
                    <h5>❌ Don'ts</h5>
                    <ul>
                        @foreach($vegetable['donts'] as $dont)
                        <li>{{ $dont }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Harvesting -->
                <h3 class="border-bottom pb-2 mt-4" style="color: #2d5a27;">🌾 Harvesting Guide</h3>
                <div class="row g-3 mt-2">
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="label">Harvest Time</span>
                            <span class="value">{{ $vegetable['harvest_time'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="label">Harvest Indicator</span>
                            <span class="value">{{ $vegetable['harvest_indicator'] }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <span class="label">Storage Life</span>
                            <span class="value">{{ $vegetable['storage_life'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection