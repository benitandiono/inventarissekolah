<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Aset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaturan;

class DashboardController extends Controller
{
    public function index()
    {
        // ======================
        // CARD STATISTIK
        // ======================
        $barangCount        = Barang::all()->count();
        $barangMasukCount   = BarangMasuk::sum('jumlah_masuk');
        $barangKeluarCount  = BarangKeluar::sum('jumlah_keluar');
        $userCount          = User::all()->count();

        // ======================
        // TOTAL ASET (SUM JUMLAH)
        // ======================
        $jumlahAset = Aset::sum('jumlah');

        // ======================
        // DATA GRAFIK ASET
        // ======================
        $asetData = Aset::select('nama_aset')
            ->selectRaw('SUM(jumlah) as total')
            ->groupBy('nama_aset')
            ->orderBy('nama_aset')
            ->get();

        // ======================
        // GRAFIK BARANG MASUK
        // ======================
        $barangMasukPerBulan = BarangMasuk::selectRaw(
                'DATE_FORMAT(tanggal_masuk, "%Y-%m") as date, SUM(jumlah_masuk) as total'
            )
            ->groupBy('date')
            ->get()
            ->map(function ($data) {
                $data->date  = date('Y-m', strtotime($data->date));
                $data->total = (int) $data->total;
                return $data;
            });

        // ======================
        // GRAFIK BARANG KELUAR
        // ======================
        $barangKeluarPerBulan = BarangKeluar::selectRaw(
                'DATE_FORMAT(tanggal_keluar, "%Y-%m") as date, SUM(jumlah_keluar) as total'
            )
            ->groupBy('date')
            ->get()
            ->map(function ($data) {
                $data->date  = date('Y-m', strtotime($data->date));
                $data->total = (int) $data->total;
                return $data;
            });

        // ======================
        // BARANG STOK MINIMUM
        // ======================
        $barangMinimum = Barang::where('stok', '<=', 10)->get();

        // ======================
        // DETEKSI LOGIN BARU
        // Cek apakah request sebelumnya berasal dari halaman login
        // ======================
        $previousUrl   = url()->previous();
        $loginUrl      = route('login');
        $showLoginSuccess = str_contains($previousUrl, '/login') || $previousUrl === $loginUrl;

        // ======================
        // KIRIM KE VIEW
        // ======================
        return view('dashboard', [
            'barang'            => $barangCount,
            'barangMasuk'       => $barangMasukCount,
            'barangKeluar'      => $barangKeluarCount,
            'user'              => $userCount,
            'jumlahAset'        => $jumlahAset,
            'asetData'          => $asetData,
            'barangMasukData'   => $barangMasukPerBulan,
            'barangKeluarData'  => $barangKeluarPerBulan,
            'barangMinimum'     => $barangMinimum,
            'showLoginSuccess'  => $showLoginSuccess,  // ← FLAG POPUP
        ]);
    }

    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('pengaturan', Pengaturan::first());
        });
    }

    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}