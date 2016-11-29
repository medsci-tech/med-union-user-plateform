<?php

use App\Business\Contract\Contract;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
    use DatabaseTransactions;
     /**
      * @test
      */
     public function contractsGeneratedSuccessfully()
     {
         echo 'Test contracts ...... ';

         factory(Contract::class, 5)->create();
         $this->assertEquals(Contract::count(), 5);

         factory(Contract::class, 5)->create();
         $this->assertEquals(Contract::count(), 10);

         echo 'OK'.PHP_EOL;
     }
}
