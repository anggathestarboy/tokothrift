<x-home.navbar />
    <!-- Hero Section -->
    <section id="home" class="min-h-screen flex items-center relative overflow-hidden">
        <div class="pattern-dots absolute inset-0"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="slide-in-left">
                    <h1 class="text-4xl md:text-6xl lg:text-8xl font-black mb-6 leading-tight">
                        <span class="gradient-text">TOKO</span><br>
                        <span class="text-shadow">THRIFT</span>
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl mb-8 text-gray-700 leading-relaxed">
                        Temukan gaya unik Anda dengan koleksi fashion berkualitas tinggi dengan harga terjangkau
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-black text-white px-6 md:px-8 py-3 md:py-4 text-base md:text-lg font-bold hover:bg-gray-800 transition-all duration-300 transform hover:scale-105 accent-shadow">
                            @if(!Auth::user())
                                <a href="{{ route('auth.register')}}">DAFTAR SEKARANG</a>
                            @elseif (Auth::user()->user_level === "Pengguna")  
                                <a href="{{ route('user.dashboard')}}">PERGI KE HOME</a>
                            @elseif (Auth::user()->user_level === "Admin")  
                                <a href="{{ route('admin.admin')}}">PERGI KE DASHBOARD</a>
                            @endif
                        </button>
                        <button class="border-2 border-black text-black px-6 md:px-8 py-3 md:py-4 text-base md:text-lg font-bold hover:bg-black hover:text-white transition-all duration-300">
                            <a href="{{ route('home') }}#about">PELAJARI LEBIH LANJUT</a>
                        </button>
                    </div>
                </div>
                <div class="slide-in-right">
                    <div class="relative">
                        <div class="floating-animation">
                            <div class="w-60 h-60 md:w-80 md:h-80 mx-auto bg-black rounded-full flex items-center justify-center text-white text-4xl md:text-6xl font-black accent-shadow">
                                T
                            </div>
                        </div>
                        <div class="absolute -top-6 md:-top-10 -right-6 md:-right-10 w-28 h-28 md:w-40 md:h-40 bg-white border-4 border-black rounded-full floating-animation" style="animation-delay: -2s;"></div>
                        <div class="absolute -bottom-6 md:-bottom-10 -left-6 md:-left-10 w-24 h-24 md:w-32 md:h-32 bg-black rounded-full floating-animation" style="animation-delay: -4s;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-black text-white relative z-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-5xl md:text-6xl font-black mb-6">TENTANG KAMI</h2>
                <div class="w-20 h-1 bg-white mx-auto mb-8"></div>
                <p class="text-xl max-w-3xl mx-auto text-gray-300">
                    Kami adalah toko thrift terpercaya yang menghadirkan fashion berkualitas dengan harga terjangkau untuk semua kalangan
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center hover-lift bg-white/5 p-8 rounded-lg glassmorphism border border-white/10">
                    <div class="w-16 h-16 bg-white rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-black text-2xl font-black">★</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">KUALITAS TERJAMIN</h3>
                    <p class="text-gray-300">Setiap item telah melalui seleksi ketat untuk memastikan kualitas terbaik</p>
                </div>
                
                <div class="text-center hover-lift bg-white/5 p-8 rounded-lg glassmorphism border border-white/10">
                    <div class="w-16 h-16 bg-white rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-black text-2xl font-black">♻</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">RAMAH LINGKUNGAN</h3>
                    <p class="text-gray-300">Mendukung sustainable fashion dengan mengurangi limbah tekstil</p>
                </div>
                
                <div class="text-center hover-lift bg-white/5 p-8 rounded-lg glassmorphism border border-white/10">
                    <div class="w-16 h-16 bg-white rounded-full mx-auto mb-6 flex items-center justify-center">
                        <span class="text-black text-2xl font-black">$</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">HARGA TERJANGKAU</h3>
                    <p class="text-gray-300">Fashion berkualitas tinggi dengan harga yang ramah di kantong</p>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="py-20 bg-white relative z-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-5xl md:text-6xl font-black mb-6 gradient-text">KOLEKSI KAMI</h2>
                <div class="w-20 h-1 bg-black mx-auto mb-8"></div>
                <p class="text-xl max-w-3xl mx-auto text-gray-700">
                    Dari vintage klasik hingga trend modern, temukan berbagai pilihan fashion yang sesuai dengan gaya Anda
                </p>
            </div>
        

            <!-- Dynamic Clothing Items Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mt-12">
                @foreach ($pakaian as $item)
                    <div class="hover-lift">
                        <div class="bg-gray-100 h-48 md:h-64 rounded-lg mb-4 flex items-center justify-center border-2 border-black accent-shadow overflow-hidden">
                            <img src="{{ 'storage/' . $item->pakaian_gambar_url ?? 'img/placeholder.jpg' }}" alt="{{ $item->pakaian_nama }}" class="object-cover w-full h-full">
                        </div>
                        <h3 class="text-lg md:text-xl font-bold mb-2">{{ $item->pakaian_nama }}</h3>
                        <p class="text-sm md:text-base text-gray-600">Stok: {{ $item->pakaian_stok }}</p>
                        <p class="text-sm md:text-base text-gray-600">Harga: Rp {{ number_format($item->pakaian_harga, 0, ',', '.') }}</p>
                     
                    </div>


                    
                @endforeach
            </div>
        </div>
    </section>

    


    <x-home.footer />