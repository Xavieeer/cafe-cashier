@extends('template.layout')
@push('style')

@endpush
@section('content')

        <div class="pesanan container">
            <h1 class="mb-3 text-dark">Pemesanan</h1>
        
            <div class="container mb-5">
            <!-- Default box -->
            {{-- <div class="card1" style="width: 500px;"> --}}
             
                <label for="nama_pemesan" class="col-sm-3 col-form-label">Nama pelanggan</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama_pemesan" name='nama_pemesan' placeholder="Nama Pemesan">
                    </div>
            </div>
            <div class="row w-full">
                <div class="col-md-6">
                    <div class="card" style="width: 480px; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                        <div class="card-body">
                    <ul class="menu-container">
                        @foreach ($jenis as $j)
                        <li> 
                            <h3>{{$j->nama_jenis}}</h3>
                            <ul class="menu-item">
                                @foreach ($j->menu as $menu)
                                <li style="cursor: pointer" class="d-flex align-items-center flex-column"
                                data-harga="{{ $menu->harga}}" data-id="{{ $menu->id}}">
                                <img src="{{ asset('storage/' . $menu->image) }}" class="" alt="menu image" style="width: 60px;
                                    height: 60px;">
                                <p>{{$menu->nama_menu}}</p>
                            </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
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
                    Total Bayar : <h2 id="total">0</h2>
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
            .menu-container{
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
            /* margin-bottom: 10px; */
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
                const id = $(el).closest('li')[0].dataset.id;
                const index = orderedList.findIndex(list => list.menu_id == id)
                //console.log(index)
                orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

                // ubah qty dan subtotal
                const txt_subtotal = $(el).closest('li').find('.subtotal')[0];
                const txt_qty = $(el).closest('li').find('.qty-item')[0]
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
            $(".menu-item li").click(function(e) {

                // mengambil data (id, nama menu, harga, qty tidak ada krna otomatis dan pda saat pertama pasti 1)
                const menu_clicked = $(this).text(); //this itu elemen yg dipilih di menu, element ini diambil textnya
                const data = $(e.target);
                const harga = parseFloat($(data).data('harga'));
                const id = parseInt($(data).data('id'));

                // let qty = 3
                // let subTotal = parseFloat(harga)* qty

                // jika orderedlist di cek id apakah ada id yg sama  dari const id = parseInt($(data).data('id'));
                // kalo tidak ada berart ditambahakan, list itu sudah mewakili orderedList
                   //array object, kalau idnya tidak ada yg sama dgn yg ada di array maka
                        // masuk ke sini :
                    if (orderedList.every(list => list.menu_id !== id)) {
                    let dataN = {
                        'menu_id': id,
                        'menu': menu_clicked,
                        'harga': harga,
                        'qty': 1
                    }

                    orderedList.push(dataN); // data object dimasukkan ke array menggunakan orderlist push
                    console.log(orderedList)
                    let listOrder = `<li data-id="${id}"><h3>${menu_clicked}</h3>` // htmlnya
                    listOrder += 'sub Total : Rp. ' + harga
                    listOrder += `<div class="flex">`
                    listOrder += `<button class='remove-item'>hapus</button>
                                  <button class="btn-dec"> - </button>`
                    listOrder += `<input class="qty-item"
                                         type="number"
                                         value="1"
                                         style="width:40px"
                                         readonly
                                         />
                                <button class="btn-inc"> + </button><h2>
                                    </div>
                                <span class="subtotal">${harga * 1}</span>
                                </li>`
                    $('.ordered-list').append(listOrder) //dimasukkan ke class orderedlist
                }
                $('#total').html(`Rp.${sum()}`) //ditotal, yg sudah dimasukkan dijumlahkan oleh sum
                // alert(menu_clicked);
            });
        });
    </script>
@endpush

