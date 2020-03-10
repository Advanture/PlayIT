<?php

namespace App\Listeners;

use App\Events\PromocodeUsed;
use App\Models\Promocode;

class PromocodeUsageCountDecrement
{
    /**
     * Handle the event.
     *
     * @param PromocodeUsed $event
     * @return void
     */
    public function handle(PromocodeUsed $event): void
    {
        /** @var Promocode $promocode */
        $promocode = $event->promocode;

        if ($promocode->usage_count > 0)
            $promocode->decrement('usage_count');
    }
}
