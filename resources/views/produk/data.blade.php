<table class="table table-compact table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Nama Supplier</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Stok</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($produk as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_produk}}</td>
          <td>{{ $p->nama_supplier}}</td>
          <td>{{ $p->harga_beli}}</td>
          <td>{{ $p->harga_jual}}</td>
          <td class="double-click" data-produk-id="{{$p->id}}">{{ $p->stok}}</td>
          <td>{{ $p->keterangan}}</td>
         
          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formProdukEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nama_produk="{{ $p->nama_produk}}" 
              data-nama_supplier="{{ $p->nama_supplier}}" 
              data-harga_beli="{{ $p->harga_beli}}" data-harga_jual="{{ $p->harga_jual}}"
              data-stok="{{ $p->stok}}"
              data-keterangan="{{ $p->keterangan}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="produk/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" 
                  data-nama_produk="{{ $p->nama_produk}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>