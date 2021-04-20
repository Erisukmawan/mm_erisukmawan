<?php

use Faker\Generator as Faker;

$factory->define(App\DetailPembelian::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1000,10000),
        'pembelian_id'=>$faker->randomElement(App\Produk::select('id')->get()),
        'barang_id'=>$faker->randomElement(App\Barang::select('id')->get()),
        'harga_beli'=>$faker->numberBetween(10000,100000),
        'jumlah'=>$faker->numberBetween(100,1000),
        'sub_total'=>$faker->numberBetween(1000,100000),
    ];
});
