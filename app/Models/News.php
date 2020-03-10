<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'creator_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:d.n H.i',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
