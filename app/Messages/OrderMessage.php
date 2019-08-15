<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/26
 * Time: 18:24
 */
namespace App\Messages;
use Overtrue\EasySms\Message;
use Overtrue\EasySms\Contracts\GatewayInterface;

class OrderMessage extends Message
{
    protected $message;
    protected $time=5;
    public function __construct($captcha)
    {
        $this->message = [$captcha,$this->time];
    }


    // 定义使用模板发送方式平台所需要的模板 ID  测试为1
    public function getTemplate(GatewayInterface $gateway = null)
    {
        return env('YUN_TEMPLATE_ID');
    }

    // 模板参数
    public function getData(GatewayInterface $gateway = null)
    {
        return $this->message;
    }
}

