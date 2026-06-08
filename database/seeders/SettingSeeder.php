<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::firstOrCreate(
            ['key' => 'wa_number'],
            ['value' => '6280000000000'],
        );

        Setting::firstOrCreate(
            ['key' => 'brand_name'],
            ['value' => 'Rona Nuswa'],
        );

        Setting::firstOrCreate(
            ['key' => 'color_gold'],
            ['value' => '#D4AF37'],
        );

        Setting::firstOrCreate(
            ['key' => 'color_accent'],
            ['value' => '#3D2314'],
        );

        collect(['social_instagram', 'social_facebook', 'social_tiktok'])
            ->each(fn ($key) => Setting::firstOrCreate(['key' => $key], ['value' => null]));

        Setting::firstOrCreate(
            ['key' => 'flash_sale_ends_at'],
            ['value' => now()->endOfDay()->format('Y-m-d\TH:i')],
        );

        Setting::firstOrCreate(
            ['key' => 'site_title'],
            ['value' => 'Rona Nuswa'],
        );

        Setting::firstOrCreate(
            ['key' => 'site_description'],
            ['value' => 'Sanggar Seni Rona Nuswa - Jasa Tari Jaipongan profesional, persewaan kostum tradisional, makeup panggung/wedding, dan kelas tari interaktif.'],
        );

        Setting::firstOrCreate(
            ['key' => 'hero_title'],
            ['value' => 'Rona Nuswa<br>Seni Tari & Entertainment'],
        );

        Setting::firstOrCreate(
            ['key' => 'hero_subtitle'],
            ['value' => 'Menyediakan pertunjukan tari Jaipongan kolosal, sewa kostum/kebaya premium, layanan makeup professional, serta paket wedding entertainment terima beres.'],
        );

        Setting::firstOrCreate(
            ['key' => 'banner_title'],
            ['value' => 'Pementasan Seni & Layanan Profesional'],
        );

        Setting::firstOrCreate(
            ['key' => 'banner_text'],
            ['value' => 'Sajikan keindahan budaya tradisional di setiap momen berhargamu bersama tim penari dan pengisi acara berpengalaman dari Sanggar Rona Nuswa.'],
        );

        Setting::firstOrCreate(
            ['key' => 'cta_text'],
            ['value' => 'Booking Sekarang →'],
        );

        Setting::firstOrCreate(
            ['key' => 'cta_link'],
            ['value' => '/products'],
        );

        Setting::firstOrCreate(
            ['key' => 'store_location'],
            ['value' => 'Bandung'],
        );

        Setting::firstOrCreate(
            ['key' => 'banner_button'],
            ['value' => 'Lihat Layanan Kami'],
        );

        Setting::firstOrCreate(
            ['key' => 'banner_link'],
            ['value' => '/products'],
        );

        Setting::firstOrCreate(
            ['key' => 'cara_belanja_content'],
            ['value' => '<p>Berikut adalah langkah-langkah mudah untuk melakukan booking layanan atau mendaftar kelas di Rona Nuswa.</p>
<hr>
<ol>
<li>
<h3>Pilih Layanan atau Paket</h3>
<p>Jelajahi pilihan paket pertunjukan tari, sewa kostum, jasa makeup, atau kelas sanggar di halaman <a href="/products">Layanan</a>. Kamu bisa memfilter pencarian berdasarkan kategori.</p>
</li>
<li>
<h3>Tentukan Ketentuan & Kebutuhan</h3>
<p>Pilih jumlah formasi penari, tipe makeup, jadwal latihan sanggar, atau paket wedding yang diinginkan sesuai spesifikasi kebutuhan acaramu.</p>
</li>
<li>
<h3>Masukkan ke Keranjang Acara</h3>
<p>Klik tombol "Tambah ke Keranjang" untuk menyimpan daftar pilihan pemesanan layananmu. Kamu bisa menggabungkan beberapa jasa sekaligus (misal: Tari + Jasa Makeup).</p>
</li>
<li>
<h3>Checkout Jadwal</h3>
<p>Tentukan tanggal pementasan, tanggal sewa kostum, atau pilihan pendaftaran sanggar. Masukkan detail informasi alamat lokasi acara secara lengkap sebelum memproses order.</p>
</li>
<li>
<h3>Pembayaran & Konfirmasi</h3>
<p>Lakukan pembayaran DP atau pelunasan sesuai instruksi sistem melalui transfer bank. Tim admin Rona Nuswa akan segera memvalidasi jadwal dan persiapan properti panggung.</p>
</li>
<li>
<h3>Pementasan & Pengembalian</h3>
<p>Untuk sewa kostum, ambil unit tepat waktu. Untuk pertunjukan wedding, tim dekorasi, MUA, dan penari kami akan tiba di lokasi sesuai kesepakatan jadwal.</p>
</li>
</ol>
<hr>
<p>Butuh konsultasi konsep acara khusus? Hubungi manajemen Rona Nuswa via WhatsApp untuk bantuan langsung.</p>'],
        );

        Setting::firstOrCreate(
            ['key' => 'about_content'],
            ['value' => '
<h3>Visi Kami</h3>
<p>Menjadi pusat pelestarian dan pengembangan seni tari tradisional Nusantara yang adaptif, profesional, serta tepercaya dalam menghadirkan kemewahan hiburan kebudayaan di era modern.</p>
<h3>Misi Kami</h3>
<ul>
<li>Menyajikan pertunjukan seni tari Jaipongan berkualitas tinggi dengan koreografi dinamis yang memukau.</li>
<li>Menyediakan fasilitas persewaan kostum tradisional dan kebaya formal yang terawat, anggun, dan lengkap.</li>
<li>Mengembangkan bakat seni generasi muda melalui bimbingan sanggar latihan yang terstruktur dan interaktif.</li>
<li>Memberikan solusi manajemen hiburan pernikahan (wedding entertainment) yang praktis, komprehensif, dan bernilai seni tinggi.</li>
</ul>
<hr>
<h3>Mengapa Memilih Rona Nuswa?</h3>
<ul>
<li>Penari & Artis Profesional: Seluruh penari dan pengisi acara kami telah melewati pelatihan intensif panggung.</li>
<li>Paket Terima Beres: Solusi lengkap mulai dari dekorasi, busana, tata rias wajah, tata suara (sound system), hingga MC acara.</li>
<li>Pelayanan Fleksibel: Manajemen kami siap menyesuaikan koreografi pertunjukan dan konsep tata rias dengan tema besar hajatan Anda.</li>
</ul>
'],
        );
    }
}