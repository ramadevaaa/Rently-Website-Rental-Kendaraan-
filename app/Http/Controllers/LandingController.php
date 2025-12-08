<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil 6 kendaraan terbaru untuk ditampilkan di landing page
        $kendaraans = Kendaraan::where('status', 'tersedia')
            ->latest()
            ->take(6)
            ->get();

        // Hitung statistik
        $stats = [
            'total_kendaraan' => Kendaraan::count(),
            'total_mobil' => Kendaraan::where('kategori', 'mobil')->count(),
            'total_motor' => Kendaraan::where('kategori', 'motor')->count(),
            'total_tersedia' => Kendaraan::where('status', 'tersedia')->count(),
        ];

        return view('landing', compact('kendaraans', 'stats'));
    }
}