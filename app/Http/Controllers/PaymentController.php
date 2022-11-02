<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use App\Mail\InvoiceMail;
use App\Events\OrderEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Billing\HyperPayBilling;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckoutRequest;
use App\Models\OrderProduct;
use App\Models\ProductUnit;
use App\Notifications\OrderNotification;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Notification;
use Devinweb\LaravelHyperpay\Models\Transaction;
use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;

class PaymentController extends Controller
{

    public function prepareCheckout(CheckoutRequest $request)
    {
        $products = $this->getProducts($request->product_id);
        $total = $products->sum('price');
        $tax = round($total * 15/100);
        $trackable = [
            'city'           => $request->city,
            'phone'          => $request->phone,
            'address'        => $request->street1,
            'product_id'     => $request->product_id,
            'quantity'       => $request->quantity,
            'total'          => $total + $tax,
        ];


        if($request->method == 'offline') {
            $this->createOrder($trackable);
            return view('front.pages.finalize');
        }

        $user = auth()->user();

        $amount     =  $trackable['total'] ;

        $brand      = $request->method; // MASTER OR MADA
        
        $redirect_url = $request->headers->get('origin'). '/finalize';

        $id = Str::random('12');

        $data = LaravelHyperpay::addMerchantTransactionId($id)->addRedirectUrl($redirect_url)->addBilling(new HyperPayBilling())->checkout($trackable, $user, $amount, $brand, $request);

        return view('front.pages.payments.payment', compact('data', 'brand', 'trackable'));
    }

    public function finalize(Request $request)
    {
        $resourcePath = $request->get('resourcePath');

        $checkout_id = $request->get('id');
        
        $data =  LaravelHyperpay::paymentStatus($resourcePath, $checkout_id);

        $transaction = Transaction::where('checkout_id', $checkout_id)->first();

        $order = $this->createOrder($transaction->trackable_data, $transaction->id, $transaction->status);

        // if($transaction->trackable_data['email']) {
        //     Mail::to($transaction->trackable_data['email'])->send(new InvoiceMail($order));
        // }

        return redirect()->route('orders.show', $order->id);
    }

    public function createOrder($transaction, $payment_id = null, $payment_status = "offline")
    {
        $order = Order::create([
            'user_id'   => auth()->user()->id,
            'total'     => $transaction['total'],
            'address'   => $transaction['address'],
            'phone'     => $transaction['phone'],
            'payment_id'         =>  $payment_id,
            'payment_status'     =>  $payment_status,
        ]);

        foreach ($transaction['quantity'] as $index => $quantity) {
            $product = ProductUnit::findOrFail($transaction['product_id'][$index]);
            $order->products()->create([
                'product_unit_id'       => $product->id,
                'price'                 => $product->price,
                'quantity'              => $quantity,
            ]);
        }

        $users = User::where('power', 'ADMIN')->get();

        Notification::send($users, new OrderNotification($order));

        event(new OrderEvent($order));

        return $order;
    }

    public function getProducts($products)
    {
        $products = ProductUnit::findOrFail($products);
        return $products;
    }
}
