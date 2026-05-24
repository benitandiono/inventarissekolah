<div class="modal fade" role="dialog" id="modal_tambah_barangKeluar">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Barang Keluar
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data">
                <div class="modal-body" style="padding:28px;">
                    <div class="row">

                        {{-- ── KOLOM KIRI ── --}}
                        <div class="col-md-6">

                            {{-- TANGGAL KELUAR --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-calendar-alt mr-1" style="color:#2563eb;"></i> Tanggal Keluar
                                </label>
                                <div id="datepicker-keluar-wrap" style="background:#fff;border:1.5px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 2px 12px rgba(37,99,235,.08);">
                                    <div style="background:linear-gradient(135deg,#1e40af,#2563eb);padding:14px 18px;display:flex;align-items:center;justify-content:space-between;">
                                        <button type="button" id="dpk-prev" style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:8px;width:30px;height:30px;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:13px;"
                                                onmouseover="this.style.background='rgba(255,255,255,.25)'"
                                                onmouseout="this.style.background='rgba(255,255,255,.15)'">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <div style="text-align:center;">
                                            <div id="dpk-month-year" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;color:#fff;"></div>
                                            <div id="dpk-selected-label" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:rgba(255,255,255,.7);margin-top:2px;">Pilih tanggal</div>
                                        </div>
                                        <button type="button" id="dpk-next" style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:8px;width:30px;height:30px;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:13px;"
                                                onmouseover="this.style.background='rgba(255,255,255,.25)'"
                                                onmouseout="this.style.background='rgba(255,255,255,.15)'">
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </div>
                                    <div style="padding:12px 14px 14px;">
                                        <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;margin-bottom:6px;">
                                            @foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $hari)
                                            <div style="text-align:center;font-family:'Plus Jakarta Sans',sans-serif;font-size:10px;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.4px;padding:4px 0;">{{ $hari }}</div>
                                            @endforeach
                                        </div>
                                        <div id="dpk-days" style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="tanggal_keluar" id="tanggal_keluar">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_keluar" style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                            {{-- KODE TRANSAKSI --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-barcode mr-1" style="color:#2563eb;"></i> Kode Transaksi
                                </label>
                                <div style="position:relative;">
                                    <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" readonly
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border-radius:12px;border:1.5px solid #e2e8f0;padding:10px 16px 10px 42px;background:#f8fafc;color:#1e40af;">
                                    <i class="fas fa-barcode" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;"></i>
                                </div>
                            </div>

                            {{-- STOK SAAT INI --}}
                            <div class="form-group mb-3">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-warehouse mr-1" style="color:#2563eb;"></i> Stok Saat Ini
                                </label>
                                <div style="position:relative;">
                                    <input type="number" class="form-control" id="stok" disabled
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border-radius:12px;border:1.5px solid #e2e8f0;padding:10px 16px 10px 42px;background:#f8fafc;color:#15803d;">
                                    <i class="fas fa-cubes" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;"></i>
                                </div>
                            </div>

                            {{-- ══ INFO STOK MINIMUM (tampil setelah barang dipilih) ══ --}}
                            <div id="stok-info-panel" class="d-none">

                                {{-- Batas Minimum --}}
                                <div style="background:#fffbeb;border:1px solid #fcd34d;border-radius:10px;padding:10px 14px;margin-bottom:8px;">
                                    <div style="display:flex;align-items:center;justify-content:space-between;">
                                        <div style="display:flex;align-items:center;gap:8px;">
                                            <i class="fas fa-shield-alt" style="color:#d97706;font-size:12px;"></i>
                                            <span style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#92400e;">Stok Minimum Wajib</span>
                                        </div>
                                        <span id="info-stok-minimum" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;color:#b45309;background:#fef3c7;border-radius:6px;padding:2px 10px;">0</span>
                                    </div>
                                    <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:#92400e;margin-top:4px;">
                                        Stok tidak boleh turun di bawah angka ini
                                    </div>
                                </div>

                                {{-- Maksimal Keluar --}}
                                <div id="max-keluar-panel" style="border-radius:10px;padding:10px 14px;">
                                    <div style="display:flex;align-items:center;justify-content:space-between;">
                                        <div style="display:flex;align-items:center;gap:8px;">
                                            <i class="fas fa-arrow-circle-up" style="font-size:12px;"></i>
                                            <span id="max-keluar-label" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;"></span>
                                        </div>
                                        <span id="info-max-keluar" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;border-radius:6px;padding:2px 10px;">0</span>
                                    </div>
                                    <div id="max-keluar-sub" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;margin-top:4px;"></div>
                                </div>

                            </div>

                        </div>

                        {{-- ── KOLOM KANAN ── --}}
                        <div class="col-md-6">

                            {{-- ══ PILIH BARANG ══ --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-box mr-1" style="color:#2563eb;"></i> Pilih Barang
                                </label>

                                <select name="nama_barang" id="nama_barang" style="display:none !important;width:100%">
                                    <option value="">Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>

                                <div class="bk-dd-container" id="barang-keluar-container">
                                    <button type="button" class="bk-dd-btn" id="barang-keluar-btn" onclick="bkToggle('barang-keluar')">
                                        <div class="bk-dd-sel" id="barang-keluar-sel">
                                            <div class="bk-dd-item-icon" style="background:#f1f5f9;">
                                                <i class="fas fa-box-open" style="color:#94a3b8;font-size:12px;"></i>
                                            </div>
                                            <span style="color:#94a3b8;font-style:italic;">Pilih Barang</span>
                                        </div>
                                        <i class="fas fa-chevron-down bk-dd-chevron" id="barang-keluar-chevron"></i>
                                    </button>
                                    <div class="bk-dd-menu" id="barang-keluar-menu">
                                        <div style="padding:8px 10px;border-bottom:1px solid #f1f5f9;">
                                            <div style="position:relative;">
                                                <input type="text" class="bk-dd-search" id="barang-keluar-search"
                                                       placeholder="Cari barang..."
                                                       oninput="bkFilter('barang-keluar')"
                                                       onclick="event.stopPropagation()">
                                                <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:11px;pointer-events:none;"></i>
                                            </div>
                                        </div>
                                        <div class="bk-dd-list" id="barang-keluar-list">
                                            @foreach ($barangs as $barang)
                                            <div class="bk-dd-item"
                                                 data-value="{{ $barang->nama_barang }}"
                                                 data-label="{{ $barang->nama_barang }}"
                                                 onclick="bkPickBarang(this)">
                                                <div class="bk-dd-item-icon" style="background:#eff6ff;">
                                                    <i class="fas fa-box" style="color:#3b82f6;font-size:11px;"></i>
                                                </div>
                                                <div style="flex:1;min-width:0;">
                                                    <div class="bk-dd-item-label">{{ $barang->nama_barang }}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_barang" style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                            {{-- ══ GURU & TENDIK ══ --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-user-tie mr-1" style="color:#2563eb;"></i> Guru &amp; Tendik
                                </label>

                                <select name="customer_id" id="customer_id" style="display:none !important;">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                            {{ $customer->customer }}
                                        </option>
                                    @endforeach
                                </select>

                                @php
                                    $cusColors = [
                                        ['bg'=>'#eff6ff','color'=>'#3b82f6'],
                                        ['bg'=>'#f0fdf4','color'=>'#16a34a'],
                                        ['bg'=>'#fdf4ff','color'=>'#9333ea'],
                                        ['bg'=>'#fff7ed','color'=>'#ea580c'],
                                        ['bg'=>'#fefce8','color'=>'#ca8a04'],
                                        ['bg'=>'#fef2f2','color'=>'#dc2626'],
                                    ];
                                    $firstCus  = $customers->first();
                                    $fcc       = $cusColors[0];
                                    $fCusInit  = $firstCus ? strtoupper(substr($firstCus->customer, 0, 2)) : 'GT';
                                @endphp

                                <div class="bk-dd-container" id="customer-keluar-container">
                                    <button type="button" class="bk-dd-btn" id="customer-keluar-btn" onclick="bkToggle('customer-keluar')">
                                        <div class="bk-dd-sel" id="customer-keluar-sel">
                                            <div class="bk-dd-item-icon bk-dd-initials"
                                                 style="background:{{ $fcc['bg'] }};color:{{ $fcc['color'] }};">
                                                {{ $fCusInit }}
                                            </div>
                                            <span>{{ $firstCus->customer ?? 'Pilih Guru & Tendik' }}</span>
                                        </div>
                                        <i class="fas fa-chevron-down bk-dd-chevron" id="customer-keluar-chevron"></i>
                                    </button>
                                    <div class="bk-dd-menu" id="customer-keluar-menu">
                                        <div style="padding:8px 10px;border-bottom:1px solid #f1f5f9;">
                                            <div style="position:relative;">
                                                <input type="text" class="bk-dd-search" id="customer-keluar-search"
                                                       placeholder="Cari nama..."
                                                       oninput="bkFilter('customer-keluar')"
                                                       onclick="event.stopPropagation()">
                                                <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:11px;pointer-events:none;"></i>
                                            </div>
                                        </div>
                                        <div class="bk-dd-list" id="customer-keluar-list">
                                            @foreach ($customers as $index => $customer)
                                            @php
                                                $cc     = $cusColors[$index % count($cusColors)];
                                                $cinit  = strtoupper(substr($customer->customer, 0, 2));
                                                $isFirst = $loop->first && !old('customer_id');
                                                $isOld   = old('customer_id') == $customer->id;
                                            @endphp
                                            <div class="bk-dd-item {{ ($isFirst || $isOld) ? 'active' : '' }}"
                                                 data-value="{{ $customer->id }}"
                                                 data-label="{{ $customer->customer }}"
                                                 data-bg="{{ $cc['bg'] }}"
                                                 data-color="{{ $cc['color'] }}"
                                                 data-initials="{{ $cinit }}"
                                                 onclick="bkPickCustomer(this)">
                                                <div class="bk-dd-item-icon bk-dd-initials"
                                                     style="background:{{ $cc['bg'] }};color:{{ $cc['color'] }};">
                                                    {{ $cinit }}
                                                </div>
                                                <div style="flex:1;min-width:0;">
                                                    <div class="bk-dd-item-label">{{ $customer->customer }}</div>
                                                </div>
                                                @if($isFirst || $isOld)
                                                <i class="fas fa-check" style="font-size:11px;color:#2563eb;"></i>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-customer_id" style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                            {{-- JUMLAH KELUAR --}}
                            <div class="form-group mb-0">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#374151;text-transform:uppercase;letter-spacing:.6px;margin-bottom:8px;display:block;">
                                    <i class="fas fa-sort-numeric-up mr-1" style="color:#2563eb;"></i> Jumlah Keluar
                                </label>
                                <div class="input-group" id="jumlah-keluar-wrap" style="border-radius:12px;overflow:hidden;border:1.5px solid #e2e8f0;box-shadow:0 2px 8px rgba(0,0,0,.04);">
                                    <input type="number" class="form-control" name="jumlah_keluar" id="jumlah_keluar"
                                           min="1" value=""
                                           oninput="bkValidasiJumlah(this)"
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border:none;padding:10px 16px;color:#0f172a;box-shadow:none;outline:none;">
                                    <div class="input-group-append">
                                        <span style="display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#eff6ff,#dbeafe);border-left:1px solid #e2e8f0;padding:0 16px;min-width:70px;">
                                            <input type="text" id="satuan_id" name="satuan" disabled
                                                style="background:transparent;border:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:800;color:#1e40af;text-align:center;width:60px;outline:none;">
                                        </span>
                                    </div>
                                </div>

                                {{-- VALIDASI REAL-TIME --}}
                                <div id="jumlah-keluar-feedback" class="mt-2 d-none">
                                    <div id="jumlah-keluar-ok"    class="d-none" style="display:flex;align-items:center;gap:6px;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#15803d;padding:8px 12px;background:#f0fdf4;border:1px solid #86efac;border-radius:8px;">
                                        <i class="fas fa-check-circle"></i>
                                        <span id="jumlah-ok-text">Jumlah valid</span>
                                    </div>
                                    <div id="jumlah-keluar-err"   class="d-none" style="display:flex;align-items:center;gap:6px;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:700;color:#b91c1c;padding:8px 12px;background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;">
                                        <i class="fas fa-times-circle"></i>
                                        <span id="jumlah-err-text">Melebihi batas</span>
                                    </div>
                                </div>

                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah_keluar" style="border-radius:10px;font-size:13px;padding:10px 14px;"></div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="justify-content:flex-end;gap:10px;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:10px;padding:9px 22px;font-size:13px;">
                        <i class="fas fa-times mr-1"></i> Keluar
                    </button>
                    <button type="button" class="btn btn-primary" id="store"
                        style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:700;border-radius:10px;padding:9px 22px;font-size:13px;background:linear-gradient(135deg,#2563eb,#1d4ed8);border:none;box-shadow:0 4px 12px rgba(37,99,235,.3);">
                        <i class="fas fa-save mr-1"></i> Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- ══════════════════════════════════════════
     STYLE
══════════════════════════════════════════ --}}
<style>
.bk-dd-container{position:relative;width:100%}
.bk-dd-btn{width:100%;padding:8px 12px;border:1.5px solid #e2e8f0;border-radius:12px;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:space-between;font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:600;color:#0f172a;transition:border-color .2s,box-shadow .2s;text-align:left;}
.bk-dd-btn:hover{border-color:#93c5fd;}
.bk-dd-btn.open{border-color:#2563eb;box-shadow:0 0 0 3px rgba(37,99,235,.12);}
.bk-dd-sel{display:flex;align-items:center;gap:9px;min-width:0;flex:1;}
.bk-dd-chevron{font-size:10px;color:#94a3b8;transition:transform .2s;flex-shrink:0;margin-left:8px;}
.bk-dd-btn.open .bk-dd-chevron{transform:rotate(180deg);}
.bk-dd-menu{display:none;position:absolute;top:calc(100% + 5px);left:0;right:0;background:#fff;border:1.5px solid #e2e8f0;border-radius:12px;overflow:hidden;z-index:1055;box-shadow:0 10px 30px rgba(0,0,0,.12);}
.bk-dd-search{width:100%;padding:7px 10px 7px 30px;border:1px solid #e2e8f0;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;color:#0f172a;outline:none;transition:border-color .2s;}
.bk-dd-search:focus{border-color:#3b82f6;}
.bk-dd-list{max-height:200px;overflow-y:auto;}
.bk-dd-list::-webkit-scrollbar{width:4px;}
.bk-dd-list::-webkit-scrollbar-thumb{background:#e2e8f0;border-radius:99px;}
.bk-dd-item{display:flex;align-items:center;gap:10px;padding:9px 12px;cursor:pointer;transition:background .15s;}
.bk-dd-item:hover{background:#f8fafc;}
.bk-dd-item.active{background:#eff6ff;}
.bk-dd-item.active .bk-dd-item-label{color:#1d4ed8;font-weight:700;}
.bk-dd-item-icon{width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.bk-dd-initials{font-size:10px;font-weight:800;letter-spacing:.02em;}
.bk-dd-item-label{font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:600;color:#0f172a;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
</style>


{{-- ══════════════════════════════════════════
     SCRIPT — Dropdown, Stok Info, Validasi Real-time
══════════════════════════════════════════ --}}
<script>
/* ─── STATE STOK BARANG YANG DIPILIH ─── */
var bkStokData = {
    stok        : 0,
    stok_minimum: 0,
    max_keluar  : 0
};

/* ─── UPDATE INFO PANEL STOK MINIMUM ─── */
function bkUpdateStokPanel(data) {
    bkStokData = {
        stok        : parseInt(data.stok)         || 0,
        stok_minimum: parseInt(data.stok_minimum) || 0,
        max_keluar  : parseInt(data.max_keluar)   || 0
    };

    /* Tampilkan stok di input */
    $('#stok').val(bkStokData.stok);

    /* Tampilkan panel info */
    $('#stok-info-panel').removeClass('d-none');
    $('#info-stok-minimum').text(bkStokData.stok_minimum);
    $('#info-max-keluar').text(bkStokData.max_keluar);

    var maxPanel   = document.getElementById('max-keluar-panel');
    var maxLabel   = document.getElementById('max-keluar-label');
    var maxBadge   = document.getElementById('info-max-keluar');
    var maxSub     = document.getElementById('max-keluar-sub');

    if (bkStokData.max_keluar === 0) {
        /* Stok sudah di batas minimum — tidak bisa keluar */
        maxPanel.style.background   = '#fef2f2';
        maxPanel.style.border       = '1px solid #fca5a5';
        maxLabel.style.color        = '#b91c1c';
        maxLabel.innerHTML          = '<i class="fas fa-ban mr-1"></i> Tidak Bisa Dikeluarkan';
        maxBadge.style.background   = '#fee2e2';
        maxBadge.style.color        = '#dc2626';
        maxBadge.textContent        = '0';
        maxSub.style.color          = '#b91c1c';
        maxSub.textContent          = 'Stok sudah berada di batas minimum, tidak dapat dikeluarkan.';

        /* Disable input jumlah */
        $('#jumlah_keluar').prop('disabled', true).val('');
        $('#jumlah-keluar-wrap').css('opacity', '.5');

    } else {
        /* Masih ada stok yang bisa dikeluarkan */
        maxPanel.style.background   = '#f0fdf4';
        maxPanel.style.border       = '1px solid #86efac';
        maxLabel.style.color        = '#15803d';
        maxLabel.innerHTML          = '<i class="fas fa-check-circle mr-1"></i> Maksimal Bisa Keluar';
        maxBadge.style.background   = '#dcfce7';
        maxBadge.style.color        = '#15803d';
        maxBadge.textContent        = bkStokData.max_keluar;
        maxSub.style.color          = '#15803d';
        maxSub.textContent          = 'Rumus: Stok (' + bkStokData.stok + ') \u2212 Min (' + bkStokData.stok_minimum + ') = ' + bkStokData.max_keluar;

        /* Enable input jumlah */
        $('#jumlah_keluar').prop('disabled', false).val('').attr('max', bkStokData.max_keluar);
        $('#jumlah-keluar-wrap').css('opacity', '1');
    }

    /* Reset feedback jumlah */
    $('#jumlah-keluar-feedback').addClass('d-none');
    $('#jumlah-keluar-ok, #jumlah-keluar-err').addClass('d-none');
}

/* ─── VALIDASI INPUT JUMLAH REAL-TIME ─── */
function bkValidasiJumlah(input) {
    var val = parseInt(input.value) || 0;

    if (val <= 0 || input.value === '') {
        $('#jumlah-keluar-feedback').addClass('d-none');
        $('#jumlah-keluar-ok, #jumlah-keluar-err').addClass('d-none');
        $('#jumlah-keluar-wrap').css('border-color', '#e2e8f0');
        return;
    }

    $('#jumlah-keluar-feedback').removeClass('d-none');

    if (val > bkStokData.max_keluar) {
        /* INVALID */
        $('#jumlah-keluar-ok').addClass('d-none');
        $('#jumlah-keluar-err').removeClass('d-none');
        $('#jumlah-err-text').text(
            'Melebihi batas! Maksimal ' + bkStokData.max_keluar + ' ' +
            (bkStokData.max_keluar === 0 ? '(stok di batas minimum)' : '')
        );
        $('#jumlah-keluar-wrap').css('border-color', '#f87171');

    } else {
        /* VALID */
        $('#jumlah-keluar-err').addClass('d-none');
        $('#jumlah-keluar-ok').removeClass('d-none');
        var sisaSetelah = bkStokData.stok - val;
        $('#jumlah-ok-text').text(
            'OK! Stok setelah keluar: ' + sisaSetelah +
            ' (min: ' + bkStokData.stok_minimum + ')'
        );
        $('#jumlah-keluar-wrap').css('border-color', '#4ade80');
    }
}

/* ─── DROPDOWN TOGGLE ─── */
function bkToggle(id) {
    var btn    = document.getElementById(id + '-btn');
    var menu   = document.getElementById(id + '-menu');
    var isOpen = menu.style.display === 'block';
    document.querySelectorAll('.bk-dd-menu').forEach(function(m){ m.style.display = 'none'; });
    document.querySelectorAll('.bk-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    if (!isOpen) {
        menu.style.display = 'block';
        btn.classList.add('open');
        var s = document.getElementById(id + '-search');
        if (s) setTimeout(function(){ s.focus(); }, 50);
    }
}

function bkFilter(id) {
    var query = document.getElementById(id + '-search').value.toLowerCase();
    document.querySelectorAll('#' + id + '-list .bk-dd-item').forEach(function(item) {
        item.style.display = (item.dataset.label || '').toLowerCase().includes(query) ? 'flex' : 'none';
    });
}

/* ─── PILIH BARANG — TRIGGER AJAX STOK ─── */
function bkPickBarang(el) {
    var value = el.dataset.value;
    var label = el.dataset.label;

    /* Update select asli */
    var sel = document.getElementById('nama_barang');
    sel.value = value;

    /* Update tampilan tombol */
    document.getElementById('barang-keluar-sel').innerHTML =
        '<div class="bk-dd-item-icon" style="background:#eff6ff;">' +
        '<i class="fas fa-box" style="color:#3b82f6;font-size:11px;"></i></div>' +
        '<span style="color:#0f172a;">' + label + '</span>';

    document.querySelectorAll('#barang-keluar-list .bk-dd-item').forEach(function(i){ i.classList.remove('active'); });
    el.classList.add('active');
    bkToggle('barang-keluar');

    /* ── AJAX: Ambil stok, stok_minimum, max_keluar ── */
    $('#stok-info-panel').addClass('d-none');
    $('#stok').val('');
    $('#jumlah_keluar').val('').prop('disabled', false);
    $('#jumlah-keluar-feedback').addClass('d-none');
    $('#jumlah-keluar-ok, #jumlah-keluar-err').addClass('d-none');

    $.ajax({
        url: '{{ url("api/barang-keluar") }}',
        type: 'GET',
        data: { nama_barang: value },
        success: function(response) {
            if (response) {
                bkUpdateStokPanel(response);

                /* Ambil nama satuan */
                $.getJSON('{{ url("api/satuan") }}', function(satuans) {
                    var satuan = satuans.find(function(s) { return s.id === response.satuan_id; });
                    $('#satuan_id').val(satuan ? satuan.satuan : '');
                });
            }
        },
        error: function() {
            $('#stok-info-panel').addClass('d-none');
        }
    });
}

/* ─── PILIH CUSTOMER ─── */
function bkPickCustomer(el) {
    var id       = el.dataset.value;
    var label    = el.dataset.label;
    var bg       = el.dataset.bg;
    var color    = el.dataset.color;
    var initials = el.dataset.initials;

    document.getElementById('customer_id').value = id;
    document.getElementById('customer-keluar-sel').innerHTML =
        '<div class="bk-dd-item-icon bk-dd-initials" style="background:' + bg + ';color:' + color + ';">' +
        initials + '</div><span>' + label + '</span>';

    document.querySelectorAll('#customer-keluar-list .bk-dd-item').forEach(function(i){
        i.classList.remove('active');
        var chk = i.querySelector('.fas.fa-check');
        if (chk) chk.remove();
    });
    el.classList.add('active');
    el.querySelector('.bk-dd-item-label').insertAdjacentHTML('afterend',
        '<i class="fas fa-check" style="font-size:11px;color:#2563eb;margin-left:auto;"></i>');

    bkToggle('customer-keluar');
}

/* ─── TUTUP DROPDOWN KLIK LUAR ─── */
document.addEventListener('click', function(e) {
    if (!e.target.closest('.bk-dd-container')) {
        document.querySelectorAll('.bk-dd-menu').forEach(function(m){ m.style.display = 'none'; });
        document.querySelectorAll('.bk-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    }
});

/* ─── RESET MODAL SAAT DITUTUP ─── */
$('#modal_tambah_barangKeluar').on('hidden.bs.modal', function() {
    bkStokData = { stok: 0, stok_minimum: 0, max_keluar: 0 };
    $('#stok-info-panel').addClass('d-none');
    $('#stok').val('');
    $('#jumlah_keluar').val('').prop('disabled', false).removeAttr('max');
    $('#satuan_id').val('');
    $('#jumlah-keluar-feedback').addClass('d-none');
    $('#jumlah-keluar-ok, #jumlah-keluar-err').addClass('d-none');
    $('#jumlah-keluar-wrap').css('border-color', '#e2e8f0');
    $('#barang-keluar-sel').html(
        '<div class="bk-dd-item-icon" style="background:#f1f5f9;">' +
        '<i class="fas fa-box-open" style="color:#94a3b8;font-size:12px;"></i></div>' +
        '<span style="color:#94a3b8;font-style:italic;">Pilih Barang</span>'
    );
    document.querySelectorAll('#barang-keluar-list .bk-dd-item').forEach(function(i){ i.classList.remove('active'); });
    $('.alert-danger').addClass('d-none').html('');
});
</script>


{{-- ══════════════════════════════════════════
     CUSTOM DATE PICKER
══════════════════════════════════════════ --}}
<script>
(function() {
    var BULAN = ['Januari','Februari','Maret','April','Mei','Juni',
                 'Juli','Agustus','September','Oktober','November','Desember'];

    var today    = new Date();
    var curYear  = today.getFullYear();
    var curMonth = today.getMonth();
    var selDate  = new Date(today.getFullYear(), today.getMonth(), today.getDate());

    function pad(n) { return n < 10 ? '0' + n : n; }
    function formatDisplay(d) { return pad(d.getDate()) + ' ' + BULAN[d.getMonth()] + ' ' + d.getFullYear(); }
    function formatValue(d)   { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

    function renderCalendar() {
        var label    = document.getElementById('dpk-month-year');
        var selLabel = document.getElementById('dpk-selected-label');
        var grid     = document.getElementById('dpk-days');
        if (!label || !grid) return;

        label.textContent    = BULAN[curMonth] + ' ' + curYear;
        selLabel.textContent = selDate ? formatDisplay(selDate) : 'Pilih tanggal';

        var hidden = document.getElementById('tanggal_keluar');
        if (hidden) hidden.value = selDate ? formatValue(selDate) : '';

        grid.innerHTML = '';
        var firstDay    = new Date(curYear, curMonth, 1).getDay();
        var daysInMonth = new Date(curYear, curMonth + 1, 0).getDate();

        for (var b = 0; b < firstDay; b++) grid.appendChild(document.createElement('div'));

        for (var d = 1; d <= daysInMonth; d++) {
            (function(day) {
                var isToday  = (day === today.getDate() && curMonth === today.getMonth() && curYear === today.getFullYear());
                var isSelect = selDate && (day === selDate.getDate() && curMonth === selDate.getMonth() && curYear === selDate.getFullYear());

                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = day;

                var s = ['width:100%','aspect-ratio:1','border:none','border-radius:8px',
                         'font-family:Plus Jakarta Sans,sans-serif','font-size:12px','font-weight:700',
                         'cursor:pointer','transition:all .15s ease','display:flex',
                         'align-items:center','justify-content:center','line-height:1'];

                if (isSelect)     s.push('background:linear-gradient(135deg,#2563eb,#1d4ed8)','color:#fff','box-shadow:0 4px 10px rgba(37,99,235,.35)');
                else if (isToday) s.push('background:#eff6ff','color:#2563eb','border:1.5px solid #bfdbfe');
                else              s.push('background:transparent','color:#374151');

                btn.style.cssText = s.join(';');
                btn.addEventListener('mouseenter', function() { if (!isSelect) { this.style.background='#eff6ff'; this.style.color='#2563eb'; } });
                btn.addEventListener('mouseleave', function() {
                    if (!isSelect) {
                        this.style.background = isToday ? '#eff6ff' : 'transparent';
                        this.style.color      = isToday ? '#2563eb' : '#374151';
                        if (!isToday) this.style.border = 'none';
                    }
                });
                btn.addEventListener('click', function() {
                    selDate = new Date(curYear, curMonth, day);
                    renderCalendar();
                });
                grid.appendChild(btn);
            })(d);
        }
    }

    document.addEventListener('click', function(e) {
        if (e.target.closest('#dpk-prev')) { curMonth--; if (curMonth < 0)  { curMonth=11; curYear--; } renderCalendar(); }
        if (e.target.closest('#dpk-next')) { curMonth++; if (curMonth > 11) { curMonth=0;  curYear++; } renderCalendar(); }
    });

    $('#modal_tambah_barangKeluar').on('show.bs.modal', function() {
        var t = new Date();
        curYear = t.getFullYear(); curMonth = t.getMonth();
        selDate = new Date(t.getFullYear(), t.getMonth(), t.getDate());
        setTimeout(renderCalendar, 50);
    });

    $(document).ready(function() { renderCalendar(); });
})();
</script>