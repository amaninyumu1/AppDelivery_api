<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Fail access token
     * @return JsonResponse
     */
    public function faildAccessToken()
    {
        return response()->json([
            "error" => true,
            "status_message" => "Not authenticate",
        ], 400);
    }

    /**
     * findRoleByRoleName
     * @param $roleName
     * @return mixed
     */
    public function findRoleByRoleName($roleName)
    {
        return DB::table('roles')->where('roles.roles','=',''.$roleName)->get()->first();
    }
}
