<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Barang Masuk</title>
<style>

@page {
    margin: 28px 35px;
}

body{
    font-family: DejaVu Sans, sans-serif;
    font-size:12px;
    color:#333;
}

/* ================= KOP ================= */

.kop-wrapper{
    width:100%;
    border-bottom:4px solid #1e3a8a;
    padding-bottom:4px;
    margin-bottom:14px;
}

.kop-table{
    width:100%;
    border-collapse:collapse;
}

.kop-table td{
    vertical-align:middle;
    padding:0;
}

/* LOGO */
.kop-logo-left,
.kop-logo-right{
    width:16%;
    text-align:center;
}

.kop-logo-left img{
    width:92px;
}

.kop-logo-right img{
    width:74px;
}

/* TEKS KOP */
.kop-text{
    width:68%;
    text-align:center;
    line-height:1.15;
}

.kop-text .yayasan{
    font-size:21px;
    font-weight:700;
    letter-spacing:1.2px;
    margin-bottom:2px;
}

.kop-text .sekolah{
    font-size:25px;
    font-weight:800;
    margin-bottom:3px;
}

.kop-text .alamat{
    font-size:13px;
    margin-top:0;
}

/* ================= JUDUL ================= */

.judul{
    text-align:center;
    font-weight:bold;
    font-size:16px;
    color:#1e3a8a;
    margin-top:6px;
}

.judul-line{
    width:160px;
    height:3px;
    background:#1e3a8a;
    margin:6px auto 8px auto;
}

.periode{
    text-align:center;
    font-size:12px;
    margin-bottom:16px;
    color:#444;
}

/* ================= TABEL ================= */

table.data{
    width:100%;
    border-collapse:collapse;
}

table.data th{
    background:#1e3a8a;
    color:#fff;
    padding:8px;
    text-align:center;
    font-size:12px;
}

table.data td{
    border:1px solid #ccc;
    padding:7px;
}

table.data tr:nth-child(even){
    background:#f4f6fa;
}

/* TOTAL */
.total-row td{
    background:#f8f9fb;
    color:#000000;
    font-weight:bold;
}

/* ================= TTD ================= */

.ttd-table{
    width:100%;
    margin-top:55px;
}

.ttd-table td{
    border:none;
}

.nama-ttd{
    margin-top:50px;
    font-weight:bold;
    text-decoration:underline;
}

</style>
</head>
<body>

@php
$logoSekolah = base64_encode(file_get_contents(public_path('img/logo-sekolah.png')));
$logoDinas   = base64_encode(file_get_contents(public_path('img/logo-dinas.png')));
$totalMasuk  = collect($data)->sum('jumlah_masuk');

/*
|--------------------------------------------------------------------------
| DATA PENDUKUNG UNTUK PDF
|--------------------------------------------------------------------------
| Dibuat agar PDF tetap aman walaupun relasi supplier/satuan belum ikut diload.
*/

$namaBarangList = collect($data)->pluck('nama_barang')->filter()->unique()->values();
$supplierIdList = collect($data)->pluck('supplier_id')->filter()->unique()->values();

$barangList = \App\Models\Barang::whereIn('nama_barang', $namaBarangList)
    ->get()
    ->keyBy('nama_barang');

$satuanIdList = $barangList->pluck('satuan_id')->filter()->unique()->values();

$satuanList = \App\Models\Satuan::whereIn('id', $satuanIdList)
    ->get()
    ->keyBy('id');

$supplierList = \App\Models\Supplier::whereIn('id', $supplierIdList)
    ->get()
    ->keyBy('id');

$getSatuanBarang = function ($namaBarang) use ($barangList, $satuanList) {
    $barang = $barangList->get($namaBarang);

    if (!$barang) {
        return '';
    }

    $satuan = $satuanList->get($barang->satuan_id);

    return $satuan->satuan
        ?? $satuan->nama_satuan
        ?? $satuan->nama
        ?? '';
};

$getNamaSupplier = function ($item) use ($supplierList) {
    if (isset($item->supplier) && $item->supplier) {
        return $item->supplier->supplier
            ?? $item->supplier->nama_supplier
            ?? $item->supplier->nama
            ?? '-';
    }

    $supplier = $supplierList->get($item->supplier_id);

    if (!$supplier) {
        return '-';
    }

    return $supplier->supplier
        ?? $supplier->nama_supplier
        ?? $supplier->nama
        ?? '-';
};

$satuanTotal = collect($data)
    ->map(fn($item) => $getSatuanBarang($item->nama_barang))
    ->filter()
    ->unique()
    ->values();

$satuanTotalText = $satuanTotal->count() === 1 ? ' ' . $satuanTotal->first() : '';
@endphp

<!-- ================= KOP ================= -->

<div class="kop-wrapper">

<table class="kop-table">
<tr>

<td class="kop-logo-left">
<img src="data:image/png;base64,{{ $logoSekolah }}">
</td>

<td class="kop-text">
<div class="yayasan">YAYASAN CITIA VIDIA SASANA</div>
<div class="sekolah">SMKS VIDYA SASANA</div>
<div class="alamat">
Jl. Raja Oesman No. 5, Tanjung Balai Karimun<br>
Telp. (021) 123456 | Email: smkvidyasasana2023@gmail.com
</div>
</td>

<td class="kop-logo-right">
<img src="data:image/png;base64,{{ $logoDinas }}">
</td>

</tr>
</table>

</div>

<!-- ================= JUDUL ================= -->

<div class="judul">LAPORAN BARANG MASUK</div>
<div class="judul-line"></div>

@if($tanggalMulai && $tanggalSelesai)
<div class="periode">
Periode:
{{ \Carbon\Carbon::parse($tanggalMulai)->format('d F Y') }}
s/d
{{ \Carbon\Carbon::parse($tanggalSelesai)->format('d F Y') }}
</div>
@endif

<!-- ================= DATA ================= -->

<table class="data">

<thead>
<tr>
<th width="5%">No</th>
<th width="18%">Kode Transaksi</th>
<th width="15%">Tanggal</th>
<th>Nama Barang</th>
<th width="12%">Jumlah</th>
<th width="20%">Supplier</th>
</tr>
</thead>

<tbody>

@forelse($data as $i => $item)

<tr>
<td align="center">{{ $i+1 }}</td>
<td align="center">{{ $item->kode_transaksi }}</td>
<td align="center">
{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d-m-Y') }}
</td>
<td>{{ $item->nama_barang }}</td>
<td align="center">
    {{ number_format($item->jumlah_masuk) }} {{ $getSatuanBarang($item->nama_barang) }}
</td>
<td>{{ $getNamaSupplier($item) }}</td>
</tr>

@empty

<tr>
<td colspan="6" align="center">
Data tidak tersedia
</td>
</tr>

@endforelse

<!-- ================= TOTAL ================= -->

<tr class="total-row">
<td colspan="4" align="right">TOTAL BARANG MASUK</td>
<td align="center">{{ number_format($totalMasuk) }}</td>
<td></td>
</tr>

</tbody>

</table>

<!-- ================= TTD ================= -->

@php
$setting = \App\Models\Setting::first();
$bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
$tanggal = date('d') . ' ' . $bulan[(int)date('n') - 1] . ' ' . date('Y');
@endphp

<table class="ttd-table">
<tr>

<td width="50%" align="center">
Mengetahui,<br>
Kepala Sekolah

<div class="nama-ttd">{{ $setting->nama_kepsek ?? 'Nama Kepala Sekolah' }}</div>
<span style="font-size:11px;">
    NUPTK. {{ $setting->nip_kepsek ?? '-' }}
</span>
</td>

<td width="50%" align="center">
Tanjung Balai Karimun, {{ $tanggal }}<br>
Waka Sarana dan Prasarana

<div class="nama-ttd">{{ $setting->nama_waka ?? 'Nama Waka' }}</div>
<span style="font-size:11px;">
    NUPTK. {{ $setting->nuptk_waka ?? '-' }}
</span>
</td>

</tr>
</table>

</body>
</html>