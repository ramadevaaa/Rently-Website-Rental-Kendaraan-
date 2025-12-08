@extends('layouts.app')

@section('title', 'Login - RentLy')

@section('content')
<section class="auth-section">
    <div class="container">
        <div class="auth-container">
            <div class="auth-illustration">
                <svg viewBox="0 0 400 300" fill="none">
                    <rect width="400" height="300" fill="url(#gradient1)"/>
                    <circle cx="200" cy="150" r="80" fill="white" opacity="0.1"/>
                    <circle cx="200" cy="150" r="60" fill="white" opacity="0.15"/>
                    <path d="M200 110 L240 150 L200 190 L160 150 Z" fill="white"/>
                    <defs>
                        <linearGradient id="gradient1" x1="0" y1="0" x2="400" y2="300">
                            <stop offset="0%" stop-color="#667eea"/>
                            <stop offset="100%" stop-color="#764ba2"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="illustration-content">
                    <h2>Selamat Datang di RentLy</h2>
                    <p>Platform rental kendaraan terpercaya dengan pilihan lengkap dan harga terjangkau</p>
                </div>
            </div>

            <div class="auth-form-wrapper">
                <div class="auth-form">
                    <h1>Login</h1>
                    <p class="auth-subtitle">Masuk ke akun Anda untuk melanjutkan</p>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Masukkan password"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Ingat saya</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Login
                        </button>
                    </form>

                    <div class="auth-footer">
                        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection