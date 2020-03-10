<?php

namespace App\Providers;

use App\Events\CoinsAdded;
use App\Events\ProductPurchased;
use App\Events\PromocodeUsed;
use App\Listeners\OrderCreate;
use App\Listeners\ProductInStockDecrement;
use App\Listeners\PromocodeUsageCountDecrement;
use App\Listeners\UserCoinsAdd;
use App\Listeners\UserCoinsReduce;
use App\Listeners\UserRankUpdate;
use App\Listeners\UserTaskComplete;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;

final class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
        ],
        PromocodeUsed::class => [
            PromocodeUsageCountDecrement::class,
            UserTaskComplete::class
        ],
        CoinsAdded::class => [
            UserCoinsAdd::class,
            UserRankUpdate::class
        ],
        ProductPurchased::class => [
            UserCoinsReduce::class,
            ProductInStockDecrement::class,
            OrderCreate::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();

        //
    }
}
