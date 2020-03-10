<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCoinsHistory extends Model
{
    protected $table = 'user_coins_history';

    /**
     * @var array
     */
    protected $fillable = [
        'prev_coins', 'new_coins', 'coins', 'user_id', 'source'
    ];

     /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
