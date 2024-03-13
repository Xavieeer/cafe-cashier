{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formKaryawanEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="karyawan" class="form-edit">
          @csrf
          @method('put')

          <div class="form-group row">
            <label for="nip" class="col-sm-2 col-form-label">Nip</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nip" value="" name="nip" placeholder="Nomor Induk Pegawai">
            </div>
          </div>

          <div class="form-group row">
            <label for="nik" class="col-sm-2 col-form-label">Nip</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nik" value="" name="nik" placeholder="Nomor Induk Keluarga">
            </div>
          </div>

          <div class="form-group row">
            <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" value="" name="nama" placeholder="Nama Karyawan">
            </div>
          </div>

          <div class="form-group row">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <select id="jenis_kelamin" placeholder="jenis_kelamin" name="jenis_kelamin" class="col-sm-8 form-control">
              <option selected disabled>Jenis Kelamin</option>
              <option value="laki - laki">Laki - Laki</option>
              <option value="perempuan">Perempuan</option>
          </select>
          </div>

          <div class="form-group row">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="tempat_lahir" value="" name="tempat_lahir" placeholder="Tempat Lahir">
            </div>
          </div>

          <div class="form-group row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_lahir" value="" name="tanggal_lahir" placeholder="Tanggal Lahir">
            </div>
          </div>

          <div class="form-group row">
            <label for="telpon" class="col-sm-2 col-form-label">Nomor Telepon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="telpon" value="" name="telpon" placeholder="Nomor Telepon">
            </div>
          </div>

          <div class="form-group row">
            <label for="agama" class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="agama" value="" name="agama" placeholder="Agama">
            </div>
          </div>

          <div class="form-group row">
            <label for="status_nikah" class="col-sm-2 col-form-label">Status Nikah</label>
            <select id="status_nikah" placeholder="status_nikah" name="status_nikah" class="col-sm-8 form-control">
              <option selected disabled>Jenis Kelamin</option>
              <option value="nikah">Sudah Menikah</option>
              <option value="belum nikah">Belum menikah</option>
          </select>
          </div>

          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alamat" value="" name="alamat" placeholder="Alamat">
            </div>
          </div>

          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="foto" value="" name="foto" placeholder="Foto">
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