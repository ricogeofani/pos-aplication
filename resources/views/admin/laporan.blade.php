@extends('layouts.admin')

@section('header', 'laporan')
@section('content')
<table class="table table-bordered">
    <thead class="bg-warning">
        <div class="header d-flex justify-content-between mb-2">
            <h4>Laporan Penjualan</h4>
            <div class="btn">
                <a href="javascript:location.reload(true)" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                <a href="{{ url('printPenjualan') }}" target="_blank" class="btn btn-primary" target="_blanc"><i class="nav-icon fas fa-print"></i> Print Penjualan</a>
            </div>
        </div>
        <tr align="center">
            <th>Tanggal Penjualan</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Nama Pelanggan</th>
            <th>Total Item</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($laporan_penjualan as $laporan)
            <tr>
                <td>{{ date('d F Y', strtotime($laporan->created_at))}}</td>
                <td>{{ $laporan->karyawan->nama_karyawan }}</td>
                <td>{{ $laporan->karyawan->jabatan }}</td>
                <td>{{ $laporan->pelanggan->nama_pelanggan }}</td>
                <td>{{ count($laporan->barang) }} item</td>
            </tr>
        @endforeach
    </tbody>
</table>
<hr> <hr>
<table class="table table-bordered">
    <thead class="bg-warning">
        <div class="header d-flex justify-content-between mb-2">
            <h4>Laporan Pembelian</h4>
            <div class="btn">
                <a href="javascript:location.reload(true)" class="btn btn-success"><i class="fa fa-undo" aria-hidden="true"></i> Refresh</a>
                <a href="{{ url('printPembelian') }}" target="_blank" class="btn btn-primary" target="_blanc"><i class="nav-icon fas fa-print"></i> Print Pembelian</a>
            </div>
        </div>
        <tr align="center">
            <th>Tanggal Pembelian</th>
            <th>Nama Karyawan</th>
            <th>Jabatan</th>
            <th>Nama Suplier</th>
            <th>Total Item</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($laporan_pembelian as $laporan)
            <tr>
                <td>{{ date('d F Y', strtotime($laporan->created_at))}}</td>
                <td>{{ $laporan->karyawan->nama_karyawan }}</td>
                <td>{{ $laporan->karyawan->jabatan }}</td>
                <td>{{ $laporan->suplier->nama_suplier }}</td>
                <td>{{ count($laporan->barang) }} item</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection