<?php

$factory(App\Models\Users::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory(App\Models\Categories::class, function ($faker) {
    $title = $faker->text(30);

    return [
        'title' => $title,
        'slug' => str_slug($title, '-'),
    ];
});

$factory(App\Models\Posts::class, function ($faker) {
    return [
        'category_id' => 'factory:App\Models\Categories',
        'user_id' => 'factory:App\Models\Users',
        'title' => $faker->realText(100, $indexSize = 2),
        'excerpt' => $faker->paragraph(),
        'content' => $faker->realText(1000, $indexSize = 2),
        'img' => $faker->imageUrl($width = 700, $height = 250),
        'meta_description' => $faker->paragraph(),
        'meta_keywords' => $faker->email,
        'status' => 'active',
        'published_at' => $faker->dateTime(),
    ];
});


//
// PIVOT TABLES
//
//$factory('App\Models\Application', 'base_app', function ($faker) {
//    return [
//        'id' => 1,
//        'name' => 'name',
//        'slug' => 'slug',
//        'website' => $faker->url,
//        'author_id' => 'factory:App\Models\User'
//    ];
//}, function ($application) {
//    \Laracasts\TestDummy\Factory::create('App\Models\ApplicationUser', [
//        'author_id' => $application->author_id,
//        'application_id' => $application->getKey(),
//    ]);
//});