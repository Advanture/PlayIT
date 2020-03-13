<?php

namespace App\Listeners;

use App\Events\CoinsAdded;
use App\Events\PromocodeUsed;
use App\Models\Task;
use App\Models\User;

class UserTaskComplete
{
    /**
     * Make sure task is not complete (if required).
     *
     * Handle the event.
     *
     * @param PromocodeUsed $event
     * @return void
     */
    public function handle(PromocodeUsed $event)
    {
        /** @var Task **/
        $task = $event->promocode->task;
        /** @var User $user */
        $user = $event->user;

        $user->tasks()->attach($task);

        event(new CoinsAdded($user, $task->coins, "Активация промокода"));
    }
}
