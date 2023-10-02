<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class RestaurantRequest extends FormRequest
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
            'restaurant_name'=>['required','string','min:4',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'whatsapp'=>['required','string',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'adresse'=>['required','string',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'restaurant_tel'=>['required',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'restaurant_email'=>['required','email',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'longitude'=>['required','numeric',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'latitude'=>['required','numeric',Rule::unique('restaurants')->ignore($this->route()->parameter('restaurant'))],
            'logo'=>['image', 'max:2000', 'mimes:jpge,jpg,png'],
            'user_id'=>['required','exists:users,id']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => "Erreur de Creation du Restaurant",
            'errorList' => $validator->errors()
        ], 400));
    }
}
