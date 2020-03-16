<?php

namespace App\Http\Controllers;

use App\Http\Resources\RatingUserResource;
use App\Models\User;
use App\Models\UserBalance;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class RatingController extends Controller
{
    /**
     * @TODO: Refactor this pls...
     * @return View
     */
    public function index(): JsonResponse
    {
        $orderBy = 'max_coins';

        if ($this->isGame())
            $orderBy = 'max_points';

        $balances = UserBalance::with('user')
            ->orderBy($orderBy, 'desc');

        if ($this->isGame()) // ?type=game
            $balances = $balances->where('max_points', '>', 0);

        //$balances = $balances->paginate(5);

        if ($this->isGame())
            $balances = $balances->appends(['type' => 'game']);

        return response()->json(RatingUserResource::collection($balances->get()));
    }

    /**
     * @return bool
     */
    private function isGame(): bool
    {
        return request()->has('type') && request('type') === 'game';
    }
}
