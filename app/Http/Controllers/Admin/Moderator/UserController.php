<?php

namespace App\Http\Controllers\Admin\Moderator;

use App\Events\CoinsAdded;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function addCoins(Request $request): RedirectResponse
    {
        $user = User::find($request->id);
        $authUserId = auth()->user()->id;

        event(new CoinsAdded($user, $request->coins, "Начисление от агента #$authUserId"));

        DB::table('log_coins')->insert([
            'moder_id' => auth()->user()->id,
            'user_id' => $user->id,
            'amount' => $request->coins,
            'timestamp' => now(),
        ]);

        return redirect()->back();
    }
}
