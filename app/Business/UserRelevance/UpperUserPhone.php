<?php

namespace App\Business\UserRelevance;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Business\UserRelevance\UpperUserPhone
 *
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $user_id
 * @property string $upper_user_phone
 * @property string $remark
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereUpperUserPhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereRemark($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\UserRelevance\UpperUserPhone whereUpdatedAt($value)
 */
class UpperUserPhone extends Model
{
    protected $guarded = [];
}
