<!-- Modal -->
<div class="modal fade" id="formMenuEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="menu" class="form-edit" enctype="multipart/form-data">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama_menu" value="" name="nama_menu" placeholder="Nama Menu">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="harga" class="col-sm-2 col-form-label">Harga</label>
              <div class="col-sm-9">
                <input type="number" class="form-control" id="harga" value="" name="harga" placeholder="Harga">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="image" class="col-sm-2 col-form-label">Image</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" id="image" value="" name="image" placeholder="Image">
              </div>
            </div>

            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-9">
                  <textarea class="text" class="form-control" id="deskripsi" value="" name="deskripsi" placeholder="Deskripsi" rows="4" cols="50"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label for="jenis_id" class="col-sm-4 col-form-label">Nama Menu</label>
                <div class="col-sm-8">
                  <select name="jenis_id" id="jenis_id" class="form-control">
                    <option value="" selected disabled>Jenis</option>
                    @foreach ($jeni as $j => $label)
                    <option value="{{ $j }}">{{ $label }}</option>
                    @endforeach
                  </select>
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