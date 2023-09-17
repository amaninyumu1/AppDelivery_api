<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlatLoginRequest;
use App\Http\Requests\PlatRequest;
use App\Http\Requests\PlatUpdateRequest;
use App\Models\Plat;
use Auth;
use DB;
use Exception;
use Hash;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => Plat::with('galerieImage','restaurant','categorie')->get()
        ], 200);
    }

    public function store(PlatRequest $request)
    {
        try {
            $validate=$request->validated();
            $Plat=Plat::create($validate);
            $Plat->galerieImage()->sync($request->validated('galerie_image'));
            return response()->json([
                "success" => true,
                "status_message" => "Le Plat a ete ajouter avec success",
                "data" => $Plat
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(PlatRequest $request, Plat $Plat){
        try {
            $validate=$request->validated();
            $Plat->update($validate);
            $Plat->galerieImage()->sync($request->validated('galerie_image'));
            return response()->json([
                "success" => true,
                "status_message" => "Le Plat a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Plat $Plat){
        try {
            $Plat->delete();
            return response()->json([
                "success" => true,
                "status_message" => "Le Plat a ete supprimer avec success",
                "data" => $Plat
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function findPlatByid(Plat $plat)
    {
        return response()->json([
            "success" => true,
            "data" => Plat::find($plat->id)
        ], 200);
    }

}
