<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperPlat
 */
class Plat extends Model
{
    use HasFactory;
    protected $fillable=['plat_name','description','prix','dure','categorie_id'];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function galerieImage(): HasMany
    {
        return $this->hasMany(GalerieImage::class);
    }
}
