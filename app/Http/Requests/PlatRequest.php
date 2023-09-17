<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PlatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'plat_name'=>['required','string','min:4',Rule::unique('plats')->ignore($this->route()->parameter('plat'))],
            'description'=>['required','string'],
            'prix'=>['required','numeric'],
            'dure'=>['required'],
            'categorie_id'=>['required','exists:categories,id'],
            'restaurant_id'=>['required','exists:restaurants,id'],
            'galerie_image'=>['required','array','exists:galerie_images,id']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => "Erreur de Creation du Plat",
            'errorList' => $validator->errors()
        ], 400));
    }
}
