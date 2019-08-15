<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ActivityTemplate
 *
 * @property int $id
 * @property string $name 模板名称
 * @property string $title 活动标题
 * @property string $in_pc 是否是PC活动 T是;F否
 * @property string $in_app 是否是APP活动 T是;F否
 * @property string $pc_banner PC活动banner
 * @property string $app_banner
 * @property string $bg_color
 * @property string $is_show
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereAppBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereInApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereInPc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate wherePcBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActivityTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ActivityTemplate extends Model
{

     protected $fillable = ['name','title','in_pc','in_app','pc_banner','app_banner','bg_color','is_show',];





}