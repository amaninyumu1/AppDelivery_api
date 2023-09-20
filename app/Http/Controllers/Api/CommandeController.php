<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Plat;

class CommandeController extends Controller
{

    public function addCart($id)
    {

        return response()->json([
            "success" => true,
            "status_message" => "Le Plat a ete ajouter avec success",
        ], 200);
    }

    public function cartShow()
    {

    }
}
