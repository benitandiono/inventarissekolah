<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\UbahPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\SettingController;


/*
|--------------------------------------------------------------------------
| SEMUA ROUTE YANG BUTUH LOGIN
| Middleware: auth, single.session, force.logout.password, force.logout.admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'single.session', 'force.logout.password', 'force.logout.admin'])->group(function () {

    /* ================= SUPERADMIN ================= */
    Route::group(['middleware' => 'checkRole:superadmin'], function () {

        Route::get('/data-pengguna/get-data', [ManajemenUserController::class, 'getDataPengguna']);
        Route::get('/api/role/', [ManajemenUserController::class, 'getRole']);
        Route::resource('/data-pengguna', ManajemenUserController::class);

        Route::post('/data-pengguna/{id}/reset-login', [ManajemenUserController::class, 'resetLogin'])
            ->name('user.resetLogin');

        Route::post('/user/{id}/reset-login', [ManajemenUserController::class, 'resetLogin']);

        Route::get('/hak-akses/get-data', [HakAksesController::class, 'getDataRole']);
        Route::resource('/hak-akses', HakAksesController::class);

        Route::get('/auth-check', function () {
            return auth()->check()
                ? response()->json(['ok' => true])
                : response()->json(['logout' => true], 401);
        });

        Route::patch('/update-setting', [SettingController::class, 'update']);
    });

    /* ============ SUPERADMIN & KEPALA SEKOLAH ============ */
    Route::group(['middleware' => 'checkRole:superadmin,kepala sekolah'], function () {

        Route::resource('/aktivitas-user', ActivityLogController::class);
    });

    /* ============ DASHBOARD & LAPORAN ============ */
    Route::group(['middleware' => 'checkRole:kepala sekolah,superadmin,admin'], function () {

        Route::resource('/dashboard', DashboardController::class);
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/alur-aplikasi', function () {
            return view('alur-aplikasi');
        });

        /* ---------- LAPORAN STOK ---------- */
        Route::get('/laporan-stok/get-data', [LaporanStokController::class, 'getData']);
        Route::get('/laporan-stok/print-stok', [LaporanStokController::class, 'printStok']);
        Route::get('/laporan-stok/export-excel', [LaporanStokController::class, 'exportExcel']);
        Route::get('/laporan-stok/save-pdf', [LaporanStokController::class, 'savePdf']);
        Route::get('/api/satuan/', [LaporanStokController::class, 'getSatuan']);
        Route::resource('/laporan-stok', LaporanStokController::class);

        /* ---------- LAPORAN BARANG MASUK ---------- */
        Route::get('/barang-masuk/export-excel', [BarangMasukController::class, 'exportExcel']);
        Route::get('/laporan-barang-masuk/export-excel', [LaporanBarangMasukController::class, 'exportExcel']);
        Route::get('/laporan-barang-masuk/save-pdf', [LaporanBarangMasukController::class, 'savePdf']);
        Route::get('/laporan-barang-masuk/print-barang-masuk', [LaporanBarangMasukController::class, 'printPdf']);
        Route::get('/laporan-barang-masuk/get-data', [LaporanBarangMasukController::class, 'getData']);
        Route::get('/api/supplier/', [LaporanBarangMasukController::class, 'getSupplier']);
        Route::resource('/laporan-barang-masuk', LaporanBarangMasukController::class);

        /* ---------- LAPORAN BARANG KELUAR ---------- */
        Route::get('/laporan-barang-keluar/export-excel', [LaporanBarangKeluarController::class, 'exportExcel']);
        Route::get('/laporan-barang-keluar/save-pdf', [LaporanBarangKeluarController::class, 'savePdf']);
        Route::get('/laporan-barang-keluar/print-barang-keluar', [LaporanBarangKeluarController::class, 'printPdf']);
        Route::get('/laporan-barang-keluar/get-data', [LaporanBarangKeluarController::class, 'getData']);
        Route::get('/api/customer/', [LaporanBarangKeluarController::class, 'getCustomer']);
        Route::resource('/laporan-barang-keluar', LaporanBarangKeluarController::class);

        /* ---------- UBAH PASSWORD ---------- */
        Route::get('/ubah-password', [UbahPasswordController::class, 'index']);
        Route::post('/ubah-password', [UbahPasswordController::class, 'changePassword']);

        /* ---------- PROFIL & PENGATURAN ---------- */
        Route::get('/pengaturan', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/pengaturan', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/pengaturan', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
        Route::post('/update-logo', [SettingController::class, 'updateLogo']);

        /* ---------- CEK SESSION (AJAX) ---------- */
        Route::get('/check-session', function () {
            if (!auth()->check()) {
                return response()->json(['logout' => true]);
            }
            if (session('session_token') !== auth()->user()->session_token) {
                return response()->json(['logout' => true]);
            }
            return response()->json(['logout' => false]);
        });
    });

    /* ============ ASET READ-ONLY (Kepala Sekolah, Admin, Superadmin) ============ */
    Route::group(['middleware' => 'checkRole:superadmin,admin,kepala sekolah'], function () {

        Route::get('/aset',              [AsetController::class, 'index'])->name('aset.index');
        Route::get('/aset/get-data',     [AsetController::class, 'getData'])->name('aset.data');
        Route::get('/aset/export/excel', [AsetController::class, 'exportExcel'])->name('aset.export.excel');
        Route::get('/aset/export/pdf',   [AsetController::class, 'exportPdf'])->name('aset.export.pdf');

        // ✅ Route riwayat penghapusan — HARUS sebelum /aset/{id} agar tidak konflik
        Route::get('/aset/riwayat-hapus', [AsetController::class, 'riwayatHapus'])->name('aset.riwayat-hapus');

        Route::get('/aset/{id}',         [AsetController::class, 'show'])->name('aset.show');
    });

    /* ============ MASTER DATA (BARANG & ASET) ============ */
    Route::group(['middleware' => 'checkRole:superadmin,admin'], function () {

        Route::get('/barang/get-data', [BarangController::class, 'getDataBarang']);
        Route::resource('/barang', BarangController::class);

        /* ---------- ASET CUD (hanya superadmin & admin) ---------- */
        Route::post('/aset',          [AsetController::class, 'store'])->name('aset.store');
        Route::get('/aset/{id}/edit', [AsetController::class, 'edit'])->name('aset.edit');
        Route::put('/aset/{id}',      [AsetController::class, 'update'])->name('aset.update');
        Route::delete('/aset/{id}',   [AsetController::class, 'destroy'])->name('aset.destroy');

        Route::get('/jenis-barang/get-data', [JenisController::class, 'getDataJenisBarang']);
        Route::resource('/jenis-barang', JenisController::class);

        Route::get('/satuan-barang/get-data', [SatuanController::class, 'getDataSatuanBarang']);
        Route::resource('/satuan-barang', SatuanController::class);

        Route::get('/supplier/get-data', [SupplierController::class, 'getDataSupplier']);
        Route::post('/supplier/check-duplicate', [SupplierController::class, 'checkDuplicate'])->name('supplier.check-duplicate');
        Route::resource('/supplier', SupplierController::class);    

        Route::get('/customer/get-data', [CustomerController::class, 'getDataCustomer']);
        Route::resource('/customer', CustomerController::class);

        Route::get('/api/barang-masuk/', [BarangMasukController::class, 'getAutoCompleteData']);
        Route::get('/barang-masuk/get-data', [BarangMasukController::class, 'getDataBarangMasuk']);
        Route::get('/api/satuan/', [BarangMasukController::class, 'getSatuan']);
        Route::resource('/barang-masuk', BarangMasukController::class);

        Route::get('/api/barang-keluar/', [BarangKeluarController::class, 'getAutoCompleteData']);
        Route::get('/barang-keluar/get-data', [BarangKeluarController::class, 'getDataBarangKeluar']);
        Route::resource('/barang-keluar', BarangKeluarController::class);
    });
});

require __DIR__ . '/auth.php';