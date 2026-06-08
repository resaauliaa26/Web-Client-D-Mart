<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all()->keyBy('slug');

        $products = [
            // 1. JASA TARI JAIPONGAN (Slug: 'jasa-tari')
            [
                'category_id' => $categories['jasa-tari']->id,
                'name' => 'Paket Tari Jaipongan (4 Penari) - Rona Nuswa',
                'description' => 'Layanan tari tradisional Jaipongan oleh Sanggar Rona Nuswa untuk penyambutan tamu, wedding, persembahan pengantin, atau event formal. Durasi tampil 10-20 menit. Harga sudah termasuk kostum dasar.',
                'price' => 1400000,
                'sale_price' => null,
                'image' => 'products/taritradisional.png',
                'badge' => 'POPULER',
                'weight' => 0,
                'sizes' => ['4 Orang'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco'],
                ],
            ],
            [
                'category_id' => $categories['jasa-tari']->id,
                'name' => 'Paket Tari Jaipongan (5 Penari) - Rona Nuswa',
                'description' => 'Layanan pertunjukan tari Jaipongan profesional dengan formasi 5 orang penari dari Sanggar Rona Nuswa. Sangat cocok untuk panggung skala menengah, acara kampus, sekolah, maupun ulang tahun.',
                'price' => 2000000,
                'sale_price' => null,
                'image' => 'products/tariclasik.png',
                'badge' => null,
                'weight' => 0,
                'sizes' => ['5 Orang'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco'],
                ],
            ],
            [
                'category_id' => $categories['jasa-tari']->id,
                'name' => 'Paket Tari Jaipongan (6 Penari) - Rona Nuswa',
                'description' => 'Formasi maksimal 6 penari dari Sanggar Rona Nuswa untuk pertunjukan grand opening, wedding megah, atau acara formal kenegaraan. Penampilan kolosal, dinamis, dan memukau.',
                'price' => 2700000,
                'sale_price' => null,
                'image' => 'products/tariclasicmodern.jpeg',
                'badge' => 'EXCLUSIVE',
                'weight' => 0,
                'sizes' => ['6 Orang'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco'],
                ],
            ],

            // 2. SEWA KOSTUM & KEBAYA (Slug: 'sewa-kostum')
            [
                'category_id' => $categories['sewa-kostum']->id,
                'name' => 'Sewa Kostum Jaipong Klasik / Modern',
                'description' => 'Koleksi kostum Sanggar Rona Nuswa. Pilihan varian: Kostum Jaipong Merah, Hitam Emas, atau Sunda Modern. Ketentuan: Masa sewa 1 hari, wajib kembali tepat waktu dalam kondisi baik.',
                'price' => 100000,
                'sale_price' => null,
                'image' => 'products/KOstum1.png',
                'badge' => 'RENT',
                'weight' => 500,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => [
                    ['hex' => '#3D2314', 'name' => 'Hitam Emas / Dark Choco'],
                    ['hex' => '#D4AF37', 'name' => 'Gold Premium'],
                ],
            ],
            [
                'category_id' => $categories['sewa-kostum']->id,
                'name' => 'Sewa Kebaya Wisuda / Event / Lamaran',
                'description' => 'Kebaya anggun koleksi Rona Nuswa untuk acara wisuda, lamaran, event formal, atau acara keluarga. Harga sewa per hari. Wajib tepat waktu dan tidak menerima unit dengan kerusakan berat.',
                'price' => 100000,
                'sale_price' => null,
                'image' => 'products/sewabajuwisuda.png',
                'badge' => 'BEST',
                'weight' => 400,
                'sizes' => ['M', 'L', 'XL'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Matte'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco'],
                ],
            ],
            [
                'category_id' => $categories['sewa-kostum']->id,
                'name' => 'Sewa Aksesoris Tari & Headpiece',
                'description' => 'Sewa pelengkap penampilan panggung Rona Nuswa. Pilihan item: Mahkota/Headpiece (Rp30k), Selendang (Rp25k), atau Perhiasan Tari Tradisional lengkap (Rp30k - Rp50k).',
                'price' => 50000,
                'sale_price' => 25000,
                'image' => 'products/Kostum2.png',
                'badge' => 'ADD-ON',
                'weight' => 100,
                'sizes' => ['All Size'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Kencana'],
                    ['hex' => '#3D2314', 'name' => 'Choco Classic'],
                ],
            ],

            // 3. MAKEUP SERVICE (Slug: 'makeup')
            [
                'category_id' => $categories['makeup']->id,
                'name' => 'Jasa Makeup Tari / Panggung Professional',
                'description' => 'Karakter makeup bold/panggung dari MUA Rona Nuswa yang disesuaikan dengan tema tarian. Sudah termasuk bulu mata basic dan produk berkualitas tinggi tahan keringat.',
                'price' => 100000,
                'sale_price' => null,
                'image' => 'products/makeuptari.png',
                'badge' => 'SERVICE',
                'weight' => 0,
                'sizes' => ['Professional'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Look'],
                    ['hex' => '#3D2314', 'name' => 'Choco Bold'],
                ],
            ],
            [
                'category_id' => $categories['makeup']->id,
                'name' => 'Jasa Makeup Wisuda / Formal Event',
                'description' => 'Makeup dengan look natural atau semi-glam oleh tim Rona Nuswa, sangat cocok untuk momen wisuda, menghadiri pesta, ataupun acara formal kenegaraan.',
                'price' => 150000,
                'sale_price' => null,
                'image' => 'products/makeupwisuda.png',
                'badge' => 'SERVICE',
                'weight' => 0,
                'sizes' => ['Semi-Glam'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Elegant'],
                    ['hex' => '#3D2314', 'name' => 'Choco Nude'],
                ],
            ],
            [
                'category_id' => $categories['makeup']->id,
                'name' => 'Jasa Makeup Wedding / Lamaran Premium',
                'description' => 'Makeup pengantin premium dan eksklusif Rona Nuswa. Sudah termasuk basic hair styling atau hijab styling sederhana yang disesuaikan dengan kebutuhan dan adat acara.',
                'price' => 700000,
                'sale_price' => 300000,
                'image' => 'products/makeup.png',
                'badge' => 'PREMIUM',
                'weight' => 0,
                'sizes' => ['Premium Look'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Royal Gold'],
                    ['hex' => '#3D2314', 'name' => 'Luxury Choco'],
                ],
            ],

            // 4. SANGGAR & KELAS TARI (Slug: 'sanggar-kelas')
            [
                'category_id' => $categories['sanggar-kelas']->id,
                'name' => 'SPP Bulanan Kelas Tari - Anak-Anak',
                'description' => 'Kelas latihan sanggar tari Rona Nuswa khusus kategori anak-anak. Jadwal latihan 2x seminggu (Pilihan: Rabu & Sabtu / Sabtu & Minggu). Pendaftaran online atau datang langsung.',
                'price' => 150000,
                'sale_price' => null,
                'image' => 'products/tarikontemporer.png',
                'badge' => 'SANGGAR',
                'weight' => 0,
                'sizes' => ['2x Seminggu'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Rona Gold'],
                ],
            ],
            [
                'category_id' => $categories['sanggar-kelas']->id,
                'name' => 'SPP Bulanan Kelas Tari - Remaja',
                'description' => 'Kelas sanggar tari intensif Rona Nuswa untuk kategori remaja. Mengajarkan teknik dasar hingga koreografi jaipongan panggung yang dinamis. Latihan reguler 2x dalam seminggu.',
                'price' => 200000,
                'sale_price' => null,
                'image' => 'products/kostum3.png',
                'badge' => 'SANGGAR',
                'weight' => 0,
                'sizes' => ['2x Seminggu'],
                'colors' => [
                    ['hex' => '#3D2314', 'name' => 'Nuswa Choco'],
                ],
            ],
            [
                'category_id' => $categories['sanggar-kelas']->id,
                'name' => 'SPP Bulanan Kelas Tari - Dewasa',
                'description' => 'Kelas tari Jaipongan dan seni panggung bagi usia dewasa di Sanggar Rona Nuswa. Sangat bagus untuk kebugaran fisik sekaligus melestarikan khazanah budaya luhur.',
                'price' => 250000,
                'sale_price' => null,
                'image' => 'products/dashboard.png',
                'badge' => 'SANGGAR',
                'weight' => 0,
                'sizes' => ['2x Seminggu'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Rona Gold'],
                    ['hex' => '#3D2314', 'name' => 'Nuswa Choco'],
                ],
            ],

            // 5. PAKET WEDDING & ENTERTAINMENT (Slug: 'paket-wedding')
            [
                'category_id' => $categories['paket-wedding']->id,
                'name' => 'Wedding Paket Silver - Rona Nuswa',
                'description' => 'Terima Beres Paket Silver meliputi: Dekorasi sederhana (backdrop + bunga basic), Makeup pengantin, Tari Jaipongan 4 penari, Kostum tari premium, dan Dokumentasi foto sederhana.',
                'price' => 3500000,
                'sale_price' => null,
                'image' => 'products/paketsilver.png',
                'badge' => 'SILVER',
                'weight' => 0,
                'sizes' => ['Paket Terima Beres'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Decoration'],
                    ['hex' => '#3D2314', 'name' => 'Choco Accent'],
                ],
            ],
            [
                'category_id' => $categories['paket-wedding']->id,
                'name' => 'Wedding Paket Gold - Rona Nuswa',
                'description' => 'Terima Beres Paket Gold meliputi: Dekorasi pelaminan lebih lengkap, Makeup pengantin, Tari Jaipongan 4-5 penari + Kostum, MC / entertainment sederhana, serta Dokumentasi foto & video basic.',
                'price' => 6000000,
                'sale_price' => null,
                'image' => 'products/paketgold.png',
                'badge' => 'RECOMMENDED',
                'weight' => 0,
                'sizes' => ['Paket Terima Beres'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Gold Theme'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco Theme'],
                ],
            ],
            [
                'category_id' => $categories['paket-wedding']->id,
                'name' => 'Wedding Paket Premium All-In (Rona Nuswa)',
                'description' => 'Paket Premium All-In: Dekorasi wedding penuh, Makeup pengantin + keluarga inti, Tari Jaipongan 5-6 penari + kostum, MC, Live Music/Entertainment (bisa upgrade guest star), Dokumentasi foto video profesional, Tim WO lapangan, & Sound system.',
                'price' => 12000000,
                'sale_price' => null,
                'image' => 'products/paket premium.png',
                'badge' => 'PREMIUM',
                'weight' => 0,
                'sizes' => ['All-In Event'],
                'colors' => [
                    ['hex' => '#D4AF37', 'name' => 'Royal Gold Luxury'],
                    ['hex' => '#3D2314', 'name' => 'Dark Choco Exclusive'],
                ],
            ],
        ];

        foreach ($products as $data) {
            Product::create($data);
        }
    }
}