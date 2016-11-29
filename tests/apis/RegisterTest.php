<?php

use App\Providers\AuthServiceProvider;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;


    /**
     * @test
     */
    public function userRegisterSucceed()
    {
        echo 'Test register interface. ...... ';
        $this->artisan('db:seed');
        (new AuthServiceProvider($this->app))->reloadPermissionsFromDatabase();//由于权限是在service启动时就绑定了，更新数据库并未重新绑定权限。此处必须重新加载数据库中的权限。

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
