@extends('layouts.app')

@include('barang.create')
@include('barang.edit')
@include('barang.show')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =============================================
   DATA BARANG — PREMIUM UPGRADE
============================================= */
.br-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: brFadeIn .45s ease both;
}

@keyframes brFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── PAGE HEADER ── */
.br-header {
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

.br-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.br-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.br-header-left { position: relative; z-index: 1; }

.br-header-eyebrow {
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

.br-header-eyebrow i { font-size: 9px; color: #93c5fd; }

.br-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.br-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.br-header-right {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

/* STAT PILLS */
.br-stat-pills { display: flex; gap: 10px; flex-wrap: wrap; }

.br-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}
.br-stat-pill .spn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.br-stat-pill .spl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

/* ADD BUTTON */
.btn-add-barang {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    color: #1d4ed8;
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

.btn-add-barang:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
    color: #1d4ed8;
    text-decoration: none;
}

/* ── TOOLBAR ── */
.br-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.br-search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.br-search-wrap input {
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

.br-search-wrap input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.br-search-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
    pointer-events: none;
}

/* ── MAIN CARD ── */
.br-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.br-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.br-card-body { padding: 24px; }

/* ── TABLE ── */
#table_barang {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_barang thead th {
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

#table_barang thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_barang thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

#table_barang tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_barang tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_barang tbody td {
    padding: 12px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_barang tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_barang tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

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

/* IMAGE */
.img-barang-wrap { display: flex; justify-content: center; }

.img-barang {
    width: 100px;
    height: 75px;
    border-radius: 10px;
    object-fit: cover;
    border: 2px solid #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,.1);
    transition: transform .2s ease;
    display: block;
}
.img-barang:hover { transform: scale(1.06); }

/* KODE BARANG */
.kode-chip {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f1f5f9;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 4px 10px;
    font-size: 11px;
    font-weight: 700;
    color: #475569;
    font-family: monospace;
    letter-spacing: .5px;
}

/* NAMA BARANG */
.nama-barang { font-size: 13px; font-weight: 700; color: #0f172a; text-align: left; }

/* STOK */
.stok-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    padding: 4px 14px;
    font-size: 13px;
    font-weight: 800;
    min-width: 50px;
}

.stok-ada {
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
}

.stok-kosong {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
    font-size: 11px;
}

/* ACTION BUTTONS */
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
    text-decoration: none;
}

.aksi-new:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,.2);
    color: #fff;
    text-decoration: none;
}

.aksi-detail { background: linear-gradient(135deg, #0891b2, #06b6d4); }
.aksi-edit   { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.aksi-hapus  { background: linear-gradient(135deg, #ef4444, #f87171); }

/* DATATABLE OVERRIDES */
.dataTables_wrapper .dataTables_filter input { display: none !important; }
.dataTables_wrapper .dataTables_filter label { display: none !important; }

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

/* MODAL UPGRADES */
.modal-content {
    border-radius: 20px !important;
    border: none !important;
    box-shadow: 0 24px 60px rgba(0,0,0,.18) !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
}

.modal-header {
    background: linear-gradient(135deg, #1e40af, #2563eb) !important;
    border-radius: 20px 20px 0 0 !important;
    border-bottom: none !important;
    padding: 20px 28px !important;
}

.modal-title { color: #fff !important; font-weight: 800 !important; font-size: 16px !important; }
.modal-header .btn-close,
.modal-header .close { filter: brightness(0) invert(1); opacity: .7; }
.modal-header .btn-close:hover,
.modal-header .close:hover { opacity: 1; }
.modal-footer { border-top: 1px solid #f1f5f9 !important; padding: 16px 28px !important; }
</style>

<div class="br-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="br-header">
        <div class="br-header-left">
            <div class="br-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Stok
            </div>
            <h1><i class="fas fa-cube" style="font-size:26px; margin-right:12px; vertical-align:middle;"></i>Data Barang</h1>
            <div class="br-header-sub">Kelola seluruh data barang dan stok inventaris</div>
        </div>

        <div class="br-header-right">
            <div class="br-stat-pills">
                <div class="br-stat-pill">
                    <div class="spn" id="statTotalBarang">—</div>
                    <div class="spl">Total Barang</div>
                </div>
                <div class="br-stat-pill">
                    <div class="spn" id="statTotalStok">—</div>
                    <div class="spl">Total Stok</div>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn-add-barang" id="button_tambah_barang">
                <i class="fas fa-plus"></i> Tambah Barang
            </a>
        </div>
    </div>

    {{-- ── TOOLBAR ── --}}
    <div class="br-toolbar">
        <div class="br-search-wrap">
            <i class="fas fa-search br-search-icon"></i>
            <input type="text" id="brSearch" placeholder="Cari nama barang, kode, atau stok…">
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="br-card">
        <div class="br-card-stripe"></div>
        <div class="br-card-body">
            <div class="table-responsive">
                <table id="table_barang" class="display">
                    <thead>
                        <tr>
                            <th style="width:55px">No</th>
                            <th style="width:130px">Gambar</th>
                            <th style="width:130px">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th style="width:100px">Stok Barang</th>
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

@push('scripts')
<script>

/* ══════════════════════════════════════════════════════════════
   KONSTANTA UKURAN FILE
══════════════════════════════════════════════════════════════ */
const BR_MAX_MB   = 10;
const BR_MAX_BYTE = BR_MAX_MB * 1024 * 1024;

/* ══════════════════════════════════════════════════════════════
   VARIABLE GLOBAL UNTUK MENYIMPAN DATA BARANG (untuk check unique)
══════════════════════════════════════════════════════════════ */
let brAllBarangData = [];

/* ══════════════════════════════════════════════════════════════
   SOUND EFFECTS
══════════════════════════════════════════════════════════════ */
const BRAudioCtx = window.AudioContext || window.webkitAudioContext;

function brPlaySound(type) {
    try {
        const ctx = new BRAudioCtx();

        if (type === 'success') {
            [523, 659, 784].forEach(function (freq, i) {
                const osc  = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.13);
                gain.gain.setValueAtTime(0.4, ctx.currentTime + i * 0.13);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.13 + 0.3);
                osc.start(ctx.currentTime + i * 0.13);
                osc.stop(ctx.currentTime + i * 0.13 + 0.35);
            });

        } else if (type === 'error') {
            const osc  = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.type = 'sawtooth';
            osc.frequency.setValueAtTime(220, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(80, ctx.currentTime + 0.3);
            gain.gain.setValueAtTime(0.35, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.35);
            osc.start(ctx.currentTime);
            osc.stop(ctx.currentTime + 0.4);

        } else if (type === 'delete') {
            const osc  = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.type = 'sine';
            osc.frequency.setValueAtTime(400, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(150, ctx.currentTime + 0.15);
            gain.gain.setValueAtTime(0.3, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.2);
            osc.start(ctx.currentTime);
            osc.stop(ctx.currentTime + 0.2);
        }
    } catch (e) {}
}

/* ══════════════════════════════════════════════════════════════
   FUNGSI CHECK UNIQUE NAMA BARANG (REAL-TIME)
══════════════════════════════════════════════════════════════ */
function brCheckUniqueBarang(mode = 'add', barangIdToIgnore = null) {
    const inputNama = mode === 'add' ? $('#nama_barang').val().trim() : $('#edit_nama_barang').val().trim();
    const statusEl  = mode === 'add' ? $('#nama_barang_status') : $('#edit_nama_barang_status');
    const alertEl   = mode === 'add' ? $('#alert-nama_barang') : $('#alert-edit-nama_barang');

    if (!inputNama) {
        if (statusEl) statusEl.hide();
        return true;
    }

    // Check apakah nama barang sudah ada di list
    let isDuplicate = false;
    $.each(brAllBarangData, function (i, item) {
        // Jika mode edit, abaikan item dengan ID yang sama
        if (mode === 'edit' && item.id == barangIdToIgnore) {
            return true; // continue
        }
        if (item.nama_barang.toLowerCase() === inputNama.toLowerCase()) {
            isDuplicate = true;
            return false; // break
        }
    });

    if (isDuplicate) {
        if (statusEl) {
            statusEl.show().html('<i class="fas fa-times-circle text-danger mr-1"></i><span style="color:#dc2626;font-size:12px;font-weight:600;">Nama barang sudah ada!</span>');
        }
        if (alertEl) {
            alertEl.removeClass('d-none').text('Nama barang dengan nama ini sudah terdaftar. Gunakan nama yang berbeda.');
        }
        return false;
    } else {
        if (statusEl) {
            statusEl.show().html('<i class="fas fa-check-circle text-success mr-1"></i><span style="color:#16a34a;font-size:12px;font-weight:600;">Nama barang tersedia</span>');
        }
        if (alertEl) {
            alertEl.addClass('d-none');
        }
        return true;
    }
}

/* ══════════════════════════════════════════════════════════════
   FUNGSI PREVIEW & VALIDASI GAMBAR
══════════════════════════════════════════════════════════════ */
function brPreviewImage(inputId, previewId, infoId, alertId, areaId) {
    const input      = document.getElementById(inputId);
    const preview    = document.getElementById(previewId);
    const fileInfo   = document.getElementById(infoId);
    const alertBox   = document.getElementById(alertId);
    const alertText  = document.getElementById(alertId + '-text');
    const previewWrp = document.getElementById(previewId + '-wrap');

    if (alertBox)   alertBox.classList.add('d-none');
    if (fileInfo)   fileInfo.classList.add('d-none');
    if (previewWrp) previewWrp.classList.add('d-none');

    const file = input.files[0];
    if (!file) return;

    const sizeMB   = file.size / (1024 * 1024);
    const pct      = Math.min((file.size / BR_MAX_BYTE) * 100, 100);
    const isTooBig = file.size > BR_MAX_BYTE;

    if (fileInfo) {
        const prefix       = infoId === 'br-file-info' ? 'br' : 'br-edit';
        const fileName     = document.getElementById(prefix + '-file-name');
        const fileSizeText = document.getElementById(prefix + '-file-size-text');
        const sizeBar      = document.getElementById(prefix + '-file-size-bar');
        const sizeHint     = document.getElementById(prefix + '-file-size-hint');

        fileInfo.classList.remove('d-none');
        if (fileName)     fileName.textContent  = file.name;
        if (fileSizeText) {
            fileSizeText.textContent = sizeMB.toFixed(2) + ' MB / ' + BR_MAX_MB + ' MB';
            fileSizeText.style.color = isTooBig ? '#dc2626' : '#16a34a';
        }
        if (sizeBar) {
            sizeBar.style.width = pct + '%';
            sizeBar.className   = 'progress-bar ' + (isTooBig ? 'bg-danger' : pct > 75 ? 'bg-warning' : 'bg-success');
        }
        if (sizeHint) {
            if (isTooBig) {
                sizeHint.innerHTML = `<span style="color:#dc2626"><i class="fas fa-times-circle mr-1"></i>File terlalu besar! Sisa <b>${(sizeMB - BR_MAX_MB).toFixed(2)} MB</b> melebihi batas.</span>`;
            } else if (pct > 75) {
                sizeHint.innerHTML = `<span style="color:#ca8a04"><i class="fas fa-exclamation-triangle mr-1"></i>Ukuran file mendekati batas maksimal.</span>`;
            } else {
                sizeHint.innerHTML = `<span style="color:#16a34a"><i class="fas fa-check-circle mr-1"></i>Ukuran file sesuai batas.</span>`;
            }
        }
    }

    if (isTooBig) {
        if (alertBox && alertText) {
            alertText.textContent = `Ukuran file ${sizeMB.toFixed(2)} MB melebihi batas maksimal ${BR_MAX_MB} MB. Pilih file yang lebih kecil.`;
            alertBox.classList.remove('d-none');
        }
        input.value = '';
        return;
    }

    preview.src = URL.createObjectURL(file);
    if (previewWrp) previewWrp.classList.remove('d-none');
}

/* ══════════════════════════════════════════════════════════════
   MAIN DATATABLE & CRUD
══════════════════════════════════════════════════════════════ */
$(document).ready(function () {

    let table = $('#table_barang').DataTable({
        paging:   true,
        ordering: false,
        dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info:       'Menampilkan _START_–_END_ dari _TOTAL_ barang',
            infoEmpty:  'Tidak ada data',
            paginate:   { previous: '‹', next: '›' }
        }
    });

    $('#brSearch').on('keyup', function () {
        table.search($(this).val()).draw();
    });

    /* ─────────────────────────────────
       LOAD DATA
    ───────────────────────────────── */
    function loadData() {
        $.get('/barang/get-data', function (res) {
            table.clear();
            let no = 1;
            let totalStok = 0;
            $('#statTotalBarang').text(res.data.length);
            
            // Simpan data ke global variable untuk check unique
            brAllBarangData = res.data;

            $.each(res.data, function (i, item) {
                let stok     = item.stok != null ? item.stok : null;
                let stokHtml = stok !== null
                    ? `<span class="stok-badge stok-ada">${stok}</span>`
                    : `<span class="stok-badge stok-kosong">Stok Kosong</span>`;

                if (stok !== null) totalStok += parseInt(stok) || 0;

                table.row.add([
                    `<div class="td-no">${no++}</div>`,
                    `<div class="img-barang-wrap">
                        <img src="/storage/${item.gambar}" class="img-barang"
                             onerror="this.src='/assets/img/no-image.png'">
                    </div>`,
                    `<span class="kode-chip"><i class="fas fa-barcode mr-1"></i>${item.kode_barang}</span>`,
                    `<div class="nama-barang">${item.nama_barang}</div>`,
                    stokHtml,
                    `<div class="aksi-group">
                        <a href="javascript:void(0)" class="aksi-new aksi-detail btn-detail-barang" data-id="${item.id}" title="Detail">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="javascript:void(0)" class="aksi-new aksi-edit btn-edit-barang" data-id="${item.id}" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)" class="aksi-new aksi-hapus btn-hapus-barang" data-id="${item.id}" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>`
                ]).draw(false);
            });

            $('#statTotalStok').text(totalStok);
        });
    }

    loadData();

    /* ─────────────────────────────────
       BUKA MODAL TAMBAH
    ───────────────────────────────── */
    $('body').on('click', '#button_tambah_barang', function () {
        $('#modal_tambah_barang form')[0].reset();
        $('#preview-wrap').addClass('d-none');
        $('#br-file-info').addClass('d-none');
        $('#alert-gambar').addClass('d-none');
        $('#nama_barang_status').hide();
        $('#modal_tambah_barang').modal('show');
    });

    /* ─────────────────────────────────
       SIMPAN BARANG BARU
       ← fix: .off().on() agar tidak terpanggil berkali-kali
       ← PLUS: validasi unique nama barang sebelum submit
    ───────────────────────────────── */
    $(document).off('click', '#store').on('click', '#store', function (e) {
        e.preventDefault();

        const fileInput = $('#gambar')[0];
        const namaBarang = $('#nama_barang').val().trim();

        if (!namaBarang) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'Nama Barang Kosong!',
                text: 'Silakan masukkan nama barang terlebih dahulu.',
                confirmButtonColor: '#2563eb', confirmButtonText: 'OK'
            });
            return;
        }

        // Validasi unique nama barang
        if (!brCheckUniqueBarang('add')) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'Nama Barang Sudah Ada!',
                text: 'Nama barang ini sudah terdaftar dalam sistem. Gunakan nama yang berbeda.',
                confirmButtonColor: '#2563eb', confirmButtonText: 'OK'
            });
            return;
        }

        if (fileInput.files.length > 0 && fileInput.files[0].size > BR_MAX_BYTE) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'File Terlalu Besar!',
                html: `Ukuran file <b>${(fileInput.files[0].size / (1024*1024)).toFixed(2)} MB</b> melebihi batas maksimal <b>${BR_MAX_MB} MB</b>.<br><br>Silakan pilih file lain.`,
                confirmButtonColor: '#2563eb', confirmButtonText: 'Mengerti'
            });
            return;
        }

        let formData = new FormData();
        if (fileInput.files.length > 0) formData.append('gambar', fileInput.files[0]);
        formData.append('nama_barang',  namaBarang);
        formData.append('stok_minimum', $('#stok_minimum').val());
        formData.append('jenis_id',     $('#jenis_id').val());
        formData.append('satuan_id',    $('#satuan_id').val());
        formData.append('deskripsi',    $('#deskripsi').val());
        formData.append('_token',       $("meta[name='csrf-token']").attr('content'));

        const btn = $('#store');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');

        $.ajax({
            url: '/barang', type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                brPlaySound('success');
                $('#modal_tambah_barang').modal('hide');
                $('#modal_tambah_barang form')[0].reset();
                Swal.fire({ icon: 'success', title: 'Sukses!', text: res.message, timer: 2500, showConfirmButton: false });
                loadData();
            },
            error: function (xhr) {
                brPlaySound('error');
                const errors = xhr.responseJSON?.errors || xhr.responseJSON;
                const fields = ['gambar','nama_barang','stok_minimum','jenis_id','satuan_id','deskripsi'];
                fields.forEach(f => $(`#alert-${f}`).addClass('d-none'));
                if (errors) {
                    fields.forEach(function (f) {
                        if (errors[f]?.[0]) {
                            if (f === 'gambar') $('#alert-gambar-text').text(errors[f][0]);
                            else $(`#alert-${f}`).text(errors[f][0]);
                            $(`#alert-${f}`).removeClass('d-none');
                        }
                    });
                    Swal.fire({ icon: 'error', title: 'Validasi Gagal', text: 'Periksa kembali isian form Anda.', confirmButtonColor: '#ef4444' });
                } else {
                    Swal.fire({
                        icon: 'error', title: 'Upload Gagal',
                        html: xhr.status === 413 ? `<b>File terlalu besar!</b><br>Server menolak upload karena melebihi batas <b>${BR_MAX_MB} MB</b>.` : (xhr.responseJSON?.message || 'Terjadi kesalahan.'),
                        confirmButtonColor: '#ef4444'
                    });
                }
            },
            complete: function () {
                btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Simpan Barang');
            }
        });
    });

    /* ─────────────────────────────────
       DETAIL
    ───────────────────────────────── */
    $('body').on('click', '.btn-detail-barang', function () {
        let id = $(this).data('id');
        $.get(`/barang/${id}/`, function (res) {
            $('#barang_id').val(res.data.id);
            $('#detail_nama_barang').val(res.data.nama_barang);
            $('#detail_jenis_id').val(res.data.jenis_id);
            $('#detail_satuan_id').val(res.data.satuan_id);
            $('#detail_stok').val(res.data.stok !== null && res.data.stok !== '' ? res.data.stok : 'Stok Kosong');
            $('#detail_stok_minimum').val(res.data.stok_minimum);
            $('#detail_deskripsi').val(res.data.deskripsi);
            $('#detail_gambar_preview').attr('src', '/storage/' + res.data.gambar);
            $('#modal_detail_barang').modal('show');
        });
    });

    /* ─────────────────────────────────
       EDIT — BUKA MODAL
    ───────────────────────────────── */
    $('body').on('click', '.btn-edit-barang', function () {
        let id = $(this).data('id');
        $.get(`/barang/${id}/edit`, function (res) {
            $('#barang_id').val(res.data.id);
            $('#edit_nama_barang').val(res.data.nama_barang);
            $('#edit_stok_minimum').val(res.data.stok_minimum);
            $('#edit_jenis_id').val(res.data.jenis_id);
            $('#edit_satuan_id').val(res.data.satuan_id);
            $('#edit_deskripsi').val(res.data.deskripsi);
            $('#edit_gambar_preview').attr('src', '/storage/' + res.data.gambar);
            $('#edit_gambar').val('');
            $('#br-edit-file-info').addClass('d-none');
            $('#alert-edit-gambar').addClass('d-none');
            $('#edit-new-preview-wrap').addClass('d-none');
            $('#edit_nama_barang_status').hide();
            $('#modal_edit_barang').modal('show');
        });
    });

    /* ─────────────────────────────────
       UPDATE BARANG
       ← fix: .off().on() agar tidak terpanggil berkali-kali
       ← PLUS: validasi unique nama barang sebelum submit (abaikan ID saat ini)
    ───────────────────────────────── */
    $(document).off('click', '#update').on('click', '#update', function (e) {
        e.preventDefault();

        const fileInput = $('#edit_gambar')[0];
        const barangId = $('#barang_id').val();
        const namaBarang = $('#edit_nama_barang').val().trim();

        if (!namaBarang) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'Nama Barang Kosong!',
                text: 'Silakan masukkan nama barang terlebih dahulu.',
                confirmButtonColor: '#2563eb', confirmButtonText: 'OK'
            });
            return;
        }

        // Validasi unique nama barang (abaikan item dengan ID saat ini)
        if (!brCheckUniqueBarang('edit', barangId)) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'Nama Barang Sudah Ada!',
                text: 'Nama barang ini sudah digunakan oleh barang lain. Gunakan nama yang berbeda.',
                confirmButtonColor: '#2563eb', confirmButtonText: 'OK'
            });
            return;
        }

        if (fileInput.files.length > 0 && fileInput.files[0].size > BR_MAX_BYTE) {
            brPlaySound('error');
            Swal.fire({
                icon: 'warning', title: 'File Terlalu Besar!',
                html: `Ukuran file <b>${(fileInput.files[0].size / (1024*1024)).toFixed(2)} MB</b> melebihi batas maksimal <b>${BR_MAX_MB} MB</b>.<br><br>Silakan pilih file lain.`,
                confirmButtonColor: '#2563eb', confirmButtonText: 'Mengerti'
            });
            return;
        }

        let id       = barangId;
        let formData = new FormData();
        if (fileInput.files.length > 0) formData.append('gambar', fileInput.files[0]);
        formData.append('nama_barang',  namaBarang);
        formData.append('stok_minimum', $('#edit_stok_minimum').val());
        formData.append('deskripsi',    $('#edit_deskripsi').val());
        formData.append('jenis_id',     $('#edit_jenis_id').val());
        formData.append('satuan_id',    $('#edit_satuan_id').val());
        formData.append('_token',       $("meta[name='csrf-token']").attr('content'));
        formData.append('_method',      'PUT');

        const btn = $('#update');
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menyimpan...');

        $.ajax({
            url: `/barang/${id}`, type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                brPlaySound('success');
                $('#modal_edit_barang').modal('hide');
                Swal.fire({ icon: 'success', title: 'Sukses!', text: res.message, timer: 2500, showConfirmButton: false });
                loadData();
            },
            error: function (xhr) {
                brPlaySound('error');
                const errors = xhr.responseJSON?.errors || xhr.responseJSON;
                const fields = ['gambar','nama_barang','stok_minimum','jenis_id','satuan_id','deskripsi'];
                fields.forEach(f => $(`#alert-edit-${f}`).addClass('d-none'));
                if (errors) {
                    fields.forEach(function (f) {
                        const alertEl   = $(`#alert-edit-${f}`);
                        const alertText = $(`#alert-edit-${f}-text`);
                        if (errors[f]?.[0]) {
                            if (alertText.length) alertText.text(errors[f][0]);
                            else alertEl.text(errors[f][0]);
                            alertEl.removeClass('d-none');
                        }
                    });
                    Swal.fire({ icon: 'error', title: 'Validasi Gagal', text: 'Periksa kembali isian form Anda.', confirmButtonColor: '#ef4444' });
                } else {
                    Swal.fire({
                        icon: 'error', title: 'Update Gagal',
                        html: xhr.status === 413 ? `<b>File terlalu besar!</b><br>Server menolak upload karena melebihi batas <b>${BR_MAX_MB} MB</b>.` : (xhr.responseJSON?.message || 'Terjadi kesalahan.'),
                        confirmButtonColor: '#ef4444'
                    });
                }
            },
            complete: function () {
                btn.prop('disabled', false).html('<i class="fas fa-save mr-1"></i> Simpan Perubahan');
            }
        });
    });

    /* ─────────────────────────────────
       HAPUS
       ✅ FIX: Reload halaman setelah delete
       Masalah: Ketika data = 1 dan dihapus, table tidak langsung update
       Solusi: Reload halaman untuk reset pagination dengan benar
    ───────────────────────────────── */
    $('body').on('click', '.btn-hapus-barang', function () {
        let id    = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr('content');

        Swal.fire({
            title: 'Hapus Barang?',
            text:  'Data barang ini akan dihapus permanen dan tidak dapat dikembalikan.',
            icon:  'warning',
            showCancelButton:   true,
            confirmButtonText:  'Ya, Hapus!',
            cancelButtonText:   'Batal',
            confirmButtonColor: '#ef4444',
            cancelButtonColor:  '#64748b'
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/barang/${id}`, type: 'DELETE',
                    data: { _token: token },
                    success: function (res) {
                        brPlaySound('delete');
                        Swal.fire({ 
                            icon: 'success', 
                            title: 'Terhapus!', 
                            text: res.message, 
                            timer: 2000, 
                            showConfirmButton: false 
                        });
                        
                        // ✅ PERBAIKAN: Reload halaman setelah 1 detik
                        // Ini memastikan pagination dan data ter-reset dengan benar
                        // Terutama ketika data tinggal 1 dan dihapus
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    },
                    error: function () {
                        brPlaySound('error');
                        Swal.fire({ 
                            icon: 'error', 
                            title: 'Gagal', 
                            text: 'Terjadi kesalahan saat menghapus data.', 
                            confirmButtonColor: '#ef4444' 
                        });
                    }
                });
            }
        });
    });

});
</script>
@endpush