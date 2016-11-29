<?php

use App\Business\Application\Application;
use App\Business\Bean\BeanRate;
use App\Business\Project\Project;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InitialSeederTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function initialSeederWorks()
    {
        echo 'Test initial seeder ...... ';

        $this->artisan('db:seed');

        $this->assertNotNull(Project::first());
        $this->assertNotNull(BeanRate::first());
        $this->assertNotNull(Application::first());

        echo 'OK!'.PHP_EOL;
    }
}
