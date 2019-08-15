<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminRole
 *
 * @property int $id
 * @property string $name 角色名称
 * @property string $note 备注
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AdminRoleAction[] $AdminRoleAction
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRole name($name)
 */
class AdminRole extends Model
{
    protected $guarded = [];

    public function AdminRoleAction()
    {
        return $this->hasMany(AdminRoleAction::class,'role_id','id');
    }

    public function scopeName($query,$name)
    {
        return $query->where('name','like',"%$name%");
    }
}
