@extends('layouts.app')

@section('title', 'FAQs | RoomMitra')

@section('content')
<div class="py-16 max-w-4xl mx-auto px-4" x-data="{ selected: 0 }">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-slate-800">Frequently Asked Questions</h1>
        <p class="mt-2 text-slate-500">Quick answers to listing rules, verifications, and services compatibility</p>
    </div>
    
    <div class="space-y-4">
        
        <!-- FAQ Accordion -->
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <button @click="selected = selected === 0 ? null : 0" class="w-full flex items-center justify-between p-6 focus:outline-none font-bold text-slate-800 text-left">
                <span>How do I get a "Verified" badge on my profile?</span>
                <i class="fa-solid" :class="selected === 0 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-slate-400'"></i>
            </button>
            <div x-show="selected === 0" x-transition class="px-6 pb-6 text-sm text-slate-500 border-t border-slate-100 pt-4">
                You must navigate to your User Profile Settings and upload a copy of your Aadhaar or PAN card along with a verification selfie. Once our admin team approves the identity audit, the Verified badge is instantly attached.
            </div>
        </div>
        
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <button @click="selected = selected === 1 ? null : 1" class="w-full flex items-center justify-between p-6 focus:outline-none font-bold text-slate-800 text-left">
                <span>Are there listing fee subscription charges?</span>
                <i class="fa-solid" :class="selected === 1 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-slate-400'"></i>
            </button>
            <div x-show="selected === 1" x-transition class="px-6 pb-6 text-sm text-slate-500 border-t border-slate-100 pt-4" x-cloak>
                Listing rooms is initially free. However, if you're a commercial property owner or PG owner listing more than 1 room, you can upgrade to Silver, Gold, or Premium subscription plans to enjoy higher thresholds and homepage boosting.
            </div>
        </div>
        
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
            <button @click="selected = selected === 2 ? null : 2" class="w-full flex items-center justify-between p-6 focus:outline-none font-bold text-slate-800 text-left">
                <span>How does Roommate Compatibility matching function?</span>
                <i class="fa-solid" :class="selected === 2 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-slate-400'"></i>
            </button>
            <div x-show="selected === 2" x-transition class="px-6 pb-6 text-sm text-slate-500 border-t border-slate-100 pt-4" x-cloak>
                We calculate compatibility using lifestyle questionnaire profiles (smoking/drinking habits, dietary choices, academic schedules, gender preferences). Our background matchmaking engine produces a matching percentage index.
            </div>
        </div>
        
    </div>
</div>
@endsection
