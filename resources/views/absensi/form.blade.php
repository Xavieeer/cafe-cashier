
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormAbsensi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Absensi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('absensi.store')}}">
            @csrf

            <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama_karyawan">
            </div>

            <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk">
            </div>

            <label for="waktu_masuk" class="col-sm-2 col-form-label">Waktu Masuk</label>
            <div class="col-sm-9">
                <input type="time" class="form-control" placeholder="HH : MM" name="waktu_masuk">
            </div>

            <div>
                <label for="status" class="mg-2">Status Kehadiran</label>
                <select name="status" id="status" class="col-sm-9 form-control">
                    <option selected disabled>Status</option>
                    <option value="sakit">Sakit</option>
                    <option value="masuk">Masuk</option>
                    <option value="cuti">Cuti</option>
                </select>
                </div>

                <label for="waktu_keluar" class="col-sm-2 col-form-label">Waktu Keluar</label>
            <div class="col-sm-9">
                <input type="time" class="form-control" placeholder="HH : MM" name="waktu_keluar">
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