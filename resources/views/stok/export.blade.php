<table class="table table-compact table-stripped" id="myTable">
  <thead class="thead-dark bg-secondary">
      <tr>
          <th scope="col">Id</th>
          <th scope="col">Nama Menu</th>
          <th scope="col">Jumlah Stok</th>
          <th scope="col">Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($stok as $p)
          <tr>
              <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
              <td>{{ $p->menu->nama_menu }}</td>
              <td>{{ $p->jumlah }}</td>
      </tr>
      @endforeach
    </tbody>
</table>