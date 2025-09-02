<?php

namespace App\Http\Controllers\User;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Ambil data pembelian user langsung dari tabel pembelian
    $pembelian = Pembelian::with([
        'metodePembayaran',
        'details.pakaian'
    ])
    ->where('pembelian_user_id', $user->user_id)
    ->get();

    return view('user.pembelian.pesanan', compact('pembelian'));
}
}
