<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_aset">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2"></i> Edit Data Aset
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formEditAset" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="aset_id">

                    <div class="row">

                        {{-- ═══════════════════════════
                             KOLOM KIRI — UPLOAD GAMBAR
                        ═══════════════════════════ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Gambar Aset</label>

                                {{-- Preview gambar saat ini --}}
                                <div class="mb-2 text-center">
                                    <img id="edit_preview" src="" class="img-fluid"
                                         style="max-height:200px; border-radius:12px; border:2px solid #e2e8f0;
                                                box-shadow:0 4px 12px rgba(0,0,0,.08); display:block; margin:0 auto;">
                                </div>

                                {{-- Upload area --}}
                                <div class="upload-area" id="editUploadArea"
                                     onclick="document.getElementById('edit_gambar').click()">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <div class="upload-text">Ganti Gambar</div>
                                    <div class="upload-hint">JPG, JPEG, PNG &nbsp;·&nbsp; Maks. <strong>10 MB</strong></div>
                                </div>
                                <input type="file" class="d-none" id="edit_gambar"
                                       accept="image/jpg,image/jpeg,image/png"
                                       onchange="previewImage('edit_gambar','edit_preview','edit-file-info','alert-edit_gambar','editUploadArea')">

                                {{-- Progress ukuran file --}}
                                <div id="edit-file-info" class="mt-2 d-none">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <small id="edit-file-name" class="text-muted"
                                               style="max-width:60%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></small>
                                        <small id="edit-file-size-text" class="font-weight-bold"></small>
                                    </div>
                                    <div class="progress" style="height:7px;border-radius:99px;">
                                        <div id="edit-file-size-bar" class="progress-bar" role="progressbar"
                                             style="width:0%;border-radius:99px;transition:width .4s ease;"></div>
                                    </div>
                                    <div id="edit-file-size-hint" class="mt-1" style="font-size:11px;"></div>
                                </div>

                                {{-- Alert error gambar --}}
                                <div class="alert alert-danger mt-2 d-none" id="alert-edit_gambar"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span id="alert-edit_gambar-text"></span>
                                </div>

                            </div>
                        </div>

                        {{-- ═══════════════════════════
                             KOLOM KANAN — FORM DATA
                        ═══════════════════════════ --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Nama Aset</label>
                                <input type="text" class="form-control" id="edit_nama_aset"
                                       placeholder="Contoh: Meja Belajar">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Jumlah Aset</label>
                                <input type="number" class="form-control" id="edit_jumlah"
                                       placeholder="Contoh: 10" min="1">
                            </div>

                            {{-- ── KONDISI → GURU & TENDIK ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    <i class="fas fa-user-tie mr-1" style="color:#2563eb"></i>
                                    Pemegang Aset
                                </label>
                                <div style="position:relative;">
                                    <select class="form-control" id="edit_kondisi"
                                            style="padding-left:38px;">
                                        <option value="">-- Pilih Guru / Tendik --</option>
                                    </select>
                                    <i class="fas fa-users"
                                       style="position:absolute;left:12px;top:50%;transform:translateY(-50%);
                                              color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                                </div>
                                {{-- Loading indicator --}}
                                <small id="edit_kondisi-loading" class="text-muted mt-1 d-none">
                                    <i class="fas fa-spinner fa-spin mr-1"></i> Memuat data...
                                </small>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Lokasi Aset</label>
                                <input type="text" class="form-control" id="edit_lokasi"
                                       placeholder="Contoh: Ruang Kelas 1A">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                    <button type="button" class="btn btn-primary" id="updateAset">
                        <i class="fas fa-save mr-1"></i> Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<style>
/* ── Select Guru & Tendik (edit modal) ── */
#edit_kondisi {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    border: 1.5px solid #dbeafe;
    border-radius: 10px;
    background: #f8faff;
    color: #1e3a8a;
    cursor: pointer;
    transition: all .2s ease;
    appearance: none;
    -webkit-appearance: none;
}

#edit_kondisi:focus {
    border-color: #2563eb;
    background: #eff6ff;
    box-shadow: 0 0 0 4px rgba(37,99,235,.12);
    outline: none;
}

#edit_kondisi:disabled {
    opacity: .6;
    cursor: not-allowed;
}
</style>