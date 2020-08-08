<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
class TwoFaceAuthsController extends Controller
{
    public function getAdd()
    {
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        $secretCode = $googleAuthenticator->createSecret();
        $qrCodeUrl = $googleAuthenticator->getQRCodeGoogleUrl(
            auth()->user()->email, $secretCode, config("app.name")
        );

        session(["secret_code" => $secretCode]);

        return view('admin.user.enable2fa',compact('qrCodeUrl'));
    }

    public function postAdd(Request $request)
    {
        $checkcode = $request->code;
        if(empty($checkcode)){
            return redirect()->route('admin.2fa.getAdd')->with(['flash_message'=>'Please enter your code']);
        }

        $this->validate($request, [
            "code" => "required|digits:6"
        ]);

        // Khởi tạo Google Authenticator class
        $googleAuthenticator = new \PHPGangsta_GoogleAuthenticator();
        // Lấy secret code
        $secretCode = session("secret_code");

        // Mã người dùng nhập không khớp với mã được sinh ra bởi ứng dụng
        if (!$googleAuthenticator->verifyCode($secretCode, $request->get("code"), 0)) {
            return redirect()->route('admin.2fa.getAdd')->with(['flash_message'=>'Invalid Code']);
        }

        // Update secret code cho người dùng
        $user = auth()->user();
        $user->secret_code = $secretCode;
        $user->save();

        return redirect()->route('admin.user.getList')->with(['flash_message'=>'2FA enabled']);
    }

    public function disableFA($id){
        $user = User::findOrFail($id);
        if($user)
        {
            $user->secret_code = null;
            $user->save();
            return redirect()->route('admin.2fa.getAdd')->with(['flash_message'=>'Disable 2FA successfully']);
        } else {
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Error: User invalid']);
        }
    }
}
