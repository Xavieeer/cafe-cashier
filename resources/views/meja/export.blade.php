<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nomor Meja</th>
        <th scope="col">Kapasitas</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($meja as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nomor_meja}}</td>
          <td>{{ $p->kapasitas}}</td>
          <td>{{ $p->status}}</td>
      </tr>
      @endforeach
    </tbody>
</table>