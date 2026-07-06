@extends('layouts.app')
@section('content')
<style>
:root {
    --gold: #f9b81b;
    --dark-green: #1e3a2b;
    --light-green: #e6f0da;
    --text-color: #1e2f1e;
    --bg-color: #f5f9f0;
    --card-bg: #ffffffdd;
    --shadow: rgba(0, 30, 10, 0.08);
}

body {
    background: var(--bg-color);
    color: var(--text-color);
    margin: 0;
    padding: 0;
}

.text-gold {
    color: var(--gold);
}

.btn-gold {
    background-color: var(--gold);
    color: #1e2f1e;
    font-weight: 600;
    border: none;
}

.btn-gold:hover {
    background-color: #fcc94b;
    color: #1e2f1e;
    transform: scale(1.03);
}

/* ABOUT HERO */
.about-hero {
    background: linear-gradient(135deg, #1e3a2b, #14301e);
    border-radius: 24px;
    padding: 4rem 2rem;
    text-align: center;
    color: white;
    position: relative;
    overflow: hidden;
    margin-bottom: 3rem;
    border-left: 6px solid var(--gold);
}

.about-hero::before {
    content: '';
    position: absolute;
    top: -60px;
    right: -60px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: rgba(249, 184, 27, 0.08);
}

.about-hero::after {
    content: '';
    position: absolute;
    bottom: -40px;
    left: -40px;
    width: 160px;
    height: 160px;
    border-radius: 50%;
    background: rgba(249, 184, 27, 0.06);
}

.about-hero h1 {
    font-size: 2.8rem;
    font-weight: 700;
}

.about-hero p {
    font-size: 1.15rem;
    max-width: 650px;
    margin: 0 auto;
    opacity: 0.9;
}

/* STATS */
.stat-box {
    background: var(--light-green);
    border-radius: 20px;
    padding: 1.5rem 1rem;
    text-align: center;
    border-bottom: 4px solid var(--gold);
    transition: 0.3s;
}

.stat-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px var(--shadow);
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 700;
    color: var(--dark-green);
}

.stat-label {
    font-size: 0.9rem;
    color: #5a7a5a;
    font-weight: 500;
}

/* MISSION VISION */
.mission-block {
    background: var(--light-green);
    border-radius: 20px;
    padding: 2rem;
    border-left: 5px solid var(--gold);
    transition: 0.3s;
    height: 100%;
}

.mission-block:hover {
    transform: translateX(4px);
    box-shadow: 0 8px 20px var(--shadow);
}

.mission-block h4 {
    font-weight: 700;
}

/* VALUE CARDS */
.value-card {
    background: var(--card-bg);
    border-radius: 20px;
    padding: 1.5rem;
    border: 1px solid #d4e4c9;
    text-align: center;
    height: 100%;
    transition: 0.3s;
    box-shadow: 0 4px 12px var(--shadow);
}

.value-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px var(--shadow);
    border-color: var(--gold);
}

.value-card i {
    font-size: 2rem;
    color: var(--gold);
    background: #f9b81b20;
    padding: 0.6rem;
    border-radius: 14px;
    margin-bottom: 0.8rem;
    display: inline-block;
}

.value-card h5 {
    font-weight: 600;
}

.value-card p {
    font-size: 0.93rem;
    color: #5a7a5a;
    margin: 0;
}

/* TEAM CARDS */
.team-card {
    background: var(--card-bg);
    border-radius: 20px;
    padding: 1.5rem;
    border: 1px solid #d4e4c9;
    text-align: center;
    height: 100%;
    transition: 0.3s;
    box-shadow: 0 4px 12px var(--shadow);
}

.team-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px var(--shadow);
    border-color: var(--gold);
}

.team-avatar {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin: 0 auto 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    border: 3px solid var(--gold);
    background: var(--light-green);
}

.team-card h5 {
    font-weight: 700;
    margin-bottom: 0.2rem;
}

.team-card .role {
    color: var(--gold);
    font-size: 0.88rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.team-card p {
    font-size: 0.9rem;
    color: #5a7a5a;
}

/* TIMELINE */
.timeline {
    position: relative;
    padding-left: 2rem;
}

.timeline-line {
    position: absolute;
    left: 14px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #d4e4c9;
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
}

.timeline-dot {
    position: absolute;
    left: -2.35rem;
    top: 0.3rem;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: var(--gold);
    border: 3px solid white;
    box-shadow: 0 0 0 2px var(--gold);
}

.timeline-year {
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--gold);
    background: #f9b81b20;
    padding: 0.2rem 0.7rem;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 0.3rem;
}

.timeline-item h6 {
    font-weight: 700;
    margin-bottom: 0.2rem;
}

.timeline-item p {
    font-size: 0.92rem;
    color: #5a7a5a;
    margin: 0;
}

/* PARTNER LOGOS */
.partner-logo {
    background: white;
    border: 1px solid #d4e4c9;
    border-radius: 16px;
    padding: 1rem 1.5rem;
    text-align: center;
    font-weight: 700;
    font-size: 0.95rem;
    color: var(--dark-green);
    transition: 0.3s;
}

.partner-logo:hover {
    border-color: var(--gold);
    transform: scale(1.04);
}

.partner-logo i {
    display: block;
    font-size: 1.8rem;
    color: var(--gold);
    margin-bottom: 0.4rem;
}

@media (max-width: 576px) {
    .about-hero h1 {
        font-size: 1.8rem;
    }

    .about-hero {
        padding: 2.5rem 1.2rem;
    }
}
</style>


<div class="container py-5">

    <!-- ===== ABOUT HERO ===== -->
    <div class="about-hero">
        <i class="fas fa-tractor" style="font-size:3.5rem; color:var(--gold); margin-bottom:1rem;"></i>
        <h1>Bharat ke Kisaanon ke Liye</h1>
        <p class="mt-3">KishanSewa ek smart agriculture platform hai jo desh ke hardworking kisaanon ko technology, sahi
            jankari aur government schemes se jodta hai — taaki har khet mein khushhali ho.</p>
        <div class="mt-4 d-flex gap-3 justify-content-center flex-wrap">
            <a href="#mission" class="btn btn-gold rounded-pill px-5 py-2"><i class="fas fa-bullseye"></i> Hamara
                Mission</a>
            <a href="#team" class="btn btn-outline-light rounded-pill px-5 py-2"><i class="fas fa-users"></i> Hamari
                Team</a>
        </div>
    </div>

    <!-- ===== STATS ===== -->
    <div class="mb-5">
        <div class="row g-3">
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-number">12L+</div>
                    <div class="stat-label">Registered Farmers</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-number">28</div>
                    <div class="stat-label">States Covered</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Farmer Satisfaction</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-box">
                    <div class="stat-number">40%</div>
                    <div class="stat-label">Avg. Yield Increase</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== MISSION & VISION ===== -->
    <div class="mb-5" id="mission">
        <h2 class="mb-4"><i class="fas fa-bullseye text-gold"></i> Mission & Vision</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="mission-block">
                    <h4><i class="fas fa-rocket text-gold me-2"></i>Hamara Mission</h4>
                    <p class="mt-2">Har ek kisan ko smart technology, real-time data aur expert guidance available
                        karana — chahe wo UP ke gaon mein ho ya Maharashtra ke khet mein. Technology ka faida sabhi tak
                        pahunchana hamara mission hai.</p>
                    <ul class="mt-3 ps-3">
                        <li>AI-powered crop disease detection</li>
                        <li>Real-time mandi price alerts</li>
                        <li>Government scheme guidance in local language</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mission-block" style="border-left-color: #2e7d32;">
                    <h4><i class="fas fa-eye text-gold me-2"></i>Hamara Vision</h4>
                    <p class="mt-2">2030 tak Bharat ke 5 crore kisaanon ko ek digital platform par laana jahan wo apni
                        fasal, khet aur income ko smartly manage kar sakein — aur apne bachon ko ek behtar bhavishya de
                        sakein.</p>
                    <ul class="mt-3 ps-3">
                        <li>Digital-first farming for every household</li>
                        <li>Zero crop loss from preventable causes</li>
                        <li>Fair market access for every farmer</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== CORE VALUES ===== -->
    <div class="mb-5">
        <h2 class="mb-4"><i class="fas fa-heart text-gold"></i> Hamare Core Values</h2>
        <div class="row g-3">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-handshake"></i>
                    <h5>Trust</h5>
                    <p>Kisaan ka bharosa hi hamari asli poonji hai.</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-lightbulb"></i>
                    <h5>Innovation</h5>
                    <p>Har din nayi soch se behtar solutions banana.</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-users"></i>
                    <h5>Community</h5>
                    <p>Milke badhna — koi kisaan akela nahi.</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-leaf"></i>
                    <h5>Sustainability</h5>
                    <p>Dharti ko bachate hue kheti karna.</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-shield-alt"></i>
                    <h5>Integrity</h5>
                    <p>Saaf, seedha aur imaandaar platform.</p>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="value-card">
                    <i class="fas fa-chart-line"></i>
                    <h5>Growth</h5>
                    <p>Har kisaan ki income aur life better ho.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== TEAM ===== -->
    <div class="mb-5" id="team">
        <h2 class="mb-1"><i class="fas fa-users text-gold"></i> Hamari Team</h2>
        <p class="text-muted mb-4">BCA students jo padhai ke saath-saath kisano ke liye ek behtar digital
            platform banane me juti hain.</p>
        <div class="row g-4">
            <div class="col-sm-6 col-lg-3">
                <div class="team-card">
                    <div class="team-avatar">👨‍💼</div>
                    <h5>Ajay Saw</h5>
                    <div class="role">Team Lead & Backend Developer</div>
                    <p> Project ki planning, database design aur PHP/Laravel backend logic ki zimmedari
                        sambhalte hain.</p>
                    <div class="mt-2">
                        <a href="#" class="me-2" style="color:var(--gold);"><i class="fab fa-linkedin"></i></a>
                        <a href="#" style="color:var(--gold);"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="team-card">
                    <div class="team-avatar">👨‍💻</div>
                    <h5>Anuj Prasad</h5>
                    <div class="role">Full Stack Developer</div>
                    <p>Website ka core development, database structuring aur crop data management is
                        dwara handle kiya gaya hai.</p>
                    <div class="mt-2">
                        <a href="#" class="me-2" style="color:var(--gold);"><i class="fab fa-linkedin"></i></a>
                        <a href="#" style="color:var(--gold);"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="team-card">
                    <div class="team-avatar">👩‍🌾</div>
                    <h5>Jyoti Kumari</h5>
                    <div class="role">Content & Research Lead</div>
                    <p> Kisano ki zarooraton ko samajhkar crop data, seasonal jankari aur content
                        research ka kaam karti hain.</p>
                    <div class="mt-2">
                        <a href="#" class="me-2" style="color:var(--gold);"><i class="fab fa-linkedin"></i></a>
                        <a href="#" style="color:var(--gold);"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="team-card">
                    <div class="team-avatar">👩‍💻</div>
                    <h5>Riya Rana</h5>
                    <div class="role">UI/UX & Frontend Developer</div>
                    <p> Website ka design, user interface aur user-friendly experience banane ka kaam
                        inhone kiya hai.</p>
                    <div class="mt-2">
                        <a href="#" class="me-2" style="color:var(--gold);"><i class="fab fa-linkedin"></i></a>
                        <a href="#" style="color:var(--gold);"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== JOURNEY + PARTNERS ===== -->
    <div class="mb-5">
        <div class="row g-4 align-items-start">

            <!-- Timeline -->
            <div class="col-lg-5">
                <h2 class="mb-3"><i class="fas fa-history text-gold"></i> Hamari Journey</h2>
                <p>Ek chhote se sapne se shuru hua safar aaj lakhon kisaanon ki zindagi badal raha hai.</p>
                <div class="timeline mt-4">
                    <div class="timeline-line"></div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span class="timeline-year">2019</span>
                        <h6>Neev rakhi</h6>
                        <p>3 dosto ne ek gaon ke khet mein idea socha — kisan ko technology chahiye.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span class="timeline-year">2020</span>
                        <h6>Beta launch</h6>
                        <p>UP ke 500 kisaanon ke saath pilot shuru hua — crop advisory SMS se.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span class="timeline-year">2021</span>
                        <h6>AI feature aaya</h6>
                        <p>Disease detection model launch — 80% accuracy pehle hi week mein.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span class="timeline-year">2023</span>
                        <h6>National expansion</h6>
                        <p>15 states, 10 lakh registered farmers. Government partnership shuru.</p>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <span class="timeline-year">2026</span>
                        <h6>12L+ farmers strong</h6>
                        <p>28 states, full AI suite, aur har roz 50,000 new queries resolve karta platform.</p>
                    </div>
                </div>
            </div>

            <!-- Partners + CTA -->
            <div class="col-lg-7">
                <h2 class="mb-4"><i class="fas fa-handshake text-gold"></i> Hamare Partners</h2>
                <div class="row g-3">
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-university"></i>Ministry of Agriculture</div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-cloud"></i>ICAR Research</div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-satellite"></i>ISRO AgriBand</div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-landmark"></i>NABARD</div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-store"></i>e-NAM Platform</div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="partner-logo"><i class="fas fa-tractor"></i>IFFCO Kisan</div>
                    </div>
                </div>

                <!-- Contact CTA -->
                <div class="mt-4 p-4 rounded-4 text-white"
                    style="background: linear-gradient(135deg, #1e3a2b, #14301e); border-left: 5px solid var(--gold);">
                    <h5><i class="fas fa-phone-alt text-gold me-2"></i>Hamse Jude</h5>
                    <p class="mb-3" style="opacity: 0.85;">Kisaanon ke liye free helpline — koi bhi sawaal, koi bhi
                        problem.</p>
                    <a href="tel:18001801551" class="btn btn-gold rounded-pill px-4 me-2">
                        <i class="fas fa-phone"></i> 1800-180-1551
                    </a>
                    <a href="mailto:support@kishansewa.com" class="btn btn-outline-light rounded-pill px-4">
                        <i class="fas fa-envelope"></i> Email Us
                    </a>
                </div>
            </div>

        </div>
    </div>

</div><!-- end container -->

@endsection