@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius-card); background: linear-gradient(135deg, color-mix(in srgb, var(--color-dark) 85%, transparent) 0%, color-mix(in srgb, #000 95%, transparent) 100%), url('{{ asset('storage/products/tariclasicmodern.jpeg') }}') center/cover no-repeat; color: #fff;">
            <div class="card-body p-4 p-md-5 position-relative">
                <div class="position-relative z-index-1">
                    <h2 class="font-display fw-bold mb-2">Selamat Datang, Admin!</h2>
                    <p class="mb-0 text-white-50">Berikut adalah ringkasan performa dan aktivitas reservasi hari ini.</p>
                </div>
                <i class="bi bi-shield-check position-absolute" style="font-size: 8rem; right: -10px; bottom: -20px; opacity: 0.1; color: var(--color-gold);"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.1s;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1 small fw-medium text-uppercase tracking-wider">Total Pesanan</p>
                        <h3 class="fw-bold mb-0 font-display" style="color: var(--color-dark);">{{ $orderCount }}</h3>
                    </div>
                    <div class="icon-wrap" style="width: 48px; height: 48px; border-radius: 50%; background: color-mix(in srgb, var(--color-gold) 15%, transparent); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-receipt fs-4" style="color: var(--color-gold);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.2s;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1 small fw-medium text-uppercase tracking-wider">Menunggu</p>
                        <h3 class="fw-bold mb-0 font-display" style="color: var(--color-dark);">{{ $pendingCount }}</h3>
                    </div>
                    <div class="icon-wrap" style="width: 48px; height: 48px; border-radius: 50%; background: rgba(255, 193, 7, 0.15); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-clock fs-4" style="color: #ffc107;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.3s;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1 small fw-medium text-uppercase tracking-wider">Total Layanan</p>
                        <h3 class="fw-bold mb-0 font-display" style="color: var(--color-dark);">{{ $productCount }}</h3>
                    </div>
                    <div class="icon-wrap" style="width: 48px; height: 48px; border-radius: 50%; background: color-mix(in srgb, var(--color-gold) 15%, transparent); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-box-seam fs-4" style="color: var(--color-gold);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.4s;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted mb-1 small fw-medium text-uppercase tracking-wider">Kategori</p>
                        <h3 class="fw-bold mb-0 font-display" style="color: var(--color-dark);">{{ $categoryCount }}</h3>
                    </div>
                    <div class="icon-wrap" style="width: 48px; height: 48px; border-radius: 50%; background: color-mix(in srgb, var(--color-accent) 15%, transparent); display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-tags fs-4" style="color: var(--color-accent);"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.5s; height: 100%;">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold font-display">Layanan Terbaru</h5>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-gold" style="border-radius: var(--radius-btn);">Lihat Semua</a>
            </div>
            <div class="card-body p-0 mt-2">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 text-uppercase small text-muted fw-semibold">Nama</th>
                                <th class="text-uppercase small text-muted fw-semibold">Kategori</th>
                                <th class="text-uppercase small text-muted fw-semibold">Harga</th>
                                <th class="pe-4 text-uppercase small text-muted fw-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestProducts as $product)
                            <tr>
                                <td class="ps-4 py-3"><a href="{{ route('admin.products.edit', $product) }}" class="text-dark text-decoration-none fw-medium">{{ $product->name }}</a></td>
                                <td class="py-3"><span class="badge bg-light text-dark border">{{ $product->category->name }}</span></td>
                                <td class="py-3 fw-semibold">Rp {{ number_format($product->final_price, 0, ',', '.') }}</td>
                                <td class="pe-4 py-3">
                                    @if($product->badge)
                                    <span class="badge badge-{{ strtolower($product->badge) }}">{{ $product->badge }}</span>
                                    @else
                                    <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @if($latestProducts->isEmpty())
                            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada data layanan</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-sm animate-card" style="border-radius: var(--radius-card); animation-delay: 0.6s; height: 100%;">
            <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold font-display">Reservasi Terbaru</h5>
                <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-outline-gold" style="border-radius: var(--radius-btn);">Lihat Semua</a>
            </div>
            <div class="card-body p-0 mt-2">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 text-uppercase small text-muted fw-semibold">ID</th>
                                <th class="text-uppercase small text-muted fw-semibold">Pemesan</th>
                                <th class="text-uppercase small text-muted fw-semibold">Total</th>
                                <th class="pe-4 text-uppercase small text-muted fw-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestOrders as $order)
                            @php
                                $badges = ['pending' => 'bg-warning text-dark border-warning', 'confirmed' => 'bg-info text-dark border-info', 'processed' => 'bg-primary border-primary', 'shipped' => 'bg-success border-success', 'delivered' => 'bg-success border-success', 'cancelled' => 'bg-danger border-danger'];
                                $labels = ['pending' => 'Menunggu', 'confirmed' => 'Dikonfirmasi', 'processed' => 'Diproses', 'shipped' => 'Dikirim', 'delivered' => 'Diterima', 'cancelled' => 'Batal'];
                            @endphp
                            <tr>
                                <td class="ps-4 py-3"><a href="{{ route('admin.orders.show', $order) }}" class="text-dark text-decoration-none fw-bold">#{{ $order->order_number }}</a></td>
                                <td class="py-3 fw-medium">{{ $order->customer_name }}</td>
                                <td class="py-3 fw-semibold text-gold">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</td>
                                <td class="pe-4 py-3"><span class="badge bg-opacity-10 border {{ $badges[$order->order_status] ?? 'bg-secondary' }}">{{ $labels[$order->order_status] ?? $order->order_status }}</span></td>
                            </tr>
                            @endforeach
                            @if($latestOrders->isEmpty())
                            <tr><td colspan="4" class="text-center py-4 text-muted">Belum ada pesanan terbaru</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
