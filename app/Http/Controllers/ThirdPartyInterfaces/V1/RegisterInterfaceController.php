<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * -H "Accept: application/json" \
     * -H "Authorization: Bearer [token]" \
     * -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *
     * @apiParam {String} phone 用户的手机号码。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678"
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".
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
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     * @param \App\Http\Requests\ThirdPartyInterfaces\RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(RegisterRequest $request)
    {
        return $request->handle();
    }
}
