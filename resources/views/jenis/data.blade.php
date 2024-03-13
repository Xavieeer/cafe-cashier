</table> 
<table class="table table-compact table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Jenis</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jeni as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_jenis}}</td>

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formJenisEdit" 
              data-mode="edit" data-id="{{$p->id}}" data-nama_jenis="{{ $p->nama_jenis}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="jenis/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama_jenis="{{ $p->nama_jenis}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>