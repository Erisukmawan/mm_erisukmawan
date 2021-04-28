<?php

use Faker\Generator as Faker;
use App\Penjualan;
use App\Barang;

$factory->define(App\DetailPenjualan::class, function (Faker $faker) {
    $id_jual =$faker->randomElement(App\Penjualan::select('id')
        ->whereIn('tgl_faktur',['2021-04-18'])->get());
    $id = $faker->randomElement(App\Barang::select('id')->get());
    $harga = App\Barang::select('harga_jual')->whereIn('id',$id->id)->first();
    $jumlah = $faker->numberBetween(1,20);
    
    return [
        'penjualan_id'=>$id_jual,
        'barang_id'=>$id,
        'harga_jual'=>$harga['harga_jual'],
        'jumlah'=>$jumlah,
        'sub_total'=>$harga->harga_jual * $jumlah
    ];
});
