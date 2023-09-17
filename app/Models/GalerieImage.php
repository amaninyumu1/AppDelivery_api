<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperGalerieImage
 */
class GalerieImage extends Model
{
    use HasFactory;

    protected $fillable=['images'];
}
