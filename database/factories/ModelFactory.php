<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use App\Business\Application\Application;
use App\Business\Contract\Contract;
use App\Business\Enterprise\Enterprise;
use App\Business\Project\Project;
use App\Core\Authorization\Permission\Permission;
use App\Core\Authorization\Role\Role;
use App\User;
use Faker\Generator;


$factory->define(User::class, function (Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'openid' => $faker->sha1,
        'unionid' => $faker->optional()->sha1,
        'password' => bcrypt(str_random(10)),
//        'api_token' => str_random(32),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Role::class, function(Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'label' => $faker->sentence,
    ];
});

$factory->define(Permission::class, function(Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'label' => $faker->sentence,
    ];
});

$factory->define(Contract::class, function (Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'name_en' => $faker->unique()->sentence(2),
        'serial' => $faker->unique()->uuid,
        'amount_of_money' => ($temp = $faker->numberBetween(10, 100) * 10000),
        'rate_of_beans' => ($rate = $faker->numberBetween(60, 120)),
        'amount_of_beans' => $temp * $rate,
        'description' => $faker->sentence(),
    ];
});

$factory->define(Enterprise::class, function (Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'name_en' => $faker->unique()->sentence(2),
        'description' => $faker->sentence(),
    ];
});

$factory->define(Project::class, function (Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'name_en' => $faker->unique()->sentence(2),
        'amount_of_beans' => 0,
        'rest_of_beans' => 0,
        'description' => $faker->sentence(),
    ];
});

$factory->define(Application::class, function (Generator $faker) {
    return [
        'name' => $faker->unique()->sentence(2),
        'name_en' => $faker->unique()->sentence(2),
        'description' => $faker->sentence(),
    ];
});
