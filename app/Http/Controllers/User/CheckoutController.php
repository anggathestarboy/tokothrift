<?php

namespace App\Http\Controllers\User;

use App\Models\Pakaian;
use App\Models\Pembelian;
use App\Models\PembelianDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Cek apakah user punya metode pembayaran
        if ($user->metodes->isEmpty()) {
            return redirect()->route('metode.index')
                ->with('error', 'Anda belum mempunyai metode pembayaran. Silakan tambahkan terlebih dahulu.');
        }

        // Ambil data pakaian
        $pakaian = Pakaian::findOrFail($request->pakaian_id);

        // Cek stok cukup
        if ($pakaian->pakaian_stok < $request->jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk pembelian ini.');
        }

        // Buat pembelian
        $pembelian = Pembelian::create([
            'pembelian_user_id' => $user->user_id,
            'pembelian_metode_pembayaran_id' => $request->metode_pembayaran,
            'pembelian_tanggal' => now(),
            'pembelian_total_harga' => 0
        ]);

        // Hitung total harga
        $total = $pakaian->pakaian_harga * $request->jumlah;

        // Buat detail pembelian
        PembelianDetail::create([
            'pembelian_detail_pembelian_id' => $pembelian->pembelian_id,
            'pembelian_detail_pakaian_id' => $pakaian->pakaian_id,
            'pembelian_detail_jumlah' => $request->jumlah,
            'pembelian_detail_total_harga' => $total
        ]);

        // Kurangi stok pakaian
        $pakaian->pakaian_stok -= $request->jumlah;
        $pakaian->save();

        // Update total harga pembelian
        $pembelian->update([
            'pembelian_total_harga' => $total
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pembelian berhasil dibuat!');
    }
}
