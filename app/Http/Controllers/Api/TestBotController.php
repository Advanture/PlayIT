<?php

namespace App\Http\Controllers\Api;

use App\Events\CoinsAdded;
use App\Http\Requests\TestBotRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\AchievementService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestBotController extends Controller
{
    /**
     * @param TestBotRequest $request
     * @return JsonResponse
     */
    public function userAddCoins(TestBotRequest $request): JsonResponse
    {
        try {
            $user = User::where('vk_id', $request->vk_id)->firstOrFail();
            $task = Task::findOrFail($request->task);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User or task not found'], 404);
        }

        if (! $user->tasks->contains($task)) {
            $user->tasks()->attach($task);
            event(new CoinsAdded($user, $task->coins * $request->success, "Выполнение задания #$task->id"));
        }

        return response()->json();
    }

    public function userWinsClicker($request, AchievementService $achievementService): JsonResponse
    {
        $ids = $request->ids;
        foreach ($ids as $id){
            try {
                $user = User::where('vk_id', $id)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return response()->json(['error' => 'User or task not found'], 404);
            }

            event(new CoinsAdded($user, 300, "Участие в Кликере"));
            $achievementService->getClickerAchievement($user);
        }
    }
}
