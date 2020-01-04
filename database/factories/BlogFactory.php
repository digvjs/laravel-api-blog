<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
	
	return [
        'user_id' => $faker->randomElement($users),
        'title' => $faker->sentence,
        'description' => $faker->paragraph
    ];
});
