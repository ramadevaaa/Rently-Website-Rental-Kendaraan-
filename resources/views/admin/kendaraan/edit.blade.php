@extends('layouts.app')
@section('title', 'Edit Kendaraan - Admin')
@section('content')
<section class="pemesanan-form">
    <div class="container">
        <div class="form-header">
            <h1>Edit Kendaraan</h1>
            <p>Update data kendaraan {{ $kendaraan->nama }}</p>
        </div>

        <div style="max-width: 800px; margin: 0 auto;">
            <div class="form-content">
                <form action="{{ route('admin.kendaraan.update', $kendaraan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Kendaraan *</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $kendaraan->nama) }}" required>
                            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori *</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" required>
                                <option value="mobil" {{ old('kategori',$kendaraan->kategori)=='mobil'?'selected':'' }}>Mobil</option>
                                <option value="motor" {{ old('kategori',$kendaraan->kategori)=='motor'?'selected':'' }}>Motor</option>
                                <option value="pickup" {{ old('kategori',$kendaraan->kategori)=='pickup'?'selected':'' }}>Pickup</option>
                                <option value="van" {{ old('kategori',$kendaraan->kategori)=='van'?'selected':'' }}>Van</option>
                            </select>
                            @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Merk *</label>
                            <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk', $kendaraan->merk) }}" required>
                            @error('merk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Plat Nomor *</label>
                            <input type="text" name="plat_nomor" class="form-control @error('plat_nomor') is-invalid @enderror" value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}" required>
                            @error('plat_nomor')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Tahun *</label>
                            <input type="number" name="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $kendaraan->tahun) }}" min="1900" max="{{ date('Y')+1 }}" required>
                            @error('tahun')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Warna *</label>
                            <input type="text" name="warna" class="form-control @error('warna') is-invalid @enderror" value="{{ old('warna', $kendaraan->warna) }}" required>
                            @error('warna')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Harga per Hari (Rp) *</label>
                            <input type="number" name="harga_per_hari" class="form-control @error('harga_per_hari') is-invalid @enderror" value="{{ old('harga_per_hari', $kendaraan->harga_per_hari) }}" min="0" required>
                            @error('harga_per_hari')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Status *</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="tersedia" {{ old('status',$kendaraan->status)=='tersedia'?'selected':'' }}>Tersedia</option>
                                <option value="disewa" {{ old('status',$kendaraan->status)=='disewa'?'selected':'' }}>Disewa</option>
                                <option value="maintenance" {{ old('status',$kendaraan->status)=='maintenance'?'selected':'' }}>Maintenance</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi', $kendaraan->deskripsi) }}</textarea>
                        @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Foto Kendaraan</label>
                        @if($kendaraan->foto)
                        <div style="margin-bottom: 12px;">
                            <img src="{{ $kendaraan->foto_url }}" alt="Current" style="max-width: 200px; border-radius: 8px;">
                        </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small style="color: var(--text-light);">Kosongkan jika tidak ingin mengubah foto</small>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="is_trusted" value="1" {{ old('is_trusted',$kendaraan->is_trusted)?'checked':'' }}>
                            <span>Tandai sebagai kendaraan terpercaya</span>
                        </label>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-outline btn-lg">Batal</a>
                        <button type="submit" class="btn btn-primary btn-lg">Update Kendaraan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection