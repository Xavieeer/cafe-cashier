<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToCollection, WithHeadingRow
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
            Category::create([
                'nama_kategori' => $row['nama_kategori']
            ]);
        }
    }

    // public function headingRow(): int
    // {
    //     return 3;
    // }
}
