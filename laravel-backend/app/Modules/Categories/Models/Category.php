<?php

namespace AppModulesCategoriesModels;

use AppModelsBaseModel;
use AppModulesListingsModelsListing;

class Category extends BaseModel
{
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
