<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pakaian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class TableController extends Controller
{
    public function index()
    {
        $pakaian = Pakaian::with('kategori')->latest()->paginate(10);
        $kategori = Category::all();

        return view('admin.pakaian', compact('pakaian', 'kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pakaian_kategori_pakaian_id' => 'required|exists:kategori_pakaian,kategori_pakaian_id',
            'pakaian_nama' => 'required|string|max:50',
            'pakaian_harga' => 'required|numeric',
            'pakaian_stok' => 'required|integer',
            'pakaian_gambar_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('pakaian_gambar_url')) {
            $path = $request->file('pakaian_gambar_url')->store('pakaian', 'public');
            $validated['pakaian_gambar_url'] = $path;
        }

        Pakaian::create($validated);

        return redirect()->route('admin.pakaian.index')->with('success', 'Pakaian berhasil ditambahkan!');
    }
}
