@extends('layouts.app')

@section('title', 'Property Details | RoomMitra')

@section('content')
<div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8" x-data="{ activeImage: 0 }">
    
    <!-- Image Gallery layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Image -->
        <div class="lg:col-span-2 aspect-video bg-slate-100 rounded-2xl overflow-hidden relative shadow-sm border border-slate-200">
            <img :src="activeImage === 0 ? 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80' : 'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=1200&q=80'" class="w-full h-full object-cover" />
            <span class="absolute top-4 left-4 bg-primary-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-md">Verified Space</span>
        </div>
        
        <!-- Thumbnail Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-1 gap-4 h-full">
            <button @click="activeImage = 0" class="aspect-video lg:h-32 bg-slate-150 rounded-2xl overflow-hidden border-2 transition focus:outline-none" :class="activeImage === 0 ? 'border-primary-500 shadow-md' : 'border-transparent'">
                <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover" />
            </button>
            <button @click="activeImage = 1" class="aspect-video lg:h-32 bg-slate-150 rounded-2xl overflow-hidden border-2 transition focus:outline-none" :class="activeImage === 1 ? 'border-primary-500 shadow-md' : 'border-transparent'">
                <img src="https://images.unsplash.com/photo-1598928506311-c55ded91a20c?auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover" />
            </button>
        </div>
    </div>
    
    <!-- 2-Columns details layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left details panel -->
        <div class="lg:col-span-2 space-y-6">
            <div>
                <span class="text-sm font-semibold uppercase tracking-wider text-slate-400">Rooms & PG Category</span>
                <h1 class="text-3xl font-extrabold text-slate-800 mt-1">Premium Single Room next to Vastrapur Lake</h1>
                <p class="text-sm text-slate-400 mt-2"><i class="fa-solid fa-location-dot mr-1"></i>Vastrapur, Ahmedabad, Gujarat (380015)</p>
            </div>
            
            <div class="p-6 border border-slate-200 rounded-2xl bg-white flex justify-around items-center">
                <div class="text-center">
                    <p class="text-xs text-slate-400 uppercase font-bold">Monthly Price</p>
                    <p class="text-xl font-bold text-slate-800 mt-1">₹7,500/mo</p>
                </div>
                <div class="w-px h-10 bg-slate-200"></div>
                <div class="text-center">
                    <p class="text-xs text-slate-400 uppercase font-bold">Security Deposit</p>
                    <p class="text-xl font-bold text-slate-800 mt-1">₹15,000</p>
                </div>
                <div class="w-px h-10 bg-slate-200"></div>
                <div class="text-center">
                    <p class="text-xs text-slate-400 uppercase font-bold">Sharing</p>
                    <p class="text-xl font-bold text-slate-800 mt-1">Single</p>
                </div>
            </div>
            
            <div class="space-y-3">
                <h3 class="font-bold text-slate-800 text-lg">Description</h3>
                <p class="text-sm text-slate-500 leading-relaxed">
                    Extremely well-furnished single occupancy room available immediately. Located within walking distance of local malls, food stalls and SVNIT. Fully loaded amenities like AC, high-speed WiFi, geyser and parking space are available. Included meals can be arranged upon request.
                </p>
            </div>
            
            <div class="space-y-4">
                <h3 class="font-bold text-slate-800 text-lg">Amenities Provided</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-sm text-slate-600">
                    <div class="flex items-center"><i class="fa-solid fa-wifi text-primary-500 mr-2.5"></i>High-speed WiFi</div>
                    <div class="flex items-center"><i class="fa-solid fa-snowflake text-primary-500 mr-2.5"></i>Air Conditioning (AC)</div>
                    <div class="flex items-center"><i class="fa-solid fa-square-parking text-primary-500 mr-2.5"></i>Free Bike Parking</div>
                    <div class="flex items-center"><i class="fa-solid fa-socks text-primary-500 mr-2.5"></i>Laundry Service</div>
                    <div class="flex items-center"><i class="fa-solid fa-utensils text-primary-500 mr-2.5"></i>Tiffin/Meals Facility</div>
                    <div class="flex items-center"><i class="fa-solid fa-water text-primary-500 mr-2.5"></i>Hot Water Geyser</div>
                </div>
            </div>
        </div>
        
        <!-- Right Lister Card panel -->
        <div class="space-y-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
                <!-- Lister Header -->
                <div class="flex items-center">
                    <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center font-bold text-lg text-primary-500">KP</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-slate-800 text-base">Ketan Patel</h4>
                        <span class="text-xs text-secondary-500 font-semibold"><i class="fa-solid fa-circle-check mr-1"></i>Verified Lister</span>
                    </div>
                </div>
                
                <!-- Communication Triggers -->
                <div class="space-y-3">
                    <a href="tel:+919876543210" class="w-full flex items-center justify-center bg-slate-900 text-white font-bold py-3 rounded-xl hover:bg-slate-800 transition"><i class="fa-solid fa-phone mr-2"></i>Call Lister</a>
                    <a href="https://wa.me/919876543210" class="w-full flex items-center justify-center bg-emerald-500 text-white font-bold py-3 rounded-xl hover:bg-emerald-600 transition"><i class="fa-brands fa-whatsapp mr-2"></i>WhatsApp Chat</a>
                    <a href="/user/messages?conversation=1" class="w-full flex items-center justify-center bg-primary-500 text-white font-bold py-3 rounded-xl hover:bg-primary-600 transition"><i class="fa-solid fa-comments mr-2"></i>Message in App</a>
                </div>
                
                <!-- Extra Action triggers -->
                <div class="flex justify-around text-xs text-slate-400 pt-4 border-t border-slate-100">
                    <button class="hover:text-primary-500 transition font-semibold"><i class="fa-regular fa-bookmark mr-1"></i>Save Listing</button>
                    <button class="hover:text-red-500 transition font-semibold"><i class="fa-regular fa-flag mr-1"></i>Report Listing</button>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
