<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminAction
 *
 * @property int $id
 * @property string $name 权限名称
 * @property int $parent_id 父权限id
 * @property string $icon 权限图标
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $sort 权限图标
 * @property string $is_show_left 是否显示在左侧菜单，T是，F否
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereIsShowLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereSort($value)
 * @property string|null $url 链接地址
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminAction whereUrl($value)
 */
class AdminAction extends Model
{
    public $guarded = [];

    /**
     * 获取权限菜单数据
     * @return array
     */
    public function webNav()
    {
       return [];
        $adminUser = AdminUser::whereUserId(user()->user_id)->with('adminRoleS')->first();
        $role_ids=[];
        foreach ($adminUser->adminRoleS as $v){
            $role_ids[] = $v['role_id'];
        }
        $action_ids = [];
        $adminRole = AdminRole::with('AdminRoleAction')->whereIn('id',$role_ids)->get()->map(function ($item)use(&$action_ids){
            if($item->AdminRoleAction){
                $item->AdminRoleAction->map(function ($v)use(&$action_ids){
                    $action_ids[] = $v->action_id;
                });
            }
        });
        if(user()->user_name=='admin'){
            $adminAction = self::whereIsShowLeft('T')->orderByDesc('sort')->get();
        }else{
            $adminAction = self::whereIn('id',$action_ids)->whereIsShowLeft('T')->orderByDesc('sort')->get();
        }
        $data = $this->getLayer($adminAction);
        foreach ($data as $k=>$v){
            if($v['parent_id']!=0 && !$v['child']){
                unset($data[$k]);
            }
        }
        return $data;
    }


    private function getLayer($types, $name = 'child', $pid = 0){
        $arr = array();
        foreach($types as $v){
            if($v['parent_id'] == $pid){
                $v[$name] = $this->getLayer($types, $name, $v['id']);//递归 把子类作为数组值压入数组中
                $arr[] = $v;
            }
        }
        return $arr;
    }

}
