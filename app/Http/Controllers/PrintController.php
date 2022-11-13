<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Prgayman\Zatca\Facades\Zatca;

class PrintController extends Controller
{
    public function orders(Request $request)
    {
        $orders = Order::filter()->with('user')->withCount('products')->orderByDesc('created_at')->get();
        return view('admin.prints.orders', compact('orders'));
    }

    public function order(Order $order)
    {
        $qrcode_base64 = Zatca::sellerName('مؤسسة قطفة زهراء التجارية')
        ->vatRegistrationNumber("302227276900003")
        ->timestamp($order->created_at->format('Y-m-d H:i'))
        ->totalWithVat($order->total)  
        ->vatTotal($order->tax)
        ->toBase64();
        return view('admin.prints.order', compact('order', 'qrcode_base64'));
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
