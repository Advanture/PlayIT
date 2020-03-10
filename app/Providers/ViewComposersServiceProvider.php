<?php

namespace App\Providers;

use App\Http\View\Composers\MaintenanceManagerComposer;
use App\Http\View\Composers\UserCoinsComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

final class ViewComposersServiceProvider extends ServiceProvider
{
    /**
     * @var string[][]
     */
    private const COMPOSERS = [
        MaintenanceManagerComposer::class => ['admin.manager.*'],
        UserCoinsComposer::class => ['*']
    ];

    /**
     * Bootstrap services.
     *
     * @param Factory $views
     * @return void
     */
    public function boot(Factory $views): void
    {
        foreach (self::COMPOSERS as $composer => $names) {
            $this->app->singleton($composer);

            $views->composer($names, $composer);
        }
    }
}
