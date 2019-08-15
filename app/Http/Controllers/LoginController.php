<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录
    public function index(Request $request)
    {
        if($request->expectsJson()){
            $user_name = $request->get('user_name');
            $password = $request->get('password');
            $res = Auth::guard('admin')->attempt(['user_name'=>$user_name,'password'=>$password]);
            if($res){
                return response()->json(['code'=>200,'msg'=>'登录成功']);
            }else{
                return response()->json(['code'=>404,'msg'=>'用户名或密码错误']);
            }
        }
        return view('login');
    }

    //登出
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
