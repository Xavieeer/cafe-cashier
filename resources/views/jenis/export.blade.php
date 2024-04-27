<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
        <title>Data Jenis</title>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Jenis</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jeni as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_jenis}}</td>

      </tr>
      @endforeach
    </tbody>
</table>
