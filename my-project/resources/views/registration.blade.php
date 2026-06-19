@extends('layouts.app')
@section('content')

    <style>
        .signup-container {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 950px;
            width: 100%;
        }

        /* Left Side Green Banner */
        .signup-sidebar {
            background: linear-gradient(rgba(46, 125, 50, 0.9), rgba(27, 94, 32, 0.95)),
                url('https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=600&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .sidebar-logo i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #A5D6A7;
        }

        .signup-sidebar h2 {
            font-weight: 700;
            font-size: 32px;
            margin-bottom: 15px;
        }

        .signup-sidebar p {
            font-size: 16px;
            opacity: 0.9;
            max-width: 300px;
        }

        /* Right Side Form */
        .signup-form-box {
            padding: 40px 50px;
        }

        .form-title {
            color: #111827;
            font-weight: 700;
            font-size: 26px;
            margin-bottom: 5px;
        }

        .form-subtitle {
            color: #6B7280;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            font-size: 14px;
        }

        .input-group-text {
            background-color: #F9FAFB;
            border-color: #D1D5DB;
            color: #6B7280;
        }

        .form-control,
        .form-select {
            border-color: #D1D5DB;
            padding: 10px 12px;
            font-size: 15px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.15);
        }

        .btn-signup {
            background-color: var(--primary-green);
            color: #ffffff;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            border: none;
            margin-top: 15px;
        }

        .btn-signup:hover {
            background-color: var(--dark-green);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .login-link {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link:hover {
            color: var(--dark-green);
            text-decoration: underline;
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .signup-sidebar {
                padding: 30px 20px;
                min-height: 200px;
            }

            .signup-form-box {
                padding: 30px 20px;
            }
        }
    </style>
    <div class="container d-flex justify-content-center mt-5 mb-5">
        <div class="signup-container row g-0">

            <div class="col-md-5 signup-sidebar">
                <div class="sidebar-logo">
                    <i class="fas fa-seedling"></i>
                </div>
                <h2>KishanSewa</h2>
                <p>Sahi jankari aur aadhunik takneek se judkar apni kheti ko aur munafabakh banayein.</p>
            </div>

            <div class="col-md-7 signup-form-box">
                <h3 class="form-title">Naya Khata Banayein</h3>
                <p class="form-subtitle">KishanSewa par register karne ke liye niche di gayi jankari bharein.</p>

                <form action="#" method="POST">
                    <div class="row g-3">

                        <div class="col-sm-12">
                            <label class="form-label">Poora Naam (Full Name)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Jaise: Rajesh Kumar" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Mobile Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" placeholder="10-digit number" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Rajya (State)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <select class="form-select" required>
                                    <option value="" selected disabled>Select State</option>
                                    <option value="JH">Jharkhand</option>
                                    <option value="BR">Bihar</option>
                                    <option value="UP">Uttar Pradesh</option>
                                    <option value="PB">Punjab</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Create password" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                                <input type="password" class="form-control" placeholder="Repeat password" required>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label text-muted small" for="terms">
                                    Main KishanSewa ke niyam aur sharton (Terms & Conditions) ko sweekar karta hoon.
                                </label>
                            </div>
                        </div>

                        <div class="col-12 d-grid">
                            <button type="submit" class="btn btn-signup">Account Banayein (Sign Up)</button>
                        </div>

                        <div class="col-12 text-center mt-3">
                            <p class="text-muted small mb-0">Pehle se account hai? <a href="/login"
                                    class="login-link">Login</a></p>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection