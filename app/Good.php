<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Good
 *
 * @property int $id
 * @property string $name 商品名称
 * @property string $desc 商品描述
 * @property float $price 商品价格
 * @property string $is_show 是否显示：T显示，F不显示
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Good whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Good extends Model
{

     protected $fillable = ['name','desc','price','is_show',];





}