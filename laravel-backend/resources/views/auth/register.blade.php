@extends('layouts.app')

@section('title', 'Create Account | RoomMitra')

@section('content')
<div class="py-16 flex items-center justify-center px-4" x-data="{ selectedTab: 'user' }">
    <div class="max-w-md w-full bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Register Account</h2>
            <p class="text-slate-400 text-sm mt-1">Connect with verified rooms & services</p>
        </div>
        
        <!-- Selector Tab (User vs Lister) -->
        <div class="flex border-b border-slate-150 mb-6 text-sm">
            <button @click="selectedTab = 'user'" :class="selectedTab === 'user' ? 'border-primary-500 text-primary-500 font-bold' : 'border-transparent text-slate-400'" class="w-1/2 text-center pb-2.5 border-b-2 font-medium">Standard User (Seeker)</button>
            <button @click="selectedTab = 'lister'" :class="selectedTab === 'lister' ? 'border-primary-500 text-primary-500 font-bold' : 'border-transparent text-slate-400'" class="w-1/2 text-center pb-2.5 border-b-2 font-medium">Property Owner (Lister)</button>
        </div>
        
        <form class="space-y-5" @submit.prevent="window.location.href=selectedTab === 'lister' ? '/lister/dashboard' : '/user/dashboard'">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1 font-medium">Full Name</label>
                <input type="text" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="Ketan Shah" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1 font-medium">Email Address</label>
                <input type="email" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="ketan@email.com" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1 font-medium">Mobile Phone</label>
                <input type="text" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="+91 98765 43210" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1 font-medium">Password</label>
                <input type="password" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="••••••••" />
            </div>
            
            <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3.5 rounded-xl transition shadow-md">
                Register Account
            </button>
            
            <p class="text-center text-xs text-slate-400 mt-4">
                Already registered? <a href="/login" class="text-primary-500 hover:underline font-semibold">Login here</a>
            </p>
        </form>
    </div>
</div>
@endsection
