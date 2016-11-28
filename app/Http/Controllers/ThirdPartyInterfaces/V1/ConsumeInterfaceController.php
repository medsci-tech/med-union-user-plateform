<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\Consume;
use App\Http\Requests\ThirdPartyInterfaces\V1\ConsumeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumeInterfaceController extends Controller
{
    /**
     * @api            {post} /v1/consume 消费
     * @apiName        consume
     * @apiDescription 用户消费迈豆接口。调用此接口，传入消费迈豆数值，为用户扣减迈豆。
     * @apiGroup       User
     * @apiVersion     1.0.0
     *
     * @apiUse Header
     *
     * @apiExample {curl} Example usage:
     *     curl -X "POST" "https://med-union-user-plateform.dev/api/v1/consume" \
     *          -H "Accept: application/json" \
     *          -H "Authorization: Bearer [token]" \
     *          -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *          --data-urlencode "phone=18671616266"
     *          --data-urlencode "multiplicant=100"
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。
     * @apiParam {Number} cash_paid_by_beans 迈豆抵扣的人民币数额。
     * @apiParam {Number} cash_paid 实际支付的人民币数额。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *       "multiplicant": 100
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".
     * @apiSuccess {Number} bean_rest 剩余迈豆数。
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "bean_rest": 1000
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
     *       "phone": [
     *          "电话 不存在。"
     *       ]
     *     }
     * @apiErrorExample {json} Error-500
     *     HTTP/1.1 500 Internal Server Error
     *     {
     *       "message": "用户迈豆不足",
     *       "status": "error"
     *     }
     *
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     *
     * @param ConsumeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(ConsumeRequest $request)
    {
        $event = new Consume($request);

        try {
            event($event);
            return response()->json([
                'status' => 'ok',
                'bean_rest' => $event->user->bean->number
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
