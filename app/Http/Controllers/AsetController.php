<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\AsetRiwayatHapus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Exports\AsetExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class AsetController extends Controller
{
    /* ===============================
     * INDEX
     * =============================== */
    public function index()
    {
        return view('aset.index');
    }

    /* ===============================
     * DATATABLE
     * =============================== */
    public function getData()
    {
        return response()->json([
            'data' => Aset::latest()->get()
        ]);
    }

    /* ===============================
     * STORE
     * =============================== */
    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required',
            'jumlah'    => 'required|numeric',
            'kondisi'   => 'required',
            'lokasi'    => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('aset', 'public');
        }

        $aset = Aset::create([
            'gambar'    => $gambar,
            'nama_aset' => $request->nama_aset,
            'jumlah'    => $request->jumlah,
            'kondisi'   => $request->kondisi,
            'lokasi'    => $request->lokasi,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil disimpan',
            'data'    => $aset,
        ]);
    }

    /* ===============================
     * SHOW (DETAIL) → JSON
     * =============================== */
    public function show($id)
    {
        $aset = Aset::findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $aset,
        ]);
    }

    /* ===============================
     * EDIT (AMBIL DATA) → JSON
     * =============================== */
    public function edit($id)
    {
        $aset = Aset::findOrFail($id);

        return response()->json([
            'success' => true,
            'data'    => $aset,
        ]);
    }

    /* ===============================
     * UPDATE
     * =============================== */
    public function update(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        $request->validate([
            'nama_aset' => 'required',
            'jumlah'    => 'required|numeric',
            'kondisi'   => 'required',
            'lokasi'    => 'required',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $aset->nama_aset = $request->nama_aset;
        $aset->jumlah    = $request->jumlah;
        $aset->kondisi   = $request->kondisi;
        $aset->lokasi    = $request->lokasi;

        if ($request->hasFile('gambar')) {
            if ($aset->gambar && Storage::disk('public')->exists($aset->gambar)) {
                Storage::disk('public')->delete($aset->gambar);
            }
            $aset->gambar = $request->file('gambar')->store('aset', 'public');
        }

        $aset->save();

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil diperbarui',
            'data'    => $aset,
        ]);
    }

    /* ===============================
     * DELETE — catat ke riwayat hapus
     * =============================== */
    public function destroy(Request $request, $id)
    {
        $aset = Aset::findOrFail($id);

        // Simpan snapshot ke tabel riwayat sebelum dihapus
        AsetRiwayatHapus::create([
            'nama_aset'    => $aset->nama_aset,
            'jumlah'       => $aset->jumlah,
            'kondisi'      => $aset->kondisi,
            'lokasi'       => $aset->lokasi,
            'gambar'       => $aset->gambar,
            'alasan_hapus' => $request->alasan_hapus ?? null,
            'dihapus_oleh' => Auth::user()->name ?? 'Unknown',
            'tanggal_hapus'=> now()->format('d-m-Y H:i'),
        ]);

        // Hapus gambar dari storage
        if ($aset->gambar && Storage::disk('public')->exists($aset->gambar)) {
            Storage::disk('public')->delete($aset->gambar);
        }

        $aset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Aset berhasil dihapus',
        ]);
    }

    /* ===============================
     * RIWAYAT HAPUS — ambil semua log
     * =============================== */
    public function riwayatHapus()
    {
        $data = AsetRiwayatHapus::latest()->get();

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }

    /* ===============================
     * EXPORT EXCEL
     * =============================== */
    public function exportExcel()
    {
        return Excel::download(new AsetExport, 'data-aset.xlsx');
    }

    /* ===============================
     * EXPORT PDF
     * =============================== */
    public function exportPdf()
    {
        $aset = Aset::latest()->get();

        $pdf = PDF::loadView('aset.export-pdf', compact('aset'))
                  ->setPaper('A4', 'landscape');

        return $pdf->download('data-aset.pdf');
    }
}