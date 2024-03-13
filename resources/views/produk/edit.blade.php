{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Launch static backdrop modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="formProdukEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Data Produk Titipan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="produk" class="form-edit">
            @csrf
            @method('put')
  
            <div class="form-group row">
              <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama_produk" value="" name="nama_produk" placeholder="Nama produk">
              </div>
            </div>

            <div class="form-group row">
                <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="nama_supplier" value="" name="nama_supplier" placeholder="Nama Supplier">
                </div>
              </div>

              <div class="form-group row">
                <label for="harga_beli" class="col-sm-2 col-form-label">Harga Beli</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="harga_beli" value="" name="harga_beli" placeholder="Harga Beli">
                </div>
              </div>

              <div class="form-group row">
                <label for="harga_jual" class="col-sm-2 col-form-label">Harga Jual</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="harga_jual" value="" name="harga_jual" placeholder="Harga Jual">
                </div>
              </div>

              <div class="form-group row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="stok" value="" name="stok" placeholder="Stok Data Produk Titipan">
                </div>
              </div>

              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="keterangan" value="" name="keterangan" placeholder="Keterangan Data Produk Titipan">
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