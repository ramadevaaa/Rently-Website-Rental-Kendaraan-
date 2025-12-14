@extends('layouts.auth')

@section('title', 'Daftar - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

@section('content')
    <div class="register-wrapper">
        <div class="register-container">

            {{-- LEFT SIDE --}}
            <div class="register-left"></div>

            {{-- RIGHT SIDE --}}
            <div class="register-right">
                <div class="register-box">

                    {{-- LOGO --}}
                    <div class="register-logo">
                        <img src="{{ asset('images/logorently.png') }}" alt="RentLy Logo" class="logo-image">
                    </div>

                    <h1>Daftarkan Diri Kamu</h1>
                    <p class="register-subtitle">
                        Buat akun baru untuk mulai menyewa
                    </p>

                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf

                        {{-- NAMA --}}
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}"
                                required>
                        </div>

                        {{-- EMAIL --}}
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}"
                                required>
                        </div>

                        {{-- TELEPON --}}
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Masukkan No Telepon" value="{{ old('phone') }}">
                        </div>

                        {{-- ALAMAT --}}
                        <div class="form-group">
                            <textarea name="address" rows="3" placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="form-group password-group">
                            <input type="password" name="password" id="registerPassword" placeholder="Password" required>

                            <img src="{{ asset('images/close.png') }}" alt="Toggle Password" class="eye"
                                id="toggleRegisterPassword">
                        </div>

                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="form-group password-group">
                            <input type="password" name="password_confirmation" id="registerPasswordConfirm"
                                placeholder="Konfirmasi Password" required>

                            <img src="{{ asset('images/close.png') }}" alt="Toggle Password" class="eye"
                                id="toggleRegisterPasswordConfirm">
                        </div>

                        {{-- BUTTON --}}
                        <button type="submit" class="btn-register">
                            Daftar
                        </button>
                    </form>

                    <div class="register-footer">
                        <p>
                            Sudah punya akun?
                            <a href="{{ route('login') }}">Login sekarang</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {

    function togglePassword(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);

        if (!toggle || !input) return;

        toggle.addEventListener('click', function () {
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';

            toggle.src = isPassword
                ? "{{ asset('images/open.png') }}"
                : "{{ asset('images/close.png') }}";
        });
    }

    togglePassword('toggleRegisterPassword', 'registerPassword');
    togglePassword('toggleRegisterPasswordConfirm', 'registerPasswordConfirm');

});
</script>
