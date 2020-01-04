<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
	$blogs = App\Blog::pluck('id')->toArray();
	$categories = App\Category::pluck('id')->toArray();
    
    return [
        'blog_id' => $faker->randomElement($blogs),
        'category_id' => $faker->randomElement($categories)
    ];
});
