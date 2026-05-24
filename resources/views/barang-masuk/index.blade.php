@extends('layouts.app')

@include('barang-masuk.create')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
.ct-wrap {
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 4px 2px;
    animation: ctFadeIn .45s ease both;
}

@keyframes ctFadeIn {
    from { opacity:0; transform:translateY(12px); }
    to   { opacity:1; transform:translateY(0); }
}

.ct-header {
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

.ct-header::before {
    content: '';
    position: absolute;
    top: -50px; right: -50px;
    width: 220px; height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.06);
    pointer-events: none;
}

.ct-header::after {
    content: '';
    position: absolute;
    bottom: -70px; left: 30%;
    width: 180px; height: 180px;
    border-radius: 50%;
    background: rgba(255,255,255,.04);
    pointer-events: none;
}

.ct-header-left { position: relative; z-index: 1; }

.ct-header-eyebrow {
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

.ct-header-eyebrow i { font-size: 9px; color: #93c5fd; }

.ct-header h1 {
    font-size: 22px;
    font-weight: 800;
    color: #fff;
    margin: 0;
    letter-spacing: -.3px;
}

.ct-header-sub {
    font-size: 13px;
    color: rgba(255,255,255,.65);
    margin-top: 4px;
}

.ct-header-right {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.ct-stat-pill {
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 14px;
    padding: 10px 24px;
    text-align: center;
    backdrop-filter: blur(8px);
    min-width: 90px;
}
.ct-stat-pill .ctn { font-size: 22px; font-weight: 800; color: #fff; line-height: 1; }
.ct-stat-pill .ctl { font-size: 10px; font-weight: 700; color: rgba(255,255,255,.6); text-transform: uppercase; letter-spacing: .5px; margin-top: 2px; }

.btn-add-customer {
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

.btn-add-customer:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 28px rgba(0,0,0,.18);
    color: #1d4ed8;
    text-decoration: none;
}

.ct-toolbar {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.ct-search-wrap {
    position: relative;
    flex: 1;
    min-width: 200px;
}

.ct-search-wrap input {
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

.ct-search-wrap input:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 4px rgba(37,99,235,.1);
}

.ct-search-icon {
    position: absolute;
    left: 14px; top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 14px;
    pointer-events: none;
}

.ct-card {
    background: #fff;
    border-radius: 22px;
    border: 1px solid #e8edf5;
    box-shadow: 0 4px 24px rgba(15,23,42,.07);
    overflow: hidden;
}

.ct-card-stripe {
    height: 4px;
    background: linear-gradient(90deg, #2563eb, #0891b2, #6366f1);
}

.ct-card-body { padding: 24px; }

#table_id {
    width: 100% !important;
    border-collapse: separate !important;
    border-spacing: 0 8px !important;
}

#table_id thead th {
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

#table_id thead th:first-child { border-radius: 12px 0 0 12px !important; }
#table_id thead th:last-child  { border-radius: 0 12px 12px 0 !important; }

#table_id tbody tr {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(15,23,42,.055);
    transition: all .2s ease;
    animation: rowIn .35s ease both;
}

#table_id tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(37,99,235,.1);
}

@keyframes rowIn {
    from { opacity:0; transform:translateY(8px); }
    to   { opacity:1; transform:translateY(0); }
}

#table_id tbody td {
    padding: 14px 16px !important;
    border: none !important;
    vertical-align: middle !important;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    color: #334155;
    text-align: center;
}

#table_id tbody td:first-child { border-radius: 14px 0 0 14px !important; }
#table_id tbody td:last-child  { border-radius: 0 14px 14px 0 !important; }

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

.kode-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #eff6ff;
    border: 1px solid #bfdbfe;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 700;
    color: #1d4ed8;
    font-family: monospace;
}

.tanggal-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    color: #475569;
}
.tanggal-badge i { color: #94a3b8; font-size: 11px; }

.barang-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    text-align: left;
}

.barang-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #eff6ff, #dbeafe);
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    flex-shrink: 0;
}

.barang-name {
    font-size: 13px;
    font-weight: 700;
    color: #0f172a;
}

.stok-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 99px;
    padding: 4px 12px;
    font-size: 12px;
    font-weight: 700;
    color: #15803d;
}

.supplier-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fefce8;
    border: 1px solid #fde68a;
    border-radius: 8px;
    padding: 5px 12px;
    font-size: 12px;
    font-weight: 600;
    color: #92400e;
}
.supplier-badge i { font-size: 10px; color: #f59e0b; }

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

.aksi-hapus { background: linear-gradient(135deg, #ef4444, #f87171); }

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

<div class="ct-wrap">

    {{-- ── PAGE HEADER ── --}}
    <div class="ct-header">
        <div class="ct-header-left">
            <div class="ct-header-eyebrow">
                <i class="fas fa-circle"></i> Manajemen Inventaris
            </div>
            <h1><i class="fas fa-boxes" style="font-size:26px; margin-right:12px; vertical-align:middle;"></i>Barang Masuk</h1>
            <div class="ct-header-sub">Kelola transaksi penerimaan barang dari supplier</div>
        </div>

        <div class="ct-header-right">
            <div class="ct-stat-pill">
                <div class="ctn" id="statTotalBarang">—</div>
                <div class="ctl">Total Transaksi</div>
            </div>
            <a href="javascript:void(0)" class="btn-add-customer" id="button_tambah_barangMasuk">
                <i class="fas fa-plus"></i> Barang Masuk
            </a>
        </div>
    </div>

    {{-- ── TOOLBAR ── --}}
    <div class="ct-toolbar">
        <div class="ct-search-wrap">
            <i class="fas fa-search ct-search-icon"></i>
            <input type="text" id="ctSearch" placeholder="Cari kode transaksi, nama barang, atau supplier…">
        </div>
    </div>

    {{-- ── MAIN CARD ── --}}
    <div class="ct-card">
        <div class="ct-card-stripe"></div>
        <div class="ct-card-body">
            <div class="table-responsive">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th style="width:60px">No</th>
                            <th>Kode Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Masuk</th>
                            <th>Supplier</th>
                            <th style="width:90px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>

{{-- ── SELECT2 & AJAX STOK ── --}}
<script>
$(document).ready(function() {
    setTimeout(function() {

        $('#nama_barang').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var nama_barang = selectedOption.text();

            $.ajax({
                url: '/api/barang-masuk',
                type: 'GET',
                data: { nama_barang: nama_barang },
                success: function(response) {
                    if (response && (response.stok || response.stok === 0) && response.satuan_id) {
                        $('#stok').val(response.stok);
                        getSatuanName(response.satuan_id, function(satuan) {
                            $('#satuan_id').val(satuan);
                        });
                    } else if (response && response.stok === 0) {
                        $('#stok').val(0);
                        $('#satuan_id').val('');
                    }
                },
            });

            function getSatuanName(satuanId, callback) {
                $.getJSON('{{ url('api/satuan') }}', function(satuans) {
                    var satuan = satuans.find(function(s) { return s.id === satuanId; });
                    callback(satuan ? satuan.satuan : '');
                });
            }
        });

    }, 500);
});
</script>

{{-- ── DATATABLE INIT & LOAD DATA ── --}}
<script>
$(document).ready(function() {

    let table = null;

    function initTable() {
        if ($.fn.DataTable.isDataTable('#table_id')) {
            $('#table_id').DataTable().destroy();
            $('#table_id tbody').empty();
        }
        table = $('#table_id').DataTable({
            paging: true,
            ordering: false,
            dom: '<"d-flex align-items-center justify-content-between mb-2"lp>t<"d-flex align-items-center justify-content-between mt-3"ip>',
            language: {
                lengthMenu: 'Tampilkan _MENU_ data',
                info:       'Menampilkan _START_–_END_ dari _TOTAL_ data',
                infoEmpty:  'Tidak ada data',
                paginate:   { previous: '‹', next: '›' }
            }
        });

        // Rebind custom search setiap reinit
        $('#ctSearch').off('keyup').on('keyup', function() {
            table.search($(this).val()).draw();
        });
    }

    function getSupplierName(suppliers, supplierId) {
        let supplier = suppliers.find(s => s.id === supplierId);
        return supplier ? supplier.supplier : '';
    }

    function buildRow(value, no, suppliers) {
        let supplier = getSupplierName(suppliers, value.supplier_id);
        return [
            `<div class="td-no">${no}</div>`,
            `<span class="kode-badge"><i class="fas fa-barcode"></i>${value.kode_transaksi}</span>`,
            `<span class="tanggal-badge"><i class="fas fa-calendar-alt"></i>${value.tanggal_masuk}</span>`,
            `<div class="barang-cell">
                <div class="barang-icon"><i class="fas fa-box"></i></div>
                <div class="barang-name">${value.nama_barang}</div>
            </div>`,
            `<span class="stok-badge"><i class="fas fa-cubes" style="font-size:10px"></i>${value.jumlah_masuk}</span>`,
            `<span class="supplier-badge"><i class="fas fa-truck"></i>${supplier}</span>`,
            `<div class="aksi-group">
                <a href="javascript:void(0)" class="aksi-new aksi-hapus button_hapus_barangMasuk"
                   data-id="${value.id}" title="Hapus">
                    <i class="fas fa-trash"></i>
                </a>
            </div>`
        ];
    }

    function loadData() {
        $.ajax({
            url: "/barang-masuk/get-data",
            type: "GET",
            dataType: 'JSON',
            success: function(response) {
                initTable(); // destroy & reinit setiap kali load
                let no = 1;
                $('#statTotalBarang').text(response.data.length);
                $.each(response.data, function(key, value) {
                    table.row.add(buildRow(value, no++, response.supplier)).draw(false);
                });
            }
        });
    }

    loadData();

    // ── TAMBAH ──
    $('body').on('click', '#button_tambah_barangMasuk', function() {
        $('#modal_tambah_barangMasuk').modal('show');
        $('#kode_transaksi').val(generateKodeTransaksi());
    });

    $('#store').click(function(e) {
        e.preventDefault();

        // Reset alert
        $('.alert-danger').addClass('d-none').html('');

        let formData = new FormData();
        formData.append('kode_transaksi', $('#kode_transaksi').val());
        formData.append('tanggal_masuk',  $('#tanggal_masuk').val());
        formData.append('nama_barang',    $('#nama_barang').val());
        formData.append('jumlah_masuk',   $('#jumlah_masuk').val());
        formData.append('supplier_id',    $('#supplier_id').val());
        formData.append('_token',         $("meta[name='csrf-token']").attr('content'));

        $.ajax({
            url: '/barang-masuk', type: 'POST',
            cache: false, data: formData, contentType: false, processData: false,
            success: function(res) {
                Swal.fire({ icon: 'success', title: res.message, timer: 2500, showConfirmButton: false });
                $('#kode_transaksi').val('');
                $('#nama_barang').val('');
                $('#jumlah_masuk').val('');
                $('#stok').val('');
                $('#modal_tambah_barangMasuk').modal('hide');
                loadData();
            },
            error: function(err) {
                const fields = ['kode_transaksi','tanggal_masuk','nama_barang','jumlah_masuk','supplier_id'];
                fields.forEach(f => {
                    if (err.responseJSON?.[f]?.[0]) {
                        $(`#alert-${f}`).removeClass('d-none').html(err.responseJSON[f][0]);
                    }
                });
            }
        });
    });

    // ── HAPUS ──
    $('body').on('click', '.button_hapus_barangMasuk', function() {
        let id    = $(this).data('id');
        let token = $("meta[name='csrf-token']").attr('content');

        Swal.fire({
            title: 'Hapus Data?',
            text:  'Data barang masuk ini akan dihapus permanen.',
            icon:  'warning',
            showCancelButton:  true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText:  'Batal',
            confirmButtonColor: '#ef4444'
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url:  `/barang-masuk/${id}`,
                    type: 'DELETE',
                    data: { _token: token },
                    success: function(res) {
                        Swal.fire({ icon: 'success', title: res.message, timer: 2000, showConfirmButton: false });
                        loadData();
                    }
                });
            }
        });
    });

});
</script>

{{-- ── GENERATE KODE TRANSAKSI ── --}}
<script>
function generateKodeTransaksi() {
    var tanggal = new Date().toLocaleDateString('id-ID').split('/').reverse().join('-');
    var randomNumber = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
    return 'TRX-IN-' + tanggal + '-' + randomNumber;
}

$(document).ready(function() {
    $('#kode_transaksi').val(generateKodeTransaksi());

    var today = new Date();
    var formattedDate = today.getFullYear() + '-' +
        (today.getMonth() + 1).toString().padStart(2, '0') + '-' +
        today.getDate().toString().padStart(2, '0');
    document.getElementById('tanggal_masuk').value = formattedDate;
});
</script>

@endsection