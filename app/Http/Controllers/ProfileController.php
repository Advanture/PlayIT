<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromocodeUseRequest;
use App\Models\UserCoinsHistory;
use App\Services\PromocodeService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\AchievementService;

class ProfileController extends Controller
{
    /**
     * @param UserService $userService
     * @return View
     */
    public function index(UserService $userService): JsonResponse
    {
        $rating = $userService->getRatingStats(auth()->user());

        return response()->json([
            'user' => auth()->user(),
            'rating' => $rating
        ],201);
    }

    /**
     * @param PromocodeUseRequest $request
     * @param PromocodeService $promocodeService
     * @return RedirectResponse
     */
    public function promocode(PromocodeUseRequest $request, PromocodeService $promocodeService): RedirectResponse
    {
        $code = $request->code;

        $status = $promocodeService->usePromocode($code, auth()->user());

        return redirect()->back(); // TODO: Change that
    }

    public function coinsHistory(Request $request): JsonResponse
    {
        $authUser = auth()->user();

        return response()->json(
            UserCoinsHistory::where('user_id', $authUser->id)->get()
        );
    }

    public function test(AchievementService $achievementService)
    {
        $authUser = auth()->user();

        return $achievementService->getAllARTasksAchievement($authUser);
    }
}
