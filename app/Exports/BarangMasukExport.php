<?php

namespace App\Exports;

use App\Models\BarangMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangMasukExport implements WithEvents, WithStyles
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                /* =====================
                 * JUDUL LAPORAN
                 * ===================== */
                $sheet->mergeCells('A1:F1');
                $sheet->mergeCells('A2:F2');

                $sheet->setCellValue('A1', 'LAPORAN BARANG MASUK');
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
                 * HEADER TABEL
                 * ===================== */
                $sheet->setCellValue('A10', 'No');
                $sheet->setCellValue('B10', 'Kode Transaksi');
                $sheet->setCellValue('C10', 'Tanggal Masuk');
                $sheet->setCellValue('D10', 'Nama Barang');
                $sheet->setCellValue('E10', 'Jumlah Masuk');
                $sheet->setCellValue('F10', 'Supplier');

                $sheet->getStyle('A10:F10')->applyFromArray([
                    'font' => [
                        'bold'  => true,
                        'color' => ['rgb' => 'FFFFFF']
                    ],
                    'fill' => [
                        'fillType'   => 'solid',
                        'startColor' => ['rgb' => '1E88E5']
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
                 * DATA BARANG MASUK
                 * ===================== */
                $tanggalMulai   = $this->request->tanggal_mulai;
                $tanggalSelesai = $this->request->tanggal_selesai;

                $query = BarangMasuk::with('supplier');

                if ($tanggalMulai && $tanggalSelesai) {
                    $query->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
                }

                $data = $query->orderBy('tanggal_masuk')->get();

                $row = 11;
                $no  = 1;

                foreach ($data as $item) {
                    $sheet->setCellValue("A{$row}", $no++);
                    $sheet->setCellValue("B{$row}", $item->kode_transaksi);
                    $sheet->setCellValue("C{$row}", $item->tanggal_masuk);
                    $sheet->setCellValue("D{$row}", $item->nama_barang);
                    $sheet->setCellValue("E{$row}", $item->jumlah_masuk);
                    $sheet->setCellValue("F{$row}", $item->supplier->supplier ?? '-');
                    $row++;
                }

                $lastRow = $row - 1;

                /* =====================
                 * BORDER DATA
                 * ===================== */
                $sheet->getStyle("A11:F{$lastRow}")->applyFromArray([
                    'borders' => [
                        'allBorders' => ['borderStyle' => 'thin']
                    ]
                ]);

                /* =====================
                 * AUTO WIDTH
                 * ===================== */
                foreach (range('A', 'F') as $col) {
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
