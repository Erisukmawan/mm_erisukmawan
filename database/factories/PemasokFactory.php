<?php

use Faker\Generator as Faker;

$factory->define(App\Pemasok::class, function (Faker $faker) {
    return [
        'kode_pemasok' =>$faker->numberBetween(1,999999),
        'nama_pemasok' => $faker->name,
        'alamat'=> $faker->address,
        'kota'=> $faker->city,
        'no_telp'=> $faker->phoneNumber
    ];
});
