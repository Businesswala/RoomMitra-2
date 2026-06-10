<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" x-data="{ active: 0 }">
        <h2 class="text-3xl font-bold tracking-tight text-slate-800">What Our Clients Say</h2>
        <p class="mt-2 text-slate-500">Hear directly from students and property owners in our ecosystem</p>
        
        <!-- Slides -->
        <div class="max-w-3xl mx-auto mt-12 relative min-h-[220px]">
            <div x-show="active === 0" x-transition class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm text-left">
                <p class="text-slate-600 italic text-base">"Finding a roommate next to my university in Surat was a nightmare. Through RoomMitra, I found Alpesh within 3 days. Our compatibility score was 92% and we've been living peacefully since!"</p>
                <div class="mt-6 flex items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-200 font-bold text-slate-600 flex items-center justify-center">AS</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-slate-800">Arjun Sharma</h4>
                        <p class="text-xs text-slate-400">Student, SVNIT Surat</p>
                    </div>
                </div>
            </div>
            
            <div x-show="active === 1" x-transition class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm text-left" x-cloak>
                <p class="text-slate-600 italic text-base">"As a listing owner in Ahmedabad, managing room leads was tedious. The Lister Dashboard is extremely clean. I got 15+ verified leads inside a week and filled my vacant PG room."</p>
                <div class="mt-6 flex items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-200 font-bold text-slate-600 flex items-center justify-center">KP</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-slate-800">Ketan Patel</h4>
                        <p class="text-xs text-slate-400">Lister, Ahmedabad</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dot Navigation -->
        <div class="flex justify-center items-center space-x-2 mt-6">
            <button @click="active = 0" :class="active === 0 ? 'bg-primary-500 w-6' : 'bg-slate-300 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
            <button @click="active = 1" :class="active === 1 ? 'bg-primary-500 w-6' : 'bg-slate-300 w-2'" class="h-2 rounded-full transition-all duration-300"></button>
        </div>
    </div>
</section>
