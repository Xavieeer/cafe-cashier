<table class="table table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nip</th>
        <th scope="col">Nik</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">Tempat Lahir</th>
        <th scope="col">Tanggal Lahir</th>
        <th scope="col">Telpon</th>
        <th scope="col">Agama</th>
        <th scope="col">Status Nikah</th>
        <th scope="col">Alamat</th>
        <th scope="col">Foto</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($karyawan as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nip}}</td>
          <td>{{ $p->nik}}</td>
          <td>{{ $p->nama}}</td>
          <td>{{ $p->jenis_kelamin}}</td>
          <td>{{ $p->tempat_lahir}}</td>
          <td>{{ $p->tanggal_lahir}}</td>
          <td>{{ $p->telpon}}</td>
          <td>{{ $p->agama}}</td>
          <td>{{ $p->status_nikah}}</td>
          <td>{{ $p->alamat}}</td>
          <td>{{ $p->foto}}</td>
      </tr>
      @endforeach
    </tbody>
</table>