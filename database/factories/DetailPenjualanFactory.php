<?php

use Faker\Generator as Faker;

$factory->define(App\DetailPenjualan::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(10000,100000),
        'penjualan_id'=>$faker->randomElement(App\Penjualan::select('id')->get()),
        'barang_id'=>$faker->randomElement(App\Barang::select('id')->get()),
        'harga_jual'=>$faker->numberBetween(10000,100000),
        'jumlah'=>$faker->numberBetween(10000,100000),
        'sub_total'=>$faker->numberBetween(10000,100000),
    ];
});
