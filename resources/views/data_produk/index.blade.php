@extends('templates/header')
@section('content')

<!-- page content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Data Produk</h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>
            <!-- button tambah  -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            <i class="fa fa-plus"></i>
            </button>
            Tambah Data Produk
            </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @include('templates/feedback')
            <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($result as $data)
                <tr>
                  <th>{{ !empty($i) ? ++$i : ($i =1) }}</th>
                  <td>{{ $data->nama_produk }}</td>
                  <td><a href="#edit" data-toggle="modal" data-target="#formModal" data-mode="edit" data-nama="{{ $data->nama_produk }}"><span class="fa fa-edit" style="color:blue;"></span></a> | 
                  <a href="#hapus" data-toggle="modal" data-target="#modalhapus" data-id="{{ $data->id }}" data-nama="{{ $data->nama_produk }}" ><span class="fa fa-trash" style="color:red"></span></a>
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
@include('data_produk/modal')
@endsection

@push('js')

<script>
 $(function(){
   $('#formModal').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget);
     var nama = button.data('nama');
     var mode = button.data('mode');
     var modal = $(this);
     if(mode == 'edit'){
       modal.find('.modal-title').text('Edit Data Produk');
       modal.find('.modal-body #inputNama').val(nama);
       modal.find('.modal-body #method').html('{{ method_field('patch') }}');
     }else{
       modal.find('.modal-title').text('Tambah Data Produk');
       modal.find('.modal-body #inputNama').val('');
       modal.find('.modal-body #method').html("");
     }
   });

   $('#modalhapus').on('show.bs.modal', function(event){
     var button = $(event.relatedTarget);
     var id = button.data('id');
     var nama = button.data('nama');
     var modal = $(this);
     modal.find('.modal-body #idhapus').val(id);
     modal.find('.modal-body #datahapus').text(nama);
   });
 });
</script>
@endpush