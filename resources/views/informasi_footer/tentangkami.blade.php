<!-- FILE 1: resources/views/pages/tentangkami.blade.php -->
@extends('layouts.app')

@section('title', 'Tentang Kami - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/tentangkami.css') }}">
@endpush

@section('content')
<div class="about-container">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="hero-content">
            <h1 class="hero-title">Tentang RentLy</h1>
            <p class="hero-subtitle">Solusi rental kendaraan terpercaya untuk perjalanan Anda yang lebih nyaman dan praktis</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="about-section">
        <div class="story-grid">
            <div class="story-image">
                <img src="https://klikpajak.id/wp-content/uploads/2018/10/KlikPajak_Hindari-Sanksi-Pajak-Kendaraan-dengan-Pemutihan-Pajak.jpg" alt="RentLy Story">
            </div>
            <div class="story-content">
                <h3>Perjalanan Kami Dimulai</h3>
                <p>
                    RentLy didirikan pada tahun 2025 dengan visi untuk memberikan kemudahan akses transportasi bagi masyarakat Indonesia. Kami memahami bahwa mobilitas adalah kunci kesuksesan dalam kehidupan modern.
                </p>
                <p>
                    Berawal dari armada sederhana dengan 10 kendaraan, kini RentLy telah berkembang menjadi penyedia layanan rental kendaraan terkemuka dengan lebih dari 500+ unit kendaraan yang siap melayani kebutuhan perjalanan Anda.
                </p>
                <p>
                    Komitmen kami adalah memberikan pengalaman rental yang mudah, aman, dan terpercaya dengan harga yang kompetitif. Setiap kendaraan dirawat dengan standar tinggi untuk memastikan kenyamanan dan keamanan Anda.
                </p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header">
            <h2 class="section-title">Nilai-Nilai Kami</h2>
            <p class="section-subtitle">Prinsip yang menjadi fondasi dalam setiap layanan kami</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🛡️</div>
                <h3 class="value-title">Kepercayaan</h3>
                <p class="value-desc">Kami membangun hubungan jangka panjang dengan pelanggan melalui transparansi dan integritas dalam setiap transaksi.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">⭐</div>
                <h3 class="value-title">Kualitas Terbaik</h3>
                <p class="value-desc">Semua kendaraan dirawat secara berkala dan memenuhi standar keamanan yang ketat untuk kenyamanan Anda.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">💰</div>
                <h3 class="value-title">Harga Terjangkau</h3>
                <p class="value-desc">Kami menawarkan harga kompetitif tanpa biaya tersembunyi, sehingga Anda bisa merencanakan budget dengan pasti.</p>
            </div>
            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">Layanan Cepat</h3>
                <p class="value-desc">Proses pemesanan yang mudah dan cepat, dengan respon customer service yang sigap 24/7.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="section-header" style="color: white;">
            <h2 class="section-title" style="color: white;">Pencapaian Kami</h2>
            <p class="section-subtitle" style="color: rgba(255,255,255,0.9);">Angka yang membuktikan komitmen kami untuk Anda</p>
        </div>
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">Kendaraan Tersedia</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">10,000+</span>
                <span class="stat-label">Pelanggan Puas</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">15+</span>
                <span class="stat-label">Kota Terjangkau</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">4.8/5</span>
                <span class="stat-label">Rating Pelanggan</span>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="about-section">
        <div class="section-header">
            <h2 class="section-title">Tim Kami</h2>
            <p class="section-subtitle">Orang-orang hebat di balik layanan terbaik RentLy</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <img src="https://awsimages.detik.net.id/community/media/visual/2017/12/06/6414c1ae-fcd1-49a6-8316-4a71c29f93ff_43.jpg?w=600&q=90" alt="CEO" class="team-image">
                <div class="team-info">
                    <h3 class="team-name">Rama Jomok</h3>
                    <p class="team-position">Web Devoloper</p>
                    <p class="team-desc">Visioner di balik RentLy dengan pengalaman 15 tahun di industri otomotif.</p>
                </div>
            </div>
            <div class="team-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT93ut5cVvfwmzy0ZNcUdgjBpgMvwVwFn3jew&s" alt="COO" class="team-image">
                <div class="team-info">
                    <h3 class="team-name">Munglet Nonchalant</h3>
                    <p class="team-position">Web Devoloper</p>
                    <p class="team-desc">Memastikan operasional berjalan lancar dengan fokus pada kepuasan pelanggan.</p>
                </div>
            </div>
            <div class="team-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMnbKjkeXo6Q0iGPkKczeRPfez1oAgBM-GFA&s" alt="CTO" class="team-image">
                <div class="team-info">
                    <h3 class="team-name">Kriwil</h3>
                    <p class="team-position">Web Devoloper</p>
                    <p class="team-desc">Memimpin inovasi teknologi untuk pengalaman booking yang seamless.</p>
                </div>
            </div>
            <div class="team-card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzqZ_9PFc_2C7cDACv70EuwBWvQu7lVw2jMQ&s" alt="Customer Service Manager" class="team-image">
                <div class="team-info">
                    <h3 class="team-name">Adit Risol Mayo</h3>
                    <p class="team-position">Web Devoloper</p>
                    <p class="team-desc">Memimpin tim yang siap membantu Anda 24/7 dengan senyuman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content">
            <h2 class="cta-title">Siap Memulai Perjalanan Anda?</h2>
            <p class="cta-desc">Bergabunglah dengan ribuan pelanggan yang telah mempercayai RentLy untuk kebutuhan transportasi mereka.</p>
            <div class="cta-buttons">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">Lihat Kendaraan</a>
                <a href="{{ route('register') }}" class="btn btn-outline">Daftar Sekarang</a>
            </div>
        </div>
    </section>
</div>
@endsection