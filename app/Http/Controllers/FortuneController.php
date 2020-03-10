<?php

namespace App\Http\Controllers;

use App\Events\CoinsAdded;
use App\Services\FortuneService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FortuneController extends Controller
{
    /**
     * @param FortuneService $fortuneService
     * @return View
     */
    public function index(FortuneService $fortuneService): View
    {
        $canFortune = $fortuneService->checkTime(auth()->user());

        $fortuneTime = 0;
        if (! $fortuneService->checkTime(auth()->user())) {
            $fortuneTime = $fortuneService->getLeftTime(auth()->user());
        }

        $fortuneTime = Carbon::parse($fortuneTime)->format('H.i.s');

        return view('fort', compact('canFortune', 'fortuneTime'));
    }

    /**
     * @param FortuneService $fortuneService
     * @return RedirectResponse|View
     */
    public function start(FortuneService $fortuneService)
    {
        if (! $fortuneService->checkTime(auth()->user()))
            return redirect()->back();

        $randomValue = rand(1, 99);
        $canFortune = true;

        event(new CoinsAdded(auth()->user(), $randomValue));
        auth()->user()->update([
            'last_fortune' => now()
        ]);

        return view('fort', compact('randomValue', 'canFortune'));
    }

    /**
     * @return RedirectResponse
     */
    public function startRedirect(): RedirectResponse
    {
        return redirect()->route('fortune');
    }
}
