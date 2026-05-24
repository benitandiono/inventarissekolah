<div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_aset">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Aset
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        {{-- ═══════════════════════════
                             KOLOM KIRI — UPLOAD GAMBAR
                        ═══════════════════════════ --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Gambar Aset
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>

                                {{-- Input file --}}
                                <div class="upload-area" id="uploadArea" onclick="document.getElementById('gambar').click()">
                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                    <div class="upload-text">Upload Gambar</div>
                                    <div class="upload-hint">JPG, JPEG, PNG &nbsp;·&nbsp; Maks. <strong>10 MB</strong></div>
                                </div>
                                <input type="file" class="d-none" name="gambar" id="gambar"
                                       accept="image/jpg,image/jpeg,image/png"
                                       onchange="previewImage('gambar','preview','file-info','alert-gambar','uploadArea'); validateForm();">

                                {{-- Progress ukuran file --}}
                                <div id="file-info" class="mt-2 d-none">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <small id="file-name" class="text-muted" style="max-width:60%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></small>
                                        <small id="file-size-text" class="font-weight-bold"></small>
                                    </div>
                                    <div class="progress" style="height:7px;border-radius:99px;">
                                        <div id="file-size-bar" class="progress-bar" role="progressbar"
                                             style="width:0%;border-radius:99px;transition:width .4s ease;"></div>
                                    </div>
                                    <div id="file-size-hint" class="mt-1" style="font-size:11px;"></div>
                                </div>

                                {{-- Alert error gambar --}}
                                <div class="alert alert-danger mt-2 d-none" id="alert-gambar"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span id="alert-gambar-text"></span>
                                </div>

                                {{-- Preview gambar --}}
                                <div id="preview-wrap" class="mt-2 d-none text-center">
                                    <img id="preview" class="img-fluid"
                                         style="max-height:200px;border-radius:12px;border:2px solid #e2e8f0;box-shadow:0 4px 12px rgba(0,0,0,.08);">
                                    <div class="mt-1">
                                        <small class="text-muted">
                                            <i class="fas fa-check-circle text-success mr-1"></i>
                                            Preview gambar
                                        </small>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- ═══════════════════════════
                             KOLOM KANAN — FORM DATA
                        ═══════════════════════════ --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Nama Aset
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <input type="text" class="form-control field-input" name="nama_aset" id="nama_aset"
                                       placeholder="Contoh: Meja Belajar"
                                       onkeyup="validateForm();">
                                <div class="alert alert-danger mt-2 d-none" id="alert-nama_aset"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Nama Aset wajib diisi</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Jumlah Aset
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <input type="number" class="form-control field-input" name="jumlah" id="jumlah"
                                       placeholder="Contoh: 10" min="1"
                                       onchange="validateForm();">
                                <div class="alert alert-danger mt-2 d-none" id="alert-jumlah"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Jumlah Aset wajib diisi dan minimal 1</span>
                                </div>
                            </div>

                            {{-- ── KONDISI → GURU & TENDIK ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    <i class="fas fa-user-tie mr-1" style="color:#2563eb"></i>
                                    Pemegang Aset
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <div style="position:relative;">
                                    <select class="form-control field-input" name="kondisi" id="kondisi"
                                            style="padding-left: 38px;"
                                            onchange="validateForm();">
                                        <option value="">-- Pilih Guru / Tendik --</option>
                                    </select>
                                    <i class="fas fa-users"
                                       style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;pointer-events:none;"></i>
                                </div>
                                {{-- Loading indicator --}}
                                <small id="kondisi-loading" class="text-muted mt-1 d-none">
                                    <i class="fas fa-spinner fa-spin mr-1"></i> Memuat data...
                                </small>
                                <div class="alert alert-danger mt-2 d-none" id="alert-kondisi"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Pemegang Aset wajib dipilih</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Lokasi Aset
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <input type="text" class="form-control field-input" name="lokasi" id="lokasi"
                                       placeholder="Contoh: Ruang Kelas 1A"
                                       onkeyup="validateForm();">
                                <div class="alert alert-danger mt-2 d-none" id="alert-lokasi"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Lokasi Aset wajib diisi</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                    <button type="button" class="btn btn-primary" id="storeAset" disabled>
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

{{-- ── STYLE UPLOAD AREA & VALIDASI ── --}}
<style>
.upload-area {
    border: 2px dashed #bfdbfe;
    border-radius: 14px;
    padding: 28px 20px;
    text-align: center;
    cursor: pointer;
    background: #f0f7ff;
    transition: all .25s ease;
}

.upload-area:hover {
    border-color: #2563eb;
    background: #e0edff;
}

.upload-area.error {
    border-color: #dc2626;
    background: #fee2e2;
}

.upload-icon {
    font-size: 32px;
    color: #93c5fd;
    display: block;
    margin-bottom: 8px;
    transition: all .25s ease;
}

.upload-area.error .upload-icon {
    color: #dc2626;
}

.upload-text {
    font-size: 13px;
    font-weight: 700;
    color: #3b82f6;
}

.upload-area.error .upload-text {
    color: #dc2626;
}

.upload-hint {
    font-size: 11px;
    color: #94a3b8;
    margin-top: 4px;
}

/* Form field styling */
.field-input {
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    transition: all .2s ease;
}

.field-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    outline: none;
}

.field-input.error {
    border-color: #dc2626 !important;
    background-color: #fef2f2 !important;
}

/* Select Guru & Tendik styling */
#kondisi {
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

#kondisi:focus {
    border-color: #2563eb;
    background: #eff6ff;
    box-shadow: 0 0 0 4px rgba(37,99,235,.12);
    outline: none;
}

#kondisi.error {
    border-color: #dc2626 !important;
    background: #fef2f2 !important;
    color: #dc2626;
}

/* Button Simpan styling */
#storeAset {
    font-weight: 700;
    border-radius: 10px;
    padding: 8px 24px;
    font-size: 13px;
    transition: all .2s ease;
}

#storeAset:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

#storeAset:not(:disabled):hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
}
</style>

{{-- ── SCRIPT LOAD CUSTOMER & VALIDASI ── --}}
<script>
/**
 * ════════════════════════════════════════════════════════════
 * VALIDASI FORM TAMBAH ASET
 * ════════════════════════════════════════════════════════════
 */

/**
 * validateForm() — Cek semua field dan update UI
 * Dipanggil setiap kali user mengetik/memilih
 */
function validateForm() {
    const gambar    = document.getElementById('gambar').files.length > 0;
    const namaAset  = document.getElementById('nama_aset').value.trim();
    const jumlah    = document.getElementById('jumlah').value.trim();
    const kondisi   = document.getElementById('kondisi').value.trim();
    const lokasi    = document.getElementById('lokasi').value.trim();

    let isValid = true;

    // ─ Validasi Gambar
    if (!gambar) {
        document.getElementById('uploadArea').classList.add('error');
        isValid = false;
    } else {
        document.getElementById('uploadArea').classList.remove('error');
    }

    // ─ Validasi Nama Aset
    if (!namaAset) {
        document.getElementById('nama_aset').classList.add('error');
        document.getElementById('alert-nama_aset').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('nama_aset').classList.remove('error');
        document.getElementById('alert-nama_aset').classList.add('d-none');
    }

    // ─ Validasi Jumlah
    if (!jumlah || parseInt(jumlah) < 1) {
        document.getElementById('jumlah').classList.add('error');
        document.getElementById('alert-jumlah').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('jumlah').classList.remove('error');
        document.getElementById('alert-jumlah').classList.add('d-none');
    }

    // ─ Validasi Kondisi (Pemegang)
    if (!kondisi) {
        document.getElementById('kondisi').classList.add('error');
        document.getElementById('alert-kondisi').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('kondisi').classList.remove('error');
        document.getElementById('alert-kondisi').classList.add('d-none');
    }

    // ─ Validasi Lokasi
    if (!lokasi) {
        document.getElementById('lokasi').classList.add('error');
        document.getElementById('alert-lokasi').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('lokasi').classList.remove('error');
        document.getElementById('alert-lokasi').classList.add('d-none');
    }

    // ─ Update button Simpan
    const btnSimpa = document.getElementById('storeAset');
    if (isValid) {
        btnSimpa.disabled = false;
        btnSimpa.style.opacity = '1';
        btnSimpa.style.cursor = 'pointer';
    } else {
        btnSimpa.disabled = true;
        btnSimpa.style.opacity = '0.6';
        btnSimpa.style.cursor = 'not-allowed';
    }

    return isValid;
}

/**
 * loadCustomerOptions — isi dropdown #kondisi dari API /customer/get-data
 * Dipanggil saat modal tambah aset dibuka
 */
function loadCustomerOptions(selectId) {
    var $select  = $('#' + selectId);
    var $loading = $('#' + selectId + '-loading');

    $select.prop('disabled', true);
    if ($loading.length) $loading.removeClass('d-none');

    $.getJSON('/customer/get-data', function (res) {
        $select.find('option:not(:first)').remove();

        if (res.data && res.data.length > 0) {
            $.each(res.data, function (i, item) {
                var status = (item.alamat || '').toLowerCase();
                var icon   = status.includes('guru')   ? '👨‍🏫 '
                           : status.includes('tendik') ? '💼 '
                           : '👤 ';

                var value = item.customer;
                if (item.alamat && item.alamat !== '-') value += ' — ' + item.alamat;

                var label = icon + value;

                $select.append(
                    $('<option>', { value: value, text: label })
                );
            });
        } else {
            $select.append('<option value="" disabled>Tidak ada data Guru & Tendik</option>');
        }
    }).fail(function () {
        $select.append('<option value="" disabled>Gagal memuat data</option>');
    }).always(function () {
        $select.prop('disabled', false);
        if ($loading.length) $loading.addClass('d-none');
        
        // Cek validasi setelah data dimuat
        validateForm();
    });
}

/**
 * resetFormValidation() — Reset semua error state saat modal dibuka
 */
function resetFormValidation() {
    // Hapus error class dari semua field
    document.getElementById('nama_aset').classList.remove('error');
    document.getElementById('jumlah').classList.remove('error');
    document.getElementById('kondisi').classList.remove('error');
    document.getElementById('lokasi').classList.remove('error');
    document.getElementById('uploadArea').classList.remove('error');

    // Sembunyikan semua alert
    document.getElementById('alert-nama_aset').classList.add('d-none');
    document.getElementById('alert-jumlah').classList.add('d-none');
    document.getElementById('alert-kondisi').classList.add('d-none');
    document.getElementById('alert-lokasi').classList.add('d-none');
    document.getElementById('alert-gambar').classList.add('d-none');

    // Disable button simpan
    document.getElementById('storeAset').disabled = true;
}
</script>