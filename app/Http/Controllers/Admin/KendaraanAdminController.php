<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KendaraanAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    // Daftar kendaraan
    public function index(Request $request)
    {
        $query = Kendaraan::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('merk', 'like', '%' . $request->search . '%')
                  ->orWhere('plat_nomor', 'like', '%' . $request->search . '%');
        }

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $kendaraans = $query->latest()->paginate(15);

        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    // Form tambah kendaraan
    public function create()
    {
        return view('admin.kendaraan.create');
    }

    // Simpan kendaraan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:mobil,motor,pickup,van',
            'merk' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:20|unique:tb_kendaraan,plat_nomor',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'warna' => 'required|string|max:50',
            'harga_per_hari' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,disewa,maintenance',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_trusted' => 'boolean',
        ]);

        $data = $request->all();

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kendaraan', 'public');
        }

        $data['is_trusted'] = $request->has('is_trusted');

        Kendaraan::create($data);

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan');
    }

    // Form edit kendaraan
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    // Update kendaraan
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|in:mobil,motor,pickup,van',
            'merk' => 'required|string|max:255',
            'plat_nomor' => 'required|string|max:20|unique:tb_kendaraan,plat_nomor,' . $id,
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'warna' => 'required|string|max:50',
            'harga_per_hari' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,disewa,maintenance',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_trusted' => 'boolean',
        ]);

        $data = $request->all();

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($kendaraan->foto) {
                Storage::disk('public')->delete($kendaraan->foto);
            }
            $data['foto'] = $request->file('foto')->store('kendaraan', 'public');
        }

        $data['is_trusted'] = $request->has('is_trusted');

        $kendaraan->update($data);

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diupdate');
    }

    // Hapus kendaraan
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        // Hapus foto jika ada
        if ($kendaraan->foto) {
            Storage::disk('public')->delete($kendaraan->foto);
        }

        $kendaraan->delete();

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus');
    }
}