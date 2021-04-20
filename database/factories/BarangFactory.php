<?php

use Faker\Generator as Faker;

$factory->define(App\Barang::class, function (Faker $faker) {
    return [
        'kode_barang' => $faker->numberBetween(1000,100000),
        'produk_id' => $faker->numberBetween(1000,100000),
        'nama_barang' => $faker->company,
        'satuan' => $faker->numberBetween(1,10),
        'harga_jual' => $faker->numberBetween(10000,10000000),
        'stock' => $faker->numberBetween(1,10),
    ];
});
