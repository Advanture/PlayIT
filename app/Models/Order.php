<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Order extends Pivot
{
    /**
     * @var string 
     */
    protected $table = 'orders';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id', 'product_id', 'is_pending'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_pending' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
