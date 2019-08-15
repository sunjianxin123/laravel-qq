<?php

//获取用户信息
if(!function_exists('user')){
    function user(){
        return \Illuminate\Support\Facades\Auth::guard('admin')->user();
    }
}

//文件上传
if(!function_exists('upload')){
    function upload($file){
        $path = $file->store('avatars','public');
        $path = '/storage/'.$path;
        return $path;
    }
}