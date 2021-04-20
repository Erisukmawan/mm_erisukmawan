<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = 'detail_pembelian';
    protected $fillable = ['pembelian_id','barang_id','harga_beli','jumlah','subtotal'];
}
