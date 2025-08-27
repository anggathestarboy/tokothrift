<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MetodePembayaranController extends Controller
{
    // List semua metode pembayaran user
    public function index()
    {
        $user = Auth::user();
        $metode = MetodePembayaran::where('metode_pembayaran_user_id', $user->user_id)->get();
        return view('user.metode.index', compact('metode'));
    }

    // Form tambah metode
    public function create()
    {
        return view('user.metode.create');
    }

    // Simpan metode pembayaran baru
    public function store(Request $request)
    {
        $rules = [
            'metode_pembayaran_jenis' => 'required|in:DANA,OVO,BCA,COD',
        ];

        // Nomor hanya wajib jika bukan COD
        if ($request->metode_pembayaran_jenis !== 'COD') {
            $rules['metode_pembayaran_nomor'] = 'required|string|max:50';
        }

        $validated = $request->validate($rules);

        // Kalau COD → nomor = null
        if ($request->metode_pembayaran_jenis === 'COD') {
            $validated['metode_pembayaran_nomor'] = null;
        }

        $validated['metode_pembayaran_user_id'] = Auth::user()->user_id;

        MetodePembayaran::create($validated);

        return redirect()->route('metode.index')->with('success', 'Metode pembayaran berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        return view('user.metode.edit', compact('metode'));
    }

    // Update metode
    public function update(Request $request, $id)
    {
        $rules = [
            'metode_pembayaran_jenis' => 'required|in:DANA,OVO,BCA,COD',
        ];

        if ($request->metode_pembayaran_jenis !== 'COD') {
            $rules['metode_pembayaran_nomor'] = 'required|string|max:50';
        }

        $validated = $request->validate($rules);

        if ($request->metode_pembayaran_jenis === 'COD') {
            $validated['metode_pembayaran_nomor'] = null;
        }

        $metode = MetodePembayaran::findOrFail($id);
        $metode->update($validated);

        return redirect()->route('metode.index')->with('success', 'Metode pembayaran berhasil diperbarui!');
    }

    // Hapus metode
    public function destroy($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        $metode->delete();

        return redirect()->route('metode.index')->with('success', 'Metode pembayaran berhasil dihapus!');
    }

    // Ambil metode user (untuk AJAX / API)
    public function getUserMetode()
    {
        $user = Auth::user();
        $metodes = MetodePembayaran::where('metode_pembayaran_user_id', $user->user_id)->get();
        return response()->json($metodes);
    }
}
