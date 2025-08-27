<x-admin.sidebar />

<div class="max-w-4xl mx-auto p-6 bg-gradient-to-b rounded-2xl shadow-xl text-white">
    <!-- Success Message -->
    @if(session('success'))
        <div class="p-4 mb-6 text-green-300 bg-green-900/30 border border-green-600 rounded-lg shadow-md transition-all duration-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('profile.update', $user->user_id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Profile Picture Section -->
        <div class="flex flex-col items-center md:flex-row md:items-start gap-6">
            <div class="relative">
                <!-- Preview Container -->
                <div id="profile-preview" class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-800 shadow-lg">
                    @if(Auth::user()->user_profil_url)
                        <!-- Foto Profil -->
                        <img id="preview-image" src="{{ asset('storage/' . $user->user_profil_url) }}" 
                             alt="Foto Profil" 
                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                    @else
                        <!-- Default Avatar -->
                        <div id="default-avatar" class="w-full h-full bg-gray-700 flex items-center justify-center">
                            <span class="text-gray-200 font-bold text-3xl">
                                {{ strtoupper(substr(Auth::user()->user_fullname, 0, 1)) }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Tombol Edit Foto -->
                <label for="user_profil_url" 
                       class="absolute bottom-2 right-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white text-xs font-semibold rounded-full px-3 py-1 cursor-pointer hover:from-blue-500 hover:to-blue-700 transition-all duration-300 shadow-md">
                    Edit
                    <input type="file" id="user_profil_url" name="user_profil_url" class="hidden" accept="image/*">
                </label>
            </div>

            <!-- Info Section -->
            <div class="flex-1 w-full">
                <h2 class="text-xl font-semibold text-gray-100 mb-2">{{ auth()->user()->user_fullname }}</h2>
                <p class="text-sm text-gray-400">Perbarui informasi profil Anda di bawah ini.</p>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Lengkap -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">Nama Lengkap</label>
                <input type="text" name="user_fullname" 
                       value="{{ old('user_fullname', $user->user_fullname) }}"
                       class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                @error('user_fullname')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                <input type="email" name="user_email" 
                       value="{{ old('user_email', $user->user_email) }}"
                       class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                @error('user_email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- No HP -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">No HP</label>
                <input type="text" name="user_nohp" 
                       value="{{ old('user_nohp', $user->user_nohp) }}"
                       class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                @error('user_nohp')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-300">Password (opsional)</label>
                <input type="password" name="user_password"
                       class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300">
                @error('user_password')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Alamat -->
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-300">Alamat</label>
            <textarea name="user_alamat"
                      class="w-full px-4 py-3 rounded-lg bg-gray-800 border border-gray-600 text-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none transition-all duration-300 min-h-[120px]">{{ old('user_alamat', $user->user_alamat) }}</textarea>
            @error('user_alamat')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-8 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-500 hover:to-blue-700 transition-all duration-300 font-semibold text-white shadow-lg">
                Update Profil
            </button>
        </div>
    </form>

    <!-- Logout Section -->
    <div class="mt-10 pt-6 border-t border-gray-700">
        <h3 class="text-lg font-semibold text-gray-100 mb-4">Keluar Akun</h3>
        <p class="text-sm text-gray-400 mb-4">Klik tombol di bawah untuk mengakhiri sesi Anda.</p>
        <form action="/logout" method="POST" class="flex">
            @csrf
            <button type="submit" 
                    class="px-8 py-3 rounded-lg bg-gradient-to-r from-red-600 to-red-800 hover:from-red-500 hover:to-red-700 transition-all duration-300 font-semibold text-white shadow-lg">
                Logout
            </button>
        </form>
    </div>
</div>

<script>
    // Simple interaction effects for sidebar
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        if (mobileMenuButton && sidebar && overlay) {
            function toggleMenu() {
                sidebar.classList.toggle('active');

            }
            
            mobileMenuButton.addEventListener('click', toggleMenu);
            overlay.addEventListener('click', toggleMenu);
        }

        // Preview image functionality
        const fileInput = document.getElementById('user_profil_url');
        const previewContainer = document.getElementById('profile-preview');
        const defaultAvatar = document.getElementById('default-avatar');
        
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Hapus avatar default jika ada
                    if (defaultAvatar) {
                        defaultAvatar.remove();
                    }
                    
                    // Cek apakah sudah ada gambar preview
                    let previewImage = document.getElementById('preview-image');
                    
                    if (!previewImage) {
                        // Buat elemen gambar baru jika belum ada
                        previewImage = document.createElement('img');
                        previewImage.id = 'preview-image';
                        previewImage.classList.add('w-full', 'h-full', 'object-cover', 'transition-transform', 'duration-300', 'hover:scale-105');
                        previewContainer.appendChild(previewImage);
                    }
                    
                    // Set sumber gambar ke hasil pembacaan file
                    previewImage.src = e.target.result;
                    previewImage.alt = "Preview Foto Profil";
                };
                
                reader.readAsDataURL(file);
            }
        });
    });
</script>