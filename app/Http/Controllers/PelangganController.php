<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Pelanggan::all();
        $lastId = \App\Pelanggan::select('kode_pelanggan')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId == null ? 'PB00000001' :sprintf('PB%08d',substr($lastId->kode_pelanggan,3)+1));
        return view('data_pelanggan/index')->with($data);
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
            'kode_pelanggan' => 'required|max:100',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:200',
            'no_telp' => 'required|max:13',
            'email' => 'required|max:100'
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $status = Pelanggan::create($input);

        if($status)
            return redirect('datapelanggan')->with('success','DATA PELANGGAN BERHASIL DITAMBAHKAN');
        else
            return redirect('datapelanggan')->with('error', 'DATA PELANGGAN GAGAL DITAMBAHKAN');
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
            'kode_pelanggan' => 'required|max:100',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:200',
            'no_telp' => 'required|max:13',
            'email' => 'required|max:100'
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $result = Pelanggan::where('kode_pelanggan',$request->kode_pelanggan)->first();
        $status = $result->update($input);

        if($status)
            return redirect('datapelanggan')->with('success','DATA PELANGGAN BERHASIL DI UPDATE');
        else
            return redirect('datapelanggan')->with('error', 'DATA PELANGGAN GAGAL DI UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemasok = Pelanggan::where('kode_pelanggan', $request->id_hapus)->first();
        $status = $pemasok->delete();

        if($status)
            return redirect('datapelanggan')->with('success','DATA PELANGGAN BERHASIL DI HAPUS');
        else
            return redirect('datapelanggan')->with('error', 'DATA PELANGGAN GAGAL DI HAPUS');
    }
}
