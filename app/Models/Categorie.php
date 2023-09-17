<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCategorie
 */
class Categorie extends Model
{
    use HasFactory;

    protected $fillable=['categories_name'];

    public function plat(): HasMany
    {
        return $this->hasMany(Plat::class);
    }
}
