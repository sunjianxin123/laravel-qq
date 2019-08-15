<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/27
 * Time: 10:43
 */
namespace App\Observer;
use App\Link;
use App\Log;
use Ramsey\Uuid\Uuid;

//观察者类
class LinkObserver{
    /**
     * 监听link更新事件
     * @param Link $link
     */
    public function updated(Link $link)
    {
        if ($link->isDirty('url')){
            $log = new Log();
            $log->note = Uuid::uuid4()->toString().$link->name.'修改了url';
            $log->save();
        }
    }


}