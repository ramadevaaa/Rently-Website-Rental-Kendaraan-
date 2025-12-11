@extends('layouts.admin')
@section('title', 'Kelola Kendaraan - Admin')
@section('content')
<section class="dashboard">
    <div class="container">
        
      <div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center;">

    <div style="display: flex; align-items: center; gap: 12px;">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline">
            ← Kembali
        </a>
        <h1 style="margin: 0;">Kelola Kendaraan</h1>
    </div>

    <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary">+ Tambah Kendaraan</a>
</div>

        <div class="filter-section">
            <form action="{{ route('admin.kendaraan.index') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="form-control">
                </div>
                <div class="filter-group">
                    <select name="kategori" class="form-control">
                        <option value="">Semua Kategori</option>
                        <option value="mobil" {{ request('kategori')=='mobil'?'selected':'' }}>Mobil</option>
                        <option value="motor" {{ request('kategori')=='motor'?'selected':'' }}>Motor</option>
                        <option value="pickup" {{ request('kategori')=='pickup'?'selected':'' }}>Pickup</option>
                        <option value="van" {{ request('kategori')=='van'?'selected':'' }}>Van</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ request('status')=='tersedia'?'selected':'' }}>Tersedia</option>
                        <option value="disewa" {{ request('status')=='disewa'?'selected':'' }}>Disewa</option>
                        <option value="maintenance" {{ request('status')=='maintenance'?'selected':'' }}>Maintenance</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
                @if(request()->hasAny(['search','kategori','status']))
                <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-outline">Reset</a>
                @endif
            </form>
        </div>

        <div style="overflow-x: auto; background: #fff; border-radius: 12px; box-shadow: var(--shadow);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--light);">
                    <tr>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Foto</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Nama</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Kategori</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Plat</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Harga/Hari</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Status</th>
                        <th style="padding: 16px; text-align: left; font-weight: 600;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kendaraans as $k)
                    <tr style="border-bottom: 1px solid var(--border);">
                        <td style="padding: 12px;">
                            <img src="{{ $k->foto_url }}" alt="{{ $k->nama }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td style="padding: 12px;">
                            <strong>{{ $k->nama }}</strong><br>
                            <small style="color: var(--text-light);">{{ $k->merk }} - {{ $k->tahun }}</small>
                        </td>
                        <td style="padding: 12px;">{{ ucfirst($k->kategori) }}</td>
                        <td style="padding: 12px;">{{ $k->plat_nomor }}</td>
                        <td style="padding: 12px; font-weight: 600; color: var(--primary);">Rp {{ number_format($k->harga_per_hari, 0, ',', '.') }}</td>
                        <td style="padding: 12px;">
                            <span class="status-badge status-{{ $k->status }}">{{ ucfirst($k->status) }}</span>
                        </td>
                        <td style="padding: 12px;">
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.kendaraan.edit', $k->id) }}" class="btn btn-sm btn-outline">Edit</a>
                                <form action="{{ route('admin.kendaraan.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="padding: 40px; text-align: center; color: var(--text-light);">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($kendaraans->hasPages())
        <div class="pagination-wrapper">{{ $kendaraans->links() }}</div>
        @endif
    </div>
</section>
@endsection