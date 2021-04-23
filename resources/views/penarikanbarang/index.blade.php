@extends('templates/header')
@section('content')

<!-- page content -->
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Data Penarikan Barang Kadaluarsa</h3>
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
            Tambah Pengajuan
            &nbsp;&nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportmodal">
            <i class="fa fa-print"></i>
            </button>
            Export Data
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
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Tanggal</th>
                  <th>Qty</th>
                  <th>Ditarik ?</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($result as $data)
                <tr>
                  <th>{{ !empty($i) ? ++$i : ($i =1) }}</th>
                  <td>{{ $data->kode_barang }}</td>
                  <td>{{ $data->nama_barang }}</td>
                  <td>{{ $data->tanggal_expire }}</td>
                  <td>{{ $data->qty }}</td>
                  <!-- <td><input id="toggle" type="checkbox" checked data-toggle="toggle" data-on="Sudah Ditarik" data-off="Belum Ditarik" data-onstyle="info" data-offstyle="danger" value="{{$data->status}}" {{ $data->status === 1 ? 'checked' : '' }}></td>  -->
                  <!-- <td><input id="switch-primary-{{$data->kode_barang}}" value="{{$data->kode_barang}}" type="checkbox" name="toggle" checked data-toggle="toggle" data-on="Sudah Ditarik" data-off="Belum Ditarik" data-onstyle="info" data-offstyle="danger" {{ $data->status === 1 ? 'checked' : '' }}> -->
                  <td><input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="primary" data-offstyle="danger" data-toggle="toggle" data-on="Sudah Ditarik" data-off="Tidak Ditarik" {{ $data->status == 1 ? 'checked' : '' }}>
                  </td>
                  <td><a href="#edit" data-toggle="modal" data-target="#formModal" data-mode="edit" 
                  data-kode="{{ $data->kode_barang }}" data-nama="{{ $data->nama_barang }}"
                  data-tanggal="{{ $data->tanggal_expire }}" data-qty="{{ $data->qty }}"><span class="fa fa-edit" style="color:blue;"></span></a> | 
                  <a href="#hapus" data-toggle="modal" data-target="#formHapus" data-kode="{{ $data->kode_barang }}" data-nama="{{ $data->nama_barang }}" ><span class="fa fa-trash" style="color:red"></span></a>
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
  </div>
<!-- /page content -->
@include('penarikanbarang/modal')
@endsection

@push('js')

<script>
 $(function(){
  $('.toggle-class').change(function(event) {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: 'penarikanbarang/updateStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
  });  

   $('#formModal').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget);
     var kode = button.data('kode');
     var mode = button.data('mode');
     var nama = button.data('nama');
     var tanggal = button.data('tanggal');
     var qty = button.data('qty');
     var modal = $(this);
     if(mode == 'edit'){
       modal.find('.modal-title').text('Edit Pengajuan');
       modal.find('.modal-body #inputKode').val(kode);
       modal.find('.modal-body #inputNama').val(nama);
       modal.find('.modal-body #inputTanggal').val(tanggal);
       modal.find('.modal-body #inputQty').val(qty);
       modal.find('.modal-body #method').html('{{ method_field('patch') }}');
     }else{
       modal.find('.modal-title').text('Tambah Pengajuan');
       modal.find('.modal-body #inputKode').val('{{$kode}}');
       modal.find('.modal-body #inputNama').val('');
       modal.find('.modal-body #inputTanggal').val('');
       modal.find('.modal-body #inputQty').val('');
       modal.find('.modal-body #method').html("");
     }
   });

   $('#formHapus').on('show.bs.modal', function(event){
     var button = $(event.relatedTarget);
     var kode = button.data('kode');
     var nama = button.data('nama');
     var modal = $(this);
     modal.find('.modal-body #idHapus').val(kode);
     modal.find('.modal-body #dataHapus').text(nama);
   });
 });
</script>
@endpush