<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" role="dialog" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="formModalLabel">Tambah Data Pemasok</h5>
      </div>
      <div class="modal-body">
        <form action="{{ url('penarikanbarang') }}" class="form-horizontal" method="post">
        {{csrf_field()}}
        <div id="method"></div>
        <div class="form-group row">
            <label for="inputKode" class="col-sm-3 col-form-label">Kode Barang</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputKode" name="kode_barang" value="{{$kode}}" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNama" class="col-sm-3 col-form-label">Nama Barang</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputNama" name="nama_barang" placeholder="Masukan Nama Barang">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputAlamat" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="inputTanggal" name="tanggal_expire" placeholder="Masukan Alamat ..">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputKota" class="col-sm-3 col-form-label">Qty</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputQty" name="qty" placeholder="Masukan Qty ..">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9">
              <input type="hidden" class="form-control" id="inputStatus" name="status" placeholder="Masukan Status" value="0">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- delete modal -->
<div class="modal fade" id="formHapus" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('penarikanbarang')}}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <input type="hidden" name="id_hapus" id="idHapus">
        Apakah Anda Yakin Ingin Menghapus <b id="dataHapus"></b> ?
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-success">Iya</button>
      </div>
      </form>
    </div>
  </div>
</div>