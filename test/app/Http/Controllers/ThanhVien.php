<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ThanhVienRequest;
class ThanhVien extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }
    public function postLogin(ThanhVienRequest $request)
    {

    }
}
