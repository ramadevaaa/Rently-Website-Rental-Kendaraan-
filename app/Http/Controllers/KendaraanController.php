<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan daftar kendaraan dengan filter dan search
    public function index(Request $request)
    {
        $query = Kendaraan::query();

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 'tersedia'); // Default tampilkan yang tersedia
        }

        // Search berdasarkan nama atau merk
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('merk', 'like', '%' . $request->search . '%');
            });
        }

        // Sorting berdasarkan harga
        if ($request->has('sort')) {
            if ($request->sort == 'termurah') {
                $query->orderBy('harga_per_hari', 'asc');
            } elseif ($request->sort == 'termahal') {
                $query->orderBy('harga_per_hari', 'desc');
            }
        } else {
            $query->latest();
        }

        $kendaraans = $query->paginate(12);

        return view('kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan detail kendaraan
    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        
        // Rekomendasi kendaraan serupa
        $rekomendasi = Kendaraan::where('kategori', $kendaraan->kategori)
            ->where('id', '!=', $kendaraan->id)
            ->where('status', 'tersedia')
            ->take(3)
            ->get();

        return view('kendaraan.show', compact('kendaraan', 'rekomendasi'));
    }
}