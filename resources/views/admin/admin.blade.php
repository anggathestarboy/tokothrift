<x-admin.sidebar />

<!-- Dashboard Content -->
<main class="p-6 space-y-8">
    <!-- Main Dashboard Cards -->
    <div class="stats-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 fade-in">

        <!-- Card 1: Kategori -->
        <div class="stats-card bg-gray-800 p-4 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Total Kategori</p>
                    <p class="text-3xl font-bold text-white">{{ $totalKategori }}</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                 <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24"> <path d="M4 6h16v2H4zm0 5h16v6H4zm0 11h16v2H4z"/> </svg>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400">Kategori aktif</span>
            </div>
        </div>

        <!-- Card 2: Pakaian -->
        <div class="stats-card bg-gray-800 p-4 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Total Pakaian</p>
                    <p class="text-3xl font-bold text-white">{{ $totalPakaian }}</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                 <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M16 3h-2.586l-1.707-1.707A.996.996 0 0011 1a.996.996 0 00-.707.293L8.586 3H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zm0 18H8V6h8v15z"/>
  <path d="M10 8h4v2h-4z"/>
</svg>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400">Stok tersedia</span>
            </div>
        </div>

        <!-- Card 3: Pembelian -->
        <div class="stats-card bg-gray-800 p-4 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Total Pembelian</p>
                    <p class="text-3xl font-bold text-white">{{ $totalPembelian }}</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                   <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24"> <path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12L8.1 13h7.45c.75 0 1.41-.41 1.75-1.03L21.7 4H5.21l-.94-2H1zm16 16c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/> </svg>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400">Jumlah seluruh pembelian</span>
            </div>
        </div>

        <!-- Card 4: User -->
        <div class="stats-card bg-gray-800 p-4 rounded-2xl shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-gray-400 text-sm font-medium">Total Pengguna</p>
                    <p class="text-3xl font-bold text-white">{{ $totalUser }}</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-white to-gray-200 rounded-xl flex items-center justify-center">
                   <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 
           2.239-5 5 2.239 5 5 5zm0 2c-3.866 0-7 
           3.134-7 7h2c0-2.761 2.239-5 5-5s5 2.239 
           5 5h2c0-3.866-3.134-7-7-7z"/>
</svg>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs">
                <span class="text-gray-400">Pengguna aktif</span>
            </div>
        </div>
    </div>
</main>


        

          

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