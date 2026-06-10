<?php

namespace App\Modules\Categories\Services;

use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Models\Subcategory;

class CategoryService
{
    public function getActiveCategories()
    {
        return Category::where('status', true)->with('subcategories')->get();
    }

    public function getSubcategories(string $categoryId)
    {
        return Subcategory::where('category_id', $categoryId)->get();
    }
}
