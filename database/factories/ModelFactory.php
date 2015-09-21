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

$factory->define(\App\Models\Users::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Categories::class, function ($faker) {
    $title = $faker->text(30);

    return [
        'title' => $title,
        'slug'  => str_slug($title, '-'),
    ];
});

$factory->define(\App\Models\Posts::class, function ($faker) {
    return [
        'category_id'      => 'factory:Categories',
        'user_id'          => 'factory:Users',
        'title'            => $faker->realText(100, $indexSize = 2),
        'excerpt'          => $faker->paragraph(),
        'content'          => $faker->realText(1000, $indexSize = 2),
        'img'              => $faker->imageUrl($width = 700, $height = 250),
        'meta_description' => $faker->paragraph(),
        'meta_keywords'    => $faker->email,
        'status'           => 'active',
        'published_at'     => $faker->dateTime(),
    ];
});
