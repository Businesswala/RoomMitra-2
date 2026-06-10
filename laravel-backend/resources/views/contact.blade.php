@extends('layouts.app')

@section('title', 'Contact Us | RoomMitra')

@section('content')
<div class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-start" x-data="{ success: false }">
    
    <!-- Left Info Box -->
    <div class="space-y-6">
        <h1 class="text-4xl font-extrabold text-slate-800">Get in Touch</h1>
        <p class="text-slate-500 text-base">Have inquiries regarding listing packages, subscriptions, or app accounts? File a support ticket or call our helpdesk directly.</p>
        
        <div class="space-y-4 pt-4 text-slate-600">
            <div class="flex items-center">
                <span class="w-10 h-10 rounded-full bg-blue-50 text-primary-500 flex items-center justify-center text-base mr-4"><i class="fa-solid fa-phone"></i></span>
                <span>+91 98765 43210</span>
            </div>
            <div class="flex items-center">
                <span class="w-10 h-10 rounded-full bg-blue-50 text-primary-500 flex items-center justify-center text-base mr-4"><i class="fa-solid fa-envelope"></i></span>
                <span>support@roommitra.com</span>
            </div>
            <div class="flex items-center">
                <span class="w-10 h-10 rounded-full bg-blue-50 text-primary-500 flex items-center justify-center text-base mr-4"><i class="fa-solid fa-location-dot"></i></span>
                <span>Ahmedabad IT Park, Gujarat, India</span>
            </div>
        </div>
    </div>
    
    <!-- Right Form Card -->
    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <div x-show="success" x-transition class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6">
            <i class="fa-regular fa-circle-check mr-2"></i>Inquiry ticket submitted successfully. Our helpdesk will contact you within 24 hours.
        </div>
        
        <form @submit.prevent="success = true" class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Full Name</label>
                <input type="text" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="Arjun Patel" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                <input type="email" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="arjun@email.com" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Message</label>
                <textarea required rows="4" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="Detail your issue here..."></textarea>
            </div>
            <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3.5 rounded-xl transition shadow-md">
                Send Message
            </button>
        </form>
    </div>
</div>
@endsection
