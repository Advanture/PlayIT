<?php

namespace App\Listeners;

use App\Events\CoinsAdded;
use App\Models\UserBalance;
use App\Models\UserCoinsHistory;
use Illuminate\Support\Facades\DB;

class UserCoinsAdd
{
    /**
     * Handle the event.
     *
     * @param CoinsAdded $event
     * @return void
     */
    public function handle(CoinsAdded $event): void
    {
        /** @var UserBalance $userBalance */
        $userBalance = $event->user->balance;
        $oldBalance = $userBalance->current_coins;
        $coins = $event->coins;
        $userMaxCoins = $userBalance->max_coins;

        $updatedCoins = $userBalance->current_coins + $coins;
        $maxCoins = $userMaxCoins + $coins;

        $userBalance->update([
            'current_coins' => $updatedCoins,
            'max_coins' => $maxCoins
        ]);

        UserCoinsHistory::create([
            'user_id' => $event->user->id,
            'prev_coins' => $oldBalance,
            'new_coins' => $updatedCoins,
            'coins' => +$coins,
            'source' => $event->source,
        ]);
    }
}
