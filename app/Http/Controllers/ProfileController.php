<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromocodeUseRequest;
use App\Models\User;
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
            'user' => auth()->user()->load('achievements'),
            'rating' => $rating
        ],201);
    }

    /**
     * @param PromocodeUseRequest $request
     * @param PromocodeService $promocodeService
     * @return JsonResponse
     */
    public function promocode(PromocodeUseRequest $request, PromocodeService $promocodeService): JsonResponse
    {
        $code = $request->code;

        $status = $promocodeService->usePromocode($code, auth()->user());

        return response()->json(['message' => 'Успешная активация!']);
    }

    public function coinsHistory(Request $request): JsonResponse
    {
        $authUser = auth()->user();

        return response()->json(
            UserCoinsHistory::where('user_id', $authUser->id)->get()
        );
    }

    public function visit(User $user, UserService $userService)
    {
        $rating = $userService->getRatingStats($user);

        return response()->json([
            'user' => $user->load('balance', 'rank', 'achievements'),
            'rating' => $rating,
        ]);
    }
}
