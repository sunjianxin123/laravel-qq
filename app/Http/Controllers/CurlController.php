<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurlController extends Controller
{
    public function info()
    {
        $ch = curl_init('http://www.baidu.com');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $res = curl_exec($ch);
        curl_close($ch);
        echo str_replace('百度','屌丝',$res);
    }


}
