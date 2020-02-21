<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $active = $faker->randomElement(['0','1']);

    if($active)
        $published = $faker->randomElement([\Carbon\Carbon::yesterday(), \Carbon\Carbon::now()]);
    else
        $published = $faker->randomElement([\Carbon\Carbon::yesterday(), \Carbon\Carbon::tomorrow()]);


    return [
        'title' => $faker->sentence(),
        'body' => $text = $faker->paragraph(),
        'exert' => $text,
        'author_id' => \App\Models\User::all()->random(),
        'category_id' => \App\Models\Category::all()->random(),
        'active' => $active,
        'views' => $faker->randomNumber(),
        'published_at' => $published
    ];
});
