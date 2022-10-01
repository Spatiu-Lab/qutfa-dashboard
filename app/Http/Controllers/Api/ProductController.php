<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductRescource;
use App\Models\ProductUnit;

class ProductController extends Controller
{
    /**
     * @queryParam category_id integer filter by category_id. No-example .
     * @queryParam name string filter by product name . No-example .
     */
    public function index(Request $request) {
        $products =  ProductUnit::query()
        ->with(['product', 'unit'])
        ->when($request->query('category_id') , fn($q) => $q->where('category_id',$request->category_id))
        ->when($request->query('name') , fn($q) => $q->where('name','LIKE','%' . $request->name . '%'))
        ->orderBy('id','DESC')
        ->get();
        return response()->json($products);
        // return 
    }

    public function show($product) {
        $product = ProductUnit::with(['product', 'unit'])->findOrFail($product);
        // ProductRescource::make($product)
        return response()->json($product);
    }
}
