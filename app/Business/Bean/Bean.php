<?php

namespace App\Business\Bean;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Bean\Bean
 *
 * @property integer $id
 * @property integer $user_id 关联的user
 * @property float $number 迈豆数量
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\Bean whereDeletedAt($value)
 * @mixin \Eloquent
 */
class Bean extends Model
{
    use SoftDeletes;

    protected $guarded = [];
}
