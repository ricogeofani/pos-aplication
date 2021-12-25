<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Laporan pembelian</title>
</head>
<body>
    <table class="static" align="center" border="1" style="width: 90%" cellpadding="5">
        <thead>
            <div class="header">
                <h1 align="center">Laporan Pembelian</h1>
            </div>
            <tr style="background: yellow">
                <th>Tanggal Pembelian</th>
                <th>Nama Karyawan</th>
                <th>Jabatan</th>
                <th>Nama Suplier</th>
                <th>Total Item</th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($laporan_pembelian as $laporan)
                <tr>
                    <td>{{ date('d F Y', strtotime($laporan->created_at)) }}</td>
                    <td>{{ $laporan->karyawan->nama_karyawan }}</td>
                    <td>{{ $laporan->karyawan->jabatan }}</td>
                    <td>{{ $laporan->suplier->nama_suplier }}</td>
                    <td>{{ count($laporan->barang) }} item</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        window.print()
    </script>
</body>
</html>