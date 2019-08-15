<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
class Log extends Model
{
    public $table='log';
}
