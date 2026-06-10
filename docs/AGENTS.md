# AGENTS.md

# RoomMitra Development Guidelines

## Project Overview

RoomMitra is a rental and living ecosystem platform that connects users with rooms, hostels, PGs, roommates, tiffin providers, laundry providers, and local service providers.

The platform consists of:

1. Mobile App (Flutter)
2. Website (Laravel + Tailwind CSS)
3. Admin Dashboard
4. REST API Backend

---

# Project Objectives

Build a scalable, secure, modern marketplace platform with:

* User Module
* Lister Module
* Admin Module
* Subscription System
* Advertisement System
* Real-Time Chat
* Verification System

The codebase must be production-ready.

---

# Tech Stack

## Frontend Web

* Laravel Blade
* Tailwind CSS
* Alpine.js
* JavaScript

## Mobile App

* Flutter
* Provider / Riverpod

## Backend

* Laravel 12
* PHP 8.3

## Database

* MySQL 8+

## Cache

* Redis

## Queue

* Laravel Queue

## Storage

* Cloudflare R2
* AWS S3 Compatible

## Realtime

* Laravel Reverb
* WebSockets

## Authentication

* Laravel Sanctum

---

# User Roles

## User

Permissions:

* Register
* Login
* Search Listings
* Save Favorites
* Contact Lister
* Chat
* Review Listings
* Report Listings

## Lister

Permissions:

* Create Listings
* Edit Listings
* Delete Listings
* Buy Plans
* Promote Listings
* Chat With Users
* Manage Leads

## Admin

Permissions:

* Full Platform Access
* User Management
* Listing Management
* Revenue Management
* Verification Management

---

# Core Modules

## Authentication Module

Features:

* Email Login
* Mobile OTP Login
* Google Login
* Forgot Password
* JWT Authentication
* Role-Based Access

---

## Listing Module

Categories:

* Rooms
* Hostel
* PG
* Roommate
* Tiffin
* Laundry
* Services

Fields:

* Title
* Description
* Images
* Videos
* Price
* Deposit
* Address
* Latitude
* Longitude
* Amenities
* Contact Details

---

## Search Module

Filters:

* City
* Area
* Budget
* Category
* Gender
* Amenities
* Availability

Requirements:

* Fast Search
* Pagination
* SEO Friendly URLs

---

## Chat Module

Requirements:

* Real-Time Messaging
* Read Receipts
* Image Sharing
* Typing Indicator
* Chat History

Admin Requirements:

* Chat Monitoring
* Abuse Detection

---

## Review Module

Requirements:

* Rating
* Reviews
* Report Review
* Moderation

---

## Verification Module

User Verification:

* Aadhaar
* PAN
* Selfie

Lister Verification:

* Aadhaar
* GST
* Business Documents

Display:

* Verified Badge

---

## Subscription Module

Plans:

### Free

* 1 Listing

### Silver

* 10 Listings

### Gold

* 50 Listings

### Premium

* Unlimited Listings

Requirements:

* Plan Purchase
* Plan Renewal
* Usage Tracking

---

## Advertisement Module

Types:

* Homepage Banner
* Featured Listing
* Search Boost
* City Banner

Requirements:

* Click Tracking
* Impression Tracking

---

## Notification Module

Channels:

* Push Notification
* Email Notification
* SMS Notification

Events:

* New Lead
* New Message
* Listing Approval
* Subscription Expiry

---

## Support Module

Requirements:

* Ticket System
* Admin Replies
* Status Tracking

---

# Admin Dashboard

Required Sections:

* Dashboard Analytics
* User Management
* Lister Management
* Listing Management
* Plan Management
* Ads Management
* Revenue Reports
* Verification Management
* Support Tickets
* CMS Management
* Notification Center
* Settings

---

# Database Standards

Requirements:

* UUID Primary Keys
* Soft Deletes
* Timestamps
* Foreign Key Constraints

Naming:

* snake_case tables
* snake_case columns

Example:

users
listings
listing_images
reviews
subscriptions
plans

---

# API Standards

Architecture:

* REST API

Response Format:

{
"success": true,
"message": "Request successful",
"data": {}
}

Error Format:

{
"success": false,
"message": "Validation failed",
"errors": {}
}

---

# Security Requirements

Mandatory:

* CSRF Protection
* XSS Protection
* SQL Injection Prevention
* Rate Limiting
* Role Permissions
* Audit Logs

Never:

* Store plain passwords
* Expose sensitive information

---

# UI Requirements

Design Style:

* Modern
* Mobile First
* Clean Layout
* Fast Loading

Colors:

Primary:
#2563EB

Secondary:
#10B981

Background:
#F8FAFC

Text:
#1F2937

Border Radius:
12px

---

# Performance Requirements

Page Load:

< 2 seconds

API Response:

< 500ms

Image Optimization:

WebP

Caching:

Redis

Lazy Loading:

Required

---

# SEO Requirements

Requirements:

* Dynamic Meta Tags
* Open Graph Tags
* Schema Markup
* Sitemap.xml
* Robots.txt

---

# Testing Requirements

Minimum Coverage:

80%

Tests:

* Unit Tests
* Feature Tests
* API Tests

---

# AI Features (Future)

Phase 2:

* AI Roommate Matching
* AI Description Generator
* AI Chat Assistant

Phase 3:

* Smart Recommendation Engine

---

# Deployment Requirements

Environment:

Production

Server:

Ubuntu 24.04

Stack:

Nginx
PHP-FPM
MySQL
Redis

SSL:

Required

CDN:

Cloudflare

Backups:

Daily Automatic

---

# Coding Rules

Always:

* Use Service Classes
* Use Repository Pattern
* Write Clean Code
* Follow SOLID Principles
* Use Laravel Best Practices

Never:

* Write duplicate code
* Hardcode credentials
* Skip validation
* Skip authorization checks

---

# Success Criteria

The project is successful when:

* Users can find accommodation easily.
* Listers can generate leads.
* Admin can manage the platform efficiently.
* The system scales to 100,000+ users.
* The platform generates recurring subscription revenue.
