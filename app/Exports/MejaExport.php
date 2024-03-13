<?php

namespace App\Exports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MejaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('meja.export', [
            'meja' => Meja::all()
        ]);
    }
}
