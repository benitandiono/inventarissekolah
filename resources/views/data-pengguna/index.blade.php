@extends('layouts.app')

@include('data-pengguna.create')
@include('data-pengguna.edit')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
/* =============================================
   DATA PENGGUNA — PREMIUM UPGRADE
============================================= */
.pm-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: pmFadeIn .45s ease both;
}

@keyframes pmFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

/* ── PAGE HEADER ── */
.pm-header {
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

.pm-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.pm-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.pm-header-left { position: relative; z-index: 1; }

.pm-header-eyebrow {
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

.pm-header-eyebrow i { font-size: 9px; color: #6ee7b7; }

.pm-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.pm-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.pm-header-right { position: relative; z-index: 1; }

/* STAT PILLS */
.pm-stat-pills {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.pm-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}

.pm-stat-pill .spn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.pm-stat-pill .spl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

/* ── ADD BUTTON ── */
.btn-add-user {
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
}

.btn-add-user:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
    color: #1d4ed8;
    text-decoration: none;
}

/* ── SEARCH / FILTER BAR ── */
.pm-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.pm-search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.pm-search-wrap input {
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

.pm-search-wrap input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.pm-search-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
    pointer-events: none;
}

/* ── MAIN CARD ── */
.pm-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.pm-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.pm-card-body { padding: 24px; }

/* ── TABLE ── */
#table_pengguna {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_pengguna thead tr {
    background: transparent;
}

#table_pengguna thead th {
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

#table_pengguna thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_pengguna thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

#table_pengguna tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_pengguna tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_pengguna tbody td {
    padding: 14px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
}

#table_pengguna tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_pengguna tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

/* ── NO COL ── */
.td-no {
    width: 40px;
    height: 40px;
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

/* ── USER CELL ── */
.user-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.user-avatar-new {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 800;
    color: #fff;
    flex-shrink: 0;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    letter-spacing: -.5px;
}

.user-info-name {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
    line-height: 1.3;
}

.user-info-email {
    font-size: 11px;
    color: #94a3b8;
    font-weight: 600;
    margin-top: 2px;
}

/* ── EMAIL CELL ── */
.email-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 5px 10px;
    font-size: 12px;
    font-weight: 600;
    color: #475569;
}

.email-chip i { color: #94a3b8; font-size: 11px; }

/* ── ROLE BADGE ── */
.role-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border-radius: 99px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .3px;
    color: #fff;
}

/* ── ACTION BUTTONS ── */
.aksi-group {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
}

.aksi-new {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    cursor: pointer;
    transition: all .22s ease;
    border: none;
    text-decoration: none;
    font-size: 14px;
}

.aksi-new:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,.2);
    color: #fff;
    text-decoration: none;
}

.aksi-edit   { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.aksi-reset  { background: linear-gradient(135deg, #0ea5e9, #38bdf8); }
.aksi-delete { background: linear-gradient(135deg, #ef4444, #f87171); }

/* ── DATATABLE OVERRIDES ── */
.dataTables_wrapper .dataTables_filter input {
    display: none !important;
}
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

.dataTables_wrapper .dataTables_paginate {
    padding-top: 10px !important;
}

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

/* ── EMPTY STATE ── */
#table_pengguna tbody td.dataTables_empty {
    text-align: center;
    padding: 40px !important;
    color: #94a3b8;
    font-weight: 600;
    background: transparent;
}

/* ── MODAL UPGRADES ── */
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

.modal-title {
    color: #fff !important;
    font-weight: 800 !important;
    font-size: 16px !important;
}

.modal-header .btn-close {
    filter: brightness(0) invert(1);
    opacity: .7;
}

.modal-header .btn-close:hover { opacity: 1; }

.modal-footer {
    border-top: 1px solid #f1f5f9 !important;
    padding: 16px 28px !important;
}
</style>

<div class="pm-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="pm-header">
        <div class="pm-header-left">
            <div class="pm-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Akun
            </div>
            <h1><i class="fas fa-users" style="font-size: 26px; margin-right: 12px; vertical-align: middle;"></i>Data Pengguna</h1>
            <div class="pm-header-sub">Kelola semua akun pengguna sistem inventaris</div>
        </div>

        <div class="pm-header-right d-flex align-items-center flex-wrap" style="gap: 20px;">
            <div class="pm-stat-pills">
                <div class="pm-stat-pill">
                    <div class="spn" id="statTotal">—</div>
                    <div class="spl">Total</div>
                </div>
            </div>
            <button class="btn-add-user" id="button_tambah_pengguna">
                <i class="fas fa-user-plus" style="margin-right: 6px;"></i> Tambah Pengguna
            </button>
        </div>
    </div>

    {{-- ── TOOLBAR ── --}}
    <div class="pm-toolbar">
        <div class="pm-search-wrap">
            <i class="fas fa-search pm-search-icon"></i>
            <input type="text" id="pmSearch" placeholder="Cari nama atau email pengguna…">
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="pm-card">
        <div class="pm-card-stripe"></div>
        <div class="pm-card-body">
            <div class="table-responsive">
                <table id="table_pengguna" class="display">
                    <thead>
                        <tr>
                            <th style="width:60px">No</th>
                            <th>Pengguna</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th style="width:140px">Aksi</th>
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

            if (type === 'reset') {
                // Dua nada "ping ping" — reset password berhasil
                [880, 1046.50].forEach(function(freq, i) {
                    const osc  = ctx.createOscillator();
                    const gain = ctx.createGain();
                    osc.connect(gain);
                    gain.connect(ctx.destination);
                    osc.type = 'sine';
                    osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.18);
                    gain.gain.setValueAtTime(0.2, ctx.currentTime + i * 0.18);
                    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.18 + 0.45);
                    osc.start(ctx.currentTime + i * 0.18);
                    osc.stop(ctx.currentTime + i * 0.18 + 0.45);
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
            console.warn('AudioContext not supported:', e);
        }
    }

    // ── INIT DATATABLE ──
    let table = $('#table_pengguna').DataTable({
        paging:   true,
        ordering: false,
        dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
        language: {
            lengthMenu: 'Tampilkan _MENU_ data',
            info:       'Menampilkan _START_–_END_ dari _TOTAL_ pengguna',
            infoEmpty:  'Tidak ada data',
            paginate: { previous: '‹', next: '›' }
        }
    });

    // Custom search binding
    $('#pmSearch').on('keyup', function () {
        table.search($(this).val()).draw();
    });

    loadData();

    // ── LOAD DATA ──
    function loadData() {
        $.get('/data-pengguna/get-data', function (response) {
            table.clear();
            let no = 1;
            let total = response.data.length;

            $('#statTotal').text(total);

            $.each(response.data, function (i, value) {
                let color     = generateColorFromText(value.email);
                let initial   = value.name.charAt(0).toUpperCase();
                let roleColor = generateColorFromText(value.role.role);

                table.row.add([
                    `<div class="td-no">${no++}</div>`,

                    `<div class="user-cell">
                        <div class="user-avatar-new" style="background:${color}">${initial}</div>
                        <div>
                            <div class="user-info-name">${value.name}</div>
                            <div class="user-info-email">${value.email}</div>
                        </div>
                    </div>`,

                    `<div class="email-chip"><i class="fas fa-envelope"></i>${value.email}</div>`,

                    `<span class="role-badge" style="background:${roleColor}">${value.role.role}</span>`,

                    `<div class="aksi-group">
                        <a href="javascript:void(0)"
                           id="button_edit_pengguna"
                           data-id="${value.id}"
                           class="aksi-new aksi-edit"
                           title="Edit Pengguna">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="javascript:void(0)"
                           id="button_reset_login"
                           data-id="${value.id}"
                           class="aksi-new aksi-reset"
                           title="Reset Password">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                        <a href="javascript:void(0)"
                           id="button_hapus_pengguna"
                           data-id="${value.id}"
                           class="aksi-new aksi-delete"
                           title="Hapus Pengguna">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>`
                ]).draw(false);
            });
        });
    }

    // ── TAMBAH ──
    $('#button_tambah_pengguna').click(function () {
        $('#modal_tambah_pengguna').modal('show');
    });

    $('#store').click(function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('name',     $('#name').val());
        formData.append('email',    $('#email').val());
        formData.append('password', $('#password').val());
        formData.append('role_id',  $('#role_id').val());

        $.ajax({
            url: '/data-pengguna', type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                Swal.fire('Berhasil', res.message, 'success');
                $('#modal_tambah_pengguna').modal('hide');
                loadData();
            }
        });
    });

    // ── EDIT ──
    $('body').on('click', '#button_edit_pengguna', function () {
        let id = $(this).data('id');
        $.get(`/data-pengguna/${id}/edit`, function (res) {
            $('#pengguna_id').val(res.data.id);
            $('#edit_name').val(res.data.name);
            $('#edit_email').val(res.data.email);
            $('#edit_role_id').val(res.data.role_id);
            $('#edit_password').val('');
            $('#modal_edit_pengguna').modal('show');
        });
    });

    $('#update').click(function (e) {
        e.preventDefault();
        let id = $('#pengguna_id').val();
        let formData = new FormData();
        formData.append('_token',   $('meta[name="csrf-token"]').attr('content'));
        formData.append('_method',  'PUT');
        formData.append('name',     $('#edit_name').val());
        formData.append('email',    $('#edit_email').val());
        formData.append('role_id',  $('#edit_role_id').val());
        if ($('#edit_password').val() !== '') {
            formData.append('password', $('#edit_password').val());
        }

        $.ajax({
            url: `/data-pengguna/${id}`, type: 'POST',
            data: formData, contentType: false, processData: false,
            success: function (res) {
                Swal.fire('Berhasil', res.message, 'success');
                $('#modal_edit_pengguna').modal('hide');
                loadData();
            }
        });
    });

    // ── RESET LOGIN ──
    $('body').on('click', '#button_reset_login', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Reset Password?',
            text:  'Login & Password user akan di-reset — user akan logout otomatis.',
            icon:  'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Reset!',
            cancelButtonText:  'Batal',
            confirmButtonColor: '#0ea5e9'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(`/data-pengguna/${id}/reset-login`, {
                    _token: $('meta[name="csrf-token"]').attr('content')
                }, function (res) {
                    playSound('reset'); // ← sound reset berhasil
                    Swal.fire('Berhasil', res.message, 'success');
                });
            }
        });
    });

    // ── HAPUS ──
    $('body').on('click', '#button_hapus_pengguna', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Hapus Pengguna?',
            text:  'Data pengguna ini akan dihapus permanen.',
            icon:  'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText:  'Batal',
            confirmButtonColor: '#ef4444'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:  `/data-pengguna/${id}`,
                    type: 'DELETE',
                    data: { _token: $('meta[name="csrf-token"]').attr('content') },
                    success: function (res) {
                        Swal.fire('Berhasil', res.message, 'success');
                        loadData();
                    }
                });
            }
        });
    });

});

// ── COLOR GENERATOR ──
function generateColorFromText(text) {
    let hash = 0;
    for (let i = 0; i < text.length; i++) {
        hash = text.charCodeAt(i) + ((hash << 5) - hash);
    }
    const colors = [
        '#4f46e5','#0891b2','#10b981',
        '#f59e0b','#ef4444','#8b5cf6','#14b8a6'
    ];
    return colors[Math.abs(hash) % colors.length];
}
</script>

@endsection