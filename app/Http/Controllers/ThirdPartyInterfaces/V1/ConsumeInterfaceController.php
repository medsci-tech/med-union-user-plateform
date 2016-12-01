<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Business\Bean\BeanRate;
use App\Http\Requests\ThirdPartyInterfaces\V1\ConsumeRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumeInterfaceController extends Controller
{
    /**
     * @var User
     */
    protected $target_user;

    /**
     * @api            {post} /v1/consume 消费
     * @apiName        consume
     * @apiDescription 用户消费迈豆接口。调用此接口，传入消费迈豆数值，为用户扣减迈豆。
     * @apiGroup       ohmate
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
     *       "cash_paid_by_beans": 100
     *       "cash_paid": 100
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
        try {
            $this->modifyBeanForUser($request)
                ->dumpToStatisticsDatabase($request);
            return response()->json([
                'status' => 'ok',
                'bean_rest' => $this->target_user->bean->number
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param ConsumeRequest $request
     * @return $this
     */
    protected function modifyBeanForUser($request)
    {
        $this->target_user = $request->getTargetUser();
        $this->target_user->modifyBeanAccordingToBeanRate(BeanRate::where('name_en', 'ohmate_consume')->firstOrFail(), $request->input('cash_paid_by_beans', 0));

        if (($cash_paid = $request->input('cash_paid')) > 0 && $this->target_user->hasUpperUser()) {
            $upper = $this->target_user->upperUser();

            $upper->modifyBeanAccordingToBeanRate(
                BeanRate::where('name_en', 'ohmate_cash_consume_upper_feedback')->firstOrFail(),
                $cash_paid
            );

        }
        return $this;
    }

    /**
     * @param ConsumeRequest $request
     * @return $this
     */
    protected function dumpToStatisticsDatabase($request)
    {
        return $this;
    }

}
