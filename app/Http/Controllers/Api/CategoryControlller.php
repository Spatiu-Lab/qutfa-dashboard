<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControlller extends Controller
{
    public function index() {
        $categeories = Category::orderBy('id','DESC')
        ->paginate(10);

        return CategoryResource::collection($categeories);
    }

    public function show(Category $category) {
       return CategoryResource::make($category->load('products'));
    }

    /**
     * @queryParam title required string to search for in category title .
     */
    public function search(Request $request) {
        $categeories = Category::where('title','LIKE',"%" . $request->query('q') . "%")->paginate(10);

        return CategoryResource::collection($categeories);
    }

}
