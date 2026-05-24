<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Customer;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangKeluarExport;

class LaporanBarangKeluarController extends Controller
{
    public function index()
    {
        return view('laporan-barang-keluar.index');
    }

    public function getData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
    
        $barangKeluar = BarangKeluar::query();
    
        if ($tanggalMulai && $tanggalSelesai) {
            $barangKeluar->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
        }
    
        $data = $barangKeluar->get();

        if (empty($tanggalMulai) && empty($tanggalSelesai)) {
            $data = BarangKeluar::all();
        }
    
        return response()->json($data);
    }

    public function printBarangKeluar(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
    
        $barangKeluar = BarangKeluar::query();
    
        if ($tanggalMulai && $tanggalSelesai) {
            $barangKeluar->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
        }
    
        if ($tanggalMulai !== null && $tanggalSelesai !== null) {
            $data = $barangKeluar->get();
        } else {
            $data = BarangKeluar::all();
        }
        
        $dompdf = new Dompdf();
        $html = view(
            'laporan-barang-keluar.print-barang-keluar',
            compact('data', 'tanggalMulai', 'tanggalSelesai')
        )->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('print-barang-keluar.pdf', ['Attachment' => false]);
    }

    /**
     * ✅ SAVE PDF (DOWNLOAD) — TAMBAHAN AMAN
     */
    public function savePdf(Request $request)
    {
        $tanggalMulai   = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $orientasi      = 'landscape';

        $barangKeluar = BarangKeluar::query();

        if ($tanggalMulai && $tanggalSelesai) {
            $barangKeluar->whereBetween('tanggal_keluar', [$tanggalMulai, $tanggalSelesai]);
            $data = $barangKeluar->get();
        } else {
            $data = BarangKeluar::all();
        }

        $pdf = Pdf::loadView(
            'laporan-barang-keluar.print-barang-keluar',
            compact('data', 'tanggalMulai', 'tanggalSelesai')
        )->setPaper('A4', $orientasi);

        return $pdf->download('laporan-barang-keluar.pdf');
    }

    public function exportExcel(Request $request)
{
    return Excel::download(
        new BarangKeluarExport($request),
        'laporan-barang-keluar.xlsx'
    );
}

    public function getCustomer()
    {
        return response()->json(Customer::all());
    }
}
