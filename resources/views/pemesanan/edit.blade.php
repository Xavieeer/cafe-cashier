{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formPemesananEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Data Pemesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="pemesanan" class="form-edit">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="tanggal_pemesanan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal_pemesanan" value="" name="tanggal_pemesanan" placeholder="tangggal Pemesanan">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="jam_mulai" value="" name="jam_mulai" placeholder="Jam Mulai">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="jam_selesai" value="" name="jam_selesai" placeholder="Jam Selesai">
              </div>
            </div>

            <div class="form-group row">
                <label for="nama_pemesan" class="col-sm-2 col-form-label">Nama Pemesan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_pemesan" value="" name="nama_pemesan" placeholder="Nama Pemesan">
                </div>
              </div>

              <div class="form-group row">
                <label for="jumlah_pelanggan" class="col-sm-2 col-form-label">Jumlah Pelanggan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="jumlah_pelanggan" value="" name="jumlah_pelanggan" placeholder="Jumlah Pelanggan">
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