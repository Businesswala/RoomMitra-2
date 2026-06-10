@extends('layouts.dashboard')

@section('title', 'My Account')
@section('page-title', 'Profile & Verification')

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
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8" x-data="{ kycStatus: 'pending' }">
    
    <!-- Left form edits panel -->
    <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h3 class="font-bold text-slate-800 text-lg border-b border-slate-100 pb-3 mb-6">Personal Details</h3>
        
        <form class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                    <input type="text" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" value="Ketan Shah" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                    <input type="email" class="block w-full border border-slate-200 rounded-xl px-4 py-3 bg-slate-50 text-slate-400 cursor-not-allowed text-sm" value="ketan@roommitra.com" readonly />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Mobile Phone</label>
                    <input type="text" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" value="+91 98765 43210" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Gender</label>
                    <select class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Bio / Lifestyle Details</label>
                <textarea rows="3" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm">Quiet student looking for roommates near Vastrapur Lake. Vegan and non-smoker.</textarea>
            </div>
            
            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-6 py-3 rounded-xl text-sm transition shadow-sm">
                Save Profile Modifications
            </button>
        </form>
    </div>
    
    <!-- Right KYC upload panel -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
        <h3 class="font-bold text-slate-800 text-lg border-b border-slate-100 pb-3">Verification Badge</h3>
        
        <div class="p-4 rounded-xl border" :class="kycStatus === 'pending' ? 'bg-amber-50 border-amber-200 text-amber-600' : 'bg-emerald-50 border-emerald-250 text-emerald-600'">
            <div class="flex items-center gap-2">
                <i class="fa-solid" :class="kycStatus === 'pending' ? 'fa-triangle-exclamation' : 'fa-circle-check'"></i>
                <span class="font-bold text-sm" x-text="kycStatus === 'pending' ? 'Verification Awaiting' : 'Verified Badge Active'"></span>
            </div>
            <p class="text-xs mt-1 leading-relaxed" x-text="kycStatus === 'pending' ? 'Please upload Aadhaar or PAN and matching selfie to request verified lister badge status.' : 'Profile successfully audited by RoomMitra administrator.'"></p>
        </div>
        
        <div class="space-y-4" x-show="kycStatus === 'pending'">
            <div>
                <label class="block text-xs uppercase font-bold text-slate-400 mb-1">Aadhaar or PAN Card Copy</label>
                <input type="file" class="block w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-primary-500 hover:file:bg-blue-100 cursor-pointer" />
            </div>
            <div>
                <label class="block text-xs uppercase font-bold text-slate-400 mb-1">Selfie Verification Photo</label>
                <input type="file" class="block w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-primary-500 hover:file:bg-blue-100 cursor-pointer" />
            </div>
            <button @click="kycStatus = 'approved'" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3 rounded-xl text-sm transition shadow-sm">
                Submit KYC Document
            </button>
        </div>
    </div>
</div>
@endsection
