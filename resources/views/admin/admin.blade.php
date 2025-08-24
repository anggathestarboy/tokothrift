<x-admin.sidebar />

        <!-- Dashboard Content -->
        <main class="p-6 space-y-8">
            <!-- Main Dashboard Cards -->
            <div class="stats-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 fade-in">
                <!-- Card 1: Kategori -->
                <div class="stats-card">
                    <div class="flex items-center justify-between mb-4 stats-card-inner">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Kategori</p>
                            <p class="text-3xl font-bold text-white">24</p>
                            <p class="text-xs text-gray-500 mt-1">+2 bulan ini</p>
                        </div>
                        <div class="stats-card-icon w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6h16v2H4zm0 5h16v6H4zm0 11h16v2H4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Kategori aktif</span>
                        <span class="text-green-400 font-semibold">22</span>
                    </div>
                </div>

                <!-- Card 2: Pakaian -->
                <div class="stats-card">
                    <div class="flex items-center justify-between mb-4 stats-card-inner">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Pakaian</p>
                            <p class="text-3xl font-bold text-white">1,847</p>
                            <p class="text-xs text-gray-500 mt-1">+127 bulan ini</p>
                        </div>
                        <div class="stats-card-icon w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Stok tersedia</span>
                        <span class="text-green-400 font-semibold">1,654</span>
                    </div>
                </div>

                <!-- Card 3: Pembelian -->
                <div class="stats-card">
                    <div class="flex items-center justify-between mb-4 stats-card-inner">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Pembelian</p>
                            <p class="text-3xl font-bold text-white">3,291</p>
                            <p class="text-xs text-gray-500 mt-1">+234 bulan ini</p>
                        </div>
                        <div class="stats-card-icon w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Nilai transaksi</span>
                        <span class="text-green-400 font-semibold">Rp 127.8M</span>
                    </div>
                </div>

                <!-- Card 4: User -->
                <div class="stats-card">
                    <div class="flex items-center justify-between mb-4 stats-card-inner">
                        <div>
                            <p class="text-gray-400 text-sm font-medium">Total Pengguna</p>
                            <p class="text-3xl font-bold text-white">895</p>
                            <p class="text-xs text-gray-500 mt-1">+47 bulan ini</p>
                        </div>
                        <div class="stats-card-icon w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 7c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm4 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zM12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-6c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zM8 7c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zM8 7c0 2.21-1.79 4-4 4S0 9.21 0 7s1.79-4 4-4 4 1.79 4 4z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-400">Pengguna aktif</span>
                        <span class="text-green-400 font-semibold">742</span>
                    </div>
                </div>
            </div>

        

          

    <script>
        // Simple interaction effects
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const mainContent = document.getElementById('mainContent');
            
            function toggleMenu() {
                sidebar.classList.toggle('active');


            }
            
            mobileMenuButton.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);
            
  
      
        });
    </script>
</body>
</html>