<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function orders(Request $request)
    {
        $orders = Order::filter()->with('user')->withCount('products')->orderByDesc('created_at')->get();
        return view('admin.prints.orders', compact('orders'));
    }

    public function order(Order $order)
    {
        return view('admin.prints.order', compact('order'));
    }

    public function products(Request $request)
    {
        $products =  Product::filter()
        ->orderBy('id','DESC')
        ->get();
        return view('admin.prints.products', compact('products'));
    }

    public function customers(Request $request)
    {
        $customers =  Customer::query()
        ->orderBy('id','DESC')
        ->get();

        return view('admin.prints.customers', compact('customers'));
    }
}
