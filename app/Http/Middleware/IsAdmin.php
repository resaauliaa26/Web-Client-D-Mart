<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Pastikan user sudah login DAN berstatus admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            Auth::logout();
            return redirect()->route('admin.login')
                ->with('error', 'Anda harus login sebagai Admin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
