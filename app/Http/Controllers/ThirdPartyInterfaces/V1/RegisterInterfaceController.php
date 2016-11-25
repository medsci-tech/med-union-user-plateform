<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Business\Statistic\User\User;
use App\Events\InterfaceCalled\Register;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\Http\Requests\ThirdPartyInterfaces\V1\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\UTCDateTime;

class RegisterInterfaceController extends Controller
{
    /**
     * @api            {post} /v1/register 用户注册
     * @apiName        register
     * @apiDescription 根据请求内容为用户注册。注册成功后，会在数据库中生成用户记录。
     * @apiGroup       User
     * @apiVersion     1.0.0
     *
     * @apiUse Header
     *
     * @apiExample {curl} Example usage:
     *     curl -X "POST" "https://med-union-user-plateform.dev/api/v1/register" \
     *          -H "Accept: application/json" \
     *          -H "Authorization: Bearer [token]" \
     *          -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *          --data-urlencode "phone=18671616266"
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。
     * @apiParam {String} name 姓名。选填。
     * @apiParam {String} password 密码。选填。
     * @apiParam {String} email 用户的电子邮箱密码，用作后台登录，选填。唯一。
     * @apiParam {String} unionid 用户的unionid。选填。唯一。
     * @apiParam {String} role 用户的角色，请依据预定义角色填写。选填。
     * @apiParam {String} title 用户的职称。选填。
     * @apiParam {String} office 用户的科室。选填。
     * @apiParam {String} province 用户的省份。选填。
     * @apiParam {String} city 用户的城市。选填。
     * @apiParam {String} hospital_name 用户的医院名称。选填。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *       "name": "张三",
     *       "password": "123456",
     *       "email": "abc@foxmail.com",
     *       "unionid": "QWERTYUADFAFALDKFJLKJOIAFJLJDSKJFADAFA"
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".仅当项目迈豆不足时显示"warning"。此时只会注册，不会发放迈豆。
     * @apiSuccess {Number} user_id 创建用户的id
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "user_id": 1
     *     }
     *
     * @apiErrorExample {json} Error-422:
     *     HTTP/1.1 422 Unprocessable Entity
     *     {
     *       "phone": [
     *          "电话 不能为空。"
     *       ]
     *     }
     * @apiErrorExample {json} Error-422:
     *     HTTP/1.1 422 Unprocessable Entity
     *     {
     *       "password": [
     *          "密码 不能为空。"
     *       ]
     *     }
     *
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(RegisterRequest $request)
    {
        $event = new Register($request);
        try {
            event($event);
            return response()->json([
                'status' => 'ok',
                'user_id' => $event->user->id
            ]);
        } catch (BeansNotEnoughForProjectException $e) {
            return response()->json([
                'status' => 'warning',
                'user_id' => $event->user->id,
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => '未知错误，请联系管理员'
            ], 500);
        }
    }


    public function mongo()
    {
//        echo(new UTCDateTime(Carbon::now()->timestamp));
//        dd();
//        $create_time = User::where('phone', '18699999999')->first()->create_time;
//        dd($create_time);
//        $user = User::create([
//            'phone' => '18699999999',
//            'create_time' => new UTCDateTime(Carbon::now()->micro),
//            'role' => 'user',
//            'total_beans' => 1000,
//            'optimizing_health_mate_wechat_2016' => [
//                'year' => 2016,
//                'access_way' => 'wechat',
//                'create_time' => new UTCDateTime(Carbon::now()->timestamp * 1000),
//                'upstream_phone' => '18688888888'
//            ]
//        ]);
//
//        dd($user);
    }
}
