<?php

use Faker\Generator as Faker;

$factory->define(App\Pelanggan::class, function (Faker $faker) {
    return [
        'id'=>$faker->numberBetween(1000,100000),
        'kode_pelanggan'=>"pl".sprintf('%08d',$faker->unique()->numberBetween(1,999999999)),
        'nama' => $faker->name,
        'alamat' => $faker->address,
        'no_telp'=> $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
    ];
});
