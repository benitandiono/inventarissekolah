<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\Supplier;
use App\Models\BarangMasuk;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangMasukExport;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanBarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('laporan-barang-masuk.index');
    }

    /**
     * Get Data 
     */
    public function getData(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
    
        $barangMasuk = BarangMasuk::query();
    
        if ($tanggalMulai && $tanggalSelesai) {
            $barangMasuk->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }
    
        $data = $barangMasuk->get();

        if (empty($tanggalMulai) && empty($tanggalSelesai)) {
            $data = BarangMasuk::all();
        }
    
        return response()->json($data);
    }
    
    /**
     * Print DomPDF (STREAM)
     */
    public function printBarangMasuk(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
    
        $barangMasuk = BarangMasuk::query();
    
        if ($tanggalMulai && $tanggalSelesai) {
            $barangMasuk->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
        }
    
        if ($tanggalMulai !== null && $tanggalSelesai !== null) {
            $data = $barangMasuk->get();
        } else {
            $data = BarangMasuk::all();
        }
        
        $dompdf = new Dompdf();
        $html = view(
            'laporan-barang-masuk.print-barang-masuk',
            compact('data', 'tanggalMulai', 'tanggalSelesai')
        )->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('print-barang-masuk.pdf', ['Attachment' => false]);
    }

    /**
     * Save PDF (DOWNLOAD)
     */
    public function savePdf(Request $request)
    {
        $tanggalMulai   = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $orientasi      = $request->input('orientasi', 'landscape');

        $barangMasuk = BarangMasuk::query();

        if ($tanggalMulai && $tanggalSelesai) {
            $barangMasuk->whereBetween('tanggal_masuk', [$tanggalMulai, $tanggalSelesai]);
            $data = $barangMasuk->get();
        } else {
            $data = BarangMasuk::all();
        }

        $pdf = Pdf::loadView(
            'laporan-barang-masuk.print-barang-masuk',
            compact('data', 'tanggalMulai', 'tanggalSelesai')
        )->setPaper('A4', $orientasi);

        return $pdf->download('laporan-barang-masuk.pdf');
    }

public function exportExcel(Request $request)
{
    $filename = 'laporan-barang-masuk-' . now()->format('Y-m-d') . '.xlsx';

    return Excel::download(new BarangMasukExport($request), $filename);
}


    /**
     * Get Supplier
     */
    public function getSupplier()
    {
        $supplier = Supplier::all();
        return response()->json($supplier);
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
