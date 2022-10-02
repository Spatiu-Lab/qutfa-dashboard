<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
    public $products;
    public function __construct($products)
    {
        $this->products = $products;
    }

    public function view(): View    {
        $products = $this->products;
        return view('admin.exports.products', compact('products'));
    }
}
