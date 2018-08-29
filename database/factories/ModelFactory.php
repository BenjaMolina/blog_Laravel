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
use Illuminate\Support\Str as Str;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    static $password;

    $title = $faker->sentence(4);

    return [
        'name' => $title,
        'slug' => Str::slug($title), //str_slug($title)
        'body' => $faker->text(500),
    ];
});


$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    $title = $faker->sentence(4);

    return [
        'user_id' => rand(1,30),
        'category_id' => rand(1,20),
        'name' => $title,
        'slug' => str_slug($title),
        'excerpt' => $faker->text(200),
        'body' => $faker->text(500),
        'file' => $faker->imageUrl($width=1200, $height = 400),
        'status' => $faker->randomElement(['DRAFT','PUBLISHED']),
    ];
});


$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    static $password;

    $title = $faker->unique()->word(5);

    return [
        'name' =>$title,
        'slug' => Str::slug($title),
    ];
});
