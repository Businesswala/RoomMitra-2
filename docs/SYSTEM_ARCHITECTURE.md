# SYSTEM_ARCHITECTURE.md

# RoomMitra System Architecture

Version: 1.0

---

# Overview

RoomMitra is a complete rental and living ecosystem platform.

The platform consists of:

1. Public Website
2. Mobile Application (Flutter)
3. Admin Dashboard
4. REST API Backend
5. Real-Time Chat Server
6. Notification System
7. Payment System

---

# High Level Architecture

Users
↓

Website (Laravel)
↓

REST API Layer
↓

Business Logic Layer
↓

Database Layer (MySQL)

↓

External Services

* Firebase
* Razorpay
* PhonePe
* Google Maps
* Cloudflare R2

---

# Technology Stack

## Frontend Website

Laravel Blade

Tailwind CSS

Alpine.js

JavaScript

---

## Mobile Application

Flutter

Riverpod

Dio

Go Router

Firebase

---

## Backend

Laravel 12

PHP 8.3

REST API

Sanctum Authentication

---

## Database

MySQL 8+

Redis Cache

---

## Storage

Cloudflare R2

AWS S3 Compatible

---

## Real-Time

Laravel Reverb

WebSocket

---

# Project Structure

## Backend

/app

├── Http

├── Controllers

├── Requests

├── Middleware

├── Services

├── Repositories

├── Models

├── Events

├── Listeners

├── Jobs

├── Policies

├── Notifications

├── Mail

├── Traits

└── Helpers

---

# Modules Structure

/app/Modules

Authentication

Users

Listings

Categories

Amenities

Reviews

Favorites

Roommate

Tiffin

Laundry

Chat

Notifications

Subscriptions

Payments

Advertisements

Support

CMS

Settings

Reports

Verification

Admin

---

# API Architecture

/api/v1

/auth

/users

/profile

/listings

/categories

/reviews

/favorites

/chat

/plans

/payments

/notifications

/tickets

/admin

---

# Website Pages

## Public

Home

About Us

Contact Us

Privacy Policy

Terms

FAQ

Blog

---

## Listing Pages

All Listings

Listing Details

Search Results

Category Listings

City Listings

Featured Listings

---

## User Pages

Login

Register

Forgot Password

Dashboard

Favorites

Profile

Chat

Notifications

Tickets

---

## Lister Pages

Dashboard

Add Listing

Manage Listings

Plans

Advertisements

Leads

Analytics

Profile

Verification

---

# Flutter App Structure

lib/

core/

services/

network/

storage/

theme/

routes/

widgets/

features/

auth/

home/

listing/

favorites/

chat/

notifications/

profile/

roommate/

tiffin/

laundry/

plans/

payments/

support/

admin/

main.dart

---

# Flutter Screens

## Authentication

Splash

Onboarding

Login

Register

OTP Verification

Forgot Password

---

## Home

Home Screen

Search Screen

Category Screen

Featured Screen

Nearby Screen

---

## Listings

Listing List

Listing Details

Create Listing

Edit Listing

My Listings

---

## Profile

My Profile

Edit Profile

Verification

Settings

---

## Chat

Conversations

Chat Details

Attachments

---

## Subscription

Plans

Purchase Plan

Payment Success

Payment Failed

---

# Admin Dashboard Structure

/admin

Dashboard

Users

Listers

Listings

Categories

Amenities

Reviews

Roommates

Tiffin

Laundry

Advertisements

Plans

Subscriptions

Payments

Revenue

Reports

Verifications

Support

Notifications

CMS

Sliders

Pages

FAQ

Settings

Roles

Permissions

Activity Logs

---

# Dashboard Widgets

Total Users

Total Listers

Total Listings

Total Revenue

Today's Revenue

Pending Verifications

Open Tickets

Active Plans

Top Cities

Top Categories

Recent Users

Recent Listings

---

# Real-Time Chat Architecture

User

↓

WebSocket Connection

↓

Laravel Reverb

↓

Chat Event

↓

Database

↓

Receiver

Features:

* Real-Time Messages
* Typing Indicator
* Read Receipts
* Image Sharing

---

# Notification Architecture

Events

↓

Queue

↓

Notification Service

↓

Push Notification

↓

Email

↓

SMS

---

# Payment Architecture

User

↓

Plan Purchase

↓

Payment Gateway

↓

Webhook

↓

Transaction Verification

↓

Subscription Activation

Supported:

* Razorpay
* PhonePe
* Paytm
* Stripe

---

# Search Architecture

Search Filters:

* City
* Area
* Category
* Budget
* Gender
* Amenities

Optimization:

* MySQL Indexes
* Redis Cache
* Query Optimization

---

# Security Architecture

Authentication:

Laravel Sanctum

Authorization:

Role-Based Access

Security Layers:

* CSRF Protection
* XSS Protection
* SQL Injection Protection
* Rate Limiting
* Audit Logging

---

# File Storage Architecture

User Upload

↓

Cloudflare R2

↓

CDN

↓

Website/App

Storage Folders:

profile-images

listing-images

listing-videos

verification-documents

chat-attachments

advertisements

cms

---

# Queue System

Laravel Queue

Redis Driver

Jobs:

* Email Sending
* SMS Sending
* Notifications
* Image Processing
* Report Generation

---

# Analytics Module

Track:

* Listing Views
* Search Activity
* Click Tracking
* Ad Performance
* Revenue Reports

---

# Deployment Architecture

Production Server

Ubuntu 24.04

Nginx

PHP-FPM

MySQL

Redis

Supervisor

SSL

Cloudflare CDN

---

# Environment Structure

Development

Staging

Production

Separate:

* Database
* Storage
* Cache
* API Keys

---

# Scalability Goals

Users:
100,000+

Listings:
1,000,000+

Messages:
10,000,000+

API Requests:
5,000,000+/month

---

# Future Architecture

Phase 2

* AI Roommate Matching
* AI Description Generator
* AI Chat Assistant

Phase 3

* Rent Collection
* Digital Agreements
* Booking System

Phase 4

* Multi-Language
* Multi-Country
* Franchise Management

---

# Development Priority

Phase 1 (MVP)

Authentication

Listings

Search

Chat

Reviews

Admin Dashboard

---

Phase 2

Roommate

Tiffin

Laundry

Subscriptions

Advertisements

---

Phase 3

Verification

Analytics

Notifications

Reports

---

Phase 4

AI Features

Advanced Automation

Recommendation Engine

---

# Architecture Success Criteria

* Fast Performance
* Secure APIs
* Mobile First Experience
* Scalable Infrastructure
* Clean Codebase
* Easy Maintenance
* Production Ready
