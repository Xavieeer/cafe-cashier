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
<table class="table table-striped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama Menu</th>
        <th scope="col">Harga</th>
        <th scope="col">Image</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Jenis</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($menu as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_menu}}</td>
          <td>{{ $p->harga}}</td>
          <td> <img src="{{ asset('storage/' . $p->image) }}" class="" alt="menu image" style="width: 60px;
          height: 60px;"></td>
          <td>{{ $p->deskripsi}}</td>
          <td>{{ $p->jenis->nama_jenis}}</td>

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formMenuEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nama_menu="{{ $p->nama_menu}}"
              data-harga="{{$p->harga}}" data-image="{{$p->image}}"
              data-deskripsi="{{$p->deskripsi}}" data-jenis_id="{{$p->jenis_id}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="menu/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama_menu="{{ $p->nama_menu}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>