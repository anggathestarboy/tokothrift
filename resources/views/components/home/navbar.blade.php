<div>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO THRIFT - Temukan Gaya Unik Anda</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #000000, #404040);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .accent-shadow {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .mobile-menu-slide {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .mobile-menu-slide:not(.hidden) {
            max-height: 400px;
        }

        .section-overlap {
            margin-top: -100px;
            padding-top: 100px;
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }
        
        .slide-in-left {
            animation: slideInLeft 1s ease-out forwards;
            opacity: 0;
        }
        
        .slide-in-right {
            animation: slideInRight 1s ease-out forwards;
            opacity: 0;
        }
        
        .fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        
        .pattern-dots {
            background-image: radial-gradient(circle, #000 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.1;
        }
        
        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        html {
  scroll-behavior: smooth;
}
    </style>
</head>
<body class="bg-white text-black overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-black/10" id="atas">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-black tracking-wider">
                    TOKO THRIFT
                </div>
                <div class="hidden md:flex items-center space-x-6">
                    <div class="flex space-x-8">
                        <a href="{{ route('home') }}" class="hover:text-gray-600 transition-colors duration-300 font-medium">Home</a>
                        <a href="{{ route('home') }}#about" class="hover:text-gray-600 transition-colors duration-300 font-medium">Tentang</a>
                        <a href="{{ route('home') }}#products" class="hover:text-gray-600 transition-colors duration-300 font-medium">Produk</a>
                    </div>
                  <div class="flex space-x-3 ml-8">
    @if(Auth::check())
        <!-- Jika sudah login -->
        <div class="relative group">
            <button class="flex items-center space-x-2 px-4 py-2 text-sm font-semibold text-black border border-black rounded-lg hover:bg-black hover:text-white transition-all duration-300">
                <!-- Ikon profil -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
                </svg>
                <!-- Nama dari tabel user_fullname -->
                <span>{{ Auth::user()->user_fullname }}</span>
            </button>
            <!-- Dropdown saat diklik / hover -->
            <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden group-hover:block">
                @if(Auth::user()->user_level === "Admin")
                    <a href="{{ route('admin.admin') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard Admin</a>
                    <a href="{{ route('admin.pakaian.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelola Pakaian</a>
                    <a href="{{ route('admin.category') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelola Kategori</a>
                    <a href="{{ route('admin.pembelian') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lihat Pembelian</a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard User</a>
                    <a href="{{ route('keranjang.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelola Keranjang</a>
                    <a href="{{ route('pesanan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Riwayat Pembelian </a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    @else
        <!-- Jika belum login -->
        <button class="px-4 py-2 text-sm font-semibold text-black border border-black rounded-lg hover:bg-black hover:text-white transition-all duration-300">
            <a href="{{ route('auth.login') }}">Login</a> 
        </button>
        <button class="px-4 py-2 text-sm font-semibold text-white bg-black rounded-lg hover:bg-gray-800 transition-all duration-300 accent-shadow">
            <a href="{{ route('auth.register') }}">Register</a> 
        </button>
    @endif
</div>

                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-black focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mobile-menu-slide">
                <div class="flex flex-col space-y-4 mt-4 pt-4 border-t border-black/10">
                    <a href="{{  route('home') }} " class="text-black hover:text-gray-600 transition-colors duration-300 font-medium py-2">Home</a>
                    <a href="{{  route('home') }}#about" class="text-black hover:text-gray-600 transition-colors duration-300 font-medium py-2">Tentang</a>
                    <a href="{{  route('home') }} #products" class="text-black hover:text-gray-600 transition-colors duration-300 font-medium py-2">Produk</a>
             <div class="flex flex-col space-y-2 pt-4 pb-2">
    @if(Auth::check())
        <!-- Jika sudah login -->
        <div class="flex items-center space-x-3 px-4 py-3 border border-gray-300 rounded-lg bg-white">
            <!-- Ikon profil -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z" />
            </svg>
            <span class="font-semibold text-black">{{ Auth::user()->user_fullname }}</span>
        </div>
        <div class="flex flex-col mt-2 border border-gray-200 rounded-lg overflow-hidden">
            @if(Auth::user()->user_level === "Admin")
                <a href="{{ route('admin.admin') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard Admin</a>
                <a href="{{ route('admin.pakaian.index') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kelola Pakaian</a>
            @else
                <a href="{{ route('user.dashboard') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard User</a>
                <a href="{{ route('keranjang.index') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lihat Keranjang</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
            </form>
        </div>
    @else
        <!-- Jika belum login -->
        <button class="px-4 py-2 text-sm font-semibold text-black border border-black rounded-lg hover:bg-black hover:text-white transition-all duration-300 flex-1">
            <a href="{{ route('auth.login') }}">Login
        </button></a>
        <button class="px-4 py-2 text-sm font-semibold text-white bg-black rounded-lg hover:bg-gray-800 transition-all duration-300 flex-1">
            <a href="{{ route('auth.register') }}">Register</a>
        </button>
    @endif
</div>

                </div>
            </div>
        </div>
    </nav>
</div>