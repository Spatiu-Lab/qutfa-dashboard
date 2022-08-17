<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRescource;

class ProductController extends Controller
{
    public function index() {
        $products =  Product::where('status',Product::STATUS_AVAILABLE)
        ->orderBy('id','DESC')
        ->paginate(10);

        return ProductRescource::collection($products);
    }

    public function show(Product $product) {
        return ProductRescource::make($product->load('category'));
    }

    /**
     * @queryParam name required string to search for in product name .
     */
    public function search(Request $request) {
        $products = Product::where('name','LIKE',"%" . $request->query('name') . "%")->paginate(10);

        return ProductRescource::collection($products);
    }
}
