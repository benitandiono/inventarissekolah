<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit_barang">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2"></i> Edit Data Barang
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="barang_id">

                    <div class="row">

                        {{-- KOLOM KIRI — UPLOAD GAMBAR --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Gambar Barang</label>

                                <div id="edit-current-img-wrap" class="mb-2 text-center">
                                    <img id="edit_gambar_preview" src=""
                                         style="max-height:160px;border-radius:12px;border:2px solid #e2e8f0;box-shadow:0 4px 12px rgba(0,0,0,.08);"
                                         class="img-fluid">
                                    <div class="mt-1">
                                        <small class="text-muted">
                                            <i class="fas fa-image mr-1"></i> Gambar saat ini
                                        </small>
                                    </div>
                                </div>

                                <div class="br-upload-area" id="brEditUploadArea"
                                     onclick="document.getElementById('edit_gambar').click()">
                                    <i class="fas fa-cloud-upload-alt br-upload-icon"></i>
                                    <div class="br-upload-text">Klik untuk ganti gambar</div>
                                    <div class="br-upload-hint">JPG, JPEG, PNG &nbsp;·&nbsp; Maks. <strong>10 MB</strong></div>
                                </div>
                                <input type="file" class="d-none" name="gambar" id="edit_gambar"
                                       accept="image/jpg,image/jpeg,image/png"
                                       onchange="brPreviewImage('edit_gambar','edit-new-preview','br-edit-file-info','alert-edit-gambar','brEditUploadArea')">

                                <div id="br-edit-file-info" class="mt-2 d-none">
                                    <div class="d-flex align-items-center justify-content-between mb-1">
                                        <small id="br-edit-file-name" class="text-muted"
                                               style="max-width:60%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;"></small>
                                        <small id="br-edit-file-size-text" class="font-weight-bold"></small>
                                    </div>
                                    <div class="progress" style="height:7px;border-radius:99px;">
                                        <div id="br-edit-file-size-bar" class="progress-bar" role="progressbar"
                                             style="width:0%;border-radius:99px;transition:width .4s ease;"></div>
                                    </div>
                                    <div id="br-edit-file-size-hint" class="mt-1" style="font-size:11px;"></div>
                                </div>

                                <div class="alert alert-danger mt-2 d-none" id="alert-edit-gambar"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;" role="alert">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span id="alert-edit-gambar-text"></span>
                                </div>

                                <div id="edit-new-preview-wrap" class="mt-2 d-none text-center">
                                    <img id="edit-new-preview" class="img-fluid"
                                         style="max-height:160px;border-radius:12px;border:2px solid #86efac;box-shadow:0 4px 12px rgba(0,0,0,.08);">
                                    <div class="mt-1">
                                        <small class="text-success">
                                            <i class="fas fa-check-circle mr-1"></i> Gambar baru siap diganti
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN — FORM DATA --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="edit_nama_barang">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-edit-nama_barang"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                            {{-- ── KATEGORI BARANG (custom dropdown) ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Kategori Barang</label>
                                <input type="hidden" name="jenis_id" id="edit_jenis_id">

                                @php
                                $catMapEdit = [
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
                                @endphp

                                <div class="br-dd-container" id="cat-edit-container">
                                    <button type="button" class="br-dd-btn" id="cat-edit-btn"
                                            onclick="brToggleDD('cat-edit')">
                                        <div class="br-dd-sel" id="cat-edit-sel">
                                            <div class="br-dd-icon" style="background:#f3f4f6">🏷️</div>
                                            <span>Pilih Kategori</span>
                                        </div>
                                        <span class="br-dd-arrow">&#9660;</span>
                                    </button>
                                    <div class="br-dd-menu" id="cat-edit-menu">
                                        @foreach ($jenis_barangs as $jenis)
                                            @php
                                                $cm = $catMapEdit[$jenis->jenis_barang] ?? ['icon'=>'🏷️','bg'=>'#f3f4f6','desc'=>''];
                                            @endphp
                                            <div class="br-dd-item"
                                                 data-id="{{ $jenis->id }}"
                                                 onclick="brSelectCat('cat-edit',{{ $jenis->id }},'{{ $cm['icon'] }}','{{ $jenis->jenis_barang }}','{{ $cm['bg'] }}','edit_jenis_id')">
                                                <div class="br-dd-icon" style="background:{{ $cm['bg'] }}">{{ $cm['icon'] }}</div>
                                                <div>
                                                    <div class="br-dd-name">{{ $jenis->jenis_barang }}</div>
                                                    <div class="br-dd-desc">{{ $cm['desc'] }}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            {{-- ── SATUAN BARANG (custom dropdown) ── --}}
                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Satuan Barang</label>
                                <input type="hidden" name="satuan_id" id="edit_satuan_id">

                                @php
                                $satMapEdit = [
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
                                @endphp

                                <div class="br-dd-container" id="sat-edit-container">
                                    <button type="button" class="br-dd-btn" id="sat-edit-btn"
                                            onclick="brToggleDD('sat-edit')">
                                        <div class="br-dd-sel" id="sat-edit-sel">
                                            <div class="br-dd-icon br-dd-abbr"
                                                 style="background:#eff6ff;color:#3b82f6;border:1px solid #bfdbfe">-</div>
                                            <span>Pilih Satuan</span>
                                        </div>
                                        <span class="br-dd-arrow">&#9660;</span>
                                    </button>
                                    <div class="br-dd-menu" id="sat-edit-menu">
                                        @foreach ($satuans as $satuan)
                                            @php
                                                $sm = $satMapEdit[$satuan->satuan] ?? ['abbr'=>strtolower(substr($satuan->satuan,0,3)),'bg'=>'#f3f4f6','color'=>'#6b7280','desc'=>''];
                                            @endphp
                                            <div class="br-dd-item"
                                                 data-id="{{ $satuan->id }}"
                                                 onclick="brSelectSat('sat-edit',{{ $satuan->id }},'{{ $sm['abbr'] }}','{{ $satuan->satuan }}','{{ $sm['bg'] }}','{{ $sm['color'] }}','edit_satuan_id')">
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
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Minim.Stok</label>
                                <input type="number" class="form-control" name="stok_minimum" id="edit_stok_minimum" min="0">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-edit-stok_minimum"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold" style="font-size:13px">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="edit_deskripsi" rows="3"></textarea>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-edit-deskripsi"
                                     style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-whitesmoke">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                    <button type="button" class="btn btn-primary" id="update">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>