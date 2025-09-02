<x-user.navigasi />

<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        Keranjang Belanja
    </h2>

    {{-- Pesan sukses / error --}}
    @if(session('success'))
        <div class="bg-green-50 text-green-700 p-4 rounded-lg mb-6 flex items-center border border-green-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-50 text-red-700 p-4 rounded-lg mb-6 flex items-center border border-red-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
            {{ session('error') }}
        </div>
    @endif

    @if($keranjang->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <p class="text-gray-900 text-lg mb-2">Keranjang belanja Anda kosong</p>
            <p class="text-gray-700 text-sm mb-6">Mulai berbelanja dan tambahkan item ke keranjang Anda</p>
            <a href="{{ route('user.dashboard') }}" class="bg-gray-800 text-white px-6 py-3 rounded-lg inline-block font-medium hover:bg-gray-600 transition-colors">
                Jelajahi Produk
            </a>
        </div>
    @else
        {{-- Header untuk pilih semua --}}
        <div class="bg-white rounded-xl shadow-sm p-4 mb-5 flex items-center border border-gray-100">
            <input type="checkbox" id="checkAllMobile" class="h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
            <label for="checkAllMobile" class="ml-3 text-gray-700 font-medium">Pilih Semua Item</label>
        </div>

        {{-- Daftar item keranjang --}}
        <div class="space-y-4 mb-6">
            @foreach($keranjang as $item)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    {{-- Header item --}}
                    <div class="p-4 border-b border-gray-100 flex items-center">
                        <input type="checkbox" name="keranjang_ids[]" value="{{ $item->keranjang_id }}" 
                            form="checkoutForm" class="checkItem h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                        <span class="ml-3 text-gray-700 font-medium truncate">{{ $item->pakaian->pakaian_nama }}</span>
                    </div>
                    
                    {{-- Detail item --}}
                    <div class="p-4 flex">
                        <div class="relative">
                            <img src="{{ asset('storage/'.$item->pakaian->pakaian_gambar_url) }}" 
                                class="w-20 h-20 object-cover rounded-lg border border-gray-200">
                            <div class="absolute -top-2 -right-2 bg-indigo-100 text-indigo-800 text-xs font-bold px-2 py-1 rounded-full">
                                {{ $item->keranjang_jumlah }}
                            </div>
                        </div>
                        
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-start">
                                <div class="pr-2">
                                    <p class="text-gray-800 font-medium">{{ $item->pakaian->pakaian_nama }}</p>
                                    <p class="text-gray-600 text-sm mt-1">Rp {{ number_format($item->pakaian->pakaian_harga, 0, ',', '.') }}/item</p>
                                </div>
                                <form action="{{ route('keranjang.destroy', $item->keranjang_id) }}" method="POST" 
                                    onsubmit="return confirm('Yakin hapus item ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            {{-- Update jumlah --}}
                            <div class="mt-4 flex items-center justify-between">
                                <form action="{{ route('keranjang.update', $item->keranjang_id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                        <button type="button" class="decrement-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200">-</button>
                                        <input type="number" name="jumlah" value="{{ $item->keranjang_jumlah }}" min="1"
                                            class="quantity-input w-12 text-center border-0 focus:ring-0 focus:outline-none">
                                        <button type="button" class="increment-btn px-3 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200">+</button>
                                    </div>
                                    <button type="submit" class="ml-3 text-sm bg-indigo-100 text-gray-600 px-3 py-2 rounded-lg hover:bg-indigo-200 transition-colors">
                                        Update
                                    </button>
                                </form>
                                
                                <div class="text-right">
                                    <p class="text-gray-600 text-sm">Subtotal</p>
                                    <p class="text-lg font-bold text-gray-600">Rp {{ number_format($item->keranjang_total_harga, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

       

        {{-- FORM CHECKOUT --}}
        <form action="{{ route('keranjang.checkout') }}" method="POST" id="checkoutForm">
            @csrf
            <div class="bg-white rounded-xl shadow-sm p-5 mb-6 border border-gray-100">
                <h3 class="font-bold text-lg mb-4 text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    Metode Pembayaran
                </h3>
                
                <select name="metode_pembayaran_id" id="metode_pembayaran_id" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach(auth()->user()->metodes as $metode)
                        <option value="{{ $metode->metode_pembayaran_id }}">
                            {{ $metode->metode_pembayaran_jenis }} 
                            {{ $metode->metode_pembayaran_nomor ? '- '.$metode->metode_pembayaran_nomor : '' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold text-lg hover:bg-gray-700 transition-colors shadow-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Checkout Sekarang
            </button>
        </form>



    @endif
</div>





<script>
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk select all checkbox
    const checkAllMobile = document.getElementById('checkAllMobile');
    if (checkAllMobile) {
        checkAllMobile.addEventListener('change', function() {
            document.querySelectorAll('.checkItem').forEach(cb => cb.checked = this.checked);
        });
    }
    
    // Fungsi untuk increment dan decrement quantity
    document.querySelectorAll('.increment-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            input.value = parseInt(input.value) + 1;
        });
    });
    
    document.querySelectorAll('.decrement-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        });
    });
});
</script>

<style>
.quantity-input {
    -moz-appearance: textfield;
}
.quantity-input::-webkit-outer-spin-button,
.quantity-input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>