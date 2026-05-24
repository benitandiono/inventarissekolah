@extends('layouts.app')

@include('satuan-barang.create')
@include('satuan-barang.edit')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =============================================
   SATUAN BARANG — PREMIUM UPGRADE
============================================= */
.sb-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: sbFadeIn .45s ease both;
}

@keyframes sbFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── PAGE HEADER ── */
.sb-header {
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

.sb-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.sb-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.sb-header-left { position: relative; z-index: 1; }

.sb-header-eyebrow {
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

.sb-header-eyebrow i { font-size: 9px; color: #93c5fd; }

.sb-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.sb-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.sb-header-right {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

/* STAT PILL */
.sb-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}
.sb-stat-pill .spn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.sb-stat-pill .spl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

/* ADD BUTTON */
.btn-add-satuan {
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

.btn-add-satuan:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
    color: #1d4ed8;
    text-decoration: none;
}

/* ── TOOLBAR ── */
.sb-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.sb-search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.sb-search-wrap input {
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

.sb-search-wrap input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.sb-search-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
    pointer-events: none;
}

/* ── MAIN CARD ── */
.sb-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.sb-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.sb-card-body { padding: 24px; }

/* ── TABLE ── */
#table_satuan {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_satuan thead th {
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

#table_satuan thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_satuan thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

#table_satuan tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_satuan tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_satuan tbody td {
    padding: 14px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_satuan tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_satuan tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

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

/* SATUAN CELL */
.satuan-cell {
    display: flex;
    align-items: center;
    gap: 12px;
    text-align: left;
}

.satuan-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 16px;
    color: #2563eb;
}

.satuan-name {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
}

/* ACTION BUTTONS */
.aksi-group {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
}

.aksi-new {
    width: 36px; height: 36px;
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

.aksi-edit  { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.aksi-hapus { background: linear-gradient(135deg, #ef4444, #f87171); }

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

<div class="sb-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="sb-header">
        <div class="sb-header-left">
            <div class="sb-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Stok
            </div>
            <h1><i class="fas fa-balance-scale" style="font-size:26px; margin-right:12px; vertical-align:middle;"></i>Satuan Barang</h1>
            <div class="sb-header-sub">Kelola satuan pengukuran barang inventaris</div>
        </div>

        <div class="sb-header-right">
            <div class="sb-stat-pill">
                <div class="spn" id="statTotalSatuan">—</div>
                <div class="spl">Total Satuan</div>
            </div>
            <a href="javascript:void(0)" class="btn-add-satuan" id="button_tambah_satuan">
                <i class="fas fa-plus"></i> Tambah Satuan
            </a>
        </div>
    </div>

    {{-- ── TOOLBAR ── --}}
    <div class="sb-toolbar">
        <div class="sb-search-wrap">
            <i class="fas fa-search sb-search-icon"></i>
            <input type="text" id="sbSearch" placeholder="Cari satuan barang…">
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="sb-card">
        <div class="sb-card-stripe"></div>
        <div class="sb-card-body">
            <div class="table-responsive">
                <table id="table_satuan" class="display">
                    <thead>
                        <tr>
                            <th style="width:60px">No</th>
                            <th>Satuan Barang</th>
                            <th style="width:120px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
$(document).ready(function () {

    // ── SOUND EFFECTS (Web Audio API — no external files needed) ──
    function playSound(type) {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();

            if (type === 'success') {
                // Tiga nada naik C–E–G (sukses simpan / update)
                [523.25, 659.25, 783.99].forEach(function(freq, i) {
                    const osc  = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.13);
                    gain.gain.setValueAtTime(0.25, ctx.currentTime + i * 0.13);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.13 + 0.4);
                    osc.start(ctx.currentTime + i * 0.13);
                    osc.stop(ctx.currentTime + i * 0.13 + 0.4);
                });
            }

            if (type === 'delete') {
                // Dua nada turun berat (hapus)
                [300, 180].forEach(function(freq, i) {
                    const osc  = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.type = 'triangle';
                    osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.15);
                    gain.gain.setValueAtTime(0.3, ctx.currentTime + i * 0.15);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.15 + 0.35);
                    osc.start(ctx.currentTime + i * 0.15);
                    osc.stop(ctx.currentTime + i * 0.15 + 0.35);
                });
            }
        } catch(e) {
            // Fallback diam jika browser tidak support AudioContext
            console.warn('AudioContext not supported:', e);
        }
    }

    // ── INIT DATATABLE ──
    let table = $('#table_satuan').DataTable({
        paging:   true,
        ordering: false,
        dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info:       'Menampilkan _START_–_END_ dari _TOTAL_ satuan',
            infoEmpty:  'Tidak ada data',
            paginate:   { previous: '‹', next: '›' }
        }
    });

    // Custom search
    $('#sbSearch').on('keyup', function () {
        table.search($(this).val()).draw();
    });

    // ── LOAD DATA ──
    function loadData() {
        $.get('/satuan-barang/get-data', function (res) {
            table.clear();
            let no = 1;
            $('#statTotalSatuan').text(res.data.length);

            $.each(res.data, function (i, item) {
                let initial = item.satuan.charAt(0).toUpperCase();

                table.row.add([
                    `<div class="td-no">${no++}</div>`,

                    `<div class="satuan-cell">
                        <div class="satuan-icon">${initial}</div>
                        <div class="satuan-name">${item.satuan}</div>
                    </div>`,

                    `<div class="aksi-group">
                        <a href="javascript:void(0)"
                           class="aksi-new aksi-edit"
                           id="button_edit_satuan"
                           data-id="${item.id}" title="Edit">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)"
                           class="aksi-new aksi-hapus"
                           id="button_hapus_satuan"
                           data-id="${item.id}" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>`
                ]).draw(false);
            });
        });
    }

    loadData();

    // ── TAMBAH ──
    $('body').on('click', '#button_tambah_satuan', function () {
        $('#modal_tambah_satuan').modal('show');
    });

    $('#store').click(function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('satuan', $('#satuan').val());
        formData.append('_token', $("meta[name='csrf-token']").attr('content'));

        $.ajax({
            url: '/satuan-barang', type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                playSound('success');
                Swal.fire({ icon: 'success', title: res.message, timer: 2500, showConfirmButton: false });
                $('#satuan').val('');
                $('#modal_tambah_satuan').modal('hide');
                loadData();
            },
            error: function (err) {
                if (err.responseJSON?.satuan?.[0]) {
                    $('#alert-satuan').removeClass('d-none').html(err.responseJSON.satuan[0]);
                }
            }
        });
    });

    // ── EDIT ──
    $('body').on('click', '#button_edit_satuan', function () {
        let id = $(this).data('id');
        $.get(`/satuan-barang/${id}/edit`, function (res) {
            $('#satuan_id').val(res.data.id);
            $('#edit_satuan').val(res.data.satuan);
            $('#modal_edit_satuan').modal('show');
        });
    });

    $('#update').click(function (e) {
        e.preventDefault();
        let id = $('#satuan_id').val();
        let formData = new FormData();
        formData.append('satuan',   $('#edit_satuan').val());
        formData.append('_token',   $("meta[name='csrf-token']").attr('content'));
        formData.append('_method',  'PUT');

        $.ajax({
            url: `/satuan-barang/${id}`, type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                playSound('success');
                Swal.fire({ icon: 'success', title: res.message, timer: 2500, showConfirmButton: false });
                $('#modal_edit_satuan').modal('hide');
                loadData();
            },
            error: function (err) {
                if (err.responseJSON?.satuan?.[0]) {
                    $('#alert-satuan').removeClass('d-none').html(err.responseJSON.satuan[0]);
                }
            }
        });
    });

    // ── HAPUS ──
    $('body').on('click', '#button_hapus_satuan', function () {
        let id    = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr('content');

        Swal.fire({
            title: 'Hapus Satuan?',
            text:  'Data satuan barang ini akan dihapus permanen.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText:  'Batal',
            confirmButtonColor:'#ef4444'
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url:  `/satuan-barang/${id}`,
                    type: 'DELETE',
                    data: { _token: token },
                    success: function (res) {
                        playSound('delete');
                        Swal.fire({ icon: 'success', title: res.message, timer: 2000, showConfirmButton: false });
                        loadData();
                    }
                });
            }
        });
    });

});
</script>

@endsection