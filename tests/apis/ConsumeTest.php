<?php

use App\Business\Project\Project;
use App\Business\UserRelevance\UpperUserPhone;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsumeTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
     /**
      * @test
      */
     public function consume()
     {
         echo 'Test consume ...... ';
         $this->withoutModelEvents();

         $this->initiateSeeds();
         $lower = User::create([
             'phone' => '11122223333'
         ]);

         $upper = User::create([
             'phone' => '99988887777'
         ]);

         $lower->bean_number = 1000;


         $lower->upperUserPhones()->save(new UpperUserPhone([
             'upper_user_phone' => $upper->phone
         ]));

         $this->actingAs(User::first(), 'api')->json('POST', '/api/v1/consume', [
             'phone' => '11122223333',
             'cash_paid_by_beans' => 10,
             'cash_paid' => 10,
             'is_first_cash_consume' => 1
         ])->seeJson([
             'status' => 'ok'
         ]);

         $this->assertEquals($lower->bean_number, 0);
         $this->assertEquals($upper->bean_number, 1020);
         $this->assertEquals(Project::where('name_en', 'ohmate_consume_pool')->firstOrFail()->rest_of_beans, 1000);
         $this->assertEquals(Project::where('name_en', 'ohmate_wechat_cash_consume_upper_feedback')->firstOrFail()->rest_of_beans, -20);
         $this->assertEquals(Project::where('name_en', 'ohmate_wechat_first_cash_consume_upper_feedback')->firstOrFail()->rest_of_beans, -1000);

         echo 'OK!'.PHP_EOL;
     }
}
