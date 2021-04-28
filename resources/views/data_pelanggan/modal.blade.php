<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" role="dialog" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="formModalLabel">Tambah Data Pelanggan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ url('datapelanggan') }}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="inputKode" class="col-sm-3 col-form-label">Kode Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputKode" require name="kode_pelanggan"
                                value="{{$kode}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputNama" name="nama" required
                                placeholder="Masukan Nama Pelanggan ..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAlamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="inputAlamat" name="alamat" required
                                placeholder="Masukan Alamat ..">
              </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputTelp" class="col-sm-3 col-form-label">Telephone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputTelp" name="no_telp" required
                                placeholder="Masukan Telephone Aktif Format 08xxxxxxxxxx">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail" name="email" required
                                placeholder="Masukan Kota ..">
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
<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('datapelanggan')}}" method="post">
                    <div class="modal-body">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="hidden" name="id_hapus" id=idhapus>
                        Apakah Anda Yakin Ingin Menghapus <b id="datahapus"></b> ?
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success">Iya</button>
            </div>
            </form>
        </div>
    </div>
</div>
