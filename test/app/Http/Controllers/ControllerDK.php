<?php

namespace App\Http\Controllers;

use App\Http\Requests\DangKyRequest;
use Illuminate\Http\Request;
use App\DangKy;
class ControllerDK extends Controller
{
    public function them(DangKyRequest $request)
    {
        $sql = new DangKy;
        $sql->monhoc = $request->txtMonHoc;
        $sql->giatien = $request->txtGiaTien;
        $sql->giangvien = $request->txtGiangVien;

        $img = $request->file('txtFile');
        $des = 'public/upload/images';
        $img_name = $img->getClientOriginalName();
        $img->move($des,$img_name);

        $sql->image = $img_name;
        $sql->save();
        redirect('form/dangky');
    }
}
