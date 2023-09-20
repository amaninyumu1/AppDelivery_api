<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use App\Models\Plat;
use Auth;
use DB;
use Exception;

class CommandeController extends Controller
{
    public function index()
    {

    }
    public function store(CommandeRequest $request)
    {
        try {
            $coutTotal=$this->findPanierByAuthUserAndStatus(Auth::user()->id,0,true);
            $validate=$request->validated();
            $validate['coutTotal']=$coutTotal;
            $commande=Commande::create($validate);
            $lastInsertIdCommande= DB::getPdo()->lastInsertId();
            DB::table('paniers')->where('paniers.user_id','=',''.Auth::user()->id)->where('paniers.status','=','0')->update(['commande_id'=>$lastInsertIdCommande,'status'=>1]);
            return response()->json([
                "success" => true,
                "status_message" => "La commande a ete ajouter avec success",
                "data" => $commande
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function findCommandeByid(Commande $commande)
    {
        return response()->json([
            "success" => true,
            "data" =>Commande::find($commande->id),
        ],200);
    }
}
