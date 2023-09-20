<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PanierRequest;
use App\Http\Resources\PlatResource;
use App\Models\Panier;
use App\Models\Plat;
use Auth;
use DB;
use Exception;
use Hash;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
        ], 200);
    }

    public function store(PanierRequest $request,$id)
    {
        try {
            $plat=Plat::findOrFail($id);
            $panier=DB::table('paniers')->where('paniers.plat_id','=',''.$id)->first();
            if ($panier){
                return response()->json([
                    "error" => true,
                    "status_message" => "Ce plat existe deja dans votre panier",
                ], 400);
            }else{
                $validate=$request->validated();
                $validate['user_id']=Auth::user()->id;
                $validate['plat_id']=$plat->id;
                $Panier=Panier::create($validate);
            }
            return response()->json([
                "success" => true,
                "status_message" => "Le Panier a ete ajouter avec success",
                "data" => $Panier
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function panierShow()
    {
        $panier=DB::table('paniers')->join('plats','plats.id','=','paniers.plat_id')->join('galerie_image_plat','plats.id','=','galerie_image_plat.plat_id')->join('galerie_images','galerie_image_plat.galerie_image_id','=','galerie_images.id')->where('paniers.user_id','=',''.Auth::user()->id)->where('paniers.status','=','0')->get();
            return $panier;
    }

    public function update(PanierRequest $request, Panier $Panier){
        try {
            $validate=$request->validated();
            $Panier->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "Le Panier a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Panier $Panier){
        try {
            $Panier->delete();
            return response()->json([
                "success" => true,
                "status_message" => "Le Panier a ete supprimer avec success",
                "data" => $Panier
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function findPanierByid(Panier $Panier)
    {
        return response()->json([
            "success" => true,
            "data" => Panier::find($Panier->id)
        ], 200);
    }

}
