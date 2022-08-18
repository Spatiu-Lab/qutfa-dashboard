<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRescource;

class ProductController extends Controller
{
    /**
     * @queryParam category_id integer filter products by category_id field. Example: 1 .
     */
    public function index(Request $request) {
        $products =  Product::when($request->query('category_id'),fn($q) => $q->where('category_id',$request->category_id))
        ->where('status',Product::STATUS_AVAILABLE)
        ->orderBy('id','DESC')
        ->paginate(10);

        return ProductRescource::collection($products);
    }

    public function show(Product $product) {
        return ProductRescource::make($product->load('category'));
    }

    /**
     * @queryParam name string to search for in product name . No-example
     */
    public function search(Request $request) {
        $products = Product::where('name','LIKE',"%" . $request->query('name') . "%")->paginate(10);

        return ProductRescource::collection($products);
    }
}
