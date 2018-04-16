<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
//  add for post seeder,def postsSeeeder...how it will look
$factory->define(App\Post::class, function (Faker $faker) {
    return [
    // koja polja imam
        'title' => $faker->sentence(1,true),
        'body' => $faker->text(200),
        'is_published'=>true
    ];
});


$factory->define(App\Comment::class, function (Faker $faker) {
    return [
    // ime polja koja imam u tabeli
       'text' => $faker->text(100),
       
    ];
});