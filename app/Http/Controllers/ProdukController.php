<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Produk::all();
        return view('data_produk/index')->with($data);
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
        $rules = [
            'nama_produk' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $status = Produk::create($input);

        if($status)
            return redirect('dataproduk')->with('success','DATA PRODUK BERHASIL DITAMBAHKAN');
        else
            return redirect('dataproduk')->with('error', 'DATA PRODUK GAGAL DITAMBAHKAN');
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
    public function update(Request $request)
    {
        $rules = [
            'nama_produk' => 'required|max:100',
        ];
        $this->validate($request, $rules);

        $data = Produk::find($request->id);
        $data->nama_produk = $request->nama_produk;
        $data->save();

        if($data)
            return redirect('dataproduk')->with('success','DATA PRODUK BERHASIL DI UPDATE');
        else
            return redirect('dataproduk')->with('error', 'DATA PRODUK GAGAL DI UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemasok = Produk::find($request->id_hapus);
        $status = $pemasok->delete();

        if($status)
            return redirect('dataproduk')->with('success','DATA PRODUK BERHASIL DI HAPUS');
        else
            return redirect('dataproduk')->with('error', 'DATA PRODUK GAGAL DI HAPUS');
    }
}
