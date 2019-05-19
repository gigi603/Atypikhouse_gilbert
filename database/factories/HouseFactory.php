<?php

use Faker\Generator as Faker;
use App\House;
use App\User;

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(House::class, function (Faker $faker) {
    return [
        'title' => $faker->city,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'category_id' => '1',
        'ville_id' => '4',
        'description' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'price' => $faker->numberBetween($min = 20, $max = 100),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
