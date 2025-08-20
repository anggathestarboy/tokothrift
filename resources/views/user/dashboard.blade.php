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
                    <div>
                        <h1 class="text-2xl font-bold tracking-wider">TOKO THRIFT</h1>
                        <p class="text-xs text-gray-300">Preloved Fashion</p>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-lg mx-8">
                    <div class="relative w-full">
                        <input type="text" 
                               placeholder="Cari pakaian thrift impian kamu..." 
                               class="w-full px-4 py-2 pl-10 rounded-full search-input text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-white">
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
                    <div class="flex items-center space-x-2">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face&rounded" 
                             alt="Profile" 
                             class="w-8 h-8 rounded-full border-2 border-white">
                        <span class="hidden sm:inline text-sm">User</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-5xl font-bold mb-4">Temukan Fashion Thrift Terbaik</h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Koleksi pakaian bekas berkualitas dengan harga terjangkau. Gaya unik, ramah lingkungan.
            </p>
            <div class="flex justify-center space-x-4">
                <button class="bg-white text-black px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                    Mulai Belanja
                </button>
                <button class="border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-black transition">
                    Lihat Koleksi
                </button>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12">Kategori Pilihan</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <i class="fas fa-tshirt text-4xl text-gray-700 mb-4"></i>
                    <h4 class="font-semibold">Kaos & T-Shirt</h4>
                    <p class="text-sm text-gray-500">120+ items</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <i class="fas fa-user-tie text-4xl text-gray-700 mb-4"></i>
                    <h4 class="font-semibold">Kemeja</h4>
                    <p class="text-sm text-gray-500">85+ items</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <i class="fas fa-female text-4xl text-gray-700 mb-4"></i>
                    <h4 class="font-semibold">Dress</h4>
                    <p class="text-sm text-gray-500">95+ items</p>
                </div>
                <div class="bg-white rounded-xl p-6 text-center shadow-lg card-hover cursor-pointer">
                    <i class="fas fa-shoe-prints text-4xl text-gray-700 mb-4"></i>
                    <h4 class="font-semibold">Sepatu</h4>
                    <p class="text-sm text-gray-500">60+ items</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-12">
                <h3 class="text-3xl font-bold">Produk Terbaru</h3>
                <div class="flex space-x-4">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg">
                        <option>Urutkan: Terbaru</option>
                        <option>Harga: Rendah ke Tinggi</option>
                        <option>Harga: Tinggi ke Rendah</option>
                        <option>Populer</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=300&h=300&fit=crop" 
                             alt="Vintage T-Shirt" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">VINTAGE</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Vintage Band T-Shirt</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Sangat Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 45.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=300&h=300&fit=crop" 
                             alt="Denim Jacket" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">TRENDY</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Denim Jacket Classic</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 85.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1485462537746-965f33f7f6a7?w=300&h=300&fit=crop" 
                             alt="Summer Dress" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">SALE</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Floral Summer Dress</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Sangat Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 65.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586790170083-2f9ceadc732d?w=300&h=300&fit=crop" 
                             alt="Sneakers" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">LIMITED</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Retro Sneakers</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 125.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1554568218-0f1715e72254?w=300&h=300&fit=crop" 
                             alt="Hoodie" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">NEW</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Oversized Hoodie</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Sangat Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 75.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=300&h=300&fit=crop" 
                             alt="Blouse" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">CLASSIC</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Elegant Blouse</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 55.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?w=300&h=300&fit=crop" 
                             alt="Jeans" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">VINTAGE</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">High Waist Jeans</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Sangat Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 95.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?w=300&h=300&fit=crop" 
                             alt="Blazer" 
                             class="w-full h-64 object-cover">
                        <div class="product-badge">FORMAL</div>
                        <button class="absolute top-3 right-3 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">Classic Blazer</h4>
                        <p class="text-gray-600 text-sm mb-3">Kondisi: Baik</p>
                        <div class="flex justify-between items-center">
                            <span class="price-tag">Rp 115.000</span>
                            <button class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-800 transition">
                    Lihat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12">Mengapa Pilih TOKO THRIFT?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <i class="fas fa-recycle text-4xl mb-4 text-green-400"></i>
                    <h4 class="text-xl font-semibold mb-2">Ramah Lingkungan</h4>
                    <p class="text-gray-300">Berpartisipasi dalam gerakan fashion berkelanjutan dengan membeli pakaian bekas berkualitas.</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-tags text-4xl mb-4 text-yellow-400"></i>
                    <h4 class="text-xl font-semibold mb-2">Harga Terjangkau</h4>
                    <p class="text-gray-300">Dapatkan fashion branded dengan harga yang jauh lebih terjangkau tanpa mengurangi kualitas.</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-star text-4xl mb-4 text-purple-400"></i>
                    <h4 class="text-xl font-semibold mb-2">Kualitas Terjamin</h4>
                    <p class="text-gray-300">Setiap produk telah melalui proses seleksi ketat untuk memastikan kualitas terbaik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="bg-white text-black p-2 rounded-lg">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <span class="text-xl font-bold">TOKO THRIFT</span>
                    </div>
                    <p class="text-gray-400 mb-4">Platform marketplace terpercaya untuk fashion thrift berkualitas tinggi.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Kategori</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">Kaos & T-Shirt</a></li>
                        <li><a href="#" class="hover:text-white">Kemeja</a></li>
                        <li><a href="#" class="hover:text-white">Dress</a></li>
                        <li><a href="#" class="hover:text-white">Sepatu</a></li>
                        <li><a href="#" class="hover:text-white">Aksesoris</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Bantuan</h5>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white">FAQ</a></li>
                        <li><a href="#" class="hover:text-white">Cara Berbelanja</a></li>
                        <li><a href="#" class="hover:text-white">Kebijakan Return</a></li>
                        <li><a href="#" class="hover:text-white">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Newsletter</h5>
                    <p class="text-gray-400 mb-4">Dapatkan update produk terbaru dan promo menarik.</p>
                    <div class="flex">
                        <input type="email" placeholder="Email kamu..." class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-lg focus:outline-none focus:border-white">
                        <button class="bg-white text-black px-6 py-2 rounded-r-lg hover:bg-gray-200 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 TOKO THRIFT. All rights reserved. Made with ❤️ for sustainable fashion.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple cart functionality
        let cartCount = 3;
        
        // Add hover effects and animations
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Heart wishlist toggle
        document.querySelectorAll('.fa-heart').forEach(heart => {
            heart.addEventListener('click', function(e) {
                e.preventDefault();
                if (this.classList.contains('far')) {
                    this.classList.remove('far');
                    this.classList.add('fas');
                    this.style.color = 'red';
                } else {
                    this.classList.remove('fas');
                    this.classList.add('far');
                    this.style.color = '';
                }
            });
        });

        // Add to cart functionality
        document.querySelectorAll('.fa-cart-plus').forEach(btn => {
            btn.addEventListener('click', function() {
                cartCount++;
                document.querySelector('.bg-red-500').textContent = cartCount;
                
                // Show feedback
                this.classList.remove('fa-cart-plus');
                this.classList.add('fa-check');
                this.parentElement.style.background = 'green';
                
                setTimeout(() => {
                    this.classList.remove('fa-check');
                    this.classList.add('fa-cart-plus');
                    this.parentElement.style.background = '';
                }, 1000);
            });
        });
    </script>
</body>
</html>