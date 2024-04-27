<?php

namespace App\Exports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JenisExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        //  $jeni = Jenis::all(['id', 'nama_jenis']); // Ambil hanya kolom 'id' dan 'nama_jenis' dari model Jenis
        return view('jenis.export', [
            'jeni' => Jenis::all()
        ]);

        
    }

}
