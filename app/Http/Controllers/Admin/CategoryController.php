<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function index()
    {
        $kategori = Category::orderBy('kategori_pakaian_id', 'desc')->paginate(5);
        return view('admin.category', compact('kategori'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_pakaian_nama' => 'required|string|max:50',
        ]);

        Category::create([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        return redirect('/admin/category');

        
    }



}
