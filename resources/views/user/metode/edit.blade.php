<x-user.navigasi />
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Metode Pembayaran</h2>

    <form action="{{ route('metode.update', $metode->metode_pembayaran_id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label>Jenis</label>
            <select name="metode_pembayaran_jenis" id="metodeSelect" class="w-full border p-2 rounded">
                <option value="DANA" {{ $metode->metode_pembayaran_jenis == 'DANA' ? 'selected' : '' }}>DANA</option>
                <option value="OVO" {{ $metode->metode_pembayaran_jenis == 'OVO' ? 'selected' : '' }}>OVO</option>
                <option value="BCA" {{ $metode->metode_pembayaran_jenis == 'BCA' ? 'selected' : '' }}>BCA</option>
                <option value="COD" {{ $metode->metode_pembayaran_jenis == 'COD' ? 'selected' : '' }}>COD</option>
            </select>
        </div>

        <div id="nomorWrapper">
            <label>Nomor</label>
            <input type="text" id="nomorInput" name="metode_pembayaran_nomor"
                   value="{{ $metode->metode_pembayaran_nomor }}"
                   class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<script>
    const metodeSelect = document.getElementById("metodeSelect");
    const nomorInput = document.getElementById("nomorInput");
    const nomorWrapper = document.getElementById("nomorWrapper");

    function toggleNomor() {
        if (metodeSelect.value === "COD") {
            nomorInput.removeAttribute("required");
            nomorWrapper.style.display = "none";
            nomorInput.value = "";
        } else {
            nomorInput.setAttribute("required", "true");
            nomorWrapper.style.display = "block";
        }
    }

    toggleNomor();


    metodeSelect.addEventListener("change", toggleNomor);
</script>
