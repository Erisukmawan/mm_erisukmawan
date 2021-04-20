<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TampungBayar extends Model
{
    protected $table = 'tampung_bayar';
    protected $fillable = ['penjualan_id','total','terima','kembali'];
}
