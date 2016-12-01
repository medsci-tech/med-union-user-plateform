<?php

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;
    use WithoutEvents;

    /**
     * @test
     */
    public function userRegisterSucceed()
    {
        echo 'Test register interface. ...... ';
        $this->initiateSeeds();

        $this->actingAs(User::first(), 'api')->json('POST', '/api/v1/register', [
            'phone'         => '18877776666',
            'name'          => '张三',
            'password'      => '123456',
            'email'         => 'zhangsan@test.com',
            'unionid'       => 'oCrLzvynFDS3XZqzSglN9_RVSO3Q',
            'role'          => 'A',
            'title'         => '主任医师',
            'office'        => '科室',
            'province'      => '湖北',
            'city'          => '武汉',
            'hospital_name' => '中心医院'
        ])->seeJson([
            'status'  => 'ok',
        ]);
        $this->seeInDatabase('users', [
            'phone' => '18877776666'
        ]);

        echo 'OK!'.PHP_EOL;
    }
}
