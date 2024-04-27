@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="p-5">
    <h1 class="mb-3 text-dark">Meja</h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormMeja">
    Tambah Meja
  </button>

  <a href="{{route ('gojo')}}" class="btn btn-success mb-3">
    <i class="fas fa-table"></i> Export XSLX
    </a>

    <a href="{{route ('wiro')}}" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Export PDF
        </a>

        <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#formImport">
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
        @include('meja.data')
</section>
@include('meja.form')
@include('meja.edit')
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
        const nomor_meja = $(this).closest('tr').find('td:eq(0)').text();
        Swal.fire({
            icon: 'error',
            title: 'Hapus Data',
            html : `Apakah data <b>${nomor_meja}</b> akan dihapus?`,
            confirmButtonText : 'Ya',
            denyButtonText : 'Tidak',
            showDenyButton : true,
            focusConfirm: false
        }).then((result) => {
            if(result.isConfirmed) $(e.target).closest('form').submit()
            else swal.close()
        })
    })
    
    $('#formMejaEdit').on('show.bs.modal', function(e){
   
      let button = $(e.relatedTarget)
      let id = button.data('id')
      let nomor_meja = button.data('nomor_meja')
      let kapasitas = button.data('kapasitas')
      let status = button.data('status')
   
  console.log(nomor_meja)
      $('#formMejaEdit').find('#nomor_meja').val(nomor_meja)
      $('#formMejaEdit').find('#kapasitas').val(kapasitas)
      $('#formMejaEdit').find('#status').val(status)

    // $(function() {
    //     $('#tbl-produk').DataTable()
    // })

    $('.form-edit').attr('action',`/meja/${id}`)
  })
  $(document).ready(function(){
      
})


</script>
@endpush