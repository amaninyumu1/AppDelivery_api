<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperRestaurant
 */
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable=[
        'restaurant_name','adresse','restaurant_email','restaurant_tel','whatapp','logo','longitude','latitude'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

