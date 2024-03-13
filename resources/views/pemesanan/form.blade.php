
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormPemesanan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data pemesanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('pemesanan.store') }}">
            @csrf
            <label for="tanggal_pemesanan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" placeholder="Tanggal Pemesanan" name="tanggal_pemesanan">
            </div>
            
            <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Jam Mulai" name="jam_mulai">
            </div>
            
            <label for="jam_selesai" class="col-sm-2 col-form-label">jam Selesai</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Jam Selesai" name="jam_selesai">
            </div>

            <label for="nama_pemesan" class="col-sm-4 col-form-label">Nama Pemesan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Pemesan" name="nama_pemesan">
            </div>

            <label for="jumlah_pelanggan" class="col-sm-4 col-form-label">Jumlah Pelanggan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Jumlah Pelanggan" name="jumlah_pelanggan">
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