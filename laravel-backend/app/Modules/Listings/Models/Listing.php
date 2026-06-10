<?php

namespace AppModulesListingsModels;

use AppModelsBaseModel;
use AppModulesAuthenticationModelsUser;
use AppModulesCategoriesModelsCategory;
use AppModulesCategoriesModelsSubcategory;
use AppModulesAmenitiesModelsAmenity;
use AppModulesTiffinModelsTiffinListing;
use AppModulesLaundryModelsLaundryService;
use AppModulesReviewsModelsReview;
use AppModulesFavoritesModelsFavorite;

class Listing extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class)->orderBy('sort_order');
    }

    public function videos()
    {
        return $this->hasMany(ListingVideo::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'listing_amenities');
    }

    public function views()
    {
        return $this->hasMany(ListingView::class);
    }

    public function reports()
    {
        return $this->hasMany(ListingReport::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function tiffinListing()
    {
        return $this->hasOne(TiffinListing::class);
    }

    public function laundryService()
    {
        return $this->hasOne(LaundryService::class);
    }
}
