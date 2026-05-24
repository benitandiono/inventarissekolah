<div class="modal fade" id="modal_detail_aset">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="far fa-eye mr-2"></i> Detail Data Aset
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form>
                <div class="modal-body">

                    <div class="row">

                        {{-- ═══════════════════════════
                             KOLOM KIRI — GAMBAR
                        ═══════════════════════════ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Gambar Aset</label>

                                {{-- Wrapper flex agar gambar selalu center & tidak terpotong --}}
                                <div class="text-center"
                                     style="background: #f8fafc;
                                            border-radius: 14px;
                                            padding: 12px;
                                            border: 1.5px solid #e2e8f0;
                                            min-height: 120px;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;">
                                    <img id="detail_preview" src=""
                                         class="img-fluid"
                                         style="max-height: 350px;
                                                max-width: 100%;
                                                width: auto;
                                                height: auto;
                                                display: block;
                                                margin: 0 auto;
                                                border-radius: 10px;
                                                box-shadow: 0 4px 16px rgba(0,0,0,.1);
                                                object-fit: contain;">
                                </div>

                            </div>
                        </div>

                        {{-- ═══════════════════════════
                             KOLOM KANAN — DATA
                        ═══════════════════════════ --}}
                        <div class="col-md-6">

                            {{-- Nama Aset --}}
                            <div class="form-group">
                                <label class="detail-label">
                                    <i class="fas fa-tag mr-1"></i> Nama Aset
                                </label>
                                <input type="text" class="form-control detail-input"
                                       id="detail_nama_aset" disabled>
                            </div>

                            {{-- Jumlah --}}
                            <div class="form-group">
                                <label class="detail-label">
                                    <i class="fas fa-cubes mr-1"></i> Jumlah Aset
                                </label>
                                <input type="number" class="form-control detail-input"
                                       id="detail_jumlah" disabled>
                            </div>

                            {{-- Guru & Tendik (menggantikan Kondisi) --}}
                            <div class="form-group">
                                <label class="detail-label">
                                    <i class="fas fa-user-tie mr-1" style="color:#2563eb"></i>
                                    Pemegang Aset
                                </label>
                                <div id="detail_kondisi_wrap" class="detail-pemegang-wrap">
                                    <span id="detail_kondisi_badge">—</span>
                                </div>
                                {{-- Hidden input tetap ada untuk keperluan data binding --}}
                                <input type="hidden" id="detail_kondisi">
                            </div>

                            {{-- Lokasi --}}
                            <div class="form-group">
                                <label class="detail-label">
                                    <i class="fas fa-map-marker-alt mr-1"></i> Lokasi Aset
                                </label>
                                <input type="text" class="form-control detail-input"
                                       id="detail_lokasi" disabled>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
/* ── Detail label ── */
.detail-label {
    font-size: 11px;
    font-weight: 800;
    color: #64748b;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 6px;
    display: block;
}

/* ── Detail input (disabled styling) ── */
.detail-input {
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    color: #0f172a !important;
    background: #f8fafc !important;
    border: 1.5px solid #e2e8f0 !important;
    border-radius: 10px !important;
    cursor: default !important;
}

.detail-input:disabled {
    opacity: 1 !important;
}

/* ── Pemegang wrap ── */
.detail-pemegang-wrap {
    background: #f8fafc;
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    padding: 9px 14px;
    min-height: 42px;
    display: flex;
    align-items: center;
}

/* ── Badge Guru & Tendik (sama dengan index) ── */
.pemegang-badge-detail {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 5px 14px;
    border-radius: 99px;
    font-size: 12px;
    font-weight: 700;
}

.pemegang-guru-detail {
    background: #eff6ff;
    color: #1d4ed8;
    border: 1px solid #bfdbfe;
}

.pemegang-tendik-detail {
    background: #fef9c3;
    color: #92400e;
    border: 1px solid #fde68a;
}

.pemegang-default-detail {
    background: #f1f5f9;
    color: #475569;
    border: 1px solid #e2e8f0;
}
</style>

<script>
/**
 * setPemegangBadge — dipanggil dari index.blade.php saat modal detail dibuka
 * Mengisi #detail_kondisi_badge dengan badge sesuai nama & status Guru/Tendik
 */
function setPemegangBadge(nama) {
    var $badge = $('#detail_kondisi_badge');

    if (!nama || nama === '-' || nama === '') {
        $badge.html(
            '<span class="pemegang-badge-detail pemegang-default-detail">' +
            '<i class="fas fa-user" style="font-size:10px"></i> —</span>'
        );
        return;
    }

    var lower = nama.toLowerCase();

    if (lower.includes('guru')) {
        $badge.html(
            '<span class="pemegang-badge-detail pemegang-guru-detail">' +
            '<i class="fas fa-chalkboard-teacher" style="font-size:10px"></i> ' + nama + '</span>'
        );
    } else if (lower.includes('tendik')) {
        $badge.html(
            '<span class="pemegang-badge-detail pemegang-tendik-detail">' +
            '<i class="fas fa-briefcase" style="font-size:10px"></i> ' + nama + '</span>'
        );
    } else {
        $badge.html(
            '<span class="pemegang-badge-detail pemegang-default-detail">' +
            '<i class="fas fa-user-tie" style="font-size:10px"></i> ' + nama + '</span>'
        );
    }
}
</script>