# RoomMitra Performance Optimization Document

This document details optimization strategies implemented to ensure sub-100ms response times.

---

## 1. Caching Strategies
*   **Redis Cache**: Sessions, configuration settings, state routes, and locations catalog listings are cached on Redis.
*   **Listing view analytics**: Viewer counts are initially queued in memory before being flushed periodically to MySQL database tables.

---

## 2. OPcache & PHP Profiling
*   **OPcache**: Enabled on Docker staging container, caching pre-compiled PHP code blocks in system memory.
*   **Autoloading**: Composer dependencies are loaded with classmap optimization (`--optimize-autoloader`).

---

## 3. Database Indexes
*   **UUID Primary Keys**: MySQL table indexing is configured for UUID strings.
*   **Foreign Keys**: Mapped columns have indexes configured to support fast listings searches.
