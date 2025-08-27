<x-user.navigasi />

<div class="container mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold mb-6">Keranjang Belanja</h2>

    {{-- Pesan sukses / error --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($keranjang->isEmpty())
        <p class="text-gray-600">Keranjang masih kosong.</p>
    @else
        {{-- TABEL KERANJANG --}}
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2"><input type="checkbox" id="checkAll"></th>
                        <th class="px-4 py-2">Produk</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keranjang as $item)
                        <tr class="border-b">
                            <td class="px-4 py-2 text-center">
                                {{-- ini diarahkan ke form checkout --}}
                                <input type="checkbox" name="keranjang_ids[]" value="{{ $item->keranjang_id }}" form="checkoutForm" class="checkItem">
                            </td>
                            <td class="px-4 py-2 flex items-center space-x-3">
                                <img src="{{ asset('storage/'.$item->pakaian->pakaian_gambar_url) }}" class="w-16 h-16 object-cover rounded">
                                <span>{{ $item->pakaian->pakaian_nama }}</span>
                            </td>
                            <td class="px-4 py-2">Rp {{ number_format($item->pakaian->pakaian_harga, 0, ',', '.') }}</td>
                            
                            {{-- UPDATE JUMLAH --}}
                            <td class="px-4 py-2">
                                <form action="{{ route('keranjang.update', $item->keranjang_id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="jumlah" value="{{ $item->keranjang_jumlah }}" min="1"
                                        class="w-16 border rounded px-2 py-1 text-center">
                                    <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded text-sm hover:bg-blue-600">Update</button>
                                </form>
                            </td>

                            <td class="px-4 py-2 font-semibold">Rp {{ number_format($item->keranjang_total_harga, 0, ',', '.') }}</td>
                            
                            {{-- HAPUS ITEM --}}
                            <td class="px-4 py-2">
                                <form action="{{ route('keranjang.destroy', $item->keranjang_id) }}" method="POST" onsubmit="return confirm('Yakin hapus item ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- FORM CHECKOUT (DIPISAH) --}}
        <form action="{{ route('keranjang.checkout') }}" method="POST" id="checkoutForm" class="mt-6">
            @csrf
            <label for="metode_pembayaran_id" class="block mb-2 font-semibold">Pilih Metode Pembayaran:</label>
            <select name="metode_pembayaran_id" id="metode_pembayaran_id" required
                class="w-full sm:w-1/2 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-black">
                @foreach(auth()->user()->metodes as $metode)
                    <option value="{{ $metode->metode_pembayaran_id }}">
                        {{ $metode->metode_pembayaran_jenis }} 
                        {{ $metode->metode_pembayaran_nomor ? '- '.$metode->metode_pembayaran_nomor : '' }}
                    </option>
                @endforeach
            </select>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">
                    Checkout
                </button>
            </div>
        </form>
    @endif
</div>

<script>
document.getElementById('checkAll')?.addEventListener('change', function() {
    document.querySelectorAll('.checkItem').forEach(cb => cb.checked = this.checked);
});
</script>
