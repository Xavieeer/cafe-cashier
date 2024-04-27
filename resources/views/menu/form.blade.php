
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormMenu" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('menu.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Menu" name="nama_menu">
            </div>
            
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Harga" name="harga">
            </div>
            
            <label for="image" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" placeholder="Image" name="image">
            </div>

            <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
            <div class="col-sm-9">
                <textarea id="deskripsi" class="form-control" placeholder="Deskripsi" name="deskripsi" rows="4" cols="50"></textarea>
            </div>

            <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
            <div class="col-sm-9">
              <select name="jenis_id" id="" class="form-control">
                @foreach ($jeni as $j => $label)
                <option value="{{ $j }}">{{ $label }}</option>
                @endforeach
              </select>
                {{-- <input type="text" class="form-control" placeholder="Jenis ID" name="jenis_id"> --}}
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

  {{-- modal Import --}}

  <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Import Data Kategori</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
     <form method="POST" action="{{ route('import-menu') }}" enctype="multipart/form-data">
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
  </div>
</div>
      </form>
  </div>