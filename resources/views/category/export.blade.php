<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Kategori</th>
      </tr>
    </thead>
    <tbody>
      @foreach($category as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_kategori}}</td>
      </tr>
      @endforeach
    </tbody>
</table>