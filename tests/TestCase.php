<?php

use App\Providers\AuthServiceProvider;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function initiateSeeds()
    {
        $this->artisan('db:seed');
        (new AuthServiceProvider($this->app))->reloadPermissionsFromDatabase();//由于权限是在service启动时就绑定了，更新数据库并未重新绑定权限。此处必须重新加载数据库中的权限。
    }
}
