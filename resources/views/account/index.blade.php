@extends('layouts.app')

@section('title', 'Akun Saya & Riwayat Pesanan')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Profil -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4" style="border-radius: var(--radius-card);">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 80px; height: 80px;">
                            <i class="bi bi-person-fill fs-1 text-secondary"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">{{ $user->name }}</h5>
                    <p class="text-muted small mb-0">{{ $user->email }}</p>
                    <hr class="my-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('order.track') }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-search"></i> Lacak Pesanan Spesifik</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100"><i class="bi bi-box-arrow-right"></i> Keluar (Logout)</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Riwayat Pesanan -->
        <div class="col-lg-8">
            <h4 class="fw-bold mb-4" style="color: var(--color-gold);">Riwayat Pesanan Anda</h4>

            @if($orders->count() > 0)
                <div class="card border-0 shadow-sm" style="border-radius: var(--radius-card);">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="small text-uppercase text-muted px-4 py-3">No. Pesanan / Tanggal</th>
                                    <th class="small text-uppercase text-muted py-3">Total Harga</th>
                                    <th class="small text-uppercase text-muted py-3">Status</th>
                                    <th class="small text-uppercase text-muted px-4 py-3 text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="fw-bold">{{ $order->order_number }}</div>
                                        <div class="small text-muted">{{ $order->created_at->format('d M Y, H:i') }}</div>
                                    </td>
                                    <td class="py-3">
                                        <div class="fw-bold" style="color: var(--color-gold);">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</div>
                                    </td>
                                    <td class="py-3">
                                        @if($order->payment_status === 'paid')
                                            <span class="badge bg-success bg-opacity-10 text-success border border-success">Lunas</span>
                                        @elseif($order->payment_status === 'pending')
                                            <span class="badge bg-warning bg-opacity-10 text-warning border border-warning">Menunggu Pembayaran</span>
                                        @else
                                            <span class="badge bg-danger bg-opacity-10 text-danger border border-danger">Batal</span>
                                        @endif

                                        <div class="mt-1">
                                            @if($order->order_status === 'pending')
                                                <span class="badge bg-secondary">Menunggu Diproses</span>
                                            @elseif($order->order_status === 'confirmed')
                                                <span class="badge bg-primary">Dikonfirmasi</span>
                                            @elseif($order->order_status === 'shipped')
                                                <span class="badge bg-info text-dark">Dikirim</span>
                                            @elseif($order->order_status === 'completed')
                                                <span class="badge bg-success">Selesai</span>
                                            @elseif($order->order_status === 'cancelled')
                                                <span class="badge bg-danger">Dibatalkan</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-end">
                                        <a href="{{ route('order.success', $order) }}" class="btn btn-sm btn-outline-primary" style="border-radius: var(--radius-btn);">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-4">
                    {{ $orders->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="card border-0 shadow-sm p-5 text-center" style="border-radius: var(--radius-card);">
                    <i class="bi bi-bag-x fs-1 text-muted mb-3"></i>
                    <h5 class="fw-bold">Belum Ada Pesanan</h5>
                    <p class="text-muted small">Anda belum melakukan reservasi layanan apapun.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary-gold mt-2">Lihat Katalog Layanan</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
