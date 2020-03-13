<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rank extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'required_coins'
    ];

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->HasMany(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'required_rank');
    }
}
