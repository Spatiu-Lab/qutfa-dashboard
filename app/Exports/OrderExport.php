<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{

    public $orders;
    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    public function view(): View    {
        $orders = $this->orders;
        return view('admin.exports.orders', compact('orders'));
    }
    
}
