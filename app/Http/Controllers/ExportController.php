<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PenarikanBarang;
use PDF;

class ExportController extends Controller
{
    public function index()
  {
    $data['result'] = PenarikanBarang::all();
    return view('penarikanbarang.export')->with($data);
    }
    public function export_pdf()
  {
    $pdf = PDF::loadView('pdf.penarikanbarang', $data);
    return $pdf->download('pendarikanbarang.pdf');;
  }
  
}
