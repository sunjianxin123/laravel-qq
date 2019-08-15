<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminUserRole
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $role_id 角色id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereUserId($value)
 * @mixin \Eloquent
 * @property float|null $money 费用
 * @property-read \App\AdminUser $adminUser
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUserRole whereMoney($value)
 */
class AdminUserRole extends Model
{
    protected $guarded = [];

    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class,'user_id','user_id')->withDefault(function ($adminUser){
            $adminUser->user_name = '孙建新';
            $adminUser->email = '1092248853@qq.com';
        });
    }
}
