<?php

namespace App\Business\Log;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\Token;

/**
 * App\Business\Log\InterfaceLog
 *
 * @property integer $id
 * @property string $token_id
 * @property string $request_method 请求方式，get or post
 * @property string $request_url 请求地址
 * @property string $request_content 请求内容
 * @property boolean $succeed 接口调用成功标识，初始是0，调用结束返回时置1
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * @property-read \Laravel\Passport\Token $token
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereTokenId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereRequestMethod($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereRequestUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereRequestContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereSucceed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Business\Log\InterfaceLog whereDeletedAt($value)
 * @mixin \Eloquent
 */
class InterfaceLog extends Model
{
    use SoftDeletes;

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}
