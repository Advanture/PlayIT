<?php


namespace App\Services;


use App\Models\Achievement;
use App\Models\Task;
use Illuminate\Contracts\Auth\Authenticatable;

class AchievementService
{
    public function getAchievementByTasksCount(Authenticatable $user)
    {
        $completedTasksCount = $user->tasks->count();
        $achievement = $this->achievementByTasksCount($completedTasksCount);

        //return response()->json(['ach' => $achievement, 'tasks' => $completedTasksCount]); // TODO: WTF?

        if(! $user->achievements->contains($achievement)){
            $user->achievements()->attach($achievement);
            return $achievement;
        }

        return null;
    }

    public function achievementByTasksCount(int $completedTasksCount): ?Achievement
    {
        switch ($completedTasksCount){

            case ($completedTasksCount >= 30):
                if( $completedTasksCount >= 30) {
                    return Achievement::find(4);
                    break;
                }

            case $completedTasksCount >= 20:
                if( $completedTasksCount >= 20) {
                    return Achievement::find(3);
                    break;
                }

            case $completedTasksCount >= 10:
                if( $completedTasksCount >= 10) {
                    return Achievement::find(2);
                    break;
                }

            case $completedTasksCount >= 1:
                if( $completedTasksCount >= 1) {
                    return Achievement::find(1);
                    break;
                }

            case $completedTasksCount == 0:
                return null;
                break;

            default:
                return null;
        }
    }

    public function getClickerAchievement(Authenticatable $user): bool
    {
        $achievement = Achievement::find(5);

        if(! $user->achievements->contains($achievement)){
            $user->achievements()->attach($achievement);
            return true;
        }

        return false;
    }

    public function getAllARTasksAchievement(Authenticatable $user)
    {
        $ARTask = Task::find(1);
        $clickerAchievement = Achievement::find(5);
        $achievement = Achievement::find(6);

        if($user->achievements->contains($clickerAchievement) && $user->tasks->contains($ARTask)){
            if(! $user->achievements->contains($achievement)){
                $user->achievements()->attach($achievement);
                return $achievement;
            }
        }

        return null;
    }

    public function getFortuneAchievement(Authenticatable $user, int $score)
    {
        $achievement = Achievement::find(7);

        if( $score == 100) {
            if(! $user->achievements->contains($achievement)){
                $user->achievements()->attach($achievement);
                return $achievement;
            }
        }

        return null;
    }
}
