<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Pakaian;
use App\Models\Category;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
     public function index()
    {
        $totalKategori  = Category::count();
        $totalPakaian   = Pakaian::count();
        $totalPembelian = Pembelian::count();
        $totalUser      = User::count();

        return view('admin.admin', compact(
            'totalKategori',
            'totalPakaian',
            'totalPembelian',
            'totalUser'
        ));
    }
}
