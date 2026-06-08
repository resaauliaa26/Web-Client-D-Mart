@php
    $_brandName = setting('brand_name', 'Rona Nuswa');
    $_brandLogo = 'images/logo.png';
    $_colorGold = setting('color_gold', '#816731');
    $_colorAccent = setting('color_accent', '#fafcf5ea');
    $_siteTitle = setting('site_title', 'Rona Nuswa — Seni Pertunjukan & Sewa Kostum');
    $_siteDescription = setting('site_description', 'Pusat reservasi pertunjukan tari tradisional, tata rias adat, dan persewaan kostum/properti budaya Nusantara kualitas premium.');
    $_categories = \App\Models\Category::orderBy('order')->get();
@endphp
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $_siteTitle) — {{ $_brandName }}</title>

    {{-- Meta Tags --}}
    <meta name="description" content="@yield('meta_description', $_siteDescription)">
    {{-- OG Tags --}}                                                                                                                                                  

    
    <meta property="og:site_name" content="{{ $_brandName }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', $_siteTitle)">
    <meta property="og:description" content="@yield('og_description', $_siteDescription)">
    <meta property="og:image" content="@yield('og_image', $_brandLogo ? asset('storage/'.$_brandLogo) : '')">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>:root{--color-gold:{{ $_colorGold }};--color-accent:{{ $_colorAccent }};}</style>
    @stack('styles')
</head>
<body>
    {{-- Top Bar --}}
    @php $_bannerTitle = setting('banner_title', 'Bebas Biaya Transportasi Jarak Dekat'); @endphp
    <div class="top-bar text-center">
        <div class="container d-flex justify-content-between align-items-center">
            <span><i class="bi bi-geo-alt-fill me-1"></i> {{ setting('store_location', 'Yogyakarta') }}</span>
            <span>{{ $_bannerTitle }}</span>
            <a href="https://wa.me/{{ setting('wa_number', '6280000000000') }}" class="text-white text-decoration-none">
                <i class="bi bi-whatsapp"></i> Hubungi Management
            </a>
        </div>
    </div>

   {{-- Main Navbar --}}
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
    <img src="/images/logo.png" alt="Logo Rona Nuswa" style="height: 38px; width: auto;">
                @if($_brandLogo)
                    {{ $_brandName }}
                @endif
            </a>

            <div class="d-flex align-items-center gap-2 order-lg-3">
                <!-- User Menu -->
                @auth
                    <div class="dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle text-dark d-flex align-items-center gap-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="small fw-bold" style="max-width: 80px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="border-radius: var(--radius-card);">
                            @if(Auth::user()->is_admin)
                                <li><a class="dropdown-item small" href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2 me-2"></i>Dashboard Admin</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li><a class="dropdown-item small" href="{{ route('account.index') }}"><i class="bi bi-person-lines-fill me-2"></i>Akun & Riwayat Pesanan</a></li>
                            <li><a class="dropdown-item small" href="{{ route('order.track') }}"><i class="bi bi-search me-2"></i>Lacak Pesanan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item small text-danger"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a class="nav-link d-none d-lg-flex align-items-center gap-1 text-dark" href="{{ route('login') }}">
                        <i class="bi bi-person fs-5"></i> <span class="small fw-bold">Masuk</span>
                    </a>
                @endauth
                
                <a class="nav-link position-relative d-inline-flex ms-lg-2" href="{{ route('cart.index') }}" title="Daftar Reservasi">
                    <i class="bi bi-calendar3 fs-5">
                        <span class="cart-badge" id="cartCount">{{ array_sum(array_column(session('cart', []), 'qty')) }}</span>
                    </i>
                </a>
                <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <i class="bi bi-list fs-3" style="color: var(--color-gold);"></i>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarMain">
                <form class="d-flex mx-auto search-form flex-grow-1 mt-3 mt-lg-0" action="{{ route('products.index') }}" method="GET" style="max-width: 500px;">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari tari, busana adat, properti..." value="{{ request('search') }}">
                        <button class="btn btn-search" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0 d-lg-none">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Katalog Jasa & Sewa</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Profil Sanggar</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('cara-belanja') ? 'active' : '' }}" href="{{ route('cara-belanja') }}">Panduan Reservasi</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('order.track') ? 'active' : '' }}" href="{{ route('order.track') }}">Status Agenda</a></li>
                    <li class="nav-item border-top mt-2 pt-2"></li>
                    @auth
                        @if(Auth::user()->is_admin)
                        <li class="nav-item"><a class="nav-link text-gold fw-bold" href="{{ route('admin.dashboard') }}">Dashboard Admin</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();">Keluar ({{ Auth::user()->name }})</a></li>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    @else
                        <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('login') }}" style="color: var(--color-gold);"><i class="bi bi-box-arrow-in-right"></i> Masuk / Daftar</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Nav Menu Desktop --}}
    <nav class="nav-category d-none d-lg-block">
        <div class="container">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Katalog Jasa & Sewa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Profil Sanggar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cara-belanja') ? 'active' : '' }}" href="{{ route('cara-belanja') }}">Panduan Reservasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('order.track') ? 'active' : '' }}" href="{{ route('order.track') }}">Status Agenda</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Toast Notification --}}
    <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastContainer" style="z-index: 1080;">
    </div>

    {{-- Confirm Modal --}}
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="border-radius: var(--radius-card);">
                <div class="modal-body text-center py-4">
                    <i class="bi bi-exclamation-triangle fs-1" style="color: var(--color-gold);"></i>
                    <p class="fw-bold mt-2 mb-0" id="confirmMessage">Batalkan agenda layanan ini?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0 pb-3">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="border-radius: var(--radius-btn);">Pertahankan</button>
                    <button type="button" class="btn btn-primary-gold btn-sm" id="confirmYes" style="border-radius: var(--radius-btn);">Ya, Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Variant Modal (Kustomisasi Ukuran & Detail Sesi) --}}
    <div class="modal fade" id="variantModal" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="border-radius: var(--radius-card);">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold" id="variantModalTitle"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="variantProductId">
                    <div id="variantSizeWrap" class="mb-3 d-none">
                        <label class="fw-bold mb-2 small">Ukuran Kostum / Busana</label>
                        <div class="d-flex gap-2 flex-wrap" id="variantSizeOptions"></div>
                        <input type="hidden" id="variantSize">
                    </div>
                    <div id="variantColorWrap" class="mb-3 d-none">
                        <label class="fw-bold mb-2 small">Variasi / Jenis Layanan</label>
                        <div class="d-flex gap-2 flex-wrap" id="variantColorOptions"></div>
                        <input type="hidden" id="variantColor">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold mb-2 small">Jumlah Unit / Sesi Acara</label>
                        <div class="d-flex align-items-center gap-3">
                            <button type="button" class="qty-btn" id="variantQtyMinus">−</button>
                            <span class="fw-bold fs-5" id="variantQtyDisplay">1</span>
                            <button type="button" class="qty-btn" id="variantQtyPlus">+</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 justify-content-center">
                    <button type="button" class="btn btn-primary-gold w-100" id="variantAddBtn">
                        <i class="bi bi-calendar-plus"></i> Tambah ke Reservasi
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="footer pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="brand-text mb-2">
                     @if($_brandLogo)
                    <img src="{{ asset('storage/' . $_brandLogo) }}" alt="{{ $_brandName }}" style="height: 32px; width: auto;">
                     @else
                      {{ $_brandName }}
                     @endif
                </div>
                    <p class="small" style="color: var(--color-muted);">
                        {{ $_siteDescription }}
                    </p>
                    <a href="https://wa.me/{{ setting('wa_number', '6280000000000') }}" class="btn btn-primary-gold btn-sm">
                        <i class="bi bi-whatsapp me-1"></i> Hubungi Manajemen Kantor
                    </a>
                </div>
                <div class="col-lg-2">
                    <div class="fw-bold mb-3" style="color: var(--color-gold);">Navigasi </div>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('home') }}">Beranda</a></li>
                        <li class="mb-2"><a href="{{ route('products.index') }}">Katalog Layanan</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}">Profil Sanggar</a></li>
                        <li class="mb-2"><a href="{{ route('cara-belanja') }}">Panduan Reservasi</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <div class="fw-bold mb-3" style="color: var(--color-gold);">Pilar Kebudayaan</div>
                    <ul class="list-unstyled small">
                        @foreach($_categories as $cat)
                        <li class="mb-2">
                            <a href="{{ route('products.index', ['category' => $cat->slug]) }}">{{ $cat->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3">
                    <div class="fw-bold mb-3" style="color: var(--color-gold);">Media Sosial & Dokumentasi</div>
                    <div class="d-flex gap-3 fs-5">
                        @php
                            $socIg = setting('social_instagram');
                            $socFb = setting('social_facebook');
                            $socTt = setting('social_tiktok');
                        @endphp
                        @if($socIg)<a href="{{ $socIg }}" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>@endif
                        @if($socFb)<a href="{{ $socFb }}" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>@endif
                        @if($socTt)<a href="{{ $socTt }}" target="_blank" rel="noopener"><i class="bi bi-tiktok"></i></a>@endif
                    </div>
                </div>
            </div>
            <hr class="mt-4" style="border-color: rgba(255,255,255,0.1);">
            <p class="text-center small mb-0" style="color: var(--color-muted);">
                &copy; {{ date('Y') }} {{ $_brandName }}. Seluruh Hak Cipta Dilindungi Undang-Undang Kerajinan Seni.
            </p>
        </div>
    </footer>

    {{-- Floating WhatsApp --}}
    @if(!request()->routeIs('checkout.*'))
    <a href="https://wa.me/{{ setting('wa_number', '0881023870789') }}" target="_blank" rel="noopener" class="whatsapp-float" aria-label="Konsultasi via WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
    @endif

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    @stack('scripts')
</body>
</html>