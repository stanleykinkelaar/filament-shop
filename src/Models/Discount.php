<?php

namespace Stanleykinkelaar\FilamentShop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    protected $fillable = [
        'customer_id',
        'code',
        'expiration_date',
    ];

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class);
    }
}
