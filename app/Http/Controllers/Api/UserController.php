<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Auth;
use Exception;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "status_message" => "L'User a ete ajouter avec success",
            "data" => User::with('role')->get()
        ], 200);
    }

    public function store(UserRequest $request)
    {
        try {
            $validate=$request->validated();
            $validate['password']= Hash::make($validate['password']);
            $User=User::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "L'User a ete ajouter avec success",
                "data" => $User
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(UserUpdateRequest $request, User $User){
        try {
            $validate=$request->validated();
            $validate['password']= Hash::make($validate['password']);
            $User->update($validate);
            $User->role()->sync($request->validated('role_id'));
            return response()->json([
                "success" => true,
                "status_message" => "L'User a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(User $User){
        try {
            $User->delete();
            return response()->json([
                "success" => true,
                "status_message" => "L'User a ete supprimer avec success",
                "data" => $User
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function login(UserLoginRequest $request){
        try {
            if (auth()->attempt($request->only('names','password'))){
                $User=auth()->guard('User')->user();
                $token = $User->createToken('deliveryapp', ['user'])->plainTextToken;
                return response()->json([
                    "success" => true,
                    "status_message" => "Connecter avec success",
                    "eleve" => User::where('users.id','=',''.$User->id)->with('roles')->first(),
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
