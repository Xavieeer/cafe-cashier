<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Category::all();

        // Ubah koleksi data menjadi koleksi baru dengan menambahkan nomor urut
        return $data->map(function ($category, $index) {
            return [
                'No' => $index + 1,
                'Nama Kategori' => $category->nama_kategori,
            ];
        });
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Set ukuran lebar kolom
                $event->sheet->getColumnDimension('A')->setWidth(5); // No
                $event->sheet->getColumnDimension('B')->setAutoSize(true); // Nama Kategori

                // Judul di atas data
                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:B1');
                $event->sheet->setCellValue('A1', "DATA KATEGORI");

                // Style judul
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                // Style border untuk seluruh data
                $event->sheet->getStyle('A3:B' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [  
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);
            }
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama Kategori',
        ];
    }

    /**
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk baris judul
            1 => ['font' => ['bold' => true]],
            // Style untuk judul "DATA JENIS"
            'A1:B1' => [
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '17cfb6'],
                ],
            ],
        ];
    }
}