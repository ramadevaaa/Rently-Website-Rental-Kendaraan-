<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PemesananAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    // Daftar pemesanan
    public function index(Request $request)
    {
        $query = Pemesanan::with(['user', 'kendaraan']);

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search != '') {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            })->orWhereHas('kendaraan', function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('plat_nomor', 'like', '%' . $request->search . '%');
            });
        }

        $pemesanans = $query->latest()->paginate(15);

        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    // Detail pemesanan
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['user', 'kendaraan'])->findOrFail($id);
        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    // Update status pemesanan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected,completed',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $old_status = $pemesanan->status;
        $pemesanan->update(['status' => $request->status]);

        // Update status kendaraan
        $kendaraan = $pemesanan->kendaraan;
        
        if ($request->status == 'approved' && $old_status == 'pending') {
            $kendaraan->update(['status' => 'disewa']);
        } elseif ($request->status == 'completed') {
            $kendaraan->update(['status' => 'tersedia']);
        } elseif ($request->status == 'rejected') {
            $kendaraan->update(['status' => 'tersedia']);
        }

        return redirect()->back()->with('success', 'Status pemesanan berhasil diupdate');
    }

    // Hapus pemesanan
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('admin.pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }
}