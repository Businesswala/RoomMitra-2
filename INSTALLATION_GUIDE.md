# RoomMitra Installation Guide

This document maps local staging and installation setups.

---

## 1. Backend REST API Setup

### System Prerequisites
Ensure **PHP 8.3+**, **Composer 2.7+**, and **MySQL 8+** are installed and configured.

### Commands Setup
```bash
cd laravel-backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

---

## 2. Flutter Mobile Application

### Commands Setup
```bash
cd flutter-frontend
flutter pub get
flutter run
```
