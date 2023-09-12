<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Auth;
use Exception;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

    }

    public function store(AdminRequest $request)
    {
        try {
            $validate=$request->validated();
            $validate['password']= Hash::make($validate['password']);
            $admin=Admin::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "L'Admin a ete ajouter avec success",
                "data" => $admin
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(AdminRequest $request, Admin $admin){
        try {
            $validate=$request->validated();
            $validate['password']= Hash::make($validate['password']);
            $admin->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "L'Admin a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Admin $admin){
        try {
            $admin->delete();
            return response()->json([
                "success" => true,
                "status_message" => "L'Admin a ete supprimer avec success",
                "data" => $admin
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function login(AdminLoginRequest $request){
        try {
            if (Auth::guard('admin')->attempt($request->only('names','password'))){
                $admin=auth()->guard('admin')->user();
                $token = $admin->createToken('deliveryapp', ['admin'])->plainTextToken;
                return response()->json([
                    "success" => true,
                    "status_message" => "Connecter avec success",
                    "eleve" => $admin,
                    "token" => $token,
                ], 200);
            }else{
                return response()->json([
                    "error" => true,
                    "status_message" => "Les informations saisies sont incorrectes",
                ], 400);
            }
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            "success" => true,
            "status_message" => "Deconnexion faite avec success",
        ], 200);
    }
}
