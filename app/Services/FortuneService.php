<?php

namespace App\Services;


use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;

class FortuneService
{
    const TIME_REMAINING = 43200;

    /**
     * Check if fortune is ready to use.
     *
     * @param Authenticatable $user
     * @return bool
     */
    public function checkTime(Authenticatable $user): bool
    {
        $lastFortune = Carbon::parse($user->last_fortune);

        return ((now()->timestamp - $lastFortune->timestamp) >= self::TIME_REMAINING);
    }

    /**
     * Get time remaining to use fortune.
     *
     * @param Authenticatable $user
     * @return int
     */
    public function getLeftTime(Authenticatable $user): int
    {
        $lastFortune = Carbon::parse($user->last_fortune);

        return self::TIME_REMAINING - (now()->timestamp - $lastFortune->timestamp);
    }
}