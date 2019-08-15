<?php
namespace App\Utils;


class Md5Utils
{
    /**
     * 验证签名
     * @param $need 需要验证的字符串
     * @param $sign 签名的字符串
     * @param $key  签名的key
     * @return bool 签名结果
     */
    public static function verify($paras,$api_key)
    {
        $sign=$paras['sign'];
        $data=static::filter($paras);
        $data=static::sort($data);
        $str=static::linkStr($data);

        $mysign=md5($str.$api_key);
        return $mysign==$sign;
    }

    /**
     * 根据参数进行加密
     * @param $host
     * @param $api_id
     * @param $api_key
     * @return array
     */
    public static function sign($paras,$api_key)
    {
        $paras=static::filter($paras);
        $paras['timeStamp']=time();
        $data=static::sort($paras);
        $str=static::linkStr($data);
        $sign=md5($str.$api_key);
        $data['sign']=$sign;
        return $data;
    }

    /**
     * 返回带签名的url
     * @param $host
     * @param $paras
     * @param $api_key
     * @return string
     */
    public static function signToUrl($host,$paras,$api_key)
    {
        $data=static::sign($paras,$api_key);
        return trim($host,'?').'?'.http_build_query($data);
    }
    /**
     * 过滤签名
     * @param $paras
     * @return static
     */
    private  static  function filter($paras)
    {
        return collect($paras)->reject(function($val,$key){
            return $key=='sign'|| $val=='';
        })->toArray();
    }

    /**
     *
     * 对数组进行排序
     * @param $paras
     * @return mixed
     */
    private static function sort($paras)
    {
        ksort($paras);
        reset($paras);
        return $paras;
    }

    /**
     * 将请求参数转换为不同的url连接地址
     * @param $paras
     * @return bool|string
     */
    private static function linkStr($paras)
    {
        $arg  = "";
        foreach ($paras as $key=>$para){
            $arg.=$key.'='.$para.'&';
        }
        //去掉最后一个&字符
        $arg = substr($arg,0,strlen($arg)-1);
        //如果存在转义字符，那么去掉转义
        if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}

        return $arg;
    }
}