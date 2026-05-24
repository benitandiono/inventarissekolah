@extends('layouts.app')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =============================================
   LAPORAN STOK BARANG — PREMIUM UPGRADE
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

/* ══════════════════════════════════════════
   FILTER CARD — ORIENTASI KERTAS UPGRADE
══════════════════════════════════════════ */
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

.ct-filter-body {
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

/* Label kiri */
.ct-orient-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11px;
    font-weight: 800;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.ct-orient-label i { color: #2563eb; font-size: 13px; }

/* Toggle wrapper */
.ct-orient-toggle {
    display: flex;
    align-items: center;
    background: #f1f5f9;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 4px;
    gap: 4px;
}

/* Setiap opsi */
.ct-orient-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 9px 20px;
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 700;
    color: #64748b;
    cursor: pointer;
    border: none;
    background: transparent;
    transition: all .25s ease;
    white-space: nowrap;
    user-select: none;
}

/* Ikon kertas sebagai div */
.orient-icon-wrap {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    border-radius: 7px;
    background: #e2e8f0;
    transition: all .25s ease;
    flex-shrink: 0;
}

.icon-paper-landscape {
    width: 17px;
    height: 13px;
    border: 2.5px solid #94a3b8;
    border-radius: 2px;
    transition: border-color .25s ease;
}

.icon-paper-portrait {
    width: 12px;
    height: 17px;
    border: 2.5px solid #94a3b8;
    border-radius: 2px;
    transition: border-color .25s ease;
}

/* Hover non-aktif */
.ct-orient-btn:hover:not(.active) {
    color: #334155;
    background: #e2e8f0;
}

.ct-orient-btn:hover:not(.active) .orient-icon-wrap {
    background: #cbd5e1;
}

/* State AKTIF */
.ct-orient-btn.active {
    background: linear-gradient(135deg, #1e40af, #2563eb);
    color: #fff;
    box-shadow: 0 4px 16px rgba(37,99,235,.38);
}

.ct-orient-btn.active .orient-icon-wrap {
    background: rgba(255,255,255,.22);
}

.ct-orient-btn.active .icon-paper-landscape,
.ct-orient-btn.active .icon-paper-portrait {
    border-color: #fff;
}

/* Info badge di sebelah kanan toggle */
.ct-orient-info {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 99px;
    padding: 6px 14px;
    font-size: 11px;
    font-weight: 700;
    color: #1d4ed8;
    letter-spacing: .3px;
}

.ct-orient-info i { font-size: 10px; }

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

#table_id thead th:nth-child(3) {
    text-align: left !important;
    padding-left: 16px !important;
}

#table_id thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_id thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

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

#table_id tbody td:nth-child(3) {
    text-align: left !important;
}

#table_id tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_id tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

/* NO COL */
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

/* KODE BARANG BADGE */
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

/* NAMA BARANG CELL */
.barang-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    text-align: left;
    justify-content: flex-start;
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

.barang-name {
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
}

/* STOK BADGE */
.stok-badge {
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

/* ── LOADING OVERLAY ── */
#ct-loading-overlay {
    display: none;
    padding: 36px 0;
    text-align: center;
}

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

@keyframes ctSpin {
    to { transform: rotate(360deg); }
}

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
</style>

<div class="ct-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="ct-header">
        <div class="ct-header-left">
            <div class="ct-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Inventaris
            </div>
            <h1><i class="fas fa-chart-bar" style="font-size:26px; margin-right:12px; vertical-align:middle;"></i>Laporan Stok Barang</h1>
            <div class="ct-header-sub">Ringkasan stok barang terkini</div>
        </div>

        <div class="ct-header-right">
            <div class="ct-stat-pill">
                <div class="ctn" id="statTotalBarang">—</div>
                <div class="ctl">Total Item</div>
            </div>
            <button type="button" class="btn-export btn-export-excel" id="download-excel">
                <i class="fas fa-file-excel"></i> Export Excel
            </button>
            <button type="button" class="btn-export btn-export-pdf" id="save-pdf">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
        </div>
    </div>

    {{-- ── FILTER ORIENTASI KERTAS — PREMIUM UPGRADE ── --}}
    <div class="ct-filter-card">
        <div class="ct-filter-header">
            <i class="fas fa-print"></i>
            <span>Orientasi Kertas PDF</span>
        </div>
        <div class="ct-filter-body">

            {{-- Label --}}
            <span class="ct-orient-label">
                <i class="fas fa-file-alt"></i>
                Pilih Orientasi
            </span>

            {{-- Toggle Button Group --}}
            <div class="ct-orient-toggle">

                {{-- Landscape --}}
                <button type="button" class="ct-orient-btn active" data-value="landscape">
                    <span class="orient-icon-wrap">
                        <span class="icon-paper-landscape"></span>
                    </span>
                    Landscape
                </button>

                {{-- Portrait --}}
                <button type="button" class="ct-orient-btn" data-value="portrait">
                    <span class="orient-icon-wrap">
                        <span class="icon-paper-portrait"></span>
                    </span>
                    Portrait
                </button>

            </div>

            {{-- Badge info orientasi aktif --}}
            <span class="ct-orient-info">
                <i class="fas fa-check-circle"></i>
                <span id="orient-info-text">Landscape dipilih</span>
            </span>

            {{-- Hidden input nilai orientasi --}}
            <input type="hidden" id="orientasi" value="landscape">

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
                            <th>Kode Barang</th>
                            <th style="text-align:left; padding-left:16px;">Nama Barang</th>
                            <th style="width:140px">Stok Barang</th>
                        </tr>
                    </thead>
                    <tbody id="tabel-laporan-stok"></tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<script>
$(document).ready(function() {

    var table = $('#table_id').DataTable({
        paging: true,
        responsive: true,
        language: {
            search:     "Cari :",
            lengthMenu: "Tampilkan _MENU_ data",
            info:       "Menampilkan _START_–_END_ dari _TOTAL_ data",
            infoEmpty:  "Tidak ada data",
            zeroRecords: "Tidak ada data yang sesuai",
            emptyTable:  "Tidak ada data tersedia",
            paginate:   { previous: '‹', next: '›' }
        }
    });

    function showLoading() {
        $('#ct-table-wrapper').hide();
        $('#ct-loading-overlay').show();
        $('#statTotalBarang').text('—');
    }

    function hideLoading() {
        $('#ct-loading-overlay').hide();
        $('#ct-table-wrapper').show();
    }

    function loadData(selectedOption) {
        showLoading();

        $.ajax({
            url: '/laporan-stok/get-data',
            type: 'GET',
            data: { opsi: selectedOption },
            success: function (response) {
                table.clear();
                $('#statTotalBarang').text(response.length);

                $.each(response, function (index, item) {
                    table.row.add([
                        `<div class="td-no">${index + 1}</div>`,
                        `<span class="kode-badge"><i class="fas fa-barcode"></i>${item.kode_barang}</span>`,
                        `<div class="barang-cell">
                            <div class="barang-icon"><i class="fas fa-box"></i></div>
                            <div class="barang-name">${item.nama_barang}</div>
                        </div>`,
                        `<span class="stok-badge"><i class="fas fa-layer-group" style="font-size:11px"></i> ${item.stok}</span>`
                    ]);
                });

                hideLoading();
                table.draw();
            },
            error: function (xhr, status, error) {
                hideLoading();
                table.clear().draw();
                alert('Gagal memuat data. Silakan coba lagi.');
                console.error(error);
            }
        });
    }

    loadData('semua');

    /* ══════════════════════════════════════════
       TOGGLE ORIENTASI KERTAS
    ══════════════════════════════════════════ */
    var infoLabel = {
        landscape : 'Landscape dipilih',
        portrait  : 'Portrait dipilih'
    };

    $('.ct-orient-btn').on('click', function () {
        var val = $(this).data('value');

        // Update active state
        $('.ct-orient-btn').removeClass('active');
        $(this).addClass('active');

        // Update hidden input
        $('#orientasi').val(val);

        // Update info badge
        $('#orient-info-text').text(infoLabel[val]);
    });

    /* ── EXPORT ── */
    $('#download-excel').click(function() {
        window.location.href = '/laporan-stok/export-excel?opsi=semua';
    });

    $('#save-pdf').click(function() {
        let orientasi = $('#orientasi').val();
        window.location.href = '/laporan-stok/save-pdf?opsi=semua&orientasi=' + orientasi;
    });

});
</script>

@endsection