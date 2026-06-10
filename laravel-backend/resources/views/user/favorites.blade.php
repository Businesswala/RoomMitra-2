@extends('layouts.dashboard')

@section('title', 'Bookmarks')
@section('page-title', 'Favorites')

@section('sidebar-links')
<a href="/user/dashboard" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-chart-pie mr-3 text-slate-400 group-hover:text-primary-500"></i>Overview
</a>
<a href="/user/favorites" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-regular fa-bookmark mr-3 text-slate-400 group-hover:text-primary-500"></i>Favorites
</a>
<a href="/user/messages" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-regular fa-comments mr-3 text-slate-400 group-hover:text-primary-500"></i>Messages
</a>
<a href="/user/notifications" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-regular fa-bell mr-3 text-slate-400 group-hover:text-primary-500"></i>Notifications
</a>
<a href="/user/profile" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-regular fa-user mr-3 text-slate-400 group-hover:text-primary-500"></i>My Profile
</a>
<a href="/" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-arrow-left mr-3 text-slate-400 group-hover:text-primary-500"></i>Main Site
</a>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Saved card mock -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group">
        <div class="relative h-40 bg-slate-100">
            <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=500&q=80" class="w-full h-full object-cover" />
            <button class="absolute top-3 right-3 w-8 h-8 rounded-full bg-white/90 backdrop-blur shadow-md flex items-center justify-center text-red-500"><i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="p-5">
            <span class="text-primary-500 font-bold text-base">₹7,500/mo</span>
            <h4 class="font-bold text-slate-800 text-sm mt-1 truncate">Premium Single Room</h4>
            <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Vastrapur, Ahmedabad</p>
            <div class="mt-4 pt-4 border-t border-slate-100 flex items-center justify-between">
                <a href="/listings/details/1" class="text-xs text-primary-500 font-bold hover:text-primary-600">View Details</a>
                <span class="text-[10px] text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full font-bold">Active</span>
            </div>
        </div>
    </div>
    
</div>
@endsection
