
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormKaryawan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Karyawan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('karyawan.store')}}">
            @csrf
            <label for="nip" class="col-sm-2 col-form-label">Nip</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nomor Induk Pegawai" name="nip">
            </div>
            
            <label for="nik" class="col-sm-2 col-form-label">Nik</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nomor Induk Keluarga" name="nik">
            </div>
            
            <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Karyawan" name="nama">
            </div>

            
           <div>
            <label for="jenis_kelamin" class="mg-2">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="col-sm-8 form-control">
                <option selected disabled>Jenis Kelamin</option>
                <option value="laki - laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            </div>

            <label for="tempat_lahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir">
            </div>

            <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir">
            </div>

            <label for="telpon" class="col-sm-4 col-form-label">Telepon</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nomor Telepon" name="telpon">
            </div>

            <label for="agama" class="col-sm-4 col-form-label">Agama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Agama" name="agama">
            </div>

            <div>
                <label for="status_nikah" class="mg-2">Status Nikah</label>
                <select name="status_nikah" id="status_nikah">
                    <option selected disabled>status Nikah</option>
                    <option value="nikah">Sudah Menikah</option>
                    <option value="belum nikah">Belum Menikah</option>
                </select>
                </div>

                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Alamat" name="alamat">
            </div>

            <label for="foto" class="col-sm-4 col-form-label">Foto</label>
            <div class="col-sm-9">
                <input type="text " class="form-control" placeholder="Foto" name="foto">
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
       <h5 class="modal-title" id="exampleModalLabel">Import Data Karyawan</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="{{ route('import-karyawan') }}" enctype="multipart/form-data">
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