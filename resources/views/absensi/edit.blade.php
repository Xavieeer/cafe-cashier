<!-- Modal -->
<div class="modal fade" id="formAbsensiEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Absensi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="absensi" class="form-edit">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_karyawan" value="" name="nama_karyawan" placeholder="Nama Karyawan">
                </div>
            </div>
            
            <div class="form-group row">
              <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal_masuk" value="" name="tanggal_masuk" placeholder="Tanggal Masuk">
              </div>
            </div>

            <div class="form-group row">
                <label for="waktu_masuk" class="col-sm-2 col-form-label">Waktu Masuk</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" id="waktu_masuk" value="" name="waktu_masuk" placeholder="Waktu Masuk">
                </div>
              </div>

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status Masuk</label>
                <select id="status" placeholder="status" name="status" class="col-sm-8 form-control">
                  <option selected disabled>Status</option>
                  <option value="sakit">Sakit</option>
                  <option value="masuk">Masuk</option>
                  <option value="cuti">Cuti</option>
              </select>
              </div>

              <div class="form-group row">
                <label for="waktu_keluar" class="col-sm-2 col-form-label">Waktu Keluar</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" id="waktu_keluar" value="" name="waktu_keluar" placeholder="Waktu Keluar">
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