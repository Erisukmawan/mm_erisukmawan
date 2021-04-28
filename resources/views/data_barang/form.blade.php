<!-- Modal -->
<div class="modal fade" id="modalbarang" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" role="dialog" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="formModalLabel">Tambah Data Barang</h5>
            </div>
            <div class="modal-body">
                <form action="{{ url('databarang') }}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div id="method"></div>
                    <div class="form-group row">
                        <label for="inputKode" class="col-sm-3 col-form-label">Kode Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputKode" name="kode_barang" required value=""
                                readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputProduk" class="col-sm-3 col-form-label">Produk Id</label>
                        <div class="col-sm-9">
                            <select name="produk_id" id="inputProduk" class="form-control select2" style="width: 100%;">
                                @foreach ($produk as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNama" class="col-sm-3 col-form-label">Nama Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputNama" name="nama_barang" required
                                placeholder="Masukan Nama Barang..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputSatuan" class="col-sm-3 col-form-label">Satuan</label>
                        <div class="col-sm-9">
                            <select name="satuan" class="form-control" id="inputSatuan">
                                <option value="BOX">BOX</option>
                                <option value="PCS">PCS</option>
                                <option value="1 Liter">1 Liter</option>
                                <option value="1 Kg">1 Kg</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHarga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputHarga" name="harga_jual" required
                                placeholder="Masukan Harga Jual..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStock" class="col-sm-3 col-form-label">Stock</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputStock" name="stock" required
                                placeholder="Masukan Jumlah Stock..">
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
                <form action="{{url('databarang')}}" method="post">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <input type="hidden" name="id" id=idhapus>
                    Apakah Anda Yakin Ingin Menghapus <b id="datahapus"></b> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success">Iya</button>
            </div>
            </form>
        </div>
    </div>
</div>
