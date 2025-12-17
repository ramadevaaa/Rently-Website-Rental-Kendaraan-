@extends('layouts.app')

@section('title', 'Syarat & Ketentuan - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/syaratketentuan.css') }}">
@endpush

@section('content')
<div class="terms-container">
    <!-- Hero Section -->
    <section class="terms-hero">
        <div class="hero-content">
            <h1 class="hero-title">Syarat & Ketentuan</h1>
            <p class="hero-subtitle">Panduan lengkap untuk menggunakan layanan RentLy</p>
            <p class="last-updated">Terakhir diperbarui: {{ date('d F Y') }}</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="terms-content">
        <div class="content-wrapper">
            <!-- Sidebar Navigation -->
            <aside class="terms-sidebar">
                <div class="sidebar-sticky">
                    <h3 class="sidebar-title">Daftar Isi</h3>
                    <nav class="sidebar-nav">
                        <a href="#ketentuan-umum" class="nav-item">1. Ketentuan Umum</a>
                        <a href="#persyaratan-penyewa" class="nav-item">2. Persyaratan Penyewa</a>
                        <a href="#pemesanan" class="nav-item">3. Pemesanan & Pembayaran</a>
                        <a href="#penggunaan-kendaraan" class="nav-item">4. Penggunaan Kendaraan</a>
                        <a href="#tanggung-jawab" class="nav-item">5. Tanggung Jawab</a>
                        <a href="#pembatalan" class="nav-item">6. Pembatalan & Pengembalian</a>
                        <a href="#denda" class="nav-item">7. Denda & Sanksi</a>
                        <a href="#force-majeure" class="nav-item">8. Force Majeure</a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="terms-main">
                <!-- Introduction -->
                <div class="intro-box">
                    <h2>Selamat Datang di RentLy</h2>
                    <p>Dengan menggunakan layanan RentLy, Anda setuju untuk terikat dengan syarat dan ketentuan berikut. Mohon baca dengan seksama sebelum melakukan pemesanan.</p>
                </div>

                <!-- Section 1 -->
                <section id="ketentuan-umum" class="terms-section">
                    <div class="section-number">01</div>
                    <h2 class="section-title">Ketentuan Umum</h2>
                    <div class="section-content">
                        <p>Syarat dan ketentuan ini mengatur penggunaan layanan rental kendaraan yang disediakan oleh RentLy. Dengan melakukan pemesanan, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan yang berlaku.</p>
                        
                        <ul class="styled-list">
                            <li>RentLy berhak mengubah syarat dan ketentuan sewaktu-waktu tanpa pemberitahuan terlebih dahulu</li>
                            <li>Perubahan akan berlaku efektif sejak dipublikasikan di website</li>
                            <li>Penyewa wajib memeriksa pembaruan syarat dan ketentuan secara berkala</li>
                            <li>Penggunaan layanan setelah perubahan dianggap sebagai persetujuan atas ketentuan baru</li>
                        </ul>
                    </div>
                </section>

                <!-- Section 2 -->
                <section id="persyaratan-penyewa" class="terms-section">
                    <div class="section-number">02</div>
                    <h2 class="section-title">Persyaratan Penyewa</h2>
                    <div class="section-content">
                        <p>Untuk dapat menyewa kendaraan di RentLy, penyewa harus memenuhi persyaratan berikut:</p>
                        
                        <div class="requirement-grid">
                            <div class="requirement-card">
                                <div class="req-icon">📋</div>
                                <h3>Dokumen Identitas</h3>
                                <ul>
                                    <li>KTP/SIM/Paspor yang masih berlaku</li>
                                    <li>Fotocopy KTP dan KK</li>
                                    <li>Surat keterangan domisili (jika diperlukan)</li>
                                </ul>
                            </div>
                            <div class="requirement-card">
                                <div class="req-icon">🚗</div>
                                <h3>Surat Izin Mengemudi</h3>
                                <ul>
                                    <li>SIM A untuk mobil (minimal 1 tahun)</li>
                                    <li>SIM C untuk motor (minimal 1 tahun)</li>
                                    <li>SIM masih berlaku minimal 6 bulan</li>
                                </ul>
                            </div>
                            <div class="requirement-card">
                                <div class="req-icon">👤</div>
                                <h3>Usia Minimum</h3>
                                <ul>
                                    <li>Minimal 21 tahun untuk mobil</li>
                                    <li>Minimal 18 tahun untuk motor</li>
                                    <li>Maksimal 65 tahun</li>
                                </ul>
                            </div>
                            <div class="requirement-card">
                                <div class="req-icon">💳</div>
                                <h3>Jaminan</h3>
                                <ul>
                                    <li>Deposit sesuai ketentuan</li>
                                    <li>Kartu kredit/debit yang valid</li>
                                    <li>Atau jaminan barang berharga</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Section 3 -->
                <section id="pemesanan" class="terms-section">
                    <div class="section-number">03</div>
                    <h2 class="section-title">Pemesanan & Pembayaran</h2>
                    <div class="section-content">
                        <h3>Prosedur Pemesanan</h3>
                        <ol class="styled-list">
                            <li>Pilih kendaraan yang diinginkan melalui website atau aplikasi</li>
                            <li>Tentukan tanggal dan durasi rental</li>
                            <li>Lengkapi data pemesanan dan upload dokumen yang diperlukan</li>
                            <li>Lakukan pembayaran sesuai metode yang tersedia</li>
                            <li>Tunggu konfirmasi dari tim RentLy maksimal 2x24 jam</li>
                        </ol>

                        <div class="info-box info-warning">
                            <strong>⚠️ Penting:</strong> Pemesanan baru dianggap sah setelah pembayaran dikonfirmasi dan Anda menerima bukti pemesanan via email.
                        </div>

                        <h3>Metode Pembayaran</h3>
                        <ul class="styled-list">
                            <li>Transfer bank (BCA, Mandiri, BNI, BRI)</li>
                            <li>E-wallet (GoPay, OVO, Dana, ShopeePay)</li>
                            <li>Kartu kredit/debit</li>
                            <li>Pembayaran tunai di kantor (khusus kota tertentu)</li>
                        </ul>

                        <div class="info-box info-success">
                            <strong>💰 Deposit:</strong> Deposit akan dikembalikan 3-7 hari kerja setelah kendaraan dikembalikan dalam kondisi baik.
                        </div>
                    </div>
                </section>

                <!-- Section 4 -->
                <section id="penggunaan-kendaraan" class="terms-section">
                    <div class="section-number">04</div>
                    <h2 class="section-title">Penggunaan Kendaraan</h2>
                    <div class="section-content">
                        <h3>Aturan Penggunaan</h3>
                        <ul class="styled-list">
                            <li>Kendaraan hanya boleh digunakan oleh penyewa yang terdaftar</li>
                            <li>Dilarang keras menggunakan kendaraan untuk kegiatan ilegal</li>
                            <li>Dilarang menyewakan kembali kendaraan kepada pihak lain</li>
                            <li>Tidak boleh membawa kendaraan keluar kota tanpa izin tertulis</li>
                            <li>Wajib mematuhi semua peraturan lalu lintas yang berlaku</li>
                            <li>Dilarang merokok, membawa hewan peliharaan (kecuali dengan izin khusus)</li>
                        </ul>

                        <div class="warning-box">
                            <h4>🚫 Dilarang Keras:</h4>
                            <ul>
                                <li>Menggunakan kendaraan dalam kondisi mabuk atau di bawah pengaruh obat-obatan</li>
                                <li>Balapan liar atau berkendara secara ugal-ugalan</li>
                                <li>Membawa barang berbahaya atau ilegal</li>
                                <li>Modifikasi kendaraan tanpa izin</li>
                            </ul>
                        </div>

                        <h3>Perawatan Kendaraan</h3>
                        <p>Penyewa bertanggung jawab untuk:</p>
                        <ul class="styled-list">
                            <li>Menjaga kebersihan interior dan eksterior kendaraan</li>
                            <li>Memeriksa kondisi oli, air radiator, dan tekanan ban secara berkala</li>
                            <li>Parkir di tempat yang aman</li>
                            <li>Melaporkan segera jika terjadi kerusakan atau masalah</li>
                        </ul>
                    </div>
                </section>

                <!-- Section 5 -->
                <section id="tanggung-jawab" class="terms-section">
                    <div class="section-number">05</div>
                    <h2 class="section-title">Tanggung Jawab</h2>
                    <div class="section-content">
                        <h3>Tanggung Jawab Penyewa</h3>
                        <ul class="styled-list">
                            <li>Bertanggung jawab penuh atas kendaraan selama masa rental</li>
                            <li>Menanggung biaya kerusakan yang disebabkan kelalaian penyewa</li>
                            <li>Bertanggung jawab atas tilang dan pelanggaran lalu lintas</li>
                            <li>Menanggung risiko kehilangan barang pribadi di dalam kendaraan</li>
                            <li>Wajib mengganti biaya jika kendaraan hilang atau rusak parah</li>
                        </ul>

                        <h3>Tanggung Jawab RentLy</h3>
                        <ul class="styled-list">
                            <li>Menyediakan kendaraan dalam kondisi layak pakai dan bersih</li>
                            <li>Memberikan bantuan darurat 24/7 untuk masalah teknis kendaraan</li>
                            <li>Menanggung biaya perbaikan untuk kerusakan non-kelalaian penyewa</li>
                            <li>Memiliki asuransi kendaraan sesuai peraturan yang berlaku</li>
                        </ul>

                        <div class="info-box info-primary">
                            <strong>📞 Layanan Darurat:</strong> Hubungi hotline 24/7 di +62 812-3456-7890 untuk bantuan darurat.
                        </div>
                    </div>
                </section>

                <!-- Section 6 -->
                <section id="pembatalan" class="terms-section">
                    <div class="section-number">06</div>
                    <h2 class="section-title">Pembatalan & Pengembalian</h2>
                    <div class="section-content">
                        <h3>Kebijakan Pembatalan oleh Penyewa</h3>
                        <div class="cancellation-table">
                            <div class="table-row table-header">
                                <div>Waktu Pembatalan</div>
                                <div>Pengembalian Dana</div>
                            </div>
                            <div class="table-row">
                                <div>Lebih dari 7 hari sebelum rental</div>
                                <div class="refund-full">100% dikembalikan</div>
                            </div>
                            <div class="table-row">
                                <div>3-7 hari sebelum rental</div>
                                <div class="refund-partial">50% dikembalikan</div>
                            </div>
                            <div class="table-row">
                                <div>Kurang dari 3 hari</div>
                                <div class="refund-none">Tidak dapat dikembalikan</div>
                            </div>
                        </div>

                        <h3>Pengembalian Kendaraan</h3>
                        <ul class="styled-list">
                            <li>Kendaraan harus dikembalikan tepat waktu sesuai perjanjian</li>
                            <li>Keterlambatan dikenakan biaya tambahan per jam</li>
                            <li>Kendaraan harus dikembalikan dalam kondisi bersih</li>
                            <li>Bahan bakar harus dalam kondisi yang sama saat pengambilan</li>
                            <li>Pemeriksaan kondisi kendaraan dilakukan bersama petugas</li>
                        </ul>

                        <div class="info-box info-warning">
                            <strong>⏰ Keterlambatan:</strong> Biaya keterlambatan Rp 50.000/jam untuk motor dan Rp 100.000/jam untuk mobil.
                        </div>
                    </div>
                </section>

                <!-- Section 7 -->
                <section id="denda" class="terms-section">
                    <div class="section-number">07</div>
                    <h2 class="section-title">Denda & Sanksi</h2>
                    <div class="section-content">
                        <h3>Denda yang Berlaku</h3>
                        <div class="penalty-list">
                            <div class="penalty-item">
                                <span class="penalty-title">Keterlambatan Pengembalian</span>
                                <span class="penalty-amount">Rp 50.000 - 100.000/jam</span>
                            </div>
                            <div class="penalty-item">
                                <span class="penalty-title">Kendaraan Kotor</span>
                                <span class="penalty-amount">Rp 100.000 - 300.000</span>
                            </div>
                            <div class="penalty-item">
                                <span class="penalty-title">Merokok dalam Kendaraan</span>
                                <span class="penalty-amount">Rp 500.000</span>
                            </div>
                            <div class="penalty-item">
                                <span class="penalty-title">Kehilangan Kunci/STNK</span>
                                <span class="penalty-amount">Rp 1.000.000</span>
                            </div>
                            <div class="penalty-item">
                                <span class="penalty-title">Kerusakan Kecil</span>
                                <span class="penalty-amount">Sesuai estimasi perbaikan</span>
                            </div>
                            <div class="penalty-item">
                                <span class="penalty-title">Kerusakan Berat/Hilang</span>
                                <span class="penalty-amount">Harga pasaran kendaraan</span>
                            </div>
                        </div>

                        <div class="warning-box">
                            <h4>⚖️ Sanksi Hukum:</h4>
                            <p>Pelanggaran berat dapat dilaporkan ke pihak berwajib dan penyewa akan dikenakan sanksi sesuai hukum yang berlaku.</p>
                        </div>
                    </div>
                </section>

                <!-- Section 8 -->
                <section id="force-majeure" class="terms-section">
                    <div class="section-number">08</div>
                    <h2 class="section-title">Force Majeure</h2>
                    <div class="section-content">
                        <p>RentLy tidak bertanggung jawab atas keterlambatan atau kegagalan dalam memenuhi kewajiban yang disebabkan oleh keadaan di luar kendali wajar, termasuk namun tidak terbatas pada:</p>
                        
                        <ul class="styled-list">
                            <li>Bencana alam (gempa bumi, banjir, tsunami, dll)</li>
                            <li>Kebakaran, perang, atau kerusuhan</li>
                            <li>Pandemi atau wabah penyakit</li>
                            <li>Kebijakan pemerintah yang membatasi operasional</li>
                            <li>Gangguan layanan publik (listrik, internet, dll)</li>
                        </ul>

                        <p>Dalam kondisi force majeure, kedua belah pihak akan bernegosiasi dengan itikad baik untuk mencari solusi terbaik.</p>
                    </div>
                </section>

                <!-- Contact Section -->
                <section class="contact-section">
                    <h2>Butuh Bantuan?</h2>
                    <p>Jika Anda memiliki pertanyaan mengenai syarat dan ketentuan ini, silakan hubungi kami:</p>
                    <div class="contact-info">
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <span>info@rently.com</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📞</span>
                            <span>+62 812-3456-7890</span>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">💬</span>
                            <span>Live Chat (24/7)</span>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </section>
</div>
@endsection