<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => Role::get()
        ], 200);
    }

    public function store(RoleRequest $request)
    {
        try {
            $validate=$request->validated();
            $Role=Role::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "Le Role a ete ajouter avec success",
                "data" => $Role
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(RoleRequest $request, Role $Role){
        try {
            $validate=$request->validated();
            $Role->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "Le Role a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Role $Role){
        try {
            $Role->delete();
            return response()->json([
                "success" => true,
                "status_message" => "Le Role a ete supprimer avec success",
                "data" => $Role
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function findRoleById(Role $role)
    {
        return response()->json([
            "success" => true,
            "data" => Role::find($role),
        ], 200);
    }

}
