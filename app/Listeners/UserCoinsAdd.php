<?php

namespace App\Listeners;

use App\Events\CoinsAdded;
use App\Models\UserBalance;
use App\Models\UserCoinsHistory;
use App\Services\AchievementService;
use Illuminate\Support\Facades\DB;

class UserCoinsAdd
{
    public $achievementService;

    public function __construct(AchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }

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

        $this->achievementService->getAchievementByTasksCount($event->user);

        UserCoinsHistory::create([
            'user_id' => $event->user->id,
            'prev_coins' => $oldBalance,
            'new_coins' => $updatedCoins,
            'coins' => +$coins,
            'source' => $event->source,
        ]);
    }
}
