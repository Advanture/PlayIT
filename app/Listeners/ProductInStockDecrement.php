<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductInStockDecrement
{
    /**
     * Handle the event.
     *
     * @param ProductPurchased $event
     * @return void
     */
    public function handle(ProductPurchased $event)
    {
        $product = $event->product;

        if ($product->in_stock > 0)
            $product->decrement('in_stock');
    }
}
