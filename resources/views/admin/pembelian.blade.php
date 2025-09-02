<x-admin.sidebar id="sidebar" />

<main class="p-4 md:p-6 space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <h2 class="text-2xl font-bold text-white bg-gradient-to-r p-4 rounded-lg shadow-md">
            <i class="fas fa-shopping-bag mr-2"></i>Data Pembelian
        </h2>
        
        <!-- Search -->
        <div class="search-container relative w-full md:w-64">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                <i class="fas fa-search"></i>
            </span>
            <input 
                type="search" 
                id="searchPembelian" 
                placeholder="Cari data pembelian..." 
                class="w-full pl-10 pr-4 py-2 text-sm border border-blue-500 rounded-lg bg-gray-800 text-white placeholder-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            />
        </div>
    </div>

    <!-- Alert -->
    @if(session('success'))
    <div id="success-alert" class="p-4 mb-4 text-white bg-gradient-to-r text-white rounded-xl shadow-lg flex items-center">
        <i class="fas fa-check-circle mr-3 text-xl"></i>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- Data Pembelian -->
    <div class="data-table fade-in bg-gray-800 rounded-xl shadow-lg overflow-hidden">
        <div class="table-header px-6 py-4 bg-gray-900">
            <h3 class="text-lg font-semibold text-white flex items-center">
                <i class="fas fa-list-alt mr-2"></i>Daftar Pembelian
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm sm:text-base hidden md:table">
                <thead>
                    <tr>
                        <th class="px-6 py-4 text-white font-medium">Nama User</th>
                        <th class="px-6 py-4 text-white font-medium">Metode Pembayaran</th>
                        <th class="px-6 py-4 text-white font-medium">Detail Pakaian</th>
                        <th class="px-6 py-4 text-white font-medium">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembelian as $item)
                        <tr class="table-row hover:bg-gray-750 transition-colors duration-200 border-b border-gray-700">
                            <td class="px-6 py-4">{{ $item->user->user_fullname }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-900 text-blue-200 rounded-full text-xs font-medium">
                                    {{ $item->metodePembayaran->metode_pembayaran_jenis }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col space-y-3">
                                    @foreach ($item->details as $detail)
                                        <div class="bg-gray-700 p-3 rounded-lg shadow-sm">
                                            <p class="font-medium text-white">
                                                {{ $detail->pakaian->pakaian_nama }}
                                            </p>
                                            <div class="flex justify-between mt-2 text-xs text-blue-300">
                                                <span>Jumlah: {{ $detail->pembelian_detail_jumlah }}</span>
                                                <span>Rp {{ number_format($detail->pakaian->pakaian_harga, 0, ',', '.') }}</span>
                                            </div>
                                            @if($detail->pakaian->pakaian_gambar_url)
                                                <img src="{{ asset('storage/' . $detail->pakaian->pakaian_gambar_url) }}" class="w-24 h-24 mt-2 rounded-md object-cover">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="bg-blue-900 p-3 rounded-lg text-center shadow-md">
                                    <p class="text-white font-bold text-lg">
                                        Rp {{ number_format($item->details->sum('pembelian_detail_total_harga'), 0, ',', '.') }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                                <i class="fas fa-shopping-cart text-4xl text-gray-500 mb-3"></i>
                                <p class="text-lg">Belum ada data pembelian</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- MOBILE VERSION -->
            <div class="space-y-4 md:hidden p-4">
                @forelse($pembelian as $item)
                    <div class="bg-gray-700 rounded-lg p-4 shadow-md space-y-3 mobile-card">
                        <div>
                            <p class="text-blue-300 text-xs">Nama User</p>
                            <p class="text-white font-semibold">{{ $item->user->user_fullname }}</p>
                        </div>
                        <div>
                            <p class="text-blue-300 text-xs">Metode Pembayaran</p>
                            <span class="px-3 py-1 bg-blue-900 text-blue-200 rounded-full text-xs font-medium">
                                {{ $item->metodePembayaran->metode_pembayaran_jenis }}
                            </span>
                        </div>
                        <div>
                            <p class="text-blue-300 text-xs">Detail Pakaian</p>
                            <div class="space-y-3">
                                @foreach ($item->details as $detail)
                                    <div class="bg-gray-600 p-3 rounded-lg">
                                        <p class="text-white font-medium">{{ $detail->pakaian->pakaian_nama }}</p>
                                        <div class="flex justify-between mt-2 text-xs text-blue-300">
                                            <span>Jumlah: {{ $detail->pembelian_detail_jumlah }}</span>
                                            <span>Rp {{ number_format($detail->pakaian->pakaian_harga, 0, ',', '.') }}</span>
                                        </div>
                                        @if($detail->pakaian->pakaian_gambar_url)
                                            <img src="{{ asset('storage/' . $detail->pakaian->pakaian_gambar_url) }}" class="w-full h-32 mt-2 rounded-md object-cover">
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <p class="text-blue-300 text-xs">Total</p>
                            <p class="text-white font-bold text-lg">
                                Rp {{ number_format($item->details->sum('pembelian_detail_total_harga'), 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-400 py-6">
                        <i class="fas fa-shopping-cart text-4xl text-gray-500 mb-3"></i>
                        <p class="text-lg">Belum ada data pembelian</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</main>


<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', () => {
    // === Hamburger Menu ===
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const sidebar = document.getElementById('sidebar');

    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            const isActive = sidebar.classList.contains('active');
            mobileMenuButton.textContent = isActive ? '✕' : '☰';
            mobileMenuButton.classList.toggle('bg-blue-700', isActive);
        });
    }

    // === Search (desktop + mobile) ===
    const searchInput = document.getElementById('searchPembelian');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();

            // Desktop table rows
            const rows = document.querySelectorAll('table .table-row');
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });

            // Mobile cards
            const cards = document.querySelectorAll('.mobile-card');
            cards.forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });
    }

    // === Auto Hide Alert ===
    const alert = document.getElementById("success-alert");
    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            alert.style.opacity = "0";
            alert.style.transform = "translateY(-10px)";
            setTimeout(() => alert.remove(), 500);
        }, 3000);
    }

    // === Hover Efek untuk item pakaian (desktop) ===
    const itemCards = document.querySelectorAll('.item-card');
    itemCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('shadow-lg', 'border-white');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('shadow-lg', 'border-white');
        });
    });
});
</script>



<style>
    .table-row:hover {
        background-color: rgba(55, 65, 81, 0.5) !important;
    }
    
    .bg-gray-750 {
        background-color: rgb(55, 65, 81);
    }
    
    .data-table {
        border: 1px solid rgba(75, 85, 99, 0.5);
    }
    
    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr {
            border: 1px solid rgba(75, 85, 99, 0.5);
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        
        td {
            border: none;
            position: relative;
            padding-left: 50% !important;
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
        }
        
        td:before {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            font-weight: 600;
            color: rgb(147, 197, 253);
        }
        
        td:nth-of-type(1):before { content: "Nama User"; }
        td:nth-of-type(2):before { content: "Metode Bayar"; }
        td:nth-of-type(3):before { content: "Detail Pakaian"; }
        td:nth-of-type(4):before { content: "Total"; }
    }
</style>