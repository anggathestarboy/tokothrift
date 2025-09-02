<x-user.navigasi />

<div class="container mx-auto p-4 md:p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Riwayat Pembelian Saya
    </h2>

    @if($pembelian->isEmpty())
        <div class="bg-white rounded-2xl p-8 text-center border border-gray-100 shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <p class="text-gray-600 text-lg mb-2">Belum ada riwayat pembelian</p>
            <p class="text-gray-500 text-sm mb-6">Mulai berbelanja dan lihat riwayat pembelian Anda di sini</p>
            <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-lg inline-block font-medium hover:bg-indigo-700 transition-colors">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach($pembelian as $item)
                <div class="border border-gray-200 rounded-2xl p-5 bg-white shadow-sm hover:shadow-md transition-shadow">
                    {{-- Header Transaksi --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-5 pb-4 border-b border-gray-100">
                        <div class="flex items-center">
                            <div class="bg-indigo-100 p-2 rounded-lg mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-600 text-sm font-medium">Tanggal Pembelian</p>
                                <p class="text-gray-800 font-semibold">{{ $item->pembelian_tanggal }}</p>
                            </div>
                        </div>
                        
                        <div class="mt-4 md:mt-0">
                            <div class="bg-gray-100 px-3 py-1 rounded-full inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <span class="text-gray-600 text-sm">
                                    {{ $item->metodePembayaran->metode_pembayaran_jenis ?? 'Tidak Diketahui' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Daftar Item --}}
                    <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($item->details as $detail)
                            <div class="border border-gray-200 rounded-xl p-4 bg-gradient-to-br from-white to-gray-50 hover:to-indigo-50 transition-all duration-300">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="font-semibold text-gray-800 text-lg line-clamp-1">
                                        {{ $detail->pakaian->pakaian_nama }}
                                    </h3>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-bold px-2 py-1 rounded-full">
                                        x{{ $detail->pembelian_detail_jumlah }}
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-600 text-sm">Harga Satuan</span>
                                    <span class="text-gray-800 font-medium">Rp {{ number_format($detail->pakaian->pakaian_harga, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                                    <span class="text-gray-800 font-semibold">Subtotal</span>
                                    <span class="text-indigo-600 font-bold">Rp {{ number_format($detail->pembelian_detail_total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Footer Transaksi --}}
                    <div class="mt-5 pt-4 border-t border-gray-100 flex justify-between items-center">
                        <div class="text-sm text-gray-600">
                            Total {{ count($item->details) }} item
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600 text-sm">Total Pembayaran</p>
                            <p class="text-xl font-bold text-indigo-600">
                                Rp {{ number_format($item->details->sum('pembelian_detail_total_harga'), 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
.line-clamp-1 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
}
</style>