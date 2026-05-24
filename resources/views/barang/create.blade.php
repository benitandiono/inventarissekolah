<div class="modal fade" tabindex="-1" role="dialog" id="modal_tambah_barang">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Barang
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">

                        {{-- KOLOM KIRI — UPLOAD GAMBAR --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Gambar Barang
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>

                                <div class="br-upload-area" id="brUploadArea"
                                     onclick="document.getElementById('gambar').click()">
                                    <i class="fas fa-cloud-upload-alt br-upload-icon"></i>
                                    <div class="br-upload-text">Upload Gambar</div>
                                    <div class="br-upload-hint">JPG, JPEG, PNG &nbsp;·&nbsp; Maks. <strong>10 MB</strong></div>
                                </div>
                                <input type="file" class="d-none" name="gambar" id="gambar"
                                       accept="image/jpg,image/jpeg,image/png"
                                       onchange="brPreviewImage('gambar','preview','br-file-info','alert-gambar','brUploadArea'); brValidateForm();">

                                <div id="br-file-info" class="mt-2 d-none">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <small id="br-file-name" class="text-muted"
                                               style="max-width:60%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></small>
                                        <small id="br-file-size-text" class="font-weight-bold"></small>
                                    </div>
                                    <div class="progress" style="height:7px;border-radius:99px;">
                                        <div id="br-file-size-bar" class="progress-bar" role="progressbar"
                                             style="width:0%;border-radius:99px;transition:width .4s ease;"></div>
                                    </div>
                                    <div id="br-file-size-hint" class="mt-1" style="font-size:11px;"></div>
                                </div>

                                <div class="alert alert-danger mt-2 d-none" id="alert-gambar"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;" role="alert">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span id="alert-gambar-text">Gambar barang wajib diupload</span>
                                </div>

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

                        {{-- KOLOM KANAN — FORM DATA --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Nama Barang 
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <div style="position:relative;">
                                    <input type="text" class="form-control br-field-input" name="nama_barang" id="nama_barang"
                                           placeholder="Contoh: Spidol Whiteboard" 
                                           onkeyup="brCheckUniqueBarang(); brValidateForm();">
                                    <small id="nama_barang_status" class="mt-1" style="display:none;"></small>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_barang"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Nama Barang wajib diisi</span>
                                </div>
                            </div>

                            {{-- ── KATEGORI BARANG (custom dropdown) ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Kategori Barang
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <input type="hidden" name="jenis_id" id="jenis_id"
                                       value="{{ old('jenis_id', $jenis_barangs->first()->id ?? '') }}">

                                @php
                                $catMap = [
                                    'Elektronik'               => ['icon'=>'💻','bg'=>'#eff6ff','desc'=>'Komputer, TV, AC...'],
                                    'Peralatan Kantor'         => ['icon'=>'🗂️','bg'=>'#f0fdf4','desc'=>'Meja, kursi, lemari...'],
                                    'Alat Tulis Kantor'        => ['icon'=>'✏️','bg'=>'#fefce8','desc'=>'Pena, spidol, kertas...'],
                                    'Peralatan Olahraga'       => ['icon'=>'⚽','bg'=>'#fff7ed','desc'=>'Bola, raket, matras...'],
                                    'Peralatan Kebersihan'     => ['icon'=>'🧹','bg'=>'#f0fdf4','desc'=>'Sapu, pel, tempat sampah...'],
                                    'Peralatan Multimedia'     => ['icon'=>'🎥','bg'=>'#fdf4ff','desc'=>'Proyektor, kamera, speaker...'],
                                    'Peralatan Jaringan & IT'  => ['icon'=>'🌐','bg'=>'#eff6ff','desc'=>'Router, switch, kabel...'],
                                    'Peralatan Keamanan'       => ['icon'=>'🔒','bg'=>'#fef2f2','desc'=>'CCTV, kunci, brankas...'],
                                    'Perabotan'                => ['icon'=>'🛋️','bg'=>'#fafaf9','desc'=>'Sofa, rak, lemari...'],
                                ];
                                $firstJenis = $jenis_barangs->first();
                                $fCat = $catMap[$firstJenis->jenis_barang ?? ''] ?? ['icon'=>'🏷️','bg'=>'#f3f4f6','desc'=>''];
                                @endphp

                                <div class="br-dd-container" id="cat-tambah-container">
                                    <button type="button" class="br-dd-btn" id="cat-tambah-btn"
                                            onclick="brToggleDD('cat-tambah'); return false;">
                                        <div class="br-dd-sel" id="cat-tambah-sel">
                                            <div class="br-dd-icon" style="background:{{ $fCat['bg'] }}">{{ $fCat['icon'] }}</div>
                                            <span>{{ $firstJenis->jenis_barang ?? 'Pilih Kategori' }}</span>
                                        </div>
                                        <span class="br-dd-arrow">&#9660;</span>
                                    </button>
                                    <div class="br-dd-menu" id="cat-tambah-menu">
                                        @foreach ($jenis_barangs as $jenis)
                                            @php
                                                $cm = $catMap[$jenis->jenis_barang] ?? ['icon'=>'🏷️','bg'=>'#f3f4f6','desc'=>''];
                                                $isActive = (!old('jenis_id') && $loop->first) || old('jenis_id') == $jenis->id;
                                            @endphp
                                            <div class="br-dd-item {{ $isActive ? 'active' : '' }}"
                                                 data-id="{{ $jenis->id }}"
                                                 onclick="brSelectCat('cat-tambah',{{ $jenis->id }},'{{ $cm['icon'] }}','{{ $jenis->jenis_barang }}','{{ $cm['bg'] }}','jenis_id'); brValidateForm();">
                                                <div class="br-dd-icon" style="background:{{ $cm['bg'] }}">{{ $cm['icon'] }}</div>
                                                <div>
                                                    <div class="br-dd-name">{{ $jenis->jenis_barang }}</div>
                                                    <div class="br-dd-desc">{{ $cm['desc'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jenis_id"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Kategori Barang wajib dipilih</span>
                                </div>
                            </div>

                            {{-- ── SATUAN BARANG (custom dropdown) ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">
                                    Satuan Barang
                                    <span class="text-danger font-weight-bold">*</span>
                                </label>
                                <input type="hidden" name="satuan_id" id="satuan_id"
                                       value="{{ old('satuan_id', $satuans->first()->id ?? '') }}">

                                @php
                                $satMap = [
                                    'Pcs'    => ['abbr'=>'pcs', 'bg'=>'#eff6ff','color'=>'#3b82f6','desc'=>'Satuan per buah'],
                                    'Set'    => ['abbr'=>'set', 'bg'=>'#fdf4ff','color'=>'#9333ea','desc'=>'Kumpulan barang'],
                                    'Unit'   => ['abbr'=>'unit','bg'=>'#f0fdf4','color'=>'#16a34a','desc'=>'Satu perangkat'],
                                    'Buah'   => ['abbr'=>'bh',  'bg'=>'#fff7ed','color'=>'#ea580c','desc'=>'Per buah barang'],
                                    'Pak'    => ['abbr'=>'pak', 'bg'=>'#fefce8','color'=>'#ca8a04','desc'=>'Kemasan paket'],
                                    'Pack'   => ['abbr'=>'pak', 'bg'=>'#fefce8','color'=>'#ca8a04','desc'=>'Kemasan paket'],
                                    'Rim'    => ['abbr'=>'rim', 'bg'=>'#fef2f2','color'=>'#dc2626','desc'=>'500 lembar kertas'],
                                    'Box'    => ['abbr'=>'box', 'bg'=>'#eff6ff','color'=>'#2563eb','desc'=>'Satuan kotak'],
                                    'Lusin'  => ['abbr'=>'lsn', 'bg'=>'#f0fdf4','color'=>'#15803d','desc'=>'12 buah barang'],
                                    'Lembar' => ['abbr'=>'lbr', 'bg'=>'#fdf4ff','color'=>'#7c3aed','desc'=>'Per lembar'],
                                    'Kg'     => ['abbr'=>'kg',  'bg'=>'#fff7ed','color'=>'#b45309','desc'=>'Kilogram'],
                                    'Liter'  => ['abbr'=>'ltr', 'bg'=>'#eff6ff','color'=>'#0369a1','desc'=>'Satuan volume'],
                                    'Meter'  => ['abbr'=>'mtr', 'bg'=>'#f0fdf4','color'=>'#065f46','desc'=>'Satuan panjang'],
                                    'Roll'   => ['abbr'=>'roll','bg'=>'#fef2f2','color'=>'#b91c1c','desc'=>'Gulungan'],
                                ];
                                $firstSat = $satuans->first();
                                $fSat = $satMap[$firstSat->satuan ?? ''] ?? ['abbr'=>'...','bg'=>'#f3f4f6','color'=>'#6b7280','desc'=>''];
                                @endphp

                                <div class="br-dd-container" id="sat-tambah-container">
                                    <button type="button" class="br-dd-btn" id="sat-tambah-btn"
                                            onclick="brToggleDD('sat-tambah'); return false;">
                                        <div class="br-dd-sel" id="sat-tambah-sel">
                                            <div class="br-dd-icon br-dd-abbr"
                                                 style="background:{{ $fSat['bg'] }};color:{{ $fSat['color'] }};border:1px solid {{ $fSat['color'] }}40">
                                                {{ $fSat['abbr'] }}
                                            </div>
                                            <span>{{ $firstSat->satuan ?? 'Pilih Satuan' }}</span>
                                        </div>
                                        <span class="br-dd-arrow">&#9660;</span>
                                    </button>
                                    <div class="br-dd-menu" id="sat-tambah-menu">
                                        @foreach ($satuans as $satuan)
                                            @php
                                                $sm = $satMap[$satuan->satuan] ?? ['abbr'=>strtolower(substr($satuan->satuan,0,3)),'bg'=>'#f3f4f6','color'=>'#6b7280','desc'=>''];
                                                $isActiveSat = (!old('satuan_id') && $loop->first) || old('satuan_id') == $satuan->id;
                                            @endphp
                                            <div class="br-dd-item {{ $isActiveSat ? 'active' : '' }}"
                                                 data-id="{{ $satuan->id }}"
                                                 onclick="brSelectSat('sat-tambah',{{ $satuan->id }},'{{ $sm['abbr'] }}','{{ $satuan->satuan }}','{{ $sm['bg'] }}','{{ $sm['color'] }}','satuan_id'); brValidateForm();">
                                                <div class="br-dd-icon br-dd-abbr"
                                                     style="background:{{ $sm['bg'] }};color:{{ $sm['color'] }};border:1px solid {{ $sm['color'] }}40">
                                                    {{ $sm['abbr'] }}
                                                </div>
                                                <div>
                                                    <div class="br-dd-name">{{ $satuan->satuan }}</div>
                                                    <div class="br-dd-desc">{{ $sm['desc'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-satuan_id"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="alert-text">Satuan Barang wajib dipilih</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Minim. Stok</label>
                                <input type="number" class="form-control" name="stok_minimum" id="stok_minimum"
                                       placeholder="Minimal 1" min="0">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-stok_minimum"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;"></div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"
                                          placeholder="Deskripsi singkat barang..."></textarea>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-deskripsi"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;border-left:4px solid #dc2626;"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                    <button type="button" class="btn btn-primary" id="store" disabled>
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════════
     STYLE — Upload Area + Custom Dropdown + Validasi
══════════════════════════════════════════ --}}
<style>
.br-upload-area{border:2px dashed #bfdbfe;border-radius:14px;padding:28px 20px;text-align:center;cursor:pointer;background:#f0f7ff;transition:all .25s ease}
.br-upload-area:hover{border-color:#2563eb;background:#e0edff}
.br-upload-area.error{border-color:#dc2626;background:#fee2e2}
.br-upload-icon{
    font-size:32px;
    color:#93c5fd;
    display:block;
    margin-bottom:8px;
    transition:all .25s ease;
}
.br-upload-area.error .br-upload-icon{color:#dc2626}
.br-upload-text{
    font-size:13px;
    font-weight:700;
    color:#3b82f6;
}
.br-upload-area.error .br-upload-text{color:#dc2626}
.br-upload-hint{font-size:11px;color:#94a3b8;margin-top:4px}

/* Form field styling */
.br-field-input {
    border: 1.5px solid #e2e8f0;
    border-radius: 10px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    transition: all .2s ease;
}

.br-field-input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    outline: none;
}

.br-field-input.error {
    border-color: #dc2626 !important;
    background-color: #fef2f2 !important;
}

.br-dd-container{position:relative}
.br-dd-btn{width:100%;padding:7px 12px;border:1.5px solid #d1d5db;border-radius:8px;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:space-between;font-size:13px;color:#111827;transition:border-color .2s,box-shadow .2s;text-align:left}
.br-dd-btn:hover{border-color:#9ca3af}
.br-dd-btn.open{border-color:#3b82f6;box-shadow:0 0 0 3px rgba(59,130,246,.15)}
.br-dd-btn.error{border-color:#dc2626;background:#fef2f2}
.br-dd-sel{display:flex;align-items:center;gap:8px;min-width:0}
.br-dd-icon{width:26px;height:26px;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;background:#f3f4f6}
.br-dd-abbr{font-size:10px!important;font-weight:700;letter-spacing:.03em}
.br-dd-arrow{font-size:9px;color:#9ca3af;transition:transform .2s;flex-shrink:0;margin-left:8px}
.br-dd-btn.open .br-dd-arrow{transform:rotate(180deg)}
.br-dd-menu{display:none;position:absolute;top:calc(100% + 4px);left:0;right:0;background:#fff;border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;z-index:1055;max-height:250px;overflow-y:auto;box-shadow:0 8px 24px rgba(0,0,0,.12)}
.br-dd-menu::-webkit-scrollbar{width:4px}
.br-dd-menu::-webkit-scrollbar-thumb{background:#e5e7eb;border-radius:99px}
.br-dd-item{display:flex;align-items:center;gap:10px;padding:8px 12px;cursor:pointer;font-size:13px;color:#111827;transition:background .15s}
.br-dd-item:hover{background:#f9fafb}
.br-dd-item.active{background:#eff6ff}
.br-dd-item.active .br-dd-name{color:#2563eb;font-weight:600}
.br-dd-name{font-size:13px;color:#111827;line-height:1.3}
.br-dd-desc{font-size:11px;color:#9ca3af;margin-top:1px}

/* Button Simpan styling */
#store {
    font-weight: 700;
    border-radius: 10px;
    padding: 8px 24px;
    font-size: 13px;
    transition: all .2s ease;
}

#store:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

#store:not(:disabled):hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
}
</style>


{{-- ══════════════════════════════════════════
     SCRIPT — Custom Dropdown + Validasi
════════════════════════════════════════════ --}}
<script>
/**
 * ════════════════════════════════════════════════════════════
 * VALIDASI FORM TAMBAH BARANG
 * ════════════════════════════════════════════════════════════
 */
function brValidateForm() {
    const gambar   = document.getElementById('gambar').files.length > 0;
    const namaBar  = document.getElementById('nama_barang').value.trim();
    const jenis    = document.getElementById('jenis_id').value.trim();
    const satuan   = document.getElementById('satuan_id').value.trim();

    let isValid = true;

    // ─ Validasi Gambar
    if (!gambar) {
        document.getElementById('brUploadArea').classList.add('error');
        isValid = false;
    } else {
        document.getElementById('brUploadArea').classList.remove('error');
    }

    // ─ Validasi Nama Barang
    if (!namaBar) {
        document.getElementById('nama_barang').classList.add('error');
        document.getElementById('alert-nama_barang').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('nama_barang').classList.remove('error');
        document.getElementById('alert-nama_barang').classList.add('d-none');
    }

    // ─ Validasi Kategori
    if (!jenis) {
        document.getElementById('cat-tambah-btn').classList.add('error');
        document.getElementById('alert-jenis_id').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('cat-tambah-btn').classList.remove('error');
        document.getElementById('alert-jenis_id').classList.add('d-none');
    }

    // ─ Validasi Satuan
    if (!satuan) {
        document.getElementById('sat-tambah-btn').classList.add('error');
        document.getElementById('alert-satuan_id').classList.remove('d-none');
        isValid = false;
    } else {
        document.getElementById('sat-tambah-btn').classList.remove('error');
        document.getElementById('alert-satuan_id').classList.add('d-none');
    }

    // ─ Update button Simpan
    const btnStore = document.getElementById('store');
    if (isValid) {
        btnStore.disabled = false;
        btnStore.style.opacity = '1';
        btnStore.style.cursor = 'pointer';
    } else {
        btnStore.disabled = true;
        btnStore.style.opacity = '0.6';
        btnStore.style.cursor = 'not-allowed';
    }

    return isValid;
}

/**
 * resetBrFormValidation() — Reset semua error state saat modal dibuka
 */
function resetBrFormValidation() {
    // Hapus error class dari semua field
    document.getElementById('nama_barang').classList.remove('error');
    document.getElementById('brUploadArea').classList.remove('error');
    document.getElementById('cat-tambah-btn').classList.remove('error');
    document.getElementById('sat-tambah-btn').classList.remove('error');

    // Sembunyikan semua alert
    document.getElementById('alert-gambar').classList.add('d-none');
    document.getElementById('alert-nama_barang').classList.add('d-none');
    document.getElementById('alert-jenis_id').classList.add('d-none');
    document.getElementById('alert-satuan_id').classList.add('d-none');

    // Disable button simpan
    document.getElementById('store').disabled = true;
}

/* Fungsi original — brToggleDD */
function brToggleDD(id) {
    var btn  = document.getElementById(id + '-btn');
    var menu = document.getElementById(id + '-menu');
    var isOpen = menu.style.display === 'block';
    document.querySelectorAll('.br-dd-menu').forEach(function(m){ m.style.display = 'none'; });
    document.querySelectorAll('.br-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    if (!isOpen) { menu.style.display = 'block'; btn.classList.add('open'); }
}

/* Fungsi original — brSelectCat */
function brSelectCat(ddId, id, icon, name, bg, inputId) {
    document.querySelectorAll('#' + ddId + '-menu .br-dd-item').forEach(function(i){ i.classList.remove('active'); });
    event.currentTarget.classList.add('active');
    document.getElementById(ddId + '-sel').innerHTML =
        '<div class="br-dd-icon" style="background:' + bg + '">' + icon + '</div><span>' + name + '</span>';
    document.getElementById(inputId).value = id;
    brToggleDD(ddId);
}

/* Fungsi original — brSelectSat */
function brSelectSat(ddId, id, abbr, name, bg, color, inputId) {
    document.querySelectorAll('#' + ddId + '-menu .br-dd-item').forEach(function(i){ i.classList.remove('active'); });
    event.currentTarget.classList.add('active');
    document.getElementById(ddId + '-sel').innerHTML =
        '<div class="br-dd-icon br-dd-abbr" style="background:' + bg + ';color:' + color + ';border:1px solid ' + color + '40">' + abbr + '</div><span>' + name + '</span>';
    document.getElementById(inputId).value = id;
    brToggleDD(ddId);
}

/* Fungsi original — brSetEditDropdown */
function brSetEditDropdown(jenisId, jenisNama, satuanId, satuanNama) {
    var catMap = {
        'Elektronik':              {icon:'💻',bg:'#eff6ff'},
        'Peralatan Kantor':        {icon:'🗂️',bg:'#f0fdf4'},
        'Alat Tulis Kantor':       {icon:'✏️',bg:'#fefce8'},
        'Peralatan Olahraga':      {icon:'⚽',bg:'#fff7ed'},
        'Peralatan Kebersihan':    {icon:'🧹',bg:'#f0fdf4'},
        'Peralatan Multimedia':    {icon:'🎥',bg:'#fdf4ff'},
        'Peralatan Jaringan & IT': {icon:'🌐',bg:'#eff6ff'},
        'Peralatan Keamanan':      {icon:'🔒',bg:'#fef2f2'},
        'Perabotan':               {icon:'🛋️',bg:'#fafaf9'},
    };
    var satMap = {
        'Pcs':   {abbr:'pcs', bg:'#eff6ff',color:'#3b82f6'},
        'Set':   {abbr:'set', bg:'#fdf4ff',color:'#9333ea'},
        'Unit':  {abbr:'unit',bg:'#f0fdf4',color:'#16a34a'},
        'Buah':  {abbr:'bh',  bg:'#fff7ed',color:'#ea580c'},
        'Pak':   {abbr:'pak', bg:'#fefce8',color:'#ca8a04'},
        'Pack':  {abbr:'pak', bg:'#fefce8',color:'#ca8a04'},
        'Rim':   {abbr:'rim', bg:'#fef2f2',color:'#dc2626'},
        'Box':   {abbr:'box', bg:'#eff6ff',color:'#2563eb'},
        'Lusin': {abbr:'lsn', bg:'#f0fdf4',color:'#15803d'},
        'Lembar':{abbr:'lbr', bg:'#fdf4ff',color:'#7c3aed'},
        'Kg':    {abbr:'kg',  bg:'#fff7ed',color:'#b45309'},
        'Liter': {abbr:'ltr', bg:'#eff6ff',color:'#0369a1'},
        'Meter': {abbr:'mtr', bg:'#f0fdf4',color:'#065f46'},
        'Roll':  {abbr:'roll',bg:'#fef2f2',color:'#b91c1c'},
    };

    /* Set kategori */
    var cm = catMap[jenisNama] || {icon:'🏷️', bg:'#f3f4f6'};
    document.getElementById('cat-edit-sel').innerHTML =
        '<div class="br-dd-icon" style="background:' + cm.bg + '">' + cm.icon + '</div><span>' + jenisNama + '</span>';
    document.getElementById('edit_jenis_id').value = jenisId;
    document.querySelectorAll('#cat-edit-menu .br-dd-item').forEach(function(el){
        el.classList.toggle('active', parseInt(el.dataset.id) === parseInt(jenisId));
    });

    /* Set satuan */
    var sm = satMap[satuanNama] || {abbr: satuanNama.substring(0,3).toLowerCase(), bg:'#f3f4f6', color:'#6b7280'};
    document.getElementById('sat-edit-sel').innerHTML =
        '<div class="br-dd-icon br-dd-abbr" style="background:' + sm.bg + ';color:' + sm.color + ';border:1px solid ' + sm.color + '40">' + sm.abbr + '</div><span>' + satuanNama + '</span>';
    document.getElementById('edit_satuan_id').value = satuanId;
    document.querySelectorAll('#sat-edit-menu .br-dd-item').forEach(function(el){
        el.classList.toggle('active', parseInt(el.dataset.id) === parseInt(satuanId));
    });
}

/* Fungsi original — brPreviewImage (PASTIKAN SUDAH ADA) */
// Pastikan fungsi ini ada di bagian script utama page/index

/* Fungsi original — brCheckUniqueBarang (PASTIKAN SUDAH ADA) */
// Pastikan fungsi ini ada di bagian script utama page/index

/* Tutup semua dropdown saat klik di luar */
document.addEventListener('click', function(e) {
    if (!e.target.closest('.br-dd-container')) {
        document.querySelectorAll('.br-dd-menu').forEach(function(m){ m.style.display = 'none'; });
        document.querySelectorAll('.br-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    }
});
</script>