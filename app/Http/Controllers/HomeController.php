<?php

namespace App\Http\Controllers;

use App\Services\FortuneService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @param FortuneService $fortuneService
     * @return View
     */
    public function index(FortuneService $fortuneService): JsonResponse
    {
        $fortuneTime = 0;
        if (! $fortuneService->checkTime(auth()->user())) {
            $fortuneTime = $fortuneService->getLeftTime(auth()->user());
        }

        $fortuneTime = Carbon::parse($fortuneTime)->format('H.i.s');

        return response()->json($fortuneTime);//view('main', compact('fortuneTime'));
    }
}
