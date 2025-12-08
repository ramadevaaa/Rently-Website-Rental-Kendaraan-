@extends('layouts.app')

@section('title', 'Pesan ' . $kendaraan->nama . ' - RentLy')

@section('content')
<section class="pemesanan-form">
    <div class="container">
        <div class="form-header">
            <h1>Form Pemesanan</h1>
            <p>Lengkapi data pemesanan untuk melanjutkan</p>
        </div>

        <div class="form-grid">
            <!-- Vehicle Info -->
            <div class="vehicle-summary">
                <h3>Detail Kendaraan</h3>
                <div class="summary-card">
                    <img src="{{ $kendaraan->foto_url }}" alt="{{ $kendaraan->nama }}">
                    <div class="summary-info">
                        <h4>{{ $kendaraan->nama }}</h4>
                        <p>{{ $kendaraan->merk }} • {{ $kendaraan->tahun }}</p>
                        <div class="summary-price">
                            <span class="price">Rp {{ number_format($kendaraan->harga_per_hari, 0, ',', '.') }}</span>
                            <span class="period">/hari</span>
                        </div>
                    </div>
                </div>

                <div class="calculation-box" id="calculationBox" style="display: none;">
                    <h4>Rincian Biaya</h4>
                    <div class="calc-row">
                        <span>Harga per hari</span>
                        <span>Rp {{ number_format($kendaraan->harga_per_hari, 0, ',', '.') }}</span>
                    </div>
                    <div class="calc-row">
                        <span>Durasi</span>
                        <span id="durasiText">0 hari</span>
                    </div>
                    <div class="calc-row calc-total">
                        <span>Total</span>
                        <span id="totalHarga">Rp 0</span>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="form-content">
                <form action="{{ route('pemesanan.store') }}" method="POST" id="pemesananForm">
                    @csrf
                    <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->id }}">

                    <div class="form-section">
                        <h3>Informasi Penyewa</h3>
                        
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>No. Telepon</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->phone ?? '-' }}" readonly>
                        </div>
                    </div>

                    <div class="form-section">
                        <h3>Periode Sewa</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai <span class="required">*</span></label>
                                <input type="date" 
                                       id="tanggal_mulai" 
                                       name="tanggal_mulai" 
                                       class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                                       value="{{ old('tanggal_mulai', date('Y-m-d')) }}"
                                       min="{{ date('Y-m-d') }}"
                                       required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai <span class="required">*</span></label>
                                <input type="date" 
                                       id="tanggal_selesai" 
                                       name="tanggal_selesai" 
                                       class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                       value="{{ old('tanggal_selesai') }}"
                                       min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                       required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan (Opsional)</label>
                            <textarea id="catatan" 
                                      name="catatan" 
                                      class="form-control" 
                                      rows="4" 
                                      placeholder="Tambahkan catatan khusus untuk pemesanan Anda">{{ old('catatan') }}</textarea>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="terms-box">
                            <h4>Syarat & Ketentuan</h4>
                            <ul>
                                <li>Penyewa wajib memiliki SIM yang masih berlaku</li>
                                <li>Deposit keamanan diperlukan saat pengambilan kendaraan</li>
                                <li>Kendaraan harus dikembalikan dalam kondisi baik</li>
                                <li>Keterlambatan pengembalian dikenakan biaya tambahan</li>
                                <li>Bahan bakar kendaraan ditanggung oleh penyewa</li>
                            </ul>
                            <label class="checkbox-label">
                                <input type="checkbox" required>
                                <span>Saya menyetujui syarat dan ketentuan yang berlaku</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('kendaraan.show', $kendaraan->id) }}" class="btn btn-outline btn-lg">Batal</a>
                        <button type="submit" class="btn btn-primary btn-lg">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Konfirmasi Pemesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    const hargaPerHari = {{ $kendaraan->harga_per_hari }};
    const tanggalMulaiInput = document.getElementById('tanggal_mulai');
    const tanggalSelesaiInput = document.getElementById('tanggal_selesai');
    const calculationBox = document.getElementById('calculationBox');
    const durasiText = document.getElementById('durasiText');
    const totalHarga = document.getElementById('totalHarga');

    function hitungTotal() {
        const tanggalMulai = new Date(tanggalMulaiInput.value);
        const tanggalSelesai = new Date(tanggalSelesaiInput.value);

        if (tanggalMulai && tanggalSelesai && tanggalSelesai > tanggalMulai) {
            const diffTime = Math.abs(tanggalSelesai - tanggalMulai);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // +1 untuk include hari terakhir
            const total = diffDays * hargaPerHari;

            durasiText.textContent = diffDays + ' hari';
            totalHarga.textContent = 'Rp ' + total.toLocaleString('id-ID');
            calculationBox.style.display = 'block';
        } else {
            calculationBox.style.display = 'none';
        }
    }

    tanggalMulaiInput.addEventListener('change', function() {
        // Update min date untuk tanggal selesai
        const minDate = new Date(this.value);
        minDate.setDate(minDate.getDate() + 1);
        tanggalSelesaiInput.min = minDate.toISOString().split('T')[0];
        
        // Reset tanggal selesai jika lebih kecil dari tanggal mulai
        if (tanggalSelesaiInput.value && new Date(tanggalSelesaiInput.value) <= new Date(this.value)) {
            tanggalSelesaiInput.value = '';
        }
        
        hitungTotal();
    });

    tanggalSelesaiInput.addEventListener('change', hitungTotal);

    // Initial calculation if dates are set
    if (tanggalMulaiInput.value && tanggalSelesaiInput.value) {
        hitungTotal();
    }
</script>
@endpush
@endsection