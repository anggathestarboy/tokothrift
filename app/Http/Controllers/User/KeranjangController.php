<?php

namespace App\Http\Controllers\User;

use App\Models\Pakaian;
use App\Models\Keranjang;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::with('pakaian')
            ->where('keranjang_user_id', Auth::id())
            ->get();

        return view('user.keranjang', compact('keranjang'));
    }

    // Tambah item ke keranjang
    public function store(Request $request)
    {
        $pakaian = Pakaian::findOrFail($request->pakaian_id);

        $item = Keranjang::where('keranjang_user_id', Auth::id())
            ->where('keranjang_pakaian_id', $pakaian->pakaian_id)
            ->first();

        if ($item) {
            $item->keranjang_jumlah += $request->jumlah;
            $item->keranjang_total_harga = $item->keranjang_jumlah * $pakaian->pakaian_harga;
            $item->save();
        } else {
            Keranjang::create([
                'keranjang_user_id' => Auth::id(),
                'keranjang_pakaian_id' => $pakaian->pakaian_id,
                'keranjang_jumlah' => $request->jumlah,
                'keranjang_total_harga' => $request->jumlah * $pakaian->pakaian_harga,
            ]);
        }

        return redirect()->route('keranjang.index')->with('success', 'Barang ditambahkan ke keranjang');
    }

        public function update(Request $request, $id)
{
    $item = Keranjang::where('keranjang_id', $id)
        ->where('keranjang_user_id', Auth::id())
        ->firstOrFail();

    $pakaian = Pakaian::findOrFail($item->keranjang_pakaian_id);

    $request->validate([
        'jumlah' => 'required|integer|min:1'
    ]);

    $item->keranjang_jumlah = $request->jumlah;
    $item->keranjang_total_harga = $request->jumlah * $pakaian->pakaian_harga;
    $item->save();

    return redirect()->route('keranjang.index')->with('success', 'Jumlah barang diperbarui.');
}

public function destroy($id)
{
    $item = Keranjang::where('keranjang_id', $id)
        ->where('keranjang_user_id', Auth::id())
        ->firstOrFail();

    $item->delete();

    return redirect()->route('keranjang.index')->with('success', 'Item dihapus dari keranjang.');
}

    // Checkout item terpilih
    public function checkout(Request $request)
    {
        $keranjangIds = $request->input('keranjang_ids'); // array dari checkbox
         // Kalau kosong tampilkan error
    if (empty($keranjangIds)) {
        return redirect()->back()->with('error', 'Silakan pilih minimal 1 barang untuk checkout.');
    }
        $items = Keranjang::whereIn('keranjang_id', $keranjangIds)
            ->where('keranjang_user_id', Auth::id())
            ->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada item yang dipilih');
        }

        // Buat pembelian
        $pembelian = Pembelian::create([
            'pembelian_user_id' => Auth::id(),
            'pembelian_metode_pembayaran_id' => $request->metode_pembayaran_id,
            'pembelian_tanggal' => now(),
            'pembelian_total_harga' => $items->sum('keranjang_total_harga'),
        ]);

        foreach ($items as $item) {
            // Ambil data pakaian
            $pakaian = Pakaian::find($item->keranjang_pakaian_id);

            if ($pakaian) {
                // Cek stok cukup atau tidak
                if ($pakaian->pakaian_stok < $item->keranjang_jumlah) {
                    return redirect()->back()->with('error', "Stok {$pakaian->pakaian_nama} tidak mencukupi!");
                }

                // Kurangi stok pakaian
                $pakaian->pakaian_stok -= $item->keranjang_jumlah;
                $pakaian->save();
            }

            // Simpan ke detail pembelian
            PembelianDetail::create([
                'pembelian_detail_pembelian_id' => $pembelian->pembelian_id,
                'pembelian_detail_pakaian_id' => $item->keranjang_pakaian_id,
                'pembelian_detail_jumlah' => $item->keranjang_jumlah,
                'pembelian_detail_total_harga' => $item->keranjang_total_harga,
            ]);

            // Hapus dari keranjang
            $item->delete();
        }

        return redirect()->route('keranjang.index')->with('success', 'Checkout berhasil! Stok barang sudah diperbarui.');
    }


}
