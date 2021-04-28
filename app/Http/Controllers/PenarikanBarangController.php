<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PenarikanBarang;
use App\Exports\PenarikanBarangExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Barang;

class PenarikanBarangController extends Controller
{
    public function export() 
    {
        return Excel::download(new PenarikanBarangExport, 'Penarikan.xlsx');
    }
    public function getNamaBarang(Request $request) 
    {
        if ($request->ajax()) {
            $kode = $request->get('kode');
            $barang = Barang::where('kode_barang', $kode)->get();

            return response()->json([
                'message' => 'success',
                'barang' => $barang
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['result'] = PenarikanBarang::all();
        $data['barang'] = Barang::all();
        return view('penarikanbarang/index')->with($data);
        $pdf = PDF::loadView('mahasiswa', compact('mahasiswa'));
        return $pdf->stream('mahasiswa.pdf');
    }
    public function updateStatus(Request $request)
    {
    $post = PenarikanBarang::find($request->id);
    $post->status = $request->status;
    $post->save();

    Session::flash('success', 'Data Berhasil Ditambahkan!');
        return response()->json(['success'=>'status telah diganti']);
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
        $data = new PenarikanBarang;
        $data->nama_barang = $request->nama_barang;
        $data->kode_barang = $request->kode_barang;
        $data->tanggal_expire = $request->tanggal_expire;
        $data->qty = $request->qty;
        $data->save();
        if($request->qty) {
            $barang = Barang::where('kode_barang',$request->kode_barang)->first();
            $barang->stock -= $data->qty = $request->qty;
            $barang->save();
        }
            return redirect('/penarikanbarang')->with('success','DATA PENGAJUAN BERHASIL DITAMBAHKAN');
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
        // $rules = [
        //     'nama_barang' => 'required|max:100',
        // ];
        // $this->validate($request, $rules);
        // $input = $request->all();
        // $result = \App\PenarikanBarang::where('kode_barang',$request->kode_barang)->first();
        // $status = $result->update($input);
         $penarikan = PenarikanBarang::where('kode_barang', $request->kode_barang)->first();
        $data = PenarikanBarang::where('kode_barang',$request->kode_barang)->first();
        $data->kode_barang = $request->kode_barang;
        $data->nama_barang = $request->nama_barang;
        $data->tanggal_expire = $request->tanggal_expire;
        $data->qty = $request->qty;
        $data->save();
        
        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        // Ambil value lama quantity
        $oldQty = (int)$penarikan->qty;
        // Ambil nilai stok saat ini di barang
        $oldStock = (int)$barang->stock;
        // Update stok
        
        $totalStock = $oldQty + $oldStock;

        $barang->update([
            'stock' => $totalStock - $request->qty
        ]);
            return redirect('penarikanbarang')->with('success','DATA PENGAJUAN BERHASIL DI UPDATE');
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
