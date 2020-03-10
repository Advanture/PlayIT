<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use App\Models\Order;

class OrderCreate
{
    /**
     * Handle the event.
     *
     * @param ProductPurchased $event
     * @return void
     */
    public function handle(ProductPurchased $event): void
    {
        Order::create([
            'user_id'   => $event->user->id,
            'product_id' => $event->product->id,
        ]);
    }
}
