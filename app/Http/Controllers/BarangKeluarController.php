<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Customer;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('barang-keluar.index', [
            'barangs'      => Barang::all(),
            'barangKeluar' => BarangKeluar::all(),
            'customers'    => Customer::all()
        ]);
    }

    public function getDataBarangKeluar()
    {
        return response()->json([
            'success'  => true,
            'data'     => BarangKeluar::all(),
            'customer' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang-keluar.create', [
            'barangs' => Barang::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * ── VALIDASI STOK MINIMUM ──
     * Stok setelah dikurangi TIDAK BOLEH di bawah stok_minimum.
     * Maksimal keluar = stok - stok_minimum
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_keluar' => 'required',
            'nama_barang'    => 'required',
            'customer_id'    => 'required',
            'jumlah_keluar'  => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    $barang = Barang::where('nama_barang', $request->nama_barang)->first();

                    if (!$barang) {
                        $fail('Barang tidak ditemukan.');
                        return;
                    }

                    // Hitung batas maksimal yang boleh dikeluarkan
                    $stokAman    = $barang->stok - $barang->stok_minimum;
                    $stokAman    = max(0, $stokAman); // pastikan tidak negatif

                    // Stok tidak boleh kurang dari stok minimum
                    if ($stokAman === 0) {
                        $fail(
                            "Stok tidak dapat dikeluarkan! " .
                            "Stok saat ini ({$barang->stok}) sudah berada di batas minimum ({$barang->stok_minimum})."
                        );
                        return;
                    }

                    if ($value > $stokAman) {
                        $sisa = $barang->stok - $barang->stok_minimum;
                        $fail(
                            "Jumlah keluar melebihi batas! " .
                            "Maksimal {$stokAman} (Stok: {$barang->stok}, Minimum wajib tersisa: {$barang->stok_minimum})."
                        );
                    }
                },
            ],
        ], [
            'tanggal_keluar.required' => 'Pilih Tanggal Keluar Terlebih Dahulu!',
            'nama_barang.required'    => 'Form Nama Barang Wajib Diisi!',
            'jumlah_keluar.required'  => 'Form Jumlah Keluar Wajib Diisi!',
            'jumlah_keluar.min'       => 'Jumlah keluar minimal 1!',
            'customer_id.required'    => 'Pilih Guru & Tendik Terlebih Dahulu!',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barangKeluar = BarangKeluar::create([
            'tanggal_keluar' => $request->tanggal_keluar,
            'nama_barang'    => $request->nama_barang,
            'jumlah_keluar'  => $request->jumlah_keluar,
            'customer_id'    => $request->customer_id,
            'kode_transaksi' => $request->kode_transaksi,
            'user_id'        => auth()->user()->id
        ]);

        if ($barangKeluar) {
            $barang = Barang::where('nama_barang', $request->nama_barang)->first();
            if ($barang) {
                $barang->stok -= $request->jumlah_keluar;
                $barang->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $barangKeluar
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        return response()->json([
            'success' => true,
            'message' => 'Edit Data Barang',
            'data'    => $barangKeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Saat hapus, stok dikembalikan ke semula.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        $jumlahKeluar = $barangKeluar->jumlah_keluar;
        $barangKeluar->delete();

        $barang = Barang::where('nama_barang', $barangKeluar->nama_barang)->first();
        if ($barang) {
            $barang->stok += $jumlahKeluar;
            $barang->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!'
        ]);
    }

    /**
     * AJAX — Ambil stok, stok_minimum, dan satuan barang
     * Digunakan untuk update UI real-time saat barang dipilih.
     * SEKARANG ikut mengirim stok_minimum dan max_keluar ke frontend.
     */
    public function getAutoCompleteData(Request $request)
    {
        $barang = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barang) {
            $maxKeluar = max(0, $barang->stok - $barang->stok_minimum);

            return response()->json([
                'nama_barang'   => $barang->nama_barang,
                'stok'          => $barang->stok,
                'stok_minimum'  => $barang->stok_minimum,
                'max_keluar'    => $maxKeluar,
                'satuan_id'     => $barang->satuan_id,
            ]);
        }

        return response()->json(null, 404);
    }

    /**
     * AJAX — Ambil stok + stok_minimum + max_keluar
     */
    public function getStok(Request $request)
    {
        $barang = Barang::where('nama_barang', $request->input('nama_barang'))
                        ->select('stok', 'stok_minimum', 'satuan_id')
                        ->first();

        if (!$barang) {
            return response()->json(['stok' => 0, 'stok_minimum' => 0, 'max_keluar' => 0, 'satuan_id' => null]);
        }

        $maxKeluar = max(0, $barang->stok - $barang->stok_minimum);

        return response()->json([
            'stok'         => $barang->stok,
            'stok_minimum' => $barang->stok_minimum,
            'max_keluar'   => $maxKeluar,
            'satuan_id'    => $barang->satuan_id,
        ]);
    }

    public function getSatuan()
    {
        return response()->json(Satuan::all());
    }

    public function getBarangs(Request $request)
    {
        if ($request->has('q')) {
            $barangs = Barang::where('nama_barang', 'like', '%' . $request->input('q') . '%')->get();
            return response()->json($barangs);
        }

        return response()->json([]);
    }
}