@extends('layouts.app')

@section('title', 'Daftar - RentLy')

@section('content')
<section class="auth-section">
    <div class="container">
        <div class="auth-container">
            <div class="auth-illustration">
                <svg viewBox="0 0 400 300" fill="none">
                    <rect width="400" height="300" fill="url(#gradient2)"/>
                    <circle cx="200" cy="150" r="80" fill="white" opacity="0.1"/>
                    <circle cx="200" cy="150" r="60" fill="white" opacity="0.15"/>
                    <path d="M200 110 L240 150 L200 190 L160 150 Z" fill="white"/>
                    <defs>
                        <linearGradient id="gradient2" x1="0" y1="0" x2="400" y2="300">
                            <stop offset="0%" stop-color="#f093fb"/>
                            <stop offset="100%" stop-color="#f5576c"/>
                        </linearGradient>
                    </defs>
                </svg>
                <div class="illustration-content">
                    <h2>Bergabung dengan RentLy</h2>
                    <p>Daftar sekarang dan nikmati kemudahan rental kendaraan dengan harga terbaik</p>
                </div>
            </div>

            <div class="auth-form-wrapper">
                <div class="auth-form">
                    <h1>Daftar</h1>
                    <p class="auth-subtitle">Buat akun baru untuk mulai menyewa</p>

                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Lengkap <span class="required">*</span></label>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('name') }}"
                                   required 
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">No. Telepon</label>
                            <input type="text" 
                                   id="phone" 
                                   name="phone" 
                                   class="form-control @error('phone') is-invalid @enderror" 
                                   placeholder="08xx-xxxx-xxxx"
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea id="address" 
                                      name="address" 
                                      class="form-control @error('address') is-invalid @enderror" 
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span class="required">*</span></label>
                            <input type="password" 
                                   id="password" 
                                   name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Minimal 8 karakter"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password <span class="required">*</span></label>
                            <input type="password" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="Ulangi password"
                                   required>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" required>
                                <span>Saya menyetujui <a href="#" target="_blank">syarat dan ketentuan</a> yang berlaku</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                            </svg>
                            Daftar
                        </button>
                    </form>

                    <div class="auth-footer">
                        <p>Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection