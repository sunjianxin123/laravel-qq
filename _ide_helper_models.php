<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
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
 */
	class AdminAction extends \Eloquent {}
}

namespace App{
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
 */
	class AdminRole extends \Eloquent {}
}

namespace App{
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
	class AdminRoleAction extends \Eloquent {}
}

namespace App{
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
 */
	class AdminUser extends \Eloquent {}
}

namespace App{
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
 */
	class AdminUserRole extends \Eloquent {}
}

namespace App{
/**
 * App\Link
 *
 * @property string $is_show
 * @property int $id
 * @property string $name 名称
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Link whereUrl($value)
 * @mixin \Eloquent
 */
	class Link extends \Eloquent {}
}

namespace App{
/**
 * App\Log
 *
 * @property int $id
 * @property string $note 备注记录
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Log whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Log extends \Eloquent {}
}

namespace App{
/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUserId($value)
 * @mixin \Eloquent
 */
	class Post extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

