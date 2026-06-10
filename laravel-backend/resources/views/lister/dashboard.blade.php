@extends('layouts.dashboard')

@section('title', 'Lister Dashboard')
@section('page-title', 'Overview')

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
    <!-- KPI Tiles -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-blue-50 text-primary-500 flex items-center justify-center text-xl mr-4"><i class="fa-solid fa-house"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Total Listings</p>
                <p class="text-2xl font-bold text-slate-800 mt-0.5">3 Rooms</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-emerald-50 text-secondary-500 flex items-center justify-center text-xl mr-4"><i class="fa-regular fa-eye"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Total Pageviews</p>
                <p class="text-2xl font-bold text-slate-800 mt-0.5">1,240 clicks</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-amber-50 text-accent-500 flex items-center justify-center text-xl mr-4"><i class="fa-solid fa-headset"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Open Leads</p>
                <p class="text-2xl font-bold text-slate-800 mt-0.5">15 leads</p>
            </div>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded-2xl shadow-sm flex items-center">
            <span class="w-12 h-12 rounded-xl bg-purple-50 text-purple-500 flex items-center justify-center text-xl mr-4"><i class="fa-solid fa-crown"></i></span>
            <div>
                <p class="text-xs text-slate-400 font-bold uppercase">Plan Status</p>
                <p class="text-lg font-bold text-slate-800 mt-0.5">Silver Active</p>
            </div>
        </div>
    </div>
    
    <!-- Recent Messages / leads logs -->
    <div class="space-y-4">
        <h3 class="font-bold text-slate-800 text-lg">Active Leads inbox</h3>
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm divide-y divide-slate-100">
            <div class="p-6 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">AS</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-slate-800 text-sm">Arjun Sharma</h4>
                        <p class="text-xs text-slate-400 mt-0.5">Inquiry about: Vastrapur Single Room</p>
                    </div>
                </div>
                <a href="/user/messages" class="text-xs bg-primary-500 hover:bg-primary-600 text-white font-bold px-4 py-2 rounded-xl transition shadow-sm">Chat Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
