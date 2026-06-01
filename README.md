# 🎨 Rona Nuswa — Sanggar Seni & Budaya

> Laravel 13 · Bootstrap 5 · Katalog Layanan Seni · Midtrans Payment · WhatsApp Reservasi

Aplikasi pengelolaan reservasi dan layanan seni dengan katalog jasa/sewa, agenda reservasi, transaksi, manajemen biaya transportasi, pembayaran Midtrans, dan checkout otomatis ke WhatsApp. **Fully responsive** — mobile, tablet, dan desktop.

---

## ✨ Fitur

### 🛍️ Frontend

- **Katalog produk** — grid responsif, filter kategori, search produk
- **Cart AJAX** — tambah/hapus/update qty tanpa reload
- **Varian produk** — pilih ukuran & warna via modal sebelum masuk keranjang
- **Flash sale countdown** — realtime, bisa diatur dari admin
- **Banner promo** — dinamis dari pengaturan admin
- **Checkout & transaksi** — form alamat, pilih pengiriman, Midtrans / bank transfer
- **Midtrans payment** — popup pembayaran (kartu kredit, VA, Alfamart, GoPay, dll.)
- **Bank Transfer** — checkout manual dengan konfirmasi via WhatsApp
- **Lacak pesanan** — cari pesanan via nomor WA, lihat status & timeline
- **Tentang Kami** — halaman statis dengan banner + konten (Trix editor) dari admin
- **Cara Belanja** — panduan belanja yang bisa diedit dari admin
- **Floating WhatsApp** — tombol WA fixed di semua halaman (kecuali checkout)

### 🔐 Admin Panel (`/admin`)

- **Produk** — CRUD dengan upload gambar, ukuran, warna (picker modal), harga diskon
- **Kategori** — CRUD dengan upload gambar
- **Pesanan** — daftar, detail, update status, konfirmasi pembayaran
- **Ongkos Kirim** — tarif per kota, weight-based (cost per kg)
- **Payment Bank** — kelola rekening untuk transfer manual
- **Halaman Tentang Kami** — upload banner + Trix editor konten
- **Halaman Cara Belanja** — upload banner + Trix editor konten
- **Pengaturan Toko** — brand, logo, WA, warna gold & accent, sosial media, flash sale, lokasi toko
- **Tampilan Toko** — SEO meta, hero section, CTA, banner promo

### ⚙️ Teknis

- **Midtrans Snap** — popup pembayaran + webhook server-to-server via `overrideNotifUrl`
- **Ongkir weight-based** — `base_cost + ceil(kg - 1) × cost_per_kg`
- **Tampilan dinamis** — hero, banner, warna, SEO meta semua dari database
- **No build tools** — Bootstrap statis di `public/bootstrap/`, tanpa Vite/Webpack/npm
- **Database driver** — session, cache, dan queue pakai database

---

## 🚀 Cara Install

> Pastikan database MySQL `ronanuswa` sudah dibuat. Migration akan membuat tabel-tabelnya otomatis.

```bash
# 1. Setup otomatis (install, .env, key, migrate)
composer run setup

# 2. Seed data awal (admin + contoh produk + ongkos kirim)
php artisan migrate:fresh --seed

# 3. Storage link (buat akses gambar produk)
php artisan storage:link

# 4. Jalankan
php artisan serve
```
