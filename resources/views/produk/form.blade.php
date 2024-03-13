 <!-- Modal -->
 <div class="modal fade" id="modalFormProduk" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Produk Titipan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('produk.store') }}">
            @csrf

            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk">
            </div>

            <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Nama Supplier" name="nama_supplier">
            </div>

            <label for="harga_beli" class="col-sm-4 col-form-label">Harga Beli</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Harga Beli" name="harga_beli">
            </div>

            <label for="harga_jual" class="col-sm-4 col-form-label">Harga Jual</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Harga Jual" name="harga_jual">
            </div>

            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Stok Data Produk Titipan" name="stok">
            </div>

            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Keterangan Data Produk Titipan" name="keterangan">
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
       <h5 class="modal-title" id="exampleModalLabel">Import Data Produk Titipan</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
      <form method="POST" action="{{ route('import-produk') }}" enctype="multipart/form-data">
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