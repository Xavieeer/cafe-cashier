<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Alamat</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pelanggan as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama}}</td>
          <td>{{ $p->email}}</td>
          <td>{{ $p->nomor_telepon}}</td>
          <td>{{ $p->alamat}}</td>

      </tr>
      @endforeach
    </tbody>
</table>