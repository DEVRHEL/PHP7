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
        if(Auth::attempt($login)){
            $secretCode = auth()->user()->secret_code;
            if(isset($secretCode) && !empty($secretCode)){

                $this->validate($request, [
                    "code" => "required|digits:6",
                ]);

                $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();


                if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
                    $errors = new \Illuminate\Support\MessageBag();
                    $errors->add("code", "Invalid authentication code");
                    return redirect()->back()->withErrors($errors);
                }

                session(["2fa_verified" => true]);
                return redirect()->route('admin.user.getList');

            } else {
                return redirect()->route('admin.user.getList');
            }
        } else {
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add("error", "Invalid username or password");
            return redirect()->back()->withErrors($errors);
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
