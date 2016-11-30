<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QueryUserTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;
     /**
      * @test
      */
     public function queryUserInformationSucceed()
     {
         echo 'Test query user information. ...... ';

         $this->initiateSeeds();

         $this->actingAs(User::first(), 'api')->json('GET', '/api/v1/query-user-information', [
             'phone' => '00000000000',
         ])->seeJson([
             'status' => 'ok'
         ]);

         echo 'OK!'.PHP_EOL;
     }
}
