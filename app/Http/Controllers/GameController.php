<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameResultRequest;
use App\Services\GameService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class GameController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('game');
    }

    /**
     * @param GameResultRequest $request
     * @param GameService $gameService
     * @return RedirectResponse
     */
    public function earn(GameResultRequest $request, GameService $gameService): RedirectResponse
    {
        $gameService->taskComplete(auth()->user(), $request->points);

        return response()->redirectToRoute('game');
    }
}
