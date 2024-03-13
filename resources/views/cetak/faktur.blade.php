<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Transaksi</title>
    <style>
        /* Menambahkan beberapa gaya tambahan untuk card */
        .nota-card {
            max-width: 600px; /* Lebar maksimum card */
            margin: 20px auto; /* Membuat card berada di tengah layar */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Gaya bayangan */
            padding: 20px; /* Ruang di dalam card */
            border-radius: 10px;
        }

        /* Gaya tambahan untuk header nota */
        .nota-header {
            text-align: center;
        }

        /* Gaya tambahan untuk tabel dalam card */
        .nota-table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="nota-card card">
        <div class="card-body">
    <h2 class="nota-header">Coffee</h2>
    <h5 class="nota-header">Jl. Mockingjay No. 45, 34234</h5>
    <hr>
    <h5>No.Faktur : {{ $transaksi->id }}</h5>
    <h5>{{ $transaksi->tanggal}}</h5>
    <table border="0" class="nota-table table">
        <thead>
            <tr>
                <td>Qty</td>
                <td>Item</td>
                <td>Harga</td>
                <td>Total</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
            <tr>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->menu->nama_menu }}</td>
                <td>{{ number_format($item->menu->harga, 0,',','.') }}</td>
                <td>{{ number_format($item->subtotal, 0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total Harga</td>
                <td>{{ number_format($transaksi->total_harga,0,',','.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>