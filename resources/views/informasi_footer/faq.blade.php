@extends('layouts.app')

@section('title', 'FAQ - RentLy')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">
@endpush

@section('content')
<div class="faq-container">
    <!-- Hero Section -->
    <section class="faq-hero">
        <div class="hero-content">
            <div class="hero-icon">❓</div>
            <h1 class="hero-title">Frequently Asked Questions</h1>
            <p class="hero-subtitle">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
            
            <!-- Search Box -->
            <div class="search-box">
                <span class="search-icon">🔍</span>
                <input type="text" id="faq-search" placeholder="Cari pertanyaan Anda di sini..." />
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="quick-links">
        <div class="quick-links-wrapper">
            <h2 class="quick-title">Kategori Populer</h2>
            <div class="category-grid">
                <a href="#pemesanan" class="category-card">
                    <div class="category-icon">📅</div>
                    <h3>Pemesanan</h3>
                    <p>Cara pesan & booking</p>
                </a>
                <a href="#pembayaran" class="category-card">
                    <div class="category-icon">💳</div>
                    <h3>Pembayaran</h3>
                    <p>Metode & proses bayar</p>
                </a>
                <a href="#penggunaan" class="category-card">
                    <div class="category-icon">🚗</div>
                    <h3>Penggunaan</h3>
                    <p>Aturan & tips berkendara</p>
                </a>
                <a href="#teknis" class="category-card">
                    <div class="category-icon">🔧</div>
                    <h3>Teknis</h3>
                    <p>Masalah & solusi</p>
                </a>
                <a href="#kebijakan" class="category-card">
                    <div class="category-icon">📋</div>
                    <h3>Kebijakan</h3>
                    <p>Syarat & ketentuan</p>
                </a>
                <a href="#lainnya" class="category-card">
                    <div class="category-icon">💬</div>
                    <h3>Lainnya</h3>
                    <p>Pertanyaan umum</p>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="faq-content">
        <div class="content-wrapper">
            
            <!-- Pemesanan Section -->
            <div id="pemesanan" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">📅</div>
                    <h2 class="section-title">Pemesanan & Booking</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana cara melakukan pemesanan kendaraan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Untuk melakukan pemesanan kendaraan di RentLy, ikuti langkah berikut:</p>
                            <ol>
                                <li>Pilih kendaraan yang Anda inginkan dari katalog kami</li>
                                <li>Tentukan tanggal mulai dan selesai rental</li>
                                <li>Klik tombol "Pesan Sekarang" dan isi formulir pemesanan</li>
                                <li>Upload dokumen yang diperlukan (KTP, SIM, dll)</li>
                                <li>Pilih metode pembayaran dan selesaikan transaksi</li>
                                <li>Tunggu konfirmasi dari tim kami maksimal 2x24 jam</li>
                            </ol>
                            <p>Setelah pembayaran dikonfirmasi, Anda akan menerima bukti pemesanan via email.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Berapa lama waktu konfirmasi pemesanan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Konfirmasi pemesanan biasanya diproses dalam waktu maksimal <strong>2x24 jam kerja</strong> setelah pembayaran diterima. Namun, untuk sebagian besar kasus, konfirmasi dapat diterima dalam <strong>2-6 jam</strong>.</p>
                            <p>Anda dapat memeriksa status pemesanan Anda di halaman "Riwayat Pesanan" atau menghubungi customer service kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa melakukan pemesanan untuk orang lain?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, Anda bisa melakukan pemesanan untuk orang lain. Namun, <strong>pengguna kendaraan harus memenuhi semua persyaratan</strong> yang berlaku, termasuk:</p>
                            <ul>
                                <li>Memiliki SIM yang masih berlaku (minimal 1 tahun)</li>
                                <li>Usia minimal 21 tahun untuk mobil, 18 tahun untuk motor</li>
                                <li>Menyerahkan dokumen identitas asli saat pengambilan kendaraan</li>
                            </ul>
                            <p>Nama di pemesanan dan nama pengguna kendaraan boleh berbeda, asalkan semua dokumen lengkap.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa memesan kendaraan untuk jangka panjang?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Tentu saja! RentLy menyediakan paket rental jangka panjang dengan <strong>harga khusus yang lebih hemat</strong>:</p>
                            <ul>
                                <li><strong>Mingguan (7+ hari):</strong> Diskon 10%</li>
                                <li><strong>Bulanan (30+ hari):</strong> Diskon 20%</li>
                                <li><strong>3 Bulan+:</strong> Diskon hingga 30%</li>
                            </ul>
                            <p>Hubungi customer service kami untuk mendapatkan penawaran khusus untuk rental jangka panjang.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana jika kendaraan yang saya inginkan tidak tersedia?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Jika kendaraan yang Anda inginkan sedang tidak tersedia, Anda memiliki beberapa opsi:</p>
                            <ul>
                                <li><strong>Pilih tanggal lain:</strong> Cek ketersediaan di tanggal berbeda</li>
                                <li><strong>Kendaraan alternatif:</strong> Kami akan merekomendasikan kendaraan serupa yang tersedia</li>
                                <li><strong>Daftar tunggu:</strong> Daftarkan diri Anda ke waiting list dan kami akan menghubungi jika ada pembatalan</li>
                                <li><strong>Pre-order:</strong> Pesan jauh-jauh hari untuk memastikan ketersediaan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembayaran Section -->
            <div id="pembayaran" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">💳</div>
                    <h2 class="section-title">Pembayaran & Deposit</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Metode pembayaran apa saja yang tersedia?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>RentLy menerima berbagai metode pembayaran untuk kemudahan Anda:</p>
                            <ul>
                                <li><strong>Transfer Bank:</strong> BCA, Mandiri, BNI, BRI, CIMB Niaga</li>
                                <li><strong>E-Wallet:</strong> GoPay, OVO, Dana, ShopeePay, LinkAja</li>
                                <li><strong>Kartu Kredit/Debit:</strong> Visa, Mastercard, JCB</li>
                                <li><strong>Virtual Account:</strong> Semua bank mayor</li>
                                <li><strong>QRIS:</strong> Scan & bayar dengan mudah</li>
                                <li><strong>Tunai:</strong> Di kantor cabang tertentu (Jakarta, Surabaya, Bali)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Berapa besar deposit yang harus dibayar?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Besaran deposit bervariasi tergantung jenis kendaraan:</p>
                            <ul>
                                <li><strong>Motor:</strong> Rp 500.000 - Rp 1.000.000</li>
                                <li><strong>Mobil City Car:</strong> Rp 1.500.000 - Rp 2.000.000</li>
                                <li><strong>Mobil MPV/SUV:</strong> Rp 3.000.000 - Rp 5.000.000</li>
                                <li><strong>Mobil Premium:</strong> Rp 5.000.000 - Rp 10.000.000</li>
                            </ul>
                            <p class="highlight-box">Deposit akan dikembalikan 100% dalam waktu 3-7 hari kerja setelah kendaraan dikembalikan dalam kondisi baik dan tidak ada denda.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Kapan deposit dikembalikan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Deposit akan dikembalikan dalam waktu <strong>3-7 hari kerja</strong> setelah:</p>
                            <ol>
                                <li>Kendaraan dikembalikan tepat waktu</li>
                                <li>Kondisi kendaraan dalam keadaan baik (tidak ada kerusakan)</li>
                                <li>Tidak ada denda atau biaya tambahan</li>
                                <li>Proses verifikasi selesai dilakukan</li>
                            </ol>
                            <p>Pengembalian deposit akan ditransfer ke rekening yang sama dengan rekening pembayaran.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa membayar di tempat saat pengambilan kendaraan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Untuk pemesanan via website/app, <strong>pembayaran harus dilakukan terlebih dahulu</strong> secara online untuk mengonfirmasi booking Anda.</p>
                            <p>Namun, untuk <strong>pemesanan walk-in</strong> langsung di kantor cabang, Anda bisa melakukan pembayaran di tempat dengan syarat:</p>
                            <ul>
                                <li>Kendaraan yang diinginkan tersedia</li>
                                <li>Semua dokumen persyaratan lengkap</li>
                                <li>Melakukan pembayaran penuh + deposit sebelum membawa kendaraan</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah ada biaya tambahan selain harga rental?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Biaya rental sudah termasuk:</p>
                            <ul class="check-list">
                                <li>Asuransi dasar kendaraan</li>
                                <li>Perawatan rutin kendaraan</li>
                                <li>Dukungan customer service 24/7</li>
                            </ul>
                            <p>Biaya tambahan yang mungkin dikenakan:</p>
                            <ul class="cross-list">
                                <li>Bahan bakar (tanggungan penyewa)</li>
                                <li>Biaya antar-jemput kendaraan (optional)</li>
                                <li>Supir (jika diperlukan, Rp 200.000/hari)</li>
                                <li>Overtime/keterlambatan pengembalian</li>
                                <li>Biaya parkir, tol, dan denda tilang</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penggunaan Section -->
            <div id="penggunaan" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">🚗</div>
                    <h2 class="section-title">Penggunaan Kendaraan</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah boleh membawa kendaraan keluar kota?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, Anda diperbolehkan membawa kendaraan keluar kota dengan ketentuan:</p>
                            <ul>
                                <li><strong>Informasikan tujuan:</strong> Beritahu customer service kami terlebih dahulu</li>
                                <li><strong>Kelengkapan dokumen:</strong> Pastikan membawa STNK dan surat jalan</li>
                                <li><strong>Izin khusus:</strong> Diperlukan untuk perjalanan lintas pulau atau ke luar provinsi</li>
                                <li><strong>Batasan jarak:</strong> Tidak ada batasan untuk dalam pulau Jawa, Bali, dan Lombok</li>
                            </ul>
                            <div class="warning-note">
                                ⚠️ <strong>Penting:</strong> Kendaraan tidak boleh dibawa keluar negeri dalam kondisi apapun.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana jika kendaraan mengalami kerusakan di jalan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Jika kendaraan mengalami kerusakan saat digunakan:</p>
                            <ol>
                                <li><strong>Hubungi hotline darurat:</strong> +62 812-3456-7890 (24/7)</li>
                                <li><strong>Jangan mencoba perbaiki sendiri</strong> untuk kerusakan besar</li>
                                <li><strong>Dokumentasi:</strong> Foto kerusakan dan lokasi kejadian</li>
                                <li><strong>Tunggu bantuan:</strong> Tim kami akan datang atau mengarahkan ke bengkel rekanan</li>
                            </ol>
                            <div class="info-note">
                                ℹ️ Untuk kerusakan karena kelalaian penyewa, biaya perbaikan akan dipotong dari deposit.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa menambah durasi rental?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, Anda bisa memperpanjang durasi rental dengan cara:</p>
                            <ul>
                                <li><strong>Hubungi kami:</strong> Minimal 24 jam sebelum waktu pengembalian</li>
                                <li><strong>Cek ketersediaan:</strong> Kami akan konfirmasi apakah kendaraan masih available</li>
                                <li><strong>Bayar selisih:</strong> Bayar biaya tambahan sesuai durasi perpanjangan</li>
                                <li><strong>Dapat konfirmasi:</strong> Anda akan menerima bukti perpanjangan baru</li>
                            </ul>
                            <p class="highlight-box">💡 <strong>Tips:</strong> Perpanjangan mendadak (kurang dari 24 jam) dikenakan biaya tambahan 20%.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa sewa dengan supir?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, kami menyediakan layanan rental dengan supir profesional:</p>
                            <ul>
                                <li><strong>Biaya supir:</strong> Rp 200.000/hari (12 jam kerja)</li>
                                <li><strong>Overtime:</strong> Rp 25.000/jam untuk lebih dari 12 jam</li>
                                <li><strong>Sudah termasuk:</strong> Gaji supir dan uang makan</li>
                                <li><strong>Tanggungan penyewa:</strong> Bensin, tol, parkir</li>
                                <li><strong>Jika menginap:</strong> Penyewa menyediakan atau mengganti biaya penginapan supir</li>
                            </ul>
                            <p>Supir kami berpengalaman, ramah, dan menguasai rute di berbagai kota.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apa yang harus dilakukan jika terkena tilang?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Jika terkena tilang selama masa rental:</p>
                            <ol>
                                <li><strong>Hubungi kami segera:</strong> Informasikan kejadian tilang</li>
                                <li><strong>Tanggungan penyewa:</strong> Semua biaya tilang dan denda adalah tanggung jawab penyewa</li>
                                <li><strong>Penyelesaian:</strong> Anda bisa selesaikan langsung atau kami bantu urus (dengan biaya admin)</li>
                                <li><strong>STNK ditahan:</strong> Jika STNK ditahan polisi, segera beritahu kami untuk pengurusan</li>
                            </ol>
                            <div class="warning-note">
                                ⚠️ Tilang yang tidak diselesaikan akan dikenakan biaya admin tambahan Rp 200.000 + nilai tilang.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Teknis Section -->
            <div id="teknis" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">🔧</div>
                    <h2 class="section-title">Masalah Teknis & Solusi</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana jika kendaraan mogok?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Jika kendaraan mogok saat digunakan:</p>
                            <ol>
                                <li><strong>Pastikan keselamatan:</strong> Pinggirkan kendaraan ke tempat aman</li>
                                <li><strong>Hubungi hotline:</strong> +62 812-3456-7890 (tersedia 24/7)</li>
                                <li><strong>Beritahu lokasi:</strong> Share lokasi GPS Anda</li>
                                <li><strong>Derek gratis:</strong> Kami akan kirim derek tanpa biaya untuk kerusakan non-kelalaian</li>
                                <li><strong>Kendaraan pengganti:</strong> Kami usahakan menyediakan mobil pengganti jika diperlukan</li>
                            </ol>
                            <p class="highlight-box">✅ Kerusakan mesin karena cacat pabrik atau normal wear adalah tanggung jawab kami, bukan penyewa.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana jika ban kendaraan kempes?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Untuk ban kempes atau bocor:</p>
                            <ul>
                                <li><strong>Ganti ban serep:</strong> Setiap kendaraan dilengkapi ban cadangan dan toolkit</li>
                                <li><strong>Hubungi kami:</strong> Jika tidak bisa ganti sendiri, hubungi customer service</li>
                                <li><strong>Tambal gratis:</strong> Biaya tambal ban ditanggung kami untuk kerusakan normal</li>
                                <li><strong>Klaim asuransi:</strong> Untuk kerusakan karena paku atau benda tajam di jalan</li>
                            </ul>
                            <div class="info-note">
                                💡 Pastikan ban serep dalam kondisi baik saat pengambilan kendaraan.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apa yang dilakukan jika aki tekor?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Jika aki kendaraan tekor:</p>
                            <ol>
                                <li>Coba jump start menggunakan kabel jumper (jika tersedia)</li>
                                <li>Hubungi hotline kami untuk bantuan jump start</li>
                                <li>Tim kami akan datang dengan jump starter portable</li>
                                <li>Jika aki rusak total, kami akan ganti aki baru tanpa biaya</li>
                            </ol>
                            <p><strong>Pencegahan:</strong> Jangan lupa matikan lampu dan AC saat parkir lama. Hindari menghidupkan audio tanpa mesin menyala.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana jika kehilangan kunci kendaraan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Kehilangan kunci kendaraan:</p>
                            <ul>
                                <li><strong>Hubungi segera:</strong> Laporkan kehilangan ke customer service</li>
                                <li><strong>Biaya penggantian:</strong> Rp 1.000.000 (sudah termasuk pembuatan kunci baru)</li>
                                <li><strong>Kunci cadangan:</strong> Kami akan kirim kunci cadangan jika Anda masih di lokasi</li>
                                <li><strong>Potong deposit:</strong> Biaya akan dipotong dari deposit Anda</li>
                            </ul>
                            <div class="warning-note">
                                ⚠️ Jika kunci hilang di area rawan kejahatan, segera lapor polisi dan informasikan ke kami untuk keamanan kendaraan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kebijakan Section -->
            <div id="kebijakan" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">📋</div>
                    <h2 class="section-title">Kebijakan & Aturan</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana kebijakan pembatalan pemesanan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Kebijakan pembatalan pemesanan:</p>
                            <table class="policy-table">
                                <tr>
                                    <th>Waktu Pembatalan</th>
                                    <th>Pengembalian Dana</th>
                                </tr>
                                <tr>
                                    <td>Lebih dari 7 hari sebelum rental</td>
                                    <td class="refund-full">100% dikembalikan</td>
                                </tr>
                                <tr>
                                    <td>3-7 hari sebelum rental</td>
                                    <td class="refund-partial">50% dikembalikan</td>
                                </tr>
                                <tr>
                                    <td>1-3 hari sebelum rental</td>
                                    <td class="refund-minimal">25% dikembalikan</td>
                                </tr>
                                <tr>
                                    <td>Kurang dari 24 jam</td>
                                    <td class="refund-none">Tidak dapat dikembalikan</td>
                                </tr>
                            </table>
                            <p class="highlight-box">Dana yang dikembalikan akan diproses dalam 7-14 hari kerja ke rekening asal.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apa yang terjadi jika terlambat mengembalikan kendaraan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Keterlambatan pengembalian kendaraan dikenakan denda:</p>
                            <ul>
                                <li><strong>Motor:</strong> Rp 50.000 per jam</li>
                                <li><strong>Mobil:</strong> Rp 100.000 per jam</li>
                                <li><strong>Grace period:</strong> Toleransi 30 menit tanpa denda</li>
                                <li><strong>Lebih dari 6 jam:</strong> Dihitung 1 hari penuh rental</li>
                            </ul>
                            <div class="info-note">
                                💡 <strong>Tips:</strong> Jika tahu akan terlambat, hubungi kami untuk perpanjangan agar tidak kena denda overtime.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah ada batasan kilometer (KM)?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Untuk rental harian dan mingguan:</p>
                            <ul>
                                <li><strong>Motor:</strong> Unlimited KM dalam kota, 200 KM/hari untuk luar kota</li>
                                <li><strong>Mobil:</strong> 300 KM/hari (gratis), kelebihan Rp 3.000/KM</li>
                                <li><strong>Rental bulanan:</strong> Unlimited KM</li>
                            </ul>
                            <div class="info-note">
                                💡 Untuk perjalanan jarak jauh, kami sarankan mengambil paket mingguan atau bulanan untuk lebih hemat.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah kendaraan sudah diasuransikan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, semua kendaraan RentLy sudah dilengkapi dengan <strong>asuransi All Risk</strong> yang mencakup:</p>
                            <ul class="check-list">
                                <li>Kecelakaan lalu lintas</li>
                                <li>Bencana alam (banjir, longsor, gempa)</li>
                                <li>Pencurian dan kehilangan</li>
                                <li>Kerusuhan dan huru-hara</li>
                                <li>Kebakaran</li>
                            </ul>
                            <p><strong>Yang TIDAK ditanggung asuransi:</strong></p>
                            <ul class="cross-list">
                                <li>Kerusakan karena kelalaian penyewa (ugal-ugalan, mabuk, dll)</li>
                                <li>Kehilangan barang pribadi di dalam kendaraan</li>
                                <li>Denda tilang dan pelanggaran lalu lintas</li>
                                <li>Ban kempes atau bocor (kecuali akibat kecelakaan)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lainnya Section -->
            <div id="lainnya" class="faq-section">
                <div class="section-header">
                    <div class="section-icon">💬</div>
                    <h2 class="section-title">Pertanyaan Umum Lainnya</h2>
                </div>
                
                <div class="faq-list">
                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah tersedia layanan antar-jemput kendaraan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya, kami menyediakan layanan antar-jemput kendaraan dengan biaya tambahan:</p>
                            <ul>
                                <li><strong>Dalam kota:</strong> Rp 50.000 - 100.000 (tergantung jarak)</li>
                                <li><strong>Luar kota:</strong> Sesuai kesepakatan</li>
                                <li><strong>Gratis antar-jemput:</strong> Untuk rental 7 hari atau lebih di area tertentu</li>
                            </ul>
                            <p>Layanan ini tersedia untuk kota Jakarta, Surabaya, Bali, Bandung, Yogyakarta, dan Semarang.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah bisa rental untuk keperluan bisnis/perusahaan?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Tentu! Kami memiliki layanan <strong>Corporate Rental</strong> khusus untuk perusahaan dengan benefit:</p>
                            <ul>
                                <li>✅ Harga khusus dan diskon menarik</li>
                                <li>✅ Faktur pajak dan invoice resmi</li>
                                <li>✅ Sistem pembayaran tempo (untuk client terpercaya)</li>
                                <li>✅ Dedicated account manager</li>
                                <li>✅ Fleet management untuk armada perusahaan</li>
                                <li>✅ Prioritas pemesanan dan customer service</li>
                            </ul>
                            <p>Hubungi tim corporate kami di <strong>corporate@rently.com</strong> atau <strong>+62 811-2233-4455</strong></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana cara menjadi mitra/partner RentLy?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Kami membuka peluang kemitraan untuk pemilik kendaraan yang ingin mengembangkan bisnis rental. Keuntungan menjadi mitra:</p>
                            <ul>
                                <li>💰 <strong>Passive income:</strong> Kendaraan Anda dikelola dan disewakan oleh kami</li>
                                <li>📈 <strong>Sistem bagi hasil:</strong> Hingga 70% untuk mitra</li>
                                <li>🛡️ <strong>Asuransi comprehensive:</strong> Kendaraan dilindungi asuransi all risk</li>
                                <li>🔧 <strong>Perawatan gratis:</strong> Maintenance rutin ditanggung RentLy</li>
                                <li>📊 <strong>Dashboard online:</strong> Monitor pendapatan real-time</li>
                            </ul>
                            <p><strong>Syarat menjadi mitra:</strong></p>
                            <ol>
                                <li>Memiliki kendaraan tahun 2018 ke atas</li>
                                <li>Kondisi kendaraan sangat baik (lulus inspeksi)</li>
                                <li>Dokumen kendaraan lengkap dan atas nama sendiri</li>
                                <li>Bersedia kerjasama minimal 1 tahun</li>
                            </ol>
                            <p>Daftar sekarang di: <strong>partner.rently.com</strong> atau WA: <strong>+62 812-9999-0000</strong></p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah ada program referral atau loyalty?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Ya! Kami punya <strong>RentLy Rewards Program</strong>:</p>
                            
                            <p><strong>💎 Program Referral:</strong></p>
                            <ul>
                                <li>Ajak teman sewa, dapatkan <strong>Rp 100.000</strong> untuk Anda dan teman Anda</li>
                                <li>Unlimited referrals - semakin banyak teman, semakin banyak bonus!</li>
                                <li>Bonus bisa digunakan untuk rental berikutnya</li>
                            </ul>
                            
                            <p><strong>🏆 Loyalty Points:</strong></p>
                            <ul>
                                <li>Setiap Rp 10.000 rental = 1 poin</li>
                                <li>100 poin = voucher Rp 50.000</li>
                                <li>Member Silver, Gold, Platinum dengan benefit berbeda</li>
                                <li>Birthday voucher untuk member setia</li>
                            </ul>
                            
                            <div class="highlight-box">
                                🎁 <strong>Promo Special:</strong> Daftar hari ini dan dapatkan voucher Rp 50.000 untuk rental pertama!
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Bagaimana cara memberikan review atau komplain?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Kepuasan Anda adalah prioritas kami! Anda bisa memberikan feedback melalui:</p>
                            
                            <p><strong>📝 Review:</strong></p>
                            <ul>
                                <li>Langsung di website/app setelah rental selesai</li>
                                <li>Google Reviews dan social media kami</li>
                                <li>Email ke: feedback@rently.com</li>
                            </ul>
                            
                            <p><strong>😞 Komplain/Keluhan:</strong></p>
                            <ol>
                                <li>Hubungi customer service via chat/phone/email</li>
                                <li>Jelaskan masalah dengan detail dan bukti (foto/video jika ada)</li>
                                <li>Tim kami akan respond maksimal 1x24 jam</li>
                                <li>Kami akan investigasi dan berikan solusi terbaik</li>
                            </ol>
                            
                            <div class="info-note">
                                ⭐ Review positif Anda sangat berarti bagi kami! Dapatkan bonus poin untuk setiap review.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question">
                            <span>Apakah ada promo atau diskon khusus?</span>
                            <span class="faq-toggle">+</span>
                        </button>
                        <div class="faq-answer">
                            <p>Kami selalu punya promo menarik! Berikut promo yang sedang berjalan:</p>
                            
                            <p><strong>🎉 Promo Reguler:</strong></p>
                            <ul>
                                <li><strong>New Member:</strong> Diskon 15% untuk rental pertama</li>
                                <li><strong>Weekend Deal:</strong> Special price Sabtu-Minggu</li>
                                <li><strong>Early Bird:</strong> Booking 14 hari sebelum H-Day dapat diskon 10%</li>
                                <li><strong>Long Rental:</strong> Mingguan -10%, Bulanan -20%, 3 Bulan -30%</li>
                            </ul>
                            
                            <p><strong>🎊 Promo Seasonal:</strong></p>
                            <ul>
                                <li>Flash Sale setiap tanggal cantik (1/1, 2/2, 12/12, dll)</li>
                                <li>Harbolnas, Black Friday, Year End Sale</li>
                                <li>Promo Lebaran, Natal, Tahun Baru</li>
                                <li>Anniversary RentLy setiap bulan September</li>
                            </ul>
                            
                            <p>Follow Instagram & Twitter kami <strong>@RentlyID</strong> untuk update promo terbaru!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Still Have Questions Section -->
        <div class="still-questions">
            <div class="questions-card">
                <div class="questions-icon">🤔</div>
                <h2>Masih Ada Pertanyaan?</h2>
                <p>Tim customer service kami siap membantu Anda 24/7</p>
                
                <div class="contact-methods">
                    <a href="tel:+6281234567890" class="contact-btn">
                        <span class="btn-icon">📞</span>
                        <div>
                            <strong>Telepon</strong>
                            <span>+62 812-3456-7890</span>
                        </div>
                    </a>
                    
                    <a href="mailto:info@rently.com" class="contact-btn">
                        <span class="btn-icon">📧</span>
                        <div>
                            <strong>Email</strong>
                            <span>info@rently.com</span>
                        </div>
                    </a>
                    
                    <a href="https://wa.me/6281234567890" class="contact-btn" target="_blank">
                        <span class="btn-icon">💬</span>
                        <div>
                            <strong>WhatsApp</strong>
                            <span>Chat Sekarang</span>
                        </div>
                    </a>
                    
                    <a href="#" class="contact-btn">
                        <span class="btn-icon">💭</span>
                        <div>
                            <strong>Live Chat</strong>
                            <span>Tersedia 24/7</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script src="{{ asset('js/faq.js') }}"></script>
@endpush

@endsection