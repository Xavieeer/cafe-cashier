{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formMejaEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Meja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="meja" class="form-edit">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="nomor_meja" class="col-sm-2 col-form-label">Nomor Meja</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nomor_meja" value="" name="nomor_meja" placeholder="Nomor Meja">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="kapasitas" value="" name="kapasitas" placeholder="Kapasitas Meja">
              </div>
            </div>
  
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status Meja</label>
                <select id="status" placeholder="status" name="status" class="col-sm-8 form-control">
                  <option selected disabled>Status Meja</option>
                  <option value="kosong">kosong</option>
                  <option value="penuh">penuh</option>
              </select>
              </div>
  
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>