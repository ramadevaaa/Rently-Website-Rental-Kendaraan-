@extends('layouts.auth')

@section('title', 'Login Admin - RentLy')

@section('content')
<section class="login-wrapper">
    <div class="login-container">

        {{-- LEFT SIDE --}}
        <div class="login-left"></div>

        {{-- RIGHT SIDE --}}
        <div class="login-right">
            <div class="login-box">

                <div class="login-logo">
                    <img src="{{ asset('images/logorently.png') }}" class="logo-image">
                </div>

                <h1>Login Admin</h1>
                <p style="font-size:14px; color:#6b7280; margin-bottom:24px;">
                    Masuk sebagai administrator
                </p>

                {{-- ERROR --}}
                @if ($errors->any())
                    <div style="color:#b42318; font-size:13px; margin-bottom:12px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="input-group">
                        <input type="email"
                               name="email"
                               placeholder="Email Admin"
                               required>
                    </div>

                    <div class="input-group">
                        <input type="password"
                               name="password"
                               placeholder="Password"
                               required>
                    </div>

                    <button type="submit" class="btn-login">
                        Login Admin
                    </button>
                </form>

                <div class="login-links">
                    <a href="{{ route('login') }}">Login sebagai User</a>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection
