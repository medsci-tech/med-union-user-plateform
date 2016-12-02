<?php

namespace App\Http\Controllers\ThirdPartyInterfaces\V1;

use App\Business\Bean\Bean;
use App\Business\Bean\BeanRate;
use App\Business\Profile\Profile;
use App\Business\Project\Project;
use App\Business\UserRelevance\UpperUserPhone;
use App\Events\Statistics\UserRegistered;
use App\User;
use App\Exceptions\BeansNotEnoughForProjectException;
use App\Http\Requests\ThirdPartyInterfaces\V1\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\UTCDateTime;

class RegisterInterfaceController extends Controller
{
    /**
     * @var User
     */
    protected $target_user;

    /**
     * @api            {post} /v1/register 用户注册
     * @apiName        register
     * @apiDescription 根据请求内容为用户注册。注册成功后，会在数据库中生成用户记录。
     * @apiGroup       ohmate
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
        try {

            $this->createUser($request)
                ->createBeanForUser()
                ->saveUserProfile($request)
                ->saveUpperUserPhoneIfExists($request)
                ->addBeanForUser()
                ->dumpToStatisticsDatabase($request);

            return response()->json([
                'status' => 'ok',
                'user_id' => $this->target_user->id
            ]);
        } catch (BeansNotEnoughForProjectException $e) {
            return response()->json([
                'status' => 'warning',
                'user_id' => $this->target_user->id,
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
     * @param RegisterRequest $request
     * @return $this
     */
    protected function saveUserProfile($request)
    {
        $this->target_user->profile()->save(Profile::create([
            'role'          => $request->input('role', null),
            'title'         => $request->input('title', null),
            'office'        => $request->input('office', null),
            'province'      => $request->input('province', null),
            'city'          => $request->input('city', null),
            'hospital_name' => $request->input('hospital_name', null),
        ]));

        return $this;
    }

    /**
     * @param RegisterRequest $request
     * @return $this
     */
    protected function saveUpperUserPhoneIfExists($request)
    {
        if ($upper_user_phone = $request->input('upper_user_phone', null)) {
            if ($this->target_user->upperUserPhones()->where('phone', $upper_user_phone)->first() == null) {
                $this->target_user->upperUserPhones()->save(
                    UpperUserPhone::create([
                        'phone'  => $upper_user_phone,
                        'remark' => $request->input('upper_user_remark')
                    ])
                );
            }
        }

        return $this;
    }

    /**
     * @param RegisterRequest $request
     * @return $this
     */
    protected function createUser($request)
    {
        $this->target_user = User::create([
            'phone'    => $request->input('phone'),
            'name'     => $request->input('name', null),
            'email'    => $request->input('email', null),
            'openid'   => $request->input('openid', null),
            'unionid'  => $request->input('unionid', null),
            'password' => ($password = $request->input('password', null)) ? bcrypt($password) : null
        ]);

        return $this;
    }


    /**
     * @return $this
     */
    protected function createBeanForUser()
    {
        $this->target_user->bean()->save(
            Bean::create(['number' => 0])
        );

        return $this;
    }

    /**
     * @param RegisterRequest $request
     * @return $this
     */
    protected function dumpToStatisticsDatabase($request)
    {
        event(new UserRegistered($this->target_user, Project::where('name_en', 'optimizing_health_mate_wechat_2016')->firstOrFail()));
        return $this;
    }

    /**
     * @return $this
     */
    protected function addBeanForUser()
    {
        $user = $this->target_user;
        $bean_rate = BeanRate::where('name_en', 'ohmate_wechat_register')->first();

        $user->modifyBeanAccordingToBeanRate($bean_rate);

        return $this;
    }

}
