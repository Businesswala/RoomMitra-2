@extends('layouts.app')

@section('title', 'Search Rooms & PGs | RoomMitra')

@section('content')
<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">
    
    <!-- Left Sidebar Filters (Desktop) -->
    <aside class="w-full lg:w-1/4 bg-white border border-slate-200 p-6 rounded-2xl shadow-sm self-start" x-data="{ selectedCategory: 'rooms' }">
        <h3 class="font-bold text-slate-800 text-lg border-b border-slate-100 pb-3 mb-4">Filters</h3>
        
        <div class="space-y-6">
            <!-- Category Toggle -->
            <div>
                <label class="block text-xs uppercase font-bold text-slate-400 mb-2">Category</label>
                <select class="w-full border border-slate-200 rounded-xl px-3 py-2.5 text-sm text-slate-700 bg-transparent focus:outline-none" x-model="selectedCategory">
                    <option value="rooms">Rooms</option>
                    <option value="pg">PG / Hostels</option>
                    <option value="roommate">Roommate Matches</option>
                    <option value="tiffin">Tiffin Kitchens</option>
                    <option value="laundry">Laundry Services</option>
                </select>
            </div>
            
            <!-- Budget Filter slider -->
            <div>
                <label class="block text-xs uppercase font-bold text-slate-400 mb-2">Monthly Budget</label>
                <input type="range" min="1000" max="25000" value="10000" class="w-full accent-primary-500 cursor-pointer" />
                <div class="flex justify-between text-xs text-slate-400 mt-1">
                    <span>₹1k</span>
                    <span>Max: ₹25k</span>
                </div>
            </div>
            
            <!-- Verification filter checkbox -->
            <div class="flex items-center">
                <input type="checkbox" id="verified_check" class="rounded border-slate-200 text-primary-500 focus:ring-primary-500 mr-2 w-4 h-4" />
                <label for="verified_check" class="text-sm font-semibold text-slate-700">Verified Listings Only</label>
            </div>
            
            <button class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-2.5 rounded-xl text-sm transition shadow-sm">
                Apply Filters
            </button>
        </div>
    </aside>
    
    <!-- Right Content Grid -->
    <section class="flex-1 space-y-6">
        <!-- Results Header -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Rooms & PG Accommodations</h2>
                <p class="text-xs text-slate-400">Showing 124 properties in Ahmedabad</p>
            </div>
            
            <!-- Sorting dropdown -->
            <div class="flex items-center space-x-2">
                <span class="text-xs text-slate-400 font-semibold whitespace-nowrap">Sort By:</span>
                <select class="border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none cursor-pointer">
                    <option>Latest Uploads</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Top Rated</option>
                </select>
            </div>
        </div>
        
        <!-- Grid list of results -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Listing card mockup -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition group">
                <div class="relative h-44 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=600&q=80" alt="Room" class="w-full h-full object-cover group-hover:scale-103 transition duration-200" />
                    <span class="absolute top-4 left-4 bg-emerald-500 text-white font-bold text-[10px] px-2.5 py-1 rounded-full uppercase tracking-wider">Active</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <span class="text-primary-500 font-bold text-base">₹8,000/mo</span>
                        <span class="text-xs text-slate-400 font-medium"><i class="fa-solid fa-location-dot mr-1"></i>Vastrapur</span>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mt-2 truncate"><a href="/listings/details/1" class="hover:text-primary-500 transition">Premium Boys PG Unit 2</a></h3>
                    <div class="flex items-center space-x-3 mt-4 pt-3 border-t border-slate-100 text-xs text-slate-500">
                        <span><i class="fa-solid fa-bed mr-1.5 text-primary-500"></i>Single</span>
                        <span><i class="fa-solid fa-wifi mr-1.5 text-primary-500"></i>WiFi</span>
                        <span><i class="fa-solid fa-snowflake mr-1.5 text-primary-500"></i>AC</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-lg transition group">
                <div class="relative h-44 overflow-hidden bg-slate-100">
                    <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=600&q=80" alt="Girls PG" class="w-full h-full object-cover group-hover:scale-103 transition duration-200" />
                    <span class="absolute top-4 left-4 bg-emerald-500 text-white font-bold text-[10px] px-2.5 py-1 rounded-full uppercase tracking-wider">Active</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <span class="text-primary-500 font-bold text-base">₹5,500/mo</span>
                        <span class="text-xs text-slate-400 font-medium"><i class="fa-solid fa-location-dot mr-1"></i>Navrangpura</span>
                    </div>
                    <h3 class="font-bold text-slate-800 text-base mt-2 truncate"><a href="/listings/details/2" class="hover:text-primary-500 transition">Deluxe Girls PG Accommodation</a></h3>
                    <div class="flex items-center space-x-3 mt-4 pt-3 border-t border-slate-100 text-xs text-slate-500">
                        <span><i class="fa-solid fa-hotel mr-1.5 text-primary-500"></i>Double</span>
                        <span><i class="fa-solid fa-utensils mr-1.5 text-primary-500"></i>Food</span>
                        <span><i class="fa-solid fa-socks mr-1.5 text-primary-500"></i>Laundry</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>
@endsection
