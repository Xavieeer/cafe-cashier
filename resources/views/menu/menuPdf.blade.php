<table id="data">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Image</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Jenis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu as $p)
            <tr>
                <td>{{ $i = !isset($i) ? ($i = 1) : ++$i }}</td>
                <td>{{ $p->nama_menu }}</td>
                <td>{{ $p->harga }}</td>
                <td> {{ $p->image }}</td>
                <td>{{ $p->deskripsi }}</td>
                <td>{{ $p->jenis->nama_jenis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<style>
    #data {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #data td,
    #data th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #data tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #data tr:hover {
        background-color: #ddd;
    }

    #data th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
