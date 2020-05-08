<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $image = $faker->randomElement([
        config('app.url') . "/uploads/images/resources/CgEINlo41z2AGl3LAAUh_SHU4fo942.png",
        config('app.url') . "/uploads/images/resources/CgEIN1o42Y-AUyGmAAh3Z5t_KWY460.png",
        config('app.url') . "/uploads/images/resources/CgEIN1o42AaAQ7lDAASTyO_0tiE122.png",
        config('app.url') . "/uploads/images/resources/CgEINlo42SiAGlEyAAWO8kT294E041.png",
        config('app.url') . "/uploads/images/resources/CgEIN1o42v2AeCazAAkPeIPExEQ169.png",
        config('app.url') . "/uploads/images/resources/CgEIN1o42iWAL8-tAAfdi1oKtq4911.png",
        config('app.url') . "/uploads/images/resources/CgEINlpFrx-AFGMBAAax1zdCikI466.png",
        config('app.url') . "/uploads/images/resources/CgEIN1o42Y-AUyGmAAh3Z5t_KWY460.png",
    ]);

    return [
        'category_id'  => \App\Models\ProductCategory::all()->random(1)->first()->id,
        'brand'        => $faker->randomElement(['小米', '华为', '苹果', '联想']),
        'slug'         => $faker->unique()->slug,
        'title'        => $faker->name,
        'description'  => $faker->sentence,
        'image'        => $image,
        'on_sale'      => true,
        'rating'       => $faker->numberBetween(0, 5),
        'sold_count'   => 0,
        'review_count' => 0,
        'price'        => $faker->randomNumber(3),
    ];
});
