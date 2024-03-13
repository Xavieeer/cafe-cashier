@extends('template.layout')
@push('style')

@endpush
@section('content')
<section class="p-5">
    <h1 class="mb-3 text-dark">Data Produk Titipan </h1>
   <!-- Button trigger modal -->
   <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalFormProduk">
    Tambah Data Produk
  </button>

  <a href="{{route ('X')}}" class="btn btn-success mb-3">
    <i class="fas fa-table"></i> Export XSLX
    </a>

    <a href="{{route ('xoxo')}}" class="btn btn-danger mb-3">
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
        @include('produk.data')
</section>
@include('produk.form')
@include('produk.edit')
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
        const nama_produk = $(this).closest('tr').find('td:eq(0)').text();
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

$(document).ready(function(){

  $('#formProdukEdit').on('show.bs.modal', function(e){
 
    let button = $(e.relatedTarget)
    let id = button.data('id')
    let nama_produk = button.data('nama_produk')
    let nama_supplier = button.data('nama_supplier')
    let harga_beli = button.data('harga_beli')
    let harga_jual = button.data('harga_jual')
    let stok = button.data('stok')
    let keterangan = button.data('keterangan')

    console.log(nama_produk)
    $('#formProdukEdit').find('#nama_produk').val(nama_produk)
    $('#formProdukEdit').find('#nama_supplier').val(nama_supplier)
    $('#formProdukEdit').find('#harga_beli').val(harga_beli)
    $('#formProdukEdit').find('#harga_jual').val(harga_jual)
    $('#formProdukEdit').find('#stok').val(stok)
    $('#formProdukEdit').find('#keterangan').val(keterangan)

   
    $('.form-edit').attr('action',`/produk/${id}`)
  })
})

//Fungsi penambahan harga jual
// .document.getElementById("harga_beli").addEventListener("input", function(){
//     var hargaBeli = parseFloat(this.value);
//     var hargaJual = hargaBeli * 1.7;
//     document.getElementById("harga_jual").value = hargaJual;
// });
</script>
@endpush