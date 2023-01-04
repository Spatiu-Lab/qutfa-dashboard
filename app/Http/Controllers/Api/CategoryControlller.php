<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductRescource;
use App\Http\Resources\ProductUnitResource;
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
        // $products = ProductUnit::with(['unit', 'product', 'product.category'])->whereIn('product_id', $category->products->pluck('id'))->get();
        // return ProductRescource::collection($products);
        return CategoryResource::make($category);
    }

}
