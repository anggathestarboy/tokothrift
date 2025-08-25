
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #1a1a1a 0%, #0d0d0d 100%);
            border-right: 1px solid #333333;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .navbar {
            background: linear-gradient(90deg, #1a1a1a 0%, #0f0f0f 100%);
            border-bottom: 1px solid #333333;
            backdrop-filter: blur(10px);
        }

        .menu-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 8px;
            margin: 4px 0;
        }

        .menu-item:hover {
            background: linear-gradient(90deg, #333333 0%, #2a2a2a 100%);
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        .menu-item.active {
            background: linear-gradient(90deg, #ffffff 0%, #e5e5e5 100%);
            color: #000000;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .data-table {
            background: linear-gradient(145deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px solid #333333;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            overflow-x: auto;
        }

        .table-header {
            background: linear-gradient(90deg, #2a2a2a 0%, #1f1f1f 100%);
            border-bottom: 2px solid #444444;
        }

        .table-row {
            border-bottom: 1px solid #2a2a2a;
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background: linear-gradient(90deg, #1f1f1f 0%, #242424 100%);
            transform: scale(1.01);
        }

        .btn-edit {
            background: linear-gradient(45deg, #ffffff 0%, #e5e5e5 100%);
            color: #000000;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(255, 255, 255, 0.1);
        }

        .btn-edit:hover {
            background: linear-gradient(45deg, #f5f5f5 0%, #d5d5d5 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .btn-delete {
            background: linear-gradient(45deg, #333333 0%, #1a1a1a 100%);
            color: #ffffff;
            border: 1px solid #555555;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .btn-delete:hover {
            background: linear-gradient(45deg, #444444 0%, #2a2a2a 100%);
            border-color: #666666;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
        }

        .stats-card {
            background: linear-gradient(135deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px solid #333333;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .stats-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(255, 255, 255, 0.1);
            border-color: #555555;
        }

        .search-input {
            background: linear-gradient(45deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px solid #333333;
            color: #ffffff;
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #ffffff;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }

        .search-input::placeholder {
            color: #999999;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        .icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 8px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            z-index: 101;
            position: fixed;
            top: 15px;
            right: 15px;
        }

        /* Responsive styles */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 100;
                height: 100vh;
                overflow-y: auto;
                top: 0;
                left: 0;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
                padding-top: 60px;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .search-input {
                width: 100%;
                max-width: 200px;
            }
            
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 90;
            }
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
                padding: 10px;
            }
            
            .navbar-content > div {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-input {
                max-width: 150px;
            }
            
            .data-table {
                border-radius: 8px;
            }
            
            .data-table table {
                min-width: 600px;
            }
            
            .btn-edit, .btn-delete {
                padding: 6px 12px;
                font-size: 14px;
            }
        }

        @media (max-width: 640px) {
            .search-input {
                max-width: 120px;
                padding: 10px 12px;
                font-size: 14px;
            }
            
            .user-info span {
                display: none;
            }
            
            .main-content {
                padding: 10px;
            }
            
            .data-table {
                margin: 0 -10px;
                border-radius: 0;
                border-left: none;
                border-right: none;
            }
        }

        /* Overlay for mobile menu */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99;
        }
        
        .overlay.active {
            display: block;
        }
        
        /* Form styles */
        .form-input {
            background: linear-gradient(45deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px solid #333333;
            color: #ffffff;
            border-radius: 8px;
            padding: 12px 16px;
            width: 100%;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #ffffff;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #cccccc;
        }
        
        .file-input {
            background: linear-gradient(45deg, #1a1a1a 0%, #0f0f0f 100%);
            border: 1px dashed #555555;
            color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            width: 100%;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 16px;
        }
        
        .file-input:hover {
            border-color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Mobile menu button -->
    <button class="mobile-menu-btn" id="mobileMenuButton">
        ☰
    </button>

    <!-- Overlay for mobile menu -->
    <div class="overlay" id="overlay"></div>

    <!-- Sidebar -->
    <div class="sidebar fixed inset-y-0 left-0 w-64 z-50" id="sidebar">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
                <p class="text-gray-400 text-sm mt-1">Dashboard Control</p>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="flex-1 p-4 space-y-2">
                <a href="/admin" class="menu-item flex items-center px-4 py-3 text-sm text-gray-300">
                    <svg class="icon mr-3" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    Dashboard
                </a>
                <a href="/admin/pakaian" class="menu-item flex items-center px-4 py-3 text-sm text-gray-300">
                    <svg class="icon mr-3" viewBox="0 0 24 24">
                        <path d="M16 7c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm4 0c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4zM12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm0-6c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                    </svg>
                    Pakaian
                </a>
                <a href="#" class="menu-item flex items-center px-4 py-3 text-sm text-gray-300">
                    <svg class="icon mr-3" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
                    Pembelian
                </a>
                <a href="/admin/category" class="menu-item flex items-center px-4 py-3 text-sm text-gray-300">
                    <svg class="icon mr-3" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    Kategori
                </a>
                <a href="#" class="menu-item flex items-center px-4 py-3 text-sm text-gray-300">
                    <svg class="icon mr-3" viewBox="0 0 24 24">
                        <path d="M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.44-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z"/>
                    </svg>
                    Settings
                </a>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content ml-64 min-h-screen" id="mainContent">
        <!-- Navbar -->
        <header class="navbar sticky top-0 z-40">
            <div class="flex items-center justify-between px-6 py-4 navbar-content">
                <div class="flex items-center space-x-4">
                    <h2 class="text-xl font-semibold text-white">Data Management</h2>
                </div>
                <div class="flex items-center space-x-4">
                    
                    <div class="flex items-center space-x-2 user-info">
                        <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                            <span class="text-black font-semibold text-sm">A</span>
                        </div>
                        <span class="text-white font-medium">Admin</span>
                    </div>
                </div>
            </div>
        </header>
