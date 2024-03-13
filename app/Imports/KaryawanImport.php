<?php

namespace App\Imports;

use App\Models\Karyawan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToCollection, WithHeadingRow
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
            Karyawan::create([
                'nip' => $row['nip'],
                'nik' => $row['nik'],
                'nama' => $row['nama'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'telpon' => $row['telpon'],
                'agama' => $row['agama'],
                'status_nikah' => $row['status_nikah'],
                'alamat' => $row['alamat'],
                'foto' => $row['foto'],
            ]);
        }
    
    }

}
