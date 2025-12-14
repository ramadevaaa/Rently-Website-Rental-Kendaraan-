@extends('layouts.reset')
@section('content')
<link rel="stylesheet" href="{{ asset('css/password-reset.css') }}">

<div class="password-wrapper">
    <div class="password-container">
        <div class="password-header">
            <h2>Lupa Kata Sandi</h2>
            <p>Masukkan email yang terdaftar untuk menerima link reset password</p>
        </div>

        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first('email') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="password-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    value="{{ old('email') }}"
                    placeholder="Masukkan email Anda"
                    required
                    autofocus>
            </div>

            <button type="submit" class="btn-submit">
                Kirim Link Reset
            </button>
        </form>

        <div class="back-link">
            <a href="{{ route('login') }}">← Kembali ke Login</a>
        </div>
    </div>
</div>
@endsection