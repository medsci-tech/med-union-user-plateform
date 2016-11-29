<?php

use App\Business\Enterprise\Enterprise;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EnterpriseTest extends TestCase
{
    use DatabaseTransactions;

     /**
      * @test
      */
     public function enterprisesGeneratedSuccsessfully()
     {
         echo 'Test enterprises ...... ';

         factory(Enterprise::class, 5)->create();
         $this->assertEquals(Enterprise::count(), 5);

         factory(Enterprise::class, 5)->create();
         $this->assertEquals(Enterprise::count(), 10);

         echo 'OK'.PHP_EOL;
     }
}
