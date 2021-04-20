<!-- Modal -->
<div class="modal fade" id="tblBarangModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <table id="tblBarang2" class="table table-stripped table-compact">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($barang as $b)
            <tr>
              <td>{{ $i= (!isset($i)?1:++$i)}}</td>
              <td>{{$b->kode_barang}}</td>
              <td>{{$b->nama_barang}}</td>
              <td>{{$b->harga_jual}}</td>
              <td><button class="tambahBarangBtn"> Pilih</button></td>
            </tr>
            @endforeach
          </tbody>
      </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>