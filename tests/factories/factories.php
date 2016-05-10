<?php

$factory(App\Models\Users::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory(App\Models\Categories::class, function ($faker) {
    $title = ucfirst($faker->word());

    return [
        'title'           => $title,
        'seo_title'       => $title,
        'seo_keywords'    => implode(', ', $faker->words(6)),
        'seo_description' => $faker->sentence(10),
        'slug'            => str_slug($title, '-'),
    ];
});

$factory(App\Models\Posts::class, function ($faker) {
    $title = $faker->sentence(8);

    return [
        'category_id'     => 'factory:App\Models\Categories',
        'user_id'         => 'factory:App\Models\Users',
        'title'           => $title,
        'slug'            => str_slug($title),
        'excerpt'         => $faker->paragraph(),
        'content'         => $faker->realText(1000, 2),
        'img'             => $faker->imageUrl(700, 400),
        'seo_title'       => $title,
        'seo_keywords'    => implode(', ', $faker->words(6)),
        'seo_description' => $faker->sentence(10),
        'status'          => 'active',
        'published_at'    => $faker->dateTime(),
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
