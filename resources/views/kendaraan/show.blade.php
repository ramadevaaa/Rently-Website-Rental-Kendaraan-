@extends('layouts.app')

@section('title', $kendaraan->nama . ' - RentLy')

@section('content')
<section class="vehicle-detail">
    <div class="container">
        <div class="detail-grid">
            <!-- Image Section -->
            <div class="detail-image">
                <div class="image-wrapper">
                    <img src="{{ $kendaraan->foto_url }}" alt="{{ $kendaraan->nama }}">
                    @if($kendaraan->is_trusted)
                        <span class="badge badge-trusted badge-lg">✓ Terpercaya</span>
                    @endif
                </div>
            </div>

            <!-- Info Section -->
            <div class="detail-info">
                <div class="breadcrumb">
                    <a href="{{ route('landing') }}">Beranda</a> / 
                    <a href="{{ route('kendaraan.index') }}">Kendaraan</a> / 
                    <span>{{ $kendaraan->nama }}</span>
                </div>

                <span class="vehicle-category">{{ ucfirst($kendaraan->kategori) }}</span>
                <h1 class="detail-title">{{ $kendaraan->nama }}</h1>
                
                <div class="detail-meta">
                    <span class="meta-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                        {{ $kendaraan->merk }}
                    </span>
                    <span class="meta-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Tahun {{ $kendaraan->tahun }}
                    </span>
                    <span class="meta-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"/>
                        </svg>
                        {{ ucfirst($kendaraan->warna) }}
                    </span>
                    <span class="meta-item">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                        {{ $kendaraan->plat_nomor }}
                    </span>
                </div>

                <div class="status-badge status-{{ $kendaraan->status }}">
                    @if($kendaraan->status == 'tersedia')
                        ✓ Tersedia
                    @elseif($kendaraan->status == 'disewa')
                        ⏳ Sedang Disewa
                    @else
                        🔧 Maintenance
                    @endif
                </div>

                <div class="price-section">
                    <div class="price-label">Harga Sewa</div>
                    <div class="price-value">
                        <span class="price">Rp {{ number_format($kendaraan->harga_per_hari, 0, ',', '.') }}</span>
                        <span class="period">/hari</span>
                    </div>
                </div>

                @if($kendaraan->deskripsi)
                    <div class="description">
                        <h3>Deskripsi</h3>
                        <p>{{ $kendaraan->deskripsi }}</p>
                    </div>
                @endif

                <div class="action-buttons">
                    @auth
                        @if($kendaraan->status == 'tersedia')
                            <a href="{{ route('pemesanan.create', $kendaraan->id) }}" class="btn btn-primary btn-lg btn-block">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                Pesan Sekarang
                            </a>
                        @else
                            <button class="btn btn-secondary btn-lg btn-block" disabled>Tidak Tersedia</button>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-block">Login untuk Memesan</a>
                    @endauth

                    <a href="{{ route('kendaraan.index') }}" class="btn btn-outline btn-lg btn-block">Kembali</a>
                </div>
            </div>
        </div>

        <!-- Recommendations -->
        @if($rekomendasi->count() > 0)
            <div class="recommendations">
                <h2>Kendaraan Serupa</h2>
                <div class="vehicle-grid">
                    @foreach($rekomendasi as $item)
                        <div class="vehicle-card">
                            @if($item->is_trusted)
                                <span class="badge badge-trusted">✓ Terpercaya</span>
                            @endif
                            
                            <div class="vehicle-image">
                                <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}">
                            </div>

                            <div class="vehicle-info">
                                <span class="vehicle-category">{{ ucfirst($item->kategori) }}</span>
                                <h3 class="vehicle-name">{{ $item->nama }}</h3>
                                <p class="vehicle-meta">{{ $item->merk }} • {{ $item->tahun }}</p>
                                
                                <div class="vehicle-footer">
                                    <div class="vehicle-price">
                                        <span class="price">Rp {{ number_format($item->harga_per_hari, 0, ',', '.') }}</span>
                                        <span class="period">/hari</span>
                                    </div>
                                    <a href="{{ route('kendaraan.show', $item->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>
@endsection