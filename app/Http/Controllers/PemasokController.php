<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pemasok;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = Pemasok::all();
        $lastId = Pemasok::select('kode_pemasok')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId == null ? 'SUP000001' :sprintf('SUP%06d',substr($lastId->kode_pemasok,3)+1));
        // dd($lastId);
        return view('data_pemasok/index')->with($data);
        
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
            'nama_pemasok' => 'required|max:100',
            'alamat'       =>'required|min:5',
            'no_telp'      => 'required|min:10',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $status = \App\Pemasok::create($input);

        if($status)
            return redirect('datapemasok')->with('success','DATA PEMASOK BERHASIL DITAMBAHKAN');
        else
            return redirect('datapemasok')->with('error', 'DATA PEMASOK GAGAL DITAMBAHKAN');
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
            'nama_pemasok' => 'required|max:100',
            'alamat'       =>'required|min:5',
            'no_telp'      => 'required|min:10',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $result = \App\Pemasok::where('kode_pemasok',$request->kode_pemasok)->first();
        $status = $result->update($input);

        if($status)
            return redirect('datapemasok')->with('success','DATA PEMASOK BERHASIL DI UPDATE');
        else
            return redirect('datapemasok')->with('error', 'DATA PEMASOK GAGAL DI UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemasok = \App\Pemasok::where('kode_pemasok', $request->id_hapus)->first();
        $status = $pemasok->delete();

        if($status)
            return redirect('datapemasok')->with('success','DATA PEMASOK BERHASIL DI HAPUS');
        else
            return redirect('datapemasok')->with('error', 'DATA PEMASOK GAGAL DI HAPUS');
    }
}
