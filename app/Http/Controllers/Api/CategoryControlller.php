<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControlller extends Controller
{
    /**
     * @queryParam title string filter by category title . No-example .
     */
    public function index(Request $request) {
        $categeories = Category::when($request->query('title'),fn($q) => $q->where('title','LIKE','%' . $request->query('title') . '%'))
        ->orderBy('id','DESC')
        ->paginate(10);

        return CategoryResource::collection($categeories);
    }

    public function show(Category $category) {
       return CategoryResource::make($category->load('products'));
    }

}
