<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => 'required|unique:products|max:255',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'old_price' => 'required',
            'description' => 'required',
            'count' => 'required|numeric',
            'vendor_code' => 'required|numeric|unique:products',
            'status' => 'required',
            'is_featured' => 'boolean',
            'is_new' => 'boolean',
            'discount' => 'required|numeric',
            'image' => 'image',
            'categories'=>'required'
        ];
    }
}
