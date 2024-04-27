{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formStokEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <form method="post" action="stok" class="form-edit">
          @csrf
          @method('PUT')

          <div class="form-group row">
            <label for="menu_id" class="col-sm-4 col-form-label">Nama Menu</label>
            <div class="col-sm-8">
              <select name="menu_id" id="menu_id" class="form-control">
                <option value="" selected disabled>Pilih Menu</option>
                @foreach ($menu as $j)
                <option value="{{ $j->id }}">{{$j->nama_menu}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group row">
          <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Stok</label>
          <div class="col-sm-9">
              <input type="text" class="form-control" id="jumlah" value="" name="jumlah" placeholder="Jumlah Stok">
          </div>
          </div>
          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </form>
    </div>
  </div>
</div>