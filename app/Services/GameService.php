<?php

namespace App\Services;


use App\Events\CoinsAdded;
use App\Models\Task;
use Illuminate\Contracts\Auth\Authenticatable;

class GameService
{
    /**
     * @param Authenticatable $user
     * @param int $points
     */
    public function taskComplete(Authenticatable $user, int $points): void
    {
        $task = $this->getTaskByCoins($points);

        if ($task) {
            if (! $user->tasks->contains($task)) {
                $user->tasks()->attach($task);
                event(new CoinsAdded($user, $task->coins, $task->title));
            }
        }

        if ($user->balance->max_points < $points) {
            $user->balance->update(['max_points' => $points]);
        }
    }

    /**
     * @param int $points
     * @return Task|null
     */
    private function getTaskByCoins(int $points): ?Task
    {
        switch ($points) {
            case $points >= 2000:
                return Task::find(602);
                break;

            case $points >= 1000:
                return Task::find(601);
                break;

            case $points >= 500:
                return Task::find(600);
                break;

            default:
                return null;
        }
    }
}
