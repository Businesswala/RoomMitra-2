@extends('layouts.dashboard')

@section('title', 'Post Space')
@section('page-title', 'Add Listing')

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
<div class="max-w-3xl mx-auto bg-white border border-slate-200 rounded-2xl p-8 shadow-sm" x-data="{ step: 1 }">
    
    <!-- Step Progress Header -->
    <div class="flex justify-between items-center border-b border-slate-100 pb-6 mb-8 text-xs font-semibold text-slate-450 uppercase tracking-wider">
        <span :class="step >= 1 ? 'text-primary-500 font-bold' : ''">1. Category</span>
        <span class="w-8 h-px bg-slate-200"></span>
        <span :class="step >= 2 ? 'text-primary-500 font-bold' : ''">2. Details</span>
        <span class="w-8 h-px bg-slate-200"></span>
        <span :class="step >= 3 ? 'text-primary-500 font-bold' : ''">3. Media</span>
        <span class="w-8 h-px bg-slate-200"></span>
        <span :class="step >= 4 ? 'text-primary-500 font-bold' : ''">4. Amenities</span>
        <span class="w-8 h-px bg-slate-200"></span>
        <span :class="step >= 5 ? 'text-primary-500 font-bold' : ''">5. Location</span>
    </div>
    
    <form @submit.prevent="window.location.href='/lister/listings'">
        
        <!-- Step 1: Category Selection -->
        <div x-show="step === 1" class="space-y-6">
            <h3 class="font-bold text-slate-800 text-lg">Select Living Category</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <label class="border border-slate-200 p-4 rounded-xl flex items-center cursor-pointer hover:border-primary-500">
                    <input type="radio" name="cat" checked class="text-primary-500 focus:ring-primary-500 mr-3 w-4 h-4" />
                    <div>
                        <p class="font-bold text-slate-800 text-sm">Room / PG for Rent</p>
                        <p class="text-xs text-slate-400 mt-0.5">Rooms, Hostels, student housing</p>
                    </div>
                </label>
                <label class="border border-slate-200 p-4 rounded-xl flex items-center cursor-pointer hover:border-primary-500">
                    <input type="radio" name="cat" class="text-primary-500 focus:ring-primary-500 mr-3 w-4 h-4" />
                    <div>
                        <p class="font-bold text-slate-800 text-sm">Tiffin Delivery Kitchen</p>
                        <p class="text-xs text-slate-400 mt-0.5">Provide home cooked meal box subscriptions</p>
                    </div>
                </label>
            </div>
            
            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="button" @click="step = 2" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center">
                    Continue <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
        
        <!-- Step 2: Basic Details -->
        <div x-show="step === 2" class="space-y-6" x-cloak>
            <h3 class="font-bold text-slate-800 text-lg">Listing Specifics</h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Title</label>
                    <input type="text" placeholder="Cozy Single Room near SVNIT" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Monthly Rent</label>
                        <input type="text" placeholder="₹7,000" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Deposit</label>
                        <input type="text" placeholder="₹14,000" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Description</label>
                    <textarea rows="4" placeholder="Furnished single bed, geyser facility, high-speed WiFi..." class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm"></textarea>
                </div>
            </div>
            
            <div class="flex justify-between pt-4 border-t border-slate-100">
                <button type="button" @click="step = 1" class="border border-slate-200 hover:bg-slate-50 text-slate-500 font-bold px-6 py-2.5 rounded-xl text-sm transition">Back</button>
                <button type="button" @click="step = 3" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center">
                    Continue <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
        
        <!-- Step 3: Media Upload -->
        <div x-show="step === 3" class="space-y-6" x-cloak>
            <h3 class="font-bold text-slate-800 text-lg">Image & Video Uploads</h3>
            <div class="border-2 border-dashed border-slate-200 rounded-2xl p-12 text-center bg-slate-50">
                <i class="fa-regular fa-image text-slate-400 text-4xl mb-4"></i>
                <p class="text-sm font-bold text-slate-700">Drag & Drop Images here</p>
                <p class="text-xs text-slate-450 mt-1">Upload JPEG/PNG, max 10MB per image</p>
                <input type="file" multiple class="hidden" id="image_upload_trigger" />
                <button type="button" onclick="document.getElementById('image_upload_trigger').click()" class="mt-4 bg-white border border-slate-200 rounded-xl px-4 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 shadow-sm transition">Browse Files</button>
            </div>
            
            <div class="flex justify-between pt-4 border-t border-slate-100">
                <button type="button" @click="step = 2" class="border border-slate-200 hover:bg-slate-50 text-slate-500 font-bold px-6 py-2.5 rounded-xl text-sm transition">Back</button>
                <button type="button" @click="step = 4" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center">
                    Continue <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
        
        <!-- Step 4: Amenities -->
        <div x-show="step === 4" class="space-y-6" x-cloak>
            <h3 class="font-bold text-slate-800 text-lg">Amenities System</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <label class="border border-slate-200 rounded-xl p-3 flex items-center cursor-pointer hover:border-primary-500">
                    <input type="checkbox" class="rounded border-slate-200 text-primary-500 focus:ring-primary-500 mr-2.5 w-4 h-4" />
                    <span class="text-sm font-semibold text-slate-700">High-speed WiFi</span>
                </label>
                <label class="border border-slate-200 rounded-xl p-3 flex items-center cursor-pointer hover:border-primary-500">
                    <input type="checkbox" class="rounded border-slate-200 text-primary-500 focus:ring-primary-500 mr-2.5 w-4 h-4" />
                    <span class="text-sm font-semibold text-slate-700">Air Conditioning (AC)</span>
                </label>
                <label class="border border-slate-200 rounded-xl p-3 flex items-center cursor-pointer hover:border-primary-500">
                    <input type="checkbox" class="rounded border-slate-200 text-primary-500 focus:ring-primary-500 mr-2.5 w-4 h-4" />
                    <span class="text-sm font-semibold text-slate-700">Laundry Pickup</span>
                </label>
            </div>
            
            <div class="flex justify-between pt-4 border-t border-slate-100">
                <button type="button" @click="step = 3" class="border border-slate-200 hover:bg-slate-50 text-slate-500 font-bold px-6 py-2.5 rounded-xl text-sm transition">Back</button>
                <button type="button" @click="step = 5" class="bg-primary-500 hover:bg-primary-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center">
                    Continue <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
        
        <!-- Step 5: Location Details -->
        <div x-show="step === 5" class="space-y-6" x-cloak>
            <h3 class="font-bold text-slate-800 text-lg">Geolocation Details</h3>
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">City</label>
                        <select class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm">
                            <option>Ahmedabad</option>
                            <option>Surat</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Area / Locality</label>
                        <input type="text" placeholder="Vastrapur" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Full Address</label>
                    <input type="text" placeholder="Flat 402, Shiv Complex, Vastrapur" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" />
                </div>
            </div>
            
            <div class="flex justify-between pt-4 border-t border-slate-100">
                <button type="button" @click="step = 4" class="border border-slate-200 hover:bg-slate-50 text-slate-500 font-bold px-6 py-2.5 rounded-xl text-sm transition">Back</button>
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-8 py-2.5 rounded-xl text-sm transition shadow-sm flex items-center">
                    Publish Listing <i class="fa-solid fa-circle-check ml-2"></i>
                </button>
            </div>
        </div>
        
    </form>
</div>
@endsection
