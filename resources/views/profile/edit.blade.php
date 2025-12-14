@extends('layouts.profile')

@section('title', 'Edit Profil')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endpush

@section('content')
<div class="container">

    <div class="header-flex">
        <h1>Edit Profil</h1>
        <a href="{{ route('profile.show') }}" class="btn btn-outline">
            Batal
        </a>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="address" value="{{ old('address', $user->address) }}">
            </div>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>

    </form>

</div>
@endsection
