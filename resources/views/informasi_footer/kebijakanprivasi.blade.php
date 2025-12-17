@extends('layouts.app')

@section('title', 'Kebijakan Privasi - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/kebijakanprivasi.css') }}">
@endpush

@section('content')
<div class="privacy-container">
    <!-- Hero Section -->
    <section class="privacy-hero">
        <div class="hero-content">
            <div class="hero-icon">🔒</div>
            <h1 class="hero-title">Kebijakan Privasi</h1>
            <p class="hero-subtitle">Kami menghargai dan melindungi privasi data pribadi Anda</p>
            <p class="last-updated">Terakhir diperbarui: {{ date('d F Y') }}</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="privacy-content">
        <div class="content-wrapper">
            <!-- Sidebar Navigation -->
            <aside class="privacy-sidebar">
                <div class="sidebar-sticky">
                    <h3 class="sidebar-title">Navigasi Cepat</h3>
                    <nav class="sidebar-nav">
                        <a href="#pendahuluan" class="nav-item">Pendahuluan</a>
                        <a href="#data-dikumpulkan" class="nav-item">Data yang Dikumpulkan</a>
                        <a href="#cara-pengumpulan" class="nav-item">Cara Pengumpulan Data</a>
                        <a href="#penggunaan-data" class="nav-item">Penggunaan Data</a>
                        <a href="#keamanan-data" class="nav-item">Keamanan Data</a>
                        <a href="#berbagi-data" class="nav-item">Berbagi Data</a>
                        <a href="#hak-pengguna" class="nav-item">Hak Pengguna</a>
                        <a href="#cookies" class="nav-item">Cookies & Teknologi</a>
                        <a href="#anak-anak" class="nav-item">Privasi Anak-anak</a>
                        <a href="#perubahan" class="nav-item">Perubahan Kebijakan</a>
                        <a href="#kontak" class="nav-item">Hubungi Kami</a>
                    </nav>
                    
                    <div class="sidebar-highlight">
                        <div class="highlight-icon">🛡️</div>
                        <h4>Komitmen Kami</h4>
                        <p>Data Anda dijaga dengan standar keamanan tertinggi</p>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="privacy-main">
                <!-- Introduction -->
                <div class="intro-box">
                    <h2>Privasi Anda adalah Prioritas Kami</h2>
                    <p>RentLy berkomitmen untuk melindungi privasi dan keamanan informasi pribadi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi data Anda saat menggunakan layanan kami.</p>
                </div>

                <!-- Section: Pendahuluan -->
                <section id="pendahuluan" class="privacy-section">
                    <div class="section-badge">01</div>
                    <h2 class="section-title">Pendahuluan</h2>
                    <div class="section-content">
                        <p>Kebijakan Privasi ini berlaku untuk semua pengguna layanan RentLy, termasuk pengunjung website, pengguna aplikasi mobile, dan pelanggan yang melakukan pemesanan kendaraan.</p>
                        
                        <div class="highlight-box">
                            <h3>Lingkup Kebijakan</h3>
                            <ul class="check-list">
                                <li>Website RentLy (www.rently.com)</li>
                                <li>Aplikasi mobile RentLy (iOS & Android)</li>
                                <li>Layanan pelanggan dan komunikasi</li>
                                <li>Proses pemesanan dan pembayaran</li>
                            </ul>
                        </div>

                        <p>Dengan menggunakan layanan kami, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan kebijakan ini. Jika Anda tidak setuju, mohon untuk tidak menggunakan layanan kami.</p>
                    </div>
                </section>

                <!-- Section: Data yang Dikumpulkan -->
                <section id="data-dikumpulkan" class="privacy-section">
                    <div class="section-badge">02</div>
                    <h2 class="section-title">Data yang Kami Kumpulkan</h2>
                    <div class="section-content">
                        <p>Kami mengumpulkan berbagai jenis informasi untuk memberikan dan meningkatkan layanan kami:</p>

                        <div class="data-grid">
                            <div class="data-card">
                                <div class="card-icon">👤</div>
                                <h3>Informasi Pribadi</h3>
                                <ul>
                                    <li>Nama lengkap</li>
                                    <li>Alamat email</li>
                                    <li>Nomor telepon</li>
                                    <li>Alamat domisili</li>
                                    <li>Tanggal lahir</li>
                                </ul>
                            </div>

                            <div class="data-card">
                                <div class="card-icon">🪪</div>
                                <h3>Dokumen Identitas</h3>
                                <ul>
                                    <li>Nomor KTP/Paspor</li>
                                    <li>Nomor SIM</li>
                                    <li>Foto dokumen identitas</li>
                                    <li>Nomor Kartu Keluarga</li>
                                    <li>Selfie verifikasi</li>
                                </ul>
                            </div>

                            <div class="data-card">
                                <div class="card-icon">💳</div>
                                <h3>Informasi Pembayaran</h3>
                                <ul>
                                    <li>Nomor kartu kredit/debit</li>
                                    <li>Informasi rekening bank</li>
                                    <li>Riwayat transaksi</li>
                                    <li>E-wallet yang digunakan</li>
                                    <li>Detail invoice</li>
                                </ul>
                            </div>

                            <div class="data-card">
                                <div class="card-icon">🚗</div>
                                <h3>Data Penggunaan</h3>
                                <ul>
                                    <li>Riwayat pemesanan</li>
                                    <li>Preferensi kendaraan</li>
                                    <li>Lokasi penjemputan/pengembalian</li>
                                    <li>Durasi rental</li>
                                    <li>Feedback & review</li>
                                </ul>
                            </div>

                            <div class="data-card">
                                <div class="card-icon">📱</div>
                                <h3>Data Teknis</h3>
                                <ul>
                                    <li>Alamat IP</li>
                                    <li>Tipe perangkat</li>
                                    <li>Browser yang digunakan</li>
                                    <li>Sistem operasi</li>
                                    <li>Log aktivitas</li>
                                </ul>
                            </div>

                            <div class="data-card">
                                <div class="card-icon">📍</div>
                                <h3>Data Lokasi</h3>
                                <ul>
                                    <li>GPS coordinates (dengan izin)</li>
                                    <li>Alamat pemesanan</li>
                                    <li>Rute perjalanan</li>
                                    <li>Lokasi kantor terdekat</li>
                                    <li>Area layanan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Cara Pengumpulan -->
                <section id="cara-pengumpulan" class="privacy-section">
                    <div class="section-badge">03</div>
                    <h2 class="section-title">Cara Kami Mengumpulkan Data</h2>
                    <div class="section-content">
                        <div class="method-list">
                            <div class="method-item">
                                <div class="method-number">1</div>
                                <div class="method-content">
                                    <h3>Informasi yang Anda Berikan</h3>
                                    <p>Data yang Anda masukkan saat mendaftar akun, melakukan pemesanan, mengisi formulir, atau berkomunikasi dengan customer service kami.</p>
                                </div>
                            </div>

                            <div class="method-item">
                                <div class="method-number">2</div>
                                <div class="method-content">
                                    <h3>Informasi Otomatis</h3>
                                    <p>Data yang dikumpulkan secara otomatis melalui cookies, web beacons, dan teknologi tracking lainnya saat Anda menggunakan website atau aplikasi kami.</p>
                                </div>
                            </div>

                            <div class="method-item">
                                <div class="method-number">3</div>
                                <div class="method-content">
                                    <h3>Dari Pihak Ketiga</h3>
                                    <p>Informasi dari mitra payment gateway, layanan verifikasi identitas, dan platform media sosial (jika Anda login menggunakan akun sosial media).</p>
                                </div>
                            </div>

                            <div class="method-item">
                                <div class="method-number">4</div>
                                <div class="method-content">
                                    <h3>Interaksi Anda</h3>
                                    <p>Data dari interaksi Anda dengan customer service, feedback, review, dan komunikasi lainnya dengan RentLy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Penggunaan Data -->
                <section id="penggunaan-data" class="privacy-section">
                    <div class="section-badge">04</div>
                    <h2 class="section-title">Penggunaan Data Anda</h2>
                    <div class="section-content">
                        <p>Kami menggunakan informasi yang dikumpulkan untuk berbagai tujuan, termasuk:</p>

                        <div class="usage-grid">
                            <div class="usage-card">
                                <div class="usage-icon">✅</div>
                                <h3>Pemrosesan Layanan</h3>
                                <p>Memproses pemesanan, pembayaran, dan menyediakan layanan rental kendaraan yang Anda minta.</p>
                            </div>

                            <div class="usage-card">
                                <div class="usage-icon">🔐</div>
                                <h3>Verifikasi & Keamanan</h3>
                                <p>Memverifikasi identitas Anda, mencegah penipuan, dan menjaga keamanan platform.</p>
                            </div>

                            <div class="usage-card">
                                <div class="usage-icon">💬</div>
                                <h3>Komunikasi</h3>
                                <p>Mengirim konfirmasi pemesanan, update status, notifikasi penting, dan informasi promosi.</p>
                            </div>

                            <div class="usage-card">
                                <div class="usage-icon">📊</div>
                                <h3>Analisis & Peningkatan</h3>
                                <p>Menganalisis penggunaan layanan untuk meningkatkan kualitas dan mengembangkan fitur baru.</p>
                            </div>

                            <div class="usage-card">
                                <div class="usage-icon">🎯</div>
                                <h3>Personalisasi</h3>
                                <p>Menyesuaikan konten dan rekomendasi berdasarkan preferensi Anda.</p>
                            </div>

                            <div class="usage-card">
                                <div class="usage-icon">⚖️</div>
                                <h3>Kepatuhan Hukum</h3>
                                <p>Mematuhi kewajiban hukum dan regulasi yang berlaku.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Keamanan Data -->
                <section id="keamanan-data" class="privacy-section">
                    <div class="section-badge">05</div>
                    <h2 class="section-title">Keamanan Data</h2>
                    <div class="section-content">
                        <div class="security-intro">
                            <p>Kami menerapkan langkah-langkah keamanan teknis dan organisasi yang sesuai untuk melindungi data pribadi Anda dari akses tidak sah, kehilangan, atau penyalahgunaan.</p>
                        </div>

                        <div class="security-measures">
                            <h3>Langkah Keamanan Kami</h3>
                            
                            <div class="measure-item">
                                <div class="measure-icon">🔒</div>
                                <div class="measure-content">
                                    <h4>Enkripsi SSL/TLS</h4>
                                    <p>Semua data yang dikirimkan melalui website dan aplikasi kami dienkripsi menggunakan teknologi SSL/TLS standar industri.</p>
                                </div>
                            </div>

                            <div class="measure-item">
                                <div class="measure-icon">🔑</div>
                                <div class="measure-content">
                                    <h4>Akses Terbatas</h4>
                                    <p>Hanya karyawan yang berwenang yang memiliki akses ke data pribadi Anda, dengan protokol otentikasi ketat.</p>
                                </div>
                            </div>

                            <div class="measure-item">
                                <div class="measure-icon">🛡️</div>
                                <div class="measure-content">
                                    <h4>Firewall & Monitoring</h4>
                                    <p>Sistem firewall canggih dan monitoring 24/7 untuk mendeteksi dan mencegah ancaman keamanan.</p>
                                </div>
                            </div>

                            <div class="measure-item">
                                <div class="measure-icon">💾</div>
                                <div class="measure-content">
                                    <h4>Backup Regular</h4>
                                    <p>Data Anda di-backup secara berkala untuk mencegah kehilangan data.</p>
                                </div>
                            </div>
                        </div>

                        <div class="alert-box alert-info">
                            <strong>⚠️ Catatan Penting:</strong> Meskipun kami menerapkan langkah keamanan yang ketat, tidak ada sistem yang 100% aman. Kami mendorong Anda untuk menjaga kerahasiaan password dan informasi login Anda.
                        </div>
                    </div>
                </section>

                <!-- Section: Berbagi Data -->
                <section id="berbagi-data" class="privacy-section">
                    <div class="section-badge">06</div>
                    <h2 class="section-title">Berbagi Data dengan Pihak Ketiga</h2>
                    <div class="section-content">
                        <p>Kami tidak menjual data pribadi Anda kepada pihak ketiga. Namun, kami dapat membagikan informasi Anda dalam situasi berikut:</p>

                        <div class="sharing-list">
                            <div class="sharing-item">
                                <div class="sharing-icon">🏢</div>
                                <div class="sharing-content">
                                    <h3>Penyedia Layanan</h3>
                                    <p>Dengan vendor dan mitra bisnis yang membantu kami mengoperasikan layanan (payment gateway, layanan verifikasi, cloud storage, dll). Mereka terikat kontrak untuk menjaga kerahasiaan data Anda.</p>
                                </div>
                            </div>

                            <div class="sharing-item">
                                <div class="sharing-icon">⚖️</div>
                                <div class="sharing-content">
                                    <h3>Kewajiban Hukum</h3>
                                    <p>Ketika diwajibkan oleh hukum, perintah pengadilan, atau proses hukum lainnya dari otoritas pemerintah.</p>
                                </div>
                            </div>

                            <div class="sharing-item">
                                <div class="sharing-icon">🤝</div>
                                <div class="sharing-content">
                                    <h3>Transaksi Bisnis</h3>
                                    <p>Dalam hal merger, akuisisi, atau penjualan aset perusahaan, data Anda dapat ditransfer sebagai bagian dari transaksi tersebut.</p>
                                </div>
                            </div>

                            <div class="sharing-item">
                                <div class="sharing-icon">✅</div>
                                <div class="sharing-content">
                                    <h3>Dengan Persetujuan Anda</h3>
                                    <p>Ketika Anda memberikan persetujuan eksplisit untuk berbagi informasi dengan pihak ketiga tertentu.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Hak Pengguna -->
                <section id="hak-pengguna" class="privacy-section">
                    <div class="section-badge">07</div>
                    <h2 class="section-title">Hak Anda Atas Data Pribadi</h2>
                    <div class="section-content">
                        <p>Anda memiliki hak-hak berikut terkait data pribadi Anda:</p>

                        <div class="rights-grid">
                            <div class="right-card">
                                <div class="right-number">1</div>
                                <h3>Hak Akses</h3>
                                <p>Meminta salinan data pribadi yang kami miliki tentang Anda.</p>
                            </div>

                            <div class="right-card">
                                <div class="right-number">2</div>
                                <h3>Hak Koreksi</h3>
                                <p>Meminta pembaruan atau koreksi data yang tidak akurat atau tidak lengkap.</p>
                            </div>

                            <div class="right-card">
                                <div class="right-number">3</div>
                                <h3>Hak Penghapusan</h3>
                                <p>Meminta penghapusan data pribadi Anda dalam kondisi tertentu.</p>
                            </div>

                            <div class="right-card">
                                <div class="right-number">4</div>
                                <h3>Hak Pembatasan</h3>
                                <p>Membatasi pemrosesan data pribadi Anda dalam situasi tertentu.</p>
                            </div>

                            <div class="right-card">
                                <div class="right-number">5</div>
                                <h3>Hak Portabilitas</h3>
                                <p>Menerima data Anda dalam format yang terstruktur dan dapat dibaca mesin.</p>
                            </div>

                            <div class="right-card">
                                <div class="right-number">6</div>
                                <h3>Hak Keberatan</h3>
                                <p>Menolak pemrosesan data untuk tujuan marketing atau kepentingan tertentu.</p>
                            </div>
                        </div>

                        <div class="action-box">
                            <h3>Cara Menggunakan Hak Anda</h3>
                            <p>Untuk menggunakan hak-hak di atas, silakan hubungi kami melalui:</p>
                            <div class="action-buttons">
                                <a href="mailto:privacy@rently.com" class="btn btn-primary">📧 Email Privacy Team</a>
                                <a href="#" class="btn btn-outline">❓ Lihat FAQ</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section: Cookies -->
                <section id="cookies" class="privacy-section">
                    <div class="section-badge">08</div>
                    <h2 class="section-title">Cookies & Teknologi Tracking</h2>
                    <div class="section-content">
                        <p>Kami menggunakan cookies dan teknologi tracking serupa untuk meningkatkan pengalaman Anda di platform kami.</p>

                        <div class="cookie-types">
                            <div class="cookie-type">
                                <h3>🍪 Cookies Esensial</h3>
                                <p>Diperlukan untuk fungsi dasar website, seperti login dan keamanan. Cookies ini tidak dapat dinonaktifkan.</p>
                            </div>

                            <div class="cookie-type">
                                <h3>📊 Cookies Analitik</h3>
                                <p>Membantu kami memahami bagaimana pengunjung berinteraksi dengan website untuk meningkatkan layanan.</p>
                            </div>

                            <div class="cookie-type">
                                <h3>🎯 Cookies Marketing</h3>
                                <p>Digunakan untuk menampilkan iklan yang relevan dengan minat Anda di platform kami dan pihak ketiga.</p>
                            </div>

                            <div class="cookie-type">
                                <h3>⚙️ Cookies Preferensi</h3>
                                <p>Menyimpan preferensi Anda seperti bahasa, lokasi, dan pengaturan tampilan.</p>
                            </div>
                        </div>

                        <div class="alert-box alert-info">
                            <strong>💡 Kontrol Cookies:</strong> Anda dapat mengelola preferensi cookies melalui pengaturan browser Anda. Namun, menonaktifkan cookies tertentu dapat mempengaruhi fungsionalitas website.
                        </div>
                    </div>
                </section>

                <!-- Section: Anak-anak -->
                <section id="anak-anak" class="privacy-section">
                    <div class="section-badge">09</div>
                    <h2 class="section-title">Privasi Anak-anak</h2>
                    <div class="section-content">
                        <div class="children-notice">
                            <div class="notice-icon">👶</div>
                            <div class="notice-content">
                                <h3>Layanan Tidak untuk Anak di Bawah Umur</h3>
                                <p>Layanan