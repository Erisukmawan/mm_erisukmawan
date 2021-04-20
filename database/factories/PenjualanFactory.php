<?php

use Faker\Generator as Faker;

$factory->define(App\Penjualan::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1000,100000),
        'no_faktur'=>"F".sprintf('%08d',$faker->unique()->numberBetween(1,999999999)),
        'tgl_faktur'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'total_bayar'=>$faker->numberBetween(10000,1000000),
        'pelanggan_id'=>$faker->numberBetween(10000,1000000),
        'user_id'=>$faker->numberBetween(10000,1000000),
    ];
});
