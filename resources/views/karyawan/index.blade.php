@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="p-5">
    <h1 class="mb-3 text-dark">Karyawan </h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormKaryawan">
    Tambah Data Karyawan
  </button>

  <a href="{{route ('sapir')}}" class="btn btn-success mb-3">
<i class="fas fa-table"></i> Export XSLX
</a>

<a href="{{route ('merman')}}" class="btn btn-danger mb-3">
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
        @include('karyawan.data')
</section>
@include('karyawan.form')
@include('karyawan.edit')
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
            html : `Apakah data <b>${nama_karyawan}</b> akan dihapus?`,
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

  $('#formKaryawanEdit').on('show.bs.modal', function(e){
 
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let nip = button.data('nip')
    let nik = button.data('nik')
    let nama = button.data('nama')
    let jenis_kelamin = button.data('jenis_kelamin')
    let tempat_lahir = button.data('tempat_lahir')
    let tanggal_lahir = button.data('tanggal_lahir')
    let telpon = button.data('telpon')
    let agama = button.data('agama')
    let status_nikah = button.data('status_nikah')
    let alamat = button.data('alamat')
    let foto = button.data('foto')
console.log(nip)
    $('#formKaryawanEdit').find('#nip').val(nip)
    $('#formKaryawanEdit').find('#nik').val(nik)
    $('#formKaryawanEdit').find('#nama').val(nama)
    $('#formKaryawanEdit').find('#jenis_kelamin').val(jenis_kelamin)
    $('#formKaryawanEdit').find('#tempat_lahir').val(tempat_lahir)
    $('#formKaryawanEdit').find('#tanggal_lahir').val(tanggal_lahir)
    $('#formKaryawanEdit').find('#telpon').val(telpon)
    $('#formKaryawanEdit').find('#agama').val(agama)
    $('#formKaryawanEdit').find('#status_nikah').val(status_nikah)
    $('#alamat').val(alamat)
    $('#foto').val(foto)


    $('.form-edit').attr('action',`/karyawan/${id}`)
  })
})
</script>
@endpush