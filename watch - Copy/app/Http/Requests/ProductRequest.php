<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'txtName'=>'required|unique:products,name',
            'sltCate'=>'required',
            'fImages'=>'required|image',
            'fProductDetail'=>'array',
            'fProductDetail.*'=>'image'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required'=>'Please Enter Name Product',
            'txtName.unique'=>'Product Name Is Exist',
            'sltCate.required'=>'Please Choose Category',
            'fImages.required'=>'Please Choose Images',
            'fImages.image'=>'This File Is Not Images',
            'fProductDetail.*.image'=>'This File Is Not Image'
        ];
    }
}
