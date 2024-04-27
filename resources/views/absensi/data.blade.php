<table class="table table-compact table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama Karyawan</th>
        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Waktu Masuk</th>
        <th scope="col">Status</th>
        <th scope="col">Waktu Keluar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($absensi as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_karyawan}}</td>
          <td>{{ $p->tanggal_masuk}}</td>
          <td>{{ $p->waktu_masuk}}</td>
          <td>
            <select name="status" class="form-control">
                <option value="sakit" {{ $p->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="masuk" {{ $p->status == 'masuk' ? 'selected' : '' }}>Masuk</option>
                <option value="cuti" {{ $p->status == 'cuti' ? 'selected' : '' }}>Cuti</option>
            </select>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </td>
          <td>{{ $p->waktu_keluar}}</td>


          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formAbsensiEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nama_karyawan="{{ $p->nama_karyawan}}"
              data-tanggal_masuk="{{$p->tanggal_masuk}}" data-waktu_masuk="{{$p->waktu_masuk}}" 
              data-status="{{$p->status}}" data-waktu_keluar="{{$p->waktu_keluar}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="absensi/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama_karyawan="{{ $p->nama_karyawan}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>