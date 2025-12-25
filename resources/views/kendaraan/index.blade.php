@extends('layouts.app')

@section('title', 'Daftar Kendaraan - RentLy')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Daftar Kendaraan</h1>
        <p>Temukan kendaraan yang sesuai dengan kebutuhan Anda</p>
    </div>
</section>

<section class="kendaraan-list">
    <div class="container">
        <!-- Filter & Search -->
        <div class="filter-section">
            <form action="{{ route('kendaraan.index') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <input type="text" 
                           name="search" 
                           placeholder="Cari nama atau merk kendaraan..." 
                           value="{{ request('search') }}"
                           class="form-control">
                </div>

                <div class="filter-group">
                    <select name="kategori" class="form-control">
                        <option value="">Semua Kategori</option>
                        <option value="mobil" {{ request('kategori') == 'mobil' ? 'selected' : '' }}>Mobil</option>
                        <option value="motor" {{ request('kategori') == 'motor' ? 'selected' : '' }}>Motor</option>
                        <option value="pickup" {{ request('kategori') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                        <option value="van" {{ request('kategori') == 'van' ? 'selected' : '' }}>Van</option>
                    </select>
                </div>

                <div class="filter-group">
                    <select name="sort" class="form-control">
                        <option value="">Urutkan</option>
                        <option value="termurah" {{ request('sort') == 'termurah' ? 'selected' : '' }}>Harga Termurah</option>
                        <option value="termahal" {{ request('sort') == 'termahal' ? 'selected' : '' }}>Harga Termahal</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                    </svg>
                    Cari
                </button>

                @if(request()->hasAny(['search', 'kategori', 'sort']))
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-outline">Reset</a>
                @endif
            </form>
        </div>

        <!-- Results Info -->
        <div class="results-info">
            <p>Menampilkan <strong>{{ $kendaraans->count() }}</strong> dari <strong>{{ $kendaraans->total() }}</strong> kendaraan</p>
        </div>

        <!-- Vehicle Grid -->
        <div class="vehicle-grid">
            @forelse($kendaraans as $kendaraan)
                <div class="vehicle-card">
                   
                    @if($kendaraan->status == 'disewa')
                        <span class="badge badge-rented">Sedang Disewa</span>
                    @elseif($kendaraan->status == 'maintenance')
                        <span class="badge badge-maintenance">Maintenance</span>
                    @endif
                    
                    <div class="vehicle-image">
                        <img src="{{ $kendaraan->foto_url }}" alt="{{ $kendaraan->nama }}">
                    </div>

                    <div class="vehicle-info">
                        <span class="vehicle-category">{{ ucfirst($kendaraan->kategori) }}</span>
                        <h3 class="vehicle-name">{{ $kendaraan->nama }}</h3>
                        <p class="vehicle-meta">
                            {{ $kendaraan->merk }} • {{ $kendaraan->tahun }} • {{ $kendaraan->warna }}
                        </p>
                        
                        <div class="vehicle-specs">
                            <span class="spec-item">
                                <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                {{ $kendaraan->plat_nomor }}
                            </span>
                        </div>

                        <div class="vehicle-footer">
                            <div class="vehicle-price">
                                <span class="price">Rp {{ number_format($kendaraan->harga_per_hari, 0, ',', '.') }}</span>
                                <span class="period">/hari</span>
                            </div>
                            <a href="{{ route('kendaraan.show', $kendaraan->id) }}" class="btn btn-sm btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke-width="2"/>
                        <path d="M16 16s-1.5-2-4-2-4 2-4 2" stroke-width="2" stroke-linecap="round"/>
                        <line x1="9" y1="9" x2="9.01" y2="9" stroke-width="2" stroke-linecap="round"/>
                        <line x1="15" y1="9" x2="15.01" y2="9" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <h3>Tidak Ada Kendaraan</h3>
                    <p>Maaf, tidak ada kendaraan yang sesuai dengan pencarian Anda</p>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-primary">Lihat Semua Kendaraan</a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($kendaraans->hasPages())
            <div class="pagination-wrapper">
                {{ $kendaraans->links('custom') }}
            </div>
        @endif
    </div>
</section>
@endsection