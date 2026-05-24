{{-- ═══════════════════════════════════════════════════════════════
     MODAL RIWAYAT PENGHAPUSAN ASET
     File: resources/views/aset/delete_log.blade.php
     Include di: aset/index.blade.php  →  @include('aset.delete_log')
═══════════════════════════════════════════════════════════════ --}}

<div class="modal fade" tabindex="-1" role="dialog" id="modal_riwayat_hapus" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="border-radius:22px !important; overflow:hidden; border:none !important;">

            {{-- ── HEADER ── --}}
            <div class="modal-header"
                 style="background:linear-gradient(135deg,#7c1d1d 0%,#b91c1c 50%,#dc2626 100%) !important;
                        border-radius:22px 22px 0 0 !important;
                        border-bottom:none !important;
                        padding:22px 30px !important;
                        position:relative; overflow:hidden;">

                {{-- Dekorasi lingkaran --}}
                <span style="position:absolute;top:-40px;right:-40px;width:160px;height:160px;border-radius:50%;
                             background:rgba(255,255,255,.06);pointer-events:none;"></span>
                <span style="position:absolute;bottom:-50px;left:25%;width:130px;height:130px;border-radius:50%;
                             background:rgba(255,255,255,.04);pointer-events:none;"></span>

                <div style="position:relative;z-index:1;display:flex;align-items:center;gap:14px;">
                    <div style="width:42px;height:42px;border-radius:12px;
                                background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);
                                display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-trash-alt" style="color:#fca5a5;font-size:17px;"></i>
                    </div>
                    <div>
                        <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,.55);
                                    text-transform:uppercase;letter-spacing:.8px;margin-bottom:2px;">
                            Manajemen Inventaris
                        </div>
                        <h5 class="modal-title"
                            style="font-family:'Plus Jakarta Sans',sans-serif;
                                   font-size:17px;font-weight:800;color:#fff;margin:0;">
                            Riwayat Penghapusan Aset
                        </h5>
                    </div>
                </div>

                {{-- Stat total --}}
                <div style="position:relative;z-index:1;display:flex;align-items:center;gap:14px;margin-left:auto;">
                    <div style="background:rgba(255,255,255,.13);border:1px solid rgba(255,255,255,.2);
                                border-radius:12px;padding:8px 20px;text-align:center;backdrop-filter:blur(8px);">
                        <div id="statTotalHapus" style="font-size:20px;font-weight:800;color:#fff;line-height:1;">—</div>
                        <div style="font-size:10px;font-weight:700;color:rgba(255,255,255,.55);
                                    text-transform:uppercase;letter-spacing:.5px;margin-top:2px;">
                            Total Dihapus
                        </div>
                    </div>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            style="color:#fff;opacity:.7;font-size:22px;background:none;border:none;cursor:pointer;
                                   padding:0;line-height:1;position:relative;z-index:1;">
                        &times;
                    </button>
                </div>
            </div>

            {{-- ── BODY ── --}}
            <div class="modal-body" style="padding:24px 28px; background:#f8fafc;">

                {{-- Toolbar pencarian --}}
                <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;flex-wrap:wrap;">
                    <div style="position:relative;flex:1;min-width:220px;">
                        <i class="fas fa-search"
                           style="position:absolute;left:13px;top:50%;transform:translateY(-50%);
                                  color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                        <input type="text" id="logSearch"
                               placeholder="Cari nama aset, pemegang, alasan…"
                               style="width:100%;background:#fff;border:1.5px solid #e2e8f0;border-radius:11px;
                                      padding:9px 14px 9px 38px;font-family:'Plus Jakarta Sans',sans-serif;
                                      font-size:13px;font-weight:600;color:#0f172a;outline:none;
                                      box-shadow:0 2px 8px rgba(0,0,0,.04);transition:all .2s ease;">
                    </div>
                    <button type="button" id="btnRefreshLog"
                            style="display:inline-flex;align-items:center;gap:7px;
                                   background:linear-gradient(135deg,#1e40af,#2563eb);color:#fff;
                                   border:none;border-radius:11px;padding:9px 18px;
                                   font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;
                                   cursor:pointer;transition:all .22s ease;box-shadow:0 4px 12px rgba(37,99,235,.28);">
                        <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                </div>

                {{-- Card tabel --}}
                <div style="background:#fff;border-radius:18px;border:1px solid #e8edf5;
                            box-shadow:0 4px 20px rgba(15,23,42,.06);overflow:hidden;">
                    <div style="height:4px;background:linear-gradient(90deg,#dc2626,#f87171,#ef4444);"></div>
                    <div style="padding:20px;">

                        {{-- Loading state --}}
                        <div id="logLoading" style="text-align:center;padding:48px 20px;display:none;">
                            <i class="fas fa-spinner fa-spin"
                               style="font-size:28px;color:#dc2626;margin-bottom:12px;display:block;"></i>
                            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;
                                        font-weight:600;color:#94a3b8;">
                                Memuat riwayat penghapusan…
                            </div>
                        </div>

                        {{-- Empty state --}}
                        <div id="logEmpty" style="text-align:center;padding:48px 20px;display:none;">
                            <div style="font-size:52px;margin-bottom:12px;">🗑️</div>
                            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;
                                        font-weight:800;color:#334155;margin-bottom:6px;">
                                Belum Ada Riwayat
                            </div>
                            <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;color:#94a3b8;">
                                Aset yang dihapus akan muncul di sini.
                            </div>
                        </div>

                        {{-- Table --}}
                        <div class="table-responsive" id="logTableWrap" style="display:none;">
                            <table id="table_log_hapus" class="display"
                                   style="width:100% !important;border-collapse:separate !important;
                                          border-spacing:0 7px !important;">
                                <thead>
                                    <tr>
                                        <th style="width:48px;">No</th>
                                        <th style="width:80px;">Gambar</th>
                                        <th>Nama Aset</th>
                                        <th style="width:70px;">Jumlah</th>
                                        <th style="width:170px;">Pemegang</th>
                                        <th style="width:140px;">Lokasi</th>
                                        <th>Alasan Hapus</th>
                                        <th style="width:130px;">Dihapus Oleh</th>
                                        <th style="width:150px;">Waktu Hapus</th>
                                    </tr>
                                </thead>
                                <tbody id="logTableBody"></tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            {{-- ── FOOTER ── --}}
            <div class="modal-footer"
                 style="border-top:1px solid #f1f5f9 !important;padding:14px 28px !important;
                        background:#fff;justify-content:space-between;align-items:center;">
                <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11.5px;color:#94a3b8;font-weight:600;">
                    <i class="fas fa-info-circle mr-1" style="color:#cbd5e1;"></i>
                    Riwayat ini tidak dapat diubah atau dihapus.
                </div>
                <button type="button" class="btn" data-dismiss="modal"
                        style="background:#f1f5f9;color:#475569;border:none;border-radius:10px;
                               padding:9px 22px;font-family:'Plus Jakarta Sans',sans-serif;
                               font-size:13px;font-weight:700;cursor:pointer;">
                    <i class="fas fa-times mr-1"></i> Tutup
                </button>
            </div>

        </div>
    </div>
</div>


{{-- ════════════════════════════════════════════
     MODAL KONFIRMASI HAPUS + INPUT ALASAN
     (menggantikan SweetAlert hapus biasa)
════════════════════════════════════════════ --}}
<div class="modal fade" tabindex="-1" role="dialog" id="modal_konfirmasi_hapus" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="border-radius:20px !important;overflow:hidden;border:none !important;">

            <div class="modal-header"
                 style="background:linear-gradient(135deg,#7c1d1d,#b91c1c) !important;
                        border-radius:20px 20px 0 0 !important;border-bottom:none !important;
                        padding:18px 26px !important;">
                <h5 class="modal-title"
                    style="font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;
                           font-weight:800;color:#fff;margin:0;">
                    <i class="fas fa-exclamation-triangle mr-2" style="color:#fca5a5;"></i>
                    Konfirmasi Penghapusan Aset
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                        style="color:#fff;opacity:.7;font-size:20px;background:none;border:none;cursor:pointer;">
                    &times;
                </button>
            </div>

            <div class="modal-body" style="padding:24px 26px;">

                {{-- Info aset yang akan dihapus --}}
                <div id="hapusAsetInfo"
                     style="background:#fff5f5;border:1.5px solid #fecaca;border-radius:14px;
                            padding:14px 18px;margin-bottom:18px;">
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;font-weight:700;
                                color:#991b1b;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;">
                        <i class="fas fa-box mr-1"></i> Aset yang akan dihapus
                    </div>
                    <div style="display:flex;align-items:center;gap:12px;">
                        <img id="hapusAsetGambar" src="" alt=""
                             style="width:56px;height:44px;border-radius:9px;object-fit:cover;
                                    border:2px solid #fecaca;flex-shrink:0;"
                             onerror="this.src='/assets/img/no-image.png'">
                        <div>
                            <div id="hapusAsetNama"
                                 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;
                                        font-weight:800;color:#1e293b;"></div>
                            <div id="hapusAsetMeta"
                                 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;
                                        color:#64748b;margin-top:2px;"></div>
                        </div>
                    </div>
                </div>

                {{-- Input alasan --}}
                <div style="margin-bottom:6px;">
                    <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;
                                  font-weight:700;color:#334155;display:block;margin-bottom:6px;">
                        <i class="fas fa-pen-alt mr-1" style="color:#dc2626;"></i>
                        Alasan / Keterangan Penghapusan
                        <span style="color:#dc2626;">*</span>
                    </label>
                    <textarea id="inputAlasanHapus" rows="4"
                              placeholder="Contoh: Aset rusak tidak bisa diperbaiki, Aset hilang saat inventarisasi, Aset sudah tidak digunakan…"
                              style="width:100%;background:#fff;border:1.5px solid #e2e8f0;border-radius:12px;
                                     padding:11px 14px;font-family:'Plus Jakarta Sans',sans-serif;
                                     font-size:13px;font-weight:500;color:#0f172a;
                                     resize:vertical;outline:none;transition:all .2s ease;
                                     box-shadow:0 2px 8px rgba(0,0,0,.04);min-height:90px;"></textarea>
                    <div id="alertAlasan"
                         style="display:none;background:#fee2e2;border:1px solid #fecaca;border-radius:9px;
                                padding:8px 12px;margin-top:8px;font-family:'Plus Jakarta Sans',sans-serif;
                                font-size:12px;font-weight:600;color:#991b1b;">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <span id="alertAlasanText">Alasan penghapusan wajib diisi (minimal 5 karakter).</span>
                    </div>
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:#94a3b8;
                                margin-top:6px;">
                        Minimal 5 karakter · Maksimal 500 karakter
                    </div>
                </div>

                {{-- Warning permanen --}}
                <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:11px;
                            padding:10px 14px;margin-top:14px;display:flex;align-items:flex-start;gap:9px;">
                    <i class="fas fa-exclamation-triangle"
                       style="color:#f59e0b;font-size:14px;margin-top:1px;flex-shrink:0;"></i>
                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;
                                font-weight:600;color:#78350f;line-height:1.5;">
                        Data aset akan <strong>dihapus permanen</strong> dan tidak dapat dikembalikan.
                        Riwayat penghapusan akan disimpan untuk keperluan audit.
                    </div>
                </div>

            </div>

            <div class="modal-footer"
                 style="border-top:1px solid #f1f5f9 !important;padding:14px 26px !important;background:#fff;">
                <button type="button" class="btn" data-dismiss="modal"
                        style="background:#f1f5f9;color:#475569;border:none;border-radius:10px;
                               padding:10px 22px;font-family:'Plus Jakarta Sans',sans-serif;
                               font-size:13px;font-weight:700;cursor:pointer;transition:all .2s;">
                    <i class="fas fa-times mr-1"></i> Batal
                </button>
                <button type="button" id="btnKonfirmasiHapus"
                        data-id=""
                        style="display:inline-flex;align-items:center;gap:7px;
                               background:linear-gradient(135deg,#b91c1c,#dc2626);color:#fff;
                               border:none;border-radius:10px;padding:10px 22px;
                               font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;
                               cursor:pointer;transition:all .22s ease;
                               box-shadow:0 4px 14px rgba(185,28,28,.35);">
                    <i class="fas fa-trash-alt"></i> Ya, Hapus Aset
                </button>
            </div>

        </div>
    </div>
</div>


{{-- ════════════════════════════════════════════
     CSS TABLE LOG
════════════════════════════════════════════ --}}
<style>
/* Fokus input alasan */
#inputAlasanHapus:focus {
    border-color: #dc2626 !important;
    box-shadow: 0 0 0 4px rgba(220,38,38,.1) !important;
}

#logSearch:focus {
    border-color: #2563eb !important;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1) !important;
}

/* Log table header */
#table_log_hapus thead th {
    background: linear-gradient(135deg, #7c1d1d, #b91c1c) !important;
    color: #fff !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 10.5px !important;
    font-weight: 700 !important;
    text-transform: uppercase;
    letter-spacing: .7px;
    padding: 13px 14px !important;
    border: none !important;
    text-align: center;
}

#table_log_hapus thead th:first-child { border-radius: 11px 0 0 11px !important; }
#table_log_hapus thead th:last-child  { border-radius: 0 11px 11px 0 !important; }

#table_log_hapus tbody tr {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(15,23,42,.05);
    transition: all .2s ease;
    animation: logRowIn .3s ease both;
}

#table_log_hapus tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220,38,38,.1);
}

@keyframes logRowIn {
    from { opacity:0; transform:translateY(6px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_log_hapus tbody td {
    padding: 11px 14px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12.5px;
    color: #334155;
    text-align: center;
}

#table_log_hapus tbody td:first-child { border-radius: 12px 0 0 12px !important; }
#table_log_hapus tbody td:last-child  { border-radius: 0 12px 12px 0 !important; }

/* Badge alasan */
.alasan-cell {
    text-align: left !important;
    max-width: 220px;
}

.alasan-text {
    font-size: 12px;
    font-weight: 600;
    color: #374151;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.5;
    cursor: pointer;
}

.alasan-text:hover { color: #dc2626; }

/* Dihapus oleh badge */
.deleted-by-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fef2f2;
    border: 1px solid #fecaca;
    color: #991b1b;
    border-radius: 99px;
    padding: 4px 12px;
    font-size: 11.5px;
    font-weight: 700;
}

/* Waktu badge */
.waktu-badge {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 5px 10px;
    font-size: 11px;
    font-weight: 700;
    color: #475569;
    line-height: 1.4;
}

.waktu-badge .wkt-tgl { color: #0f172a; font-size: 12px; }
.waktu-badge .wkt-jam { color: #94a3b8; font-size: 10.5px; }

/* No badge log */
.td-no-log {
    width: 34px; height: 34px;
    border-radius: 9px;
    background: linear-gradient(135deg, #fff5f5, #fee2e2);
    color: #dc2626;
    font-weight: 800;
    font-size: 12.5px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

/* DataTable overrides untuk modal log */
#modal_riwayat_hapus .dataTables_wrapper .dataTables_filter input { display: none !important; }
#modal_riwayat_hapus .dataTables_wrapper .dataTables_filter label { display: none !important; }

#modal_riwayat_hapus .dataTables_wrapper .dataTables_length select {
    font-family: 'Plus Jakarta Sans', sans-serif;
    border: 1.5px solid #e2e8f0;
    border-radius: 8px;
    padding: 4px 10px;
    font-size: 12px;
    outline: none;
}

#modal_riwayat_hapus .dataTables_wrapper .dataTables_info {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px;
    color: #94a3b8;
    font-weight: 600;
    padding-top: 12px !important;
}

#modal_riwayat_hapus .dataTables_wrapper .dataTables_paginate { padding-top: 8px !important; }

#modal_riwayat_hapus .dataTables_wrapper .dataTables_paginate .paginate_button {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px;
    font-weight: 700;
    border-radius: 7px !important;
    border: none !important;
    padding: 5px 10px !important;
    margin: 0 2px;
    color: #475569 !important;
    transition: all .2s ease;
}

#modal_riwayat_hapus .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #fff5f5 !important;
    color: #dc2626 !important;
    box-shadow: none !important;
}

#modal_riwayat_hapus .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, #b91c1c, #dc2626) !important;
    color: #fff !important;
    box-shadow: 0 3px 10px rgba(185,28,28,.3) !important;
}
</style>


{{-- ════════════════════════════════════════════
     SCRIPT RIWAYAT & HAPUS DENGAN ALASAN
════════════════════════════════════════════ --}}
<script>
$(document).ready(function () {

    /* ══════════════════════════════════════
       INIT DATATABLE LOG
    ══════════════════════════════════════ */
    var tableLog = null;

    function initLogTable() {
        if (tableLog) {
            tableLog.destroy();
            $('#table_log_hapus tbody').empty();
        }

        tableLog = $('#table_log_hapus').DataTable({
            processing: true,
            autoWidth : false,
            ordering  : false,
            dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
            language: {
                lengthMenu: 'Tampilkan _MENU_ data',
                info      : 'Menampilkan _START_–_END_ dari _TOTAL_ riwayat',
                infoEmpty : 'Tidak ada data',
                paginate  : { previous: '‹', next: '›' }
            }
        });

        $('#logSearch').on('keyup', function () {
            tableLog.search($(this).val()).draw();
        });
    }

    /* ══════════════════════════════════════
       LOAD DATA LOG
    ══════════════════════════════════════ */
    function loadLogData() {
        $('#logLoading').show();
        $('#logEmpty').hide();
        $('#logTableWrap').hide();

        $.get('/aset/delete-logs', function (res) {
            $('#logLoading').hide();

            var data = res.data || [];
            $('#statTotalHapus').text(data.length);

            if (data.length === 0) {
                $('#logEmpty').show();
                return;
            }

            $('#logTableWrap').show();
            initLogTable();
            tableLog.clear();

            $.each(data, function (i, item) {
                var gambarHtml = item.gambar
                    ? `<img src="/storage/${item.gambar}"
                            style="width:60px;height:46px;border-radius:8px;object-fit:cover;
                                   border:2px solid #fecaca;box-shadow:0 2px 6px rgba(0,0,0,.1);"
                            onerror="this.src='/assets/img/no-image.png'">`
                    : `<div style="width:60px;height:46px;border-radius:8px;background:#f1f5f9;
                                   display:flex;align-items:center;justify-content:center;margin:0 auto;">
                           <i class="fas fa-image" style="color:#cbd5e1;font-size:16px;"></i>
                       </div>`;

                // Format waktu
                var waktu    = item.deleted_at_log ? new Date(item.deleted_at_log) : null;
                var tglStr   = waktu ? waktu.toLocaleDateString('id-ID', { day:'2-digit', month:'short', year:'numeric' }) : '—';
                var jamStr   = waktu ? waktu.toLocaleTimeString('id-ID', { hour:'2-digit', minute:'2-digit' }) : '';

                // Pemegang badge (reuse style dari index)
                var kondisi = item.kondisi || '—';
                var lower   = kondisi.toLowerCase();
                var pmStyle, pmIcon;
                if (lower.includes('guru')) {
                    pmStyle = 'background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe;';
                    pmIcon  = 'fas fa-chalkboard-teacher';
                } else if (lower.includes('tendik')) {
                    pmStyle = 'background:#fef9c3;color:#92400e;border:1px solid #fde68a;';
                    pmIcon  = 'fas fa-briefcase';
                } else {
                    pmStyle = 'background:#f1f5f9;color:#475569;border:1px solid #e2e8f0;';
                    pmIcon  = 'fas fa-user-tie';
                }

                var pemegangHtml = `<span style="display:inline-flex;align-items:center;gap:5px;
                                               padding:4px 10px;border-radius:99px;font-size:11.5px;
                                               font-weight:700;max-width:160px;overflow:hidden;
                                               text-overflow:ellipsis;white-space:nowrap;${pmStyle}">
                                        <i class="${pmIcon}" style="font-size:9px;flex-shrink:0;"></i>
                                        ${escapeHtmlLog(kondisi)}
                                    </span>`;

                tableLog.row.add([
                    `<div class="td-no-log">${i + 1}</div>`,
                    `<div style="display:flex;justify-content:center;">${gambarHtml}</div>`,
                    `<div style="text-align:left;font-weight:700;color:#0f172a;font-size:13px;">
                         ${escapeHtmlLog(item.nama_aset)}
                     </div>`,
                    `<span style="display:inline-flex;align-items:center;justify-content:center;
                                  background:linear-gradient(135deg,#fff5f5,#fee2e2);color:#991b1b;
                                  border:1px solid #fecaca;border-radius:7px;padding:3px 12px;
                                  font-size:12.5px;font-weight:800;min-width:38px;">
                         ${item.jumlah}
                     </span>`,
                    pemegangHtml,
                    `<div style="display:inline-flex;align-items:center;gap:5px;background:#f8fafc;
                                 border:1px solid #e2e8f0;border-radius:7px;padding:4px 9px;
                                 font-size:11.5px;font-weight:600;color:#475569;">
                         <i class="fas fa-map-marker-alt" style="color:#94a3b8;font-size:10px;"></i>
                         ${escapeHtmlLog(item.lokasi || '—')}
                     </div>`,
                    `<div class="alasan-cell">
                         <div class="alasan-text"
                              title="${escapeHtmlLog(item.alasan_hapus)}"
                              onclick="showFullAlasan('${escapeHtmlLog(item.nama_aset)}', \`${escapeHtmlLog(item.alasan_hapus)}\`)">
                             ${escapeHtmlLog(item.alasan_hapus)}
                         </div>
                     </div>`,
                    `<span class="deleted-by-badge">
                         <i class="fas fa-user" style="font-size:9px;"></i>
                         ${escapeHtmlLog(item.deleted_by_name || '—')}
                     </span>`,
                    `<div class="waktu-badge">
                         <span class="wkt-tgl">${tglStr}</span>
                         <span class="wkt-jam">${jamStr}</span>
                     </div>`
                ]).draw(false);
            });

        }).fail(function () {
            $('#logLoading').hide();
            $('#logEmpty').show();
            Swal.fire({
                icon: 'error', title: 'Gagal Memuat',
                text: 'Tidak dapat mengambil data riwayat penghapusan.',
                confirmButtonColor: '#dc2626'
            });
        });
    }

    /* ══════════════════════════════════════
       BUKA MODAL RIWAYAT
    ══════════════════════════════════════ */
    $(document).on('click', '#btnRiwayatHapus', function () {
        $('#modal_riwayat_hapus').modal('show');
        loadLogData();
    });

    $('#btnRefreshLog').on('click', function () {
        loadLogData();
    });

    /* ══════════════════════════════════════
       HAPUS ASET — buka modal konfirmasi dulu
    ══════════════════════════════════════ */
    // Override event di #table_aset yang sudah ada di index.blade.php
    // Ganti event .btn-hapus dengan flow baru
    $(document).off('click', '#table_aset .btn-hapus');
    $(document).on('click', '#table_aset .btn-hapus', function () {
        var id       = $(this).data('id');
        var $row     = $(this).closest('tr');

        // Ambil data dari baris tabel untuk ditampilkan di modal konfirmasi
        var namaAset = $row.find('.nama-aset').text().trim()
                    || $row.find('td:nth-child(3)').text().trim()
                    || 'Aset ini';
        var gambarSrc = $row.find('.img-aset').attr('src') || '/assets/img/no-image.png';

        // Cari data dari cache
        var asetData = cachedAsetData.find(function(a) { return parseInt(a.id) === parseInt(id); });
        var metaText = '';
        if (asetData) {
            metaText = `Jumlah: ${asetData.jumlah} &nbsp;·&nbsp; Lokasi: ${asetData.lokasi || '—'}`;
        }

        // Isi modal konfirmasi
        $('#hapusAsetNama').text(namaAset);
        $('#hapusAsetMeta').html(metaText);
        $('#hapusAsetGambar').attr('src', gambarSrc);
        $('#inputAlasanHapus').val('');
        $('#alertAlasan').hide();
        $('#btnKonfirmasiHapus').data('id', id).prop('disabled', false)
            .html('<i class="fas fa-trash-alt mr-1"></i> Ya, Hapus Aset');

        $('#modal_konfirmasi_hapus').modal('show');
    });

    /* ══════════════════════════════════════
       EKSEKUSI HAPUS + KIRIM ALASAN
    ══════════════════════════════════════ */
    $('#btnKonfirmasiHapus').on('click', function () {
        var id      = $(this).data('id');
        var alasan  = $('#inputAlasanHapus').val().trim();

        // Validasi alasan
        if (alasan.length < 5) {
            $('#alertAlasanText').text('Alasan penghapusan wajib diisi (minimal 5 karakter).');
            $('#alertAlasan').show();
            $('#inputAlasanHapus').focus();
            return;
        }

        if (alasan.length > 500) {
            $('#alertAlasanText').text('Alasan tidak boleh melebihi 500 karakter.');
            $('#alertAlasan').show();
            return;
        }

        $('#alertAlasan').hide();

        var btn = $(this);
        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menghapus...');

        $.ajax({
            url   : `/aset/${id}`,
            type  : 'DELETE',
            data  : {
                _token       : '{{ csrf_token() }}',
                alasan_hapus : alasan
            },
            success: function (res) {
                $('#modal_konfirmasi_hapus').modal('hide');
                playSound('delete');
                Swal.fire({
                    icon : 'success',
                    title: 'Berhasil Dihapus!',
                    html : `<div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;color:#64748b;">
                                Data aset telah dihapus dan riwayat penghapusan berhasil dicatat.
                            </div>`,
                    timer              : 2500,
                    showConfirmButton  : false,
                    timerProgressBar   : true
                });
                // Reload data tabel utama
                if (typeof loadData === 'function') loadData();
            },
            error: function (xhr) {
                playSound('error');
                var msg = xhr.responseJSON?.message || 'Terjadi kesalahan saat menghapus data.';
                Swal.fire({
                    icon: 'error', title: 'Gagal Menghapus',
                    text: msg, confirmButtonColor: '#dc2626'
                });
                btn.prop('disabled', false)
                   .html('<i class="fas fa-trash-alt mr-1"></i> Ya, Hapus Aset');
            }
        });
    });

    /* ══════════════════════════════════════
       RESET saat modal konfirmasi ditutup
    ══════════════════════════════════════ */
    $('#modal_konfirmasi_hapus').on('hidden.bs.modal', function () {
        $('#inputAlasanHapus').val('');
        $('#alertAlasan').hide();
        $('#btnKonfirmasiHapus').prop('disabled', false)
            .html('<i class="fas fa-trash-alt mr-1"></i> Ya, Hapus Aset');
    });

});

/* ══════════════════════════════════════
   POPUP ALASAN PENUH (klik alasan di tabel)
══════════════════════════════════════ */
function showFullAlasan(namaAset, alasan) {
    Swal.fire({
        title: `<div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:15px;font-weight:800;color:#1e293b;">
                    Alasan Penghapusan
                </div>`,
        html: `<div style="font-family:'Plus Jakarta Sans',sans-serif;">
                   <div style="background:#fff5f5;border:1.5px solid #fecaca;border-radius:11px;
                               padding:11px 16px;margin-bottom:14px;font-size:13px;font-weight:700;color:#991b1b;">
                       <i class="fas fa-box mr-2"></i>${namaAset}
                   </div>
                   <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:11px;
                               padding:14px 16px;text-align:left;font-size:13px;font-weight:500;
                               color:#334155;line-height:1.7;white-space:pre-wrap;">
                       ${alasan}
                   </div>
               </div>`,
        confirmButtonText : 'Tutup',
        confirmButtonColor: '#64748b',
        width: 480
    });
}

/* ══════════════════════════════════════
   ESCAPE HTML untuk konten log
══════════════════════════════════════ */
function escapeHtmlLog(text) {
    var map = { '&':'&amp;', '<':'&lt;', '>':'&gt;', '"':'&quot;', "'":"&#039;" };
    return String(text || '').replace(/[&<>"']/g, function(m) { return map[m]; });
}
</script>