<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'tb_kendaraan';

    protected $fillable = [
        'nama',
        'kategori',
        'merk',
        'plat_nomor',
        'tahun',
        'warna',
        'harga_per_hari',
        'status',
        'deskripsi',
        'foto',
    ];


    protected $casts = [
        'harga_per_hari' => 'decimal:2',
    ];

    // Relasi: Kendaraan memiliki banyak pemesanan
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }

    // Accessor untuk foto
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('images/default-car.jpg');
    }
}