@extends('templates/header')
@section('content')
<!-- page content -->
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Transaksi Pembelian</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pembelian</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('transaksi_pembelian') }}" class="form-horizontal form-label-left"
                        method="post">
                        {{ csrf_field() }}
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label class="control-label col-md-4" for="kodePembelian">Kode Pembelian <span
                                    class="required">:</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" readonly id="kodePembelian" name="kode_masuk" required="required"
                                    class="form-control " value="{{$kode}}">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <label class="control-label col-md-4" for="first-name">Tanggal <span
                                    class="required">:</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="first-name2" name="tanggal_masuk" required="required"
                                    class="form-control" value="{{ date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label class="control-label col-md-1 "></label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <button type="button" class="btn btn-primary" id="tambahBarangBtn" data-toggle="modal"
                                    data-target="#tblBarangModal"><span class="fa fa-plus"></span> Tambah
                                    Barang</button>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-warning"><a href="#" style="color:white">
                                        <spanclass="fa fa-clock-o"></span> History Pembelian
                                    </a></button>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <label class="control-label col-md-4" for="first-name">Toko/Distributor
                                <spanclass="required">:</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required="required" name="pemasok_id" id="" class="form-control">
                                    @foreach ($pemasok as $p)
                                    <option value="{{$p->id}}">{{$p->nama_pemasok}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                            <input type="hidden" name="user_id" value="1" class="form-control">
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Barang</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                            class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div>
                <table id="tblTransaksi" class="table table-stripped table-bordered bulk_action">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" style="text-align:center;font-style:italic">Belum Ada Data</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row" style="text-align: center;">
                    <div class="form-group col-md-14">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-0" style="text-align:right;">
                            <label class="control-label col-md-9 col-xs-5">Total Harga : &nbsp;<b>Rp.</b></label>
                            <div class="col-md-3 col-sm-3 col-xs-7"
                                style="text-align:right;margin-right:0;padding-right:0">
                                <input type="text" name="total" readonly class="form-control col-md-4 col-xs-12"
                                    id="totalharga" required value="0">
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:right;margin-right:0;padding-right:0">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan
                                Transaksi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
<!-- /page content -->

@include('transaksi_pembelian/form')
@endsection
@push('js')
<script>
    var totalHarga = 0;

    function tambahBarang(a) {
        let row = $(a).closest('tr');
        let kodeBarang = row.find('td:eq(1)').text();
        let namaBarang = row.find('td:eq(2)').text();
        let hargaJual = row.find('td:eq(3)').text();
        let barangId = row.find('.barangId').val();

        let nbORder = document.getElementsByClassName('nbOrder');
            for (let i = 0; i < nbORder.length ; i++){
                if(nbORder[i].innerText == namaBarang){
                    Swal.fire({
                    icon: 'error',
                    title: 'Data Sudah Ada',
                    })
                    $('tblBarangModal').modal('hide');
                    return;
                }
            }
        let newData = '';
        let tbody = $('#tblTransaksi tbody tr td').text();
        newData += `<tr>
                    <td>${kodeBarang}</td>
                    <td class="nbOrder">${namaBarang}</td>
                    <input type="hidden" name="barang_id">${barangId}
                    <td><input type="number" readonly class="form-control input-sm hargaJual" name="harga_beli" value="${hargaJual}"></td>
                    <td style="width: 150px;">
                        <div class="input-group">
                            <input type="number" name="jumlah" value="1" min="1" max="100" class="form-control input-sm qty">
                        </div>
                    </td>
                    <td><input type="number" value="${hargaJual}" name="sub_total" readonly class="form-control input-sm subTotal"></td>
                    <td><button type="button" class="btn btn-danger btn-sm btnRemoveBarang"><i class="fa fa-trash"></i></button></td>
                </tr>`;
        if (tbody == 'Belum Ada Data') $('#tblTransaksi tbody tr').remove();
        else;

        $('#tblTransaksi tbody').append(newData);
        totalHarga = totalHarga + parseFloat(hargaJual);
        $('#totalharga').val(totalHarga);
        $('#tblBarangModal').modal('hide');
        toastr.success('<h5>Success Tambah Barang!</h5>');

    }

    function calcSubTotal(a) {
        let qty = parseInt($(a).closest('tr').find('.qty').val());
        let hargaJual = parseFloat($(a).closest('tr').find('.hargaJual').val());
        let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').val());
        let subTotal = qty * hargaJual;
        totalHarga += subTotal - subTotalAwal;
        $(a).closest('tr').find('.subTotal').val(subTotal);
        $('#totalharga').val(totalHarga);

    }
    $(function () {
        $('#tblBarang2').DataTable();

        //pemilihan barang
        $('#tblBarangModal').on('click', '#pilihbarang', function () {
            tambahBarang(this);
        });

        function attributeDisabledQTY(param) {
            let minValue = parseInt($(param).attr('min'));
            let maxValue = parseInt($(param).attr('max'));
            let currentValue = parseInt($(param).val());

            if (currentValue >= minValue) {
                $('.btn-number[data-type="minus"]').removeAttr('disabled');
            }
            if (currentValue <= maxValue) {
                $('.btn-number[data-type="plus"]').removeAttr('disabled');
            }
        }
        //change qty event
        $('#tblTransaksi').on('change', '.qty', function () {
            if (isNaN($(this).val()) || $(this).val() < 1) {
                $(this).val('1');
            } else {
                calcSubTotal(this);
                attributeDisabledQTY(this);
            }
        });

        $('#tblTransaksi').on('click', '.btnRemoveBarang', function () {
            let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').val());
            totalHarga -= subTotalAwal;
            $(this).closest('tr').remove();
            $('#totalharga').val(totalHarga);
        });
    });

</script>
@endpush
