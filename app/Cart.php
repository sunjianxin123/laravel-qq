<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Cart
 *
 * @property int $id
 * @property int $user_id 用户id
 * @property int $goods_id 商品id
 * @property string $goods_sn 商品货号
 * @property string $goods_name
 * @property string $goods_number
 * @property string $is_pay 1选中结算 0未选中不结算
 * @property string $is_invalid 是否失效 F 失效 T 不失效
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereGoodsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereGoodsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereGoodsNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereGoodsSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereIsInvalid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereIsPay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereUserId($value)
 * @mixin \Eloquent
 */
class Cart extends Model
{

     protected $fillable = ['user_id','goods_id','goods_sn','goods_name','goods_number','is_pay','is_invalid',];





}