@extends('layouts.app')
@section('title', 'Kelola Pemesanan - Admin')
@section('content')
<section class="dashboard">
    <div class="container">
        <div class="dashboard-header">
            <h1>Kelola Pemesanan</h1>
        </div>

        <div class="filter-section">
            <form action="{{ route('admin.pemesanan.index') }}" method="GET" class="filter-form">
                <div class="filter-group">
                    <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}" class="form-control">
                </div>
                <div class="filter-group">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                        <option value="approved" {{ request('status')=='approved'?'selected':'' }}>Approved</option>
                        <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>Rejected</option>
                        <option value="completed" {{ request('status')=='completed'?'selected':'' }}>Completed</option>
                        <option value="cancelled" {{ request('status')=='cancelled'?'selected':'' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
                @if(request()->hasAny(['search','status']))
                <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-outline">Reset</a>
                @endif
            </form>
        </div>

        <div class="orders-list">
            @forelse($pemesanans as $p)
            <div class="order-card">
                <div class="order-image">
                    <img src="{{ $p->kendaraan->foto_url }}" alt="{{ $p->kendaraan->nama }}">
                </div>
                <div class="order-info">
                    <div class="order-header">
                        <div>
                            <h3>{{ $p->kendaraan->nama }}</h3>
                            <p style="font-size: 14px; color: var(--text-light); margin-top: 4px;">
                                Pemesan: <strong>{{ $p->user->name }}</strong> ({{ $p->user->email }})
                            </p>
                        </div>
                        <span class="status-badge status-{{ $p->status }}">{{ ucfirst($p->status) }}</span>
                    </div>
                    <div class="order-details">
                        <div class="detail-item">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $p->tanggal_mulai->format('d M Y') }} - {{ $p->tanggal_selesai->format('d M Y') }}</span>
                        </div>
                        <div class="detail-item">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $p->durasi_hari }} hari</span>
                        </div>
                        <div class="detail-item">
                            <svg width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            <span>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @if($p->catatan)
                    <div class="order-note"><strong>Catatan:</strong> {{ $p->catatan }}</div>
                    @endif
                    <div class="order-actions">
                        <span class="order-date">{{ $p->created_at->format('d M Y H:i') }}</span>
                        <div style="display: flex; gap: 8px;">
                            <a href="{{ route('admin.pemesanan.show', $p->id) }}" class="btn btn-sm btn-primary">Detail</a>
                            @if($p->status == 'pending')
                            <form action="{{ route('admin.pemesanan.updateStatus', $p->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-sm" style="background: var(--success); color: #fff;">Setujui</button>
                            </form>
                            <form action="{{ route('admin.pemesanan.updateStatus', $p->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                            </form>
                            @elseif($p->status == 'approved')
                            <form action="{{ route('admin.pemesanan.updateStatus', $p->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="btn btn-sm" style="background: var(--info); color: #fff;">Selesaikan</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <p>Tidak ada pemesanan</p>
            </div>
            @endforelse
        </div>

        @if($pemesanans->hasPages())
        <div class="pagination-wrapper">{{ $pemesanans->links() }}</div>
        @endif
    </div>
</section>
@endsection