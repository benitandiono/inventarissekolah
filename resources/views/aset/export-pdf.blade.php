<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Data Aset</title>

<style>

@page {
    margin: 28px 35px 60px 35px;
    @bottom-left {
        content: "Dicetak oleh Aplikasi Inventaris Sekolah V1.0";
        font-family: DejaVu Sans, sans-serif;
        font-size: 10px;
        color: #666;
        padding-bottom: 10px;
        border-top: 1px solid #ddd;
    }
    @bottom-center {
        content: "Halaman " counter(page) " dari " counter(pages);
        font-family: DejaVu Sans, sans-serif;
        font-size: 10px;
        color: #666;
        padding-bottom: 10px;
        border-top: 1px solid #ddd;
    }
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

/* TEXT */
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
    width:150px;
    height:3px;
    background:#1e3a8a;
    margin:6px auto 12px auto;
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

/* PEMEGANG CELL - HANYA NAMA */
.pemegang-nama {
    font-weight: 600;
    color: #333;
    font-size: 12px;
}

/* TOTAL ROW */
.total-row td {
    background: #f8f9fb;
    color: #000000;
    font-weight: bold;
    border-top: 2px solid #c8d4e8;
    border-bottom: 2px solid #c8d4e8;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
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
$totalAset   = collect($aset)->sum('jumlah');

/**
 * Pisahkan nilai kondisi (format: "Nama — Status") menjadi nama & status.
 * Mendukung format lama (nama saja) dan format baru (nama — status).
 */
function parsePemegang($kondisi) {
    if (!$kondisi || $kondisi === '-') {
        return ['nama' => '-', 'status' => ''];
    }
    // Coba split dengan separator " — "
    $parts = explode(' — ', $kondisi, 2);
    return [
        'nama'   => trim($parts[0]),
        'status' => isset($parts[1]) ? trim($parts[1]) : '',
    ];
}
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

<div class="judul">LAPORAN DATA ASET</div>
<div class="judul-line"></div>


<!-- ================= TABEL DATA ================= -->

<table class="data">
<thead>
<tr>
    <th width="5%">No</th>
    <th width="30%">Nama Aset</th>
    <th width="10%">Jumlah Aset</th>
    <th width="25%">Pemegang Aset</th>
    <th width="30%">Lokasi Aset</th>
</tr>
</thead>

<tbody>

@forelse($aset as $i => $a)
@php
    $pemegang = parsePemegang($a->kondisi);
@endphp
<tr>
    <td align="center">{{ $i + 1 }}</td>
    <td>{{ $a->nama_aset }}</td>
    <td align="center">{{ number_format($a->jumlah) }}</td>
    <td align="left">
        @if($pemegang['nama'] !== '-')
            <span class="pemegang-nama">{{ $pemegang['nama'] }}</span>
        @else
            <span style="color:#aaa;">—</span>
        @endif
    </td>
    <td>{{ $a->lokasi }}</td>
</tr>
@empty
<tr>
    <td colspan="5" align="center">
        Data aset tidak tersedia
    </td>
</tr>
@endforelse

<!-- ================= TOTAL ================= -->
<tr class="total-row">
    <td colspan="2" align="right">TOTAL JUMLAH ASET</td>
    <td align="center">{{ number_format($totalAset) }}</td>
    <td colspan="2"></td>
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