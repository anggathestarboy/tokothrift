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

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');

        
    }

public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_pakaian_nama' => 'required|string|max:50',
        ]);

        $kategori = Category::findOrFail($id);
        $kategori->update([
            'kategori_pakaian_nama' => $request->kategori_pakaian_nama,
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil diupdate.');
    }


      public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori berhasil dihapus.');
    }



public function search(Request $request) {
    $kategori_pakaian_nama = $request->query('kategori_pakaian_nama');

    if ($kategori_pakaian_nama) {
        $categories = Category::where('kategori_pakaian_nama', 'like', "%$kategori_pakaian_nama%")->get();
    } else {
        $categories = Category::all(); // kalau kosong, ambil semua
    }

    return response()->json($categories);
}




}




