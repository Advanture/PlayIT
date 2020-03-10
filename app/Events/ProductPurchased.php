<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ProductPurchased
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Authenticatable
     */
    public $user;

    /**
     * @var Product
     */
    public $product;

    /**
     * Create a new event instance.
     *
     * @param Authenticatable $user
     * @param Product $product
     */
    public function __construct(Authenticatable $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }
}
