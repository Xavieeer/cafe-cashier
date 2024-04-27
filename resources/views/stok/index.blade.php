@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="p-5">
    <h1 class="mb-3 text-dark">Stok</h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormStok">
    Tambah Stok
  </button>
  <a href="{{route ('mochi')}}" class="btn btn-success mb-3">
    <i class="fas fa-table"></i> Export XSLX
    </a>

    <a href="{{route ('dango')}}" class="btn btn-danger mb-3">
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
        @include('stok.data')
    </section>
    @include('stok.edit')
@include('stok.form')

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
        const jumlah = $(this).closest('tr').find('td:eq(0)').text();
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

    
    $('#formStokEdit').on('show.bs.modal', function(e){
        
        let button = $(e.relatedTarget)
        let id = button.data('id')
        
        let menu_id = button.data('menu_id')
        let jumlah = button.data('jumlah')
        
        
       
        $('#formStokEdit').find('#menu_id').val(menu_id)
        $('#formStokEdit').find('#jumlah').val(jumlah)
        
        
        
    $('.form-edit').attr('action',`/stok/${id}`)
})

$(document).ready(function(){
})
</script>
@endpush