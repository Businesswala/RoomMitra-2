<?php

namespace AppModulesCategoriesModels;

use AppModelsBaseModel;
use AppModulesListingsModelsListing;

class Subcategory extends BaseModel
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
