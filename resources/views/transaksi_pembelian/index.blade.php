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
          <form class="form-horizontal form-label-left">
          <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                    <label class="control-label col-md-4" for="kodePembelian">Kode Pembelian <span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" readonly id="kodePembelian" required="required" class="form-control " value="{{$kode}}" >
                    </div>
                  </div>
          <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label class="control-label col-md-4" for="first-name">Tanggal <span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" id="first-name2" required="required" class="form-control" value="{{ date('Y-m-d')}}">
                    </div>
                  </div>
          <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                    <label class="control-label col-md-4 " >
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <button type="button" class="btn btn-primary" id="tambahBarangBtn" 
                    data-toggle="modal" data-target="#tblBarangModal"><span class="fa fa-plus"></span> Tambah Barang</button>
                    </div>
                  </div>
          <div class="form-group col-md-6 col-sm-6 col-xs-12 ">
                    <label class="control-label col-md-4" for="first-name">Toko/Distributor <span class="required">:</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select required="required" name="" id="" class="form-control">
                          @foreach ($pemasok as $p)
                          <option value="{{$p->id}}">{{$p->nama_pemasok}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('transaksi_pembelian/formTransaksi')
  </div>
  </div>
<!-- /page content -->

@include('transaksi_pembelian/form')
@endsection
@push('js')
<script>
  var totalHarga = 0;
  function tambahBarang(a){
    let d = $(a).closest('tr');
    let kodeBarang = d.find('td:eq(1)').text();
    let namaBarang = d.find('td:eq(2)').text();
    let hargaBarang = d.find('td:eq(3)').text();
    let data = '';
    let tbody = $('#tblTransaksi tbody tr td').text();
    data += '<tr>';
    data += '<td>'+kodeBarang+'</td>';
    data += '<td>'+namaBarang+'</td>';
    data += '<td>'+hargaBarang+'</td>';
    data += '<td><input type="number" value="1" min="1" class="qty"></td>';
    data += '<td><span class="subTotal">'+hargaBarang+'</span></td>';
    data += '<td><button type="button" class="btnRemoveBarang"><span class="fa fa-remove"></span></button></td>';
    data += '</tr>';
    if(tbody == 'Belum Ada Data') $('#tblTransaksi tbody tr').remove();

    $('#tblTransaksi tbody').append(data);
    totalHarga += parseFloat(hargaBarang);
    $('#totalharga').val(totalHarga);
    $('#tblBarangModal').modal('hide');
    
  }
  function calcSubTotal(a){
    let qty = parseInt($(a).closest('tr').find('.qty').val());
    let hargaBarang = parseFloat($(a).closest('tr').find('td:eq(2)').text());
    let subTotalAwal = parseFloat($(a).closest('tr').find('.subTotal').text());
    let subTotal = qty * hargaBarang;
    totalHarga += subTotal - subTotalAwal;
    $(a).closest('tr').find('.subTotal').text(subTotal);
    $('#totalharga').val(totalHarga);
    
  }
  $(function(){
    $('#tblBarang2').DataTable();

    //pemilihan barang
    $('.tambahBarangBtn').on('click',function(){
      tambahBarang(this);
    });

    //change qty event
    $('#tblTransaksi').on('change','.qty',function(){
      calcSubTotal(this);
    });

    $('#tblTransaksi').on('click','.btnRemoveBarang',function(){
      let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
      totalHarga -= subTotalAwal;
      $currentRow = $(this).closest('tr').remove();
      $('#totalHarga').val(totalHarga);
      
      
    });
});
</script>
@endpush