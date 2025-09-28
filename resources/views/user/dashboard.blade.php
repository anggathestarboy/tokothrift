<x-user.navigasi />




    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold mb-4">Temukan Fashion Thrift Terbaik</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Koleksi pakaian bekas berkualitas dengan harga terjangkau. Gaya unik, ramah lingkungan.
            </p>
            
        </div>
    </section>

    <!-- Categories -->
    <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h3 class="text-3xl font-bold text-center mb-12">Kategori Pilihan</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach($kategori as $kat)
                <a href="{{ route('kategori.show', $kat->kategori_pakaian_id) }}">
                    <div class="bg-white rounded-xl p-5 text-center shadow-lg card-hover cursor-pointer 
                                {{ isset($kategoriAktif) && $kategoriAktif->kategori_pakaian_id == $kat->kategori_pakaian_id ? 'border-2 border-black' : '' }}">
                        <h4 class="font-semibold">{{ $kat->kategori_pakaian_nama }}</h4>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<br><br>



<!-- Search hanya di mobile --> <div class="px-4 py-2 sm:hidden"> <input type="text" id="searchPakaianMobile" placeholder="Cari produk di mobile..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black" > </div>


    <!-- Products Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">

           <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-12 space-y-3 sm:space-y-0">
    @if(isset($kategoriAktif))
        <a href="{{ route('user.dashboard') }}">
            <button class="bg-black text-white px-3 py-2 rounded-xl text-sm sm:text-base">
                &laquo; Kembali ke Halaman Utama
            </button>
        </a>
        <br><br>
        <h3 class="text-xl text-center sm:text-left">
            Produk Kategori: {{ $kategoriAktif->kategori_pakaian_nama }}
        </h3>
        
    @else
        <h3 class="text-xl sm:text-2xl text-center">
            Produk Terbaru
        </h3>
    @endif
</div>



 @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
 @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-12 space-y-3 sm:space-y-0">


           <div id="produkGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach($pakaian as $data)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
            <div class="relative">
                <img src="{{ asset('storage/' . $data->pakaian_gambar_url) }}" 
                     alt="Foto Baju" 
                     class="w-full h-64 object-cover">
                <div class="product-badge">{{ $data->kategori->kategori_pakaian_nama }}</div>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-lg mb-2">{{ $data->pakaian_nama }}</h4>
                <p class="text-gray-600 text-sm mb-3">Stok: {{ $data->pakaian_stok }}</p>
                <div class="flex justify-between items-center" style="gap: 10px">
                    <span class="price-tag">Rp {{ number_format($data->pakaian_harga, 2, ',', '.') }}</span>
       <button data-id="{{ $data->pakaian_id }}" 
        class="btn-checkout bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
Beli Sekarang

</button>
 {{-- Tombol Keranjang --}}
    <form action="{{ route('user.metode.create') }}" method="POST" class="inline">
        @csrf
        <input type="hidden" name="pakaian_id" value="{{ $data->pakaian_id }}">
        <input type="hidden" name="jumlah" value="1">
    {{-- Tombol Keranjang --}}
<button 
    type="button" 
    data-id="{{ $data->pakaian_id }}" 
    data-nama="{{ $data->pakaian_nama }}" 
    class="btn-keranjang bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
    <i class="fas fa-shopping-cart"></i>

</button>
    </form>

                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal Keranjang -->
<div id="keranjangModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-96 shadow-xl">
        <h3 class="text-xl font-bold mb-4">Tambah ke Keranjang</h3>
        <p id="keranjangNama" class="mb-4 text-gray-700"></p>
        <form id="keranjangForm" method="POST" action="{{ route('user.metode.create') }}">
            @csrf
            <input type="hidden" name="pakaian_id" id="keranjangPakaianId">
            
            <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" name="jumlah" id="keranjangJumlah" min="1" value="1" 
                   class="w-full border px-3 py-2 rounded-lg mb-4" required>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeKeranjangModal()" 
                        class="px-4 py-2 bg-gray-300 rounded-lg">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-700">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>



<!-- Modal Checkout -->
<div id="checkoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-6 w-96 shadow-xl">

        {{-- Kondisi jika user belum punya metode pembayaran --}}
        @if(auth()->user()->metodes->isEmpty())
            <h3 class="text-xl font-bold mb-4">Metode Pembayaran Tidak Ditemukan</h3>
            <p class="text-gray-600 mb-6">
                Anda belum mempunyai metode pembayaran. Silakan tambahkan terlebih dahulu sebelum melanjutkan checkout.
            </p>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="closeCheckoutModal()" class="px-4 py-2 bg-gray-300 rounded-lg">
                    Tutup
                </button>
                <a href="{{ route('metode.index') }}" class="px-4 py-2 bg-black text-white rounded-lg">
                    Tambahkan Sekarang!
                </a>
            </div>

        @else
            <h3 class="text-xl font-bold mb-4">Pilih Metode Pembayaran</h3>
            <form id="checkoutForm" method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <input type="hidden" name="pakaian_id" id="checkoutPakaianId">
                <input type="hidden" name="jumlah" value="1"> 

                <!-- List metode user -->
                <div id="userMetodeContainer" class="space-y-2">
                    @foreach(auth()->user()->metodes as $metode)
                        @if(strtolower($metode->metode_pembayaran_jenis) !== 'cod')
                            <label class="flex items-center space-x-2 border rounded-lg p-2 cursor-pointer hover:bg-gray-100">
                                <input type="radio" name="metode_pembayaran" value="{{ $metode->metode_pembayaran_id }}" required>
                                <span>{{ $metode->metode_pembayaran_jenis }} {{ $metode->metode_pembayaran_nomor ? '- '.$metode->metode_pembayaran_nomor : '' }}</span>
                            </label>
                        @endif
                    @endforeach
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" onclick="closeCheckoutModal()" class="px-4 py-2 bg-gray-300 rounded-lg">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 bg-black text-white rounded-lg">
                        Bayar
                    </button>
                </div>
            </form>
        @endif

    </div>
</div>





        

               
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="bg-white text-black p-2 rounded-lg">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <span class="text-xl font-bold">TOKO THRIFT</span>
                    </div>
                    <p class="text-gray-400 mb-4">Platform marketplace terpercaya untuk fashion thrift berkualitas tinggi.</p>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/rizzz_anggara" target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="https://discord.com/channels/rizzz_anggara9" target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-discord"></i></a>
                        <a href="https://x.com/ItsKingAnggara" target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.tiktok.com/@thisiscoldman"  target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Kategori</h5>
                    <ul class="space-y-2 text-gray-400">
                        @foreach ($kategori as $kat)
                            
                        <li><a href="{{ route('kategori.show', $kat->kategori_pakaian_id) }}" class="hover:text-white">{{ $kat->kategori_pakaian_nama }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Menu</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{  route('user.dashboard') }}" class="hover:text-white">Home</a></li>
                        <li><a href="{{  route('user.profile.index') }}" class="hover:text-white">Profile</a></li>
                        <li><a href="{{  route('keranjang.index') }}" class="hover:text-white">Keranjang</a></li>
 

                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Dapatkan pengalaman yang terbaik</h5>
                    <p class="text-gray-400 mb-4">Kepuasan pelanggan adalah tugas kami, selalu ikuti perkembangan dari <i>Toko Thrift</i></p>

                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 TOKO THRIFT. All rights reserved</p>
            </div>
        </div>
    </footer>



<script>
// daftar input search yang dipakai (desktop & mobile)
['searchPakaianDesktop', 'searchPakaianMobile'].forEach(id => {
    let input = document.getElementById(id);
    if (input) {
        input.addEventListener('keyup', function() {
            let query = this.value.trim();

            // jika kosong -> load semua produk
            if (query === "") {
                fetch(`{{ route('pakaian.search') }}`)
                    .then(res => res.json())
                    .then(renderProduk);
                return;
            }

            // jika ada isi -> search
            fetch(`{{ route('pakaian.search') }}?q=${query}`)
                .then(res => res.json())
                .then(renderProduk);
        });
    }
});

// fungsi render produk
function renderProduk(data) {
    let container = document.getElementById('produkGrid');
    container.innerHTML = '';

    if (!data || data.length === 0) {
        container.innerHTML = '<p class="text-center col-span-4">Tidak ada produk ditemukan</p>';
        return;
    }

    data.forEach(item => {
        let harga = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(item.pakaian_harga);

        container.innerHTML += `
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
            <div class="relative">
                <img src="/storage/${item.pakaian_gambar_url}" 
                     alt="Foto Baju" 
                     class="w-full h-64 object-cover">
                <div class="product-badge">${item.kategori.kategori_pakaian_nama}</div>
            </div>
            <div class="p-4">
                <h4 class="font-semibold text-lg mb-2">${item.pakaian_nama}</h4>
                <p class="text-gray-600 text-sm mb-3">Stok: ${item.pakaian_stok}</p>
                <div class="flex justify-between items-center gap-2">
                    <span class="price-tag">${harga}</span>
                    
                    <!-- Tombol Checkout -->
                    <button data-id="${item.pakaian_id}" 
                        class="btn-checkout bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                        Checkout
                    </button>

                    <!-- Tombol Keranjang -->
                    <button 
                        type="button" 
                        data-id="${item.pakaian_id}" 
                        data-nama="${item.pakaian_nama}" 
                        class="btn-keranjang bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>`;
    });

    // re-bind event setelah render ulang
    document.querySelectorAll('.btn-checkout').forEach(btn => {
        btn.addEventListener('click', function() {
            let pakaianId = this.getAttribute('data-id');
            openCheckoutModal(pakaianId);
        });
    });

    document.querySelectorAll('.btn-keranjang').forEach(btn => {
        btn.addEventListener('click', function() {
            let pakaianId = this.getAttribute('data-id');
            let nama = this.getAttribute('data-nama');
            openKeranjangModal(pakaianId, nama);
        });
    });
}



function openCheckoutModal(pakaianId) {
    document.getElementById('checkoutModal').classList.remove('hidden');
    document.getElementById('checkoutPakaianId').value = pakaianId;

    // fetch metode pembayaran user
    fetch(`{{ route('metode.user') }}`)
        .then(res => res.json())
        .then(data => {
            let container = document.getElementById('userMetodeContainer');
            container.innerHTML = "";

            data.forEach(item => {
                container.innerHTML += `
                    <div class="mb-2">
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="metode_pembayaran" value="${item.metode_pembayaran_id}">
                            <span>${item.metode_pembayaran_jenis} - ${item.metode_pembayaran_nomor ?? ''}</span>
                        </label>
                    </div>
                `;
            });
        });
}

function closeCheckoutModal() {
    document.getElementById('checkoutModal').classList.add('hidden');
}

// Ganti tombol checkout agar buka modal
document.querySelectorAll('.btn-checkout').forEach(btn => {
    btn.addEventListener('click', function() {
        let pakaianId = this.getAttribute('data-id');
        openCheckoutModal(pakaianId);
    });
});

function openKeranjangModal(pakaianId, nama) {
    document.getElementById('keranjangModal').classList.remove('hidden');
    document.getElementById('keranjangPakaianId').value = pakaianId;
    document.getElementById('keranjangNama').innerText = "Produk: " + nama;
    document.getElementById('keranjangJumlah').value = 1; // default 1
}

function closeKeranjangModal() {
    document.getElementById('keranjangModal').classList.add('hidden');
}

// Event untuk tombol keranjang
document.querySelectorAll('.btn-keranjang').forEach(btn => {
    btn.addEventListener('click', function() {
        let pakaianId = this.getAttribute('data-id');
        let nama = this.getAttribute('data-nama');
        openKeranjangModal(pakaianId, nama);
    });
});

</script>


</body>
</html>