
  
  <!-- Modal -->
  <div class="modal fade" id="modalFormMeja" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Meja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('meja.store') }}">
            @csrf
            <label for="nomor_meja" class="col-sm-2 col-form-label">Nomor Meja</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nomor Meja" name="nomor_meja">
            </div>
            
            <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas Meja</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Kapasitas Meja" name="kapasitas">
            </div>
            
            <div>
                <label for="status" class="mg-2">Status Meja</label>
                <select name="status" id="status" class="col-sm-8 form-control">
                    <option selected disabled>Status Meja</option>
                    <option value="kosong">Kosong</option>
                    <option value="penuh">Penuh</option>
                </select>
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
       <h5 class="modal-title" id="exampleModalLabel">Import Data Meja</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="{{ route('import-meja') }}" enctype="multipart/form-data">
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