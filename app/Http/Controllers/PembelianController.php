<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Pembelian;
use App\Pemasok;
Use App\Barang;
use App\DetailPembelian;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $lastId = Pembelian::select('kode_masuk')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId == null ? 'P00000001' :sprintf('P%08d',substr($lastId->kode_masuk,1)+1));
         $data['pemasok']= Pemasok::get();
         $data['barang'] = Barang::get();
        //  dd($lastId);
        return view('transaksi_pembelian/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pembelian();
        $data->kode_masuk = $request->kode_masuk;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->total = $request->total;
        $data->pemasok_id = $request->pemasok_id;
        $data->user_id = 1;
        $status=$data->save();

        $lastId = DB::getPDO()->lastInsertId();
        // dd($request->jumlah);
        // $lastId = Pembelian::select('id')->orderBy('created_at','desc')->first();
        
            $input = new DetailPembelian();
            $input->pembelian_id = $lastId;
            $input->barang_id = $request->barang_id;
            $input->harga_beli = $request->harga_beli;
            $input->jumlah = $request->jumlah;
            $input->sub_total = floatval($request->harga_beli) * floatval($request->jumlah);
            $status=$input->save();
        if($status)
            return redirect('transaksi_pembelian')->with('success','DATA PEMASOK BERHASIL DITAMBAHKAN');
        else
            return redirect('transaksi_pembelian')->with('error', 'DATA PEMASOK GAGAL DITAMBAHKAN');
            ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
