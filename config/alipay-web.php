<?php
/**
 * Created by PhpStorm.
 * User: luojinyi
 * Date: 2017/6/26
 * Time: 下午5:21
 */

return [
    //应用ID,您的APPID。
    'app_id' => "2016080600177247",

    //商户私钥 不能用pkcs8.pem中的密钥！！！！！
    'merchant_private_key' => "MIIEpQIBAAKCAQEA6JKGKPapcOQm1YkwXiSuTwHJQS6dmeAsR1XMj/2v9KpqwmALJCVVI9xruwMRxbm8eagqr8V+ZEqhHKaRuq4jMFN8t5VJ/HDjySMzsxshM8O59giyOpGdSvMQ2D22D6mc+WR8jg/r/cPtOchqFk33xRizP9U75Y9pV3uBUCkhiosLrcT6mO21kpnvEyJE4q9iFd9FO6fv3WteFQZg2krP775rlHzWCSN7PAcBf4ZSbdynxoL0wpe8bWHUEA+U4DPXA5ovn9hhJv1jff/6IsuGoTAfMCwmeEB1RJ0fK5knPtP1FFF+g+Q06ULiKK0N04FD4Wo1k0uTs70l3IATlZASbQIDAQABAoIBAQCtQWp8XbTAitZ7QSYtG/pWlSgOTOHPXfbedYZcxkosZD//6XijRsR0YKJIwPKeb81+e87A/sk3gXkgVN4/SbahK7C/OpHRY2/tyTGcfdtwKqEALl5Hz250BTtJPD/Cz0JHb5pyYl4Vv72bzDdrwk2QIOR36ywhyYJaT4F37Aw2ng9YzjOIrHT9+IvQUZNmo44oX/y8cfD8ILu/Di4QVFYxh4ehvdcUHXUsbQJbBXkD14obcdxw9/TBViSi60PPREDKjye/Xfuwln8mox2EiELuH7MHnB7urM9w3Nfw0C2dE78junUuGlkMahNrZvMKHS98gEiCL2s1/vHCoKC/BnCpAoGBAPVklfsjubpWHFCFzGYIC2MN1Di3CAeT513N79rHHtQ1xLvrozP+Mx8vUmMlZROoSC0FjbDRi1oKaxEJFvFXFsMrmdcWZCBZmnsgfUz/LG9tiVoQAooFpy8G4UYwXzrKsX9/lPBqe4PoF+8TSjvcbink20W/GNfwAEi8BOmuoBnbAoGBAPKgEkWh+6AnX0VYMKyhXZz/pGqjJiJqqrBF3IOLejmBq/MrL6+E086XD4GF31LA1kE0vEzZ7BtHBYnLL1iXmI1SYBSsHYT8e5sp+b7qpXWH7soJhoC3NN7ZzQrL+IuD2PxXuY++JyQjXudEcIjy03/ewVp4Mgiza0aOQf3ORqtXAoGAAiU//nMgg5WPJ9ETqWy2lMYhLeHDyzUq17IeP75v8ZEKyE3WHnVBgytJwB4qlRJqlyIuS/Z5Dm964io/LhsB0vEFplDGzVWbOSpejhbJD6xYgBYVv5kvDgU0YQW5P21YQfIenj+AFvYnh2qWwpE50Vnz5Nc342NwzTH/pP9m3PMCgYEAmWO7yYwcAeeCYtvbgfhOr8grUUOuA0o+eUzhmcSfVCX36Ldf4W5vXgfAxNk3FCFYE0dc2JVZoPEovjHX0AGfb5Epr0gVLZNWLgW+oAXG72QuAks9Xrj00wMNj4reqo2DrB1l8kt8gWtfP4TURLCIKCpTQXgF4dxUsPmVHPnBUecCgYEA4sUjFIS7X7lO6vYPlxISv3AOwZXVEtnrGxTi+dEEXAYq+JGzpOyaprJP45W1R2vt06Bt02bmurBBNgyXgDhe1iLAU9mRx3IeNgE2Ujn+FqDY8MCrI+e52BwOUEM6hNtQ8Syu+C5oGAvgM6Ni3OfWg7zUmRQrfS7A1F62HO4IPkc=",

    //异步通知地址
    'notify_url' => "http://外网可访问网关地址/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",

    //同步跳转
    'return_url' => "http://socialite.cn/returnUrl",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type' => "RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzmGfBHW1uscaXrPveKuPKALA7F3ruUNxkVXYr/yWC8t6EyK9DabWC9zrIefmK8grVi638sEqoII4xHc1ItRPKbfUEZ9XvQ0VBIQQ4xKxcEL9RqlcHjAeqR1fUpjXDe7RtG3tRZkky9olBxY5wvfxDmCMokNrLBir2KzuPtPmNmJHVIY3fEmOokAW735prf0UzkgrPYIPHejsv0YpbK9SzMM9HFTC72bKZCMDH+Mmyu7p+8W0VO0So4z1Dw3a1qz84izJ6wRkCajnfjFUEH+vxk/RpJq6gJ3eUKcnM/VdI+/9jAhUJ61dfS4nIwznV4PIv0GfE1q0mLPYDuEG0BQ7xQIDAQAB",

    //支付时提交方式 true 为表单提交方式成功后跳转到return_url,
    //false 时为Curl方式 返回支付宝支付页面址址 自己跳转上去 支付成功不会跳转到return_url上， 我也不知道为什么，有人发现可以跳转请告诉 我一下 谢谢
    // email: 40281612@qq.com
    'trade_pay_type' => true,
];