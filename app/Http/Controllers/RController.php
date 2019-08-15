<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\request()->isMethod('post')){
            //接收用户传值
            $username = $_POST['username'];
            $pwd = $_POST['pwd'];

//连接redis
            $redis = new Redis();
            $redis->connect('127.0.0.1',6379);
//获取用户名的记录错误次数
//没有这个key，或者key的值过期
//都返回的是false
            $data = $redis->get($username);
            if($data ===false || $data < 3){
                //没有错误次数，或者错误次数没有超过限制次数
                //验证密码，正常是需要查询数据库的
                $truepwd = 123456;
                //判断密码是否正确
                if($pwd == $truepwd){
                    echo '登录成功！';
                }else{
                    echo '密码错误！';
                    //在redis里进行计数
                    $redis->incr($username);
                    //设置key过期时间
                    //用来自动解封账户
                    $redis->setTimeout($username,10);
                }
            }else{
                //超过错误次数
                //提示不允许登录，不连接数据库
                echo '你现在已经被限制登录了!';
            }
        }
        return view('r.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
