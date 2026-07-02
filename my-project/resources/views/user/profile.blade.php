@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Sidebar -->
            <div class="card shadow-sm" style="border-radius: 12px;">
                <div class="card-body text-center">
                    <div class="profile-avatar mb-3">
                        <i class="fas fa-user-circle" style="font-size: 80px; color: #1e3a2b;"></i>
                    </div>
                    <h5 class="card-title">{{ Auth::user()->name }}</h5>
                    <p class="text-muted mb-3">
                        <small>
                            @if(Auth::user()->cat)
                                <span class="badge bg-success">{{ ucfirst(Auth::user()->cat) }}</span>
                            @else
                                <span class="badge bg-secondary">No Category</span>
                            @endif
                        </small>
                    </p>
                    <hr>
                    <p class="text-muted small">
                        <i class="fas fa-envelope"></i> {{ Auth::user()->email }}<br>
                        <i class="fas fa-phone"></i> {{ Auth::user()->mobile ?? 'N/A' }}
                    </p>
                    <form action="{{ route('logout') }}" method="GET" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <!-- Profile Content -->
            <div class="card shadow-sm mb-4" style="border-radius: 12px;">
                <div class="card-header bg-success text-white" style="border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0"><i class="fas fa-user"></i> My Profile</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email Address</label>
                            <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Mobile Number</label>
                            <p class="form-control-plaintext">{{ Auth::user()->mobile ?? 'Not provided' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Category</label>
                            <p class="form-control-plaintext">
                                @if(Auth::user()->cat)
                                    <span class="badge bg-success">{{ ucfirst(Auth::user()->cat) }}</span>
                                @else
                                    <span class="text-muted">Not specified</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Member Since</label>
                            <p class="form-control-plaintext">{{ Auth::user()->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>

                    <hr>
                    <a href="{{ route('user.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border-radius: 12px;">
                        <div class="card-body text-center">
                            <i class="fas fa-leaf" style="font-size: 40px; color: #1e3a2b;"></i>
                            <h5 class="mt-3">Browse Crops</h5>
                            <p class="text-muted small">Explore available crops and products</p>
                            <a href="/crop" class="btn btn-success btn-sm">
                                View Crops <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm" style="border-radius: 12px;">
                        <div class="card-body text-center">
                            <i class="fas fa-info-circle" style="font-size: 40px; color: #1e3a2b;"></i>
                            <h5 class="mt-3">Need Help?</h5>
                            <p class="text-muted small">Contact our support team</p>
                            <a href="/contact" class="btn btn-success btn-sm">
                                Contact Us <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        transition: all 0.3s;
    }

    .card:hover {
        box-shadow: 0 8px 20px rgba(30, 58, 43, 0.15) !important;
    }

    .btn-success {
        background-color: #1e3a2b;
        border-color: #1e3a2b;
        transition: all 0.3s;
    }

    .btn-success:hover {
        background-color: #f9b81b;
        border-color: #f9b81b;
        color: #1e3a2b;
    }

    .profile-avatar {
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
</style>
@endsection
