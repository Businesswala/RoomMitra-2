# RoomMitra API

REST API documentation and endpoints.
# API.md

# RoomMitra REST API Documentation

## Base URL

Production:
https://api.roommitra.com/api/v1

Development:
http://localhost:8000/api/v1

---

# Authentication

Method:
Bearer Token

Header:

Authorization: Bearer {token}

Content-Type: application/json

---

# Standard Response

Success

{
"success": true,
"message": "Request successful",
"data": {}
}

Error

{
"success": false,
"message": "Validation failed",
"errors": {}
}

---

# AUTH MODULE

## Register

POST /auth/register

Request:

{
"name": "Satish",
"email": "[test@gmail.com](mailto:test@gmail.com)",
"mobile": "9876543210",
"password": "password"
}

---

## Login

POST /auth/login

---

## Logout

POST /auth/logout

---

## Forgot Password

POST /auth/forgot-password

---

## Reset Password

POST /auth/reset-password

---

## Verify OTP

POST /auth/verify-otp

---

## Resend OTP

POST /auth/resend-otp

---

## Google Login

POST /auth/google

---

# USER PROFILE MODULE

## Get Profile

GET /profile

---

## Update Profile

PUT /profile

---

## Upload Profile Image

POST /profile/image

---

## Change Password

POST /profile/change-password

---

## Delete Account

DELETE /profile

---

# LOCATION MODULE

## Countries

GET /countries

---

## States

GET /states/{country_id}

---

## Cities

GET /cities/{state_id}

---

## Areas

GET /areas/{city_id}

---

# CATEGORY MODULE

## Categories

GET /categories

---

## Sub Categories

GET /subcategories/{category_id}

---

# LISTING MODULE

## Create Listing

POST /listings

---

## Update Listing

PUT /listings/{id}

---

## Delete Listing

DELETE /listings/{id}

---

## My Listings

GET /my-listings

---

## Listing Details

GET /listings/{id}

---

## All Listings

GET /listings

Parameters:

city
category
budget
gender
search

---

## Search Listings

GET /listings/search

---

## Featured Listings

GET /listings/featured

---

## Nearby Listings

GET /listings/nearby

---

## Upload Listing Images

POST /listings/{id}/images

---

## Delete Listing Image

DELETE /listing-images/{id}

---

## Upload Listing Video

POST /listings/{id}/video

---

## Report Listing

POST /listings/{id}/report

---

## Increment View Count

POST /listings/{id}/view

---

# FAVORITES MODULE

## Add Favorite

POST /favorites

---

## Remove Favorite

DELETE /favorites/{listing_id}

---

## Favorite Listings

GET /favorites

---

# REVIEW MODULE

## Add Review

POST /reviews

---

## Update Review

PUT /reviews/{id}

---

## Delete Review

DELETE /reviews/{id}

---

## Listing Reviews

GET /listings/{id}/reviews

---

# ROOMMATE MODULE

## Create Profile

POST /roommate/profile

---

## Update Profile

PUT /roommate/profile

---

## Find Matches

GET /roommate/matches

---

## Match Details

GET /roommate/matches/{id}

---

# TIFFIN MODULE

## All Tiffin Services

GET /tiffin

---

## Tiffin Details

GET /tiffin/{id}

---

# LAUNDRY MODULE

## All Laundry Services

GET /laundry

---

## Laundry Details

GET /laundry/{id}

---

# CHAT MODULE

## Create Conversation

POST /chat/conversations

---

## My Conversations

GET /chat/conversations

---

## Conversation Details

GET /chat/conversations/{id}

---

## Send Message

POST /chat/messages

---

## Message History

GET /chat/messages/{conversation_id}

---

## Upload Attachment

POST /chat/attachment

---

## Mark Read

POST /chat/read

---

## Delete Message

DELETE /chat/messages/{id}

---

# NOTIFICATION MODULE

## All Notifications

GET /notifications

---

## Mark As Read

POST /notifications/read/{id}

---

## Mark All Read

POST /notifications/read-all

---

# SUPPORT MODULE

## Create Ticket

POST /tickets

---

## Ticket List

GET /tickets

---

## Ticket Details

GET /tickets/{id}

---

## Reply Ticket

POST /tickets/{id}/reply

---

# VERIFICATION MODULE

## Submit Verification

POST /verification/submit

Documents:

aadhaar
pan
selfie

---

## Verification Status

GET /verification/status

---

# PLAN MODULE

## All Plans

GET /plans

---

## Plan Details

GET /plans/{id}

---

## Buy Plan

POST /plans/buy

---

## My Subscription

GET /subscriptions

---

## Renew Subscription

POST /subscriptions/renew

---

# PAYMENT MODULE

## Create Order

POST /payments/create-order

---

## Verify Payment

POST /payments/verify

---

## Payment History

GET /payments/history

---

# ADS MODULE

## Create Advertisement

POST /ads

---

## My Advertisements

GET /ads

---

## Update Advertisement

PUT /ads/{id}

---

## Delete Advertisement

DELETE /ads/{id}

---

## Ad Analytics

GET /ads/{id}/analytics

---

# ADMIN AUTH

POST /admin/login

POST /admin/logout

---

# ADMIN DASHBOARD

GET /admin/dashboard

Response:

* Total Users
* Total Listers
* Total Listings
* Total Revenue
* Total Subscriptions

---

# ADMIN USER MANAGEMENT

GET /admin/users

GET /admin/users/{id}

PUT /admin/users/{id}

DELETE /admin/users/{id}

POST /admin/users/{id}/suspend

POST /admin/users/{id}/activate

POST /admin/users/{id}/login

---

# ADMIN LISTER MANAGEMENT

GET /admin/listers

GET /admin/listers/{id}

PUT /admin/listers/{id}

DELETE /admin/listers/{id}

POST /admin/listers/{id}/verify

POST /admin/listers/{id}/login

---

# ADMIN LISTING MANAGEMENT

GET /admin/listings

GET /admin/listings/{id}

POST /admin/listings/{id}/approve

POST /admin/listings/{id}/reject

POST /admin/listings/{id}/feature

DELETE /admin/listings/{id}

---

# ADMIN VERIFICATION

GET /admin/verifications

POST /admin/verifications/{id}/approve

POST /admin/verifications/{id}/reject

---

# ADMIN ADS MANAGEMENT

GET /admin/ads

PUT /admin/ads/{id}

DELETE /admin/ads/{id}

---

# ADMIN PLAN MANAGEMENT

GET /admin/plans

POST /admin/plans

PUT /admin/plans/{id}

DELETE /admin/plans/{id}

---

# ADMIN REVENUE

GET /admin/revenue

GET /admin/revenue/daily

GET /admin/revenue/monthly

GET /admin/revenue/yearly

---

# ADMIN SUPPORT

GET /admin/tickets

GET /admin/tickets/{id}

POST /admin/tickets/{id}/reply

---

# ADMIN CMS

GET /admin/pages

POST /admin/pages

PUT /admin/pages/{id}

DELETE /admin/pages/{id}

GET /admin/sliders

POST /admin/sliders

PUT /admin/sliders/{id}

DELETE /admin/sliders/{id}

---

# ADMIN SETTINGS

GET /admin/settings

PUT /admin/settings

---

# WEBHOOKS

POST /webhooks/razorpay

POST /webhooks/phonepe

POST /webhooks/paytm

POST /webhooks/stripe

---

# API COUNT

Authentication APIs : 10+

User APIs : 20+

Listing APIs : 40+

Chat APIs : 15+

Review APIs : 10+

Subscription APIs : 15+

Payment APIs : 10+

Admin APIs : 70+

Total APIs :
200+ Endpoints
