<?php

use Faker\Generator as Faker;

$factory->define(app\Series::class, function (Faker $faker) {
  $title=$faker->sentence(5);
    return [
        'title'=>$title,
        'slug'=>str_slug($title),
        'image_url'=>$faker->imageUrl(),
        'description'=>$fake->paragraph()
    ];
});
