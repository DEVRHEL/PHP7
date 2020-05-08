<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
//    public function __construct(Guard $auth, Registrar $registrar)
//    {
//        $this->auth=$auth;
//        $this->registrar=$registrar;
//        $this->middleware('guest',['except'=>'getLogout']);
//    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $login = [
          'username'=>$request->txtUsername,
          'password'=>$request->txtPassword,
        ];
        if(Auth::attempt($login)) {
            return redirect()->route('admin.user.getList');
        }
        else {
            return redirect()->back();
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
