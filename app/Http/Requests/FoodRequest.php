<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; //TODO: change to auth()->user()->can('create', Food::class)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|integer',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'model' => 'file|max:4096|mimes:obj,fbx,dae',
            'meta_description' => 'string|max:255',
            'meta_keywords' => 'string|max:255',
            'main_image' => 'integer',
        ];
    }
}
