<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $users = User::where('power', 'ADMIN')->get();

        // foreach ($users as $user) {
        //     $notification = $user->notifications()->create([
        //         'data' => [
        //             "message"        => "تم اضافة طلب جديد برقم" . $event->order->id,
        //             "creator"       => auth()->id(),
        //             "link"          => url('admin/orders') . '/' . $event->order->id,
        //         ],
        //     ]);
        // }
    }
}
