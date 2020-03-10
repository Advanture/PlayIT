<?php

namespace App\Events;

use App\Models\Promocode;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PromocodeUsed
{
    use SerializesModels;

    /**
     * @var Promocode
     */
    public $promocode;

    /**
     * @var Authenticatable
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @param Promocode $promocode
     * @param Authenticatable $user
     */
    public function __construct(Promocode $promocode, Authenticatable $user)
    {
        $this->promocode = $promocode;
        $this->user = $user;
    }
}
