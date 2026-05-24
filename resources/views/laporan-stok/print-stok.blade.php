<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Stok Barang</title>

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
    padding-bottom:4px;      /* DIPERKETAT */
    margin-bottom:14px;      /* DIPERKETAT */
}

.kop-table{
    width:100%;
    border-collapse:collapse;
}

.kop-table td{
    vertical-align:middle;
    padding:0;               /* HILANGKAN JARAK DEFAULT */
}

/* LOGO */
.kop-logo-left,
.kop-logo-right{
    width:16%;
    text-align:center;
}

.kop-logo-left img{
    width:92px;              /* DIBESARKAN */
}

.kop-logo-right img{
    width:74px;              /* DIBESARKAN */
}

/* TEXT */
.kop-text{
    width:68%;
    text-align:center;
    line-height:1.15;        /* LEBIH RAPAT */
}

.kop-text .yayasan{
    font-size:21px;          /* LEBIH TEGAS */
    font-weight:700;
    letter-spacing:1.2px;
    margin-bottom:2px;
}

.kop-text .sekolah{
    font-size:25px;          /* JUDUL UTAMA */
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
    width:150px;
    height:3px;
    background:#1e3a8a;
    margin:6px auto 12px auto;   /* LEBIH DEKAT */
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

/* TOTAL ROW */
.total-row td{
    background:#f8f9fb;
    color:#000000;
    font-weight:bold;
}

/* ================= TTD ================= */

.ttd-table{
    width:100%;
    margin-top:55px;         /* LEBIH PROPORSIONAL */
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
$totalStok  = collect($barangs)->sum('stok');
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

<div class="judul">LAPORAN STOK BARANG</div>
<div class="judul-line"></div>


<!-- ================= DATA ================= -->

<table class="data">

<thead>
<tr>
<th width="5%">No</th>
<th width="20%">Kode Barang</th>
<th width="45%">Nama Barang</th>
<th width="15%">Stok Barang</th>
</tr>
</thead>

<tbody>

@forelse($barangs as $i => $barang)

<tr>
<td align="center">{{ $i+1 }}</td>
<td align="center">{{ $barang->kode_barang }}</td>
<td>{{ $barang->nama_barang }}</td>
<td align="center">
{{ number_format($barang->stok) }} {{ $barang->satuan->satuan ?? '' }}
</td>
</tr>

@empty

<tr>
<td colspan="4" align="center">
Data tidak tersedia
</td>
</tr>

@endforelse

<!-- ================= TOTAL ================= -->

<tr class="total-row">
<td colspan="3" align="right">TOTAL STOK BARANG</td>
<td align="center">{{ number_format($totalStok) }}</td>
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
