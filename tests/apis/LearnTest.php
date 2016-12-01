<?php

use App\Business\Project\Project;
use App\User;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LearnTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    /**
      * @test
      */
     public function learnV1()
     {
         echo 'Test learnV1 ...... ';
         $this->withoutModelEvents();

         $this->initiateSeeds();

         $user = User::create([
             'phone' => '13344445555'
         ]);

         $project = Project::where('name_en', 'ohmate_wechat_learn')->firstOrFail();

         $this->actingAs(User::firstOrFail(), 'api')->json('POST', '/api/v1/learn', [
             'phone' => $user->phone
         ])->seeJson([
             'status' => 'ok',
             'chance_remains_today' => 4
         ]);

         $this->assertEquals($project->fresh()->rest_of_beans, -20);
         $this->assertEquals($user->bean->number, 20);

         for($i = 0; $i < 10; $i++) {
             $this->actingAs(User::firstOrFail(), 'api')->json('POST', '/api/v1/learn', [
                 'phone' => $user->phone
             ])->seeJson([
                 'status' => 'ok',
                 'chance_remains_today' => (3 - $i) >= 0? (3 - $i):0
             ]);
         }

         $this->assertEquals($project->fresh()->rest_of_beans, -100);
         $this->assertEquals($user->bean->fresh()->number, 100);

         echo 'OK!'.PHP_EOL;
     }
}
