<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengajuanBarang extends Model
{
    protected $table = 'pengajuan_barang';
    protected $fillable = ['id','nama_pengajuan','nama_barang','tanggal_pengajuan','qty'];
}
