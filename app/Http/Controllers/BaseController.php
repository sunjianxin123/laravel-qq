<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseController extends Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = request();
    }

    protected function success($data)
    {
        $return = ['code'=>200,'message'=>'success','data'=>[]];
        if(is_string($data)){
            $return['message'] = $data;
        }elseif (is_array($data)){
            $return['data'] = $data;
        }elseif ($data instanceof Model || $data instanceof Collection || $data instanceof LengthAwarePaginator){
            $return['data'] = $data->toArray();
        }
        return response()->json($return);
    }

    protected function error($message,$code=404){
        $info = ['code'=>$code,'message'=>$message];
        return response()->json($info);
    }

    protected function message($message,$code=404){
        if(request()->expectsJson()){
            $this->error($message,$code);
        }
        return abort($code,$message);
    }
}
