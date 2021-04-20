<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = ['kode_masuk','tanggal_masuk','total','pemasok_id','user_id'];
}
