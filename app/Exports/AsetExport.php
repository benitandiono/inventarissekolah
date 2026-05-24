<?php

namespace App\Exports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;


class AsetExport implements WithEvents, WithStyles
{
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                /* =====================
                 * JUDUL (CENTER)
                 * ===================== */
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');

                $sheet->setCellValue('A1', 'DAFTAR ASET SEKOLAH');
                $sheet->setCellValue('A2', 'SMKS VIDYA SASANA');

                $sheet->getStyle('A1:A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical'   => 'center'
                    ],
                ]);

                /* =====================
                 * REAL-TIME DOWNLOAD
                 * ===================== */
                $sheet->setCellValue('A8', 'Dicetak pada');
                $sheet->setCellValue(
                    'B8',
                    ': ' . Carbon::now()
                        ->timezone('Asia/Jakarta')
                        ->locale('id')
                        ->translatedFormat('d F Y, H:i') . ' WIB'
                );

                $sheet->getStyle('A8:B8')->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'size'   => 10
                    ]
                ]);

                /* =====================
                 * IDENTITAS SEKOLAH
                 * ===================== */
                $sheet->setCellValue('A4', 'Nama Satuan');
                $sheet->setCellValue('B4', ': SMKS Vidya Sasana');

                $sheet->setCellValue('A5', 'NPSN');
                $sheet->setCellValue('B5', ': 11003035');

                $sheet->setCellValue('A6', 'Kabupaten/Kota');
                $sheet->setCellValue('B6', ': Karimun');

                $sheet->setCellValue('A7', 'Provinsi');
                $sheet->setCellValue('B7', ': Kepulauan Riau');

                /* =====================
                 * HEADER TABEL
                 * ===================== */
                $sheet->setCellValue('A9', 'No');
                $sheet->setCellValue('B9', 'Nama Barang');
                $sheet->setCellValue('C9', 'Jumlah');
                $sheet->setCellValue('D9', 'Guru & Tendik');      // ← diperbaiki
                $sheet->setCellValue('E9', 'Lokasi / Pemegang');

                $sheet->getStyle('A9:E9')->applyFromArray([
                    'font' => [
                        'bold'  => true,
                        'color' => ['rgb' => 'FFFFFF']
                    ],
                    'fill' => [
                        'fillType'   => 'solid',
                        'startColor' => ['rgb' => '2E7D32']
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical'   => 'center'
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ]
                ]);

                /* =====================
                 * DATA ASET
                 * ===================== */
                $row = 10;
                $no  = 1;

                foreach (Aset::latest()->get() as $aset) {
                    // Format kolom Guru & Tendik
                    $kondisi  = $aset->kondisi ?? '-';
                    $parts    = explode(' — ', $kondisi, 2);
                    $nama     = trim($parts[0]);
                    $status   = isset($parts[1]) ? trim($parts[1]) : '';
                    $pemegang = ($status !== '') ? $nama . ' (' . $status . ')' : $nama;

                    $sheet->setCellValue("A{$row}", $no++);
                    $sheet->setCellValue("B{$row}", $aset->nama_aset);
                    $sheet->setCellValue("C{$row}", $aset->jumlah);
                    $sheet->setCellValue("D{$row}", $pemegang);   // ← diperbaiki
                    $sheet->setCellValue("E{$row}", $aset->lokasi);
                    $row++;
                }

                $lastRow = $row - 1;

                /* =====================
                 * BORDER DATA
                 * ===================== */
                $sheet->getStyle("A9:E{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ]
                ]);

                /* =====================
                 * AUTO WIDTH
                 * ===================== */
                foreach (range('A', 'E') as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}