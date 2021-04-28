<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PengajuanBarang;
use Faker\Generator as Faker;

$factory->define(PengajuanBarang::class, function (Faker $faker) {
    return [
        'nama_pengajuan'=>$faker->name,
        'nama_barang' => $faker->RandomElement(['sepatu','kaos','celana','baju','hp']),
        'tanggal_expired'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'tanggal_masuk'=>$faker->numberBetween(10,100),
    ];
});
