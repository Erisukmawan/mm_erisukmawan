<?php

use Faker\Generator as Faker;

$factory->define(App\Pembelian::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1000,100000),
        'kode_masuk'=>"P".sprintf('%08d',$faker->unique()->numberBetween(1,999999999)),
        'tanggal_masuk'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'total'=>$faker->numberBetween(10000,1000000),
        'pemasok_id'=>$faker->numberBetween(1000,100000),
        'user_id'=>$faker->numberBetween(1000,100000),
    ];
});
