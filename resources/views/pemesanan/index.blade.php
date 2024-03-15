@extends('template.layout')
@push('style')

@endpush
@section('content')

        <div class="pesanan container">
            <h1 class="mb-3 text-dark">Pemesanan</h1>
        
            <div class="container mb-5">
                <!-- Default box -->
                <div class="card1 mb-5">
                    <label for="nama_pemesan" class="col-sm-3 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan' placeholder="Nama Pemesan">
                    </div>
                </div>
                <div class="row w-full">
                    <div class="col-md-6">
                        <div class="card" style="width: 480px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                            <div class="card-body">
                                <div class="menu-container px-1" style="overflow: hidden">
                                    @foreach ($jenis as $j)
                                        <h3>{{ $j->nama_jenis }}</h3>
                                        <div class="row px-3 justify-content-between">
                                            @foreach ($j->menu as $menu)
                                                {{-- <li data-harga="{{ $menu->harga }}" data-id="{{ $menu->id }}">
                                                    {{ $menu->nama_menu }}
                                                </li> --}}
                                                <div class="col-md-3 rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama_menu }}" data-harga="{{ $menu->harga }}" style="background-color: #e4fdf9">
                                                    <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
                                                        <img src="{{ asset('storage/'.$menu->image) }}" class="ms-auto mt-2 img-fluid" alt="" style="width: 80px;">
                                                        <h4 class="text-center mt-3 menu">{{ $menu->nama_menu }}</h4>
                                                        <p class="text-center">Rp. <span>{{ $menu->harga }}</span></p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Bagian order --}}
                    <div class="item-content col-md-3">
                        <div class="card" style="width: 500px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                            <div class="card-body">
                                <h3>Order</h3>
                                <ul class="ordered-list">
                        
                                </ul>
                                Total Bayar :
                                <h2>Rp. <span id="total">0</span></h2>
                                <div>
                                    <button type="button" class="btn w-3" id="btn-bayar" style="background-color: #1b0164; color: #ffffff;">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <div>
            {{-- <div class="item footer">footer</div> --}}
        </div>

    
        <style>
            /* .card1
            {
                border: 1px solid red;
                display: flex;
                width: 750px;
                height: 400px;
            } */
            /* .container{
                display: flex;
            } */
            /* .menu-container{
                list-style-type: none;
            }
            .menu-container li{
                margin-bottom: 20px;
            }
            .btn-dec{
                width: 25px;
                height: 25px;
            }
            .btn-inc{
                width: 25px;
                height: 25px;
            }
            .menu-container li h3{
                text-transform: uppercase;
                font-weight: bold;
                font-size: 18px;
                background-color: aliceblue;
                padding: 5px 15px;
                margin-bottom: 10px;
            }
            
            .menu-item{
                list-style-type: none;
                display: flex;
                gap: 1em;
                margin: 10px 20px;
            }
            .menu-item li{
                background-color: beige;
                padding: 10px 20px;
                color: black;
            
            } */
            
            .menu-item h4.menu::after{
                content: '';
                position: absolute;
                /* background: #000; */
                cursor: pointer;
                top: 0; right: 0; bottom: 0; left: 0;
            }
        </style>

{{-- @include('pemesanan.form')
@include('pemesanan.edit') --}}
@endsection
{{-- document ready function --}}
@push('script')
<script>
        // inisialisasi
        // orderedlist : Mendefinisikan array kosong untuk menyimpan pesanan menu, pada saat di klik akan disimpan di 
            // variabel (array object->yang bisa menyimpan banyak)
        $(function() {
            const orderedList = [] 
            let total = 0  // Mendefinisikan variabel total untuk menyimpan total harga pesanan, nilai awal

            const sum = () => {
                 // Menggunakan metode reduce untuk menjumlahkan total harga pesanan, 
                 // accumulator = total sementara, 0 itu nilai awal yg diatur ke 0 jadi proses penjumlahannya
                 // dimulai dari 0
                return orderedList.reduce((accumulator, object) => {
                    return accumulator + (object.harga * object.qty);
                }, 0)
            };

            //merubah qty
            const changeQty = (el, inc) => {

               // ubah di array
                const id = $(el).closest('.li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id)
                //console.log(index)
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

                // ubah qty dan subtotal
                const txt_subtotal = $(el).closest('.li').find('.subtotal')[0];
                const txt_qty = $(el).closest('.li').find('.qty-item')[0]
                txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc
                txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;
                // total += orderedList[index].harga * orderedList[index].qty;

                // ubah jumlah total
                $('#total').html(sum())
            }

            //events
            $('.ordered-list').on('click', '.btn-dec', function() {
                changeQty(this, -1)
            })

            $('.ordered-list').on('click', '.btn-inc', function() {
                changeQty(this, 1)
            })

            $('.ordered-list').on('click', '.remove-item', function() {
                const item = $(this).closest('li')[0];
                let index = orderedList.findIndex(list => list.id == parseInt(item.dataset.id))

                orderedList.splice(index, 1)
                $(item).remove();
                $('#total').html(sum())
            })

            $('#btn-bayar').on('click', function() {
                $.ajax({
                    url: "{{ route('transaksi.store') }}",
                    method: "POST",

                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderedList: orderedList,
                        total: sum()
                    },
                    success: function(data) {
                        console.log(data)
                        Swal.fire({
                            title: data.message,
                            showDenyButton: true,
                            confirmButtonText: "Cetak Nota",
                            denyButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open("{{ url('nota') }}/"+data.noTrans)
                                location.reload()
                            }else if (result.isDenied) {
                                location.reload()
                            }
                        })
                    },
                    error: function(error) {
                        console.log(status, error)
                        Swal.fire('Pemesanan Gagal')
                    }
                })
            })
            $(".menu-item").click(function(e) {

                // mengambil data (id, nama menu, harga, qty tidak ada krna otomatis dan pda saat pertama pasti 1)
                // const menu_clicked = $(this).text(); //this itu elemen yg dipilih di menu, element ini diambil textnya
                const nama = $(this).data('nama');

                // const data = $(e.target);
                const data = $(this)[0].dataset;

                // const harga = parseFloat($(data).data('harga'));
                const harga = parseFloat(data.harga);

                // const id = parseInt($(data).data('id'));
                const id = parseInt(data.id);


                // let qty = 3
                // let subTotal = parseFloat(harga)* qty

                // jika orderedlist di cek id apakah ada id yg sama  dari const id = parseInt($(data).data('id'));
                // kalo tidak ada berart ditambahakan, list itu sudah mewakili orderedList
                   //array object, kalau idnya tidak ada yg sama dgn yg ada di array maka
                        // masuk ke sini :
                    if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': nama,
                        'harga': harga,
                        'qty': 1
                    }

                    orderedList.push(dataN); // data object dimasukkan ke array menggunakan orderlist push
                    console.log(orderedList)
                    let listOrder = `<div class="card p-2 my-2 li" data-id="${id}" style="border-left: 8px solid #7070f8;">
                                        <div class="d-flex justify-content-between">
                                            <h3>${nama}</h3>
                                            <input class="qty-item" type="number" value="1" style="width:40px;height: 25px;border: none; outline: none;" readonly/>
                                            <div class="d-flex">
                                                <button class="btn btn-danger ms-auto p-0 remove-item" style="width: 25px"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-primary ms-auto p-0 btn-dec" style="width: 25px"><i class="fa fa-minus"></i></button>
                                                <button class="btn btn-primary ms-auto p-0 btn-inc" style="width: 25px"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <p>Rp. <span class="subtotal">${harga * 1}</span></p>
                                    </div>`
                    $('.ordered-list').append(listOrder) //dimasukkan ke class orderedlist
                }
                // $('#total').html(`Rp.${sum()}`) //ditotal, yg sudah dimasukkan dijumlahkan oleh sum
                $('#total').html(sum())

                // alert(menu_clicked);
            });
        });
    </script>
@endpush

