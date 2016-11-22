<?php

namespace App\Business\Position;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\Position\Position
 *
 * @property integer $id
 * @property integer $user_id 关联的user表记录。
 * @property float $latitude 经度。
 * @property float $longitude 纬度。
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereLatitude($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereLongitude($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Position\Position whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Position extends Model
{
    //
}
