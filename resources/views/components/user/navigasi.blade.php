<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO THRIFT - Marketplace Pakaian Bekas Berkualitas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .price-tag {
            background: linear-gradient(45deg, #000, #333);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
        }
        .nav-item {
            transition: all 0.3s ease;
        }
        .nav-item:hover {
            color: #d1d5db;
        }
        .search-input {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .product-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #000;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: bold;
        }
    </style>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-white text-gray-900">
    <!-- Navigation Bar -->
    <nav class="gradient-bg text-white shadow-2xl sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center space-x-4">
                    <div class="bg-white text-black p-2 rounded-lg">
                        <i class="fas fa-tshirt text-xl"></i>
                    </div>
                 <a href="{{  route('user.dashboard')}}">  <div>
                        <h1 class="text-2xl font-bold tracking-wider">TOKO THRIFT</h1>
                        <p class="text-xs text-gray-300">Preloved Fashion</p>
                    </div></a> 
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-lg mx-8">
                    <div class="relative w-full">
                        <input type="text" 
                               placeholder="Cari pakaian thrift impian kamu..." 
                               class="w-full px-4 py-2 pl-10 rounded-full search-input text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white" id="searchPakaianDesktop">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-300"></i>
                    </div>
                </div>





                <!-- Navigation Items -->
                <div class="flex items-center space-x-6">
                
                    <a href="#" class="nav-item flex items-center space-x-1">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="hidden sm:inline">Keranjang</span>
                        <span class="bg-red-500 text-white text-xs rounded-full px-2 py-1 ml-1">3</span>
                    </a>
                  <!-- Wrapper -->
<div x-data="{ open: false }" class="relative">
    <!-- Tombol trigger (foto + nama) -->
    <div class="flex items-center space-x-2 cursor-pointer" @click="open = !open">
        @if(Auth::user()->user_profil_url)
            <!-- Jika user punya foto profil -->
            <img 
                src="{{ asset('storage/' . Auth::user()->user_profil_url) }}" 
                alt="Profile" 
                class="w-8 h-8 rounded-full border-2 border-white object-cover"
            >
        @else
            <!-- Jika tidak ada foto profil -->
            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                <span class="text-black font-semibold text-sm">
                    {{ strtoupper(substr(Auth::user()->user_fullname, 0, 1)) }}
                </span>
            </div>
        @endif

        <!-- Nama user -->
        <span class="hidden sm:inline text-sm text-white">
            {{ Auth::user()->user_fullname }}
        </span>
    </div>

    <!-- Dropdown Menu -->
    <div 
        x-show="open" 
        @click.outside="open = false" 
        x-transition 
        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50"
    >
        <!-- Edit Profil -->
        <a href="{{ route('user.dashboard') }}" 
           class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
            Home
        </a>
        <!-- Edit Profil -->
        <a href="{{ route('user.profile.index', Auth::user()->user_id) }}" 
           class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
            Edit Profil
        </a>
        <a href="{{ route('metode.index') }}" 
           class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
            Metode Pembayaran
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" 
                    class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
    </div>
</div>

                </div>
            </div>
        </div>
    </nav>



    