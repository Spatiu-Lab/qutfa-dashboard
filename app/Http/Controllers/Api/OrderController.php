<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::with(['products', 'products.product', 'products.product.product', 'products.product.unit'])
        ->where('user_id', auth::id())
        ->get();
        //return OrderResource::collection($orders);
        return response()->json($orders);
    }

    public function store(StoreOrderRequest $request)
    {
        return DB::transaction(function() use($request) {

            $order = Order::create([
                'user_id'   => Auth::id(),
                'total'     => $request->total,
                'address'   => $request->address,
                'phone'     => $request->phone,
                'status'    => Order::STATUS_WAITTING,
            ]);

            $request['product_id']  = json_decode($request->product_id);
            $request['quantity']    = json_decode($request->quantity);
            $request['price']       = json_decode($request->price);

            foreach ($request->quantity as $index => $quantity) {
                $order->products()->create([
                    'product_unit_id'       => $request->product_id[$index],
                    'price'                 => $request->price[$index],
                    'quantity'              => $quantity,
                ]);
            }

            // return OrderResource::make($order);
            return response()->json($order);
        });
    }

    public function show($order)
    {
        $order = Order::with(['products', 'products.product', 'products.product.product', 'products.product.unit'])->findOrFail($order);
        return response()->json($order);
        //return OrderResource::make($order->load('products'));
    }

}
