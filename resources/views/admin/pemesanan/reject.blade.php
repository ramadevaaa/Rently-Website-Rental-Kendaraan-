@extends('layouts.admin')
@section('title', 'Tolak Pemesanan - Admin')

@section('content')
<section class="vehicle-detail">
  <div class="container">
    <div class="breadcrumb">
      <a href="{{ route('admin.dashboard') }}">Dashboard</a> /
      <a href="{{ route('admin.pemesanan.index') }}">Pemesanan</a> /
      <a href="{{ route('admin.pemesanan.show', $pemesanan->id) }}">Detail</a> /
      <span>Tolak</span>
    </div>

    <div style="max-width:720px; margin:0 auto; background:var(--light); padding:24px; border-radius:12px;">
      <h2 style="margin-bottom:8px;">Tolak Pemesanan #{{ $pemesanan->id }}</h2>
      <p style="color:var(--text-light); margin-bottom:16px;">
        Kendaraan: <strong>{{ $pemesanan->kendaraan->nama ?? '-' }}</strong> — Pemesan: <strong>{{ $pemesanan->user->name ?? '-' }}</strong>
      </p>

      @if($errors->any())
        <div style="background:#ffecec; border:1px solid #ffb3b3; padding:12px; border-radius:8px; margin-bottom:16px;">
          <strong>Gagal:</strong> {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.pemesanan.reject', $pemesanan->id) }}">
        @csrf

        <label style="display:block; font-weight:600; margin-bottom:8px;">
          Alasan Penolakan
        </label>
        <textarea name="rejection_reason" rows="5"
          style="width:100%; padding:12px; border-radius:8px; border:1px solid var(--border);"
          placeholder="Contoh: Jadwal kendaraan bentrok dengan pemesanan lain / data pemesan belum lengkap / verifikasi belum terpenuhi"
          required>{{ old('rejection_reason') }}</textarea>

        <div style="display:flex; gap:12px; margin-top:16px;">
          <button type="submit" class="btn btn-danger" style="flex:1;">
            Konfirmasi Tolak
          </button>
          <a href="{{ route('admin.pemesanan.show', $pemesanan->id) }}" class="btn btn-outline" style="flex:1;">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
