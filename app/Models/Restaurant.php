<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperRestaurant
 */
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable=[
        'restaurant_name','adresse','restaurant_email','restaurant_tel','whatapp','logo','longitude','latitude','user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plat(): HasMany
    {
        return $this->hasMany(Plat::class);
    }
}

