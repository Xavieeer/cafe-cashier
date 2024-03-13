{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formPelangganEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="pelanggan" class="form-edit">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="nama" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" value="" name="nama" placeholder="Nama">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" value="" name="email" placeholder="email">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="nomor_telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nomor_telepon" value="" name="nomor_telepon" placeholder="Nomor Telepon">
              </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="alamat" value="" name="alamat" placeholder="alamat">
                </div>
              </div>
    
  
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>