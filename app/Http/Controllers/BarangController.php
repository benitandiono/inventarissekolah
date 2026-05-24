<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Satuan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /* ===============================
     * INDEX
     * =============================== */
    public function index()
    {
        return view('barang.index', [
            'barangs'       => Barang::all(),
            'jenis_barangs' => Jenis::all(),
            'satuans'       => Satuan::all()
        ]);
    }

    /* ===============================
     * GET DATA (AJAX)
     * =============================== */
    public function getDataBarang()
    {
        return response()->json([
            'success' => true,
            'data'    => Barang::all()
        ]);
    }

    /* ===============================
     * CREATE
     * =============================== */
    public function create()
    {
        return view('barang.create');
    }

    /* ===============================
     * STORE
     * =============================== */
    public function store(Request $request)
    {
        // ← Validasi DULU sebelum proses file apapun
        $validator = Validator::make($request->all(), [
            'nama_barang'  => 'required',
            'deskripsi'    => 'required',
            'gambar'       => 'required|mimes:jpeg,png,jpg|max:10240',
            //                                              ^^^^^^^^
            //                                        max 10240 KB = 10 MB
            'stok_minimum' => 'required|numeric',
            'jenis_id'     => 'required',
            'satuan_id'    => 'required'
        ], [
            'nama_barang.required'  => 'Form Nama Barang Wajib Di Isi!',
            'deskripsi.required'    => 'Form Deskripsi Wajib Di Isi!',
            'gambar.required'       => 'Tambahkan Gambar!',
            'gambar.mimes'          => 'Format gambar harus jpeg, png, atau jpg!',
            'gambar.max'            => 'Ukuran gambar maksimal 10 MB!',
            'stok_minimum.required' => 'Form Stok Minimum Wajib Di Isi!',
            'stok_minimum.numeric'  => 'Gunakan Angka Untuk Mengisi Form Ini!',
            'jenis_id.required'     => 'Pilih Jenis Barang!',
            'satuan_id.required'    => 'Pilih Satuan Barang!'
        ]);

        // ← Kembalikan error SEBELUM upload file
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Baru proses upload setelah validasi lolos
        $gambar = null;
        if ($request->hasFile('gambar')) {
            $path     = 'gambar-barang/';
            $file     = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($path, $fileName, 'public');
            $gambar   = $path . $fileName;
        }

        $barang = Barang::create([
            'nama_barang'  => $request->nama_barang,
            'deskripsi'    => $request->deskripsi,
            'user_id'      => auth()->user()->id,
            'kode_barang'  => 'BRG-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
            'gambar'       => $gambar,
            'stok_minimum' => $request->stok_minimum,
            'jenis_id'     => $request->jenis_id,
            'satuan_id'    => $request->satuan_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $barang
        ]);
    }

    /* ===============================
     * SHOW (DETAIL)
     * =============================== */
    public function show(Barang $barang)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Barang',
            'data'    => $barang
        ]);
    }

    /* ===============================
     * EDIT
     * =============================== */
    public function edit(Barang $barang)
    {
        return response()->json([
            'success' => true,
            'message' => 'Edit Data Barang',
            'data'    => $barang
        ]);
    }

    /* ===============================
     * UPDATE
     * =============================== */
    public function update(Request $request, Barang $barang)
    {
        // ← Validasi DULU sebelum proses file apapun
        $validator = Validator::make($request->all(), [
            'nama_barang'  => 'required',
            'deskripsi'    => 'required',
            'gambar'       => 'nullable|mimes:jpeg,png,jpg|max:10240',
            //                                               ^^^^^^^^
            //                                         max 10240 KB = 10 MB
            'stok_minimum' => 'required|numeric',
            'jenis_id'     => 'required',
            'satuan_id'    => 'required'
        ], [
            'nama_barang.required'  => 'Form Nama Barang Wajib Di Isi!',
            'deskripsi.required'    => 'Form Deskripsi Wajib Di Isi!',
            'gambar.mimes'          => 'Format gambar harus jpeg, png, atau jpg!',
            'gambar.max'            => 'Ukuran gambar maksimal 10 MB!',
            'stok_minimum.required' => 'Form Stok Minimum Wajib Di Isi!',
            'stok_minimum.numeric'  => 'Gunakan Angka Untuk Mengisi Form Ini!',
            'jenis_id.required'     => 'Pilih Jenis Barang!',
            'satuan_id.required'    => 'Pilih Satuan Barang!'
        ]);

        // ← Kembalikan error SEBELUM upload file
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama dengan Storage::delete() — lebih aman dari unlink()
            if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
                Storage::disk('public')->delete($barang->gambar);
            }

            $path     = 'gambar-barang/';
            $file     = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $file->storeAs($path, $fileName, 'public');
            $gambarPath = $path . $fileName;
        } else {
            // Tidak ada gambar baru, pakai gambar lama
            $gambarPath = $barang->gambar;
        }

        $barang->update([
            'nama_barang'  => $request->nama_barang,
            'stok_minimum' => $request->stok_minimum,
            'deskripsi'    => $request->deskripsi,
            'user_id'      => auth()->user()->id,
            'gambar'       => $gambarPath,
            'jenis_id'     => $request->jenis_id,
            'satuan_id'    => $request->satuan_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Terupdate!',
            'data'    => $barang
        ]);
    }

    /* ===============================
     * DESTROY
     * =============================== */
    public function destroy(Barang $barang)
    {
        // Hapus gambar dengan Storage::delete() — lebih aman dari unlink()
        if ($barang->gambar && Storage::disk('public')->exists($barang->gambar)) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil Dihapus!'
        ]);
    }
}