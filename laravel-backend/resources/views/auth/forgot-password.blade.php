@extends('layouts.app')

@section('title', 'Forgot Password | RoomMitra')

@section('content')
<div class="py-24 flex items-center justify-center px-4" x-data="{ success: false }">
    <div class="max-w-md w-full bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Recover Password</h2>
            <p class="text-slate-400 text-sm mt-1">We will send a reset password verification link to your inbox</p>
        </div>
        
        <div x-show="success" x-transition class="bg-emerald-50 border border-emerald-200 text-emerald-600 p-4 rounded-xl mb-6 text-sm">
            <i class="fa-regular fa-circle-check mr-2"></i>Reset verification link sent to your email. Check your spam if not received.
        </div>
        
        <form class="space-y-6" @submit.prevent="success = true" x-show="!success">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email Address</label>
                <input type="email" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="ketan@email.com" />
            </div>
            
            <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3.5 rounded-xl transition shadow-md">
                Send Reset Link
            </button>
        </form>
        
        <div class="text-center mt-6 text-xs text-slate-450 font-medium">
            <a href="/login" class="text-primary-500 hover:underline"><i class="fa-solid fa-arrow-left-long mr-1.5"></i>Back to login</a>
        </div>
    </div>
</div>
@endsection
