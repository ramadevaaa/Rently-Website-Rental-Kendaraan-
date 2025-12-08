<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemesanan';

    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'durasi_hari',
        'total_harga',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'total_harga' => 'decimal:2',
    ];

    // Relasi: Pemesanan dimiliki oleh User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Pemesanan dimiliki oleh Kendaraan
    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
