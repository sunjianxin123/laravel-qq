<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Attribute
 *
 * @property int $id
 * @property int $cat_id 分类id
 * @property string $attr_name 属性名称
 * @property string $is_show 是否显示，T为true显示,F为false不显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereAttrName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Attribute whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Attribute extends Model
{

     protected $fillable = ['cat_id','attr_name','is_show',];





}