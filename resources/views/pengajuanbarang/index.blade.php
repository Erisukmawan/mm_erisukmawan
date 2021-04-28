@extends('templates/header')
@section('content')

<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Data Pegajuan Barang</h3>
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
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:right;margin-right:0;padding-right:0">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <button type="button" id="btn-export-xls" class="btn btn-success"><span class="fa fa-print"></span> Export XLS</button>
                            <a href="pengajuan_barang/cetak_pdf"><button type="button" class="btn btn-success"><span class="fa fa-print"></span> Export PDF</button></a>
                        </div>
                    </div>
                </div>
                    @include('templates/feedback')
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengajuan</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Qty</th>
                                <th>Terpenuhi ?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($result as $data)
                            <tr>
                                <th>{{ !empty($i) ? ++$i : ($i =1) }}</th>
                                <td>{{ $data->nama_pengajuan }}</td>
                                <td>{{ $data->nama_barang }}</td>
                                <td>{{ $data->tanggal_pengajuan }}</td>
                                <td>{{ $data->qty }}</td>
                                <!-- <td><input id="toggle" type="checkbox" checked data-toggle="toggle" data-on="Sudah Ditarik" data-off="Belum Ditarik" data-onstyle="info" data-offstyle="danger" value="{{$data->status}}" {{ $data->status === 1 ? 'checked' : '' }}></td>  -->
                                <!-- <td><input id="switch-primary-{{$data->kode_barang}}" value="{{$data->kode_barang}}" type="checkbox" name="toggle" checked data-toggle="toggle" data-on="Sudah Ditarik" data-off="Belum Ditarik" data-onstyle="info" data-offstyle="danger" {{ $data->status === 1 ? 'checked' : '' }}> -->
                                <td><input data-id="{{$data->id}}" class="toggle-class" type="checkbox"
                                        data-onstyle="primary" data-offstyle="danger" data-toggle="toggle"
                                        data-on="Sudah Terpenuhi" data-off="Tidak Terpenuhi"
                                        {{ $data->status == 1 ? 'checked' : '' }}>
                                </td>
                                <td><a href="#edit" data-toggle="modal" data-target="#formModal" data-mode="edit"
                                        data-id="{{$data->id}}"
                                        data-namap="{{ $data->nama_pengajuan}}" data-nama="{{ $data->nama_barang }}"
                                        data-tanggal="{{ $data->tanggal_pengajuan }}" data-qty="{{ $data->qty }}"><span
                                            class="fa fa-edit" style="color:blue;"></span></a> |
                                    <a href="#hapus" data-toggle="modal" data-target="#formHapus"
                                        data-id="{{ $data->id }}" data-nama="{{ $data->nama_barang }}"><span
                                            class="fa fa-trash" style="color:red"></span></a>
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
@include('pengajuanbarang/modal')
@endsection

@push('js')

<script>
    $(function(){
        $('#btn-export-xls').on('click',function(e) {
            window.location = '{{ url("pengajuan/export/xls") }}';
        });
        $('.toggle-class').change(function(event){
            var status = $(this).prop('checked') == true ? 1 : 0;
            var pengajuan_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeStatus',
                data: {'status': status,'pengajuan_id': pengajuan_id },
                success: function(data){
                    console.log(data.success)
                }
            });
        });
        $('#formModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var namap = button.data('namap');
            var mode = button.data('mode');
            var nama = button.data('nama');
            var id = button.data('id');
            var tanggal = button.data('tanggal');
            var qty = button.data('qty');
            var modal = $(this);
            if(mode == 'edit'){
                modal.find('.modal-title').text('Edit Pengajuan');
                modal.find('.modal-body #inputNamaPengajuan').val(namap);
                modal.find('.modal-body #inputNamaBarang').val(nama);
                modal.find('.modal-body #inputTanggal').val(tanggal);
                modal.find('.modal-body #inputQty').val(qty);
                modal.find('.modal-body #method').html('{{method_field("PUT")}}<input type="hidden" id="id" name="id" value="'+id+'">');
            }else{
                modal.find('.modal-title').text('Tambah Pengajuan');
                modal.find('.modal-body #inputNamaPengajuan').val('');
                modal.find('.modal-body #inputNamaBarang').val('');
                modal.find('.modal-body #inputTanggal').val('');
                modal.find('.modal-body #inputQty').val('');
                modal.find('.modal-body #method').html("");
            }
        });

        $('#formHapus').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var nama = button.data('nama');
            var modal = $(this);
            modal.find('.modal-body #idHapus').val(id);
            modal.find('.modal-body #dataHapus').text(nama);
        });
    });

</script>
@endpush
