<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
  $title = $faker->text(30);
    return [
        'user_id' => rand(1,20),
        'category_id' => rand(1,20),
        'title'=> $title,
        'slug' => str_slug($title),
        'excerpt'=> $faker->text(200),
        'body' => $faker->text(500),
        'created_at' => $faker->dateTime(),
        'file'=> $faker->imageUrl($width = 1200, $height = 400),
    ];
});
