<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Pakaian;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
          $kategori = Category::all();
          $pakaian = Pakaian::all();
        
        return view('user.dashboard' , compact('kategori', 'pakaian'));
    }



    public function byKategori($id)
{
    $kategori = Category::all(); // untuk list kategori di sidebar/header
    $pakaian =  Pakaian::where('pakaian_kategori_pakaian_id', $id)->with('kategori')->get();

    $kategoriAktif = Category::findOrFail($id);

    return view('user.dashboard', compact('kategori', 'pakaian', 'kategoriAktif'));
}

public function search(Request $request)
{
    $keyword = $request->get('q');

    $pakaian =   Pakaian::with('kategori')
                ->where('pakaian_nama', 'like', "%{$keyword}%")
                ->get();

    return response()->json($pakaian);
}


}
