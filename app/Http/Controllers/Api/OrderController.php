<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(StoreOrderRequest $request) {
        //return response(['e' => $request->items[0]]);

        return DB::transaction(function() use($request) {

            $order = Order::create([
                'user_id'   => Auth::id(),
                'total'     => $this->calculateTotal($request->items)
            ]);


            foreach ($request->items as $item) {

                $product = $this->getProductInfo($item['item']);

                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $item['quantity']
                ]);
            }

            return response($order);
        });
    }

    private function calculateTotal($items) {
        return array_reduce($items,function($carry , $item) {

            $product_total = ProductUnit::find($item['item'])->price * $item['quantity'];

            return $product_total + $carry;
        });
    }

    private function getProductInfo($id) {
        return ProductUnit::find($id);
    }

}
