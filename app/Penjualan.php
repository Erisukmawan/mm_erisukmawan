<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $fillable = ['no_faktur','tgl_faktur','total_bayar','pelanggan_id','user_id'];
}
