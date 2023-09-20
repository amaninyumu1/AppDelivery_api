<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperPanier
 */
class Panier extends Model
{
    use HasFactory;

    protected $fillable=['nbrePlats','cout','status','user_id','plat_id','commande_id'];

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }

    public function plat(): BelongsTo
    {
        return $this->belongsTo(Plat::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
