<?php

use App\Business\Project\Project;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;
     /**
      * @test
      */
     public function projectsGeneratedSuccessfully()
     {

         echo 'Test projects ...... ';

         factory(Project::class, 5)->create();
         $this->assertEquals(Project::count(), 5);

         factory(Project::class, 5)->create();
         $this->assertEquals(Project::count(),10);

         echo 'OK'.PHP_EOL;
     }
}
