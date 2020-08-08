<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        // Sau khi xác thực Facebook chuyển hướng về đây cùng với một token
        // Các xử lý liên quan đến đăng nhập bằng mạng xã hội cũng đưa vào đây.
        try {
            $user = \Socialite::driver('facebook')->user();
            $checkUser = User::where('email', '=', $user->email)->first();
            if ($checkUser === null) {
                // user doesn't exist
                $userModel = new User;
                $userModel->username = $user->name;
                $userModel->password=Hash::make("user");
                $userModel->email = $user->email;
                $userModel->level="0";
                $userModel->save();
            }
            // sau khi cho tao moi thi dang nhap cho user
            $login = [
                'username'=>$user->name,
                'password'=>"user",
            ];
            if(Auth::attempt($login)) {
                return redirect()->route('home');
            }
            else {
                return redirect()->route('home');
            }
        } catch (Exception $e) {
            return redirect()->route('home');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
