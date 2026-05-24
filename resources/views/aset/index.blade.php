@extends('layouts.app')

@include('aset.create')
@include('aset.edit')
@include('aset.show')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
.as-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: asFadeIn .45s ease both;
}

@keyframes asFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

.as-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 28px;
    padding: 28px 32px;
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #0891b2 100%);
    border-radius: 22px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 12px 40px rgba(37,99,235,.35);
}

.as-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.as-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.as-header-left { position: relative; z-index: 1; }

.as-header-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 99px;
    padding: 3px 12px;
    font-size: 11px;
    font-weight: 700;
    color: #bfdbfe;
    letter-spacing: .6px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.as-header-eyebrow i { font-size: 9px; color: #93c5fd; }

.as-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.as-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.as-header-right {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.as-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}
.as-stat-pill .spn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.as-stat-pill .spl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

.btn-add-aset {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: #2563eb;
    border: none;
    border-radius: 12px;
    padding: 11px 22px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    transition: all .25s ease;
    box-shadow: 0 4px 16px rgba(0,0,0,.12);
    position: relative;
    z-index: 1;
    text-decoration: none;
}

.btn-add-aset:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
    color: #2563eb;
    text-decoration: none;
}

.as-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.as-search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.as-search-wrap input {
    width: 100%;
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 12px;
    padding: 10px 16px 10px 42px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #0f172a;
    outline: none;
    transition: all .2s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
}

.as-search-wrap input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.as-search-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
    pointer-events: none;
}

.as-export-group {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.btn-export {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    border: none;
    border-radius: 10px;
    padding: 9px 16px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all .22s ease;
    color: #fff;
    text-decoration: none;
}

.btn-export:hover { transform: translateY(-2px); color: #fff; text-decoration: none; }

.btn-export-excel {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    box-shadow: 0 4px 12px rgba(22,163,74,.3);
}
.btn-export-excel:hover { box-shadow: 0 8px 20px rgba(22,163,74,.4); }

.btn-export-pdf {
    background: linear-gradient(135deg, #dc2626, #ef4444);
    box-shadow: 0 4px 12px rgba(220,38,38,.3);
}
.btn-export-pdf:hover { box-shadow: 0 8px 20px rgba(220,38,38,.4); }

.btn-riwayat-hapus {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    border: none;
    border-radius: 10px;
    padding: 9px 16px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all .22s ease;
    color: #fff;
    text-decoration: none;
    background: linear-gradient(135deg, #7c3aed, #a855f7);
    box-shadow: 0 4px 12px rgba(124,58,237,.3);
}
.btn-riwayat-hapus:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(124,58,237,.45);
    color: #fff;
    text-decoration: none;
}

.as-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.as-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.as-card-body { padding: 24px; }

#table_aset {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_aset thead th {
    background: linear-gradient(135deg, #1e40af, #2563eb) !important;
    color: #fff !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    letter-spacing: .8px;
    padding: 14px 16px !important;
    border: none !important;
    text-align: center;
}

#table_aset thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_aset thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

#table_aset tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_aset tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_aset tbody td {
    padding: 12px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_aset tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_aset tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

.td-no {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #2563eb;
    font-weight: 800;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.img-aset-wrap { display: flex; justify-content: center; }

.img-aset {
    width: 72px; height: 54px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
    transition: transform .2s ease;
}
.img-aset:hover { transform: scale(1.08); }

.nama-aset-cell { text-align: left !important; }
.nama-aset { font-size: 13px; font-weight: 700; color: #0f172a; }

.jumlah-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #1e3a8a;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 4px 14px;
    font-size: 13px;
    font-weight: 800;
    min-width: 44px;
}

.pemegang-badge {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 5px 12px;
    border-radius: 99px;
    font-size: 12px;
    font-weight: 700;
    max-width: 180px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.pemegang-guru    { background:#eff6ff; color:#1d4ed8; border:1px solid #bfdbfe; }
.pemegang-tendik  { background:#fef9c3; color:#92400e; border:1px solid #fde68a; }
.pemegang-default { background:#f1f5f9; color:#475569; border:1px solid #e2e8f0; }

.lokasi-cell {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 4px 10px;
    font-size: 12px;
    font-weight: 600;
    color: #475569;
}
.lokasi-cell i { color: #94a3b8; font-size: 11px; }

.aksi-group {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
}

.aksi-new {
    width: 34px; height: 34px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    cursor: pointer;
    transition: all .22s ease;
    border: none;
    font-size: 13px;
}
.aksi-new:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,.2); color: #fff; }
.aksi-detail { background: linear-gradient(135deg, #0891b2, #06b6d4); }
.aksi-edit   { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.aksi-hapus  { background: linear-gradient(135deg, #ef4444, #f87171); }

.dataTables_wrapper .dataTables_filter input { display: none !important; }
.dataTables_wrapper .dataTables_filter label { display: none !important; }
.dataTables_wrapper .dataTables_length select { font-family:'Plus Jakarta Sans',sans-serif; border:1.5px solid #e2e8f0; border-radius:8px; padding:5px 10px; font-size:13px; outline:none; }
.dataTables_wrapper .dataTables_info { font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; color:#94a3b8; font-weight:600; padding-top:14px !important; }
.dataTables_wrapper .dataTables_paginate { padding-top: 10px !important; }
.dataTables_wrapper .dataTables_paginate .paginate_button { font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; border-radius:8px !important; border:none !important; padding:6px 12px !important; margin:0 2px; color:#475569 !important; transition:all .2s ease; }
.dataTables_wrapper .dataTables_paginate .paginate_button:hover { background:#eff6ff !important; color:#2563eb !important; box-shadow:none !important; }
.dataTables_wrapper .dataTables_paginate .paginate_button.current { background:linear-gradient(135deg,#2563eb,#3b82f6) !important; color:#fff !important; box-shadow:0 4px 12px rgba(37,99,235,.3) !important; }

.modal-content { border-radius:20px !important; border:none !important; box-shadow:0 24px 60px rgba(0,0,0,.18) !important; font-family:'Plus Jakarta Sans',sans-serif; }
.modal-header { background:linear-gradient(135deg,#1e40af,#2563eb) !important; border-radius:20px 20px 0 0 !important; border-bottom:none !important; padding:20px 28px !important; }
.modal-title { color:#fff !important; font-weight:800 !important; font-size:16px !important; }
.modal-header .btn-close { filter:brightness(0) invert(1); opacity:.7; }
.modal-header .btn-close:hover { opacity:1; }
.modal-footer { border-top:1px solid #f1f5f9 !important; padding:16px 28px !important; }

.swal2-dup-table { width:100%; border-collapse:collapse; margin-top:14px; font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; }
.swal2-dup-table th { background:#eff6ff; color:#1e40af; font-weight:700; padding:8px 12px; border:1px solid #dbeafe; text-align:left; }
.swal2-dup-table td { padding:8px 12px; border:1px solid #e2e8f0; color:#334155; text-align:left; }
.swal2-dup-table tr:nth-child(even) td { background:#f8fafc; }
.dup-badge-exact { display:inline-block; background:#fee2e2; color:#dc2626; border-radius:99px; padding:2px 10px; font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:.5px; }

#modal_riwayat_hapus_aset .modal-dialog { max-width:960px; }
#modal_riwayat_hapus_aset .modal-header { background:linear-gradient(135deg,#6d28d9,#7c3aed) !important; }

.riwayat-infobar { display:flex; align-items:center; gap:14px; background:#faf5ff; border:1.5px solid #e9d5ff; border-radius:14px; padding:14px 20px; margin-bottom:18px; }
.riwayat-infobar-icon { width:42px; height:42px; background:linear-gradient(135deg,#7c3aed,#a855f7); border-radius:10px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.riwayat-infobar-icon i { color:#fff; font-size:16px; }
.riwayat-infobar-text .title { font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:800; color:#4c1d95; }
.riwayat-infobar-text .sub { font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; color:#7c3aed; margin-top:2px; }
.riwayat-stat { margin-left:auto; text-align:center; flex-shrink:0; }
.riwayat-stat .num { font-family:'Plus Jakarta Sans',sans-serif; font-size:24px; font-weight:800; color:#7c3aed; line-height:1; }
.riwayat-stat .lbl { font-family:'Plus Jakarta Sans',sans-serif; font-size:10px; font-weight:700; color:#a78bfa; text-transform:uppercase; letter-spacing:.5px; margin-top:2px; }

.riwayat-search-wrap { position:relative; margin-bottom:16px; }
.riwayat-search-wrap i { position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#94a3b8; font-size:13px; pointer-events:none; }
.riwayat-search-wrap input { width:100%; background:#fff; border:1.5px solid #e2e8f0; border-radius:12px; padding:10px 16px 10px 40px; font-family:'Plus Jakarta Sans',sans-serif; font-size:13px; font-weight:600; color:#0f172a; outline:none; transition:all .2s ease; box-shadow:0 2px 8px rgba(0,0,0,.04); }
.riwayat-search-wrap input:focus { border-color:#7c3aed; box-shadow:0 0 0 4px rgba(124,58,237,.1); }

/* ════════════════════════════════════════════════════════════
   FIX SCROLL INTERNAL UNTUK TABEL RIWAYAT HAPUS
   ─ Wrapper dengan max-height & overflow untuk scroll internal
   ─ Thead sticky agar tetap terlihat saat scroll
   ─ Modal tetap ukuran sama, tidak memanjang
════════════════════════════════════════════════════════════ */

.riwayat-table-wrapper {
    max-height: 450px;
    overflow-y: auto;
    overflow-x: auto;
    border-radius: 12px;
    border: 1px solid #e9d5ff;
    background: #fff;
}

.riwayat-table-wrapper::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.riwayat-table-wrapper::-webkit-scrollbar-track {
    background: #f5f3ff;
    border-radius: 8px;
}

.riwayat-table-wrapper::-webkit-scrollbar-thumb {
    background: #d8b4fe;
    border-radius: 8px;
}

.riwayat-table-wrapper::-webkit-scrollbar-thumb:hover {
    background: #c4b5fd;
}

#table_riwayat_hapus {
    width: 100% !important;
    border-collapse: collapse !important;
    margin-bottom: 0 !important;
}

#table_riwayat_hapus thead {
    position: sticky;
    top: 0;
    z-index: 10;
}

#table_riwayat_hapus thead th {
    background: linear-gradient(135deg, #6d28d9, #7c3aed) !important;
    color: #fff !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    letter-spacing: .7px;
    padding: 13px 14px !important;
    border: none !important;
    text-align: center;
    white-space: nowrap;
    box-shadow: 0 2px 4px rgba(109, 40, 217, 0.15);
}

#table_riwayat_hapus tbody tr {
    border-bottom: 1px solid #f1f5f9;
    transition: background .15s ease;
}

#table_riwayat_hapus tbody tr:hover {
    background: #faf5ff;
}

#table_riwayat_hapus tbody td {
    padding: 11px 14px !important;
    border: none !important;
    border-bottom: 1px solid #f1f5f9 !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_riwayat_hapus tbody tr:last-child td {
    border-bottom: none !important;
}

.alasan-badge {
    display: inline-block;
    background: #fffbeb;
    color: #92400e;
    border: 1px solid #fde68a;
    border-radius: 8px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 600;
    max-width: 180px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: default;
}

.dihapus-oleh-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f0fdf4;
    color: #166534;
    border: 1px solid #bbf7d0;
    border-radius: 99px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 700;
    white-space: nowrap;
}

.tanggal-hapus {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 4px 10px;
    font-size: 11.5px;
    font-weight: 600;
    color: #475569;
    white-space: nowrap;
}

.riwayat-empty {
    text-align: center;
    padding: 52px 20px;
}

.riwayat-empty .emoji {
    font-size: 52px;
    margin-bottom: 12px;
    display: block;
}

.riwayat-empty .title {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 15px;
    font-weight: 800;
    color: #334155;
    margin-bottom: 4px;
}

.riwayat-empty .sub {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    color: #94a3b8;
}
</style>

<div class="as-wrap">

    <div class="as-header">
        <div class="as-header-left">
            <div class="as-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Inventaris
            </div>
            <h1><i class="fas fa-boxes" style="font-size:26px; margin-right:12px; vertical-align:middle;"></i>Data Aset</h1>
            <div class="as-header-sub">Kelola seluruh aset tetap sekolah</div>
        </div>
        <div class="as-header-right">
            <div class="as-stat-pill">
                <div class="spn" id="statTotalAset">—</div>
                <div class="spl">Total Aset</div>
            </div>
            @if(auth()->user()->role->role !== 'kepala sekolah')
            <button class="btn-add-aset" id="button_tambah_aset">
                <i class="fas fa-plus"></i> Tambah Aset
            </button>
            @endif
        </div>
    </div>

    <div class="as-toolbar">
        <div class="as-search-wrap">
            <i class="fas fa-search as-search-icon"></i>
            <input type="text" id="asSearch" placeholder="Cari nama aset, pemegang, atau lokasi…">
        </div>
        <div class="as-export-group">
            <button type="button" class="btn-export btn-export-excel" id="download-excel">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
            <button type="button" class="btn-export btn-export-pdf" id="save-pdf">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
            <button type="button" class="btn-riwayat-hapus" id="btn_riwayat_hapus">
                <i class="fas fa-history"></i> Data Penghapusan Aset
            </button>
        </div>
    </div>

    <div class="as-card">
        <div class="as-card-stripe"></div>
        <div class="as-card-body">
            <div class="table-responsive">
                <table id="table_aset" class="display">
                    <thead>
                        <tr>
                            <th style="width:55px">No</th>
                            <th style="width:100px">Gambar</th>
                            <th>Nama Aset</th>
                            <th style="width:90px">Jumlah</th>
                            <th style="width:180px">Pemegang</th>
                            <th style="width:160px">Lokasi</th>
                            <th style="width:120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('modals')
<div class="modal fade" id="modal_riwayat_hapus_aset" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-history mr-2"></i> Data Penghapusan Aset
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="color:#fff; opacity:.8; text-shadow:none; font-size:22px;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:24px;">
                <div class="riwayat-infobar">
                    <div class="riwayat-infobar-icon"><i class="fas fa-trash-alt"></i></div>
                    <div class="riwayat-infobar-text">
                        <div class="title">Riwayat Penghapusan Aset</div>
                        <div class="sub">Semua aset yang telah dihapus beserta alasan dan keterangan penghapusannya.</div>
                    </div>
                    <div class="riwayat-stat">
                        <div class="num" id="stat_total_hapus">—</div>
                        <div class="lbl">Total Dihapus</div>
                    </div>
                </div>
                <div class="riwayat-search-wrap">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchRiwayatHapus" placeholder="Cari nama aset, alasan, atau dihapus oleh…">
                </div>
                <!-- ▼ WRAPPER DENGAN SCROLL INTERNAL ▼ -->
                <div class="riwayat-table-wrapper">
                    <table id="table_riwayat_hapus" class="table">
                        <thead>
                            <tr>
                                <th style="width:48px">No</th>
                                <th>Nama Aset</th>
                                <th style="width:80px">Jumlah</th>
                                <th style="width:160px">Pemegang</th>
                                <th style="width:130px">Lokasi</th>
                                <th style="width:170px">Alasan Penghapusan</th>
                                <th style="width:140px">Dihapus Oleh</th>
                                <th style="width:130px">Tanggal Hapus</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_riwayat_hapus">
                            <tr>
                                <td colspan="8" style="text-align:center;padding:40px;color:#94a3b8;font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:600;">
                                    <i class="fas fa-spinner fa-spin mr-2"></i> Memuat data…
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- ▲ END WRAPPER ▲ -->
            </div>
            <div class="modal-footer" style="justify-content:space-between;align-items:center;">
                <span style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;color:#94a3b8;font-weight:600;">
                    <i class="fas fa-info-circle mr-1"></i>
                    Data ini hanya untuk referensi dan tidak dapat dipulihkan.
                </span>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:10px;padding:8px 22px;font-size:13px;">
                    <i class="fas fa-times mr-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endpush

@push('styles')
<style>
.img-aset { width:72px; height:54px; border-radius:10px; object-fit:cover; }
#edit_kondisi {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px; font-weight: 600;
    border: 1.5px solid #dbeafe; border-radius: 10px;
    background: #f8faff; color: #1e3a8a;
    cursor: pointer; transition: all .2s ease;
    appearance: none; -webkit-appearance: none;
}
#edit_kondisi:focus { border-color:#2563eb; background:#eff6ff; box-shadow:0 0 0 4px rgba(37,99,235,.12); outline:none; }
#edit_kondisi:disabled { opacity:.6; cursor:not-allowed; }
</style>
@endpush

@push('scripts')
<script>
/* ══════════════════════════════════════════════════════════════
   ROLE CHECK
══════════════════════════════════════════════════════════════ */
const isKepalaSekolah = {{ auth()->user()->role->role === 'kepala sekolah' ? 'true' : 'false' }};

/* ══════════════════════════════════════════════════════════════
   KONSTANTA UKURAN FILE
══════════════════════════════════════════════════════════════ */
const MAX_MB   = 10;
const MAX_BYTE = MAX_MB * 1024 * 1024;

/* ══════════════════════════════════════════════════════════════
   CACHE DATA
   ─ cachedAsetData     : data baris tabel aset (diisi loadData)
   ─ cachedCustomerData : data customer/guru-tendik
     → HANYA diambil SEKALI via AJAX, lalu disimpan di sini.
     → Saat edit dibuka, pakai data cache, TIDAK request ulang.
     → Jika belum ada, baru request (lazy-load pertama kali).
══════════════════════════════════════════════════════════════ */
let cachedAsetData     = [];
let cachedCustomerData = null;   // null = belum pernah diambil

/* ══════════════════════════════════════════════════════════════
   PRELOAD CUSTOMER — panggil SEKALI saat halaman siap,
   sehingga saat tombol Edit diklik, data sudah tersedia
   dan select langsung terisi tanpa delay.
══════════════════════════════════════════════════════════════ */
function preloadCustomers(callback) {
    /* Jika sudah ada di cache, langsung pakai */
    if (cachedCustomerData !== null) {
        if (typeof callback === 'function') callback(cachedCustomerData);
        return;
    }
    $.getJSON('/customer/get-data', function (res) {
        cachedCustomerData = res.data || [];
        if (typeof callback === 'function') callback(cachedCustomerData);
    }).fail(function () {
        cachedCustomerData = [];
        if (typeof callback === 'function') callback([]);
    });
}

/* ══════════════════════════════════════════════════════════════
   ISI SELECT DARI CACHE — tidak ada AJAX di sini
══════════════════════════════════════════════════════════════ */
function fillCustomerSelect(selectId, selectedValue) {
    var $select = $('#' + selectId);
    $select.find('option:not(:first)').remove();

    if (cachedCustomerData && cachedCustomerData.length > 0) {
        $.each(cachedCustomerData, function (i, item) {
            var status = (item.alamat || '').toLowerCase();
            var icon   = status.includes('guru') ? '👨‍🏫 ' : status.includes('tendik') ? '💼 ' : '👤 ';
            var value  = item.customer;
            if (item.alamat && item.alamat !== '-') value += ' — ' + item.alamat;
            var opt = $('<option>', { value: value, text: icon + value });
            if (value === selectedValue || item.customer === selectedValue) opt.prop('selected', true);
            $select.append(opt);
        });
    }
    $select.prop('disabled', false);
    $('#' + selectId + '-loading').addClass('d-none');
}

/* ══════════════════════════════════════════════════════════════
   SOUND EFFECTS
══════════════════════════════════════════════════════════════ */
const AudioCtx = window.AudioContext || window.webkitAudioContext;

function playSound(type) {
    try {
        const ctx = new AudioCtx();
        if (type === 'success') {
            [523, 659, 784].forEach(function (freq, i) {
                const osc = ctx.createOscillator(), gain = ctx.createGain();
                osc.connect(gain); gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.13);
                gain.gain.setValueAtTime(0.4, ctx.currentTime + i * 0.13);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.13 + 0.3);
                osc.start(ctx.currentTime + i * 0.13);
                osc.stop(ctx.currentTime + i * 0.13 + 0.35);
            });
        } else if (type === 'error') {
            const osc = ctx.createOscillator(), gain = ctx.createGain();
            osc.connect(gain); gain.connect(ctx.destination);
            osc.type = 'sawtooth';
            osc.frequency.setValueAtTime(220, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(80, ctx.currentTime + 0.3);
            gain.gain.setValueAtTime(0.35, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.35);
            osc.start(ctx.currentTime); osc.stop(ctx.currentTime + 0.4);
        } else if (type === 'delete') {
            const osc = ctx.createOscillator(), gain = ctx.createGain();
            osc.connect(gain); gain.connect(ctx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(400, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(150, ctx.currentTime + 0.15);
            gain.gain.setValueAtTime(0.3, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.2);
            osc.start(ctx.currentTime); osc.stop(ctx.currentTime + 0.2);
        } else if (type === 'warning') {
            [440, 330].forEach(function (freq, i) {
                const osc = ctx.createOscillator(), gain = ctx.createGain();
                osc.connect(gain); gain.connect(ctx.destination);
                osc.type = 'triangle';
                osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.18);
                gain.gain.setValueAtTime(0.3, ctx.currentTime + i * 0.18);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.18 + 0.25);
                osc.start(ctx.currentTime + i * 0.18);
                osc.stop(ctx.currentTime + i * 0.18 + 0.28);
            });
        }
    } catch (e) {}
}

/* ══════════════════════════════════════════════════════════════
   BADGE PEMEGANG
══════════════════════════════════════════════════════════════ */
function pemegangBadge(nama) {
    if (!nama || nama === '-' || nama === '') {
        return '<span class="pemegang-badge pemegang-default"><i class="fas fa-user" style="font-size:10px"></i> —</span>';
    }
    var lower = nama.toLowerCase();
    if (lower.includes('guru')) {
        return '<span class="pemegang-badge pemegang-guru"><i class="fas fa-chalkboard-teacher" style="font-size:10px"></i> ' + nama + '</span>';
    } else if (lower.includes('tendik')) {
        return '<span class="pemegang-badge pemegang-tendik"><i class="fas fa-briefcase" style="font-size:10px"></i> ' + nama + '</span>';
    }
    return '<span class="pemegang-badge pemegang-default"><i class="fas fa-user-tie" style="font-size:10px"></i> ' + nama + '</span>';
}

/* ══════════════════════════════════════════════════════════════
   PREVIEW & VALIDASI GAMBAR
══════════════════════════════════════════════════════════════ */
function previewImage(inputId, previewId, infoId, alertId, areaId) {
    const input     = document.getElementById(inputId);
    const preview   = document.getElementById(previewId);
    const fileInfo  = document.getElementById(infoId);
    const alertBox  = document.getElementById(alertId);
    const alertText = document.getElementById(alertId + '-text');
    const previewWrp= document.getElementById(previewId + '-wrap');

    if (alertBox)    alertBox.classList.add('d-none');
    if (fileInfo)    fileInfo.classList.add('d-none');
    if (previewWrp)  previewWrp.classList.add('d-none');
    else if (preview) preview.classList.add('d-none');

    const file = input.files[0];
    if (!file) return;

    const sizeMB   = file.size / (1024 * 1024);
    const pct      = Math.min((file.size / MAX_BYTE) * 100, 100);
    const isTooBig = file.size > MAX_BYTE;

    if (fileInfo) {
        const prefix   = infoId.startsWith('edit') ? 'edit' : '';
        const fName    = document.getElementById(prefix ? 'edit-file-name'      : 'file-name');
        const fSizeT   = document.getElementById(prefix ? 'edit-file-size-text' : 'file-size-text');
        const sizeBar  = document.getElementById(prefix ? 'edit-file-size-bar'  : 'file-size-bar');
        const sizeHint = document.getElementById(prefix ? 'edit-file-size-hint' : 'file-size-hint');
        fileInfo.classList.remove('d-none');
        if (fName)   fName.textContent   = file.name;
        if (fSizeT)  { fSizeT.textContent = sizeMB.toFixed(2) + ' MB / ' + MAX_MB + ' MB'; fSizeT.style.color = isTooBig ? '#dc2626' : '#16a34a'; }
        if (sizeBar) { sizeBar.style.width = pct + '%'; sizeBar.className = 'progress-bar ' + (isTooBig ? 'bg-danger' : pct > 75 ? 'bg-warning' : 'bg-success'); }
        if (sizeHint) {
            if (isTooBig)   sizeHint.innerHTML = '<span style="color:#dc2626"><i class="fas fa-times-circle mr-1"></i>File terlalu besar!</span>';
            else if (pct>75) sizeHint.innerHTML = '<span style="color:#ca8a04"><i class="fas fa-exclamation-triangle mr-1"></i>Mendekati batas maksimal.</span>';
            else             sizeHint.innerHTML = '<span style="color:#16a34a"><i class="fas fa-check-circle mr-1"></i>Ukuran file sesuai batas.</span>';
        }
    }

    if (isTooBig) {
        if (alertBox && alertText) {
            alertText.textContent = 'Ukuran file ' + sizeMB.toFixed(2) + ' MB melebihi batas ' + MAX_MB + ' MB.';
            alertBox.classList.remove('d-none');
        }
        input.value = '';
        return;
    }

    preview.src = URL.createObjectURL(file);
    if (previewWrp) previewWrp.classList.remove('d-none');
    else            preview.classList.remove('d-none');
}

/* ══════════════════════════════════════════════════════════════
   VALIDASI DUPLIKASI
══════════════════════════════════════════════════════════════ */
function checkDuplicateAset(namaInput, pemegangInput, excludeId) {
    var namaClean     = (namaInput     || '').trim().toLowerCase();
    var pemegangClean = (pemegangInput || '').trim().toLowerCase();
    var result = { isDuplicate: false, sameNameDiffHolder: false, existingItem: null };
    if (!namaClean) return result;
    for (var i = 0; i < cachedAsetData.length; i++) {
        var item = cachedAsetData[i];
        if (excludeId && parseInt(item.id) === parseInt(excludeId)) continue;
        var existingNama     = (item.nama_aset || '').trim().toLowerCase();
        var existingPemegang = (item.kondisi   || '').trim().toLowerCase();
        if (existingNama === namaClean) {
            if (existingPemegang === pemegangClean) { result.isDuplicate = true; result.existingItem = item; break; }
            else { result.sameNameDiffHolder = true; result.existingItem = item; }
        }
    }
    return result;
}

function escapeHtml(text) {
    var map = { '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;' };
    return String(text).replace(/[&<>"']/g, function(m) { return map[m]; });
}

function showDuplicateAlert(existingItem) {
    playSound('warning');
    Swal.fire({
        title: '',
        html: '<div style="text-align:center;padding:0 8px;">' +
            '<span style="font-size:56px;display:block;margin-bottom:8px;">⚠️</span>' +
            '<div style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:17px;font-weight:800;color:#b45309;margin-bottom:6px;">Aset Sudah Terdaftar!</div>' +
            '<div style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;color:#64748b;margin-bottom:16px;line-height:1.6;">Kombinasi <b>Nama Aset</b> dan <b>Pemegang</b> yang sama sudah ada.</div>' +
            '<div style="background:#fffbeb;border:1.5px solid #fde68a;border-radius:14px;padding:16px 20px;text-align:left;">' +
            '<table style="width:100%;font-family:\'Plus Jakarta Sans\',sans-serif;font-size:12.5px;border-collapse:collapse;">' +
            '<tr><td style="padding:5px 0;color:#92400e;font-weight:700;width:40%;"><i class="fas fa-box" style="color:#f59e0b;margin-right:6px;"></i>Nama Aset</td>' +
            '<td style="padding:5px 0;color:#1e293b;font-weight:600;">' + escapeHtml(existingItem.nama_aset) + ' <span class="dup-badge-exact">Sama</span></td></tr>' +
            '<tr><td style="padding:5px 0;color:#92400e;font-weight:700;"><i class="fas fa-user-tie" style="color:#f59e0b;margin-right:6px;"></i>Pemegang</td>' +
            '<td style="padding:5px 0;color:#1e293b;font-weight:600;">' + escapeHtml(existingItem.kondisi || '—') + ' <span class="dup-badge-exact">Sama</span></td></tr>' +
            '</table></div></div>',
        showConfirmButton: true,
        confirmButtonText: '<i class="fas fa-arrow-left mr-1"></i> Kembali & Perbaiki',
        confirmButtonColor: '#f59e0b',
        showCloseButton: true,
        width: 480,
        padding: '24px'
    });
}

/* ══════════════════════════════════════════════════════════════
   MAIN — DATATABLE & CRUD
══════════════════════════════════════════════════════════════ */
$(document).ready(function () {

    /* ── Preload customer saat halaman pertama kali dibuka ── */
    /* Ini berjalan di background, tidak memblokir UI */
    preloadCustomers();

    let table = $('#table_aset').DataTable({
        processing: true,
        autoWidth:  false,
        ordering:   false,
        dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info:       'Menampilkan _START_–_END_ dari _TOTAL_ aset',
            infoEmpty:  'Tidak ada data',
            paginate:   { previous: '‹', next: '›' }
        }
    });

    $('#asSearch').on('keyup', function () {
        table.search($(this).val()).draw();
    });

    /* ── LOAD DATA ── */
    function loadData() {
        $.get('/aset/get-data', function (res) {
            table.clear();
            cachedAsetData = res.data || [];
            let totalJumlah = cachedAsetData.reduce(function(sum, item) { return sum + (parseInt(item.jumlah) || 0); }, 0);
            $('#statTotalAset').text(totalJumlah);
            let no = 1;
            $.each(cachedAsetData, function (i, item) {
                let aksiHtml = '<div class="aksi-group"><button class="aksi-new aksi-detail btn-detail" data-id="' + item.id + '" title="Detail"><i class="far fa-eye"></i></button>';
                if (!isKepalaSekolah) {
                    aksiHtml += '<button class="aksi-new aksi-edit btn-edit" data-id="' + item.id + '" title="Edit"><i class="far fa-edit"></i></button>';
                    aksiHtml += '<button class="aksi-new aksi-hapus btn-hapus" data-id="' + item.id + '" title="Hapus"><i class="fas fa-trash"></i></button>';
                }
                aksiHtml += '</div>';
                table.row.add([
                    '<div class="td-no">' + no++ + '</div>',
                    '<div class="img-aset-wrap"><img src="/storage/' + item.gambar + '" class="img-aset" onerror="this.src=\'/assets/img/no-image.png\'"></div>',
                    '<div class="nama-aset-cell"><div class="nama-aset">' + item.nama_aset + '</div></div>',
                    '<span class="jumlah-badge">' + item.jumlah + '</span>',
                    pemegangBadge(item.kondisi),
                    '<div class="lokasi-cell"><i class="fas fa-map-marker-alt"></i>' + item.lokasi + '</div>',
                    aksiHtml
                ]).draw(false);
            });
        });
    }

    loadData();

    /* ── EXPORT ── */
    $('#download-excel').click(function () { window.location.href = "{{ route('aset.export.excel') }}"; });
    $('#save-pdf').click(function ()       { window.location.href = "{{ route('aset.export.pdf') }}"; });

    /* ── BUKA MODAL TAMBAH ── */
    $('#button_tambah_aset').click(function () {
        $('#modal_tambah_aset form')[0].reset();
        $('#preview').attr('src', '');
        $('#preview-wrap').addClass('d-none');
        $('#file-info').addClass('d-none');
        $('#alert-gambar').addClass('d-none');
        /* Isi select dari cache — TIDAK ada AJAX di sini */
        preloadCustomers(function() { fillCustomerSelect('kondisi', ''); });
        $('#modal_tambah_aset').modal('show');
    });

    /* ── SIMPAN ASET BARU ── */
    $('#storeAset').click(function () {
        const fileInput   = $('#gambar')[0];
        const namaInput   = $('#nama_aset').val().trim();
        const pemegangVal = $('#kondisi').val();

        if (fileInput.files.length > 0 && fileInput.files[0].size > MAX_BYTE) {
            playSound('error');
            Swal.fire({ icon:'warning', title:'File Terlalu Besar!',
                html: 'Ukuran file <b>' + (fileInput.files[0].size/(1024*1024)).toFixed(2) + ' MB</b> melebihi batas <b>' + MAX_MB + ' MB</b>.',
                confirmButtonColor:'#2563eb', confirmButtonText:'Mengerti' });
            return;
        }

        if (namaInput !== '') {
            var dup = checkDuplicateAset(namaInput, pemegangVal, 0);
            if (dup.isDuplicate) { showDuplicateAlert(dup.existingItem); return; }
            if (dup.sameNameDiffHolder) {
                playSound('warning');
                Swal.fire({
                    title: 'Nama Aset Serupa',
                    html: '<div style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;color:#64748b;line-height:1.7;">Aset <b style="color:#1e40af">"' + escapeHtml(namaInput) + '"</b> sudah ada dengan pemegang berbeda. Lanjutkan?</div>',
                    icon: 'info', showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-save mr-1"></i> Ya, Simpan',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#2563eb', cancelButtonColor: '#64748b', width: 440
                }).then(function (r) { if (r.isConfirmed) doStoreAset(fileInput); });
                return;
            }
        }
        doStoreAset(fileInput);
    });

    function doStoreAset(fileInput) {
        let fd = new FormData();
        if (fileInput.files.length > 0) fd.append('gambar', fileInput.files[0]);
        fd.append('nama_aset', $('#nama_aset').val());
        fd.append('jumlah',    $('#jumlah').val());
        fd.append('kondisi',   $('#kondisi').val());
        fd.append('lokasi',    $('#lokasi').val());
        fd.append('_token',    '{{ csrf_token() }}');
        const btn = $('#storeAset');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');
        $.ajax({
            url: "{{ route('aset.store') }}", type: 'POST',
            data: fd, contentType: false, processData: false,
            success: function (res) {
                playSound('success');
                $('#modal_tambah_aset').modal('hide');
                $('#modal_tambah_aset form')[0].reset();
                Swal.fire({ icon:'success', title:'Sukses!', text:res.message, timer:2000, showConfirmButton:false });
                loadData();
            },
            error: function (xhr) {
                playSound('error');
                const errors = xhr.responseJSON?.errors;
                $('.alert[id^="alert-"]').addClass('d-none');
                if (errors) {
                    $.each(errors, function (f, msgs) {
                        if (f === 'gambar') $('#alert-gambar-text').text(msgs[0]);
                        else $('#alert-' + f).text(msgs[0]);
                        $('#alert-' + f).removeClass('d-none');
                    });
                    Swal.fire({ icon:'error', title:'Validasi Gagal', text:'Periksa kembali isian form.', confirmButtonColor:'#ef4444' });
                } else {
                    Swal.fire({ icon:'error', title:'Upload Gagal',
                        html: xhr.status === 413 ? '<b>File terlalu besar!</b>' : (xhr.responseJSON?.message || 'Terjadi kesalahan.'),
                        confirmButtonColor:'#ef4444' });
                }
            },
            complete: function () { btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Simpan Aset'); }
        });
    }

    /* ── DETAIL ── */
    $('#table_aset').on('click', '.btn-detail', function () {
        let id = $(this).data('id');
        $.get('/aset/' + id, function (res) {
            $('#detail_nama_aset').val(res.data.nama_aset);
            $('#detail_jumlah').val(res.data.jumlah);
            $('#detail_kondisi').val(res.data.kondisi);
            $('#detail_lokasi').val(res.data.lokasi);
            $('#detail_preview').attr('src', '/storage/' + res.data.gambar);
            if (typeof setPemegangBadge === 'function') setPemegangBadge(res.data.kondisi);
            $('#modal_detail_aset').modal('show');
        });
    });

    /* ── EDIT — BUKA MODAL ──
       FIX UTAMA:
       1. Ambil data aset via AJAX (ringan, 1 baris)
       2. Isi select dari cachedCustomerData (TANPA AJAX kedua)
       3. Modal langsung terbuka — tidak ada request blocking
    ── */
    $('#table_aset').on('click', '.btn-edit', function () {
        let id = $(this).data('id');

        /* Tampilkan modal lebih dulu agar user tidak menunggu layar kosong */
        $('#aset_id').val(id);
        $('#edit_nama_aset').val('');
        $('#edit_jumlah').val('');
        $('#edit_lokasi').val('');
        $('#edit_preview').attr('src', '');
        $('#edit-file-info').addClass('d-none');
        $('#alert-edit_gambar').addClass('d-none');
        $('#edit_kondisi').prop('disabled', true);
        $('#edit_kondisi-loading').removeClass('d-none');
        $('#modal_edit_aset').modal('show');

        /* Ambil data aset & isi customer dari cache secara paralel */
        $.get('/aset/' + id + '/edit', function (res) {
            $('#edit_nama_aset').val(res.data.nama_aset);
            $('#edit_jumlah').val(res.data.jumlah);
            $('#edit_lokasi').val(res.data.lokasi);
            $('#edit_preview').attr('src', '/storage/' + res.data.gambar);

            /* Isi select dari cache — jika cache belum ada, preload dulu */
            preloadCustomers(function () {
                fillCustomerSelect('edit_kondisi', res.data.kondisi);
            });
        });
    });

    /* ── UPDATE ASET ── */
    $('#updateAset').click(function () {
        const fileInput   = $('#edit_gambar')[0];
        const namaInput   = $('#edit_nama_aset').val().trim();
        const pemegangVal = $('#edit_kondisi').val();
        const currentId   = $('#aset_id').val();

        if (fileInput.files.length > 0 && fileInput.files[0].size > MAX_BYTE) {
            playSound('error');
            Swal.fire({ icon:'warning', title:'File Terlalu Besar!',
                html: 'Ukuran file <b>' + (fileInput.files[0].size/(1024*1024)).toFixed(2) + ' MB</b> melebihi batas <b>' + MAX_MB + ' MB</b>.',
                confirmButtonColor:'#2563eb', confirmButtonText:'Mengerti' });
            return;
        }

        if (namaInput !== '') {
            var dup = checkDuplicateAset(namaInput, pemegangVal, currentId);
            if (dup.isDuplicate) { showDuplicateAlert(dup.existingItem); return; }
            if (dup.sameNameDiffHolder) {
                playSound('warning');
                Swal.fire({
                    title: 'Nama Aset Serupa',
                    html: '<div style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;color:#64748b;line-height:1.7;">Aset <b style="color:#1e40af">"' + escapeHtml(namaInput) + '"</b> sudah ada dengan pemegang berbeda. Lanjutkan?</div>',
                    icon: 'info', showCancelButton: true,
                    confirmButtonText: '<i class="fas fa-save mr-1"></i> Ya, Simpan Perubahan',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#2563eb', cancelButtonColor: '#64748b', width: 440
                }).then(function (r) { if (r.isConfirmed) doUpdateAset(fileInput, currentId); });
                return;
            }
        }
        doUpdateAset(fileInput, currentId);
    });

    function doUpdateAset(fileInput, id) {
        let fd = new FormData();
        fd.append('nama_aset', $('#edit_nama_aset').val());
        fd.append('jumlah',    $('#edit_jumlah').val());
        fd.append('kondisi',   $('#edit_kondisi').val());
        fd.append('lokasi',    $('#edit_lokasi').val());
        if (fileInput.files.length > 0) fd.append('gambar', fileInput.files[0]);
        fd.append('_token',  '{{ csrf_token() }}');
        fd.append('_method', 'PUT');

        const btn = $('#updateAset');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');

        $.ajax({
            url: '/aset/' + id, type: 'POST',
            data: fd, contentType: false, processData: false,
            success: function (res) {
                playSound('success');
                $('#modal_edit_aset').modal('hide');
                Swal.fire({ icon:'success', title:'Sukses!', text:res.message, timer:2000, showConfirmButton:false });
                loadData();
            },
            error: function (xhr) {
                playSound('error');
                const errors = xhr.responseJSON?.errors;
                if (errors?.gambar) {
                    $('#alert-edit_gambar-text').text(errors.gambar[0]);
                    $('#alert-edit_gambar').removeClass('d-none');
                }
                Swal.fire({ icon:'error', title:'Update Gagal',
                    html: xhr.status === 413 ? '<b>File terlalu besar!</b>' : (xhr.responseJSON?.message || 'Terjadi kesalahan.'),
                    confirmButtonColor:'#ef4444' });
            },
            complete: function () {
                btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Simpan Perubahan');
            }
        });
    }

    /* ── HAPUS ── */
    $('#table_aset').on('click', '.btn-hapus', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Hapus Aset?',
            html: '<div style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;color:#64748b;margin-bottom:16px;line-height:1.7;">Data aset ini akan dihapus permanen. Mohon isi <b>alasan penghapusan</b>.</div>' +
                '<textarea id="swal-alasan-hapus" class="swal2-textarea" placeholder="Contoh: Aset rusak berat…" style="font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;font-weight:600;border-radius:10px;border:1.5px solid #e2e8f0;resize:vertical;min-height:90px;width:100%;padding:10px 14px;outline:none;color:#0f172a;"></textarea>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-trash mr-1"></i> Ya, Hapus!',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            width: 460,
            preConfirm: function() {
                const alasan = document.getElementById('swal-alasan-hapus').value.trim();
                if (!alasan) { Swal.showValidationMessage('Alasan penghapusan wajib diisi!'); return false; }
                return alasan;
            }
        }).then(function (result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/aset/' + id, type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}', alasan_hapus: result.value },
                    success: function () {
                        playSound('delete');
                        Swal.fire({ icon:'success', title:'Terhapus!', text:'Data aset berhasil dihapus dan dicatat dalam riwayat.', timer:2200, showConfirmButton:false });
                        loadData();
                    },
                    error: function () {
                        playSound('error');
                        Swal.fire({ icon:'error', title:'Gagal', text:'Terjadi kesalahan saat menghapus data.', confirmButtonColor:'#ef4444' });
                    }
                });
            }
        });
    });

    /* ── RIWAYAT PENGHAPUSAN ── */
    $(document).on('click', '#btn_riwayat_hapus', function () {
        $('#modal_riwayat_hapus_aset').modal('show');
        loadRiwayatHapus();
    });

    function loadRiwayatHapus() {
        var $tbody = $('#tbody_riwayat_hapus');
        $tbody.html('<tr><td colspan="8" style="text-align:center;padding:40px;color:#94a3b8;font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;font-weight:600;"><i class="fas fa-spinner fa-spin mr-2"></i> Memuat data…</td></tr>');
        $.get('/aset/riwayat-hapus', function (res) {
            $tbody.empty();
            var total = res.data ? res.data.length : 0;
            $('#stat_total_hapus').text(total);
            if (total === 0) {
                $tbody.html('<tr><td colspan="8"><div class="riwayat-empty"><span class="emoji">🗑️</span><div class="title">Belum Ada Riwayat Penghapusan</div><div class="sub">Aset yang dihapus akan muncul di sini.</div></div></td></tr>');
                return;
            }
            $.each(res.data, function (i, item) {
                var alasanHtml = item.alasan_hapus
                    ? '<span class="alasan-badge" title="' + escapeHtml(item.alasan_hapus) + '">' + escapeHtml(item.alasan_hapus) + '</span>'
                    : '<span style="color:#94a3b8;font-size:12px;font-style:italic;">Tidak ada keterangan</span>';
                $tbody.append('<tr>' +
                    '<td><div class="td-no">' + (i+1) + '</div></td>' +
                    '<td style="text-align:left;"><div style="font-weight:700;color:#0f172a;font-size:13px;">' + escapeHtml(item.nama_aset || '—') + '</div></td>' +
                    '<td><span class="jumlah-badge">' + (item.jumlah || '—') + '</span></td>' +
                    '<td>' + pemegangBadge(item.kondisi) + '</td>' +
                    '<td><div class="lokasi-cell"><i class="fas fa-map-marker-alt"></i>' + escapeHtml(item.lokasi || '—') + '</div></td>' +
                    '<td>' + alasanHtml + '</td>' +
                    '<td><span class="dihapus-oleh-badge"><i class="fas fa-user" style="font-size:10px;"></i>' + escapeHtml(item.dihapus_oleh || '—') + '</span></td>' +
                    '<td><div class="tanggal-hapus"><i class="fas fa-calendar-alt"></i>' + escapeHtml(item.tanggal_hapus || '—') + '</div></td>' +
                    '</tr>');
            });
        }).fail(function () {
            $tbody.html('<tr><td colspan="8" style="text-align:center;padding:40px;color:#ef4444;font-family:\'Plus Jakarta Sans\',sans-serif;font-size:13px;font-weight:600;"><i class="fas fa-exclamation-triangle mr-2"></i> Gagal memuat data.</td></tr>');
        });
    }

    $('#searchRiwayatHapus').on('keyup', function () {
        var keyword = $(this).val().toLowerCase();
        $('#tbody_riwayat_hapus tr').filter(function () {
            $(this).toggle($(this).text().toLowerCase().includes(keyword));
        });
    });

});
</script>
@endpush