@extends('layouts.app')

@section('title', 'Masuk ke Akun')

@push('styles')
<style>
.auth-page {
    min-height: calc(100vh - 160px);
    display: flex;
    align-items: stretch;
}
.auth-banner {
    background: linear-gradient(160deg, #1a3a2a 0%, #2d5a3d 40%, #5c3d1e 100%);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 3rem 2.5rem;
}
.auth-banner::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url('{{ asset('images/auth-banner.png') }}');
    background-size: cover;
    background-position: center;
    opacity: 0.5;
}
.auth-banner-content {
    position: relative;
    z-index: 2;
    color: #fff;
    text-align: center;
}
.auth-banner-content .brand-logo {
    width: 64px;
    height: 64px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
}
.auth-banner-content h2 {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}
.auth-banner-content p {
    font-size: 0.9rem;
    opacity: 0.85;
    line-height: 1.7;
}
.auth-features {
    list-style: none;
    padding: 0;
    margin-top: 2rem;
}
.auth-features li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.85rem;
    font-size: 0.85rem;
    opacity: 0.9;
}
.auth-features li i {
    color: var(--color-gold);
    font-size: 1rem;
    flex-shrink: 0;
}
.auth-form-panel {
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 3rem 2.5rem;
}
.auth-form-inner {
    width: 100%;
    max-width: 400px;
}
.auth-form-inner .auth-title {
    font-family: 'Playfair Display', serif;
    color: #1a3a2a;
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.4rem;
}
.auth-form-inner .auth-subtitle {
    color: #6c757d;
    font-size: 0.875rem;
    margin-bottom: 2rem;
}
.auth-divider {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin: 1.5rem 0;
    color: #aaa;
    font-size: 0.8rem;
}
.auth-divider::before,
.auth-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: #e9ecef;
}
.form-floating label {
    color: #888;
    font-size: 0.875rem;
}
.form-floating .form-control:focus {
    border-color: var(--color-gold);
    box-shadow: 0 0 0 0.2rem rgba(129, 103, 49, 0.15);
}
.btn-auth-primary {
    background: linear-gradient(135deg, #816731, #b8934a);
    border: none;
    color: #fff;
    padding: 0.75rem 1.5rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(129, 103, 49, 0.35);
}
.btn-auth-primary:hover {
    background: linear-gradient(135deg, #6b5228, #a07a38);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(129, 103, 49, 0.45);
}
.input-icon-wrap {
    position: relative;
}
.input-icon-wrap .form-control {
    padding-left: 2.75rem;
    border-radius: 10px;
    border: 1.5px solid #e9ecef;
    height: 50px;
    font-size: 0.9rem;
    transition: border-color 0.2s;
}
.input-icon-wrap .form-control:focus {
    border-color: var(--color-gold);
    box-shadow: 0 0 0 0.2rem rgba(129, 103, 49, 0.12);
}
.input-icon-wrap .input-icon {
    position: absolute;
    left: 0.9rem;
    top: 50%;
    transform: translateY(-50%);
    color: #aaa;
    font-size: 1rem;
    pointer-events: none;
}
.remember-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.form-check-input:checked {
    background-color: var(--color-gold);
    border-color: var(--color-gold);
}
.auth-switch-text {
    text-align: center;
    font-size: 0.875rem;
    color: #6c757d;
    margin-top: 1.5rem;
}
.auth-switch-text a {
    color: var(--color-gold);
    font-weight: 600;
    text-decoration: none;
}
.auth-switch-text a:hover {
    text-decoration: underline;
}
</style>
@endpush

@section('content')
<div class="auth-page">
    <div class="row g-0 w-100">
        {{-- Left Banner (Hidden on Mobile) --}}
        <div class="col-lg-5 d-none d-lg-block">
            <div class="auth-banner h-100">
                <div class="auth-banner-content">
                    <div class="brand-logo">
                        <i class="bi bi-person-circle fs-2 text-white"></i>
                    </div>
                    <h2>Selamat Datang Kembali</h2>
                    <p>Masuk dan kelola reservasi layanan seni budaya Nusantara Anda dengan mudah.</p>
                    <ul class="auth-features">
                        <li><i class="bi bi-check-circle-fill"></i> Lihat semua riwayat pesanan Anda</li>
                        <li><i class="bi bi-check-circle-fill"></i> Proses checkout lebih cepat & mudah</li>
                        <li><i class="bi bi-check-circle-fill"></i> Lacak status reservasi real-time</li>
                        <li><i class="bi bi-check-circle-fill"></i> Data tersimpan aman & terenkripsi</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Right Form Panel --}}
        <div class="col-12 col-lg-7 auth-form-panel">
            <div class="auth-form-inner">
                <div class="mb-2">
                    <a href="{{ route('home') }}" class="text-decoration-none text-muted small">
                        <i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda
                    </a>
                </div>

                <h2 class="auth-title mt-3">Masuk Akun</h2>
                <p class="auth-subtitle">Belum punya akun? <a href="{{ route('register') }}" class="fw-semibold" style="color:var(--color-gold);">Daftar Gratis di sini</a></p>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show small py-2" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger small py-2">
                        <i class="bi bi-exclamation-triangle me-2"></i>{{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-dark">Alamat Email</label>
                        <div class="input-icon-wrap">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                placeholder="nama@email.com"
                                required autofocus>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <label class="form-label small fw-semibold text-dark mb-0">Kata Sandi</label>
                        </div>
                        <div class="input-icon-wrap">
                            <i class="bi bi-lock input-icon"></i>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan kata sandi"
                                required>
                        </div>
                    </div>

                    <div class="remember-row mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">Ingat saya</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-auth-primary w-100">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
                    </button>
                </form>

                <div class="auth-divider">atau</div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100" style="border-radius:10px; height:50px; display:flex; align-items:center; justify-content:center; font-size:0.9rem;">
                        <i class="bi bi-person-plus me-2"></i>Daftar Akun Baru
                    </a>
                </div>

                <div class="auth-switch-text">
                    Akun admin? <a href="{{ route('admin.login') }}">Login Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
