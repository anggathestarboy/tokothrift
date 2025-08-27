<x-user.navigasi />

<div class="max-w-4xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Metode Pembayaran Saya</h2>

    {{-- Tombol Tambah --}}
    <a href="{{ route('metode.create') }}" 
       class="bg-black text-white px-5 py-2 rounded-xl shadow hover:bg-gray-800 transition inline-block mb-6">
        + Tambah Metode Pembayaran
    </a>

    {{-- Alert Sukses --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Daftar Metode --}}
    <div class="grid md:grid-cols-2 gap-6">
        @forelse($metode as $m)
            <div class="bg-white rounded-2xl shadow p-5 flex flex-col justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Jenis</p>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $m->metode_pembayaran_jenis }}</h3>

                    <p class="text-sm text-gray-500 mt-3">Nomor</p>
                    <p class="text-base text-gray-700">
                        {{ $m->metode_pembayaran_nomor ?? '-' }}
                    </p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex gap-3 mt-5">
                    <a href="{{ route('metode.edit', $m->metode_pembayaran_id) }}" 
                       class="flex-1 text-center bg-gray-600 text-white px-4 py-2 rounded-xl hover:bg-blue-600 transition">
                        Edit
                    </a>

                    <form action="{{ route('metode.destroy', $m->metode_pembayaran_id) }}" 
                          method="POST" 
                          class="flex-1"
                          onsubmit="return confirm('Yakin ingin menghapus metode ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="w-full bg-black text-white px-4 py-2 rounded-xl hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-2 bg-gray-50 border border-gray-200 text-center p-6 rounded-2xl">
                <p class="text-gray-600">Belum ada metode pembayaran yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</div>
