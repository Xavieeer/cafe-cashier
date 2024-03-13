<?php

namespace App\Exports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('produk.export', [
            'produk' => ProdukTitipan::all()
        ]);
    }
}
