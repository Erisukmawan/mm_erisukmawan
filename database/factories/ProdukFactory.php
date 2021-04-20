<?php

use Faker\Generator as Faker;

$factory->define(App\Produk::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1,9999999),
        'nama_produk'=>$faker->RandomElement(['sepatu','kaos','celana,baju']),
    ];
});
