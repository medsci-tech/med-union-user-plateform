<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Events\InterfaceCalled\V1\QueryUser;
use App\Http\Requests\ThirdPartyInterfaces\V1\QueryUserInformationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueryUserInformationInterfaceController extends Controller
{

    /**
     * @api            {get} /v1/query-user-information 查询用户信息
     * @apiName        query-user-information
     * @apiDescription 查询用户信息接口。
     * @apiGroup       v1
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
     *
     * @apiParam {String} phone 用户的手机号码。必填。唯一。
     * @apiParamExample {json} Request-Example:
     *     {
     *       "phone": "18812345678",
     *     }
     *
     * @apiSuccess {String} status 自定义状态码，这里总是显示"ok".
     * @apiSuccess {Array} result 查询结果，是一个json数组。具体字段见下面的示例。
     * @apiSuccess {Number} result.id 所查询用户id。
     * @apiSuccess {String} result.openid 所查询用户openid。由于要适用多公众平台，该字段可能会在下一版有所调整。
     * @apiSuccess {Number} result.phone 所查询用户电话。
     * @apiSuccess {String} result.name 所查询用户姓名。
     * @apiSuccess {String} result.email 所查询用户email。
     * @apiSuccess {Array} result.profile 所查询用户个人资料，包含字段见下面示例。
     * @apiSuccess {String} result.profile.role 所查询用户id。
     * @apiSuccess {String} result.profile.title 所查询用户职称。
     * @apiSuccess {String} result.profile.office 所查询用户科室。
     * @apiSuccess {String} result.profile.province 所查询用户省份。
     * @apiSuccess {String} result.profile.city 所查询用户城市。
     * @apiSuccess {String} result.profile.hospital_name 所查询用户医院名称。
     * @apiSuccess {Array} result.bean 用户迈豆。
     * @apiSuccess {Number} result.bean.number 用户剩余迈豆数。
     * @apiSuccessExample {json} Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "status": "ok",
     *       "result": {
     *         "id": 15,
     *         "openid": null,
     *         "unionid": null,
     *         "phone": "18671616266",
     *         "name": null,
     *         "email": null,
     *         "profile": {
     *           "role": "主任医师",
     *           "title": null,
     *           "office": null,
     *           "province": null,
     *           "city": null,
     *           "hospital_name": null
     *         },
     *         "bean": {
     *           "number": "6240.00"
     *         }
     *       }
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
     * @param QueryUserInformationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleRequest(QueryUserInformationRequest $request)
    {
        $event = new QueryUser($request);

        try {
            event($event);
            return response()->json([
                'status' => 'ok',
                'result' => $request->getResultSet()
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
