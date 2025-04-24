@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="card shadow-lg p-4 animate__animated animate__fadeIn" style="max-width: 420px; width: 100%; border-radius: 16px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4 text-primary">Welcome Back 👋</h2>
            <p class="text-center text-muted mb-4">Please sign in to your account</p>

            {{-- Display specific error messages --}}
            @if(session('email_error'))
                <div class="alert alert-danger mb-4">{{ session('email_error') }}</div>
            @endif

            @if(session('password_error'))
                <div class="alert alert-danger mb-4">{{ session('password_error') }}</div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control shadow-sm @error('email') is-invalid @enderror" placeholder="you@example.com" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input type="password" id="password" name="password" class="form-control shadow-sm @error('password') is-invalid @enderror" placeholder="••••••••" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </form>

            <div class="mt-4 text-center">
                {{-- <p class="text-muted mb-1">Forgot your password? 
                    <a href="#" class="text-decoration-none fw-semibold text-primary">Reset</a>
                </p> --}}
                <p class="text-muted mb-0">Don't have an account? 
                    <a href="{{ route('register.form') }}" class="text-decoration-none fw-semibold text-primary">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<style>
    body {
        background: linear-gradient(to right, #f8f9fa, #e9ecef);
    }
    .card-title {
        font-size: 1.8rem;
        font-weight: 700;
    }
    .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 12px;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .alert {
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        border-radius: 10px;
    }
</style>
@endsection
