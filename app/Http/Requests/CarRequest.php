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
            "url"=> "nullable|min:5|string",
            "description"=> "nullable|min:3|max:25|string",
            "images.*"=> 'nullable|image|mimes:jpeg,jpg,png',
            'fuel'=> "required|string",
            'drive_type'=>"required|string",
            'mass'=> "required|integer",
            'doors'=> "required|integer",
            'seats'=> "required|integer",
            'hp'=> "required|integer",
            'top_speed'=> "required|integer",
            'transmission'=>"required|string",
            'gear'=> "required|integer",
            'type'=>"required|string",
        ];
    }
}
