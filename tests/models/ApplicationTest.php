<?php

use App\Business\Application\Application;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class ApplicationTest
 */
class ApplicationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function applicationsGeneratedSuccessfully()
    {
        echo 'Test application ...... ';

        factory(Application::class, 5)->create();
        $this->assertEquals(Application::count(), 5);
        factory(Application::class, 5)->create();
        $this->assertEquals(Application::count(), 10);

        echo 'OK'.PHP_EOL;
    }

}
