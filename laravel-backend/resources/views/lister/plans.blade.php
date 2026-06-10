@extends('layouts.dashboard')

@section('title', 'Lister Plans')
@section('page-title', 'Subscription Plans')

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
<div class="space-y-12">
    <div class="text-center max-w-xl mx-auto">
        <h2 class="text-2xl font-bold text-slate-800">Upgrade Lister Limit</h2>
        <p class="text-slate-500 text-sm mt-1">Post more co-living rooms, boost listings higher on search queries</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">
        
        <!-- Silver Plan Card -->
        <div class="bg-white border-2 border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col relative">
            <h4 class="text-slate-400 font-bold uppercase text-xs tracking-wider">Silver Subscription</h4>
            <span class="text-slate-800 text-3xl font-extrabold mt-3">₹499<span class="text-xs text-slate-400 font-semibold">/month</span></span>
            <ul class="space-y-3 mt-6 text-sm text-slate-500 border-t border-slate-100 pt-6">
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Post up to 5 Listings</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>1 Featured Listing boost</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Chat Lead Insights logs</li>
            </ul>
            <button class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 rounded-xl text-sm transition shadow-sm mt-8">Activate Silver</button>
        </div>
        
        <!-- Gold Plan Card (Recommended) -->
        <div class="bg-white border-2 border-primary-500 rounded-2xl p-6 shadow-md flex flex-col relative transform lg:-translate-y-2">
            <span class="absolute -top-3 left-6 bg-primary-500 text-white text-[9px] uppercase font-bold tracking-wider px-3 py-1 rounded-full">Recommended</span>
            <h4 class="text-primary-500 font-bold uppercase text-xs tracking-wider">Gold Subscription</h4>
            <span class="text-slate-800 text-3xl font-extrabold mt-3">₹999<span class="text-xs text-slate-400 font-semibold">/month</span></span>
            <ul class="space-y-3 mt-6 text-sm text-slate-500 border-t border-slate-100 pt-6">
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Post up to 15 Listings</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>3 Featured Listing boosts</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Top priority Search placement</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>SMS OTP alerts for leads</li>
            </ul>
            <button class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3 rounded-xl text-sm transition shadow-md mt-8">Activate Gold</button>
        </div>
        
        <!-- Premium Plan Card -->
        <div class="bg-white border-2 border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col relative">
            <h4 class="text-slate-400 font-bold uppercase text-xs tracking-wider">Premium Subscription</h4>
            <span class="text-slate-800 text-3xl font-extrabold mt-3">₹1,999<span class="text-xs text-slate-400 font-semibold">/month</span></span>
            <ul class="space-y-3 mt-6 text-sm text-slate-500 border-t border-slate-100 pt-6">
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Unlimited Listings</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>10 Featured Listing boosts</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Unlimited direct Call leads</li>
                <li><i class="fa-solid fa-circle-check text-secondary-500 mr-2"></i>Priority Helpdesk tickets</li>
            </ul>
            <button class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 rounded-xl text-sm transition shadow-sm mt-8">Activate Premium</button>
        </div>
        
    </div>
</div>
@endsection
