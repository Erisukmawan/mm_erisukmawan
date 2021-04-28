<?php

use Faker\Generator as Faker;

$factory->define(App\Penjualan::class, function (Faker $faker) {
    $date = new DateTIme();
    $date->setDate(2021, 4, 26);
    return [
        'no_faktur'=>"F".sprintf('%08d',$faker->unique()->numberBetween(1,999999999)),
        'tgl_faktur'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'total_bayar'=>$faker->numberBetween(1000,100000),
        'pelanggan_id'=>1,
        'user_id'=>1,
    ];
});
