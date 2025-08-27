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
        $pakaian = Pakaian::with('kategori')->latest()->paginate(5);
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

  public function search(Request $request) {
    $pakaian_nama = $request->query('pakaian_nama', '');
    $pakaian = Pakaian::getPakaianByName($pakaian_nama);

    return response()->json($pakaian);
}


public function edit($id)
{
    $pakaian = Pakaian::findOrFail($id);
    return response()->json($pakaian);
}

public function update(Request $request, $id)
{
    $pakaian = Pakaian::findOrFail($id);

    $pakaian->update([
        'pakaian_nama' => $request->pakaian_nama,
        'pakaian_harga' => $request->pakaian_harga,
        'pakaian_stok' => $request->pakaian_stok,
        'pakaian_kategori_pakaian_id' => $request->pakaian_kategori_pakaian_id,
    ]);

    if ($request->hasFile('pakaian_gambar_url')) {
        $path = $request->file('pakaian_gambar_url')->store('pakaian', 'public');
        $pakaian->update(['pakaian_gambar_url' => $path]);
    }

    return redirect()->route('admin.pakaian.index')->with('success', 'Data pakaian berhasil diperbarui');
}

public function destroy($id)
{
    $pakaian = Pakaian::findOrFail($id);
    $pakaian->delete();

    return response()->json(['message' => 'Data pakaian berhasil dihapus']);
}




}
