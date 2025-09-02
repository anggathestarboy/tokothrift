
    <x-admin.sidebar id="sidebar" />


    <!-- Dashboard Content -->
    <main class="p-6 space-y-8">
        <!-- Form Tambah Data Kategori -->
        <div class="data-table fade-in">
            <br>
            <h3 class="text-lg font-semibold mb-4 ml-4" >Tambah Data Kategori</h3>

            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="form-label ml-4">Nama Kategori</label>
                    <input 
                        type="text" 
                        name="kategori_pakaian_nama"
                        placeholder="Masukkan nama kategori"
                        class="form-input"
                        required
                        
                    >
                    @error('kategori_pakaian_nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="btn-edit">Tambah Data</button>
                </div>
            </form>
        </div>

        <!-- Search -->
        <div class="search-container">
            <input 
                type="search" 
                id="searchPakaian" 
                placeholder="Cari kategori pakaian..." 
                class="w-full pl-10 pr-4 py-2 text-sm border border-gray-600 rounded-lg bg-gray-900 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            />
        </div>

        <!-- Alert -->
        @if(session('success'))
        <div id="success-alert" class="p-3 mb-4 text-white bg-green-600 rounded-2xl shadow-lg">
            {{ session('success') }}
        </div>
        @endif

        <!-- Data Kategori Table -->
        <div class="data-table fade-in">
            <div class="table-header px-6 py-4">
                <h3 class="text-lg font-semibold text-white">Data Kategori</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm sm:text-base">
                    <thead>
                        <tr>
                            <th class="px-6 py-4">Nama Kategori</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kategori as $item)
                            <tr class="table-row" data-id="{{ $item->kategori_pakaian_id }}">
                                <td class="px-6 py-4" data-label="Nama Kategori">{{ $item->kategori_pakaian_nama }}</td>
                                <td class="px-6 py-4" data-label="Aksi">
                                    <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 justify-end">
                                        <button class="btn-edit w-full sm:w-auto">Edit</button>
                                        <form action="{{ route('admin.category.destroy', $item->kategori_pakaian_id) }}" method="POST" class="inline w-full sm:w-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete w-full sm:w-auto" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data</td>
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

    <!-- Modal Edit -->
    <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
        <div class="bg-gray-900 text-white rounded-2xl shadow-2xl w-full max-w-md p-6 border border-gray-700 mx-4">
            <h2 class="text-xl font-bold mb-4 text-center tracking-wide">✦ Edit Kategori ✦</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editId" name="id">

                <div class="mb-4">
                    <label class="block text-sm mb-2 text-gray-300">Nama Kategori</label>
                    <input type="text" id="editNama" name="kategori_pakaian_nama" 
                        class="w-full px-3 py-2 rounded-lg bg-gray-800 border border-gray-700 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                        placeholder="Masukkan nama kategori" required>
                </div>

                <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 mt-6">
                    <button type="button" id="closeModal" 
                        class="px-4 py-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-gray-200 transition w-full sm:w-auto">
                        Batal
                    </button>
                    <button type="submit" 
                        class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white font-semibold shadow-md transition w-full sm:w-auto">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hamburger Menu
            const mobileMenuButton = document.getElementById('mobileMenuButton');
            const sidebar = document.getElementById('sidebar');

            if (mobileMenuButton && sidebar) {
                mobileMenuButton.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    mobileMenuButton.innerHTML = sidebar.classList.contains('active') ? '✕' : '☰';
                });
            }

            // Search
            const searchInput = document.getElementById('searchPakaian');
            const tableBody = document.querySelector('tbody');

            function fetchCategories(query = '') {
                fetch(`/admin/category/search?kategori_pakaian_nama=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        tableBody.innerHTML = '';

                        if (data.length > 0) {
                            data.forEach(item => {
                                tableBody.innerHTML += `
                                    <tr class="table-row" data-id="${item.kategori_pakaian_id}">
                                        <td class="px-6 py-4" data-label="Nama Kategori">${item.kategori_pakaian_nama}</td>
                                        <td class="px-6 py-4" data-label="Aksi">
                                            <div class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2 justify-end">
                                                <button class="btn-edit w-full sm:w-auto">Edit</button>
                                                <form action="/admin/category/${item.kategori_pakaian_id}" method="POST" class="inline w-full sm:w-auto">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete w-full sm:w-auto" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>`;
                            });
                        } else {
                            tableBody.innerHTML = `
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada hasil</td>
                                </tr>`;
                        }
                    })
                    .catch(err => console.error('Error fetching categories:', err));
            }

            fetchCategories();
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    fetchCategories(this.value.trim());
                });
            }

            // Edit Modal
            const editModal = document.getElementById('editModal');
            const closeModal = document.getElementById('closeModal');
            const editForm = document.getElementById('editForm');
            const editId = document.getElementById('editId');
            const editNama = document.getElementById('editNama');

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('btn-edit')) {
                    const row = e.target.closest('tr');
                    editId.value = row.dataset.id;
                    editNama.value = row.querySelector('td').textContent.trim();
                    editForm.action = `/admin/category/${row.dataset.id}`;
                    editModal.classList.remove('hidden');
                }

                if (e.target.id === 'closeModal') {
                    editModal.classList.add('hidden');
                }
            });

            // Auto Hide Alert
            const alert = document.getElementById("success-alert");
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                }, 2500);
            }
        });
    </script>
</body>
</html>