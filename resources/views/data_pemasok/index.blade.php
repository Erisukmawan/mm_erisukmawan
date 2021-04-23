@extends('templates/header')
@section('content')

<!-- page content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Data Pemasok</h3>
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
            Tambah Data Pemasok
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
                  <th>Kode Pemasok</th>
                  <th>Nama Pemasok</th>
                  <th>Alamat</th>
                  <th>Kota</th>
                  <th>Telephon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($result as $data)
                <tr>
                  <th>{{ !empty($i) ? ++$i : ($i =1) }}</th>
                  <td>{{ $data->kode_pemasok }}</td>
                  <td>{{ $data->nama_pemasok }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->kota }}</td>
                  <td>{{ $data->no_telp }}</td>
                  <td><a href="#edit" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                  data-kode="{{ $data->kode_pemasok }}" data-nama="{{ $data->nama_pemasok }}"
                  data-alamat="{{ $data->alamat }}" data-kota="{{ $data->kota }}" data-tlp="{{ $data->no_telp }}"><span class="fa fa-edit" style="color:blue;"></span></a> | 
                  <a href="#hapus" data-toggle="modal" data-target="#modalhapus" data-kode="{{ $data->kode_pemasok }}" data-nama="{{ $data->nama_pemasok }}" ><span class="fa fa-trash" style="color:red"></span></a>
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
@include('data_pemasok/modal')
@endsection

@push('js')

<script>
 $(function(){
   $('#formModal').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget);
     var kode = button.data('kode');
     var mode = button.data('mode');
     var nama = button.data('nama');
     var tlp = button.data('tlp');
     var alamat = button.data('alamat');
     var kota = button.data('kota');
     var modal = $(this);
     if(mode == 'edit'){
       modal.find('.modal-title').text('Edit Data Pemasok');
       modal.find('.modal-body #inputKode').val(kode);
       modal.find('.modal-body #inputNama').val(nama);
       modal.find('.modal-body #inputTelp').val(tlp);
       modal.find('.modal-body #inputAlamat').val(alamat);
       modal.find('.modal-body #inputKota').val(kota);
       modal.find('.modal-body #method').html('{{ method_field('patch') }}');
     }else{
       modal.find('.modal-title').text('Tambah Data Pemasok');
       modal.find('.modal-body #inputKode').val('{{$kode}}');
       modal.find('.modal-body #inputNama').val('');
       modal.find('.modal-body #inputTelp').val('');
       modal.find('.modal-body #inputAlamat').val('');
       modal.find('.modal-body #inputKota').val('');
       modal.find('.modal-body #method').html("");
     }
   });

   $('#modalhapus').on('show.bs.modal', function(event){
     var button = $(event.relatedTarget);
     var kode = button.data('kode');
     var nama = button.data('nama');
     var modal = $(this);
     modal.find('.modal-body #idhapus').val(kode);
     modal.find('.modal-body #datahapus').text(nama);
   });
 });
</script>
@endpush