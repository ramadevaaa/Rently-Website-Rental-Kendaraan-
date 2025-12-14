@extends('layouts.reset')


@section('content')
<link rel="stylesheet" href="/css/password-reset.css">

<div class="password-wrapper">
    <div class="password-container">
        <div class="password-header">
            <h2>Reset Kata Sandi</h2>
            <p>Buat kata sandi baru untuk akun Anda</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="password-form">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    value="{{ old('email', $email) }}"
                    placeholder="Masukkan email Anda"
                    required
                    readonly>
            </div>

            <div class="form-group">
                <label for="password">Password Baru</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    placeholder="Minimal 8 karakter"
                    required
                    autofocus>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation"
                    name="password_confirmation" 
                    placeholder="Ketik ulang password baru"
                    required>
            </div>

            <button type="submit" class="btn-submit">
                Reset Password
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Kembali ke Login</a>
        </div>
    </div>
</div>
@endsection