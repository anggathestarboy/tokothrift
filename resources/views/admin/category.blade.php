<x-admin.sidebar />

<!-- Dashboard Content -->
<main class="p-6 space-y-8">
    <!-- Form Tambah Data Pakaian -->
    <div class="data-table fade-in p-6">
        <h3 class="text-lg font-semibold mb-4">Tambah Data Kategori</h3>

        @if(session('success'))
            <div class="p-3 mb-4 text-green-800 bg-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <!-- Nama -->
            <div class="mb-4">
                <label class="form-label">Nama Kategori</label>
                <input 
                    type="text" 
                    name="kategori_pakaian_nama"
                    placeholder="Masukkan nama pakaian"
                    class="form-input"
                    required
                >
                @error('kategori_pakaian_nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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
            <h3 class="text-lg font-semibold text-white">Data Kategori</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="px-6 py-4">Nama Kategori</th>
                        <th class="px-6 py-4">Tanggal Dibuat</th>
                        <th class="px-6 py-4">Tanggal Diedit</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $item)
                        <tr class="table-row">
                            <td class="px-6 py-4">{{ $item->kategori_pakaian_nama }}</td>
                         <td class="px-6 py-4">{{ $item->created_at->format('Y-m-d') }}</td>
                         <td class="px-6 py-4">{{ $item->updated_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4  space-x-2">
                                <button class="btn-edit">Edit</button>
                                <button class="btn-delete">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 px-6">
            {{ $kategori->links() }}
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

        if(mobileMenuButton){
            mobileMenuButton.addEventListener('click', toggleMenu);
        }
        
        // Button click effects
        const buttons = document.querySelectorAll('.btn-edit, .btn-delete');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                // Simple click effect
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
                
                // Demo only
                if (this.textContent.includes('Edit')) {
                    alert('Edit functionality belum diimplementasikan');
                } else if (this.textContent.includes('Delete')) {
                    if (confirm('Yakin ingin menghapus data ini?')) {
                        alert('Delete functionality belum diimplementasikan');
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
