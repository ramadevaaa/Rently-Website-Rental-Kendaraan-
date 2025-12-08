<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    public function index()
    {
        $user = auth()->user();
        
        // Ambil pemesanan user dengan relasi kendaraan
        $pemesanans = Pemesanan::with('kendaraan')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        // Statistik user
        $stats = [
            'total_pemesanan' => $user->pemesanans()->count(),
            'pending' => $user->pemesanans()->where('status', 'pending')->count(),
            'approved' => $user->pemesanans()->where('status', 'approved')->count(),
            'completed' => $user->pemesanans()->where('status', 'completed')->count(),
        ];

        return view('dashboard.user', compact('pemesanans', 'stats'));
    }
}