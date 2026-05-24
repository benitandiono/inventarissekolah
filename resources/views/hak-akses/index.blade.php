@extends('layouts.app')

@include('hak-akses.edit')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

<style>
/* =============================================
   HAK AKSES — BRIGHT PREMIUM EDITION
============================================= */
.ha-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: haFadeIn .45s ease both;
}

@keyframes haFadeIn {
    from { opacity:0; transform:translateY(14px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── PAGE HEADER ── */
.ha-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
    padding: 28px 32px;
    background: linear-gradient(135deg, #eef2ff 0%, #f5f3ff 50%, #ede9fe 100%);
    border-radius: 22px;
    position: relative;
    overflow: hidden;
    border: 1.5px solid #c7d2fe;
    box-shadow: 0 6px 32px rgba(99,102,241,.10);
}

.ha-header::before {
    content: '';
    position: absolute;
    top: -40px; right: -40px;
    width: 200px; height: 200px;
    border-radius: 50%;
    background: rgba(99,102,241,.07);
    pointer-events: none;
}

.ha-header::after {
    content: '';
    position: absolute;
    bottom: -60px; left: 28%;
    width: 160px; height: 160px;
    border-radius: 50%;
    background: rgba(139,92,246,.05);
    pointer-events: none;
}

.ha-header-left { position: relative; z-index: 1; }

.ha-header-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff;
    border: 1.5px solid #c7d2fe;
    border-radius: 99px;
    padding: 3px 12px;
    font-size: 11px;
    font-weight: 700;
    color: #4f46e5;
    letter-spacing: .6px;
    text-transform: uppercase;
    margin-bottom: 10px;
    box-shadow: 0 2px 8px rgba(99,102,241,.08);
}

.ha-header-eyebrow i { font-size: 8px; color: #10b981; }

.ha-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #1e1b4b;
    margin: 0;
    letter-spacing: -.4px;
}

.ha-header-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 42px; height: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #4f46e5, #6366f1);
    color: #fff;
    font-size: 18px;
    margin-right: 12px;
    vertical-align: middle;
    box-shadow: 0 6px 18px rgba(99,102,241,.35);
}

.ha-header-sub {
    font-size: 13px;
    color: #6366f1;
    margin-top: 5px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.ha-header-sub::before {
    content: '';
    display: inline-block;
    width: 6px; height: 6px;
    border-radius: 50%;
    background: #10b981;
    box-shadow: 0 0 0 3px rgba(16,185,129,.15);
}

.ha-header-right { position: relative; z-index: 1; display: flex; align-items: center; gap: 14px; }

/* STAT PILL */
.ha-stat-pill {
    background: #fff;
    border: 1.5px solid #c7d2fe;
    border-radius: 16px;
    padding: 14px 28px;
    text-align: center;
    box-shadow: 0 4px 16px rgba(99,102,241,.10);
    min-width: 110px;
}
.ha-stat-pill .spn {
    font-size: 28px;
    font-weight: 800;
    color: #4f46e5;
    line-height: 1;
    background: linear-gradient(135deg, #4f46e5, #8b5cf6);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.ha-stat-pill .spl {
    font-size: 10px;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-top: 3px;
}

/* ── TOOLBAR ── */
.ha-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
    flex-wrap: wrap;
}

.ha-search-wrap {
    position: relative;
    flex: 1;
    min-width: 220px;
}

.ha-search-wrap input {
    width: 100%;
    background: #fff;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    padding: 11px 18px 11px 44px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #0f172a;
    outline: none;
    transition: all .25s ease;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
}

.ha-search-wrap input::placeholder { color: #c2c9d6; font-weight: 500; }

.ha-search-wrap input:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 4px rgba(99,102,241,.09), 0 2px 10px rgba(0,0,0,.04);
}

.ha-search-icon {
    position: absolute;
    left: 15px; top: 50%;
    transform: translateY(-50%);
    color: #a5b4fc;
    font-size: 14px;
    pointer-events: none;
    transition: color .2s;
}

.ha-search-wrap input:focus ~ .ha-search-icon { color: #6366f1; }

/* ── MAIN CARD ── */
.ha-card {
    background: #fff;
    border-radius: 22px;
    border: 1.5px solid #e8edf5;
    box-shadow: 0 4px 28px rgba(15,23,42,.06);
    overflow: hidden;
}

.ha-card-header-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 24px 0;
    margin-bottom: -4px;
}

.ha-card-title {
    font-size: 13px;
    font-weight: 800;
    color: #1e1b4b;
    display: flex;
    align-items: center;
    gap: 8px;
    text-transform: uppercase;
    letter-spacing: .7px;
}

.ha-card-title-dot {
    width: 8px; height: 8px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4f46e5, #8b5cf6);
    box-shadow: 0 0 0 3px rgba(99,102,241,.18);
}

.ha-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #4f46e5 0%, #8b5cf6 50%, #06b6d4 100%);
    margin-bottom: 0;
}

.ha-card-body { padding: 20px 24px 24px; }

/* ══════════════════════════════
   TABLE — BRIGHT CARD STYLE
══════════════════════════════ */
#table_hak_akses {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 10px !important;
}

/* THEAD */
#table_hak_akses thead th {
    background: #f8faff !important;
    color: #6366f1 !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 10.5px !important;
    font-weight: 800 !important;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 12px 18px !important;
    border: none !important;
    border-bottom: 2px solid #e0e7ff !important;
    text-align: left;
}

#table_hak_akses thead th:first-child { text-align: center; }
#table_hak_akses thead th:last-child  { border-radius: 0 !important; }

/* TBODY ROWS */
#table_hak_akses tbody tr {
    background: #fff;
    border-radius: 16px;
    transition: all .22s ease;
    animation: rowIn .35s ease both;
    cursor: default;
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(10px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_hak_akses tbody tr:nth-child(odd) td  { background: #fafbff !important; }
#table_hak_akses tbody tr:nth-child(even) td { background: #fff !important; }

#table_hak_akses tbody tr:hover td {
    background: #eef2ff !important;
}

#table_hak_akses tbody tr:hover {
    box-shadow: 0 4px 20px rgba(99,102,241,.12);
}

#table_hak_akses tbody td {
    padding: 14px 18px !important;
    border: none !important;
    border-top: 1px solid #f1f5f9 !important;
    border-bottom: 1px solid #f1f5f9 !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    transition: background .2s;
}

#table_hak_akses tbody td:first-child {
    border-left: 1px solid #f1f5f9 !important;
    border-radius: 16px 0 0 16px !important;
    text-align: center;
}

#table_hak_akses tbody td:last-child {
    border-right: 1px solid #f1f5f9 !important;
    border-radius: 0 16px 16px 0 !important;
}

/* ── NO BADGE ── */
.td-no {
    width: 34px; height: 34px;
    border-radius: 10px;
    background: #eef2ff;
    color: #4f46e5;
    font-weight: 800;
    font-size: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1.5px solid #c7d2fe;
}

/* ── ROLE CELL ── */
.role-cell {
    display: flex;
    align-items: center;
    gap: 14px;
}

.role-avatar-new {
    width: 44px; height: 44px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 900;
    color: #fff;
    flex-shrink: 0;
    letter-spacing: -.5px;
    position: relative;
}

.role-avatar-new::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 14px;
    background: rgba(255,255,255,.18);
    border: 1.5px solid rgba(255,255,255,.25);
}

.role-name {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
    letter-spacing: -.2px;
    margin-bottom: 4px;
}

.role-badge-new {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 3px 10px;
    border-radius: 99px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .4px;
}

/* ══════════════════════════════════════════
   DESKRIPSI CELL — UNIFIED BOX STYLE
══════════════════════════════════════════ */
.desc-box {
    background: linear-gradient(135deg, #f8faff 0%, #fafaff 100%);
    border: 1.5px solid #e0e7ff;
    border-radius: 14px;
    padding: 12px 14px;
    text-align: left;
    position: relative;
    overflow: hidden;
}

/* strip kiri warna */
.desc-box::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 4px;
    background: linear-gradient(180deg, #4f46e5, #8b5cf6);
    border-radius: 14px 0 0 14px;
}

/* header label kecil di dalam box */
.desc-box-label {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 8px;
    padding-left: 4px;
}

.desc-box-label i {
    font-size: 10px;
    color: #6366f1;
}

.desc-box-label span {
    font-size: 9.5px;
    font-weight: 800;
    color: #a5b4fc;
    text-transform: uppercase;
    letter-spacing: .8px;
}

/* list item di dalam box */
.desc-list {
    list-style: none;
    margin: 0;
    padding: 0 0 0 4px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: left;
}

.desc-list li {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    font-size: 12.5px;
    font-weight: 500;
    color: #374151;
    line-height: 1.5;
    text-align: left;
}

.desc-list li .dl-dot {
    flex-shrink: 0;
    margin-top: 5px;
    width: 6px; height: 6px;
    border-radius: 50%;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    box-shadow: 0 0 0 2px rgba(99,102,241,.18);
}

/* single line (tanpa pemisah) */
.desc-single-box {
    display: flex;
    align-items: center;
    gap: 10px;
    text-align: left;
}

.desc-single-box .ds-icon {
    flex-shrink: 0;
    width: 28px; height: 28px;
    border-radius: 8px;
    background: #eef2ff;
    border: 1.5px solid #c7d2fe;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    color: #6366f1;
}

.desc-single-box .ds-text {
    font-size: 12.5px;
    font-weight: 500;
    color: #374151;
    line-height: 1.5;
    text-align: left;
}

/* kosong / null */
.desc-empty {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    font-weight: 500;
    color: #cbd5e1;
    font-style: italic;
    text-align: left;
}

/* ── DATATABLE OVERRIDES ── */
.dataTables_wrapper .dataTables_filter input  { display:none !important; }
.dataTables_wrapper .dataTables_filter label  { display:none !important; }

.dataTables_wrapper .dataTables_length select {
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 5px 10px;
    font-size: 13px;
    font-weight: 600;
    outline: none;
    color: #475569;
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
    border-radius: 10px !important;
    border: 1.5px solid #e2e8f0 !important;
    padding: 6px 13px !important;
    margin: 0 2px;
    color: #475569 !important;
    background: #fff !important;
    transition: all .2s ease;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #eef2ff !important;
    color: #4f46e5 !important;
    border-color: #c7d2fe !important;
    box-shadow: none !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current,
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background: linear-gradient(135deg, #4f46e5, #6366f1) !important;
    color: #fff !important;
    border-color: #4f46e5 !important;
    box-shadow: 0 4px 12px rgba(99,102,241,.28) !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover {
    opacity: .4 !important;
    cursor: not-allowed !important;
}

/* ── MODAL ── */
.modal-content {
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 24px 60px rgba(0,0,0,.15) !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.modal-header {
    background: linear-gradient(135deg, #eef2ff, #f5f3ff) !important;
    border-radius: 20px 20px 0 0 !important;
    border-bottom: 1.5px solid #c7d2fe !important;
    padding: 20px 28px !important;
}

.modal-title { color: #1e1b4b !important; font-weight: 800 !important; font-size: 16px !important; }
.modal-footer { border-top: 1px solid #f1f5f9 !important; padding: 16px 28px !important; }
</style>

@section('content')

<div class="ha-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="ha-header">
        <div class="ha-header-left">
            <div class="ha-header-eyebrow">
                <i class="fas fa-circle"></i> Kontrol Sistem
            </div>
            <h1>
                <span class="ha-header-icon"><i class="fas fa-shield-alt"></i></span>
                Hak Akses
            </h1>
            <div class="ha-header-sub">Read Only · Daftar semua role dalam sistem</div>
        </div>

        <div class="ha-header-right">
            <div class="ha-stat-pill">
                <div class="spn" id="statTotalRole">—</div>
                <div class="spl">Total Role</div>
            </div>
        </div>
    </div>

    {{-- ── TOOLBAR ── --}}
    <div class="ha-toolbar">
        <div class="ha-search-wrap">
            <i class="fas fa-search ha-search-icon"></i>
            <input type="text" id="haSearch" placeholder="Cari nama role atau deskripsi…">
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="ha-card">
        <div class="ha-card-stripe"></div>
        <div class="ha-card-header-bar">
            <div class="ha-card-title">
                <div class="ha-card-title-dot"></div>
                Daftar Role
            </div>
        </div>
        <div class="ha-card-body">
            <div class="table-responsive">
                <table id="table_hak_akses" class="display">
                    <thead>
                        <tr>
                            <th style="width:60px; text-align:center;">No</th>
                            <th style="width:260px;">Role</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
/* ── helpers ── */
const PALETTE = [
    ['#4f46e5','#eef2ff','#c7d2fe'],
    ['#0891b2','#ecfeff','#a5f3fc'],
    ['#10b981','#ecfdf5','#a7f3d0'],
    ['#f59e0b','#fffbeb','#fde68a'],
    ['#ef4444','#fef2f2','#fecaca'],
    ['#8b5cf6','#f5f3ff','#ddd6fe'],
    ['#14b8a6','#f0fdfa','#99f6e4'],
    ['#f97316','#fff7ed','#fed7aa'],
];

function roleColors(text) {
    let hash = 0;
    for (let i = 0; i < text.length; i++) hash = text.charCodeAt(i) + ((hash << 5) - hash);
    return PALETTE[Math.abs(hash) % PALETTE.length];
}

/* ── Render Deskripsi — satu box terpadu, rata kiri ── */
function renderDesc(raw) {

    // Kosong
    if (!raw || raw.trim() === '') {
        return `<div class="desc-empty">
                    <i class="fas fa-minus-circle" style="font-size:13px;color:#e2e8f0"></i>
                    <span>Tidak ada deskripsi</span>
                </div>`;
    }

    // Coba pisah dengan ";" dahulu, lalu ","
    let parts = raw.split(';').map(s => s.trim()).filter(Boolean);
    if (parts.length === 1) {
        parts = raw.split(',').map(s => s.trim()).filter(Boolean);
    }

    // ── Multi-item → kotak dengan bullet list ──
    if (parts.length > 1) {
        const items = parts.map(p =>
            `<li>
                <span class="dl-dot"></span>
                <span>${p}</span>
            </li>`
        ).join('');

        return `<div class="desc-box">
                    <div class="desc-box-label">
                        <i class="fas fa-list-ul"></i>
                        <span>Keterangan</span>
                    </div>
                    <ul class="desc-list">${items}</ul>
                </div>`;
    }

    // ── Single-item → satu baris dengan ikon ──
    return `<div class="desc-box">
                <div class="desc-single-box">
                    <div class="ds-icon"><i class="fas fa-info"></i></div>
                    <span class="ds-text">${raw.trim()}</span>
                </div>
            </div>`;
}

/* ── DataTable init ── */
$(document).ready(function () {

    let table = $('#table_hak_akses').DataTable({
        paging:   true,
        ordering: false,
        dom: '<"d-flex align-items-center justify-content-between mb-3"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info:       'Menampilkan _START_–_END_ dari _TOTAL_ role',
            infoEmpty:  'Tidak ada data',
            zeroRecords:'Tidak ada role yang cocok',
            paginate:   { previous: '‹ Prev', next: 'Next ›' }
        }
    });

    $('#haSearch').on('keyup', function () {
        table.search($(this).val()).draw();
    });

    loadData();

    function loadData() {
        $.get('/hak-akses/get-data', function (response) {
            table.clear();
            let counter = 1;
            let total   = response.data.length;
            $('#statTotalRole').text(total);

            $.each(response.data, function (key, value) {
                let [main, bg, border] = roleColors(value.role);
                let initial = value.role.charAt(0).toUpperCase();

                table.row.add([

                    // ── NO ──
                    `<div class="td-no">${counter++}</div>`,

                    // ── ROLE ──
                    `<div class="role-cell">
                        <div class="role-avatar-new" style="
                            background: linear-gradient(135deg, ${main}, ${main}cc);
                            box-shadow: 0 6px 18px ${main}40;
                        ">${initial}</div>
                        <div>
                            <div class="role-name">${value.role}</div>
                            <span class="role-badge-new" style="
                                background: ${bg};
                                border: 1.5px solid ${border};
                                color: ${main};
                            ">
                                <i class="fas fa-shield-alt" style="font-size:9px"></i>
                                ${value.role}
                            </span>
                        </div>
                    </div>`,

                    // ── DESKRIPSI ──
                    renderDesc(value.deskripsi)

                ]).draw(false);
            });
        });
    }

});
</script>

@endsection