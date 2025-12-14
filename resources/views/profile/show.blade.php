@extends('layouts.profile')

@section('title', 'Profil Saya')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endpush

@section('content')

<div class="container">

    <div class="header-flex">
        <h1>Profil Saya</h1>

        <div style="display:flex; gap:10px;">
            <a href="{{ route('dashboard.user') }}" class="btn btn-outline">
                ← Kembali
            </a>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                Edit Profil
            </a>
        </div>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="input-disabled" value="{{ $user->name }}" disabled>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" class="input-disabled" value="{{ $user->email }}" disabled>
        </div>

        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" class="input-disabled" value="{{ $user->phone ?? '-' }}" disabled>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" class="input-disabled" value="{{ $user->address ?? '-' }}" disabled>
        </div>
    </div>

</div>
@endsection
