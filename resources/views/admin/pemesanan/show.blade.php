@extends('layouts.admin')
@section('title', 'Detail Pemesanan - Admin')
@section('content')
<section class="vehicle-detail">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a> / 
            <a href="{{ route('admin.pemesanan.index') }}">Pemesanan</a> / 
            <span>Detail</span>
        </div>

        <div class="detail-grid">
            <!-- Kendaraan Info -->
            <div>
                <div class="image-wrapper">
                    <img src="{{ $pemesanan->kendaraan->foto_url }}" alt="{{ $pemesanan->kendaraan->nama }}">
                </div>
                <div style="margin-top: 24px; background: var(--light); padding: 24px; border-radius: 12px;">
                    <h3 style="font-size: 20px; margin-bottom: 16px;">Info Kendaraan</h3>
                    <table style="width: 100%;">
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Nama</td><td style="font-weight: 600;">{{ $pemesanan->kendaraan->nama }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Kategori</td><td>{{ ucfirst($pemesanan->kendaraan->kategori) }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Merk</td><td>{{ $pemesanan->kendaraan->merk }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Plat</td><td>{{ $pemesanan->kendaraan->plat_nomor }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Harga/Hari</td><td style="font-weight: 600; color: var(--primary);">Rp {{ number_format($pemesanan->kendaraan->harga_per_hari, 0, ',', '.') }}</td></tr>
                    </table>
                </div>
            </div>

            <!-- Pemesanan Detail -->
            <div>
                <h1 class="detail-title">Detail Pemesanan #{{ $pemesanan->id }}</h1>
                <span class="status-badge status-{{ $pemesanan->status }}" style="font-size: 14px; padding: 8px 16px;">{{ ucfirst($pemesanan->status) }}</span>

                <div style="margin-top: 24px; background: var(--light); padding: 24px; border-radius: 12px;">
                    <h3 style="font-size: 18px; margin-bottom: 16px;">Info Pemesan</h3>
                    <table style="width: 100%;">
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Nama</td><td style="font-weight: 600;">{{ $pemesanan->user->name }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Email</td><td>{{ $pemesanan->user->email }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Telepon</td><td>{{ $pemesanan->user->phone ?? '-' }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Alamat</td><td>{{ $pemesanan->user->address ?? '-' }}</td></tr>
                    </table>
                </div>

                <div style="margin-top: 24px; background: var(--light); padding: 24px; border-radius: 12px;">
                    <h3 style="font-size: 18px; margin-bottom: 16px;">Detail Sewa</h3>
                    <table style="width: 100%;">
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Tanggal Mulai</td><td style="font-weight: 600;">{{ $pemesanan->tanggal_mulai->format('d F Y') }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Tanggal Selesai</td><td style="font-weight: 600;">{{ $pemesanan->tanggal_selesai->format('d F Y') }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Durasi</td><td>{{ $pemesanan->durasi_hari }} hari</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Total Harga</td><td style="font-weight: 700; font-size: 20px; color: var(--primary);">Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</td></tr>
                        <tr><td style="padding: 8px 0; color: var(--text-light);">Tanggal Pemesanan</td><td>{{ $pemesanan->created_at->format('d F Y H:i') }}</td></tr>
                    </table>
                    @if($pemesanan->catatan)
                    <div style="margin-top: 16px; padding: 12px; background: #fff; border-radius: 8px;">
                        <strong>Catatan:</strong><br>{{ $pemesanan->catatan }}
                    </div>
                    @endif
                </div>

                <!-- Actions -->
                <div style="margin-top: 24px; display: flex; gap: 12px; flex-wrap: wrap;">
                    @if($pemesanan->status == 'pending')
                    <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="btn btn-lg btn-block" style="background: var(--success); color: #fff;">✓ Setujui Pemesanan</button>
                    </form>
                    <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-danger btn-lg btn-block" onclick="return confirm('Yakin tolak pemesanan ini?')">✗ Tolak Pemesanan</button>
                    </form>
                    @elseif($pemesanan->status == 'approved')
                    <form action="{{ route('admin.pemesanan.updateStatus', $pemesanan->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" class="btn btn-lg btn-block" style="background: var(--info); color: #fff;">✓ Tandai Selesai</button>
                    </form>
                    @endif

                    <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-outline btn-lg" style="flex: 1;">Kembali</a>

                    @if(in_array($pemesanan->status, ['rejected', 'cancelled', 'completed']))
                    <form action="{{ route('admin.pemesanan.destroy', $pemesanan->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pemesanan ini?')" style="flex: 1;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-lg btn-block">🗑️ Hapus</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection