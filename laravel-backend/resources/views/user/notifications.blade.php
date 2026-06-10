@extends('layouts.dashboard')

@section('title', 'Alert Logs')
@section('page-title', 'Notifications')

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
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm max-w-3xl space-y-4">
    
    <div class="flex items-start gap-4 p-4 hover:bg-slate-50 rounded-xl transition">
        <span class="w-10 h-10 rounded-full bg-blue-50 text-primary-500 flex items-center justify-center text-sm flex-shrink-0"><i class="fa-solid fa-comments"></i></span>
        <div>
            <h4 class="font-bold text-slate-800 text-sm">New Message Received</h4>
            <p class="text-xs text-slate-400 mt-0.5">Ketan Patel sent a reply about your PG search inquiry.</p>
            <span class="text-[10px] text-slate-350 mt-1 block">Today, 10:45 AM</span>
        </div>
    </div>
    
    <div class="flex items-start gap-4 p-4 hover:bg-slate-50 rounded-xl transition">
        <span class="w-10 h-10 rounded-full bg-emerald-50 text-secondary-500 flex items-center justify-center text-sm flex-shrink-0"><i class="fa-regular fa-bell"></i></span>
        <div>
            <h4 class="font-bold text-slate-800 text-sm">Plan Activated</h4>
            <p class="text-xs text-slate-400 mt-0.5">Lister account upgraded to Premium Subscription Plan.</p>
            <span class="text-[10px] text-slate-350 mt-1 block">Yesterday, 2:15 PM</span>
        </div>
    </div>
    
</div>
@endsection
