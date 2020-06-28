<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'description' => $faker->realText(30),
        'points'        => $faker->numberBetween($min = 1000, $max = 8000),
        'last_points'   => $faker->numberBetween($min = 1000, $max = 8000),
        'price'         => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 10000),
        'points_price'  => $faker->numberBetween($min = 500, $max = 5000),
        'photo_path' => 'products/product-photo-1553033458.png',
        'final_url' => 'https://scotiapuntos.s3.us-east-2.amazonaws.com/products/product-photo-1553033458.png',
        'sku' => '7014, 7015',
        'stock' => $faker->numberBetween($min = 10, $max = 50),
        'tags' => 'paquetes,nacionales',
        'real_value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1000, $max = 10000),
        'catalogue_id' => $faker->numberBetween($min = 1, $max = 2),
        'brand_id' => $faker->numberBetween($min = 1, $max = 2),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
        'active_url' => $faker->randomElement(['photo_url','photo_url_alternative']),
        'state' => '1',
        'es_licor' => $faker->numberBetween($min = 0, $max = 1),
    ];

});
