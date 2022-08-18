<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRescource;

class ProductController extends Controller
{
    /**
     * @queryParam category_id integer filter by category_id. No-example .
     * @queryParam name string filter by product name . No-example .
     */
    public function index(Request $request) {
        $products =  Product::when($request->query('category_id'),fn($q) => $q->where('category_id',$request->category_id))
        ->when($request->query('name'),fn($q) => $q->where('name','LIKE','%' . $request->name . '%'))
        ->where('status',Product::STATUS_AVAILABLE)
        ->orderBy('id','DESC')
        ->paginate(10);

        return ProductRescource::collection($products);
    }

    public function show(Product $product) {
        return ProductRescource::make($product->load('category'));
    }
}
