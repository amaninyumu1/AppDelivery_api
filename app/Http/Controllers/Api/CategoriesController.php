<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Categorie;
use Exception;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => Categorie::get()
        ], 200);
    }

    public function store(CategoriesRequest $request)
    {
        try {
            $validate=$request->validated();
            $Categorie=Categorie::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "La Categorie a ete ajouter avec success",
                "data" => $Categorie
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(CategoriesRequest $request, Categorie $Categorie){
        try {
            $validate=$request->validated();
            $Categorie->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "La Categorie a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Categorie $Categorie){
        try {
            $Categorie->delete();
            return response()->json([
                "success" => true,
                "status_message" => "La Categorie a ete supprimer avec success",
                "data" => $Categorie
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

}
