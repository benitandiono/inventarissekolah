<div class="modal fade" role="dialog" id="modal_tambah_barangMasuk">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Barang Masuk
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form enctype="multipart/form-data">
                <div class="modal-body" style="padding: 28px;">

                    <div class="row">

                        {{-- ── KOLOM KIRI ── --}}
                        <div class="col-md-6">

                            {{-- TANGGAL MASUK — PREMIUM DATE PICKER --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-calendar-alt mr-1" style="color:#2563eb;"></i> Tanggal Masuk
                                </label>

                                <div id="datepicker-wrap" style="background:#fff;border:1.5px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 2px 12px rgba(37,99,235,.08);transition:border-color .2s,box-shadow .2s;">
                                    <div style="background:linear-gradient(135deg,#1e40af,#2563eb);padding:14px 18px;display:flex;align-items:center;justify-content:space-between;">
                                        <button type="button" id="dp-prev" style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:8px;width:30px;height:30px;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .2s;font-size:13px;"
                                                onmouseover="this.style.background='rgba(255,255,255,.25)'"
                                                onmouseout="this.style.background='rgba(255,255,255,.15)'">
                                            <i class="fas fa-chevron-left"></i>
                                        </button>
                                        <div style="text-align:center;">
                                            <div id="dp-month-year" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:14px;font-weight:800;color:#fff;letter-spacing:-.2px;">Maret 2026</div>
                                            <div id="dp-selected-label" style="font-family:'Plus Jakarta Sans',sans-serif;font-size:11px;color:rgba(255,255,255,.7);margin-top:2px;">Pilih tanggal</div>
                                        </div>
                                        <button type="button" id="dp-next" style="background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.2);border-radius:8px;width:30px;height:30px;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background .2s;font-size:13px;"
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
                                        <div id="dp-days" style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;"></div>
                                    </div>
                                </div>

                                <input type="hidden" name="tanggal_masuk" id="tanggal_masuk">
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-tanggal_masuk"></div>
                            </div>

                            {{-- KODE BARANG --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-barcode mr-1" style="color:#2563eb;"></i> Kode Barang
                                </label>
                                <div style="position:relative;">
                                    <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" readonly
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border-radius:12px;border:1.5px solid #e2e8f0;padding:10px 16px 10px 42px;background:#f8fafc;color:#1e40af;">
                                    <i class="fas fa-barcode" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;"></i>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kode_transaksi"></div>
                            </div>

                            {{-- STOK SAAT INI --}}
                            <div class="form-group mb-0">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-warehouse mr-1" style="color:#2563eb;"></i> Stok Saat Ini
                                </label>
                                <div style="position:relative;">
                                    <input type="number" class="form-control" name="stok" id="stok" disabled
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border-radius:12px;border:1.5px solid #e2e8f0;padding:10px 16px 10px 42px;background:#f8fafc;color:#15803d;">
                                    <i class="fas fa-cubes" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:13px;"></i>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-stok"></div>
                            </div>

                        </div>

                        {{-- ── KOLOM KANAN ── --}}
                        <div class="col-md-6">

                            {{-- ══ PILIH BARANG — Custom Dropdown (tetap pakai select asli, disembunyikan) ══ --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-box mr-1" style="color:#2563eb;"></i> Pilih Barang
                                </label>

                                {{-- Select asli — tetap ada untuk trigger event change, hanya disembunyikan --}}
                                <select name="nama_barang" id="nama_barang" style="display:none !important; width:100%">
                                    <option value="">Pilih Barang</option>
                                    @foreach ($barangs as $barang)
                                        <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>

                                {{-- Tampilan custom dropdown --}}
                                <div class="bm-dd-container" id="barang-container">
                                    <button type="button" class="bm-dd-btn" id="barang-btn"
                                            onclick="bmToggle('barang')">
                                        <div class="bm-dd-sel" id="barang-sel">
                                            <div class="bm-dd-item-icon" style="background:#f1f5f9;">
                                                <i class="fas fa-box-open" style="color:#94a3b8;font-size:12px;"></i>
                                            </div>
                                            <span style="color:#94a3b8;font-style:italic;">Pilih Barang</span>
                                        </div>
                                        <i class="fas fa-chevron-down bm-dd-chevron" id="barang-chevron"></i>
                                    </button>
                                    <div class="bm-dd-menu" id="barang-menu">
                                        <div style="padding:8px 10px;border-bottom:1px solid #f1f5f9;">
                                            <div style="position:relative;">
                                                <input type="text" class="bm-dd-search" id="barang-search"
                                                       placeholder="Cari barang..."
                                                       oninput="bmFilter('barang')"
                                                       onclick="event.stopPropagation()">
                                                <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:11px;pointer-events:none;"></i>
                                            </div>
                                        </div>
                                        <div class="bm-dd-list" id="barang-list">
                                            @foreach ($barangs as $barang)
                                            <div class="bm-dd-item"
                                                 data-value="{{ $barang->nama_barang }}"
                                                 data-label="{{ $barang->nama_barang }}"
                                                 onclick="bmPickBarang(this)">
                                                <div class="bm-dd-item-icon" style="background:#eff6ff;">
                                                    <i class="fas fa-box" style="color:#3b82f6;font-size:11px;"></i>
                                                </div>
                                                <div style="flex:1;min-width:0;">
                                                    <div class="bm-dd-item-label">{{ $barang->nama_barang }}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama_barang"></div>
                            </div>

                            {{-- ══ SUPPLIER — Custom Dropdown ══ --}}
                            <div class="form-group mb-4">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-truck mr-1" style="color:#2563eb;"></i> Supplier
                                </label>

                                {{-- Select asli — tetap ada disembunyikan --}}
                                <select name="supplier_id" id="supplier_id" style="display:none !important;">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->supplier }}
                                        </option>
                                    @endforeach
                                </select>

                                {{-- Tampilan custom dropdown --}}
                                @php
                                    $supColors = [
                                        ['bg'=>'#eff6ff','color'=>'#3b82f6'],
                                        ['bg'=>'#f0fdf4','color'=>'#16a34a'],
                                        ['bg'=>'#fdf4ff','color'=>'#9333ea'],
                                        ['bg'=>'#fff7ed','color'=>'#ea580c'],
                                        ['bg'=>'#fefce8','color'=>'#ca8a04'],
                                        ['bg'=>'#fef2f2','color'=>'#dc2626'],
                                    ];
                                    $firstSup = $suppliers->first();
                                    $fsc = $supColors[0];
                                    $fInit = $firstSup ? strtoupper(substr($firstSup->supplier, 0, 2)) : 'SP';
                                @endphp

                                <div class="bm-dd-container" id="supplier-container">
                                    <button type="button" class="bm-dd-btn" id="supplier-btn"
                                            onclick="bmToggle('supplier')">
                                        <div class="bm-dd-sel" id="supplier-sel">
                                            <div class="bm-dd-item-icon bm-dd-initials"
                                                 style="background:{{ $fsc['bg'] }};color:{{ $fsc['color'] }};">
                                                {{ $fInit }}
                                            </div>
                                            <span>{{ $firstSup->supplier ?? 'Pilih Supplier' }}</span>
                                        </div>
                                        <i class="fas fa-chevron-down bm-dd-chevron" id="supplier-chevron"></i>
                                    </button>
                                    <div class="bm-dd-menu" id="supplier-menu">
                                        <div style="padding:8px 10px;border-bottom:1px solid #f1f5f9;">
                                            <div style="position:relative;">
                                                <input type="text" class="bm-dd-search" id="supplier-search"
                                                       placeholder="Cari supplier..."
                                                       oninput="bmFilter('supplier')"
                                                       onclick="event.stopPropagation()">
                                                <i class="fas fa-search" style="position:absolute;left:10px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:11px;pointer-events:none;"></i>
                                            </div>
                                        </div>
                                        <div class="bm-dd-list" id="supplier-list">
                                            @foreach ($suppliers as $index => $supplier)
                                            @php
                                                $sc = $supColors[$index % count($supColors)];
                                                $init = strtoupper(substr($supplier->supplier, 0, 2));
                                                $isFirst = $loop->first && !old('supplier_id');
                                                $isOld   = old('supplier_id') == $supplier->id;
                                            @endphp
                                            <div class="bm-dd-item {{ ($isFirst || $isOld) ? 'active' : '' }}"
                                                 data-value="{{ $supplier->id }}"
                                                 data-label="{{ $supplier->supplier }}"
                                                 data-bg="{{ $sc['bg'] }}"
                                                 data-color="{{ $sc['color'] }}"
                                                 data-initials="{{ $init }}"
                                                 onclick="bmPickSupplier(this)">
                                                <div class="bm-dd-item-icon bm-dd-initials"
                                                     style="background:{{ $sc['bg'] }};color:{{ $sc['color'] }};">
                                                    {{ $init }}
                                                </div>
                                                <div style="flex:1;min-width:0;">
                                                    <div class="bm-dd-item-label">{{ $supplier->supplier }}</div>
                                                </div>
                                                @if($isFirst || $isOld)
                                                <i class="fas fa-check" style="font-size:11px;color:#2563eb;"></i>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-supplier_id"></div>
                            </div>

                            {{-- JUMLAH MASUK --}}
                            <div class="form-group mb-0">
                                <label style="font-family:'Plus Jakarta Sans',sans-serif; font-size:12px; font-weight:700; color:#374151; text-transform:uppercase; letter-spacing:.6px; margin-bottom:8px; display:block;">
                                    <i class="fas fa-sort-numeric-up mr-1" style="color:#2563eb;"></i> Jumlah Masuk
                                </label>
                                <div class="input-group" style="border-radius:12px;overflow:hidden;border:1.5px solid #e2e8f0;box-shadow:0 2px 8px rgba(0,0,0,.04);">
                                    <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" min="0"
                                        style="font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:700;border:none;padding:10px 16px;color:#0f172a;box-shadow:none;outline:none;">
                                    <div class="input-group-append">
                                        <span style="display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,#eff6ff,#dbeafe);border-left:1px solid #e2e8f0;padding:0 16px;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:800;color:#1e40af;min-width:70px;">
                                            <input type="text" id="satuan_id" name="satuan" disabled
                                                style="background:transparent;border:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;font-weight:800;color:#1e40af;text-align:center;width:60px;outline:none;">
                                        </span>
                                    </div>
                                </div>
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah_masuk"></div>
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
     STYLE — Custom Dropdown
══════════════════════════════════════════ --}}
<style>
.bm-dd-container{position:relative;width:100%}
.bm-dd-btn{width:100%;padding:8px 12px;border:1.5px solid #e2e8f0;border-radius:12px;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:space-between;font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:600;color:#0f172a;transition:border-color .2s,box-shadow .2s;text-align:left;}
.bm-dd-btn:hover{border-color:#93c5fd;}
.bm-dd-btn.open{border-color:#2563eb;box-shadow:0 0 0 3px rgba(37,99,235,.12);}
.bm-dd-sel{display:flex;align-items:center;gap:9px;min-width:0;flex:1;}
.bm-dd-chevron{font-size:10px;color:#94a3b8;transition:transform .2s;flex-shrink:0;margin-left:8px;}
.bm-dd-btn.open .bm-dd-chevron{transform:rotate(180deg);}
.bm-dd-menu{display:none;position:absolute;top:calc(100% + 5px);left:0;right:0;background:#fff;border:1.5px solid #e2e8f0;border-radius:12px;overflow:hidden;z-index:1055;box-shadow:0 10px 30px rgba(0,0,0,.12);}
.bm-dd-search{width:100%;padding:7px 10px 7px 30px;border:1px solid #e2e8f0;border-radius:8px;font-family:'Plus Jakarta Sans',sans-serif;font-size:12px;color:#0f172a;outline:none;transition:border-color .2s;}
.bm-dd-search:focus{border-color:#3b82f6;}
.bm-dd-list{max-height:200px;overflow-y:auto;}
.bm-dd-list::-webkit-scrollbar{width:4px;}
.bm-dd-list::-webkit-scrollbar-thumb{background:#e2e8f0;border-radius:99px;}
.bm-dd-item{display:flex;align-items:center;gap:10px;padding:9px 12px;cursor:pointer;transition:background .15s;}
.bm-dd-item:hover{background:#f8fafc;}
.bm-dd-item.active{background:#eff6ff;}
.bm-dd-item.active .bm-dd-item-label{color:#1d4ed8;font-weight:700;}
.bm-dd-item-icon{width:28px;height:28px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.bm-dd-initials{font-size:10px;font-weight:800;letter-spacing:.02em;}
.bm-dd-item-label{font-family:'Plus Jakarta Sans',sans-serif;font-size:13px;font-weight:600;color:#0f172a;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
</style>


{{-- ══════════════════════════════════════════
     SCRIPT — Custom Dropdown
     (select asli tetap dipakai untuk trigger event, hanya visual yang diganti)
══════════════════════════════════════════ --}}
<script>
function bmToggle(id) {
    var btn  = document.getElementById(id + '-btn');
    var menu = document.getElementById(id + '-menu');
    var isOpen = menu.style.display === 'block';
    document.querySelectorAll('.bm-dd-menu').forEach(function(m){ m.style.display = 'none'; });
    document.querySelectorAll('.bm-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    if (!isOpen) {
        menu.style.display = 'block';
        btn.classList.add('open');
        var s = document.getElementById(id + '-search');
        if (s) setTimeout(function(){ s.focus(); }, 50);
    }
}

function bmFilter(id) {
    var query = document.getElementById(id + '-search').value.toLowerCase();
    document.querySelectorAll('#' + id + '-list .bm-dd-item').forEach(function(item) {
        var label = (item.dataset.label || '').toLowerCase();
        item.style.display = label.includes(query) ? 'flex' : 'none';
    });
}

function bmPickBarang(el) {
    var value = el.dataset.value;
    var label = el.dataset.label;

    {{-- Update SELECT asli — ini yang memicu event change & AJAX stok --}}
    var sel = document.getElementById('nama_barang');
    sel.value = value;
    $(sel).trigger('change'); {{-- trigger jQuery change agar AJAX stok terpanggil --}}

    {{-- Update tampilan tombol --}}
    document.getElementById('barang-sel').innerHTML =
        '<div class="bm-dd-item-icon" style="background:#eff6ff;">' +
        '<i class="fas fa-box" style="color:#3b82f6;font-size:11px;"></i></div>' +
        '<span style="color:#0f172a;">' + label + '</span>';

    document.querySelectorAll('#barang-list .bm-dd-item').forEach(function(i){ i.classList.remove('active'); });
    el.classList.add('active');
    bmToggle('barang');
}

function bmPickSupplier(el) {
    var id       = el.dataset.value;
    var label    = el.dataset.label;
    var bg       = el.dataset.bg;
    var color    = el.dataset.color;
    var initials = el.dataset.initials;

    {{-- Update SELECT asli --}}
    var sel = document.getElementById('supplier_id');
    sel.value = id;
    $(sel).trigger('change');

    {{-- Update tampilan tombol --}}
    document.getElementById('supplier-sel').innerHTML =
        '<div class="bm-dd-item-icon bm-dd-initials" style="background:' + bg + ';color:' + color + ';">' +
        initials + '</div><span>' + label + '</span>';

    document.querySelectorAll('#supplier-list .bm-dd-item').forEach(function(i){
        i.classList.remove('active');
        var chk = i.querySelector('.fas.fa-check');
        if (chk) chk.remove();
    });
    el.classList.add('active');
    el.querySelector('.bm-dd-item-label').insertAdjacentHTML('afterend',
        '<i class="fas fa-check" style="font-size:11px;color:#2563eb;margin-left:auto;"></i>');

    bmToggle('supplier');
}

{{-- Tutup dropdown saat klik di luar --}}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.bm-dd-container')) {
        document.querySelectorAll('.bm-dd-menu').forEach(function(m){ m.style.display = 'none'; });
        document.querySelectorAll('.bm-dd-btn').forEach(function(b){ b.classList.remove('open'); });
    }
});
</script>


{{-- ══════════════════════════════════════════
     CUSTOM DATE PICKER SCRIPT — tidak diubah
══════════════════════════════════════════ --}}
<script>
(function() {
    var BULAN = ['Januari','Februari','Maret','April','Mei','Juni',
                 'Juli','Agustus','September','Oktober','November','Desember'];

    var today     = new Date();
    var curYear   = today.getFullYear();
    var curMonth  = today.getMonth();
    var selDate   = null;

    selDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

    function pad(n) { return n < 10 ? '0' + n : n; }
    function formatDisplay(d) { return pad(d.getDate()) + ' ' + BULAN[d.getMonth()] + ' ' + d.getFullYear(); }
    function formatValue(d) { return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()); }

    function renderCalendar() {
        var label    = document.getElementById('dp-month-year');
        var selLabel = document.getElementById('dp-selected-label');
        var grid     = document.getElementById('dp-days');
        if (!label || !grid) return;

        label.textContent = BULAN[curMonth] + ' ' + curYear;
        selLabel.textContent = selDate ? formatDisplay(selDate) : 'Pilih tanggal';

        var hiddenInput = document.getElementById('tanggal_masuk');
        if (hiddenInput) hiddenInput.value = selDate ? formatValue(selDate) : '';

        grid.innerHTML = '';

        var firstDay = new Date(curYear, curMonth, 1).getDay();
        var daysInMonth = new Date(curYear, curMonth + 1, 0).getDate();

        for (var b = 0; b < firstDay; b++) {
            var blank = document.createElement('div');
            grid.appendChild(blank);
        }

        for (var d = 1; d <= daysInMonth; d++) {
            (function(day) {
                var isToday  = (day === today.getDate() && curMonth === today.getMonth() && curYear === today.getFullYear());
                var isSelect = selDate && (day === selDate.getDate() && curMonth === selDate.getMonth() && curYear === selDate.getFullYear());

                var btn = document.createElement('button');
                btn.type = 'button';
                btn.textContent = day;

                var baseStyle = [
                    'width:100%', 'aspect-ratio:1', 'border:none', 'border-radius:8px',
                    'font-family:Plus Jakarta Sans,sans-serif', 'font-size:12px', 'font-weight:700',
                    'cursor:pointer', 'transition:all .15s ease', 'display:flex',
                    'align-items:center', 'justify-content:center', 'line-height:1'
                ];

                if (isSelect) {
                    baseStyle.push('background:linear-gradient(135deg,#2563eb,#1d4ed8)', 'color:#fff', 'box-shadow:0 4px 10px rgba(37,99,235,.35)');
                } else if (isToday) {
                    baseStyle.push('background:#eff6ff', 'color:#2563eb', 'border:1.5px solid #bfdbfe');
                } else {
                    baseStyle.push('background:transparent', 'color:#374151');
                }

                btn.style.cssText = baseStyle.join(';');

                btn.addEventListener('mouseenter', function() {
                    if (!isSelect) { this.style.background = '#eff6ff'; this.style.color = '#2563eb'; }
                });
                btn.addEventListener('mouseleave', function() {
                    if (!isSelect) {
                        this.style.background = isToday ? '#eff6ff' : 'transparent';
                        this.style.color = isToday ? '#2563eb' : '#374151';
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
        if (e.target.closest('#dp-prev')) {
            curMonth--; if (curMonth < 0) { curMonth = 11; curYear--; } renderCalendar();
        }
        if (e.target.closest('#dp-next')) {
            curMonth++; if (curMonth > 11) { curMonth = 0; curYear++; } renderCalendar();
        }
    });

    $('#modal_tambah_barangMasuk').on('show.bs.modal', function() {
        var t = new Date();
        curYear = t.getFullYear(); curMonth = t.getMonth();
        selDate = new Date(t.getFullYear(), t.getMonth(), t.getDate());
        setTimeout(renderCalendar, 50);
    });

    $(document).ready(function() { renderCalendar(); });
})();
</script>