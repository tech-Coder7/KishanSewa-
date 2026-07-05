@extends('layouts.app')
@section('content')
  <div class="main-wrapper">

    <!-- ===== HERO SECTION ===== -->
    <div class="mandi-hero p-5 rounded-4 text-white mb-5" style="background: linear-gradient(135deg, #1e3a2b, #2c593f); border-left: 6px solid var(--gold); position: relative; overflow: hidden;">
      <div style="position: absolute; top:0; left:0; width:100%; height:100%; opacity:0.04; background-image: radial-gradient(var(--gold) 1px, transparent 0), radial-gradient(var(--gold) 1px, transparent 0); background-size: 20px 20px; background-position: 0 0, 10px 10px; pointer-events: none;"></div>
      <div class="position-relative">
        <h1 class="display-5 fw-bold text-gold"><i class="fas fa-weight-hanging me-3"></i>Live Mandi Market Rates</h1>
        <p class="fs-5 text-white-50 max-w-600">Pure desh ki mandiyon ke taaja bhav ek jagah par dekhein. Agmarknet API dwara sanchalit dynamic market prices.</p>
        <div class="d-flex gap-2 mt-4 flex-wrap">
          <button id="pageSyncBtn" class="btn btn-gold rounded-pill px-4 py-2" onclick="pageSyncMandiPrices()">
            <i class="fas fa-sync-alt me-2"></i> Sync Market Rates
          </button>
          <a href="/" class="btn btn-outline-light rounded-pill px-4 py-2"><i class="fas fa-home me-2"></i> Back to Home</a>
        </div>
      </div>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="row g-4 mb-5">
      <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm rounded-3 h-100" style="background: var(--card-bg);">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center bg-warning text-dark fs-3" style="width: 60px; height: 60px; background: rgba(249,184,27,0.15) !important; color: var(--gold) !important;">
              <i class="fas fa-seedling"></i>
            </div>
            <div>
              <h6 class="text-muted mb-0 small uppercase font-monospace">Top Commodity / मुख्य फ़सल</h6>
              <h4 class="fw-bold mb-0 mt-1" id="statTopCommodity">{{ $highestCrop }}</h4>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm rounded-3 h-100" style="background: var(--card-bg);">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center bg-success text-white fs-3" style="width: 60px; height: 60px; background: rgba(40,167,69,0.15) !important; color: #28a745 !important;">
              <i class="fas fa-chart-line"></i>
            </div>
            <div>
              <h6 class="text-muted mb-0 small uppercase font-monospace">Highest Price / उच्चतम मूल्य</h6>
              <h4 class="fw-bold mb-0 mt-1" id="statHighestPrice">₹{{ number_format($highestPrice) }} /Q</h4>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3 border-0 shadow-sm rounded-3 h-100" style="background: var(--card-bg);">
          <div class="d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center bg-info text-white fs-3" style="width: 60px; height: 60px; background: rgba(23,162,184,0.15) !important; color: #17a2b8 !important;">
              <i class="fas fa-store"></i>
            </div>
            <div>
              <h6 class="text-muted mb-0 small uppercase font-monospace">Active Mandis / सक्रिय मंडियाँ</h6>
              <h4 class="fw-bold mb-0 mt-1" id="statActiveMandis">{{ $activeMandis }} Markets</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== MANDI RATES VIEW ===== -->
    <div class="card p-4 border-0 shadow-sm rounded-4 mb-5" style="background: var(--card-bg);">
      
      <!-- Filter and Search Header -->
      <div class="row g-3 align-items-center justify-content-between mb-4 pb-3 border-bottom border-light">
        <div class="col-md-6 col-lg-5">
          <div class="position-relative">
            <input type="text" id="mandiPageSearch" class="form-control rounded-pill ps-4 py-2" placeholder="Search by Crop name or Mandi market..." onkeyup="filterMandiPage()" />
            <i class="fas fa-search position-absolute text-muted" style="top: 50%; right: 20px; transform: translateY(-50%);"></i>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 text-md-end">
          <div class="d-flex gap-2 justify-content-md-end flex-wrap">
            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1 active" onclick="filterCategory('all', this)">All Crops</button>
            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1" onclick="filterCategory('Gehun', this)">Grains</button>
            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1" onclick="filterCategory('Aloo|Tamatar|Pyaj', this)">Vegetables</button>
            <button class="btn btn-outline-success btn-sm rounded-pill px-3 py-1" onclick="filterCategory('Sarso|Soybean', this)">Oilseeds</button>
          </div>
        </div>
      </div>

      <!-- Mandi Table -->
      <div class="table-responsive">
        <table class="table table-hover align-middle" id="mandiPageTable">
          <thead class="table-light rounded-3" style="background: rgba(0,0,0,0.02);">
            <tr>
              <th class="ps-4 py-3" style="border-top-left-radius: 12px; border-bottom-left-radius: 12px;">Crop / फ़सल</th>
              <th class="py-3">Mandi / मंडी</th>
              <th class="py-3">Price / मूल्य (Quintal)</th>
              <th class="py-3">Trend / बदलाव</th>
              <th class="pe-4 py-3 text-end" style="border-top-right-radius: 12px; border-bottom-right-radius: 12px;">Last Synced</th>
            </tr>
          </thead>
          <tbody>
            @forelse($mandiPrices as $price)
              <tr class="mandi-page-row" data-crop="{{ $price->crop_name }}">
                <td class="ps-4 py-3 fw-bold crop-name-cell">{{ $price->crop_name }}</td>
                <td class="text-muted mandi-name-cell"><i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $price->mandi_name ?? 'N/A' }}</td>
                <td class="fw-bold">₹{{ number_format($price->price) }} <span class="text-muted small">/{{ $price->unit }}</span></td>
                <td>
                  @if($price->trend == 'up')
                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill"><i class="fas fa-caret-up me-1"></i>{{ $price->change_pct ?? 'UP' }}</span>
                  @elseif($price->trend == 'down')
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill"><i class="fas fa-caret-down me-1"></i>{{ $price->change_pct ?? 'DOWN' }}</span>
                  @else
                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill"><i class="fas fa-minus me-1"></i>STABLE</span>
                  @endif
                </td>
                <td class="pe-4 text-end text-muted small">{{ $price->updated_at ? $price->updated_at->diffForHumans() : 'Just now' }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-5 text-muted">No Mandi prices records found in the database. Please sync rates!</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <style>
    body.dark-mode .table-light {
      background-color: rgba(255,255,255,0.03) !important;
      color: var(--text-color) !important;
    }
    body.dark-mode .table-light th {
      color: var(--text-color) !important;
      background: transparent !important;
    }
    .bg-success-subtle {
      background-color: rgba(40,167,69,0.15) !important;
    }
    .bg-danger-subtle {
      background-color: rgba(220,53,69,0.15) !important;
    }
    .bg-secondary-subtle {
      background-color: rgba(108,117,125,0.15) !important;
    }
  </style>

  <script>
    // Filtering by search input
    function filterMandiPage() {
      const input = document.getElementById('mandiPageSearch');
      const filter = input.value.toLowerCase();
      const rows = document.getElementsByClassName('mandi-page-row');

      for (let i = 0; i < rows.length; i++) {
        const cropCell = rows[i].getElementsByClassName('crop-name-cell')[0];
        const mandiCell = rows[i].getElementsByClassName('mandi-name-cell')[0];
        
        if (cropCell && mandiCell) {
          const cropTxt = cropCell.textContent || cropCell.innerText;
          const mandiTxt = mandiCell.textContent || mandiCell.innerText;
          
          if (cropTxt.toLowerCase().includes(filter) || mandiTxt.toLowerCase().includes(filter)) {
            rows[i].style.display = "";
          } else {
            rows[i].style.display = "none";
          }
        }
      }
    }

    // Category button filtering
    function filterCategory(categoryPattern, btn) {
      // Toggle button active class
      const btns = btn.parentNode.getElementsByTagName('button');
      for(let b of btns) {
        b.classList.remove('active');
      }
      btn.classList.add('active');

      const rows = document.getElementsByClassName('mandi-page-row');
      const regex = new RegExp(categoryPattern, 'i');

      for (let i = 0; i < rows.length; i++) {
        if (categoryPattern === 'all') {
          rows[i].style.display = "";
          continue;
        }

        const cropName = rows[i].getAttribute('data-crop');
        if (regex.test(cropName)) {
          rows[i].style.display = "";
        } else {
          rows[i].style.display = "none";
        }
      }
    }

    // Ajax sync for the dedicated Mandi prices page
    function pageSyncMandiPrices() {
      const btn = document.getElementById('pageSyncBtn');
      const icon = btn.querySelector('i');
      
      icon.classList.add('fa-spin');
      btn.disabled = true;

      fetch('/mandi/sync', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      })
      .then(response => response.json())
      .then(result => {
        if (result.success) {
          // Re-load the page to show updated timestamps and rates
          window.location.reload();
        } else {
          alert('Sync error: ' + result.message);
          icon.classList.remove('fa-spin');
          btn.disabled = false;
        }
      })
      .catch(error => {
        console.error('Error syncing:', error);
        alert('Failed to connect to API.');
        icon.classList.remove('fa-spin');
        btn.disabled = false;
      });
    }
  </script>

@endsection
