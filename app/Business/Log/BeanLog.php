<?php

namespace App\Business\Log;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Business\Log\BeanLog
 *
 * @property integer $id
 * @property integer $user_id 关联的user
 * @property integer $bean_rate_id 关联的bean_rate
 * @property float $beans_before 操作前用户的迈豆
 * @property float $beans_after 操作后用户的迈豆
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereBeanRateId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereBeansBefore($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereBeansAfter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\BeanLog whereDeletedAt($value)
 * @mixin \Eloquent
 */
class BeanLog extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
