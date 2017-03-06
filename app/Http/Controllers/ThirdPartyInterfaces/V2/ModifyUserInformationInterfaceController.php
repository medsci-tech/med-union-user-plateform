<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V2;

use App\Business\Profile\Profile;
use App\Http\Requests\ThirdPartyInterfaces\V2\ModifyUserInformationRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModifyUserInformationInterfaceController extends Controller
{

    /**
     * @var User
     */
    protected $target_user;

    /**
     * @api            {get} /v2/modify-user-information 修改用户信息
     * @apiName        modify-user-information
     * @apiDescription 查询用户信息接口。
     * @apiGroup       air-classes
     * @apiVersion     1.0.0
     *
     * @apiUse Header
     *
     * @apiExample {curl} Example usage:
     *     curl -X "GET" "https://med-union-user-plateform.dev/api/v2/modify-user-information" \
     *          -H "Accept: application/json" \
     *          -H "Authorization: Bearer [token]" \
     *          -H "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
     *          --data-urlencode "phone=18671616266"
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。必须存在于库中。
     * @apiParam {String} name 姓名。选填。
     * @apiParam {String} password 密码。选填。
     * @apiParam {String} email 用户的电子邮箱密码，用作后台登录，选填。唯一。
     * @apiParam {String} unionid 用户的unionid。选填。唯一。
     * @apiParam {String} role 用户的角色，请依据预定义角色填写。选填。
     * @apiParam {String} remark 用户的备注。选填。
     * @apiParam {String} extra 用户的额外信息。选填。一般为json字符串，用来提供的某些在接口参数列表里没有出现的字段，会直接写入数据库。
     * @apiParam {String} title 用户的职称。选填。
     * @apiParam {String} office 用户的科室。选填。
     * @apiParam {String} province 用户的省份。选填。
     * @apiParam {String} city 用户的城市。选填。
     * @apiParam {String} hospital_name 用户的医院名称。选填。
     * @apiParam {String} upper_user_phone 用户的上级用户电话，依据此建立关联关系。选填。
     * @apiParam {String} upper_user_remark 用户的上级用户备注。选填。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *       "name": "张三",
     *       "password": "123456",
     *       "email": "abc@foxmail.com",
     *       "unionid": "QWERTYUADFAFALDKFJLKJOIAFJLJDSKJFADAFA"
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里成功时总是显示"ok".
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
     *
     * @apiUse Unauthorized
     * @apiUse Forbidden
     *
     *
     * @param ModifyUserInformationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(ModifyUserInformationRequest $request)
    {
        try {
            $this->modifyUserInformation($request);
            return response()->json([
                'status' => 'ok',
                'user_id' => $this->target_user->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param ModifyUserInformationRequest $request
     * @return $this
     */
    protected function modifyUserInformation($request)
    {
        $this->target_user = User::where('phone', $request->input('phone'))->firstOrFail();
        $this->target_user->update($request->only(['name', 'email', 'openid', 'unionid', 'remark']));
        $this->target_user->profile()->updateOrCreate($request->only(['role', 'title', 'office', 'province', 'city', 'hospital_name', 'extra']));

        return $this;
    }
}
