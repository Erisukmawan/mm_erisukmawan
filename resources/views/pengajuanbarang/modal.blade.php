<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" role="dialog" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="formModalLabel">Tambah Data Pengajuan</h5>
            </div>
            <div class="modal-body">
                <form action="{{ url('pengajuan_barang') }}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 col-form-label">Nama Pengajuan</label>
                        <div class="col-sm-9">
                        <select name="nama_pengajuan" id="inputNamaPengajuan" class="form-control select2" style="width: 100%;">
                            <!-- <input type="text" class="form-control" id="inputNama" name="nama_barang" required placeholder="Masukan Nama Barang"> -->
                            <!-- <input type="text" autocomplete="off" id="pengajuan_barang" name="nama_pengajuan" -->
                                <!-- class="form-control" placeholder="Nama Barang Otomatis terisi"> -->
                                @foreach ($pelanggan as $key => $value)
                                <option value="{{ $value->nama}}">{{ $key + 1 }} - {{ $value->nama }}</option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                        <select name="nama_barang" id="inputNama" class="form-control select2" style="width: 100%;">
                        <option value="" disabled>== Masukkan Nama Pengajuan ==</option>
                                @foreach ($barang as $key => $value)
                                <option value="{{ $value->nama_barang}}">{{ $key + 1 }} - {{ $value->nama_barang}}
                                </option>
                                @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAlamat" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputTanggal" name="tanggal_pengajuan" required
                                placeholder="Masukan Tanggal ..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputKota" class="col-sm-3 col-form-label">Qty</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputQty" name="qty" required
                                placeholder="Masukan Qty ..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="inputStatus" name="status"
                                placeholder="Masukan Status" value="1">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
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
                <form action="{{url('pengajuan_barang')}}" method="post">
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

<!-- delete modal -->
<div class="modal fade" id="exportmodal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" style="text-align:center;margin-right:0;padding-right:0" id="formModalLabel">
                    Export Data</h2>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-6 col-xs-12" style="text-align:center;margin-right:0;padding-right:0">
                        <div class="col-md-12 col-sm-9 col-xs-12">
                            <a href="penarikanbarang/export/"><button type="button" class="btn btn-success"><span
                                        class="fa fa-file"></span> Export XLS</button></a>
                            <a href="penarikanbarang/pdf/"><button type="button" class="btn btn-success"><span
                                        class="fa fa-file"></span> Export PDF</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
