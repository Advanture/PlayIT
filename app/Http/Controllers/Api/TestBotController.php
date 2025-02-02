<?php

namespace App\Http\Controllers\Api;

use App\Events\CoinsAdded;
use App\Http\Requests\CompleteTaskRequest;
use App\Http\Requests\PromocodeUseRequest;
use App\Http\Requests\TestBotClickerRequest;
use App\Http\Requests\TestBotRequest;
use App\Models\Task;
use App\Models\User;
use App\Services\AchievementService;
use App\Services\PromocodeService;
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
            event(new CoinsAdded($user, $task->coins * $request->success, $task->title));
        }

        return response()->json();
    }

    public function userWinsClicker(TestBotClickerRequest $request, AchievementService $achievementService): JsonResponse
    {
        $ids = $request['vk_ids'];
        foreach ($ids as $id){
            try {
                $user = User::where('vk_id', $id)->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => 'Ошибка!'], 400);
            }

            event(new CoinsAdded($user, 300, "Участие в Кликере"));
            $achievementService->getClickerAchievement($user);
            $achievementService->getAllARTasksAchievement($user);
        }

        return response()->json(['message' => 'OK'],200);
    }

    public function getIdByAppToken(Request $request): JsonResponse
    {
        $token = $request['token'];
        try{
            $user = User::where('app_token', $token)->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            return response()->json("Код неверный, отказано в доступе!", 400);
        }

        return response()->json($user->vk_id);
    }

    public function completeTask(CompleteTaskRequest $request, AchievementService $achievementService): JsonResponse
    {
        try {
            $user = User::where('vk_id', $request->vk_id)->firstOrFail();
            $task = Task::findOrFail($request->task);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'User or task not found'], 404);
        }

        if (! $user->tasks->contains($task)) {
            $user->tasks()->attach($task);
            event(new CoinsAdded($user, $task->coins, $task->title));
        }

        $achievementService->getAllARTasksAchievement($user);

        return response()->json();
    }

    public function promocode(PromocodeUseRequest $request, PromocodeService $promocodeService, AchievementService $achievementService): JsonResponse
    {
        $code = $request->code;

        $status = $promocodeService->usePromocode($code, auth()->user());

        if($status){
            return response()->json(['message' => 'Успешная активация промокода!'], 201);
        }

        return response()->json(['message' => 'Ошибка!'], 400);
    }
}
