<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Http\Requests\PromocodeUseRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\VisitProfileResource;
use App\Models\User;
use App\Models\UserCoinsHistory;
use App\Services\PromocodeService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\AchievementService;

class ProfileController extends Controller
{
    /**
     * @param UserService $userService
     * @return JsonResponse
     */
    public function index(UserService $userService): JsonResponse
    {
        $rating = $userService->getRatingStats(auth()->user());

        return response()->json([
            'user' => new ProfileResource(auth()->user()),
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
        if($user->corona == true){
            auth()->user()->corona = true;
            auth()->user()->top = 2;
            auth()->user()->save();
        }

        return response()->json([
            'user' => new VisitProfileResource($user->load('balance', 'rank', 'achievements')),
            'rating' => $rating,
        ]);
    }

    public function characterUpdate(CharacterRequest $request): JsonResponse
    {
        $authUser = auth()->user();

        if( $authUser->corona != true && $request->top == 2 ) return response()->json(['message' => 'Ошибка!'], 400);

        $authUser->update([
            'body' => $request->body,
            'glasses' => $request->glasses,
            'top' => $request->top,
            'bottom' => $request->bottom,
        ]);

        return response()->json(['message' => 'Успешное создание внешности!'], 201);
    }
}
