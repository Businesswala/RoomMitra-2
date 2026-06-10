@extends('layouts.app')

@section('title', 'Search Results | RoomMitra')

@section('content')
<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 text-center max-w-xl mx-auto">
        <h2 class="text-2xl font-bold text-slate-800">Search Results for: <span class="text-primary-500">Ahmedabad</span></h2>
        <p class="text-slate-400 text-sm mt-1">Lifestyle Category: Rooms for Rent | Budget Max: ₹12,000</p>
    </div>
    
    <!-- Unified search panel inclusion -->
    <div class="mb-12">
        @include('components.search-bar')
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Result Cards mock -->
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
            <div class="relative h-44 bg-slate-100">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" />
            </div>
            <div class="p-6">
                <span class="text-primary-500 font-bold text-base">₹9,000/mo</span>
                <h3 class="font-bold text-slate-800 mt-2"><a href="/listings/details/1" class="hover:text-primary-500 transition">Vastrapur Cozy Studio</a></h3>
                <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Ahmedabad</p>
            </div>
        </div>
        
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
            <div class="relative h-44 bg-slate-100">
                <img src="https://images.unsplash.com/photo-1555854877-bab0e564b8d5?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" />
            </div>
            <div class="p-6">
                <span class="text-primary-500 font-bold text-base">₹6,500/mo</span>
                <h3 class="font-bold text-slate-800 mt-2"><a href="/listings/details/2" class="hover:text-primary-500 transition">Navrangpura Sharing Room</a></h3>
                <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Ahmedabad</p>
            </div>
        </div>
    </div>
</div>
@endsection
