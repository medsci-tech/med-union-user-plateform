<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\Learn;
use App\Http\Requests\ThirdPartyInterfaces\V1\LearnRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnInterfaceController extends Controller
{
    /**
     * @api            {post} /v1/register 用户参与学习
     * @apiName        register
     * @apiDescription 用户参与学习，通过此接口上报给用户中心，用户中心依据策略给该用户发放迈豆，并且将学习行为纳入统计。学习返迈豆每日有次数限制。正常情况下每次用户学习（不管是否达到返迈豆的限制）都应该调用此接口。
     * @apiGroup       User
     * @apiVersion     1.0.0
     *
     * @apiUse Header
     *
     * @apiExample {curl} Example usage:
     *     curl -X "POST" "https://med-union-user-plateform.dev/api/v1/learn" \
     *          -H "Accept: application/json" \
     *          -H "Authorization: Bearer [token]" \
     *          -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *          --data-urlencode "phone=18671616266"
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".仅当项目迈豆不足时显示"warning"。
     * @apiSuccess {Number} chance_remains_today 今天通过此接口还能获得几次迈豆。当显示0时，如果你再次为当前用户调用此接口，则不会获得迈豆。
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "chance_remains_today": 4
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
     *
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     *
     * @param LearnRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(LearnRequest $request)
    {
        $event = new Learn($request);

        try {
            event($event);
            return response()->json([
                'status' => 'ok',
                'chance_remains_today' => $event->chance_remains_today
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
