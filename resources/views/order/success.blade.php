@extends('layouts.app')

@section('title', 'Reservasi Agenda Berhasil')

@section('content')
<style>
@media (max-width: 575.98px) {
  .success-icon { font-size: 3rem !important; }
  .success-heading { font-size: 1.2rem; }
  .success-label { font-size: 0.85rem; }
  .success-value { font-size: 1rem !important; }
  .success-page { padding-top: 1.5rem !important; padding-bottom: 4.5rem !important; }
  .success-card { padding: 1rem !important; }
  .success-gap { gap: 0.35rem !important; }
  .success-btn { padding: 0.4rem 1rem !important; font-size: 0.85rem; }
}
</style>
<div class="container py-5 success-page">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <i class="bi bi-check-circle-fill text-success success-icon" style="font-size: 4rem;"></i>
                <h2 class="fw-bold mt-3 success-heading">Reservasi Agenda Berhasil Diajukan!</h2>
                <p class="text-muted">Terima kasih, draf pengajuan agenda Anda telah tercatat dalam sistem Rona Nuswa.</p>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-4 success-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 success-label">Kode Agenda</h5>
                        <span class="fw-bold fs-5 success-value" style="color: var(--color-gold);">{{ $order->order_number }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted success-label">Status Administrasi</span>
                        @if ($order->payment_status === 'paid')
                            <span class="badge bg-success">Mahar/DP Diterima</span>
                        @else
                            <span class="badge bg-warning text-dark">Menunggu Mahar/DP</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted success-label">Total Anggaran Kontrak</span>
                        <span class="fw-bold fs-5 price success-value">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span>
                    </div>
                    @if ($order->payment_status !== 'paid')
                    <div class="d-flex justify-content-between mb-0">
                        <span class="text-muted success-label">Batas Penguncian Jadwal</span>
                        <span class="fw-bold text-danger">{{ $order->payment_due_at->format('d M Y H:i') }}</span>
                    </div>
                    @endif
                </div>
            </div>

            @if ($order->payment_method === 'bank_transfer')
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Instruksi Penyelarasan Administrasi</h5>
                    <p>Silakan salurkan dana/mahar komitmen Anda melalui rekening resmi berikut:</p>
                    <div class="bg-light p-3 rounded mb-3">
                        <div class="mb-1"><strong>Bank Transfer:</strong> {{ $order->bank_name }}</div>
                        <div class="mb-1"><strong>No. Rekening Resmi:</strong> <span class="fw-bold" style="font-size: 1.1rem;">{{ $order->bank_account_number }}</span></div>
                        <div class="mb-0"><strong>Atas Nama (Yasan/Sanggar):</strong> {{ $order->bank_account_name }}</div>
                    </div>
                    <div class="bg-light p-3 rounded">
                        <div class="mb-1"><strong>Nominal Transfer:</strong> <span class="fw-bold price">Rp {{ number_format($order->grand_total, 0, ',', '.') }}</span></div>
                        <div class="mb-0"><strong>Batas Waktu:</strong> {{ $order->payment_due_at->format('d M Y H:i') }} WIB</div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body p-4 text-center">
                    <h5 class="fw-bold mb-3">Konfirmasi Administrasi</h5>
                    <p class="text-muted">Setelah mengirimkan mahar komitmen, silakan kunci jadwal panggung Anda via tautan berikut:</p>
                    @php
                        $waNumber = setting('wa_number', '6280000000000');
                        $msg = "Halo Manajemen Rona Nuswa, saya telah mengirimkan dana untuk agenda berikut:\n\n";
                        $msg .= "Kode Agenda: {$order->order_number}\n";
                        $msg .= "Total Anggaran: Rp ".number_format($order->grand_total, 0, ',', '.')."\n";
                        $msg .= "Melalui Bank: {$order->bank_name} - {$order->bank_account_number}\n\n";
                        $msg .= "Mohon segera diverifikasi untuk penguncian tanggal jadwal panggung. Terima kasih.";
                        $waUrl = "https://wa.me/{$waNumber}?text=".urlencode($msg);
                    @endphp
                    <a href="{{ $waUrl }}" target="_blank" class="btn btn-wa py-2 px-4">
                        <i class="bi bi-whatsapp"></i> Konfirmasi via WhatsApp Official
                    </a>
                </div>
            </div>
            @endif

            <div class="text-center d-flex justify-content-center success-gap">
                <a href="{{ route('products.index') }}" class="btn btn-primary-gold px-4 success-btn">Jelajahi Budaya Lain</a>
                <a href="{{ route('order.show', $order) }}" class="btn btn-secondary-accent px-4 ms-2 success-btn">Pantau Progress Agenda</a>
            </div>
        </div>
    </div>
</div>
@endsection