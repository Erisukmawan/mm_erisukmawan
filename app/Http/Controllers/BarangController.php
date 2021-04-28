<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = \App\Barang::all();
        $data['produk'] = \App\Produk::all();
        $lastId = Barang::select('kode_barang')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId == null ? 'BRG000001' :sprintf('BRG%08d',substr($lastId->kode_barang,3)+1));
        // dd($lastId);
        return view('data_barang/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input = $request->all();
        $status = \App\Barang::create($input);

        return redirect('/databarang');
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
            'nama_barang' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $status = \App\Barang::create($input);

        if($status)
            return redirect('databarang')->with('success','DATA TAMBAH BERHASIL DITAMBAHKAN');
        else
            return redirect('databarang')->with('error', 'DATA TAMBAH GAGAL DITAMBAHKAN');
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
            'kode_barang' => 'required|max:100',
            'produk_id' => 'required|max:11',
            'nama_barang'=> 'required|max:100',
            'satuan' => 'required|max:50',
            'harga_jual' => 'required|max:100',
            'stock' => 'required|max:11'
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $result = Barang::where('kode_barang',$request->kode_barang)->first();
        $status = $result->update($input);

        if($status)
            return redirect('databarang')->with('success','DATA PRODUK BERHASIL DI UPDATE');
        else
            return redirect('databarang')->with('error', 'DATA PRODUK GAGAL DI UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemasok = Barang::where('kode_barang', $request->id)->first();
        $status = $pemasok->delete();

        if($status)
            return redirect('databarang')->with('success','DATA PRODUK BERHASIL DI HAPUS');
        else
            return redirect('databarang')->with('error', 'DATA PRODUK GAGAL DI HAPUS');
    }
}
