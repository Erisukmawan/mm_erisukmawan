@extends('templates/header')
@section('content')
<!-- page content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Data Barang</h3>
      </div>
      </div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Default Example</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
          <a class="btn btn-success" href="#add" data-toggle="modal" data-target="#modalbarang" data-mode="add">
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
              @foreach($result as $data)
                <tr>
                  <th>{{ !empty($i) ? ++$i : $i =1 }}</th>
                  <td>{{ $data->kode_barang }}</td>
                  <td>{{ $data->produk_id }}</td>
                  <td>{{ $data->nama_barang }}</td>
                  <td>{{ $data->satuan }}</td>
                  <td>{{ $data->harga_jual }}</td>
                  <td>{{ $data->stock }}</td>
                  <td><a href="#" data-toggle="modal" data-target="#modalbarang" class="btn btn-warning" data-mode="edit" data-id="{{ $data->id }}"><span class="fa fa-edit"></span></a>
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
  </div>
<!-- /page content -->
@include('data_barang/form')
@endsection
@push('js')
<script>
$(function(){
  $('#dt-barang').DataTable();
  $('#modalbarang').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
      var id = button.data('id');
      var mode = button.data('mode');
      var id = button.data('id');
      var modal = $(this);
      if(mode == 'edit'){
        modal.find('.modal-title').text('Edit Kategori');
        modal.find('.modal-body #inputId').val(id);
        modal.find('.modal-body #method').html('{{ method_field("patch") }}<input type="hidden" name="id_kategori" value="'+id+'">');
      }else{
        modal.find('.modal-title').text('Tambah Kategori');
        modal.find('.modal-body #inputId').val('');
        modal.find('.modal-body #method').html("");
      }});
})
</script>
@endpush