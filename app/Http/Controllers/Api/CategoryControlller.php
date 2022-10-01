<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Database\Eloquent\Collection;

class CategoryControlller extends Controller
{
    /**
     * @queryParam title string filter by category title . No-example .
     */
    public function index(Request $request) {
        $categeories = Category::when($request->query('title'),fn($q) => $q->where('title','LIKE','%' . $request->query('title') . '%'))
        ->orderBy('id','DESC')
        ->get();

        return response()->json($categeories);
        //return CategoryResource::collection($categeories);
    }

    public function show(Category $category) {
        $products = ProductUnit::with(['unit', 'product'])->whereIn('product_id', $category->products->pluck('id'))->get();
        $category_products =  collect($category)->merge($products);

        return response()->json($category_products);
        //return CategoryResource::make($category->load('products'));
    }

}
