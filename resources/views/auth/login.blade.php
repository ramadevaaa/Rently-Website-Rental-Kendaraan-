@extends('layouts.auth')

@section('title', 'Login - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush


@section('content')
    <section class="login-wrapper">
        <div class="login-container">

            {{-- LEFT SIDE (GRADIENT) --}}
            <div class="login-left"></div>

            {{-- RIGHT SIDE (FORM) --}}
            <div class="login-right">
                <div class="login-box">

                    <div class="login-logo">
                        <img src="{{ asset('images/logorently.png') }}" alt="RentLy Logo" class="logo-image">
                    </div>

                    <h1>Hai, Selamat Datang!</h1>

                    <form action="{{ route('login.user') }}" method="POST">
                        @csrf

                        <div class="input-group">
                            <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"
                                required>
                        </div>

                        <div class="input-group">
                            <input type="password" name="password" id="password" placeholder="Masukkan Kata Sandi">
                            <img src="{{ asset('images/close.png') }}" id="togglePassword" class="eye">
                        </div>

                        <button type="submit" class="btn-login">
                            Masuk
                        </button>

                        <div class="login-links">
                            <a href="{{ route('password.request') }}">Lupa kata sandi?</a>
                        </div>

                        <p class="register-text">
                            Baru di RentLy?
                            <a href="{{ route('register') }}">Daftar disini</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.src = isPassword
                ? "{{ asset('images/open.png') }}"
                : "{{ asset('images/close.png') }}";
        });
    });
</script>