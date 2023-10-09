<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\UploadedFile;

class RestaurantController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => $this->findRestaurantWhereUserIdIsNotNull()
        ], 200);
    }

    public function store(RestaurantRequest $request)
    {
        try {
            $validate=$request->validated();
            /**
             * @var UploadedFile $logo
             */
            $logo = $request->validated('logo');
            if (!empty($logo) && !$logo->getError()) {
                $logoPath = $logo->store('restaurant', 'public');
                $validate['logo'] = $logoPath;
            }
            $Restaurant=Restaurant::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "Le Restaurant a ete ajouter avec success",
                "data" => $Restaurant
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(RestaurantRequest $request, Restaurant $Restaurant){
        try {
            $validate=$request->validated();
            /**
             * @var UploadedFile $logo
             */
            $logo = $request->validated('logo');
            if (!empty($logo) && !$logo->getError()) {
                $logoPath = $logo->store('restaurant', 'public');
                $validate['logo'] = $logoPath;
            }
            $Restaurant->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "Le Restaurant a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(Restaurant $Restaurant){
        try {
            $Restaurant->delete();
            return response()->json([
                "success" => true,
                "status_message" => "Le Restaurant a ete supprimer avec success",
                "data" => $Restaurant
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function findRestaurantById(Restaurant $restaurant)
    {
        return response()->json([
            "success" => true,
            "data" => $this->findRestaurantWhereUserIdIsNotNull($restaurant->id)
        ], 200);
    }

}
