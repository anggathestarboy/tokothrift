<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoPembelianController extends Controller
{
   public function index() {
    $pembelian = Pembelian::with([
        'metodePembayaran',
        'details.pakaian'
    ])->get();

    return view('admin.pembelian', compact('pembelian'));
}
}