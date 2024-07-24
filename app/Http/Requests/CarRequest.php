<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|min:2|max:25|string",
            "slug"=> "nullable|unique:cars",
            "brand_id"=> "required|exists:brands,id",
            "price"=> "required|numeric",
            "color"=> "required|min:2",
            "description"=> "nullable|min:3|max:25|string",
            "image"=> 'required|image|mimes:jpeg,jpg,png'
        ];
    }
}
