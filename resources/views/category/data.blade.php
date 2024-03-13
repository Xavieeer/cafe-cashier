
<table class="table table-compact table-stripped" id="myTable">
    <thead class="thead-dark bg-secondary">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($category as $p)
      <tr>
          <td>{{ $i = !isset($i)?$i=1:++$i}}</td>
          <td>{{ $p->nama_kategori}}</td>

          
          
          <td>
              <button type="button" class="btn btn-primary btn-edit" data-toggle="modal" data-target="#formCategoryEdit" 
              data-mode="edit" data-id="{{ $p->id}}" data-nama_kategori="{{ $p->nama_kategori}}">
                  <i class="fas fa-edit"></i>
              </button>
              </a>
              <form method="post" action="category/{{$p->id}}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn delete-data btn-danger" data-nama_kategori="{{ $p->nama_kategori}}">
                      <i class="fas fa-trash"></i>
                  </button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>