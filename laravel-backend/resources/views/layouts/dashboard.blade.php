<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | RoomMitra')</title>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind & Alpine -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#eff6ff', 500: '#2563EB', 600: '#1d4ed8', 700: '#1e40af' },
                        secondary: { 50: '#ecfdf5', 500: '#10B981', 600: '#059669' },
                        accent: { 500: '#F59E0B' },
                        bgLight: '#F8FAFC',
                    },
                    fontFamily: { sans: ['Poppins', 'Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full font-sans antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false }">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Navigation (Desktop) -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-slate-900 text-white">
                <!-- Sidebar Header -->
                <div class="flex items-center h-16 px-6 bg-slate-950 font-bold text-xl tracking-wide">
                    <span class="text-primary-500 mr-2"><i class="fa-solid fa-house-chimney-user"></i></span>
                    <span>Room<span class="text-primary-500">Mitra</span></span>
                </div>
                
                <!-- Navigation links -->
                <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                    @yield('sidebar-links')
                </nav>
                
                <!-- Sidebar User Footer -->
                <div class="flex items-center p-4 border-t border-slate-800">
                    <div class="w-10 h-10 rounded-full bg-slate-700 flex items-center justify-center font-bold text-lg text-primary-500">U</div>
                    <div class="ml-3">
                        <p class="text-sm font-semibold truncate">Logged User</p>
                        <a href="/logout" class="text-xs text-slate-400 hover:text-white"><i class="fa-solid fa-arrow-right-from-bracket mr-1"></i>Logout</a>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Mobile Sidebar Modal Overlay -->
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/60 md:hidden" @click="sidebarOpen = false" x-cloak></div>
        
        <!-- Mobile Sidebar Drawer -->
        <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 bg-slate-900 text-white md:hidden" x-cloak>
            <div class="flex items-center justify-between h-16 px-6 bg-slate-950 font-bold text-xl">
                <span>Room<span class="text-primary-500">Mitra</span></span>
                <button @click="sidebarOpen = false" class="text-slate-400 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <nav class="flex-grow px-4 py-6 space-y-1 overflow-y-auto">
                @yield('sidebar-links')
            </nav>
        </aside>
        
        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <!-- Header bar -->
            <header class="flex items-center justify-between h-16 px-6 bg-white border-b border-slate-200">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-slate-500 hover:text-slate-700 md:hidden mr-4">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-lg md:text-xl font-bold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                </div>
                
                <div class="flex items-center space-y-0 space-x-4">
                    <a href="/notifications" class="text-slate-400 hover:text-slate-600 relative">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                    </a>
                    <a href="/" class="text-sm font-semibold text-primary-500 hover:text-primary-600 hidden sm:inline-block">View Homepage</a>
                </div>
            </header>
            
            <!-- Dynamic Content -->
            <main class="flex-grow overflow-y-auto p-6 md:p-8">
                @yield('content')
            </main>
            
            <!-- Mobile Bottom Nav -->
            <div class="md:hidden border-t border-slate-200 bg-white py-2 px-6 flex justify-around items-center">
                <a href="/" class="flex flex-col items-center text-slate-500 hover:text-primary-500">
                    <i class="fa-solid fa-house text-lg"></i>
                    <span class="text-xs mt-1">Home</span>
                </a>
                <a href="/listings" class="flex flex-col items-center text-slate-500 hover:text-primary-500">
                    <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    <span class="text-xs mt-1">Search</span>
                </a>
                <a href="/user/messages" class="flex flex-col items-center text-slate-500 hover:text-primary-500">
                    <i class="fa-regular fa-comments text-lg"></i>
                    <span class="text-xs mt-1">Chat</span>
                </a>
                <a href="/user/profile" class="flex flex-col items-center text-slate-500 hover:text-primary-500">
                    <i class="fa-regular fa-user text-lg"></i>
                    <span class="text-xs mt-1">Profile</span>
                </a>
            </div>
        </div>
    </div>
    
</body>
</html>
