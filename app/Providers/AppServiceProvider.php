<?php

namespace App\Providers;

use App\Services\UserService;
use App\Services\VkUserService;
use App\Utils\UserManagerUtil;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(VkUserService::class, function (Application $app) {
            return new VkUserService(new Client([
                'base_uri' => 'https://api.vk.com/method/'
            ]));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Carbon::setLocale(config('app.locale'));
    }
}
