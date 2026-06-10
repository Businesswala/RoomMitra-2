<?php

use Illuminate\Support\Facades\Route;

// Public Pages
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/terms', function () {
    return view('terms');
});

// Listings
Route::get('/listings', function () {
    return view('listings.index');
});

Route::get('/listings/details/{id}', function ($id) {
    return view('listings.show', ['id' => $id]);
});

Route::get('/listings/search', function () {
    return view('listings.search');
});

// Auth Routing
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

Route::get('/logout', function () {
    return redirect('/login');
});

// Standard User Dashboard Group
Route::prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    });
    
    Route::get('/favorites', function () {
        return view('user.favorites');
    });
    
    Route::get('/messages', function () {
        return view('user.messages');
    });
    
    Route::get('/notifications', function () {
        return view('user.notifications');
    });
    
    Route::get('/profile', function () {
        return view('user.profile');
    });
});

// Lister Dashboard Group
Route::prefix('lister')->group(function () {
    Route::get('/dashboard', function () {
        return view('lister.dashboard');
    });
    
    Route::get('/listings', function () {
        return view('lister.listings.index');
    });
    
    Route::get('/listings/create', function () {
        return view('lister.listings.create');
    });
    
    Route::get('/listings/edit', function () {
        return view('lister.listings.edit');
    });
    
    Route::get('/plans', function () {
        return view('lister.plans');
    });
    
    Route::get('/advertisements', function () {
        return view('lister.advertisements');
    });
    
    Route::get('/analytics', function () {
        return view('lister.analytics');
    });
});
