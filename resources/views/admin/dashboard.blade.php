@extends('layouts.admin')

@section('title', 'Admin Dashboard - RentLy')

@section('content')
<section class="dashboard">
    <div class="container">
        <div class="dashboard-header">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>
            </div>
        </div>

        <!-- Statistics Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['total_kendaraan'] }}</h3>
                    <p>Total Kendaraan</p>
                    <div style="font-size: 13px; color: #10B981; margin-top: 4px;">
                        {{ $stats['kendaraan_tersedia'] }} tersedia
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['total_pemesanan'] }}</h3>
                    <p>Total Pemesanan</p>
                    <div style="font-size: 13px; color: #F59E0B; margin-top: 4px;">
                        {{ $stats['pending'] }} menunggu
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>{{ $stats['total_user'] }}</h3>
                    <p>Total Pengguna</p>
                    <div style="font-size: 13px; color: #6B7280; margin-top: 4px;">
                        Pelanggan aktif
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <svg width="24" height="24" viewBox="0 0 20 20" fill="white">
                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="stat-info">
                    <h3>Rp {{ number_format($stats['pendapatan_bulan_ini'], 0, ',', '.') }}</h3>
                    <p>Pendapatan Bulan Ini</p>
                    <div style="font-size: 13px; color: #10B981; margin-top: 4px;">
                        {{ $stats['completed'] }} selesai
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions" style="margin-top: 48px;">
            <h2 style="font-size: 24px; font-weight: 600; margin-bottom: 24px;">Menu Cepat</h2>
            <div class="category-grid">
                <a href="{{ route('admin.kendaraan.create') }}" class="category-card">
                    <div class="category-icon">➕</div>
                    <h3>Tambah Kendaraan</h3>
                    <p>Tambahkan kendaraan baru</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('admin.kendaraan.index') }}" class="category-card">
                    <div class="category-icon">🚗</div>
                    <h3>Kelola Kendaraan</h3>
                    <p>Lihat & edit kendaraan</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('admin.pemesanan.index') }}" class="category-card">
                    <div class="category-icon">📋</div>
                    <h3>Kelola Pemesanan</h3>
                    <p>Proses pemesanan</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('admin.pemesanan.index', ['status' => 'pending']) }}" class="category-card">
                    <div class="category-icon">⏳</div>
                    <h3>Pemesanan Pending</h3>
                    <p>{{ $stats['pending'] }} menunggu</p>
                    <span class="category-arrow">→</span>
                </a>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="orders-section" style="margin-top: 48px;">
            <div class="section-header" style="text-align: left;">
                <h2>Pemesanan Terbaru</h2>
                <p>5 pemesanan terakhir</p>
            </div>

            <div class="orders-list">
                @forelse($pemesanan_terbaru as $pemesanan)
                    <div class="order-card">
                        <div class="order-image">
                            <img src="{{ $pemesanan->kendaraan->foto_url }}" alt="{{ $pemesanan->kendaraan->nama }}">
                        </div>

                        <div class="order-info">
                            <div class="order-header">
                                <div>
                                    <h3>{{ $pemesanan->kendaraan->nama }}</h3>
                                    <p style="font-size: 14px; color: var(--text-light); margin-top: 4px;">
                                        Pemesan: <strong>{{ $pemesanan->user->name }}</strong>
                                    </p>
                                </div>
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

                            <div class="order-actions">
                                <span class="order-date">{{ $pemesanan->created_at->diffForHumans() }}</span>
                                <a href="{{ route('admin.pemesanan.show', $pemesanan->id) }}" class="btn btn-sm btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center" style="padding: 40px; color: var(--text-light);">Belum ada pemesanan</p>
                @endforelse
            </div>

            @if($pemesanan_terbaru->count() > 0)
                <div style="text-align: center; margin-top: 24px;">
                    <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-outline">Lihat Semua Pemesanan</a>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection