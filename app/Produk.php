<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $primaryKey = 'id';
    protected $table = 'produk';
    protected $fillable = ['nama_produk'];
}
