@extends('templates/header')
@section('content')
<!-- page content -->
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Plain Page</h3>
    </div>
  </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data Barang</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
             <a class="btn btn-success" href="#add">
            <span class="fa fa-plus-circle"></span> Tambah</a>
            <table id="dt-barang" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Produk Id</th>
                  <th>Nama Barang</th>
                  <th>Satuan</th>
                  <th>Harga Jual</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($result as $data)
                <tr>
                  <th>{{ !empty($i) ? ++$i : $i =1 }}</th>
                  <td>{{ $data->kode_barang }}</td>
                  <td>{{ $data->produk_id }}</td>
                  <td>{{ $data->nama_barang }}</td>
                  <td>{{ $data->satuan }}</td>
                  <td>{{ $data->harga_jual }}</td>
                  <td>{{ $data->stock }}</td>
                  <td><a href="#" data-toggle="modal" data-target="#modalbarang" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                  <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
        </div>
      </div>
    </div>
    </div>
<!-- /page content -->
@endsection
@include('data_barang/form')
@push('js')
<script>
$(function(){
  $('#dt-barang').DataTable();
  $('#modalbarang').on('show.bs.modal', function(event){
  });
})
</script>
@endpush