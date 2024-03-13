<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Jumlah Stok</th>
      </tr>
    </thead>
    <tbody>
      @foreach($stok as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->jumlah}}</td>
      </tr>
      @endforeach
    </tbody>
</table>