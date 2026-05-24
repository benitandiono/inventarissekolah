<?php

namespace App\Exports;

use App\Models\Barang;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanStokExport implements WithEvents, WithStyles
{
    protected $opsi;

    public function __construct($opsi = null)
    {
        $this->opsi = $opsi;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                /* =====================
                 * JUDUL LAPORAN
                 * ===================== */
                $sheet->mergeCells('A1:D1');
                $sheet->mergeCells('A2:D2');

                $sheet->setCellValue('A1', 'LAPORAN STOK BARANG');
                $sheet->setCellValue('A2', 'SMKS VIDYA SASANA');

                $sheet->getStyle('A1:A2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
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
                 * TANGGAL CETAK
                 * ===================== */
                $sheet->setCellValue('A8', 'Dicetak pada');
                $sheet->setCellValue(
                    'B8',
                    ': ' . Carbon::now()
                        ->timezone('Asia/Jakarta')
                        ->locale('id')
                        ->translatedFormat('d F Y, H:i') . ' WIB'
                );

                $sheet->getStyle('A9:B9')->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'size' => 10
                    ]
                ]);

                /* =====================
                 * HEADER TABEL
                 * ===================== */
                $sheet->setCellValue('A10', 'No');
                $sheet->setCellValue('B10', 'Kode Barang');
                $sheet->setCellValue('C10', 'Nama Barang');
                $sheet->setCellValue('D10', 'Stok Barang');

                $sheet->getStyle('A10:D10')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF']
                    ],
                    'fill' => [
                        'fillType' => 'solid',
                        'startColor' => ['rgb' => '1E88E5']
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ],
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ]
                ]);

                /* =====================
                 * DATA STOK BARANG
                 * ===================== */
                $query = Barang::query();

                if ($this->opsi === 'minimum') {
                    $query->where('stok', '<=', 10);
                } elseif ($this->opsi === 'stok-habis') {
                    $query->where('stok', 0);
                }

                $barangs = $query->orderBy('nama_barang')->get();

                $row = 11;
                $no  = 1;

                foreach ($barangs as $barang) {
                    $sheet->setCellValue("A{$row}", $no++);
                    $sheet->setCellValue("B{$row}", $barang->kode_barang);
                    $sheet->setCellValue("C{$row}", $barang->nama_barang);
                    $sheet->setCellValue("D{$row}", $barang->stok);
                    $row++;
                }

                $lastRow = $row - 1;

                /* =====================
                 * BORDER DATA
                 * ===================== */
                $sheet->getStyle("A11:D{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ]
                ]);

                /* =====================
                 * AUTO WIDTH
                 * ===================== */
                foreach (range('A', 'D') as $col) {
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
