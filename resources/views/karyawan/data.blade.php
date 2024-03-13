{{-- <table class="table table-compact table-stripped" id="myTable">
    <thead>
        <tr>
            <th>Kode Pelanggan</th>
            <th>Kode Nama</th>
            <th>Kode Alamat</th>
            <th>Kode No_Telp</th>
            <th>Kode Email</th>
    
            <th>Tools</th>
        </tr>
    </thead>
    <tbody>
        @foreach($karyawan as $p)
        <tr>
            <td>{{ $p->nama}}</td>
            <td>{{ $p->alamat}}</td>
            <td>{{ $p->no_telp}}</td>
            
            <td>
                <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formKaryawanEdit" data-mode="edit" data-id="{{ $p->id}}" data-nama_pelanggan="{{ $p->nama_karyawan}}">
                    <i class="fas fa-edit"></i>
                </button>
                </a>
                <form method="post" action="karyawan/{{$p->id}}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn delete-data btn-danger" data-nama_pelanggan="{{ $p->nama_karyawan}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
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

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formKaryawanEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nip="{{ $p->nip}}"
              data-nik="{{$p->nik}}" data-nama ="{{$p->nama}}"
              data-jenis_kelamin="{{$p->jenis_kelamin}}" data-tempat_lahir ="{{$p->tempat_lahir}}"
              data-tanggal_lahir="{{$p->tanggal_lahir}}" data-telpon ="{{$p->telpon}}"
              data-agama="{{$p->agama}}" data-status_nikah ="{{$p->status_nikah}}"
              data-alamat="{{$p->alamat}}" data-foto ="{{$p->foto}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="karyawan/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama="{{ $p->nama}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>