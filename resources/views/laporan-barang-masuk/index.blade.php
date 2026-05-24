@extends('layouts.app')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.css">

<style>
/* =============================================
   LAPORAN BARANG MASUK
============================================= */
.ct-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: ctFadeIn .45s ease both;
}

@keyframes ctFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── PAGE HEADER ── */
.ct-header {
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

.ct-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.ct-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.ct-header-left { position: relative; z-index: 1; }

.ct-header-eyebrow {
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

.ct-header-eyebrow i { font-size: 9px; color: #93c5fd; }

.ct-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.ct-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.ct-header-right {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
}

/* STAT PILL */
.ct-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}
.ct-stat-pill .ctn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.ct-stat-pill .ctl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

/* EXPORT BUTTONS */
.btn-export {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: none;
    border-radius: 12px;
    padding: 11px 20px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 800;
    cursor: pointer;
    transition: all .25s ease;
    box-shadow: 0 4px 16px rgba(0,0,0,.15);
    position: relative;
    z-index: 1;
    text-decoration: none;
    color: #fff !important;
}

.btn-export:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.22);
    color: #fff !important;
    text-decoration: none;
}

.btn-export-excel { background: linear-gradient(135deg, #15803d, #16a34a); }
.btn-export-pdf   { background: linear-gradient(135deg, #b91c1c, #dc2626); }

/* ── FILTER CARD ── */
.ct-filter-card {
    background: #fff;
    border-radius: 20px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 20px rgba(15,23,42,.07);
    overflow: hidden;
    margin-bottom: 20px;
}

.ct-filter-header {
    background: linear-gradient(135deg, #f8faff, #eff6ff);
    border-bottom: 1px solid #dbeafe;
    padding: 14px 24px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.ct-filter-header i { color: #2563eb; font-size: 14px; }

.ct-filter-header span {
    font-size: 13px;
    font-weight: 800;
    color: #1e40af;
    letter-spacing: .2px;
}

.ct-filter-body { padding: 20px 24px; }

.ct-filter-grid {
    display: grid;
    grid-template-columns: 1fr 1fr auto;
    gap: 16px;
    align-items: end;
}

@media (max-width: 768px) {
    .ct-filter-grid { grid-template-columns: 1fr; }
}

.ct-field-label {
    font-size: 11px;
    font-weight: 800;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 8px;
    display: block;
}

/* ── FLATPICKR INPUT WRAPPER ── */
.fp-wrap {
    position: relative;
}

.fp-wrap input {
    width: 100%;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #1e3a8a;
    background: #f8faff;
    border: 1.5px solid #dbeafe;
    border-radius: 12px;
    padding: 11px 16px 11px 46px;
    outline: none;
    cursor: pointer;
    transition: all .2s ease;
    caret-color: transparent;
}

.fp-wrap input:focus {
    border-color: #2563eb;
    background: #eff6ff;
    box-shadow: 0 0 0 4px rgba(37,99,235,.12);
}

.fp-wrap input::placeholder {
    color: #94a3b8;
    font-weight: 600;
}

.fp-icon-box {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    width: 24px;
    height: 24px;
    background: linear-gradient(135deg, #2563eb, #0891b2);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: none;
}

.fp-icon-box i { color: #fff; font-size: 10px; }

.ct-filter-actions {
    display: flex;
    gap: 8px;
}

.btn-filter {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    border: none;
    border-radius: 12px;
    padding: 11px 20px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    transition: all .2s ease;
    white-space: nowrap;
}

.btn-filter-apply {
    background: linear-gradient(135deg, #1e40af, #2563eb);
    color: #fff;
    box-shadow: 0 4px 12px rgba(37,99,235,.35);
}

.btn-filter-apply:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 22px rgba(37,99,235,.45);
}

.btn-filter-reset {
    background: #f1f5f9;
    color: #64748b;
    border: 1.5px solid #e2e8f0;
}

.btn-filter-reset:hover {
    background: #6cffbf;
    color: #334155;
    transform: translateY(-1px);
}

/* ── MAIN CARD ── */
.ct-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.ct-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.ct-card-body { padding: 24px; }

/* ── TABLE ── */
#table_id {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_id thead th {
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
    vertical-align: middle;
}

#table_id thead th:nth-child(4),
#table_id thead th:nth-child(6) { text-align: left !important; padding-left: 16px !important; }
#table_id thead th:first-child   { border-radius: 12px 0 0 12px !important; }
#table_id thead th:last-child    { border-radius: 0 12px 12px 0 !important; }

#table_id tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_id tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_id tbody td {
    padding: 14px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_id tbody td:nth-child(4),
#table_id tbody td:nth-child(6) { text-align: left !important; }
#table_id tbody td:first-child   { border-radius: 14px 0 0 14px !important; }
#table_id tbody td:last-child    { border-radius: 0 14px 14px 0 !important; }

/* CELLS */
.td-no {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #1d4ed8;
    font-weight: 800;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.kode-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 700;
    color: #1d4ed8;
    font-family: monospace;
}

.tanggal-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 700;
    color: #15803d;
}

.barang-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.barang-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}

.barang-name { font-size: 13px; font-weight: 700; color: #0f172a; }

.badge-masuk {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #2563eb, #1e40af);
    color: #fff;
    border-radius: 10px;
    padding: 6px 16px;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(37,99,235,.3);
}

.supplier-cell {
    display: flex;
    align-items: center;
    gap: 8px;
}

.supplier-avatar {
    width: 34px; height: 34px;
    border-radius: 50%;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    flex-shrink: 0;
}

.supplier-name { font-size: 13px; font-weight: 600; color: #334155; }

/* LOADING */
#ct-loading-overlay { display: none; padding: 36px 0; text-align: center; }

.ct-loading {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #64748b;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
}

.ct-loading-spinner {
    width: 22px; height: 22px;
    border: 3px solid #dbeafe;
    border-top-color: #2563eb;
    border-radius: 50%;
    animation: ctSpin .7s linear infinite;
    flex-shrink: 0;
}

@keyframes ctSpin { to { transform: rotate(360deg); } }

/* DATATABLE OVERRIDES */
.dataTables_wrapper .dataTables_filter input {
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 7px 12px;
    font-size: 13px;
    outline: none;
    transition: all .2s ease;
}

.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.dataTables_wrapper .dataTables_filter label {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #64748b;
}

.dataTables_wrapper .dataTables_length select {
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    padding: 5px 10px;
    font-size: 13px;
    outline: none;
}

.dataTables_wrapper .dataTables_info {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    color: #94a3b8;
    font-weight: 600;
    padding-top: 14px !important;
}

.dataTables_wrapper .dataTables_paginate { padding-top: 10px !important; }

.dataTables_wrapper .dataTables_paginate .paginate_button {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px !important;
    border: none !important;
    padding: 6px 12px !important;
    margin: 0 2px;
    color: #475569 !important;
    transition: all .2s ease;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #eff6ff !important;
    color: #2563eb !important;
    box-shadow: none !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
    color: #fff !important;
    box-shadow: 0 4px 12px rgba(37,99,235,.3) !important;
}

/* ══════════════════════════════════════════
   FLATPICKR CUSTOM THEME — PREMIUM BLUE
══════════════════════════════════════════ */
.flatpickr-calendar {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    border: none !important;
    border-radius: 20px !important;
    box-shadow: 0 20px 60px rgba(15,23,42,.18), 0 4px 16px rgba(37,99,235,.12) !important;
    padding: 0 !important;
    overflow: hidden;
    width: 308px !important;
}

/* Header bulan/tahun */
.flatpickr-months {
    background: linear-gradient(135deg, #1e40af, #2563eb) !important;
    border-radius: 20px 20px 0 0 !important;
    padding: 14px 10px 12px !important;
    align-items: center;
}

.flatpickr-month {
    height: auto !important;
    background: transparent !important;
    color: #fff !important;
}

.flatpickr-current-month {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-size: 14px !important;
    font-weight: 800 !important;
    color: #fff !important;
    padding: 0 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 4px !important;
    width: 100% !important;
    left: 0 !important;
    position: relative !important;
}

/* Nama bulan static (teks biasa, tanpa dropdown) */
.flatpickr-current-month .cur-month {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-weight: 800 !important;
    color: #fff !important;
    font-size: 14px !important;
    letter-spacing: .2px;
    pointer-events: none;
}

.flatpickr-current-month input.cur-year {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-weight: 800 !important;
    color: #fff !important;
    background: rgba(255,255,255,.18) !important;
    border: none !important;
    border-radius: 8px !important;
    padding: 4px 8px !important;
    font-size: 13px !important;
    width: 68px !important;
}

/* Tombol prev / next */
.flatpickr-prev-month,
.flatpickr-next-month {
    background: rgba(255,255,255,.18) !important;
    border-radius: 10px !important;
    padding: 7px 11px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    transition: background .2s ease !important;
    top: 14px !important;
}

.flatpickr-prev-month:hover,
.flatpickr-next-month:hover { background: rgba(255,255,255,.32) !important; }

.flatpickr-prev-month svg,
.flatpickr-next-month svg { fill: #fff !important; width: 13px !important; height: 13px !important; }

/* Area hari */
.flatpickr-innerContainer {
    padding: 12px 12px 16px !important;
    background: #fff !important;
}

/* Nama hari (Su Mo Tu …) */
.flatpickr-weekdays { background: #fff !important; padding: 0 0 4px !important; }

.flatpickr-weekday {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-size: 10px !important;
    font-weight: 800 !important;
    color: #94a3b8 !important;
    text-transform: uppercase !important;
    letter-spacing: .5px !important;
    background: #fff !important;
}

/* Container tanggal */
.flatpickr-days { border: none !important; }
.dayContainer { padding: 0 !important; gap: 2px; }

/* Setiap tanggal */
.flatpickr-day {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    color: #334155 !important;
    border-radius: 10px !important;
    height: 36px !important;
    line-height: 36px !important;
    max-width: 36px !important;
    transition: all .18s ease !important;
    border: none !important;
    margin: 1px !important;
}

.flatpickr-day:hover {
    background: #eff6ff !important;
    color: #2563eb !important;
    border: none !important;
}

/* Hari ini */
.flatpickr-day.today {
    background: #dbeafe !important;
    color: #1d4ed8 !important;
    font-weight: 800 !important;
    border: none !important;
    position: relative !important;
}

.flatpickr-day.today::after {
    content: '';
    position: absolute;
    bottom: 4px;
    left: 50%;
    transform: translateX(-50%);
    width: 5px;
    height: 5px;
    background: #2563eb;
    border-radius: 50%;
}

/* Tanggal terpilih (single atau range endpoint) */
.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.endRange {
    background: linear-gradient(135deg, #1e40af, #2563eb) !important;
    color: #fff !important;
    border: none !important;
    box-shadow: 0 4px 14px rgba(37,99,235,.4) !important;
    font-weight: 800 !important;
}

/* Range di antara start & end */
.flatpickr-day.inRange {
    background: #dbeafe !important;
    color: #1d4ed8 !important;
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;
}

.flatpickr-day.startRange { border-radius: 10px 0 0 10px !important; }
.flatpickr-day.endRange   { border-radius: 0 10px 10px 0 !important; }
.flatpickr-day.startRange.endRange { border-radius: 10px !important; }

/* Hari bulan lain */
.flatpickr-day.prevMonthDay,
.flatpickr-day.nextMonthDay { color: #cbd5e1 !important; font-weight: 600 !important; }

.flatpickr-day.flatpickr-disabled { color: #e2e8f0 !important; cursor: not-allowed !important; }
</style>

<div class="ct-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="ct-header">
        <div class="ct-header-left">
            <div class="ct-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Inventaris
            </div>
            <h1><i class="fas fa-arrow-right-to-bracket" style="font-size:24px; margin-right:12px; vertical-align:middle;"></i>Laporan Barang Masuk</h1>
            <div class="ct-header-sub">Riwayat transaksi barang masuk</div>
        </div>

        <div class="ct-header-right">
            <div class="ct-stat-pill">
                <div class="ctn" id="statTotalData">—</div>
                <div class="ctl">Total Data</div>
            </div>
            <button type="button" class="btn-export btn-export-excel" id="download-excel">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
            <button type="button" class="btn-export btn-export-pdf" id="save-pdf">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

    {{-- ── FILTER CARD ── --}}
    <div class="ct-filter-card">
        <div class="ct-filter-header">
            <i class="fas fa-filter"></i>
            <span>Filter Rentang Tanggal</span>
        </div>
        <div class="ct-filter-body">
            <form id="filter_form">
                <div class="ct-filter-grid">

                    {{-- Tanggal Mulai --}}
                    <div>
                        <span class="ct-field-label">Tanggal Mulai</span>
                        <div class="fp-wrap">
                            <div class="fp-icon-box"><i class="fas fa-calendar-alt"></i></div>
                            <input type="text" id="tanggal_mulai" name="tanggal_mulai"
                                   placeholder=">> Pilih Tanggal Mulai" readonly>
                        </div>
                    </div>

                    {{-- Tanggal Selesai --}}
                    <div>
                        <span class="ct-field-label">Tanggal Selesai</span>
                        <div class="fp-wrap">
                            <div class="fp-icon-box"><i class="fas fa-calendar-check"></i></div>
                            <input type="text" id="tanggal_selesai" name="tanggal_selesai"
                                   placeholder=">> Pilih Tanggal Selesai" readonly>
                        </div>
                    </div>

                    {{-- Tombol --}}
                    <div class="ct-filter-actions">
                        <button type="submit" class="btn-filter btn-filter-apply">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <button type="button" class="btn-filter btn-filter-reset" id="refresh_btn">
                            <i class="fas fa-rotate-right"></i> Reset
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="ct-card">
        <div class="ct-card-stripe"></div>
        <div class="ct-card-body">

            <div id="ct-loading-overlay">
                <div class="ct-loading">
                    <div class="ct-loading-spinner"></div>
                    <span>Sedang memuat data, harap tunggu...</span>
                </div>
            </div>

            <div id="ct-table-wrapper" class="table-responsive">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th style="width:60px">No</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal Masuk</th>
                            <th style="text-align:left; padding-left:16px;">Nama Barang</th>
                            <th style="width:140px">Jumlah Masuk</th>
                            <th style="text-align:left; padding-left:16px;">Supplier</th>
                        </tr>
                    </thead>
                    <tbody id="tabel-laporan-barang-masuk"></tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js"></script>
<script>
$(document).ready(function () {

    /* ══════════════════════════════════════════
       INIT FLATPICKR — Kalender Modern Premium
    ══════════════════════════════════════════ */
    var fpStart = flatpickr('#tanggal_mulai', {
        dateFormat: 'd/m/Y',
        altInput:   true,
        altFormat:  'Y-m-d',
        allowInput: false,
        disableMobile: true,
        monthSelectorType: 'static',   // ← nama bulan jadi teks biasa (tanpa dropdown)
        locale: {
            firstDayOfWeek: 0,
            weekdays: {
                shorthand: ['Su','Mo','Tu','We','Th','Fr','Sa'],
                longhand:  ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
            },
            months: {
                shorthand: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                longhand:  ['January','February','March','April','May','June','July','August','September','October','November','December']
            }
        },
        onChange: function (selectedDates) {
            if (selectedDates[0]) fpEnd.set('minDate', selectedDates[0]);
        }
    });

    var fpEnd = flatpickr('#tanggal_selesai', {
        dateFormat: 'd/m/Y',
        altInput:   true,
        altFormat:  'Y-m-d',
        allowInput: false,
        disableMobile: true,
        monthSelectorType: 'static',   // ← nama bulan jadi teks biasa (tanpa dropdown)
        locale: {
            firstDayOfWeek: 0,
            weekdays: {
                shorthand: ['Su','Mo','Tu','We','Th','Fr','Sa'],
                longhand:  ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']
            },
            months: {
                shorthand: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                longhand:  ['January','February','March','April','May','June','July','August','September','October','November','December']
            }
        }
    });

    /* ══════════════════════════════════════════
       DATATABLE
    ══════════════════════════════════════════ */
    var table = $('#table_id').DataTable({
        paging: true,
        responsive: true,
        language: {
            search:      "Cari :",
            lengthMenu:  "Tampilkan _MENU_ data",
            info:        "Menampilkan _START_–_END_ dari _TOTAL_ data",
            infoEmpty:   "Tidak ada data",
            zeroRecords: "Tidak ada data yang sesuai",
            emptyTable:  "Tidak ada data tersedia",
            paginate:    { previous: '‹', next: '›' }
        }
    });

    var supplierCache = null;

    function showLoading() {
        $('#ct-table-wrapper').hide();
        $('#ct-loading-overlay').show();
        $('#statTotalData').text('—');
    }

    function hideLoading() {
        $('#ct-loading-overlay').hide();
        $('#ct-table-wrapper').show();
    }

    loadData();

    /* ── SUBMIT FILTER ── */
    $('#filter_form').submit(function (e) {
        e.preventDefault();
        loadData();
    });

    /* ── RESET ── */
    $('#refresh_btn').on('click', function () {
        fpStart.clear();
        fpEnd.clear();
        fpEnd.set('minDate', null);
        loadData();
    });

    /* ── LOAD DATA ── */
    function loadData() {
        var tanggalMulai   = fpStart.selectedDates[0] ? fpStart.formatDate(fpStart.selectedDates[0], 'Y-m-d') : '';
        var tanggalSelesai = fpEnd.selectedDates[0]   ? fpEnd.formatDate(fpEnd.selectedDates[0], 'Y-m-d')     : '';

        showLoading();

        $.when(
            $.ajax({
                url: '/laporan-barang-masuk/get-data',
                type: 'GET',
                dataType: 'json',
                data: { tanggal_mulai: tanggalMulai, tanggal_selesai: tanggalSelesai }
            }),
            supplierCache !== null
                ? $.Deferred().resolve(supplierCache).promise()
                : $.getJSON('{{ url('api/supplier') }}').then(function (suppliers) {
                    var map = {};
                    $.each(suppliers, function (i, s) { map[s.id] = s.supplier; });
                    supplierCache = map;
                    return map;
                  })
        ).then(function (dataResult, suppliersResult) {

            var response  = Array.isArray(dataResult)      ? dataResult[0]      : dataResult;
            var suppliers = Array.isArray(suppliersResult) ? suppliersResult[0] : suppliersResult;

            table.clear();
            $('#statTotalData').text(response.length);

            if (response.length > 0) {
                $.each(response, function (index, item) {
                    var supplierName = suppliers[item.supplier_id] || '-';

                    table.row.add([
                        `<div class="td-no">${index + 1}</div>`,
                        `<span class="kode-badge"><i class="fas fa-barcode"></i>${item.kode_transaksi}</span>`,
                        `<span class="tanggal-badge"><i class="fas fa-calendar-days"></i>${item.tanggal_masuk}</span>`,
                        `<div class="barang-cell">
                            <div class="barang-icon"><i class="fas fa-box"></i></div>
                            <div class="barang-name">${item.nama_barang}</div>
                        </div>`,
                        `<span class="badge-masuk"><i class="fas fa-arrow-down" style="font-size:11px"></i> ${item.jumlah_masuk}</span>`,
                        `<div class="supplier-cell">
                            <div class="supplier-avatar"><i class="fas fa-truck"></i></div>
                            <div class="supplier-name">${supplierName}</div>
                        </div>`
                    ]);
                });
            }

            hideLoading();
            table.draw();

        }).fail(function (xhr, status, error) {
            hideLoading();
            table.clear().draw();
            alert('Gagal memuat data. Silakan coba lagi.');
            console.error(error);
        });
    }

    /* ── EXPORT ── */
    function getExportParams() {
        var mulai   = fpStart.selectedDates[0] ? fpStart.formatDate(fpStart.selectedDates[0], 'Y-m-d') : '';
        var selesai = fpEnd.selectedDates[0]   ? fpEnd.formatDate(fpEnd.selectedDates[0], 'Y-m-d')     : '';
        return (mulai && selesai) ? '?tanggal_mulai=' + mulai + '&tanggal_selesai=' + selesai : '';
    }

    $('#download-excel').on('click', function () {
        window.location.href = '/laporan-barang-masuk/export-excel' + getExportParams();
    });

    $('#save-pdf').on('click', function () {
        window.location.href = '/laporan-barang-masuk/save-pdf' + getExportParams();
    });

});
</script>

@endsection