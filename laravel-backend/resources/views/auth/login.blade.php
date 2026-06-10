@extends('layouts.app')

@section('title', 'Sign In | RoomMitra')

@section('content')
<div class="py-20 flex items-center justify-center px-4" x-data="{ loginMode: 'password' }">
    <div class="max-w-md w-full bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Welcome Back</h2>
            <p class="text-slate-400 text-sm mt-1">Access your Rental & Living Ecosystem dashboard</p>
        </div>
        
        <!-- Login Mode Switch tabs -->
        <div class="flex border-b border-slate-150 mb-6 text-sm">
            <button @click="loginMode = 'password'" :class="loginMode === 'password' ? 'border-primary-500 text-primary-500 font-bold' : 'border-transparent text-slate-400'" class="w-1/2 text-center pb-2.5 border-b-2 font-medium">Password Login</button>
            <button @click="loginMode = 'otp'" :class="loginMode === 'otp' ? 'border-primary-500 text-primary-500 font-bold' : 'border-transparent text-slate-400'" class="w-1/2 text-center pb-2.5 border-b-2 font-medium">OTP Code Login</button>
        </div>
        
        <form class="space-y-6" @submit.prevent="window.location.href='/user/dashboard'">
            <!-- Email/Mobile field -->
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Email or Mobile Number</label>
                <input type="text" required class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="arjun@email.com or +91..." />
            </div>
            
            <!-- Password Field (Password mode) -->
            <div x-show="loginMode === 'password'">
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-semibold text-slate-700">Password</label>
                    <a href="/forgot-password" class="text-xs text-primary-500 hover:text-primary-600 font-semibold">Forgot Password?</a>
                </div>
                <input type="password" :required="loginMode === 'password'" class="block w-full border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary-500 text-sm" placeholder="••••••••" />
            </div>
            
            <!-- OTP Input Field (OTP mode) -->
            <div x-show="loginMode === 'otp'" x-cloak>
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-semibold text-slate-700">6-Digit OTP</label>
                    <button type="button" class="text-xs text-primary-500 hover:text-primary-600 font-bold">Request OTP Code</button>
                </div>
                <input type="text" :required="loginMode === 'otp'" class="block w-full border border-slate-200 rounded-xl px-4 py-3 text-center tracking-widest text-lg focus:outline-none focus:border-primary-500" placeholder="0 0 0 0 0 0" />
            </div>
            
            <!-- Sign In trigger -->
            <button type="submit" class="w-full bg-primary-500 hover:bg-primary-600 text-white font-bold py-3.5 rounded-xl transition shadow-md">
                Sign In
            </button>
            
            <!-- Social Google login -->
            <button type="button" class="w-full flex items-center justify-center border border-slate-200 rounded-xl py-3.5 hover:bg-slate-50 transition text-sm font-semibold text-slate-650">
                <i class="fa-brands fa-google mr-2 text-red-500"></i>Continue with Google
            </button>
            
            <p class="text-center text-xs text-slate-400 font-medium">
                Don't have an account yet? <a href="/register" class="text-primary-500 hover:underline font-semibold">Register here</a>
            </p>
        </form>
    </div>
</div>
@endsection
