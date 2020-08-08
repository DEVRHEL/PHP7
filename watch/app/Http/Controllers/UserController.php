<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function getAdd()
    {
        return view('admin.user.add');
    }
    public function postAdd(UserRequest $request)
    {
        $user=new User();
        $user->username=$request->txtUsername;
        $user->password=Hash::make($request->txtPassword);
        $user->email=$request->txtEmail;
        $user->level=$request->radios;
        $user->remember_token=$request->_token;
        $user->save();
        return redirect()->route('admin.user.getList')->with(['flash_message'=>'Complete Add User']);
    }
    public function getEdit($id)
    {
        $data=User::find($id);
        if((Auth::user()->id != 2) && ($id ==2 || ($data->level==1 && (Auth::user()->id != $id))))
        {
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Permission Denied']);
        }
        else
        {
            return view('admin.user.edit',compact('data','id'));
        }
    }
    public function postEdit()
    {

    }
    public function getList()
    {
        $user=User::select('id','username','level','secret_code')->orderBy('id','DESC')->get()->toArray();
        return view('admin.user.list',compact('user'));
    }
    public function getDelete($id)
    {
        $user_current_login=Auth::user()->id;
        $user=User::find($id);
        if (($id==2) || ($user_current_login!=2 && $user->level==1))
        {
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Permission Denied']);
        }
        else
        {
            $user->delete($id);
            return redirect()->route('admin.user.getList')->with(['flash_message'=>'Complete Delete User']);
        }
    }
}
