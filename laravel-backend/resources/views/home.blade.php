@extends('layouts.app')

@section('title', 'RoomMitra | Rental & Living Marketplace')

@section('content')
    
    <!-- Hero Header -->
    @include('components.hero')
    
    <!-- Categories Grid -->
    @include('components.categories')
    
    <!-- Featured Listings Grid -->
    @include('components.featured')
    
    <!-- Testimonials Slider -->
    @include('components.testimonials')
    
    <!-- CTA Banner -->
    @include('components.download-app')
    
@endsection
