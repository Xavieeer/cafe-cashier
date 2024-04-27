@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="">
    <h1 class="mb-3 text-dark">Menu</h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#modalFormMenu">
    Tambah Menu
  </button>
  <a href="{{route ('koko')}}" class="btn btn-success mb-5">
    <i class="fas fa-table"></i> Export XSLX
    </a>
    <a href="{{route ('kiki')}}" class="btn btn-danger mb-5">
        <i class="fas fa-file-pdf"></i> Export PDF
        </a>

        <button type="button" class="btn btn-warning mb-5" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i>Import
        </button>

    @if(session('success'))
    <div class="alert alert alert-success alert-dismissible fade show role" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
       

    </div>

    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $item)
        <div class="alert alert-warning" role="alert">
            {{$item}})
          </div>
          
        @endforeach
    @endif
        @include('menu.data')
</section>
@include('menu.form')
@include('menu.edit')
@endsection

@push('script')
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-succes').slideUp(500)
    })
    $('.alert-alert').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-alert').slideUp(500)
    })

    //dialog hapus data

    $(function(){
      $('#myTable').DataTable()
    })

    $('.delete-data').on('click', function(e){
        // let jenis = $(this).closest('tr').find('td:eq(0)').text();
        let jenis = $(e.target).data('nama')
        Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html : `Apakah data akan dihapus?`,
            confirmButtonText : 'Ya',
            denyButtonText : 'Tidak',
            showDenyButton : true,
            focusConfirm: false
        }).then((result) => {
            if(result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })


    // $(function() {
    //     $('#tbl-produk').DataTable()
    // })

    
    $('#formMenuEdit').on('show.bs.modal', function(e){
        
        let button = $(e.relatedTarget)
    let id = button.data('id')
    let nama_menu = button.data('nama_menu')
    let harga = button.data('harga')
    let image = button.data('image')
    let deskripsi = button.data('deskripsi')
    let jenis_id = button.data('jenis_id')
    
    console.log(nama_menu)
    $('#formMenuEdit').find('#nama_menu').val(nama_menu)
    $('#formMenuEdit').find('#harga').val(harga)
    $('#formMenuEdit').find('#image').val(image)
    $('#formMenuEdit').find('#deskripsi').val(deskripsi)
    $('#formMenuEdit').find('#jenis_id').val(jenis_id)
    
    
    
    $('.form-edit').attr('action',`/menu/${id}`)
})
$(document).ready(function(){
})
</script>
@endpush