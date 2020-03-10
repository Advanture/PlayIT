<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;

class UserCoinsComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        if (auth()->check()) {
            $view->with('coins', auth()->user()->balance->current_coins);
            $view->with('maxCoins', auth()->user()->balance->max_coins);
            $view->with('maxPoints', auth()->user()->balance->max_points);
            $view->with('authUser', auth()->user());
        }
    }
}