# DATABASE.md

# RoomMitra Database Architecture

## Database Engine

MySQL 8+

## Naming Convention

Tables:
snake_case

Columns:
snake_case

Primary Key:
id (UUID)

Soft Delete:
deleted_at

Timestamps:
created_at
updated_at

---

# 1. USERS MODULE

## users

| Column             | Type                    |
| ------------------ | ----------------------- |
| id                 | UUID                    |
| role               | enum(user,lister,admin) |
| name               | varchar                 |
| email              | varchar                 |
| mobile             | varchar                 |
| password           | varchar                 |
| status             | enum(active,suspended)  |
| email_verified_at  | timestamp               |
| mobile_verified_at | timestamp               |
| created_at         | timestamp               |
| updated_at         | timestamp               |

---

## user_profiles

| Column        |
| ------------- |
| id            |
| user_id       |
| profile_image |
| gender        |
| dob           |
| bio           |
| occupation    |
| city_id       |
| address       |
| created_at    |
| updated_at    |

---

## user_verifications

| Column         |
| -------------- |
| id             |
| user_id        |
| aadhaar_number |
| pan_number     |
| selfie_image   |
| status         |
| verified_at    |

---

# 2. LOCATION MODULE

## countries

| id |
| name |
| iso_code |
| status |

---

## states

| id |
| country_id |
| name |
| status |

---

## cities

| id |
| state_id |
| name |
| status |

---

## areas

| id |
| city_id |
| name |
| pincode |

---

# 3. CATEGORY MODULE

## categories

Examples:

* Rooms
* Hostel
* PG
* Roommate
* Tiffin
* Laundry
* Services

Columns:

| id |
| name |
| slug |
| icon |
| status |

---

## subcategories

| id |
| category_id |
| name |
| slug |

---

# 4. LISTING MODULE

## listings

| Column            |
| ----------------- |
| id                |
| user_id           |
| category_id       |
| subcategory_id    |
| title             |
| slug              |
| description       |
| price             |
| deposit           |
| address           |
| country_id        |
| state_id          |
| city_id           |
| area_id           |
| latitude          |
| longitude         |
| contact_name      |
| contact_mobile    |
| availability_date |
| status            |
| featured          |
| verified          |
| views_count       |
| created_at        |
| updated_at        |

---

## listing_images

| id |
| listing_id |
| image |
| sort_order |

---

## listing_videos

| id |
| listing_id |
| video_url |

---

## amenities

Examples:

* WiFi
* AC
* Parking
* Food
* Laundry

Columns:

| id |
| name |
| icon |

---

## listing_amenities

| id |
| listing_id |
| amenity_id |

---

## listing_views

| id |
| listing_id |
| user_id |
| ip_address |
| viewed_at |

---

## listing_reports

| id |
| listing_id |
| user_id |
| reason |
| status |

---

# 5. ROOMMATE MODULE

## roommate_profiles

| id |
| user_id |
| gender |
| age |
| occupation |
| budget |
| smoking |
| drinking |
| pets |
| bio |

---

## roommate_matches

| id |
| user_id |
| matched_user_id |
| score |

---

# 6. TIFFIN MODULE

## tiffin_listings

| id |
| listing_id |
| meal_type |
| veg_nonveg |
| monthly_price |

---

# 7. LAUNDRY MODULE

## laundry_services

| id |
| listing_id |
| pickup_available |
| delivery_available |
| ironing_available |

---

# 8. REVIEW MODULE

## reviews

| id |
| listing_id |
| user_id |
| rating |
| review |
| status |

---

## review_replies

| id |
| review_id |
| user_id |
| reply |

---

# 9. FAVORITES MODULE

## favorites

| id |
| user_id |
| listing_id |

---

# 10. CHAT MODULE

## conversations

| id |
| user_id |
| lister_id |
| listing_id |
| created_at |

---

## messages

| id |
| conversation_id |
| sender_id |
| message |
| read_at |
| created_at |

---

## message_attachments

| id |
| message_id |
| file_url |

---

# 11. PLAN MODULE

## plans

| id |
| name |
| listings_limit |
| featured_limit |
| validity_days |
| price |

---

## subscriptions

| id |
| user_id |
| plan_id |
| start_date |
| end_date |
| status |

---

# 12. PAYMENT MODULE

## transactions

| id |
| user_id |
| plan_id |
| amount |
| payment_method |
| transaction_id |
| payment_status |

---

# 13. ADS MODULE

## advertisements

| id |
| user_id |
| title |
| image |
| target_url |
| position |
| start_date |
| end_date |
| status |

---

## advertisement_clicks

| id |
| advertisement_id |
| user_id |
| clicked_at |

---

# 14. NOTIFICATION MODULE

## notifications

| id |
| user_id |
| title |
| message |
| type |
| is_read |

---

# 15. SUPPORT MODULE

## tickets

| id |
| user_id |
| subject |
| priority |
| status |

---

## ticket_messages

| id |
| ticket_id |
| sender_id |
| message |

---

# 16. CMS MODULE

## pages

| id |
| title |
| slug |
| content |

---

## sliders

| id |
| title |
| image |
| button_text |
| button_url |
| status |

---

## faqs

| id |
| question |
| answer |

---

# 17. ADMIN MODULE

## admins

| id |
| name |
| email |
| password |

---

## roles

| id |
| name |

---

## permissions

| id |
| name |

---

## role_permissions

| id |
| role_id |
| permission_id |

---

# 18. SETTINGS MODULE

## settings

| id |
| key |
| value |

Examples:

site_name
logo
favicon
smtp_settings
razorpay_key
google_map_key

---

# INDEXES

Required Indexes

users.email
users.mobile

listings.city_id
listings.category_id
listings.featured

reviews.listing_id

messages.conversation_id

notifications.user_id

subscriptions.user_id

transactions.user_id

advertisements.status

---

# TOTAL TABLES

Core Tables: 40+

Scalable To:
100,000+ Users
1,000,000+ Listings
10,000,000+ Messages
