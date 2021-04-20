<!-- Modal -->
<div class="modal fade" id="modalbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <form action="{{ url('databarang') }}" class="form-horizontal" method="post">
      {{csrf_field()}}
      <div id="method"></div>
      <div class="item form-group">
      <label class="control-label col-sm-2" for="inputId">Id</label>
      <div class="col-sm-10">
        <input required type="text" name="id_pengaduan" id="inputId" class="form-control" placeholder="Masukkan Id" >
      </div>
      </div>

      <div class="item form-group">
      <label class="control-label col-sm-2" for="inputId">Id</label>
      <div class="col-sm-10">
        <input required type="text" name="id_pengaduan" id="inputId" class="form-control" placeholder="Masukkan Id" >
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>