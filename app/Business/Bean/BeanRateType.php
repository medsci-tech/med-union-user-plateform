<?php

namespace App\Business\Bean;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\Bean\BeanRateType
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property string $name 规则类型
 * @property string $name_en 规则类型英文名，用于检索
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRateType whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRateType whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRateType whereNameEn($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRateType whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Bean\BeanRateType whereUpdatedAt($value)
 */
class BeanRateType extends Model
{
    //
}
