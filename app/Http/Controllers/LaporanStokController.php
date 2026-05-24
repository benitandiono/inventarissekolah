<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Exports\LaporanStokExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanStokController extends Controller
{
    public function index()
    {
        return view('laporan-stok.index');
    }

    private function getBarang($opsi)
    {
        return match ($opsi) {
            'minimum'    => Barang::where('stok', '<=', 10)->get(),
            'stok-habis' => Barang::where('stok', 0)->get(),
            default      => Barang::all(),
        };
    }

    public function getData(Request $request)
    {
        return response()->json(
            $this->getBarang($request->opsi)
        );
    }

    // =======================
    // PREVIEW PDF
    // =======================
    public function printStok(Request $request)
    {
        $barangs   = $this->getBarang($request->opsi);
        $orientasi = $request->orientasi ?? 'landscape';

        $dompdf = new Dompdf([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true
        ]);

        $html = view('laporan-stok.print-stok', compact('barangs'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', $orientasi);
        $dompdf->render();

        return $dompdf->stream('laporan-stok-preview.pdf', ['Attachment' => false]);
    }

    // =======================
    // DOWNLOAD PDF
    // =======================
    public function savePdf(Request $request)
    {
        $barangs   = $this->getBarang($request->opsi);
        $orientasi = $request->orientasi ?? 'landscape';

        $dompdf = new Dompdf([
            'isRemoteEnabled' => true,
            'isHtml5ParserEnabled' => true
        ]);

        $html = view('laporan-stok.print-stok', compact('barangs'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', $orientasi);
        $dompdf->render();

        return $dompdf->stream('laporan-stok.pdf', ['Attachment' => true]);
    }

    // =======================
    // EXPORT EXCEL (FORMAT BARU)
    // =======================
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new LaporanStokExport($request->opsi),
            'laporan-stok-barang.xlsx'
        );
    }

    public function getSatuan()
    {
        return response()->json(Satuan::all());
    }
}
