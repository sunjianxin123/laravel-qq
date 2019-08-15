<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VueController extends Controller
{
    public function index(Request $request)
    {
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin_login');
        }
        return view('vue.index');
    }

    public function show()
    {
        echo 55;
    }

    //文件上传方法
    public function upload()
    {
        $file = request()->file('file');
        if($file ){
            $url = upload($file);
            return response()->json(['code'=>200,'msg'=>'上传成功','data'=>$url]);
        }
        return response()->json(['code'=>404,'msg'=>'上传失败']);
    }

}


