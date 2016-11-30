<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Business\Bean\BeanRate;
use App\Events\InterfaceCalled\V1\Learn;
use App\Http\Requests\ThirdPartyInterfaces\V1\LearnRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnInterfaceController extends Controller
{
    /**
     * @var User
     */
    protected $target_user;

    /**
     * @var integer
     */
    protected $chance_remains_today;

    /**
     * @api            {post} /v1/learn 用户参与学习
     * @apiName        learn
     * @apiDescription 用户参与学习，通过此接口上报给用户中心，用户中心依据策略给该用户发放迈豆，并且将学习行为纳入统计。学习返迈豆每日有次数限制。正常情况下每次用户学习（不管是否达到返迈豆的限制）都应该调用此接口。
     * @apiGroup       v1
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
            $this->addBeanForUser($request)
                ->dumpToStatisticsDatabase($request);
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

    /**
     * @param LearnRequest $request
     * @return $this
     */
    protected function addBeanForUser($request)
    {
        $this->target_user = $request->getTargetUser();
        $key = 'LEARN-' . Carbon::today()->format('Ymd') . '-' . $this->target_user->id;
        if (!\Cache::has($key)) {
            \Cache::put($key, 0, Carbon::now()->addDays(2));
        }
        if (($learn_count_today = \Cache::increment($key)) <= 5) {
            //每日学习最多给5次迈豆，如果超过就跳过。此处increment在redis中是原子操作，在其它cache driver下可能非原子。和前一行的条件判断，在多线程下也可能导致同步问题。这里最好用redis的事务加锁。由于目前服务器环境是否能装redis还没确定，这里暂时先这么处理。
            $this->target_user->modifyBeanAccordingToBeanRate(BeanRate::where('name_en', 'ohmate_learn')->firstOrFail());
        }

        $chance_remains_today = 5 - $learn_count_today;
        $this->chance_remains_today = $chance_remains_today > 0 ? $chance_remains_today : 0;

        return $this;
    }

    /**
     * @param LearnRequest $request
     * @return $this
     */
    protected function dumpToStatisticsDatabase($request)
    {
        return $this;
    }

}
