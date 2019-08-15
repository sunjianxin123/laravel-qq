<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Activity
 *
 * @property int $id
 * @property string $name 模板名称
 * @property string $title 活动标题
 * @property string $in_pc 是否是PC活动 T是;F否
 * @property string $in_app 是否是APP活动 T是;F否
 * @property string $pc_banner PC活动banner
 * @property string $bg_color 背景颜色
 * @property string $is_show 是否显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereInApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereInPc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity wherePcBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{

     protected $fillable = ['name','title','in_pc','in_app','pc_banner','bg_color','is_show',];





}