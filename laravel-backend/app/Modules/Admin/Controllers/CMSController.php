<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\CMS\Models\Page;
use App\Modules\CMS\Models\Slider;
use App\Modules\CMS\Models\FAQ;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    public function pages()
    {
        return response()->json([
            'success' => true,
            'data' => Page::all()
        ]);
    }

    public function storePage(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:pages,slug',
            'content' => 'required|string'
        ]);

        $page = Page::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Page created.',
            'data' => $page
        ], 201);
    }

    public function sliders()
    {
        return response()->json([
            'success' => true,
            'data' => Slider::where('status', true)->get()
        ]);
    }

    public function faqs()
    {
        return response()->json([
            'success' => true,
            'data' => FAQ::all()
        ]);
    }
}
