<?php

use Faker\Generator as Faker;

$factory->define(App\TampungBayar::class, function (Faker $faker) {
    return [
        'penjualan_id'=>$faker->randomElement(App\Penjualan::select('id')->get()),
        'total'=>$faker->numberBetween(10000,100000),
        'terima'=>$faker->numberBetween(10000,100000),
        'kembali'=>$faker->numberBetween(10000,100000),
    ];
});
