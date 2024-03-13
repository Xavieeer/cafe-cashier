
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormJenis" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('jenis.store')}}">
            @csrf
            <label for="nama_jenis" class="col-sm-2 col-form-label">Nama Jenis</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Jenis" name="nama_jenis">
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
       <h5 class="modal-title" id="exampleModalLabel">Import Data Jenis</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="{{ route('import-jenis') }}" enctype="multipart/form-data">
       @csrf
       <div class="card-body">
         <div class="form-group">
           <label for="jenis">File Excel</label>
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