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
<table class="table table-compact table-stripped" id="myTable" style="width: 500px;">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Tanggal Pemesanan</th>
        <th scope="col">Jam Mulai</th>
        <th scope="col">Jam Selesai</th>
        <th scope="col">Nama Pemesan</th>
        <th scope="col">Jumlah Pelanggan</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($pemesanan as $p)
      <tr>
        <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->tanggal_pemesanan}}</td>
          <td>{{ $p->jam_mulai}}</td>
          <td>{{ $p->jam_selesai}}</td>
          <td>{{ $p->nama_pemesan}}</td>
          <td>{{ $p->jumlah_pelanggan}}</td>

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formPemesananEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-tanggal_pemesanan="{{ $p->tanggal_pemesanan}}"
              data-jam_mulai="{{$p->jam_mulai}}" data-jam_selesai="{{$p->jam_selesai}}"
              data-nama_pemesan="{{$p->nama_pemesan}}" data-jumlah_pelanggan="{{ $p->jumlah_pelanggan}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="pemesanan/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama_pemesan="{{ $p->nama_pemesan}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>