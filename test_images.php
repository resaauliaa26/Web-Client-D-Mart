<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = \App\Models\Setting::pluck('value', 'key');
echo "Settings:\n";
echo "brand_logo: " . ($settings['brand_logo'] ?? 'N/A') . "\n";
echo "hero_image: " . ($settings['hero_image'] ?? 'N/A') . "\n";
echo "about_banner: " . ($settings['about_banner'] ?? 'N/A') . "\n";
echo "cara_belanja_banner: " . ($settings['cara_belanja_banner'] ?? 'N/A') . "\n";
