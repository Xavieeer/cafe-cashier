
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormPelanggan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('pelanggan.store') }}">
            @csrf
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nama">
            </div>
            
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Email" name="email">
            </div>
            
            <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="nomor_telepon">
            </div>

            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
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
        <h5 class="modal-title" id="exampleModalLabel">Import Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="{{ route('import-pelanggan') }}" enctype="multipart/form-data">
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