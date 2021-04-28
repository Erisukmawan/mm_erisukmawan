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
                    <h2>
                        <!-- button tambah  -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalbarang">
                            <i class="fa fa-plus"></i>
                        </button>
                        Tambah Data Barang
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @include('templates/feedback')
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
                                <td>@currency($data->harga_jual)</td>
                                <td>{{ $data->stock }}</td>
                                <td><a href="#edit" data-toggle="modal" data-target="#modalbarang" data-mode="edit"
                                        data-kode="{{ $data->kode_barang }}" data-nama="{{ $data->nama_barang }}"
                                        data-produk="{{ $data->produk_id }}" data-satuan="{{ $data->satuan }}"
                                        data-harga="{{ $data->harga_jual }}" data-stock="{{ $data->stock }}"><span
                                            class="fa fa-edit" style="color:blue;"></span></a> |
                                    <a href="#hapus" data-toggle="modal" data-target="#modalhapus"
                                        data-kode="{{ $data->kode_barang }}" data-nama="{{ $data->nama_barang }}"><span
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
<!-- /page content -->
@include('data_barang/form')
@endsection
@push('js')
<script>
    $(function () {
        $('#dt-barang').DataTable();
        $('#modalbarang').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var kode = button.data('kode');
            var mode = button.data('mode');
            var produk = button.data('produk');
            var nama = button.data('nama');
            var satuan = button.data('satuan');
            var harga = button.data('harga');
            var stock = button.data('stock');
            var modal = $(this);
            if(mode == 'edit') {
                modal.find('.modal-title').text('Edit Data Barang');
                modal.find('.modal-body #inputKode').val(kode);
                modal.find('.modal-body #inputNama').val(nama);
                modal.find('.modal-body #inputProduk').val(produk);
                modal.find('.modal-body #inputSatuan').val(satuan);
                modal.find('.modal-body #inputHarga').val(harga);
                modal.find('.modal-body #inputStock').val(stock);
                modal.find('.modal-body #method').html('{{ method_field('patch') }}');
            }else{
                modal.find('.modal-title').text('Tambah Data Barang');
                modal.find('.modal-body #inputKode').val('{{$kode}}');
                modal.find('.modal-body #inputNama').val('');
                modal.find('.modal-body #inputProduk').val('');
                modal.find('.modal-body #inputSatuan').val('');
                modal.find('.modal-body #inputharga').val('');
                modal.find('.modal-body #inputStock').val('');
                modal.find('.modal-body #method').html("");
            }
        });

        $('#modalhapus').on('show.bs.modal', function (event) {
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
