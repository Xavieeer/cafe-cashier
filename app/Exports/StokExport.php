<?php

namespace App\Exports;

use App\Models\Stok;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StokExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('stok.export', [
            'stok' => Stok::all()
        ]);
    }
}
