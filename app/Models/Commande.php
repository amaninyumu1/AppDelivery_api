<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCommande
 */
class Commande extends Model
{
    use HasFactory;

    protected $fillable=['adresse','coutTotal','distance','status_commande'];


    public function panier(): HasMany
    {
        return $this->hasMany(Panier::class);
    }
}


