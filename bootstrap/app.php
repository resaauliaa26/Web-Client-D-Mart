<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

if (isset($_ENV['VERCEL'])) {
    $tmpStorage = '/tmp/storage';
    $dirs = [
        $tmpStorage.'/app',
        $tmpStorage.'/framework/cache/data',
        $tmpStorage.'/framework/sessions',
        $tmpStorage.'/framework/views',
        $tmpStorage.'/logs',
    ];
    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}

return Application::configure(basePath: dirname(__DIR__))
    ->useStoragePath(isset($_ENV['VERCEL']) ? '/tmp/storage' : dirname(__DIR__).'/storage')
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Guest yang belum login dan mencoba akses route auth akan diarahkan ke /login (pelanggan)
        $middleware->redirectGuestsTo('/login');
        $middleware->validateCsrfTokens(except: [
            'midtrans/notification',
        ]);
        // Daftarkan alias middleware custom
        $middleware->alias([
            'is_admin' => \App\Http\Middleware\IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
