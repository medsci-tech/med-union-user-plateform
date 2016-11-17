<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Http\Requests\ThirdPartyInterfaces\TestConnectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestConnectionInterfaceController extends Controller
{
    /**
     * @apiDefine Header
     * @apiHeader {String="application/json"} Accept
     * @apiHeader {String="Bearer [token]"} Authorization
     * @apiHeader {String="application/x-www-form-urlencoded; charset=utf-8"} ContentType
     * @apiHeaderExample {json} Header-Example:
     *     {
     *       "Accept": "application/json",
     *       "Authorization": "Bearer [token]",
     *       "Content-Type": "application/x-www-form-urlencoded; charset=utf-8"
     *     }
     *
     */
    /**
     * @apiDefine Unauthorized
     * @apiErrorExample {json} Error-401:
     *     HTTP/1.1 401 Unauthorized
     *     {
     *       "error":"Unauthenticated."
     *     }
     */

    /**
     * @apiDefine Forbidden
     * @apiErrorExample {text} Error-403:
     *     HTTP/1.1 403 Forbidden
     *     Forbidden
     */


    /**
     * @api            {get} /v1/test 测试接入
     * @apiName        test
     * @apiDescription 测试接入是否成功。
     * @apiGroup       Connection
     * @apiVersion     1.0.0
     *
     * @apiExample {curl} Example usage:
     *     curl -X "POST" "https://med-union-user-plateform.dev/api/v1/test" \
     * -H "Accept: application/json" \
     * -H "Authorization: Bearer [token]" \
     * -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *
     * @apiUse Header
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "message": "接入成功！欢迎使用迈德api！"
     *     }
     *
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     * @param \App\Http\Requests\ThirdPartyInterfaces\TestConnectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(TestConnectionRequest $request)
    {
        return $request->handle();
    }
}
