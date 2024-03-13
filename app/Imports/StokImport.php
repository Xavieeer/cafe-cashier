<?php

namespace App\Imports;

use App\Models\Stok;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StokImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // dd($row);
            Stok::create([
                'jumlah' => $row['jumlah_stok']
            ]);
        }
    }
}
