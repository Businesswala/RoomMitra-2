@extends('layouts.app')

@section('title', 'Terms & Conditions | RoomMitra')

@section('content')
<div class="py-16 max-w-4xl mx-auto px-4">
    <h1 class="text-3xl font-extrabold text-slate-800 mb-6">Terms & Conditions</h1>
    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm space-y-6 text-sm text-slate-500 leading-relaxed">
        <p><strong>Effective Date: June 10, 2026</strong></p>
        <p>By registering a user or lister profile on the RoomMitra platform, you agree to comply with the terms and guidelines outlined here.</p>
        <h3 class="font-bold text-slate-800 text-lg">1. Listing Policies</h3>
        <p>Property owners must detail room specifics truthfully. Fake photos, misleading pricing, or posting bait-and-switch listings will result in immediate suspension by admin moderation. Verification files uploaded must be authentic.</p>
        <h3 class="font-bold text-slate-800 text-lg">2. Subscription Rules</h3>
        <p>Lister subscription upgrades (Silver, Gold, Premium) are non-refundable. Billing processes occur via secure Razorpay or PhonePe webhook triggers. Click counts and impression metrics are monitored for ad integrity.</p>
    </div>
</div>
@endsection
