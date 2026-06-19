@extends('layouts.app')
@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                
                <div class="card shadow-sm border-0 px-4 py-3">
                    <div class="card-body">
                        
                        <div class="text-center mb-4">
                            <h2 class="fw-bold mb-1">Welcome Back</h2>
                            <p class="text-muted small">Please enter your details to sign in</p>
                        </div>
 
                        <form autocomplete="off">
                            
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
                                <label for="floatingInput">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="password"class="form-control" id="floatingPassword" placeholder="Password" required>
                                <label for="floatingPassword">Password</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                    <label class="form-check-label small" for="rememberMe">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small">Forgot password?</a>
                            </div>

                            <button class="btn btn-primary w-100 py-2 fw-semibold mb-3" type="submit">Sign in</button>

                            <div class="text-center">
                                <p class="small mb-0 text-muted">Don't have an account? <a href="/registration" class="text-decoration-none">Sign up</a></p>
                            </div>
                            
                        </form>

                    </div>
                </div>
                </div>
        </div>
    </div>


@endsection