<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenarikanBarang extends Model
{
    protected $table = 'penarikan_barang';
    protected $fillable = ['kode_barang','nama_barang','tanggal_expire','qty'];
}
