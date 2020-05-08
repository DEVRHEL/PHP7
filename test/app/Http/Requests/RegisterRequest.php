<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui long nhap ten',
            'email.required'=>'Vui long nhap email',
            'email.unique'=>'Email nay da ton tai',
            'email.email'=>'Email chua chinh xac',
            'password.required'=>'Vui long nhap password'
        ];
    }
}
