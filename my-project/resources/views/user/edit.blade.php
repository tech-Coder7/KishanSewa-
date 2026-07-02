@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 12px;">
                <div class="card-header bg-success text-white" style="border-radius: 12px 12px 0 0;">
                    <h5 class="mb-0"><i class="fas fa-edit"></i> Edit Profile</h5>
                </div>
                <div class="card-body p-5">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Errors:</strong>
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                            <small class="text-muted">Email cannot be changed</small>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label fw-bold">Mobile Number</label>
                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile', Auth::user()->mobile) }}" required>
                            @error('mobile')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="cat" class="form-label fw-bold">Category</label>
                            <select class="form-select @error('cat') is-invalid @enderror" id="cat" name="cat">
                                <option value="">Select Category</option>
                                <option value="farmer" @if(Auth::user()->cat == 'farmer') selected @endif>Farmer</option>
                                <option value="buyer" @if(Auth::user()->cat == 'buyer') selected @endif>Buyer</option>
                                <option value="supplier" @if(Auth::user()->cat == 'supplier') selected @endif>Supplier</option>
                                <option value="consultant" @if(Auth::user()->cat == 'consultant') selected @endif>Consultant</option>
                            </select>
                            @error('cat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                            <a href="/user/profile" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
    }

    .form-control, .form-select {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px;
        transition: all 0.3s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #1e3a2b;
        box-shadow: 0 0 0 0.2rem rgba(30, 58, 43, 0.1);
    }

    .btn-success {
        background-color: #1e3a2b;
        border-color: #1e3a2b;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s;
    }

    .btn-success:hover {
        background-color: #f9b81b;
        border-color: #f9b81b;
        color: #1e3a2b;
    }
</style>
@endsection
