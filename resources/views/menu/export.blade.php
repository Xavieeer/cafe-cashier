<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama Menu</th>
        <th scope="col">Harga</th>
        <th scope="col">Image</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Jenis ID</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menu as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_menu}}</td>
          <td>{{ $p->harga}}</td>
          <td>{{ $p->image}}</td>
          <td>{{ $p->deskripsi}}</td>
          <td>{{ $p->jenis_id}}</td>
      </tr>
      @endforeach
    </tbody>
</table>