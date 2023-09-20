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

    public function findPanierByAuthUserAndStatus($user_id,bool $status,bool $onSum=false)
    {
        $panier=DB::table('paniers')->join('plats','plats.id','=','paniers.plat_id')->join('galerie_image_plat','plats.id','=','galerie_image_plat.plat_id')->join('galerie_images','galerie_image_plat.galerie_image_id','=','galerie_images.id')->where('paniers.user_id','=',''.$user_id)->where('paniers.status','=',''.$status)->get();
        if ($onSum){
            $panier=DB::table('paniers')->join('plats','plats.id','=','paniers.plat_id')->join('galerie_image_plat','plats.id','=','galerie_image_plat.plat_id')->join('galerie_images','galerie_image_plat.galerie_image_id','=','galerie_images.id')->where('paniers.user_id','=',''.$user_id)->where('paniers.status','=',''.$status)->sum('paniers.cout');
        }
        return $panier;
    }
}
