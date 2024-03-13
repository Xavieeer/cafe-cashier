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
          <td>{{ $p->stok}}</td>
          <td>{{ $p->keterangan}}</td>
         
      </tr>
      @endforeach
    </tbody>
</table>