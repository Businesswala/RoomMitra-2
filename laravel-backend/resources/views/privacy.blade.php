@extends('layouts.app')

@section('title', 'Privacy Policy | RoomMitra')

@section('content')
<div class="py-16 max-w-4xl mx-auto px-4">
    <h1 class="text-3xl font-extrabold text-slate-800 mb-6">Privacy Policy</h1>
    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm space-y-6 text-sm text-slate-500 leading-relaxed">
        <p><strong>Last Updated: June 10, 2026</strong></p>
        <p>At RoomMitra, we prioritize the protection of your personal and demographic datasets. This privacy statement documents the information we collect, how it maps to our verification audits, and the security systems safeguarding listings and messages details.</p>
        <h3 class="font-bold text-slate-800 text-lg">1. Collected Information</h3>
        <p>We collect credentials details (Name, Email, Mobile number) upon register actions, alongside identity KYC files (Aadhaar, PAN scans) meant strictly for user verification badge approvals. Location coordinates are collected for mapping local listings.</p>
        <h3 class="font-bold text-slate-800 text-lg">2. Data Storage</h3>
        <p>Sensitive database items are stored on secure MySQL databases with encryption. Document uploads are stored inside private Cloudflare R2 object store nodes. We do not sell or lease profile information to third-party ad networks.</p>
    </div>
</div>
@endsection
