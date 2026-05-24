<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Exports\BarangMasukExport;
use Maatwebsite\Excel\Facades\Excel;

class BarangMasukController extends Controller
{
    /**
     * ================================
     * INDEX
     * ================================
     */
    public function index()
    {
        return view('barang-masuk.index', [
            'barangs'      => Barang::all(),
            'barangsMasuk' => BarangMasuk::all(),
            'suppliers'    => Supplier::all()
        ]);
    }

    /**
     * ================================
     * GET DATA (AJAX)
     * ================================
     */
    public function getDataBarangMasuk()
    {
        return response()->json([
            'success'   => true,
            'data'      => BarangMasuk::all(),
            'supplier'  => Supplier::all()
        ]);
    }

    /**
     * ================================
     * EXPORT EXCEL (BOS STYLE)
     * ================================
     */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new BarangMasukExport($request),
            'laporan-barang-masuk.xlsx'
        );
    }

    /**
     * ================================
     * CREATE
     * ================================
     */
    public function create()
    {
        return view('barang-masuk.create', [
            'barangs' => Barang::all()
        ]);
    }

    /**
     * ================================
     * STORE
     * ================================
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_masuk' => 'required',
            'nama_barang'   => 'required',
            'jumlah_masuk'  => 'required|numeric|min:1',
            'supplier_id'   => 'required'
        ], [
            'tanggal_masuk.required' => 'Tanggal masuk wajib diisi!',
            'nama_barang.required'   => 'Nama barang wajib diisi!',
            'jumlah_masuk.required'  => 'Jumlah masuk wajib diisi!',
            'supplier_id.required'   => 'Supplier wajib dipilih!'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barangMasuk = BarangMasuk::create([
            'tanggal_masuk'  => $request->tanggal_masuk,
            'nama_barang'    => $request->nama_barang,
            'jumlah_masuk'   => $request->jumlah_masuk,
            'supplier_id'    => $request->supplier_id,
            'kode_transaksi' => $request->kode_transaksi,
            'user_id'        => auth()->user()->id
        ]);

        // UPDATE STOK BARANG
        if ($barangMasuk) {
            $barang = Barang::where('nama_barang', $request->nama_barang)->first();
            if ($barang) {
                $barang->stok += $request->jumlah_masuk;
                $barang->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data barang masuk berhasil disimpan!',
            'data'    => $barangMasuk
        ]);
    }

    /**
     * ================================
     * EDIT
     * ================================
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        return response()->json([
            'success' => true,
            'data'    => $barangMasuk
        ]);
    }

    /**
     * ================================
     * DESTROY
     * ================================
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        $jumlahMasuk = $barangMasuk->jumlah_masuk;
        $namaBarang  = $barangMasuk->nama_barang;

        $barangMasuk->delete();

        // KEMBALIKAN STOK
        $barang = Barang::where('nama_barang', $namaBarang)->first();
        if ($barang) {
            $barang->stok -= $jumlahMasuk;
            $barang->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data barang masuk berhasil dihapus!'
        ]);
    }

    /**
     * ================================
     * AUTOCOMPLETE BARANG
     * ================================
     */
    public function getAutoCompleteData(Request $request)
    {
        $barang = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barang) {
            return response()->json([
                'nama_barang' => $barang->nama_barang,
                'stok'        => $barang->stok,
                'satuan_id'   => $barang->satuan_id,
            ]);
        }
    }

    /**
     * ================================
     * GET SATUAN
     * ================================
     */
    public function getSatuan()
    {
        return response()->json(Satuan::all());
    }
}
