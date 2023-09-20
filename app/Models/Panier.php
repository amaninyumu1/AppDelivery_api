<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPanier
 */
class Panier extends Model
{
    use HasFactory;

    protected $fillable=['nbrePlats','status','user_id','plat_id','commande_id'];
}
