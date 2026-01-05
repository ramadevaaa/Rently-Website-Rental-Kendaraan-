<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\PemesananDisetujui;

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
            'rejection_reason' => 'required_if:status,rejected|max:1000',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $old_status = $pemesanan->status;
        $pemesanan->update([
        'status' => $request->status,
        'rejection_reason' => $request->status === 'rejected'
        ? $request->rejection_reason
        : null,
    ]);

        // Update status kendaraan
        $kendaraan = $pemesanan->kendaraan;
        
        if ($request->status == 'approved' && $old_status == 'pending') {
            $kendaraan->update(['status' => 'disewa']);
        } elseif ($request->status == 'completed') {
            $kendaraan->update(['status' => 'tersedia']);
        } elseif ($request->status == 'rejected') {
            $kendaraan->update(['status' => 'tersedia']);
        }
        // Kirim email jika disetujui (status jadi Aktif)
if ($request['status'] === 'approved' && $old_status === 'pending') {
    $this->sendApprovalEmail($pemesanan);
}

        return redirect()->back()->with('success', 'Status pemesanan berhasil diupdate');
    }
   private function sendApprovalEmail($pemesanan)
{
    try {
        $admin = \App\Models\User::where('role', 'admin')->first();

        if (!$admin) {
            Log::error('Admin tidak ditemukan');
            return;
        }

        if (!$pemesanan->user || !$pemesanan->user->email) {
            Log::error('Email user tidak valid');
            return;
        }

        $adminContact = [
            'name' => $admin->name,
            'email' => $admin->email,
            'whatsapp' => $admin->whatsapp ?? null,
        ];

        Mail::to($pemesanan->user->email)
            ->send(new \App\Mail\PemesananDisetujui($pemesanan, $adminContact));

    } catch (\Throwable $e) {
        Log::error('Email gagal dikirim', [
            'error' => $e->getMessage(),
            'pemesanan_id' => $pemesanan->id
        ]);
    }
}

    // Hapus pemesanan
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('admin.pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }
    public function showRejectForm($id)
{
    $pemesanan = Pemesanan::with(['user', 'kendaraan'])->findOrFail($id);

    // hanya bisa ditolak kalau masih pending
    if ($pemesanan->status !== 'pending') {
        return redirect()->route('admin.pemesanan.show', $pemesanan->id)
            ->with('error', 'Pemesanan ini sudah diproses.');
    }

    return view('admin.pemesanan.reject', compact('pemesanan'));
}

public function reject(Request $request, $id)
{
    $request->validate([
        'rejection_reason' => 'required|string|min:5|max:500',
    ], [
        'rejection_reason.required' => 'Alasan penolakan wajib diisi.',
    ]);

    $pemesanan = Pemesanan::with('kendaraan')->findOrFail($id);

    if ($pemesanan->status !== 'pending') {
        return redirect()->route('admin.pemesanan.show', $pemesanan->id)
            ->with('error', 'Pemesanan ini sudah diproses.');
    }

    $pemesanan->update([
        'status' => 'rejected',
        'rejection_reason' => $request->rejection_reason,
        'rejected_at' => now(),
    ]);

    // kendaraan balik tersedia
    if ($pemesanan->kendaraan) {
        $pemesanan->kendaraan->update(['status' => 'tersedia']);
    }

    return redirect()->route('admin.pemesanan.show', $pemesanan->id)
        ->with('success', 'Pemesanan berhasil ditolak.');
}

}

