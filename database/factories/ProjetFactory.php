<?php

use Faker\Generator as Faker;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Projet::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'author' => $faker->name,
        'description' =>$faker->text,
        'user_id'=>function(){
        return factory(User::class)->create()->id;
        }
    ];
});
