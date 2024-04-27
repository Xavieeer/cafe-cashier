<!-- Modal Tambah Stok -->
<div class="modal fade" id="modalFormStok" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Stok</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('stok.store') }}">
                  @csrf
                  @method('POST')

                  <div class="form-group row">
                      <label for="menu_id" class="col-sm-4 col-form-label">Nama Menu</label>
                      <div class="col-sm-8">
                          <select name="menu_id" id="menu_id" class="form-control">
                              <option value="" selected disabled>Pilih Menu</option>
                              @foreach ($menu as $j)
                              <option value="{{ $j->id }}">{{$j->nama_menu}}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>

                  <div class="form-group row">
                      <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Jumlah" name="jumlah">
                      </div>
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>
      </div>
  </div>
</div>

<!-- Modal Import Data Stok -->
<div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data Stok</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form method="POST" action="{{ route('import-stok') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                      <div class="form-group">
                          <label for="menu">File Excel</label>
                          <input type="file" name="import" id="import">
                      </div>
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="btn-submit">Upload</button>
          </div>
          </form>
      </div>
  </div>
</div>
