@extends('layouts.dashboard')

@section('title', 'User Dashboard')
@section('page-title', 'Overview')

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
<div class="space-y-8">
    <!-- Quick Tiles -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-blue-50 text-primary-500 flex items-center justify-center text-xl mr-4"><i class="fa-regular fa-bookmark"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Bookmarks</p>
                <p class="text-2xl font-bold text-slate-800 mt-0.5">8 Saved</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-emerald-50 text-secondary-500 flex items-center justify-center text-xl mr-4"><i class="fa-regular fa-comments"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Unread Chats</p>
                <p class="text-2xl font-bold text-slate-800 mt-0.5">2 messages</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-xl mr-4"><i class="fa-solid fa-circle-check"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">KYC Badge</p>
                <p class="text-base font-bold text-slate-800 mt-0.5">Awaiting Verification</p>
            </div>
        </div>
    </div>
    
    <!-- Recent Favorites grid list -->
    <div class="space-y-4">
        <h3 class="font-bold text-slate-800 text-lg">Recently Saved Spaces</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 flex gap-4 shadow-sm hover:shadow-md transition">
                <div class="w-24 h-24 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover" />
                </div>
                <div class="flex-grow">
                    <span class="text-xs text-primary-500 font-bold">₹7,000/mo</span>
                    <h4 class="font-bold text-slate-800 text-sm mt-1">Vastrapur Single Room</h4>
                    <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Ahmedabad</p>
                    <a href="/listings/details/1" class="text-xs text-primary-500 hover:text-primary-600 font-semibold mt-3 inline-block">View Room</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
