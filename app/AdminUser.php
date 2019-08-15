<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\AdminUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser query()
 * @mixin \Eloquent
 * @property int $user_id
 * @property string $user_name
 * @property string $password
 * @property string $email
 * @property string $action_list
 * @property int|null $role_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereActionList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereUserName($value)
 * @property int $sex 性别：男：1  女：0
 * @property string $portrait
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser wherePortrait($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminUser whereSex($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AdminRole[] $adminRole
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AdminRole[] $adminRoleS
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AdminUserRole[] $adminUserRole
 */
class AdminUser extends Authenticatable
{
    public $table = 'admin_user';
    public $primaryKey = 'user_id';
    public $guarded = [];
    //加上下面这一句，相当于把$rememberTokenName清空，
    protected $rememberTokenName = '';

    //一对多关联
    public function adminUserRole()
    {
        return $this->hasMany(AdminUserRole::class,'user_id','user_id');
    }

    //多对多关联
    public function adminRole()
    {
        return $this->belongsToMany(AdminRole::class,'admin_user_roles','user_id','role_id')->withTimestamps();
    }


    //远层的一对多（可能有问题）
    public function adminRoleS()
    {
        //参数说明：目标表，中间表，
        return $this->hasManyThrough(
            AdminRole::class, //目标表
            AdminUserRole::class, //中间表
            'user_id',
            'id',//AdminRole 表的 主键
            'user_id',
            'role_id' //AdminUserRole 表的 外键
        )->select('role_id');
    }

    //多态关联（暂时不考虑用）

}
