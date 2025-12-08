<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index()
    {
        // Statistik dashboard admin
        $stats = [
            'total_kendaraan' => Kendaraan::count(),
            'kendaraan_tersedia' => Kendaraan::where('status', 'tersedia')->count(),
            'kendaraan_disewa' => Kendaraan::where('status', 'disewa')->count(),
            'total_pemesanan' => Pemesanan::count(),
            'pending' => Pemesanan::where('status', 'pending')->count(),
            'approved' => Pemesanan::where('status', 'approved')->count(),
            'completed' => Pemesanan::where('status', 'completed')->count(),
            'total_user' => User::where('role', 'user')->count(),
            'pendapatan_bulan_ini' => Pemesanan::whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->where('status', 'completed')
                ->sum('total_harga'),
        ];

        // Pemesanan terbaru
        $pemesanan_terbaru = Pemesanan::with(['user', 'kendaraan'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'pemesanan_terbaru'));
    }
}