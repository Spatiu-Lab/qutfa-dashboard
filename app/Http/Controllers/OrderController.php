<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderLog;
use App\Jobs\CreateOrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::filter()->with('user')->withCount('products')->paginate();
        $status = Order::STATUS;
        return view('admin.orders.index', compact('orders', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load('orderLogs.user:id,name,email');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateStatus(Order $order)
    {
        $previous_status = $order->status;

        switch ($order->status) {
            case Order::STATUS_WAITTING:
                $order->update([
                    'status' => Order::STATUS_ACCPETED
                ]);
                break;
            case Order::STATUS_ACCPETED:
                $order->update([
                    'status' => Order::STATUS_DELIVERY
                ]);
                break;
            case Order::STATUS_DELIVERY:
                $order->update([
                    'status' => Order::STATUS_DELIVERED
                ]);
                break;
        }

        OrderLog::create([
            'user_id' => Auth::id(),
            'order_id' => $order->id,
            'previous_status' => $previous_status,
            'current_status' => $order->status,
        ]);

        return back();
    }
}
