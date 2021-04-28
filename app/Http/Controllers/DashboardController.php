<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Barang;
use App\Penjualan;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('dashboard/home');
    }
    function data_penjualan(){
        if($lastCount == 0)
        $data = data_penjualan::select(
            'tgl_faktur',
            DB::raw('SUM(total_bayar) as total_bayar'),
            DB::raw('COUNT(id) as jml_transaksi'))
            ->groupBy('tgl_faktur')
            ->orderBy('tgl_faktur','asc')
            ->get();
            else
            $data = data_penjualan::select(
                'tgl_faktur',
                DB::raw('SUM(total_bayar) as total_bayar'),
                DB::raw('COUNT(id) as jml_transaksi'))
                ->groupBy('tgl_faktur')
                ->orderBy('tgl_faktur','asc')
                ->skip($lastCount-1)
                ->limit(32434324324)
                ->get();
                return response($data);
    }
}
