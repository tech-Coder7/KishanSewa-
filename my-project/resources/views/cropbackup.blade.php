@extends('layouts.app')
@section('content')

<style>
    /* Is container se content aur footer me badhiya aur fixed gap banega */
    .crop-page-main-block {
        position: relative;
        display: block;
        width: 100%;
        clear: both;
        margin-top: 30px;
        margin-bottom: 80px; /* Iski wajah se footer hamesha cards ke niche rahega */
    }

    /* Cards ki styling jo kabhi height freeze nahi karegi (Auto-adjusting) */
    .crop-clean-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 24px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #dee2e6;
        margin-bottom: 24px; /* Grid spacing safety */
        position: relative;
        overflow: hidden;
    }

    .crop-card-title-fixed {
        color: #198754;
        font-weight: 700;
        font-size: 20px;
        border-bottom: 2px solid #f0fdf4;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }

    /* Visual Timeline Nodes */
    .crop-guide-nodes {
        list-style: none;
        padding-left: 20px;
        border-left: 3px solid #198754;
        margin-top: 15px;
    }
    .crop-guide-nodes li {
        position: relative;
        margin-bottom: 20px;
    }
    .crop-guide-nodes li::before {
        content: '';
        position: absolute;
        left: -27px;
        top: 4px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #198754;
        border: 2px solid #fff;
    }

    /* Upload Box layout */
    .crop-box-dash {
        border: 2px dashed #198754;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 30px 20px;
        cursor: pointer;
    }
</style>

<div class="container crop-page-main-block clearfix">
    
    <div class="row bg-light p-3 rounded-3 mb-4 align-items-center border g-3">
        <div class="col-md-7 text-center text-md-start">
            <h4 class="fw-bold text-dark m-0">🌾 Fasal Ki Sateek Jankari</h4>
        </div>
        <div class="col-md-5 text-md-end text-center">
            <select class="form-select border-success fw-bold text-dark" id="cropSwitchEngine" onchange="runDashboardSwitch(this.value)" style="max-width: 250px; display: inline-block;">
                <option value="dhan">धान (Rice / Paddy)</option>
                <option value="gehun">गेहूं (Wheat)</option>
                <option value="makka">मक्का (Maize)</option>
                <option value="aalu">आलू (Potato)</option>
                <option value="tamatar">टमाटर (Tomato)</option>
                <option value="pyaj">प्याज (Onion)</option>
                <option value="chana">चना (Chickpea)</option>
                <option value="sarso">सरसों (Mustard)</option>
                <option value="ganna">गन्ना (Sugarcane)</option>
            </select>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-7 col-md-12">
            
            <div class="crop-clean-card">
                <h3 class="crop-card-title-fixed" id="uiTitleBlock">धान (Rice) Ki Kheti Ka Tareeqa</h3>
                <div class="row g-2 mb-3 bg-light p-2 rounded text-center small">
                    <div class="col-6 border-end">Sahi Samay: <strong id="uiTimeBlock">June - July</strong></div>
                    <div class="col-6">Beej Matra/Acre: <strong id="uiSeedBlock">6 - 8 kg</strong></div>
                </div>
                <ul class="crop-guide-nodes">
                    <li>
                        <h6 class="fw-bold text-dark m-0" id="uiStep1T">Mitti ki Taiyari & Jutaai</h6>
                        <p class="text-muted small m-0 mt-1" id="uiStep1D">Khet mein paani bhar kar 2 baar kadwa (puddling) karein taaki mitti naram ho jaye.</p>
                    </li>
                    <li>
                        <h6 class="fw-bold text-dark m-0" id="uiStep2T">Nursery aur Ropaai</h6>
                        <p class="text-muted small m-0 mt-1" id="uiStep2D">21 se 25 din purane podhon ko nursery se nikal kar 15-20 cm ki doori par lagayein.</p>
                    </li>
                    <li>
                        <h6 class="fw-bold text-dark m-0" id="uiStep3T">Paani aur Khad Prabandhan</h6>
                        <p class="text-muted small m-0 mt-1" id="uiStep3D">Ropaai ke theek 3 हफ्ते baad Urea ki pehli top-dressing zaroor karein.</p>
                    </li>
                </ul>
            </div>

            <div class="crop-clean-card">
                <h3 class="crop-card-title-fixed"><i class="fas fa-camera me-2"></i> Fasal Bimari Scanner</h3>
                <p class="text-muted small mb-3">Patte ki photo select karein, system bimari aur dava ka naam bata dega.</p>
                <div class="crop-box-dash text-center" onclick="document.getElementById('fileUploadNode').click()">
                    <i class="fas fa-cloud-upload-alt fa-2x text-success mb-2"></i>
                    <p class="m-0 small fw-bold text-secondary">Photo Select Karne Ke Liye Yahan Click Karein</p>
                    <input type="file" id="fileUploadNode" style="display:none;" onchange="executeScanMock()">
                </div>
                <div id="scanDisplayBox" class="alert alert-success mt-3 d-none">
                    <h6 class="fw-bold m-0 text-success"><i class="fas fa-check-circle me-1"></i> <span id="lblDisease">Blast Disease (झुलसा रोग)</span> detected!</h6>
                    <p class="m-0 small text-dark mt-2"><strong>Upay:</strong> <span id="lblSolution">Tricyclazole 75% WP ka 0.6g/L pani me milakar spray karein.</span></p>
                </div>
            </div>

        </div>

        <div class="col-lg-5 col-md-12">
            
            <div class="crop-clean-card">
                <h3 class="crop-card-title-fixed"><i class="fas fa-calculator me-2"></i> Fertilizer Calculator</h3>
                <div class="bg-light p-3 rounded mb-3 border">
                    <label class="form-label small fw-bold text-secondary">Khet ka Area (Acre)</label>
                    <input type="number" id="calcAcreInput" class="form-control fw-bold" value="1" min="1">
                    <button class="btn btn-success w-100 fw-bold py-2 mt-3" onclick="runFertCalc()">Calculate Karein</button>
                </div>
                <div id="calcOutputDisplay" class="p-2 border rounded bg-light d-none">
                    <div class="d-flex justify-content-between border-bottom py-2 px-2">
                        <span class="small text-muted">Urea Req:</span>
                        <span class="fw-bold text-success" id="outUrea">-- kg</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-2">
                        <span class="small text-muted">DAP Req:</span>
                        <span class="fw-bold text-success" id="outDap">-- kg</span>
                    </div>
                </div>
            </div>

            <div class="crop-clean-card">
                <h3 class="crop-card-title-fixed"><i class="fas fa-chart-line me-2"></i> Aaj Ka Mandi Bhav</h3>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle m-0 text-center small">
                        <thead class="table-light">
                            <tr>
                                <th>Mandi Name</th>
                                <th>Min Price</th>
                                <th>Max Price</th>
                            </tr>
                        </thead>
                        <tbody id="mandiRowsEngine">
                            </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="clearfix" style="clear: both; display: block; height: 10px;"></div>


<script>
    const globalCropMap = {
        dhan: {
            t: "धान (Rice) Ki Kheti Ka Tareeqa", time: "June - July", seed: "6 - 8 kg",
            s1t: "Mitti ki Taiyari & Jutaai", s1d: "Khet mein paani bhar kar 2 baar kadwa (puddling) karein.",
            s2t: "Nursery aur Ropaai", s2d: "21 se 25 din purane podhon ko 15-20 cm ki doori par lagayein.",
            s3t: "Paani aur Khad Prabandhan", s3d: "Ropaai ke theek 3 हफ्ते baad Urea ki pehli top-dressing zaroor karein.",
            u: 45, d: 30, dis: "Blast Disease (झुलसा रोग)", sol: "Tricyclazole 75% WP ka 0.6g/L pani me milakar spray karein.",
            m: [{n: "Local Mandi", min: "₹2,100", max: "₹2,350"}, {n: "Zila Mandi", min: "₹2,150", max: "₹2,400"}]
        },
        gehun: {
            t: "गेहूं (Wheat) Ki Kheti Ka Tareeqa", time: "November - December", seed: "40 - 45 kg",
            s1t: "Khet ki Gehri Jutaai", s1d: "Mitti ko bhurbhura banane ke liye 2-3 baar cultivator chalayein.",
            s2t: "Beej ki Booai (Sowing)", s2d: "Line se line ki doori 20 cm rakhein aur beej ko 4 cm gehra boyein.",
            s3t: "CRI Stage (Pehli Sinchai)", s3d: "Beej bone ke thik 21 din baad pehli sinchai zaroor karein.",
            u: 50, d: 40, dis: "Yellow Rust (पीला रतुआ)", sol: "Propiconazole 25% EC ka 1 ml prati litre pani me spray karein.",
            m: [{n: "Local Mandi", min: "₹2,400", max: "₹2,650"}, {n: "Zila Mandi", min: "₹2,450", max: "₹2,700"}]
        },
        makka: {
            t: "मक्का (Maize) Ki Kheti Ka Tareeqa", time: "June - July", seed: "8 - 10 kg",
            s1t: "Bed Preparation", s1d: "Khet me jal nikas (water drainage) ka achha prabandh karein.",
            s2t: "Sowing Method", s2d: "Beej ko ridge par 5 cm gehrai aur 20 cm ki aapsi doori par boyein.",
            s3t: "Weed Control & Khad", s3d: "Ghutne tak height aane par Urea ki top dressing karein.",
            u: 40, d: 35, dis: "Fall Armyworm (कीट हमला)", sol: "Emamectin Benzoate 5% SG ka spray karein.",
            m: [{n: "Local Mandi", min: "₹1,950", max: "₹2,200"}, {n: "Zila Mandi", min: "₹2,000", max: "₹2,280"}]
        },
        aalu: {
            t: "आलू (Potato) Ki Kheti Ka Tareeqa", time: "October - November", seed: "12 - 15 Quintal",
            s1t: "Naram Mitti ki Taiyari", s1d: "Mitti ko bhurbhuri banayein. Gobar khad zyada dalein.",
            s2t: "Kool (Ridges) Banana", s2d: "Kool se kool ki doori 60 cm aur beej ki doori 20 cm rakhein.",
            s3t: "Mitti Chadhana", s3d: "Plant 30 din ka hone par jado par dono taraf se mitti chadhayein.",
            u: 40, d: 50, dis: "Late Blight (पछेती झुलसा)", sol: "Mancozeb 75% WP ka 2 gram prati litre paani me spray karein.",
            m: [{n: "Local Mandi", min: "₹1,100", max: "₹1,400"}, {n: "Zila Mandi", min: "₹1,200", max: "₹1,550"}]
        },
        tamatar: {
            t: "टमाटर (Tomato) Ki Kheti Ka Tareeqa", time: "Jan - Feb", seed: "100 - 150 gram",
            s1t: "Raised Bed Banana", s1d: "3 feet chaude bed banayein aur uspar drip line set karein.",
            s2t: "Nursery Ropaai", s2d: "4-5 patti wale swasth podhon ko shaam ke samay bed par lagayein.",
            s3t: "Staking (Sahara Dena)", s3d: "Podhon ko lakdi se baandhein taaki phal mitti me touch na hon.",
            u: 35, d: 45, dis: "Early Blight (अगेती झुलसा)", sol: "Copper Oxychloride 3g/L pani me milakar spray karein.",
            m: [{n: "Local Mandi", min: "₹1,300", max: "₹1,800"}, {n: "Zila Mandi", min: "₹1,450", max: "₹2,100"}]
        },
        pyaj: {
            t: "प्याज (Onion) Ki Kheti Ka Tareeqa", time: "October - November", seed: "3 - 4 kg",
            s1t: "Flat Bed Formation", s1d: "Khet ko barabar samtal karein taaki paani ek jagah jama na ho.",
            s2t: "Nursery Transplant", s2d: "6-8 hafte purani nursery ke podhon ko 10 cm doori par lagayein.",
            s3t: "Halka Paani", s3d: "Pyaj me khadi sinchai na karein, halka paani thode-thode dino me dein.",
            u: 45, d: 40, dis: "Purple Blotch (बैंगनी धब्बा)", sol: "Tebuconazole 1 ml prati litre pani me spray karein.",
            m: [{n: "Local Mandi", min: "₹1,800", max: "₹2,400"}, {n: "Zila Mandi", min: "₹1,950", max: "₹2,650"}]
        },
        chana: {
            t: "चना (Chickpea) Ki Kheti Ka Tareeqa", time: "October - November", seed: "30 - 35 kg",
            s1t: "Kam Nami me Jutaai", s1d: "Khet me halki nami hone par jutaai karein. Mitti zyada barik na karein.",
            s2t: "Beej Upchar (Treatment)", s2d: "Rhizobium culture se beej upcharit karein taaki gaanth bane.",
            s3t: "Nipping (Chunai)", s3D: "30-40 din baad podho ki upri dandi tod dein taaki zyada shakhayein niklein.",
            u: 15, d: 45, dis: "Root Rot (जड़ गलना)", sol: "Trichoderma viride 4g/kg beej me milakar upchar karein.",
            m: [{n: "Local Mandi", min: "₹5,100", max: "₹5,400"}, {n: "Zila Mandi", min: "₹5,200", max: "₹5,650"}]
        },
        sarso: {
            t: "सरसों (Mustard) Ki Kheti Ka Tareeqa", time: "September - October", seed: "1.5 - 2 kg",
            s1t: "Nami Sanrakshan", s1d: "Pata chalakar mitti ki nami ko andar block karein.",
            s2t: "Thinning (Birla Karna)", s2d: "Jamne ke 15 din baad aapsi doori 12-15 cm kar dein.",
            s3t: "Sinchai Prabandhan", s3d: "Fasal me sirf 2 sinchai chahiye—phool aane se pehle, dusri fali bante samay.",
            u: 35, d: 30, dis: "Aphids (मँहू कीट)", sol: "Imidacloprid 17.8% SL ka 0.5 ml/L paani me spray karein.",
            m: [{n: "Local Mandi", min: "₹5,400", max: "₹5,900"}, {n: "Zila Mandi", min: "₹5,550", max: "₹6,150"}]
        },
        ganna: {
            t: "गन्ना (Sugarcane) Ki Kheti Ka Tareeqa", time: "Feb - March", seed: "25 - 30 Quintal",
            s1t: "Gehri Naali Banana", s1d: "Trench method se 4 feet ki doori par gehri naaliyan banayein.",
            s2t: "Do Aankh Wale Tukde", s2d: "Ganne ke 2 aankh wale tukdo ko naali me rakh kar mitti se dhanp dein.",
            s3t: "Bandaai (Staking)", s3d: "Ganna jab bada ho jaye toh 4-5 ganne ko aaps me baandhein.",
            u: 60, d: 50, dis: "Red Rot (लाल सड़न रोग)", sol: "Bimari wale podhe ko ukhad kar jala dein.",
            m: [{n: "Sarkari Rate", min: "₹350/Q", max: "₹390/Q"}, {n: "Mill Price", min: "₹360/Q", max: "₹400/Q"}]
        }
    };

    function runDashboardSwitch(cropKey) {
        const item = globalCropMap[cropKey];
        if(!item) return;

        document.getElementById('scanDisplayBox').classList.add('d-none');
        document.getElementById('calcOutputDisplay').classList.add('d-none');

        // Dynamic Text Nodes Insertion
        document.getElementById('uiTitleBlock').innerText = item.t;
        document.getElementById('uiTimeBlock').innerText = item.time;
        document.getElementById('uiSeedBlock').innerText = item.seed;

        document.getElementById('uiStep1T').innerText = item.s1t;
        document.getElementById('uiStep1D').innerText = item.s1d;
        document.getElementById('uiStep2T').innerText = item.s2t;
        document.getElementById('uiStep2D').innerText = item.s2d;
        document.getElementById('uiStep3T').innerText = item.s3t;
        document.getElementById('uiStep3D').innerText = item.s3d;

        // Mandi Loop Builder
        const tbody = document.getElementById('mandiRowsEngine');
        tbody.innerHTML = '';
        item.mandi.forEach(m => {
            tbody.innerHTML += `<tr>
                <td class="fw-bold text-secondary">${m.n}</td>
                <td class="text-danger fw-bold">${m.min}</td>
                <td class="text-success fw-bold">${m.max}</td>
            </tr>`;
        });
    }

    function runFertCalc() {
        const acres = parseFloat(document.getElementById('calcAcreInput').value);
        if (isNaN(acres) || acres <= 0) {
            alert("Sahi Acre value likhein!");
            return;
        }
        const cropKey = document.getElementById('cropSwitchEngine').value;
        const crop = globalCropMap[cropKey];

        document.getElementById('outUrea').innerText = Math.round(acres * crop.u) + " kg";
        document.getElementById('outDap').innerText = Math.round(acres * crop.d) + " kg";
        document.getElementById('calcOutputDisplay').classList.remove('d-none');
    }

    function executeScanMock() {
        const cropKey = document.getElementById('cropSwitchEngine').value;
        const crop = globalCropMap[cropKey];

        document.getElementById('lblDisease').innerText = crop.dis;
        document.getElementById('lblSolution').innerText = crop.sol;
        document.getElementById('scanDisplayBox').classList.remove('d-none');
    }

    // Run Initial Set
    window.onload = function() {
        runDashboardSwitch('dhan');
    };
</script>
@endsection