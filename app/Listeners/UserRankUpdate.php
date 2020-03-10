<?php

namespace App\Listeners;

use App\Events\CoinsAdded;
use App\Models\Rank;
use App\Models\User;
use App\Models\UserBalance;

class UserRankUpdate
{
    /**
     * Handle the event.
     *
     * @param CoinsAdded $event
     * @return void
     */
    public function handle(CoinsAdded $event): void
    {
        /** @var User $user */
        $user = $event->user;
        /** @var UserBalance $userBalance */
        $userBalance = $user->balance;

        // @TODO: Order by
        $rank = Rank::where('required_coins', '<=', $userBalance->max_coins)
            ->get();

        if (! $rank->isEmpty()) {
            $highestRank = $rank->where('required_coins', $rank->max('required_coins'))
                ->first();

            $user->rank()->associate($highestRank);
            $user->save();
        }
    }
}
