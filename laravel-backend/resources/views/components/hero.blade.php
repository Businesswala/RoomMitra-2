<section class="relative bg-slate-900 py-24 sm:py-32 overflow-hidden flex items-center justify-center min-h-[500px]">
    <!-- Background Image Graphic Overlay -->
    <div class="absolute inset-0 z-0 bg-cover bg-center opacity-30" style="background-image: url('https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1920&q=80');"></div>
    <div class="absolute inset-0 bg-slate-950/70 z-0"></div>
    
    <!-- Hero Content -->
    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
            Find Your Ideal Living Space in <span class="text-primary-500">Seconds</span>
        </h1>
        <p class="mt-4 text-lg text-slate-300 max-w-2xl mx-auto">
            Book verified single rooms, boy/girl PGs, shared hostels, local tiffin meals, and laundry services directly.
        </p>
        
        <!-- Search bar component wrapper -->
        <div class="mt-10">
            @include('components.search-bar')
        </div>
    </div>
</section>
