<?php

namespace App\Http\Controllers;


use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Form pemesanan
    public function create($kendaraan_id)
    {
        $kendaraan = Kendaraan::findOrFail($kendaraan_id);

        if ($kendaraan->status != 'tersedia') {
            return redirect()->route('kendaraan.show', $kendaraan_id)
                ->with('error', 'Kendaraan tidak tersedia untuk disewa');
        }

        return view('pemesanan.create', compact('kendaraan'));
    }

    // Proses pemesanan
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:tb_kendaraan,id',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'catatan' => 'nullable|string|max:500',
        ], [
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai harus hari ini atau setelahnya',
            'tanggal_selesai.after' => 'Tanggal selesai harus setelah tanggal mulai',
        ]);

        $kendaraan = Kendaraan::findOrFail($request->kendaraan_id);

        // Hitung durasi dan total harga
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
        $durasi_hari = $tanggal_mulai->diffInDays($tanggal_selesai) + 1; // +1 untuk include hari terakhir
        $total_harga = $durasi_hari * $kendaraan->harga_per_hari;

        // Buat pemesanan
        $pemesanan = Pemesanan::create([
            'user_id' => auth()->id(),
            'kendaraan_id' => $request->kendaraan_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'durasi_hari' => $durasi_hari,
            'total_harga' => $total_harga,
            'catatan' => $request->catatan,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard.user')
            ->with('success', 'Pemesanan berhasil dibuat! Menunggu konfirmasi admin.');
    }

    // Batalkan pemesanan
    public function cancel($id)
    {
        $pemesanan = Pemesanan::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($pemesanan->status != 'pending') {
            return redirect()->back()->with('error', 'Pemesanan tidak dapat dibatalkan');
        }

        $pemesanan->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Pemesanan berhasil dibatalkan');
    }
}