@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="">
    <h1 class="mb-3 text-dark">Absensi Kerja </h1>

   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormAbsensi">
    Tambah Absensi Kerja
  </button>

  <a href="{{ route ('yeuu')}}" class="btn btn-success mb-3">
    <i class="fas fa-table"></i> Export XSLX
    </a>

    <a href="{{route ('yaa')}}" class="btn btn-danger mb-3">
        <i class="fas fa-file-pdf"></i> Export PDF
        </a>

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
    @include('absensi.data')
</section>
@include('absensi.form')
@include('absensi.edit')
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
        const nama_karyawan = $(this).closest('tr').find('td:eq(0)').text();
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

    $('#formAbsensiEdit').on('show.bs.modal', function(e){
      console.log('tes')
      let button = $(e.relatedTarget)
      let id = button.data('id')
      let nama_karyawan = button.data('nama_karyawan')
      let tanggal_masuk = button.data('tanggal_masuk')
      let waktu_masuk = button.data('waktu_masuk')
      let status = button.data('status')
      let waktu_keluar = button.data('waktu_keluar')
  
  console.log(nama_karyawan)
  
      $('#formAbsensiEdit').find('#nama_karyawan').val(nama_karyawan)
      $('#formAbsensiEdit').find('#tanggal_masuk').val(tanggal_masuk)
      $('#formAbsensiEdit').find('#waktu_masuk').val(waktu_masuk)
      $('#formAbsensiEdit').find('#status').val(status)
      $('#formAbsensiEdit').find('#waktu_keluar').val(waktu_keluar)
  
  
      $('.form-edit').attr('action',`/absensi/${id}`)
    })
$(document).ready(function(){
    
})
</script>
@endpush
