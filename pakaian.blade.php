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
<div class="relative mb-4">
  <!-- Icon Search -->
  <span class="absolute inset-y-0 left-0 flex items-center pl-3">
    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
    </svg>
  </span>

  <!-- Input Search -->
  <input 
    type="search" 
    id="searchPakaian" 
    placeholder="Cari kategori pakaian..." 
    class="w-full pl-10 pr-4 py-2 text-sm 
           border border-gray-600 rounded-lg 
           bg-gray-900 text-white
           placeholder-gray-400
           focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 
           transition-all duration-200"
  />
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


    <!-- Modal Edit Pakaian -->
<div id="editModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
  <div class="bg-gray-900 p-6 rounded-2xl w-full max-w-lg shadow-2xl border border-gray-700">
    <h2 class="text-xl font-semibold mb-6 text-white border-b border-gray-700 pb-2">
      ✨ Edit Data Pakaian
    </h2>

    <form id="editForm" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Hidden ID -->
        <input type="hidden" name="pakaian_id" id="editPakaianId">

        <!-- Kategori -->
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Kategori</label>
          <select name="pakaian_kategori_pakaian_id" id="editKategori"
            class="w-full rounded-lg bg-gray-800 text-white border border-gray-600 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
              @foreach($kategori as $kat)
                <option value="{{ $kat->kategori_pakaian_id }}" class="bg-gray-800 text-white">
                    {{ $kat->kategori_pakaian_nama }}
                </option>
              @endforeach
          </select>
        </div>

        <!-- Nama -->
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Nama Pakaian</label>
          <input type="text" name="pakaian_nama" id="editNama"
            class="w-full rounded-lg bg-gray-800 text-white border border-gray-600 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required>
        </div>

        <!-- Harga -->
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Harga</label>
          <input type="number" name="pakaian_harga" id="editHarga"
            class="w-full rounded-lg bg-gray-800 text-white border border-gray-600 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required>
        </div>

        <!-- Stok -->
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Stok</label>
          <input type="number" name="pakaian_stok" id="editStok"
            class="w-full rounded-lg bg-gray-800 text-white border border-gray-600 p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
            required>
        </div>

        <!-- Gambar -->
        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Gambar</label>
          <input type="file" name="pakaian_gambar_url" id="editGambar"
            class="w-full rounded-lg bg-gray-800 text-white border border-gray-600 p-2 cursor-pointer focus:ring-2 focus:ring-blue-500 focus:outline-none"
            accept="image/*">
          <div id="previewGambar" class="mt-3"></div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-700">
          <button type="button" onclick="closeEditModal()"
            class="px-4 py-2 rounded-lg bg-gray-700 text-gray-300 hover:bg-gray-600 transition">
            Batal
          </button>
          <button type="submit"
            class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
            Update
          </button>
        </div>
    </form>
  </div>
</div>

</main>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    /** =============================
     * Mobile menu toggle
     * ============================= */
    const mobileMenuButton = document.getElementById("mobileMenuButton");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    function toggleMenu() {
        if (!sidebar || !mobileMenuButton) return;

        sidebar.classList.toggle("active");

        if (sidebar.classList.contains("active")) {
            mobileMenuButton.innerHTML = "✕";
            mobileMenuButton.style.fontSize = "28px";
        } else {
            mobileMenuButton.innerHTML = "☰";
            mobileMenuButton.style.fontSize = "24px";
        }
    }

    if (mobileMenuButton && sidebar) {
        mobileMenuButton.addEventListener("click", toggleMenu);
    }
    if (overlay) {
        overlay.addEventListener("click", toggleMenu);
    }

    /** =============================
     * File upload interaction
     * ============================= */
    const fileUpload = document.getElementById("fileUpload");
    const fileInput = document.querySelector(".file-input");

    if (fileInput && fileUpload) {
        fileInput.addEventListener("click", () => fileUpload.click());

        fileUpload.addEventListener("change", function () {
            if (this.files && this.files[0]) {
                fileInput.innerHTML = `<span>${this.files[0].name}</span>`;
            }
        });
    }

    /** =============================
     * Adjust layout on resize
     * ============================= */
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 1024 && sidebar && mobileMenuButton) {
            sidebar.classList.remove("active");
            mobileMenuButton.innerHTML = "☰";
            mobileMenuButton.style.fontSize = "24px";
        }
    });

    /** =============================
     * Live Search Pakaian (AJAX)
     * ============================= */
    const searchInput = document.getElementById("searchPakaian");
    const tableBody = document.querySelector("tbody");

    if (searchInput && tableBody) {
        searchInput.addEventListener("keyup", function () {
            let query = this.value;

            fetch(`{{ route('admin.pakaian.search') }}?pakaian_nama=${query}`)
                .then((res) => res.json())
                .then((data) => {
                    tableBody.innerHTML = "";

                    if (!data || data.length === 0) {
                        tableBody.innerHTML = `
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada data pakaian
                                </td>
                            </tr>`;
                        return;
                    }

                    data.forEach((item) => {
                        let row = `
                            <tr class="table-row">
                                <td class="px-6 py-4">${item.pakaian_nama}</td>
                                <td class="px-6 py-4">${item.kategori?.kategori_pakaian_nama ?? "-"}</td>
                                <td class="px-6 py-4">Rp${Number(item.pakaian_harga).toLocaleString()}</td>
                                <td class="px-6 py-4">${item.pakaian_stok}</td>
                                <td class="px-6 py-4">
                                    ${
                                        item.pakaian_gambar_url
                                            ? `<img src="/storage/${item.pakaian_gambar_url}" class="w-20 h-20 rounded-md object-cover">`
                                            : `<span class="text-gray-500">Tidak ada gambar</span>`
                                    }
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="btn-edit" onclick="editPakaian(${item.pakaian_id})">Edit</button>
                                    <button class="btn-delete" onclick="deletePakaian(${item.pakaian_id})">Delete</button>
                                </td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML("beforeend", row);
                    });
                })
                .catch((err) => console.error(err));
        });
    }
});

/** =============================
 * Edit Pakaian (Modal)
 * ============================= */
function editPakaian(id) {
    fetch(`/admin/pakaian/${id}/edit`)
        .then((res) => res.json())
        .then((data) => {
            document.getElementById("editPakaianId").value = data.pakaian_id;
            document.getElementById("editNama").value = data.pakaian_nama;
            document.getElementById("editHarga").value = data.pakaian_harga;
            document.getElementById("editStok").value = data.pakaian_stok;
            document.getElementById("editKategori").value = data.pakaian_kategori_pakaian_id;

            // Preview gambar lama
            let preview = document.getElementById("previewGambar");
            if (data.pakaian_gambar_url) {
                preview.innerHTML = `<img src="/storage/${data.pakaian_gambar_url}" class="w-24 h-24 object-cover rounded-md">`;
            } else {
                preview.innerHTML = `<span class="text-gray-400">Tidak ada gambar</span>`;
            }

            // Set action form update
            document.getElementById("editForm").action = `/admin/pakaian/${id}`;

            // Show modal
            const modal = document.getElementById("editModal");
            modal.classList.remove("hidden");
            modal.classList.add("flex");
        })
        .catch((err) => console.error(err));
}

function closeEditModal() {
    const modal = document.getElementById("editModal");
    modal.classList.add("hidden");
    modal.classList.remove("flex");
}

/** =============================
 * Delete Pakaian
 * ============================= */
function deletePakaian(id) {
    if (confirm("Apakah Anda yakin ingin menghapus pakaian ini?")) {
        fetch(`/admin/pakaian/${id}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
        })
            .then((res) => res.json())
            .then((data) => {
                alert(data.message || "Data berhasil dihapus");
                location.reload();
            })
            .catch((err) => console.error(err));
    }
}
</script>

</body>
</html>