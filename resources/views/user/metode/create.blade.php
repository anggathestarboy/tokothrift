<x-user.navigasi /> 
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Tambah Metode Pembayaran</h2>

    <form action="{{ route('metode.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Jenis</label>
            <select id="metodeSelect" name="metode_pembayaran_jenis" class="w-full border p-2 rounded">
                <option value="DANA">DANA</option>
                <option value="OVO">OVO</option>
                <option value="BCA">BCA</option>
                <option value="COD">COD</option>
            </select>
        </div>

        <div id="nomorWrapper">
            <label>Nomor</label>
            <input type="text" id="nomorInput" name="metode_pembayaran_nomor" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

<script>
    const metodeSelect = document.getElementById("metodeSelect");
    const nomorInput = document.getElementById("nomorInput");
    const nomorWrapper = document.getElementById("nomorWrapper");

    metodeSelect.addEventListener("change", function() {
        if (this.value === "COD") {
            nomorInput.removeAttribute("required"); // hilangkan required
            nomorWrapper.style.display = "none";    // sembunyikan input
            nomorInput.value = "";                  // kosongkan biar aman
        } else {
            nomorInput.setAttribute("required", "true"); // kembalikan required
            nomorWrapper.style.display = "block";        // tampilkan lagi
        }
    });
</script>
