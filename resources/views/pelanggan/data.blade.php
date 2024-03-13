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
<table class="table table-compact table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
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

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formPelangganEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nama="{{ $p->nama}}"
              data-email="{{$p->email}}" data-nomor_telepon="{{$p->nomor_telepon}}"
              data-alamat="{{$p->alamat}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="pelanggan/{{$p->id}}" style="display:inline">
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