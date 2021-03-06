<?php

namespace App\Providers;

use App\Core\Authorization\Permission\Permission;
use App\User;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use PDOException;

Passport::tokensCan([
    'basic' => '调用基础接口',
    'register' => '调用注册接口',
    'authenticate' => '检测用户认证信息接口',
    'learn' => '学习返迈豆接口',
    'consume' => '迈豆消费接口',
    'query-user-information' => '调用查询用户基本信息接口',
    'query-user-beans-log' => '调用查询用户迈豆记录接口',
    'update-user' => '调用更新用户信息接口',
    'modify-bean' => '调用更新用户迈豆接口',
    'air-classes' => '调用空课接口群'
]);

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->generatePassport();
        $this->definePermissions();
    }

    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }

    protected function definePermissions()
    {
        try {
            foreach ($this->getPermissions() as $permission) {
                \Gate::define($permission->name, function (User $user) use ($permission) {
                    return $user->hasRole($permission->roles());
                });
            }
        } catch (QueryException $e) {
            $this->logErrorMessageToConsole();
        } catch (PDOException $e) {
            $this->logErrorMessageToConsole();
        }
    }

    public function reloadPermissionsFromDatabase()
    {
        $this->definePermissions();
    }


    protected function generatePassport()
    {
        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }

    protected function logErrorMessageToConsole()
    {
        if (app()->environment('local')) {
            echo "Permissions system not work properly, because database not setup correctly. " . PHP_EOL;
            echo "Maybe you have forgot to run the migration command, unless you're now doing this." . PHP_EOL;
            echo "Ignored." . PHP_EOL;
        }
    }
}
