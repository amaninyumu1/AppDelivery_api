<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'plat_name'=>$this->resource->plat_name,
            'description'=>$this->resource->description,
            'prix'=>$this->resource->prix,
            'dure'=>$this->resource->dure,
            'categorie_id'=>$this->resource->categorie_id,
            'restaurant_id'=>$this->resource->restaurant_id,
            //'galerieImage'=>GalerieImageRessource::collection($this->resource->galerieImage)
        ];
    }
}
