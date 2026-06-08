<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Ambil riwayat pesanan (orders) milik pengguna yang sedang login
        // Diurutkan dari yang terbaru
        $orders = $user->orders()->latest()->paginate(10);
        
        return view('account.index', compact('user', 'orders'));
    }
}
