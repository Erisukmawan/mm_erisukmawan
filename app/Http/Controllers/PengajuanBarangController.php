<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengajuanBarang;
use App\Barang;
use App\Pelanggan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengajuanBarangExport;
use PDF;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PengajuanBarangController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function exportToExcel()
    {
        return EXCEL::download(new PengajuanBarangExport,'pengajuan.xls');
    }
    public function exportToPdf()
    {
        $pengajuan = PengajuanBarang::all();
        $pdf = PDF::loadview('pengajuanbarang.export',['pengajuan' => $pengajuan]);
        return $pdf->download('pengajuan.pdf');
    }
    public function index()
    {
    $data['result'] = PengajuanBarang::all();
    $data['pelanggan'] = Pelanggan::all();
    $data['barang'] = Barang::all();
    return view('pengajuanbarang/index')->with($data);
    }
    public function changeStatus(Request $request)
    {
        $user = PengajuanBarang::find($request->pengajuan_id);
        $user->status = $request->status;
        $status=$user->save();
        if($status)
            return redirect('pengajuan_barang')->with('success','PENGAJUAN BERHASIL DI UPDATE');
        else
            return redirect('pengajuan_barang')->with('error', 'DATA PENGAJUAN GAGAL DI UPDATE');
    }
    public function store(Request $request)
    {
        $data = new PengajuanBarang;
        $data->nama_pengajuan = $request->nama_pengajuan;
        $data->nama_barang = $request->nama_barang;
        $data->tanggal_pengajuan = $request->tanggal_pengajuan;
        $data->qty = $request->qty;
        $data->save();
        if($request->qty) {
            $barang = Barang::where('nama_barang',$request->nama_barang)->first();
            $barang->stock += $data->qty = $request->qty;
            $barang->save();
        }
            return redirect('pengajuan_barang')->with('success','DATA PENGAJUAN BERHASIL DITAMBAHKAN');

    }
    public function update(Request $request)
    {
        $data = PengajuanBarang::where('id',$request->id)->first();
        $data->nama_pengajuan = $request->nama_pengajuan;
        $data->nama_barang = $request->nama_barang;
        $data->tanggal_pengajuan = $request->tanggal_pengajuan;
        $data->qty = $request->qty;
        $status = $data->save();

        if($status)
            return redirect('pengajuan_barang')->with('success','PENGAJUAN BERHASIL DI UPDATE');
        else
            return redirect('pengajuan_barang')->with('error', 'DATA PENGAJUAN GAGAL DI UPDATE');
    }
    public function destroy(Request $request)
    {
        $pemasok = \App\PengajuanBarang::where('id', $request->id_hapus)->first();
        $status = $pemasok->delete();

        if($status)
            return redirect('pengajuan_barang')->with('success','PENGAJUAN BERHASIL DI HAPUS');
        else
            return redirect('pengajuan_barang')->with('error', 'DATA PENGAJUAN GAGAL DI HAPUS');
    }
}
