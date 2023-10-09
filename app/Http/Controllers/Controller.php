<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;

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
     * findRestaurantWhereUserIdIsNotNull
     * @param $user_id
     * @return LengthAwarePaginator|Collection
     */
    public function findRestaurantWhereUserIdIsNotNull($restaurant_id=null)
    {
        $restaurant=null;
        if (!is_null($restaurant_id)){
            $restaurant=DB::table('restaurants')->where('restaurants.user_id','!=','null')->where('restaurants.id','=',''.$restaurant_id)->paginate(25);
        }else{
            $restaurant=DB::table('restaurants')->where('restaurants.user_id','!=','null')->get();
        }
        return $restaurant;
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
