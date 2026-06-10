# RoomMitra Production Deployment Guide

This guide details step-by-step procedures to provision, secure, and deploy the RoomMitra platform on a production VPS.

---

## 1. VPS Provisioning & System Dependencies

Ensure the target server runs **Ubuntu 24.04 LTS** (or comparable Linux distribution).

### Install Docker Engine
```bash
sudo apt update
sudo apt install -y apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.github.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt update
sudo apt install -y docker-ce docker-compose-plugin
```

---

## 2. Environment Configurations

1. Clone repository to `/var/www/roommitra`.
2. Create production environment configurations:
```bash
cp .env.example .env
```
3. Edit `.env` variables:
   * Define production database credentials.
   * Enable Redis driver for Session, Cache, and Queue:
     ```env
     CACHE_STORE=redis
     SESSION_DRIVER=redis
     QUEUE_CONNECTION=redis
     ```
   * Configure SSL details and Razorpay/PhonePe API secrets.

---

## 3. Deployment Steps

Run the containerized compose configurations:
```bash
docker compose up -d --build
```

Seed database variables:
```bash
docker compose exec app php artisan migrate --force
docker compose exec app php artisan db:seed --force
```

Cache configurations:
```bash
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
```
