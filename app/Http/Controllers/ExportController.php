<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Exports\OrderExport;
use App\Exports\ProductExport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function orders()
    {
        $orders = Order::filter()->with('user')->withCount('products')->get();
        return Excel::download(new OrderExport($orders), 'orders.xlsx');
    }

    public function products()
    {
        $products = Product::filter()->get();
        return Excel::download(new ProductExport($products), 'products.xlsx');
    }
}
