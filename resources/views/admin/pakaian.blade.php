<x-admin.sidebar />

        <!-- Dashboard Content -->
        <main class="p-6 space-y-8">
            <!-- Form Tambah Data Pakaian -->
            <div class="data-table fade-in p-6">
                <h3 class="text-lg font-semibold mb-4">Tambah Data Pakaian</h3>
                <form enctype="multipart/form-data">
                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="form-label">Nama Pakaian</label>
                        <input 
                            type="text" 
                            placeholder="Masukkan nama pakaian"
                            class="form-input"
                        >
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="form-label">Harga</label>
                        <input 
                            type="text" 
                            placeholder="Masukkan harga"
                            class="form-input"
                        >
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label class="form-label">Stok</label>
                        <input 
                            type="number" 
                            placeholder="Masukkan stok"
                            class="form-input"
                        >
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-4">
                        <label class="form-label">Upload Gambar</label>
                        <div class="file-input">
                            <span>Klik untuk mengunggah gambar</span>
                            <input 
                                type="file" 
                                accept="image/*"
                                class="hidden"
                                id="fileUpload"
                            >
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="flex justify-end">
                        <button type="submit" class="btn-edit">Tambah Data</button>
                    </div>
                </form>
            </div>

            <!-- Data Pakaian Table -->
            <div class="data-table fade-in">
                <div class="table-header px-6 py-4">
                    <h3 class="text-lg font-semibold text-white">Data Pakaian</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-6 py-4">Nama Pakaian</th>
                                <th class="px-6 py-4">Harga</th>
                                <th class="px-6 py-4">Stok</th>
                                <th class="px-6 py-4">Gambar</th>
                                <th class="px-6 py-4 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh Data 1 -->
                            <tr class="table-row">
                                <td class="px-6 py-4">Kaos Polos</td>
                                <td class="px-6 py-4">Rp50.000</td>
                                <td class="px-6 py-4">100</td>
                                <td class="px-6 py-4">
                                    <img src="https://via.placeholder.com/60" alt="Kaos Polos" class="w-14 h-14 rounded-md object-cover">
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>

                            <!-- Contoh Data 2 -->
                            <tr class="table-row">
                                <td class="px-6 py-4">Jaket Jeans</td>
                                <td class="px-6 py-4">Rp150.000</td>
                                <td class="px-6 py-4">40</td>
                                <td class="px-6 py-4">
                                    <img src="https://via.placeholder.com/60" alt="Jaket Jeans" class="w-14 h-14 rounded-md object-cover">
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>

                            <!-- Contoh Data 3 -->
                            <tr class="table-row">
                                <td class="px-6 py-4">Kemeja Flanel</td>
                                <td class="px-6 py-4">Rp120.000</td>
                                <td class="px-6 py-4">25</td>
                                <td class="px-6 py-4">
                                    <img src="https://via.placeholder.com/60" alt="Kemeja Flanel" class="w-14 h-14 rounded-md object-cover">
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const fileUpload = document.getElementById('fileUpload');
            const fileInput = document.querySelector('.file-input');
            
            function toggleMenu() {
                sidebar.classList.toggle('active');
                
                // Mengubah ikon menu saat dibuka/ditutup
                if (sidebar.classList.contains('active')) {
                    mobileMenuButton.innerHTML = '✕';
                    mobileMenuButton.style.fontSize = '28px';
                } else {
                    mobileMenuButton.innerHTML = '☰';
                    mobileMenuButton.style.fontSize = '24px';
                }
            }
            
            mobileMenuButton.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);
            
            // Menu item clicks
        
            
            // Button click effects
            const buttons = document.querySelectorAll('.btn-edit, .btn-delete');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    // Simple click effect
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                    
                    // Show alert for demo purposes
                    if (this.textContent.includes('Edit')) {
                        alert('Edit functionality would be implemented here');
                    } else if (this.textContent.includes('Delete')) {
                        if (confirm('Are you sure you want to delete this item?')) {
                            alert('Delete functionality would be implemented here');
                        }
                    }
                });
            });
            
            // File upload interaction
            if (fileInput && fileUpload) {
                fileInput.addEventListener('click', function() {
                    fileUpload.click();
                });
                
                fileUpload.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        fileInput.innerHTML = `<span>${this.files[0].name}</span>`;
                    }
                });
            }
            
            // Adjust layout on resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('active');
                    mobileMenuButton.innerHTML = '☰';
                    mobileMenuButton.style.fontSize = '24px';
                }
            });
        });
    </script>
</body>
</html>