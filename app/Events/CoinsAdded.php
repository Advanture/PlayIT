<?php

namespace App\Events;

use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CoinsAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var int
     */
    public $coins;

    /**
     * @var string
     */
    public $source;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param int $coins
     * @param string $source
     */
    public function __construct(User $user, int $coins, string $source = 'Другое')
    {
        $this->user = $user;
        $this->coins = $coins;
        $this->source = $source;
    }
}
