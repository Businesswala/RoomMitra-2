<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Services\CategoryService;
use App\Modules\Categories\Resources\CategoryResource;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getActiveCategories();
        
        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully.',
            'data' => CategoryResource::collection($categories)
        ]);
    }

    public function subcategories(string $categoryId)
    {
        $subcategories = $this->categoryService->getSubcategories($categoryId);

        return response()->json([
            'success' => true,
            'message' => 'Subcategories retrieved successfully.',
            'data' => $subcategories
        ]);
    }
}
