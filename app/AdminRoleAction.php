<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AdminRoleAction
 *
 * @property int $id
 * @property int $role_id
 * @property int $action_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction whereActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AdminRoleAction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminRoleAction extends Model
{
    protected $guarded = [];
}
