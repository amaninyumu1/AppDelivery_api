<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalerieImageRequest;
use App\Http\Requests\RestaurantRequest;
use App\Models\GalerieImage;
use App\Models\Restaurant;
use Exception;
use Illuminate\Http\UploadedFile;

class GalerieImageController extends Controller
{
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => GalerieImage::get()
        ], 200);
    }

    public function store(GalerieImageRequest $request)
    {
        try {
            $validate=$request->validated();
            /**
             * @var UploadedFile $logo
             */
            $logo = $request->validated('images');
            if (!empty($logo) && !$logo->getError()) {
                $imagePath = $logo->store('galeriePlat', 'public');
                $validate['images'] = $imagePath;
            }
            $GalerieImage=GalerieImage::create($validate);
            return response()->json([
                "success" => true,
                "status_message" => "L'image a ete ajouter avec success",
                "data" => $GalerieImage
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function update(GalerieImageRequest $request, GalerieImage $galerieImage){
        try {
            $validate=$request->validated();
            /**
             * @var UploadedFile $logo
             */
            $logo = $request->validated('images');
            if (!empty($logo) && !$logo->getError()) {
                $imagePath = $logo->store('galeriePlat', 'public');
                $validate['images'] = $imagePath;
            }
            $galerieImage->update($validate);
            return response()->json([
                "success" => true,
                "status_message" => "L'image a ete modifier avec success",
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

    public function delete(GalerieImage $galerieImage){
        try {
            $galerieImage->delete();
            return response()->json([
                "success" => true,
                "status_message" => "L'image a ete supprimer  dans la galerie avec success",
                "data" => $galerieImage
            ], 200);
        }catch (Exception $e){
            return response()->json($e);
        }
    }

}
