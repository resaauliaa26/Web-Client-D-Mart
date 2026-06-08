@extends('layouts.app')

@section('title', 'Detail Reservasi Agenda')

@section('content')
<style>
@media (max-width: 575.98px) {
  .detail-page { padding-top: 1.5rem !important; }
  .detail-card { padding: 1rem !important; }
  .detail-heading { font-size: 1.2rem; }
  .detail-label { font-size: 0.85rem; }
  .detail-value { font-size: 0.9rem; }
  .detail-grand { font-size: 1rem !important; }
  .detail-title { font-size: 0.9rem; }
}
@media (max-width: 575.98px) {
  .timeline-desktop { display: none; }
  .timeline-mobile { display: flex; }
}
@media (min-width: 576px) {
  .timeline-desktop { display: flex; }
  .timeline-mobile { display: none; }
}
.timeline-mobile { flex-direction: column; gap: 0; }
.timeline-mobile .tl-item { display: flex; align-items: flex-start; gap: 12px; }
.timeline-mobile .tl-dot { width: 16px; height: 16px; border-radius: 50%; flex-shrink: 0; margin-top: 4px; position: relative; z-index: 1; }
.timeline-mobile .tl-dot.active { background: var(--color-gold); }
.timeline-mobile .tl-dot.inactive { background: #e9ecef; }
.timeline-mobile .tl-line { width: 2px; flex-shrink: 0; margin-left: 7px; flex-grow: 1; min-height: 20px; }
.timeline-mobile .tl-line.active { background: var(--color-gold); }
.timeline-mobile .tl-line.inactive { background: #e9ecef; }
.timeline-mobile .tl-label { font-size: 0.85rem; padding-bottom: 8px; }
</style>
<div class="container py-5 detail-page">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="section-heading mb-4 detail-heading">Detail Reservasi Agenda</h1>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-4 detail-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0">Kode Agenda: <span style="color: var(--color-gold);">{{ $order->order_number }}</span></h5>
                        @php
                            $statusLabels = [
                                'pending' => 'Menunggu DP',
                                'confirmed' => 'Jadwal Dikunci',
                                'processed' => 'Persiapan Properti & Tim',
                                'shipped' => 'Mobilisasi / Pengondisian',
                                'delivered' => 'Agenda Tergelar / Selesai',
                                'cancelled' => 'Agenda Dibatalkan',
                            ];
                            $statusBadges = [
                                'pending' => 'bg-warning text-dark',
                                'confirmed' => 'bg-info text-dark',
                                'processed' => 'bg-primary',
                                'shipped' => 'bg-success',
                                'delivered' => 'bg-success',
                                'cancelled' => 'bg-danger',
                            ];
                        @endphp
                        <span class="badge {{ $statusBadges[$order->order_status] ?? 'bg-secondary' }}">
                            {{ $statusLabels[$order->order_status] ?? $order->order_status }}
                        </span>
                    </div>

                    {{-- Timeline Alur Agenda --}}
                    <div class="mb-4">
                        @php
                            $steps = ['pending', 'confirmed', 'processed', 'shipped', 'delivered'];
                            $currentIdx = array_search($order->order_status, $steps);
                            $cancelled = $order->order_status === 'cancelled';
                        @endphp

                        {{-- Desktop horizontal timeline --}}
                        <div class="timeline-desktop justify-content-between">
                            @foreach($steps as $i => $step)
                            @php
                                $done = $currentIdx !== false && $i <= $currentIdx;
                                $label = $statusLabels[$step] ?? $step;
                            @endphp
                            <div class="text-center" style="flex: 1;">
                                <div class="rounded-circle mx-auto mb-1 d-flex align-items-center justify-content-center"
                                     style="width: 36px; height: 36px; background: {{ $done ? 'var(--color-gold)' : '#e9ecef' }};">
                                    @if($done)
                                    <i class="bi bi-check-lg text-white small"></i>
                                    @else
                                    <i class="bi bi-circle text-muted small"></i>
                                    @endif
                                </div>
                                <small class="d-block text-{{ $done ? 'dark' : 'muted' }}" style="font-size: 0.7rem;">{{ $label }}</small>
                            </div>
                            @endforeach
                        </div>

                        {{-- Mobile vertical timeline --}}
                        <div class="timeline-mobile">
                            @foreach($steps as $i => $step)
                            @php
                                $done = $currentIdx !== false && $i <= $currentIdx;
                                $isLast = $i === count($steps) - 1;
                                $label = $statusLabels[$step] ?? $step;
                            @endphp
                            <div class="tl-item">
                                <div class="d-flex flex-column align-items-center" style="width:16px;">
                                    <div class="tl-dot {{ $done ? 'active' : 'inactive' }}"></div>
                                    @if(!$isLast)
                                    <div class="tl-line {{ $done ? 'active' : 'inactive' }}"></div>
                                    @endif
                                </div>
                                <div class="tl-label fw-{{ $done ? 'bold' : 'normal' }} text-{{ $done ? 'dark' : 'muted' }}">
                                    {{ $label }}
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @if($cancelled)
                        <div class="text-center mt-2">
                            <span class="badge bg-danger">Agenda Dibatalkan</span>
                        </div>
                        @endif
                    </div>

                    @if($order->courier || $order->tracking_number)
                    <div class="bg-light p-3 rounded mb-3">
                        <h6 class="fw-bold mb-2">Logistik & Mobilisasi Properti</h6>
                        @if($order->courier)
                        <div class="mb-1"><span class="text-muted">Pengiriman/Transportasi:</span> {{ $order->courier }} {{ $order->courier_service }}</div>
                        @endif
                        @if($order->tracking_number)
                        <div class="mb-0"><span class="text-muted">No. Manifes Logistik:</span> <strong>{{ $order->tracking_number }}</strong></div>
                        @endif
                    </div>
                    @endif

                    <hr>

                    <h6 class="fw-bold mb-2 detail-title">Data Pemohon / Penanggung Jawab</h6>
                    <div class="row g-2 mb-3 detail-label">
                        <div class="col-sm-6"><span class="text-muted">Nama Instansi/Klien:</span> {{ $order->customer_name }}</div>
                        <div class="col-sm-6"><span class="text-muted">Kontak WA:</span> {{ $order->customer_phone }}</div>
                        <div class="col-sm-6"><span class="text-muted">Surel / Email:</span> {{ $order->customer_email }}</div>
                        <div class="col-12"><span class="text-muted">Lokasi Penyelenggaraan / Alamat:</span> {{ $order->shipping_address }}, {{ $order->shipping_city }}</div>
                    </div>

                    <h6 class="fw-bold mb-2 detail-title">Layanan Seni & Kostum Terpilih</h6>
                    @foreach($order->items as $item)
                    <div class="d-flex justify-content-between align-items-start mb-2 pb-2 border-bottom">
                        <div class="min-w-0 me-2">
                            <div class="detail-label fw-medium">{{ $item->product_name }}</div>
                            <small class="text-muted">
                                {{ $item->qty }} Sesi/Unit x @ Rp {{ number_format($item->product_price, 0, ',', '.') }}
                                @if($item->size) | Matra: {{ $item->size }} @endif
                                @if($item->color) | Variasi: {{ explode('|', $item->color)[1] ?? $item->color }} @endif
                            </small>
                        </div>
                        <span class="fw-bold text-nowrap detail-label">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                    </div>
                    @endforeach

                    <hr>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Subtotal Layanan</span>
                        <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Biaya Mobilisasi Tim & Properti</span>
                        <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-0">
                        <span class="fw-bold fs-5 detail-grand">Total Kontrak Anggaran</span>
                        <span class="price fs-5 detail-grand" style="color: var(--color-gold);">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                    </div>

                    @if($order->payment_status === 'pending')
                    <hr>
                    <div class="bg-light p-3 rounded">
                        <h6 class="fw-bold mb-2">Administrasi Pembayaran</h6>
                        @if($order->payment_method === 'midtrans')
                        <div class="mb-1"><span class="text-muted">Metode Gerbang Pembayaran:</span> Midtrans</div>
                        <div class="mb-0"><span class="text-muted">Batas Pelunasan:</span> <span class="text-danger fw-bold">{{ $order->payment_due_at->format('d M Y H:i') }}</span></div>
                        @endif
                        
                        @if($order->payment_method !== 'midtrans')
                        <div class="mb-1"><span class="text-muted">Transfer Bank Mandiri/BCA:</span> {{ $order->bank_name }}</div>
                        <div class="mb-1"><span class="text-muted">No. Rekening Resmi:</span> {{ $order->bank_account_number }} a.n. {{ $order->bank_account_name }}</div>
                        <div class="mb-0"><span class="text-muted">Batas Pelunasan DP/Mahar:</span> <span class="text-danger fw-bold">{{ $order->payment_due_at->format('d M Y H:i') }}</span></div>
                        @php
                            $waNumber = setting('wa_number', '6280000000000');
                            $msg = "Halo Manajemen Rona Nuswa, saya telah mengirimkan dana untuk agenda berikut:\n\n";
                            $msg .= "Kode Agenda: {$order->order_number}\n";
                            $msg .= "Total Anggaran: Rp ".number_format($order->grand_total, 0, ',', '.')."\n";
                            $msg .= "Melalui Bank: {$order->bank_name} - {$order->bank_account_number}\n\n";
                            $msg .= "Mohon segera diverifikasi untuk penguncian tanggal jadwal panggung. Terima kasih.";
                            $waUrl = "https://wa.me/{$waNumber}?text=".urlencode($msg);
                        @endphp
                        <a href="{{ $waUrl }}" target="_blank" class="btn btn-wa btn-sm mt-2">
                            <i class="bi bi-whatsapp"></i> Konfirmasi Administrasi Pembayaran
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('order.track') }}" class="btn btn-secondary-accent detail-label">&laquo; Pantau Agenda Lainnya</a>
        </div>
    </div>
</div>
@endsection