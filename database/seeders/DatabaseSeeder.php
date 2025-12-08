<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kendaraan;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin RentLy',
            'email' => 'admin@rently.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jakarta, Indonesia'
        ]);

        // Create Sample User
        User::create([
            'name' => 'John Doe',
            'email' => 'user@rently.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'phone' => '081234567891',
            'address' => 'Bandung, Indonesia'
        ]);

        // Create Sample Vehicles
        $vehicles = [
            [
                'nama' => 'Toyota Avanza 2023',
                'kategori' => 'mobil',
                'merk' => 'Toyota',
                'plat_nomor' => 'B 1234 ABC',
                'tahun' => 2023,
                'warna' => 'Putih',
                'harga_per_hari' => 350000,
                'status' => 'tersedia',
                'deskripsi' => 'Mobil keluarga nyaman dengan 7 seat, AC dingin, audio system.',
                'is_trusted' => true
            ],
            [
                'nama' => 'Honda Vario 160',
                'kategori' => 'motor',
                'merk' => 'Honda',
                'plat_nomor' => 'B 5678 XYZ',
                'tahun' => 2022,
                'warna' => 'Hitam',
                'harga_per_hari' => 75000,
                'status' => 'tersedia',
                'deskripsi' => 'Motor matic irit bensin, cocok untuk harian.',
                'is_trusted' => true
            ],
            [
                'nama' => 'Suzuki Carry Pickup',
                'kategori' => 'pickup',
                'merk' => 'Suzuki',
                'plat_nomor' => 'B 9012 DEF',
                'tahun' => 2021,
                'warna' => 'Biru',
                'harga_per_hari' => 250000,
                'status' => 'tersedia',
                'deskripsi' => 'Pickup untuk angkut barang, kapasitas besar.',
                'is_trusted' => false
            ],
            [
                'nama' => 'Daihatsu Gran Max',
                'kategori' => 'van',
                'merk' => 'Daihatsu',
                'plat_nomor' => 'B 3456 GHI',
                'tahun' => 2022,
                'warna' => 'Silver',
                'harga_per_hari' => 400000,
                'status' => 'tersedia',
                'deskripsi' => 'Van untuk rombongan, kapasitas 12 orang.',
                'is_trusted' => true
            ],
            [
                'nama' => 'Honda CR-V 2023',
                'kategori' => 'mobil',
                'merk' => 'Honda',
                'plat_nomor' => 'B 7890 JKL',
                'tahun' => 2023,
                'warna' => 'Merah',
                'harga_per_hari' => 600000,
                'status' => 'tersedia',
                'deskripsi' => 'SUV mewah dengan fitur lengkap, cocok untuk perjalanan jauh.',
                'is_trusted' => true
            ],
            [
                'nama' => 'Yamaha Nmax 2023',
                'kategori' => 'motor',
                'merk' => 'Yamaha',
                'plat_nomor' => 'B 2468 MNO',
                'tahun' => 2023,
                'warna' => 'Abu-abu',
                'harga_per_hari' => 85000,
                'status' => 'disewa',
                'deskripsi' => 'Motor matic premium dengan kenyamanan maksimal.',
                'is_trusted' => true
            ]
        ];

        foreach ($vehicles as $vehicle) {
            Kendaraan::create($vehicle);
        }
    }
}
