@extends('layouts.dashboard')

@section('title', 'Conversations')
@section('page-title', 'Messages')

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
<div class="bg-white border border-slate-200 rounded-2xl h-[calc(100vh-12rem)] flex overflow-hidden shadow-sm">
    
    <!-- Left Chat Sidebar -->
    <div class="w-full md:w-80 border-r border-slate-150 flex flex-col">
        <div class="p-4 border-b border-slate-100 bg-slate-50/50">
            <input type="text" placeholder="Search contacts..." class="w-full border border-slate-200 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-primary-500" />
        </div>
        <div class="flex-grow overflow-y-auto divide-y divide-slate-100">
            <a href="#" class="flex items-center p-4 bg-blue-50/40 hover:bg-slate-50 transition border-l-4 border-primary-500">
                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">KP</div>
                <div class="ml-3 flex-grow overflow-hidden">
                    <div class="flex justify-between items-baseline">
                        <h4 class="font-bold text-slate-800 text-sm truncate">Ketan Patel</h4>
                        <span class="text-[9px] text-slate-400">10:45 AM</span>
                    </div>
                    <p class="text-xs text-slate-500 truncate mt-0.5">Yes, the Vastrapur room is vacant!</p>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Right Chat Screen -->
    <div class="hidden md:flex flex-col flex-1 bg-slate-50/30">
        <!-- Header -->
        <div class="p-4 bg-white border-b border-slate-150 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">KP</div>
                <div class="ml-3">
                    <h4 class="font-bold text-slate-800 text-sm">Ketan Patel</h4>
                    <span class="text-[10px] text-secondary-500 font-semibold flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-secondary-500 mr-1.5"></span>Online</span>
                </div>
            </div>
        </div>
        
        <!-- Bubble list -->
        <div class="flex-grow p-6 overflow-y-auto space-y-4">
            <div class="flex items-end">
                <div class="bg-white border border-slate-200 rounded-2xl rounded-bl-none p-3.5 max-w-sm text-sm text-slate-600 shadow-sm">
                    Hello, is the Vastrapur single room still available?
                    <span class="block text-[8px] text-slate-400 text-right mt-1.5">Yesterday, 5:30 PM</span>
                </div>
            </div>
            
            <div class="flex items-end justify-end">
                <div class="bg-primary-500 text-white rounded-2xl rounded-br-none p-3.5 max-w-sm text-sm shadow-md">
                    Yes, the Vastrapur room is vacant! You can visit tomorrow at 11 AM.
                    <span class="block text-[8px] text-blue-200 text-right mt-1.5">10:45 AM &bull; Read</span>
                </div>
            </div>
        </div>
        
        <!-- Input bottom -->
        <div class="p-4 bg-white border-t border-slate-150 flex items-center gap-3">
            <button class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-paperclip text-lg"></i></button>
            <input type="text" placeholder="Type your message here..." class="flex-grow border border-slate-200 rounded-xl px-4 py-2.5 text-xs focus:outline-none focus:border-primary-500" />
            <button class="bg-primary-500 text-white rounded-xl w-10 h-10 flex items-center justify-center shadow-md hover:bg-primary-600"><i class="fa-solid fa-paper-plane text-sm"></i></button>
        </div>
    </div>
</div>
@endsection
