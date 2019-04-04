<?php

use App\User;
use App\Movie;
use Illuminate\Support\Str;
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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'email_verified_at' => now(),
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'remember_token' => Str::random(10),
//     ];
// });

$factory->define(Movie::class, function(Faker $faker){       //uvek je drugi parametar callback i uvek vraca asocijativni niz gde je key naziv atributa
    return[
        "title" => $faker->realText(100),
        "director" => $faker->name,
        "imageUrl" => $faker->imageUrl($width = 640, $height = 480) ,
        "duration" => $faker->numberBetween($min = 60, $max = 360),
        "releaseDate" => $faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos'),
        "genere" => Movie::GENERES[rand(0,count(Movie::GENERES) - 1)]
    ];
 });
