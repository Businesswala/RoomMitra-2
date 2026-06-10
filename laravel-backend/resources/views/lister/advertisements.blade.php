@extends('layouts.dashboard')

@section('title', 'Promotional Campaigns')
@section('page-title', 'Advertisements')

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
        <p class="text-slate-500 text-sm">Post homepage sliders or search results banner ad blocks</p>
        <button class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-4 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center"><i class="fa-solid fa-circle-plus mr-2"></i>Add Campaign</button>
    </div>
    
    <!-- Table listing -->
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left text-sm divide-y divide-slate-100">
            <thead class="bg-slate-50/50 font-bold text-slate-700">
                <tr>
                    <th class="p-4">Ad Campaign</th>
                    <th class="p-4">Position Placement</th>
                    <th class="p-4">Date Duration</th>
                    <th class="p-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-600">
                <tr>
                    <td class="p-4 font-semibold text-slate-800">Vastrapur Banner Promo</td>
                    <td class="p-4">Homepage Banner Slider</td>
                    <td class="p-4 text-xs">June 01 - June 30, 2026</td>
                    <td class="p-4 text-center"><span class="inline-block text-[9px] bg-emerald-50 text-emerald-600 font-bold px-2 py-0.5 rounded-full uppercase">Active</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
