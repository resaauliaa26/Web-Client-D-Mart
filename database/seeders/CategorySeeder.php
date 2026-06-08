<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Jasa Tari Jaipongan', 
                'slug' => 'jasa-tari', 
                'image' => 'products/taritradisional.png', 
                'order' => 1
            ],
            [
                'name' => 'Sewa Kostum & Kebaya', 
                'slug' => 'sewa-kostum', 
                'image' => 'products/KOstum1.png', 
                'order' => 2
            ],
            [
                'name' => 'Makeup Service', 
                'slug' => 'makeup', 
                'image' => 'products/makeup.png', 
                'order' => 3
            ],
            [
                'name' => 'Sanggar & Kelas Tari', 
                'slug' => 'sanggar-kelas', 
                'image' => 'products/dashboard.png', 
                'order' => 4
            ],
            [
                'name' => 'Paket Wedding & Entertainment', 
                'slug' => 'paket-wedding', 
                'image' => 'products/paket premium.png', 
                'order' => 5
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}