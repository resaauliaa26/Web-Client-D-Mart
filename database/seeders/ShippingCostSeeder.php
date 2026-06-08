<?php

namespace Database\Seeders;

use App\Models\ShippingCost;
use Illuminate\Database\Seeder;

class ShippingCostSeeder extends Seeder
{
    public function run(): void
    {
        $cities = [
            ['city_name' => 'Bandung (Area Sanggar)', 'cost' => 0, 'cost_per_kg' => 0],
            ['city_name' => 'Kab. Bandung / Cimahi', 'cost' => 50000, 'cost_per_kg' => 3000],
            ['city_name' => 'Jakarta Pusat', 'cost' => 150000, 'cost_per_kg' => 10000],
            ['city_name' => 'Jakarta Selatan & Timur', 'cost' => 160000, 'cost_per_kg' => 10000],
            ['city_name' => 'Jakarta Barat & Utara', 'cost' => 170000, 'cost_per_kg' => 10000],
            ['city_name' => 'Bogor (Kota & Kabupaten)', 'cost' => 180000, 'cost_per_kg' => 12000],
            ['city_name' => 'Depok & Bekasi', 'cost' => 150000, 'cost_per_kg' => 10000],
            ['city_name' => 'Tangerang (Kota & Tangsel)', 'cost' => 190000, 'cost_per_kg' => 12000],
        ];

        foreach ($cities as $city) {
            ShippingCost::create($city);
        }
    }
}