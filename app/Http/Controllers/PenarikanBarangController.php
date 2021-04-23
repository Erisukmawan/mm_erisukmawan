<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PenarikanBarang;
use App\Exports\PenarikanBarangExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PenarikanBarangController extends Controller
{
    public function export() 
    {
        return Excel::download(new PenarikanBarangExport, 'Penarikan.xlsx');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = PenarikanBarang::all();
        $lastId = PenarikanBarang::select('kode_barang')->orderBy('created_at','desc')->first();
        $data['kode'] = ($lastId = null ? 'PB00000001' :sprintf('PB%06d',substr($lastId->kode_barang,3)+1));
        return view('penarikanbarang/index')->with($data);
    }
    public function updateStatus(Request $request)
    {
    $user = PenarikanBarang::find($request->id);
    $user->status = $request->status;
    $status = $user->save();

        // $input = $request->status;
        // $result = PenarikanBarang::where('status',$request->id)->first();
        // $status = $result->save($input);

        if($status)
            return redirect('penarikanbarang')->with('success','DATA PENGAJUAN BERHASIL DITAMBAHKAN');
        else
            return redirect('penarikanbarang')->with('error', 'DATA PENGAJUAN GAGAL DITAMBAHKAN');
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
            'nama_barang' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $status = \App\PenarikanBarang::create($input);

        if($status)
            return redirect('penarikanbarang')->with('success','DATA PENGAJUAN BERHASIL DITAMBAHKAN');
        else
            return redirect('penarikanbarang')->with('error', 'DATA PENGAJUAN GAGAL DITAMBAHKAN');
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
            'nama_barang' => 'required|max:100',
        ];
        $this->validate($request, $rules);
        $input = $request->all();
        $result = \App\PenarikanBarang::where('kode_barang',$request->kode_barang)->first();
        $status = $result->update($input);

        if($status)
            return redirect('penarikanbarang')->with('success','DATA PENGAJUAN BERHASIL DI UPDATE');
        else
            return redirect('penarikanbarang')->with('error', 'DATA PENGAJUAN GAGAL DI UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $pemasok = \App\PenarikanBarang::where('kode_barang', $request->id_hapus)->first();
        $status = $pemasok->delete();

        if($status)
            return redirect('penarikanbarang')->with('success','PENGAJUAN BERHASIL DI HAPUS');
        else
            return redirect('penarikanbarang')->with('error', 'DATA PENGAJUAN GAGAL DI HAPUS');
    }
    
}
