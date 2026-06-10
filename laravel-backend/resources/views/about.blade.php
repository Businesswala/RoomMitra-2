@extends('layouts.app')

@section('title', 'About Us | RoomMitra')

@section('content')
<div class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto">
        <h1 class="text-4xl font-extrabold text-slate-800">Our Vision</h1>
        <p class="mt-4 text-slate-500 text-lg">
            We are building India's largest and most trusted digital platform for co-living ecosystems. Mapped for students, workers, and listers, RoomMitra bridges the gap in search, payments, roommate compatibility, and household services.
        </p>
    </div>
    
    <!-- Values Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16">
        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm text-center">
            <div class="w-12 h-12 rounded-xl bg-blue-50 text-primary-500 flex items-center justify-center text-xl mx-auto mb-4">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3 class="font-bold text-slate-800 text-lg">Trust & Security</h3>
            <p class="text-sm text-slate-500 mt-2">Verified profile badges, Aadhaar verification gates, and secure dashboard verification tools ensure double safety.</p>
        </div>
        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm text-center">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-secondary-500 flex items-center justify-center text-xl mx-auto mb-4">
                <i class="fa-solid fa-users"></i>
            </div>
            <h3 class="font-bold text-slate-800 text-lg">Community Centric</h3>
            <p class="text-sm text-slate-500 mt-2">More than just rooms, we match roommates based on lifestyle questionnaire attributes for premium synergy.</p>
        </div>
        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-sm text-center">
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-accent-500 flex items-center justify-center text-xl mx-auto mb-4">
                <i class="fa-solid fa-handshake-angle"></i>
            </div>
            <h3 class="font-bold text-slate-800 text-lg">All-in-One Service</h3>
            <p class="text-sm text-slate-500 mt-2">Integrated household tiffin deliveries and local laundry networks inside a single app framework.</p>
        </div>
    </div>
</div>
@endsection
