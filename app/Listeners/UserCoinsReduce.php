<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use App\Models\UserCoinsHistory;

class UserCoinsReduce
{
    /**
     * Handle the event.
     *
     * @param ProductPurchased $event
     * @return void
     */
    public function handle(ProductPurchased $event): void
    {
        $user = $event->user;
        $oldBalance = $user->balance->current_coins;

        $user->balance->current_coins -= $event->product->price;
        $user->balance->save();
        $updatedCoins = $user->balance->current_coins;
        $coins = $event->product->price;
        $productId = $event->product->id;

        UserCoinsHistory::create([
            'user_id' => $event->user->id,
            'prev_coins' => $oldBalance,
            'new_coins' => $updatedCoins,
            'coins' => "-$coins",
            'source' => "Покупка товара #$productId",
        ]);
    }
}
