<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border: 1px solid #e0e0e0;
        }
        .info-box {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #1abc9c;
            border-radius: 5px;
        }
        .info-row {
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: bold;
            color: #555;
            display: inline-block;
            width: 150px;
        }
        .value {
            color: #333;
        }
        .contact-box {
            background: #fff3cd;
            border: 2px solid #ffc107;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
        }
        .contact-box h3 {
            color: #856404;
            margin-top: 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 12px;
            border-top: 1px solid #e0e0e0;
            margin-top: 30px;
        }
        .badge {
            display: inline-block;
            padding: 5px 15px;
            background: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Pemesanan Disetujui!</h1>
    </div>

    <div class="content">
        <p>Halo <strong>{{ $pemesanan->user->name }}</strong>,</p>
        
        <p>Kabar gembira! Pemesanan Anda telah <span class="badge">DISETUJUI</span> oleh admin.</p>

        <div class="info-box">
            <h3 style="margin-top: 0; color: #1abc9c;">📋 Detail Pemesanan</h3>
            
            <div class="info-row">
                <span class="label">Kode Booking:</span>
                <span class="value"><strong>#{{ $pemesanan->id }}</strong></span>
            </div>
            
            <div class="info-row">
                <span class="label">Kendaraan:</span>
                <span class="value">{{ $pemesanan->kendaraan->nama }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Jenis:</span>
                <span class="value">{{ $pemesanan->kendaraan->jenis }} - {{ $pemesanan->kendaraan->kategori }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Tanggal Mulai:</span>
                <span class="value">{{ $pemesanan->tanggal_mulai->format('d F Y') }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Tanggal Selesai:</span>
                <span class="value">{{ $pemesanan->tanggal_selesai->format('d F Y') }}</span>
            </div>
            
            <div class="info-row">
                <span class="label">Durasi:</span>
                <span class="value">{{ $pemesanan->durasi_hari }} hari</span>
            </div>
            
            <div class="info-row">
                <span class="label">Total Biaya:</span>
                <span class="value"><strong style="color: #1abc9c; font-size: 18px;">Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</strong></span>
            </div>
        </div>

        @if($pemesanan->catatan)
        <div class="info-box" style="border-left-color: #ffc107;">
            <h4 style="margin-top: 0;">📝 Catatan Anda:</h4>
            <p style="margin: 0;">{{ $pemesanan->catatan }}</p>
        </div>
        @endif

        <div class="contact-box">
            <h3>📞 Hubungi Admin untuk Konfirmasi</h3>
            <p style="margin: 10px 0;">Silakan hubungi admin untuk detail pengambilan kendaraan:</p>
            
            <div style="margin: 20px 0;">
                <p style="margin: 5px 0;"><strong>Nama:</strong> {{ $adminContact['name'] }}</p>
                <p style="margin: 5px 0;"><strong>Email:</strong> <a href="mailto:{{ $adminContact['email'] }}">{{ $adminContact['email'] }}</a></p>
                @if($adminContact['whatsapp'])
                <p style="margin: 5px 0;">
                    <strong>WhatsApp:</strong> 
                    <a href="https://wa.me/{{ $adminContact['whatsapp'] }}?text=Halo,%20saya%20{{ $pemesanan->user->name }}%20ingin%20konfirmasi%20pemesanan%20%23{{ $pemesanan->id }}" 
                       style="color: #25D366; text-decoration: none; font-weight: bold;">
                        {{ $adminContact['whatsapp'] }}
                    </a>
                </p>
                @endif
            </div>
        </div>

        <div style="background: #e7f3ff; padding: 15px; border-radius: 5px; margin-top: 20px;">
            <p style="margin: 0;"><strong>⚠️ Informasi Penting:</strong></p>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>Harap konfirmasi kehadiran H-1 sebelum tanggal pengambilan</li>
                <li>Bawa KTP/SIM asli saat pengambilan kendaraan</li>
                <li>Kendaraan sudah termasuk full tank BBM</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p><strong>RentLy - Rental Kendaraan Terpercaya</strong></p>
        <p>Jl. Sunset Road No. 123, Denpasar, Bali | Email: info@rently.com</p>
        <p style="color: #999; margin-top: 10px;">Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
    </div>
</body>
</html>