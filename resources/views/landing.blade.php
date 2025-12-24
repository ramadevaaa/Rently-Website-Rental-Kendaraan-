@extends('layouts.app')

@section('title', 'RentLy - Rental Kendaraan Terpercaya')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Sewa Kendaraan Impian Anda</h1>
                <p class="hero-subtitle">Dapatkan pengalaman rental terbaik dengan harga terjangkau dan pelayanan
                    profesional</p>
                <div class="hero-cta">
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg">Lihat Kendaraan</a>
                    @guest
                        <a href="{{ route('register') }}" class="btn btn-outline">Daftar Sekarang</a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">

                <div class="stat-card">
                    <div class="stat-icon">
                        <img src="/images/car.png" alt="car">
                    </div>
                    <h3>7+</h3>
                    <p>Total Kendaraan</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <img src="/images/checklist.png" alt="check">
                    </div>
                    <h3>122+</h3>
                    <p>Siap Disewa</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <img src="/images/medal.png" alt="rating">
                    </div>
                    <h3>4.9/5</h3>
                    <p>Rating Pelanggan</p>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <img src="/images/group.png" alt="users">
                    </div>
                    <h3>1000+</h3>
                    <p>Pelanggan Puas</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <div class="section-header">
                <h2>Kategori Kendaraan</h2>
                <p>Pilih kategori kendaraan sesuai kebutuhan Anda</p>
            </div>

            <div class="category-grid">
                <a href="{{ route('kendaraan.index', ['kategori' => 'mobil']) }}" class="category-card">
                    <div class="category-icon">
                        <img src="{{ asset('images/hatchback.png') }}" alt="Icon Mobil">
                    </div>
                    <h3>Mobil</h3>
                    <p>{{ $stats['total_mobil'] }} Unit</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('kendaraan.index', ['kategori' => 'motor']) }}" class="category-card">
                    <div class="category-icon">
                        <img src="{{ asset('images/motorbike.png') }}" alt="Icon Motor">
                    </div>
                    <h3>Motor</h3>
                    <p>{{ $stats['total_motor'] }} Unit</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('kendaraan.index', ['kategori' => 'pickup']) }}" class="category-card">
                    <div class="category-icon">
                        <img src="{{ asset('images/pickup-truck.png') }}" alt="Icon Pickup">
                    </div>
                    <h3>Pickup</h3>
                    <p>Tersedia</p>
                    <span class="category-arrow">→</span>
                </a>

                <a href="{{ route('kendaraan.index', ['kategori' => 'van']) }}" class="category-card">
                    <div class="category-icon">
                        <img src="{{ asset('images/van.png') }}" alt="Icon Van">
                    </div>
                    <h3>Van</h3>
                    <p>Tersedia</p>
                    <span class="category-arrow">→</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Vehicles -->
    <section class="featured">
        <div class="container">
            <div class="section-header">
                <h2>Kendaraan Terbaru</h2>
                <p>Pilihan kendaraan terbaik untuk Anda</p>
            </div>

            <div class="vehicle-grid">
                @forelse($kendaraans as $kendaraan)
                    <div class="vehicle-card">
                        @if($kendaraan->is_trusted)
                            <span class="badge badge-trusted">✓ Terpercaya</span>
                        @endif

                        <div class="vehicle-image">
                            <img src="{{ $kendaraan->foto_url }}" alt="{{ $kendaraan->nama }}">
                        </div>

                        <div class="vehicle-info">
                            <span class="vehicle-category">{{ ucfirst($kendaraan->kategori) }}</span>
                            <h3 class="vehicle-name">{{ $kendaraan->nama }}</h3>
                            <p class="vehicle-meta">{{ $kendaraan->merk }} • {{ $kendaraan->tahun }}</p>

                            <div class="vehicle-footer">
                                <div class="vehicle-price">
                                    <span class="price">Rp {{ number_format($kendaraan->harga_per_hari, 0, ',', '.') }}</span>
                                    <span class="period">/hari</span>
                                </div>
                                <a href="{{ route('kendaraan.show', $kendaraan->id) }}"
                                    class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">Belum ada kendaraan tersedia</p>
                @endforelse
            </div>

            <div class="text-center" style="margin-top: 40px;">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-outline btn-lg">Lihat Semua Kendaraan</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-header">
                <h2>Mengapa Memilih RentLy?</h2>
                <p>Keunggulan yang kami tawarkan untuk Anda</p>
            </div>

            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/discount.png') }}" alt="Harga Terjangkau" />
                    </div>
                    <h3>Harga Terjangkau</h3>
                    <p>Harga rental kompetitif tanpa biaya tersembunyi</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/cyber-security.png') }}" alt="Aman dan Terpercaya" />
                    </div>
                    <h3>Aman &amp; Terpercaya</h3>
                    <p>Kendaraan terawat dengan asuransi lengkap</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/fast-time.png') }}" alt="Proses Cepat" />
                    </div>
                    <h3>Proses Cepat</h3>
                    <p>Booking online mudah dan konfirmasi instan</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/verification.png') }}" alt="Pilihan Lengkap" />
                    </div>
                    <h3>Pilihan Lengkap</h3>
                    <p>Berbagai jenis kendaraan sesuai kebutuhan</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/customer-service.png') }}" alt="Layanan 24 Jam" />
                    </div>
                    <h3>Layanan 24/7</h3>
                    <p>Customer service siap membantu kapan saja</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('images/discount.png') }}" alt="Promo Menarik" />
                    </div>
                    <h3>Promo Menarik</h3>
                    <p>Dapatkan diskon dan penawaran spesial</p>
                </div>
            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2>Siap Memulai Perjalanan Anda?</h2>
                <p>Daftar sekarang dan nikmati kemudahan rental kendaraan bersama RentLy</p>
                <div class="cta-buttons">
                    @auth
                        <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg">Sewa Sekarang</a>
                    @else
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Gratis</a>
                        <a href="{{ route('kendaraan.index') }}" class="btn btn-outline">Lihat Kendaraan</a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
@endsection