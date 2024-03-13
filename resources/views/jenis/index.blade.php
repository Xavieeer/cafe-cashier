@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="">
    <h1 class="mb-3 text-dark">Jenis </h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormJenis">
    Tambah Jenis
  </button>
  <a href="{{route ('C')}}" class="btn btn-success mb-3">
    <i class="fas fa-table"></i> Export XSLX
    </a>
    <a href="{{route ('D')}}" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Export PDF
        </a>

        <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#formImport">
            <i class="fas fa-file-excel"></i>Import
        </button>

   <div class="py-10 px-10">

    </div>
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
        @include('jenis.data')
</section>
@include('jenis.form')
@include('jenis.edit')
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
        const nama_jenis = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html : `Apakah data <b>${nama_jenis}</b> akan dihapus?`,
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

$(document).ready(function(){

  $('#formJenisEdit').on('show.bs.modal', function(e){
 
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let nama_jenis = button.data('nama_jenis')

console.log(nama_jenis)

    $('#formJenisEdit').find('#nama_jenis').val(nama_jenis)


    $('.form-edit').attr('action',`/jenis/${id}`)
  })
})
</script>
@endpush
