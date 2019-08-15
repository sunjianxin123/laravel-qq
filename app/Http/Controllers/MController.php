<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MController extends Controller
{
    public function index()
    {
        $memcache = new \Memcache();
        $memcache->connect('127.0.0.1',11211);
        $memcache->flush();
        $memcache->add('key', 'hello memcache!');
        $memcache->add('key2', 'hello memcache22222!');
        $memcache->set('num',5);
        $memcache->increment('num',5);
        $memcache->replace('key','哈哈');
        $out = $memcache->get('key2');
        $memcache->close();//关闭memcache
        echo $out;
    }

    public function getM()
    {
        $memcache = new \Memcache();
        $memcache->connect('127.0.0.1',11211);
        dd($memcache->getStats());
//        $key = $memcache->get('num');
//        dd($key);
    }


    // memcache 存储 session 存储了 session_id
    public function S()
    {
        ini_set('session.save_handler','memcache');
        ini_set('session.save_path','tcp://127.0.0.1:11211');
        session_start();
        var_dump($_SESSION['name'] = 'quanzhan');
        echo '<hr>';
        echo session_id();
    }

    public function D()
    {

    }
}
