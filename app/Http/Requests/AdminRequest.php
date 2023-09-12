<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
            'names'=>['required','string','min:4',Rule::unique('admins')->ignore($this->route()->parameter('admin'))],
            'tel'=>['required',Rule::unique('admins')->ignore($this->route()->parameter('admin'))],
            'email'=>['required','email',Rule::unique('admins')->ignore($this->route()->parameter('admin'))],
            'password'=>['required','min:8']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => "Erreur de Creation de l'Admin",
            'errorList' => $validator->errors()
        ], 400));
    }
}
