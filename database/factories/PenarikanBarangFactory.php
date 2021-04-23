<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PenarikanBarang;
use Faker\Generator as Faker;

$factory->define(PenarikanBarang::class, function (Faker $faker) {
    return [
        'kode_barang'=>"PB".sprintf('%08d',$faker->unique()->numberBetween(1,999999999)),
        'nama_barang' => $faker->RandomElement(['sepatu','kaos','celana','baju','hp']),
        'tanggal_expired'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggal_masuk'=>$faker->numberBetween(10,100),
    ];
});
