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
    $data['result'] = PenarikanBarang::all();
    $pdf = PDF::loadView('penarikanbarang.export')->with($data);
    return $pdf->download('penarikanbarang.pdf');;
  }
  
}
