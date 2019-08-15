<?php

namespace App\Http\Controllers;

use App\AdminUser;
use App\AdminUserRole;
use App\Jobs\LinkJob;
use App\Link;
use App\Messages\OrderMessage;
use App\Utils\PhoneMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Response;
use JPush\Client as JPush;
Use Overtrue\LaravelSocialite\Socialite;

class TestController extends Controller
{
    public function qqlogin()
    {
        return Socialite::driver('qq')->redirect();
    }

    public function back()
    {
        $user = Socialite::driver('qq')->user()->toArray();
        dd($user);
    }

    public function test()
    {
        return view('test.index');
//        $pwd = password_hash(123456,PASSWORD_BCRYPT);
//        if(password_verify(123456,$pwd)){
//            echo '匹配';
//        }else{
//            dd($pwd);
//        }

        $pwd = bcrypt(1234561);
        if(Hash::check(1234561,$pwd)){
            dd(22222);
        }
        $pwd2 = Hash::make(132456);
        echo $pwd;
        echo "<br>";
        echo $pwd2;
//        dd($pwd);

        // IOC inversion of controller  控制反转
        // 控制反转 是说创建对象的控制权进行转移，以前创建对象的主动权和创建时机是由自己把控的，而现在这种权力转移到第三方
        // DI dependency injection 依赖注入
        // 应用程序依赖数据库，而自己不去实例化数据库，是系统帮助实例化的，完成后再注入到应用程序，
    }


    //curl请求数据方法
    public function curl($data)
    {
        $ch = curl_init();//初始化curl
        curl_setopt($ch,CURLOPT_URL,'https://www.baidu.com');//请求地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//返回字符串
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(//设置头信息
           'Content-Type: application/json;charset=utf-8'
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);//https请求
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);//https请求
        curl_setopt($ch,CURLOPT_POST,1);//post请求
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//post请求的数据
        $res = curl_exec($ch);//执行
        curl_close($ch);//关闭
        return \GuzzleHttp\json_decode($res,true);
    }


    public function testCurlGet()
    {
        $ch = curl_init();
        $url = 'http://www.baidu.com';
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $res = curl_exec($ch);
        curl_close($ch);//关闭
        echo $res;
    }

    public function testCurlPost()
    {
        $ch = curl_init();
        $url = route('getData');
        $data = ['id'=>1,'name'=>'sjx222','age'=>22];
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json;charset=utf-8'
        ));
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $res = curl_exec($ch);
        curl_close($ch);//关闭
        echo $res;
//        dd(\GuzzleHttp\json_decode($res)) ;
    }

    public function getData()
    {
        $link = \App\Link::find(91);
        $link->name = \request()->get('name','sjx');
        $link->save();
        return \GuzzleHttp\json_encode(['code'=>200,'msg'=>'success']);
//        $data = ['id'=>1,'name'=>'sjx','age'=>22];
//        return $data;
    }


    public function send()
    {
        $phone = '17744417207';
        $captcha = mt_rand(100000,999999);
        PhoneMessage::send($phone,new OrderMessage($captcha));
    }

    //测试观察者
    public function linkObserver()
    {
        Log::emergency('记录一条信息');die;
        $link = \App\Link::find(91);
        $link->url = '测试下11啊';
        if($link->save()){
            return Response::json(['code'=>200,'message'=>'操作成功']);
        }
    }

    public function queue()
    {
        return \response()->json(['code'=>200,'message'=>'请求成功']);
        $link = \App\Link::find(91);
        LinkJob::dispatch($link)->delay(now()->addMinute());
    }

    public function testEvent()
    {
        $link = Link::find(91);
        //触发事件
        event(new \App\Events\Link($link));
    }

    public function test1()
    {
        //生成多个商品id，添加到redis里的list结构
        for ($i=0; $i < 5 ; $i++) {
            //添加元素i到list中
           Redis::lPush('shoplist2',$i);

        }
    }

    public function test2()
    {
        echo Redis::llen('shoplist2');die;
        //把list的元素一个一个出来，一个个买商品
                $shopid = Redis::rPop('shoplist2');
                var_dump($shopid);
         if($shopid){
           echo '恭喜你，抢到了！';
         }else{
           echo '不好意思，卖完了！';
         }
    }

    //测试的一个方法
    public function test3()
    {
        dd(route('admin_index'));
        dd(AdminUser::with('adminRoleS')->find(18)->toArray());

        $adminUser = AdminUser::find(18)->adminRole;
        foreach ($adminUser as $role){
            echo $role->pivot->created_at.'------';
        }
        die;
//        dd($adminUser);

        $adminUserRole = AdminUserRole::find(2);
        dd($adminUserRole->adminUser);
    }


    public function swoole()
    {
        // swoole  应用场景
        //   进程与线程的关系

        $server = new swoole_server('0.0.0.0',6060);
    }

    public function jPush()
    {
        $client = new Jpush(1,1);
    }



}
