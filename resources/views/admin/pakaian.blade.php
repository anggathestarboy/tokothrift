<x-admin.sidebar />

<!-- Dashboard Content -->
<main class="p-6 space-y-8 w-full">
    <!-- Alert sukses -->
    @if(session('success'))
        <div id="success-alert" class="p-3 mb-4 text-white bg-green-600 rounded-2xl shadow-lg">
            {{ session('success') }}
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let alert = document.getElementById("success-alert");
                if (alert) {
                    setTimeout(() => {
                        alert.style.transition = "opacity 0.5s ease";
                        alert.style.opacity = "0";
                        setTimeout(() => alert.remove(), 500);
                    }, 2500);
                }
            });
        </script>
    @endif

    <!-- Form Tambah Data Pakaian -->
    <div class="data-table fade-in p-6">
        <h3 class="text-lg font-semibold mb-4 text-white">Tambah Data Pakaian</h3>
        <form action="{{ route('admin.pakaian.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Kategori -->
            <div class="mb-4">
                <label class="form-label">Kategori</label>
                <select name="pakaian_kategori_pakaian_id" class="form-input" required>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->kategori_pakaian_id }}" style="color:rgb(255, 255, 255); background-color:rgb(51, 51, 51)">
                            {{ $kat->kategori_pakaian_nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nama -->
            <div class="mb-4">
                <label class="form-label">Nama Pakaian</label>
                <input type="text" name="pakaian_nama" placeholder="Masukkan nama pakaian" class="form-input" required>
            </div>

            <!-- Harga -->
            <div class="mb-4">
                <label class="form-label">Harga</label>
                <input type="number" name="pakaian_harga" placeholder="Masukkan harga" class="form-input" required>
            </div>

            <!-- Stok -->
            <div class="mb-4">
                <label class="form-label">Stok</label>
                <input type="number" name="pakaian_stok" placeholder="Masukkan stok" class="form-input" required>
            </div>

            <!-- Upload Gambar -->
            <div class="mb-4">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="pakaian_gambar_url" accept="image/*" class="form-input p-2">
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
            <table class="w-full text-left min-w-[700px]">
                <thead>
                    <tr class="font-bold">
                        <th class="px-6 py-4">Nama Pakaian</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Harga</th>
                        <th class="px-6 py-4">Stok</th>
                        <th class="px-6 py-4">Gambar</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pakaian as $item)
                        <tr class="table-row">
                            <td class="px-6 py-4">{{ $item->pakaian_nama }}</td>
                            <td class="px-6 py-4">{{ $item->kategori->kategori_pakaian_nama }}</td>
                            <td class="px-6 py-4">Rp{{ number_format($item->pakaian_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $item->pakaian_stok }}</td>
                            <td class="px-6 py-4">
                                @if($item->pakaian_gambar_url)
                                    <img src="{{ asset('storage/' . $item->pakaian_gambar_url) }}" alt="{{ $item->pakaian_nama }}" class="w-28 h-28 sm:w-20 sm:h-20 rounded-md object-cover">
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col sm:flex-row sm:space-x-2 sm:space-y-0 space-y-2 justify-end">
                                    <button class="btn-edit w-full sm:w-auto" onclick="editPakaian({{ $item->pakaian_id }})">Edit</button>
                                    <button class="btn-delete w-full sm:w-auto" onclick="deletePakaian({{ $item->pakaian_id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Belum ada data pakaian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 px-6 py-4">
            {{ $pakaian->links() }}
        </div>
    </div>
</main>
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