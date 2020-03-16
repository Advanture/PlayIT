<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Events\CoinsAdded;
use App\Models\Task;
use App\Models\User;
use App\Services\AchievementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TaskAchievementController extends Controller
{
    /**
     * @param Request $request
     * @param AchievementService $achievementService
     * @return RedirectResponse
     */
    public function achievement(Request $request, AchievementService $achievementService): RedirectResponse
    {
        $user = User::findOrFail($request->userId);
        $task = Task::findOrFail($request->taskId);

        if (! $user->tasks->contains($task)) {
            $user->tasks()->attach($task);
            event(new CoinsAdded($user, $task->coins, "Задание \"$task->title\""));

            DB::table('log_tasks')->insert([
                'moder_id' => auth()->user()->id,
                'user_id' => $user->id,
                'task_id' => $task->id,
                'amount' => $task->coins,
                'timestamp' => now(),
            ]);
        }

        return redirect()->back();
    }
}
