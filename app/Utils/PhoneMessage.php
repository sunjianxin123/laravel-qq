<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/26
 * Time: 17:24
 */
namespace App\Utils;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Message;
use \Overtrue\EasySms\Strategies\OrderStrategy;

//发送短信的工具类
class PhoneMessage{
    /**
     * 发送短信
     * @param $phone
     * @param Message $message
     */
    public static function send($phone,Message $message)
    {
        $config = self::getConfig();
        $easySms = new EasySms($config);
        $easySms->send($phone, $message);
    }

    /**
     * 获取配置信息
     */
    private static function getConfig(){
        return [
            // HTTP 请求的超时时间（秒）
            'timeout' => 5.0,

            // 默认发送配置
            'default' => [
                // 网关调用策略，默认：顺序调用
                'strategy' => OrderStrategy::class,

                // 默认可用的发送网关
                'gateways' => [
                    'yuntongxun',
                ],
            ],
            // 可用的网关配置
            'gateways' => [
                'errorlog' => [
                    'file' => '/tmp/easy-sms.log',
                ],
                'yuntongxun' => [
                    'app_id' => env('YUN_AppID'),
                    'account_sid' => env('YUN_ACCOUNT_SID'),
                    'account_token' => env('YUN_AUTH_TOKEN'),
                    'is_sub_account' => false,
                ],
            ],
        ];
    }


}


