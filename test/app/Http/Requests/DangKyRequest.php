<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //phai doi thanh true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'txtMonHoc' => 'required|unique:db_dk,monhoc',
            'txtGiaTien' => 'required',
            'txtGiangVien' => 'required',
            'txtFile' => 'image|max:150'
        ];
    }
    public function messages()
    {
        return [
            'txtMonHoc.required' => 'Vui long nhap ten mon hoc',
            'txtMonHoc.unique' => 'Ten mon hoc da ton tai',
            'txtGiaTien.required' => 'Vui long nhap gia tien',
            'txtGiangVien.required' => 'Vui long nhap ten giang vien',
            'txtFile.image' => 'Vui long up load file anh',
            'txtFile.max' => 'Vui long upload file duoi 150KB'
        ];
    }
}
