<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Test
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereInApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereInPc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test wherePcBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Test extends Model
{

     protected $fillable = ['name','title','in_pc','in_app','pc_banner','bg_color','is_show',];





}