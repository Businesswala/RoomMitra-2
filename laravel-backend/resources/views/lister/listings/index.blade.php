@extends('layouts.dashboard')

@section('title', 'My Properties')
@section('page-title', 'My Listings')

@section('sidebar-links')
<a href="/lister/dashboard" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-chart-pie mr-3 text-slate-400 group-hover:text-primary-500"></i>Lister Overview
</a>
<a href="/lister/listings" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-list-check mr-3 text-slate-400 group-hover:text-primary-500"></i>My Listings
</a>
<a href="/lister/listings/create" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-circle-plus mr-3 text-slate-400 group-hover:text-primary-500"></i>Add Listing
</a>
<a href="/lister/plans" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-box-open mr-3 text-slate-400 group-hover:text-primary-500"></i>Subscription Plans
</a>
<a href="/lister/advertisements" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-rectangle-ad mr-3 text-slate-400 group-hover:text-primary-500"></i>Promotions / Ads
</a>
<a href="/lister/analytics" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-chart-line mr-3 text-slate-400 group-hover:text-primary-500"></i>Visitor Analytics
</a>
<a href="/user/profile" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-regular fa-user mr-3 text-slate-400 group-hover:text-primary-500"></i>Verification / Profile
</a>
<a href="/" class="flex items-center px-4 py-3 text-sm font-semibold rounded-xl text-slate-300 hover:bg-slate-800 hover:text-white transition group">
    <i class="fa-solid fa-arrow-left mr-3 text-slate-400 group-hover:text-primary-500"></i>Main Site
</a>
@endsection

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <p class="text-slate-500 text-sm">Manage, promote and monitor properties in lister inventory</p>
        <a href="/lister/listings/create" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-4 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center"><i class="fa-solid fa-circle-plus mr-2"></i>Add Listing</a>
    </div>
    
    <!-- Listings Row list -->
    <div class="grid grid-cols-1 gap-6">
        
        <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-4 w-full md:w-1/2">
                <div class="w-20 h-20 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover" />
                </div>
                <div>
                    <span class="text-xs text-primary-500 font-bold">₹7,500/mo</span>
                    <h4 class="font-bold text-slate-800 text-base mt-1">Vastrapur Single Room</h4>
                    <p class="text-xs text-slate-400 mt-1"><i class="fa-solid fa-location-dot mr-1"></i>Ahmedabad, Gujarat</p>
                </div>
            </div>
            
            <div class="flex items-center gap-6 justify-between w-full md:w-auto">
                <div class="text-left md:text-center">
                    <p class="text-[10px] text-slate-400 uppercase font-bold">Views Count</p>
                    <p class="font-bold text-slate-800 text-sm mt-0.5">342 clicks</p>
                </div>
                <div class="text-left md:text-center">
                    <p class="text-[10px] text-slate-400 uppercase font-bold">Moderation Status</p>
                    <span class="inline-block text-[10px] bg-emerald-50 text-emerald-600 font-bold px-2.5 py-1 rounded-full uppercase tracking-wider mt-1.5">Approved</span>
                </div>
                
                <div class="flex items-center gap-2">
                    <a href="/lister/listings/edit" class="p-2 border border-slate-200 hover:border-slate-400 rounded-xl text-slate-500 transition"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button class="p-2 border border-slate-200 hover:border-red-400 hover:text-red-500 rounded-xl text-slate-500 transition"><i class="fa-regular fa-trash-can"></i></button>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
