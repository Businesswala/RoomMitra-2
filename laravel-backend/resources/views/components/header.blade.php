<header class="sticky top-0 z-30 w-full bg-white/95 backdrop-blur border-b border-slate-200/80 shadow-sm" x-data="{ open: false, userMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        
        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <span class="text-primary-500 text-2xl font-bold"><i class="fa-solid fa-house-chimney-user"></i></span>
            <span class="font-bold text-xl text-slate-800 tracking-tight">Room<span class="text-primary-500">Mitra</span></span>
        </a>
        
        <!-- Search Trigger Header (Desktop) -->
        <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
            <a href="/listings" class="w-full flex items-center bg-slate-50 border border-slate-200/80 rounded-full px-4 py-2 hover:bg-slate-100 hover:border-slate-300 transition group">
                <i class="fa-solid fa-magnifying-glass text-slate-400 mr-2 group-hover:text-primary-500"></i>
                <span class="text-slate-400 text-sm">Where are you looking to stay?</span>
            </a>
        </div>
        
        <!-- Menu (Desktop) -->
        <div class="hidden lg:flex items-center space-x-6">
            <a href="/listings" class="text-sm font-semibold text-slate-600 hover:text-primary-500 transition">Browse Rooms</a>
            <a href="/about" class="text-sm font-semibold text-slate-600 hover:text-primary-500 transition">About</a>
            <a href="/faq" class="text-sm font-semibold text-slate-600 hover:text-primary-500 transition">FAQ</a>
            <a href="/contact" class="text-sm font-semibold text-slate-600 hover:text-primary-500 transition">Contact</a>
            
            <span class="h-6 w-px bg-slate-200"></span>
            
            <!-- Auth Buttons -->
            <a href="/login" class="text-sm font-semibold text-slate-700 hover:text-primary-500 transition">Sign In</a>
            <a href="/register" class="bg-primary-500 hover:bg-primary-600 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">Post Room</a>
        </div>
        
        <!-- Mobile Controls -->
        <div class="flex items-center lg:hidden space-x-4">
            <a href="/login" class="text-slate-500 hover:text-slate-700"><i class="fa-regular fa-user text-xl"></i></a>
            <button @click="open = !open" class="text-slate-500 hover:text-slate-700 focus:outline-none">
                <i class="fa-solid fa-bars text-xl" x-show="!open"></i>
                <i class="fa-solid fa-xmark text-xl" x-show="open" x-cloak></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Drawer Menu -->
    <div x-show="open" x-transition.opacity class="fixed inset-0 z-20 bg-slate-900/40 lg:hidden" @click="open = false" x-cloak></div>
    <div x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="-translate-y-4" x-transition:enter-end="translate-y-0" class="absolute top-16 left-0 w-full bg-white border-b border-slate-200 py-4 px-6 flex flex-col space-y-4 lg:hidden shadow-lg z-30" x-cloak>
        <a href="/listings" class="text-slate-700 hover:text-primary-500 font-semibold text-base py-2 border-b border-slate-100">Find Rooms</a>
        <a href="/about" class="text-slate-700 hover:text-primary-500 font-semibold text-base py-2 border-b border-slate-100">About Us</a>
        <a href="/faq" class="text-slate-700 hover:text-primary-500 font-semibold text-base py-2 border-b border-slate-100">FAQs</a>
        <a href="/contact" class="text-slate-700 hover:text-primary-500 font-semibold text-base py-2 border-b border-slate-100">Contact Us</a>
        <div class="flex items-center space-x-4 pt-4">
            <a href="/login" class="w-1/2 text-center text-slate-700 font-semibold py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50">Log In</a>
            <a href="/register" class="w-1/2 text-center bg-primary-500 text-white font-semibold py-2.5 rounded-xl shadow-sm hover:bg-primary-600">Register</a>
        </div>
    </div>
</header>
