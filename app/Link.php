<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Link extends Model
{
    protected $table = 'link';
}
