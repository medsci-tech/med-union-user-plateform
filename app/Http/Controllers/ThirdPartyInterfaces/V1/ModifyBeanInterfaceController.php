<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Business\Bean\BeanRate;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\Http\Requests\ThirdPartyInterfaces\V1\ModifyBeanRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModifyBeanInterfaceController extends Controller
{

    /**
     * @var User
     */
    protected $target_user;

    /**
     * @api            {post} /v1/modify-bean 修改用户迈豆
     * @apiName        modify-bean
     * @apiDescription 为用户修改迈豆，计为易康伴侣推广行为发放的迈豆。
     * @apiGroup       ohmate
     * @apiVersion     1.0.0
     *
     * @apiUse Header
     *
     * @apiExample {curl} Example usage:
     *     curl -X "POST" "https://med-union-user-plateform.dev/api/v1/modify-bean" \
     *          -H "Accept: application/json" \
     *          -H "Authorization: Bearer [token]" \
     *          -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *          --data-urlencode "phone=18671616266"
     *          --data-urlencode "bean=1000"
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。
     * @apiParam {Number} bean 迈豆数量，目前只允许1-1000000之间的值。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *       "bean": 1000
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".仅当项目迈豆不足时显示"warning"。此时只会注册，不会发放迈豆。
     * @apiSuccess {Number} beans_after 修改后用户迈豆
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "beans_after": 1000
     *     }
     *
     * @apiErrorExample {json} Error-422:
     *     HTTP/1.1 422 Unprocessable Entity
     *     {
     *       "phone": [
     *          "电话 不能为空。"
     *       ]
     *     }
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     *
     * @param ModifyBeanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(ModifyBeanRequest $request)
    {
        try {
            $this->target_user = User::where('phone', $request->input('phone'))->firstOrFail();
            $bean = $request->input('bean', 0);
            $this->updateBeanForUser($this->target_user, $bean);

            return response()->json([
                'status' => 'ok',
                'beans_after' => $this->target_user->bean_number
            ]);
        } catch (BeansNotEnoughForProjectException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => '未知错误，请联系管理员'
            ], 500);
        }
    }

    /**
     * @param User $user
     * @param float $bean
     */
    protected function updateBeanForUser($user, $bean)
    {
        $user->modifyBeanAccordingToBeanRate(BeanRate::where('name_en', 'ohmate_popularize')->firstOrFail(), $bean);
    }
}
