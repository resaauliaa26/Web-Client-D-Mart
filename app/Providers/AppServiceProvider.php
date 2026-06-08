<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        
        // Force HTTPS in production (Vercel)
        if (isset($_ENV['VERCEL'])) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
