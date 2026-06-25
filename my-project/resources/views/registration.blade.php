@extends('layouts.app')
@section('content')
    @yield('content')



    <!DOCTYPE html>
    <html lang="hi">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>KishanSewa · Login / Register</title>

        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

        <style>
            /* ===== ROOT VARIABLES ===== */
            :root {
                --gold: #f9b81b;
                --dark-green: #1e3a2b;
                --light-green: #e6f0da;
                --text-color: #1e2f1e;
                --bg-color: #f5f9f0;
                --card-bg: #ffffffdd;
                --shadow: rgba(0, 30, 10, 0.08);
                --nav-bg: #1e3a2b;
            }

            * {
                transition: background-color 0.3s, color 0.2s, transform 0.2s;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* ===== DARK MODE ===== */
            body.dark-mode {
                --bg-color: #121f18 !important;
                --text-color: #e6f0da !important;
                --card-bg: #1e2f26dd !important;
                --nav-bg: #0d1f14 !important;
                --shadow: rgba(0, 0, 0, 0.4) !important;
            }

            body.dark-mode .bg-light {
                background-color: #1a2f1e !important;
            }

            body.dark-mode .card {
                background-color: var(--card-bg) !important;
                color: var(--text-color) !important;
            }

            body.dark-mode .card .text-muted {
                color: #bdd3ae !important;
            }

            body.dark-mode .bg-white {
                background-color: var(--card-bg) !important;
            }

            body.dark-mode .text-dark {
                color: var(--text-color) !important;
            }

            body.dark-mode .border {
                border-color: #2a4d3a !important;
            }

            body.dark-mode .modal-content {
                background-color: var(--card-bg) !important;
                color: var(--text-color) !important;
            }

            body.dark-mode .form-control {
                background-color: #2a4d3a;
                color: var(--text-color);
                border-color: #3a5d4a;
            }

            body.dark-mode .form-control::placeholder {
                color: #bdd3ae;
            }

            body.dark-mode .navbar {
                background-color: var(--nav-bg) !important;
            }

            body.dark-mode .nav-tabs .nav-link {
                color: #bdd3ae;
            }

            body.dark-mode .nav-tabs .nav-link.active {
                background-color: transparent;
                color: var(--gold);
                border-color: #2a4d3a;
            }

            body.dark-mode .login-wrapper {
                background-color: var(--bg-color);
            }

            body {
                background: var(--bg-color);
                color: var(--text-color);
                font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
                min-height: 100vh;
            }

            /* ===== NAVBAR ===== */
            .navbar {
                background-color: var(--nav-bg);
                border-bottom: 3px solid var(--gold);
                padding: 0.6rem 0;
            }

            .navbar-brand {
                color: #f9e7b3 !important;
                font-size: 1.9rem;
                font-weight: 600;
            }

            .navbar-brand span {
                color: var(--gold);
                font-size: 0.9rem;
                background: #2a4d3a;
                padding: 0.2rem 0.8rem;
                border-radius: 30px;
                margin-left: 6px;
            }

            .btn-gold {
                background-color: var(--gold);
                color: #1e2f1e;
                font-weight: 600;
                border: none;
                transition: 0.3s;
            }

            .btn-gold:hover {
                background-color: #fcc94b;
                color: #1e2f1e;
                transform: scale(1.03);
                box-shadow: 0 4px 15px rgba(249, 184, 27, 0.4);
            }

            .btn-outline-light:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            /* ===== LOGIN WRAPPER ===== */
            .login-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: calc(100vh - 76px);
                padding: 2rem 1.5rem;
                background: var(--bg-color);
            }

            .login-card {
                background: var(--card-bg);
                border-radius: 30px;
                padding: 2.5rem 2.5rem 2rem;
                max-width: 480px;
                width: 100%;
                box-shadow: 0 20px 60px var(--shadow);
                border: 1px solid #d4e4c9;
                backdrop-filter: blur(10px);
            }

            .login-card .logo-icon {
                text-align: center;
                margin-bottom: 1.5rem;
            }

            .login-card .logo-icon i {
                font-size: 3.5rem;
                color: var(--gold);
                background: #f9b81b20;
                padding: 1rem;
                border-radius: 50%;
            }

            .login-card h2 {
                font-weight: 700;
                color: var(--dark-green);
                text-align: center;
                margin-bottom: 0.3rem;
            }

            body.dark-mode .login-card h2 {
                color: var(--gold);
            }

            .login-card .subtitle {
                text-align: center;
                color: #5a7a5a;
                margin-bottom: 1.5rem;
                font-size: 0.95rem;
            }

            body.dark-mode .login-card .subtitle {
                color: #bdd3ae;
            }

            /* ===== TABS ===== */
            .login-card .nav-tabs {
                border-bottom: 2px solid #d4e4c9;
                margin-bottom: 1.5rem;
            }

            .login-card .nav-tabs .nav-link {
                color: var(--text-color);
                border: none;
                border-bottom: 3px solid transparent;
                font-weight: 600;
                padding: 0.6rem 1.5rem;
                background: transparent;
                font-size: 1rem;
            }

            .login-card .nav-tabs .nav-link.active {
                color: var(--gold);
                background: transparent;
                border-bottom: 3px solid var(--gold);
            }

            .login-card .nav-tabs .nav-link:hover {
                border-bottom: 3px solid var(--gold);
                color: var(--gold);
            }

            /* ===== FORM ===== */
            .login-card .form-control {
                border-radius: 30px;
                padding: 0.7rem 1.2rem;
                border: 1px solid #d4e4c9;
                background: var(--bg-color);
                color: var(--text-color);
            }

            .login-card .form-control:focus {
                border-color: var(--gold);
                box-shadow: 0 0 0 3px rgba(249, 184, 27, 0.2);
            }

            .login-card .form-label {
                font-weight: 500;
                font-size: 0.9rem;
            }

            .login-card .form-check-label {
                font-size: 0.85rem;
            }

            .login-card .btn-gold {
                padding: 0.7rem;
                font-size: 1rem;
            }

            .login-card .back-link {
                display: inline-block;
                margin-top: 1rem;
                color: var(--gold);
                text-decoration: none;
                font-weight: 500;
            }

            .login-card .back-link:hover {
                text-decoration: underline;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 576px) {
                .login-card {
                    padding: 1.8rem 1.2rem;
                }

                .login-card .logo-icon i {
                    font-size: 2.8rem;
                    padding: 0.8rem;
                }

                .login-card h2 {
                    font-size: 1.5rem;
                }

                .login-wrapper {
                    padding: 1rem;
                }
            }
        </style>
    </head>

    <body>

        <!-- ===== NAVBAR ===== -->
        <!-- ===== LOGIN / REGISTER FORM ===== -->
        <div class="login-wrapper">
            <div class="login-card">

                <!-- Logo Icon -->
                <div class="logo-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <h2>Farmer Account</h2>
                <p class="subtitle">Login ya Register karein aur smart farming shuru karein</p>
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Error Message -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Tabs -->
                <ul class="nav nav-tabs justify-content-center" id="authTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane"
                            type="button" role="tab">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane"
                            type="button" role="tab">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                    </li>
                </ul>

                <div class="tab-content mt-3">

                    <!-- ===== LOGIN PANE ===== -->
                    <div class="tab-pane fade show active" id="login-pane" role="tabpanel">
                        <form action="{{ route('post.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Number</label>
                                <input type="email" class="form-control" placeholder="Enter email"
                                    name="email" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter your password"
                                    name="password" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" />
                                    <label class="form-check-label" for="rememberMe">Remember me</label>
                                </div>
                                <a href="#" class="text-gold text-decoration-none small">Forgot password?</a>
                            </div>
                            <button type="submit" class="btn btn-gold rounded-pill w-100 py-2">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                            <p class="text-center text-muted small mt-3">
                                New user? <a href="#" class="text-gold" onclick="switchTab('register-tab')">Register
                                    here</a>
                            </p>
                        </form>
                    </div>

                    <!-- ===== REGISTER PANE ===== -->
                    <div class="tab-pane fade" id="register-pane" role="tabpanel">
                        <form action="{{ route('post.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your full name" name="name" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control" placeholder="Enter 10-digit mobile number"
                                    name="mobile" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email (Optional)</label>
                                <input type="email" class="form-control" placeholder="Enter your email address"
                                    name="email" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Create password (min 6 chars)"
                                    name="password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Re-enter password"
                                    name="confirm" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">I am a</label>
                                <select class="form-select rounded-pill" name="cat">
                                    <option value="farmer">Farmer</option>
                                    <option value="expert">Agriculture Expert</option>
                                    <option value="dealer">Seed / Dealer</option>
                                </select>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" />
                                <label class="form-check-label small" for="terms">
                                    I agree to the <a href="#" class="text-gold">Terms &amp; Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-gold rounded-pill w-100 py-2">
                                <i class="fas fa-user-plus"></i> Register
                            </button>
                            <p class="text-center text-muted small mt-3">
                                Already have an account? <a href="#" class="text-gold"
                                    onclick="switchTab('login-tab')">Login here</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Back Link -->
                <div class="text-center mt-3">
                    <a href="index.html" class="back-link">
                        <i class="fas fa-arrow-left"></i> Back to KishanSewa
                    </a>
                </div>
            </div>
        </div>

        <!-- ===== BOOTSTRAP JS ===== -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // ===== DARK MODE TOGGLE =====
            function toggleDark() {
                document.body.classList.toggle('dark-mode');
                const btn = document.querySelector('.btn-outline-light');
                if (btn) {
                    btn.innerHTML = document.body.classList.contains('dark-mode') ?
                        '<i class="fas fa-sun"></i>' :
                        '<i class="fas fa-moon"></i>';
                }
            }

            // ===== SWITCH TAB HELPER =====
            function switchTab(tabId) {
                const tab = document.getElementById(tabId);
                if (tab) {
                    const trigger = new bootstrap.Tab(tab);
                    trigger.show();
                }
            }

            // ===== CHECK DARK MODE PREFERENCE =====
            if (localStorage.getItem('darkMode') === 'enabled') {
                document.body.classList.add('dark-mode');
                const btn = document.querySelector('.btn-outline-light');
                if (btn) btn.innerHTML = '<i class="fas fa-sun"></i>';
            }

            // ===== SAVE DARK MODE PREFERENCE =====
            document.addEventListener('DOMContentLoaded', function () {
                const darkBtn = document.querySelector('.btn-outline-light');
                if (darkBtn) {
                    darkBtn.addEventListener('click', function () {
                        if (document.body.classList.contains('dark-mode')) {
                            localStorage.setItem('darkMode', 'enabled');
                        } else {
                            localStorage.setItem('darkMode', 'disabled');
                        }
                    });
                }
            });
        </script>

    </body>

    </html>

@endsection