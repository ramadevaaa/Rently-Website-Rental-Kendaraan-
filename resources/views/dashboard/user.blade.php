@extends('layouts.app')

@section('title', 'Dashboard - RentLy')

@section('content')
<section class="dashboard">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <h1>Dashboard</h1>
                <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>
            </div>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z"/>
                </svg>
                Sewa Kendaraan
            </a>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['total_pemesanan'] }}</h3>
                    <p>Total Pemesanan</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['pending'] }}</h3>
                    <p>Menunggu Konfirmasi</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['approved'] }}</h3>
                    <p>Disetujui</p>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['completed'] }}</h3>
                    <p>Selesai</p>
                </div>
            </div>
        </div>

        <!-- Orders List -->
        <div class="orders-section">
            <div class="section-header">
                <h2>Riwayat Pemesanan</h2>
            </div>

            <div class="orders-list">
                @forelse($pemesanans as $pemesanan)
                    <div class="order-card">
                        <div class="order-image">
                            <img src="{{ $pemesanan->kendaraan->foto_url }}" alt="{{ $pemesanan->kendaraan->nama }}">
                        </div>

                        <div class="order-info">
                            <div class="order-header">
                                <h3>{{ $pemesanan->kendaraan->nama }}</h3>
                                <span class="status-badge status-{{ $pemesanan->status }}">
                                    @if($pemesanan->status == 'pending')
                                        ⏳ Menunggu Konfirmasi
                                    @elseif($pemesanan->status == 'approved')
                                        ✓ Disetujui
                                    @elseif($pemesanan->status == 'rejected')
                                        ✗ Ditolak
                                    @elseif($pemesanan->status == 'completed')
                                        ✓ Selesai
                                    @else
                                        ✗ Dibatalkan
                                    @endif
                                </span>
                            </div>

                            <div class="order-details">
                                <div class="detail-item">
                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $pemesanan->tanggal_mulai->format('d M Y') }} - {{ $pemesanan->tanggal_selesai->format('d M Y') }}</span>
                                </div>
                                <div class="detail-item">
                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>{{ $pemesanan->durasi_hari }} hari</span>
                                </div>
                                <div class="detail-item">
                                    <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            @if($pemesanan->catatan)
                                <div class="order-note">
                                    <strong>Catatan:</strong> {{ $pemesanan->catatan }}
                                </div>
                            @endif

                            <div class="order-actions">
                                <span class="order-date">Dipesan: {{ $pemesanan->created_at->format('d M Y H:i') }}</span>
                                @if($pemesanan->status == 'pending')
                                    <form action="{{ route('pemesanan.cancel', $pemesanan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Batalkan</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2"/>
                            <line x1="9" y1="9" x2="15" y2="15" stroke-width="2"/>
                            <line x1="15" y1="9" x2="9" y2="15" stroke-width="2"/>
                        </svg>
                        <h3>Belum Ada Pemesanan</h3>
                        <p>Anda belum memiliki riwayat pemesanan</p>
                        <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">Mulai Sewa Kendaraan</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($pemesanans->hasPages())
                <div class="pagination-wrapper">
                    {{ $pemesanans->links('pagination::default') }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection