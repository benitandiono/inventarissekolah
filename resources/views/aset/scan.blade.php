@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1>
        <i class="fas fa-qrcode text-primary mr-2"></i>
        Detail Aset
    </h1>
</div>

<div class="card shadow-sm">
    <div class="card-body text-center">

        <img src="/storage/{{ $aset->gambar }}"
             class="mb-3"
             style="width:150px;border-radius:18px;box-shadow:0 12px 30px rgba(0,0,0,.2)">

        <h4 class="font-weight-bold">{{ $aset->nama_aset }}</h4>

        <table class="table table-bordered mt-4">
            <tr><th>Jumlah</th><td>{{ $aset->jumlah }}</td></tr>
            <tr><th>Kondisi</th><td>{{ $aset->kondisi }}</td></tr>
            <tr><th>Lokasi</th><td>{{ $aset->lokasi }}</td></tr>
        </table>

    </div>
</div>
@endsection
