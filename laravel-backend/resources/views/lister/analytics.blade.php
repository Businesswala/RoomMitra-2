@extends('layouts.dashboard')

@section('title', 'Visitor Insights')
@section('page-title', 'Analytics')

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
<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Visitor Clicks Mock Graph Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-slate-800 text-base">Monthly Listing Pageviews</h3>
            <p class="text-xs text-slate-400">Total views logged across all active PG and Room listings</p>
            
            <div class="h-48 flex items-end justify-between pt-6 px-4 gap-2">
                <div class="w-full bg-slate-100 rounded-t-lg h-[20%] flex flex-col justify-end text-center text-[10px] pb-1 hover:bg-primary-500 hover:text-white transition cursor-pointer">Jan</div>
                <div class="w-full bg-slate-100 rounded-t-lg h-[40%] flex flex-col justify-end text-center text-[10px] pb-1 hover:bg-primary-500 hover:text-white transition cursor-pointer">Feb</div>
                <div class="w-full bg-slate-100 rounded-t-lg h-[65%] flex flex-col justify-end text-center text-[10px] pb-1 hover:bg-primary-500 hover:text-white transition cursor-pointer">Mar</div>
                <div class="w-full bg-slate-100 rounded-t-lg h-[90%] flex flex-col justify-end text-center text-[10px] pb-1 hover:bg-primary-500 hover:text-white transition cursor-pointer">Apr</div>
            </div>
        </div>
        
        <!-- Top Categories card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-slate-800 text-base">Visitor CTR click insights</h3>
            <div class="space-y-3.5 pt-4">
                <div class="flex justify-between items-center text-sm">
                    <span class="font-semibold text-slate-650">Rooms Listings</span>
                    <span class="font-bold text-slate-800">450 clicks (36%)</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-primary-500 h-full rounded-full" style="width: 36%"></div>
                </div>
                
                <div class="flex justify-between items-center text-sm">
                    <span class="font-semibold text-slate-650">PG & Hostels</span>
                    <span class="font-bold text-slate-800">650 clicks (52%)</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                    <div class="bg-secondary-500 h-full rounded-full" style="width: 52%"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
