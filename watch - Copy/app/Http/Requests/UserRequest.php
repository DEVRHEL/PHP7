<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'txtUsername'=>'required|unique:users,username',
            'txtPassword'=>'required',
            'txtRePassword'=>'required|same:txtPassword',
            'txtEmail'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/',
            'radios'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'txtUsername.required'=>'Please Enter Username',
            'txtUsername.unique'=>'User Is Exists',
            'txtPassword.required'=>'Please Enter Password',
            'txtRePassword.required'=>'Please Enter RePassword',
            'txtRePassword.same'=>'Two Password Do Not Match',
            'txtEmail.required'=>'Please Enter Email',
            'txtEmail.regex'=>'Email Error Syntax',
            'radios.required'=>'Please Select Level'
        ];
    }
}
