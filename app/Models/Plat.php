<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPlat
 */
class Plat extends Model
{
    use HasFactory;
    protected $fillable=['plat_name','description','prix','dure','categorie_id','restaurant_id'];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function galerieImage(): BelongsToMany
    {
        return $this->belongsToMany(GalerieImage::class);
    }

    public function panier(): HasMany
    {
        return $this->hasMany(Panier::class);
    }
}
